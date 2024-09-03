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

namespace com\bydan\contabilidad\facturacion\devolucion_factura\presentation\control;

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

use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/devolucion_factura/util/devolucion_factura_carga.php');
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;

use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_param_return;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\logic\devolucion_factura_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;


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


use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_util;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\presentation\session\devolucion_factura_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
devolucion_factura_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
devolucion_factura_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
devolucion_factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*devolucion_factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class devolucion_factura_base_control extends devolucion_factura_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->devolucion_facturaClase==null) {		
				$this->devolucion_facturaClase=new devolucion_factura();
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
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_termino_pago_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_moneda')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_moneda',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_estado',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_asiento')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_asiento',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_documento_cuenta_cobrar')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_documento_cuenta_cobrar',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_kardex')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_kardex',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->devolucion_facturaClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->devolucion_facturaClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->devolucion_facturaClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->devolucion_facturaClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->devolucion_facturaClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->devolucion_facturaClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->devolucion_facturaClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->devolucion_facturaClase->setnumero($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero'));
				
				$this->devolucion_facturaClase->setid_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cliente'));
				
				$this->devolucion_facturaClase->setruc($this->getDataCampoFormTabla('form'.$this->strSufijo,'ruc'));
				
				$this->devolucion_facturaClase->setreferencia_cliente($this->getDataCampoFormTabla('form'.$this->strSufijo,'referencia_cliente'));
				
				$this->devolucion_facturaClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->devolucion_facturaClase->setid_vendedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_vendedor'));
				
				$this->devolucion_facturaClase->setid_termino_pago_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_cliente'));
				
				$this->devolucion_facturaClase->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_vence')));
				
				$this->devolucion_facturaClase->setid_moneda((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_moneda'));
				
				$this->devolucion_facturaClase->setcotizacion((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cotizacion'));
				
				$this->devolucion_facturaClase->setid_estado((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado'));
				
				$this->devolucion_facturaClase->setdireccion($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion'));
				
				$this->devolucion_facturaClase->setenviar_a($this->getDataCampoFormTabla('form'.$this->strSufijo,'enviar_a'));
				
				$this->devolucion_facturaClase->setobservacion($this->getDataCampoFormTabla('form'.$this->strSufijo,'observacion'));
				
				$this->devolucion_facturaClase->setimpuesto_en_precio(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto_en_precio')));
				
				$this->devolucion_facturaClase->setsub_total((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'sub_total'));
				
				$this->devolucion_facturaClase->setdescuento_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_monto'));
				
				$this->devolucion_facturaClase->setdescuento_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_porciento'));
				
				$this->devolucion_facturaClase->setiva_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'iva_monto'));
				
				$this->devolucion_facturaClase->setiva_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'iva_porciento'));
				
				$this->devolucion_facturaClase->setretencion_fuente_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_fuente_monto'));
				
				$this->devolucion_facturaClase->setretencion_fuente_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_fuente_porciento'));
				
				$this->devolucion_facturaClase->setretencion_iva_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_iva_monto'));
				
				$this->devolucion_facturaClase->setretencion_iva_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_iva_porciento'));
				
				$this->devolucion_facturaClase->settotal((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'total'));
				
				$this->devolucion_facturaClase->setotro_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'otro_monto'));
				
				$this->devolucion_facturaClase->setotro_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'otro_porciento'));
				
				$this->devolucion_facturaClase->sethora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'hora')));
				
				$this->devolucion_facturaClase->setretencion_ica_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_ica_porciento'));
				
				$this->devolucion_facturaClase->setretencion_ica_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_ica_monto'));
				
				$this->devolucion_facturaClase->setid_asiento((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_asiento'));
				
				$this->devolucion_facturaClase->setid_documento_cuenta_cobrar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_documento_cuenta_cobrar'));
				
				$this->devolucion_facturaClase->setid_kardex((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_kardex'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->devolucion_facturaModel->set($this->devolucion_facturaClase);
				
				/*$this->devolucion_facturaModel->set($this->migrarModeldevolucion_factura($this->devolucion_facturaClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->devolucion_facturaLogic->getdevolucion_factura()->setId($this->devolucion_facturaClase->getId());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setVersionRow($this->devolucion_facturaClase->getVersionRow());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setVersionRow($this->devolucion_facturaClase->getVersionRow());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_empresa($this->devolucion_facturaClase->getid_empresa());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_sucursal($this->devolucion_facturaClase->getid_sucursal());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_ejercicio($this->devolucion_facturaClase->getid_ejercicio());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_periodo($this->devolucion_facturaClase->getid_periodo());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_usuario($this->devolucion_facturaClase->getid_usuario());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setnumero($this->devolucion_facturaClase->getnumero());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_cliente($this->devolucion_facturaClase->getid_cliente());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setruc($this->devolucion_facturaClase->getruc());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setreferencia_cliente($this->devolucion_facturaClase->getreferencia_cliente());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setfecha_emision($this->devolucion_facturaClase->getfecha_emision());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_vendedor($this->devolucion_facturaClase->getid_vendedor());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_termino_pago_cliente($this->devolucion_facturaClase->getid_termino_pago_cliente());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setfecha_vence($this->devolucion_facturaClase->getfecha_vence());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_moneda($this->devolucion_facturaClase->getid_moneda());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setcotizacion($this->devolucion_facturaClase->getcotizacion());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_estado($this->devolucion_facturaClase->getid_estado());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setdireccion($this->devolucion_facturaClase->getdireccion());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setenviar_a($this->devolucion_facturaClase->getenviar_a());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setobservacion($this->devolucion_facturaClase->getobservacion());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setimpuesto_en_precio($this->devolucion_facturaClase->getimpuesto_en_precio());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setsub_total($this->devolucion_facturaClase->getsub_total());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setdescuento_monto($this->devolucion_facturaClase->getdescuento_monto());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setdescuento_porciento($this->devolucion_facturaClase->getdescuento_porciento());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setiva_monto($this->devolucion_facturaClase->getiva_monto());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setiva_porciento($this->devolucion_facturaClase->getiva_porciento());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setretencion_fuente_monto($this->devolucion_facturaClase->getretencion_fuente_monto());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setretencion_fuente_porciento($this->devolucion_facturaClase->getretencion_fuente_porciento());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setretencion_iva_monto($this->devolucion_facturaClase->getretencion_iva_monto());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setretencion_iva_porciento($this->devolucion_facturaClase->getretencion_iva_porciento());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->settotal($this->devolucion_facturaClase->gettotal());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setotro_monto($this->devolucion_facturaClase->getotro_monto());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setotro_porciento($this->devolucion_facturaClase->getotro_porciento());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->sethora($this->devolucion_facturaClase->gethora());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setretencion_ica_porciento($this->devolucion_facturaClase->getretencion_ica_porciento());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setretencion_ica_monto($this->devolucion_facturaClase->getretencion_ica_monto());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_asiento($this->devolucion_facturaClase->getid_asiento());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_documento_cuenta_cobrar($this->devolucion_facturaClase->getid_documento_cuenta_cobrar());	
			$this->devolucion_facturaLogic->getdevolucion_factura()->setid_kardex($this->devolucion_facturaClase->getid_kardex());	
		} else {
			$this->devolucion_facturaClase->setId($this->devolucion_facturaLogic->getdevolucion_factura()->getId());	
			$this->devolucion_facturaClase->setVersionRow($this->devolucion_facturaLogic->getdevolucion_factura()->getVersionRow());	
			$this->devolucion_facturaClase->setVersionRow($this->devolucion_facturaLogic->getdevolucion_factura()->getVersionRow());	
			$this->devolucion_facturaClase->setid_empresa($this->devolucion_facturaLogic->getdevolucion_factura()->getid_empresa());	
			$this->devolucion_facturaClase->setid_sucursal($this->devolucion_facturaLogic->getdevolucion_factura()->getid_sucursal());	
			$this->devolucion_facturaClase->setid_ejercicio($this->devolucion_facturaLogic->getdevolucion_factura()->getid_ejercicio());	
			$this->devolucion_facturaClase->setid_periodo($this->devolucion_facturaLogic->getdevolucion_factura()->getid_periodo());	
			$this->devolucion_facturaClase->setid_usuario($this->devolucion_facturaLogic->getdevolucion_factura()->getid_usuario());	
			$this->devolucion_facturaClase->setnumero($this->devolucion_facturaLogic->getdevolucion_factura()->getnumero());	
			$this->devolucion_facturaClase->setid_cliente($this->devolucion_facturaLogic->getdevolucion_factura()->getid_cliente());	
			$this->devolucion_facturaClase->setruc($this->devolucion_facturaLogic->getdevolucion_factura()->getruc());	
			$this->devolucion_facturaClase->setreferencia_cliente($this->devolucion_facturaLogic->getdevolucion_factura()->getreferencia_cliente());	
			$this->devolucion_facturaClase->setfecha_emision($this->devolucion_facturaLogic->getdevolucion_factura()->getfecha_emision());	
			$this->devolucion_facturaClase->setid_vendedor($this->devolucion_facturaLogic->getdevolucion_factura()->getid_vendedor());	
			$this->devolucion_facturaClase->setid_termino_pago_cliente($this->devolucion_facturaLogic->getdevolucion_factura()->getid_termino_pago_cliente());	
			$this->devolucion_facturaClase->setfecha_vence($this->devolucion_facturaLogic->getdevolucion_factura()->getfecha_vence());	
			$this->devolucion_facturaClase->setid_moneda($this->devolucion_facturaLogic->getdevolucion_factura()->getid_moneda());	
			$this->devolucion_facturaClase->setcotizacion($this->devolucion_facturaLogic->getdevolucion_factura()->getcotizacion());	
			$this->devolucion_facturaClase->setid_estado($this->devolucion_facturaLogic->getdevolucion_factura()->getid_estado());	
			$this->devolucion_facturaClase->setdireccion($this->devolucion_facturaLogic->getdevolucion_factura()->getdireccion());	
			$this->devolucion_facturaClase->setenviar_a($this->devolucion_facturaLogic->getdevolucion_factura()->getenviar_a());	
			$this->devolucion_facturaClase->setobservacion($this->devolucion_facturaLogic->getdevolucion_factura()->getobservacion());	
			$this->devolucion_facturaClase->setimpuesto_en_precio($this->devolucion_facturaLogic->getdevolucion_factura()->getimpuesto_en_precio());	
			$this->devolucion_facturaClase->setsub_total($this->devolucion_facturaLogic->getdevolucion_factura()->getsub_total());	
			$this->devolucion_facturaClase->setdescuento_monto($this->devolucion_facturaLogic->getdevolucion_factura()->getdescuento_monto());	
			$this->devolucion_facturaClase->setdescuento_porciento($this->devolucion_facturaLogic->getdevolucion_factura()->getdescuento_porciento());	
			$this->devolucion_facturaClase->setiva_monto($this->devolucion_facturaLogic->getdevolucion_factura()->getiva_monto());	
			$this->devolucion_facturaClase->setiva_porciento($this->devolucion_facturaLogic->getdevolucion_factura()->getiva_porciento());	
			$this->devolucion_facturaClase->setretencion_fuente_monto($this->devolucion_facturaLogic->getdevolucion_factura()->getretencion_fuente_monto());	
			$this->devolucion_facturaClase->setretencion_fuente_porciento($this->devolucion_facturaLogic->getdevolucion_factura()->getretencion_fuente_porciento());	
			$this->devolucion_facturaClase->setretencion_iva_monto($this->devolucion_facturaLogic->getdevolucion_factura()->getretencion_iva_monto());	
			$this->devolucion_facturaClase->setretencion_iva_porciento($this->devolucion_facturaLogic->getdevolucion_factura()->getretencion_iva_porciento());	
			$this->devolucion_facturaClase->settotal($this->devolucion_facturaLogic->getdevolucion_factura()->gettotal());	
			$this->devolucion_facturaClase->setotro_monto($this->devolucion_facturaLogic->getdevolucion_factura()->getotro_monto());	
			$this->devolucion_facturaClase->setotro_porciento($this->devolucion_facturaLogic->getdevolucion_factura()->getotro_porciento());	
			$this->devolucion_facturaClase->sethora($this->devolucion_facturaLogic->getdevolucion_factura()->gethora());	
			$this->devolucion_facturaClase->setretencion_ica_porciento($this->devolucion_facturaLogic->getdevolucion_factura()->getretencion_ica_porciento());	
			$this->devolucion_facturaClase->setretencion_ica_monto($this->devolucion_facturaLogic->getdevolucion_factura()->getretencion_ica_monto());	
			$this->devolucion_facturaClase->setid_asiento($this->devolucion_facturaLogic->getdevolucion_factura()->getid_asiento());	
			$this->devolucion_facturaClase->setid_documento_cuenta_cobrar($this->devolucion_facturaLogic->getdevolucion_factura()->getid_documento_cuenta_cobrar());	
			$this->devolucion_facturaClase->setid_kardex($this->devolucion_facturaLogic->getdevolucion_factura()->getid_kardex());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->devolucion_facturaModel->invalidFieldsMe();
		
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
		if($strNombreCampo=='id_termino_pago_cliente') {$this->strMensajeid_termino_pago_cliente=$strMensajeCampo;}
		if($strNombreCampo=='fecha_vence') {$this->strMensajefecha_vence=$strMensajeCampo;}
		if($strNombreCampo=='id_moneda') {$this->strMensajeid_moneda=$strMensajeCampo;}
		if($strNombreCampo=='cotizacion') {$this->strMensajecotizacion=$strMensajeCampo;}
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
		if($strNombreCampo=='retencion_ica_porciento') {$this->strMensajeretencion_ica_porciento=$strMensajeCampo;}
		if($strNombreCampo=='retencion_ica_monto') {$this->strMensajeretencion_ica_monto=$strMensajeCampo;}
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
		$this->strMensajeid_termino_pago_cliente='';
		$this->strMensajefecha_vence='';
		$this->strMensajeid_moneda='';
		$this->strMensajecotizacion='';
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
		$this->strMensajeretencion_ica_porciento='';
		$this->strMensajeretencion_ica_monto='';
		$this->strMensajeid_asiento='';
		$this->strMensajeid_documento_cuenta_cobrar='';
		$this->strMensajeid_kardex='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->commitNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->rollbackNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
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
				$this->devolucion_facturaLogic->getNewConnexionToDeep();
			}

			$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));
						
			if($devolucion_factura_session==null) {
				$devolucion_factura_session=new devolucion_factura_session();
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
						$this->devolucion_facturaLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->devolucion_facturaActual =$this->devolucion_facturaClase;
			
			/*$this->devolucion_facturaActual =$this->migrarModeldevolucion_factura($this->devolucion_facturaClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->commitNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->devolucion_facturaLogic->getdevolucion_facturas(),$this->devolucion_facturaActual);
			
			$this->actualizarControllerConReturnGeneral($this->devolucion_facturaReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->rollbackNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->getNewConnexionToDeep();
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
				$this->devolucion_facturaLogic->commitNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->rollbackNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$devolucion_facturasLocal=$this->getListaActual();
		
		$iIndice=devolucion_factura_util::getIndiceNuevo($devolucion_facturasLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(devolucion_factura $devolucion_factura,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$devolucion_facturasLocal=$this->getListaActual();
		
		$iIndice=devolucion_factura_util::getIndiceActual($devolucion_facturasLocal,$devolucion_factura,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevodevolucion_factura')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->devolucion_facturaActual =$this->devolucion_facturaClase;
			
			/*$this->devolucion_facturaActual =$this->migrarModeldevolucion_factura($this->devolucion_facturaClase);*/
			
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
			
			$this->devolucion_facturaLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago_cliente');$classes[]=$class;
				$class=new Classe('moneda');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				$class=new Classe('asiento');$classes[]=$class;
				$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
				$class=new Classe('kardex');$classes[]=$class;
			
			$this->devolucion_facturaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->devolucion_facturaLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->devolucion_facturaLogic->setdevolucion_factura(new devolucion_factura());
				
				$this->devolucion_facturaLogic->getdevolucion_factura()->setIsNew(true);
				$this->devolucion_facturaLogic->getdevolucion_factura()->setIsChanged(true);
				$this->devolucion_facturaLogic->getdevolucion_factura()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->devolucion_facturaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->devolucion_facturaLogic->devolucion_facturas[]=$this->devolucion_facturaLogic->getdevolucion_factura();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->devolucion_facturaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							devolucion_factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturadetalles=unserialize($this->Session->read(devolucion_factura_detalle_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturadetallesEliminados=unserialize($this->Session->read(devolucion_factura_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturadetalles=array_merge($devolucionfacturadetalles,$devolucionfacturadetallesEliminados);
							
							$this->devolucion_facturaLogic->saveRelaciones($this->devolucion_facturaLogic->getdevolucion_factura(),$devolucionfacturadetalles);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->devolucion_facturaLogic->getdevolucion_factura()->setIsChanged(true);
				$this->devolucion_facturaLogic->getdevolucion_factura()->setIsNew(false);
				$this->devolucion_facturaLogic->getdevolucion_factura()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->devolucion_facturaModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->devolucion_facturaLogic->getdevolucion_factura(),$this->devolucion_facturaLogic->getdevolucion_facturas());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->devolucion_facturaLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							devolucion_factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturadetalles=unserialize($this->Session->read(devolucion_factura_detalle_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturadetallesEliminados=unserialize($this->Session->read(devolucion_factura_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturadetalles=array_merge($devolucionfacturadetalles,$devolucionfacturadetallesEliminados);
							
							$this->devolucion_facturaLogic->saveRelaciones($this->devolucion_facturaLogic->getdevolucion_factura(),$devolucionfacturadetalles);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->devolucion_facturaLogic->getdevolucion_factura()->setIsDeleted(true);
				$this->devolucion_facturaLogic->getdevolucion_factura()->setIsNew(false);
				$this->devolucion_facturaLogic->getdevolucion_factura()->setIsChanged(false);				
				
				$this->actualizarLista($this->devolucion_facturaLogic->getdevolucion_factura(),$this->devolucion_facturaLogic->getdevolucion_facturas());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->devolucion_facturaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							devolucion_factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturadetalles=unserialize($this->Session->read(devolucion_factura_detalle_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturadetallesEliminados=unserialize($this->Session->read(devolucion_factura_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturadetalles=array_merge($devolucionfacturadetalles,$devolucionfacturadetallesEliminados);

							foreach($devolucionfacturadetalles as $devolucionfacturadetalle1) {
								$devolucionfacturadetalle1->setIsDeleted(true);
							}
							
						$this->devolucion_facturaLogic->saveRelaciones($this->devolucion_facturaLogic->getdevolucion_factura(),$devolucionfacturadetalles);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->devolucion_facturasEliminados[]=$this->devolucion_facturaLogic->getdevolucion_factura();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->devolucion_facturaLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							devolucion_factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturadetalles=unserialize($this->Session->read(devolucion_factura_detalle_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturadetallesEliminados=unserialize($this->Session->read(devolucion_factura_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturadetalles=array_merge($devolucionfacturadetalles,$devolucionfacturadetallesEliminados);
							
						$this->devolucion_facturaLogic->saveRelaciones($this->devolucion_facturaLogic->getdevolucion_factura(),$devolucionfacturadetalles);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->devolucion_facturasEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->devolucion_facturaLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->devolucion_facturaLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->devolucion_facturasEliminados=array();
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
				$class=new Classe('termino_pago_cliente');$classes[]=$class;
				$class=new Classe('moneda');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				$class=new Classe('asiento');$classes[]=$class;
				$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
				$class=new Classe('kardex');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->devolucion_facturaLogic->setdevolucion_facturas();*/
					
					$this->devolucion_facturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->devolucion_facturaLogic->setIsConDeepLoad(false);
			
			$this->devolucion_facturas=$this->devolucion_facturaLogic->getdevolucion_facturas();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(devolucion_factura_util::$STR_SESSION_NAME.'Lista',serialize($this->devolucion_facturas));
				$this->Session->write(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->devolucion_facturasEliminados));
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
				$this->devolucion_facturaLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->commitNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->rollbackNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
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
				$this->devolucion_facturaLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginaldevolucion_factura;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->devolucion_facturaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->devolucion_facturas as $devolucion_facturaLocal) {
				if($this->devolucion_facturaLogic->getdevolucion_factura()->getId()==$devolucion_facturaLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->devolucion_facturaLogic->getdevolucion_factura()->setIsDeleted(true);
			$this->devolucion_facturasEliminados[]=$this->devolucion_facturaLogic->getdevolucion_factura();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->devolucion_facturas[$indice]);
				
				$this->devolucion_facturas = array_values($this->devolucion_facturas);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModeldevolucion_factura($this->devolucion_facturaClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->commitNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->rollbackNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(devolucion_factura $devolucion_factura,array $devolucion_facturas) {
		try {
			foreach($devolucion_facturas as $devolucion_facturaLocal){ 
				if($devolucion_facturaLocal->getId()==$devolucion_factura->getId()) {
					$devolucion_facturaLocal->setIsChanged($devolucion_factura->getIsChanged());
					$devolucion_facturaLocal->setIsNew($devolucion_factura->getIsNew());
					$devolucion_facturaLocal->setIsDeleted($devolucion_factura->getIsDeleted());
					//$devolucion_facturaLocal->setbitExpired($devolucion_factura->getbitExpired());
					
					$devolucion_facturaLocal->setId($devolucion_factura->getId());	
					$devolucion_facturaLocal->setVersionRow($devolucion_factura->getVersionRow());	
					$devolucion_facturaLocal->setVersionRow($devolucion_factura->getVersionRow());	
					$devolucion_facturaLocal->setid_empresa($devolucion_factura->getid_empresa());	
					$devolucion_facturaLocal->setid_sucursal($devolucion_factura->getid_sucursal());	
					$devolucion_facturaLocal->setid_ejercicio($devolucion_factura->getid_ejercicio());	
					$devolucion_facturaLocal->setid_periodo($devolucion_factura->getid_periodo());	
					$devolucion_facturaLocal->setid_usuario($devolucion_factura->getid_usuario());	
					$devolucion_facturaLocal->setnumero($devolucion_factura->getnumero());	
					$devolucion_facturaLocal->setid_cliente($devolucion_factura->getid_cliente());	
					$devolucion_facturaLocal->setruc($devolucion_factura->getruc());	
					$devolucion_facturaLocal->setreferencia_cliente($devolucion_factura->getreferencia_cliente());	
					$devolucion_facturaLocal->setfecha_emision($devolucion_factura->getfecha_emision());	
					$devolucion_facturaLocal->setid_vendedor($devolucion_factura->getid_vendedor());	
					$devolucion_facturaLocal->setid_termino_pago_cliente($devolucion_factura->getid_termino_pago_cliente());	
					$devolucion_facturaLocal->setfecha_vence($devolucion_factura->getfecha_vence());	
					$devolucion_facturaLocal->setid_moneda($devolucion_factura->getid_moneda());	
					$devolucion_facturaLocal->setcotizacion($devolucion_factura->getcotizacion());	
					$devolucion_facturaLocal->setid_estado($devolucion_factura->getid_estado());	
					$devolucion_facturaLocal->setdireccion($devolucion_factura->getdireccion());	
					$devolucion_facturaLocal->setenviar_a($devolucion_factura->getenviar_a());	
					$devolucion_facturaLocal->setobservacion($devolucion_factura->getobservacion());	
					$devolucion_facturaLocal->setimpuesto_en_precio($devolucion_factura->getimpuesto_en_precio());	
					$devolucion_facturaLocal->setsub_total($devolucion_factura->getsub_total());	
					$devolucion_facturaLocal->setdescuento_monto($devolucion_factura->getdescuento_monto());	
					$devolucion_facturaLocal->setdescuento_porciento($devolucion_factura->getdescuento_porciento());	
					$devolucion_facturaLocal->setiva_monto($devolucion_factura->getiva_monto());	
					$devolucion_facturaLocal->setiva_porciento($devolucion_factura->getiva_porciento());	
					$devolucion_facturaLocal->setretencion_fuente_monto($devolucion_factura->getretencion_fuente_monto());	
					$devolucion_facturaLocal->setretencion_fuente_porciento($devolucion_factura->getretencion_fuente_porciento());	
					$devolucion_facturaLocal->setretencion_iva_monto($devolucion_factura->getretencion_iva_monto());	
					$devolucion_facturaLocal->setretencion_iva_porciento($devolucion_factura->getretencion_iva_porciento());	
					$devolucion_facturaLocal->settotal($devolucion_factura->gettotal());	
					$devolucion_facturaLocal->setotro_monto($devolucion_factura->getotro_monto());	
					$devolucion_facturaLocal->setotro_porciento($devolucion_factura->getotro_porciento());	
					$devolucion_facturaLocal->sethora($devolucion_factura->gethora());	
					$devolucion_facturaLocal->setretencion_ica_porciento($devolucion_factura->getretencion_ica_porciento());	
					$devolucion_facturaLocal->setretencion_ica_monto($devolucion_factura->getretencion_ica_monto());	
					$devolucion_facturaLocal->setid_asiento($devolucion_factura->getid_asiento());	
					$devolucion_facturaLocal->setid_documento_cuenta_cobrar($devolucion_factura->getid_documento_cuenta_cobrar());	
					$devolucion_facturaLocal->setid_kardex($devolucion_factura->getid_kardex());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$devolucion_facturasLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$devolucion_facturasLocal=$this->devolucion_facturaLogic->getdevolucion_facturas();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$devolucion_facturasLocal=$this->devolucion_facturas;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $devolucion_facturasLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->devolucion_facturaLogic->getdevolucion_facturas() as $devolucion_factura) {
				if($devolucion_factura->getId()==$id) {
					$this->devolucion_facturaLogic->setdevolucion_factura($devolucion_factura);
					
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
		/*$devolucion_facturasSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->devolucion_facturas as $devolucion_factura) {
			$devolucion_factura->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->devolucion_facturas[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : devolucion_factura_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));
						
		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
		
		
		$this->devolucion_facturaReturnGeneral=new devolucion_factura_param_return();
		$this->devolucion_facturaParameterGeneral=new devolucion_factura_param_return();
			
		$this->devolucion_facturaParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualdevolucion_factura(this.devolucion_factura,true);
			this.setVariablesFormularioToObjetoActualForeignKeysdevolucion_factura(this.devolucion_factura);*/
			
			if($devolucion_factura_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualdevolucion_factura(this.devolucion_factura,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->devolucion_facturaActual=$this->devolucion_facturaClase;
				
				$this->setCopiarVariablesObjetos($this->devolucion_facturaActual,$this->devolucion_factura,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->devolucion_facturaReturnGeneral=$this->devolucion_facturaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->devolucion_facturaLogic->getdevolucion_facturas(),$this->devolucion_factura,$this->devolucion_facturaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($devolucion_factura_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeandevolucion_factura($classes,$this->devolucion_facturaReturnGeneral,$this->devolucion_facturaBean,false);*/
				}
					
				if($this->devolucion_facturaReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->devolucion_facturaReturnGeneral->getdevolucion_factura(),$this->devolucion_facturaActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeydevolucion_factura($this->devolucion_facturaReturnGeneral->getdevolucion_factura());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariodevolucion_factura($this->devolucion_facturaReturnGeneral->getdevolucion_factura());*/
				}
					
				if($this->devolucion_facturaReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->devolucion_facturaReturnGeneral->getdevolucion_factura(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->devolucion_factura,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(devolucion_facturaJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualdevolucion_factura(this.devolucion_factura,true);
				this.setVariablesFormularioToObjetoActualForeignKeysdevolucion_factura(this.devolucion_factura);				
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
				
				if($this->devolucion_facturaAnterior!=null) {
					$this->devolucion_factura=$this->devolucion_facturaAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->devolucion_facturaReturnGeneral=$this->devolucion_facturaLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->devolucion_facturaLogic->getdevolucion_facturas(),$this->devolucion_factura,$this->devolucion_facturaParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->devolucion_facturaReturnGeneral->getdevolucion_factura(),$this->devolucion_facturaLogic->getdevolucion_facturas());
			*/
		}
		
		return $this->devolucion_facturaReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->getNewConnexionToDeep();
			}

			$this->devolucion_facturaReturnGeneral=new devolucion_factura_param_return();			
			$this->devolucion_facturaParameterGeneral=new devolucion_factura_param_return();
			
			$this->devolucion_facturaParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->devolucion_facturaReturnGeneral=$this->devolucion_facturaLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->devolucion_facturas,$this->devolucion_facturaParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->devolucion_facturaReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->devolucion_facturaReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->commitNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->devolucion_facturaReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->rollbackNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
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
		
		$this->devolucion_facturaReturnGeneral=new devolucion_factura_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_devolucion_factura') {
		    $sDominio='devolucion_factura';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		if($sTipoControl=='id_cliente' || $sTipoControl=='form-id_cliente' || $sTipoControl=='form_devolucion_factura-id_cliente') {
			$sDominio='devolucion_factura';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$COMBOBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='COMBOBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->devolucion_facturaReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->devolucion_facturaReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='devolucion_factura';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='devolucion_factura';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='devolucion_factura';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->devolucion_facturaReturnGeneral=new devolucion_factura_param_return();
		$this->devolucion_facturaParameterGeneral=new devolucion_factura_param_return();
			
		$this->devolucion_facturaParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->devolucion_facturaReturnGeneral=$this->devolucion_facturaLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->devolucion_facturaLogic->getdevolucion_facturas(),$this->devolucion_factura,$this->devolucion_facturaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->devolucion_facturaReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->devolucion_facturaReturnGeneral->getdevolucion_factura(),$classes);*/
		}									
	
		if($this->devolucion_facturaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->devolucion_facturaReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->devolucion_facturaReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $devolucion_facturas,devolucion_factura $devolucion_factura) {
		
		$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));
						
		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(devolucion_factura_util::$CLASSNAME);
			}	
			*/
			
			$this->devolucion_facturaReturnGeneral=new devolucion_factura_param_return();
			$this->devolucion_facturaParameterGeneral=new devolucion_factura_param_return();
			
			$this->devolucion_facturaParameterGeneral->setdata($this->data);
		
		
			
			if($devolucion_factura_session->conGuardarRelaciones) {
				$classes[]=devolucion_factura_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
			}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->devolucion_facturaActual,$this->devolucion_factura,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->devolucion_facturaReturnGeneral=$this->devolucion_facturaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->devolucion_facturaLogic->getdevolucion_facturas(),$this->devolucion_facturaActual,$this->devolucion_facturaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->devolucion_facturaReturnGeneral=$this->devolucion_facturaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$devolucion_facturas,$devolucion_factura,$this->devolucion_facturaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModeldevolucion_factura($this->devolucion_facturaLogic->getdevolucion_factura());*/
			
			$this->devolucion_factura=$this->devolucion_facturaLogic->getdevolucion_factura();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->devolucion_factura);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->commitNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->rollbackNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$devolucion_facturaActual=new devolucion_factura();
			
			if($this->devolucion_facturaClase==null) {		
				$this->devolucion_facturaClase=new devolucion_factura();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$devolucion_facturaActual=$this->devolucion_facturas[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $devolucion_facturaActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $devolucion_facturaActual->setruc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $devolucion_facturaActual->setreferencia_cliente($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $devolucion_facturaActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_vendedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_termino_pago_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $devolucion_facturaActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_moneda((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $devolucion_facturaActual->setcotizacion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $devolucion_facturaActual->setdireccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $devolucion_facturaActual->setenviar_a($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $devolucion_facturaActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $devolucion_facturaActual->setimpuesto_en_precio(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_22')));  } else { $devolucion_facturaActual->setimpuesto_en_precio(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $devolucion_facturaActual->setsub_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $devolucion_facturaActual->setdescuento_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $devolucion_facturaActual->setdescuento_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $devolucion_facturaActual->setiva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $devolucion_facturaActual->setiva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $devolucion_facturaActual->setretencion_fuente_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $devolucion_facturaActual->setretencion_fuente_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $devolucion_facturaActual->setretencion_iva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $devolucion_facturaActual->setretencion_iva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $devolucion_facturaActual->settotal((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $devolucion_facturaActual->setotro_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $devolucion_facturaActual->setotro_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $devolucion_facturaActual->sethora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_35')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $devolucion_facturaActual->setretencion_ica_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $devolucion_facturaActual->setretencion_ica_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_37'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_asiento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_documento_cuenta_cobrar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_39'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $devolucion_facturaActual->setid_kardex((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }

				$this->devolucion_facturaClase=$devolucion_facturaActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->devolucion_facturaModel->set($this->devolucion_facturaClase);
				
				/*$this->devolucion_facturaModel->set($this->migrarModeldevolucion_factura($this->devolucion_facturaClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->devolucion_facturas=$this->migrarModeldevolucion_factura($this->devolucion_facturaLogic->getdevolucion_facturas());							
		$this->devolucion_facturas=$this->devolucion_facturaLogic->getdevolucion_facturas();*/
		
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
			$this->Session->write(devolucion_factura_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$devolucion_factura_control_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($devolucion_factura_control_session==null) {
				$devolucion_factura_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($devolucion_factura_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(devolucion_factura_util::$STR_SESSION_NAME,$this);*/
		} else {
			$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));
			
			if($devolucion_factura_session==null) {
				$devolucion_factura_session=new devolucion_factura_session();
			}
			
			$this->set(devolucion_factura_util::$STR_SESSION_NAME, $devolucion_factura_session);
		}
	}
	
	public function setCopiarVariablesObjetos(devolucion_factura $devolucion_facturaOrigen,devolucion_factura $devolucion_factura,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($devolucion_factura==null) {
				$devolucion_factura=new devolucion_factura();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getId()!=null && $devolucion_facturaOrigen->getId()!=0)) {$devolucion_factura->setId($devolucion_facturaOrigen->getId());}}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getnumero()!=null && $devolucion_facturaOrigen->getnumero()!='')) {$devolucion_factura->setnumero($devolucion_facturaOrigen->getnumero());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getid_cliente()!=null && $devolucion_facturaOrigen->getid_cliente()!=-1)) {$devolucion_factura->setid_cliente($devolucion_facturaOrigen->getid_cliente());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getruc()!=null && $devolucion_facturaOrigen->getruc()!='')) {$devolucion_factura->setruc($devolucion_facturaOrigen->getruc());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getreferencia_cliente()!=null && $devolucion_facturaOrigen->getreferencia_cliente()!='')) {$devolucion_factura->setreferencia_cliente($devolucion_facturaOrigen->getreferencia_cliente());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getfecha_emision()!=null && $devolucion_facturaOrigen->getfecha_emision()!=date('Y-m-d'))) {$devolucion_factura->setfecha_emision($devolucion_facturaOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getid_vendedor()!=null && $devolucion_facturaOrigen->getid_vendedor()!=-1)) {$devolucion_factura->setid_vendedor($devolucion_facturaOrigen->getid_vendedor());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getid_termino_pago_cliente()!=null && $devolucion_facturaOrigen->getid_termino_pago_cliente()!=-1)) {$devolucion_factura->setid_termino_pago_cliente($devolucion_facturaOrigen->getid_termino_pago_cliente());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getfecha_vence()!=null && $devolucion_facturaOrigen->getfecha_vence()!=date('Y-m-d'))) {$devolucion_factura->setfecha_vence($devolucion_facturaOrigen->getfecha_vence());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getid_moneda()!=null && $devolucion_facturaOrigen->getid_moneda()!=-1)) {$devolucion_factura->setid_moneda($devolucion_facturaOrigen->getid_moneda());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getcotizacion()!=null && $devolucion_facturaOrigen->getcotizacion()!=0.0)) {$devolucion_factura->setcotizacion($devolucion_facturaOrigen->getcotizacion());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getid_estado()!=null && $devolucion_facturaOrigen->getid_estado()!=-1)) {$devolucion_factura->setid_estado($devolucion_facturaOrigen->getid_estado());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getdireccion()!=null && $devolucion_facturaOrigen->getdireccion()!='')) {$devolucion_factura->setdireccion($devolucion_facturaOrigen->getdireccion());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getenviar_a()!=null && $devolucion_facturaOrigen->getenviar_a()!='')) {$devolucion_factura->setenviar_a($devolucion_facturaOrigen->getenviar_a());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getobservacion()!=null && $devolucion_facturaOrigen->getobservacion()!='')) {$devolucion_factura->setobservacion($devolucion_facturaOrigen->getobservacion());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getimpuesto_en_precio()!=null && $devolucion_facturaOrigen->getimpuesto_en_precio()!=false)) {$devolucion_factura->setimpuesto_en_precio($devolucion_facturaOrigen->getimpuesto_en_precio());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getsub_total()!=null && $devolucion_facturaOrigen->getsub_total()!=0.0)) {$devolucion_factura->setsub_total($devolucion_facturaOrigen->getsub_total());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getdescuento_monto()!=null && $devolucion_facturaOrigen->getdescuento_monto()!=0.0)) {$devolucion_factura->setdescuento_monto($devolucion_facturaOrigen->getdescuento_monto());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getdescuento_porciento()!=null && $devolucion_facturaOrigen->getdescuento_porciento()!=0.0)) {$devolucion_factura->setdescuento_porciento($devolucion_facturaOrigen->getdescuento_porciento());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getiva_monto()!=null && $devolucion_facturaOrigen->getiva_monto()!=0.0)) {$devolucion_factura->setiva_monto($devolucion_facturaOrigen->getiva_monto());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getiva_porciento()!=null && $devolucion_facturaOrigen->getiva_porciento()!=0.0)) {$devolucion_factura->setiva_porciento($devolucion_facturaOrigen->getiva_porciento());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getretencion_fuente_monto()!=null && $devolucion_facturaOrigen->getretencion_fuente_monto()!=0.0)) {$devolucion_factura->setretencion_fuente_monto($devolucion_facturaOrigen->getretencion_fuente_monto());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getretencion_fuente_porciento()!=null && $devolucion_facturaOrigen->getretencion_fuente_porciento()!=0.0)) {$devolucion_factura->setretencion_fuente_porciento($devolucion_facturaOrigen->getretencion_fuente_porciento());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getretencion_iva_monto()!=null && $devolucion_facturaOrigen->getretencion_iva_monto()!=0.0)) {$devolucion_factura->setretencion_iva_monto($devolucion_facturaOrigen->getretencion_iva_monto());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getretencion_iva_porciento()!=null && $devolucion_facturaOrigen->getretencion_iva_porciento()!=0.0)) {$devolucion_factura->setretencion_iva_porciento($devolucion_facturaOrigen->getretencion_iva_porciento());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->gettotal()!=null && $devolucion_facturaOrigen->gettotal()!=0.0)) {$devolucion_factura->settotal($devolucion_facturaOrigen->gettotal());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getotro_monto()!=null && $devolucion_facturaOrigen->getotro_monto()!=0.0)) {$devolucion_factura->setotro_monto($devolucion_facturaOrigen->getotro_monto());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getotro_porciento()!=null && $devolucion_facturaOrigen->getotro_porciento()!=0.0)) {$devolucion_factura->setotro_porciento($devolucion_facturaOrigen->getotro_porciento());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->gethora()!=null && $devolucion_facturaOrigen->gethora()!=date('Y-m-d'))) {$devolucion_factura->sethora($devolucion_facturaOrigen->gethora());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getretencion_ica_porciento()!=null && $devolucion_facturaOrigen->getretencion_ica_porciento()!=0.0)) {$devolucion_factura->setretencion_ica_porciento($devolucion_facturaOrigen->getretencion_ica_porciento());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getretencion_ica_monto()!=null && $devolucion_facturaOrigen->getretencion_ica_monto()!=0.0)) {$devolucion_factura->setretencion_ica_monto($devolucion_facturaOrigen->getretencion_ica_monto());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getid_asiento()!=null && $devolucion_facturaOrigen->getid_asiento()!=null)) {$devolucion_factura->setid_asiento($devolucion_facturaOrigen->getid_asiento());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getid_documento_cuenta_cobrar()!=null && $devolucion_facturaOrigen->getid_documento_cuenta_cobrar()!=null)) {$devolucion_factura->setid_documento_cuenta_cobrar($devolucion_facturaOrigen->getid_documento_cuenta_cobrar());}
			if($conDefault || ($conDefault==false && $devolucion_facturaOrigen->getid_kardex()!=null && $devolucion_facturaOrigen->getid_kardex()!=null)) {$devolucion_factura->setid_kardex($devolucion_facturaOrigen->getid_kardex());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$devolucion_facturasSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$devolucion_facturasSeleccionados[]=$this->devolucion_facturas[$indice];
			}
		}
		
		return $devolucion_facturasSeleccionados;
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
		$devolucion_factura= new devolucion_factura();
		
		foreach($this->devolucion_facturaLogic->getdevolucion_facturas() as $devolucion_factura) {
			
		$devolucion_factura->devolucionfacturadetalles=array();
		}		
		
		if($devolucion_factura!=null);
	}
	
	public function cargarRelaciones(array $devolucion_facturas=array()) : array {	
		
		$devolucion_facturasRespaldo = array();
		$devolucion_facturasLocal = array();
		
		devolucion_factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			devolucion_factura_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$devolucion_facturasResp=array();
		$classes=array();
			
		
				$class=new Classe('devolucion_factura_detalle'); 	$classes[]=$class;
			
			
		$devolucion_facturasRespaldo=$this->devolucion_facturaLogic->getdevolucion_facturas();
			
		$this->devolucion_facturaLogic->setIsConDeep(true);
		
		$this->devolucion_facturaLogic->setdevolucion_facturas($devolucion_facturas);
			
		$this->devolucion_facturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$devolucion_facturasLocal=$this->devolucion_facturaLogic->getdevolucion_facturas();
			
		/*RESPALDO*/
		$this->devolucion_facturaLogic->setdevolucion_facturas($devolucion_facturasRespaldo);
			
		$this->devolucion_facturaLogic->setIsConDeep(false);
		
		if($devolucion_facturasResp!=null);
		
		return $devolucion_facturasLocal;
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
				$this->devolucion_facturaLogic->rollbackNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(devolucion_factura_session $devolucion_factura_session) {
		$devolucion_factura_session->strTypeOnLoad=$this->strTypeOnLoaddevolucion_factura;
		$devolucion_factura_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliardevolucion_factura;
		$devolucion_factura_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliardevolucion_factura;
		$devolucion_factura_session->bitEsPopup=$this->bitEsPopup;
		$devolucion_factura_session->bitEsBusqueda=$this->bitEsBusqueda;
		$devolucion_factura_session->strFuncionJs=$this->strFuncionJs;
		/*$devolucion_factura_session->strSufijo=$this->strSufijo;*/
		$devolucion_factura_session->bitEsRelaciones=$this->bitEsRelaciones;
		$devolucion_factura_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, devolucion_factura_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosdevolucion_factura_detalle='none';
			$this->strTienePermisosdevolucion_factura_detalle=((Funciones::existeCadenaArray(devolucion_factura_detalle_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdevolucion_factura_detalle='table-cell';
		} else {
			

			$this->strTienePermisosdevolucion_factura_detalle='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdevolucion_factura_detalle=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, devolucion_factura_detalle_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdevolucion_factura_detalle='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$devolucion_facturaViewAdditional=new devolucion_facturaView_add();
		$devolucion_facturaViewAdditional->devolucion_facturas=$this->devolucion_facturas;
		$devolucion_facturaViewAdditional->Session=$this->Session;
		
		return $devolucion_facturaViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$devolucion_facturasLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$devolucion_facturasLocal=$this->devolucion_facturas;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$devolucion_facturasLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($devolucion_facturasLocal)<=0) {
					$devolucion_facturasLocal=$this->devolucion_facturas;
				}
			} else {
				$devolucion_facturasLocal=$this->devolucion_facturas;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardevolucion_facturasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardevolucion_facturasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$devolucion_facturaLogic=new devolucion_factura_logic();
		$devolucion_facturaLogic->setdevolucion_facturas($this->devolucion_facturas);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$devolucion_factura_detalle_session=unserialize($this->Session->read(devolucion_factura_detalle_util::$STR_SESSION_NAME));

		if($devolucion_factura_detalle_session==null) {
			$devolucion_factura_detalle_session=new devolucion_factura_detalle_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago_cliente');$classes[]=$class;
			$class=new Classe('moneda');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			$class=new Classe('asiento');$classes[]=$class;
			$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
			$class=new Classe('kardex');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$devolucion_facturaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->devolucion_facturas=$devolucion_facturaLogic->getdevolucion_facturas();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->devolucion_facturasLocal=$this->devolucion_facturas;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=devolucion_factura_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=devolucion_factura_util::$STR_TABLE_NAME;		
			
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
			
			$devolucion_facturas = $this->devolucion_facturas;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = devolucion_factura_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = devolucion_factura_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/facturacion/presentation/templating/devolucion_factura_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->devolucion_facturas=$devolucion_facturas;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->devolucion_facturasLocal=$devolucion_facturasLocal;
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
		
		$devolucion_facturasLocal=array();
		
		$devolucion_facturasLocal=$this->devolucion_facturas;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardevolucion_facturasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardevolucion_facturasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$devolucion_facturaLogic=new devolucion_factura_logic();
		$devolucion_facturaLogic->setdevolucion_facturas($this->devolucion_facturas);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$devolucion_factura_detalle_session=unserialize($this->Session->read(devolucion_factura_detalle_util::$STR_SESSION_NAME));

		if($devolucion_factura_detalle_session==null) {
			$devolucion_factura_detalle_session=new devolucion_factura_detalle_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago_cliente');$classes[]=$class;
			$class=new Classe('moneda');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			$class=new Classe('asiento');$classes[]=$class;
			$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
			$class=new Classe('kardex');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$devolucion_facturaLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->devolucion_facturas=$devolucion_facturaLogic->getdevolucion_facturas();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$devolucion_facturas = $this->devolucion_facturas;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = devolucion_factura_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = devolucion_factura_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/facturacion/presentation/templating/devolucion_factura_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->devolucion_facturas=$devolucion_facturas;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->devolucion_facturasLocal=$devolucion_facturasLocal;
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
	
	public function getHtmlTablaDatosResumen(array $devolucion_facturas=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->devolucion_facturasReporte = $devolucion_facturas;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardevolucion_facturasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardevolucion_facturasAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $devolucion_facturas=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->devolucion_facturasReporte = $devolucion_facturas;		
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
		
		
		$this->devolucion_facturasReporte=$this->cargarRelaciones($devolucion_facturas);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliardevolucion_facturasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliardevolucion_facturasAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(devolucion_factura $devolucion_factura=null) : string {	
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
			
			
			$devolucion_facturasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$devolucion_facturasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($devolucion_facturasLocal)<=0) {
					/*//DEBE ESCOGER
					$devolucion_facturasLocal=$this->devolucion_facturas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$devolucion_facturasLocal=$this->devolucion_facturas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($devolucion_facturasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($devolucion_facturasLocal,true);
			
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
				$this->devolucion_facturaLogic->getNewConnexionToDeep();
			}
					
			$devolucion_facturasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$devolucion_facturasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($devolucion_facturasLocal)<=0) {
					/*//DEBE ESCOGER
					$devolucion_facturasLocal=$this->devolucion_facturas;*/
				}
			} else {
				/*//DEBE ESCOGER
				$devolucion_facturasLocal=$this->devolucion_facturas;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($devolucion_facturasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($devolucion_facturasLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->commitNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->rollbackNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Devolucion Facturas';
			
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
			$fileName='devolucion_factura';
			
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
			
			$title='Reporte de  Devolucion Facturas';
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
			
			$title='Reporte de  Devolucion Facturas';
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
				$this->devolucion_facturaLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Devolucion Facturas';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->commitNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->devolucion_facturaLogic->rollbackNewConnexionToDeep();
				$this->devolucion_facturaLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=devolucion_factura_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->devolucion_facturasAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->devolucion_facturasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->devolucion_facturasAuxiliar)<=0) {
					$this->devolucion_facturasAuxiliar=$this->devolucion_facturas;
				}
			} else {
				$this->devolucion_facturasAuxiliar=$this->devolucion_facturas;
			}
		/*} else {
			$this->devolucion_facturasAuxiliar=$this->devolucion_facturasReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->devolucion_facturasAuxiliar as $devolucion_factura) {
				$row=array();
				
				$row=devolucion_factura_util::getDataReportRow($tipo,$devolucion_factura,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			devolucion_factura_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			devolucion_factura_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$devolucion_facturasResp=array();
			$classes=array();
			
			
				$class=new Classe('devolucion_factura_detalle'); 	$classes[]=$class;
			
			
			$devolucion_facturasResp=$this->devolucion_facturaLogic->getdevolucion_facturas();
			
			$this->devolucion_facturaLogic->setIsConDeep(true);
			
			$this->devolucion_facturaLogic->setdevolucion_facturas($this->devolucion_facturasAuxiliar);
			
			$this->devolucion_facturaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->devolucion_facturasAuxiliar=$this->devolucion_facturaLogic->getdevolucion_facturas();
			
			//RESPALDO
			$this->devolucion_facturaLogic->setdevolucion_facturas($devolucion_facturasResp);
			
			$this->devolucion_facturaLogic->setIsConDeep(false);
			*/
			
			$this->devolucion_facturasAuxiliar=$this->cargarRelaciones($this->devolucion_facturasAuxiliar);
			
			$i=0;
			
			foreach ($this->devolucion_facturasAuxiliar as $devolucion_factura) {
				$row=array();
				
				if($i!=0) {
					$row=devolucion_factura_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=devolucion_factura_util::getDataReportRow($tipo,$devolucion_factura,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//devolucion_factura_detalle
				if(Funciones::existeCadenaArrayOrderBy(devolucion_factura_detalle_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($devolucion_factura->getdevolucion_factura_detalles())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(devolucion_factura_detalle_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=devolucion_factura_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($devolucion_factura->getdevolucion_factura_detalles() as $devolucion_factura_detalle) {
						$row=devolucion_factura_detalle_util::getDataReportRow('RELACIONADO',$devolucion_factura_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->devolucion_facturasAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->devolucion_facturasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->devolucion_facturasAuxiliar)<=0) {
					$this->devolucion_facturasAuxiliar=$this->devolucion_facturas;
				}
			} else {
				$this->devolucion_facturasAuxiliar=$this->devolucion_facturas;
			}
		/*} else {
			$this->devolucion_facturasAuxiliar=$this->devolucion_facturasReporte;	
		}*/
		
		foreach ($this->devolucion_facturasAuxiliar as $devolucion_factura) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(devolucion_factura_util::getdevolucion_facturaDescripcion($devolucion_factura),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getnumero(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ruc',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ruc',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getruc(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Referencia Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Referencia Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getreferencia_cliente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Vendedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Vendedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_vendedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Terminos Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Terminos Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_termino_pago_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Vence',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vence',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getfecha_vence(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Moneda',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Moneda',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_monedaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cotizacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cotizacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getcotizacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Estado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_estadoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getdireccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Enviar a',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Enviar a',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getenviar_a(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Observacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getobservacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto En Precio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto En Precio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getimpuesto_en_precio(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sub Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getsub_total(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getdescuento_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getdescuento_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iva',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getiva_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iva %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getiva_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Fuente Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Fuente Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getretencion_fuente_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Fuente %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Fuente %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getretencion_fuente_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Iva Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Iva Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getretencion_iva_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Iva %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Iva %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getretencion_iva_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->gettotal(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Miscel',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Miscel',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getotro_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Miscel %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Miscel %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getotro_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Hora',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Hora',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->gethora(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Ica %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Ica %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getretencion_ica_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Ica Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Ica Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getretencion_ica_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Asiento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Asiento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_asientoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Docs Cc',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Docs Cc',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_documento_cuenta_cobrarDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Kardex',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Kardex',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_kardexDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface devolucion_factura_base_controlI {			
		
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
		public function getIndiceActual(devolucion_factura $devolucion_factura,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(devolucion_factura $devolucion_factura,array $devolucion_facturas);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : devolucion_factura_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $devolucion_facturas,devolucion_factura $devolucion_factura);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(devolucion_factura_param_return $devolucion_facturaReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(devolucion_factura_session $devolucion_factura_session);		
		public function actualizarInvitadoSessionDivStyleVariables(devolucion_factura_session $devolucion_factura_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(devolucion_factura $devolucion_facturaOrigen,devolucion_factura $devolucion_factura,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(devolucion_factura_control $devolucion_factura_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $devolucion_facturas=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(devolucion_factura_session $devolucion_factura_session);		
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
		public function getHtmlTablaDatosResumen(array $devolucion_facturas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $devolucion_facturas=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(devolucion_factura $devolucion_factura=null) : string;
		
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
