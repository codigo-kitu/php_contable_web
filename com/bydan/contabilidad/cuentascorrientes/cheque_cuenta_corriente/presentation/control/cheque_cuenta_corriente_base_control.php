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
	


class cheque_cuenta_corriente_base_control extends cheque_cuenta_corriente_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->cheque_cuenta_corrienteClase==null) {		
				$this->cheque_cuenta_corrienteClase=new cheque_cuenta_corriente();
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
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_corriente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_cheque')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_categoria_cheque',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_beneficiario_ocacional_cheque')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_beneficiario_ocacional_cheque',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado_deposito_retiro')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_estado_deposito_retiro',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->cheque_cuenta_corrienteClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->cheque_cuenta_corrienteClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->cheque_cuenta_corrienteClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->cheque_cuenta_corrienteClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->cheque_cuenta_corrienteClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->cheque_cuenta_corrienteClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->cheque_cuenta_corrienteClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->cheque_cuenta_corrienteClase->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente'));
				
				$this->cheque_cuenta_corrienteClase->setid_categoria_cheque((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_cheque'));
				
				$this->cheque_cuenta_corrienteClase->setid_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cliente'));
				
				$this->cheque_cuenta_corrienteClase->setid_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor'));
				
				$this->cheque_cuenta_corrienteClase->setid_beneficiario_ocacional_cheque((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_beneficiario_ocacional_cheque'));
				
				$this->cheque_cuenta_corrienteClase->setnumero_cheque($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_cheque'));
				
				$this->cheque_cuenta_corrienteClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->cheque_cuenta_corrienteClase->setmonto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto'));
				
				$this->cheque_cuenta_corrienteClase->setmonto_texto($this->getDataCampoFormTabla('form'.$this->strSufijo,'monto_texto'));
				
				$this->cheque_cuenta_corrienteClase->setsaldo((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'saldo'));
				
				$this->cheque_cuenta_corrienteClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->cheque_cuenta_corrienteClase->setcobrado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'cobrado')));
				
				$this->cheque_cuenta_corrienteClase->setimpreso(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'impreso')));
				
				$this->cheque_cuenta_corrienteClase->setid_estado_deposito_retiro((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado_deposito_retiro'));
				
				$this->cheque_cuenta_corrienteClase->setdebito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'debito'));
				
				$this->cheque_cuenta_corrienteClase->setcredito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'credito'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cheque_cuenta_corrienteModel->set($this->cheque_cuenta_corrienteClase);
				
