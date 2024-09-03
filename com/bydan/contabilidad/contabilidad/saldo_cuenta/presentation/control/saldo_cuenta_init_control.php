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

namespace com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\control;

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

use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\entity\saldo_cuenta;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/saldo_cuenta/util/saldo_cuenta_carga.php');
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_util;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_param_return;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\logic\saldo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\session\saldo_cuenta_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
saldo_cuenta_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
saldo_cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
saldo_cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
saldo_cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*saldo_cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class saldo_cuenta_init_control extends ControllerBase {	
	
	public $saldo_cuentaClase=null;	
	public $saldo_cuentasModel=null;	
	public $saldo_cuentasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idsaldo_cuenta=0;	
	public ?int $idsaldo_cuentaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $saldo_cuentaLogic=null;
	
	public $saldo_cuentaActual=null;	
	
	public $saldo_cuenta=null;
	public $saldo_cuentas=null;
	public $saldo_cuentasEliminados=array();
	public $saldo_cuentasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $saldo_cuentasLocal=array();
	public ?array $saldo_cuentasReporte=null;
	public ?array $saldo_cuentasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadsaldo_cuenta='onload';
	public string $strTipoPaginaAuxiliarsaldo_cuenta='none';
	public string $strTipoUsuarioAuxiliarsaldo_cuenta='none';
		
	public $saldo_cuentaReturnGeneral=null;
	public $saldo_cuentaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $saldo_cuentaModel=null;
	public $saldo_cuentaControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_tipo_cuenta='';
	public string $strMensajeid_cuenta='';
	public string $strMensajesuma_debe='';
	public string $strMensajesuma_haber='';
	public string $strMensajedeudor='';
	public string $strMensajeacreedor='';
	public string $strMensajesaldo='';
	public string $strMensajefecha_proceso='';
	public string $strMensajefecha_fin_mes='';
	public string $strMensajetipo_cuenta_codigo='';
	public string $strMensajecuenta_contable='';
	
	
	public string $strVisibleFK_Idcuenta='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idtipo_cuenta='display:table-row';

	
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

	public array $tipo_cuentasFK=array();

	public function gettipo_cuentasFK():array {
		return $this->tipo_cuentasFK;
	}

	public function settipo_cuentasFK(array $tipo_cuentasFK) {
		$this->tipo_cuentasFK = $tipo_cuentasFK;
	}

	public int $idtipo_cuentaDefaultFK=-1;

	public function getIdtipo_cuentaDefaultFK():int {
		return $this->idtipo_cuentaDefaultFK;
	}

	public function setIdtipo_cuentaDefaultFK(int $idtipo_cuentaDefaultFK) {
		$this->idtipo_cuentaDefaultFK = $idtipo_cuentaDefaultFK;
	}

	public array $cuentasFK=array();

	public function getcuentasFK():array {
		return $this->cuentasFK;
	}

	public function setcuentasFK(array $cuentasFK) {
		$this->cuentasFK = $cuentasFK;
	}

	public int $idcuentaDefaultFK=-1;

	public function getIdcuentaDefaultFK():int {
		return $this->idcuentaDefaultFK;
	}

	public function setIdcuentaDefaultFK(int $idcuentaDefaultFK) {
		$this->idcuentaDefaultFK = $idcuentaDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_cuentaFK_Idcuenta=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_tipo_cuentaFK_Idtipo_cuenta=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->saldo_cuentaLogic==null) {
				$this->saldo_cuentaLogic=new saldo_cuenta_logic();
			}
			
		} else {
			if($this->saldo_cuentaLogic==null) {
				$this->saldo_cuentaLogic=new saldo_cuenta_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->saldo_cuentaClase==null) {
				$this->saldo_cuentaClase=new saldo_cuenta();
			}
			
			$this->saldo_cuentaClase->setId(0);	
				
				
			$this->saldo_cuentaClase->setid_empresa(-1);	
			$this->saldo_cuentaClase->setid_ejercicio(-1);	
			$this->saldo_cuentaClase->setid_periodo(-1);	
			$this->saldo_cuentaClase->setid_tipo_cuenta(-1);	
			$this->saldo_cuentaClase->setid_cuenta(-1);	
			$this->saldo_cuentaClase->setsuma_debe(0.0);	
			$this->saldo_cuentaClase->setsuma_haber(0.0);	
			$this->saldo_cuentaClase->setdeudor(0.0);	
			$this->saldo_cuentaClase->setacreedor(0.0);	
			$this->saldo_cuentaClase->setsaldo(0.0);	
			$this->saldo_cuentaClase->setfecha_proceso(date('Y-m-d'));	
			$this->saldo_cuentaClase->setfecha_fin_mes(date('Y-m-d'));	
			$this->saldo_cuentaClase->settipo_cuenta_codigo('');	
			$this->saldo_cuentaClase->setcuenta_contable('');	
			
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
		$this->prepararEjecutarMantenimientoBase('saldo_cuenta');
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
		$this->cargarParametrosReporteBase('saldo_cuenta');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('saldo_cuenta');
	}
	
	public function actualizarControllerConReturnGeneral(saldo_cuenta_param_return $saldo_cuentaReturnGeneral) {
		if($saldo_cuentaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajessaldo_cuentasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$saldo_cuentaReturnGeneral->getsMensajeProceso();
		}
		
		if($saldo_cuentaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$saldo_cuentaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($saldo_cuentaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$saldo_cuentaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$saldo_cuentaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($saldo_cuentaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($saldo_cuentaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$saldo_cuentaReturnGeneral->getsFuncionJs();
		}
		
		if($saldo_cuentaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(saldo_cuenta_session $saldo_cuenta_session){
		$this->strStyleDivArbol=$saldo_cuenta_session->strStyleDivArbol;	
		$this->strStyleDivContent=$saldo_cuenta_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$saldo_cuenta_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$saldo_cuenta_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$saldo_cuenta_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$saldo_cuenta_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$saldo_cuenta_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(saldo_cuenta_session $saldo_cuenta_session){
		$saldo_cuenta_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$saldo_cuenta_session->strStyleDivHeader='display:none';			
		$saldo_cuenta_session->strStyleDivContent='width:93%;height:100%';	
		$saldo_cuenta_session->strStyleDivOpcionesBanner='display:none';	
		$saldo_cuenta_session->strStyleDivExpandirColapsar='display:none';	
		$saldo_cuenta_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(saldo_cuenta_control $saldo_cuenta_control_session){
		$this->idNuevo=$saldo_cuenta_control_session->idNuevo;
		$this->saldo_cuentaActual=$saldo_cuenta_control_session->saldo_cuentaActual;
		$this->saldo_cuenta=$saldo_cuenta_control_session->saldo_cuenta;
		$this->saldo_cuentaClase=$saldo_cuenta_control_session->saldo_cuentaClase;
		$this->saldo_cuentas=$saldo_cuenta_control_session->saldo_cuentas;
		$this->saldo_cuentasEliminados=$saldo_cuenta_control_session->saldo_cuentasEliminados;
		$this->saldo_cuenta=$saldo_cuenta_control_session->saldo_cuenta;
		$this->saldo_cuentasReporte=$saldo_cuenta_control_session->saldo_cuentasReporte;
		$this->saldo_cuentasSeleccionados=$saldo_cuenta_control_session->saldo_cuentasSeleccionados;
		$this->arrOrderBy=$saldo_cuenta_control_session->arrOrderBy;
		$this->arrOrderByRel=$saldo_cuenta_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$saldo_cuenta_control_session->arrHistoryWebs;
		$this->arrSessionBases=$saldo_cuenta_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadsaldo_cuenta=$saldo_cuenta_control_session->strTypeOnLoadsaldo_cuenta;
		$this->strTipoPaginaAuxiliarsaldo_cuenta=$saldo_cuenta_control_session->strTipoPaginaAuxiliarsaldo_cuenta;
		$this->strTipoUsuarioAuxiliarsaldo_cuenta=$saldo_cuenta_control_session->strTipoUsuarioAuxiliarsaldo_cuenta;	
		
		$this->bitEsPopup=$saldo_cuenta_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$saldo_cuenta_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$saldo_cuenta_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$saldo_cuenta_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$saldo_cuenta_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$saldo_cuenta_control_session->strSufijo;
		$this->bitEsRelaciones=$saldo_cuenta_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$saldo_cuenta_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$saldo_cuenta_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$saldo_cuenta_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$saldo_cuenta_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$saldo_cuenta_control_session->strTituloTabla;
		$this->strTituloPathPagina=$saldo_cuenta_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$saldo_cuenta_control_session->strTituloPathElementoActual;
		
		if($this->saldo_cuentaLogic==null) {			
			$this->saldo_cuentaLogic=new saldo_cuenta_logic();
		}
		
		
		if($this->saldo_cuentaClase==null) {
			$this->saldo_cuentaClase=new saldo_cuenta();	
		}
		
		$this->saldo_cuentaLogic->setsaldo_cuenta($this->saldo_cuentaClase);
		
		
		if($this->saldo_cuentas==null) {
			$this->saldo_cuentas=array();	
		}
		
		$this->saldo_cuentaLogic->setsaldo_cuentas($this->saldo_cuentas);
		
		
		$this->strTipoView=$saldo_cuenta_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$saldo_cuenta_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$saldo_cuenta_control_session->datosCliente;
		$this->strAccionBusqueda=$saldo_cuenta_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$saldo_cuenta_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$saldo_cuenta_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$saldo_cuenta_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$saldo_cuenta_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$saldo_cuenta_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$saldo_cuenta_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$saldo_cuenta_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$saldo_cuenta_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$saldo_cuenta_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$saldo_cuenta_control_session->strTipoPaginacion;
		$this->strTipoAccion=$saldo_cuenta_control_session->strTipoAccion;
		$this->tiposReportes=$saldo_cuenta_control_session->tiposReportes;
		$this->tiposReporte=$saldo_cuenta_control_session->tiposReporte;
		$this->tiposAcciones=$saldo_cuenta_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$saldo_cuenta_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$saldo_cuenta_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$saldo_cuenta_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$saldo_cuenta_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$saldo_cuenta_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$saldo_cuenta_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$saldo_cuenta_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$saldo_cuenta_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$saldo_cuenta_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$saldo_cuenta_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$saldo_cuenta_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$saldo_cuenta_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$saldo_cuenta_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$saldo_cuenta_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$saldo_cuenta_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$saldo_cuenta_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$saldo_cuenta_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$saldo_cuenta_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$saldo_cuenta_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$saldo_cuenta_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$saldo_cuenta_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$saldo_cuenta_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$saldo_cuenta_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$saldo_cuenta_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$saldo_cuenta_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$saldo_cuenta_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$saldo_cuenta_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$saldo_cuenta_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$saldo_cuenta_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$saldo_cuenta_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$saldo_cuenta_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$saldo_cuenta_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$saldo_cuenta_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$saldo_cuenta_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$saldo_cuenta_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$saldo_cuenta_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$saldo_cuenta_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$saldo_cuenta_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$saldo_cuenta_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$saldo_cuenta_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$saldo_cuenta_control_session->resumenUsuarioActual;	
		$this->moduloActual=$saldo_cuenta_control_session->moduloActual;	
		$this->opcionActual=$saldo_cuenta_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$saldo_cuenta_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$saldo_cuenta_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
				
		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		$this->strStyleDivArbol=$saldo_cuenta_session->strStyleDivArbol;	
		$this->strStyleDivContent=$saldo_cuenta_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$saldo_cuenta_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$saldo_cuenta_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$saldo_cuenta_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$saldo_cuenta_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$saldo_cuenta_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$saldo_cuenta_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$saldo_cuenta_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$saldo_cuenta_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$saldo_cuenta_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$saldo_cuenta_control_session->strMensajeid_empresa;
		$this->strMensajeid_ejercicio=$saldo_cuenta_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$saldo_cuenta_control_session->strMensajeid_periodo;
		$this->strMensajeid_tipo_cuenta=$saldo_cuenta_control_session->strMensajeid_tipo_cuenta;
		$this->strMensajeid_cuenta=$saldo_cuenta_control_session->strMensajeid_cuenta;
		$this->strMensajesuma_debe=$saldo_cuenta_control_session->strMensajesuma_debe;
		$this->strMensajesuma_haber=$saldo_cuenta_control_session->strMensajesuma_haber;
		$this->strMensajedeudor=$saldo_cuenta_control_session->strMensajedeudor;
		$this->strMensajeacreedor=$saldo_cuenta_control_session->strMensajeacreedor;
		$this->strMensajesaldo=$saldo_cuenta_control_session->strMensajesaldo;
		$this->strMensajefecha_proceso=$saldo_cuenta_control_session->strMensajefecha_proceso;
		$this->strMensajefecha_fin_mes=$saldo_cuenta_control_session->strMensajefecha_fin_mes;
		$this->strMensajetipo_cuenta_codigo=$saldo_cuenta_control_session->strMensajetipo_cuenta_codigo;
		$this->strMensajecuenta_contable=$saldo_cuenta_control_session->strMensajecuenta_contable;
			
		
		$this->empresasFK=$saldo_cuenta_control_session->empresasFK;
		$this->idempresaDefaultFK=$saldo_cuenta_control_session->idempresaDefaultFK;
		$this->ejerciciosFK=$saldo_cuenta_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$saldo_cuenta_control_session->idejercicioDefaultFK;
		$this->periodosFK=$saldo_cuenta_control_session->periodosFK;
		$this->idperiodoDefaultFK=$saldo_cuenta_control_session->idperiodoDefaultFK;
		$this->tipo_cuentasFK=$saldo_cuenta_control_session->tipo_cuentasFK;
		$this->idtipo_cuentaDefaultFK=$saldo_cuenta_control_session->idtipo_cuentaDefaultFK;
		$this->cuentasFK=$saldo_cuenta_control_session->cuentasFK;
		$this->idcuentaDefaultFK=$saldo_cuenta_control_session->idcuentaDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta=$saldo_cuenta_control_session->strVisibleFK_Idcuenta;
		$this->strVisibleFK_Idejercicio=$saldo_cuenta_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$saldo_cuenta_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idperiodo=$saldo_cuenta_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idtipo_cuenta=$saldo_cuenta_control_session->strVisibleFK_Idtipo_cuenta;
		
		
		
		
		$this->id_cuentaFK_Idcuenta=$saldo_cuenta_control_session->id_cuentaFK_Idcuenta;
		$this->id_ejercicioFK_Idejercicio=$saldo_cuenta_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$saldo_cuenta_control_session->id_empresaFK_Idempresa;
		$this->id_periodoFK_Idperiodo=$saldo_cuenta_control_session->id_periodoFK_Idperiodo;
		$this->id_tipo_cuentaFK_Idtipo_cuenta=$saldo_cuenta_control_session->id_tipo_cuentaFK_Idtipo_cuenta;

		
		
		
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
	
	public function getsaldo_cuentaControllerAdditional() {
		return $this->saldo_cuentaControllerAdditional;
	}

	public function setsaldo_cuentaControllerAdditional($saldo_cuentaControllerAdditional) {
		$this->saldo_cuentaControllerAdditional = $saldo_cuentaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getsaldo_cuentaActual() : saldo_cuenta {
		return $this->saldo_cuentaActual;
	}

	public function setsaldo_cuentaActual(saldo_cuenta $saldo_cuentaActual) {
		$this->saldo_cuentaActual = $saldo_cuentaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidsaldo_cuenta() : int {
		return $this->idsaldo_cuenta;
	}

	public function setidsaldo_cuenta(int $idsaldo_cuenta) {
		$this->idsaldo_cuenta = $idsaldo_cuenta;
	}
	
	public function getsaldo_cuenta() : saldo_cuenta {
		return $this->saldo_cuenta;
	}

	public function setsaldo_cuenta(saldo_cuenta $saldo_cuenta) {
		$this->saldo_cuenta = $saldo_cuenta;
	}
		
	public function getsaldo_cuentaLogic() : saldo_cuenta_logic {		
		return $this->saldo_cuentaLogic;
	}

	public function setsaldo_cuentaLogic(saldo_cuenta_logic $saldo_cuentaLogic) {
		$this->saldo_cuentaLogic = $saldo_cuentaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getsaldo_cuentasModel() {		
		try {						
			/*saldo_cuentasModel.setWrappedData(saldo_cuentaLogic->getsaldo_cuentas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->saldo_cuentasModel;
	}
	
	public function setsaldo_cuentasModel($saldo_cuentasModel) {
		$this->saldo_cuentasModel = $saldo_cuentasModel;
	}
	
	public function getsaldo_cuentas() : array {		
		return $this->saldo_cuentas;
	}
	
	public function setsaldo_cuentas(array $saldo_cuentas) {
		$this->saldo_cuentas= $saldo_cuentas;
	}
	
	public function getsaldo_cuentasEliminados() : array {		
		return $this->saldo_cuentasEliminados;
	}
	
	public function setsaldo_cuentasEliminados(array $saldo_cuentasEliminados) {
		$this->saldo_cuentasEliminados= $saldo_cuentasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getsaldo_cuentaActualFromListDataModel() {
		try {
			/*$saldo_cuentaClase= $this->saldo_cuentasModel->getRowData();*/
			
			/*return $saldo_cuenta;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
