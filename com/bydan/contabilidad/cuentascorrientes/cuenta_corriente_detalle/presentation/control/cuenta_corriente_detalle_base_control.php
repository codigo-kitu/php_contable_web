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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/cuenta_corriente_detalle/util/cuenta_corriente_detalle_carga.php');
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_carga;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_param_return;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\logic\cuenta_corriente_detalle_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\session\cuenta_corriente_detalle_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

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

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\general\tabla\business\entity\tabla;
use com\bydan\contabilidad\general\tabla\business\logic\tabla_logic;
use com\bydan\contabilidad\general\tabla\util\tabla_carga;
use com\bydan\contabilidad\general\tabla\util\tabla_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\session\clasificacion_cheque_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_corriente_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_corriente_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_corriente_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_corriente_detalle_base_control extends cuenta_corriente_detalle_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->cuenta_corriente_detalleClase==null) {		
				$this->cuenta_corriente_detalleClase=new cuenta_corriente_detalle();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ejercicio',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_periodo',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_usuario',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_corriente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tabla')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tabla',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_estado',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_asiento')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_asiento',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_pagar')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_pagar',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_cobrar')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_cobrar',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->cuenta_corriente_detalleClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->cuenta_corriente_detalleClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->cuenta_corriente_detalleClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->cuenta_corriente_detalleClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->cuenta_corriente_detalleClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->cuenta_corriente_detalleClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->cuenta_corriente_detalleClase->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_corriente'));
				
				$this->cuenta_corriente_detalleClase->setes_balance_inicial(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'es_balance_inicial')));
				
				$this->cuenta_corriente_detalleClase->setes_cheque(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'es_cheque')));
				
				$this->cuenta_corriente_detalleClase->setes_deposito(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'es_deposito')));
				
				$this->cuenta_corriente_detalleClase->setes_retiro(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'es_retiro')));
				
				$this->cuenta_corriente_detalleClase->setnumero_cheque($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero_cheque'));
				
				$this->cuenta_corriente_detalleClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->cuenta_corriente_detalleClase->setid_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cliente'));
				
				$this->cuenta_corriente_detalleClase->setid_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor'));
				
				$this->cuenta_corriente_detalleClase->setmonto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto'));
				
				$this->cuenta_corriente_detalleClase->setdebito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'debito'));
				
				$this->cuenta_corriente_detalleClase->setcredito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'credito'));
				
				$this->cuenta_corriente_detalleClase->setbalance((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'balance'));
				
				$this->cuenta_corriente_detalleClase->setfecha_hora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_hora')));
				
				$this->cuenta_corriente_detalleClase->setid_tabla((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tabla'));
				
				$this->cuenta_corriente_detalleClase->setid_origen((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_origen'));
				
				$this->cuenta_corriente_detalleClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->cuenta_corriente_detalleClase->setid_estado((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado'));
				
				$this->cuenta_corriente_detalleClase->setid_asiento((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_asiento'));
				
				$this->cuenta_corriente_detalleClase->setid_cuenta_pagar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_pagar'));
				
				$this->cuenta_corriente_detalleClase->setid_cuenta_cobrar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_cobrar'));
				
				$this->cuenta_corriente_detalleClase->settabla_origen($this->getDataCampoFormTabla('form'.$this->strSufijo,'tabla_origen'));
				
				$this->cuenta_corriente_detalleClase->setorigen_empresa($this->getDataCampoFormTabla('form'.$this->strSufijo,'origen_empresa'));
				
				$this->cuenta_corriente_detalleClase->setmotivo_anulacion($this->getDataCampoFormTabla('form'.$this->strSufijo,'motivo_anulacion'));
				
				$this->cuenta_corriente_detalleClase->setorigen_dato($this->getDataCampoFormTabla('form'.$this->strSufijo,'origen_dato'));
				
				$this->cuenta_corriente_detalleClase->setcomputador_origen($this->getDataCampoFormTabla('form'.$this->strSufijo,'computador_origen'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuenta_corriente_detalleModel->set($this->cuenta_corriente_detalleClase);
				
				/*$this->cuenta_corriente_detalleModel->set($this->migrarModelcuenta_corriente_detalle($this->cuenta_corriente_detalleClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setId($this->cuenta_corriente_detalleClase->getId());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setVersionRow($this->cuenta_corriente_detalleClase->getVersionRow());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setVersionRow($this->cuenta_corriente_detalleClase->getVersionRow());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_empresa($this->cuenta_corriente_detalleClase->getid_empresa());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_ejercicio($this->cuenta_corriente_detalleClase->getid_ejercicio());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_periodo($this->cuenta_corriente_detalleClase->getid_periodo());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_usuario($this->cuenta_corriente_detalleClase->getid_usuario());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_cuenta_corriente($this->cuenta_corriente_detalleClase->getid_cuenta_corriente());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setes_balance_inicial($this->cuenta_corriente_detalleClase->getes_balance_inicial());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setes_cheque($this->cuenta_corriente_detalleClase->getes_cheque());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setes_deposito($this->cuenta_corriente_detalleClase->getes_deposito());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setes_retiro($this->cuenta_corriente_detalleClase->getes_retiro());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setnumero_cheque($this->cuenta_corriente_detalleClase->getnumero_cheque());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setfecha_emision($this->cuenta_corriente_detalleClase->getfecha_emision());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_cliente($this->cuenta_corriente_detalleClase->getid_cliente());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_proveedor($this->cuenta_corriente_detalleClase->getid_proveedor());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setmonto($this->cuenta_corriente_detalleClase->getmonto());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setdebito($this->cuenta_corriente_detalleClase->getdebito());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setcredito($this->cuenta_corriente_detalleClase->getcredito());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setbalance($this->cuenta_corriente_detalleClase->getbalance());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setfecha_hora($this->cuenta_corriente_detalleClase->getfecha_hora());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_tabla($this->cuenta_corriente_detalleClase->getid_tabla());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_origen($this->cuenta_corriente_detalleClase->getid_origen());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setdescripcion($this->cuenta_corriente_detalleClase->getdescripcion());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_estado($this->cuenta_corriente_detalleClase->getid_estado());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_asiento($this->cuenta_corriente_detalleClase->getid_asiento());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_cuenta_pagar($this->cuenta_corriente_detalleClase->getid_cuenta_pagar());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setid_cuenta_cobrar($this->cuenta_corriente_detalleClase->getid_cuenta_cobrar());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->settabla_origen($this->cuenta_corriente_detalleClase->gettabla_origen());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setorigen_empresa($this->cuenta_corriente_detalleClase->getorigen_empresa());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setmotivo_anulacion($this->cuenta_corriente_detalleClase->getmotivo_anulacion());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setorigen_dato($this->cuenta_corriente_detalleClase->getorigen_dato());	
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setcomputador_origen($this->cuenta_corriente_detalleClase->getcomputador_origen());	
		} else {
			$this->cuenta_corriente_detalleClase->setId($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getId());	
			$this->cuenta_corriente_detalleClase->setVersionRow($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getVersionRow());	
			$this->cuenta_corriente_detalleClase->setVersionRow($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getVersionRow());	
			$this->cuenta_corriente_detalleClase->setid_empresa($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_empresa());	
			$this->cuenta_corriente_detalleClase->setid_ejercicio($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_ejercicio());	
			$this->cuenta_corriente_detalleClase->setid_periodo($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_periodo());	
			$this->cuenta_corriente_detalleClase->setid_usuario($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_usuario());	
			$this->cuenta_corriente_detalleClase->setid_cuenta_corriente($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_cuenta_corriente());	
			$this->cuenta_corriente_detalleClase->setes_balance_inicial($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getes_balance_inicial());	
			$this->cuenta_corriente_detalleClase->setes_cheque($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getes_cheque());	
			$this->cuenta_corriente_detalleClase->setes_deposito($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getes_deposito());	
			$this->cuenta_corriente_detalleClase->setes_retiro($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getes_retiro());	
			$this->cuenta_corriente_detalleClase->setnumero_cheque($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getnumero_cheque());	
			$this->cuenta_corriente_detalleClase->setfecha_emision($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getfecha_emision());	
			$this->cuenta_corriente_detalleClase->setid_cliente($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_cliente());	
			$this->cuenta_corriente_detalleClase->setid_proveedor($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_proveedor());	
			$this->cuenta_corriente_detalleClase->setmonto($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getmonto());	
			$this->cuenta_corriente_detalleClase->setdebito($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getdebito());	
			$this->cuenta_corriente_detalleClase->setcredito($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getcredito());	
			$this->cuenta_corriente_detalleClase->setbalance($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getbalance());	
			$this->cuenta_corriente_detalleClase->setfecha_hora($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getfecha_hora());	
			$this->cuenta_corriente_detalleClase->setid_tabla($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_tabla());	
			$this->cuenta_corriente_detalleClase->setid_origen($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_origen());	
			$this->cuenta_corriente_detalleClase->setdescripcion($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getdescripcion());	
			$this->cuenta_corriente_detalleClase->setid_estado($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_estado());	
			$this->cuenta_corriente_detalleClase->setid_asiento($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_asiento());	
			$this->cuenta_corriente_detalleClase->setid_cuenta_pagar($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_cuenta_pagar());	
			$this->cuenta_corriente_detalleClase->setid_cuenta_cobrar($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getid_cuenta_cobrar());	
			$this->cuenta_corriente_detalleClase->settabla_origen($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->gettabla_origen());	
			$this->cuenta_corriente_detalleClase->setorigen_empresa($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getorigen_empresa());	
			$this->cuenta_corriente_detalleClase->setmotivo_anulacion($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getmotivo_anulacion());	
			$this->cuenta_corriente_detalleClase->setorigen_dato($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getorigen_dato());	
			$this->cuenta_corriente_detalleClase->setcomputador_origen($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getcomputador_origen());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->cuenta_corriente_detalleModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_ejercicio') {$this->strMensajeid_ejercicio=$strMensajeCampo;}
		if($strNombreCampo=='id_periodo') {$this->strMensajeid_periodo=$strMensajeCampo;}
		if($strNombreCampo=='id_usuario') {$this->strMensajeid_usuario=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_corriente') {$this->strMensajeid_cuenta_corriente=$strMensajeCampo;}
		if($strNombreCampo=='es_balance_inicial') {$this->strMensajees_balance_inicial=$strMensajeCampo;}
		if($strNombreCampo=='es_cheque') {$this->strMensajees_cheque=$strMensajeCampo;}
		if($strNombreCampo=='es_deposito') {$this->strMensajees_deposito=$strMensajeCampo;}
		if($strNombreCampo=='es_retiro') {$this->strMensajees_retiro=$strMensajeCampo;}
		if($strNombreCampo=='numero_cheque') {$this->strMensajenumero_cheque=$strMensajeCampo;}
		if($strNombreCampo=='fecha_emision') {$this->strMensajefecha_emision=$strMensajeCampo;}
		if($strNombreCampo=='id_cliente') {$this->strMensajeid_cliente=$strMensajeCampo;}
		if($strNombreCampo=='id_proveedor') {$this->strMensajeid_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='monto') {$this->strMensajemonto=$strMensajeCampo;}
		if($strNombreCampo=='debito') {$this->strMensajedebito=$strMensajeCampo;}
		if($strNombreCampo=='credito') {$this->strMensajecredito=$strMensajeCampo;}
		if($strNombreCampo=='balance') {$this->strMensajebalance=$strMensajeCampo;}
		if($strNombreCampo=='fecha_hora') {$this->strMensajefecha_hora=$strMensajeCampo;}
		if($strNombreCampo=='id_tabla') {$this->strMensajeid_tabla=$strMensajeCampo;}
		if($strNombreCampo=='id_origen') {$this->strMensajeid_origen=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='id_estado') {$this->strMensajeid_estado=$strMensajeCampo;}
		if($strNombreCampo=='id_asiento') {$this->strMensajeid_asiento=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_pagar') {$this->strMensajeid_cuenta_pagar=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_cobrar') {$this->strMensajeid_cuenta_cobrar=$strMensajeCampo;}
		if($strNombreCampo=='tabla_origen') {$this->strMensajetabla_origen=$strMensajeCampo;}
		if($strNombreCampo=='origen_empresa') {$this->strMensajeorigen_empresa=$strMensajeCampo;}
		if($strNombreCampo=='motivo_anulacion') {$this->strMensajemotivo_anulacion=$strMensajeCampo;}
		if($strNombreCampo=='origen_dato') {$this->strMensajeorigen_dato=$strMensajeCampo;}
		if($strNombreCampo=='computador_origen') {$this->strMensajecomputador_origen=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajeid_cuenta_corriente='';
		$this->strMensajees_balance_inicial='';
		$this->strMensajees_cheque='';
		$this->strMensajees_deposito='';
		$this->strMensajees_retiro='';
		$this->strMensajenumero_cheque='';
		$this->strMensajefecha_emision='';
		$this->strMensajeid_cliente='';
		$this->strMensajeid_proveedor='';
		$this->strMensajemonto='';
		$this->strMensajedebito='';
		$this->strMensajecredito='';
		$this->strMensajebalance='';
		$this->strMensajefecha_hora='';
		$this->strMensajeid_tabla='';
		$this->strMensajeid_origen='';
		$this->strMensajedescripcion='';
		$this->strMensajeid_estado='';
		$this->strMensajeid_asiento='';
		$this->strMensajeid_cuenta_pagar='';
		$this->strMensajeid_cuenta_cobrar='';
		$this->strMensajetabla_origen='';
		$this->strMensajeorigen_empresa='';
		$this->strMensajemotivo_anulacion='';
		$this->strMensajeorigen_dato='';
		$this->strMensajecomputador_origen='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
						
			if($cuenta_corriente_detalle_session==null) {
				$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
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
						$this->cuenta_corriente_detalleLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->cuenta_corriente_detalleActual =$this->cuenta_corriente_detalleClase;
			
			/*$this->cuenta_corriente_detalleActual =$this->migrarModelcuenta_corriente_detalle($this->cuenta_corriente_detalleClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles(),$this->cuenta_corriente_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_corriente_detalleReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
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
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$cuenta_corriente_detallesLocal=$this->getListaActual();
		
		$iIndice=cuenta_corriente_detalle_util::getIndiceNuevo($cuenta_corriente_detallesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(cuenta_corriente_detalle $cuenta_corriente_detalle,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$cuenta_corriente_detallesLocal=$this->getListaActual();
		
		$iIndice=cuenta_corriente_detalle_util::getIndiceActual($cuenta_corriente_detallesLocal,$cuenta_corriente_detalle,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevocuenta_corriente_detalle')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->cuenta_corriente_detalleActual =$this->cuenta_corriente_detalleClase;
			
			/*$this->cuenta_corriente_detalleActual =$this->migrarModelcuenta_corriente_detalle($this->cuenta_corriente_detalleClase);*/
			
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
			
			$this->cuenta_corriente_detalleLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('tabla');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				$class=new Classe('asiento');$classes[]=$class;
				$class=new Classe('cuenta_pagar');$classes[]=$class;
				$class=new Classe('cuenta_cobrar');$classes[]=$class;
			
			$this->cuenta_corriente_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->cuenta_corriente_detalleLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalle(new cuenta_corriente_detalle());
				
				$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setIsNew(true);
				$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setIsChanged(true);
				$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->cuenta_corriente_detalleModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->cuenta_corriente_detalleLogic->cuenta_corriente_detalles[]=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_corriente_detalleLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							clasificacion_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clasificacioncheques=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME.'Lista'));
							$clasificacionchequesEliminados=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clasificacioncheques=array_merge($clasificacioncheques,$clasificacionchequesEliminados);
							
							$this->cuenta_corriente_detalleLogic->saveRelaciones($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle(),$clasificacioncheques);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setIsChanged(true);
				$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setIsNew(false);
				$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->cuenta_corriente_detalleModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle(),$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_corriente_detalleLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							clasificacion_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clasificacioncheques=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME.'Lista'));
							$clasificacionchequesEliminados=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clasificacioncheques=array_merge($clasificacioncheques,$clasificacionchequesEliminados);
							
							$this->cuenta_corriente_detalleLogic->saveRelaciones($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle(),$clasificacioncheques);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setIsDeleted(true);
				$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setIsNew(false);
				$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setIsChanged(false);				
				
				$this->actualizarLista($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle(),$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_corriente_detalleLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							clasificacion_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clasificacioncheques=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME.'Lista'));
							$clasificacionchequesEliminados=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clasificacioncheques=array_merge($clasificacioncheques,$clasificacionchequesEliminados);

							foreach($clasificacioncheques as $clasificacioncheque1) {
								$clasificacioncheque1->setIsDeleted(true);
							}
							
						$this->cuenta_corriente_detalleLogic->saveRelaciones($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle(),$clasificacioncheques);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->cuenta_corriente_detallesEliminados[]=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_corriente_detalleLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							clasificacion_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clasificacioncheques=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME.'Lista'));
							$clasificacionchequesEliminados=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clasificacioncheques=array_merge($clasificacioncheques,$clasificacionchequesEliminados);
							
						$this->cuenta_corriente_detalleLogic->saveRelaciones($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle(),$clasificacioncheques);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cuenta_corriente_detallesEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_corriente_detalleLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuenta_corriente_detalleLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cuenta_corriente_detallesEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('tabla');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				$class=new Classe('asiento');$classes[]=$class;
				$class=new Classe('cuenta_pagar');$classes[]=$class;
				$class=new Classe('cuenta_cobrar');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles();*/
					
					$this->cuenta_corriente_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->cuenta_corriente_detalleLogic->setIsConDeepLoad(false);
			
			$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->cuenta_corriente_detalles));
				$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuenta_corriente_detallesEliminados));
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
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalcuenta_corriente_detalle;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->cuenta_corriente_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalleLocal) {
				if($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getId()==$cuenta_corriente_detalleLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->setIsDeleted(true);
			$this->cuenta_corriente_detallesEliminados[]=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->cuenta_corriente_detalles[$indice]);
				
				$this->cuenta_corriente_detalles = array_values($this->cuenta_corriente_detalles);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelcuenta_corriente_detalle($this->cuenta_corriente_detalleClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(cuenta_corriente_detalle $cuenta_corriente_detalle,array $cuenta_corriente_detalles) {
		try {
			foreach($cuenta_corriente_detalles as $cuenta_corriente_detalleLocal){ 
				if($cuenta_corriente_detalleLocal->getId()==$cuenta_corriente_detalle->getId()) {
					$cuenta_corriente_detalleLocal->setIsChanged($cuenta_corriente_detalle->getIsChanged());
					$cuenta_corriente_detalleLocal->setIsNew($cuenta_corriente_detalle->getIsNew());
					$cuenta_corriente_detalleLocal->setIsDeleted($cuenta_corriente_detalle->getIsDeleted());
					//$cuenta_corriente_detalleLocal->setbitExpired($cuenta_corriente_detalle->getbitExpired());
					
					$cuenta_corriente_detalleLocal->setId($cuenta_corriente_detalle->getId());	
					$cuenta_corriente_detalleLocal->setVersionRow($cuenta_corriente_detalle->getVersionRow());	
					$cuenta_corriente_detalleLocal->setVersionRow($cuenta_corriente_detalle->getVersionRow());	
					$cuenta_corriente_detalleLocal->setid_empresa($cuenta_corriente_detalle->getid_empresa());	
					$cuenta_corriente_detalleLocal->setid_ejercicio($cuenta_corriente_detalle->getid_ejercicio());	
					$cuenta_corriente_detalleLocal->setid_periodo($cuenta_corriente_detalle->getid_periodo());	
					$cuenta_corriente_detalleLocal->setid_usuario($cuenta_corriente_detalle->getid_usuario());	
					$cuenta_corriente_detalleLocal->setid_cuenta_corriente($cuenta_corriente_detalle->getid_cuenta_corriente());	
					$cuenta_corriente_detalleLocal->setes_balance_inicial($cuenta_corriente_detalle->getes_balance_inicial());	
					$cuenta_corriente_detalleLocal->setes_cheque($cuenta_corriente_detalle->getes_cheque());	
					$cuenta_corriente_detalleLocal->setes_deposito($cuenta_corriente_detalle->getes_deposito());	
					$cuenta_corriente_detalleLocal->setes_retiro($cuenta_corriente_detalle->getes_retiro());	
					$cuenta_corriente_detalleLocal->setnumero_cheque($cuenta_corriente_detalle->getnumero_cheque());	
					$cuenta_corriente_detalleLocal->setfecha_emision($cuenta_corriente_detalle->getfecha_emision());	
					$cuenta_corriente_detalleLocal->setid_cliente($cuenta_corriente_detalle->getid_cliente());	
					$cuenta_corriente_detalleLocal->setid_proveedor($cuenta_corriente_detalle->getid_proveedor());	
					$cuenta_corriente_detalleLocal->setmonto($cuenta_corriente_detalle->getmonto());	
					$cuenta_corriente_detalleLocal->setdebito($cuenta_corriente_detalle->getdebito());	
					$cuenta_corriente_detalleLocal->setcredito($cuenta_corriente_detalle->getcredito());	
					$cuenta_corriente_detalleLocal->setbalance($cuenta_corriente_detalle->getbalance());	
					$cuenta_corriente_detalleLocal->setfecha_hora($cuenta_corriente_detalle->getfecha_hora());	
					$cuenta_corriente_detalleLocal->setid_tabla($cuenta_corriente_detalle->getid_tabla());	
					$cuenta_corriente_detalleLocal->setid_origen($cuenta_corriente_detalle->getid_origen());	
					$cuenta_corriente_detalleLocal->setdescripcion($cuenta_corriente_detalle->getdescripcion());	
					$cuenta_corriente_detalleLocal->setid_estado($cuenta_corriente_detalle->getid_estado());	
					$cuenta_corriente_detalleLocal->setid_asiento($cuenta_corriente_detalle->getid_asiento());	
					$cuenta_corriente_detalleLocal->setid_cuenta_pagar($cuenta_corriente_detalle->getid_cuenta_pagar());	
					$cuenta_corriente_detalleLocal->setid_cuenta_cobrar($cuenta_corriente_detalle->getid_cuenta_cobrar());	
					$cuenta_corriente_detalleLocal->settabla_origen($cuenta_corriente_detalle->gettabla_origen());	
					$cuenta_corriente_detalleLocal->setorigen_empresa($cuenta_corriente_detalle->getorigen_empresa());	
					$cuenta_corriente_detalleLocal->setmotivo_anulacion($cuenta_corriente_detalle->getmotivo_anulacion());	
					$cuenta_corriente_detalleLocal->setorigen_dato($cuenta_corriente_detalle->getorigen_dato());	
					$cuenta_corriente_detalleLocal->setcomputador_origen($cuenta_corriente_detalle->getcomputador_origen());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$cuenta_corriente_detallesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalles;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $cuenta_corriente_detallesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles() as $cuenta_corriente_detalle) {
				if($cuenta_corriente_detalle->getId()==$id) {
					$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalle($cuenta_corriente_detalle);
					
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
		/*$cuenta_corriente_detallesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->cuenta_corriente_detalles as $cuenta_corriente_detalle) {
			$cuenta_corriente_detalle->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->cuenta_corriente_detalles[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_corriente_detalle_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
						
		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
		
		
		$this->cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
		$this->cuenta_corriente_detalleParameterGeneral=new cuenta_corriente_detalle_param_return();
			
		$this->cuenta_corriente_detalleParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualcuenta_corriente_detalle(this.cuenta_corriente_detalle,true);
			this.setVariablesFormularioToObjetoActualForeignKeyscuenta_corriente_detalle(this.cuenta_corriente_detalle);*/
			
			if($cuenta_corriente_detalle_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualcuenta_corriente_detalle(this.cuenta_corriente_detalle,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->cuenta_corriente_detalleActual=$this->cuenta_corriente_detalleClase;
				
				$this->setCopiarVariablesObjetos($this->cuenta_corriente_detalleActual,$this->cuenta_corriente_detalle,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_corriente_detalleReturnGeneral=$this->cuenta_corriente_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles(),$this->cuenta_corriente_detalle,$this->cuenta_corriente_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($cuenta_corriente_detalle_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeancuenta_corriente_detalle($classes,$this->cuenta_corriente_detalleReturnGeneral,$this->cuenta_corriente_detalleBean,false);*/
				}
					
				if($this->cuenta_corriente_detalleReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle(),$this->cuenta_corriente_detalleActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeycuenta_corriente_detalle($this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariocuenta_corriente_detalle($this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle());*/
				}
					
				if($this->cuenta_corriente_detalleReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_corriente_detalle,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(cuenta_corriente_detalleJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualcuenta_corriente_detalle(this.cuenta_corriente_detalle,true);
				this.setVariablesFormularioToObjetoActualForeignKeyscuenta_corriente_detalle(this.cuenta_corriente_detalle);				
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
				
				if($this->cuenta_corriente_detalleAnterior!=null) {
					$this->cuenta_corriente_detalle=$this->cuenta_corriente_detalleAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->cuenta_corriente_detalleReturnGeneral=$this->cuenta_corriente_detalleLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles(),$this->cuenta_corriente_detalle,$this->cuenta_corriente_detalleParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle(),$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());
			*/
		}
		
		return $this->cuenta_corriente_detalleReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}

			$this->cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();			
			$this->cuenta_corriente_detalleParameterGeneral=new cuenta_corriente_detalle_param_return();
			
			$this->cuenta_corriente_detalleParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->cuenta_corriente_detalleReturnGeneral=$this->cuenta_corriente_detalleLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->cuenta_corriente_detalles,$this->cuenta_corriente_detalleParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->cuenta_corriente_detalleReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_corriente_detalleReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->cuenta_corriente_detalleReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_cuenta_corriente_detalle') {
		    $sDominio='cuenta_corriente_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->cuenta_corriente_detalleReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->cuenta_corriente_detalleReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='cuenta_corriente_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='cuenta_corriente_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='cuenta_corriente_detalle';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
		$this->cuenta_corriente_detalleParameterGeneral=new cuenta_corriente_detalle_param_return();
			
		$this->cuenta_corriente_detalleParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->cuenta_corriente_detalleReturnGeneral=$this->cuenta_corriente_detalleLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles(),$this->cuenta_corriente_detalle,$this->cuenta_corriente_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->cuenta_corriente_detalleReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_corriente_detalleReturnGeneral->getcuenta_corriente_detalle(),$classes);*/
		}									
	
		if($this->cuenta_corriente_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->cuenta_corriente_detalleReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->cuenta_corriente_detalleReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuenta_corriente_detalles,cuenta_corriente_detalle $cuenta_corriente_detalle) {
		
		$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
						
		if($cuenta_corriente_detalle_session==null) {
			$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(cuenta_corriente_detalle_util::$CLASSNAME);
			}	
			*/
			
			$this->cuenta_corriente_detalleReturnGeneral=new cuenta_corriente_detalle_param_return();
			$this->cuenta_corriente_detalleParameterGeneral=new cuenta_corriente_detalle_param_return();
			
			$this->cuenta_corriente_detalleParameterGeneral->setdata($this->data);
		
		
			
		if($cuenta_corriente_detalle_session->conGuardarRelaciones) {
			$classes=cuenta_corriente_detalle_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->cuenta_corriente_detalleActual,$this->cuenta_corriente_detalle,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->cuenta_corriente_detalleReturnGeneral=$this->cuenta_corriente_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles(),$this->cuenta_corriente_detalleActual,$this->cuenta_corriente_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->cuenta_corriente_detalleReturnGeneral=$this->cuenta_corriente_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$cuenta_corriente_detalles,$cuenta_corriente_detalle,$this->cuenta_corriente_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelcuenta_corriente_detalle($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle());*/
			
			$this->cuenta_corriente_detalle=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalle();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->cuenta_corriente_detalle);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$cuenta_corriente_detalleActual=new cuenta_corriente_detalle();
			
			if($this->cuenta_corriente_detalleClase==null) {		
				$this->cuenta_corriente_detalleClase=new cuenta_corriente_detalle();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$cuenta_corriente_detalleActual=$this->cuenta_corriente_detalles[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setes_balance_inicial(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $cuenta_corriente_detalleActual->setes_balance_inicial(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setes_cheque(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_9')));  } else { $cuenta_corriente_detalleActual->setes_cheque(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setes_deposito(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_10')));  } else { $cuenta_corriente_detalleActual->setes_deposito(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setes_retiro(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_11')));  } else { $cuenta_corriente_detalleActual->setes_retiro(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setnumero_cheque($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setdebito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setcredito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setfecha_hora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_tabla((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_origen((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_asiento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_cuenta_pagar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setid_cuenta_cobrar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->settabla_origen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setorigen_empresa($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setmotivo_anulacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setorigen_dato($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $cuenta_corriente_detalleActual->setcomputador_origen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }

				$this->cuenta_corriente_detalleClase=$cuenta_corriente_detalleActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuenta_corriente_detalleModel->set($this->cuenta_corriente_detalleClase);
				
				/*$this->cuenta_corriente_detalleModel->set($this->migrarModelcuenta_corriente_detalle($this->cuenta_corriente_detalleClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->cuenta_corriente_detalles=$this->migrarModelcuenta_corriente_detalle($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());							
		$this->cuenta_corriente_detalles=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();*/
		
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
			$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$cuenta_corriente_detalle_control_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($cuenta_corriente_detalle_control_session==null) {
				$cuenta_corriente_detalle_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($cuenta_corriente_detalle_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(cuenta_corriente_detalle_util::$STR_SESSION_NAME,$this);*/
		} else {
			$cuenta_corriente_detalle_session=unserialize($this->Session->read(cuenta_corriente_detalle_util::$STR_SESSION_NAME));
			
			if($cuenta_corriente_detalle_session==null) {
				$cuenta_corriente_detalle_session=new cuenta_corriente_detalle_session();
			}
			
			$this->set(cuenta_corriente_detalle_util::$STR_SESSION_NAME, $cuenta_corriente_detalle_session);
		}
	}
	
	public function setCopiarVariablesObjetos(cuenta_corriente_detalle $cuenta_corriente_detalleOrigen,cuenta_corriente_detalle $cuenta_corriente_detalle,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($cuenta_corriente_detalle==null) {
				$cuenta_corriente_detalle=new cuenta_corriente_detalle();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getId()!=null && $cuenta_corriente_detalleOrigen->getId()!=0)) {$cuenta_corriente_detalle->setId($cuenta_corriente_detalleOrigen->getId());}}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getid_cuenta_corriente()!=null && $cuenta_corriente_detalleOrigen->getid_cuenta_corriente()!=-1)) {$cuenta_corriente_detalle->setid_cuenta_corriente($cuenta_corriente_detalleOrigen->getid_cuenta_corriente());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getes_balance_inicial()!=null && $cuenta_corriente_detalleOrigen->getes_balance_inicial()!=false)) {$cuenta_corriente_detalle->setes_balance_inicial($cuenta_corriente_detalleOrigen->getes_balance_inicial());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getes_cheque()!=null && $cuenta_corriente_detalleOrigen->getes_cheque()!=false)) {$cuenta_corriente_detalle->setes_cheque($cuenta_corriente_detalleOrigen->getes_cheque());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getes_deposito()!=null && $cuenta_corriente_detalleOrigen->getes_deposito()!=false)) {$cuenta_corriente_detalle->setes_deposito($cuenta_corriente_detalleOrigen->getes_deposito());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getes_retiro()!=null && $cuenta_corriente_detalleOrigen->getes_retiro()!=false)) {$cuenta_corriente_detalle->setes_retiro($cuenta_corriente_detalleOrigen->getes_retiro());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getnumero_cheque()!=null && $cuenta_corriente_detalleOrigen->getnumero_cheque()!='')) {$cuenta_corriente_detalle->setnumero_cheque($cuenta_corriente_detalleOrigen->getnumero_cheque());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getfecha_emision()!=null && $cuenta_corriente_detalleOrigen->getfecha_emision()!=date('Y-m-d'))) {$cuenta_corriente_detalle->setfecha_emision($cuenta_corriente_detalleOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getid_cliente()!=null && $cuenta_corriente_detalleOrigen->getid_cliente()!=null)) {$cuenta_corriente_detalle->setid_cliente($cuenta_corriente_detalleOrigen->getid_cliente());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getid_proveedor()!=null && $cuenta_corriente_detalleOrigen->getid_proveedor()!=null)) {$cuenta_corriente_detalle->setid_proveedor($cuenta_corriente_detalleOrigen->getid_proveedor());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getmonto()!=null && $cuenta_corriente_detalleOrigen->getmonto()!=0.0)) {$cuenta_corriente_detalle->setmonto($cuenta_corriente_detalleOrigen->getmonto());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getdebito()!=null && $cuenta_corriente_detalleOrigen->getdebito()!=0.0)) {$cuenta_corriente_detalle->setdebito($cuenta_corriente_detalleOrigen->getdebito());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getcredito()!=null && $cuenta_corriente_detalleOrigen->getcredito()!=0.0)) {$cuenta_corriente_detalle->setcredito($cuenta_corriente_detalleOrigen->getcredito());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getbalance()!=null && $cuenta_corriente_detalleOrigen->getbalance()!=0.0)) {$cuenta_corriente_detalle->setbalance($cuenta_corriente_detalleOrigen->getbalance());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getfecha_hora()!=null && $cuenta_corriente_detalleOrigen->getfecha_hora()!=date('Y-m-d'))) {$cuenta_corriente_detalle->setfecha_hora($cuenta_corriente_detalleOrigen->getfecha_hora());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getid_tabla()!=null && $cuenta_corriente_detalleOrigen->getid_tabla()!=-1)) {$cuenta_corriente_detalle->setid_tabla($cuenta_corriente_detalleOrigen->getid_tabla());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getid_origen()!=null && $cuenta_corriente_detalleOrigen->getid_origen()!=0)) {$cuenta_corriente_detalle->setid_origen($cuenta_corriente_detalleOrigen->getid_origen());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getdescripcion()!=null && $cuenta_corriente_detalleOrigen->getdescripcion()!='')) {$cuenta_corriente_detalle->setdescripcion($cuenta_corriente_detalleOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getid_estado()!=null && $cuenta_corriente_detalleOrigen->getid_estado()!=-1)) {$cuenta_corriente_detalle->setid_estado($cuenta_corriente_detalleOrigen->getid_estado());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getid_asiento()!=null && $cuenta_corriente_detalleOrigen->getid_asiento()!=null)) {$cuenta_corriente_detalle->setid_asiento($cuenta_corriente_detalleOrigen->getid_asiento());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getid_cuenta_pagar()!=null && $cuenta_corriente_detalleOrigen->getid_cuenta_pagar()!=null)) {$cuenta_corriente_detalle->setid_cuenta_pagar($cuenta_corriente_detalleOrigen->getid_cuenta_pagar());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getid_cuenta_cobrar()!=null && $cuenta_corriente_detalleOrigen->getid_cuenta_cobrar()!=null)) {$cuenta_corriente_detalle->setid_cuenta_cobrar($cuenta_corriente_detalleOrigen->getid_cuenta_cobrar());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->gettabla_origen()!=null && $cuenta_corriente_detalleOrigen->gettabla_origen()!='')) {$cuenta_corriente_detalle->settabla_origen($cuenta_corriente_detalleOrigen->gettabla_origen());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getorigen_empresa()!=null && $cuenta_corriente_detalleOrigen->getorigen_empresa()!='')) {$cuenta_corriente_detalle->setorigen_empresa($cuenta_corriente_detalleOrigen->getorigen_empresa());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getmotivo_anulacion()!=null && $cuenta_corriente_detalleOrigen->getmotivo_anulacion()!='')) {$cuenta_corriente_detalle->setmotivo_anulacion($cuenta_corriente_detalleOrigen->getmotivo_anulacion());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getorigen_dato()!=null && $cuenta_corriente_detalleOrigen->getorigen_dato()!='')) {$cuenta_corriente_detalle->setorigen_dato($cuenta_corriente_detalleOrigen->getorigen_dato());}
			if($conDefault || ($conDefault==false && $cuenta_corriente_detalleOrigen->getcomputador_origen()!=null && $cuenta_corriente_detalleOrigen->getcomputador_origen()!='')) {$cuenta_corriente_detalle->setcomputador_origen($cuenta_corriente_detalleOrigen->getcomputador_origen());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$cuenta_corriente_detallesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$cuenta_corriente_detallesSeleccionados[]=$this->cuenta_corriente_detalles[$indice];
			}
		}
		
		return $cuenta_corriente_detallesSeleccionados;
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
		$cuenta_corriente_detalle= new cuenta_corriente_detalle();
		
		foreach($this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles() as $cuenta_corriente_detalle) {
			
		$cuenta_corriente_detalle->clasificacioncheques=array();
		}		
		
		if($cuenta_corriente_detalle!=null);
	}
	
	public function cargarRelaciones(array $cuenta_corriente_detalles=array()) : array {	
		
		$cuenta_corriente_detallesRespaldo = array();
		$cuenta_corriente_detallesLocal = array();
		
		cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			clasificacion_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$cuenta_corriente_detallesResp=array();
		$classes=array();
			
		
				$class=new Classe('clasificacion_cheque'); 	$classes[]=$class;
			
			
		$cuenta_corriente_detallesRespaldo=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
			
		$this->cuenta_corriente_detalleLogic->setIsConDeep(true);
		
		$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detalles);
			
		$this->cuenta_corriente_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
			
		/*RESPALDO*/
		$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detallesRespaldo);
			
		$this->cuenta_corriente_detalleLogic->setIsConDeep(false);
		
		if($cuenta_corriente_detallesResp!=null);
		
		return $cuenta_corriente_detallesLocal;
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
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session) {
		$cuenta_corriente_detalle_session->strTypeOnLoad=$this->strTypeOnLoadcuenta_corriente_detalle;
		$cuenta_corriente_detalle_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarcuenta_corriente_detalle;
		$cuenta_corriente_detalle_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarcuenta_corriente_detalle;
		$cuenta_corriente_detalle_session->bitEsPopup=$this->bitEsPopup;
		$cuenta_corriente_detalle_session->bitEsBusqueda=$this->bitEsBusqueda;
		$cuenta_corriente_detalle_session->strFuncionJs=$this->strFuncionJs;
		/*$cuenta_corriente_detalle_session->strSufijo=$this->strSufijo;*/
		$cuenta_corriente_detalle_session->bitEsRelaciones=$this->bitEsRelaciones;
		$cuenta_corriente_detalle_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_corriente_detalle_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosclasificacion_cheque='none';
			$this->strTienePermisosclasificacion_cheque=((Funciones::existeCadenaArray(clasificacion_cheque_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosclasificacion_cheque='table-cell';
		} else {
			

			$this->strTienePermisosclasificacion_cheque='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosclasificacion_cheque=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, clasificacion_cheque_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosclasificacion_cheque='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$cuenta_corriente_detalleViewAdditional=new cuenta_corriente_detalleView_add();
		$cuenta_corriente_detalleViewAdditional->cuenta_corriente_detalles=$this->cuenta_corriente_detalles;
		$cuenta_corriente_detalleViewAdditional->Session=$this->Session;
		
		return $cuenta_corriente_detalleViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$cuenta_corriente_detallesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalles;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_corriente_detallesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($cuenta_corriente_detallesLocal)<=0) {
					$cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalles;
				}
			} else {
				$cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalles;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_corriente_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_corriente_detallesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$cuenta_corriente_detalleLogic=new cuenta_corriente_detalle_logic();
		$cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($this->cuenta_corriente_detalles);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));

		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=new clasificacion_cheque_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('tabla');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			$class=new Classe('asiento');$classes[]=$class;
			$class=new Classe('cuenta_pagar');$classes[]=$class;
			$class=new Classe('cuenta_cobrar');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuenta_corriente_detalleLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuenta_corriente_detalles=$cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalles;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=cuenta_corriente_detalle_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=cuenta_corriente_detalle_util::$STR_TABLE_NAME;		
			
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
			
			$cuenta_corriente_detalles = $this->cuenta_corriente_detalles;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = cuenta_corriente_detalle_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = cuenta_corriente_detalle_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/cuenta_corriente_detalle_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->cuenta_corriente_detalles=$cuenta_corriente_detalles;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->cuenta_corriente_detallesLocal=$cuenta_corriente_detallesLocal;
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
		
		$cuenta_corriente_detallesLocal=array();
		
		$cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalles;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_corriente_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_corriente_detallesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$cuenta_corriente_detalleLogic=new cuenta_corriente_detalle_logic();
		$cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($this->cuenta_corriente_detalles);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));

		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=new clasificacion_cheque_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('tabla');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			$class=new Classe('asiento');$classes[]=$class;
			$class=new Classe('cuenta_pagar');$classes[]=$class;
			$class=new Classe('cuenta_cobrar');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuenta_corriente_detalleLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuenta_corriente_detalles=$cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$cuenta_corriente_detalles = $this->cuenta_corriente_detalles;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = cuenta_corriente_detalle_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = cuenta_corriente_detalle_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascorrientes/presentation/templating/cuenta_corriente_detalle_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->cuenta_corriente_detalles=$cuenta_corriente_detalles;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->cuenta_corriente_detallesLocal=$cuenta_corriente_detallesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $cuenta_corriente_detalles=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->cuenta_corriente_detallesReporte = $cuenta_corriente_detalles;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_corriente_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_corriente_detallesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $cuenta_corriente_detalles=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->cuenta_corriente_detallesReporte = $cuenta_corriente_detalles;		
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
		
		
		$this->cuenta_corriente_detallesReporte=$this->cargarRelaciones($cuenta_corriente_detalles);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuenta_corriente_detallesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuenta_corriente_detallesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(cuenta_corriente_detalle $cuenta_corriente_detalle=null) : string {	
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
			
			
			$cuenta_corriente_detallesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_corriente_detallesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuenta_corriente_detallesLocal)<=0) {
					/*//DEBE ESCOGER
					$cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalles;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalles;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuenta_corriente_detallesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($cuenta_corriente_detallesLocal,true);
			
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
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
			}
					
			$cuenta_corriente_detallesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuenta_corriente_detallesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuenta_corriente_detallesLocal)<=0) {
					/*//DEBE ESCOGER
					$cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalles;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuenta_corriente_detallesLocal=$this->cuenta_corriente_detalles;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuenta_corriente_detallesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($cuenta_corriente_detallesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Cuenta Corriente Detalles';
			
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
			$fileName='cuenta_corriente_detalle';
			
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
			
			$title='Reporte de  Cuenta Corriente Detalles';
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
			
			$title='Reporte de  Cuenta Corriente Detalles';
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
				$this->cuenta_corriente_detalleLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Cuenta Corriente Detalles';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corriente_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corriente_detalleLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=cuenta_corriente_detalle_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->cuenta_corriente_detallesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_corriente_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuenta_corriente_detallesAuxiliar)<=0) {
					$this->cuenta_corriente_detallesAuxiliar=$this->cuenta_corriente_detalles;
				}
			} else {
				$this->cuenta_corriente_detallesAuxiliar=$this->cuenta_corriente_detalles;
			}
		/*} else {
			$this->cuenta_corriente_detallesAuxiliar=$this->cuenta_corriente_detallesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->cuenta_corriente_detallesAuxiliar as $cuenta_corriente_detalle) {
				$row=array();
				
				$row=cuenta_corriente_detalle_util::getDataReportRow($tipo,$cuenta_corriente_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			cuenta_corriente_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			clasificacion_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$cuenta_corriente_detallesResp=array();
			$classes=array();
			
			
				$class=new Classe('clasificacion_cheque'); 	$classes[]=$class;
			
			
			$cuenta_corriente_detallesResp=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
			
			$this->cuenta_corriente_detalleLogic->setIsConDeep(true);
			
			$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($this->cuenta_corriente_detallesAuxiliar);
			
			$this->cuenta_corriente_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->cuenta_corriente_detallesAuxiliar=$this->cuenta_corriente_detalleLogic->getcuenta_corriente_detalles();
			
			//RESPALDO
			$this->cuenta_corriente_detalleLogic->setcuenta_corriente_detalles($cuenta_corriente_detallesResp);
			
			$this->cuenta_corriente_detalleLogic->setIsConDeep(false);
			*/
			
			$this->cuenta_corriente_detallesAuxiliar=$this->cargarRelaciones($this->cuenta_corriente_detallesAuxiliar);
			
			$i=0;
			
			foreach ($this->cuenta_corriente_detallesAuxiliar as $cuenta_corriente_detalle) {
				$row=array();
				
				if($i!=0) {
					$row=cuenta_corriente_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=cuenta_corriente_detalle_util::getDataReportRow($tipo,$cuenta_corriente_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//clasificacion_cheque
				if(Funciones::existeCadenaArrayOrderBy(clasificacion_cheque_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta_corriente_detalle->getclasificacion_cheques())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(clasificacion_cheque_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=clasificacion_cheque_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta_corriente_detalle->getclasificacion_cheques() as $clasificacion_cheque) {
						$row=clasificacion_cheque_util::getDataReportRow('RELACIONADO',$clasificacion_cheque,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->cuenta_corriente_detallesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_corriente_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuenta_corriente_detallesAuxiliar)<=0) {
					$this->cuenta_corriente_detallesAuxiliar=$this->cuenta_corriente_detalles;
				}
			} else {
				$this->cuenta_corriente_detallesAuxiliar=$this->cuenta_corriente_detalles;
			}
		/*} else {
			$this->cuenta_corriente_detallesAuxiliar=$this->cuenta_corriente_detallesReporte;	
		}*/
		
		foreach ($this->cuenta_corriente_detallesAuxiliar as $cuenta_corriente_detalle) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_corriente_detalle_util::getcuenta_corriente_detalleDescripcion($cuenta_corriente_detalle),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_cuenta_corrienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Es Balance Inicial',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Es Balance Inicial',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getes_balance_inicial(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Es Cheque',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Es Cheque',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getes_cheque(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Es Deposito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Es Deposito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getes_deposito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Es Retiro',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Es Retiro',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getes_retiro(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero Cheque',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Cheque',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getnumero_cheque(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getmonto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Debito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Debito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getdebito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Credito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Credito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getcredito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Balance',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getbalance(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Hora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Hora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getfecha_hora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Tabla',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tabla',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_tablaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Origen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Origen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_origen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Estado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Estado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_estadoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Asiento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Asiento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_asientoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Pagar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Pagar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_cuenta_pagarDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Cobrar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Cobrar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getid_cuenta_cobrarDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tabla Origen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tabla Origen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->gettabla_origen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Origen Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Origen Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getorigen_empresa(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Motivo Anulacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Motivo Anulacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getmotivo_anulacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Origen Dato',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Origen Dato',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getorigen_dato(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Computador Origen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Computador Origen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta_corriente_detalle->getcomputador_origen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface cuenta_corriente_detalle_base_controlI {			
		
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
		public function getIndiceActual(cuenta_corriente_detalle $cuenta_corriente_detalle,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(cuenta_corriente_detalle $cuenta_corriente_detalle,array $cuenta_corriente_detalles);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_corriente_detalle_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuenta_corriente_detalles,cuenta_corriente_detalle $cuenta_corriente_detalle);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(cuenta_corriente_detalle_param_return $cuenta_corriente_detalleReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session);		
		public function actualizarInvitadoSessionDivStyleVariables(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(cuenta_corriente_detalle $cuenta_corriente_detalleOrigen,cuenta_corriente_detalle $cuenta_corriente_detalle,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(cuenta_corriente_detalle_control $cuenta_corriente_detalle_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $cuenta_corriente_detalles=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(cuenta_corriente_detalle_session $cuenta_corriente_detalle_session);		
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
		public function getHtmlTablaDatosResumen(array $cuenta_corriente_detalles=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $cuenta_corriente_detalles=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(cuenta_corriente_detalle $cuenta_corriente_detalle=null) : string;
		
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
