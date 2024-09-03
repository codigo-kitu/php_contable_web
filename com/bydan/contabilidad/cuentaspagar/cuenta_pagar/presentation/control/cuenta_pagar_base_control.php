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

namespace com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/cuenta_pagar/util/cuenta_pagar_carga.php');
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_param_return;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic_add;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\session\cuenta_pagar_session;


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

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\entity\estado_cuentas_pagar;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\business\logic\estado_cuentas_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\util\estado_cuentas_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\util\estado_cuentas_pagar_util;

//REL


use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\presentation\session\debito_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\session\credito_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\session\pago_cuenta_pagar_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_pagar_base_control extends cuenta_pagar_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->cuenta_pagarClase==null) {		
				$this->cuenta_pagarClase=new cuenta_pagar();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_sucursal',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ejercicio',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_periodo',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_usuario',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_orden_compra')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_orden_compra',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_termino_pago_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado_cuentas_pagar')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_estado_cuentas_pagar',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->cuenta_pagarClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->cuenta_pagarClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->cuenta_pagarClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->cuenta_pagarClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->cuenta_pagarClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->cuenta_pagarClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->cuenta_pagarClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->cuenta_pagarClase->setid_orden_compra((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_orden_compra'));
				
				$this->cuenta_pagarClase->setid_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor'));
				
				$this->cuenta_pagarClase->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_proveedor'));
				
				$this->cuenta_pagarClase->setnumero($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero'));
				
				$this->cuenta_pagarClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->cuenta_pagarClase->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_vence')));
				
				$this->cuenta_pagarClase->setfecha_ultimo_movimiento(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_ultimo_movimiento')));
				
				$this->cuenta_pagarClase->setmonto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto'));
				
				$this->cuenta_pagarClase->setsaldo((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'saldo'));
				
				$this->cuenta_pagarClase->setporcentaje((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'porcentaje'));
				
				$this->cuenta_pagarClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->cuenta_pagarClase->setid_estado_cuentas_pagar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado_cuentas_pagar'));
				
				$this->cuenta_pagarClase->setreferencia($this->getDataCampoFormTabla('form'.$this->strSufijo,'referencia'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuenta_pagarModel->set($this->cuenta_pagarClase);
				
				/*$this->cuenta_pagarModel->set($this->migrarModelcuenta_pagar($this->cuenta_pagarClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->cuenta_pagarLogic->getcuenta_pagar()->setId($this->cuenta_pagarClase->getId());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setVersionRow($this->cuenta_pagarClase->getVersionRow());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setVersionRow($this->cuenta_pagarClase->getVersionRow());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setid_empresa($this->cuenta_pagarClase->getid_empresa());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setid_sucursal($this->cuenta_pagarClase->getid_sucursal());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setid_ejercicio($this->cuenta_pagarClase->getid_ejercicio());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setid_periodo($this->cuenta_pagarClase->getid_periodo());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setid_usuario($this->cuenta_pagarClase->getid_usuario());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setid_orden_compra($this->cuenta_pagarClase->getid_orden_compra());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setid_proveedor($this->cuenta_pagarClase->getid_proveedor());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setid_termino_pago_proveedor($this->cuenta_pagarClase->getid_termino_pago_proveedor());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setnumero($this->cuenta_pagarClase->getnumero());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setfecha_emision($this->cuenta_pagarClase->getfecha_emision());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setfecha_vence($this->cuenta_pagarClase->getfecha_vence());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setfecha_ultimo_movimiento($this->cuenta_pagarClase->getfecha_ultimo_movimiento());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setmonto($this->cuenta_pagarClase->getmonto());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setsaldo($this->cuenta_pagarClase->getsaldo());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setporcentaje($this->cuenta_pagarClase->getporcentaje());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setdescripcion($this->cuenta_pagarClase->getdescripcion());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setid_estado_cuentas_pagar($this->cuenta_pagarClase->getid_estado_cuentas_pagar());	
			$this->cuenta_pagarLogic->getcuenta_pagar()->setreferencia($this->cuenta_pagarClase->getreferencia());	
		} else {
			$this->cuenta_pagarClase->setId($this->cuenta_pagarLogic->getcuenta_pagar()->getId());	
			$this->cuenta_pagarClase->setVersionRow($this->cuenta_pagarLogic->getcuenta_pagar()->getVersionRow());	
			$this->cuenta_pagarClase->setVersionRow($this->cuenta_pagarLogic->getcuenta_pagar()->getVersionRow());	
			$this->cuenta_pagarClase->setid_empresa($this->cuenta_pagarLogic->getcuenta_pagar()->getid_empresa());	
			$this->cuenta_pagarClase->setid_sucursal($this->cuenta_pagarLogic->getcuenta_pagar()->getid_sucursal());	
			$this->cuenta_pagarClase->setid_ejercicio($this->cuenta_pagarLogic->getcuenta_pagar()->getid_ejercicio());	
			$this->cuenta_pagarClase->setid_periodo($this->cuenta_pagarLogic->getcuenta_pagar()->getid_periodo());	
			$this->cuenta_pagarClase->setid_usuario($this->cuenta_pagarLogic->getcuenta_pagar()->getid_usuario());	
			$this->cuenta_pagarClase->setid_orden_compra($this->cuenta_pagarLogic->getcuenta_pagar()->getid_orden_compra());	
			$this->cuenta_pagarClase->setid_proveedor($this->cuenta_pagarLogic->getcuenta_pagar()->getid_proveedor());	
			$this->cuenta_pagarClase->setid_termino_pago_proveedor($this->cuenta_pagarLogic->getcuenta_pagar()->getid_termino_pago_proveedor());	
			$this->cuenta_pagarClase->setnumero($this->cuenta_pagarLogic->getcuenta_pagar()->getnumero());	
			$this->cuenta_pagarClase->setfecha_emision($this->cuenta_pagarLogic->getcuenta_pagar()->getfecha_emision());	
			$this->cuenta_pagarClase->setfecha_vence($this->cuenta_pagarLogic->getcuenta_pagar()->getfecha_vence());	
			$this->cuenta_pagarClase->setfecha_ultimo_movimiento($this->cuenta_pagarLogic->getcuenta_pagar()->getfecha_ultimo_movimiento());	
			$this->cuenta_pagarClase->setmonto($this->cuenta_pagarLogic->getcuenta_pagar()->getmonto());	
			$this->cuenta_pagarClase->setsaldo($this->cuenta_pagarLogic->getcuenta_pagar()->getsaldo());	
			$this->cuenta_pagarClase->setporcentaje($this->cuenta_pagarLogic->getcuenta_pagar()->getporcentaje());	
			$this->cuenta_pagarClase->setdescripcion($this->cuenta_pagarLogic->getcuenta_pagar()->getdescripcion());	
			$this->cuenta_pagarClase->setid_estado_cuentas_pagar($this->cuenta_pagarLogic->getcuenta_pagar()->getid_estado_cuentas_pagar());	
			$this->cuenta_pagarClase->setreferencia($this->cuenta_pagarLogic->getcuenta_pagar()->getreferencia());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->cuenta_pagarModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_sucursal') {$this->strMensajeid_sucursal=$strMensajeCampo;}
		if($strNombreCampo=='id_ejercicio') {$this->strMensajeid_ejercicio=$strMensajeCampo;}
		if($strNombreCampo=='id_periodo') {$this->strMensajeid_periodo=$strMensajeCampo;}
		if($strNombreCampo=='id_usuario') {$this->strMensajeid_usuario=$strMensajeCampo;}
		if($strNombreCampo=='id_orden_compra') {$this->strMensajeid_orden_compra=$strMensajeCampo;}
		if($strNombreCampo=='id_proveedor') {$this->strMensajeid_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='id_termino_pago_proveedor') {$this->strMensajeid_termino_pago_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='numero') {$this->strMensajenumero=$strMensajeCampo;}
		if($strNombreCampo=='fecha_emision') {$this->strMensajefecha_emision=$strMensajeCampo;}
		if($strNombreCampo=='fecha_vence') {$this->strMensajefecha_vence=$strMensajeCampo;}
		if($strNombreCampo=='fecha_ultimo_movimiento') {$this->strMensajefecha_ultimo_movimiento=$strMensajeCampo;}
		if($strNombreCampo=='monto') {$this->strMensajemonto=$strMensajeCampo;}
		if($strNombreCampo=='saldo') {$this->strMensajesaldo=$strMensajeCampo;}
		if($strNombreCampo=='porcentaje') {$this->strMensajeporcentaje=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='id_estado_cuentas_pagar') {$this->strMensajeid_estado_cuentas_pagar=$strMensajeCampo;}
		if($strNombreCampo=='referencia') {$this->strMensajereferencia=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajeid_orden_compra='';
		$this->strMensajeid_proveedor='';
		$this->strMensajeid_termino_pago_proveedor='';
		$this->strMensajenumero='';
		$this->strMensajefecha_emision='';
		$this->strMensajefecha_vence='';
		$this->strMensajefecha_ultimo_movimiento='';
		$this->strMensajemonto='';
		$this->strMensajesaldo='';
		$this->strMensajeporcentaje='';
		$this->strMensajedescripcion='';
		$this->strMensajeid_estado_cuentas_pagar='';
		$this->strMensajereferencia='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			*/
			
			$this->manejarRetornarExcepcion($e);
			throw $e;
		}
	}
	
	public function actualizar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
						
			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
			}
			
			if(!$this->bitEsnuevo){ 
				$this->ejecutarMantenimiento(MaintenanceType::$ACTUALIZAR);
				
				if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {
					$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);					
					
				} else {
					$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
				}
				
			} else { 
				$this->nuevo();
				
				if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {
					$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);					
					
					if($this->bitPostAccionNuevo) {
						$this->bitEsnuevo=true;
					}
				} else {
					$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
				}
			}						
					
			
			
			if($this->bitPostAccionSinCerrar || $this->bitPostAccionNuevo) {				
				$this->strVisibleTablaElementos='table-row';
				$this->strVisibleTablaAcciones='table-row';	
				
			} else {
				/*OCULTA CAMPOS Y ACCIONES*/
				$this->cancelarControles();
			}
			
			
			if($this->bitPostAccionSinCerrar) {
				$id=$this->getDataFormId();
					
				if($id!=null && $id>0) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_pagarLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->cuenta_pagarActual =$this->cuenta_pagarClase;
			
			/*$this->cuenta_pagarActual =$this->migrarModelcuenta_pagar($this->cuenta_pagarClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->cuenta_pagarLogic->getcuenta_pagars(),$this->cuenta_pagarActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_pagarReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}


			if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
				$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR);
			
			} else {
				$this->eliminarTabla($idActual);
			}
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR',null);			
		
			$this->procesarPostAccion("form",MaintenanceType::$ELIMINAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$cuenta_pagarsLocal=$this->getListaActual();
		
		$iIndice=cuenta_pagar_util::getIndiceNuevo($cuenta_pagarsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(cuenta_pagar $cuenta_pagar,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$cuenta_pagarsLocal=$this->getListaActual();
		
		$iIndice=cuenta_pagar_util::getIndiceActual($cuenta_pagarsLocal,$cuenta_pagar,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevocuenta_pagar')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->cuenta_pagarActual =$this->cuenta_pagarClase;
			
			/*$this->cuenta_pagarActual =$this->migrarModelcuenta_pagar($this->cuenta_pagarClase);*/
			
			$this->cancelarControles();
			
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function ejecutarMantenimiento(string $maintenanceType){
		
		try {
			
			$this->cargarDatosCliente();		
			
			$this->cuenta_pagarLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('orden_compra');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('estado_cuentas_pagar');$classes[]=$class;
			
			$this->cuenta_pagarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->cuenta_pagarLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->cuenta_pagarLogic->setcuenta_pagar(new cuenta_pagar());
				
				$this->cuenta_pagarLogic->getcuenta_pagar()->setIsNew(true);
				$this->cuenta_pagarLogic->getcuenta_pagar()->setIsChanged(true);
				$this->cuenta_pagarLogic->getcuenta_pagar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->cuenta_pagarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->cuenta_pagarLogic->cuenta_pagars[]=$this->cuenta_pagarLogic->getcuenta_pagar();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_pagarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentapagars=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentapagarsEliminados=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentapagars=array_merge($debitocuentapagars,$debitocuentapagarsEliminados);
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentapagars=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentapagarsEliminados=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentapagars=array_merge($creditocuentapagars,$creditocuentapagarsEliminados);
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentapagars=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentapagarsEliminados=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentapagars=array_merge($pagocuentapagars,$pagocuentapagarsEliminados);
							
							$this->cuenta_pagarLogic->saveRelaciones($this->cuenta_pagarLogic->getcuenta_pagar(),$debitocuentapagars,$creditocuentapagars,$pagocuentapagars);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->cuenta_pagarLogic->getcuenta_pagar()->setIsChanged(true);
				$this->cuenta_pagarLogic->getcuenta_pagar()->setIsNew(false);
				$this->cuenta_pagarLogic->getcuenta_pagar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->cuenta_pagarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->cuenta_pagarLogic->getcuenta_pagar(),$this->cuenta_pagarLogic->getcuenta_pagars());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_pagarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentapagars=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentapagarsEliminados=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentapagars=array_merge($debitocuentapagars,$debitocuentapagarsEliminados);
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentapagars=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentapagarsEliminados=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentapagars=array_merge($creditocuentapagars,$creditocuentapagarsEliminados);
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentapagars=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentapagarsEliminados=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentapagars=array_merge($pagocuentapagars,$pagocuentapagarsEliminados);
							
							$this->cuenta_pagarLogic->saveRelaciones($this->cuenta_pagarLogic->getcuenta_pagar(),$debitocuentapagars,$creditocuentapagars,$pagocuentapagars);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->cuenta_pagarLogic->getcuenta_pagar()->setIsDeleted(true);
				$this->cuenta_pagarLogic->getcuenta_pagar()->setIsNew(false);
				$this->cuenta_pagarLogic->getcuenta_pagar()->setIsChanged(false);				
				
				$this->actualizarLista($this->cuenta_pagarLogic->getcuenta_pagar(),$this->cuenta_pagarLogic->getcuenta_pagars());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_pagarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentapagars=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentapagarsEliminados=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentapagars=array_merge($debitocuentapagars,$debitocuentapagarsEliminados);

							foreach($debitocuentapagars as $debitocuentapagar1) {
								$debitocuentapagar1->setIsDeleted(true);
							}
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentapagars=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentapagarsEliminados=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentapagars=array_merge($creditocuentapagars,$creditocuentapagarsEliminados);

							foreach($creditocuentapagars as $creditocuentapagar1) {
								$creditocuentapagar1->setIsDeleted(true);
							}
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentapagars=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentapagarsEliminados=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentapagars=array_merge($pagocuentapagars,$pagocuentapagarsEliminados);

							foreach($pagocuentapagars as $pagocuentapagar1) {
								$pagocuentapagar1->setIsDeleted(true);
							}
							
						$this->cuenta_pagarLogic->saveRelaciones($this->cuenta_pagarLogic->getcuenta_pagar(),$debitocuentapagars,$creditocuentapagars,$pagocuentapagars);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->cuenta_pagarsEliminados[]=$this->cuenta_pagarLogic->getcuenta_pagar();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_pagarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentapagars=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentapagarsEliminados=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentapagars=array_merge($debitocuentapagars,$debitocuentapagarsEliminados);
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentapagars=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentapagarsEliminados=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentapagars=array_merge($creditocuentapagars,$creditocuentapagarsEliminados);
							cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentapagars=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentapagarsEliminados=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentapagars=array_merge($pagocuentapagars,$pagocuentapagarsEliminados);
							
						$this->cuenta_pagarLogic->saveRelaciones($this->cuenta_pagarLogic->getcuenta_pagar(),$debitocuentapagars,$creditocuentapagars,$pagocuentapagars);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cuenta_pagarsEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_pagarLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_pagarLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cuenta_pagarsEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('orden_compra');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('estado_cuentas_pagar');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->cuenta_pagarLogic->setcuenta_pagars();*/
					
					$this->cuenta_pagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->cuenta_pagarLogic->setIsConDeepLoad(false);
			
			$this->cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME.'Lista',serialize($this->cuenta_pagars));
				$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuenta_pagarsEliminados));
			}
			
			if($class!=null);
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function eliminarTabla(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);			
		}
	}
	
	public function eliminarTablaBase(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			/*
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalcuenta_pagar;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->cuenta_pagarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->cuenta_pagars as $cuenta_pagarLocal) {
				if($this->cuenta_pagarLogic->getcuenta_pagar()->getId()==$cuenta_pagarLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->cuenta_pagarLogic->getcuenta_pagar()->setIsDeleted(true);
			$this->cuenta_pagarsEliminados[]=$this->cuenta_pagarLogic->getcuenta_pagar();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->cuenta_pagars[$indice]);
				
				$this->cuenta_pagars = array_values($this->cuenta_pagars);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelcuenta_pagar($this->cuenta_pagarClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(cuenta_pagar $cuenta_pagar,array $cuenta_pagars) {
		try {
			foreach($cuenta_pagars as $cuenta_pagarLocal){ 
				if($cuenta_pagarLocal->getId()==$cuenta_pagar->getId()) {
					$cuenta_pagarLocal->setIsChanged($cuenta_pagar->getIsChanged());
					$cuenta_pagarLocal->setIsNew($cuenta_pagar->getIsNew());
					$cuenta_pagarLocal->setIsDeleted($cuenta_pagar->getIsDeleted());
					//$cuenta_pagarLocal->setbitExpired($cuenta_pagar->getbitExpired());
					
					$cuenta_pagarLocal->setId($cuenta_pagar->getId());	
					$cuenta_pagarLocal->setVersionRow($cuenta_pagar->getVersionRow());	
					$cuenta_pagarLocal->setVersionRow($cuenta_pagar->getVersionRow());	
					$cuenta_pagarLocal->setid_empresa($cuenta_pagar->getid_empresa());	
					$cuenta_pagarLocal->setid_sucursal($cuenta_pagar->getid_sucursal());	
					$cuenta_pagarLocal->setid_ejercicio($cuenta_pagar->getid_ejercicio());	
					$cuenta_pagarLocal->setid_periodo($cuenta_pagar->getid_periodo());	
					$cuenta_pagarLocal->setid_usuario($cuenta_pagar->getid_usuario());	
					$cuenta_pagarLocal->setid_orden_compra($cuenta_pagar->getid_orden_compra());	
					$cuenta_pagarLocal->setid_proveedor($cuenta_pagar->getid_proveedor());	
					$cuenta_pagarLocal->setid_termino_pago_proveedor($cuenta_pagar->getid_termino_pago_proveedor());	
					$cuenta_pagarLocal->setnumero($cuenta_pagar->getnumero());	
					$cuenta_pagarLocal->setfecha_emision($cuenta_pagar->getfecha_emision());	
					$cuenta_pagarLocal->setfecha_vence($cuenta_pagar->getfecha_vence());	
					$cuenta_pagarLocal->setfecha_ultimo_movimiento($cuenta_pagar->getfecha_ultimo_movimiento());	
					$cuenta_pagarLocal->setmonto($cuenta_pagar->getmonto());	
					$cuenta_pagarLocal->setsaldo($cuenta_pagar->getsaldo());	
					$cuenta_pagarLocal->setporcentaje($cuenta_pagar->getporcentaje());	
					$cuenta_pagarLocal->setdescripcion($cuenta_pagar->getdescripcion());	
					$cuenta_pagarLocal->setid_estado_cuentas_pagar($cuenta_pagar->getid_estado_cuentas_pagar());	
					$cuenta_pagarLocal->setreferencia($cuenta_pagar->getreferencia());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$cuenta_pagarsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$cuenta_pagarsLocal=$this->cuenta_pagarLogic->getcuenta_pagars();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$cuenta_pagarsLocal=$this->cuenta_pagars;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $cuenta_pagarsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->cuenta_pagarLogic->getcuenta_pagars() as $cuenta_pagar) {
				if($cuenta_pagar->getId()==$id) {
					$this->cuenta_pagarLogic->setcuenta_pagar($cuenta_pagar);
					
					break;
				}
			}				
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
		}
	}
	
	public function seleccionarActualAuxiliar(int $id = null) {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*NO FUNCIONA AQUI, SINO EN search.php
			$this->strFuncionBusquedaRapida=str_replace('TO_REPLACE',$id,$this->strFuncionBusquedaRapida);*/
			
					
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setSeleccionars(int $maxima_fila) {
		/*$cuenta_pagarsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->cuenta_pagars as $cuenta_pagar) {
			$cuenta_pagar->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->cuenta_pagars[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_pagar_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
						
		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
		
		
		$this->cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
		$this->cuenta_pagarParameterGeneral=new cuenta_pagar_param_return();
			
		$this->cuenta_pagarParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualcuenta_pagar(this.cuenta_pagar,true);
			this.setVariablesFormularioToObjetoActualForeignKeyscuenta_pagar(this.cuenta_pagar);*/
			
			if($cuenta_pagar_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualcuenta_pagar(this.cuenta_pagar,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->cuenta_pagarActual=$this->cuenta_pagarClase;
				
				$this->setCopiarVariablesObjetos($this->cuenta_pagarActual,$this->cuenta_pagar,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_pagarReturnGeneral=$this->cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_pagarLogic->getcuenta_pagars(),$this->cuenta_pagar,$this->cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($cuenta_pagar_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeancuenta_pagar($classes,$this->cuenta_pagarReturnGeneral,$this->cuenta_pagarBean,false);*/
				}
					
				if($this->cuenta_pagarReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->cuenta_pagarReturnGeneral->getcuenta_pagar(),$this->cuenta_pagarActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeycuenta_pagar($this->cuenta_pagarReturnGeneral->getcuenta_pagar());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariocuenta_pagar($this->cuenta_pagarReturnGeneral->getcuenta_pagar());*/
				}
					
				if($this->cuenta_pagarReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_pagarReturnGeneral->getcuenta_pagar(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_pagar,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(cuenta_pagarJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualcuenta_pagar(this.cuenta_pagar,true);
				this.setVariablesFormularioToObjetoActualForeignKeyscuenta_pagar(this.cuenta_pagar);				
			}
			*/
		} else {
			/*
			//AUN_NO
			//MANEJAR EN TABLA
			
			if((($controlTipo==ControlTipo::$TEXTBOX || $controlTipo==ControlTipo::$DATE
				|| $controlTipo==ControlTipo::$TEXTAREA || $controlTipo==ControlTipo::$COMBOBOX
				)				
				&& $eventoTipo==EventoTipo::$CHANGE
				)
				
				|| ($controlTipo==ControlTipo::$CHECKBOX && $eventoTipo==EventoTipo::$CLIC)
				
			) { // && sTipoGeneral.equals("TEXTBOX")
				
				if($this->cuenta_pagarAnterior!=null) {
					$this->cuenta_pagar=$this->cuenta_pagarAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->cuenta_pagarReturnGeneral=$this->cuenta_pagarLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_pagarLogic->getcuenta_pagars(),$this->cuenta_pagar,$this->cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->cuenta_pagarReturnGeneral->getcuenta_pagar(),$this->cuenta_pagarLogic->getcuenta_pagars());
			*/
		}
		
		return $this->cuenta_pagarReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$this->cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();			
			$this->cuenta_pagarParameterGeneral=new cuenta_pagar_param_return();
			
			$this->cuenta_pagarParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->cuenta_pagarReturnGeneral=$this->cuenta_pagarLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->cuenta_pagars,$this->cuenta_pagarParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->cuenta_pagarReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_pagarReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->cuenta_pagarReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
			
			/*throw $e;*/
      	}
		
		return $return_json;
	}
	
	public function manejarEventos(string $sTipoControl,string $sTipoEvento) {		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		$this->cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_cuenta_pagar') {
		    $sDominio='cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		if($sTipoControl=='id_orden_compra' || $sTipoControl=='form-id_orden_compra' || $sTipoControl=='form_cuenta_pagar-id_orden_compra') {
			$sDominio='cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$COMBOBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='COMBOBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->cuenta_pagarReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->cuenta_pagarReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
		$this->cuenta_pagarParameterGeneral=new cuenta_pagar_param_return();
			
		$this->cuenta_pagarParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->cuenta_pagarReturnGeneral=$this->cuenta_pagarLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_pagarLogic->getcuenta_pagars(),$this->cuenta_pagar,$this->cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->cuenta_pagarReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_pagarReturnGeneral->getcuenta_pagar(),$classes);*/
		}									
	
		if($this->cuenta_pagarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->cuenta_pagarReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->cuenta_pagarReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuenta_pagars,cuenta_pagar $cuenta_pagar) {
		
		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
						
		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(cuenta_pagar_util::$CLASSNAME);
			}	
			*/
			
			$this->cuenta_pagarReturnGeneral=new cuenta_pagar_param_return();
			$this->cuenta_pagarParameterGeneral=new cuenta_pagar_param_return();
			
			$this->cuenta_pagarParameterGeneral->setdata($this->data);
		
		
			
		if($cuenta_pagar_session->conGuardarRelaciones) {
			$classes=cuenta_pagar_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->cuenta_pagarActual,$this->cuenta_pagar,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->cuenta_pagarReturnGeneral=$this->cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->cuenta_pagarLogic->getcuenta_pagars(),$this->cuenta_pagarActual,$this->cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->cuenta_pagarReturnGeneral=$this->cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$cuenta_pagars,$cuenta_pagar,$this->cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelcuenta_pagar($this->cuenta_pagarLogic->getcuenta_pagar());*/
			
			$this->cuenta_pagar=$this->cuenta_pagarLogic->getcuenta_pagar();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->cuenta_pagar);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$cuenta_pagarActual=new cuenta_pagar();
			
			if($this->cuenta_pagarClase==null) {		
				$this->cuenta_pagarClase=new cuenta_pagar();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$cuenta_pagarActual=$this->cuenta_pagars[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_orden_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuenta_pagarActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuenta_pagarActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuenta_pagarActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cuenta_pagarActual->setfecha_ultimo_movimiento(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cuenta_pagarActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cuenta_pagarActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cuenta_pagarActual->setporcentaje((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cuenta_pagarActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cuenta_pagarActual->setid_estado_cuentas_pagar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $cuenta_pagarActual->setreferencia($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }

				$this->cuenta_pagarClase=$cuenta_pagarActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuenta_pagarModel->set($this->cuenta_pagarClase);
				
				/*$this->cuenta_pagarModel->set($this->migrarModelcuenta_pagar($this->cuenta_pagarClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->cuenta_pagars=$this->migrarModelcuenta_pagar($this->cuenta_pagarLogic->getcuenta_pagars());							
		$this->cuenta_pagars=$this->cuenta_pagarLogic->getcuenta_pagars();*/
		
			if(!$this->bitEsBusqueda) {
				$this->htmlTabla=$this->setHtmlTablaDatos();
			} else {
				$this->htmlTabla=$this->setHtmlTablaDatosParaBusqueda();
			}
		
		if($bitConRetrurnAjax==true) {			
			//$this->returnAjax();
		}		
	}
	
	public function returnAjax() {
		$this->returnAjaxBase();
	}
	
	public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession) {								
		/*$this->activarSession();*/
		
		if($bitSaveSession==true) {			
			$this->Session->write(cuenta_pagar_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$cuenta_pagar_control_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($cuenta_pagar_control_session==null) {
				$cuenta_pagar_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($cuenta_pagar_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME,$this);*/
		} else {
			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));
			
			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
			}
			
			$this->set(cuenta_pagar_util::$STR_SESSION_NAME, $cuenta_pagar_session);
		}
	}
	
	public function setCopiarVariablesObjetos(cuenta_pagar $cuenta_pagarOrigen,cuenta_pagar $cuenta_pagar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($cuenta_pagar==null) {
				$cuenta_pagar=new cuenta_pagar();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getId()!=null && $cuenta_pagarOrigen->getId()!=0)) {$cuenta_pagar->setId($cuenta_pagarOrigen->getId());}}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getid_orden_compra()!=null && $cuenta_pagarOrigen->getid_orden_compra()!=null)) {$cuenta_pagar->setid_orden_compra($cuenta_pagarOrigen->getid_orden_compra());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getid_proveedor()!=null && $cuenta_pagarOrigen->getid_proveedor()!=-1)) {$cuenta_pagar->setid_proveedor($cuenta_pagarOrigen->getid_proveedor());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getid_termino_pago_proveedor()!=null && $cuenta_pagarOrigen->getid_termino_pago_proveedor()!=-1)) {$cuenta_pagar->setid_termino_pago_proveedor($cuenta_pagarOrigen->getid_termino_pago_proveedor());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getnumero()!=null && $cuenta_pagarOrigen->getnumero()!='')) {$cuenta_pagar->setnumero($cuenta_pagarOrigen->getnumero());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getfecha_emision()!=null && $cuenta_pagarOrigen->getfecha_emision()!=date('Y-m-d'))) {$cuenta_pagar->setfecha_emision($cuenta_pagarOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getfecha_vence()!=null && $cuenta_pagarOrigen->getfecha_vence()!=date('Y-m-d'))) {$cuenta_pagar->setfecha_vence($cuenta_pagarOrigen->getfecha_vence());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getfecha_ultimo_movimiento()!=null && $cuenta_pagarOrigen->getfecha_ultimo_movimiento()!=date('Y-m-d'))) {$cuenta_pagar->setfecha_ultimo_movimiento($cuenta_pagarOrigen->getfecha_ultimo_movimiento());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getmonto()!=null && $cuenta_pagarOrigen->getmonto()!=0.0)) {$cuenta_pagar->setmonto($cuenta_pagarOrigen->getmonto());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getsaldo()!=null && $cuenta_pagarOrigen->getsaldo()!=0.0)) {$cuenta_pagar->setsaldo($cuenta_pagarOrigen->getsaldo());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getporcentaje()!=null && $cuenta_pagarOrigen->getporcentaje()!=0.0)) {$cuenta_pagar->setporcentaje($cuenta_pagarOrigen->getporcentaje());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getdescripcion()!=null && $cuenta_pagarOrigen->getdescripcion()!='')) {$cuenta_pagar->setdescripcion($cuenta_pagarOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getid_estado_cuentas_pagar()!=null && $cuenta_pagarOrigen->getid_estado_cuentas_pagar()!=-1)) {$cuenta_pagar->setid_estado_cuentas_pagar($cuenta_pagarOrigen->getid_estado_cuentas_pagar());}
			if($conDefault || ($conDefault==false && $cuenta_pagarOrigen->getreferencia()!=null && $cuenta_pagarOrigen->getreferencia()!='')) {$cuenta_pagar->setreferencia($cuenta_pagarOrigen->getreferencia());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$cuenta_pagarsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$cuenta_pagarsSeleccionados[]=$this->cuenta_pagars[$indice];
			}
		}
		
		return $cuenta_pagarsSeleccionados;
	}
	
	public function getIdsFksSeleccionados(int $maxima_fila) : array {
		$IdsFksSeleccionados=array();
		$checkbox_id=0;
		//$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			//$indice=$i-1;
			
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$IdsFksSeleccionados[]=$checkbox_id;
			}
		}
		
		return $IdsFksSeleccionados;
	}
	
	public function quitarRelaciones() {	
		$cuenta_pagar= new cuenta_pagar();
		
		foreach($this->cuenta_pagarLogic->getcuenta_pagars() as $cuenta_pagar) {
			
		$cuenta_pagar->debitocuentapagars=array();
		$cuenta_pagar->creditocuentapagars=array();
		$cuenta_pagar->pagocuentapagars=array();
		}		
		
		if($cuenta_pagar!=null);
	}
	
	public function cargarRelaciones(array $cuenta_pagars=array()) : array {	
		
		$cuenta_pagarsRespaldo = array();
		$cuenta_pagarsLocal = array();
		
		cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$cuenta_pagarsResp=array();
		$classes=array();
			
		
				$class=new Classe('debito_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('credito_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('pago_cuenta_pagar'); 	$classes[]=$class;
			
			
		$cuenta_pagarsRespaldo=$this->cuenta_pagarLogic->getcuenta_pagars();
			
		$this->cuenta_pagarLogic->setIsConDeep(true);
		
		$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagars);
			
		$this->cuenta_pagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$cuenta_pagarsLocal=$this->cuenta_pagarLogic->getcuenta_pagars();
			
		/*RESPALDO*/
		$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagarsRespaldo);
			
		$this->cuenta_pagarLogic->setIsConDeep(false);
		
		if($cuenta_pagarsResp!=null);
		
		return $cuenta_pagarsLocal;
	}
	
	public function quitarRelacionesReporte() {
		try {			
			
			//PARA QUE NO GENERE ERROR EN SESSION
			$this->cargarRelaciones(array());
			
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->quitarRelaciones();
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(cuenta_pagar_session $cuenta_pagar_session) {
		$cuenta_pagar_session->strTypeOnLoad=$this->strTypeOnLoadcuenta_pagar;
		$cuenta_pagar_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarcuenta_pagar;
		$cuenta_pagar_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarcuenta_pagar;
		$cuenta_pagar_session->bitEsPopup=$this->bitEsPopup;
		$cuenta_pagar_session->bitEsBusqueda=$this->bitEsBusqueda;
		$cuenta_pagar_session->strFuncionJs=$this->strFuncionJs;
		/*$cuenta_pagar_session->strSufijo=$this->strSufijo;*/
		$cuenta_pagar_session->bitEsRelaciones=$this->bitEsRelaciones;
		$cuenta_pagar_session->bitEsRelacionado=$this->bitEsRelacionado;
	}
	
	public function setPermisosUsuarioConPermiso(string $strPermiso) {
		$this->setPermisosUsuarioConPermisoBase($strPermiso);
	}
	
	public function setPermisosMantenimientoUsuarioConPermiso(string $strPermiso) {
		$this->setPermisosMantenimientoUsuarioConPermisoBase($strPermiso);
	}
	
	public function setPermisosUsuario() {
		$perfilOpcionUsuario=null;
		$perfilOpcionUsuario=new perfil_opcion();		
					
		if(Constantes::$CON_LLAMADA_SIMPLE) {
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false);				
		} else {
			$perfilOpcionUsuario=$this->sistemaReturnGeneral->getPerfilOpcionUsuario();
		}
		
		if($perfilOpcionUsuario!=null && $perfilOpcionUsuario->getId()>0) {
			$this->strPermisoNuevo=(($perfilOpcionUsuario->getingreso() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoActualizar=(($perfilOpcionUsuario->getmodificacion() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoActualizarOriginal=$this->strPermisoActualizar;
			$this->strPermisoEliminar=(($perfilOpcionUsuario->geteliminacion() || $perfilOpcionUsuario->gettodo()) ? 'table-cell':'none'  );//con table-row en tabla se descuadra
			$this->strPermisoConsulta=(($perfilOpcionUsuario->getconsulta() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 			
			$this->strPermisoTodo=(($perfilOpcionUsuario->gettodo() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			$this->strPermisoReporte=(($perfilOpcionUsuario->getreporte() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			
			if($perfilOpcionUsuario->getingreso() || $perfilOpcionUsuario->getmodificacion() || $perfilOpcionUsuario->geteliminacion() || $perfilOpcionUsuario->gettodo()) {
				$this->strPermisoGuardar='table-row';
			} else {
				$this->strPermisoGuardar='none';
			}
			
			if(!$this->bitEsRelacionado) {
				$this->strPermisoBusqueda=(($perfilOpcionUsuario->getbusqueda() || $perfilOpcionUsuario->gettodo()) ? 'table-row':'none'  ); 
			} else {
				$this->strPermisoBusqueda='none';
			}
			
		} else {
			$this->setPermisosUsuarioConPermiso('none');
		}
		
		/*SI SE NECESITA PONER TODOS LOS PERMISOS POR DEFECTO*/
		//$this->setPermisosUsuarioConPermiso('table-row');		
	}
	
	public function setAccionesUsuario() {
		//$accionUsuario=null;
		$accionesUsuario=array();		
					
		if(Constantes::$CON_LLAMADA_SIMPLE) {
			$accionesUsuario=$this->sistemaLogicAdditional->traerAccionesPaginaWebPerfilOpcion($this->usuarioActual, 0 ,false);				
		} else {
			$accionesUsuario=$this->sistemaReturnGeneral->getAccionesUsuario();
		}
		
		if($accionesUsuario!=null) {
			foreach($accionesUsuario as $accion)	{
				$this->tiposAcciones[]=$accion->getnombre();
			}
		}				
	}
	
	/*Todo,ActualizarOriginal,Consulta,Busqueda,Reporte*/
	public function inicializarPermisos() {
		$this->inicializarPermisosBase();
	}
	
	public function inicializarSetPermisosUsuarioClasesRelacionadas() {
		if(!Constantes::$CON_LLAMADA_SIMPLE) {
			

			$this->strTienePermisosdebito_cuenta_pagar='none';
			$this->strTienePermisosdebito_cuenta_pagar=((Funciones::existeCadenaArray(debito_cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdebito_cuenta_pagar='table-cell';

			$this->strTienePermisoscredito_cuenta_pagar='none';
			$this->strTienePermisoscredito_cuenta_pagar=((Funciones::existeCadenaArray(credito_cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscredito_cuenta_pagar='table-cell';

			$this->strTienePermisospago_cuenta_pagar='none';
			$this->strTienePermisospago_cuenta_pagar=((Funciones::existeCadenaArray(pago_cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisospago_cuenta_pagar='table-cell';
		} else {
			

			$this->strTienePermisosdebito_cuenta_pagar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdebito_cuenta_pagar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, debito_cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdebito_cuenta_pagar='table-cell';

			$this->strTienePermisoscredito_cuenta_pagar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscredito_cuenta_pagar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, credito_cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscredito_cuenta_pagar='table-cell';

			$this->strTienePermisospago_cuenta_pagar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisospago_cuenta_pagar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, pago_cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisospago_cuenta_pagar='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$cuenta_pagarViewAdditional=new cuenta_pagarView_add();
		$cuenta_pagarViewAdditional->cuenta_pagars=$this->cuenta_pagars;
		$cuenta_pagarViewAdditional->Session=$this->Session;
		
		return $cuenta_pagarViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$cuenta_pagarsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$cuenta_pagarsLocal=$this->cuenta_pagars;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_pagarsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($cuenta_pagarsLocal)<=0) {
					$cuenta_pagarsLocal=$this->cuenta_pagars;
				}
			} else {
				$cuenta_pagarsLocal=$this->cuenta_pagars;
			}
		}
						
		
		$classes=array();
		$style_tabla='width:100%;margin: 0 0 0 0px;';//height: 100%;
		/*overflow:auto;*/
		$style_div='width:100%;height: 300px; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;
		
		$class_cabecera='';
		$class_table=Constantes::$CSS_CLASS_TABLE;
		//$class_table=' class="'.Constantes::$CSS_CLASS_TABLE.'" ';
		
		
		if(!$paraReporte) {
			
			if(Constantes::$STR_TIPO_TABLA=='normal') {
				$class_cabecera='cabeceratabla';
				$class_table='';
			}
			
			if($this->bitConAltoMaximoTabla==true) {
				$style_div='width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;			
			}
			
		} else {			
			$class_cabecera='cabeceratabla';
			$class_table='reporte';
			$style_tabla='';
			$style_div='width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;';//background-color: #b0c4de;	
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$cuenta_pagarLogic=new cuenta_pagar_logic();
		$cuenta_pagarLogic->setcuenta_pagars($this->cuenta_pagars);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$debito_cuenta_pagar_session=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME));

		if($debito_cuenta_pagar_session==null) {
			$debito_cuenta_pagar_session=new debito_cuenta_pagar_session();
		}

		$credito_cuenta_pagar_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME));

		if($credito_cuenta_pagar_session==null) {
			$credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
		}

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('orden_compra');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('estado_cuentas_pagar');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuenta_pagarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuenta_pagars=$cuenta_pagarLogic->getcuenta_pagars();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->cuenta_pagarsLocal=$this->cuenta_pagars;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=cuenta_pagar_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=cuenta_pagar_util::$STR_TABLE_NAME;		
			
		$this->classes=$classes;
		$this->style_tabla=$style_tabla;
		$this->style_div=$style_div;
		$this->class_cabecera=$class_cabecera;
		$this->class_table=$class_table;		
		$this->proceso_print=$proceso_print;
		
		//PARA TEMPLATE JS
		

		if($this->bitConEditar==false || $paraReporte) {
			/*|| $this->bitConEditar==true*/


		} else {
			
		
			//TEMPLATING
			$funciones = new FuncionesObject();
			
			$funciones->arrOrderBy = $this->arrOrderBy;
			$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
			
			$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
			$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
			$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
			$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
			
			$cuenta_pagars = $this->cuenta_pagars;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = cuenta_pagar_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = cuenta_pagar_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/cuenta_pagar_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->cuenta_pagars=$cuenta_pagars;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->cuenta_pagarsLocal=$cuenta_pagarsLocal;
			$template->classes=$classes;
			$template->style_tabla=$style_tabla;
			$template->style_div=$style_div;
			$template->class_cabecera=$class_cabecera;
			$template->class_table=$class_table;		
			$template->proceso_print=$proceso_print;
			
			$htmlTablaLocal=$template->render_html();
			
			//TEMPLATING
		
		
		
			
			if($this->strSufijo!='') {
				$htmlTablaLocal=str_replace('id="t-','id="t'.$this->strSufijo.'-',$htmlTablaLocal);
				$htmlTablaLocal=str_replace('name="t-','name="t'.$this->strSufijo.'-',$htmlTablaLocal);
				
				$htmlTablaLocal=str_replace('id="chb_t-cel','id="chb_t'.$this->strSufijo.'-cel',$htmlTablaLocal);
				$htmlTablaLocal=str_replace('name="chb_t-cel','name="chb_t'.$this->strSufijo.'-cel',$htmlTablaLocal);
			}
		}
		
		if(!$paraReporte) {
			$this->htmlTabla=$htmlTablaLocal;
		
		} else {
			
			/*
			$this->htmlTablaReporteAuxiliars=$htmlTablaLocal;
			*/
			
			/*
			$this->htmlTablaReporteAuxiliars.='<!DOCTYPE html>';
			$this->htmlTablaReporteAuxiliars.='<html>';
			$this->htmlTablaReporteAuxiliars.='<head>';
			$this->htmlTablaReporteAuxiliars.='<meta http-equiv="Content-Type" content="text/html;charset=utf-8">';
			$this->htmlTablaReporteAuxiliars.='</head>';
			$this->htmlTablaReporteAuxiliars.='<body>';
			*/
			
			$this->htmlTablaReporteAuxiliars.=$htmlTablaLocal;
			
			/*
			$this->htmlTablaReporteAuxiliars.='</body>';
			$this->htmlTablaReporteAuxiliars.='</html>';
			*/
		}

		return $htmlTablaLocal;
	}	
	
	public function setHtmlTablaDatosParaBusqueda() : string {
		return $this->getHtmlTablaDatosParaBusqueda(false);
	}
	
	public function getHtmlTablaDatosParaBusqueda(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		$cuenta_pagarsLocal=array();
		
		$cuenta_pagarsLocal=$this->cuenta_pagars;
				
		$classes=array();		
		
		$style_tabla=' style=" width:100%;height: 100%; margin: 0 0 0 0px;" ';
		/*overflow:auto;*/
		$style_div=' style=" width:100%;height: 300px; overflow:auto; margin: 0 0 0 0px;" ';
		
		$class_cabecera='';
		$class_table=' class="'.Constantes::$CSS_CLASS_TABLE.'" ';
		

		if(!$paraReporte) {
			
			if(Constantes::$STR_TIPO_TABLA=='normal') {
				$class_cabecera=' class="cabeceratabla" ';
				$class_table='';
			}
			
			if($this->bitConAltoMaximoTabla==true) {
				$style_div=' style=" width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;" ';			
			}
		} else {			
			$class_cabecera=' class="cabeceratabla" ';
			$class_table='';
			$style_div=' style=" width:100%;height: 100%; overflow:auto; margin: 0 0 0 0px;" ';	
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$cuenta_pagarLogic=new cuenta_pagar_logic();
		$cuenta_pagarLogic->setcuenta_pagars($this->cuenta_pagars);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$debito_cuenta_pagar_session=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME));

		if($debito_cuenta_pagar_session==null) {
			$debito_cuenta_pagar_session=new debito_cuenta_pagar_session();
		}

		$credito_cuenta_pagar_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME));

		if($credito_cuenta_pagar_session==null) {
			$credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
		}

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('orden_compra');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('estado_cuentas_pagar');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuenta_pagarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuenta_pagars=$cuenta_pagarLogic->getcuenta_pagars();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$cuenta_pagars = $this->cuenta_pagars;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = cuenta_pagar_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = cuenta_pagar_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/cuenta_pagar_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->cuenta_pagars=$cuenta_pagars;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->cuenta_pagarsLocal=$cuenta_pagarsLocal;
		$template->classes=$classes;
		$template->style_tabla=$style_tabla;
		$template->style_div=$style_div;
		$template->class_cabecera=$class_cabecera;
		$template->class_table=$class_table;		
		$template->proceso_print=$proceso_print;
		
		$htmlTablaLocal=$template->render_html();
		
		//TEMPLATING
		
		
		
		
		
		$this->htmlTabla=$htmlTablaLocal;
			
		return $htmlTablaLocal;
	}	
	
	public function getHtmlTablaDatosResumen(array $cuenta_pagars=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->cuenta_pagarsReporte = $cuenta_pagars;		
		$bitParaReporteOrderBy = $paraReporte; //$this->bitParaReporteOrderBy;
		
		$strAuxStyleBackgroundTablaPrincipal='';
		$strAuxStyleBackgroundTitulo='';
		$strAuxStyleBackgroundContenido='';
			$strAuxStyleBackgroundContenidoCabecera='';
			$strAuxStyleBackgroundContenidoDetalle='';		
		$strAuxStyleBackgroundIzquierda='';
		$strAuxStyleBackgroundDerecha='';
		
		
		
		if(!$paraReporte) {
			$strAuxStyleBackgroundTablaPrincipal=' class="tablaficha" ';
			$strAuxStyleBackgroundContenido=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-contenido-resumen.jpg);background-repeat:repeat;"';
				$strAuxStyleBackgroundContenidoCabecera='';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundTitulo=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-titulo-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundIzquierda=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-izquierda-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundDerecha=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-derecha-resumen.gif);background-repeat:repeat;"';
			
			
		} else {
			$strAuxStyleBackgroundTablaPrincipal='';
			$strAuxStyleBackgroundTitulo=' class="cabeceraformulario" ';
			$strAuxStyleBackgroundContenido='';			
				$strAuxStyleBackgroundContenidoCabecera=' class="filazebra" ';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundIzquierda='';
			$strAuxStyleBackgroundDerecha='';						
		}
		
		$strAuxColumnRowSpan='
			<td rowspan="#rowspan" '.$strAuxStyleBackgroundIzquierda.'>
				<pre> 
				</pre>
			</td>';
						
		$strTamanioTablaPrincipal="500px";
		
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';
		}
	
		//TEMPLATING CONTROLLER BASE
		
		$this->paraReporte=$paraReporte;
		$this->proceso_print=$proceso_print;
		$this->strAuxStyleBackgroundTablaPrincipal=$strAuxStyleBackgroundTablaPrincipal;
		$this->borderValue=$borderValue;
		$this->strTamanioTablaPrincipal=$strTamanioTablaPrincipal;
		$this->strAuxStyleBackgroundTitulo=$strAuxStyleBackgroundTitulo;
		
		$this->strAuxStyleBackgroundContenido=$strAuxStyleBackgroundContenido;
		$this->strAuxStyleBackgroundContenidoCabecera=$strAuxStyleBackgroundContenidoCabecera;
		$this->bitParaReporteOrderBy=$bitParaReporteOrderBy;
		
		
		if($rowSpanValue!=null);
		if($blnTieneCampo!=null);
		
		return $htmlTablaLocal;
	}	
	
	public function getHtmlTablaDatosRelaciones(array $cuenta_pagars=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->cuenta_pagarsReporte = $cuenta_pagars;		
		$bitParaReporteOrderBy = $paraReporte; //$this->bitParaReporteOrderBy;
		
		$strAuxStyleBackgroundTablaPrincipal='';
		$strAuxStyleBackgroundTitulo='';
		$strAuxStyleBackgroundContenido='';
			$strAuxStyleBackgroundContenidoCabecera='';
			$strAuxStyleBackgroundContenidoDetalle='';		
		$strAuxStyleBackgroundIzquierda='';
		$strAuxStyleBackgroundDerecha='';
		
		
		
		if(!$paraReporte) {
			$strAuxStyleBackgroundTablaPrincipal=' class="tablaficha" ';
			$strAuxStyleBackgroundContenido=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-contenido-resumen.jpg);background-repeat:repeat;"';
				$strAuxStyleBackgroundContenidoCabecera='';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundTitulo=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-titulo-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundIzquierda=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-izquierda-resumen.gif);background-repeat:repeat;"';
			$strAuxStyleBackgroundDerecha=' style="background-image:url('.Constantes::$PATH_IMAGEN.'Imagenes/fondo-derecha-resumen.gif);background-repeat:repeat;"';
			
			
		} else {
			$strAuxStyleBackgroundTablaPrincipal='';
			$strAuxStyleBackgroundTitulo=' class="cabeceraformulario" ';
			$strAuxStyleBackgroundContenido='';			
				$strAuxStyleBackgroundContenidoCabecera=' class="filazebra" ';
				$strAuxStyleBackgroundContenidoDetalle='';				
			$strAuxStyleBackgroundIzquierda='';
			$strAuxStyleBackgroundDerecha='';	
		}
		
		$strAuxColumnRowSpan='
			<td rowspan="#rowspan" '.$strAuxStyleBackgroundIzquierda.'>
				<pre> 
				</pre>
			</td>';
						
		$strTamanioTablaPrincipal="500px";
		
		
		$this->cuenta_pagarsReporte=$this->cargarRelaciones($cuenta_pagars);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';			
		}
		
	
		//TEMPLATING CONTROLLER BASE
		
		$this->paraReporte=$paraReporte;
		$this->proceso_print=$proceso_print;
		$this->strAuxStyleBackgroundTablaPrincipal=$strAuxStyleBackgroundTablaPrincipal;
		$this->borderValue=$borderValue;
		$this->strTamanioTablaPrincipal=$strTamanioTablaPrincipal;
		$this->strAuxStyleBackgroundTitulo=$strAuxStyleBackgroundTitulo;
		
		$this->strAuxStyleBackgroundContenido=$strAuxStyleBackgroundContenido;
		$this->strAuxStyleBackgroundContenidoCabecera=$strAuxStyleBackgroundContenidoCabecera;
		$this->bitParaReporteOrderBy=$bitParaReporteOrderBy;
		
		if($rowSpanValue!=null);
		if($blnTieneCampo!=null);
		
		return $htmlTablaLocal;
	}
	
	public function getHtmlTablaAccionesRelaciones(cuenta_pagar $cuenta_pagar=null) : string {	
		$htmlTablaLocal='';
		$PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		
	
		if($PATH_IMAGEN!=null);
		
		return $htmlTablaLocal;
	}
	
	public function generarHtmlReporte() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*
			if($this->bitConEditar) {
				$this->bitConAltoMaximoTabla=true;
			}
			*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			/*$checkbox_parareporte=null;*/
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			
			
			$this->getHtmlTablaDatos(true);
			
									
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS, SE REPITE
			//$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarHtmlFormReporte() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			$cuenta_pagarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_pagarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuenta_pagarsLocal)<=0) {
					/*//DEBE ESCOGER
					$cuenta_pagarsLocal=$this->cuenta_pagars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuenta_pagarsLocal=$this->cuenta_pagars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuenta_pagarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($cuenta_pagarsLocal,true);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarHtmlRelacionesReporte() {
		
		try {			
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}
					
			$cuenta_pagarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_pagarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuenta_pagarsLocal)<=0) {
					/*//DEBE ESCOGER
					$cuenta_pagarsLocal=$this->cuenta_pagars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuenta_pagarsLocal=$this->cuenta_pagars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuenta_pagarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($cuenta_pagarsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function generarReporteAuxiliar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function generarFpdf() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->layout = 'fpdf';
			
			$titulo=Constantes::getstrAreaDepartamento();
			$subtitulo='Reporte de  Cuenta Pagars';
			
			$header=array();
			$data=array();
			//$row=array();
			//$cellReport=new CellReport();
					
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderByFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(false,'NORMAL');						
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			$fpdf_helper=new FpdfHelper();
			
			$font='Arial';
			$sizefont=12;
			$fileName='cuenta_pagar';
			
			header("Content-type: application/pdf"); 
			header('Content-Disposition: attachment;filename="'.$fileName.'.pdf"'); 
			header('Cache-Control: max-age=0'); 
		
			$fpdf_helper->SetFont($font,'',$sizefont);
			$fpdf_helper->title=$titulo; 
			$fpdf_helper->subtitle=$subtitulo;
			$fpdf_helper->AddPage();
			$fpdf_helper->basicTable($header,$data);
			
						
			echo $fpdf_helper->fpdfOutput();  
			
		} catch(Exception $e) {
			
			throw $e;
		}
	}
	
	public function generarReporteConPhpExcel(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
			
						
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
		
		
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
									
			$header=array();
			$data=array();
						
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(false,'NORMAL');
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Cuenta Pagars';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
		} catch(Exception $e) {
			throw $e;
		}
    } 
	
	public function generarReporteConPhpExcelVertical(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderByFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
			
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
	
			$header=array();
			$data=array();
						
			/*$header=$this->getHeadersReportVertical();*/
			
			$data=$this->getDataReportVertical();
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Cuenta Pagars';
			$tipo=$strTipoReporte;
			
			$excel_helper->generateVertical($header,$data, $title,$tipo,'webroot');
			
		} catch(Exception $e) {
			throw $e;
		}
    } 
	
	public function generarReporteConPhpExcelRelaciones(string $strTipoReporte='PDF') {
		try {
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->getNewConnexionToDeep();
			}
					
			/*$this->inicializarVariables('NORMAL');
			
			//PARA COLUMNAS DINAMICAS*/
			
			$orderByQueryRelAux=Funciones::getCargarOrderByQueryRel($this->arrOrderByRel,$this->data,'REPORTE');
			$orderByQueryRelAux=trim($orderByQueryRelAux);
			
			$this->bitParaReporteOrderByRel=false;
			$checkbox_parareporte_rel=null;
				
			$this->getDataParaReporteOrderByRelFromData();
			
			/*PARA COLUMNAS DINAMICAS*/
		
		
			/*NO UTILIZA LAYOUT*/
			$this->layout ='';
									
			$header=array();
			$data=array();
						
			$header=$this->getHeadersReport('NORMAL');
			
			$data=$this->getDataReport(true,'NORMAL');
					
			
			$excel_helper=new ExcelHelper();
			
			$title='Reporte de  Cuenta Pagars';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=cuenta_pagar_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
		return $header;
	}
	
	public function ValCol(string $sColName,bool $paraReporte) {
		$valido=true;
		
		if($paraReporte) {
			$valido=Funciones::existeCadenaArrayOrderBy($sColName,$this->arrOrderBy,$this->bitParaReporteOrderBy);
		}
		
		return $valido;
	}
	
	
	
	public function getDataReport(bool $paraRelaciones=false,string $tipo='NORMAL') : array {	
		$data=array();
		$row=array();
		$cellReport=new CellReport();
		$this->cuenta_pagarsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuenta_pagarsAuxiliar)<=0) {
					$this->cuenta_pagarsAuxiliar=$this->cuenta_pagars;
				}
			} else {
				$this->cuenta_pagarsAuxiliar=$this->cuenta_pagars;
			}
		/*} else {
			$this->cuenta_pagarsAuxiliar=$this->cuenta_pagarsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->cuenta_pagarsAuxiliar as $cuenta_pagar) {
				$row=array();
				
				$row=cuenta_pagar_util::getDataReportRow($tipo,$cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			debito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$cuenta_pagarsResp=array();
			$classes=array();
			
			
				$class=new Classe('debito_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('credito_cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('pago_cuenta_pagar'); 	$classes[]=$class;
			
			
			$cuenta_pagarsResp=$this->cuenta_pagarLogic->getcuenta_pagars();
			
			$this->cuenta_pagarLogic->setIsConDeep(true);
			
			$this->cuenta_pagarLogic->setcuenta_pagars($this->cuenta_pagarsAuxiliar);
			
			$this->cuenta_pagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->cuenta_pagarsAuxiliar=$this->cuenta_pagarLogic->getcuenta_pagars();
			
			//RESPALDO
			$this->cuenta_pagarLogic->setcuenta_pagars($cuenta_pagarsResp);
			
			$this->cuenta_pagarLogic->setIsConDeep(false);
			*/
			
			$this->cuenta_pagarsAuxiliar=$this->cargarRelaciones($this->cuenta_pagarsAuxiliar);
			
			$i=0;
			
			foreach ($this->cuenta_pagarsAuxiliar as $cuenta_pagar) {
				$row=array();
				
				if($i!=0) {
					$row=cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=cuenta_pagar_util::getDataReportRow($tipo,$cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//debito_cuenta_pagar
				if(Funciones::existeCadenaArrayOrderBy(debito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta_pagar->getdebito_cuenta_pagars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(debito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=debito_cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta_pagar->getdebito_cuenta_pagars() as $debito_cuenta_pagar) {
						$row=debito_cuenta_pagar_util::getDataReportRow('RELACIONADO',$debito_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//credito_cuenta_pagar
				if(Funciones::existeCadenaArrayOrderBy(credito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta_pagar->getcredito_cuenta_pagars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(credito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=credito_cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta_pagar->getcredito_cuenta_pagars() as $credito_cuenta_pagar) {
						$row=credito_cuenta_pagar_util::getDataReportRow('RELACIONADO',$credito_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//pago_cuenta_pagar
				if(Funciones::existeCadenaArrayOrderBy(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta_pagar->getpago_cuenta_pagars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=pago_cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta_pagar->getpago_cuenta_pagars() as $pago_cuenta_pagar) {
						$row=pago_cuenta_pagar_util::getDataReportRow('RELACIONADO',$pago_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}
				
				$i++;
			}
		}
		
		if($cellReport!=null);
		
		return $data;
	}
	
	public function getDataReportVertical() : array {	
		$data=array();
		$row=array();
		$cellReport=new CellReport();
		$this->cuenta_pagarsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuenta_pagarsAuxiliar)<=0) {
					$this->cuenta_pagarsAuxiliar=$this->cuenta_pagars;
				}
			} else {
				$this->cuenta_pagarsAuxiliar=$this->cuenta_pagars;
			}
		/*} else {
			$this->cuenta_pagarsAuxiliar=$this->cuenta_pagarsReporte;	
		}*/
		
		foreach ($this->cuenta_pagarsAuxiliar as $cuenta_pagar) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_pagar_util::getcuenta_pagarDescripcion($cuenta_pagar),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy(' Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Orden Compra',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Orden Compra',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getid_orden_compraDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getid_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Termino Pago Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Termino Pago Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getid_termino_pago_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getnumero(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Vence',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vence',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getfecha_vence(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Ultimo Mov.',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Ultimo Mov.',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getfecha_ultimo_movimiento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getmonto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Saldo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Saldo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getsaldo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('% Interes',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('% Interes',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getporcentaje(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Estado Cuentas Pagar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Estado Cuentas Pagar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getid_estado_cuentas_pagarDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Referencia',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Referencia',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_pagar->getreferencia(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface cuenta_pagar_base_controlI {			
		
		public function inicializarVariables(string $strType);		
		public function inicializar();
		
		public function cargarParametros();		
		public function cargarDatosLogicClaseBean(bool $esParaLogic=true);		
		public function inicializarMensajesDatosInvalidos();		
		public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo);		
		public function inicializarMensajesDefectoDatosInvalidos();
		
		public function nuevo();		
		public function actualizar();		
		public function eliminar(?int $idActual=0);		
		public function getIndiceNuevo() : int;		
		public function getIndiceActual(cuenta_pagar $cuenta_pagar,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(cuenta_pagar $cuenta_pagar,array $cuenta_pagars);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_pagar_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuenta_pagars,cuenta_pagar $cuenta_pagar);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(cuenta_pagar_param_return $cuenta_pagarReturnGeneral);		
		public function actualizarEstadoCeldasBotones(string $strAccion,bool $bitGuardarCambiosEnLote=false,bool $bitEsMantenimientoRelacionado=false);		
		public function manejarRetornarExcepcion(Exception $e);		
		public function cancelarControles();		
		public function inicializarAuxiliares();		
		public function inicializarMensajesTipo(string $tipo,$e=null);		
		public function prepararEjecutarMantenimiento();		
		public function setTipoAction(string $action='INDEX');		
		public function cargarDatosCliente();		
		public function cargarParametrosPagina();		
		public function cargarParametrosEventosTabla();		
		public function cargarParametrosReporte();		
		public function cargarParamsPostAccion();		
		public function cargarParamsPaginar();
		
		public function returnHtml(bool $bitConRetrurnAjax);		
		public function returnAjax();
		
		public function actualizarDesdeSessionDivStyleVariables(cuenta_pagar_session $cuenta_pagar_session);		
		public function actualizarInvitadoSessionDivStyleVariables(cuenta_pagar_session $cuenta_pagar_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(cuenta_pagar $cuenta_pagarOrigen,cuenta_pagar $cuenta_pagar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(cuenta_pagar_control $cuenta_pagar_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $cuenta_pagars=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(cuenta_pagar_session $cuenta_pagar_session);		
		public function setPermisosUsuarioConPermiso(string $strPermiso);		
		public function setPermisosMantenimientoUsuarioConPermiso(string $strPermiso);
		
		public function setPermisosUsuario();		
		public function setAccionesUsuario();		
		
		//Todo,ActualizarOriginal,Consulta,Busqueda,Reporte
		public function inicializarPermisos();		
		public function inicializarSetPermisosUsuarioClasesRelacionadas();
		
		
		//VIEW_LAYER
		public function setHtmlTablaDatos() : string;		
		public function getHtmlTablaDatos(bool $paraReporte=false) : string;		
		public function setHtmlTablaDatosParaBusqueda() : string;		
		public function getHtmlTablaDatosParaBusqueda(bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosResumen(array $cuenta_pagars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $cuenta_pagars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(cuenta_pagar $cuenta_pagar=null) : string;
		
		public function generarHtmlReporte();		
		public function generarHtmlFormReporte();		
		public function generarHtmlRelacionesReporte();
		
		public function generarReporteAuxiliar();		
		public function generarFpdf();		
		public function generarReporteConPhpExcel(string $strTipoReporte='PDF');		
		public function generarReporteConPhpExcelVertical(string $strTipoReporte='PDF');		
		public function generarReporteConPhpExcelRelaciones(string $strTipoReporte='PDF');		
		public function getHeadersReport(string $tipo='NORMAL');
		
		public function ValCol(string $sColName,bool $paraReporte);				
		public function getDataReport(bool $paraRelaciones=false,string $tipo='NORMAL') : array;		
		public function getDataReportVertical() : array;
	}

	*/
}

?>
