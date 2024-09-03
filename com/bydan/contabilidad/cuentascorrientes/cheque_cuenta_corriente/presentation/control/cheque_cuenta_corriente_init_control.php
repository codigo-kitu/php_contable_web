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

namespace com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\entity\cheque_cuenta_corriente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/cheque_cuenta_corriente/util/cheque_cuenta_corriente_carga.php');
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;

use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_param_return;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\logic\cheque_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\logic\cheque_cuenta_corriente_logic_add;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;


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

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\logic\categoria_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity\beneficiario_ocacional_cheque;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\logic\beneficiario_ocacional_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_util;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\logic\estado_deposito_retiro_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_carga;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cheque_cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cheque_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cheque_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cheque_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cheque_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cheque_cuenta_corriente_init_control extends ControllerBase {	
	
	public $cheque_cuenta_corrienteClase=null;	
	public $cheque_cuenta_corrientesModel=null;	
	public $cheque_cuenta_corrientesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcheque_cuenta_corriente=0;	
	public ?int $idcheque_cuenta_corrienteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cheque_cuenta_corrienteLogic=null;
	
	public $cheque_cuenta_corrienteActual=null;	
	
	public $cheque_cuenta_corriente=null;
	public $cheque_cuenta_corrientes=null;
	public $cheque_cuenta_corrientesEliminados=array();
	public $cheque_cuenta_corrientesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cheque_cuenta_corrientesLocal=array();
	public ?array $cheque_cuenta_corrientesReporte=null;
	public ?array $cheque_cuenta_corrientesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcheque_cuenta_corriente='onload';
	public string $strTipoPaginaAuxiliarcheque_cuenta_corriente='none';
	public string $strTipoUsuarioAuxiliarcheque_cuenta_corriente='none';
		
	public $cheque_cuenta_corrienteReturnGeneral=null;
	public $cheque_cuenta_corrienteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cheque_cuenta_corrienteModel=null;
	public $cheque_cuenta_corrienteControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_cuenta_corriente='';
	public string $strMensajeid_categoria_cheque='';
	public string $strMensajeid_cliente='';
	public string $strMensajeid_proveedor='';
	public string $strMensajeid_beneficiario_ocacional_cheque='';
	public string $strMensajenumero_cheque='';
	public string $strMensajefecha_emision='';
	public string $strMensajemonto='';
	public string $strMensajemonto_texto='';
	public string $strMensajesaldo='';
	public string $strMensajedescripcion='';
	public string $strMensajecobrado='';
	public string $strMensajeimpreso='';
	public string $strMensajeid_estado_deposito_retiro='';
	public string $strMensajedebito='';
	public string $strMensajecredito='';
	
	
	public string $strVisibleFK_Idbeneficiario_ocacional='display:table-row';
	public string $strVisibleFK_Idcategoria_cheque='display:table-row';
	public string $strVisibleFK_Idcliente='display:table-row';
	public string $strVisibleFK_Idcuenta_corriente='display:table-row';
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado_deposito_retiro='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';
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

	public array $categoria_chequesFK=array();

	public function getcategoria_chequesFK():array {
		return $this->categoria_chequesFK;
	}

	public function setcategoria_chequesFK(array $categoria_chequesFK) {
		$this->categoria_chequesFK = $categoria_chequesFK;
	}

	public int $idcategoria_chequeDefaultFK=-1;

	public function getIdcategoria_chequeDefaultFK():int {
		return $this->idcategoria_chequeDefaultFK;
	}

	public function setIdcategoria_chequeDefaultFK(int $idcategoria_chequeDefaultFK) {
		$this->idcategoria_chequeDefaultFK = $idcategoria_chequeDefaultFK;
	}

	public array $clientesFK=array();

	public function getclientesFK():array {
		return $this->clientesFK;
	}

	public function setclientesFK(array $clientesFK) {
		$this->clientesFK = $clientesFK;
	}

	public int $idclienteDefaultFK=-1;

	public function getIdclienteDefaultFK():int {
		return $this->idclienteDefaultFK;
	}

	public function setIdclienteDefaultFK(int $idclienteDefaultFK) {
		$this->idclienteDefaultFK = $idclienteDefaultFK;
	}

	public array $proveedorsFK=array();

	public function getproveedorsFK():array {
		return $this->proveedorsFK;
	}

	public function setproveedorsFK(array $proveedorsFK) {
		$this->proveedorsFK = $proveedorsFK;
	}

	public int $idproveedorDefaultFK=-1;

	public function getIdproveedorDefaultFK():int {
		return $this->idproveedorDefaultFK;
	}

	public function setIdproveedorDefaultFK(int $idproveedorDefaultFK) {
		$this->idproveedorDefaultFK = $idproveedorDefaultFK;
	}

	public array $beneficiario_ocacional_chequesFK=array();

	public function getbeneficiario_ocacional_chequesFK():array {
		return $this->beneficiario_ocacional_chequesFK;
	}

	public function setbeneficiario_ocacional_chequesFK(array $beneficiario_ocacional_chequesFK) {
		$this->beneficiario_ocacional_chequesFK = $beneficiario_ocacional_chequesFK;
	}

	public int $idbeneficiario_ocacional_chequeDefaultFK=-1;

	public function getIdbeneficiario_ocacional_chequeDefaultFK():int {
		return $this->idbeneficiario_ocacional_chequeDefaultFK;
	}

	public function setIdbeneficiario_ocacional_chequeDefaultFK(int $idbeneficiario_ocacional_chequeDefaultFK) {
		$this->idbeneficiario_ocacional_chequeDefaultFK = $idbeneficiario_ocacional_chequeDefaultFK;
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

	
	
	
	
	
	
	
	
	public  $id_beneficiario_ocacional_chequeFK_Idbeneficiario_ocacional=null;

	public  $id_categoria_chequeFK_Idcategoria_cheque=null;

	public  $id_clienteFK_Idcliente=null;

	public  $id_cuenta_corrienteFK_Idcuenta_corriente=null;

	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estado_deposito_retiroFK_Idestado_deposito_retiro=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_proveedorFK_Idproveedor=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cheque_cuenta_corrienteLogic==null) {
				$this->cheque_cuenta_corrienteLogic=new cheque_cuenta_corriente_logic();
			}
			
		} else {
			if($this->cheque_cuenta_corrienteLogic==null) {
				$this->cheque_cuenta_corrienteLogic=new cheque_cuenta_corriente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cheque_cuenta_corrienteClase==null) {
				$this->cheque_cuenta_corrienteClase=new cheque_cuenta_corriente();
			}
			
			$this->cheque_cuenta_corrienteClase->setId(0);	
				
				
			$this->cheque_cuenta_corrienteClase->setid_empresa(-1);	
			$this->cheque_cuenta_corrienteClase->setid_sucursal(-1);	
			$this->cheque_cuenta_corrienteClase->setid_ejercicio(-1);	
			$this->cheque_cuenta_corrienteClase->setid_periodo(-1);	
			$this->cheque_cuenta_corrienteClase->setid_usuario(-1);	
			$this->cheque_cuenta_corrienteClase->setid_cuenta_corriente(-1);	
			$this->cheque_cuenta_corrienteClase->setid_categoria_cheque(-1);	
			$this->cheque_cuenta_corrienteClase->setid_cliente(null);	
			$this->cheque_cuenta_corrienteClase->setid_proveedor(null);	
			$this->cheque_cuenta_corrienteClase->setid_beneficiario_ocacional_cheque(null);	
			$this->cheque_cuenta_corrienteClase->setnumero_cheque('');	
			$this->cheque_cuenta_corrienteClase->setfecha_emision(date('Y-m-d'));	
			$this->cheque_cuenta_corrienteClase->setmonto(0.0);	
			$this->cheque_cuenta_corrienteClase->setmonto_texto('');	
			$this->cheque_cuenta_corrienteClase->setsaldo(0.0);	
			$this->cheque_cuenta_corrienteClase->setdescripcion('');	
			$this->cheque_cuenta_corrienteClase->setcobrado(false);	
			$this->cheque_cuenta_corrienteClase->setimpreso(false);	
			$this->cheque_cuenta_corrienteClase->setid_estado_deposito_retiro(-1);	
			$this->cheque_cuenta_corrienteClase->setdebito(0.0);	
			$this->cheque_cuenta_corrienteClase->setcredito(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('cheque_cuenta_corriente');
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
		$this->cargarParametrosReporteBase('cheque_cuenta_corriente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cheque_cuenta_corriente');
	}
	
	public function actualizarControllerConReturnGeneral(cheque_cuenta_corriente_param_return $cheque_cuenta_corrienteReturnGeneral) {
		if($cheque_cuenta_corrienteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescheque_cuenta_corrientesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cheque_cuenta_corrienteReturnGeneral->getsMensajeProceso();
		}
		
		if($cheque_cuenta_corrienteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cheque_cuenta_corrienteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cheque_cuenta_corrienteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cheque_cuenta_corrienteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cheque_cuenta_corrienteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cheque_cuenta_corrienteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cheque_cuenta_corrienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cheque_cuenta_corrienteReturnGeneral->getsFuncionJs();
		}
		
		if($cheque_cuenta_corrienteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session){
		$this->strStyleDivArbol=$cheque_cuenta_corriente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cheque_cuenta_corriente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cheque_cuenta_corriente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cheque_cuenta_corriente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cheque_cuenta_corriente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cheque_cuenta_corriente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cheque_cuenta_corriente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session){
		$cheque_cuenta_corriente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cheque_cuenta_corriente_session->strStyleDivHeader='display:none';			
		$cheque_cuenta_corriente_session->strStyleDivContent='width:93%;height:100%';	
		$cheque_cuenta_corriente_session->strStyleDivOpcionesBanner='display:none';	
		$cheque_cuenta_corriente_session->strStyleDivExpandirColapsar='display:none';	
		$cheque_cuenta_corriente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cheque_cuenta_corriente_control $cheque_cuenta_corriente_control_session){
		$this->idNuevo=$cheque_cuenta_corriente_control_session->idNuevo;
		$this->cheque_cuenta_corrienteActual=$cheque_cuenta_corriente_control_session->cheque_cuenta_corrienteActual;
		$this->cheque_cuenta_corriente=$cheque_cuenta_corriente_control_session->cheque_cuenta_corriente;
		$this->cheque_cuenta_corrienteClase=$cheque_cuenta_corriente_control_session->cheque_cuenta_corrienteClase;
		$this->cheque_cuenta_corrientes=$cheque_cuenta_corriente_control_session->cheque_cuenta_corrientes;
		$this->cheque_cuenta_corrientesEliminados=$cheque_cuenta_corriente_control_session->cheque_cuenta_corrientesEliminados;
		$this->cheque_cuenta_corriente=$cheque_cuenta_corriente_control_session->cheque_cuenta_corriente;
		$this->cheque_cuenta_corrientesReporte=$cheque_cuenta_corriente_control_session->cheque_cuenta_corrientesReporte;
		$this->cheque_cuenta_corrientesSeleccionados=$cheque_cuenta_corriente_control_session->cheque_cuenta_corrientesSeleccionados;
		$this->arrOrderBy=$cheque_cuenta_corriente_control_session->arrOrderBy;
		$this->arrOrderByRel=$cheque_cuenta_corriente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cheque_cuenta_corriente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cheque_cuenta_corriente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcheque_cuenta_corriente=$cheque_cuenta_corriente_control_session->strTypeOnLoadcheque_cuenta_corriente;
		$this->strTipoPaginaAuxiliarcheque_cuenta_corriente=$cheque_cuenta_corriente_control_session->strTipoPaginaAuxiliarcheque_cuenta_corriente;
		$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente=$cheque_cuenta_corriente_control_session->strTipoUsuarioAuxiliarcheque_cuenta_corriente;	
		
		$this->bitEsPopup=$cheque_cuenta_corriente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cheque_cuenta_corriente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cheque_cuenta_corriente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cheque_cuenta_corriente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cheque_cuenta_corriente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cheque_cuenta_corriente_control_session->strSufijo;
		$this->bitEsRelaciones=$cheque_cuenta_corriente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cheque_cuenta_corriente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cheque_cuenta_corriente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cheque_cuenta_corriente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cheque_cuenta_corriente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cheque_cuenta_corriente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cheque_cuenta_corriente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cheque_cuenta_corriente_control_session->strTituloPathElementoActual;
		
		if($this->cheque_cuenta_corrienteLogic==null) {			
			$this->cheque_cuenta_corrienteLogic=new cheque_cuenta_corriente_logic();
		}
		
		
		if($this->cheque_cuenta_corrienteClase==null) {
			$this->cheque_cuenta_corrienteClase=new cheque_cuenta_corriente();	
		}
		
		$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corriente($this->cheque_cuenta_corrienteClase);
		
		
		if($this->cheque_cuenta_corrientes==null) {
			$this->cheque_cuenta_corrientes=array();	
		}
		
		$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($this->cheque_cuenta_corrientes);
		
		
		$this->strTipoView=$cheque_cuenta_corriente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cheque_cuenta_corriente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cheque_cuenta_corriente_control_session->datosCliente;
		$this->strAccionBusqueda=$cheque_cuenta_corriente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cheque_cuenta_corriente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cheque_cuenta_corriente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cheque_cuenta_corriente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cheque_cuenta_corriente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cheque_cuenta_corriente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cheque_cuenta_corriente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cheque_cuenta_corriente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cheque_cuenta_corriente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cheque_cuenta_corriente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cheque_cuenta_corriente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cheque_cuenta_corriente_control_session->strTipoAccion;
		$this->tiposReportes=$cheque_cuenta_corriente_control_session->tiposReportes;
		$this->tiposReporte=$cheque_cuenta_corriente_control_session->tiposReporte;
		$this->tiposAcciones=$cheque_cuenta_corriente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cheque_cuenta_corriente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cheque_cuenta_corriente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cheque_cuenta_corriente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cheque_cuenta_corriente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cheque_cuenta_corriente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cheque_cuenta_corriente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cheque_cuenta_corriente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cheque_cuenta_corriente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cheque_cuenta_corriente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cheque_cuenta_corriente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cheque_cuenta_corriente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cheque_cuenta_corriente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cheque_cuenta_corriente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cheque_cuenta_corriente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cheque_cuenta_corriente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cheque_cuenta_corriente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cheque_cuenta_corriente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cheque_cuenta_corriente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cheque_cuenta_corriente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cheque_cuenta_corriente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cheque_cuenta_corriente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cheque_cuenta_corriente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cheque_cuenta_corriente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cheque_cuenta_corriente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cheque_cuenta_corriente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cheque_cuenta_corriente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cheque_cuenta_corriente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cheque_cuenta_corriente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cheque_cuenta_corriente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cheque_cuenta_corriente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cheque_cuenta_corriente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cheque_cuenta_corriente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cheque_cuenta_corriente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cheque_cuenta_corriente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cheque_cuenta_corriente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cheque_cuenta_corriente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cheque_cuenta_corriente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cheque_cuenta_corriente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cheque_cuenta_corriente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cheque_cuenta_corriente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cheque_cuenta_corriente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cheque_cuenta_corriente_control_session->moduloActual;	
		$this->opcionActual=$cheque_cuenta_corriente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cheque_cuenta_corriente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cheque_cuenta_corriente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
				
		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		$this->strStyleDivArbol=$cheque_cuenta_corriente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cheque_cuenta_corriente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cheque_cuenta_corriente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cheque_cuenta_corriente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cheque_cuenta_corriente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cheque_cuenta_corriente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cheque_cuenta_corriente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cheque_cuenta_corriente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cheque_cuenta_corriente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cheque_cuenta_corriente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cheque_cuenta_corriente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cheque_cuenta_corriente_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$cheque_cuenta_corriente_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$cheque_cuenta_corriente_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$cheque_cuenta_corriente_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$cheque_cuenta_corriente_control_session->strMensajeid_usuario;
		$this->strMensajeid_cuenta_corriente=$cheque_cuenta_corriente_control_session->strMensajeid_cuenta_corriente;
		$this->strMensajeid_categoria_cheque=$cheque_cuenta_corriente_control_session->strMensajeid_categoria_cheque;
		$this->strMensajeid_cliente=$cheque_cuenta_corriente_control_session->strMensajeid_cliente;
		$this->strMensajeid_proveedor=$cheque_cuenta_corriente_control_session->strMensajeid_proveedor;
		$this->strMensajeid_beneficiario_ocacional_cheque=$cheque_cuenta_corriente_control_session->strMensajeid_beneficiario_ocacional_cheque;
		$this->strMensajenumero_cheque=$cheque_cuenta_corriente_control_session->strMensajenumero_cheque;
		$this->strMensajefecha_emision=$cheque_cuenta_corriente_control_session->strMensajefecha_emision;
		$this->strMensajemonto=$cheque_cuenta_corriente_control_session->strMensajemonto;
		$this->strMensajemonto_texto=$cheque_cuenta_corriente_control_session->strMensajemonto_texto;
		$this->strMensajesaldo=$cheque_cuenta_corriente_control_session->strMensajesaldo;
		$this->strMensajedescripcion=$cheque_cuenta_corriente_control_session->strMensajedescripcion;
		$this->strMensajecobrado=$cheque_cuenta_corriente_control_session->strMensajecobrado;
		$this->strMensajeimpreso=$cheque_cuenta_corriente_control_session->strMensajeimpreso;
		$this->strMensajeid_estado_deposito_retiro=$cheque_cuenta_corriente_control_session->strMensajeid_estado_deposito_retiro;
		$this->strMensajedebito=$cheque_cuenta_corriente_control_session->strMensajedebito;
		$this->strMensajecredito=$cheque_cuenta_corriente_control_session->strMensajecredito;
			
		
		$this->empresasFK=$cheque_cuenta_corriente_control_session->empresasFK;
		$this->idempresaDefaultFK=$cheque_cuenta_corriente_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$cheque_cuenta_corriente_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$cheque_cuenta_corriente_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$cheque_cuenta_corriente_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$cheque_cuenta_corriente_control_session->idejercicioDefaultFK;
		$this->periodosFK=$cheque_cuenta_corriente_control_session->periodosFK;
		$this->idperiodoDefaultFK=$cheque_cuenta_corriente_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$cheque_cuenta_corriente_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$cheque_cuenta_corriente_control_session->idusuarioDefaultFK;
		$this->cuenta_corrientesFK=$cheque_cuenta_corriente_control_session->cuenta_corrientesFK;
		$this->idcuenta_corrienteDefaultFK=$cheque_cuenta_corriente_control_session->idcuenta_corrienteDefaultFK;
		$this->categoria_chequesFK=$cheque_cuenta_corriente_control_session->categoria_chequesFK;
		$this->idcategoria_chequeDefaultFK=$cheque_cuenta_corriente_control_session->idcategoria_chequeDefaultFK;
		$this->clientesFK=$cheque_cuenta_corriente_control_session->clientesFK;
		$this->idclienteDefaultFK=$cheque_cuenta_corriente_control_session->idclienteDefaultFK;
		$this->proveedorsFK=$cheque_cuenta_corriente_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$cheque_cuenta_corriente_control_session->idproveedorDefaultFK;
		$this->beneficiario_ocacional_chequesFK=$cheque_cuenta_corriente_control_session->beneficiario_ocacional_chequesFK;
		$this->idbeneficiario_ocacional_chequeDefaultFK=$cheque_cuenta_corriente_control_session->idbeneficiario_ocacional_chequeDefaultFK;
		$this->estado_deposito_retirosFK=$cheque_cuenta_corriente_control_session->estado_deposito_retirosFK;
		$this->idestado_deposito_retiroDefaultFK=$cheque_cuenta_corriente_control_session->idestado_deposito_retiroDefaultFK;
		
		
		$this->strVisibleFK_Idbeneficiario_ocacional=$cheque_cuenta_corriente_control_session->strVisibleFK_Idbeneficiario_ocacional;
		$this->strVisibleFK_Idcategoria_cheque=$cheque_cuenta_corriente_control_session->strVisibleFK_Idcategoria_cheque;
		$this->strVisibleFK_Idcliente=$cheque_cuenta_corriente_control_session->strVisibleFK_Idcliente;
		$this->strVisibleFK_Idcuenta_corriente=$cheque_cuenta_corriente_control_session->strVisibleFK_Idcuenta_corriente;
		$this->strVisibleFK_Idejercicio=$cheque_cuenta_corriente_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$cheque_cuenta_corriente_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado_deposito_retiro=$cheque_cuenta_corriente_control_session->strVisibleFK_Idestado_deposito_retiro;
		$this->strVisibleFK_Idperiodo=$cheque_cuenta_corriente_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idproveedor=$cheque_cuenta_corriente_control_session->strVisibleFK_Idproveedor;
		$this->strVisibleFK_Idsucursal=$cheque_cuenta_corriente_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idusuario=$cheque_cuenta_corriente_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_beneficiario_ocacional_chequeFK_Idbeneficiario_ocacional=$cheque_cuenta_corriente_control_session->id_beneficiario_ocacional_chequeFK_Idbeneficiario_ocacional;
		$this->id_categoria_chequeFK_Idcategoria_cheque=$cheque_cuenta_corriente_control_session->id_categoria_chequeFK_Idcategoria_cheque;
		$this->id_clienteFK_Idcliente=$cheque_cuenta_corriente_control_session->id_clienteFK_Idcliente;
		$this->id_cuenta_corrienteFK_Idcuenta_corriente=$cheque_cuenta_corriente_control_session->id_cuenta_corrienteFK_Idcuenta_corriente;
		$this->id_ejercicioFK_Idejercicio=$cheque_cuenta_corriente_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$cheque_cuenta_corriente_control_session->id_empresaFK_Idempresa;
		$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro=$cheque_cuenta_corriente_control_session->id_estado_deposito_retiroFK_Idestado_deposito_retiro;
		$this->id_periodoFK_Idperiodo=$cheque_cuenta_corriente_control_session->id_periodoFK_Idperiodo;
		$this->id_proveedorFK_Idproveedor=$cheque_cuenta_corriente_control_session->id_proveedorFK_Idproveedor;
		$this->id_sucursalFK_Idsucursal=$cheque_cuenta_corriente_control_session->id_sucursalFK_Idsucursal;
		$this->id_usuarioFK_Idusuario=$cheque_cuenta_corriente_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getcheque_cuenta_corrienteControllerAdditional() {
		return $this->cheque_cuenta_corrienteControllerAdditional;
	}

	public function setcheque_cuenta_corrienteControllerAdditional($cheque_cuenta_corrienteControllerAdditional) {
		$this->cheque_cuenta_corrienteControllerAdditional = $cheque_cuenta_corrienteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcheque_cuenta_corrienteActual() : cheque_cuenta_corriente {
		return $this->cheque_cuenta_corrienteActual;
	}

	public function setcheque_cuenta_corrienteActual(cheque_cuenta_corriente $cheque_cuenta_corrienteActual) {
		$this->cheque_cuenta_corrienteActual = $cheque_cuenta_corrienteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcheque_cuenta_corriente() : int {
		return $this->idcheque_cuenta_corriente;
	}

	public function setidcheque_cuenta_corriente(int $idcheque_cuenta_corriente) {
		$this->idcheque_cuenta_corriente = $idcheque_cuenta_corriente;
	}
	
	public function getcheque_cuenta_corriente() : cheque_cuenta_corriente {
		return $this->cheque_cuenta_corriente;
	}

	public function setcheque_cuenta_corriente(cheque_cuenta_corriente $cheque_cuenta_corriente) {
		$this->cheque_cuenta_corriente = $cheque_cuenta_corriente;
	}
		
	public function getcheque_cuenta_corrienteLogic() : cheque_cuenta_corriente_logic {		
		return $this->cheque_cuenta_corrienteLogic;
	}

	public function setcheque_cuenta_corrienteLogic(cheque_cuenta_corriente_logic $cheque_cuenta_corrienteLogic) {
		$this->cheque_cuenta_corrienteLogic = $cheque_cuenta_corrienteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcheque_cuenta_corrientesModel() {		
		try {						
			/*cheque_cuenta_corrientesModel.setWrappedData(cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cheque_cuenta_corrientesModel;
	}
	
	public function setcheque_cuenta_corrientesModel($cheque_cuenta_corrientesModel) {
		$this->cheque_cuenta_corrientesModel = $cheque_cuenta_corrientesModel;
	}
	
	public function getcheque_cuenta_corrientes() : array {		
		return $this->cheque_cuenta_corrientes;
	}
	
	public function setcheque_cuenta_corrientes(array $cheque_cuenta_corrientes) {
		$this->cheque_cuenta_corrientes= $cheque_cuenta_corrientes;
	}
	
	public function getcheque_cuenta_corrientesEliminados() : array {		
		return $this->cheque_cuenta_corrientesEliminados;
	}
	
	public function setcheque_cuenta_corrientesEliminados(array $cheque_cuenta_corrientesEliminados) {
		$this->cheque_cuenta_corrientesEliminados= $cheque_cuenta_corrientesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcheque_cuenta_corrienteActualFromListDataModel() {
		try {
			/*$cheque_cuenta_corrienteClase= $this->cheque_cuenta_corrientesModel->getRowData();*/
			
			/*return $cheque_cuenta_corriente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
