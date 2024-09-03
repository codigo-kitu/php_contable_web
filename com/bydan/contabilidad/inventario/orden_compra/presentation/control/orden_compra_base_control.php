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

namespace com\bydan\contabilidad\inventario\orden_compra\presentation\control;

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

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/orden_compra/util/orden_compra_carga.php');
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;

use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_param_return;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic_add;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;


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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

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

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\entity\documento_cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\business\logic\documento_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

//REL


use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_util;
use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\session\orden_compra_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
orden_compra_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
orden_compra_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class orden_compra_base_control extends orden_compra_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->orden_compraClase==null) {		
				$this->orden_compraClase=new orden_compra();
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
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_vendedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_vendedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_termino_pago_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_moneda')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_moneda',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_estado',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_asiento')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_asiento',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_documento_cuenta_pagar')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_documento_cuenta_pagar',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_kardex')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_kardex',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->orden_compraClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->orden_compraClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->orden_compraClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->orden_compraClase->setid_sucursal((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sucursal'));
				
				$this->orden_compraClase->setid_ejercicio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ejercicio'));
				
				$this->orden_compraClase->setid_periodo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_periodo'));
				
				$this->orden_compraClase->setid_usuario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_usuario'));
				
				$this->orden_compraClase->setnumero($this->getDataCampoFormTabla('form'.$this->strSufijo,'numero'));
				
				$this->orden_compraClase->setid_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor'));
				
				$this->orden_compraClase->setruc($this->getDataCampoFormTabla('form'.$this->strSufijo,'ruc'));
				
				$this->orden_compraClase->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_emision')));
				
				$this->orden_compraClase->setid_vendedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_vendedor'));
				
				$this->orden_compraClase->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_proveedor'));
				
				$this->orden_compraClase->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_vence')));
				
				$this->orden_compraClase->setcotizacion((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cotizacion'));
				
				$this->orden_compraClase->setid_moneda((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_moneda'));
				
				$this->orden_compraClase->setimpuesto_en_precio(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto_en_precio')));
				
				$this->orden_compraClase->setid_estado((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_estado'));
				
				$this->orden_compraClase->setdireccion($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion'));
				
				$this->orden_compraClase->setenviar($this->getDataCampoFormTabla('form'.$this->strSufijo,'enviar'));
				
				$this->orden_compraClase->setobservacion($this->getDataCampoFormTabla('form'.$this->strSufijo,'observacion'));
				
				$this->orden_compraClase->setsub_total((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'sub_total'));
				
				$this->orden_compraClase->setdescuento_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_monto'));
				
				$this->orden_compraClase->setdescuento_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'descuento_porciento'));
				
				$this->orden_compraClase->setiva_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'iva_monto'));
				
				$this->orden_compraClase->setiva_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'iva_porciento'));
				
				$this->orden_compraClase->setretencion_fuente_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_fuente_monto'));
				
				$this->orden_compraClase->setretencion_fuente_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_fuente_porciento'));
				
				$this->orden_compraClase->setretencion_iva_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_iva_monto'));
				
				$this->orden_compraClase->setretencion_iva_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_iva_porciento'));
				
				$this->orden_compraClase->settotal((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'total'));
				
				$this->orden_compraClase->setotro_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'otro_monto'));
				
				$this->orden_compraClase->setotro_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'otro_porciento'));
				
				$this->orden_compraClase->setretencion_ica_monto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_ica_monto'));
				
				$this->orden_compraClase->setretencion_ica_porciento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_ica_porciento'));
				
				$this->orden_compraClase->setfactura_proveedor($this->getDataCampoFormTabla('form'.$this->strSufijo,'factura_proveedor'));
				
				$this->orden_compraClase->setrecibida(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'recibida')));
				
				$this->orden_compraClase->setpagos((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'pagos'));
				
				$this->orden_compraClase->setid_asiento((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_asiento'));
				
				$this->orden_compraClase->setid_documento_cuenta_pagar((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_documento_cuenta_pagar'));
				
				$this->orden_compraClase->setid_kardex((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_kardex'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->orden_compraModel->set($this->orden_compraClase);
				
				/*$this->orden_compraModel->set($this->migrarModelorden_compra($this->orden_compraClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->orden_compraLogic->getorden_compra()->setId($this->orden_compraClase->getId());	
			$this->orden_compraLogic->getorden_compra()->setVersionRow($this->orden_compraClase->getVersionRow());	
			$this->orden_compraLogic->getorden_compra()->setVersionRow($this->orden_compraClase->getVersionRow());	
			$this->orden_compraLogic->getorden_compra()->setid_empresa($this->orden_compraClase->getid_empresa());	
			$this->orden_compraLogic->getorden_compra()->setid_sucursal($this->orden_compraClase->getid_sucursal());	
			$this->orden_compraLogic->getorden_compra()->setid_ejercicio($this->orden_compraClase->getid_ejercicio());	
			$this->orden_compraLogic->getorden_compra()->setid_periodo($this->orden_compraClase->getid_periodo());	
			$this->orden_compraLogic->getorden_compra()->setid_usuario($this->orden_compraClase->getid_usuario());	
			$this->orden_compraLogic->getorden_compra()->setnumero($this->orden_compraClase->getnumero());	
			$this->orden_compraLogic->getorden_compra()->setid_proveedor($this->orden_compraClase->getid_proveedor());	
			$this->orden_compraLogic->getorden_compra()->setruc($this->orden_compraClase->getruc());	
			$this->orden_compraLogic->getorden_compra()->setfecha_emision($this->orden_compraClase->getfecha_emision());	
			$this->orden_compraLogic->getorden_compra()->setid_vendedor($this->orden_compraClase->getid_vendedor());	
			$this->orden_compraLogic->getorden_compra()->setid_termino_pago_proveedor($this->orden_compraClase->getid_termino_pago_proveedor());	
			$this->orden_compraLogic->getorden_compra()->setfecha_vence($this->orden_compraClase->getfecha_vence());	
			$this->orden_compraLogic->getorden_compra()->setcotizacion($this->orden_compraClase->getcotizacion());	
			$this->orden_compraLogic->getorden_compra()->setid_moneda($this->orden_compraClase->getid_moneda());	
			$this->orden_compraLogic->getorden_compra()->setimpuesto_en_precio($this->orden_compraClase->getimpuesto_en_precio());	
			$this->orden_compraLogic->getorden_compra()->setid_estado($this->orden_compraClase->getid_estado());	
			$this->orden_compraLogic->getorden_compra()->setdireccion($this->orden_compraClase->getdireccion());	
			$this->orden_compraLogic->getorden_compra()->setenviar($this->orden_compraClase->getenviar());	
			$this->orden_compraLogic->getorden_compra()->setobservacion($this->orden_compraClase->getobservacion());	
			$this->orden_compraLogic->getorden_compra()->setsub_total($this->orden_compraClase->getsub_total());	
			$this->orden_compraLogic->getorden_compra()->setdescuento_monto($this->orden_compraClase->getdescuento_monto());	
			$this->orden_compraLogic->getorden_compra()->setdescuento_porciento($this->orden_compraClase->getdescuento_porciento());	
			$this->orden_compraLogic->getorden_compra()->setiva_monto($this->orden_compraClase->getiva_monto());	
			$this->orden_compraLogic->getorden_compra()->setiva_porciento($this->orden_compraClase->getiva_porciento());	
			$this->orden_compraLogic->getorden_compra()->setretencion_fuente_monto($this->orden_compraClase->getretencion_fuente_monto());	
			$this->orden_compraLogic->getorden_compra()->setretencion_fuente_porciento($this->orden_compraClase->getretencion_fuente_porciento());	
			$this->orden_compraLogic->getorden_compra()->setretencion_iva_monto($this->orden_compraClase->getretencion_iva_monto());	
			$this->orden_compraLogic->getorden_compra()->setretencion_iva_porciento($this->orden_compraClase->getretencion_iva_porciento());	
			$this->orden_compraLogic->getorden_compra()->settotal($this->orden_compraClase->gettotal());	
			$this->orden_compraLogic->getorden_compra()->setotro_monto($this->orden_compraClase->getotro_monto());	
			$this->orden_compraLogic->getorden_compra()->setotro_porciento($this->orden_compraClase->getotro_porciento());	
			$this->orden_compraLogic->getorden_compra()->setretencion_ica_monto($this->orden_compraClase->getretencion_ica_monto());	
			$this->orden_compraLogic->getorden_compra()->setretencion_ica_porciento($this->orden_compraClase->getretencion_ica_porciento());	
			$this->orden_compraLogic->getorden_compra()->setfactura_proveedor($this->orden_compraClase->getfactura_proveedor());	
			$this->orden_compraLogic->getorden_compra()->setrecibida($this->orden_compraClase->getrecibida());	
			$this->orden_compraLogic->getorden_compra()->setpagos($this->orden_compraClase->getpagos());	
			$this->orden_compraLogic->getorden_compra()->setid_asiento($this->orden_compraClase->getid_asiento());	
			$this->orden_compraLogic->getorden_compra()->setid_documento_cuenta_pagar($this->orden_compraClase->getid_documento_cuenta_pagar());	
			$this->orden_compraLogic->getorden_compra()->setid_kardex($this->orden_compraClase->getid_kardex());	
		} else {
			$this->orden_compraClase->setId($this->orden_compraLogic->getorden_compra()->getId());	
			$this->orden_compraClase->setVersionRow($this->orden_compraLogic->getorden_compra()->getVersionRow());	
			$this->orden_compraClase->setVersionRow($this->orden_compraLogic->getorden_compra()->getVersionRow());	
			$this->orden_compraClase->setid_empresa($this->orden_compraLogic->getorden_compra()->getid_empresa());	
			$this->orden_compraClase->setid_sucursal($this->orden_compraLogic->getorden_compra()->getid_sucursal());	
			$this->orden_compraClase->setid_ejercicio($this->orden_compraLogic->getorden_compra()->getid_ejercicio());	
			$this->orden_compraClase->setid_periodo($this->orden_compraLogic->getorden_compra()->getid_periodo());	
			$this->orden_compraClase->setid_usuario($this->orden_compraLogic->getorden_compra()->getid_usuario());	
			$this->orden_compraClase->setnumero($this->orden_compraLogic->getorden_compra()->getnumero());	
			$this->orden_compraClase->setid_proveedor($this->orden_compraLogic->getorden_compra()->getid_proveedor());	
			$this->orden_compraClase->setruc($this->orden_compraLogic->getorden_compra()->getruc());	
			$this->orden_compraClase->setfecha_emision($this->orden_compraLogic->getorden_compra()->getfecha_emision());	
			$this->orden_compraClase->setid_vendedor($this->orden_compraLogic->getorden_compra()->getid_vendedor());	
			$this->orden_compraClase->setid_termino_pago_proveedor($this->orden_compraLogic->getorden_compra()->getid_termino_pago_proveedor());	
			$this->orden_compraClase->setfecha_vence($this->orden_compraLogic->getorden_compra()->getfecha_vence());	
			$this->orden_compraClase->setcotizacion($this->orden_compraLogic->getorden_compra()->getcotizacion());	
			$this->orden_compraClase->setid_moneda($this->orden_compraLogic->getorden_compra()->getid_moneda());	
			$this->orden_compraClase->setimpuesto_en_precio($this->orden_compraLogic->getorden_compra()->getimpuesto_en_precio());	
			$this->orden_compraClase->setid_estado($this->orden_compraLogic->getorden_compra()->getid_estado());	
			$this->orden_compraClase->setdireccion($this->orden_compraLogic->getorden_compra()->getdireccion());	
			$this->orden_compraClase->setenviar($this->orden_compraLogic->getorden_compra()->getenviar());	
			$this->orden_compraClase->setobservacion($this->orden_compraLogic->getorden_compra()->getobservacion());	
			$this->orden_compraClase->setsub_total($this->orden_compraLogic->getorden_compra()->getsub_total());	
			$this->orden_compraClase->setdescuento_monto($this->orden_compraLogic->getorden_compra()->getdescuento_monto());	
			$this->orden_compraClase->setdescuento_porciento($this->orden_compraLogic->getorden_compra()->getdescuento_porciento());	
			$this->orden_compraClase->setiva_monto($this->orden_compraLogic->getorden_compra()->getiva_monto());	
			$this->orden_compraClase->setiva_porciento($this->orden_compraLogic->getorden_compra()->getiva_porciento());	
			$this->orden_compraClase->setretencion_fuente_monto($this->orden_compraLogic->getorden_compra()->getretencion_fuente_monto());	
			$this->orden_compraClase->setretencion_fuente_porciento($this->orden_compraLogic->getorden_compra()->getretencion_fuente_porciento());	
			$this->orden_compraClase->setretencion_iva_monto($this->orden_compraLogic->getorden_compra()->getretencion_iva_monto());	
			$this->orden_compraClase->setretencion_iva_porciento($this->orden_compraLogic->getorden_compra()->getretencion_iva_porciento());	
			$this->orden_compraClase->settotal($this->orden_compraLogic->getorden_compra()->gettotal());	
			$this->orden_compraClase->setotro_monto($this->orden_compraLogic->getorden_compra()->getotro_monto());	
			$this->orden_compraClase->setotro_porciento($this->orden_compraLogic->getorden_compra()->getotro_porciento());	
			$this->orden_compraClase->setretencion_ica_monto($this->orden_compraLogic->getorden_compra()->getretencion_ica_monto());	
			$this->orden_compraClase->setretencion_ica_porciento($this->orden_compraLogic->getorden_compra()->getretencion_ica_porciento());	
			$this->orden_compraClase->setfactura_proveedor($this->orden_compraLogic->getorden_compra()->getfactura_proveedor());	
			$this->orden_compraClase->setrecibida($this->orden_compraLogic->getorden_compra()->getrecibida());	
			$this->orden_compraClase->setpagos($this->orden_compraLogic->getorden_compra()->getpagos());	
			$this->orden_compraClase->setid_asiento($this->orden_compraLogic->getorden_compra()->getid_asiento());	
			$this->orden_compraClase->setid_documento_cuenta_pagar($this->orden_compraLogic->getorden_compra()->getid_documento_cuenta_pagar());	
			$this->orden_compraClase->setid_kardex($this->orden_compraLogic->getorden_compra()->getid_kardex());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->orden_compraModel->invalidFieldsMe();
		
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
		if($strNombreCampo=='id_proveedor') {$this->strMensajeid_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='ruc') {$this->strMensajeruc=$strMensajeCampo;}
		if($strNombreCampo=='fecha_emision') {$this->strMensajefecha_emision=$strMensajeCampo;}
		if($strNombreCampo=='id_vendedor') {$this->strMensajeid_vendedor=$strMensajeCampo;}
		if($strNombreCampo=='id_termino_pago_proveedor') {$this->strMensajeid_termino_pago_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='fecha_vence') {$this->strMensajefecha_vence=$strMensajeCampo;}
		if($strNombreCampo=='cotizacion') {$this->strMensajecotizacion=$strMensajeCampo;}
		if($strNombreCampo=='id_moneda') {$this->strMensajeid_moneda=$strMensajeCampo;}
		if($strNombreCampo=='impuesto_en_precio') {$this->strMensajeimpuesto_en_precio=$strMensajeCampo;}
		if($strNombreCampo=='id_estado') {$this->strMensajeid_estado=$strMensajeCampo;}
		if($strNombreCampo=='direccion') {$this->strMensajedireccion=$strMensajeCampo;}
		if($strNombreCampo=='enviar') {$this->strMensajeenviar=$strMensajeCampo;}
		if($strNombreCampo=='observacion') {$this->strMensajeobservacion=$strMensajeCampo;}
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
		if($strNombreCampo=='retencion_ica_monto') {$this->strMensajeretencion_ica_monto=$strMensajeCampo;}
		if($strNombreCampo=='retencion_ica_porciento') {$this->strMensajeretencion_ica_porciento=$strMensajeCampo;}
		if($strNombreCampo=='factura_proveedor') {$this->strMensajefactura_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='recibida') {$this->strMensajerecibida=$strMensajeCampo;}
		if($strNombreCampo=='pagos') {$this->strMensajepagos=$strMensajeCampo;}
		if($strNombreCampo=='id_asiento') {$this->strMensajeid_asiento=$strMensajeCampo;}
		if($strNombreCampo=='id_documento_cuenta_pagar') {$this->strMensajeid_documento_cuenta_pagar=$strMensajeCampo;}
		if($strNombreCampo=='id_kardex') {$this->strMensajeid_kardex=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_sucursal='';
		$this->strMensajeid_ejercicio='';
		$this->strMensajeid_periodo='';
		$this->strMensajeid_usuario='';
		$this->strMensajenumero='';
		$this->strMensajeid_proveedor='';
		$this->strMensajeruc='';
		$this->strMensajefecha_emision='';
		$this->strMensajeid_vendedor='';
		$this->strMensajeid_termino_pago_proveedor='';
		$this->strMensajefecha_vence='';
		$this->strMensajecotizacion='';
		$this->strMensajeid_moneda='';
		$this->strMensajeimpuesto_en_precio='';
		$this->strMensajeid_estado='';
		$this->strMensajedireccion='';
		$this->strMensajeenviar='';
		$this->strMensajeobservacion='';
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
		$this->strMensajeretencion_ica_monto='';
		$this->strMensajeretencion_ica_porciento='';
		$this->strMensajefactura_proveedor='';
		$this->strMensajerecibida='';
		$this->strMensajepagos='';
		$this->strMensajeid_asiento='';
		$this->strMensajeid_documento_cuenta_pagar='';
		$this->strMensajeid_kardex='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->commitNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->rollbackNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
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
				$this->orden_compraLogic->getNewConnexionToDeep();
			}

			$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));
						
			if($orden_compra_session==null) {
				$orden_compra_session=new orden_compra_session();
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
						$this->orden_compraLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->orden_compraActual =$this->orden_compraClase;
			
			/*$this->orden_compraActual =$this->migrarModelorden_compra($this->orden_compraClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->commitNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->orden_compraLogic->getorden_compras(),$this->orden_compraActual);
			
			$this->actualizarControllerConReturnGeneral($this->orden_compraReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->rollbackNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->getNewConnexionToDeep();
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
				$this->orden_compraLogic->commitNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->rollbackNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$orden_comprasLocal=$this->getListaActual();
		
		$iIndice=orden_compra_util::getIndiceNuevo($orden_comprasLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(orden_compra $orden_compra,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$orden_comprasLocal=$this->getListaActual();
		
		$iIndice=orden_compra_util::getIndiceActual($orden_comprasLocal,$orden_compra,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoorden_compra')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->orden_compraActual =$this->orden_compraClase;
			
			/*$this->orden_compraActual =$this->migrarModelorden_compra($this->orden_compraClase);*/
			
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
			
			$this->orden_compraLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('moneda');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				$class=new Classe('asiento');$classes[]=$class;
				$class=new Classe('documento_cuenta_pagar');$classes[]=$class;
				$class=new Classe('kardex');$classes[]=$class;
			
			$this->orden_compraLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->orden_compraLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->orden_compraLogic->setorden_compra(new orden_compra());
				
				$this->orden_compraLogic->getorden_compra()->setIsNew(true);
				$this->orden_compraLogic->getorden_compra()->setIsChanged(true);
				$this->orden_compraLogic->getorden_compra()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->orden_compraModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->orden_compraLogic->orden_compras[]=$this->orden_compraLogic->getorden_compra();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->orden_compraLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompradetalles=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME.'Lista'));
							$ordencompradetallesEliminados=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompradetalles=array_merge($ordencompradetalles,$ordencompradetallesEliminados);
							
							$this->orden_compraLogic->saveRelaciones($this->orden_compraLogic->getorden_compra(),$ordencompradetalles);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->orden_compraLogic->getorden_compra()->setIsChanged(true);
				$this->orden_compraLogic->getorden_compra()->setIsNew(false);
				$this->orden_compraLogic->getorden_compra()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->orden_compraModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->orden_compraLogic->getorden_compra(),$this->orden_compraLogic->getorden_compras());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->orden_compraLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompradetalles=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME.'Lista'));
							$ordencompradetallesEliminados=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompradetalles=array_merge($ordencompradetalles,$ordencompradetallesEliminados);
							
							$this->orden_compraLogic->saveRelaciones($this->orden_compraLogic->getorden_compra(),$ordencompradetalles);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->orden_compraLogic->getorden_compra()->setIsDeleted(true);
				$this->orden_compraLogic->getorden_compra()->setIsNew(false);
				$this->orden_compraLogic->getorden_compra()->setIsChanged(false);				
				
				$this->actualizarLista($this->orden_compraLogic->getorden_compra(),$this->orden_compraLogic->getorden_compras());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->orden_compraLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompradetalles=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME.'Lista'));
							$ordencompradetallesEliminados=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompradetalles=array_merge($ordencompradetalles,$ordencompradetallesEliminados);

							foreach($ordencompradetalles as $ordencompradetalle1) {
								$ordencompradetalle1->setIsDeleted(true);
							}
							
						$this->orden_compraLogic->saveRelaciones($this->orden_compraLogic->getorden_compra(),$ordencompradetalles);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->orden_comprasEliminados[]=$this->orden_compraLogic->getorden_compra();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->orden_compraLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompradetalles=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME.'Lista'));
							$ordencompradetallesEliminados=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompradetalles=array_merge($ordencompradetalles,$ordencompradetallesEliminados);
							
						$this->orden_compraLogic->saveRelaciones($this->orden_compraLogic->getorden_compra(),$ordencompradetalles);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->orden_comprasEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->orden_compraLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->orden_compraLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->orden_comprasEliminados=array();
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
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('moneda');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				$class=new Classe('asiento');$classes[]=$class;
				$class=new Classe('documento_cuenta_pagar');$classes[]=$class;
				$class=new Classe('kardex');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->orden_compraLogic->setorden_compras();*/
					
					$this->orden_compraLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->orden_compraLogic->setIsConDeepLoad(false);
			
			$this->orden_compras=$this->orden_compraLogic->getorden_compras();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(orden_compra_util::$STR_SESSION_NAME.'Lista',serialize($this->orden_compras));
				$this->Session->write(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->orden_comprasEliminados));
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
				$this->orden_compraLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->commitNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->rollbackNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
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
				$this->orden_compraLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalorden_compra;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->orden_compraLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->orden_compras as $orden_compraLocal) {
				if($this->orden_compraLogic->getorden_compra()->getId()==$orden_compraLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->orden_compraLogic->getorden_compra()->setIsDeleted(true);
			$this->orden_comprasEliminados[]=$this->orden_compraLogic->getorden_compra();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->orden_compras[$indice]);
				
				$this->orden_compras = array_values($this->orden_compras);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelorden_compra($this->orden_compraClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->commitNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->rollbackNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(orden_compra $orden_compra,array $orden_compras) {
		try {
			foreach($orden_compras as $orden_compraLocal){ 
				if($orden_compraLocal->getId()==$orden_compra->getId()) {
					$orden_compraLocal->setIsChanged($orden_compra->getIsChanged());
					$orden_compraLocal->setIsNew($orden_compra->getIsNew());
					$orden_compraLocal->setIsDeleted($orden_compra->getIsDeleted());
					//$orden_compraLocal->setbitExpired($orden_compra->getbitExpired());
					
					$orden_compraLocal->setId($orden_compra->getId());	
					$orden_compraLocal->setVersionRow($orden_compra->getVersionRow());	
					$orden_compraLocal->setVersionRow($orden_compra->getVersionRow());	
					$orden_compraLocal->setid_empresa($orden_compra->getid_empresa());	
					$orden_compraLocal->setid_sucursal($orden_compra->getid_sucursal());	
					$orden_compraLocal->setid_ejercicio($orden_compra->getid_ejercicio());	
					$orden_compraLocal->setid_periodo($orden_compra->getid_periodo());	
					$orden_compraLocal->setid_usuario($orden_compra->getid_usuario());	
					$orden_compraLocal->setnumero($orden_compra->getnumero());	
					$orden_compraLocal->setid_proveedor($orden_compra->getid_proveedor());	
					$orden_compraLocal->setruc($orden_compra->getruc());	
					$orden_compraLocal->setfecha_emision($orden_compra->getfecha_emision());	
					$orden_compraLocal->setid_vendedor($orden_compra->getid_vendedor());	
					$orden_compraLocal->setid_termino_pago_proveedor($orden_compra->getid_termino_pago_proveedor());	
					$orden_compraLocal->setfecha_vence($orden_compra->getfecha_vence());	
					$orden_compraLocal->setcotizacion($orden_compra->getcotizacion());	
					$orden_compraLocal->setid_moneda($orden_compra->getid_moneda());	
					$orden_compraLocal->setimpuesto_en_precio($orden_compra->getimpuesto_en_precio());	
					$orden_compraLocal->setid_estado($orden_compra->getid_estado());	
					$orden_compraLocal->setdireccion($orden_compra->getdireccion());	
					$orden_compraLocal->setenviar($orden_compra->getenviar());	
					$orden_compraLocal->setobservacion($orden_compra->getobservacion());	
					$orden_compraLocal->setsub_total($orden_compra->getsub_total());	
					$orden_compraLocal->setdescuento_monto($orden_compra->getdescuento_monto());	
					$orden_compraLocal->setdescuento_porciento($orden_compra->getdescuento_porciento());	
					$orden_compraLocal->setiva_monto($orden_compra->getiva_monto());	
					$orden_compraLocal->setiva_porciento($orden_compra->getiva_porciento());	
					$orden_compraLocal->setretencion_fuente_monto($orden_compra->getretencion_fuente_monto());	
					$orden_compraLocal->setretencion_fuente_porciento($orden_compra->getretencion_fuente_porciento());	
					$orden_compraLocal->setretencion_iva_monto($orden_compra->getretencion_iva_monto());	
					$orden_compraLocal->setretencion_iva_porciento($orden_compra->getretencion_iva_porciento());	
					$orden_compraLocal->settotal($orden_compra->gettotal());	
					$orden_compraLocal->setotro_monto($orden_compra->getotro_monto());	
					$orden_compraLocal->setotro_porciento($orden_compra->getotro_porciento());	
					$orden_compraLocal->setretencion_ica_monto($orden_compra->getretencion_ica_monto());	
					$orden_compraLocal->setretencion_ica_porciento($orden_compra->getretencion_ica_porciento());	
					$orden_compraLocal->setfactura_proveedor($orden_compra->getfactura_proveedor());	
					$orden_compraLocal->setrecibida($orden_compra->getrecibida());	
					$orden_compraLocal->setpagos($orden_compra->getpagos());	
					$orden_compraLocal->setid_asiento($orden_compra->getid_asiento());	
					$orden_compraLocal->setid_documento_cuenta_pagar($orden_compra->getid_documento_cuenta_pagar());	
					$orden_compraLocal->setid_kardex($orden_compra->getid_kardex());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$orden_comprasLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$orden_comprasLocal=$this->orden_compraLogic->getorden_compras();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$orden_comprasLocal=$this->orden_compras;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $orden_comprasLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->orden_compraLogic->getorden_compras() as $orden_compra) {
				if($orden_compra->getId()==$id) {
					$this->orden_compraLogic->setorden_compra($orden_compra);
					
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
		/*$orden_comprasSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->orden_compras as $orden_compra) {
			$orden_compra->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->orden_compras[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : orden_compra_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));
						
		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
		
		
		$this->orden_compraReturnGeneral=new orden_compra_param_return();
		$this->orden_compraParameterGeneral=new orden_compra_param_return();
			
		$this->orden_compraParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualorden_compra(this.orden_compra,true);
			this.setVariablesFormularioToObjetoActualForeignKeysorden_compra(this.orden_compra);*/
			
			if($orden_compra_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualorden_compra(this.orden_compra,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->orden_compraActual=$this->orden_compraClase;
				
				$this->setCopiarVariablesObjetos($this->orden_compraActual,$this->orden_compra,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->orden_compraReturnGeneral=$this->orden_compraLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->orden_compraLogic->getorden_compras(),$this->orden_compra,$this->orden_compraParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($orden_compra_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanorden_compra($classes,$this->orden_compraReturnGeneral,$this->orden_compraBean,false);*/
				}
					
				if($this->orden_compraReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->orden_compraReturnGeneral->getorden_compra(),$this->orden_compraActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyorden_compra($this->orden_compraReturnGeneral->getorden_compra());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioorden_compra($this->orden_compraReturnGeneral->getorden_compra());*/
				}
					
				if($this->orden_compraReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->orden_compraReturnGeneral->getorden_compra(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->orden_compra,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(orden_compraJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualorden_compra(this.orden_compra,true);
				this.setVariablesFormularioToObjetoActualForeignKeysorden_compra(this.orden_compra);				
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
				
				if($this->orden_compraAnterior!=null) {
					$this->orden_compra=$this->orden_compraAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->orden_compraReturnGeneral=$this->orden_compraLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->orden_compraLogic->getorden_compras(),$this->orden_compra,$this->orden_compraParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->orden_compraReturnGeneral->getorden_compra(),$this->orden_compraLogic->getorden_compras());
			*/
		}
		
		return $this->orden_compraReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->getNewConnexionToDeep();
			}

			$this->orden_compraReturnGeneral=new orden_compra_param_return();			
			$this->orden_compraParameterGeneral=new orden_compra_param_return();
			
			$this->orden_compraParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->orden_compraReturnGeneral=$this->orden_compraLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->orden_compras,$this->orden_compraParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->orden_compraReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->orden_compraReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->commitNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->orden_compraReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->rollbackNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
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
		
		$this->orden_compraReturnGeneral=new orden_compra_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_orden_compra') {
		    $sDominio='orden_compra';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		if($sTipoControl=='id_proveedor' || $sTipoControl=='form-id_proveedor' || $sTipoControl=='form_orden_compra-id_proveedor') {
			$sDominio='orden_compra';		$eventoGlobalTipo=EventoGlobalTipo::$CONTROL_CHANGE;	$controlTipo=ControlTipo::$COMBOBOX;
			$eventoTipo=EventoTipo::$CHANGE;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='COMBOBOX';
			$classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->orden_compraReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->orden_compraReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='orden_compra';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='orden_compra';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='orden_compra';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->orden_compraReturnGeneral=new orden_compra_param_return();
		$this->orden_compraParameterGeneral=new orden_compra_param_return();
			
		$this->orden_compraParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->orden_compraReturnGeneral=$this->orden_compraLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->orden_compraLogic->getorden_compras(),$this->orden_compra,$this->orden_compraParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->orden_compraReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->orden_compraReturnGeneral->getorden_compra(),$classes);*/
		}									
	
		if($this->orden_compraReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->orden_compraReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->orden_compraReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $orden_compras,orden_compra $orden_compra) {
		
		$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));
						
		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(orden_compra_util::$CLASSNAME);
			}	
			*/
			
			$this->orden_compraReturnGeneral=new orden_compra_param_return();
			$this->orden_compraParameterGeneral=new orden_compra_param_return();
			
			$this->orden_compraParameterGeneral->setdata($this->data);
		
		
			
			if($orden_compra_session->conGuardarRelaciones) {
				$classes[]=orden_compra_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
			}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->orden_compraActual,$this->orden_compra,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->orden_compraReturnGeneral=$this->orden_compraLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->orden_compraLogic->getorden_compras(),$this->orden_compraActual,$this->orden_compraParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->orden_compraReturnGeneral=$this->orden_compraLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$orden_compras,$orden_compra,$this->orden_compraParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelorden_compra($this->orden_compraLogic->getorden_compra());*/
			
			$this->orden_compra=$this->orden_compraLogic->getorden_compra();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->orden_compra);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->commitNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->rollbackNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$orden_compraActual=new orden_compra();
			
			if($this->orden_compraClase==null) {		
				$this->orden_compraClase=new orden_compra();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$orden_compraActual=$this->orden_compras[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $orden_compraActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $orden_compraActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $orden_compraActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $orden_compraActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $orden_compraActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $orden_compraActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $orden_compraActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $orden_compraActual->setruc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $orden_compraActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $orden_compraActual->setid_vendedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $orden_compraActual->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $orden_compraActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $orden_compraActual->setcotizacion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $orden_compraActual->setid_moneda((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $orden_compraActual->setimpuesto_en_precio(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_17')));  } else { $orden_compraActual->setimpuesto_en_precio(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $orden_compraActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $orden_compraActual->setdireccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $orden_compraActual->setenviar($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $orden_compraActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $orden_compraActual->setsub_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $orden_compraActual->setdescuento_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $orden_compraActual->setdescuento_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $orden_compraActual->setiva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $orden_compraActual->setiva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $orden_compraActual->setretencion_fuente_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $orden_compraActual->setretencion_fuente_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $orden_compraActual->setretencion_iva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $orden_compraActual->setretencion_iva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $orden_compraActual->settotal((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $orden_compraActual->setotro_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $orden_compraActual->setotro_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $orden_compraActual->setretencion_ica_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $orden_compraActual->setretencion_ica_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_35'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $orden_compraActual->setfactura_proveedor($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $orden_compraActual->setrecibida(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_37')));  } else { $orden_compraActual->setrecibida(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $orden_compraActual->setpagos((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $orden_compraActual->setid_asiento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_39'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $orden_compraActual->setid_documento_cuenta_pagar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $orden_compraActual->setid_kardex((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_41'));  }

				$this->orden_compraClase=$orden_compraActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->orden_compraModel->set($this->orden_compraClase);
				
				/*$this->orden_compraModel->set($this->migrarModelorden_compra($this->orden_compraClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->orden_compras=$this->migrarModelorden_compra($this->orden_compraLogic->getorden_compras());							
		$this->orden_compras=$this->orden_compraLogic->getorden_compras();*/
		
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
			$this->Session->write(orden_compra_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$orden_compra_control_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($orden_compra_control_session==null) {
				$orden_compra_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($orden_compra_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(orden_compra_util::$STR_SESSION_NAME,$this);*/
		} else {
			$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));
			
			if($orden_compra_session==null) {
				$orden_compra_session=new orden_compra_session();
			}
			
			$this->set(orden_compra_util::$STR_SESSION_NAME, $orden_compra_session);
		}
	}
	
	public function setCopiarVariablesObjetos(orden_compra $orden_compraOrigen,orden_compra $orden_compra,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($orden_compra==null) {
				$orden_compra=new orden_compra();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $orden_compraOrigen->getId()!=null && $orden_compraOrigen->getId()!=0)) {$orden_compra->setId($orden_compraOrigen->getId());}}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getnumero()!=null && $orden_compraOrigen->getnumero()!='')) {$orden_compra->setnumero($orden_compraOrigen->getnumero());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getid_proveedor()!=null && $orden_compraOrigen->getid_proveedor()!=-1)) {$orden_compra->setid_proveedor($orden_compraOrigen->getid_proveedor());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getruc()!=null && $orden_compraOrigen->getruc()!='')) {$orden_compra->setruc($orden_compraOrigen->getruc());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getfecha_emision()!=null && $orden_compraOrigen->getfecha_emision()!=date('Y-m-d'))) {$orden_compra->setfecha_emision($orden_compraOrigen->getfecha_emision());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getid_vendedor()!=null && $orden_compraOrigen->getid_vendedor()!=-1)) {$orden_compra->setid_vendedor($orden_compraOrigen->getid_vendedor());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getid_termino_pago_proveedor()!=null && $orden_compraOrigen->getid_termino_pago_proveedor()!=-1)) {$orden_compra->setid_termino_pago_proveedor($orden_compraOrigen->getid_termino_pago_proveedor());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getfecha_vence()!=null && $orden_compraOrigen->getfecha_vence()!=date('Y-m-d'))) {$orden_compra->setfecha_vence($orden_compraOrigen->getfecha_vence());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getcotizacion()!=null && $orden_compraOrigen->getcotizacion()!=0.0)) {$orden_compra->setcotizacion($orden_compraOrigen->getcotizacion());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getid_moneda()!=null && $orden_compraOrigen->getid_moneda()!=-1)) {$orden_compra->setid_moneda($orden_compraOrigen->getid_moneda());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getimpuesto_en_precio()!=null && $orden_compraOrigen->getimpuesto_en_precio()!=false)) {$orden_compra->setimpuesto_en_precio($orden_compraOrigen->getimpuesto_en_precio());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getid_estado()!=null && $orden_compraOrigen->getid_estado()!=-1)) {$orden_compra->setid_estado($orden_compraOrigen->getid_estado());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getdireccion()!=null && $orden_compraOrigen->getdireccion()!='')) {$orden_compra->setdireccion($orden_compraOrigen->getdireccion());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getenviar()!=null && $orden_compraOrigen->getenviar()!='')) {$orden_compra->setenviar($orden_compraOrigen->getenviar());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getobservacion()!=null && $orden_compraOrigen->getobservacion()!='')) {$orden_compra->setobservacion($orden_compraOrigen->getobservacion());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getsub_total()!=null && $orden_compraOrigen->getsub_total()!=0.0)) {$orden_compra->setsub_total($orden_compraOrigen->getsub_total());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getdescuento_monto()!=null && $orden_compraOrigen->getdescuento_monto()!=0.0)) {$orden_compra->setdescuento_monto($orden_compraOrigen->getdescuento_monto());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getdescuento_porciento()!=null && $orden_compraOrigen->getdescuento_porciento()!=0.0)) {$orden_compra->setdescuento_porciento($orden_compraOrigen->getdescuento_porciento());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getiva_monto()!=null && $orden_compraOrigen->getiva_monto()!=0.0)) {$orden_compra->setiva_monto($orden_compraOrigen->getiva_monto());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getiva_porciento()!=null && $orden_compraOrigen->getiva_porciento()!=0.0)) {$orden_compra->setiva_porciento($orden_compraOrigen->getiva_porciento());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getretencion_fuente_monto()!=null && $orden_compraOrigen->getretencion_fuente_monto()!=0.0)) {$orden_compra->setretencion_fuente_monto($orden_compraOrigen->getretencion_fuente_monto());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getretencion_fuente_porciento()!=null && $orden_compraOrigen->getretencion_fuente_porciento()!=0.0)) {$orden_compra->setretencion_fuente_porciento($orden_compraOrigen->getretencion_fuente_porciento());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getretencion_iva_monto()!=null && $orden_compraOrigen->getretencion_iva_monto()!=0.0)) {$orden_compra->setretencion_iva_monto($orden_compraOrigen->getretencion_iva_monto());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getretencion_iva_porciento()!=null && $orden_compraOrigen->getretencion_iva_porciento()!=0.0)) {$orden_compra->setretencion_iva_porciento($orden_compraOrigen->getretencion_iva_porciento());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->gettotal()!=null && $orden_compraOrigen->gettotal()!=0.0)) {$orden_compra->settotal($orden_compraOrigen->gettotal());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getotro_monto()!=null && $orden_compraOrigen->getotro_monto()!=0.0)) {$orden_compra->setotro_monto($orden_compraOrigen->getotro_monto());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getotro_porciento()!=null && $orden_compraOrigen->getotro_porciento()!=0.0)) {$orden_compra->setotro_porciento($orden_compraOrigen->getotro_porciento());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getretencion_ica_monto()!=null && $orden_compraOrigen->getretencion_ica_monto()!=0.0)) {$orden_compra->setretencion_ica_monto($orden_compraOrigen->getretencion_ica_monto());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getretencion_ica_porciento()!=null && $orden_compraOrigen->getretencion_ica_porciento()!=0.0)) {$orden_compra->setretencion_ica_porciento($orden_compraOrigen->getretencion_ica_porciento());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getfactura_proveedor()!=null && $orden_compraOrigen->getfactura_proveedor()!='')) {$orden_compra->setfactura_proveedor($orden_compraOrigen->getfactura_proveedor());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getrecibida()!=null && $orden_compraOrigen->getrecibida()!=false)) {$orden_compra->setrecibida($orden_compraOrigen->getrecibida());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getpagos()!=null && $orden_compraOrigen->getpagos()!=0.0)) {$orden_compra->setpagos($orden_compraOrigen->getpagos());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getid_asiento()!=null && $orden_compraOrigen->getid_asiento()!=null)) {$orden_compra->setid_asiento($orden_compraOrigen->getid_asiento());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getid_documento_cuenta_pagar()!=null && $orden_compraOrigen->getid_documento_cuenta_pagar()!=null)) {$orden_compra->setid_documento_cuenta_pagar($orden_compraOrigen->getid_documento_cuenta_pagar());}
			if($conDefault || ($conDefault==false && $orden_compraOrigen->getid_kardex()!=null && $orden_compraOrigen->getid_kardex()!=null)) {$orden_compra->setid_kardex($orden_compraOrigen->getid_kardex());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$orden_comprasSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$orden_comprasSeleccionados[]=$this->orden_compras[$indice];
			}
		}
		
		return $orden_comprasSeleccionados;
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
		$orden_compra= new orden_compra();
		
		foreach($this->orden_compraLogic->getorden_compras() as $orden_compra) {
			
		$orden_compra->ordencompradetalles=array();
		}		
		
		if($orden_compra!=null);
	}
	
	public function cargarRelaciones(array $orden_compras=array()) : array {	
		
		$orden_comprasRespaldo = array();
		$orden_comprasLocal = array();
		
		orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			orden_compra_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$orden_comprasResp=array();
		$classes=array();
			
		
				$class=new Classe('orden_compra_detalle'); 	$classes[]=$class;
			
			
		$orden_comprasRespaldo=$this->orden_compraLogic->getorden_compras();
			
		$this->orden_compraLogic->setIsConDeep(true);
		
		$this->orden_compraLogic->setorden_compras($orden_compras);
			
		$this->orden_compraLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$orden_comprasLocal=$this->orden_compraLogic->getorden_compras();
			
		/*RESPALDO*/
		$this->orden_compraLogic->setorden_compras($orden_comprasRespaldo);
			
		$this->orden_compraLogic->setIsConDeep(false);
		
		if($orden_comprasResp!=null);
		
		return $orden_comprasLocal;
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
				$this->orden_compraLogic->rollbackNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(orden_compra_session $orden_compra_session) {
		$orden_compra_session->strTypeOnLoad=$this->strTypeOnLoadorden_compra;
		$orden_compra_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarorden_compra;
		$orden_compra_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarorden_compra;
		$orden_compra_session->bitEsPopup=$this->bitEsPopup;
		$orden_compra_session->bitEsBusqueda=$this->bitEsBusqueda;
		$orden_compra_session->strFuncionJs=$this->strFuncionJs;
		/*$orden_compra_session->strSufijo=$this->strSufijo;*/
		$orden_compra_session->bitEsRelaciones=$this->bitEsRelaciones;
		$orden_compra_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, orden_compra_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosorden_compra_detalle='none';
			$this->strTienePermisosorden_compra_detalle=((Funciones::existeCadenaArray(orden_compra_detalle_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosorden_compra_detalle='table-cell';
		} else {
			

			$this->strTienePermisosorden_compra_detalle='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosorden_compra_detalle=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, orden_compra_detalle_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosorden_compra_detalle='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$orden_compraViewAdditional=new orden_compraView_add();
		$orden_compraViewAdditional->orden_compras=$this->orden_compras;
		$orden_compraViewAdditional->Session=$this->Session;
		
		return $orden_compraViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$orden_comprasLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$orden_comprasLocal=$this->orden_compras;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$orden_comprasLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($orden_comprasLocal)<=0) {
					$orden_comprasLocal=$this->orden_compras;
				}
			} else {
				$orden_comprasLocal=$this->orden_compras;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarorden_comprasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarorden_comprasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$orden_compraLogic=new orden_compra_logic();
		$orden_compraLogic->setorden_compras($this->orden_compras);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));

		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('moneda');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			$class=new Classe('asiento');$classes[]=$class;
			$class=new Classe('documento_cuenta_pagar');$classes[]=$class;
			$class=new Classe('kardex');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$orden_compraLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->orden_compras=$orden_compraLogic->getorden_compras();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->orden_comprasLocal=$this->orden_compras;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=orden_compra_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=orden_compra_util::$STR_TABLE_NAME;		
			
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
			
			$orden_compras = $this->orden_compras;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = orden_compra_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = orden_compra_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/inventario/presentation/templating/orden_compra_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->orden_compras=$orden_compras;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->orden_comprasLocal=$orden_comprasLocal;
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
		
		$orden_comprasLocal=array();
		
		$orden_comprasLocal=$this->orden_compras;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarorden_comprasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarorden_comprasAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$orden_compraLogic=new orden_compra_logic();
		$orden_compraLogic->setorden_compras($this->orden_compras);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));

		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('moneda');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			$class=new Classe('asiento');$classes[]=$class;
			$class=new Classe('documento_cuenta_pagar');$classes[]=$class;
			$class=new Classe('kardex');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$orden_compraLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->orden_compras=$orden_compraLogic->getorden_compras();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$orden_compras = $this->orden_compras;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = orden_compra_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = orden_compra_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/inventario/presentation/templating/orden_compra_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->orden_compras=$orden_compras;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->orden_comprasLocal=$orden_comprasLocal;
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
	
	public function getHtmlTablaDatosResumen(array $orden_compras=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->orden_comprasReporte = $orden_compras;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarorden_comprasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarorden_comprasAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $orden_compras=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->orden_comprasReporte = $orden_compras;		
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
		
		
		$this->orden_comprasReporte=$this->cargarRelaciones($orden_compras);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarorden_comprasAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarorden_comprasAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(orden_compra $orden_compra=null) : string {	
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
			
			
			$orden_comprasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$orden_comprasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($orden_comprasLocal)<=0) {
					/*//DEBE ESCOGER
					$orden_comprasLocal=$this->orden_compras;*/
				}
			} else {
				/*//DEBE ESCOGER
				$orden_comprasLocal=$this->orden_compras;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($orden_comprasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($orden_comprasLocal,true);
			
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
				$this->orden_compraLogic->getNewConnexionToDeep();
			}
					
			$orden_comprasLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$orden_comprasLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($orden_comprasLocal)<=0) {
					/*//DEBE ESCOGER
					$orden_comprasLocal=$this->orden_compras;*/
				}
			} else {
				/*//DEBE ESCOGER
				$orden_comprasLocal=$this->orden_compras;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($orden_comprasLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($orden_comprasLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->commitNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->rollbackNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Orden Compras';
			
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
			$fileName='orden_compra';
			
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
			
			$title='Reporte de  Orden Compras';
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
			
			$title='Reporte de  Orden Compras';
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
				$this->orden_compraLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Orden Compras';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->commitNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compraLogic->rollbackNewConnexionToDeep();
				$this->orden_compraLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=orden_compra_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->orden_comprasAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->orden_comprasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->orden_comprasAuxiliar)<=0) {
					$this->orden_comprasAuxiliar=$this->orden_compras;
				}
			} else {
				$this->orden_comprasAuxiliar=$this->orden_compras;
			}
		/*} else {
			$this->orden_comprasAuxiliar=$this->orden_comprasReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->orden_comprasAuxiliar as $orden_compra) {
				$row=array();
				
				$row=orden_compra_util::getDataReportRow($tipo,$orden_compra,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			orden_compra_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			orden_compra_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$orden_comprasResp=array();
			$classes=array();
			
			
				$class=new Classe('orden_compra_detalle'); 	$classes[]=$class;
			
			
			$orden_comprasResp=$this->orden_compraLogic->getorden_compras();
			
			$this->orden_compraLogic->setIsConDeep(true);
			
			$this->orden_compraLogic->setorden_compras($this->orden_comprasAuxiliar);
			
			$this->orden_compraLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->orden_comprasAuxiliar=$this->orden_compraLogic->getorden_compras();
			
			//RESPALDO
			$this->orden_compraLogic->setorden_compras($orden_comprasResp);
			
			$this->orden_compraLogic->setIsConDeep(false);
			*/
			
			$this->orden_comprasAuxiliar=$this->cargarRelaciones($this->orden_comprasAuxiliar);
			
			$i=0;
			
			foreach ($this->orden_comprasAuxiliar as $orden_compra) {
				$row=array();
				
				if($i!=0) {
					$row=orden_compra_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=orden_compra_util::getDataReportRow($tipo,$orden_compra,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//orden_compra_detalle
				if(Funciones::existeCadenaArrayOrderBy(orden_compra_detalle_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($orden_compra->getorden_compra_detalles())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(orden_compra_detalle_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=orden_compra_detalle_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($orden_compra->getorden_compra_detalles() as $orden_compra_detalle) {
						$row=orden_compra_detalle_util::getDataReportRow('RELACIONADO',$orden_compra_detalle,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->orden_comprasAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->orden_comprasAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->orden_comprasAuxiliar)<=0) {
					$this->orden_comprasAuxiliar=$this->orden_compras;
				}
			} else {
				$this->orden_comprasAuxiliar=$this->orden_compras;
			}
		/*} else {
			$this->orden_comprasAuxiliar=$this->orden_comprasReporte;	
		}*/
		
		foreach ($this->orden_comprasAuxiliar as $orden_compra) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(orden_compra_util::getorden_compraDescripcion($orden_compra),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sucursal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sucursal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_sucursalDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ejercicio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_ejercicioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Periodo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Periodo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_periodoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Usuario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Usuario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_usuarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Numero',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getnumero(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ruc',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ruc',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getruc(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getfecha_emision(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Vendedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Vendedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_vendedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Terminos Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Terminos Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_termino_pago_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Vence',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vence',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getfecha_vence(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cotizacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cotizacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getcotizacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Moneda',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Moneda',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_monedaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto En Precio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto En Precio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getimpuesto_en_precio(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Estado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_estadoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getdireccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Enviar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Enviar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getenviar(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Observacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getobservacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sub Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getsub_total(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getdescuento_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descuento %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getdescuento_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iva',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getiva_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Iva %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getiva_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Fuente Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Fuente Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getretencion_fuente_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Fuente %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Fuente %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getretencion_fuente_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Iva Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Iva Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getretencion_iva_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Iva %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Iva %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getretencion_iva_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->gettotal(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Miscel',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Miscel',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getotro_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Miscel %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Miscel %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getotro_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Ica Monto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Ica Monto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getretencion_ica_monto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ret.Ica %',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Ica %',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getretencion_ica_porciento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nro Factura Proveedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Factura Proveedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getfactura_proveedor(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Recibida',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Recibida',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getrecibida(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Pagos',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Pagos',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getpagos(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Asiento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Asiento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_asientoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Docuemento Cuenta por Pagar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Docuemento Cuenta por Pagar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_documento_cuenta_pagarDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Kardex',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Kardex',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra->getid_kardexDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface orden_compra_base_controlI {			
		
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
		public function getIndiceActual(orden_compra $orden_compra,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(orden_compra $orden_compra,array $orden_compras);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : orden_compra_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $orden_compras,orden_compra $orden_compra);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(orden_compra_param_return $orden_compraReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(orden_compra_session $orden_compra_session);		
		public function actualizarInvitadoSessionDivStyleVariables(orden_compra_session $orden_compra_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(orden_compra $orden_compraOrigen,orden_compra $orden_compra,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(orden_compra_control $orden_compra_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $orden_compras=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(orden_compra_session $orden_compra_session);		
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
		public function getHtmlTablaDatosResumen(array $orden_compras=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $orden_compras=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(orden_compra $orden_compra=null) : string;
		
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