				/*$this->cheque_cuenta_corrienteModel->set($this->migrarModelcheque_cuenta_corriente($this->cheque_cuenta_corrienteClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setId($this->cheque_cuenta_corrienteClase->getId());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setVersionRow($this->cheque_cuenta_corrienteClase->getVersionRow());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setVersionRow($this->cheque_cuenta_corrienteClase->getVersionRow());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setid_empresa($this->cheque_cuenta_corrienteClase->getid_empresa());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setid_sucursal($this->cheque_cuenta_corrienteClase->getid_sucursal());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setid_ejercicio($this->cheque_cuenta_corrienteClase->getid_ejercicio());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setid_periodo($this->cheque_cuenta_corrienteClase->getid_periodo());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setid_usuario($this->cheque_cuenta_corrienteClase->getid_usuario());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setid_cuenta_corriente($this->cheque_cuenta_corrienteClase->getid_cuenta_corriente());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setid_categoria_cheque($this->cheque_cuenta_corrienteClase->getid_categoria_cheque());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setid_cliente($this->cheque_cuenta_corrienteClase->getid_cliente());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setid_proveedor($this->cheque_cuenta_corrienteClase->getid_proveedor());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setid_beneficiario_ocacional_cheque($this->cheque_cuenta_corrienteClase->getid_beneficiario_ocacional_cheque());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setnumero_cheque($this->cheque_cuenta_corrienteClase->getnumero_cheque());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setfecha_emision($this->cheque_cuenta_corrienteClase->getfecha_emision());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setmonto($this->cheque_cuenta_corrienteClase->getmonto());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setmonto_texto($this->cheque_cuenta_corrienteClase->getmonto_texto());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setsaldo($this->cheque_cuenta_corrienteClase->getsaldo());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setdescripcion($this->cheque_cuenta_corrienteClase->getdescripcion());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setcobrado($this->cheque_cuenta_corrienteClase->getcobrado());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setimpreso($this->cheque_cuenta_corrienteClase->getimpreso());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setid_estado_deposito_retiro($this->cheque_cuenta_corrienteClase->getid_estado_deposito_retiro());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setdebito($this->cheque_cuenta_corrienteClase->getdebito());	
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setcredito($this->cheque_cuenta_corrienteClase->getcredito());	
		} else {
			$this->cheque_cuenta_corrienteClase->setId($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getId());	
			$this->cheque_cuenta_corrienteClase->setVersionRow($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getVersionRow());	
			$this->cheque_cuenta_corrienteClase->setVersionRow($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getVersionRow());	
			$this->cheque_cuenta_corrienteClase->setid_empresa($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getid_empresa());	
			$this->cheque_cuenta_corrienteClase->setid_sucursal($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getid_sucursal());	
			$this->cheque_cuenta_corrienteClase->setid_ejercicio($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getid_ejercicio());	
			$this->cheque_cuenta_corrienteClase->setid_periodo($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getid_periodo());	
			$this->cheque_cuenta_corrienteClase->setid_usuario($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getid_usuario());	
			$this->cheque_cuenta_corrienteClase->setid_cuenta_corriente($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getid_cuenta_corriente());	
			$this->cheque_cuenta_corrienteClase->setid_categoria_cheque($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getid_categoria_cheque());	
			$this->cheque_cuenta_corrienteClase->setid_cliente($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getid_cliente());	
			$this->cheque_cuenta_corrienteClase->setid_proveedor($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getid_proveedor());	
			$this->cheque_cuenta_corrienteClase->setid_beneficiario_ocacional_cheque($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getid_beneficiario_ocacional_cheque());	
			$this->cheque_cuenta_corrienteClase->setnumero_cheque($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getnumero_cheque());	
			$this->cheque_cuenta_corrienteClase->setfecha_emision($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getfecha_emision());	
			$this->cheque_cuenta_corrienteClase->setmonto($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getmonto());	
			$this->cheque_cuenta_corrienteClase->setmonto_texto($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getmonto_texto());	
			$this->cheque_cuenta_corrienteClase->setsaldo($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getsaldo());	
			$this->cheque_cuenta_corrienteClase->setdescripcion($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getdescripcion());	
			$this->cheque_cuenta_corrienteClase->setcobrado($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getcobrado());	
			$this->cheque_cuenta_corrienteClase->setimpreso($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getimpreso());	
			$this->cheque_cuenta_corrienteClase->setid_estado_deposito_retiro($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getid_estado_deposito_retiro());	
			$this->cheque_cuenta_corrienteClase->setdebito($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getdebito());	
			$this->cheque_cuenta_corrienteClase->setcredito($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getcredito());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->cheque_cuenta_corrienteModel->invalidFieldsMe();
		
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
		if($strNombreCampo=='id_cuenta_corriente') {$this->strMensajeid_cuenta_corriente=$strMensajeCampo;}
		if($strNombreCampo=='id_categoria_cheque') {$this->strMensajeid_categoria_cheque=$strMensajeCampo;}
		if($strNombreCampo=='id_cliente') {$this->strMensajeid_cliente=$strMensajeCampo;}
		if($strNombreCampo=='id_proveedor') {$this->strMensajeid_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='id_beneficiario_ocacional_cheque') {$this->strMensajeid_beneficiario_ocacional_cheque=$strMensajeCampo;}
		if($strNombreCampo=='numero_cheque') {$this->strMensajenumero_cheque=$strMensajeCampo;}
		if($strNombreCampo=='fecha_emision') {$this->strMensajefecha_emision=$strMensajeCampo;}
		if($strNombreCampo=='monto') {$this->strMensajemonto=$strMensajeCampo;}
		if($strNombreCampo=='monto_texto') {$this->strMensajemonto_texto=$strMensajeCampo;}
		if($strNombreCampo=='saldo') {$this->strMensajesaldo=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='cobrado') {$this->strMensajecobrado=$strMensajeCampo;}
		if($strNombreCampo=='impreso') {$this->strMensajeimpreso=$strMensajeCampo;}
		if($strNombreCampo=='id_estado_deposito_retiro') {$this->strMensajeid_estado_deposito_retiro=$strMensajeCampo;}
		if($strNombreCampo=='debito') {$this->strMensajedebito=$strMensajeCampo;}
		if($strNombreCampo=='credito') {$this->strMensajecredito=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajeid_cuenta_corriente='';
		$this->strMensajeid_categoria_cheque='';
		$this->strMensajeid_cliente='';
		$this->strMensajeid_proveedor='';
		$this->strMensajeid_beneficiario_ocacional_cheque='';
		$this->strMensajenumero_cheque='';
		$this->strMensajefecha_emision='';
		$this->strMensajemonto='';
		$this->strMensajemonto_texto='';
		$this->strMensajesaldo='';
		$this->strMensajedescripcion='';
		$this->strMensajecobrado='';
		$this->strMensajeimpreso='';
		$this->strMensajeid_estado_deposito_retiro='';
		$this->strMensajedebito='';
		$this->strMensajecredito='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($cheque_cuenta_corriente_session==null) {
				$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
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
						$this->cheque_cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->cheque_cuenta_corrienteActual =$this->cheque_cuenta_corrienteClase;
			
			/*$this->cheque_cuenta_corrienteActual =$this->migrarModelcheque_cuenta_corriente($this->cheque_cuenta_corrienteClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes(),$this->cheque_cuenta_corrienteActual);
			
			$this->actualizarControllerConReturnGeneral($this->cheque_cuenta_corrienteReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$cheque_cuenta_corrientesLocal=$this->getListaActual();
		
		$iIndice=cheque_cuenta_corriente_util::getIndiceNuevo($cheque_cuenta_corrientesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(cheque_cuenta_corriente $cheque_cuenta_corriente,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$cheque_cuenta_corrientesLocal=$this->getListaActual();
		
		$iIndice=cheque_cuenta_corriente_util::getIndiceActual($cheque_cuenta_corrientesLocal,$cheque_cuenta_corriente,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevocheque_cuenta_corriente')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->cheque_cuenta_corrienteActual =$this->cheque_cuenta_corrienteClase;
			
			/*$this->cheque_cuenta_corrienteActual =$this->migrarModelcheque_cuenta_corriente($this->cheque_cuenta_corrienteClase);*/
			
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
			
