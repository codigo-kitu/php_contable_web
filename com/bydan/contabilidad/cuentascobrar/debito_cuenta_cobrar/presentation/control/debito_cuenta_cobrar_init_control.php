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

namespace com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\entity\debito_cuenta_cobrar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/debito_cuenta_cobrar/util/debito_cuenta_cobrar_carga.php');
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_carga;

use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_param_return;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\logic\debito_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\business\logic\debito_cuenta_cobrar_logic_add;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\presentation\session\debito_cuenta_cobrar_session;


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

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
debito_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
debito_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
debito_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*debito_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class debito_cuenta_cobrar_init_control extends ControllerBase {	
	
	public $debito_cuenta_cobrarClase=null;	
	public $debito_cuenta_cobrarsModel=null;	
	public $debito_cuenta_cobrarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $iddebito_cuenta_cobrar=0;	
	public ?int $iddebito_cuenta_cobrarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $debito_cuenta_cobrarLogic=null;
	
	public $debito_cuenta_cobrarActual=null;	
	
	public $debito_cuenta_cobrar=null;
	public $debito_cuenta_cobrars=null;
	public $debito_cuenta_cobrarsEliminados=array();
	public $debito_cuenta_cobrarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $debito_cuenta_cobrarsLocal=array();
	public ?array $debito_cuenta_cobrarsReporte=null;
	public ?array $debito_cuenta_cobrarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoaddebito_cuenta_cobrar='onload';
	public string $strTipoPaginaAuxiliardebito_cuenta_cobrar='none';
	public string $strTipoUsuarioAuxiliardebito_cuenta_cobrar='none';
		
	public $debito_cuenta_cobrarReturnGeneral=null;
	public $debito_cuenta_cobrarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $debito_cuenta_cobrarModel=null;
	public $debito_cuenta_cobrarControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_cuenta_cobrar='';
	public string $strMensajenumero='';
	public string $strMensajefecha_emision='';
	public string $strMensajefecha_vence='';
	public string $strMensajeid_termino_pago_cliente='';
	public string $strMensajemonto='';
	public string $strMensajesaldo='';
	public string $strMensajedescripcion='';
	public string $strMensajesub_total='';
	public string $strMensajeiva='';
	public string $strMensajees_balance_inicial='';
	public string $strMensajeid_estado='';
	public string $strMensajereferencia='';
	public string $strMensajedebito='';
	public string $strMensajecredito='';
	
	
	public string $strVisibleFK_Idcuenta_cobrar='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
	public string $strVisibleFK_Idtermino_pago_cliente='display:table-row';
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

	public  $id_termino_pago_clienteFK_Idtermino_pago_cliente=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->debito_cuenta_cobrarLogic==null) {
				$this->debito_cuenta_cobrarLogic=new debito_cuenta_cobrar_logic();
			}
			
		} else {
			if($this->debito_cuenta_cobrarLogic==null) {
				$this->debito_cuenta_cobrarLogic=new debito_cuenta_cobrar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->debito_cuenta_cobrarClase==null) {
				$this->debito_cuenta_cobrarClase=new debito_cuenta_cobrar();
			}
			
			$this->debito_cuenta_cobrarClase->setId(0);	
				
				
			$this->debito_cuenta_cobrarClase->setid_empresa(-1);	
			$this->debito_cuenta_cobrarClase->setid_sucursal(-1);	
			$this->debito_cuenta_cobrarClase->setid_ejercicio(-1);	
			$this->debito_cuenta_cobrarClase->setid_periodo(-1);	
			$this->debito_cuenta_cobrarClase->setid_usuario(-1);	
			$this->debito_cuenta_cobrarClase->setid_cuenta_cobrar(-1);	
			$this->debito_cuenta_cobrarClase->setnumero('');	
			$this->debito_cuenta_cobrarClase->setfecha_emision(date('Y-m-d'));	
			$this->debito_cuenta_cobrarClase->setfecha_vence(date('Y-m-d'));	
			$this->debito_cuenta_cobrarClase->setid_termino_pago_cliente(-1);	
			$this->debito_cuenta_cobrarClase->setmonto(0.0);	
			$this->debito_cuenta_cobrarClase->setsaldo(0.0);	
			$this->debito_cuenta_cobrarClase->setdescripcion('');	
			$this->debito_cuenta_cobrarClase->setsub_total(0.0);	
			$this->debito_cuenta_cobrarClase->setiva(0.0);	
			$this->debito_cuenta_cobrarClase->setes_balance_inicial(false);	
			$this->debito_cuenta_cobrarClase->setid_estado(-1);	
			$this->debito_cuenta_cobrarClase->setreferencia('');	
			$this->debito_cuenta_cobrarClase->setdebito(0.0);	
			$this->debito_cuenta_cobrarClase->setcredito(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('debito_cuenta_cobrar');
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
		$this->cargarParametrosReporteBase('debito_cuenta_cobrar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('debito_cuenta_cobrar');
	}
	
	public function actualizarControllerConReturnGeneral(debito_cuenta_cobrar_param_return $debito_cuenta_cobrarReturnGeneral) {
		if($debito_cuenta_cobrarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesdebito_cuenta_cobrarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$debito_cuenta_cobrarReturnGeneral->getsMensajeProceso();
		}
		
		if($debito_cuenta_cobrarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$debito_cuenta_cobrarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($debito_cuenta_cobrarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$debito_cuenta_cobrarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$debito_cuenta_cobrarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($debito_cuenta_cobrarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($debito_cuenta_cobrarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$debito_cuenta_cobrarReturnGeneral->getsFuncionJs();
		}
		
		if($debito_cuenta_cobrarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(debito_cuenta_cobrar_session $debito_cuenta_cobrar_session){
		$this->strStyleDivArbol=$debito_cuenta_cobrar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$debito_cuenta_cobrar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$debito_cuenta_cobrar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$debito_cuenta_cobrar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$debito_cuenta_cobrar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$debito_cuenta_cobrar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$debito_cuenta_cobrar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(debito_cuenta_cobrar_session $debito_cuenta_cobrar_session){
		$debito_cuenta_cobrar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$debito_cuenta_cobrar_session->strStyleDivHeader='display:none';			
		$debito_cuenta_cobrar_session->strStyleDivContent='width:93%;height:100%';	
		$debito_cuenta_cobrar_session->strStyleDivOpcionesBanner='display:none';	
		$debito_cuenta_cobrar_session->strStyleDivExpandirColapsar='display:none';	
		$debito_cuenta_cobrar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(debito_cuenta_cobrar_control $debito_cuenta_cobrar_control_session){
		$this->idNuevo=$debito_cuenta_cobrar_control_session->idNuevo;
		$this->debito_cuenta_cobrarActual=$debito_cuenta_cobrar_control_session->debito_cuenta_cobrarActual;
		$this->debito_cuenta_cobrar=$debito_cuenta_cobrar_control_session->debito_cuenta_cobrar;
		$this->debito_cuenta_cobrarClase=$debito_cuenta_cobrar_control_session->debito_cuenta_cobrarClase;
		$this->debito_cuenta_cobrars=$debito_cuenta_cobrar_control_session->debito_cuenta_cobrars;
		$this->debito_cuenta_cobrarsEliminados=$debito_cuenta_cobrar_control_session->debito_cuenta_cobrarsEliminados;
		$this->debito_cuenta_cobrar=$debito_cuenta_cobrar_control_session->debito_cuenta_cobrar;
		$this->debito_cuenta_cobrarsReporte=$debito_cuenta_cobrar_control_session->debito_cuenta_cobrarsReporte;
		$this->debito_cuenta_cobrarsSeleccionados=$debito_cuenta_cobrar_control_session->debito_cuenta_cobrarsSeleccionados;
		$this->arrOrderBy=$debito_cuenta_cobrar_control_session->arrOrderBy;
		$this->arrOrderByRel=$debito_cuenta_cobrar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$debito_cuenta_cobrar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$debito_cuenta_cobrar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoaddebito_cuenta_cobrar=$debito_cuenta_cobrar_control_session->strTypeOnLoaddebito_cuenta_cobrar;
		$this->strTipoPaginaAuxiliardebito_cuenta_cobrar=$debito_cuenta_cobrar_control_session->strTipoPaginaAuxiliardebito_cuenta_cobrar;
		$this->strTipoUsuarioAuxiliardebito_cuenta_cobrar=$debito_cuenta_cobrar_control_session->strTipoUsuarioAuxiliardebito_cuenta_cobrar;	
		
		$this->bitEsPopup=$debito_cuenta_cobrar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$debito_cuenta_cobrar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$debito_cuenta_cobrar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$debito_cuenta_cobrar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$debito_cuenta_cobrar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$debito_cuenta_cobrar_control_session->strSufijo;
		$this->bitEsRelaciones=$debito_cuenta_cobrar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$debito_cuenta_cobrar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$debito_cuenta_cobrar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$debito_cuenta_cobrar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$debito_cuenta_cobrar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$debito_cuenta_cobrar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$debito_cuenta_cobrar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$debito_cuenta_cobrar_control_session->strTituloPathElementoActual;
		
		if($this->debito_cuenta_cobrarLogic==null) {			
			$this->debito_cuenta_cobrarLogic=new debito_cuenta_cobrar_logic();
		}
		
		
		if($this->debito_cuenta_cobrarClase==null) {
			$this->debito_cuenta_cobrarClase=new debito_cuenta_cobrar();	
		}
		
		$this->debito_cuenta_cobrarLogic->setdebito_cuenta_cobrar($this->debito_cuenta_cobrarClase);
		
		
		if($this->debito_cuenta_cobrars==null) {
			$this->debito_cuenta_cobrars=array();	
		}
		
		$this->debito_cuenta_cobrarLogic->setdebito_cuenta_cobrars($this->debito_cuenta_cobrars);
		
		
		$this->strTipoView=$debito_cuenta_cobrar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$debito_cuenta_cobrar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$debito_cuenta_cobrar_control_session->datosCliente;
		$this->strAccionBusqueda=$debito_cuenta_cobrar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$debito_cuenta_cobrar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$debito_cuenta_cobrar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$debito_cuenta_cobrar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$debito_cuenta_cobrar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$debito_cuenta_cobrar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$debito_cuenta_cobrar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$debito_cuenta_cobrar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$debito_cuenta_cobrar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$debito_cuenta_cobrar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$debito_cuenta_cobrar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$debito_cuenta_cobrar_control_session->strTipoAccion;
		$this->tiposReportes=$debito_cuenta_cobrar_control_session->tiposReportes;
		$this->tiposReporte=$debito_cuenta_cobrar_control_session->tiposReporte;
		$this->tiposAcciones=$debito_cuenta_cobrar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$debito_cuenta_cobrar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$debito_cuenta_cobrar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$debito_cuenta_cobrar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$debito_cuenta_cobrar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$debito_cuenta_cobrar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$debito_cuenta_cobrar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$debito_cuenta_cobrar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$debito_cuenta_cobrar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$debito_cuenta_cobrar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$debito_cuenta_cobrar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$debito_cuenta_cobrar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$debito_cuenta_cobrar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$debito_cuenta_cobrar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$debito_cuenta_cobrar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$debito_cuenta_cobrar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$debito_cuenta_cobrar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$debito_cuenta_cobrar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$debito_cuenta_cobrar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$debito_cuenta_cobrar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$debito_cuenta_cobrar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$debito_cuenta_cobrar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$debito_cuenta_cobrar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$debito_cuenta_cobrar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$debito_cuenta_cobrar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$debito_cuenta_cobrar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$debito_cuenta_cobrar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$debito_cuenta_cobrar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$debito_cuenta_cobrar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$debito_cuenta_cobrar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$debito_cuenta_cobrar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$debito_cuenta_cobrar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$debito_cuenta_cobrar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$debito_cuenta_cobrar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$debito_cuenta_cobrar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$debito_cuenta_cobrar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$debito_cuenta_cobrar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$debito_cuenta_cobrar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$debito_cuenta_cobrar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$debito_cuenta_cobrar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$debito_cuenta_cobrar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$debito_cuenta_cobrar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$debito_cuenta_cobrar_control_session->moduloActual;	
		$this->opcionActual=$debito_cuenta_cobrar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$debito_cuenta_cobrar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$debito_cuenta_cobrar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$debito_cuenta_cobrar_session=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME));
				
		if($debito_cuenta_cobrar_session==null) {
			$debito_cuenta_cobrar_session=new debito_cuenta_cobrar_session();
		}
		
		$this->strStyleDivArbol=$debito_cuenta_cobrar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$debito_cuenta_cobrar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$debito_cuenta_cobrar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$debito_cuenta_cobrar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$debito_cuenta_cobrar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$debito_cuenta_cobrar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$debito_cuenta_cobrar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$debito_cuenta_cobrar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$debito_cuenta_cobrar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$debito_cuenta_cobrar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$debito_cuenta_cobrar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$debito_cuenta_cobrar_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$debito_cuenta_cobrar_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$debito_cuenta_cobrar_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$debito_cuenta_cobrar_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$debito_cuenta_cobrar_control_session->strMensajeid_usuario;
		$this->strMensajeid_cuenta_cobrar=$debito_cuenta_cobrar_control_session->strMensajeid_cuenta_cobrar;
		$this->strMensajenumero=$debito_cuenta_cobrar_control_session->strMensajenumero;
		$this->strMensajefecha_emision=$debito_cuenta_cobrar_control_session->strMensajefecha_emision;
		$this->strMensajefecha_vence=$debito_cuenta_cobrar_control_session->strMensajefecha_vence;
		$this->strMensajeid_termino_pago_cliente=$debito_cuenta_cobrar_control_session->strMensajeid_termino_pago_cliente;
		$this->strMensajemonto=$debito_cuenta_cobrar_control_session->strMensajemonto;
		$this->strMensajesaldo=$debito_cuenta_cobrar_control_session->strMensajesaldo;
		$this->strMensajedescripcion=$debito_cuenta_cobrar_control_session->strMensajedescripcion;
		$this->strMensajesub_total=$debito_cuenta_cobrar_control_session->strMensajesub_total;
		$this->strMensajeiva=$debito_cuenta_cobrar_control_session->strMensajeiva;
		$this->strMensajees_balance_inicial=$debito_cuenta_cobrar_control_session->strMensajees_balance_inicial;
		$this->strMensajeid_estado=$debito_cuenta_cobrar_control_session->strMensajeid_estado;
		$this->strMensajereferencia=$debito_cuenta_cobrar_control_session->strMensajereferencia;
		$this->strMensajedebito=$debito_cuenta_cobrar_control_session->strMensajedebito;
		$this->strMensajecredito=$debito_cuenta_cobrar_control_session->strMensajecredito;
			
		
		$this->empresasFK=$debito_cuenta_cobrar_control_session->empresasFK;
		$this->idempresaDefaultFK=$debito_cuenta_cobrar_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$debito_cuenta_cobrar_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$debito_cuenta_cobrar_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$debito_cuenta_cobrar_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$debito_cuenta_cobrar_control_session->idejercicioDefaultFK;
		$this->periodosFK=$debito_cuenta_cobrar_control_session->periodosFK;
		$this->idperiodoDefaultFK=$debito_cuenta_cobrar_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$debito_cuenta_cobrar_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$debito_cuenta_cobrar_control_session->idusuarioDefaultFK;
		$this->cuenta_cobrarsFK=$debito_cuenta_cobrar_control_session->cuenta_cobrarsFK;
		$this->idcuenta_cobrarDefaultFK=$debito_cuenta_cobrar_control_session->idcuenta_cobrarDefaultFK;
		$this->termino_pago_clientesFK=$debito_cuenta_cobrar_control_session->termino_pago_clientesFK;
		$this->idtermino_pago_clienteDefaultFK=$debito_cuenta_cobrar_control_session->idtermino_pago_clienteDefaultFK;
		$this->estadosFK=$debito_cuenta_cobrar_control_session->estadosFK;
		$this->idestadoDefaultFK=$debito_cuenta_cobrar_control_session->idestadoDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_cobrar=$debito_cuenta_cobrar_control_session->strVisibleFK_Idcuenta_cobrar;
		$this->strVisibleFK_Idejercicio=$debito_cuenta_cobrar_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$debito_cuenta_cobrar_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado=$debito_cuenta_cobrar_control_session->strVisibleFK_Idestado;
		$this->strVisibleFK_Idperiodo=$debito_cuenta_cobrar_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$debito_cuenta_cobrar_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtermino_pago_cliente=$debito_cuenta_cobrar_control_session->strVisibleFK_Idtermino_pago_cliente;
		$this->strVisibleFK_Idusuario=$debito_cuenta_cobrar_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_cuenta_cobrarFK_Idcuenta_cobrar=$debito_cuenta_cobrar_control_session->id_cuenta_cobrarFK_Idcuenta_cobrar;
		$this->id_ejercicioFK_Idejercicio=$debito_cuenta_cobrar_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$debito_cuenta_cobrar_control_session->id_empresaFK_Idempresa;
		$this->id_estadoFK_Idestado=$debito_cuenta_cobrar_control_session->id_estadoFK_Idestado;
		$this->id_periodoFK_Idperiodo=$debito_cuenta_cobrar_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$debito_cuenta_cobrar_control_session->id_sucursalFK_Idsucursal;
		$this->id_termino_pago_clienteFK_Idtermino_pago_cliente=$debito_cuenta_cobrar_control_session->id_termino_pago_clienteFK_Idtermino_pago_cliente;
		$this->id_usuarioFK_Idusuario=$debito_cuenta_cobrar_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getdebito_cuenta_cobrarControllerAdditional() {
		return $this->debito_cuenta_cobrarControllerAdditional;
	}

	public function setdebito_cuenta_cobrarControllerAdditional($debito_cuenta_cobrarControllerAdditional) {
		$this->debito_cuenta_cobrarControllerAdditional = $debito_cuenta_cobrarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getdebito_cuenta_cobrarActual() : debito_cuenta_cobrar {
		return $this->debito_cuenta_cobrarActual;
	}

	public function setdebito_cuenta_cobrarActual(debito_cuenta_cobrar $debito_cuenta_cobrarActual) {
		$this->debito_cuenta_cobrarActual = $debito_cuenta_cobrarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getiddebito_cuenta_cobrar() : int {
		return $this->iddebito_cuenta_cobrar;
	}

	public function setiddebito_cuenta_cobrar(int $iddebito_cuenta_cobrar) {
		$this->iddebito_cuenta_cobrar = $iddebito_cuenta_cobrar;
	}
	
	public function getdebito_cuenta_cobrar() : debito_cuenta_cobrar {
		return $this->debito_cuenta_cobrar;
	}

	public function setdebito_cuenta_cobrar(debito_cuenta_cobrar $debito_cuenta_cobrar) {
		$this->debito_cuenta_cobrar = $debito_cuenta_cobrar;
	}
		
	public function getdebito_cuenta_cobrarLogic() : debito_cuenta_cobrar_logic {		
		return $this->debito_cuenta_cobrarLogic;
	}

	public function setdebito_cuenta_cobrarLogic(debito_cuenta_cobrar_logic $debito_cuenta_cobrarLogic) {
		$this->debito_cuenta_cobrarLogic = $debito_cuenta_cobrarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getdebito_cuenta_cobrarsModel() {		
		try {						
			/*debito_cuenta_cobrarsModel.setWrappedData(debito_cuenta_cobrarLogic->getdebito_cuenta_cobrars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->debito_cuenta_cobrarsModel;
	}
	
	public function setdebito_cuenta_cobrarsModel($debito_cuenta_cobrarsModel) {
		$this->debito_cuenta_cobrarsModel = $debito_cuenta_cobrarsModel;
	}
	
	public function getdebito_cuenta_cobrars() : array {		
		return $this->debito_cuenta_cobrars;
	}
	
	public function setdebito_cuenta_cobrars(array $debito_cuenta_cobrars) {
		$this->debito_cuenta_cobrars= $debito_cuenta_cobrars;
	}
	
	public function getdebito_cuenta_cobrarsEliminados() : array {		
		return $this->debito_cuenta_cobrarsEliminados;
	}
	
	public function setdebito_cuenta_cobrarsEliminados(array $debito_cuenta_cobrarsEliminados) {
		$this->debito_cuenta_cobrarsEliminados= $debito_cuenta_cobrarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getdebito_cuenta_cobrarActualFromListDataModel() {
		try {
			/*$debito_cuenta_cobrarClase= $this->debito_cuenta_cobrarsModel->getRowData();*/
			
			/*return $debito_cuenta_cobrar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
