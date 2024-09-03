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

namespace com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\entity\credito_cuenta_pagar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/credito_cuenta_pagar/util/credito_cuenta_pagar_carga.php');
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_param_return;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\logic\credito_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\business\logic\credito_cuenta_pagar_logic_add;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\session\credito_cuenta_pagar_session;


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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
credito_cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
credito_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
credito_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
credito_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*credito_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class credito_cuenta_pagar_base_control extends credito_cuenta_pagar_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->credito_cuenta_pagarClase==null) {		
				$this->credito_cuenta_pagarClase=new credito_cuenta_pagar();
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
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_pagar')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_pagar',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_termino_pago_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_estado',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->credito_cuenta_pagarClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->credito_cuenta_pagarClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->credito_cuenta_pagarClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->credito_cuenta_pagarClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->credito_cuenta_pagarClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->credito_cuenta_pagarClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->credito_cuenta_pagarClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->credito_cuenta_pagarClase->setid_cuenta_pagar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_pagar'));
				
				$this->credito_cuenta_pagarClase->setnumero($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero'));
				
				$this->credito_cuenta_pagarClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->credito_cuenta_pagarClase->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_vence')));
				
				$this->credito_cuenta_pagarClase->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_proveedor'));
				
				$this->credito_cuenta_pagarClase->setmonto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto'));
				
				$this->credito_cuenta_pagarClase->setsaldo((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'saldo'));
				
				$this->credito_cuenta_pagarClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->credito_cuenta_pagarClase->setsub_total((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'sub_total'));
				
				$this->credito_cuenta_pagarClase->setiva((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'iva'));
				
				$this->credito_cuenta_pagarClase->setes_balance_inicial(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'es_balance_inicial')));
				
				$this->credito_cuenta_pagarClase->setid_estado((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado'));
				
				$this->credito_cuenta_pagarClase->setreferencia($this->getDataCampoFormTabla('form'.$this->strSufijo,'referencia'));
				
				$this->credito_cuenta_pagarClase->setdebito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'debito'));
				
				$this->credito_cuenta_pagarClase->setcredito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'credito'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->credito_cuenta_pagarModel->set($this->credito_cuenta_pagarClase);
				
				/*$this->credito_cuenta_pagarModel->set($this->migrarModelcredito_cuenta_pagar($this->credito_cuenta_pagarClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setId($this->credito_cuenta_pagarClase->getId());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setVersionRow($this->credito_cuenta_pagarClase->getVersionRow());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setVersionRow($this->credito_cuenta_pagarClase->getVersionRow());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setid_empresa($this->credito_cuenta_pagarClase->getid_empresa());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setid_sucursal($this->credito_cuenta_pagarClase->getid_sucursal());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setid_ejercicio($this->credito_cuenta_pagarClase->getid_ejercicio());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setid_periodo($this->credito_cuenta_pagarClase->getid_periodo());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setid_usuario($this->credito_cuenta_pagarClase->getid_usuario());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setid_cuenta_pagar($this->credito_cuenta_pagarClase->getid_cuenta_pagar());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setnumero($this->credito_cuenta_pagarClase->getnumero());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setfecha_emision($this->credito_cuenta_pagarClase->getfecha_emision());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setfecha_vence($this->credito_cuenta_pagarClase->getfecha_vence());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setid_termino_pago_proveedor($this->credito_cuenta_pagarClase->getid_termino_pago_proveedor());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setmonto($this->credito_cuenta_pagarClase->getmonto());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setsaldo($this->credito_cuenta_pagarClase->getsaldo());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setdescripcion($this->credito_cuenta_pagarClase->getdescripcion());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setsub_total($this->credito_cuenta_pagarClase->getsub_total());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setiva($this->credito_cuenta_pagarClase->getiva());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setes_balance_inicial($this->credito_cuenta_pagarClase->getes_balance_inicial());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setid_estado($this->credito_cuenta_pagarClase->getid_estado());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setreferencia($this->credito_cuenta_pagarClase->getreferencia());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setdebito($this->credito_cuenta_pagarClase->getdebito());	
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setcredito($this->credito_cuenta_pagarClase->getcredito());	
		} else {
			$this->credito_cuenta_pagarClase->setId($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getId());	
			$this->credito_cuenta_pagarClase->setVersionRow($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getVersionRow());	
			$this->credito_cuenta_pagarClase->setVersionRow($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getVersionRow());	
			$this->credito_cuenta_pagarClase->setid_empresa($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getid_empresa());	
			$this->credito_cuenta_pagarClase->setid_sucursal($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getid_sucursal());	
			$this->credito_cuenta_pagarClase->setid_ejercicio($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getid_ejercicio());	
			$this->credito_cuenta_pagarClase->setid_periodo($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getid_periodo());	
			$this->credito_cuenta_pagarClase->setid_usuario($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getid_usuario());	
			$this->credito_cuenta_pagarClase->setid_cuenta_pagar($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getid_cuenta_pagar());	
			$this->credito_cuenta_pagarClase->setnumero($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getnumero());	
			$this->credito_cuenta_pagarClase->setfecha_emision($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getfecha_emision());	
			$this->credito_cuenta_pagarClase->setfecha_vence($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getfecha_vence());	
			$this->credito_cuenta_pagarClase->setid_termino_pago_proveedor($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getid_termino_pago_proveedor());	
			$this->credito_cuenta_pagarClase->setmonto($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getmonto());	
			$this->credito_cuenta_pagarClase->setsaldo($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getsaldo());	
			$this->credito_cuenta_pagarClase->setdescripcion($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getdescripcion());	
			$this->credito_cuenta_pagarClase->setsub_total($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getsub_total());	
			$this->credito_cuenta_pagarClase->setiva($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getiva());	
			$this->credito_cuenta_pagarClase->setes_balance_inicial($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getes_balance_inicial());	
			$this->credito_cuenta_pagarClase->setid_estado($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getid_estado());	
			$this->credito_cuenta_pagarClase->setreferencia($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getreferencia());	
			$this->credito_cuenta_pagarClase->setdebito($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getdebito());	
			$this->credito_cuenta_pagarClase->setcredito($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getcredito());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->credito_cuenta_pagarModel->invalidFieldsMe();
		
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
		if($strNombreCampo=='id_cuenta_pagar') {$this->strMensajeid_cuenta_pagar=$strMensajeCampo;}
		if($strNombreCampo=='numero') {$this->strMensajenumero=$strMensajeCampo;}
		if($strNombreCampo=='fecha_emision') {$this->strMensajefecha_emision=$strMensajeCampo;}
		if($strNombreCampo=='fecha_vence') {$this->strMensajefecha_vence=$strMensajeCampo;}
		if($strNombreCampo=='id_termino_pago_proveedor') {$this->strMensajeid_termino_pago_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='monto') {$this->strMensajemonto=$strMensajeCampo;}
		if($strNombreCampo=='saldo') {$this->strMensajesaldo=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='sub_total') {$this->strMensajesub_total=$strMensajeCampo;}
		if($strNombreCampo=='iva') {$this->strMensajeiva=$strMensajeCampo;}
		if($strNombreCampo=='es_balance_inicial') {$this->strMensajees_balance_inicial=$strMensajeCampo;}
		if($strNombreCampo=='id_estado') {$this->strMensajeid_estado=$strMensajeCampo;}
		if($strNombreCampo=='referencia') {$this->strMensajereferencia=$strMensajeCampo;}
		if($strNombreCampo=='debito') {$this->strMensajedebito=$strMensajeCampo;}
		if($strNombreCampo=='credito') {$this->strMensajecredito=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajeid_cuenta_pagar='';
		$this->strMensajenumero='';
		$this->strMensajefecha_emision='';
		$this->strMensajefecha_vence='';
		$this->strMensajeid_termino_pago_proveedor='';
		$this->strMensajemonto='';
		$this->strMensajesaldo='';
		$this->strMensajedescripcion='';
		$this->strMensajesub_total='';
		$this->strMensajeiva='';
		$this->strMensajees_balance_inicial='';
		$this->strMensajeid_estado='';
		$this->strMensajereferencia='';
		$this->strMensajedebito='';
		$this->strMensajecredito='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->credito_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$credito_cuenta_pagar_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME));
						
			if($credito_cuenta_pagar_session==null) {
				$credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
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
						$this->credito_cuenta_pagarLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->credito_cuenta_pagarActual =$this->credito_cuenta_pagarClase;
			
			/*$this->credito_cuenta_pagarActual =$this->migrarModelcredito_cuenta_pagar($this->credito_cuenta_pagarClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars(),$this->credito_cuenta_pagarActual);
			
			$this->actualizarControllerConReturnGeneral($this->credito_cuenta_pagarReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->getNewConnexionToDeep();
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
				$this->credito_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$credito_cuenta_pagarsLocal=$this->getListaActual();
		
		$iIndice=credito_cuenta_pagar_util::getIndiceNuevo($credito_cuenta_pagarsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(credito_cuenta_pagar $credito_cuenta_pagar,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$credito_cuenta_pagarsLocal=$this->getListaActual();
		
		$iIndice=credito_cuenta_pagar_util::getIndiceActual($credito_cuenta_pagarsLocal,$credito_cuenta_pagar,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevocredito_cuenta_pagar')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->credito_cuenta_pagarActual =$this->credito_cuenta_pagarClase;
			
			/*$this->credito_cuenta_pagarActual =$this->migrarModelcredito_cuenta_pagar($this->credito_cuenta_pagarClase);*/
			
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
			
			$this->credito_cuenta_pagarLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cuenta_pagar');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
			
			$this->credito_cuenta_pagarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->credito_cuenta_pagarLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->credito_cuenta_pagarLogic->setcredito_cuenta_pagar(new credito_cuenta_pagar());
				
				$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setIsNew(true);
				$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setIsChanged(true);
				$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->credito_cuenta_pagarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->credito_cuenta_pagarLogic->credito_cuenta_pagars[]=$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->credito_cuenta_pagarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->credito_cuenta_pagarLogic->saveRelaciones($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setIsChanged(true);
				$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setIsNew(false);
				$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->credito_cuenta_pagarModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar(),$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->credito_cuenta_pagarLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->credito_cuenta_pagarLogic->saveRelaciones($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setIsDeleted(true);
				$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setIsNew(false);
				$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setIsChanged(false);				
				
				$this->actualizarLista($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar(),$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->credito_cuenta_pagarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->credito_cuenta_pagarLogic->saveRelaciones($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->credito_cuenta_pagarsEliminados[]=$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->credito_cuenta_pagarLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->credito_cuenta_pagarLogic->saveRelaciones($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->credito_cuenta_pagarsEliminados=array();
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
				$class=new Classe('cuenta_pagar');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->credito_cuenta_pagarLogic->setcredito_cuenta_pagars();*/
					
					$this->credito_cuenta_pagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->credito_cuenta_pagarLogic->setIsConDeepLoad(false);
			
			$this->credito_cuenta_pagars=$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(credito_cuenta_pagar_util::$STR_SESSION_NAME.'Lista',serialize($this->credito_cuenta_pagars));
				$this->Session->write(credito_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->credito_cuenta_pagarsEliminados));
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
				$this->credito_cuenta_pagarLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->credito_cuenta_pagarLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalcredito_cuenta_pagar;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->credito_cuenta_pagarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->credito_cuenta_pagars as $credito_cuenta_pagarLocal) {
				if($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->getId()==$credito_cuenta_pagarLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar()->setIsDeleted(true);
			$this->credito_cuenta_pagarsEliminados[]=$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->credito_cuenta_pagars[$indice]);
				
				$this->credito_cuenta_pagars = array_values($this->credito_cuenta_pagars);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelcredito_cuenta_pagar($this->credito_cuenta_pagarClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(credito_cuenta_pagar $credito_cuenta_pagar,array $credito_cuenta_pagars) {
		try {
			foreach($credito_cuenta_pagars as $credito_cuenta_pagarLocal){ 
				if($credito_cuenta_pagarLocal->getId()==$credito_cuenta_pagar->getId()) {
					$credito_cuenta_pagarLocal->setIsChanged($credito_cuenta_pagar->getIsChanged());
					$credito_cuenta_pagarLocal->setIsNew($credito_cuenta_pagar->getIsNew());
					$credito_cuenta_pagarLocal->setIsDeleted($credito_cuenta_pagar->getIsDeleted());
					//$credito_cuenta_pagarLocal->setbitExpired($credito_cuenta_pagar->getbitExpired());
					
					$credito_cuenta_pagarLocal->setId($credito_cuenta_pagar->getId());	
					$credito_cuenta_pagarLocal->setVersionRow($credito_cuenta_pagar->getVersionRow());	
					$credito_cuenta_pagarLocal->setVersionRow($credito_cuenta_pagar->getVersionRow());	
					$credito_cuenta_pagarLocal->setid_empresa($credito_cuenta_pagar->getid_empresa());	
					$credito_cuenta_pagarLocal->setid_sucursal($credito_cuenta_pagar->getid_sucursal());	
					$credito_cuenta_pagarLocal->setid_ejercicio($credito_cuenta_pagar->getid_ejercicio());	
					$credito_cuenta_pagarLocal->setid_periodo($credito_cuenta_pagar->getid_periodo());	
					$credito_cuenta_pagarLocal->setid_usuario($credito_cuenta_pagar->getid_usuario());	
					$credito_cuenta_pagarLocal->setid_cuenta_pagar($credito_cuenta_pagar->getid_cuenta_pagar());	
					$credito_cuenta_pagarLocal->setnumero($credito_cuenta_pagar->getnumero());	
					$credito_cuenta_pagarLocal->setfecha_emision($credito_cuenta_pagar->getfecha_emision());	
					$credito_cuenta_pagarLocal->setfecha_vence($credito_cuenta_pagar->getfecha_vence());	
					$credito_cuenta_pagarLocal->setid_termino_pago_proveedor($credito_cuenta_pagar->getid_termino_pago_proveedor());	
					$credito_cuenta_pagarLocal->setmonto($credito_cuenta_pagar->getmonto());	
					$credito_cuenta_pagarLocal->setsaldo($credito_cuenta_pagar->getsaldo());	
					$credito_cuenta_pagarLocal->setdescripcion($credito_cuenta_pagar->getdescripcion());	
					$credito_cuenta_pagarLocal->setsub_total($credito_cuenta_pagar->getsub_total());	
					$credito_cuenta_pagarLocal->setiva($credito_cuenta_pagar->getiva());	
					$credito_cuenta_pagarLocal->setes_balance_inicial($credito_cuenta_pagar->getes_balance_inicial());	
					$credito_cuenta_pagarLocal->setid_estado($credito_cuenta_pagar->getid_estado());	
					$credito_cuenta_pagarLocal->setreferencia($credito_cuenta_pagar->getreferencia());	
					$credito_cuenta_pagarLocal->setdebito($credito_cuenta_pagar->getdebito());	
					$credito_cuenta_pagarLocal->setcredito($credito_cuenta_pagar->getcredito());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$credito_cuenta_pagarsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$credito_cuenta_pagarsLocal=$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$credito_cuenta_pagarsLocal=$this->credito_cuenta_pagars;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $credito_cuenta_pagarsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars() as $credito_cuenta_pagar) {
				if($credito_cuenta_pagar->getId()==$id) {
					$this->credito_cuenta_pagarLogic->setcredito_cuenta_pagar($credito_cuenta_pagar);
					
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
		/*$credito_cuenta_pagarsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->credito_cuenta_pagars as $credito_cuenta_pagar) {
			$credito_cuenta_pagar->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->credito_cuenta_pagars[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : credito_cuenta_pagar_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$credito_cuenta_pagar_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME));
						
		if($credito_cuenta_pagar_session==null) {
			$credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
		}
		
		
		$this->credito_cuenta_pagarReturnGeneral=new credito_cuenta_pagar_param_return();
		$this->credito_cuenta_pagarParameterGeneral=new credito_cuenta_pagar_param_return();
			
		$this->credito_cuenta_pagarParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualcredito_cuenta_pagar(this.credito_cuenta_pagar,true);
			this.setVariablesFormularioToObjetoActualForeignKeyscredito_cuenta_pagar(this.credito_cuenta_pagar);*/
			
			if($credito_cuenta_pagar_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualcredito_cuenta_pagar(this.credito_cuenta_pagar,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->credito_cuenta_pagarActual=$this->credito_cuenta_pagarClase;
				
				$this->setCopiarVariablesObjetos($this->credito_cuenta_pagarActual,$this->credito_cuenta_pagar,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->credito_cuenta_pagarReturnGeneral=$this->credito_cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars(),$this->credito_cuenta_pagar,$this->credito_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($credito_cuenta_pagar_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeancredito_cuenta_pagar($classes,$this->credito_cuenta_pagarReturnGeneral,$this->credito_cuenta_pagarBean,false);*/
				}
					
				if($this->credito_cuenta_pagarReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->credito_cuenta_pagarReturnGeneral->getcredito_cuenta_pagar(),$this->credito_cuenta_pagarActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeycredito_cuenta_pagar($this->credito_cuenta_pagarReturnGeneral->getcredito_cuenta_pagar());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariocredito_cuenta_pagar($this->credito_cuenta_pagarReturnGeneral->getcredito_cuenta_pagar());*/
				}
					
				if($this->credito_cuenta_pagarReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->credito_cuenta_pagarReturnGeneral->getcredito_cuenta_pagar(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->credito_cuenta_pagar,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(credito_cuenta_pagarJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualcredito_cuenta_pagar(this.credito_cuenta_pagar,true);
				this.setVariablesFormularioToObjetoActualForeignKeyscredito_cuenta_pagar(this.credito_cuenta_pagar);				
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
				
				if($this->credito_cuenta_pagarAnterior!=null) {
					$this->credito_cuenta_pagar=$this->credito_cuenta_pagarAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->credito_cuenta_pagarReturnGeneral=$this->credito_cuenta_pagarLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars(),$this->credito_cuenta_pagar,$this->credito_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->credito_cuenta_pagarReturnGeneral->getcredito_cuenta_pagar(),$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars());
			*/
		}
		
		return $this->credito_cuenta_pagarReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$this->credito_cuenta_pagarReturnGeneral=new credito_cuenta_pagar_param_return();			
			$this->credito_cuenta_pagarParameterGeneral=new credito_cuenta_pagar_param_return();
			
			$this->credito_cuenta_pagarParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->credito_cuenta_pagarReturnGeneral=$this->credito_cuenta_pagarLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->credito_cuenta_pagars,$this->credito_cuenta_pagarParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->credito_cuenta_pagarReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->credito_cuenta_pagarReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->credito_cuenta_pagarReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
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
		
		$this->credito_cuenta_pagarReturnGeneral=new credito_cuenta_pagar_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_credito_cuenta_pagar') {
		    $sDominio='credito_cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->credito_cuenta_pagarReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->credito_cuenta_pagarReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='credito_cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='credito_cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='credito_cuenta_pagar';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->credito_cuenta_pagarReturnGeneral=new credito_cuenta_pagar_param_return();
		$this->credito_cuenta_pagarParameterGeneral=new credito_cuenta_pagar_param_return();
			
		$this->credito_cuenta_pagarParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->credito_cuenta_pagarReturnGeneral=$this->credito_cuenta_pagarLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars(),$this->credito_cuenta_pagar,$this->credito_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->credito_cuenta_pagarReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->credito_cuenta_pagarReturnGeneral->getcredito_cuenta_pagar(),$classes);*/
		}									
	
		if($this->credito_cuenta_pagarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->credito_cuenta_pagarReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->credito_cuenta_pagarReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $credito_cuenta_pagars,credito_cuenta_pagar $credito_cuenta_pagar) {
		
		$credito_cuenta_pagar_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME));
						
		if($credito_cuenta_pagar_session==null) {
			$credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(credito_cuenta_pagar_util::$CLASSNAME);
			}	
			*/
			
			$this->credito_cuenta_pagarReturnGeneral=new credito_cuenta_pagar_param_return();
			$this->credito_cuenta_pagarParameterGeneral=new credito_cuenta_pagar_param_return();
			
			$this->credito_cuenta_pagarParameterGeneral->setdata($this->data);
		
		
			
		if($credito_cuenta_pagar_session->conGuardarRelaciones) {
			$classes=credito_cuenta_pagar_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->credito_cuenta_pagarActual,$this->credito_cuenta_pagar,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->credito_cuenta_pagarReturnGeneral=$this->credito_cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars(),$this->credito_cuenta_pagarActual,$this->credito_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->credito_cuenta_pagarReturnGeneral=$this->credito_cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$credito_cuenta_pagars,$credito_cuenta_pagar,$this->credito_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelcredito_cuenta_pagar($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar());*/
			
			$this->credito_cuenta_pagar=$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagar();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->credito_cuenta_pagar);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$credito_cuenta_pagarActual=new credito_cuenta_pagar();
			
			if($this->credito_cuenta_pagarClase==null) {		
				$this->credito_cuenta_pagarClase=new credito_cuenta_pagar();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$credito_cuenta_pagarActual=$this->credito_cuenta_pagars[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setid_cuenta_pagar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setsub_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setiva((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setes_balance_inicial(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_18')));  } else { $credito_cuenta_pagarActual->setes_balance_inicial(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setreferencia($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setdebito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $credito_cuenta_pagarActual->setcredito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }

				$this->credito_cuenta_pagarClase=$credito_cuenta_pagarActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->credito_cuenta_pagarModel->set($this->credito_cuenta_pagarClase);
				
				/*$this->credito_cuenta_pagarModel->set($this->migrarModelcredito_cuenta_pagar($this->credito_cuenta_pagarClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->credito_cuenta_pagars=$this->migrarModelcredito_cuenta_pagar($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars());							
		$this->credito_cuenta_pagars=$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars();*/
		
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
			$this->Session->write(credito_cuenta_pagar_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$credito_cuenta_pagar_control_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($credito_cuenta_pagar_control_session==null) {
				$credito_cuenta_pagar_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($credito_cuenta_pagar_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(credito_cuenta_pagar_util::$STR_SESSION_NAME,$this);*/
		} else {
			$credito_cuenta_pagar_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME));
			
			if($credito_cuenta_pagar_session==null) {
				$credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
			}
			
			$this->set(credito_cuenta_pagar_util::$STR_SESSION_NAME, $credito_cuenta_pagar_session);
		}
	}
	
	public function setCopiarVariablesObjetos(credito_cuenta_pagar $credito_cuenta_pagarOrigen,credito_cuenta_pagar $credito_cuenta_pagar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($credito_cuenta_pagar==null) {
				$credito_cuenta_pagar=new credito_cuenta_pagar();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getId()!=null && $credito_cuenta_pagarOrigen->getId()!=0)) {$credito_cuenta_pagar->setId($credito_cuenta_pagarOrigen->getId());}}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getid_cuenta_pagar()!=null && $credito_cuenta_pagarOrigen->getid_cuenta_pagar()!=-1)) {$credito_cuenta_pagar->setid_cuenta_pagar($credito_cuenta_pagarOrigen->getid_cuenta_pagar());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getnumero()!=null && $credito_cuenta_pagarOrigen->getnumero()!='')) {$credito_cuenta_pagar->setnumero($credito_cuenta_pagarOrigen->getnumero());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getfecha_emision()!=null && $credito_cuenta_pagarOrigen->getfecha_emision()!=date('Y-m-d'))) {$credito_cuenta_pagar->setfecha_emision($credito_cuenta_pagarOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getfecha_vence()!=null && $credito_cuenta_pagarOrigen->getfecha_vence()!=date('Y-m-d'))) {$credito_cuenta_pagar->setfecha_vence($credito_cuenta_pagarOrigen->getfecha_vence());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getid_termino_pago_proveedor()!=null && $credito_cuenta_pagarOrigen->getid_termino_pago_proveedor()!=-1)) {$credito_cuenta_pagar->setid_termino_pago_proveedor($credito_cuenta_pagarOrigen->getid_termino_pago_proveedor());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getmonto()!=null && $credito_cuenta_pagarOrigen->getmonto()!=0.0)) {$credito_cuenta_pagar->setmonto($credito_cuenta_pagarOrigen->getmonto());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getsaldo()!=null && $credito_cuenta_pagarOrigen->getsaldo()!=0.0)) {$credito_cuenta_pagar->setsaldo($credito_cuenta_pagarOrigen->getsaldo());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getdescripcion()!=null && $credito_cuenta_pagarOrigen->getdescripcion()!='')) {$credito_cuenta_pagar->setdescripcion($credito_cuenta_pagarOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getsub_total()!=null && $credito_cuenta_pagarOrigen->getsub_total()!=0.0)) {$credito_cuenta_pagar->setsub_total($credito_cuenta_pagarOrigen->getsub_total());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getiva()!=null && $credito_cuenta_pagarOrigen->getiva()!=0.0)) {$credito_cuenta_pagar->setiva($credito_cuenta_pagarOrigen->getiva());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getes_balance_inicial()!=null && $credito_cuenta_pagarOrigen->getes_balance_inicial()!=false)) {$credito_cuenta_pagar->setes_balance_inicial($credito_cuenta_pagarOrigen->getes_balance_inicial());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getid_estado()!=null && $credito_cuenta_pagarOrigen->getid_estado()!=-1)) {$credito_cuenta_pagar->setid_estado($credito_cuenta_pagarOrigen->getid_estado());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getreferencia()!=null && $credito_cuenta_pagarOrigen->getreferencia()!='')) {$credito_cuenta_pagar->setreferencia($credito_cuenta_pagarOrigen->getreferencia());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getdebito()!=null && $credito_cuenta_pagarOrigen->getdebito()!=0.0)) {$credito_cuenta_pagar->setdebito($credito_cuenta_pagarOrigen->getdebito());}
			if($conDefault || ($conDefault==false && $credito_cuenta_pagarOrigen->getcredito()!=null && $credito_cuenta_pagarOrigen->getcredito()!=0.0)) {$credito_cuenta_pagar->setcredito($credito_cuenta_pagarOrigen->getcredito());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$credito_cuenta_pagarsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$credito_cuenta_pagarsSeleccionados[]=$this->credito_cuenta_pagars[$indice];
			}
		}
		
		return $credito_cuenta_pagarsSeleccionados;
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
		$credito_cuenta_pagar= new credito_cuenta_pagar();
		
		foreach($this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars() as $credito_cuenta_pagar) {
			
		}		
		
		if($credito_cuenta_pagar!=null);
	}
	
	public function cargarRelaciones(array $credito_cuenta_pagars=array()) : array {	
		
		$credito_cuenta_pagarsRespaldo = array();
		$credito_cuenta_pagarsLocal = array();
		
		credito_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$credito_cuenta_pagarsResp=array();
		$classes=array();
			
		
			
			
		$credito_cuenta_pagarsRespaldo=$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars();
			
		$this->credito_cuenta_pagarLogic->setIsConDeep(true);
		
		$this->credito_cuenta_pagarLogic->setcredito_cuenta_pagars($credito_cuenta_pagars);
			
		$this->credito_cuenta_pagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$credito_cuenta_pagarsLocal=$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars();
			
		/*RESPALDO*/
		$this->credito_cuenta_pagarLogic->setcredito_cuenta_pagars($credito_cuenta_pagarsRespaldo);
			
		$this->credito_cuenta_pagarLogic->setIsConDeep(false);
		
		if($credito_cuenta_pagarsResp!=null);
		
		return $credito_cuenta_pagarsLocal;
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
				$this->credito_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(credito_cuenta_pagar_session $credito_cuenta_pagar_session) {
		$credito_cuenta_pagar_session->strTypeOnLoad=$this->strTypeOnLoadcredito_cuenta_pagar;
		$credito_cuenta_pagar_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarcredito_cuenta_pagar;
		$credito_cuenta_pagar_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarcredito_cuenta_pagar;
		$credito_cuenta_pagar_session->bitEsPopup=$this->bitEsPopup;
		$credito_cuenta_pagar_session->bitEsBusqueda=$this->bitEsBusqueda;
		$credito_cuenta_pagar_session->strFuncionJs=$this->strFuncionJs;
		/*$credito_cuenta_pagar_session->strSufijo=$this->strSufijo;*/
		$credito_cuenta_pagar_session->bitEsRelaciones=$this->bitEsRelaciones;
		$credito_cuenta_pagar_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, credito_cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			
		} else {
			
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$credito_cuenta_pagarViewAdditional=new credito_cuenta_pagarView_add();
		$credito_cuenta_pagarViewAdditional->credito_cuenta_pagars=$this->credito_cuenta_pagars;
		$credito_cuenta_pagarViewAdditional->Session=$this->Session;
		
		return $credito_cuenta_pagarViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$credito_cuenta_pagarsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$credito_cuenta_pagarsLocal=$this->credito_cuenta_pagars;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$credito_cuenta_pagarsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($credito_cuenta_pagarsLocal)<=0) {
					$credito_cuenta_pagarsLocal=$this->credito_cuenta_pagars;
				}
			} else {
				$credito_cuenta_pagarsLocal=$this->credito_cuenta_pagars;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcredito_cuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcredito_cuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$credito_cuenta_pagarLogic=new credito_cuenta_pagar_logic();
		$credito_cuenta_pagarLogic->setcredito_cuenta_pagars($this->credito_cuenta_pagars);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_pagar');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$credito_cuenta_pagarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->credito_cuenta_pagars=$credito_cuenta_pagarLogic->getcredito_cuenta_pagars();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->credito_cuenta_pagarsLocal=$this->credito_cuenta_pagars;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=credito_cuenta_pagar_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=credito_cuenta_pagar_util::$STR_TABLE_NAME;		
			
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
			
			$credito_cuenta_pagars = $this->credito_cuenta_pagars;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = credito_cuenta_pagar_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = credito_cuenta_pagar_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/credito_cuenta_pagar_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->credito_cuenta_pagars=$credito_cuenta_pagars;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->credito_cuenta_pagarsLocal=$credito_cuenta_pagarsLocal;
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
		
		$credito_cuenta_pagarsLocal=array();
		
		$credito_cuenta_pagarsLocal=$this->credito_cuenta_pagars;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcredito_cuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcredito_cuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$credito_cuenta_pagarLogic=new credito_cuenta_pagar_logic();
		$credito_cuenta_pagarLogic->setcredito_cuenta_pagars($this->credito_cuenta_pagars);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_pagar');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$credito_cuenta_pagarLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->credito_cuenta_pagars=$credito_cuenta_pagarLogic->getcredito_cuenta_pagars();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$credito_cuenta_pagars = $this->credito_cuenta_pagars;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = credito_cuenta_pagar_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = credito_cuenta_pagar_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/credito_cuenta_pagar_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->credito_cuenta_pagars=$credito_cuenta_pagars;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->credito_cuenta_pagarsLocal=$credito_cuenta_pagarsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $credito_cuenta_pagars=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->credito_cuenta_pagarsReporte = $credito_cuenta_pagars;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcredito_cuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcredito_cuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $credito_cuenta_pagars=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->credito_cuenta_pagarsReporte = $credito_cuenta_pagars;		
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
		
		
		$this->credito_cuenta_pagarsReporte=$this->cargarRelaciones($credito_cuenta_pagars);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcredito_cuenta_pagarsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcredito_cuenta_pagarsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(credito_cuenta_pagar $credito_cuenta_pagar=null) : string {	
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
			
			
			$credito_cuenta_pagarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$credito_cuenta_pagarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($credito_cuenta_pagarsLocal)<=0) {
					/*//DEBE ESCOGER
					$credito_cuenta_pagarsLocal=$this->credito_cuenta_pagars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$credito_cuenta_pagarsLocal=$this->credito_cuenta_pagars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($credito_cuenta_pagarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($credito_cuenta_pagarsLocal,true);
			
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
				$this->credito_cuenta_pagarLogic->getNewConnexionToDeep();
			}
					
			$credito_cuenta_pagarsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$credito_cuenta_pagarsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($credito_cuenta_pagarsLocal)<=0) {
					/*//DEBE ESCOGER
					$credito_cuenta_pagarsLocal=$this->credito_cuenta_pagars;*/
				}
			} else {
				/*//DEBE ESCOGER
				$credito_cuenta_pagarsLocal=$this->credito_cuenta_pagars;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($credito_cuenta_pagarsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($credito_cuenta_pagarsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Credito Cuenta Pagars';
			
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
			$fileName='credito_cuenta_pagar';
			
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
			
			$title='Reporte de  Credito Cuenta Pagars';
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
			
			$title='Reporte de  Credito Cuenta Pagars';
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
				$this->credito_cuenta_pagarLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Credito Cuenta Pagars';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->credito_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->credito_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=credito_cuenta_pagar_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->credito_cuenta_pagarsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->credito_cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->credito_cuenta_pagarsAuxiliar)<=0) {
					$this->credito_cuenta_pagarsAuxiliar=$this->credito_cuenta_pagars;
				}
			} else {
				$this->credito_cuenta_pagarsAuxiliar=$this->credito_cuenta_pagars;
			}
		/*} else {
			$this->credito_cuenta_pagarsAuxiliar=$this->credito_cuenta_pagarsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->credito_cuenta_pagarsAuxiliar as $credito_cuenta_pagar) {
				$row=array();
				
				$row=credito_cuenta_pagar_util::getDataReportRow($tipo,$credito_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			credito_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$credito_cuenta_pagarsResp=array();
			$classes=array();
			
			
			
			
			$credito_cuenta_pagarsResp=$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars();
			
			$this->credito_cuenta_pagarLogic->setIsConDeep(true);
			
			$this->credito_cuenta_pagarLogic->setcredito_cuenta_pagars($this->credito_cuenta_pagarsAuxiliar);
			
			$this->credito_cuenta_pagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->credito_cuenta_pagarsAuxiliar=$this->credito_cuenta_pagarLogic->getcredito_cuenta_pagars();
			
			//RESPALDO
			$this->credito_cuenta_pagarLogic->setcredito_cuenta_pagars($credito_cuenta_pagarsResp);
			
			$this->credito_cuenta_pagarLogic->setIsConDeep(false);
			*/
			
			$this->credito_cuenta_pagarsAuxiliar=$this->cargarRelaciones($this->credito_cuenta_pagarsAuxiliar);
			
			$i=0;
			
			foreach ($this->credito_cuenta_pagarsAuxiliar as $credito_cuenta_pagar) {
				$row=array();
				
				if($i!=0) {
					$row=credito_cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=credito_cuenta_pagar_util::getDataReportRow($tipo,$credito_cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				
				
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
		$this->credito_cuenta_pagarsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->credito_cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->credito_cuenta_pagarsAuxiliar)<=0) {
					$this->credito_cuenta_pagarsAuxiliar=$this->credito_cuenta_pagars;
				}
			} else {
				$this->credito_cuenta_pagarsAuxiliar=$this->credito_cuenta_pagars;
			}
		/*} else {
			$this->credito_cuenta_pagarsAuxiliar=$this->credito_cuenta_pagarsReporte;	
		}*/
		
		foreach ($this->credito_cuenta_pagarsAuxiliar as $credito_cuenta_pagar) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(credito_cuenta_pagar_util::getcredito_cuenta_pagarDescripcion($credito_cuenta_pagar),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy(' Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta Pagar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Pagar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getid_cuenta_pagarDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getnumero(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Vence',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vence',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getfecha_vence(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Termino Pago Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Termino Pago Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getid_termino_pago_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getmonto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Saldo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Saldo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getsaldo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sub Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getsub_total(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iva',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getiva(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Es Balance Inicial',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Es Balance Inicial',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getes_balance_inicial(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Estado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Estado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getid_estadoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Referencia',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Referencia',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getreferencia(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Debito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Debito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getdebito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Credito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Credito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($credito_cuenta_pagar->getcredito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface credito_cuenta_pagar_base_controlI {			
		
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
		public function getIndiceActual(credito_cuenta_pagar $credito_cuenta_pagar,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(credito_cuenta_pagar $credito_cuenta_pagar,array $credito_cuenta_pagars);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : credito_cuenta_pagar_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $credito_cuenta_pagars,credito_cuenta_pagar $credito_cuenta_pagar);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(credito_cuenta_pagar_param_return $credito_cuenta_pagarReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(credito_cuenta_pagar_session $credito_cuenta_pagar_session);		
		public function actualizarInvitadoSessionDivStyleVariables(credito_cuenta_pagar_session $credito_cuenta_pagar_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(credito_cuenta_pagar $credito_cuenta_pagarOrigen,credito_cuenta_pagar $credito_cuenta_pagar,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(credito_cuenta_pagar_control $credito_cuenta_pagar_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $credito_cuenta_pagars=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(credito_cuenta_pagar_session $credito_cuenta_pagar_session);		
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
		public function getHtmlTablaDatosResumen(array $credito_cuenta_pagars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $credito_cuenta_pagars=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(credito_cuenta_pagar $credito_cuenta_pagar=null) : string;
		
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
