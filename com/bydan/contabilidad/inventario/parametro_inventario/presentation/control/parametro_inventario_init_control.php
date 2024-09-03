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

namespace com\bydan\contabilidad\inventario\parametro_inventario\presentation\control;

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

use com\bydan\contabilidad\inventario\parametro_inventario\business\entity\parametro_inventario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/parametro_inventario/util/parametro_inventario_carga.php');
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_carga;

use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_util;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_param_return;
use com\bydan\contabilidad\inventario\parametro_inventario\business\logic\parametro_inventario_logic;
use com\bydan\contabilidad\inventario\parametro_inventario\business\logic\parametro_inventario_logic_add;
use com\bydan\contabilidad\inventario\parametro_inventario\presentation\session\parametro_inventario_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\logic\tipo_costeo_kardex_logic;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_carga;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_util;

use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;
use com\bydan\contabilidad\inventario\tipo_kardex\business\logic\tipo_kardex_logic;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_carga;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_inventario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_inventario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_inventario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_inventario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_inventario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_inventario_init_control extends ControllerBase {	
	
	public $parametro_inventarioClase=null;	
	public $parametro_inventariosModel=null;	
	public $parametro_inventariosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idparametro_inventario=0;	
	public ?int $idparametro_inventarioActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $parametro_inventarioLogic=null;
	
	public $parametro_inventarioActual=null;	
	
	public $parametro_inventario=null;
	public $parametro_inventarios=null;
	public $parametro_inventariosEliminados=array();
	public $parametro_inventariosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $parametro_inventariosLocal=array();
	public ?array $parametro_inventariosReporte=null;
	public ?array $parametro_inventariosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadparametro_inventario='onload';
	public string $strTipoPaginaAuxiliarparametro_inventario='none';
	public string $strTipoUsuarioAuxiliarparametro_inventario='none';
		
	public $parametro_inventarioReturnGeneral=null;
	public $parametro_inventarioParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $parametro_inventarioModel=null;
	public $parametro_inventarioControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_termino_pago_proveedor='';
	public string $strMensajeid_tipo_costeo_kardex='';
	public string $strMensajeid_tipo_kardex='';
	public string $strMensajenumero_producto='';
	public string $strMensajenumero_orden_compra='';
	public string $strMensajenumero_devolucion='';
	public string $strMensajenumero_cotizacion='';
	public string $strMensajenumero_kardex='';
	public string $strMensajecon_producto_inactivo='';
	
	
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idtermino_pago_proveedor='display:table-row';
	public string $strVisibleFK_Idtipo_costeo_kardex='display:table-row';
	public string $strVisibleFK_Idtipo_kardex='display:table-row';

	
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

	public array $termino_pago_proveedorsFK=array();

	public function gettermino_pago_proveedorsFK():array {
		return $this->termino_pago_proveedorsFK;
	}

	public function settermino_pago_proveedorsFK(array $termino_pago_proveedorsFK) {
		$this->termino_pago_proveedorsFK = $termino_pago_proveedorsFK;
	}

	public int $idtermino_pago_proveedorDefaultFK=-1;

	public function getIdtermino_pago_proveedorDefaultFK():int {
		return $this->idtermino_pago_proveedorDefaultFK;
	}

	public function setIdtermino_pago_proveedorDefaultFK(int $idtermino_pago_proveedorDefaultFK) {
		$this->idtermino_pago_proveedorDefaultFK = $idtermino_pago_proveedorDefaultFK;
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

	public array $tipo_kardexsFK=array();

	public function gettipo_kardexsFK():array {
		return $this->tipo_kardexsFK;
	}

	public function settipo_kardexsFK(array $tipo_kardexsFK) {
		$this->tipo_kardexsFK = $tipo_kardexsFK;
	}

	public int $idtipo_kardexDefaultFK=-1;

	public function getIdtipo_kardexDefaultFK():int {
		return $this->idtipo_kardexDefaultFK;
	}

	public function setIdtipo_kardexDefaultFK(int $idtipo_kardexDefaultFK) {
		$this->idtipo_kardexDefaultFK = $idtipo_kardexDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_empresaFK_Idempresa=null;

	public  $id_termino_pago_proveedorFK_Idtermino_pago_proveedor=null;

	public  $id_tipo_costeo_kardexFK_Idtipo_costeo_kardex=null;

	public  $id_tipo_kardexFK_Idtipo_kardex=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->parametro_inventarioLogic==null) {
				$this->parametro_inventarioLogic=new parametro_inventario_logic();
			}
			
		} else {
			if($this->parametro_inventarioLogic==null) {
				$this->parametro_inventarioLogic=new parametro_inventario_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->parametro_inventarioClase==null) {
				$this->parametro_inventarioClase=new parametro_inventario();
			}
			
			$this->parametro_inventarioClase->setId(0);	
				
				
			$this->parametro_inventarioClase->setid_empresa(-1);	
			$this->parametro_inventarioClase->setid_termino_pago_proveedor(-1);	
			$this->parametro_inventarioClase->setid_tipo_costeo_kardex(-1);	
			$this->parametro_inventarioClase->setid_tipo_kardex(-1);	
			$this->parametro_inventarioClase->setnumero_producto(0);	
			$this->parametro_inventarioClase->setnumero_orden_compra(0);	
			$this->parametro_inventarioClase->setnumero_devolucion(0);	
			$this->parametro_inventarioClase->setnumero_cotizacion(0);	
			$this->parametro_inventarioClase->setnumero_kardex(0);	
			$this->parametro_inventarioClase->setcon_producto_inactivo(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('parametro_inventario');
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
		$this->cargarParametrosReporteBase('parametro_inventario');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('parametro_inventario');
	}
	
	public function actualizarControllerConReturnGeneral(parametro_inventario_param_return $parametro_inventarioReturnGeneral) {
		if($parametro_inventarioReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesparametro_inventariosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$parametro_inventarioReturnGeneral->getsMensajeProceso();
		}
		
		if($parametro_inventarioReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$parametro_inventarioReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($parametro_inventarioReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$parametro_inventarioReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$parametro_inventarioReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($parametro_inventarioReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($parametro_inventarioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$parametro_inventarioReturnGeneral->getsFuncionJs();
		}
		
		if($parametro_inventarioReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(parametro_inventario_session $parametro_inventario_session){
		$this->strStyleDivArbol=$parametro_inventario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_inventario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_inventario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_inventario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_inventario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_inventario_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$parametro_inventario_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(parametro_inventario_session $parametro_inventario_session){
		$parametro_inventario_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$parametro_inventario_session->strStyleDivHeader='display:none';			
		$parametro_inventario_session->strStyleDivContent='width:93%;height:100%';	
		$parametro_inventario_session->strStyleDivOpcionesBanner='display:none';	
		$parametro_inventario_session->strStyleDivExpandirColapsar='display:none';	
		$parametro_inventario_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(parametro_inventario_control $parametro_inventario_control_session){
		$this->idNuevo=$parametro_inventario_control_session->idNuevo;
		$this->parametro_inventarioActual=$parametro_inventario_control_session->parametro_inventarioActual;
		$this->parametro_inventario=$parametro_inventario_control_session->parametro_inventario;
		$this->parametro_inventarioClase=$parametro_inventario_control_session->parametro_inventarioClase;
		$this->parametro_inventarios=$parametro_inventario_control_session->parametro_inventarios;
		$this->parametro_inventariosEliminados=$parametro_inventario_control_session->parametro_inventariosEliminados;
		$this->parametro_inventario=$parametro_inventario_control_session->parametro_inventario;
		$this->parametro_inventariosReporte=$parametro_inventario_control_session->parametro_inventariosReporte;
		$this->parametro_inventariosSeleccionados=$parametro_inventario_control_session->parametro_inventariosSeleccionados;
		$this->arrOrderBy=$parametro_inventario_control_session->arrOrderBy;
		$this->arrOrderByRel=$parametro_inventario_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$parametro_inventario_control_session->arrHistoryWebs;
		$this->arrSessionBases=$parametro_inventario_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadparametro_inventario=$parametro_inventario_control_session->strTypeOnLoadparametro_inventario;
		$this->strTipoPaginaAuxiliarparametro_inventario=$parametro_inventario_control_session->strTipoPaginaAuxiliarparametro_inventario;
		$this->strTipoUsuarioAuxiliarparametro_inventario=$parametro_inventario_control_session->strTipoUsuarioAuxiliarparametro_inventario;	
		
		$this->bitEsPopup=$parametro_inventario_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$parametro_inventario_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$parametro_inventario_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$parametro_inventario_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$parametro_inventario_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$parametro_inventario_control_session->strSufijo;
		$this->bitEsRelaciones=$parametro_inventario_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$parametro_inventario_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$parametro_inventario_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$parametro_inventario_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$parametro_inventario_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$parametro_inventario_control_session->strTituloTabla;
		$this->strTituloPathPagina=$parametro_inventario_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$parametro_inventario_control_session->strTituloPathElementoActual;
		
		if($this->parametro_inventarioLogic==null) {			
			$this->parametro_inventarioLogic=new parametro_inventario_logic();
		}
		
		
		if($this->parametro_inventarioClase==null) {
			$this->parametro_inventarioClase=new parametro_inventario();	
		}
		
		$this->parametro_inventarioLogic->setparametro_inventario($this->parametro_inventarioClase);
		
		
		if($this->parametro_inventarios==null) {
			$this->parametro_inventarios=array();	
		}
		
		$this->parametro_inventarioLogic->setparametro_inventarios($this->parametro_inventarios);
		
		
		$this->strTipoView=$parametro_inventario_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$parametro_inventario_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$parametro_inventario_control_session->datosCliente;
		$this->strAccionBusqueda=$parametro_inventario_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$parametro_inventario_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$parametro_inventario_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$parametro_inventario_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$parametro_inventario_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$parametro_inventario_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$parametro_inventario_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$parametro_inventario_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$parametro_inventario_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$parametro_inventario_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$parametro_inventario_control_session->strTipoPaginacion;
		$this->strTipoAccion=$parametro_inventario_control_session->strTipoAccion;
		$this->tiposReportes=$parametro_inventario_control_session->tiposReportes;
		$this->tiposReporte=$parametro_inventario_control_session->tiposReporte;
		$this->tiposAcciones=$parametro_inventario_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$parametro_inventario_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$parametro_inventario_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$parametro_inventario_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$parametro_inventario_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$parametro_inventario_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$parametro_inventario_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$parametro_inventario_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$parametro_inventario_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$parametro_inventario_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$parametro_inventario_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$parametro_inventario_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$parametro_inventario_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$parametro_inventario_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$parametro_inventario_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$parametro_inventario_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$parametro_inventario_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$parametro_inventario_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$parametro_inventario_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$parametro_inventario_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$parametro_inventario_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$parametro_inventario_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$parametro_inventario_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$parametro_inventario_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$parametro_inventario_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$parametro_inventario_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$parametro_inventario_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$parametro_inventario_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$parametro_inventario_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$parametro_inventario_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$parametro_inventario_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$parametro_inventario_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$parametro_inventario_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$parametro_inventario_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$parametro_inventario_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$parametro_inventario_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$parametro_inventario_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$parametro_inventario_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$parametro_inventario_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$parametro_inventario_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$parametro_inventario_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$parametro_inventario_control_session->resumenUsuarioActual;	
		$this->moduloActual=$parametro_inventario_control_session->moduloActual;	
		$this->opcionActual=$parametro_inventario_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$parametro_inventario_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$parametro_inventario_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));
				
		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}
		
		$this->strStyleDivArbol=$parametro_inventario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_inventario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_inventario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_inventario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_inventario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_inventario_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$parametro_inventario_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$parametro_inventario_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$parametro_inventario_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$parametro_inventario_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$parametro_inventario_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$parametro_inventario_control_session->strMensajeid_empresa;
		$this->strMensajeid_termino_pago_proveedor=$parametro_inventario_control_session->strMensajeid_termino_pago_proveedor;
		$this->strMensajeid_tipo_costeo_kardex=$parametro_inventario_control_session->strMensajeid_tipo_costeo_kardex;
		$this->strMensajeid_tipo_kardex=$parametro_inventario_control_session->strMensajeid_tipo_kardex;
		$this->strMensajenumero_producto=$parametro_inventario_control_session->strMensajenumero_producto;
		$this->strMensajenumero_orden_compra=$parametro_inventario_control_session->strMensajenumero_orden_compra;
		$this->strMensajenumero_devolucion=$parametro_inventario_control_session->strMensajenumero_devolucion;
		$this->strMensajenumero_cotizacion=$parametro_inventario_control_session->strMensajenumero_cotizacion;
		$this->strMensajenumero_kardex=$parametro_inventario_control_session->strMensajenumero_kardex;
		$this->strMensajecon_producto_inactivo=$parametro_inventario_control_session->strMensajecon_producto_inactivo;
			
		
		$this->empresasFK=$parametro_inventario_control_session->empresasFK;
		$this->idempresaDefaultFK=$parametro_inventario_control_session->idempresaDefaultFK;
		$this->termino_pago_proveedorsFK=$parametro_inventario_control_session->termino_pago_proveedorsFK;
		$this->idtermino_pago_proveedorDefaultFK=$parametro_inventario_control_session->idtermino_pago_proveedorDefaultFK;
		$this->tipo_costeo_kardexsFK=$parametro_inventario_control_session->tipo_costeo_kardexsFK;
		$this->idtipo_costeo_kardexDefaultFK=$parametro_inventario_control_session->idtipo_costeo_kardexDefaultFK;
		$this->tipo_kardexsFK=$parametro_inventario_control_session->tipo_kardexsFK;
		$this->idtipo_kardexDefaultFK=$parametro_inventario_control_session->idtipo_kardexDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$parametro_inventario_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idtermino_pago_proveedor=$parametro_inventario_control_session->strVisibleFK_Idtermino_pago_proveedor;
		$this->strVisibleFK_Idtipo_costeo_kardex=$parametro_inventario_control_session->strVisibleFK_Idtipo_costeo_kardex;
		$this->strVisibleFK_Idtipo_kardex=$parametro_inventario_control_session->strVisibleFK_Idtipo_kardex;
		
		
		
		
		$this->id_empresaFK_Idempresa=$parametro_inventario_control_session->id_empresaFK_Idempresa;
		$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$parametro_inventario_control_session->id_termino_pago_proveedorFK_Idtermino_pago_proveedor;
		$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex=$parametro_inventario_control_session->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex;
		$this->id_tipo_kardexFK_Idtipo_kardex=$parametro_inventario_control_session->id_tipo_kardexFK_Idtipo_kardex;

		
		
		
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
	
	public function getparametro_inventarioControllerAdditional() {
		return $this->parametro_inventarioControllerAdditional;
	}

	public function setparametro_inventarioControllerAdditional($parametro_inventarioControllerAdditional) {
		$this->parametro_inventarioControllerAdditional = $parametro_inventarioControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getparametro_inventarioActual() : parametro_inventario {
		return $this->parametro_inventarioActual;
	}

	public function setparametro_inventarioActual(parametro_inventario $parametro_inventarioActual) {
		$this->parametro_inventarioActual = $parametro_inventarioActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidparametro_inventario() : int {
		return $this->idparametro_inventario;
	}

	public function setidparametro_inventario(int $idparametro_inventario) {
		$this->idparametro_inventario = $idparametro_inventario;
	}
	
	public function getparametro_inventario() : parametro_inventario {
		return $this->parametro_inventario;
	}

	public function setparametro_inventario(parametro_inventario $parametro_inventario) {
		$this->parametro_inventario = $parametro_inventario;
	}
		
	public function getparametro_inventarioLogic() : parametro_inventario_logic {		
		return $this->parametro_inventarioLogic;
	}

	public function setparametro_inventarioLogic(parametro_inventario_logic $parametro_inventarioLogic) {
		$this->parametro_inventarioLogic = $parametro_inventarioLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getparametro_inventariosModel() {		
		try {						
			/*parametro_inventariosModel.setWrappedData(parametro_inventarioLogic->getparametro_inventarios());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->parametro_inventariosModel;
	}
	
	public function setparametro_inventariosModel($parametro_inventariosModel) {
		$this->parametro_inventariosModel = $parametro_inventariosModel;
	}
	
	public function getparametro_inventarios() : array {		
		return $this->parametro_inventarios;
	}
	
	public function setparametro_inventarios(array $parametro_inventarios) {
		$this->parametro_inventarios= $parametro_inventarios;
	}
	
	public function getparametro_inventariosEliminados() : array {		
		return $this->parametro_inventariosEliminados;
	}
	
	public function setparametro_inventariosEliminados(array $parametro_inventariosEliminados) {
		$this->parametro_inventariosEliminados= $parametro_inventariosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getparametro_inventarioActualFromListDataModel() {
		try {
			/*$parametro_inventarioClase= $this->parametro_inventariosModel->getRowData();*/
			
			/*return $parametro_inventario;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
