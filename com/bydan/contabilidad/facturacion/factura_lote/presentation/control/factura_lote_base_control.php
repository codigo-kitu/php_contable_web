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

namespace com\bydan\contabilidad\facturacion\factura_lote\presentation\control;

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

use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/factura_lote/util/factura_lote_carga.php');
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_param_return;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote\presentation\session\factura_lote_session;


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

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

//REL


use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_carga;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_util;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\presentation\session\factura_lote_detalle_session;

use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_util;
use com\bydan\contabilidad\facturacion\factura_modelo\presentation\session\factura_modelo_session;


/*CARGA ARCHIVOS FRAMEWORK*/
factura_lote_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
factura_lote_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
factura_lote_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class factura_lote_base_control extends factura_lote_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->factura_loteClase==null) {		
				$this->factura_loteClase=new factura_lote();
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
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_vendedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_vendedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_termino_pago',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_moneda')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_moneda',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_estado',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_asiento')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_asiento',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_documento_cuenta_cobrar')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_documento_cuenta_cobrar',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_kardex')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_kardex',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->factura_loteClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->factura_loteClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->factura_loteClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->factura_loteClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->factura_loteClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->factura_loteClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->factura_loteClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->factura_loteClase->setnumero($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero'));
				
				$this->factura_loteClase->setid_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cliente'));
				
				$this->factura_loteClase->setruc($this->getDataCampoFormTabla('form'.$this->strSufijo,'ruc'));
				
				$this->factura_loteClase->setreferencia_cliente($this->getDataCampoFormTabla('form'.$this->strSufijo,'referencia_cliente'));
				
				$this->factura_loteClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->factura_loteClase->setid_vendedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_vendedor'));
				
				$this->factura_loteClase->setid_termino_pago((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago'));
				
				$this->factura_loteClase->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_vence')));
				
				$this->factura_loteClase->setcotizacion((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cotizacion'));
				
				$this->factura_loteClase->setid_moneda((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_moneda'));
				
				$this->factura_loteClase->setid_estado((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado'));
				
				$this->factura_loteClase->setdireccion($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion'));
				
				$this->factura_loteClase->setenviar_a($this->getDataCampoFormTabla('form'.$this->strSufijo,'enviar_a'));
				
				$this->factura_loteClase->setobservacion($this->getDataCampoFormTabla('form'.$this->strSufijo,'observacion'));
				
				$this->factura_loteClase->setimpuesto_en_precio(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto_en_precio')));
				
				$this->factura_loteClase->setsub_total((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'sub_total'));
				
				$this->factura_loteClase->setdescuento_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_monto'));
				
				$this->factura_loteClase->setdescuento_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_porciento'));
				
				$this->factura_loteClase->setiva_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'iva_monto'));
				
				$this->factura_loteClase->setiva_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'iva_porciento'));
				
				$this->factura_loteClase->setretencion_fuente_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_fuente_monto'));
				
				$this->factura_loteClase->setretencion_fuente_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_fuente_porciento'));
				
				$this->factura_loteClase->setretencion_iva_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_iva_monto'));
				
				$this->factura_loteClase->setretencion_iva_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_iva_porciento'));
				
				$this->factura_loteClase->settotal((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'total'));
				
				$this->factura_loteClase->setotro_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'otro_monto'));
				
				$this->factura_loteClase->setotro_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'otro_porciento'));
				
				$this->factura_loteClase->sethora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'hora')));
				
				$this->factura_loteClase->setretencion_ica_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_ica_monto'));
				
				$this->factura_loteClase->setretencion_ica_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_ica_porciento'));
				
				$this->factura_loteClase->setid_asiento((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_asiento'));
				
				$this->factura_loteClase->setid_documento_cuenta_cobrar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_documento_cuenta_cobrar'));
				
				$this->factura_loteClase->setid_kardex((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_kardex'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->factura_loteModel->set($this->factura_loteClase);
				
				/*$this->factura_loteModel->set($this->migrarModelfactura_lote($this->factura_loteClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->factura_loteLogic->getfactura_lote()->setId($this->factura_loteClase->getId());	
			$this->factura_loteLogic->getfactura_lote()->setVersionRow($this->factura_loteClase->getVersionRow());	
			$this->factura_loteLogic->getfactura_lote()->setVersionRow($this->factura_loteClase->getVersionRow());	
			$this->factura_loteLogic->getfactura_lote()->setid_empresa($this->factura_loteClase->getid_empresa());	
			$this->factura_loteLogic->getfactura_lote()->setid_sucursal($this->factura_loteClase->getid_sucursal());	
			$this->factura_loteLogic->getfactura_lote()->setid_ejercicio($this->factura_loteClase->getid_ejercicio());	
			$this->factura_loteLogic->getfactura_lote()->setid_periodo($this->factura_loteClase->getid_periodo());	
			$this->factura_loteLogic->getfactura_lote()->setid_usuario($this->factura_loteClase->getid_usuario());	
			$this->factura_loteLogic->getfactura_lote()->setnumero($this->factura_loteClase->getnumero());	
			$this->factura_loteLogic->getfactura_lote()->setid_cliente($this->factura_loteClase->getid_cliente());	
			$this->factura_loteLogic->getfactura_lote()->setruc($this->factura_loteClase->getruc());	
			$this->factura_loteLogic->getfactura_lote()->setreferencia_cliente($this->factura_loteClase->getreferencia_cliente());	
			$this->factura_loteLogic->getfactura_lote()->setfecha_emision($this->factura_loteClase->getfecha_emision());	
			$this->factura_loteLogic->getfactura_lote()->setid_vendedor($this->factura_loteClase->getid_vendedor());	
			$this->factura_loteLogic->getfactura_lote()->setid_termino_pago($this->factura_loteClase->getid_termino_pago());	
			$this->factura_loteLogic->getfactura_lote()->setfecha_vence($this->factura_loteClase->getfecha_vence());	
			$this->factura_loteLogic->getfactura_lote()->setcotizacion($this->factura_loteClase->getcotizacion());	
			$this->factura_loteLogic->getfactura_lote()->setid_moneda($this->factura_loteClase->getid_moneda());	
			$this->factura_loteLogic->getfactura_lote()->setid_estado($this->factura_loteClase->getid_estado());	
			$this->factura_loteLogic->getfactura_lote()->setdireccion($this->factura_loteClase->getdireccion());	
			$this->factura_loteLogic->getfactura_lote()->setenviar_a($this->factura_loteClase->getenviar_a());	
			$this->factura_loteLogic->getfactura_lote()->setobservacion($this->factura_loteClase->getobservacion());	
			$this->factura_loteLogic->getfactura_lote()->setimpuesto_en_precio($this->factura_loteClase->getimpuesto_en_precio());	
			$this->factura_loteLogic->getfactura_lote()->setsub_total($this->factura_loteClase->getsub_total());	
			$this->factura_loteLogic->getfactura_lote()->setdescuento_monto($this->factura_loteClase->getdescuento_monto());	
			$this->factura_loteLogic->getfactura_lote()->setdescuento_porciento($this->factura_loteClase->getdescuento_porciento());	
			$this->factura_loteLogic->getfactura_lote()->setiva_monto($this->factura_loteClase->getiva_monto());	
			$this->factura_loteLogic->getfactura_lote()->setiva_porciento($this->factura_loteClase->getiva_porciento());	
			$this->factura_loteLogic->getfactura_lote()->setretencion_fuente_monto($this->factura_loteClase->getretencion_fuente_monto());	
			$this->factura_loteLogic->getfactura_lote()->setretencion_fuente_porciento($this->factura_loteClase->getretencion_fuente_porciento());	
			$this->factura_loteLogic->getfactura_lote()->setretencion_iva_monto($this->factura_loteClase->getretencion_iva_monto());	
			$this->factura_loteLogic->getfactura_lote()->setretencion_iva_porciento($this->factura_loteClase->getretencion_iva_porciento());	
			$this->factura_loteLogic->getfactura_lote()->settotal($this->factura_loteClase->gettotal());	
			$this->factura_loteLogic->getfactura_lote()->setotro_monto($this->factura_loteClase->getotro_monto());	
			$this->factura_loteLogic->getfactura_lote()->setotro_porciento($this->factura_loteClase->getotro_porciento());	
			$this->factura_loteLogic->getfactura_lote()->sethora($this->factura_loteClase->gethora());	
			$this->factura_loteLogic->getfactura_lote()->setretencion_ica_monto($this->factura_loteClase->getretencion_ica_monto());	
			$this->factura_loteLogic->getfactura_lote()->setretencion_ica_porciento($this->factura_loteClase->getretencion_ica_porciento());	
			$this->factura_loteLogic->getfactura_lote()->setid_asiento($this->factura_loteClase->getid_asiento());	
			$this->factura_loteLogic->getfactura_lote()->setid_documento_cuenta_cobrar($this->factura_loteClase->getid_documento_cuenta_cobrar());	
			$this->factura_loteLogic->getfactura_lote()->setid_kardex($this->factura_loteClase->getid_kardex());	
		} else {
			$this->factura_loteClase->setId($this->factura_loteLogic->getfactura_lote()->getId());	
			$this->factura_loteClase->setVersionRow($this->factura_loteLogic->getfactura_lote()->getVersionRow());	
			$this->factura_loteClase->setVersionRow($this->factura_loteLogic->getfactura_lote()->getVersionRow());	
			$this->factura_loteClase->setid_empresa($this->factura_loteLogic->getfactura_lote()->getid_empresa());	
			$this->factura_loteClase->setid_sucursal($this->factura_loteLogic->getfactura_lote()->getid_sucursal());	
			$this->factura_loteClase->setid_ejercicio($this->factura_loteLogic->getfactura_lote()->getid_ejercicio());	
			$this->factura_loteClase->setid_periodo($this->factura_loteLogic->getfactura_lote()->getid_periodo());	
			$this->factura_loteClase->setid_usuario($this->factura_loteLogic->getfactura_lote()->getid_usuario());	
			$this->factura_loteClase->setnumero($this->factura_loteLogic->getfactura_lote()->getnumero());	
			$this->factura_loteClase->setid_cliente($this->factura_loteLogic->getfactura_lote()->getid_cliente());	
			$this->factura_loteClase->setruc($this->factura_loteLogic->getfactura_lote()->getruc());	
			$this->factura_loteClase->setreferencia_cliente($this->factura_loteLogic->getfactura_lote()->getreferencia_cliente());	
			$this->factura_loteClase->setfecha_emision($this->factura_loteLogic->getfactura_lote()->getfecha_emision());	
			$this->factura_loteClase->setid_vendedor($this->factura_loteLogic->getfactura_lote()->getid_vendedor());	
			$this->factura_loteClase->setid_termino_pago($this->factura_loteLogic->getfactura_lote()->getid_termino_pago());	
			$this->factura_loteClase->setfecha_vence($this->factura_loteLogic->getfactura_lote()->getfecha_vence());	
			$this->factura_loteClase->setcotizacion($this->factura_loteLogic->getfactura_lote()->getcotizacion());	
			$this->factura_loteClase->setid_moneda($this->factura_loteLogic->getfactura_lote()->getid_moneda());	
			$this->factura_loteClase->setid_estado($this->factura_loteLogic->getfactura_lote()->getid_estado());	
			$this->factura_loteClase->setdireccion($this->factura_loteLogic->getfactura_lote()->getdireccion());	
			$this->factura_loteClase->setenviar_a($this->factura_loteLogic->getfactura_lote()->getenviar_a());	
			$this->factura_loteClase->setobservacion($this->factura_loteLogic->getfactura_lote()->getobservacion());	
			$this->factura_loteClase->setimpuesto_en_precio($this->factura_loteLogic->getfactura_lote()->getimpuesto_en_precio());	
			$this->factura_loteClase->setsub_total($this->factura_loteLogic->getfactura_lote()->getsub_total());	
			$this->factura_loteClase->setdescuento_monto($this->factura_loteLogic->getfactura_lote()->getdescuento_monto());	
			$this->factura_loteClase->setdescuento_porciento($this->factura_loteLogic->getfactura_lote()->getdescuento_porciento());	
			$this->factura_loteClase->setiva_monto($this->factura_loteLogic->getfactura_lote()->getiva_monto());	
			$this->factura_loteClase->setiva_porciento($this->factura_loteLogic->getfactura_lote()->getiva_porciento());	
			$this->factura_loteClase->setretencion_fuente_monto($this->factura_loteLogic->getfactura_lote()->getretencion_fuente_monto());	
			$this->factura_loteClase->setretencion_fuente_porciento($this->factura_loteLogic->getfactura_lote()->getretencion_fuente_porciento());	
			$this->factura_loteClase->setretencion_iva_monto($this->factura_loteLogic->getfactura_lote()->getretencion_iva_monto());	
			$this->factura_loteClase->setretencion_iva_porciento($this->factura_loteLogic->getfactura_lote()->getretencion_iva_porciento());	
			$this->factura_loteClase->settotal($this->factura_loteLogic->getfactura_lote()->gettotal());	
			$this->factura_loteClase->setotro_monto($this->factura_loteLogic->getfactura_lote()->getotro_monto());	
			$this->factura_loteClase->setotro_porciento($this->factura_loteLogic->getfactura_lote()->getotro_porciento());	
			$this->factura_loteClase->sethora($this->factura_loteLogic->getfactura_lote()->gethora());	
			$this->factura_loteClase->setretencion_ica_monto($this->factura_loteLogic->getfactura_lote()->getretencion_ica_monto());	
			$this->factura_loteClase->setretencion_ica_porciento($this->factura_loteLogic->getfactura_lote()->getretencion_ica_porciento());	
			$this->factura_loteClase->setid_asiento($this->factura_loteLogic->getfactura_lote()->getid_asiento());	
			$this->factura_loteClase->setid_documento_cuenta_cobrar($this->factura_loteLogic->getfactura_lote()->getid_documento_cuenta_cobrar());	
			$this->factura_loteClase->setid_kardex($this->factura_loteLogic->getfactura_lote()->getid_kardex());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->factura_loteModel->invalidFieldsMe();
		
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
		if($strNombreCampo=='numero') {$this->strMensajenumero=$strMensajeCampo;}
		if($strNombreCampo=='id_cliente') {$this->strMensajeid_cliente=$strMensajeCampo;}
		if($strNombreCampo=='ruc') {$this->strMensajeruc=$strMensajeCampo;}
		if($strNombreCampo=='referencia_cliente') {$this->strMensajereferencia_cliente=$strMensajeCampo;}
		if($strNombreCampo=='fecha_emision') {$this->strMensajefecha_emision=$strMensajeCampo;}
		if($strNombreCampo=='id_vendedor') {$this->strMensajeid_vendedor=$strMensajeCampo;}
		if($strNombreCampo=='id_termino_pago') {$this->strMensajeid_termino_pago=$strMensajeCampo;}
		if($strNombreCampo=='fecha_vence') {$this->strMensajefecha_vence=$strMensajeCampo;}
		if($strNombreCampo=='cotizacion') {$this->strMensajecotizacion=$strMensajeCampo;}
		if($strNombreCampo=='id_moneda') {$this->strMensajeid_moneda=$strMensajeCampo;}
		if($strNombreCampo=='id_estado') {$this->strMensajeid_estado=$strMensajeCampo;}
		if($strNombreCampo=='direccion') {$this->strMensajedireccion=$strMensajeCampo;}
		if($strNombreCampo=='enviar_a') {$this->strMensajeenviar_a=$strMensajeCampo;}
		if($strNombreCampo=='observacion') {$this->strMensajeobservacion=$strMensajeCampo;}
		if($strNombreCampo=='impuesto_en_precio') {$this->strMensajeimpuesto_en_precio=$strMensajeCampo;}
		if($strNombreCampo=='sub_total') {$this->strMensajesub_total=$strMensajeCampo;}
		if($strNombreCampo=='descuento_monto') {$this->strMensajedescuento_monto=$strMensajeCampo;}
		if($strNombreCampo=='descuento_porciento') {$this->strMensajedescuento_porciento=$strMensajeCampo;}
		if($strNombreCampo=='iva_monto') {$this->strMensajeiva_monto=$strMensajeCampo;}
		if($strNombreCampo=='iva_porciento') {$this->strMensajeiva_porciento=$strMensajeCampo;}
		if($strNombreCampo=='retencion_fuente_monto') {$this->strMensajeretencion_fuente_monto=$strMensajeCampo;}
		if($strNombreCampo=='retencion_fuente_porciento') {$this->strMensajeretencion_fuente_porciento=$strMensajeCampo;}
		if($strNombreCampo=='retencion_iva_monto') {$this->strMensajeretencion_iva_monto=$strMensajeCampo;}
		if($strNombreCampo=='retencion_iva_porciento') {$this->strMensajeretencion_iva_porciento=$strMensajeCampo;}
		if($strNombreCampo=='total') {$this->strMensajetotal=$strMensajeCampo;}
		if($strNombreCampo=='otro_monto') {$this->strMensajeotro_monto=$strMensajeCampo;}
		if($strNombreCampo=='otro_porciento') {$this->strMensajeotro_porciento=$strMensajeCampo;}
		if($strNombreCampo=='hora') {$this->strMensajehora=$strMensajeCampo;}
		if($strNombreCampo=='retencion_ica_monto') {$this->strMensajeretencion_ica_monto=$strMensajeCampo;}
		if($strNombreCampo=='retencion_ica_porciento') {$this->strMensajeretencion_ica_porciento=$strMensajeCampo;}
		if($strNombreCampo=='id_asiento') {$this->strMensajeid_asiento=$strMensajeCampo;}
		if($strNombreCampo=='id_documento_cuenta_cobrar') {$this->strMensajeid_documento_cuenta_cobrar=$strMensajeCampo;}
		if($strNombreCampo=='id_kardex') {$this->strMensajeid_kardex=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajenumero='';
		$this->strMensajeid_cliente='';
		$this->strMensajeruc='';
		$this->strMensajereferencia_cliente='';
		$this->strMensajefecha_emision='';
		$this->strMensajeid_vendedor='';
		$this->strMensajeid_termino_pago='';
		$this->strMensajefecha_vence='';
		$this->strMensajecotizacion='';
		$this->strMensajeid_moneda='';
		$this->strMensajeid_estado='';
		$this->strMensajedireccion='';
		$this->strMensajeenviar_a='';
		$this->strMensajeobservacion='';
		$this->strMensajeimpuesto_en_precio='';
		$this->strMensajesub_total='';
		$this->strMensajedescuento_monto='';
		$this->strMensajedescuento_porciento='';
		$this->strMensajeiva_monto='';
		$this->strMensajeiva_porciento='';
		$this->strMensajeretencion_fuente_monto='';
		$this->strMensajeretencion_fuente_porciento='';
		$this->strMensajeretencion_iva_monto='';
		$this->strMensajeretencion_iva_porciento='';
		$this->strMensajetotal='';
		$this->strMensajeotro_monto='';
		$this->strMensajeotro_porciento='';
		$this->strMensajehora='';
		$this->strMensajeretencion_ica_monto='';
		$this->strMensajeretencion_ica_porciento='';
		$this->strMensajeid_asiento='';
		$this->strMensajeid_documento_cuenta_cobrar='';
		$this->strMensajeid_kardex='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
						
			if($factura_lote_session==null) {
				$factura_lote_session=new factura_lote_session();
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
						$this->factura_loteLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->factura_loteActual =$this->factura_loteClase;
			
			/*$this->factura_loteActual =$this->migrarModelfactura_lote($this->factura_loteClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->factura_loteLogic->getfactura_lotes(),$this->factura_loteActual);
			
			$this->actualizarControllerConReturnGeneral($this->factura_loteReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
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
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$factura_lotesLocal=$this->getListaActual();
		
		$iIndice=factura_lote_util::getIndiceNuevo($factura_lotesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(factura_lote $factura_lote,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$factura_lotesLocal=$this->getListaActual();
		
		$iIndice=factura_lote_util::getIndiceActual($factura_lotesLocal,$factura_lote,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevofactura_lote')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->factura_loteActual =$this->factura_loteClase;
			
			/*$this->factura_loteActual =$this->migrarModelfactura_lote($this->factura_loteClase);*/
			
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
			
			$this->factura_loteLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago');$classes[]=$class;
				$class=new Classe('moneda');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				$class=new Classe('asiento');$classes[]=$class;
				$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
				$class=new Classe('kardex');$classes[]=$class;
			
			$this->factura_loteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->factura_loteLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->factura_loteLogic->setfactura_lote(new factura_lote());
				
				$this->factura_loteLogic->getfactura_lote()->setIsNew(true);
				$this->factura_loteLogic->getfactura_lote()->setIsChanged(true);
				$this->factura_loteLogic->getfactura_lote()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->factura_loteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->factura_loteLogic->factura_lotes[]=$this->factura_loteLogic->getfactura_lote();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->factura_loteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotedetalles=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME.'Lista'));
							$facturalotedetallesEliminados=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotedetalles=array_merge($facturalotedetalles,$facturalotedetallesEliminados);
							factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_modelo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturamodelos=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME.'Lista'));
							$facturamodelosEliminados=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturamodelos=array_merge($facturamodelos,$facturamodelosEliminados);
							
							$this->factura_loteLogic->saveRelaciones($this->factura_loteLogic->getfactura_lote(),$facturalotedetalles,$facturamodelos);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->factura_loteLogic->getfactura_lote()->setIsChanged(true);
				$this->factura_loteLogic->getfactura_lote()->setIsNew(false);
				$this->factura_loteLogic->getfactura_lote()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->factura_loteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->factura_loteLogic->getfactura_lote(),$this->factura_loteLogic->getfactura_lotes());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->factura_loteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotedetalles=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME.'Lista'));
							$facturalotedetallesEliminados=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotedetalles=array_merge($facturalotedetalles,$facturalotedetallesEliminados);
							factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_modelo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturamodelos=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME.'Lista'));
							$facturamodelosEliminados=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturamodelos=array_merge($facturamodelos,$facturamodelosEliminados);
							
							$this->factura_loteLogic->saveRelaciones($this->factura_loteLogic->getfactura_lote(),$facturalotedetalles,$facturamodelos);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->factura_loteLogic->getfactura_lote()->setIsDeleted(true);
				$this->factura_loteLogic->getfactura_lote()->setIsNew(false);
				$this->factura_loteLogic->getfactura_lote()->setIsChanged(false);				
				
				$this->actualizarLista($this->factura_loteLogic->getfactura_lote(),$this->factura_loteLogic->getfactura_lotes());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->factura_loteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotedetalles=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME.'Lista'));
							$facturalotedetallesEliminados=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotedetalles=array_merge($facturalotedetalles,$facturalotedetallesEliminados);

							foreach($facturalotedetalles as $facturalotedetalle1) {
								$facturalotedetalle1->setIsDeleted(true);
							}
							factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_modelo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturamodelos=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME.'Lista'));
							$facturamodelosEliminados=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturamodelos=array_merge($facturamodelos,$facturamodelosEliminados);

							foreach($facturamodelos as $facturamodelo1) {
								$facturamodelo1->setIsDeleted(true);
							}
							
						$this->factura_loteLogic->saveRelaciones($this->factura_loteLogic->getfactura_lote(),$facturalotedetalles,$facturamodelos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->factura_lotesEliminados[]=$this->factura_loteLogic->getfactura_lote();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->factura_loteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_lote_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturalotedetalles=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME.'Lista'));
							$facturalotedetallesEliminados=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturalotedetalles=array_merge($facturalotedetalles,$facturalotedetallesEliminados);
							factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_modelo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturamodelos=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME.'Lista'));
							$facturamodelosEliminados=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturamodelos=array_merge($facturamodelos,$facturamodelosEliminados);
							
						$this->factura_loteLogic->saveRelaciones($this->factura_loteLogic->getfactura_lote(),$facturalotedetalles,$facturamodelos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->factura_lotesEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->factura_loteLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->factura_loteLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->factura_lotesEliminados=array();
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
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago');$classes[]=$class;
				$class=new Classe('moneda');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				$class=new Classe('asiento');$classes[]=$class;
				$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
				$class=new Classe('kardex');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->factura_loteLogic->setfactura_lotes();*/
					
					$this->factura_loteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->factura_loteLogic->setIsConDeepLoad(false);
			
			$this->factura_lotes=$this->factura_loteLogic->getfactura_lotes();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(factura_lote_util::$STR_SESSION_NAME.'Lista',serialize($this->factura_lotes));
				$this->Session->write(factura_lote_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->factura_lotesEliminados));
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalfactura_lote;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->factura_loteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->factura_lotes as $factura_loteLocal) {
				if($this->factura_loteLogic->getfactura_lote()->getId()==$factura_loteLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->factura_loteLogic->getfactura_lote()->setIsDeleted(true);
			$this->factura_lotesEliminados[]=$this->factura_loteLogic->getfactura_lote();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->factura_lotes[$indice]);
				
				$this->factura_lotes = array_values($this->factura_lotes);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelfactura_lote($this->factura_loteClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(factura_lote $factura_lote,array $factura_lotes) {
		try {
			foreach($factura_lotes as $factura_loteLocal){ 
				if($factura_loteLocal->getId()==$factura_lote->getId()) {
					$factura_loteLocal->setIsChanged($factura_lote->getIsChanged());
					$factura_loteLocal->setIsNew($factura_lote->getIsNew());
					$factura_loteLocal->setIsDeleted($factura_lote->getIsDeleted());
					//$factura_loteLocal->setbitExpired($factura_lote->getbitExpired());
					
					$factura_loteLocal->setId($factura_lote->getId());	
					$factura_loteLocal->setVersionRow($factura_lote->getVersionRow());	
					$factura_loteLocal->setVersionRow($factura_lote->getVersionRow());	
					$factura_loteLocal->setid_empresa($factura_lote->getid_empresa());	
					$factura_loteLocal->setid_sucursal($factura_lote->getid_sucursal());	
					$factura_loteLocal->setid_ejercicio($factura_lote->getid_ejercicio());	
					$factura_loteLocal->setid_periodo($factura_lote->getid_periodo());	
					$factura_loteLocal->setid_usuario($factura_lote->getid_usuario());	
					$factura_loteLocal->setnumero($factura_lote->getnumero());	
					$factura_loteLocal->setid_cliente($factura_lote->getid_cliente());	
					$factura_loteLocal->setruc($factura_lote->getruc());	
					$factura_loteLocal->setreferencia_cliente($factura_lote->getreferencia_cliente());	
					$factura_loteLocal->setfecha_emision($factura_lote->getfecha_emision());	
					$factura_loteLocal->setid_vendedor($factura_lote->getid_vendedor());	
					$factura_loteLocal->setid_termino_pago($factura_lote->getid_termino_pago());	
					$factura_loteLocal->setfecha_vence($factura_lote->getfecha_vence());	
					$factura_loteLocal->setcotizacion($factura_lote->getcotizacion());	
					$factura_loteLocal->setid_moneda($factura_lote->getid_moneda());	
					$factura_loteLocal->setid_estado($factura_lote->getid_estado());	
					$factura_loteLocal->setdireccion($factura_lote->getdireccion());	
					$factura_loteLocal->setenviar_a($factura_lote->getenviar_a());	
					$factura_loteLocal->setobservacion($factura_lote->getobservacion());	
					$factura_loteLocal->setimpuesto_en_precio($factura_lote->getimpuesto_en_precio());	
					$factura_loteLocal->setsub_total($factura_lote->getsub_total());	
					$factura_loteLocal->setdescuento_monto($factura_lote->getdescuento_monto());	
					$factura_loteLocal->setdescuento_porciento($factura_lote->getdescuento_porciento());	
					$factura_loteLocal->setiva_monto($factura_lote->getiva_monto());	
					$factura_loteLocal->setiva_porciento($factura_lote->getiva_porciento());	
					$factura_loteLocal->setretencion_fuente_monto($factura_lote->getretencion_fuente_monto());	
					$factura_loteLocal->setretencion_fuente_porciento($factura_lote->getretencion_fuente_porciento());	
					$factura_loteLocal->setretencion_iva_monto($factura_lote->getretencion_iva_monto());	
					$factura_loteLocal->setretencion_iva_porciento($factura_lote->getretencion_iva_porciento());	
					$factura_loteLocal->settotal($factura_lote->gettotal());	
					$factura_loteLocal->setotro_monto($factura_lote->getotro_monto());	
					$factura_loteLocal->setotro_porciento($factura_lote->getotro_porciento());	
					$factura_loteLocal->sethora($factura_lote->gethora());	
					$factura_loteLocal->setretencion_ica_monto($factura_lote->getretencion_ica_monto());	
					$factura_loteLocal->setretencion_ica_porciento($factura_lote->getretencion_ica_porciento());	
					$factura_loteLocal->setid_asiento($factura_lote->getid_asiento());	
					$factura_loteLocal->setid_documento_cuenta_cobrar($factura_lote->getid_documento_cuenta_cobrar());	
					$factura_loteLocal->setid_kardex($factura_lote->getid_kardex());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$factura_lotesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$factura_lotesLocal=$this->factura_loteLogic->getfactura_lotes();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$factura_lotesLocal=$this->factura_lotes;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $factura_lotesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->factura_loteLogic->getfactura_lotes() as $factura_lote) {
				if($factura_lote->getId()==$id) {
					$this->factura_loteLogic->setfactura_lote($factura_lote);
					
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
		/*$factura_lotesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->factura_lotes as $factura_lote) {
			$factura_lote->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->factura_lotes[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : factura_lote_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
						
		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
		
		
		$this->factura_loteReturnGeneral=new factura_lote_param_return();
		$this->factura_loteParameterGeneral=new factura_lote_param_return();
			
		$this->factura_loteParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualfactura_lote(this.factura_lote,true);
			this.setVariablesFormularioToObjetoActualForeignKeysfactura_lote(this.factura_lote);*/
			
			if($factura_lote_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualfactura_lote(this.factura_lote,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->factura_loteActual=$this->factura_loteClase;
				
				$this->setCopiarVariablesObjetos($this->factura_loteActual,$this->factura_lote,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->factura_loteReturnGeneral=$this->factura_loteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->factura_loteLogic->getfactura_lotes(),$this->factura_lote,$this->factura_loteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($factura_lote_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanfactura_lote($classes,$this->factura_loteReturnGeneral,$this->factura_loteBean,false);*/
				}
					
				if($this->factura_loteReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->factura_loteReturnGeneral->getfactura_lote(),$this->factura_loteActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyfactura_lote($this->factura_loteReturnGeneral->getfactura_lote());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariofactura_lote($this->factura_loteReturnGeneral->getfactura_lote());*/
				}
					
				if($this->factura_loteReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->factura_loteReturnGeneral->getfactura_lote(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->factura_lote,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(factura_loteJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualfactura_lote(this.factura_lote,true);
				this.setVariablesFormularioToObjetoActualForeignKeysfactura_lote(this.factura_lote);				
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
				
				if($this->factura_loteAnterior!=null) {
					$this->factura_lote=$this->factura_loteAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->factura_loteReturnGeneral=$this->factura_loteLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->factura_loteLogic->getfactura_lotes(),$this->factura_lote,$this->factura_loteParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->factura_loteReturnGeneral->getfactura_lote(),$this->factura_loteLogic->getfactura_lotes());
			*/
		}
		
		return $this->factura_loteReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}

			$this->factura_loteReturnGeneral=new factura_lote_param_return();			
			$this->factura_loteParameterGeneral=new factura_lote_param_return();
			
			$this->factura_loteParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->factura_loteReturnGeneral=$this->factura_loteLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->factura_lotes,$this->factura_loteParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->factura_loteReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->factura_loteReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->factura_loteReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
		
		$this->factura_loteReturnGeneral=new factura_lote_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_factura_lote') {
		    $sDominio='factura_lote';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		if($sTipoControl=='id_cliente' || $sTipoControl=='form-id_cliente' || $sTipoControl=='form_factura_lote-id_cliente') {
			$sDominio='factura_lote';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$COMBOBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='COMBOBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->factura_loteReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->factura_loteReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='factura_lote';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='factura_lote';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='factura_lote';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->factura_loteReturnGeneral=new factura_lote_param_return();
		$this->factura_loteParameterGeneral=new factura_lote_param_return();
			
		$this->factura_loteParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->factura_loteReturnGeneral=$this->factura_loteLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->factura_loteLogic->getfactura_lotes(),$this->factura_lote,$this->factura_loteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->factura_loteReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->factura_loteReturnGeneral->getfactura_lote(),$classes);*/
		}									
	
		if($this->factura_loteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->factura_loteReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->factura_loteReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $factura_lotes,factura_lote $factura_lote) {
		
		$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
						
		if($factura_lote_session==null) {
			$factura_lote_session=new factura_lote_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(factura_lote_util::$CLASSNAME);
			}	
			*/
			
			$this->factura_loteReturnGeneral=new factura_lote_param_return();
			$this->factura_loteParameterGeneral=new factura_lote_param_return();
			
			$this->factura_loteParameterGeneral->setdata($this->data);
		
		
			
			if($factura_lote_session->conGuardarRelaciones) {
				$classes[]=factura_lote_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
			}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->factura_loteActual,$this->factura_lote,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->factura_loteReturnGeneral=$this->factura_loteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->factura_loteLogic->getfactura_lotes(),$this->factura_loteActual,$this->factura_loteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->factura_loteReturnGeneral=$this->factura_loteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$factura_lotes,$factura_lote,$this->factura_loteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelfactura_lote($this->factura_loteLogic->getfactura_lote());*/
			
			$this->factura_lote=$this->factura_loteLogic->getfactura_lote();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->factura_lote);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$factura_loteActual=new factura_lote();
			
			if($this->factura_loteClase==null) {		
				$this->factura_loteClase=new factura_lote();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$factura_loteActual=$this->factura_lotes[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $factura_loteActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $factura_loteActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $factura_loteActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $factura_loteActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $factura_loteActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $factura_loteActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $factura_loteActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $factura_loteActual->setruc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $factura_loteActual->setreferencia_cliente($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $factura_loteActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $factura_loteActual->setid_vendedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $factura_loteActual->setid_termino_pago((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $factura_loteActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $factura_loteActual->setcotizacion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $factura_loteActual->setid_moneda((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $factura_loteActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $factura_loteActual->setdireccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $factura_loteActual->setenviar_a($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $factura_loteActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $factura_loteActual->setimpuesto_en_precio(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_22')));  } else { $factura_loteActual->setimpuesto_en_precio(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $factura_loteActual->setsub_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $factura_loteActual->setdescuento_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $factura_loteActual->setdescuento_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $factura_loteActual->setiva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $factura_loteActual->setiva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_fuente_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_fuente_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_iva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_iva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $factura_loteActual->settotal((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $factura_loteActual->setotro_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $factura_loteActual->setotro_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $factura_loteActual->sethora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_35')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_ica_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $factura_loteActual->setretencion_ica_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_37'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $factura_loteActual->setid_asiento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $factura_loteActual->setid_documento_cuenta_cobrar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_39'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $factura_loteActual->setid_kardex((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }

				$this->factura_loteClase=$factura_loteActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->factura_loteModel->set($this->factura_loteClase);
				
				/*$this->factura_loteModel->set($this->migrarModelfactura_lote($this->factura_loteClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->factura_lotes=$this->migrarModelfactura_lote($this->factura_loteLogic->getfactura_lotes());							
		$this->factura_lotes=$this->factura_loteLogic->getfactura_lotes();*/
		
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
			$this->Session->write(factura_lote_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$factura_lote_control_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($factura_lote_control_session==null) {
				$factura_lote_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($factura_lote_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(factura_lote_util::$STR_SESSION_NAME,$this);*/
		} else {
			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));
			
			if($factura_lote_session==null) {
				$factura_lote_session=new factura_lote_session();
			}
			
			$this->set(factura_lote_util::$STR_SESSION_NAME, $factura_lote_session);
		}
	}
	
	public function setCopiarVariablesObjetos(factura_lote $factura_loteOrigen,factura_lote $factura_lote,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($factura_lote==null) {
				$factura_lote=new factura_lote();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $factura_loteOrigen->getId()!=null && $factura_loteOrigen->getId()!=0)) {$factura_lote->setId($factura_loteOrigen->getId());}}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getnumero()!=null && $factura_loteOrigen->getnumero()!='')) {$factura_lote->setnumero($factura_loteOrigen->getnumero());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getid_cliente()!=null && $factura_loteOrigen->getid_cliente()!=-1)) {$factura_lote->setid_cliente($factura_loteOrigen->getid_cliente());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getruc()!=null && $factura_loteOrigen->getruc()!='')) {$factura_lote->setruc($factura_loteOrigen->getruc());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getreferencia_cliente()!=null && $factura_loteOrigen->getreferencia_cliente()!='')) {$factura_lote->setreferencia_cliente($factura_loteOrigen->getreferencia_cliente());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getfecha_emision()!=null && $factura_loteOrigen->getfecha_emision()!=date('Y-m-d'))) {$factura_lote->setfecha_emision($factura_loteOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getid_vendedor()!=null && $factura_loteOrigen->getid_vendedor()!=-1)) {$factura_lote->setid_vendedor($factura_loteOrigen->getid_vendedor());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getid_termino_pago()!=null && $factura_loteOrigen->getid_termino_pago()!=-1)) {$factura_lote->setid_termino_pago($factura_loteOrigen->getid_termino_pago());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getfecha_vence()!=null && $factura_loteOrigen->getfecha_vence()!=date('Y-m-d'))) {$factura_lote->setfecha_vence($factura_loteOrigen->getfecha_vence());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getcotizacion()!=null && $factura_loteOrigen->getcotizacion()!=0.0)) {$factura_lote->setcotizacion($factura_loteOrigen->getcotizacion());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getid_moneda()!=null && $factura_loteOrigen->getid_moneda()!=-1)) {$factura_lote->setid_moneda($factura_loteOrigen->getid_moneda());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getid_estado()!=null && $factura_loteOrigen->getid_estado()!=-1)) {$factura_lote->setid_estado($factura_loteOrigen->getid_estado());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getdireccion()!=null && $factura_loteOrigen->getdireccion()!='')) {$factura_lote->setdireccion($factura_loteOrigen->getdireccion());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getenviar_a()!=null && $factura_loteOrigen->getenviar_a()!='')) {$factura_lote->setenviar_a($factura_loteOrigen->getenviar_a());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getobservacion()!=null && $factura_loteOrigen->getobservacion()!='')) {$factura_lote->setobservacion($factura_loteOrigen->getobservacion());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getimpuesto_en_precio()!=null && $factura_loteOrigen->getimpuesto_en_precio()!=false)) {$factura_lote->setimpuesto_en_precio($factura_loteOrigen->getimpuesto_en_precio());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getsub_total()!=null && $factura_loteOrigen->getsub_total()!=0.0)) {$factura_lote->setsub_total($factura_loteOrigen->getsub_total());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getdescuento_monto()!=null && $factura_loteOrigen->getdescuento_monto()!=0.0)) {$factura_lote->setdescuento_monto($factura_loteOrigen->getdescuento_monto());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getdescuento_porciento()!=null && $factura_loteOrigen->getdescuento_porciento()!=0.0)) {$factura_lote->setdescuento_porciento($factura_loteOrigen->getdescuento_porciento());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getiva_monto()!=null && $factura_loteOrigen->getiva_monto()!=0.0)) {$factura_lote->setiva_monto($factura_loteOrigen->getiva_monto());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getiva_porciento()!=null && $factura_loteOrigen->getiva_porciento()!=0.0)) {$factura_lote->setiva_porciento($factura_loteOrigen->getiva_porciento());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getretencion_fuente_monto()!=null && $factura_loteOrigen->getretencion_fuente_monto()!=0.0)) {$factura_lote->setretencion_fuente_monto($factura_loteOrigen->getretencion_fuente_monto());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getretencion_fuente_porciento()!=null && $factura_loteOrigen->getretencion_fuente_porciento()!=0.0)) {$factura_lote->setretencion_fuente_porciento($factura_loteOrigen->getretencion_fuente_porciento());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getretencion_iva_monto()!=null && $factura_loteOrigen->getretencion_iva_monto()!=0.0)) {$factura_lote->setretencion_iva_monto($factura_loteOrigen->getretencion_iva_monto());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getretencion_iva_porciento()!=null && $factura_loteOrigen->getretencion_iva_porciento()!=0.0)) {$factura_lote->setretencion_iva_porciento($factura_loteOrigen->getretencion_iva_porciento());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->gettotal()!=null && $factura_loteOrigen->gettotal()!=0.0)) {$factura_lote->settotal($factura_loteOrigen->gettotal());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getotro_monto()!=null && $factura_loteOrigen->getotro_monto()!=0.0)) {$factura_lote->setotro_monto($factura_loteOrigen->getotro_monto());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getotro_porciento()!=null && $factura_loteOrigen->getotro_porciento()!=0.0)) {$factura_lote->setotro_porciento($factura_loteOrigen->getotro_porciento());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->gethora()!=null && $factura_loteOrigen->gethora()!=date('Y-m-d'))) {$factura_lote->sethora($factura_loteOrigen->gethora());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getretencion_ica_monto()!=null && $factura_loteOrigen->getretencion_ica_monto()!=0.0)) {$factura_lote->setretencion_ica_monto($factura_loteOrigen->getretencion_ica_monto());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getretencion_ica_porciento()!=null && $factura_loteOrigen->getretencion_ica_porciento()!=0.0)) {$factura_lote->setretencion_ica_porciento($factura_loteOrigen->getretencion_ica_porciento());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getid_asiento()!=null && $factura_loteOrigen->getid_asiento()!=null)) {$factura_lote->setid_asiento($factura_loteOrigen->getid_asiento());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getid_documento_cuenta_cobrar()!=null && $factura_loteOrigen->getid_documento_cuenta_cobrar()!=null)) {$factura_lote->setid_documento_cuenta_cobrar($factura_loteOrigen->getid_documento_cuenta_cobrar());}
			if($conDefault || ($conDefault==false && $factura_loteOrigen->getid_kardex()!=null && $factura_loteOrigen->getid_kardex()!=null)) {$factura_lote->setid_kardex($factura_loteOrigen->getid_kardex());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$factura_lotesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$factura_lotesSeleccionados[]=$this->factura_lotes[$indice];
			}
		}
		
		return $factura_lotesSeleccionados;
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
		$factura_lote= new factura_lote();
		
		foreach($this->factura_loteLogic->getfactura_lotes() as $factura_lote) {
			
		$factura_lote->facturalotedetalles=array();
		$factura_lote->facturamodelos=array();
		}		
		
		if($factura_lote!=null);
	}
	
	public function cargarRelaciones(array $factura_lotes=array()) : array {	
		
		$factura_lotesRespaldo = array();
		$factura_lotesLocal = array();
		
		factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			factura_lote_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_modelo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$factura_lotesResp=array();
		$classes=array();
			
		
				$class=new Classe('factura_lote_detalle'); 	$classes[]=$class;
				$class=new Classe('factura_modelo'); 	$classes[]=$class;
			
			
		$factura_lotesRespaldo=$this->factura_loteLogic->getfactura_lotes();
			
		$this->factura_loteLogic->setIsConDeep(true);
		
		$this->factura_loteLogic->setfactura_lotes($factura_lotes);
			
		$this->factura_loteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$factura_lotesLocal=$this->factura_loteLogic->getfactura_lotes();
			
		/*RESPALDO*/
		$this->factura_loteLogic->setfactura_lotes($factura_lotesRespaldo);
			
		$this->factura_loteLogic->setIsConDeep(false);
		
		if($factura_lotesResp!=null);
		
		return $factura_lotesLocal;
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
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(factura_lote_session $factura_lote_session) {
		$factura_lote_session->strTypeOnLoad=$this->strTypeOnLoadfactura_lote;
		$factura_lote_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarfactura_lote;
		$factura_lote_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarfactura_lote;
		$factura_lote_session->bitEsPopup=$this->bitEsPopup;
		$factura_lote_session->bitEsBusqueda=$this->bitEsBusqueda;
		$factura_lote_session->strFuncionJs=$this->strFuncionJs;
		/*$factura_lote_session->strSufijo=$this->strSufijo;*/
		$factura_lote_session->bitEsRelaciones=$this->bitEsRelaciones;
		$factura_lote_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_lote_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosfactura_lote_detalle='none';
			$this->strTienePermisosfactura_lote_detalle=((Funciones::existeCadenaArray(factura_lote_detalle_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosfactura_lote_detalle='table-cell';

			$this->strTienePermisosfactura_modelo='none';
			$this->strTienePermisosfactura_modelo=((Funciones::existeCadenaArray(factura_modelo_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosfactura_modelo='table-cell';
		} else {
			

			$this->strTienePermisosfactura_lote_detalle='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosfactura_lote_detalle=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_lote_detalle_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosfactura_lote_detalle='table-cell';

			$this->strTienePermisosfactura_modelo='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosfactura_modelo=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_modelo_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosfactura_modelo='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$factura_loteViewAdditional=new factura_loteView_add();
		$factura_loteViewAdditional->factura_lotes=$this->factura_lotes;
		$factura_loteViewAdditional->Session=$this->Session;
		
		return $factura_loteViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$factura_lotesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$factura_lotesLocal=$this->factura_lotes;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$factura_lotesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($factura_lotesLocal)<=0) {
					$factura_lotesLocal=$this->factura_lotes;
				}
			} else {
				$factura_lotesLocal=$this->factura_lotes;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarfactura_lotesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarfactura_lotesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$factura_loteLogic=new factura_lote_logic();
		$factura_loteLogic->setfactura_lotes($this->factura_lotes);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$factura_lote_detalle_session=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME));

		if($factura_lote_detalle_session==null) {
			$factura_lote_detalle_session=new factura_lote_detalle_session();
		}

		$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));

		if($factura_modelo_session==null) {
			$factura_modelo_session=new factura_modelo_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago');$classes[]=$class;
			$class=new Classe('moneda');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			$class=new Classe('asiento');$classes[]=$class;
			$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
			$class=new Classe('kardex');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$factura_loteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->factura_lotes=$factura_loteLogic->getfactura_lotes();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->factura_lotesLocal=$this->factura_lotes;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=factura_lote_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=factura_lote_util::$STR_TABLE_NAME;		
			
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
			
			$factura_lotes = $this->factura_lotes;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = factura_lote_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = factura_lote_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/facturacion/presentation/templating/factura_lote_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->factura_lotes=$factura_lotes;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->factura_lotesLocal=$factura_lotesLocal;
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
		
		$factura_lotesLocal=array();
		
		$factura_lotesLocal=$this->factura_lotes;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarfactura_lotesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarfactura_lotesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$factura_loteLogic=new factura_lote_logic();
		$factura_loteLogic->setfactura_lotes($this->factura_lotes);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$factura_lote_detalle_session=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME));

		if($factura_lote_detalle_session==null) {
			$factura_lote_detalle_session=new factura_lote_detalle_session();
		}

		$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));

		if($factura_modelo_session==null) {
			$factura_modelo_session=new factura_modelo_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago');$classes[]=$class;
			$class=new Classe('moneda');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			$class=new Classe('asiento');$classes[]=$class;
			$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
			$class=new Classe('kardex');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$factura_loteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->factura_lotes=$factura_loteLogic->getfactura_lotes();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$factura_lotes = $this->factura_lotes;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = factura_lote_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = factura_lote_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/facturacion/presentation/templating/factura_lote_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->factura_lotes=$factura_lotes;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->factura_lotesLocal=$factura_lotesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $factura_lotes=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->factura_lotesReporte = $factura_lotes;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarfactura_lotesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarfactura_lotesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $factura_lotes=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->factura_lotesReporte = $factura_lotes;		
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
		
		
		$this->factura_lotesReporte=$this->cargarRelaciones($factura_lotes);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarfactura_lotesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarfactura_lotesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(factura_lote $factura_lote=null) : string {	
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
			
			
			$factura_lotesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$factura_lotesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($factura_lotesLocal)<=0) {
					/*//DEBE ESCOGER
					$factura_lotesLocal=$this->factura_lotes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$factura_lotesLocal=$this->factura_lotes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($factura_lotesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($factura_lotesLocal,true);
			
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
				$this->factura_loteLogic->getNewConnexionToDeep();
			}
					
			$factura_lotesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$factura_lotesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($factura_lotesLocal)<=0) {
					/*//DEBE ESCOGER
					$factura_lotesLocal=$this->factura_lotes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$factura_lotesLocal=$this->factura_lotes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($factura_lotesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($factura_lotesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Facturas Loteses';
			
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
			$fileName='factura_lote';
			
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
			
			$title='Reporte de  Facturas Loteses';
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
			
			$title='Reporte de  Facturas Loteses';
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
				$this->factura_loteLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Facturas Loteses';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->commitNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_loteLogic->rollbackNewConnexionToDeep();
				$this->factura_loteLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=factura_lote_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->factura_lotesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->factura_lotesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->factura_lotesAuxiliar)<=0) {
					$this->factura_lotesAuxiliar=$this->factura_lotes;
				}
			} else {
				$this->factura_lotesAuxiliar=$this->factura_lotes;
			}
		/*} else {
			$this->factura_lotesAuxiliar=$this->factura_lotesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->factura_lotesAuxiliar as $factura_lote) {
				$row=array();
				
				$row=factura_lote_util::getDataReportRow($tipo,$factura_lote,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			factura_lote_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			factura_lote_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_modelo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$factura_lotesResp=array();
			$classes=array();
			
			
				$class=new Classe('factura_lote_detalle'); 	$classes[]=$class;
				$class=new Classe('factura_modelo'); 	$classes[]=$class;
			
			
			$factura_lotesResp=$this->factura_loteLogic->getfactura_lotes();
			
			$this->factura_loteLogic->setIsConDeep(true);
			
			$this->factura_loteLogic->setfactura_lotes($this->factura_lotesAuxiliar);
			
			$this->factura_loteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->factura_lotesAuxiliar=$this->factura_loteLogic->getfactura_lotes();
			
			//RESPALDO
			$this->factura_loteLogic->setfactura_lotes($factura_lotesResp);
			
			$this->factura_loteLogic->setIsConDeep(false);
			*/
			
			$this->factura_lotesAuxiliar=$this->cargarRelaciones($this->factura_lotesAuxiliar);
			
			$i=0;
			
			foreach ($this->factura_lotesAuxiliar as $factura_lote) {
				$row=array();
				
				if($i!=0) {
					$row=factura_lote_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=factura_lote_util::getDataReportRow($tipo,$factura_lote,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//factura_lote_detalle
				if(Funciones::existeCadenaArrayOrderBy(factura_lote_detalle_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($factura_lote->getfactura_lote_detalles())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(factura_lote_detalle_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=factura_lote_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($factura_lote->getfactura_lote_detalles() as $factura_lote_detalle) {
						$row=factura_lote_detalle_util::getDataReportRow('RELACIONADO',$factura_lote_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//factura_modelo
				if(Funciones::existeCadenaArrayOrderBy(factura_modelo_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($factura_lote->getfactura_modelos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(factura_modelo_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=factura_modelo_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($factura_lote->getfactura_modelos() as $factura_modelo) {
						$row=factura_modelo_util::getDataReportRow('RELACIONADO',$factura_modelo,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->factura_lotesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->factura_lotesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->factura_lotesAuxiliar)<=0) {
					$this->factura_lotesAuxiliar=$this->factura_lotes;
				}
			} else {
				$this->factura_lotesAuxiliar=$this->factura_lotes;
			}
		/*} else {
			$this->factura_lotesAuxiliar=$this->factura_lotesReporte;	
		}*/
		
		foreach ($this->factura_lotesAuxiliar as $factura_lote) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(factura_lote_util::getfactura_loteDescripcion($factura_lote),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getnumero(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ruc',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ruc',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getruc(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Referencia Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Referencia Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getreferencia_cliente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Vendedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Vendedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_vendedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Terminos Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Terminos Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_termino_pagoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Vence',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vence',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getfecha_vence(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cotizacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cotizacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getcotizacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Moneda',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Moneda',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_monedaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Estado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_estadoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getdireccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Enviar a',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Enviar a',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getenviar_a(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Observacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getobservacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto En Precio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto En Precio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getimpuesto_en_precio(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sub Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getsub_total(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getdescuento_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getdescuento_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iva Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getiva_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iva %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getiva_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Fuente Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Fuente Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getretencion_fuente_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Fuente %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Fuente %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getretencion_fuente_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Iva Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Iva Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getretencion_iva_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Iva %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Iva %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getretencion_iva_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->gettotal(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Miscelaneos',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Miscelaneos',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getotro_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Miscelaneos %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Miscelaneos %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getotro_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Hora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Hora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->gethora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Ica Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Ica Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getretencion_ica_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Ica %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Ica %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getretencion_ica_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Asiento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Asiento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_asientoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Docs Cc',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Docs Cc',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_documento_cuenta_cobrarDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Kardex',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Kardex',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote->getid_kardexDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface factura_lote_base_controlI {			
		
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
		public function getIndiceActual(factura_lote $factura_lote,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(factura_lote $factura_lote,array $factura_lotes);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : factura_lote_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $factura_lotes,factura_lote $factura_lote);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(factura_lote_param_return $factura_loteReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(factura_lote_session $factura_lote_session);		
		public function actualizarInvitadoSessionDivStyleVariables(factura_lote_session $factura_lote_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(factura_lote $factura_loteOrigen,factura_lote $factura_lote,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(factura_lote_control $factura_lote_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $factura_lotes=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(factura_lote_session $factura_lote_session);		
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
		public function getHtmlTablaDatosResumen(array $factura_lotes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $factura_lotes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(factura_lote $factura_lote=null) : string;
		
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
