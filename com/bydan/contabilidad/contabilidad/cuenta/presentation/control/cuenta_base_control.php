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

namespace com\bydan\contabilidad\contabilidad\cuenta\presentation\control;

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

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/util/cuenta_carga.php');
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;

use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_param_return;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\presentation\session\cuenta_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\logic\tipo_nivel_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\session\categoria_cheque_session;

use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;
use com\bydan\contabilidad\facturacion\otro_impuesto\presentation\session\otro_impuesto_session;

use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;
use com\bydan\contabilidad\facturacion\impuesto\presentation\session\impuesto_session;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\session\cuenta_corriente_session;

use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_carga;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_util;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\session\instrumento_pago_session;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;

use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_detalle\presentation\session\asiento_detalle_session;

use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;
use com\bydan\contabilidad\facturacion\retencion\presentation\session\retencion_session;

use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_carga;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_util;
use com\bydan\contabilidad\facturacion\retencion_fuente\presentation\session\retencion_fuente_session;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\presentation\session\forma_pago_cliente_session;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_util;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\session\saldo_cuenta_session;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\session\termino_pago_proveedor_session;

use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;
use com\bydan\contabilidad\facturacion\retencion_ica\presentation\session\retencion_ica_session;

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\session\asiento_predefinido_detalle_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\session\asiento_automatico_detalle_session;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\session\forma_pago_proveedor_session;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\presentation\session\termino_pago_cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_base_control extends cuenta_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->cuentaClase==null) {		
				$this->cuentaClase=new cuenta();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_cuenta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_nivel_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_nivel_cuenta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->cuentaClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->cuentaClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->cuentaClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->cuentaClase->setid_tipo_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_cuenta'));
				
				$this->cuentaClase->setid_tipo_nivel_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_nivel_cuenta'));
				
				$this->cuentaClase->setid_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta'));
				
				$this->cuentaClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->cuentaClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->cuentaClase->setnivel_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'nivel_cuenta'));
				
				$this->cuentaClase->setusa_monto_base(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'usa_monto_base')));
				
				$this->cuentaClase->setmonto_base((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto_base'));
				
				$this->cuentaClase->setporcentaje_base((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'porcentaje_base'));
				
				$this->cuentaClase->setcon_centro_costos(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_centro_costos')));
				
				$this->cuentaClase->setcon_ruc(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_ruc')));
				
				$this->cuentaClase->setbalance((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'balance'));
				
				$this->cuentaClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->cuentaClase->setcon_retencion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'con_retencion')));
				
				$this->cuentaClase->setvalor_retencion((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'valor_retencion'));
				
				$this->cuentaClase->setultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'ultima_transaccion')));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuentaModel->set($this->cuentaClase);
				
				/*$this->cuentaModel->set($this->migrarModelcuenta($this->cuentaClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->cuentaLogic->getcuenta()->setId($this->cuentaClase->getId());	
			$this->cuentaLogic->getcuenta()->setVersionRow($this->cuentaClase->getVersionRow());	
			$this->cuentaLogic->getcuenta()->setVersionRow($this->cuentaClase->getVersionRow());	
			$this->cuentaLogic->getcuenta()->setid_empresa($this->cuentaClase->getid_empresa());	
			$this->cuentaLogic->getcuenta()->setid_tipo_cuenta($this->cuentaClase->getid_tipo_cuenta());	
			$this->cuentaLogic->getcuenta()->setid_tipo_nivel_cuenta($this->cuentaClase->getid_tipo_nivel_cuenta());	
			$this->cuentaLogic->getcuenta()->setid_cuenta($this->cuentaClase->getid_cuenta());	
			$this->cuentaLogic->getcuenta()->setcodigo($this->cuentaClase->getcodigo());	
			$this->cuentaLogic->getcuenta()->setnombre($this->cuentaClase->getnombre());	
			$this->cuentaLogic->getcuenta()->setnivel_cuenta($this->cuentaClase->getnivel_cuenta());	
			$this->cuentaLogic->getcuenta()->setusa_monto_base($this->cuentaClase->getusa_monto_base());	
			$this->cuentaLogic->getcuenta()->setmonto_base($this->cuentaClase->getmonto_base());	
			$this->cuentaLogic->getcuenta()->setporcentaje_base($this->cuentaClase->getporcentaje_base());	
			$this->cuentaLogic->getcuenta()->setcon_centro_costos($this->cuentaClase->getcon_centro_costos());	
			$this->cuentaLogic->getcuenta()->setcon_ruc($this->cuentaClase->getcon_ruc());	
			$this->cuentaLogic->getcuenta()->setbalance($this->cuentaClase->getbalance());	
			$this->cuentaLogic->getcuenta()->setdescripcion($this->cuentaClase->getdescripcion());	
			$this->cuentaLogic->getcuenta()->setcon_retencion($this->cuentaClase->getcon_retencion());	
			$this->cuentaLogic->getcuenta()->setvalor_retencion($this->cuentaClase->getvalor_retencion());	
			$this->cuentaLogic->getcuenta()->setultima_transaccion($this->cuentaClase->getultima_transaccion());	
		} else {
			$this->cuentaClase->setId($this->cuentaLogic->getcuenta()->getId());	
			$this->cuentaClase->setVersionRow($this->cuentaLogic->getcuenta()->getVersionRow());	
			$this->cuentaClase->setVersionRow($this->cuentaLogic->getcuenta()->getVersionRow());	
			$this->cuentaClase->setid_empresa($this->cuentaLogic->getcuenta()->getid_empresa());	
			$this->cuentaClase->setid_tipo_cuenta($this->cuentaLogic->getcuenta()->getid_tipo_cuenta());	
			$this->cuentaClase->setid_tipo_nivel_cuenta($this->cuentaLogic->getcuenta()->getid_tipo_nivel_cuenta());	
			$this->cuentaClase->setid_cuenta($this->cuentaLogic->getcuenta()->getid_cuenta());	
			$this->cuentaClase->setcodigo($this->cuentaLogic->getcuenta()->getcodigo());	
			$this->cuentaClase->setnombre($this->cuentaLogic->getcuenta()->getnombre());	
			$this->cuentaClase->setnivel_cuenta($this->cuentaLogic->getcuenta()->getnivel_cuenta());	
			$this->cuentaClase->setusa_monto_base($this->cuentaLogic->getcuenta()->getusa_monto_base());	
			$this->cuentaClase->setmonto_base($this->cuentaLogic->getcuenta()->getmonto_base());	
			$this->cuentaClase->setporcentaje_base($this->cuentaLogic->getcuenta()->getporcentaje_base());	
			$this->cuentaClase->setcon_centro_costos($this->cuentaLogic->getcuenta()->getcon_centro_costos());	
			$this->cuentaClase->setcon_ruc($this->cuentaLogic->getcuenta()->getcon_ruc());	
			$this->cuentaClase->setbalance($this->cuentaLogic->getcuenta()->getbalance());	
			$this->cuentaClase->setdescripcion($this->cuentaLogic->getcuenta()->getdescripcion());	
			$this->cuentaClase->setcon_retencion($this->cuentaLogic->getcuenta()->getcon_retencion());	
			$this->cuentaClase->setvalor_retencion($this->cuentaLogic->getcuenta()->getvalor_retencion());	
			$this->cuentaClase->setultima_transaccion($this->cuentaLogic->getcuenta()->getultima_transaccion());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->cuentaModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_cuenta') {$this->strMensajeid_tipo_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_nivel_cuenta') {$this->strMensajeid_tipo_nivel_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta') {$this->strMensajeid_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='codigo') {$this->strMensajecodigo=$strMensajeCampo;}
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
		if($strNombreCampo=='nivel_cuenta') {$this->strMensajenivel_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='usa_monto_base') {$this->strMensajeusa_monto_base=$strMensajeCampo;}
		if($strNombreCampo=='monto_base') {$this->strMensajemonto_base=$strMensajeCampo;}
		if($strNombreCampo=='porcentaje_base') {$this->strMensajeporcentaje_base=$strMensajeCampo;}
		if($strNombreCampo=='con_centro_costos') {$this->strMensajecon_centro_costos=$strMensajeCampo;}
		if($strNombreCampo=='con_ruc') {$this->strMensajecon_ruc=$strMensajeCampo;}
		if($strNombreCampo=='balance') {$this->strMensajebalance=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='con_retencion') {$this->strMensajecon_retencion=$strMensajeCampo;}
		if($strNombreCampo=='valor_retencion') {$this->strMensajevalor_retencion=$strMensajeCampo;}
		if($strNombreCampo=='ultima_transaccion') {$this->strMensajeultima_transaccion=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_tipo_cuenta='';
		$this->strMensajeid_tipo_nivel_cuenta='';
		$this->strMensajeid_cuenta='';
		$this->strMensajecodigo='';
		$this->strMensajenombre='';
		$this->strMensajenivel_cuenta='';
		$this->strMensajeusa_monto_base='';
		$this->strMensajemonto_base='';
		$this->strMensajeporcentaje_base='';
		$this->strMensajecon_centro_costos='';
		$this->strMensajecon_ruc='';
		$this->strMensajebalance='';
		$this->strMensajedescripcion='';
		$this->strMensajecon_retencion='';
		$this->strMensajevalor_retencion='';
		$this->strMensajeultima_transaccion='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
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
				$this->cuentaLogic->getNewConnexionToDeep();
			}

			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
						
			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
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
						$this->cuentaLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->cuentaActual =$this->cuentaClase;
			
			/*$this->cuentaActual =$this->migrarModelcuenta($this->cuentaClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->cuentaLogic->getcuentas(),$this->cuentaActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuentaReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
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
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$cuentasLocal=$this->getListaActual();
		
		$iIndice=cuenta_util::getIndiceNuevo($cuentasLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(cuenta $cuenta,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$cuentasLocal=$this->getListaActual();
		
		$iIndice=cuenta_util::getIndiceActual($cuentasLocal,$cuenta,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevocuenta')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->cuentaActual =$this->cuentaClase;
			
			/*$this->cuentaActual =$this->migrarModelcuenta($this->cuentaClase);*/
			
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
			
			$this->cuentaLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_cuenta');$classes[]=$class;
				$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
			
			$this->cuentaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->cuentaLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->cuentaLogic->setcuenta(new cuenta());
				
				$this->cuentaLogic->getcuenta()->setIsNew(true);
				$this->cuentaLogic->getcuenta()->setIsChanged(true);
				$this->cuentaLogic->getcuenta()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->cuentaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->cuentaLogic->cuentas[]=$this->cuentaLogic->getcuenta();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuentaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							categoria_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$categoriacheques=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME.'Lista'));
							$categoriachequesEliminados=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME.'ListaEliminados'));
							$categoriacheques=array_merge($categoriacheques,$categoriachequesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otroimpuestos=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME.'Lista'));
							$otroimpuestosEliminados=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otroimpuestos=array_merge($otroimpuestos,$otroimpuestosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$impuestos=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME.'Lista'));
							$impuestosEliminados=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$impuestos=array_merge($impuestos,$impuestosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacorrientes=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$cuentacorrientesEliminados=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacorrientes=array_merge($cuentacorrientes,$cuentacorrientesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productos=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'Lista'));
							$productosEliminados=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productos=array_merge($productos,$productosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							instrumento_pago_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$instrumentopagos=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME.'Lista'));
							$instrumentopagosEliminados=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME.'ListaEliminados'));
							$instrumentopagos=array_merge($instrumentopagos,$instrumentopagosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientodetalles=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientodetallesEliminados=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientodetalles=array_merge($asientodetalles,$asientodetallesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencions=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME.'Lista'));
							$retencionsEliminados=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencions=array_merge($retencions,$retencionsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_fuente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencionfuentes=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME.'Lista'));
							$retencionfuentesEliminados=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencionfuentes=array_merge($retencionfuentes,$retencionfuentesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentas=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME.'Lista'));
							$cuentasEliminados=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentas=array_merge($cuentas,$cuentasEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							forma_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$formapagoclientes=unserialize($this->Session->read(forma_pago_cliente_util::$STR_SESSION_NAME.'Lista'));
							$formapagoclientesEliminados=unserialize($this->Session->read(forma_pago_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$formapagoclientes=array_merge($formapagoclientes,$formapagoclientesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							saldo_cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$saldocuentas=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME.'Lista'));
							$saldocuentasEliminados=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME.'ListaEliminados'));
							$saldocuentas=array_merge($saldocuentas,$saldocuentasEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							termino_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$terminopagoproveedors=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$terminopagoproveedorsEliminados=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$terminopagoproveedors=array_merge($terminopagoproveedors,$terminopagoproveedorsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_ica_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencionicas=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME.'Lista'));
							$retencionicasEliminados=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencionicas=array_merge($retencionicas,$retencionicasEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidodetalles=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidodetallesEliminados=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidodetalles=array_merge($asientopredefinidodetalles,$asientopredefinidodetallesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticodetalles=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticodetallesEliminados=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticodetalles=array_merge($asientoautomaticodetalles,$asientoautomaticodetallesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							forma_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$formapagoproveedors=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$formapagoproveedorsEliminados=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$formapagoproveedors=array_merge($formapagoproveedors,$formapagoproveedorsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							termino_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$terminopagoclientes=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME.'Lista'));
							$terminopagoclientesEliminados=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$terminopagoclientes=array_merge($terminopagoclientes,$terminopagoclientesEliminados);
							
							$this->cuentaLogic->saveRelaciones($this->cuentaLogic->getcuenta(),$categoriacheques,$otroimpuestos,$impuestos,$cuentacorrientes,$productos,$instrumentopagos,$listaproductos,$asientodetalles,$retencions,$retencionfuentes,$cuentas,$proveedors,$formapagoclientes,$saldocuentas,$terminopagoproveedors,$retencionicas,$asientopredefinidodetalles,$clientes,$asientoautomaticodetalles,$formapagoproveedors,$terminopagoclientes);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->cuentaLogic->getcuenta()->setIsChanged(true);
				$this->cuentaLogic->getcuenta()->setIsNew(false);
				$this->cuentaLogic->getcuenta()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->cuentaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->cuentaLogic->getcuenta(),$this->cuentaLogic->getcuentas());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuentaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							categoria_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$categoriacheques=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME.'Lista'));
							$categoriachequesEliminados=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME.'ListaEliminados'));
							$categoriacheques=array_merge($categoriacheques,$categoriachequesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otroimpuestos=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME.'Lista'));
							$otroimpuestosEliminados=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otroimpuestos=array_merge($otroimpuestos,$otroimpuestosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$impuestos=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME.'Lista'));
							$impuestosEliminados=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$impuestos=array_merge($impuestos,$impuestosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacorrientes=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$cuentacorrientesEliminados=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacorrientes=array_merge($cuentacorrientes,$cuentacorrientesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productos=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'Lista'));
							$productosEliminados=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productos=array_merge($productos,$productosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							instrumento_pago_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$instrumentopagos=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME.'Lista'));
							$instrumentopagosEliminados=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME.'ListaEliminados'));
							$instrumentopagos=array_merge($instrumentopagos,$instrumentopagosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientodetalles=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientodetallesEliminados=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientodetalles=array_merge($asientodetalles,$asientodetallesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencions=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME.'Lista'));
							$retencionsEliminados=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencions=array_merge($retencions,$retencionsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_fuente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencionfuentes=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME.'Lista'));
							$retencionfuentesEliminados=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencionfuentes=array_merge($retencionfuentes,$retencionfuentesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentas=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME.'Lista'));
							$cuentasEliminados=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentas=array_merge($cuentas,$cuentasEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							forma_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$formapagoclientes=unserialize($this->Session->read(forma_pago_cliente_util::$STR_SESSION_NAME.'Lista'));
							$formapagoclientesEliminados=unserialize($this->Session->read(forma_pago_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$formapagoclientes=array_merge($formapagoclientes,$formapagoclientesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							saldo_cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$saldocuentas=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME.'Lista'));
							$saldocuentasEliminados=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME.'ListaEliminados'));
							$saldocuentas=array_merge($saldocuentas,$saldocuentasEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							termino_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$terminopagoproveedors=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$terminopagoproveedorsEliminados=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$terminopagoproveedors=array_merge($terminopagoproveedors,$terminopagoproveedorsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_ica_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencionicas=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME.'Lista'));
							$retencionicasEliminados=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencionicas=array_merge($retencionicas,$retencionicasEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidodetalles=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidodetallesEliminados=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidodetalles=array_merge($asientopredefinidodetalles,$asientopredefinidodetallesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticodetalles=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticodetallesEliminados=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticodetalles=array_merge($asientoautomaticodetalles,$asientoautomaticodetallesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							forma_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$formapagoproveedors=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$formapagoproveedorsEliminados=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$formapagoproveedors=array_merge($formapagoproveedors,$formapagoproveedorsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							termino_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$terminopagoclientes=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME.'Lista'));
							$terminopagoclientesEliminados=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$terminopagoclientes=array_merge($terminopagoclientes,$terminopagoclientesEliminados);
							
							$this->cuentaLogic->saveRelaciones($this->cuentaLogic->getcuenta(),$categoriacheques,$otroimpuestos,$impuestos,$cuentacorrientes,$productos,$instrumentopagos,$listaproductos,$asientodetalles,$retencions,$retencionfuentes,$cuentas,$proveedors,$formapagoclientes,$saldocuentas,$terminopagoproveedors,$retencionicas,$asientopredefinidodetalles,$clientes,$asientoautomaticodetalles,$formapagoproveedors,$terminopagoclientes);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->cuentaLogic->getcuenta()->setIsDeleted(true);
				$this->cuentaLogic->getcuenta()->setIsNew(false);
				$this->cuentaLogic->getcuenta()->setIsChanged(false);				
				
				$this->actualizarLista($this->cuentaLogic->getcuenta(),$this->cuentaLogic->getcuentas());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuentaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							categoria_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$categoriacheques=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME.'Lista'));
							$categoriachequesEliminados=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME.'ListaEliminados'));
							$categoriacheques=array_merge($categoriacheques,$categoriachequesEliminados);

							foreach($categoriacheques as $categoriacheque1) {
								$categoriacheque1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otroimpuestos=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME.'Lista'));
							$otroimpuestosEliminados=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otroimpuestos=array_merge($otroimpuestos,$otroimpuestosEliminados);

							foreach($otroimpuestos as $otroimpuesto1) {
								$otroimpuesto1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$impuestos=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME.'Lista'));
							$impuestosEliminados=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$impuestos=array_merge($impuestos,$impuestosEliminados);

							foreach($impuestos as $impuesto1) {
								$impuesto1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacorrientes=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$cuentacorrientesEliminados=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacorrientes=array_merge($cuentacorrientes,$cuentacorrientesEliminados);

							foreach($cuentacorrientes as $cuentacorriente1) {
								$cuentacorriente1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productos=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'Lista'));
							$productosEliminados=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productos=array_merge($productos,$productosEliminados);

							foreach($productos as $producto1) {
								$producto1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							instrumento_pago_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$instrumentopagos=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME.'Lista'));
							$instrumentopagosEliminados=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME.'ListaEliminados'));
							$instrumentopagos=array_merge($instrumentopagos,$instrumentopagosEliminados);

							foreach($instrumentopagos as $instrumentopago1) {
								$instrumentopago1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);

							foreach($listaproductos as $listaproducto1) {
								$listaproducto1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientodetalles=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientodetallesEliminados=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientodetalles=array_merge($asientodetalles,$asientodetallesEliminados);

							foreach($asientodetalles as $asientodetalle1) {
								$asientodetalle1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencions=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME.'Lista'));
							$retencionsEliminados=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencions=array_merge($retencions,$retencionsEliminados);

							foreach($retencions as $retencion1) {
								$retencion1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_fuente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencionfuentes=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME.'Lista'));
							$retencionfuentesEliminados=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencionfuentes=array_merge($retencionfuentes,$retencionfuentesEliminados);

							foreach($retencionfuentes as $retencionfuente1) {
								$retencionfuente1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentas=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME.'Lista'));
							$cuentasEliminados=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentas=array_merge($cuentas,$cuentasEliminados);

							foreach($cuentas as $cuenta1) {
								$cuenta1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);

							foreach($proveedors as $proveedor1) {
								$proveedor1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							forma_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$formapagoclientes=unserialize($this->Session->read(forma_pago_cliente_util::$STR_SESSION_NAME.'Lista'));
							$formapagoclientesEliminados=unserialize($this->Session->read(forma_pago_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$formapagoclientes=array_merge($formapagoclientes,$formapagoclientesEliminados);

							foreach($formapagoclientes as $formapagocliente1) {
								$formapagocliente1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							saldo_cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$saldocuentas=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME.'Lista'));
							$saldocuentasEliminados=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME.'ListaEliminados'));
							$saldocuentas=array_merge($saldocuentas,$saldocuentasEliminados);

							foreach($saldocuentas as $saldocuenta1) {
								$saldocuenta1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							termino_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$terminopagoproveedors=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$terminopagoproveedorsEliminados=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$terminopagoproveedors=array_merge($terminopagoproveedors,$terminopagoproveedorsEliminados);

							foreach($terminopagoproveedors as $terminopagoproveedor1) {
								$terminopagoproveedor1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_ica_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencionicas=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME.'Lista'));
							$retencionicasEliminados=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencionicas=array_merge($retencionicas,$retencionicasEliminados);

							foreach($retencionicas as $retencionica1) {
								$retencionica1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidodetalles=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidodetallesEliminados=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidodetalles=array_merge($asientopredefinidodetalles,$asientopredefinidodetallesEliminados);

							foreach($asientopredefinidodetalles as $asientopredefinidodetalle1) {
								$asientopredefinidodetalle1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);

							foreach($clientes as $cliente1) {
								$cliente1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticodetalles=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticodetallesEliminados=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticodetalles=array_merge($asientoautomaticodetalles,$asientoautomaticodetallesEliminados);

							foreach($asientoautomaticodetalles as $asientoautomaticodetalle1) {
								$asientoautomaticodetalle1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							forma_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$formapagoproveedors=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$formapagoproveedorsEliminados=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$formapagoproveedors=array_merge($formapagoproveedors,$formapagoproveedorsEliminados);

							foreach($formapagoproveedors as $formapagoproveedor1) {
								$formapagoproveedor1->setIsDeleted(true);
							}
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							termino_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$terminopagoclientes=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME.'Lista'));
							$terminopagoclientesEliminados=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$terminopagoclientes=array_merge($terminopagoclientes,$terminopagoclientesEliminados);

							foreach($terminopagoclientes as $terminopagocliente1) {
								$terminopagocliente1->setIsDeleted(true);
							}
							
						$this->cuentaLogic->saveRelaciones($this->cuentaLogic->getcuenta(),$categoriacheques,$otroimpuestos,$impuestos,$cuentacorrientes,$productos,$instrumentopagos,$listaproductos,$asientodetalles,$retencions,$retencionfuentes,$cuentas,$proveedors,$formapagoclientes,$saldocuentas,$terminopagoproveedors,$retencionicas,$asientopredefinidodetalles,$clientes,$asientoautomaticodetalles,$formapagoproveedors,$terminopagoclientes);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->cuentasEliminados[]=$this->cuentaLogic->getcuenta();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuentaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							categoria_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$categoriacheques=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME.'Lista'));
							$categoriachequesEliminados=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME.'ListaEliminados'));
							$categoriacheques=array_merge($categoriacheques,$categoriachequesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otroimpuestos=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME.'Lista'));
							$otroimpuestosEliminados=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otroimpuestos=array_merge($otroimpuestos,$otroimpuestosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$impuestos=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME.'Lista'));
							$impuestosEliminados=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$impuestos=array_merge($impuestos,$impuestosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacorrientes=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME.'Lista'));
							$cuentacorrientesEliminados=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacorrientes=array_merge($cuentacorrientes,$cuentacorrientesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productos=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'Lista'));
							$productosEliminados=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productos=array_merge($productos,$productosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							instrumento_pago_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$instrumentopagos=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME.'Lista'));
							$instrumentopagosEliminados=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME.'ListaEliminados'));
							$instrumentopagos=array_merge($instrumentopagos,$instrumentopagosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientodetalles=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientodetallesEliminados=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientodetalles=array_merge($asientodetalles,$asientodetallesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencions=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME.'Lista'));
							$retencionsEliminados=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencions=array_merge($retencions,$retencionsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_fuente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencionfuentes=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME.'Lista'));
							$retencionfuentesEliminados=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencionfuentes=array_merge($retencionfuentes,$retencionfuentesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentas=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME.'Lista'));
							$cuentasEliminados=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentas=array_merge($cuentas,$cuentasEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$proveedors=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'Lista'));
							$proveedorsEliminados=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$proveedors=array_merge($proveedors,$proveedorsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							forma_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$formapagoclientes=unserialize($this->Session->read(forma_pago_cliente_util::$STR_SESSION_NAME.'Lista'));
							$formapagoclientesEliminados=unserialize($this->Session->read(forma_pago_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$formapagoclientes=array_merge($formapagoclientes,$formapagoclientesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							saldo_cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$saldocuentas=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME.'Lista'));
							$saldocuentasEliminados=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME.'ListaEliminados'));
							$saldocuentas=array_merge($saldocuentas,$saldocuentasEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							termino_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$terminopagoproveedors=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$terminopagoproveedorsEliminados=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$terminopagoproveedors=array_merge($terminopagoproveedors,$terminopagoproveedorsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							retencion_ica_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$retencionicas=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME.'Lista'));
							$retencionicasEliminados=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME.'ListaEliminados'));
							$retencionicas=array_merge($retencionicas,$retencionicasEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientopredefinidodetalles=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientopredefinidodetallesEliminados=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientopredefinidodetalles=array_merge($asientopredefinidodetalles,$asientopredefinidodetallesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$clientes=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'Lista'));
							$clientesEliminados=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$clientes=array_merge($clientes,$clientesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$asientoautomaticodetalles=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'Lista'));
							$asientoautomaticodetallesEliminados=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$asientoautomaticodetalles=array_merge($asientoautomaticodetalles,$asientoautomaticodetallesEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							forma_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$formapagoproveedors=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$formapagoproveedorsEliminados=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$formapagoproveedors=array_merge($formapagoproveedors,$formapagoproveedorsEliminados);
							cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							termino_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$terminopagoclientes=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME.'Lista'));
							$terminopagoclientesEliminados=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$terminopagoclientes=array_merge($terminopagoclientes,$terminopagoclientesEliminados);
							
						$this->cuentaLogic->saveRelaciones($this->cuentaLogic->getcuenta(),$categoriacheques,$otroimpuestos,$impuestos,$cuentacorrientes,$productos,$instrumentopagos,$listaproductos,$asientodetalles,$retencions,$retencionfuentes,$cuentas,$proveedors,$formapagoclientes,$saldocuentas,$terminopagoproveedors,$retencionicas,$asientopredefinidodetalles,$clientes,$asientoautomaticodetalles,$formapagoproveedors,$terminopagoclientes);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cuentasEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuentaLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->cuentaLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->cuentasEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_cuenta');$classes[]=$class;
				$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->cuentaLogic->setcuentas();*/
					
					$this->cuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->cuentaLogic->setIsConDeepLoad(false);
			
			$this->cuentas=$this->cuentaLogic->getcuentas();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(cuenta_util::$STR_SESSION_NAME.'Lista',serialize($this->cuentas));
				$this->Session->write(cuenta_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuentasEliminados));
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
				$this->cuentaLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
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
				$this->cuentaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalcuenta;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->cuentaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->cuentas as $cuentaLocal) {
				if($this->cuentaLogic->getcuenta()->getId()==$cuentaLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->cuentaLogic->getcuenta()->setIsDeleted(true);
			$this->cuentasEliminados[]=$this->cuentaLogic->getcuenta();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->cuentas[$indice]);
				
				$this->cuentas = array_values($this->cuentas);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelcuenta($this->cuentaClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(cuenta $cuenta,array $cuentas) {
		try {
			foreach($cuentas as $cuentaLocal){ 
				if($cuentaLocal->getId()==$cuenta->getId()) {
					$cuentaLocal->setIsChanged($cuenta->getIsChanged());
					$cuentaLocal->setIsNew($cuenta->getIsNew());
					$cuentaLocal->setIsDeleted($cuenta->getIsDeleted());
					//$cuentaLocal->setbitExpired($cuenta->getbitExpired());
					
					$cuentaLocal->setId($cuenta->getId());	
					$cuentaLocal->setVersionRow($cuenta->getVersionRow());	
					$cuentaLocal->setVersionRow($cuenta->getVersionRow());	
					$cuentaLocal->setid_empresa($cuenta->getid_empresa());	
					$cuentaLocal->setid_tipo_cuenta($cuenta->getid_tipo_cuenta());	
					$cuentaLocal->setid_tipo_nivel_cuenta($cuenta->getid_tipo_nivel_cuenta());	
					$cuentaLocal->setid_cuenta($cuenta->getid_cuenta());	
					$cuentaLocal->setcodigo($cuenta->getcodigo());	
					$cuentaLocal->setnombre($cuenta->getnombre());	
					$cuentaLocal->setnivel_cuenta($cuenta->getnivel_cuenta());	
					$cuentaLocal->setusa_monto_base($cuenta->getusa_monto_base());	
					$cuentaLocal->setmonto_base($cuenta->getmonto_base());	
					$cuentaLocal->setporcentaje_base($cuenta->getporcentaje_base());	
					$cuentaLocal->setcon_centro_costos($cuenta->getcon_centro_costos());	
					$cuentaLocal->setcon_ruc($cuenta->getcon_ruc());	
					$cuentaLocal->setbalance($cuenta->getbalance());	
					$cuentaLocal->setdescripcion($cuenta->getdescripcion());	
					$cuentaLocal->setcon_retencion($cuenta->getcon_retencion());	
					$cuentaLocal->setvalor_retencion($cuenta->getvalor_retencion());	
					$cuentaLocal->setultima_transaccion($cuenta->getultima_transaccion());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$cuentasLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$cuentasLocal=$this->cuentaLogic->getcuentas();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$cuentasLocal=$this->cuentas;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $cuentasLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->cuentaLogic->getcuentas() as $cuenta) {
				if($cuenta->getId()==$id) {
					$this->cuentaLogic->setcuenta($cuenta);
					
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
		/*$cuentasSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->cuentas as $cuenta) {
			$cuenta->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->cuentas[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
						
		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
		
		
		$this->cuentaReturnGeneral=new cuenta_param_return();
		$this->cuentaParameterGeneral=new cuenta_param_return();
			
		$this->cuentaParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualcuenta(this.cuenta,true);
			this.setVariablesFormularioToObjetoActualForeignKeyscuenta(this.cuenta);*/
			
			if($cuenta_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualcuenta(this.cuenta,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->cuentaActual=$this->cuentaClase;
				
				$this->setCopiarVariablesObjetos($this->cuentaActual,$this->cuenta,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuentaReturnGeneral=$this->cuentaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuentaLogic->getcuentas(),$this->cuenta,$this->cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($cuenta_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeancuenta($classes,$this->cuentaReturnGeneral,$this->cuentaBean,false);*/
				}
					
				if($this->cuentaReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->cuentaReturnGeneral->getcuenta(),$this->cuentaActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeycuenta($this->cuentaReturnGeneral->getcuenta());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariocuenta($this->cuentaReturnGeneral->getcuenta());*/
				}
					
				if($this->cuentaReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->cuentaReturnGeneral->getcuenta(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(cuentaJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualcuenta(this.cuenta,true);
				this.setVariablesFormularioToObjetoActualForeignKeyscuenta(this.cuenta);				
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
				
				if($this->cuentaAnterior!=null) {
					$this->cuenta=$this->cuentaAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->cuentaReturnGeneral=$this->cuentaLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuentaLogic->getcuentas(),$this->cuenta,$this->cuentaParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->cuentaReturnGeneral->getcuenta(),$this->cuentaLogic->getcuentas());
			*/
		}
		
		return $this->cuentaReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}

			$this->cuentaReturnGeneral=new cuenta_param_return();			
			$this->cuentaParameterGeneral=new cuenta_param_return();
			
			$this->cuentaParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->cuentaReturnGeneral=$this->cuentaLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->cuentas,$this->cuentaParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->cuentaReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->cuentaReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->cuentaReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
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
		
		$this->cuentaReturnGeneral=new cuenta_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_cuenta') {
		    $sDominio='cuenta';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->cuentaReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->cuentaReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='cuenta';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='cuenta';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='cuenta';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->cuentaReturnGeneral=new cuenta_param_return();
		$this->cuentaParameterGeneral=new cuenta_param_return();
			
		$this->cuentaParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->cuentaReturnGeneral=$this->cuentaLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->cuentaLogic->getcuentas(),$this->cuenta,$this->cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->cuentaReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->cuentaReturnGeneral->getcuenta(),$classes);*/
		}									
	
		if($this->cuentaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->cuentaReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->cuentaReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuentas,cuenta $cuenta) {
		
		$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
						
		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(cuenta_util::$CLASSNAME);
			}	
			*/
			
			$this->cuentaReturnGeneral=new cuenta_param_return();
			$this->cuentaParameterGeneral=new cuenta_param_return();
			
			$this->cuentaParameterGeneral->setdata($this->data);
		
		
			
		if($cuenta_session->conGuardarRelaciones) {
			$classes=cuenta_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->cuentaActual,$this->cuenta,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->cuentaReturnGeneral=$this->cuentaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->cuentaLogic->getcuentas(),$this->cuentaActual,$this->cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->cuentaReturnGeneral=$this->cuentaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$cuentas,$cuenta,$this->cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelcuenta($this->cuentaLogic->getcuenta());*/
			
			$this->cuenta=$this->cuentaLogic->getcuenta();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->cuenta);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$cuentaActual=new cuenta();
			
			if($this->cuentaClase==null) {		
				$this->cuentaClase=new cuenta();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$cuentaActual=$this->cuentas[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuentaActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuentaActual->setid_tipo_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuentaActual->setid_tipo_nivel_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuentaActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuentaActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuentaActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuentaActual->setnivel_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuentaActual->setusa_monto_base(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_10')));  } else { $cuentaActual->setusa_monto_base(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuentaActual->setmonto_base((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuentaActual->setporcentaje_base((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuentaActual->setcon_centro_costos(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_13')));  } else { $cuentaActual->setcon_centro_costos(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cuentaActual->setcon_ruc(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_14')));  } else { $cuentaActual->setcon_ruc(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cuentaActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cuentaActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cuentaActual->setcon_retencion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_17')));  } else { $cuentaActual->setcon_retencion(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cuentaActual->setvalor_retencion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cuentaActual->setultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19')));  }

				$this->cuentaClase=$cuentaActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->cuentaModel->set($this->cuentaClase);
				
				/*$this->cuentaModel->set($this->migrarModelcuenta($this->cuentaClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->cuentas=$this->migrarModelcuenta($this->cuentaLogic->getcuentas());							
		$this->cuentas=$this->cuentaLogic->getcuentas();*/
		
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
			$this->Session->write(cuenta_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$cuenta_control_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($cuenta_control_session==null) {
				$cuenta_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($cuenta_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(cuenta_util::$STR_SESSION_NAME,$this);*/
		} else {
			$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));
			
			if($cuenta_session==null) {
				$cuenta_session=new cuenta_session();
			}
			
			$this->set(cuenta_util::$STR_SESSION_NAME, $cuenta_session);
		}
	}
	
	public function setCopiarVariablesObjetos(cuenta $cuentaOrigen,cuenta $cuenta,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($cuenta==null) {
				$cuenta=new cuenta();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $cuentaOrigen->getId()!=null && $cuentaOrigen->getId()!=0)) {$cuenta->setId($cuentaOrigen->getId());}}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getid_tipo_cuenta()!=null && $cuentaOrigen->getid_tipo_cuenta()!=-1)) {$cuenta->setid_tipo_cuenta($cuentaOrigen->getid_tipo_cuenta());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getid_tipo_nivel_cuenta()!=null && $cuentaOrigen->getid_tipo_nivel_cuenta()!=-1)) {$cuenta->setid_tipo_nivel_cuenta($cuentaOrigen->getid_tipo_nivel_cuenta());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getid_cuenta()!=null && $cuentaOrigen->getid_cuenta()!=null)) {$cuenta->setid_cuenta($cuentaOrigen->getid_cuenta());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getcodigo()!=null && $cuentaOrigen->getcodigo()!='')) {$cuenta->setcodigo($cuentaOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getnombre()!=null && $cuentaOrigen->getnombre()!='')) {$cuenta->setnombre($cuentaOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getnivel_cuenta()!=null && $cuentaOrigen->getnivel_cuenta()!=0)) {$cuenta->setnivel_cuenta($cuentaOrigen->getnivel_cuenta());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getusa_monto_base()!=null && $cuentaOrigen->getusa_monto_base()!=false)) {$cuenta->setusa_monto_base($cuentaOrigen->getusa_monto_base());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getmonto_base()!=null && $cuentaOrigen->getmonto_base()!=0.0)) {$cuenta->setmonto_base($cuentaOrigen->getmonto_base());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getporcentaje_base()!=null && $cuentaOrigen->getporcentaje_base()!=0.0)) {$cuenta->setporcentaje_base($cuentaOrigen->getporcentaje_base());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getcon_centro_costos()!=null && $cuentaOrigen->getcon_centro_costos()!=false)) {$cuenta->setcon_centro_costos($cuentaOrigen->getcon_centro_costos());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getcon_ruc()!=null && $cuentaOrigen->getcon_ruc()!=false)) {$cuenta->setcon_ruc($cuentaOrigen->getcon_ruc());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getbalance()!=null && $cuentaOrigen->getbalance()!=0.0)) {$cuenta->setbalance($cuentaOrigen->getbalance());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getdescripcion()!=null && $cuentaOrigen->getdescripcion()!='')) {$cuenta->setdescripcion($cuentaOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getcon_retencion()!=null && $cuentaOrigen->getcon_retencion()!=false)) {$cuenta->setcon_retencion($cuentaOrigen->getcon_retencion());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getvalor_retencion()!=null && $cuentaOrigen->getvalor_retencion()!=0.0)) {$cuenta->setvalor_retencion($cuentaOrigen->getvalor_retencion());}
			if($conDefault || ($conDefault==false && $cuentaOrigen->getultima_transaccion()!=null && $cuentaOrigen->getultima_transaccion()!=date('Y-m-d'))) {$cuenta->setultima_transaccion($cuentaOrigen->getultima_transaccion());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$cuentasSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$cuentasSeleccionados[]=$this->cuentas[$indice];
			}
		}
		
		return $cuentasSeleccionados;
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
		$cuenta= new cuenta();
		
		foreach($this->cuentaLogic->getcuentas() as $cuenta) {
			
		$cuenta->categoriacheques=array();
		$cuenta->otroimpuesto_ventass=array();
		$cuenta->impuesto_ventass=array();
		$cuenta->cuentacorrientes=array();
		$cuenta->producto_ventas=array();
		$cuenta->instrumentopago_ventass=array();
		$cuenta->listaproducto_ventas=array();
		$cuenta->asientodetalles=array();
		$cuenta->retencion_comprass=array();
		$cuenta->retencionfuente_comprass=array();
		$cuenta->cuentas=array();
		$cuenta->proveedors=array();
		$cuenta->formapagoclientes=array();
		$cuenta->saldocuentas=array();
		$cuenta->terminopagoproveedors=array();
		$cuenta->retencionica_ventass=array();
		$cuenta->asientopredefinidodetalles=array();
		$cuenta->clientes=array();
		$cuenta->asientoautomaticodetalles=array();
		$cuenta->formapagoproveedors=array();
		$cuenta->terminopagoclientes=array();
		}		
		
		if($cuenta!=null);
	}
	
	public function cargarRelaciones(array $cuentas=array()) : array {	
		
		$cuentasRespaldo = array();
		$cuentasLocal = array();
		
		cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			categoria_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			otro_impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			instrumento_pago_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			retencion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			retencion_fuente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			forma_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			saldo_cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			termino_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			retencion_ica_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			forma_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			termino_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$cuentasResp=array();
		$classes=array();
			
		
				$class=new Classe('categoria_cheque'); 	$classes[]=$class;
				$class=new Classe('otro_impuesto'); 	$classes[]=$class;
				$class=new Classe('impuesto'); 	$classes[]=$class;
				$class=new Classe('cuenta_corriente'); 	$classes[]=$class;
				$class=new Classe('producto'); 	$classes[]=$class;
				$class=new Classe('instrumento_pago'); 	$classes[]=$class;
				$class=new Classe('lista_producto'); 	$classes[]=$class;
				$class=new Classe('asiento_detalle'); 	$classes[]=$class;
				$class=new Classe('retencion'); 	$classes[]=$class;
				$class=new Classe('retencion_fuente'); 	$classes[]=$class;
				$class=new Classe('cuenta'); 	$classes[]=$class;
				$class=new Classe('proveedor'); 	$classes[]=$class;
				$class=new Classe('forma_pago_cliente'); 	$classes[]=$class;
				$class=new Classe('saldo_cuenta'); 	$classes[]=$class;
				$class=new Classe('termino_pago_proveedor'); 	$classes[]=$class;
				$class=new Classe('retencion_ica'); 	$classes[]=$class;
				$class=new Classe('asiento_predefinido_detalle'); 	$classes[]=$class;
				$class=new Classe('cliente'); 	$classes[]=$class;
				$class=new Classe('asiento_automatico_detalle'); 	$classes[]=$class;
				$class=new Classe('forma_pago_proveedor'); 	$classes[]=$class;
				$class=new Classe('termino_pago_cliente'); 	$classes[]=$class;
			
			
		$cuentasRespaldo=$this->cuentaLogic->getcuentas();
			
		$this->cuentaLogic->setIsConDeep(true);
		
		$this->cuentaLogic->setcuentas($cuentas);
			
		$this->cuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$cuentasLocal=$this->cuentaLogic->getcuentas();
			
		/*RESPALDO*/
		$this->cuentaLogic->setcuentas($cuentasRespaldo);
			
		$this->cuentaLogic->setIsConDeep(false);
		
		if($cuentasResp!=null);
		
		return $cuentasLocal;
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
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(cuenta_session $cuenta_session) {
		$cuenta_session->strTypeOnLoad=$this->strTypeOnLoadcuenta;
		$cuenta_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarcuenta;
		$cuenta_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarcuenta;
		$cuenta_session->bitEsPopup=$this->bitEsPopup;
		$cuenta_session->bitEsBusqueda=$this->bitEsBusqueda;
		$cuenta_session->strFuncionJs=$this->strFuncionJs;
		/*$cuenta_session->strSufijo=$this->strSufijo;*/
		$cuenta_session->bitEsRelaciones=$this->bitEsRelaciones;
		$cuenta_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisoscategoria_cheque='none';
			$this->strTienePermisoscategoria_cheque=((Funciones::existeCadenaArray(categoria_cheque_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscategoria_cheque='table-cell';

			$this->strTienePermisosotro_impuesto='none';
			$this->strTienePermisosotro_impuesto=((Funciones::existeCadenaArray(otro_impuesto_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosotro_impuesto='table-cell';

			$this->strTienePermisosimpuesto='none';
			$this->strTienePermisosimpuesto=((Funciones::existeCadenaArray(impuesto_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosimpuesto='table-cell';

			$this->strTienePermisoscuenta_corriente='none';
			$this->strTienePermisoscuenta_corriente=((Funciones::existeCadenaArray(cuenta_corriente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscuenta_corriente='table-cell';

			$this->strTienePermisosproducto='none';
			$this->strTienePermisosproducto=((Funciones::existeCadenaArray(producto_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosproducto='table-cell';

			$this->strTienePermisosinstrumento_pago='none';
			$this->strTienePermisosinstrumento_pago=((Funciones::existeCadenaArray(instrumento_pago_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosinstrumento_pago='table-cell';

			$this->strTienePermisoslista_producto='none';
			$this->strTienePermisoslista_producto=((Funciones::existeCadenaArray(lista_producto_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoslista_producto='table-cell';

			$this->strTienePermisosasiento_detalle='none';
			$this->strTienePermisosasiento_detalle=((Funciones::existeCadenaArray(asiento_detalle_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento_detalle='table-cell';

			$this->strTienePermisosretencion='none';
			$this->strTienePermisosretencion=((Funciones::existeCadenaArray(retencion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosretencion='table-cell';

			$this->strTienePermisosretencion_fuente='none';
			$this->strTienePermisosretencion_fuente=((Funciones::existeCadenaArray(retencion_fuente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosretencion_fuente='table-cell';

			$this->strTienePermisoscuenta='none';
			$this->strTienePermisoscuenta=((Funciones::existeCadenaArray(cuenta_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscuenta='table-cell';

			$this->strTienePermisosproveedor='none';
			$this->strTienePermisosproveedor=((Funciones::existeCadenaArray(proveedor_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosproveedor='table-cell';

			$this->strTienePermisosforma_pago_cliente='none';
			$this->strTienePermisosforma_pago_cliente=((Funciones::existeCadenaArray(forma_pago_cliente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosforma_pago_cliente='table-cell';

			$this->strTienePermisossaldo_cuenta='none';
			$this->strTienePermisossaldo_cuenta=((Funciones::existeCadenaArray(saldo_cuenta_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisossaldo_cuenta='table-cell';

			$this->strTienePermisostermino_pago_proveedor='none';
			$this->strTienePermisostermino_pago_proveedor=((Funciones::existeCadenaArray(termino_pago_proveedor_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisostermino_pago_proveedor='table-cell';

			$this->strTienePermisosretencion_ica='none';
			$this->strTienePermisosretencion_ica=((Funciones::existeCadenaArray(retencion_ica_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosretencion_ica='table-cell';

			$this->strTienePermisosasiento_predefinido_detalle='none';
			$this->strTienePermisosasiento_predefinido_detalle=((Funciones::existeCadenaArray(asiento_predefinido_detalle_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento_predefinido_detalle='table-cell';

			$this->strTienePermisoscliente='none';
			$this->strTienePermisoscliente=((Funciones::existeCadenaArray(cliente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscliente='table-cell';

			$this->strTienePermisosasiento_automatico_detalle='none';
			$this->strTienePermisosasiento_automatico_detalle=((Funciones::existeCadenaArray(asiento_automatico_detalle_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosasiento_automatico_detalle='table-cell';

			$this->strTienePermisosforma_pago_proveedor='none';
			$this->strTienePermisosforma_pago_proveedor=((Funciones::existeCadenaArray(forma_pago_proveedor_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosforma_pago_proveedor='table-cell';

			$this->strTienePermisostermino_pago_cliente='none';
			$this->strTienePermisostermino_pago_cliente=((Funciones::existeCadenaArray(termino_pago_cliente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisostermino_pago_cliente='table-cell';
		} else {
			

			$this->strTienePermisoscategoria_cheque='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscategoria_cheque=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, categoria_cheque_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscategoria_cheque='table-cell';

			$this->strTienePermisosotro_impuesto='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosotro_impuesto=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, otro_impuesto_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosotro_impuesto='table-cell';

			$this->strTienePermisosimpuesto='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosimpuesto=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, impuesto_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosimpuesto='table-cell';

			$this->strTienePermisoscuenta_corriente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscuenta_corriente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_corriente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscuenta_corriente='table-cell';

			$this->strTienePermisosproducto='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosproducto=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, producto_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosproducto='table-cell';

			$this->strTienePermisosinstrumento_pago='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosinstrumento_pago=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, instrumento_pago_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosinstrumento_pago='table-cell';

			$this->strTienePermisoslista_producto='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoslista_producto=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, lista_producto_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoslista_producto='table-cell';

			$this->strTienePermisosasiento_detalle='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosasiento_detalle=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_detalle_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosasiento_detalle='table-cell';

			$this->strTienePermisosretencion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosretencion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, retencion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosretencion='table-cell';

			$this->strTienePermisosretencion_fuente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosretencion_fuente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, retencion_fuente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosretencion_fuente='table-cell';

			$this->strTienePermisoscuenta='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscuenta=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscuenta='table-cell';

			$this->strTienePermisosproveedor='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosproveedor=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, proveedor_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosproveedor='table-cell';

			$this->strTienePermisosforma_pago_cliente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosforma_pago_cliente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, forma_pago_cliente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosforma_pago_cliente='table-cell';

			$this->strTienePermisossaldo_cuenta='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisossaldo_cuenta=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, saldo_cuenta_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisossaldo_cuenta='table-cell';

			$this->strTienePermisostermino_pago_proveedor='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisostermino_pago_proveedor=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, termino_pago_proveedor_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisostermino_pago_proveedor='table-cell';

			$this->strTienePermisosretencion_ica='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosretencion_ica=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, retencion_ica_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosretencion_ica='table-cell';

			$this->strTienePermisosasiento_predefinido_detalle='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosasiento_predefinido_detalle=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_predefinido_detalle_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosasiento_predefinido_detalle='table-cell';

			$this->strTienePermisoscliente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscliente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cliente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscliente='table-cell';

			$this->strTienePermisosasiento_automatico_detalle='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosasiento_automatico_detalle=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_automatico_detalle_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosasiento_automatico_detalle='table-cell';

			$this->strTienePermisosforma_pago_proveedor='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosforma_pago_proveedor=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, forma_pago_proveedor_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosforma_pago_proveedor='table-cell';

			$this->strTienePermisostermino_pago_cliente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisostermino_pago_cliente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, termino_pago_cliente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisostermino_pago_cliente='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$cuentaViewAdditional=new cuentaView_add();
		$cuentaViewAdditional->cuentas=$this->cuentas;
		$cuentaViewAdditional->Session=$this->Session;
		
		return $cuentaViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$cuentasLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$cuentasLocal=$this->cuentas;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuentasLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($cuentasLocal)<=0) {
					$cuentasLocal=$this->cuentas;
				}
			} else {
				$cuentasLocal=$this->cuentas;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuentasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuentasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$cuentaLogic=new cuenta_logic();
		$cuentaLogic->setcuentas($this->cuentas);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));

		if($categoria_cheque_session==null) {
			$categoria_cheque_session=new categoria_cheque_session();
		}

		$otro_impuesto_session=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME));

		if($otro_impuesto_session==null) {
			$otro_impuesto_session=new otro_impuesto_session();
		}

		$impuesto_session=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME));

		if($impuesto_session==null) {
			$impuesto_session=new impuesto_session();
		}

		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}

		$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));

		if($instrumento_pago_session==null) {
			$instrumento_pago_session=new instrumento_pago_session();
		}

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}

		$asiento_detalle_session=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME));

		if($asiento_detalle_session==null) {
			$asiento_detalle_session=new asiento_detalle_session();
		}

		$retencion_session=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME));

		if($retencion_session==null) {
			$retencion_session=new retencion_session();
		}

		$retencion_fuente_session=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME));

		if($retencion_fuente_session==null) {
			$retencion_fuente_session=new retencion_fuente_session();
		}

		$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}

		$forma_pago_cliente_session=unserialize($this->Session->read(forma_pago_cliente_util::$STR_SESSION_NAME));

		if($forma_pago_cliente_session==null) {
			$forma_pago_cliente_session=new forma_pago_cliente_session();
		}

		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}

		$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}

		$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));

		if($retencion_ica_session==null) {
			$retencion_ica_session=new retencion_ica_session();
		}

		$asiento_predefinido_detalle_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME));

		if($asiento_predefinido_detalle_session==null) {
			$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
		}

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}

		$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));

		if($asiento_automatico_detalle_session==null) {
			$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
		}

		$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));

		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}

		$termino_pago_cliente_session=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME));

		if($termino_pago_cliente_session==null) {
			$termino_pago_cliente_session=new termino_pago_cliente_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_cuenta');$classes[]=$class;
			$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuentaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuentas=$cuentaLogic->getcuentas();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->cuentasLocal=$this->cuentas;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=cuenta_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=cuenta_util::$STR_TABLE_NAME;		
			
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
			
			$cuentas = $this->cuentas;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = cuenta_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = cuenta_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/cuenta_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->cuentas=$cuentas;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->cuentasLocal=$cuentasLocal;
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
		
		$cuentasLocal=array();
		
		$cuentasLocal=$this->cuentas;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuentasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuentasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$cuentaLogic=new cuenta_logic();
		$cuentaLogic->setcuentas($this->cuentas);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));

		if($categoria_cheque_session==null) {
			$categoria_cheque_session=new categoria_cheque_session();
		}

		$otro_impuesto_session=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME));

		if($otro_impuesto_session==null) {
			$otro_impuesto_session=new otro_impuesto_session();
		}

		$impuesto_session=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME));

		if($impuesto_session==null) {
			$impuesto_session=new impuesto_session();
		}

		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}

		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

		if($producto_session==null) {
			$producto_session=new producto_session();
		}

		$instrumento_pago_session=unserialize($this->Session->read(instrumento_pago_util::$STR_SESSION_NAME));

		if($instrumento_pago_session==null) {
			$instrumento_pago_session=new instrumento_pago_session();
		}

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}

		$asiento_detalle_session=unserialize($this->Session->read(asiento_detalle_util::$STR_SESSION_NAME));

		if($asiento_detalle_session==null) {
			$asiento_detalle_session=new asiento_detalle_session();
		}

		$retencion_session=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME));

		if($retencion_session==null) {
			$retencion_session=new retencion_session();
		}

		$retencion_fuente_session=unserialize($this->Session->read(retencion_fuente_util::$STR_SESSION_NAME));

		if($retencion_fuente_session==null) {
			$retencion_fuente_session=new retencion_fuente_session();
		}

		$cuenta_session=unserialize($this->Session->read(cuenta_util::$STR_SESSION_NAME));

		if($cuenta_session==null) {
			$cuenta_session=new cuenta_session();
		}

		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}

		$forma_pago_cliente_session=unserialize($this->Session->read(forma_pago_cliente_util::$STR_SESSION_NAME));

		if($forma_pago_cliente_session==null) {
			$forma_pago_cliente_session=new forma_pago_cliente_session();
		}

		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}

		$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}

		$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));

		if($retencion_ica_session==null) {
			$retencion_ica_session=new retencion_ica_session();
		}

		$asiento_predefinido_detalle_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME));

		if($asiento_predefinido_detalle_session==null) {
			$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
		}

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}

		$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));

		if($asiento_automatico_detalle_session==null) {
			$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
		}

		$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));

		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}

		$termino_pago_cliente_session=unserialize($this->Session->read(termino_pago_cliente_util::$STR_SESSION_NAME));

		if($termino_pago_cliente_session==null) {
			$termino_pago_cliente_session=new termino_pago_cliente_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_cuenta');$classes[]=$class;
			$class=new Classe('tipo_nivel_cuenta');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$cuentaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->cuentas=$cuentaLogic->getcuentas();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$cuentas = $this->cuentas;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = cuenta_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = cuenta_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/contabilidad/presentation/templating/cuenta_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->cuentas=$cuentas;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->cuentasLocal=$cuentasLocal;
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
	
	public function getHtmlTablaDatosResumen(array $cuentas=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->cuentasReporte = $cuentas;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuentasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuentasAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $cuentas=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->cuentasReporte = $cuentas;		
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
		
		
		$this->cuentasReporte=$this->cargarRelaciones($cuentas);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarcuentasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarcuentasAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(cuenta $cuenta=null) : string {	
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
			
			
			$cuentasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuentasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuentasLocal)<=0) {
					/*//DEBE ESCOGER
					$cuentasLocal=$this->cuentas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuentasLocal=$this->cuentas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuentasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($cuentasLocal,true);
			
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
				$this->cuentaLogic->getNewConnexionToDeep();
			}
					
			$cuentasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$cuentasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($cuentasLocal)<=0) {
					/*//DEBE ESCOGER
					$cuentasLocal=$this->cuentas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$cuentasLocal=$this->cuentas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($cuentasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($cuentasLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Cuentases';
			
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
			$fileName='cuenta';
			
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
			
			$title='Reporte de  Cuentases';
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
			
			$title='Reporte de  Cuentases';
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
				$this->cuentaLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Cuentases';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->commitNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuentaLogic->rollbackNewConnexionToDeep();
				$this->cuentaLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=cuenta_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->cuentasAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuentasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuentasAuxiliar)<=0) {
					$this->cuentasAuxiliar=$this->cuentas;
				}
			} else {
				$this->cuentasAuxiliar=$this->cuentas;
			}
		/*} else {
			$this->cuentasAuxiliar=$this->cuentasReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->cuentasAuxiliar as $cuenta) {
				$row=array();
				
				$row=cuenta_util::getDataReportRow($tipo,$cuenta,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			categoria_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			otro_impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			instrumento_pago_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			retencion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			retencion_fuente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			forma_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			saldo_cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			termino_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			retencion_ica_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			forma_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			termino_pago_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$cuentasResp=array();
			$classes=array();
			
			
				$class=new Classe('categoria_cheque'); 	$classes[]=$class;
				$class=new Classe('otro_impuesto'); 	$classes[]=$class;
				$class=new Classe('impuesto'); 	$classes[]=$class;
				$class=new Classe('cuenta_corriente'); 	$classes[]=$class;
				$class=new Classe('producto'); 	$classes[]=$class;
				$class=new Classe('instrumento_pago'); 	$classes[]=$class;
				$class=new Classe('lista_producto'); 	$classes[]=$class;
				$class=new Classe('asiento_detalle'); 	$classes[]=$class;
				$class=new Classe('retencion'); 	$classes[]=$class;
				$class=new Classe('retencion_fuente'); 	$classes[]=$class;
				$class=new Classe('cuenta'); 	$classes[]=$class;
				$class=new Classe('proveedor'); 	$classes[]=$class;
				$class=new Classe('forma_pago_cliente'); 	$classes[]=$class;
				$class=new Classe('saldo_cuenta'); 	$classes[]=$class;
				$class=new Classe('termino_pago_proveedor'); 	$classes[]=$class;
				$class=new Classe('retencion_ica'); 	$classes[]=$class;
				$class=new Classe('asiento_predefinido_detalle'); 	$classes[]=$class;
				$class=new Classe('cliente'); 	$classes[]=$class;
				$class=new Classe('asiento_automatico_detalle'); 	$classes[]=$class;
				$class=new Classe('forma_pago_proveedor'); 	$classes[]=$class;
				$class=new Classe('termino_pago_cliente'); 	$classes[]=$class;
			
			
			$cuentasResp=$this->cuentaLogic->getcuentas();
			
			$this->cuentaLogic->setIsConDeep(true);
			
			$this->cuentaLogic->setcuentas($this->cuentasAuxiliar);
			
			$this->cuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->cuentasAuxiliar=$this->cuentaLogic->getcuentas();
			
			//RESPALDO
			$this->cuentaLogic->setcuentas($cuentasResp);
			
			$this->cuentaLogic->setIsConDeep(false);
			*/
			
			$this->cuentasAuxiliar=$this->cargarRelaciones($this->cuentasAuxiliar);
			
			$i=0;
			
			foreach ($this->cuentasAuxiliar as $cuenta) {
				$row=array();
				
				if($i!=0) {
					$row=cuenta_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=cuenta_util::getDataReportRow($tipo,$cuenta,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//categoria_cheque
				if(Funciones::existeCadenaArrayOrderBy(categoria_cheque_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getcategoria_cheques())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(categoria_cheque_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=categoria_cheque_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getcategoria_cheques() as $categoria_cheque) {
						$row=categoria_cheque_util::getDataReportRow('RELACIONADO',$categoria_cheque,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//otro_impuesto
				if(Funciones::existeCadenaArrayOrderBy(otro_impuesto_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getotro_impuestos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(otro_impuesto_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=otro_impuesto_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getotro_impuestos() as $otro_impuesto) {
						$row=otro_impuesto_util::getDataReportRow('RELACIONADO',$otro_impuesto,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//impuesto
				if(Funciones::existeCadenaArrayOrderBy(impuesto_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getimpuestos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(impuesto_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=impuesto_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getimpuestos() as $impuesto) {
						$row=impuesto_util::getDataReportRow('RELACIONADO',$impuesto,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//cuenta_corriente
				if(Funciones::existeCadenaArrayOrderBy(cuenta_corriente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getcuenta_corrientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_corriente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cuenta_corriente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getcuenta_corrientes() as $cuenta_corriente) {
						$row=cuenta_corriente_util::getDataReportRow('RELACIONADO',$cuenta_corriente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//producto
				if(Funciones::existeCadenaArrayOrderBy(producto_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getproductos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(producto_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=producto_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getproductos() as $producto) {
						$row=producto_util::getDataReportRow('RELACIONADO',$producto,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//instrumento_pago
				if(Funciones::existeCadenaArrayOrderBy(instrumento_pago_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getinstrumento_pagos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(instrumento_pago_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=instrumento_pago_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getinstrumento_pagos() as $instrumento_pago) {
						$row=instrumento_pago_util::getDataReportRow('RELACIONADO',$instrumento_pago,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//lista_producto
				if(Funciones::existeCadenaArrayOrderBy(lista_producto_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getlista_productos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(lista_producto_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=lista_producto_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getlista_productos() as $lista_producto) {
						$row=lista_producto_util::getDataReportRow('RELACIONADO',$lista_producto,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//asiento_detalle
				if(Funciones::existeCadenaArrayOrderBy(asiento_detalle_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getasiento_detalles())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_detalle_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getasiento_detalles() as $asiento_detalle) {
						$row=asiento_detalle_util::getDataReportRow('RELACIONADO',$asiento_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//retencion
				if(Funciones::existeCadenaArrayOrderBy(retencion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getretencions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(retencion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=retencion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getretencions() as $retencion) {
						$row=retencion_util::getDataReportRow('RELACIONADO',$retencion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//retencion_fuente
				if(Funciones::existeCadenaArrayOrderBy(retencion_fuente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getretencion_fuentes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(retencion_fuente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=retencion_fuente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getretencion_fuentes() as $retencion_fuente) {
						$row=retencion_fuente_util::getDataReportRow('RELACIONADO',$retencion_fuente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//cuenta
				if(Funciones::existeCadenaArrayOrderBy(cuenta_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getcuentas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cuenta_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getcuentas() as $cuenta) {
						$row=cuenta_util::getDataReportRow('RELACIONADO',$cuenta,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//proveedor
				if(Funciones::existeCadenaArrayOrderBy(proveedor_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getproveedors())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(proveedor_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getproveedors() as $proveedor) {
						$row=proveedor_util::getDataReportRow('RELACIONADO',$proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//forma_pago_cliente
				if(Funciones::existeCadenaArrayOrderBy(forma_pago_cliente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getforma_pago_clientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(forma_pago_cliente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=forma_pago_cliente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getforma_pago_clientes() as $forma_pago_cliente) {
						$row=forma_pago_cliente_util::getDataReportRow('RELACIONADO',$forma_pago_cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//saldo_cuenta
				if(Funciones::existeCadenaArrayOrderBy(saldo_cuenta_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getsaldo_cuentas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(saldo_cuenta_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=saldo_cuenta_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getsaldo_cuentas() as $saldo_cuenta) {
						$row=saldo_cuenta_util::getDataReportRow('RELACIONADO',$saldo_cuenta,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//termino_pago_proveedor
				if(Funciones::existeCadenaArrayOrderBy(termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->gettermino_pago_proveedors())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=termino_pago_proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->gettermino_pago_proveedors() as $termino_pago_proveedor) {
						$row=termino_pago_proveedor_util::getDataReportRow('RELACIONADO',$termino_pago_proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//retencion_ica
				if(Funciones::existeCadenaArrayOrderBy(retencion_ica_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getretencion_icas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(retencion_ica_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=retencion_ica_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getretencion_icas() as $retencion_ica) {
						$row=retencion_ica_util::getDataReportRow('RELACIONADO',$retencion_ica,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//asiento_predefinido_detalle
				if(Funciones::existeCadenaArrayOrderBy(asiento_predefinido_detalle_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getasiento_predefinido_detalles())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_predefinido_detalle_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_predefinido_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getasiento_predefinido_detalles() as $asiento_predefinido_detalle) {
						$row=asiento_predefinido_detalle_util::getDataReportRow('RELACIONADO',$asiento_predefinido_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//cliente
				if(Funciones::existeCadenaArrayOrderBy(cliente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getclientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cliente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cliente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getclientes() as $cliente) {
						$row=cliente_util::getDataReportRow('RELACIONADO',$cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//asiento_automatico_detalle
				if(Funciones::existeCadenaArrayOrderBy(asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getasiento_automatico_detalles())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=asiento_automatico_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getasiento_automatico_detalles() as $asiento_automatico_detalle) {
						$row=asiento_automatico_detalle_util::getDataReportRow('RELACIONADO',$asiento_automatico_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//forma_pago_proveedor
				if(Funciones::existeCadenaArrayOrderBy(forma_pago_proveedor_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->getforma_pago_proveedors())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(forma_pago_proveedor_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=forma_pago_proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->getforma_pago_proveedors() as $forma_pago_proveedor) {
						$row=forma_pago_proveedor_util::getDataReportRow('RELACIONADO',$forma_pago_proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//termino_pago_cliente
				if(Funciones::existeCadenaArrayOrderBy(termino_pago_cliente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cuenta->gettermino_pago_clientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(termino_pago_cliente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=termino_pago_cliente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cuenta->gettermino_pago_clientes() as $termino_pago_cliente) {
						$row=termino_pago_cliente_util::getDataReportRow('RELACIONADO',$termino_pago_cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->cuentasAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuentasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->cuentasAuxiliar)<=0) {
					$this->cuentasAuxiliar=$this->cuentas;
				}
			} else {
				$this->cuentasAuxiliar=$this->cuentas;
			}
		/*} else {
			$this->cuentasAuxiliar=$this->cuentasReporte;	
		}*/
		
		foreach ($this->cuentasAuxiliar as $cuenta) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_util::getcuentaDescripcion($cuenta),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getid_tipo_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Tipo Nivel Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Nivel Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getid_tipo_nivel_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getid_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nivel Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nivel Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getnivel_cuenta(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Usa Monto Minimo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usa Monto Minimo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getusa_monto_base(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto Minimo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Minimo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getmonto_base(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Porcentaje Minimo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Porcentaje Minimo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getporcentaje_base(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Centro Costos',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Centro Costos',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getcon_centro_costos(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ruc',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ruc',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getcon_ruc(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Balance',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getbalance(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Con Retencion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Retencion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getcon_retencion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Valor Retencion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Valor Retencion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getvalor_retencion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ultima Transaccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ultima Transaccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cuenta->getultima_transaccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface cuenta_base_controlI {			
		
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
		public function getIndiceActual(cuenta $cuenta,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(cuenta $cuenta,array $cuentas);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cuenta_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $cuentas,cuenta $cuenta);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(cuenta_param_return $cuentaReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(cuenta_session $cuenta_session);		
		public function actualizarInvitadoSessionDivStyleVariables(cuenta_session $cuenta_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(cuenta $cuentaOrigen,cuenta $cuenta,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(cuenta_control $cuenta_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $cuentas=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(cuenta_session $cuenta_session);		
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
		public function getHtmlTablaDatosResumen(array $cuentas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $cuentas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(cuenta $cuenta=null) : string;
		
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
