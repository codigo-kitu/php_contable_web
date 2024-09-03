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

namespace com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\business\entity\deposito_cuenta_corriente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/deposito_cuenta_corriente/util/deposito_cuenta_corriente_carga.php');
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_carga;

use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_param_return;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\business\logic\deposito_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\business\logic\deposito_cuenta_corriente_logic_add;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\session\deposito_cuenta_corriente_session;


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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\logic\estado_deposito_retiro_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_carga;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
deposito_cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
deposito_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
deposito_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
deposito_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*deposito_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class deposito_cuenta_corriente_init_control extends ControllerBase {	
	
	public $deposito_cuenta_corrienteClase=null;	
	public $deposito_cuenta_corrientesModel=null;	
	public $deposito_cuenta_corrientesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $iddeposito_cuenta_corriente=0;	
	public ?int $iddeposito_cuenta_corrienteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $deposito_cuenta_corrienteLogic=null;
	
	public $deposito_cuenta_corrienteActual=null;	
	
	public $deposito_cuenta_corriente=null;
	public $deposito_cuenta_corrientes=null;
	public $deposito_cuenta_corrientesEliminados=array();
	public $deposito_cuenta_corrientesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $deposito_cuenta_corrientesLocal=array();
	public ?array $deposito_cuenta_corrientesReporte=null;
	public ?array $deposito_cuenta_corrientesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoaddeposito_cuenta_corriente='onload';
	public string $strTipoPaginaAuxiliardeposito_cuenta_corriente='none';
	public string $strTipoUsuarioAuxiliardeposito_cuenta_corriente='none';
		
	public $deposito_cuenta_corrienteReturnGeneral=null;
	public $deposito_cuenta_corrienteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $deposito_cuenta_corrienteModel=null;
	public $deposito_cuenta_corrienteControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_cuenta_corriente='';
	public string $strMensajefecha_emision='';
	public string $strMensajemonto='';
	public string $strMensajemonto_texto='';
	public string $strMensajesaldo='';
	public string $strMensajedescripcion='';
	public string $strMensajees_balance_inicial='';
	public string $strMensajeid_estado_deposito_retiro='';
	public string $strMensajedebito='';
	public string $strMensajecredito='';
	
	
	public string $strVisibleFK_Idcuenta_corriente='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado_deposito_retiro='display:table-row';
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

	public array $cuenta_corrientesFK=array();

	public function getcuenta_corrientesFK():array {
		return $this->cuenta_corrientesFK;
	}

	public function setcuenta_corrientesFK(array $cuenta_corrientesFK) {
		$this->cuenta_corrientesFK = $cuenta_corrientesFK;
	}

	public int $idcuenta_corrienteDefaultFK=-1;

	public function getIdcuenta_corrienteDefaultFK():int {
		return $this->idcuenta_corrienteDefaultFK;
	}

	public function setIdcuenta_corrienteDefaultFK(int $idcuenta_corrienteDefaultFK) {
		$this->idcuenta_corrienteDefaultFK = $idcuenta_corrienteDefaultFK;
	}

	public array $estado_deposito_retirosFK=array();

	public function getestado_deposito_retirosFK():array {
		return $this->estado_deposito_retirosFK;
	}

	public function setestado_deposito_retirosFK(array $estado_deposito_retirosFK) {
		$this->estado_deposito_retirosFK = $estado_deposito_retirosFK;
	}

	public int $idestado_deposito_retiroDefaultFK=-1;

	public function getIdestado_deposito_retiroDefaultFK():int {
		return $this->idestado_deposito_retiroDefaultFK;
	}

	public function setIdestado_deposito_retiroDefaultFK(int $idestado_deposito_retiroDefaultFK) {
		$this->idestado_deposito_retiroDefaultFK = $idestado_deposito_retiroDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_cuenta_corrienteFK_Idcuenta_corriente=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estado_deposito_retiroFK_Idestado_deposito_retiro=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->deposito_cuenta_corrienteLogic==null) {
				$this->deposito_cuenta_corrienteLogic=new deposito_cuenta_corriente_logic();
			}
			
		} else {
			if($this->deposito_cuenta_corrienteLogic==null) {
				$this->deposito_cuenta_corrienteLogic=new deposito_cuenta_corriente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->deposito_cuenta_corrienteClase==null) {
				$this->deposito_cuenta_corrienteClase=new deposito_cuenta_corriente();
			}
			
			$this->deposito_cuenta_corrienteClase->setId(0);	
				
				
			$this->deposito_cuenta_corrienteClase->setid_empresa(-1);	
			$this->deposito_cuenta_corrienteClase->setid_sucursal(-1);	
			$this->deposito_cuenta_corrienteClase->setid_ejercicio(-1);	
			$this->deposito_cuenta_corrienteClase->setid_periodo(-1);	
			$this->deposito_cuenta_corrienteClase->setid_usuario(-1);	
			$this->deposito_cuenta_corrienteClase->setid_cuenta_corriente(-1);	
			$this->deposito_cuenta_corrienteClase->setfecha_emision(date('Y-m-d'));	
			$this->deposito_cuenta_corrienteClase->setmonto(0.0);	
			$this->deposito_cuenta_corrienteClase->setmonto_texto('');	
			$this->deposito_cuenta_corrienteClase->setsaldo(0.0);	
			$this->deposito_cuenta_corrienteClase->setdescripcion('');	
			$this->deposito_cuenta_corrienteClase->setes_balance_inicial(false);	
			$this->deposito_cuenta_corrienteClase->setid_estado_deposito_retiro(-1);	
			$this->deposito_cuenta_corrienteClase->setdebito(0.0);	
			$this->deposito_cuenta_corrienteClase->setcredito(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('deposito_cuenta_corriente');
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
		$this->cargarParametrosReporteBase('deposito_cuenta_corriente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('deposito_cuenta_corriente');
	}
	
	public function actualizarControllerConReturnGeneral(deposito_cuenta_corriente_param_return $deposito_cuenta_corrienteReturnGeneral) {
		if($deposito_cuenta_corrienteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesdeposito_cuenta_corrientesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$deposito_cuenta_corrienteReturnGeneral->getsMensajeProceso();
		}
		
		if($deposito_cuenta_corrienteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$deposito_cuenta_corrienteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($deposito_cuenta_corrienteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$deposito_cuenta_corrienteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$deposito_cuenta_corrienteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($deposito_cuenta_corrienteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($deposito_cuenta_corrienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$deposito_cuenta_corrienteReturnGeneral->getsFuncionJs();
		}
		
		if($deposito_cuenta_corrienteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(deposito_cuenta_corriente_session $deposito_cuenta_corriente_session){
		$this->strStyleDivArbol=$deposito_cuenta_corriente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$deposito_cuenta_corriente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$deposito_cuenta_corriente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$deposito_cuenta_corriente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$deposito_cuenta_corriente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$deposito_cuenta_corriente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$deposito_cuenta_corriente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(deposito_cuenta_corriente_session $deposito_cuenta_corriente_session){
		$deposito_cuenta_corriente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$deposito_cuenta_corriente_session->strStyleDivHeader='display:none';			
		$deposito_cuenta_corriente_session->strStyleDivContent='width:93%;height:100%';	
		$deposito_cuenta_corriente_session->strStyleDivOpcionesBanner='display:none';	
		$deposito_cuenta_corriente_session->strStyleDivExpandirColapsar='display:none';	
		$deposito_cuenta_corriente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(deposito_cuenta_corriente_control $deposito_cuenta_corriente_control_session){
		$this->idNuevo=$deposito_cuenta_corriente_control_session->idNuevo;
		$this->deposito_cuenta_corrienteActual=$deposito_cuenta_corriente_control_session->deposito_cuenta_corrienteActual;
		$this->deposito_cuenta_corriente=$deposito_cuenta_corriente_control_session->deposito_cuenta_corriente;
		$this->deposito_cuenta_corrienteClase=$deposito_cuenta_corriente_control_session->deposito_cuenta_corrienteClase;
		$this->deposito_cuenta_corrientes=$deposito_cuenta_corriente_control_session->deposito_cuenta_corrientes;
		$this->deposito_cuenta_corrientesEliminados=$deposito_cuenta_corriente_control_session->deposito_cuenta_corrientesEliminados;
		$this->deposito_cuenta_corriente=$deposito_cuenta_corriente_control_session->deposito_cuenta_corriente;
		$this->deposito_cuenta_corrientesReporte=$deposito_cuenta_corriente_control_session->deposito_cuenta_corrientesReporte;
		$this->deposito_cuenta_corrientesSeleccionados=$deposito_cuenta_corriente_control_session->deposito_cuenta_corrientesSeleccionados;
		$this->arrOrderBy=$deposito_cuenta_corriente_control_session->arrOrderBy;
		$this->arrOrderByRel=$deposito_cuenta_corriente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$deposito_cuenta_corriente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$deposito_cuenta_corriente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoaddeposito_cuenta_corriente=$deposito_cuenta_corriente_control_session->strTypeOnLoaddeposito_cuenta_corriente;
		$this->strTipoPaginaAuxiliardeposito_cuenta_corriente=$deposito_cuenta_corriente_control_session->strTipoPaginaAuxiliardeposito_cuenta_corriente;
		$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente=$deposito_cuenta_corriente_control_session->strTipoUsuarioAuxiliardeposito_cuenta_corriente;	
		
		$this->bitEsPopup=$deposito_cuenta_corriente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$deposito_cuenta_corriente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$deposito_cuenta_corriente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$deposito_cuenta_corriente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$deposito_cuenta_corriente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$deposito_cuenta_corriente_control_session->strSufijo;
		$this->bitEsRelaciones=$deposito_cuenta_corriente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$deposito_cuenta_corriente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$deposito_cuenta_corriente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$deposito_cuenta_corriente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$deposito_cuenta_corriente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$deposito_cuenta_corriente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$deposito_cuenta_corriente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$deposito_cuenta_corriente_control_session->strTituloPathElementoActual;
		
		if($this->deposito_cuenta_corrienteLogic==null) {			
			$this->deposito_cuenta_corrienteLogic=new deposito_cuenta_corriente_logic();
		}
		
		
		if($this->deposito_cuenta_corrienteClase==null) {
			$this->deposito_cuenta_corrienteClase=new deposito_cuenta_corriente();	
		}
		
		$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corriente($this->deposito_cuenta_corrienteClase);
		
		
		if($this->deposito_cuenta_corrientes==null) {
			$this->deposito_cuenta_corrientes=array();	
		}
		
		$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($this->deposito_cuenta_corrientes);
		
		
		$this->strTipoView=$deposito_cuenta_corriente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$deposito_cuenta_corriente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$deposito_cuenta_corriente_control_session->datosCliente;
		$this->strAccionBusqueda=$deposito_cuenta_corriente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$deposito_cuenta_corriente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$deposito_cuenta_corriente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$deposito_cuenta_corriente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$deposito_cuenta_corriente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$deposito_cuenta_corriente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$deposito_cuenta_corriente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$deposito_cuenta_corriente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$deposito_cuenta_corriente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$deposito_cuenta_corriente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$deposito_cuenta_corriente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$deposito_cuenta_corriente_control_session->strTipoAccion;
		$this->tiposReportes=$deposito_cuenta_corriente_control_session->tiposReportes;
		$this->tiposReporte=$deposito_cuenta_corriente_control_session->tiposReporte;
		$this->tiposAcciones=$deposito_cuenta_corriente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$deposito_cuenta_corriente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$deposito_cuenta_corriente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$deposito_cuenta_corriente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$deposito_cuenta_corriente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$deposito_cuenta_corriente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$deposito_cuenta_corriente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$deposito_cuenta_corriente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$deposito_cuenta_corriente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$deposito_cuenta_corriente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$deposito_cuenta_corriente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$deposito_cuenta_corriente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$deposito_cuenta_corriente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$deposito_cuenta_corriente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$deposito_cuenta_corriente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$deposito_cuenta_corriente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$deposito_cuenta_corriente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$deposito_cuenta_corriente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$deposito_cuenta_corriente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$deposito_cuenta_corriente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$deposito_cuenta_corriente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$deposito_cuenta_corriente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$deposito_cuenta_corriente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$deposito_cuenta_corriente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$deposito_cuenta_corriente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$deposito_cuenta_corriente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$deposito_cuenta_corriente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$deposito_cuenta_corriente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$deposito_cuenta_corriente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$deposito_cuenta_corriente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$deposito_cuenta_corriente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$deposito_cuenta_corriente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$deposito_cuenta_corriente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$deposito_cuenta_corriente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$deposito_cuenta_corriente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$deposito_cuenta_corriente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$deposito_cuenta_corriente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$deposito_cuenta_corriente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$deposito_cuenta_corriente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$deposito_cuenta_corriente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$deposito_cuenta_corriente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$deposito_cuenta_corriente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$deposito_cuenta_corriente_control_session->moduloActual;	
		$this->opcionActual=$deposito_cuenta_corriente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$deposito_cuenta_corriente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$deposito_cuenta_corriente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));
				
		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		}
		
		$this->strStyleDivArbol=$deposito_cuenta_corriente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$deposito_cuenta_corriente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$deposito_cuenta_corriente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$deposito_cuenta_corriente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$deposito_cuenta_corriente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$deposito_cuenta_corriente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$deposito_cuenta_corriente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$deposito_cuenta_corriente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$deposito_cuenta_corriente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$deposito_cuenta_corriente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$deposito_cuenta_corriente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$deposito_cuenta_corriente_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$deposito_cuenta_corriente_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$deposito_cuenta_corriente_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$deposito_cuenta_corriente_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$deposito_cuenta_corriente_control_session->strMensajeid_usuario;
		$this->strMensajeid_cuenta_corriente=$deposito_cuenta_corriente_control_session->strMensajeid_cuenta_corriente;
		$this->strMensajefecha_emision=$deposito_cuenta_corriente_control_session->strMensajefecha_emision;
		$this->strMensajemonto=$deposito_cuenta_corriente_control_session->strMensajemonto;
		$this->strMensajemonto_texto=$deposito_cuenta_corriente_control_session->strMensajemonto_texto;
		$this->strMensajesaldo=$deposito_cuenta_corriente_control_session->strMensajesaldo;
		$this->strMensajedescripcion=$deposito_cuenta_corriente_control_session->strMensajedescripcion;
		$this->strMensajees_balance_inicial=$deposito_cuenta_corriente_control_session->strMensajees_balance_inicial;
		$this->strMensajeid_estado_deposito_retiro=$deposito_cuenta_corriente_control_session->strMensajeid_estado_deposito_retiro;
		$this->strMensajedebito=$deposito_cuenta_corriente_control_session->strMensajedebito;
		$this->strMensajecredito=$deposito_cuenta_corriente_control_session->strMensajecredito;
			
		
		$this->empresasFK=$deposito_cuenta_corriente_control_session->empresasFK;
		$this->idempresaDefaultFK=$deposito_cuenta_corriente_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$deposito_cuenta_corriente_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$deposito_cuenta_corriente_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$deposito_cuenta_corriente_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$deposito_cuenta_corriente_control_session->idejercicioDefaultFK;
		$this->periodosFK=$deposito_cuenta_corriente_control_session->periodosFK;
		$this->idperiodoDefaultFK=$deposito_cuenta_corriente_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$deposito_cuenta_corriente_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$deposito_cuenta_corriente_control_session->idusuarioDefaultFK;
		$this->cuenta_corrientesFK=$deposito_cuenta_corriente_control_session->cuenta_corrientesFK;
		$this->idcuenta_corrienteDefaultFK=$deposito_cuenta_corriente_control_session->idcuenta_corrienteDefaultFK;
		$this->estado_deposito_retirosFK=$deposito_cuenta_corriente_control_session->estado_deposito_retirosFK;
		$this->idestado_deposito_retiroDefaultFK=$deposito_cuenta_corriente_control_session->idestado_deposito_retiroDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_corriente=$deposito_cuenta_corriente_control_session->strVisibleFK_Idcuenta_corriente;
		$this->strVisibleFK_Idejercicio=$deposito_cuenta_corriente_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$deposito_cuenta_corriente_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado_deposito_retiro=$deposito_cuenta_corriente_control_session->strVisibleFK_Idestado_deposito_retiro;
		$this->strVisibleFK_Idperiodo=$deposito_cuenta_corriente_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$deposito_cuenta_corriente_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idusuario=$deposito_cuenta_corriente_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_cuenta_corrienteFK_Idcuenta_corriente=$deposito_cuenta_corriente_control_session->id_cuenta_corrienteFK_Idcuenta_corriente;
		$this->id_ejercicioFK_Idejercicio=$deposito_cuenta_corriente_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$deposito_cuenta_corriente_control_session->id_empresaFK_Idempresa;
		$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro=$deposito_cuenta_corriente_control_session->id_estado_deposito_retiroFK_Idestado_deposito_retiro;
		$this->id_periodoFK_Idperiodo=$deposito_cuenta_corriente_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$deposito_cuenta_corriente_control_session->id_sucursalFK_Idsucursal;
		$this->id_usuarioFK_Idusuario=$deposito_cuenta_corriente_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getdeposito_cuenta_corrienteControllerAdditional() {
		return $this->deposito_cuenta_corrienteControllerAdditional;
	}

	public function setdeposito_cuenta_corrienteControllerAdditional($deposito_cuenta_corrienteControllerAdditional) {
		$this->deposito_cuenta_corrienteControllerAdditional = $deposito_cuenta_corrienteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getdeposito_cuenta_corrienteActual() : deposito_cuenta_corriente {
		return $this->deposito_cuenta_corrienteActual;
	}

	public function setdeposito_cuenta_corrienteActual(deposito_cuenta_corriente $deposito_cuenta_corrienteActual) {
		$this->deposito_cuenta_corrienteActual = $deposito_cuenta_corrienteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getiddeposito_cuenta_corriente() : int {
		return $this->iddeposito_cuenta_corriente;
	}

	public function setiddeposito_cuenta_corriente(int $iddeposito_cuenta_corriente) {
		$this->iddeposito_cuenta_corriente = $iddeposito_cuenta_corriente;
	}
	
	public function getdeposito_cuenta_corriente() : deposito_cuenta_corriente {
		return $this->deposito_cuenta_corriente;
	}

	public function setdeposito_cuenta_corriente(deposito_cuenta_corriente $deposito_cuenta_corriente) {
		$this->deposito_cuenta_corriente = $deposito_cuenta_corriente;
	}
		
	public function getdeposito_cuenta_corrienteLogic() : deposito_cuenta_corriente_logic {		
		return $this->deposito_cuenta_corrienteLogic;
	}

	public function setdeposito_cuenta_corrienteLogic(deposito_cuenta_corriente_logic $deposito_cuenta_corrienteLogic) {
		$this->deposito_cuenta_corrienteLogic = $deposito_cuenta_corrienteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getdeposito_cuenta_corrientesModel() {		
		try {						
			/*deposito_cuenta_corrientesModel.setWrappedData(deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->deposito_cuenta_corrientesModel;
	}
	
	public function setdeposito_cuenta_corrientesModel($deposito_cuenta_corrientesModel) {
		$this->deposito_cuenta_corrientesModel = $deposito_cuenta_corrientesModel;
	}
	
	public function getdeposito_cuenta_corrientes() : array {		
		return $this->deposito_cuenta_corrientes;
	}
	
	public function setdeposito_cuenta_corrientes(array $deposito_cuenta_corrientes) {
		$this->deposito_cuenta_corrientes= $deposito_cuenta_corrientes;
	}
	
	public function getdeposito_cuenta_corrientesEliminados() : array {		
		return $this->deposito_cuenta_corrientesEliminados;
	}
	
	public function setdeposito_cuenta_corrientesEliminados(array $deposito_cuenta_corrientesEliminados) {
		$this->deposito_cuenta_corrientesEliminados= $deposito_cuenta_corrientesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getdeposito_cuenta_corrienteActualFromListDataModel() {
		try {
			/*$deposito_cuenta_corrienteClase= $this->deposito_cuenta_corrientesModel->getRowData();*/
			
			/*return $deposito_cuenta_corriente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
