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

namespace com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cuenta_cobrar/util/cuenta_cobrar_carga.php');
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_param_return;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic_add;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\session\cuenta_cobrar_session;


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

use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\entity\estado_cuentas_cobrar;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\logic\estado_cuentas_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\util\estado_cuentas_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\util\estado_cuentas_cobrar_util;

//REL


use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\presentation\session\debito_cuenta_cobrar_session;

use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\presentation\session\pago_cuenta_cobrar_session;

use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\presentation\session\credito_cuenta_cobrar_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_cobrar_init_control extends ControllerBase {	
	
	public $cuenta_cobrarClase=null;	
	public $cuenta_cobrarsModel=null;	
	public $cuenta_cobrarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcuenta_cobrar=0;	
	public ?int $idcuenta_cobrarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cuenta_cobrarLogic=null;
	
	public $cuenta_cobrarActual=null;	
	
	public $cuenta_cobrar=null;
	public $cuenta_cobrars=null;
	public $cuenta_cobrarsEliminados=array();
	public $cuenta_cobrarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cuenta_cobrarsLocal=array();
	public ?array $cuenta_cobrarsReporte=null;
	public ?array $cuenta_cobrarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcuenta_cobrar='onload';
	public string $strTipoPaginaAuxiliarcuenta_cobrar='none';
	public string $strTipoUsuarioAuxiliarcuenta_cobrar='none';
		
	public $cuenta_cobrarReturnGeneral=null;
	public $cuenta_cobrarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cuenta_cobrarModel=null;
	public $cuenta_cobrarControllerAdditional=null;
	
	
	

	public $cuentacobrardetalleLogic=null;

	public function  getcuenta_cobrar_detalleLogic() {
		return $this->cuentacobrardetalleLogic;
	}

	public function setcuenta_cobrar_detalleLogic($cuentacobrardetalleLogic) {
		$this->cuentacobrardetalleLogic =$cuentacobrardetalleLogic;
	}


	public $cuentacorrientedetalleLogic=null;

	public function  getcuenta_corriente_detalleLogic() {
		return $this->cuentacorrientedetalleLogic;
	}

	public function setcuenta_corriente_detalleLogic($cuentacorrientedetalleLogic) {
		$this->cuentacorrientedetalleLogic =$cuentacorrientedetalleLogic;
	}


	public $debitocuentacobrarLogic=null;

	public function  getdebito_cuenta_cobrarLogic() {
		return $this->debitocuentacobrarLogic;
	}

	public function setdebito_cuenta_cobrarLogic($debitocuentacobrarLogic) {
		$this->debitocuentacobrarLogic =$debitocuentacobrarLogic;
	}


	public $pagocuentacobrarLogic=null;

	public function  getpago_cuenta_cobrarLogic() {
		return $this->pagocuentacobrarLogic;
	}

	public function setpago_cuenta_cobrarLogic($pagocuentacobrarLogic) {
		$this->pagocuentacobrarLogic =$pagocuentacobrarLogic;
	}


	public $creditocuentacobrarLogic=null;

	public function  getcredito_cuenta_cobrarLogic() {
		return $this->creditocuentacobrarLogic;
	}

	public function setcredito_cuenta_cobrarLogic($creditocuentacobrarLogic) {
		$this->creditocuentacobrarLogic =$creditocuentacobrarLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_factura='';
	public string $strMensajeid_cliente='';
	public string $strMensajenumero='';
	public string $strMensajefecha_emision='';
	public string $strMensajefecha_vence='';
	public string $strMensajefecha_ultimo_movimiento='';
	public string $strMensajeid_termino_pago_cliente='';
	public string $strMensajemonto='';
	public string $strMensajesaldo='';
	public string $strMensajeporcentaje='';
	public string $strMensajedescripcion='';
	public string $strMensajeid_estado_cuentas_cobrar='';
	public string $strMensajereferencia='';
	
	
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idestado_cuentas_cobrar='display:table-row';
	public string $strVisibleFK_Idfactura='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';
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

	public array $facturasFK=array();

	public function getfacturasFK():array {
		return $this->facturasFK;
	}

	public function setfacturasFK(array $facturasFK) {
		$this->facturasFK = $facturasFK;
	}

	public int $idfacturaDefaultFK=-1;

	public function getIdfacturaDefaultFK():int {
		return $this->idfacturaDefaultFK;
	}

	public function setIdfacturaDefaultFK(int $idfacturaDefaultFK) {
		$this->idfacturaDefaultFK = $idfacturaDefaultFK;
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

	public array $estado_cuentas_cobrarsFK=array();

	public function getestado_cuentas_cobrarsFK():array {
		return $this->estado_cuentas_cobrarsFK;
	}

	public function setestado_cuentas_cobrarsFK(array $estado_cuentas_cobrarsFK) {
		$this->estado_cuentas_cobrarsFK = $estado_cuentas_cobrarsFK;
	}

	public int $idestado_cuentas_cobrarDefaultFK=-1;

	public function getIdestado_cuentas_cobrarDefaultFK():int {
		return $this->idestado_cuentas_cobrarDefaultFK;
	}

	public function setIdestado_cuentas_cobrarDefaultFK(int $idestado_cuentas_cobrarDefaultFK) {
		$this->idestado_cuentas_cobrarDefaultFK = $idestado_cuentas_cobrarDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisoscuenta_cobrar_detalle='none';
	public $strTienePermisoscuenta_corriente_detalle='none';
	public $strTienePermisosdebito_cuenta_cobrar='none';
	public $strTienePermisospago_cuenta_cobrar='none';
	public $strTienePermisoscredito_cuenta_cobrar='none';
	
	
	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_estado_cuentas_cobrarFK_Idestado_cuentas_cobrar=null;

	public  $id_facturaFK_Idfactura=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_clienteFK_Idproveedor=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_termino_pago_clienteFK_Idtermino_pago_cliente=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cuenta_cobrarLogic==null) {
				$this->cuenta_cobrarLogic=new cuenta_cobrar_logic();
			}
			
		} else {
			if($this->cuenta_cobrarLogic==null) {
				$this->cuenta_cobrarLogic=new cuenta_cobrar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cuenta_cobrarClase==null) {
				$this->cuenta_cobrarClase=new cuenta_cobrar();
			}
			
			$this->cuenta_cobrarClase->setId(0);	
				
				
			$this->cuenta_cobrarClase->setid_empresa(-1);	
			$this->cuenta_cobrarClase->setid_sucursal(-1);	
			$this->cuenta_cobrarClase->setid_ejercicio(-1);	
			$this->cuenta_cobrarClase->setid_periodo(-1);	
			$this->cuenta_cobrarClase->setid_usuario(-1);	
			$this->cuenta_cobrarClase->setid_factura(null);	
			$this->cuenta_cobrarClase->setid_cliente(-1);	
			$this->cuenta_cobrarClase->setnumero('');	
			$this->cuenta_cobrarClase->setfecha_emision(date('Y-m-d'));	
			$this->cuenta_cobrarClase->setfecha_vence(date('Y-m-d'));	
			$this->cuenta_cobrarClase->setfecha_ultimo_movimiento(date('Y-m-d'));	
			$this->cuenta_cobrarClase->setid_termino_pago_cliente(-1);	
			$this->cuenta_cobrarClase->setmonto(0.0);	
			$this->cuenta_cobrarClase->setsaldo(0.0);	
			$this->cuenta_cobrarClase->setporcentaje(0.0);	
			$this->cuenta_cobrarClase->setdescripcion('');	
			$this->cuenta_cobrarClase->setid_estado_cuentas_cobrar(-1);	
			$this->cuenta_cobrarClase->setreferencia('');	
			
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
		$this->prepararEjecutarMantenimientoBase('cuenta_cobrar');
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
		$this->cargarParametrosReporteBase('cuenta_cobrar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cuenta_cobrar');
	}
	
	public function actualizarControllerConReturnGeneral(cuenta_cobrar_param_return $cuenta_cobrarReturnGeneral) {
		if($cuenta_cobrarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescuenta_cobrarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cuenta_cobrarReturnGeneral->getsMensajeProceso();
		}
		
		if($cuenta_cobrarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cuenta_cobrarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cuenta_cobrarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cuenta_cobrarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cuenta_cobrarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cuenta_cobrarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cuenta_cobrarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cuenta_cobrarReturnGeneral->getsFuncionJs();
		}
		
		if($cuenta_cobrarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cuenta_cobrar_session $cuenta_cobrar_session){
		$this->strStyleDivArbol=$cuenta_cobrar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_cobrar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_cobrar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_cobrar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_cobrar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_cobrar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cuenta_cobrar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cuenta_cobrar_session $cuenta_cobrar_session){
		$cuenta_cobrar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cuenta_cobrar_session->strStyleDivHeader='display:none';			
		$cuenta_cobrar_session->strStyleDivContent='width:93%;height:100%';	
		$cuenta_cobrar_session->strStyleDivOpcionesBanner='display:none';	
		$cuenta_cobrar_session->strStyleDivExpandirColapsar='display:none';	
		$cuenta_cobrar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cuenta_cobrar_control $cuenta_cobrar_control_session){
		$this->idNuevo=$cuenta_cobrar_control_session->idNuevo;
		$this->cuenta_cobrarActual=$cuenta_cobrar_control_session->cuenta_cobrarActual;
		$this->cuenta_cobrar=$cuenta_cobrar_control_session->cuenta_cobrar;
		$this->cuenta_cobrarClase=$cuenta_cobrar_control_session->cuenta_cobrarClase;
		$this->cuenta_cobrars=$cuenta_cobrar_control_session->cuenta_cobrars;
		$this->cuenta_cobrarsEliminados=$cuenta_cobrar_control_session->cuenta_cobrarsEliminados;
		$this->cuenta_cobrar=$cuenta_cobrar_control_session->cuenta_cobrar;
		$this->cuenta_cobrarsReporte=$cuenta_cobrar_control_session->cuenta_cobrarsReporte;
		$this->cuenta_cobrarsSeleccionados=$cuenta_cobrar_control_session->cuenta_cobrarsSeleccionados;
		$this->arrOrderBy=$cuenta_cobrar_control_session->arrOrderBy;
		$this->arrOrderByRel=$cuenta_cobrar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cuenta_cobrar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cuenta_cobrar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcuenta_cobrar=$cuenta_cobrar_control_session->strTypeOnLoadcuenta_cobrar;
		$this->strTipoPaginaAuxiliarcuenta_cobrar=$cuenta_cobrar_control_session->strTipoPaginaAuxiliarcuenta_cobrar;
		$this->strTipoUsuarioAuxiliarcuenta_cobrar=$cuenta_cobrar_control_session->strTipoUsuarioAuxiliarcuenta_cobrar;	
		
		$this->bitEsPopup=$cuenta_cobrar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cuenta_cobrar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cuenta_cobrar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cuenta_cobrar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cuenta_cobrar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cuenta_cobrar_control_session->strSufijo;
		$this->bitEsRelaciones=$cuenta_cobrar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cuenta_cobrar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cuenta_cobrar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cuenta_cobrar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cuenta_cobrar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cuenta_cobrar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cuenta_cobrar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cuenta_cobrar_control_session->strTituloPathElementoActual;
		
		if($this->cuenta_cobrarLogic==null) {			
			$this->cuenta_cobrarLogic=new cuenta_cobrar_logic();
		}
		
		
		if($this->cuenta_cobrarClase==null) {
			$this->cuenta_cobrarClase=new cuenta_cobrar();	
		}
		
		$this->cuenta_cobrarLogic->setcuenta_cobrar($this->cuenta_cobrarClase);
		
		
		if($this->cuenta_cobrars==null) {
			$this->cuenta_cobrars=array();	
		}
		
		$this->cuenta_cobrarLogic->setcuenta_cobrars($this->cuenta_cobrars);
		
		
		$this->strTipoView=$cuenta_cobrar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cuenta_cobrar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cuenta_cobrar_control_session->datosCliente;
		$this->strAccionBusqueda=$cuenta_cobrar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cuenta_cobrar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cuenta_cobrar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cuenta_cobrar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cuenta_cobrar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cuenta_cobrar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cuenta_cobrar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cuenta_cobrar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cuenta_cobrar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cuenta_cobrar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cuenta_cobrar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cuenta_cobrar_control_session->strTipoAccion;
		$this->tiposReportes=$cuenta_cobrar_control_session->tiposReportes;
		$this->tiposReporte=$cuenta_cobrar_control_session->tiposReporte;
		$this->tiposAcciones=$cuenta_cobrar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cuenta_cobrar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cuenta_cobrar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cuenta_cobrar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cuenta_cobrar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cuenta_cobrar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cuenta_cobrar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cuenta_cobrar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cuenta_cobrar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cuenta_cobrar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cuenta_cobrar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cuenta_cobrar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cuenta_cobrar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cuenta_cobrar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cuenta_cobrar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cuenta_cobrar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cuenta_cobrar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cuenta_cobrar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cuenta_cobrar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cuenta_cobrar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cuenta_cobrar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cuenta_cobrar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cuenta_cobrar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cuenta_cobrar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cuenta_cobrar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cuenta_cobrar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cuenta_cobrar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cuenta_cobrar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cuenta_cobrar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cuenta_cobrar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cuenta_cobrar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cuenta_cobrar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cuenta_cobrar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cuenta_cobrar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cuenta_cobrar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cuenta_cobrar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cuenta_cobrar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cuenta_cobrar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cuenta_cobrar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cuenta_cobrar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cuenta_cobrar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cuenta_cobrar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cuenta_cobrar_control_session->moduloActual;	
		$this->opcionActual=$cuenta_cobrar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cuenta_cobrar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cuenta_cobrar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
				
		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		$this->strStyleDivArbol=$cuenta_cobrar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_cobrar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_cobrar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_cobrar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_cobrar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_cobrar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cuenta_cobrar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cuenta_cobrar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cuenta_cobrar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cuenta_cobrar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cuenta_cobrar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cuenta_cobrar_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$cuenta_cobrar_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$cuenta_cobrar_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$cuenta_cobrar_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$cuenta_cobrar_control_session->strMensajeid_usuario;
		$this->strMensajeid_factura=$cuenta_cobrar_control_session->strMensajeid_factura;
		$this->strMensajeid_cliente=$cuenta_cobrar_control_session->strMensajeid_cliente;
		$this->strMensajenumero=$cuenta_cobrar_control_session->strMensajenumero;
		$this->strMensajefecha_emision=$cuenta_cobrar_control_session->strMensajefecha_emision;
		$this->strMensajefecha_vence=$cuenta_cobrar_control_session->strMensajefecha_vence;
		$this->strMensajefecha_ultimo_movimiento=$cuenta_cobrar_control_session->strMensajefecha_ultimo_movimiento;
		$this->strMensajeid_termino_pago_cliente=$cuenta_cobrar_control_session->strMensajeid_termino_pago_cliente;
		$this->strMensajemonto=$cuenta_cobrar_control_session->strMensajemonto;
		$this->strMensajesaldo=$cuenta_cobrar_control_session->strMensajesaldo;
		$this->strMensajeporcentaje=$cuenta_cobrar_control_session->strMensajeporcentaje;
		$this->strMensajedescripcion=$cuenta_cobrar_control_session->strMensajedescripcion;
		$this->strMensajeid_estado_cuentas_cobrar=$cuenta_cobrar_control_session->strMensajeid_estado_cuentas_cobrar;
		$this->strMensajereferencia=$cuenta_cobrar_control_session->strMensajereferencia;
			
		
		$this->empresasFK=$cuenta_cobrar_control_session->empresasFK;
		$this->idempresaDefaultFK=$cuenta_cobrar_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$cuenta_cobrar_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$cuenta_cobrar_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$cuenta_cobrar_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$cuenta_cobrar_control_session->idejercicioDefaultFK;
		$this->periodosFK=$cuenta_cobrar_control_session->periodosFK;
		$this->idperiodoDefaultFK=$cuenta_cobrar_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$cuenta_cobrar_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$cuenta_cobrar_control_session->idusuarioDefaultFK;
		$this->facturasFK=$cuenta_cobrar_control_session->facturasFK;
		$this->idfacturaDefaultFK=$cuenta_cobrar_control_session->idfacturaDefaultFK;
		$this->clientesFK=$cuenta_cobrar_control_session->clientesFK;
		$this->idclienteDefaultFK=$cuenta_cobrar_control_session->idclienteDefaultFK;
		$this->termino_pago_clientesFK=$cuenta_cobrar_control_session->termino_pago_clientesFK;
		$this->idtermino_pago_clienteDefaultFK=$cuenta_cobrar_control_session->idtermino_pago_clienteDefaultFK;
		$this->estado_cuentas_cobrarsFK=$cuenta_cobrar_control_session->estado_cuentas_cobrarsFK;
		$this->idestado_cuentas_cobrarDefaultFK=$cuenta_cobrar_control_session->idestado_cuentas_cobrarDefaultFK;
		
		
		$this->strVisibleFK_Idejercicio=$cuenta_cobrar_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$cuenta_cobrar_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idestado_cuentas_cobrar=$cuenta_cobrar_control_session->strVisibleFK_Idestado_cuentas_cobrar;
		$this->strVisibleFK_Idfactura=$cuenta_cobrar_control_session->strVisibleFK_Idfactura;
		$this->strVisibleFK_Idperiodo=$cuenta_cobrar_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idproveedor=$cuenta_cobrar_control_session->strVisibleFK_Idproveedor;
		$this->strVisibleFK_Idsucursal=$cuenta_cobrar_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtermino_pago_cliente=$cuenta_cobrar_control_session->strVisibleFK_Idtermino_pago_cliente;
		$this->strVisibleFK_Idusuario=$cuenta_cobrar_control_session->strVisibleFK_Idusuario;
		
		
		$this->strTienePermisoscuenta_cobrar_detalle=$cuenta_cobrar_control_session->strTienePermisoscuenta_cobrar_detalle;
		$this->strTienePermisoscuenta_corriente_detalle=$cuenta_cobrar_control_session->strTienePermisoscuenta_corriente_detalle;
		$this->strTienePermisosdebito_cuenta_cobrar=$cuenta_cobrar_control_session->strTienePermisosdebito_cuenta_cobrar;
		$this->strTienePermisospago_cuenta_cobrar=$cuenta_cobrar_control_session->strTienePermisospago_cuenta_cobrar;
		$this->strTienePermisoscredito_cuenta_cobrar=$cuenta_cobrar_control_session->strTienePermisoscredito_cuenta_cobrar;
		
		
		$this->id_ejercicioFK_Idejercicio=$cuenta_cobrar_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$cuenta_cobrar_control_session->id_empresaFK_Idempresa;
		$this->id_estado_cuentas_cobrarFK_Idestado_cuentas_cobrar=$cuenta_cobrar_control_session->id_estado_cuentas_cobrarFK_Idestado_cuentas_cobrar;
		$this->id_facturaFK_Idfactura=$cuenta_cobrar_control_session->id_facturaFK_Idfactura;
		$this->id_periodoFK_Idperiodo=$cuenta_cobrar_control_session->id_periodoFK_Idperiodo;
		$this->id_clienteFK_Idproveedor=$cuenta_cobrar_control_session->id_clienteFK_Idproveedor;
		$this->id_sucursalFK_Idsucursal=$cuenta_cobrar_control_session->id_sucursalFK_Idsucursal;
		$this->id_termino_pago_clienteFK_Idtermino_pago_cliente=$cuenta_cobrar_control_session->id_termino_pago_clienteFK_Idtermino_pago_cliente;
		$this->id_usuarioFK_Idusuario=$cuenta_cobrar_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getcuenta_cobrarControllerAdditional() {
		return $this->cuenta_cobrarControllerAdditional;
	}

	public function setcuenta_cobrarControllerAdditional($cuenta_cobrarControllerAdditional) {
		$this->cuenta_cobrarControllerAdditional = $cuenta_cobrarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcuenta_cobrarActual() : cuenta_cobrar {
		return $this->cuenta_cobrarActual;
	}

	public function setcuenta_cobrarActual(cuenta_cobrar $cuenta_cobrarActual) {
		$this->cuenta_cobrarActual = $cuenta_cobrarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcuenta_cobrar() : int {
		return $this->idcuenta_cobrar;
	}

	public function setidcuenta_cobrar(int $idcuenta_cobrar) {
		$this->idcuenta_cobrar = $idcuenta_cobrar;
	}
	
	public function getcuenta_cobrar() : cuenta_cobrar {
		return $this->cuenta_cobrar;
	}

	public function setcuenta_cobrar(cuenta_cobrar $cuenta_cobrar) {
		$this->cuenta_cobrar = $cuenta_cobrar;
	}
		
	public function getcuenta_cobrarLogic() : cuenta_cobrar_logic {		
		return $this->cuenta_cobrarLogic;
	}

	public function setcuenta_cobrarLogic(cuenta_cobrar_logic $cuenta_cobrarLogic) {
		$this->cuenta_cobrarLogic = $cuenta_cobrarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcuenta_cobrarsModel() {		
		try {						
			/*cuenta_cobrarsModel.setWrappedData(cuenta_cobrarLogic->getcuenta_cobrars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cuenta_cobrarsModel;
	}
	
	public function setcuenta_cobrarsModel($cuenta_cobrarsModel) {
		$this->cuenta_cobrarsModel = $cuenta_cobrarsModel;
	}
	
	public function getcuenta_cobrars() : array {		
		return $this->cuenta_cobrars;
	}
	
	public function setcuenta_cobrars(array $cuenta_cobrars) {
		$this->cuenta_cobrars= $cuenta_cobrars;
	}
	
	public function getcuenta_cobrarsEliminados() : array {		
		return $this->cuenta_cobrarsEliminados;
	}
	
	public function setcuenta_cobrarsEliminados(array $cuenta_cobrarsEliminados) {
		$this->cuenta_cobrarsEliminados= $cuenta_cobrarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcuenta_cobrarActualFromListDataModel() {
		try {
			/*$cuenta_cobrarClase= $this->cuenta_cobrarsModel->getRowData();*/
			
			/*return $cuenta_cobrar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
