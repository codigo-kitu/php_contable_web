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

namespace com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\entity\retiro_cuenta_corriente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/retiro_cuenta_corriente/util/retiro_cuenta_corriente_carga.php');
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_carga;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_param_return;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\logic\retiro_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\business\logic\retiro_cuenta_corriente_logic_add;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\presentation\session\retiro_cuenta_corriente_session;


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
retiro_cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
retiro_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
retiro_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
retiro_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*retiro_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class retiro_cuenta_corriente_init_control extends ControllerBase {	
	
	public $retiro_cuenta_corrienteClase=null;	
	public $retiro_cuenta_corrientesModel=null;	
	public $retiro_cuenta_corrientesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idretiro_cuenta_corriente=0;	
	public ?int $idretiro_cuenta_corrienteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $retiro_cuenta_corrienteLogic=null;
	
	public $retiro_cuenta_corrienteActual=null;	
	
	public $retiro_cuenta_corriente=null;
	public $retiro_cuenta_corrientes=null;
	public $retiro_cuenta_corrientesEliminados=array();
	public $retiro_cuenta_corrientesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $retiro_cuenta_corrientesLocal=array();
	public ?array $retiro_cuenta_corrientesReporte=null;
	public ?array $retiro_cuenta_corrientesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadretiro_cuenta_corriente='onload';
	public string $strTipoPaginaAuxiliarretiro_cuenta_corriente='none';
	public string $strTipoUsuarioAuxiliarretiro_cuenta_corriente='none';
		
	public $retiro_cuenta_corrienteReturnGeneral=null;
	public $retiro_cuenta_corrienteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $retiro_cuenta_corrienteModel=null;
	public $retiro_cuenta_corrienteControllerAdditional=null;
	
	
	 	
	
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
			if($this->retiro_cuenta_corrienteLogic==null) {
				$this->retiro_cuenta_corrienteLogic=new retiro_cuenta_corriente_logic();
			}
			
		} else {
			if($this->retiro_cuenta_corrienteLogic==null) {
				$this->retiro_cuenta_corrienteLogic=new retiro_cuenta_corriente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->retiro_cuenta_corrienteClase==null) {
				$this->retiro_cuenta_corrienteClase=new retiro_cuenta_corriente();
			}
			
			$this->retiro_cuenta_corrienteClase->setId(0);	
				
				
			$this->retiro_cuenta_corrienteClase->setid_empresa(-1);	
			$this->retiro_cuenta_corrienteClase->setid_sucursal(-1);	
			$this->retiro_cuenta_corrienteClase->setid_ejercicio(-1);	
			$this->retiro_cuenta_corrienteClase->setid_periodo(-1);	
			$this->retiro_cuenta_corrienteClase->setid_usuario(-1);	
			$this->retiro_cuenta_corrienteClase->setid_cuenta_corriente(-1);	
			$this->retiro_cuenta_corrienteClase->setfecha_emision(date('Y-m-d'));	
			$this->retiro_cuenta_corrienteClase->setmonto(0.0);	
			$this->retiro_cuenta_corrienteClase->setmonto_texto('');	
			$this->retiro_cuenta_corrienteClase->setsaldo(0.0);	
			$this->retiro_cuenta_corrienteClase->setdescripcion('');	
			$this->retiro_cuenta_corrienteClase->setid_estado_deposito_retiro(-1);	
			$this->retiro_cuenta_corrienteClase->setdebito(0.0);	
			$this->retiro_cuenta_corrienteClase->setcredito(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('retiro_cuenta_corriente');
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
		$this->cargarParametrosReporteBase('retiro_cuenta_corriente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('retiro_cuenta_corriente');
	}
	
	public function actualizarControllerConReturnGeneral(retiro_cuenta_corriente_param_return $retiro_cuenta_corrienteReturnGeneral) {
		if($retiro_cuenta_corrienteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesretiro_cuenta_corrientesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$retiro_cuenta_corrienteReturnGeneral->getsMensajeProceso();
		}
		
		if($retiro_cuenta_corrienteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$retiro_cuenta_corrienteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($retiro_cuenta_corrienteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$retiro_cuenta_corrienteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$retiro_cuenta_corrienteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($retiro_cuenta_corrienteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($retiro_cuenta_corrienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$retiro_cuenta_corrienteReturnGeneral->getsFuncionJs();
		}
		
		if($retiro_cuenta_corrienteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(retiro_cuenta_corriente_session $retiro_cuenta_corriente_session){
		$this->strStyleDivArbol=$retiro_cuenta_corriente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$retiro_cuenta_corriente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$retiro_cuenta_corriente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$retiro_cuenta_corriente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$retiro_cuenta_corriente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$retiro_cuenta_corriente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$retiro_cuenta_corriente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(retiro_cuenta_corriente_session $retiro_cuenta_corriente_session){
		$retiro_cuenta_corriente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$retiro_cuenta_corriente_session->strStyleDivHeader='display:none';			
		$retiro_cuenta_corriente_session->strStyleDivContent='width:93%;height:100%';	
		$retiro_cuenta_corriente_session->strStyleDivOpcionesBanner='display:none';	
		$retiro_cuenta_corriente_session->strStyleDivExpandirColapsar='display:none';	
		$retiro_cuenta_corriente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(retiro_cuenta_corriente_control $retiro_cuenta_corriente_control_session){
		$this->idNuevo=$retiro_cuenta_corriente_control_session->idNuevo;
		$this->retiro_cuenta_corrienteActual=$retiro_cuenta_corriente_control_session->retiro_cuenta_corrienteActual;
		$this->retiro_cuenta_corriente=$retiro_cuenta_corriente_control_session->retiro_cuenta_corriente;
		$this->retiro_cuenta_corrienteClase=$retiro_cuenta_corriente_control_session->retiro_cuenta_corrienteClase;
		$this->retiro_cuenta_corrientes=$retiro_cuenta_corriente_control_session->retiro_cuenta_corrientes;
		$this->retiro_cuenta_corrientesEliminados=$retiro_cuenta_corriente_control_session->retiro_cuenta_corrientesEliminados;
		$this->retiro_cuenta_corriente=$retiro_cuenta_corriente_control_session->retiro_cuenta_corriente;
		$this->retiro_cuenta_corrientesReporte=$retiro_cuenta_corriente_control_session->retiro_cuenta_corrientesReporte;
		$this->retiro_cuenta_corrientesSeleccionados=$retiro_cuenta_corriente_control_session->retiro_cuenta_corrientesSeleccionados;
		$this->arrOrderBy=$retiro_cuenta_corriente_control_session->arrOrderBy;
		$this->arrOrderByRel=$retiro_cuenta_corriente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$retiro_cuenta_corriente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$retiro_cuenta_corriente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadretiro_cuenta_corriente=$retiro_cuenta_corriente_control_session->strTypeOnLoadretiro_cuenta_corriente;
		$this->strTipoPaginaAuxiliarretiro_cuenta_corriente=$retiro_cuenta_corriente_control_session->strTipoPaginaAuxiliarretiro_cuenta_corriente;
		$this->strTipoUsuarioAuxiliarretiro_cuenta_corriente=$retiro_cuenta_corriente_control_session->strTipoUsuarioAuxiliarretiro_cuenta_corriente;	
		
		$this->bitEsPopup=$retiro_cuenta_corriente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$retiro_cuenta_corriente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$retiro_cuenta_corriente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$retiro_cuenta_corriente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$retiro_cuenta_corriente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$retiro_cuenta_corriente_control_session->strSufijo;
		$this->bitEsRelaciones=$retiro_cuenta_corriente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$retiro_cuenta_corriente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$retiro_cuenta_corriente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$retiro_cuenta_corriente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$retiro_cuenta_corriente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$retiro_cuenta_corriente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$retiro_cuenta_corriente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$retiro_cuenta_corriente_control_session->strTituloPathElementoActual;
		
		if($this->retiro_cuenta_corrienteLogic==null) {			
			$this->retiro_cuenta_corrienteLogic=new retiro_cuenta_corriente_logic();
		}
		
		
		if($this->retiro_cuenta_corrienteClase==null) {
			$this->retiro_cuenta_corrienteClase=new retiro_cuenta_corriente();	
		}
		
		$this->retiro_cuenta_corrienteLogic->setretiro_cuenta_corriente($this->retiro_cuenta_corrienteClase);
		
		
		if($this->retiro_cuenta_corrientes==null) {
			$this->retiro_cuenta_corrientes=array();	
		}
		
		$this->retiro_cuenta_corrienteLogic->setretiro_cuenta_corrientes($this->retiro_cuenta_corrientes);
		
		
		$this->strTipoView=$retiro_cuenta_corriente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$retiro_cuenta_corriente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$retiro_cuenta_corriente_control_session->datosCliente;
		$this->strAccionBusqueda=$retiro_cuenta_corriente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$retiro_cuenta_corriente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$retiro_cuenta_corriente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$retiro_cuenta_corriente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$retiro_cuenta_corriente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$retiro_cuenta_corriente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$retiro_cuenta_corriente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$retiro_cuenta_corriente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$retiro_cuenta_corriente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$retiro_cuenta_corriente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$retiro_cuenta_corriente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$retiro_cuenta_corriente_control_session->strTipoAccion;
		$this->tiposReportes=$retiro_cuenta_corriente_control_session->tiposReportes;
		$this->tiposReporte=$retiro_cuenta_corriente_control_session->tiposReporte;
		$this->tiposAcciones=$retiro_cuenta_corriente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$retiro_cuenta_corriente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$retiro_cuenta_corriente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$retiro_cuenta_corriente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$retiro_cuenta_corriente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$retiro_cuenta_corriente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$retiro_cuenta_corriente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$retiro_cuenta_corriente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$retiro_cuenta_corriente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$retiro_cuenta_corriente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$retiro_cuenta_corriente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$retiro_cuenta_corriente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$retiro_cuenta_corriente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$retiro_cuenta_corriente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$retiro_cuenta_corriente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$retiro_cuenta_corriente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$retiro_cuenta_corriente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$retiro_cuenta_corriente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$retiro_cuenta_corriente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$retiro_cuenta_corriente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$retiro_cuenta_corriente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$retiro_cuenta_corriente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$retiro_cuenta_corriente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$retiro_cuenta_corriente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$retiro_cuenta_corriente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$retiro_cuenta_corriente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$retiro_cuenta_corriente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$retiro_cuenta_corriente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$retiro_cuenta_corriente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$retiro_cuenta_corriente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$retiro_cuenta_corriente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$retiro_cuenta_corriente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$retiro_cuenta_corriente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$retiro_cuenta_corriente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$retiro_cuenta_corriente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$retiro_cuenta_corriente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$retiro_cuenta_corriente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$retiro_cuenta_corriente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$retiro_cuenta_corriente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$retiro_cuenta_corriente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$retiro_cuenta_corriente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$retiro_cuenta_corriente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$retiro_cuenta_corriente_control_session->moduloActual;	
		$this->opcionActual=$retiro_cuenta_corriente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$retiro_cuenta_corriente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$retiro_cuenta_corriente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$retiro_cuenta_corriente_session=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME));
				
		if($retiro_cuenta_corriente_session==null) {
			$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
		}
		
		$this->strStyleDivArbol=$retiro_cuenta_corriente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$retiro_cuenta_corriente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$retiro_cuenta_corriente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$retiro_cuenta_corriente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$retiro_cuenta_corriente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$retiro_cuenta_corriente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$retiro_cuenta_corriente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$retiro_cuenta_corriente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$retiro_cuenta_corriente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$retiro_cuenta_corriente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$retiro_cuenta_corriente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$retiro_cuenta_corriente_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$retiro_cuenta_corriente_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$retiro_cuenta_corriente_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$retiro_cuenta_corriente_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$retiro_cuenta_corriente_control_session->strMensajeid_usuario;
		$this->strMensajeid_cuenta_corriente=$retiro_cuenta_corriente_control_session->strMensajeid_cuenta_corriente;
		$this->strMensajefecha_emision=$retiro_cuenta_corriente_control_session->strMensajefecha_emision;
		$this->strMensajemonto=$retiro_cuenta_corriente_control_session->strMensajemonto;
		$this->strMensajemonto_texto=$retiro_cuenta_corriente_control_session->strMensajemonto_texto;
		$this->strMensajesaldo=$retiro_cuenta_corriente_control_session->strMensajesaldo;
		$this->strMensajedescripcion=$retiro_cuenta_corriente_control_session->strMensajedescripcion;
		$this->strMensajeid_estado_deposito_retiro=$retiro_cuenta_corriente_control_session->strMensajeid_estado_deposito_retiro;
		$this->strMensajedebito=$retiro_cuenta_corriente_control_session->strMensajedebito;
		$this->strMensajecredito=$retiro_cuenta_corriente_control_session->strMensajecredito;
			
		
		$this->empresasFK=$retiro_cuenta_corriente_control_session->empresasFK;
		$this->idempresaDefaultFK=$retiro_cuenta_corriente_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$retiro_cuenta_corriente_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$retiro_cuenta_corriente_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$retiro_cuenta_corriente_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$retiro_cuenta_corriente_control_session->idejercicioDefaultFK;
		$this->periodosFK=$retiro_cuenta_corriente_control_session->periodosFK;
		$this->idperiodoDefaultFK=$retiro_cuenta_corriente_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$retiro_cuenta_corriente_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$retiro_cuenta_corriente_control_session->idusuarioDefaultFK;
		$this->cuenta_corrientesFK=$retiro_cuenta_corriente_control_session->cuenta_corrientesFK;
		$this->idcuenta_corrienteDefaultFK=$retiro_cuenta_corriente_control_session->idcuenta_corrienteDefaultFK;
		$this->estado_deposito_retirosFK=$retiro_cuenta_corriente_control_session->estado_deposito_retirosFK;
		$this->idestado_deposito_retiroDefaultFK=$retiro_cuenta_corriente_control_session->idestado_deposito_retiroDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_corriente=$retiro_cuenta_corriente_control_session->strVisibleFK_Idcuenta_corriente;
		$this->strVisibleFK_Idejercicio=$retiro_cuenta_corriente_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$retiro_cuenta_corriente_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado_deposito_retiro=$retiro_cuenta_corriente_control_session->strVisibleFK_Idestado_deposito_retiro;
		$this->strVisibleFK_Idperiodo=$retiro_cuenta_corriente_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idsucursal=$retiro_cuenta_corriente_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idusuario=$retiro_cuenta_corriente_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_cuenta_corrienteFK_Idcuenta_corriente=$retiro_cuenta_corriente_control_session->id_cuenta_corrienteFK_Idcuenta_corriente;
		$this->id_ejercicioFK_Idejercicio=$retiro_cuenta_corriente_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$retiro_cuenta_corriente_control_session->id_empresaFK_Idempresa;
		$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro=$retiro_cuenta_corriente_control_session->id_estado_deposito_retiroFK_Idestado_deposito_retiro;
		$this->id_periodoFK_Idperiodo=$retiro_cuenta_corriente_control_session->id_periodoFK_Idperiodo;
		$this->id_sucursalFK_Idsucursal=$retiro_cuenta_corriente_control_session->id_sucursalFK_Idsucursal;
		$this->id_usuarioFK_Idusuario=$retiro_cuenta_corriente_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getretiro_cuenta_corrienteControllerAdditional() {
		return $this->retiro_cuenta_corrienteControllerAdditional;
	}

	public function setretiro_cuenta_corrienteControllerAdditional($retiro_cuenta_corrienteControllerAdditional) {
		$this->retiro_cuenta_corrienteControllerAdditional = $retiro_cuenta_corrienteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getretiro_cuenta_corrienteActual() : retiro_cuenta_corriente {
		return $this->retiro_cuenta_corrienteActual;
	}

	public function setretiro_cuenta_corrienteActual(retiro_cuenta_corriente $retiro_cuenta_corrienteActual) {
		$this->retiro_cuenta_corrienteActual = $retiro_cuenta_corrienteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidretiro_cuenta_corriente() : int {
		return $this->idretiro_cuenta_corriente;
	}

	public function setidretiro_cuenta_corriente(int $idretiro_cuenta_corriente) {
		$this->idretiro_cuenta_corriente = $idretiro_cuenta_corriente;
	}
	
	public function getretiro_cuenta_corriente() : retiro_cuenta_corriente {
		return $this->retiro_cuenta_corriente;
	}

	public function setretiro_cuenta_corriente(retiro_cuenta_corriente $retiro_cuenta_corriente) {
		$this->retiro_cuenta_corriente = $retiro_cuenta_corriente;
	}
		
	public function getretiro_cuenta_corrienteLogic() : retiro_cuenta_corriente_logic {		
		return $this->retiro_cuenta_corrienteLogic;
	}

	public function setretiro_cuenta_corrienteLogic(retiro_cuenta_corriente_logic $retiro_cuenta_corrienteLogic) {
		$this->retiro_cuenta_corrienteLogic = $retiro_cuenta_corrienteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getretiro_cuenta_corrientesModel() {		
		try {						
			/*retiro_cuenta_corrientesModel.setWrappedData(retiro_cuenta_corrienteLogic->getretiro_cuenta_corrientes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->retiro_cuenta_corrientesModel;
	}
	
	public function setretiro_cuenta_corrientesModel($retiro_cuenta_corrientesModel) {
		$this->retiro_cuenta_corrientesModel = $retiro_cuenta_corrientesModel;
	}
	
	public function getretiro_cuenta_corrientes() : array {		
		return $this->retiro_cuenta_corrientes;
	}
	
	public function setretiro_cuenta_corrientes(array $retiro_cuenta_corrientes) {
		$this->retiro_cuenta_corrientes= $retiro_cuenta_corrientes;
	}
	
	public function getretiro_cuenta_corrientesEliminados() : array {		
		return $this->retiro_cuenta_corrientesEliminados;
	}
	
	public function setretiro_cuenta_corrientesEliminados(array $retiro_cuenta_corrientesEliminados) {
		$this->retiro_cuenta_corrientesEliminados= $retiro_cuenta_corrientesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getretiro_cuenta_corrienteActualFromListDataModel() {
		try {
			/*$retiro_cuenta_corrienteClase= $this->retiro_cuenta_corrientesModel->getRowData();*/
			
			/*return $retiro_cuenta_corriente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