			$this->cheque_cuenta_corrienteLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				$class=new Classe('categoria_cheque');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('beneficiario_ocacional_cheque');$classes[]=$class;
				$class=new Classe('estado_deposito_retiro');$classes[]=$class;
			
			$this->cheque_cuenta_corrienteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->cheque_cuenta_corrienteLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corriente(new cheque_cuenta_corriente());
				
				$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setIsNew(true);
				$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setIsChanged(true);
				$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->cheque_cuenta_corrienteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->cheque_cuenta_corrienteLogic->cheque_cuenta_corrientes[]=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cheque_cuenta_corrienteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->cheque_cuenta_corrienteLogic->saveRelaciones($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setIsChanged(true);
				$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setIsNew(false);
				$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->cheque_cuenta_corrienteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente(),$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cheque_cuenta_corrienteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->cheque_cuenta_corrienteLogic->saveRelaciones($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setIsDeleted(true);
				$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setIsNew(false);
				$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setIsChanged(false);				
				
				$this->actualizarLista($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente(),$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cheque_cuenta_corrienteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->cheque_cuenta_corrienteLogic->saveRelaciones($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->cheque_cuenta_corrientesEliminados[]=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cheque_cuenta_corrienteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->cheque_cuenta_corrienteLogic->saveRelaciones($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cheque_cuenta_corrientesEliminados=array();
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
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				$class=new Classe('categoria_cheque');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('beneficiario_ocacional_cheque');$classes[]=$class;
				$class=new Classe('estado_deposito_retiro');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes();*/
					
					$this->cheque_cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->cheque_cuenta_corrienteLogic->setIsConDeepLoad(false);
			
			$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'Lista',serialize($this->cheque_cuenta_corrientes));
				$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cheque_cuenta_corrientesEliminados));
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalcheque_cuenta_corriente;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->cheque_cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->cheque_cuenta_corrientes as $cheque_cuenta_corrienteLocal) {
				if($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->getId()==$cheque_cuenta_corrienteLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente()->setIsDeleted(true);
			$this->cheque_cuenta_corrientesEliminados[]=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->cheque_cuenta_corrientes[$indice]);
				
				$this->cheque_cuenta_corrientes = array_values($this->cheque_cuenta_corrientes);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelcheque_cuenta_corriente($this->cheque_cuenta_corrienteClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(cheque_cuenta_corriente $cheque_cuenta_corriente,array $cheque_cuenta_corrientes) {
		try {
			foreach($cheque_cuenta_corrientes as $cheque_cuenta_corrienteLocal){ 
				if($cheque_cuenta_corrienteLocal->getId()==$cheque_cuenta_corriente->getId()) {
					$cheque_cuenta_corrienteLocal->setIsChanged($cheque_cuenta_corriente->getIsChanged());
					$cheque_cuenta_corrienteLocal->setIsNew($cheque_cuenta_corriente->getIsNew());
					$cheque_cuenta_corrienteLocal->setIsDeleted($cheque_cuenta_corriente->getIsDeleted());
					//$cheque_cuenta_corrienteLocal->setbitExpired($cheque_cuenta_corriente->getbitExpired());
					
					$cheque_cuenta_corrienteLocal->setId($cheque_cuenta_corriente->getId());	
					$cheque_cuenta_corrienteLocal->setVersionRow($cheque_cuenta_corriente->getVersionRow());	
					$cheque_cuenta_corrienteLocal->setVersionRow($cheque_cuenta_corriente->getVersionRow());	
					$cheque_cuenta_corrienteLocal->setid_empresa($cheque_cuenta_corriente->getid_empresa());	
					$cheque_cuenta_corrienteLocal->setid_sucursal($cheque_cuenta_corriente->getid_sucursal());	
					$cheque_cuenta_corrienteLocal->setid_ejercicio($cheque_cuenta_corriente->getid_ejercicio());	
					$cheque_cuenta_corrienteLocal->setid_periodo($cheque_cuenta_corriente->getid_periodo());	
					$cheque_cuenta_corrienteLocal->setid_usuario($cheque_cuenta_corriente->getid_usuario());	
					$cheque_cuenta_corrienteLocal->setid_cuenta_corriente($cheque_cuenta_corriente->getid_cuenta_corriente());	
					$cheque_cuenta_corrienteLocal->setid_categoria_cheque($cheque_cuenta_corriente->getid_categoria_cheque());	
					$cheque_cuenta_corrienteLocal->setid_cliente($cheque_cuenta_corriente->getid_cliente());	
					$cheque_cuenta_corrienteLocal->setid_proveedor($cheque_cuenta_corriente->getid_proveedor());	
					$cheque_cuenta_corrienteLocal->setid_beneficiario_ocacional_cheque($cheque_cuenta_corriente->getid_beneficiario_ocacional_cheque());	
					$cheque_cuenta_corrienteLocal->setnumero_cheque($cheque_cuenta_corriente->getnumero_cheque());	
					$cheque_cuenta_corrienteLocal->setfecha_emision($cheque_cuenta_corriente->getfecha_emision());	
					$cheque_cuenta_corrienteLocal->setmonto($cheque_cuenta_corriente->getmonto());	
					$cheque_cuenta_corrienteLocal->setmonto_texto($cheque_cuenta_corriente->getmonto_texto());	
					$cheque_cuenta_corrienteLocal->setsaldo($cheque_cuenta_corriente->getsaldo());	
					$cheque_cuenta_corrienteLocal->setdescripcion($cheque_cuenta_corriente->getdescripcion());	
					$cheque_cuenta_corrienteLocal->setcobrado($cheque_cuenta_corriente->getcobrado());	
					$cheque_cuenta_corrienteLocal->setimpreso($cheque_cuenta_corriente->getimpreso());	
					$cheque_cuenta_corrienteLocal->setid_estado_deposito_retiro($cheque_cuenta_corriente->getid_estado_deposito_retiro());	
					$cheque_cuenta_corrienteLocal->setdebito($cheque_cuenta_corriente->getdebito());	
					$cheque_cuenta_corrienteLocal->setcredito($cheque_cuenta_corriente->getcredito());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$cheque_cuenta_corrientesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrientes;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $cheque_cuenta_corrientesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes() as $cheque_cuenta_corriente) {
				if($cheque_cuenta_corriente->getId()==$id) {
					$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corriente($cheque_cuenta_corriente);
					
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
		/*$cheque_cuenta_corrientesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->cheque_cuenta_corrientes as $cheque_cuenta_corriente) {
			$cheque_cuenta_corriente->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->cheque_cuenta_corrientes[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cheque_cuenta_corriente_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
						
		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
		
		
		$this->cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
		$this->cheque_cuenta_corrienteParameterGeneral=new cheque_cuenta_corriente_param_return();
			
		$this->cheque_cuenta_corrienteParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualcheque_cuenta_corriente(this.cheque_cuenta_corriente,true);
			this.setVariablesFormularioToObjetoActualForeignKeyscheque_cuenta_corriente(this.cheque_cuenta_corriente);*/
			
			if($cheque_cuenta_corriente_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualcheque_cuenta_corriente(this.cheque_cuenta_corriente,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->cheque_cuenta_corrienteActual=$this->cheque_cuenta_corrienteClase;
				
				$this->setCopiarVariablesObjetos($this->cheque_cuenta_corrienteActual,$this->cheque_cuenta_corriente,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes(),$this->cheque_cuenta_corriente,$this->cheque_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($cheque_cuenta_corriente_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeancheque_cuenta_corriente($classes,$this->cheque_cuenta_corrienteReturnGeneral,$this->cheque_cuenta_corrienteBean,false);*/
				}
					
				if($this->cheque_cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente(),$this->cheque_cuenta_corrienteActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeycheque_cuenta_corriente($this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariocheque_cuenta_corriente($this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente());*/
				}
					
				if($this->cheque_cuenta_corrienteReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cheque_cuenta_corriente,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(cheque_cuenta_corrienteJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualcheque_cuenta_corriente(this.cheque_cuenta_corriente,true);
				this.setVariablesFormularioToObjetoActualForeignKeyscheque_cuenta_corriente(this.cheque_cuenta_corriente);				
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
				
				if($this->cheque_cuenta_corrienteAnterior!=null) {
					$this->cheque_cuenta_corriente=$this->cheque_cuenta_corrienteAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes(),$this->cheque_cuenta_corriente,$this->cheque_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente(),$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());
			*/
		}
		
		return $this->cheque_cuenta_corrienteReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();			
			$this->cheque_cuenta_corrienteParameterGeneral=new cheque_cuenta_corriente_param_return();
			
			$this->cheque_cuenta_corrienteParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->cheque_cuenta_corrientes,$this->cheque_cuenta_corrienteParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->cheque_cuenta_corrienteReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->cheque_cuenta_corrienteReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->cheque_cuenta_corrienteReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		
		$this->cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_cheque_cuenta_corriente') {
		    $sDominio='cheque_cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->cheque_cuenta_corrienteReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->cheque_cuenta_corrienteReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='cheque_cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='cheque_cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='cheque_cuenta_corriente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
		$this->cheque_cuenta_corrienteParameterGeneral=new cheque_cuenta_corriente_param_return();
			
		$this->cheque_cuenta_corrienteParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes(),$this->cheque_cuenta_corriente,$this->cheque_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->cheque_cuenta_corrienteReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->cheque_cuenta_corrienteReturnGeneral->getcheque_cuenta_corriente(),$classes);*/
		}									
	
		if($this->cheque_cuenta_corrienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->cheque_cuenta_corrienteReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->cheque_cuenta_corrienteReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cheque_cuenta_corrientes,cheque_cuenta_corriente $cheque_cuenta_corriente) {
		
		$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
						
		if($cheque_cuenta_corriente_session==null) {
			$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(cheque_cuenta_corriente_util::$CLASSNAME);
			}	
			*/
			
			$this->cheque_cuenta_corrienteReturnGeneral=new cheque_cuenta_corriente_param_return();
			$this->cheque_cuenta_corrienteParameterGeneral=new cheque_cuenta_corriente_param_return();
			
			$this->cheque_cuenta_corrienteParameterGeneral->setdata($this->data);
		
		
			
		if($cheque_cuenta_corriente_session->conGuardarRelaciones) {
			$classes=cheque_cuenta_corriente_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->cheque_cuenta_corrienteActual,$this->cheque_cuenta_corriente,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes(),$this->cheque_cuenta_corrienteActual,$this->cheque_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->cheque_cuenta_corrienteReturnGeneral=$this->cheque_cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$cheque_cuenta_corrientes,$cheque_cuenta_corriente,$this->cheque_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelcheque_cuenta_corriente($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente());*/
			
			$this->cheque_cuenta_corriente=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corriente();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->cheque_cuenta_corriente);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$cheque_cuenta_corrienteActual=new cheque_cuenta_corriente();
			
			if($this->cheque_cuenta_corrienteClase==null) {		
				$this->cheque_cuenta_corrienteClase=new cheque_cuenta_corriente();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$cheque_cuenta_corrienteActual=$this->cheque_cuenta_corrientes[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_categoria_cheque((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_beneficiario_ocacional_cheque((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setnumero_cheque($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setmonto_texto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setcobrado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_19')));  } else { $cheque_cuenta_corrienteActual->setcobrado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setimpreso(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_20')));  } else { $cheque_cuenta_corrienteActual->setimpreso(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setid_estado_deposito_retiro((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setdebito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $cheque_cuenta_corrienteActual->setcredito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }

				$this->cheque_cuenta_corrienteClase=$cheque_cuenta_corrienteActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cheque_cuenta_corrienteModel->set($this->cheque_cuenta_corrienteClase);
				
				/*$this->cheque_cuenta_corrienteModel->set($this->migrarModelcheque_cuenta_corriente($this->cheque_cuenta_corrienteClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->cheque_cuenta_corrientes=$this->migrarModelcheque_cuenta_corriente($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes());							
		$this->cheque_cuenta_corrientes=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();*/
		
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
			$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$cheque_cuenta_corriente_control_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($cheque_cuenta_corriente_control_session==null) {
				$cheque_cuenta_corriente_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($cheque_cuenta_corriente_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME,$this);*/
		} else {
			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));
			
			if($cheque_cuenta_corriente_session==null) {
				$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
			}
			
			$this->set(cheque_cuenta_corriente_util::$STR_SESSION_NAME, $cheque_cuenta_corriente_session);
		}
	}
	
	public function setCopiarVariablesObjetos(cheque_cuenta_corriente $cheque_cuenta_corrienteOrigen,cheque_cuenta_corriente $cheque_cuenta_corriente,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($cheque_cuenta_corriente==null) {
				$cheque_cuenta_corriente=new cheque_cuenta_corriente();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getId()!=null && $cheque_cuenta_corrienteOrigen->getId()!=0)) {$cheque_cuenta_corriente->setId($cheque_cuenta_corrienteOrigen->getId());}}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getid_cuenta_corriente()!=null && $cheque_cuenta_corrienteOrigen->getid_cuenta_corriente()!=-1)) {$cheque_cuenta_corriente->setid_cuenta_corriente($cheque_cuenta_corrienteOrigen->getid_cuenta_corriente());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getid_categoria_cheque()!=null && $cheque_cuenta_corrienteOrigen->getid_categoria_cheque()!=-1)) {$cheque_cuenta_corriente->setid_categoria_cheque($cheque_cuenta_corrienteOrigen->getid_categoria_cheque());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getid_cliente()!=null && $cheque_cuenta_corrienteOrigen->getid_cliente()!=null)) {$cheque_cuenta_corriente->setid_cliente($cheque_cuenta_corrienteOrigen->getid_cliente());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getid_proveedor()!=null && $cheque_cuenta_corrienteOrigen->getid_proveedor()!=null)) {$cheque_cuenta_corriente->setid_proveedor($cheque_cuenta_corrienteOrigen->getid_proveedor());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getid_beneficiario_ocacional_cheque()!=null && $cheque_cuenta_corrienteOrigen->getid_beneficiario_ocacional_cheque()!=null)) {$cheque_cuenta_corriente->setid_beneficiario_ocacional_cheque($cheque_cuenta_corrienteOrigen->getid_beneficiario_ocacional_cheque());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getnumero_cheque()!=null && $cheque_cuenta_corrienteOrigen->getnumero_cheque()!='')) {$cheque_cuenta_corriente->setnumero_cheque($cheque_cuenta_corrienteOrigen->getnumero_cheque());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getfecha_emision()!=null && $cheque_cuenta_corrienteOrigen->getfecha_emision()!=date('Y-m-d'))) {$cheque_cuenta_corriente->setfecha_emision($cheque_cuenta_corrienteOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getmonto()!=null && $cheque_cuenta_corrienteOrigen->getmonto()!=0.0)) {$cheque_cuenta_corriente->setmonto($cheque_cuenta_corrienteOrigen->getmonto());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getmonto_texto()!=null && $cheque_cuenta_corrienteOrigen->getmonto_texto()!='')) {$cheque_cuenta_corriente->setmonto_texto($cheque_cuenta_corrienteOrigen->getmonto_texto());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getsaldo()!=null && $cheque_cuenta_corrienteOrigen->getsaldo()!=0.0)) {$cheque_cuenta_corriente->setsaldo($cheque_cuenta_corrienteOrigen->getsaldo());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getdescripcion()!=null && $cheque_cuenta_corrienteOrigen->getdescripcion()!='')) {$cheque_cuenta_corriente->setdescripcion($cheque_cuenta_corrienteOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getcobrado()!=null && $cheque_cuenta_corrienteOrigen->getcobrado()!=false)) {$cheque_cuenta_corriente->setcobrado($cheque_cuenta_corrienteOrigen->getcobrado());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getimpreso()!=null && $cheque_cuenta_corrienteOrigen->getimpreso()!=false)) {$cheque_cuenta_corriente->setimpreso($cheque_cuenta_corrienteOrigen->getimpreso());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getid_estado_deposito_retiro()!=null && $cheque_cuenta_corrienteOrigen->getid_estado_deposito_retiro()!=-1)) {$cheque_cuenta_corriente->setid_estado_deposito_retiro($cheque_cuenta_corrienteOrigen->getid_estado_deposito_retiro());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getdebito()!=null && $cheque_cuenta_corrienteOrigen->getdebito()!=0.0)) {$cheque_cuenta_corriente->setdebito($cheque_cuenta_corrienteOrigen->getdebito());}
			if($conDefault || ($conDefault==false && $cheque_cuenta_corrienteOrigen->getcredito()!=null && $cheque_cuenta_corrienteOrigen->getcredito()!=0.0)) {$cheque_cuenta_corriente->setcredito($cheque_cuenta_corrienteOrigen->getcredito());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$cheque_cuenta_corrientesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$cheque_cuenta_corrientesSeleccionados[]=$this->cheque_cuenta_corrientes[$indice];
			}
		}
		
		return $cheque_cuenta_corrientesSeleccionados;
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
		$cheque_cuenta_corriente= new cheque_cuenta_corriente();
		
		foreach($this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes() as $cheque_cuenta_corriente) {
			
		}		
		
		if($cheque_cuenta_corriente!=null);
	}
	
	public function cargarRelaciones(array $cheque_cuenta_corrientes=array()) : array {	
		
		$cheque_cuenta_corrientesRespaldo = array();
		$cheque_cuenta_corrientesLocal = array();
		
		cheque_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$cheque_cuenta_corrientesResp=array();
		$classes=array();
			
		
			
			
		$cheque_cuenta_corrientesRespaldo=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
			
		$this->cheque_cuenta_corrienteLogic->setIsConDeep(true);
		
		$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientes);
			
		$this->cheque_cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
			
		/*RESPALDO*/
		$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientesRespaldo);
			
		$this->cheque_cuenta_corrienteLogic->setIsConDeep(false);
		
		if($cheque_cuenta_corrientesResp!=null);
		
		return $cheque_cuenta_corrientesLocal;
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
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session) {
		$cheque_cuenta_corriente_session->strTypeOnLoad=$this->strTypeOnLoadcheque_cuenta_corriente;
		$cheque_cuenta_corriente_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarcheque_cuenta_corriente;
		$cheque_cuenta_corriente_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarcheque_cuenta_corriente;
		$cheque_cuenta_corriente_session->bitEsPopup=$this->bitEsPopup;
		$cheque_cuenta_corriente_session->bitEsBusqueda=$this->bitEsBusqueda;
		$cheque_cuenta_corriente_session->strFuncionJs=$this->strFuncionJs;
		/*$cheque_cuenta_corriente_session->strSufijo=$this->strSufijo;*/
		$cheque_cuenta_corriente_session->bitEsRelaciones=$this->bitEsRelaciones;
		$cheque_cuenta_corriente_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cheque_cuenta_corriente_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$cheque_cuenta_corrienteViewAdditional=new cheque_cuenta_corrienteView_add();
		$cheque_cuenta_corrienteViewAdditional->cheque_cuenta_corrientes=$this->cheque_cuenta_corrientes;
		$cheque_cuenta_corrienteViewAdditional->Session=$this->Session;
		
		return $cheque_cuenta_corrienteViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$cheque_cuenta_corrientesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrientes;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$cheque_cuenta_corrientesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($cheque_cuenta_corrientesLocal)<=0) {
					$cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrientes;
				}
			} else {
				$cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrientes;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcheque_cuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcheque_cuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$cheque_cuenta_corrienteLogic=new cheque_cuenta_corriente_logic();
		$cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($this->cheque_cuenta_corrientes);
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
			$class=new Classe('cuenta_corriente');$classes[]=$class;
			$class=new Classe('categoria_cheque');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('beneficiario_ocacional_cheque');$classes[]=$class;
			$class=new Classe('estado_deposito_retiro');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cheque_cuenta_corrienteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cheque_cuenta_corrientes=$cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrientes;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=cheque_cuenta_corriente_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=cheque_cuenta_corriente_util::$STR_TABLE_NAME;		
			
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
			
			$cheque_cuenta_corrientes = $this->cheque_cuenta_corrientes;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = cheque_cuenta_corriente_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = cheque_cuenta_corriente_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/cheque_cuenta_corriente_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->cheque_cuenta_corrientes=$cheque_cuenta_corrientes;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->cheque_cuenta_corrientesLocal=$cheque_cuenta_corrientesLocal;
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
		
		$cheque_cuenta_corrientesLocal=array();
		
		$cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrientes;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcheque_cuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcheque_cuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$cheque_cuenta_corrienteLogic=new cheque_cuenta_corriente_logic();
		$cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($this->cheque_cuenta_corrientes);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
			$class=new Classe('categoria_cheque');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('beneficiario_ocacional_cheque');$classes[]=$class;
			$class=new Classe('estado_deposito_retiro');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cheque_cuenta_corrienteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cheque_cuenta_corrientes=$cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$cheque_cuenta_corrientes = $this->cheque_cuenta_corrientes;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = cheque_cuenta_corriente_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = cheque_cuenta_corriente_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/cheque_cuenta_corriente_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->cheque_cuenta_corrientes=$cheque_cuenta_corrientes;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->cheque_cuenta_corrientesLocal=$cheque_cuenta_corrientesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $cheque_cuenta_corrientes=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->cheque_cuenta_corrientesReporte = $cheque_cuenta_corrientes;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcheque_cuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcheque_cuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $cheque_cuenta_corrientes=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->cheque_cuenta_corrientesReporte = $cheque_cuenta_corrientes;		
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
		
		
		$this->cheque_cuenta_corrientesReporte=$this->cargarRelaciones($cheque_cuenta_corrientes);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcheque_cuenta_corrientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcheque_cuenta_corrientesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(cheque_cuenta_corriente $cheque_cuenta_corriente=null) : string {	
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
			
			
			$cheque_cuenta_corrientesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cheque_cuenta_corrientesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cheque_cuenta_corrientesLocal)<=0) {
					/*//DEBE ESCOGER
					$cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrientes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrientes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cheque_cuenta_corrientesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($cheque_cuenta_corrientesLocal,true);
			
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
					
			$cheque_cuenta_corrientesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cheque_cuenta_corrientesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cheque_cuenta_corrientesLocal)<=0) {
					/*//DEBE ESCOGER
					$cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrientes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cheque_cuenta_corrientesLocal=$this->cheque_cuenta_corrientes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cheque_cuenta_corrientesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($cheque_cuenta_corrientesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Cheques';
			
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
			$fileName='cheque_cuenta_corriente';
			
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
			
			$title='Reporte de  Cheques';
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
			
			$title='Reporte de  Cheques';
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
				$this->cheque_cuenta_corrienteLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Cheques';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cheque_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cheque_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=cheque_cuenta_corriente_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->cheque_cuenta_corrientesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cheque_cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cheque_cuenta_corrientesAuxiliar)<=0) {
					$this->cheque_cuenta_corrientesAuxiliar=$this->cheque_cuenta_corrientes;
				}
			} else {
				$this->cheque_cuenta_corrientesAuxiliar=$this->cheque_cuenta_corrientes;
			}
		/*} else {
			$this->cheque_cuenta_corrientesAuxiliar=$this->cheque_cuenta_corrientesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->cheque_cuenta_corrientesAuxiliar as $cheque_cuenta_corriente) {
				$row=array();
				
				$row=cheque_cuenta_corriente_util::getDataReportRow($tipo,$cheque_cuenta_corriente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			cheque_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$cheque_cuenta_corrientesResp=array();
			$classes=array();
			
			
			
			
			$cheque_cuenta_corrientesResp=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
			
			$this->cheque_cuenta_corrienteLogic->setIsConDeep(true);
			
			$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($this->cheque_cuenta_corrientesAuxiliar);
			
			$this->cheque_cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->cheque_cuenta_corrientesAuxiliar=$this->cheque_cuenta_corrienteLogic->getcheque_cuenta_corrientes();
			
			//RESPALDO
			$this->cheque_cuenta_corrienteLogic->setcheque_cuenta_corrientes($cheque_cuenta_corrientesResp);
			
			$this->cheque_cuenta_corrienteLogic->setIsConDeep(false);
			*/
			
			$this->cheque_cuenta_corrientesAuxiliar=$this->cargarRelaciones($this->cheque_cuenta_corrientesAuxiliar);
			
			$i=0;
			
			foreach ($this->cheque_cuenta_corrientesAuxiliar as $cheque_cuenta_corriente) {
				$row=array();
				
				if($i!=0) {
					$row=cheque_cuenta_corriente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=cheque_cuenta_corriente_util::getDataReportRow($tipo,$cheque_cuenta_corriente,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->cheque_cuenta_corrientesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cheque_cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cheque_cuenta_corrientesAuxiliar)<=0) {
					$this->cheque_cuenta_corrientesAuxiliar=$this->cheque_cuenta_corrientes;
				}
			} else {
				$this->cheque_cuenta_corrientesAuxiliar=$this->cheque_cuenta_corrientes;
			}
		/*} else {
			$this->cheque_cuenta_corrientesAuxiliar=$this->cheque_cuenta_corrientesReporte;	
		}*/
		
		foreach ($this->cheque_cuenta_corrientesAuxiliar as $cheque_cuenta_corriente) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cheque_cuenta_corriente_util::getcheque_cuenta_corrienteDescripcion($cheque_cuenta_corriente),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy(' Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta Corriente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Corriente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getid_cuenta_corrienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Categoria Cheque',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Categoria Cheque',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getid_categoria_chequeDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getid_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getid_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Beneficiario Ocacional',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Beneficiario Ocacional',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getid_beneficiario_ocacional_chequeDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Cheque',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Cheque',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getnumero_cheque(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getmonto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto Texto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Texto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getmonto_texto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Saldo Actual',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Saldo Actual',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getsaldo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cobrado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cobrado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getcobrado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impreso',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impreso',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getimpreso(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Estado Deposito Retiro',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Estado Deposito Retiro',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getid_estado_deposito_retiroDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Debito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Debito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getdebito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Credito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Credito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cheque_cuenta_corriente->getcredito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface cheque_cuenta_corriente_base_controlI {			
		
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
		public function getIndiceActual(cheque_cuenta_corriente $cheque_cuenta_corriente,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(cheque_cuenta_corriente $cheque_cuenta_corriente,array $cheque_cuenta_corrientes);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cheque_cuenta_corriente_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cheque_cuenta_corrientes,cheque_cuenta_corriente $cheque_cuenta_corriente);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(cheque_cuenta_corriente_param_return $cheque_cuenta_corrienteReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session);		
		public function actualizarInvitadoSessionDivStyleVariables(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(cheque_cuenta_corriente $cheque_cuenta_corrienteOrigen,cheque_cuenta_corriente $cheque_cuenta_corriente,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(cheque_cuenta_corriente_control $cheque_cuenta_corriente_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $cheque_cuenta_corrientes=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(cheque_cuenta_corriente_session $cheque_cuenta_corriente_session);		
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
		public function getHtmlTablaDatosResumen(array $cheque_cuenta_corrientes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $cheque_cuenta_corrientes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(cheque_cuenta_corriente $cheque_cuenta_corriente=null) : string;
		
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
