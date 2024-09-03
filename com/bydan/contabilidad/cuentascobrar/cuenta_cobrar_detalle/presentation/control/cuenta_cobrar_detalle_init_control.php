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

namespace com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\business\entity\cuenta_cobrar_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cuenta_cobrar_detalle/util/cuenta_cobrar_detalle_carga.php');
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\util\cuenta_cobrar_detalle_carga;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\util\cuenta_cobrar_detalle_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\util\cuenta_cobrar_detalle_param_return;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\business\logic\cuenta_cobrar_detalle_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\presentation\session\cuenta_cobrar_detalle_session;


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

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_cobrar_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_cobrar_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_cobrar_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_cobrar_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_cobrar_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_cobrar_detalle_init_control extends ControllerBase {	
	
	public $cuenta_cobrar_detalleClase=null;	
	public $cuenta_cobrar_detallesModel=null;	
	public $cuenta_cobrar_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcuenta_cobrar_detalle=0;	
	public ?int $idcuenta_cobrar_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cuenta_cobrar_detalleLogic=null;
	
	public $cuenta_cobrar_detalleActual=null;	
	
	public $cuenta_cobrar_detalle=null;
	public $cuenta_cobrar_detalles=null;
	public $cuenta_cobrar_detallesEliminados=array();
	public $cuenta_cobrar_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cuenta_cobrar_detallesLocal=array();
	public ?array $cuenta_cobrar_detallesReporte=null;
	public ?array $cuenta_cobrar_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcuenta_cobrar_detalle='onload';
	public string $strTipoPaginaAuxiliarcuenta_cobrar_detalle='none';
	public string $strTipoUsuarioAuxiliarcuenta_cobrar_detalle='none';
		
	public $cuenta_cobrar_detalleReturnGeneral=null;
	public $cuenta_cobrar_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cuenta_cobrar_detalleModel=null;
	public $cuenta_cobrar_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_cuenta_cobrar='';
	public string $strMensajenumero='';
	public string $strMensajefecha_emision='';
	public string $strMensajefecha_vence='';
	public string $strMensajereferencia='';
	public string $strMensajemonto='';
	public string $strMensajedebito='';
	public string $strMensajecredito='';
	public string $strMensajedescripcion='';
	public string $strMensajeid_estado='';
	
	
	public string $strVisibleFK_Idcuenta_cobrar='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
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

	public array $cuenta_cobrarsFK=array();

	public function getcuenta_cobrarsFK():array {
		return $this->cuenta_cobrarsFK;
	}

	public function setcuenta_cobrarsFK(array $cuenta_cobrarsFK) {
		$this->cuenta_cobrarsFK = $cuenta_cobrarsFK;
	}

	public int $idcuenta_cobrarDefaultFK=-1;

	public function getIdcuenta_cobrarDefaultFK():int {
		return $this->idcuenta_cobrarDefaultFK;
	}

	public function setIdcuenta_cobrarDefaultFK(int $idcuenta_cobrarDefaultFK) {
		$this->idcuenta_cobrarDefaultFK = $idcuenta_cobrarDefaultFK;
	}

	public array $estadosFK=array();

	public function getestadosFK():array {
		return $this->estadosFK;
	}

	public function setestadosFK(array $estadosFK) {
		$this->estadosFK = $estadosFK;
	}

	public int $idestadoDefaultFK=-1;

	public function getIdestadoDefaultFK():int {
		return $this->idestadoDefaultFK;
	}

	public function setIdestadoDefaultFK(int $idestadoDefaultFK) {
		$this->idestadoDefaultFK = $idestadoDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_cuenta_cobrarFK_Idcuenta_cobrar=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estadoFK_Idestado=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cuenta_cobrar_detalleLogic==null) {
				$this->cuenta_cobrar_detalleLogic=new cuenta_cobrar_detalle_logic();
			}
			
		} else {
			if($this->cuenta_cobrar_detalleLogic==null) {
				$this->cuenta_cobrar_detalleLogic=new cuenta_cobrar_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cuenta_cobrar_detalleClase==null) {
				$this->cuenta_cobrar_detalleClase=new cuenta_cobrar_detalle();
			}
			
			$this->cuenta_cobrar_detalleClase->setId(0);	
				
				
			$this->cuenta_cobrar_detalleClase->setid_empresa(-1);	
			$this->cuenta_cobrar_detalleClase->setid_sucursal(-1);	
			$this->cuenta_cobrar_detalleClase->setid_ejercicio(-1);	
			$this->cuenta_cobrar_detalleClase->setid_periodo(-1);	
			$this->cuenta_cobrar_detalleClase->setid_usuario(-1);	
			$this->cuenta_cobrar_detalleClase->setid_cuenta_cobrar(-1);	
			$this->cuenta_cobrar_detalleClase->setnumero('');	
			$this->cuenta_cobrar_detalleClase->setfecha_emision(date('Y-m-d'));	
			$this->cuenta_cobrar_detalleClase->setfecha_vence(date('Y-m-d'));	
			$this->cuenta_cobrar_detalleClase->setreferencia('');	
			$this->cuenta_cobrar_detalleClase->setmonto(0.0);	
			$this->cuenta_cobrar_detalleClase->setdebito(0.0);	
			$this->cuenta_cobrar_detalleClase->setcredito(0.0);	
			$this->cuenta_cobrar_detalleClase->setdescripcion('');	
			$this->cuenta_cobrar_detalleClase->setid_estado(-1);	
			
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
		$this->prepararEjecutarMantenimientoBase('cuenta_cobrar_detalle');
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
		$this->cargarParametrosReporteBase('cuenta_cobrar_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cuenta_cobrar_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(cuenta_cobrar_detalle_param_return $cuenta_cobrar_detalleReturnGeneral) {
		if($cuenta_cobrar_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescuenta_cobrar_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cuenta_cobrar_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($cuenta_cobrar_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cuenta_cobrar_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cuenta_cobrar_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cuenta_cobrar_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cuenta_cobrar_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cuenta_cobrar_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cuenta_cobrar_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cuenta_cobrar_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($cuenta_cobrar_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cuenta_cobrar_detalle_session $cuenta_cobrar_detalle_session){
		$this->strStyleDivArbol=$cuenta_cobrar_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_cobrar_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_cobrar_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_cobrar_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_cobrar_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_cobrar_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cuenta_cobrar_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cuenta_cobrar_detalle_session $cuenta_cobrar_detalle_session){
		$cuenta_cobrar_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cuenta_cobrar_detalle_session->strStyleDivHeader='display:none';			
		$cuenta_cobrar_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$cuenta_cobrar_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$cuenta_cobrar_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$cuenta_cobrar_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cuenta_cobrar_detalle_control $cuenta_cobrar_detalle_control_session){
		$this->idNuevo=$cuenta_cobrar_detalle_control_session->idNuevo;
		$this->cuenta_cobrar_detalleActual=$cuenta_cobrar_detalle_control_session->cuenta_cobrar_detalleActual;
		$this->cuenta_cobrar_detalle=$cuenta_cobrar_detalle_control_session->cuenta_cobrar_detalle;
		$this->cuenta_cobrar_detalleClase=$cuenta_cobrar_detalle_control_session->cuenta_cobrar_detalleClase;
		$this->cuenta_cobrar_detalles=$cuenta_cobrar_detalle_control_session->cuenta_cobrar_detalles;
		$this->cuenta_cobrar_detallesEliminados=$cuenta_cobrar_detalle_control_session->cuenta_cobrar_detallesEliminados;
		$this->cuenta_cobrar_detalle=$cuenta_cobrar_detalle_control_session->cuenta_cobrar_detalle;
		$this->cuenta_cobrar_detallesReporte=$cuenta_cobrar_detalle_control_session->cuenta_cobrar_detallesReporte;
		$this->cuenta_cobrar_detallesSeleccionados=$cuenta_cobrar_detalle_control_session->cuenta_cobrar_detallesSeleccionados;
		$this->arrOrderBy=$cuenta_cobrar_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$cuenta_cobrar_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cuenta_cobrar_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cuenta_cobrar_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcuenta_cobrar_detalle=$cuenta_cobrar_detalle_control_session->strTypeOnLoadcuenta_cobrar_detalle;
		$this->strTipoPaginaAuxiliarcuenta_cobrar_detalle=$cuenta_cobrar_detalle_control_session->strTipoPaginaAuxiliarcuenta_cobrar_detalle;
		$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle=$cuenta_cobrar_detalle_control_session->strTipoUsuarioAuxiliarcuenta_cobrar_detalle;	
		
		$this->bitEsPopup=$cuenta_cobrar_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cuenta_cobrar_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cuenta_cobrar_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cuenta_cobrar_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cuenta_cobrar_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cuenta_cobrar_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$cuenta_cobrar_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cuenta_cobrar_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cuenta_cobrar_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cuenta_cobrar_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cuenta_cobrar_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cuenta_cobrar_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cuenta_cobrar_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cuenta_cobrar_detalle_control_session->strTituloPathElementoActual;
		
		if($this->cuenta_cobrar_detalleLogic==null) {			
			$this->cuenta_cobrar_detalleLogic=new cuenta_cobrar_detalle_logic();
		}
		
		
		if($this->cuenta_cobrar_detalleClase==null) {
			$this->cuenta_cobrar_detalleClase=new cuenta_cobrar_detalle();	
		}
		
		$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalle($this->cuenta_cobrar_detalleClase);
		
		
		if($this->cuenta_cobrar_detalles==null) {
			$this->cuenta_cobrar_detalles=array();	
		}
		
		$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($this->cuenta_cobrar_detalles);
		
		
		$this->strTipoView=$cuenta_cobrar_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cuenta_cobrar_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cuenta_cobrar_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$cuenta_cobrar_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cuenta_cobrar_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cuenta_cobrar_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cuenta_cobrar_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cuenta_cobrar_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cuenta_cobrar_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cuenta_cobrar_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cuenta_cobrar_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cuenta_cobrar_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cuenta_cobrar_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cuenta_cobrar_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cuenta_cobrar_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$cuenta_cobrar_detalle_control_session->tiposReportes;
		$this->tiposReporte=$cuenta_cobrar_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$cuenta_cobrar_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cuenta_cobrar_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cuenta_cobrar_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cuenta_cobrar_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cuenta_cobrar_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cuenta_cobrar_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cuenta_cobrar_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cuenta_cobrar_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cuenta_cobrar_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cuenta_cobrar_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cuenta_cobrar_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cuenta_cobrar_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cuenta_cobrar_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cuenta_cobrar_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cuenta_cobrar_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cuenta_cobrar_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cuenta_cobrar_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cuenta_cobrar_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cuenta_cobrar_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cuenta_cobrar_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cuenta_cobrar_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cuenta_cobrar_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cuenta_cobrar_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cuenta_cobrar_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cuenta_cobrar_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cuenta_cobrar_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cuenta_cobrar_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cuenta_cobrar_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cuenta_cobrar_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cuenta_cobrar_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cuenta_cobrar_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cuenta_cobrar_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cuenta_cobrar_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cuenta_cobrar_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cuenta_cobrar_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cuenta_cobrar_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cuenta_cobrar_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cuenta_cobrar_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cuenta_cobrar_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cuenta_cobrar_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cuenta_cobrar_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cuenta_cobrar_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cuenta_cobrar_detalle_control_session->moduloActual;	
		$this->opcionActual=$cuenta_cobrar_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cuenta_cobrar_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cuenta_cobrar_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));
				
		if($cuenta_cobrar_detalle_session==null) {
			$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
		}
		
		$this->strStyleDivArbol=$cuenta_cobrar_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_cobrar_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_cobrar_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_cobrar_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_cobrar_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_cobrar_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cuenta_cobrar_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cuenta_cobrar_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cuenta_cobrar_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cuenta_cobrar_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cuenta_cobrar_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cuenta_cobrar_detalle_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$cuenta_cobrar_detalle_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$cuenta_cobrar_detalle_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$cuenta_cobrar_detalle_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$cuenta_cobrar_detalle_control_session->strMensajeid_usuario;
		$this->strMensajeid_cuenta_cobrar=$cuenta_cobrar_detalle_control_session->strMensajeid_cuenta_cobrar;
		$this->strMensajenumero=$cuenta_cobrar_detalle_control_session->strMensajenumero;
		$this->strMensajefecha_emision=$cuenta_cobrar_detalle_control_session->strMensajefecha_emision;
		$this->strMensajefecha_vence=$cuenta_cobrar_detalle_control_session->strMensajefecha_vence;
		$this->strMensajereferencia=$cuenta_cobrar_detalle_control_session->strMensajereferencia;
		$this->strMensajemonto=$cuenta_cobrar_detalle_control_session->strMensajemonto;
		$this->strMensajedebito=$cuenta_cobrar_detalle_control_session->strMensajedebito;
		$this->strMensajecredito=$cuenta_cobrar_detalle_control_session->strMensajecredito;
		$this->strMensajedescripcion=$cuenta_cobrar_detalle_control_session->strMensajedescripcion;
		$this->strMensajeid_estado=$cuenta_cobrar_detalle_control_session->strMensajeid_estado;
			
		
		$this->empresasFK=$cuenta_cobrar_detalle_control_session->empresasFK;
		$this->idempresaDefaultFK=$cuenta_cobrar_detalle_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$cuenta_cobrar_detalle_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$cuenta_cobrar_detalle_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$cuenta_cobrar_detalle_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$cuenta_cobrar_detalle_control_session->idejercicioDefaultFK;
		$this->periodosFK=$cuenta_cobrar_detalle_control_session->periodosFK;
		$this->idperiodoDefaultFK=$cuenta_cobrar_detalle_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$cuenta_cobrar_detalle_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$cuenta_cobrar_detalle_control_session->idusuarioDefaultFK;
		$this->cuenta_cobrarsFK=$cuenta_cobrar_detalle_control_session->cuenta_cobrarsFK;
		$this->idcuenta_cobrarDefaultFK=$cuenta_cobrar_detalle_control_session->idcuenta_cobrarDefaultFK;
		$this->estadosFK=$cuenta_cobrar_detalle_control_session->estadosFK;
		$this->idestadoDefaultFK=$cuenta_cobrar_detalle_control_session->idestadoDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_cobrar=$cuenta_cobrar_detalle_control_session->strVisibleFK_Idcuenta_cobrar;
		$this->strVisibleFK_Idejercicio=$cuenta_cobrar_detalle_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$cuenta_cobrar_detalle_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$cuenta_cobrar_detalle_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idperiodo=$cuenta_cobrar_detalle_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$cuenta_cobrar_detalle_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idusuario=$cuenta_cobrar_detalle_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_cuenta_cobrarFK_Idcuenta_cobrar=$cuenta_cobrar_detalle_control_session->id_cuenta_cobrarFK_Idcuenta_cobrar;
		$this->id_ejercicioFK_Idejercicio=$cuenta_cobrar_detalle_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$cuenta_cobrar_detalle_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$cuenta_cobrar_detalle_control_session->id_estadoFK_Idestado;
		$this->id_periodoFK_Idperiodo=$cuenta_cobrar_detalle_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$cuenta_cobrar_detalle_control_session->id_sucursalFK_Idsucursal;
		$this->id_usuarioFK_Idusuario=$cuenta_cobrar_detalle_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getcuenta_cobrar_detalleControllerAdditional() {
		return $this->cuenta_cobrar_detalleControllerAdditional;
	}

	public function setcuenta_cobrar_detalleControllerAdditional($cuenta_cobrar_detalleControllerAdditional) {
		$this->cuenta_cobrar_detalleControllerAdditional = $cuenta_cobrar_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcuenta_cobrar_detalleActual() : cuenta_cobrar_detalle {
		return $this->cuenta_cobrar_detalleActual;
	}

	public function setcuenta_cobrar_detalleActual(cuenta_cobrar_detalle $cuenta_cobrar_detalleActual) {
		$this->cuenta_cobrar_detalleActual = $cuenta_cobrar_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcuenta_cobrar_detalle() : int {
		return $this->idcuenta_cobrar_detalle;
	}

	public function setidcuenta_cobrar_detalle(int $idcuenta_cobrar_detalle) {
		$this->idcuenta_cobrar_detalle = $idcuenta_cobrar_detalle;
	}
	
	public function getcuenta_cobrar_detalle() : cuenta_cobrar_detalle {
		return $this->cuenta_cobrar_detalle;
	}

	public function setcuenta_cobrar_detalle(cuenta_cobrar_detalle $cuenta_cobrar_detalle) {
		$this->cuenta_cobrar_detalle = $cuenta_cobrar_detalle;
	}
		
	public function getcuenta_cobrar_detalleLogic() : cuenta_cobrar_detalle_logic {		
		return $this->cuenta_cobrar_detalleLogic;
	}

	public function setcuenta_cobrar_detalleLogic(cuenta_cobrar_detalle_logic $cuenta_cobrar_detalleLogic) {
		$this->cuenta_cobrar_detalleLogic = $cuenta_cobrar_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcuenta_cobrar_detallesModel() {		
		try {						
			/*cuenta_cobrar_detallesModel.setWrappedData(cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cuenta_cobrar_detallesModel;
	}
	
	public function setcuenta_cobrar_detallesModel($cuenta_cobrar_detallesModel) {
		$this->cuenta_cobrar_detallesModel = $cuenta_cobrar_detallesModel;
	}
	
	public function getcuenta_cobrar_detalles() : array {		
		return $this->cuenta_cobrar_detalles;
	}
	
	public function setcuenta_cobrar_detalles(array $cuenta_cobrar_detalles) {
		$this->cuenta_cobrar_detalles= $cuenta_cobrar_detalles;
	}
	
	public function getcuenta_cobrar_detallesEliminados() : array {		
		return $this->cuenta_cobrar_detallesEliminados;
	}
	
	public function setcuenta_cobrar_detallesEliminados(array $cuenta_cobrar_detallesEliminados) {
		$this->cuenta_cobrar_detallesEliminados= $cuenta_cobrar_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcuenta_cobrar_detalleActualFromListDataModel() {
		try {
			/*$cuenta_cobrar_detalleClase= $this->cuenta_cobrar_detallesModel->getRowData();*/
			
			/*return $cuenta_cobrar_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
