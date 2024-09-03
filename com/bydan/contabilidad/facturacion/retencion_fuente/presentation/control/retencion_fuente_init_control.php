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

namespace com\bydan\contabilidad\facturacion\retencion_fuente\presentation\control;

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

use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/retencion_fuente/util/retencion_fuente_carga.php');
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_carga;

use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_util;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_param_return;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\logic\retencion_fuente_logic;
use com\bydan\contabilidad\facturacion\retencion_fuente\presentation\session\retencion_fuente_session;


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


use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
retencion_fuente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
retencion_fuente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
retencion_fuente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
retencion_fuente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*retencion_fuente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class retencion_fuente_init_control extends ControllerBase {	
	
	public $retencion_fuenteClase=null;	
	public $retencion_fuentesModel=null;	
	public $retencion_fuentesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idretencion_fuente=0;	
	public ?int $idretencion_fuenteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $retencion_fuenteLogic=null;
	
	public $retencion_fuenteActual=null;	
	
	public $retencion_fuente=null;
	public $retencion_fuentes=null;
	public $retencion_fuentesEliminados=array();
	public $retencion_fuentesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $retencion_fuentesLocal=array();
	public ?array $retencion_fuentesReporte=null;
	public ?array $retencion_fuentesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadretencion_fuente='onload';
	public string $strTipoPaginaAuxiliarretencion_fuente='none';
	public string $strTipoUsuarioAuxiliarretencion_fuente='none';
		
	public $retencion_fuenteReturnGeneral=null;
	public $retencion_fuenteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $retencion_fuenteModel=null;
	public $retencion_fuenteControllerAdditional=null;
	
	
	

	public $proveedorLogic=null;

	public function  getproveedorLogic() {
		return $this->proveedorLogic;
	}

	public function setproveedorLogic($proveedorLogic) {
		$this->proveedorLogic =$proveedorLogic;
	}


	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajecodigo='';
	public string $strMensajedescripcion='';
	public string $strMensajevalor='';
	public string $strMensajevalor_base='';
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

	
	
	
	
	
	
	public $strTienePermisosproveedor='none';
	public $strTienePermisoscliente='none';
	
	
	public  $id_cuenta_comprasFK_Idcuenta_compras=null;

	public  $id_cuenta_ventasFK_Idcuenta_ventas=null;

	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->retencion_fuenteLogic==null) {
				$this->retencion_fuenteLogic=new retencion_fuente_logic();
			}
			
		} else {
			if($this->retencion_fuenteLogic==null) {
				$this->retencion_fuenteLogic=new retencion_fuente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->retencion_fuenteClase==null) {
				$this->retencion_fuenteClase=new retencion_fuente();
			}
			
			$this->retencion_fuenteClase->setId(0);	
				
				
			$this->retencion_fuenteClase->setid_empresa(-1);	
			$this->retencion_fuenteClase->setcodigo('');	
			$this->retencion_fuenteClase->setdescripcion('');	
			$this->retencion_fuenteClase->setvalor(0.0);	
			$this->retencion_fuenteClase->setvalor_base(0.0);	
			$this->retencion_fuenteClase->setpredeterminado(false);	
			$this->retencion_fuenteClase->setid_cuenta_ventas(null);	
			$this->retencion_fuenteClase->setid_cuenta_compras(null);	
			$this->retencion_fuenteClase->setcuenta_contable_ventas('');	
			$this->retencion_fuenteClase->setcuenta_contable_compras('');	
			
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
		$this->prepararEjecutarMantenimientoBase('retencion_fuente');
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
		$this->cargarParametrosReporteBase('retencion_fuente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('retencion_fuente');
	}
	
	public function actualizarControllerConReturnGeneral(retencion_fuente_param_return $retencion_fuenteReturnGeneral) {
		if($retencion_fuenteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesretencion_fuentesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$retencion_fuenteReturnGeneral->getsMensajeProceso();
		}
		
		if($retencion_fuenteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$retencion_fuenteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($retencion_fuenteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$retencion_fuenteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$retencion_fuenteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($retencion_fuenteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($retencion_fuenteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$retencion_fuenteReturnGeneral->getsFuncionJs();
		}
		
		if($retencion_fuenteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(retencion_fuente_session $retencion_fuente_session){
		$this->strStyleDivArbol=$retencion_fuente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$retencion_fuente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$retencion_fuente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$retencion_fuente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$retencion_fuente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$retencion_fuente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$retencion_fuente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(retencion_fuente_session $retencion_fuente_session){
		$retencion_fuente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$retencion_fuente_session->strStyleDivHeader='display:none';			
		$retencion_fuente_session->strStyleDivContent='width:93%;height:100%';	
		$retencion_fuente_session->strStyleDivOpcionesBanner='display:none';	
		$retencion_fuente_session->strStyleDivExpandirColapsar='display:none';	
		$retencion_fuente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(retencion_fuente_control $retencion_fuente_control_session){
		$this->idNuevo=$retencion_fuente_control_session->idNuevo;
		$this->retencion_fuenteActual=$retencion_fuente_control_session->retencion_fuenteActual;
		$this->retencion_fuente=$retencion_fuente_control_session->retencion_fuente;
		$this->retencion_fuenteClase=$retencion_fuente_control_session->retencion_fuenteClase;
		$this->retencion_fuentes=$retencion_fuente_control_session->retencion_fuentes;
		$this->retencion_fuentesEliminados=$retencion_fuente_control_session->retencion_fuentesEliminados;
		$this->retencion_fuente=$retencion_fuente_control_session->retencion_fuente;
		$this->retencion_fuentesReporte=$retencion_fuente_control_session->retencion_fuentesReporte;
		$this->retencion_fuentesSeleccionados=$retencion_fuente_control_session->retencion_fuentesSeleccionados;
		$this->arrOrderBy=$retencion_fuente_control_session->arrOrderBy;
		$this->arrOrderByRel=$retencion_fuente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$retencion_fuente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$retencion_fuente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadretencion_fuente=$retencion_fuente_control_session->strTypeOnLoadretencion_fuente;
		$this->strTipoPaginaAuxiliarretencion_fuente=$retencion_fuente_control_session->strTipoPaginaAuxiliarretencion_fuente;
		$this->strTipoUsuarioAuxiliarretencion_fuente=$retencion_fuente_control_session->strTipoUsuarioAuxiliarretencion_fuente;	
		
		$this->bitEsPopup=$retencion_fuente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$retencion_fuente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$retencion_fuente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$retencion_fuente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$retencion_fuente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$retencion_fuente_control_session->strSufijo;
		$this->bitEsRelaciones=$retencion_fuente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$retencion_fuente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$retencion_fuente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$retencion_fuente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$retencion_fuente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$retencion_fuente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$retencion_fuente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$retencion_fuente_control_session->strTituloPathElementoActual;
		
		if($this->retencion_fuenteLogic==null) {			
			$this->retencion_fuenteLogic=new retencion_fuente_logic();
		}
		
		
		if($this->retencion_fuenteClase==null) {
			$this->retencion_fuenteClase=new retencion_fuente();	
		}
		
		$this->retencion_fuenteLogic->setretencion_fuente($this->retencion_fuenteClase);
		
		
		if($this->retencion_fuentes==null) {
			$this->retencion_fuentes=array();	
		}
		
		$this->retencion_fuenteLogic->setretencion_fuentes($this->retencion_fuentes);
		
		
		$this->strTipoView=$retencion_fuente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$retencion_fuente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$retencion_fuente_control_session->datosCliente;
		$this->strAccionBusqueda=$retencion_fuente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$retencion_fuente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$retencion_fuente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$retencion_fuente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$retencion_fuente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$retencion_fuente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$retencion_fuente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$retencion_fuente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$retencion_fuente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$retencion_fuente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$retencion_fuente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$retencion_fuente_control_session->strTipoAccion;
		$this->tiposReportes=$retencion_fuente_control_session->tiposReportes;
		$this->tiposReporte=$retencion_fuente_control_session->tiposReporte;
		$this->tiposAcciones=$retencion_fuente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$retencion_fuente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$retencion_fuente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$retencion_fuente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$retencion_fuente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$retencion_fuente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$retencion_fuente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$retencion_fuente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$retencion_fuente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$retencion_fuente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$retencion_fuente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$retencion_fuente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$retencion_fuente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$retencion_fuente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$retencion_fuente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$retencion_fuente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$retencion_fuente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$retencion_fuente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$retencion_fuente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$retencion_fuente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$retencion_fuente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$retencion_fuente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$retencion_fuente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$retencion_fuente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$retencion_fuente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$retencion_fuente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$retencion_fuente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$retencion_fuente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$retencion_fuente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$retencion_fuente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$retencion_fuente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$retencion_fuente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$retencion_fuente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$retencion_fuente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$retencion_fuente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$retencion_fuente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$retencion_fuente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$retencion_fuente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$retencion_fuente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$retencion_fuente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$retencion_fuente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$retencion_fuente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$retencion_fuente_control_session->moduloActual;	
		$this->opcionActual=$retencion_fuente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$retencion_fuente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$retencion_fuente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$retencion_fuente_session=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME));
				
		if($retencion_fuente_session==null) {
			$retencion_fuente_session=new retencion_fuente_session();
		}
		
		$this->strStyleDivArbol=$retencion_fuente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$retencion_fuente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$retencion_fuente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$retencion_fuente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$retencion_fuente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$retencion_fuente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$retencion_fuente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$retencion_fuente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$retencion_fuente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$retencion_fuente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$retencion_fuente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$retencion_fuente_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$retencion_fuente_control_session->strMensajecodigo;
		$this->strMensajedescripcion=$retencion_fuente_control_session->strMensajedescripcion;
		$this->strMensajevalor=$retencion_fuente_control_session->strMensajevalor;
		$this->strMensajevalor_base=$retencion_fuente_control_session->strMensajevalor_base;
		$this->strMensajepredeterminado=$retencion_fuente_control_session->strMensajepredeterminado;
		$this->strMensajeid_cuenta_ventas=$retencion_fuente_control_session->strMensajeid_cuenta_ventas;
		$this->strMensajeid_cuenta_compras=$retencion_fuente_control_session->strMensajeid_cuenta_compras;
		$this->strMensajecuenta_contable_ventas=$retencion_fuente_control_session->strMensajecuenta_contable_ventas;
		$this->strMensajecuenta_contable_compras=$retencion_fuente_control_session->strMensajecuenta_contable_compras;
			
		
		$this->empresasFK=$retencion_fuente_control_session->empresasFK;
		$this->idempresaDefaultFK=$retencion_fuente_control_session->idempresaDefaultFK;
		$this->cuenta_ventassFK=$retencion_fuente_control_session->cuenta_ventassFK;
		$this->idcuenta_ventasDefaultFK=$retencion_fuente_control_session->idcuenta_ventasDefaultFK;
		$this->cuenta_comprassFK=$retencion_fuente_control_session->cuenta_comprassFK;
		$this->idcuenta_comprasDefaultFK=$retencion_fuente_control_session->idcuenta_comprasDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_compras=$retencion_fuente_control_session->strVisibleFK_Idcuenta_compras;
		$this->strVisibleFK_Idcuenta_ventas=$retencion_fuente_control_session->strVisibleFK_Idcuenta_ventas;
		$this->strVisibleFK_Idempresa=$retencion_fuente_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisosproveedor=$retencion_fuente_control_session->strTienePermisosproveedor;
		$this->strTienePermisoscliente=$retencion_fuente_control_session->strTienePermisoscliente;
		
		
		$this->id_cuenta_comprasFK_Idcuenta_compras=$retencion_fuente_control_session->id_cuenta_comprasFK_Idcuenta_compras;
		$this->id_cuenta_ventasFK_Idcuenta_ventas=$retencion_fuente_control_session->id_cuenta_ventasFK_Idcuenta_ventas;
		$this->id_empresaFK_Idempresa=$retencion_fuente_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getretencion_fuenteControllerAdditional() {
		return $this->retencion_fuenteControllerAdditional;
	}

	public function setretencion_fuenteControllerAdditional($retencion_fuenteControllerAdditional) {
		$this->retencion_fuenteControllerAdditional = $retencion_fuenteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getretencion_fuenteActual() : retencion_fuente {
		return $this->retencion_fuenteActual;
	}

	public function setretencion_fuenteActual(retencion_fuente $retencion_fuenteActual) {
		$this->retencion_fuenteActual = $retencion_fuenteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidretencion_fuente() : int {
		return $this->idretencion_fuente;
	}

	public function setidretencion_fuente(int $idretencion_fuente) {
		$this->idretencion_fuente = $idretencion_fuente;
	}
	
	public function getretencion_fuente() : retencion_fuente {
		return $this->retencion_fuente;
	}

	public function setretencion_fuente(retencion_fuente $retencion_fuente) {
		$this->retencion_fuente = $retencion_fuente;
	}
		
	public function getretencion_fuenteLogic() : retencion_fuente_logic {		
		return $this->retencion_fuenteLogic;
	}

	public function setretencion_fuenteLogic(retencion_fuente_logic $retencion_fuenteLogic) {
		$this->retencion_fuenteLogic = $retencion_fuenteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getretencion_fuentesModel() {		
		try {						
			/*retencion_fuentesModel.setWrappedData(retencion_fuenteLogic->getretencion_fuentes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->retencion_fuentesModel;
	}
	
	public function setretencion_fuentesModel($retencion_fuentesModel) {
		$this->retencion_fuentesModel = $retencion_fuentesModel;
	}
	
	public function getretencion_fuentes() : array {		
		return $this->retencion_fuentes;
	}
	
	public function setretencion_fuentes(array $retencion_fuentes) {
		$this->retencion_fuentes= $retencion_fuentes;
	}
	
	public function getretencion_fuentesEliminados() : array {		
		return $this->retencion_fuentesEliminados;
	}
	
	public function setretencion_fuentesEliminados(array $retencion_fuentesEliminados) {
		$this->retencion_fuentesEliminados= $retencion_fuentesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getretencion_fuenteActualFromListDataModel() {
		try {
			/*$retencion_fuenteClase= $this->retencion_fuentesModel->getRowData();*/
			
			/*return $retencion_fuente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
