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
	


class cuenta_cobrar_base_control extends cuenta_cobrar_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->cuenta_cobrarClase==null) {		
				$this->cuenta_cobrarClase=new cuenta_cobrar();
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
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_factura')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_factura',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_termino_pago_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado_cuentas_cobrar')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_estado_cuentas_cobrar',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->cuenta_cobrarClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->cuenta_cobrarClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->cuenta_cobrarClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->cuenta_cobrarClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->cuenta_cobrarClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->cuenta_cobrarClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->cuenta_cobrarClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->cuenta_cobrarClase->setid_factura((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_factura'));
				
				$this->cuenta_cobrarClase->setid_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cliente'));
				
				$this->cuenta_cobrarClase->setnumero($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero'));
				
				$this->cuenta_cobrarClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->cuenta_cobrarClase->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_vence')));
				
				$this->cuenta_cobrarClase->setfecha_ultimo_movimiento(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_ultimo_movimiento')));
				
				$this->cuenta_cobrarClase->setid_termino_pago_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_cliente'));
				
				$this->cuenta_cobrarClase->setmonto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto'));
				
				$this->cuenta_cobrarClase->setsaldo((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'saldo'));
				
				$this->cuenta_cobrarClase->setporcentaje((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'porcentaje'));
				
				$this->cuenta_cobrarClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->cuenta_cobrarClase->setid_estado_cuentas_cobrar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado_cuentas_cobrar'));
				
				$this->cuenta_cobrarClase->setreferencia($this->getDataCampoFormTabla('form'.$this->strSufijo,'referencia'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuenta_cobrarModel->set($this->cuenta_cobrarClase);
				
				/*$this->cuenta_cobrarModel->set($this->migrarModelcuenta_cobrar($this->cuenta_cobrarClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setId($this->cuenta_cobrarClase->getId());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setVersionRow($this->cuenta_cobrarClase->getVersionRow());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setVersionRow($this->cuenta_cobrarClase->getVersionRow());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setid_empresa($this->cuenta_cobrarClase->getid_empresa());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setid_sucursal($this->cuenta_cobrarClase->getid_sucursal());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setid_ejercicio($this->cuenta_cobrarClase->getid_ejercicio());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setid_periodo($this->cuenta_cobrarClase->getid_periodo());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setid_usuario($this->cuenta_cobrarClase->getid_usuario());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setid_factura($this->cuenta_cobrarClase->getid_factura());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setid_cliente($this->cuenta_cobrarClase->getid_cliente());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setnumero($this->cuenta_cobrarClase->getnumero());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setfecha_emision($this->cuenta_cobrarClase->getfecha_emision());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setfecha_vence($this->cuenta_cobrarClase->getfecha_vence());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setfecha_ultimo_movimiento($this->cuenta_cobrarClase->getfecha_ultimo_movimiento());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setid_termino_pago_cliente($this->cuenta_cobrarClase->getid_termino_pago_cliente());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setmonto($this->cuenta_cobrarClase->getmonto());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setsaldo($this->cuenta_cobrarClase->getsaldo());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setporcentaje($this->cuenta_cobrarClase->getporcentaje());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setdescripcion($this->cuenta_cobrarClase->getdescripcion());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setid_estado_cuentas_cobrar($this->cuenta_cobrarClase->getid_estado_cuentas_cobrar());	
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setreferencia($this->cuenta_cobrarClase->getreferencia());	
		} else {
			$this->cuenta_cobrarClase->setId($this->cuenta_cobrarLogic->getcuenta_cobrar()->getId());	
			$this->cuenta_cobrarClase->setVersionRow($this->cuenta_cobrarLogic->getcuenta_cobrar()->getVersionRow());	
			$this->cuenta_cobrarClase->setVersionRow($this->cuenta_cobrarLogic->getcuenta_cobrar()->getVersionRow());	
			$this->cuenta_cobrarClase->setid_empresa($this->cuenta_cobrarLogic->getcuenta_cobrar()->getid_empresa());	
			$this->cuenta_cobrarClase->setid_sucursal($this->cuenta_cobrarLogic->getcuenta_cobrar()->getid_sucursal());	
			$this->cuenta_cobrarClase->setid_ejercicio($this->cuenta_cobrarLogic->getcuenta_cobrar()->getid_ejercicio());	
			$this->cuenta_cobrarClase->setid_periodo($this->cuenta_cobrarLogic->getcuenta_cobrar()->getid_periodo());	
			$this->cuenta_cobrarClase->setid_usuario($this->cuenta_cobrarLogic->getcuenta_cobrar()->getid_usuario());	
			$this->cuenta_cobrarClase->setid_factura($this->cuenta_cobrarLogic->getcuenta_cobrar()->getid_factura());	
			$this->cuenta_cobrarClase->setid_cliente($this->cuenta_cobrarLogic->getcuenta_cobrar()->getid_cliente());	
			$this->cuenta_cobrarClase->setnumero($this->cuenta_cobrarLogic->getcuenta_cobrar()->getnumero());	
			$this->cuenta_cobrarClase->setfecha_emision($this->cuenta_cobrarLogic->getcuenta_cobrar()->getfecha_emision());	
			$this->cuenta_cobrarClase->setfecha_vence($this->cuenta_cobrarLogic->getcuenta_cobrar()->getfecha_vence());	
			$this->cuenta_cobrarClase->setfecha_ultimo_movimiento($this->cuenta_cobrarLogic->getcuenta_cobrar()->getfecha_ultimo_movimiento());	
			$this->cuenta_cobrarClase->setid_termino_pago_cliente($this->cuenta_cobrarLogic->getcuenta_cobrar()->getid_termino_pago_cliente());	
			$this->cuenta_cobrarClase->setmonto($this->cuenta_cobrarLogic->getcuenta_cobrar()->getmonto());	
			$this->cuenta_cobrarClase->setsaldo($this->cuenta_cobrarLogic->getcuenta_cobrar()->getsaldo());	
			$this->cuenta_cobrarClase->setporcentaje($this->cuenta_cobrarLogic->getcuenta_cobrar()->getporcentaje());	
			$this->cuenta_cobrarClase->setdescripcion($this->cuenta_cobrarLogic->getcuenta_cobrar()->getdescripcion());	
			$this->cuenta_cobrarClase->setid_estado_cuentas_cobrar($this->cuenta_cobrarLogic->getcuenta_cobrar()->getid_estado_cuentas_cobrar());	
			$this->cuenta_cobrarClase->setreferencia($this->cuenta_cobrarLogic->getcuenta_cobrar()->getreferencia());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->cuenta_cobrarModel->invalidFieldsMe();
		
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
		if($strNombreCampo=='id_factura') {$this->strMensajeid_factura=$strMensajeCampo;}
		if($strNombreCampo=='id_cliente') {$this->strMensajeid_cliente=$strMensajeCampo;}
		if($strNombreCampo=='numero') {$this->strMensajenumero=$strMensajeCampo;}
		if($strNombreCampo=='fecha_emision') {$this->strMensajefecha_emision=$strMensajeCampo;}
		if($strNombreCampo=='fecha_vence') {$this->strMensajefecha_vence=$strMensajeCampo;}
		if($strNombreCampo=='fecha_ultimo_movimiento') {$this->strMensajefecha_ultimo_movimiento=$strMensajeCampo;}
		if($strNombreCampo=='id_termino_pago_cliente') {$this->strMensajeid_termino_pago_cliente=$strMensajeCampo;}
		if($strNombreCampo=='monto') {$this->strMensajemonto=$strMensajeCampo;}
		if($strNombreCampo=='saldo') {$this->strMensajesaldo=$strMensajeCampo;}
		if($strNombreCampo=='porcentaje') {$this->strMensajeporcentaje=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='id_estado_cuentas_cobrar') {$this->strMensajeid_estado_cuentas_cobrar=$strMensajeCampo;}
		if($strNombreCampo=='referencia') {$this->strMensajereferencia=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajeid_factura='';
		$this->strMensajeid_cliente='';
		$this->strMensajenumero='';
		$this->strMensajefecha_emision='';
		$this->strMensajefecha_vence='';
		$this->strMensajefecha_ultimo_movimiento='';
		$this->strMensajeid_termino_pago_cliente='';
		$this->strMensajemonto='';
		$this->strMensajesaldo='';
		$this->strMensajeporcentaje='';
		$this->strMensajedescripcion='';
		$this->strMensajeid_estado_cuentas_cobrar='';
		$this->strMensajereferencia='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($cuenta_cobrar_session==null) {
				$cuenta_cobrar_session=new cuenta_cobrar_session();
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
						$this->cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->cuenta_cobrarActual =$this->cuenta_cobrarClase;
			
			/*$this->cuenta_cobrarActual =$this->migrarModelcuenta_cobrar($this->cuenta_cobrarClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->cuenta_cobrarLogic->getcuenta_cobrars(),$this->cuenta_cobrarActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_cobrarReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
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
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$cuenta_cobrarsLocal=$this->getListaActual();
		
		$iIndice=cuenta_cobrar_util::getIndiceNuevo($cuenta_cobrarsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(cuenta_cobrar $cuenta_cobrar,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$cuenta_cobrarsLocal=$this->getListaActual();
		
		$iIndice=cuenta_cobrar_util::getIndiceActual($cuenta_cobrarsLocal,$cuenta_cobrar,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevocuenta_cobrar')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->cuenta_cobrarActual =$this->cuenta_cobrarClase;
			
			/*$this->cuenta_cobrarActual =$this->migrarModelcuenta_cobrar($this->cuenta_cobrarClase);*/
			
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
			
			$this->cuenta_cobrarLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('factura');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('termino_pago_cliente');$classes[]=$class;
				$class=new Classe('estado_cuentas_cobrar');$classes[]=$class;
			
			$this->cuenta_cobrarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->cuenta_cobrarLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->cuenta_cobrarLogic->setcuenta_cobrar(new cuenta_cobrar());
				
				$this->cuenta_cobrarLogic->getcuenta_cobrar()->setIsNew(true);
				$this->cuenta_cobrarLogic->getcuenta_cobrar()->setIsChanged(true);
				$this->cuenta_cobrarLogic->getcuenta_cobrar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->cuenta_cobrarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->cuenta_cobrarLogic->cuenta_cobrars[]=$this->cuenta_cobrarLogic->getcuenta_cobrar();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_cobrarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentacobrars=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentacobrarsEliminados=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentacobrars=array_merge($debitocuentacobrars,$debitocuentacobrarsEliminados);
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentacobrars=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentacobrarsEliminados=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentacobrars=array_merge($pagocuentacobrars,$pagocuentacobrarsEliminados);
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentacobrars=unserialize($this->Session->read(credito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentacobrarsEliminados=unserialize($this->Session->read(credito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentacobrars=array_merge($creditocuentacobrars,$creditocuentacobrarsEliminados);
							
							$this->cuenta_cobrarLogic->saveRelaciones($this->cuenta_cobrarLogic->getcuenta_cobrar(),$debitocuentacobrars,$pagocuentacobrars,$creditocuentacobrars);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->cuenta_cobrarLogic->getcuenta_cobrar()->setIsChanged(true);
				$this->cuenta_cobrarLogic->getcuenta_cobrar()->setIsNew(false);
				$this->cuenta_cobrarLogic->getcuenta_cobrar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->cuenta_cobrarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->cuenta_cobrarLogic->getcuenta_cobrar(),$this->cuenta_cobrarLogic->getcuenta_cobrars());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_cobrarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentacobrars=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentacobrarsEliminados=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentacobrars=array_merge($debitocuentacobrars,$debitocuentacobrarsEliminados);
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentacobrars=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentacobrarsEliminados=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentacobrars=array_merge($pagocuentacobrars,$pagocuentacobrarsEliminados);
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentacobrars=unserialize($this->Session->read(credito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentacobrarsEliminados=unserialize($this->Session->read(credito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentacobrars=array_merge($creditocuentacobrars,$creditocuentacobrarsEliminados);
							
							$this->cuenta_cobrarLogic->saveRelaciones($this->cuenta_cobrarLogic->getcuenta_cobrar(),$debitocuentacobrars,$pagocuentacobrars,$creditocuentacobrars);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->cuenta_cobrarLogic->getcuenta_cobrar()->setIsDeleted(true);
				$this->cuenta_cobrarLogic->getcuenta_cobrar()->setIsNew(false);
				$this->cuenta_cobrarLogic->getcuenta_cobrar()->setIsChanged(false);				
				
				$this->actualizarLista($this->cuenta_cobrarLogic->getcuenta_cobrar(),$this->cuenta_cobrarLogic->getcuenta_cobrars());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_cobrarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentacobrars=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentacobrarsEliminados=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentacobrars=array_merge($debitocuentacobrars,$debitocuentacobrarsEliminados);

							foreach($debitocuentacobrars as $debitocuentacobrar1) {
								$debitocuentacobrar1->setIsDeleted(true);
							}
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentacobrars=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentacobrarsEliminados=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentacobrars=array_merge($pagocuentacobrars,$pagocuentacobrarsEliminados);

							foreach($pagocuentacobrars as $pagocuentacobrar1) {
								$pagocuentacobrar1->setIsDeleted(true);
							}
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentacobrars=unserialize($this->Session->read(credito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentacobrarsEliminados=unserialize($this->Session->read(credito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentacobrars=array_merge($creditocuentacobrars,$creditocuentacobrarsEliminados);

							foreach($creditocuentacobrars as $creditocuentacobrar1) {
								$creditocuentacobrar1->setIsDeleted(true);
							}
							
						$this->cuenta_cobrarLogic->saveRelaciones($this->cuenta_cobrarLogic->getcuenta_cobrar(),$debitocuentacobrars,$pagocuentacobrars,$creditocuentacobrars);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->cuenta_cobrarsEliminados[]=$this->cuenta_cobrarLogic->getcuenta_cobrar();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_cobrarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$debitocuentacobrars=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$debitocuentacobrarsEliminados=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$debitocuentacobrars=array_merge($debitocuentacobrars,$debitocuentacobrarsEliminados);
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							pago_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$pagocuentacobrars=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$pagocuentacobrarsEliminados=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$pagocuentacobrars=array_merge($pagocuentacobrars,$pagocuentacobrarsEliminados);
							cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							credito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$creditocuentacobrars=unserialize($this->Session->read(credito_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$creditocuentacobrarsEliminados=unserialize($this->Session->read(credito_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$creditocuentacobrars=array_merge($creditocuentacobrars,$creditocuentacobrarsEliminados);
							
						$this->cuenta_cobrarLogic->saveRelaciones($this->cuenta_cobrarLogic->getcuenta_cobrar(),$debitocuentacobrars,$pagocuentacobrars,$creditocuentacobrars);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cuenta_cobrarsEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_cobrarLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_cobrarLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cuenta_cobrarsEliminados=array();
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
				$class=new Classe('factura');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('termino_pago_cliente');$classes[]=$class;
				$class=new Classe('estado_cuentas_cobrar');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->cuenta_cobrarLogic->setcuenta_cobrars();*/
					
					$this->cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->cuenta_cobrarLogic->setIsConDeepLoad(false);
			
			$this->cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME.'Lista',serialize($this->cuenta_cobrars));
				$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuenta_cobrarsEliminados));
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalcuenta_cobrar;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->cuenta_cobrars as $cuenta_cobrarLocal) {
				if($this->cuenta_cobrarLogic->getcuenta_cobrar()->getId()==$cuenta_cobrarLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->cuenta_cobrarLogic->getcuenta_cobrar()->setIsDeleted(true);
			$this->cuenta_cobrarsEliminados[]=$this->cuenta_cobrarLogic->getcuenta_cobrar();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->cuenta_cobrars[$indice]);
				
				$this->cuenta_cobrars = array_values($this->cuenta_cobrars);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelcuenta_cobrar($this->cuenta_cobrarClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(cuenta_cobrar $cuenta_cobrar,array $cuenta_cobrars) {
		try {
			foreach($cuenta_cobrars as $cuenta_cobrarLocal){ 
				if($cuenta_cobrarLocal->getId()==$cuenta_cobrar->getId()) {
					$cuenta_cobrarLocal->setIsChanged($cuenta_cobrar->getIsChanged());
					$cuenta_cobrarLocal->setIsNew($cuenta_cobrar->getIsNew());
					$cuenta_cobrarLocal->setIsDeleted($cuenta_cobrar->getIsDeleted());
					//$cuenta_cobrarLocal->setbitExpired($cuenta_cobrar->getbitExpired());
					
					$cuenta_cobrarLocal->setId($cuenta_cobrar->getId());	
					$cuenta_cobrarLocal->setVersionRow($cuenta_cobrar->getVersionRow());	
					$cuenta_cobrarLocal->setVersionRow($cuenta_cobrar->getVersionRow());	
					$cuenta_cobrarLocal->setid_empresa($cuenta_cobrar->getid_empresa());	
					$cuenta_cobrarLocal->setid_sucursal($cuenta_cobrar->getid_sucursal());	
					$cuenta_cobrarLocal->setid_ejercicio($cuenta_cobrar->getid_ejercicio());	
					$cuenta_cobrarLocal->setid_periodo($cuenta_cobrar->getid_periodo());	
					$cuenta_cobrarLocal->setid_usuario($cuenta_cobrar->getid_usuario());	
					$cuenta_cobrarLocal->setid_factura($cuenta_cobrar->getid_factura());	
					$cuenta_cobrarLocal->setid_cliente($cuenta_cobrar->getid_cliente());	
					$cuenta_cobrarLocal->setnumero($cuenta_cobrar->getnumero());	
					$cuenta_cobrarLocal->setfecha_emision($cuenta_cobrar->getfecha_emision());	
					$cuenta_cobrarLocal->setfecha_vence($cuenta_cobrar->getfecha_vence());	
					$cuenta_cobrarLocal->setfecha_ultimo_movimiento($cuenta_cobrar->getfecha_ultimo_movimiento());	
					$cuenta_cobrarLocal->setid_termino_pago_cliente($cuenta_cobrar->getid_termino_pago_cliente());	
					$cuenta_cobrarLocal->setmonto($cuenta_cobrar->getmonto());	
					$cuenta_cobrarLocal->setsaldo($cuenta_cobrar->getsaldo());	
					$cuenta_cobrarLocal->setporcentaje($cuenta_cobrar->getporcentaje());	
					$cuenta_cobrarLocal->setdescripcion($cuenta_cobrar->getdescripcion());	
					$cuenta_cobrarLocal->setid_estado_cuentas_cobrar($cuenta_cobrar->getid_estado_cuentas_cobrar());	
					$cuenta_cobrarLocal->setreferencia($cuenta_cobrar->getreferencia());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$cuenta_cobrarsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$cuenta_cobrarsLocal=$this->cuenta_cobrarLogic->getcuenta_cobrars();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$cuenta_cobrarsLocal=$this->cuenta_cobrars;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $cuenta_cobrarsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->cuenta_cobrarLogic->getcuenta_cobrars() as $cuenta_cobrar) {
				if($cuenta_cobrar->getId()==$id) {
					$this->cuenta_cobrarLogic->setcuenta_cobrar($cuenta_cobrar);
					
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
		/*$cuenta_cobrarsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->cuenta_cobrars as $cuenta_cobrar) {
			$cuenta_cobrar->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->cuenta_cobrars[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_cobrar_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
						
		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		
		$this->cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
		$this->cuenta_cobrarParameterGeneral=new cuenta_cobrar_param_return();
			
		$this->cuenta_cobrarParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualcuenta_cobrar(this.cuenta_cobrar,true);
			this.setVariablesFormularioToObjetoActualForeignKeyscuenta_cobrar(this.cuenta_cobrar);*/
			
			if($cuenta_cobrar_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualcuenta_cobrar(this.cuenta_cobrar,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->cuenta_cobrarActual=$this->cuenta_cobrarClase;
				
				$this->setCopiarVariablesObjetos($this->cuenta_cobrarActual,$this->cuenta_cobrar,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_cobrarLogic->getcuenta_cobrars(),$this->cuenta_cobrar,$this->cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($cuenta_cobrar_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeancuenta_cobrar($classes,$this->cuenta_cobrarReturnGeneral,$this->cuenta_cobrarBean,false);*/
				}
					
				if($this->cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->cuenta_cobrarReturnGeneral->getcuenta_cobrar(),$this->cuenta_cobrarActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeycuenta_cobrar($this->cuenta_cobrarReturnGeneral->getcuenta_cobrar());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariocuenta_cobrar($this->cuenta_cobrarReturnGeneral->getcuenta_cobrar());*/
				}
					
				if($this->cuenta_cobrarReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_cobrarReturnGeneral->getcuenta_cobrar(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_cobrar,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(cuenta_cobrarJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualcuenta_cobrar(this.cuenta_cobrar,true);
				this.setVariablesFormularioToObjetoActualForeignKeyscuenta_cobrar(this.cuenta_cobrar);				
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
				
				if($this->cuenta_cobrarAnterior!=null) {
					$this->cuenta_cobrar=$this->cuenta_cobrarAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_cobrarLogic->getcuenta_cobrars(),$this->cuenta_cobrar,$this->cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->cuenta_cobrarReturnGeneral->getcuenta_cobrar(),$this->cuenta_cobrarLogic->getcuenta_cobrars());
			*/
		}
		
		return $this->cuenta_cobrarReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();			
			$this->cuenta_cobrarParameterGeneral=new cuenta_cobrar_param_return();
			
			$this->cuenta_cobrarParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->cuenta_cobrars,$this->cuenta_cobrarParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->cuenta_cobrarReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_cobrarReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->cuenta_cobrarReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		
		$this->cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_cuenta_cobrar') {
		    $sDominio='cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		if($sTipoControl=='id_factura' || $sTipoControl=='form-id_factura' || $sTipoControl=='form_cuenta_cobrar-id_factura') {
			$sDominio='cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$COMBOBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='COMBOBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->cuenta_cobrarReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->cuenta_cobrarReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='cuenta_cobrar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
		$this->cuenta_cobrarParameterGeneral=new cuenta_cobrar_param_return();
			
		$this->cuenta_cobrarParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_cobrarLogic->getcuenta_cobrars(),$this->cuenta_cobrar,$this->cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->cuenta_cobrarReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_cobrarReturnGeneral->getcuenta_cobrar(),$classes);*/
		}									
	
		if($this->cuenta_cobrarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->cuenta_cobrarReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->cuenta_cobrarReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuenta_cobrars,cuenta_cobrar $cuenta_cobrar) {
		
		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
						
		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(cuenta_cobrar_util::$CLASSNAME);
			}	
			*/
			
			$this->cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
			$this->cuenta_cobrarParameterGeneral=new cuenta_cobrar_param_return();
			
			$this->cuenta_cobrarParameterGeneral->setdata($this->data);
		
		
			
		if($cuenta_cobrar_session->conGuardarRelaciones) {
			$classes=cuenta_cobrar_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->cuenta_cobrarActual,$this->cuenta_cobrar,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->cuenta_cobrarLogic->getcuenta_cobrars(),$this->cuenta_cobrarActual,$this->cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$cuenta_cobrars,$cuenta_cobrar,$this->cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelcuenta_cobrar($this->cuenta_cobrarLogic->getcuenta_cobrar());*/
			
			$this->cuenta_cobrar=$this->cuenta_cobrarLogic->getcuenta_cobrar();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->cuenta_cobrar);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$cuenta_cobrarActual=new cuenta_cobrar();
			
			if($this->cuenta_cobrarClase==null) {		
				$this->cuenta_cobrarClase=new cuenta_cobrar();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$cuenta_cobrarActual=$this->cuenta_cobrars[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_factura((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setfecha_ultimo_movimiento(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_termino_pago_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setporcentaje((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_estado_cuentas_cobrar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setreferencia($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }

				$this->cuenta_cobrarClase=$cuenta_cobrarActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuenta_cobrarModel->set($this->cuenta_cobrarClase);
				
				/*$this->cuenta_cobrarModel->set($this->migrarModelcuenta_cobrar($this->cuenta_cobrarClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->cuenta_cobrars=$this->migrarModelcuenta_cobrar($this->cuenta_cobrarLogic->getcuenta_cobrars());							
		$this->cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();*/
		
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
			$this->Session->write(cuenta_cobrar_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$cuenta_cobrar_control_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($cuenta_cobrar_control_session==null) {
				$cuenta_cobrar_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($cuenta_cobrar_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME,$this);*/
		} else {
			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
			
			if($cuenta_cobrar_session==null) {
				$cuenta_cobrar_session=new cuenta_cobrar_session();
			}
			
			$this->set(cuenta_cobrar_util::$STR_SESSION_NAME, $cuenta_cobrar_session);
		}
	}
	
	public function setCopiarVariablesObjetos(cuenta_cobrar $cuenta_cobrarOrigen,cuenta_cobrar $cuenta_cobrar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($cuenta_cobrar==null) {
				$cuenta_cobrar=new cuenta_cobrar();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getId()!=null && $cuenta_cobrarOrigen->getId()!=0)) {$cuenta_cobrar->setId($cuenta_cobrarOrigen->getId());}}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getid_factura()!=null && $cuenta_cobrarOrigen->getid_factura()!=null)) {$cuenta_cobrar->setid_factura($cuenta_cobrarOrigen->getid_factura());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getid_cliente()!=null && $cuenta_cobrarOrigen->getid_cliente()!=-1)) {$cuenta_cobrar->setid_cliente($cuenta_cobrarOrigen->getid_cliente());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getnumero()!=null && $cuenta_cobrarOrigen->getnumero()!='')) {$cuenta_cobrar->setnumero($cuenta_cobrarOrigen->getnumero());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getfecha_emision()!=null && $cuenta_cobrarOrigen->getfecha_emision()!=date('Y-m-d'))) {$cuenta_cobrar->setfecha_emision($cuenta_cobrarOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getfecha_vence()!=null && $cuenta_cobrarOrigen->getfecha_vence()!=date('Y-m-d'))) {$cuenta_cobrar->setfecha_vence($cuenta_cobrarOrigen->getfecha_vence());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getfecha_ultimo_movimiento()!=null && $cuenta_cobrarOrigen->getfecha_ultimo_movimiento()!=date('Y-m-d'))) {$cuenta_cobrar->setfecha_ultimo_movimiento($cuenta_cobrarOrigen->getfecha_ultimo_movimiento());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getid_termino_pago_cliente()!=null && $cuenta_cobrarOrigen->getid_termino_pago_cliente()!=-1)) {$cuenta_cobrar->setid_termino_pago_cliente($cuenta_cobrarOrigen->getid_termino_pago_cliente());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getmonto()!=null && $cuenta_cobrarOrigen->getmonto()!=0.0)) {$cuenta_cobrar->setmonto($cuenta_cobrarOrigen->getmonto());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getsaldo()!=null && $cuenta_cobrarOrigen->getsaldo()!=0.0)) {$cuenta_cobrar->setsaldo($cuenta_cobrarOrigen->getsaldo());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getporcentaje()!=null && $cuenta_cobrarOrigen->getporcentaje()!=0.0)) {$cuenta_cobrar->setporcentaje($cuenta_cobrarOrigen->getporcentaje());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getdescripcion()!=null && $cuenta_cobrarOrigen->getdescripcion()!='')) {$cuenta_cobrar->setdescripcion($cuenta_cobrarOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getid_estado_cuentas_cobrar()!=null && $cuenta_cobrarOrigen->getid_estado_cuentas_cobrar()!=-1)) {$cuenta_cobrar->setid_estado_cuentas_cobrar($cuenta_cobrarOrigen->getid_estado_cuentas_cobrar());}
			if($conDefault || ($conDefault==false && $cuenta_cobrarOrigen->getreferencia()!=null && $cuenta_cobrarOrigen->getreferencia()!='')) {$cuenta_cobrar->setreferencia($cuenta_cobrarOrigen->getreferencia());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$cuenta_cobrarsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$cuenta_cobrarsSeleccionados[]=$this->cuenta_cobrars[$indice];
			}
		}
		
		return $cuenta_cobrarsSeleccionados;
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
		$cuenta_cobrar= new cuenta_cobrar();
		
		foreach($this->cuenta_cobrarLogic->getcuenta_cobrars() as $cuenta_cobrar) {
			
		$cuenta_cobrar->debitocuentacobrars=array();
		$cuenta_cobrar->pagocuentacobrars=array();
		$cuenta_cobrar->creditocuentacobrars=array();
		}		
		
		if($cuenta_cobrar!=null);
	}
	
	public function cargarRelaciones(array $cuenta_cobrars=array()) : array {	
		
		$cuenta_cobrarsRespaldo = array();
		$cuenta_cobrarsLocal = array();
		
		cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			pago_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			credito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$cuenta_cobrarsResp=array();
		$classes=array();
			
		
				$class=new Classe('debito_cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('pago_cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('credito_cuenta_cobrar'); 	$classes[]=$class;
			
			
		$cuenta_cobrarsRespaldo=$this->cuenta_cobrarLogic->getcuenta_cobrars();
			
		$this->cuenta_cobrarLogic->setIsConDeep(true);
		
		$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrars);
			
		$this->cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$cuenta_cobrarsLocal=$this->cuenta_cobrarLogic->getcuenta_cobrars();
			
		/*RESPALDO*/
		$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrarsRespaldo);
			
		$this->cuenta_cobrarLogic->setIsConDeep(false);
		
		if($cuenta_cobrarsResp!=null);
		
		return $cuenta_cobrarsLocal;
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
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(cuenta_cobrar_session $cuenta_cobrar_session) {
		$cuenta_cobrar_session->strTypeOnLoad=$this->strTypeOnLoadcuenta_cobrar;
		$cuenta_cobrar_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarcuenta_cobrar;
		$cuenta_cobrar_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarcuenta_cobrar;
		$cuenta_cobrar_session->bitEsPopup=$this->bitEsPopup;
		$cuenta_cobrar_session->bitEsBusqueda=$this->bitEsBusqueda;
		$cuenta_cobrar_session->strFuncionJs=$this->strFuncionJs;
		/*$cuenta_cobrar_session->strSufijo=$this->strSufijo;*/
		$cuenta_cobrar_session->bitEsRelaciones=$this->bitEsRelaciones;
		$cuenta_cobrar_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosdebito_cuenta_cobrar='none';
			$this->strTienePermisosdebito_cuenta_cobrar=((Funciones::existeCadenaArray(debito_cuenta_cobrar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdebito_cuenta_cobrar='table-cell';

			$this->strTienePermisospago_cuenta_cobrar='none';
			$this->strTienePermisospago_cuenta_cobrar=((Funciones::existeCadenaArray(pago_cuenta_cobrar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisospago_cuenta_cobrar='table-cell';

			$this->strTienePermisoscredito_cuenta_cobrar='none';
			$this->strTienePermisoscredito_cuenta_cobrar=((Funciones::existeCadenaArray(credito_cuenta_cobrar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscredito_cuenta_cobrar='table-cell';
		} else {
			

			$this->strTienePermisosdebito_cuenta_cobrar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdebito_cuenta_cobrar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, debito_cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdebito_cuenta_cobrar='table-cell';

			$this->strTienePermisospago_cuenta_cobrar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisospago_cuenta_cobrar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, pago_cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisospago_cuenta_cobrar='table-cell';

			$this->strTienePermisoscredito_cuenta_cobrar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscredito_cuenta_cobrar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, credito_cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscredito_cuenta_cobrar='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$cuenta_cobrarViewAdditional=new cuenta_cobrarView_add();
		$cuenta_cobrarViewAdditional->cuenta_cobrars=$this->cuenta_cobrars;
		$cuenta_cobrarViewAdditional->Session=$this->Session;
		
		return $cuenta_cobrarViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$cuenta_cobrarsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$cuenta_cobrarsLocal=$this->cuenta_cobrars;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($cuenta_cobrarsLocal)<=0) {
					$cuenta_cobrarsLocal=$this->cuenta_cobrars;
				}
			} else {
				$cuenta_cobrarsLocal=$this->cuenta_cobrars;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$cuenta_cobrarLogic=new cuenta_cobrar_logic();
		$cuenta_cobrarLogic->setcuenta_cobrars($this->cuenta_cobrars);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$debito_cuenta_cobrar_session=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($debito_cuenta_cobrar_session==null) {
			$debito_cuenta_cobrar_session=new debito_cuenta_cobrar_session();
		}

		$pago_cuenta_cobrar_session=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($pago_cuenta_cobrar_session==null) {
			$pago_cuenta_cobrar_session=new pago_cuenta_cobrar_session();
		}

		$credito_cuenta_cobrar_session=unserialize($this->Session->read(credito_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($credito_cuenta_cobrar_session==null) {
			$credito_cuenta_cobrar_session=new credito_cuenta_cobrar_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('factura');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('termino_pago_cliente');$classes[]=$class;
			$class=new Classe('estado_cuentas_cobrar');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuenta_cobrarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuenta_cobrars=$cuenta_cobrarLogic->getcuenta_cobrars();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->cuenta_cobrarsLocal=$this->cuenta_cobrars;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=cuenta_cobrar_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=cuenta_cobrar_util::$STR_TABLE_NAME;		
			
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
			
			$cuenta_cobrars = $this->cuenta_cobrars;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = cuenta_cobrar_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = cuenta_cobrar_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/cuenta_cobrar_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->cuenta_cobrars=$cuenta_cobrars;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->cuenta_cobrarsLocal=$cuenta_cobrarsLocal;
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
		
		$cuenta_cobrarsLocal=array();
		
		$cuenta_cobrarsLocal=$this->cuenta_cobrars;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$cuenta_cobrarLogic=new cuenta_cobrar_logic();
		$cuenta_cobrarLogic->setcuenta_cobrars($this->cuenta_cobrars);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$debito_cuenta_cobrar_session=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($debito_cuenta_cobrar_session==null) {
			$debito_cuenta_cobrar_session=new debito_cuenta_cobrar_session();
		}

		$pago_cuenta_cobrar_session=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($pago_cuenta_cobrar_session==null) {
			$pago_cuenta_cobrar_session=new pago_cuenta_cobrar_session();
		}

		$credito_cuenta_cobrar_session=unserialize($this->Session->read(credito_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($credito_cuenta_cobrar_session==null) {
			$credito_cuenta_cobrar_session=new credito_cuenta_cobrar_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('factura');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('termino_pago_cliente');$classes[]=$class;
			$class=new Classe('estado_cuentas_cobrar');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuenta_cobrarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuenta_cobrars=$cuenta_cobrarLogic->getcuenta_cobrars();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$cuenta_cobrars = $this->cuenta_cobrars;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = cuenta_cobrar_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = cuenta_cobrar_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/cuenta_cobrar_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->cuenta_cobrars=$cuenta_cobrars;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->cuenta_cobrarsLocal=$cuenta_cobrarsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $cuenta_cobrars=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->cuenta_cobrarsReporte = $cuenta_cobrars;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $cuenta_cobrars=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->cuenta_cobrarsReporte = $cuenta_cobrars;		
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
		
		
		$this->cuenta_cobrarsReporte=$this->cargarRelaciones($cuenta_cobrars);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_cobrarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_cobrarsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(cuenta_cobrar $cuenta_cobrar=null) : string {	
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
			
			
			$cuenta_cobrarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuenta_cobrarsLocal)<=0) {
					/*//DEBE ESCOGER
					$cuenta_cobrarsLocal=$this->cuenta_cobrars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuenta_cobrarsLocal=$this->cuenta_cobrars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuenta_cobrarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($cuenta_cobrarsLocal,true);
			
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}
					
			$cuenta_cobrarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_cobrarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuenta_cobrarsLocal)<=0) {
					/*//DEBE ESCOGER
					$cuenta_cobrarsLocal=$this->cuenta_cobrars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuenta_cobrarsLocal=$this->cuenta_cobrars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuenta_cobrarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($cuenta_cobrarsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Cuenta Cobrars';
			
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
			$fileName='cuenta_cobrar';
			
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
			
			$title='Reporte de  Cuenta Cobrars';
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
			
			$title='Reporte de  Cuenta Cobrars';
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Cuenta Cobrars';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=cuenta_cobrar_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->cuenta_cobrarsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuenta_cobrarsAuxiliar)<=0) {
					$this->cuenta_cobrarsAuxiliar=$this->cuenta_cobrars;
				}
			} else {
				$this->cuenta_cobrarsAuxiliar=$this->cuenta_cobrars;
			}
		/*} else {
			$this->cuenta_cobrarsAuxiliar=$this->cuenta_cobrarsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->cuenta_cobrarsAuxiliar as $cuenta_cobrar) {
				$row=array();
				
				$row=cuenta_cobrar_util::getDataReportRow($tipo,$cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			debito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			pago_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			credito_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$cuenta_cobrarsResp=array();
			$classes=array();
			
			
				$class=new Classe('debito_cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('pago_cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('credito_cuenta_cobrar'); 	$classes[]=$class;
			
			
			$cuenta_cobrarsResp=$this->cuenta_cobrarLogic->getcuenta_cobrars();
			
			$this->cuenta_cobrarLogic->setIsConDeep(true);
			
			$this->cuenta_cobrarLogic->setcuenta_cobrars($this->cuenta_cobrarsAuxiliar);
			
			$this->cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->cuenta_cobrarsAuxiliar=$this->cuenta_cobrarLogic->getcuenta_cobrars();
			
			//RESPALDO
			$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrarsResp);
			
			$this->cuenta_cobrarLogic->setIsConDeep(false);
			*/
			
			$this->cuenta_cobrarsAuxiliar=$this->cargarRelaciones($this->cuenta_cobrarsAuxiliar);
			
			$i=0;
			
			foreach ($this->cuenta_cobrarsAuxiliar as $cuenta_cobrar) {
				$row=array();
				
				if($i!=0) {
					$row=cuenta_cobrar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=cuenta_cobrar_util::getDataReportRow($tipo,$cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//debito_cuenta_cobrar
				if(Funciones::existeCadenaArrayOrderBy(debito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta_cobrar->getdebito_cuenta_cobrars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(debito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=debito_cuenta_cobrar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta_cobrar->getdebito_cuenta_cobrars() as $debito_cuenta_cobrar) {
						$row=debito_cuenta_cobrar_util::getDataReportRow('RELACIONADO',$debito_cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//pago_cuenta_cobrar
				if(Funciones::existeCadenaArrayOrderBy(pago_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta_cobrar->getpago_cuenta_cobrars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(pago_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=pago_cuenta_cobrar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta_cobrar->getpago_cuenta_cobrars() as $pago_cuenta_cobrar) {
						$row=pago_cuenta_cobrar_util::getDataReportRow('RELACIONADO',$pago_cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//credito_cuenta_cobrar
				if(Funciones::existeCadenaArrayOrderBy(credito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta_cobrar->getcredito_cuenta_cobrars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(credito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=credito_cuenta_cobrar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta_cobrar->getcredito_cuenta_cobrars() as $credito_cuenta_cobrar) {
						$row=credito_cuenta_cobrar_util::getDataReportRow('RELACIONADO',$credito_cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->cuenta_cobrarsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuenta_cobrarsAuxiliar)<=0) {
					$this->cuenta_cobrarsAuxiliar=$this->cuenta_cobrars;
				}
			} else {
				$this->cuenta_cobrarsAuxiliar=$this->cuenta_cobrars;
			}
		/*} else {
			$this->cuenta_cobrarsAuxiliar=$this->cuenta_cobrarsReporte;	
		}*/
		
		foreach ($this->cuenta_cobrarsAuxiliar as $cuenta_cobrar) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_cobrar_util::getcuenta_cobrarDescripcion($cuenta_cobrar),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy(' Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Factura',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Factura',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getid_facturaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getid_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getnumero(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Vence',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vence',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getfecha_vence(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Ultimo Mov.',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Ultimo Mov.',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getfecha_ultimo_movimiento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Termino Pago Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Termino Pago Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getid_termino_pago_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getmonto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Saldo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Saldo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getsaldo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('%',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('%',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getporcentaje(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Estado Cuentas Cobrar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Estado Cuentas Cobrar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getid_estado_cuentas_cobrarDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Referencia',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Referencia',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_cobrar->getreferencia(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface cuenta_cobrar_base_controlI {			
		
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
		public function getIndiceActual(cuenta_cobrar $cuenta_cobrar,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(cuenta_cobrar $cuenta_cobrar,array $cuenta_cobrars);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_cobrar_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuenta_cobrars,cuenta_cobrar $cuenta_cobrar);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(cuenta_cobrar_param_return $cuenta_cobrarReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(cuenta_cobrar_session $cuenta_cobrar_session);		
		public function actualizarInvitadoSessionDivStyleVariables(cuenta_cobrar_session $cuenta_cobrar_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(cuenta_cobrar $cuenta_cobrarOrigen,cuenta_cobrar $cuenta_cobrar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(cuenta_cobrar_control $cuenta_cobrar_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $cuenta_cobrars=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(cuenta_cobrar_session $cuenta_cobrar_session);		
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
		public function getHtmlTablaDatosResumen(array $cuenta_cobrars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $cuenta_cobrars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(cuenta_cobrar $cuenta_cobrar=null) : string;
		
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
