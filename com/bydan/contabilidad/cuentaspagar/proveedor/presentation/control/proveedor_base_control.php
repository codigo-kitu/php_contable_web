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

namespace com\bydan\contabilidad\cuentaspagar\proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/proveedor/util/proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\general\tipo_persona\business\logic\tipo_persona_logic;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_carga;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_util;

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\entity\categoria_proveedor;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\logic\categoria_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_util;

use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\entity\giro_negocio_proveedor;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\business\logic\giro_negocio_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\util\giro_negocio_proveedor_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\logic\retencion_fuente_logic;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_carga;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_util;

use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;
use com\bydan\contabilidad\facturacion\retencion_ica\business\logic\retencion_ica_logic;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

//REL


use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_carga;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_util;
use com\bydan\contabilidad\inventario\lista_precio\presentation\session\lista_precio_session;

use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\session\cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\presentation\session\imagen_proveedor_session;

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\session\documento_proveedor_session;

use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;
use com\bydan\contabilidad\inventario\otro_suplidor\presentation\session\otro_suplidor_session;


/*CARGA ARCHIVOS FRAMEWORK*/
proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class proveedor_base_control extends proveedor_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->proveedorClase==null) {		
				$this->proveedorClase=new proveedor();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_persona')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_persona',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_categoria_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_giro_negocio_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_giro_negocio_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_pais')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_pais',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_provincia')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_provincia',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ciudad')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ciudad',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_vendedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_vendedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_termino_pago_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_impuesto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_retencion',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_fuente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_retencion_fuente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_ica')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_retencion_ica',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_otro_impuesto',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->proveedorClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->proveedorClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->proveedorClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->proveedorClase->setid_tipo_persona((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_persona'));
				
				$this->proveedorClase->setid_categoria_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_proveedor'));
				
				$this->proveedorClase->setid_giro_negocio_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_giro_negocio_proveedor'));
				
				$this->proveedorClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->proveedorClase->setruc($this->getDataCampoFormTabla('form'.$this->strSufijo,'ruc'));
				
				$this->proveedorClase->setprimer_apellido($this->getDataCampoFormTabla('form'.$this->strSufijo,'primer_apellido'));
				
				$this->proveedorClase->setsegundo_apellido($this->getDataCampoFormTabla('form'.$this->strSufijo,'segundo_apellido'));
				
				$this->proveedorClase->setprimer_nombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'primer_nombre'));
				
				$this->proveedorClase->setsegundo_nombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'segundo_nombre'));
				
				$this->proveedorClase->setnombre_completo($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_completo'));
				
				$this->proveedorClase->setdireccion($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion'));
				
				$this->proveedorClase->settelefono($this->getDataCampoFormTabla('form'.$this->strSufijo,'telefono'));
				
				$this->proveedorClase->settelefono_movil($this->getDataCampoFormTabla('form'.$this->strSufijo,'telefono_movil'));
				
				$this->proveedorClase->sete_mail($this->getDataCampoFormTabla('form'.$this->strSufijo,'e_mail'));
				
				$this->proveedorClase->sete_mail2($this->getDataCampoFormTabla('form'.$this->strSufijo,'e_mail2'));
				
				$this->proveedorClase->setcomentario($this->getDataCampoFormTabla('form'.$this->strSufijo,'comentario'));
				
				$this->proveedorClase->setimagen($this->getDataCampoFormTabla('form'.$this->strSufijo,'imagen'));
				
				$this->proveedorClase->setactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'activo')));
				
				$this->proveedorClase->setid_pais((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_pais'));
				
				$this->proveedorClase->setid_provincia((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_provincia'));
				
				$this->proveedorClase->setid_ciudad((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ciudad'));
				
				$this->proveedorClase->setcodigo_postal($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo_postal'));
				
				$this->proveedorClase->setfax($this->getDataCampoFormTabla('form'.$this->strSufijo,'fax'));
				
				$this->proveedorClase->setcontacto($this->getDataCampoFormTabla('form'.$this->strSufijo,'contacto'));
				
				$this->proveedorClase->setid_vendedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_vendedor'));
				
				$this->proveedorClase->setmaximo_credito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'maximo_credito'));
				
				$this->proveedorClase->setmaximo_descuento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'maximo_descuento'));
				
				$this->proveedorClase->setinteres_anual((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'interes_anual'));
				
				$this->proveedorClase->setbalance((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'balance'));
				
				$this->proveedorClase->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_proveedor'));
				
				$this->proveedorClase->setid_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta'));
				
				$this->proveedorClase->setaplica_impuesto_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'aplica_impuesto_compras')));
				
				$this->proveedorClase->setid_impuesto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto'));
				
				$this->proveedorClase->setaplica_retencion_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'aplica_retencion_impuesto')));
				
				$this->proveedorClase->setid_retencion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion'));
				
				$this->proveedorClase->setaplica_retencion_fuente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'aplica_retencion_fuente')));
				
				$this->proveedorClase->setid_retencion_fuente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_fuente'));
				
				$this->proveedorClase->setaplica_retencion_ica(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'aplica_retencion_ica')));
				
				$this->proveedorClase->setid_retencion_ica((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_ica'));
				
				$this->proveedorClase->setaplica_2do_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'aplica_2do_impuesto')));
				
				$this->proveedorClase->setid_otro_impuesto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto'));
				
				$this->proveedorClase->setcreado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'creado')));
				
				$this->proveedorClase->setmonto_ultima_transaccion((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto_ultima_transaccion'));
				
				$this->proveedorClase->setfecha_ultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_ultima_transaccion')));
				
				$this->proveedorClase->setdescripcion_ultima_transaccion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion_ultima_transaccion'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->proveedorModel->set($this->proveedorClase);
				
				/*$this->proveedorModel->set($this->migrarModelproveedor($this->proveedorClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->proveedorLogic->getproveedor()->setId($this->proveedorClase->getId());	
			$this->proveedorLogic->getproveedor()->setVersionRow($this->proveedorClase->getVersionRow());	
			$this->proveedorLogic->getproveedor()->setVersionRow($this->proveedorClase->getVersionRow());	
			$this->proveedorLogic->getproveedor()->setid_empresa($this->proveedorClase->getid_empresa());	
			$this->proveedorLogic->getproveedor()->setid_tipo_persona($this->proveedorClase->getid_tipo_persona());	
			$this->proveedorLogic->getproveedor()->setid_categoria_proveedor($this->proveedorClase->getid_categoria_proveedor());	
			$this->proveedorLogic->getproveedor()->setid_giro_negocio_proveedor($this->proveedorClase->getid_giro_negocio_proveedor());	
			$this->proveedorLogic->getproveedor()->setcodigo($this->proveedorClase->getcodigo());	
			$this->proveedorLogic->getproveedor()->setruc($this->proveedorClase->getruc());	
			$this->proveedorLogic->getproveedor()->setprimer_apellido($this->proveedorClase->getprimer_apellido());	
			$this->proveedorLogic->getproveedor()->setsegundo_apellido($this->proveedorClase->getsegundo_apellido());	
			$this->proveedorLogic->getproveedor()->setprimer_nombre($this->proveedorClase->getprimer_nombre());	
			$this->proveedorLogic->getproveedor()->setsegundo_nombre($this->proveedorClase->getsegundo_nombre());	
			$this->proveedorLogic->getproveedor()->setnombre_completo($this->proveedorClase->getnombre_completo());	
			$this->proveedorLogic->getproveedor()->setdireccion($this->proveedorClase->getdireccion());	
			$this->proveedorLogic->getproveedor()->settelefono($this->proveedorClase->gettelefono());	
			$this->proveedorLogic->getproveedor()->settelefono_movil($this->proveedorClase->gettelefono_movil());	
			$this->proveedorLogic->getproveedor()->sete_mail($this->proveedorClase->gete_mail());	
			$this->proveedorLogic->getproveedor()->sete_mail2($this->proveedorClase->gete_mail2());	
			$this->proveedorLogic->getproveedor()->setcomentario($this->proveedorClase->getcomentario());	
			$this->proveedorLogic->getproveedor()->setimagen($this->proveedorClase->getimagen());	
			$this->proveedorLogic->getproveedor()->setactivo($this->proveedorClase->getactivo());	
			$this->proveedorLogic->getproveedor()->setid_pais($this->proveedorClase->getid_pais());	
			$this->proveedorLogic->getproveedor()->setid_provincia($this->proveedorClase->getid_provincia());	
			$this->proveedorLogic->getproveedor()->setid_ciudad($this->proveedorClase->getid_ciudad());	
			$this->proveedorLogic->getproveedor()->setcodigo_postal($this->proveedorClase->getcodigo_postal());	
			$this->proveedorLogic->getproveedor()->setfax($this->proveedorClase->getfax());	
			$this->proveedorLogic->getproveedor()->setcontacto($this->proveedorClase->getcontacto());	
			$this->proveedorLogic->getproveedor()->setid_vendedor($this->proveedorClase->getid_vendedor());	
			$this->proveedorLogic->getproveedor()->setmaximo_credito($this->proveedorClase->getmaximo_credito());	
			$this->proveedorLogic->getproveedor()->setmaximo_descuento($this->proveedorClase->getmaximo_descuento());	
			$this->proveedorLogic->getproveedor()->setinteres_anual($this->proveedorClase->getinteres_anual());	
			$this->proveedorLogic->getproveedor()->setbalance($this->proveedorClase->getbalance());	
			$this->proveedorLogic->getproveedor()->setid_termino_pago_proveedor($this->proveedorClase->getid_termino_pago_proveedor());	
			$this->proveedorLogic->getproveedor()->setid_cuenta($this->proveedorClase->getid_cuenta());	
			$this->proveedorLogic->getproveedor()->setaplica_impuesto_compras($this->proveedorClase->getaplica_impuesto_compras());	
			$this->proveedorLogic->getproveedor()->setid_impuesto($this->proveedorClase->getid_impuesto());	
			$this->proveedorLogic->getproveedor()->setaplica_retencion_impuesto($this->proveedorClase->getaplica_retencion_impuesto());	
			$this->proveedorLogic->getproveedor()->setid_retencion($this->proveedorClase->getid_retencion());	
			$this->proveedorLogic->getproveedor()->setaplica_retencion_fuente($this->proveedorClase->getaplica_retencion_fuente());	
			$this->proveedorLogic->getproveedor()->setid_retencion_fuente($this->proveedorClase->getid_retencion_fuente());	
			$this->proveedorLogic->getproveedor()->setaplica_retencion_ica($this->proveedorClase->getaplica_retencion_ica());	
			$this->proveedorLogic->getproveedor()->setid_retencion_ica($this->proveedorClase->getid_retencion_ica());	
			$this->proveedorLogic->getproveedor()->setaplica_2do_impuesto($this->proveedorClase->getaplica_2do_impuesto());	
			$this->proveedorLogic->getproveedor()->setid_otro_impuesto($this->proveedorClase->getid_otro_impuesto());	
			$this->proveedorLogic->getproveedor()->setcreado($this->proveedorClase->getcreado());	
			$this->proveedorLogic->getproveedor()->setmonto_ultima_transaccion($this->proveedorClase->getmonto_ultima_transaccion());	
			$this->proveedorLogic->getproveedor()->setfecha_ultima_transaccion($this->proveedorClase->getfecha_ultima_transaccion());	
			$this->proveedorLogic->getproveedor()->setdescripcion_ultima_transaccion($this->proveedorClase->getdescripcion_ultima_transaccion());	
		} else {
			$this->proveedorClase->setId($this->proveedorLogic->getproveedor()->getId());	
			$this->proveedorClase->setVersionRow($this->proveedorLogic->getproveedor()->getVersionRow());	
			$this->proveedorClase->setVersionRow($this->proveedorLogic->getproveedor()->getVersionRow());	
			$this->proveedorClase->setid_empresa($this->proveedorLogic->getproveedor()->getid_empresa());	
			$this->proveedorClase->setid_tipo_persona($this->proveedorLogic->getproveedor()->getid_tipo_persona());	
			$this->proveedorClase->setid_categoria_proveedor($this->proveedorLogic->getproveedor()->getid_categoria_proveedor());	
			$this->proveedorClase->setid_giro_negocio_proveedor($this->proveedorLogic->getproveedor()->getid_giro_negocio_proveedor());	
			$this->proveedorClase->setcodigo($this->proveedorLogic->getproveedor()->getcodigo());	
			$this->proveedorClase->setruc($this->proveedorLogic->getproveedor()->getruc());	
			$this->proveedorClase->setprimer_apellido($this->proveedorLogic->getproveedor()->getprimer_apellido());	
			$this->proveedorClase->setsegundo_apellido($this->proveedorLogic->getproveedor()->getsegundo_apellido());	
			$this->proveedorClase->setprimer_nombre($this->proveedorLogic->getproveedor()->getprimer_nombre());	
			$this->proveedorClase->setsegundo_nombre($this->proveedorLogic->getproveedor()->getsegundo_nombre());	
			$this->proveedorClase->setnombre_completo($this->proveedorLogic->getproveedor()->getnombre_completo());	
			$this->proveedorClase->setdireccion($this->proveedorLogic->getproveedor()->getdireccion());	
			$this->proveedorClase->settelefono($this->proveedorLogic->getproveedor()->gettelefono());	
			$this->proveedorClase->settelefono_movil($this->proveedorLogic->getproveedor()->gettelefono_movil());	
			$this->proveedorClase->sete_mail($this->proveedorLogic->getproveedor()->gete_mail());	
			$this->proveedorClase->sete_mail2($this->proveedorLogic->getproveedor()->gete_mail2());	
			$this->proveedorClase->setcomentario($this->proveedorLogic->getproveedor()->getcomentario());	
			$this->proveedorClase->setimagen($this->proveedorLogic->getproveedor()->getimagen());	
			$this->proveedorClase->setactivo($this->proveedorLogic->getproveedor()->getactivo());	
			$this->proveedorClase->setid_pais($this->proveedorLogic->getproveedor()->getid_pais());	
			$this->proveedorClase->setid_provincia($this->proveedorLogic->getproveedor()->getid_provincia());	
			$this->proveedorClase->setid_ciudad($this->proveedorLogic->getproveedor()->getid_ciudad());	
			$this->proveedorClase->setcodigo_postal($this->proveedorLogic->getproveedor()->getcodigo_postal());	
			$this->proveedorClase->setfax($this->proveedorLogic->getproveedor()->getfax());	
			$this->proveedorClase->setcontacto($this->proveedorLogic->getproveedor()->getcontacto());	
			$this->proveedorClase->setid_vendedor($this->proveedorLogic->getproveedor()->getid_vendedor());	
			$this->proveedorClase->setmaximo_credito($this->proveedorLogic->getproveedor()->getmaximo_credito());	
			$this->proveedorClase->setmaximo_descuento($this->proveedorLogic->getproveedor()->getmaximo_descuento());	
			$this->proveedorClase->setinteres_anual($this->proveedorLogic->getproveedor()->getinteres_anual());	
			$this->proveedorClase->setbalance($this->proveedorLogic->getproveedor()->getbalance());	
			$this->proveedorClase->setid_termino_pago_proveedor($this->proveedorLogic->getproveedor()->getid_termino_pago_proveedor());	
			$this->proveedorClase->setid_cuenta($this->proveedorLogic->getproveedor()->getid_cuenta());	
			$this->proveedorClase->setaplica_impuesto_compras($this->proveedorLogic->getproveedor()->getaplica_impuesto_compras());	
			$this->proveedorClase->setid_impuesto($this->proveedorLogic->getproveedor()->getid_impuesto());	
			$this->proveedorClase->setaplica_retencion_impuesto($this->proveedorLogic->getproveedor()->getaplica_retencion_impuesto());	
			$this->proveedorClase->setid_retencion($this->proveedorLogic->getproveedor()->getid_retencion());	
			$this->proveedorClase->setaplica_retencion_fuente($this->proveedorLogic->getproveedor()->getaplica_retencion_fuente());	
			$this->proveedorClase->setid_retencion_fuente($this->proveedorLogic->getproveedor()->getid_retencion_fuente());	
			$this->proveedorClase->setaplica_retencion_ica($this->proveedorLogic->getproveedor()->getaplica_retencion_ica());	
			$this->proveedorClase->setid_retencion_ica($this->proveedorLogic->getproveedor()->getid_retencion_ica());	
			$this->proveedorClase->setaplica_2do_impuesto($this->proveedorLogic->getproveedor()->getaplica_2do_impuesto());	
			$this->proveedorClase->setid_otro_impuesto($this->proveedorLogic->getproveedor()->getid_otro_impuesto());	
			$this->proveedorClase->setcreado($this->proveedorLogic->getproveedor()->getcreado());	
			$this->proveedorClase->setmonto_ultima_transaccion($this->proveedorLogic->getproveedor()->getmonto_ultima_transaccion());	
			$this->proveedorClase->setfecha_ultima_transaccion($this->proveedorLogic->getproveedor()->getfecha_ultima_transaccion());	
			$this->proveedorClase->setdescripcion_ultima_transaccion($this->proveedorLogic->getproveedor()->getdescripcion_ultima_transaccion());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->proveedorModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_persona') {$this->strMensajeid_tipo_persona=$strMensajeCampo;}
		if($strNombreCampo=='id_categoria_proveedor') {$this->strMensajeid_categoria_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='id_giro_negocio_proveedor') {$this->strMensajeid_giro_negocio_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='codigo') {$this->strMensajecodigo=$strMensajeCampo;}
		if($strNombreCampo=='ruc') {$this->strMensajeruc=$strMensajeCampo;}
		if($strNombreCampo=='primer_apellido') {$this->strMensajeprimer_apellido=$strMensajeCampo;}
		if($strNombreCampo=='segundo_apellido') {$this->strMensajesegundo_apellido=$strMensajeCampo;}
		if($strNombreCampo=='primer_nombre') {$this->strMensajeprimer_nombre=$strMensajeCampo;}
		if($strNombreCampo=='segundo_nombre') {$this->strMensajesegundo_nombre=$strMensajeCampo;}
		if($strNombreCampo=='nombre_completo') {$this->strMensajenombre_completo=$strMensajeCampo;}
		if($strNombreCampo=='direccion') {$this->strMensajedireccion=$strMensajeCampo;}
		if($strNombreCampo=='telefono') {$this->strMensajetelefono=$strMensajeCampo;}
		if($strNombreCampo=='telefono_movil') {$this->strMensajetelefono_movil=$strMensajeCampo;}
		if($strNombreCampo=='e_mail') {$this->strMensajee_mail=$strMensajeCampo;}
		if($strNombreCampo=='e_mail2') {$this->strMensajee_mail2=$strMensajeCampo;}
		if($strNombreCampo=='comentario') {$this->strMensajecomentario=$strMensajeCampo;}
		if($strNombreCampo=='imagen') {$this->strMensajeimagen=$strMensajeCampo;}
		if($strNombreCampo=='activo') {$this->strMensajeactivo=$strMensajeCampo;}
		if($strNombreCampo=='id_pais') {$this->strMensajeid_pais=$strMensajeCampo;}
		if($strNombreCampo=='id_provincia') {$this->strMensajeid_provincia=$strMensajeCampo;}
		if($strNombreCampo=='id_ciudad') {$this->strMensajeid_ciudad=$strMensajeCampo;}
		if($strNombreCampo=='codigo_postal') {$this->strMensajecodigo_postal=$strMensajeCampo;}
		if($strNombreCampo=='fax') {$this->strMensajefax=$strMensajeCampo;}
		if($strNombreCampo=='contacto') {$this->strMensajecontacto=$strMensajeCampo;}
		if($strNombreCampo=='id_vendedor') {$this->strMensajeid_vendedor=$strMensajeCampo;}
		if($strNombreCampo=='maximo_credito') {$this->strMensajemaximo_credito=$strMensajeCampo;}
		if($strNombreCampo=='maximo_descuento') {$this->strMensajemaximo_descuento=$strMensajeCampo;}
		if($strNombreCampo=='interes_anual') {$this->strMensajeinteres_anual=$strMensajeCampo;}
		if($strNombreCampo=='balance') {$this->strMensajebalance=$strMensajeCampo;}
		if($strNombreCampo=='id_termino_pago_proveedor') {$this->strMensajeid_termino_pago_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta') {$this->strMensajeid_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='aplica_impuesto_compras') {$this->strMensajeaplica_impuesto_compras=$strMensajeCampo;}
		if($strNombreCampo=='id_impuesto') {$this->strMensajeid_impuesto=$strMensajeCampo;}
		if($strNombreCampo=='aplica_retencion_impuesto') {$this->strMensajeaplica_retencion_impuesto=$strMensajeCampo;}
		if($strNombreCampo=='id_retencion') {$this->strMensajeid_retencion=$strMensajeCampo;}
		if($strNombreCampo=='aplica_retencion_fuente') {$this->strMensajeaplica_retencion_fuente=$strMensajeCampo;}
		if($strNombreCampo=='id_retencion_fuente') {$this->strMensajeid_retencion_fuente=$strMensajeCampo;}
		if($strNombreCampo=='aplica_retencion_ica') {$this->strMensajeaplica_retencion_ica=$strMensajeCampo;}
		if($strNombreCampo=='id_retencion_ica') {$this->strMensajeid_retencion_ica=$strMensajeCampo;}
		if($strNombreCampo=='aplica_2do_impuesto') {$this->strMensajeaplica_2do_impuesto=$strMensajeCampo;}
		if($strNombreCampo=='id_otro_impuesto') {$this->strMensajeid_otro_impuesto=$strMensajeCampo;}
		if($strNombreCampo=='creado') {$this->strMensajecreado=$strMensajeCampo;}
		if($strNombreCampo=='monto_ultima_transaccion') {$this->strMensajemonto_ultima_transaccion=$strMensajeCampo;}
		if($strNombreCampo=='fecha_ultima_transaccion') {$this->strMensajefecha_ultima_transaccion=$strMensajeCampo;}
		if($strNombreCampo=='descripcion_ultima_transaccion') {$this->strMensajedescripcion_ultima_transaccion=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_tipo_persona='';
		$this->strMensajeid_categoria_proveedor='';
		$this->strMensajeid_giro_negocio_proveedor='';
		$this->strMensajecodigo='';
		$this->strMensajeruc='';
		$this->strMensajeprimer_apellido='';
		$this->strMensajesegundo_apellido='';
		$this->strMensajeprimer_nombre='';
		$this->strMensajesegundo_nombre='';
		$this->strMensajenombre_completo='';
		$this->strMensajedireccion='';
		$this->strMensajetelefono='';
		$this->strMensajetelefono_movil='';
		$this->strMensajee_mail='';
		$this->strMensajee_mail2='';
		$this->strMensajecomentario='';
		$this->strMensajeimagen='';
		$this->strMensajeactivo='';
		$this->strMensajeid_pais='';
		$this->strMensajeid_provincia='';
		$this->strMensajeid_ciudad='';
		$this->strMensajecodigo_postal='';
		$this->strMensajefax='';
		$this->strMensajecontacto='';
		$this->strMensajeid_vendedor='';
		$this->strMensajemaximo_credito='';
		$this->strMensajemaximo_descuento='';
		$this->strMensajeinteres_anual='';
		$this->strMensajebalance='';
		$this->strMensajeid_termino_pago_proveedor='';
		$this->strMensajeid_cuenta='';
		$this->strMensajeaplica_impuesto_compras='';
		$this->strMensajeid_impuesto='';
		$this->strMensajeaplica_retencion_impuesto='';
		$this->strMensajeid_retencion='';
		$this->strMensajeaplica_retencion_fuente='';
		$this->strMensajeid_retencion_fuente='';
		$this->strMensajeaplica_retencion_ica='';
		$this->strMensajeid_retencion_ica='';
		$this->strMensajeaplica_2do_impuesto='';
		$this->strMensajeid_otro_impuesto='';
		$this->strMensajecreado='';
		$this->strMensajemonto_ultima_transaccion='';
		$this->strMensajefecha_ultima_transaccion='';
		$this->strMensajedescripcion_ultima_transaccion='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
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
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
						
			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
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
						$this->proveedorLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->proveedorActual =$this->proveedorClase;
			
			/*$this->proveedorActual =$this->migrarModelproveedor($this->proveedorClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->proveedorLogic->getproveedors(),$this->proveedorActual);
			
			$this->actualizarControllerConReturnGeneral($this->proveedorReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
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
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$proveedorsLocal=$this->getListaActual();
		
		$iIndice=proveedor_util::getIndiceNuevo($proveedorsLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(proveedor $proveedor,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$proveedorsLocal=$this->getListaActual();
		
		$iIndice=proveedor_util::getIndiceActual($proveedorsLocal,$proveedor,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoproveedor')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->proveedorActual =$this->proveedorClase;
			
			/*$this->proveedorActual =$this->migrarModelproveedor($this->proveedorClase);*/
			
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
			
			$this->proveedorLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_persona');$classes[]=$class;
				$class=new Classe('categoria_proveedor');$classes[]=$class;
				$class=new Classe('giro_negocio_proveedor');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('provincia');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
				$class=new Classe('retencion_fuente');$classes[]=$class;
				$class=new Classe('retencion_ica');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
			
			$this->proveedorLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->proveedorLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->proveedorLogic->setproveedor(new proveedor());
				
				$this->proveedorLogic->getproveedor()->setIsNew(true);
				$this->proveedorLogic->getproveedor()->setIsChanged(true);
				$this->proveedorLogic->getproveedor()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->proveedorModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->proveedorLogic->proveedors[]=$this->proveedorLogic->getproveedor();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->proveedorLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaprecios=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'Lista'));
							$listapreciosEliminados=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaprecios=array_merge($listaprecios,$listapreciosEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapagars=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$cuentapagarsEliminados=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapagars=array_merge($cuentapagars,$cuentapagarsEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenproveedors=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$imagenproveedorsEliminados=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenproveedors=array_merge($imagenproveedors,$imagenproveedorsEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentoproveedors=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$documentoproveedorsEliminados=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentoproveedors=array_merge($documentoproveedors,$documentoproveedorsEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otrosuplidors=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'Lista'));
							$otrosuplidorsEliminados=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otrosuplidors=array_merge($otrosuplidors,$otrosuplidorsEliminados);
							
							$this->proveedorLogic->saveRelaciones($this->proveedorLogic->getproveedor(),$listaprecios,$ordencompras,$cuentapagars,$imagenproveedors,$documentoproveedors,$otrosuplidors);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->proveedorLogic->getproveedor()->setIsChanged(true);
				$this->proveedorLogic->getproveedor()->setIsNew(false);
				$this->proveedorLogic->getproveedor()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->proveedorModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->proveedorLogic->getproveedor(),$this->proveedorLogic->getproveedors());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->proveedorLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaprecios=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'Lista'));
							$listapreciosEliminados=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaprecios=array_merge($listaprecios,$listapreciosEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapagars=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$cuentapagarsEliminados=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapagars=array_merge($cuentapagars,$cuentapagarsEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenproveedors=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$imagenproveedorsEliminados=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenproveedors=array_merge($imagenproveedors,$imagenproveedorsEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentoproveedors=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$documentoproveedorsEliminados=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentoproveedors=array_merge($documentoproveedors,$documentoproveedorsEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otrosuplidors=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'Lista'));
							$otrosuplidorsEliminados=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otrosuplidors=array_merge($otrosuplidors,$otrosuplidorsEliminados);
							
							$this->proveedorLogic->saveRelaciones($this->proveedorLogic->getproveedor(),$listaprecios,$ordencompras,$cuentapagars,$imagenproveedors,$documentoproveedors,$otrosuplidors);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->proveedorLogic->getproveedor()->setIsDeleted(true);
				$this->proveedorLogic->getproveedor()->setIsNew(false);
				$this->proveedorLogic->getproveedor()->setIsChanged(false);				
				
				$this->actualizarLista($this->proveedorLogic->getproveedor(),$this->proveedorLogic->getproveedors());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->proveedorLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaprecios=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'Lista'));
							$listapreciosEliminados=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaprecios=array_merge($listaprecios,$listapreciosEliminados);

							foreach($listaprecios as $listaprecio1) {
								$listaprecio1->setIsDeleted(true);
							}
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);

							foreach($ordencompras as $ordencompra1) {
								$ordencompra1->setIsDeleted(true);
							}
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapagars=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$cuentapagarsEliminados=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapagars=array_merge($cuentapagars,$cuentapagarsEliminados);

							foreach($cuentapagars as $cuentapagar1) {
								$cuentapagar1->setIsDeleted(true);
							}
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenproveedors=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$imagenproveedorsEliminados=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenproveedors=array_merge($imagenproveedors,$imagenproveedorsEliminados);

							foreach($imagenproveedors as $imagenproveedor1) {
								$imagenproveedor1->setIsDeleted(true);
							}
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentoproveedors=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$documentoproveedorsEliminados=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentoproveedors=array_merge($documentoproveedors,$documentoproveedorsEliminados);

							foreach($documentoproveedors as $documentoproveedor1) {
								$documentoproveedor1->setIsDeleted(true);
							}
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otrosuplidors=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'Lista'));
							$otrosuplidorsEliminados=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otrosuplidors=array_merge($otrosuplidors,$otrosuplidorsEliminados);

							foreach($otrosuplidors as $otrosuplidor1) {
								$otrosuplidor1->setIsDeleted(true);
							}
							
						$this->proveedorLogic->saveRelaciones($this->proveedorLogic->getproveedor(),$listaprecios,$ordencompras,$cuentapagars,$imagenproveedors,$documentoproveedors,$otrosuplidors);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->proveedorsEliminados[]=$this->proveedorLogic->getproveedor();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->proveedorLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaprecios=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'Lista'));
							$listapreciosEliminados=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaprecios=array_merge($listaprecios,$listapreciosEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$ordencompras=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'Lista'));
							$ordencomprasEliminados=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME.'ListaEliminados'));
							$ordencompras=array_merge($ordencompras,$ordencomprasEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentapagars=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'Lista'));
							$cuentapagarsEliminados=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentapagars=array_merge($cuentapagars,$cuentapagarsEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenproveedors=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$imagenproveedorsEliminados=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenproveedors=array_merge($imagenproveedors,$imagenproveedorsEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentoproveedors=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME.'Lista'));
							$documentoproveedorsEliminados=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentoproveedors=array_merge($documentoproveedors,$documentoproveedorsEliminados);
							proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otrosuplidors=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'Lista'));
							$otrosuplidorsEliminados=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otrosuplidors=array_merge($otrosuplidors,$otrosuplidorsEliminados);
							
						$this->proveedorLogic->saveRelaciones($this->proveedorLogic->getproveedor(),$listaprecios,$ordencompras,$cuentapagars,$imagenproveedors,$documentoproveedors,$otrosuplidors);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->proveedorsEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->proveedorLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->proveedorLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->proveedorsEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_persona');$classes[]=$class;
				$class=new Classe('categoria_proveedor');$classes[]=$class;
				$class=new Classe('giro_negocio_proveedor');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('provincia');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
				$class=new Classe('retencion_fuente');$classes[]=$class;
				$class=new Classe('retencion_ica');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->proveedorLogic->setproveedors();*/
					
					$this->proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->proveedorLogic->setIsConDeepLoad(false);
			
			$this->proveedors=$this->proveedorLogic->getproveedors();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(proveedor_util::$STR_SESSION_NAME.'Lista',serialize($this->proveedors));
				$this->Session->write(proveedor_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->proveedorsEliminados));
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
				$this->proveedorLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
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
				$this->proveedorLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalproveedor;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->proveedorLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->proveedors as $proveedorLocal) {
				if($this->proveedorLogic->getproveedor()->getId()==$proveedorLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->proveedorLogic->getproveedor()->setIsDeleted(true);
			$this->proveedorsEliminados[]=$this->proveedorLogic->getproveedor();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->proveedors[$indice]);
				
				$this->proveedors = array_values($this->proveedors);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelproveedor($this->proveedorClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(proveedor $proveedor,array $proveedors) {
		try {
			foreach($proveedors as $proveedorLocal){ 
				if($proveedorLocal->getId()==$proveedor->getId()) {
					$proveedorLocal->setIsChanged($proveedor->getIsChanged());
					$proveedorLocal->setIsNew($proveedor->getIsNew());
					$proveedorLocal->setIsDeleted($proveedor->getIsDeleted());
					//$proveedorLocal->setbitExpired($proveedor->getbitExpired());
					
					$proveedorLocal->setId($proveedor->getId());	
					$proveedorLocal->setVersionRow($proveedor->getVersionRow());	
					$proveedorLocal->setVersionRow($proveedor->getVersionRow());	
					$proveedorLocal->setid_empresa($proveedor->getid_empresa());	
					$proveedorLocal->setid_tipo_persona($proveedor->getid_tipo_persona());	
					$proveedorLocal->setid_categoria_proveedor($proveedor->getid_categoria_proveedor());	
					$proveedorLocal->setid_giro_negocio_proveedor($proveedor->getid_giro_negocio_proveedor());	
					$proveedorLocal->setcodigo($proveedor->getcodigo());	
					$proveedorLocal->setruc($proveedor->getruc());	
					$proveedorLocal->setprimer_apellido($proveedor->getprimer_apellido());	
					$proveedorLocal->setsegundo_apellido($proveedor->getsegundo_apellido());	
					$proveedorLocal->setprimer_nombre($proveedor->getprimer_nombre());	
					$proveedorLocal->setsegundo_nombre($proveedor->getsegundo_nombre());	
					$proveedorLocal->setnombre_completo($proveedor->getnombre_completo());	
					$proveedorLocal->setdireccion($proveedor->getdireccion());	
					$proveedorLocal->settelefono($proveedor->gettelefono());	
					$proveedorLocal->settelefono_movil($proveedor->gettelefono_movil());	
					$proveedorLocal->sete_mail($proveedor->gete_mail());	
					$proveedorLocal->sete_mail2($proveedor->gete_mail2());	
					$proveedorLocal->setcomentario($proveedor->getcomentario());	
					$proveedorLocal->setimagen($proveedor->getimagen());	
					$proveedorLocal->setactivo($proveedor->getactivo());	
					$proveedorLocal->setid_pais($proveedor->getid_pais());	
					$proveedorLocal->setid_provincia($proveedor->getid_provincia());	
					$proveedorLocal->setid_ciudad($proveedor->getid_ciudad());	
					$proveedorLocal->setcodigo_postal($proveedor->getcodigo_postal());	
					$proveedorLocal->setfax($proveedor->getfax());	
					$proveedorLocal->setcontacto($proveedor->getcontacto());	
					$proveedorLocal->setid_vendedor($proveedor->getid_vendedor());	
					$proveedorLocal->setmaximo_credito($proveedor->getmaximo_credito());	
					$proveedorLocal->setmaximo_descuento($proveedor->getmaximo_descuento());	
					$proveedorLocal->setinteres_anual($proveedor->getinteres_anual());	
					$proveedorLocal->setbalance($proveedor->getbalance());	
					$proveedorLocal->setid_termino_pago_proveedor($proveedor->getid_termino_pago_proveedor());	
					$proveedorLocal->setid_cuenta($proveedor->getid_cuenta());	
					$proveedorLocal->setaplica_impuesto_compras($proveedor->getaplica_impuesto_compras());	
					$proveedorLocal->setid_impuesto($proveedor->getid_impuesto());	
					$proveedorLocal->setaplica_retencion_impuesto($proveedor->getaplica_retencion_impuesto());	
					$proveedorLocal->setid_retencion($proveedor->getid_retencion());	
					$proveedorLocal->setaplica_retencion_fuente($proveedor->getaplica_retencion_fuente());	
					$proveedorLocal->setid_retencion_fuente($proveedor->getid_retencion_fuente());	
					$proveedorLocal->setaplica_retencion_ica($proveedor->getaplica_retencion_ica());	
					$proveedorLocal->setid_retencion_ica($proveedor->getid_retencion_ica());	
					$proveedorLocal->setaplica_2do_impuesto($proveedor->getaplica_2do_impuesto());	
					$proveedorLocal->setid_otro_impuesto($proveedor->getid_otro_impuesto());	
					$proveedorLocal->setcreado($proveedor->getcreado());	
					$proveedorLocal->setmonto_ultima_transaccion($proveedor->getmonto_ultima_transaccion());	
					$proveedorLocal->setfecha_ultima_transaccion($proveedor->getfecha_ultima_transaccion());	
					$proveedorLocal->setdescripcion_ultima_transaccion($proveedor->getdescripcion_ultima_transaccion());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$proveedorsLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$proveedorsLocal=$this->proveedorLogic->getproveedors();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$proveedorsLocal=$this->proveedors;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $proveedorsLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->proveedorLogic->getproveedors() as $proveedor) {
				if($proveedor->getId()==$id) {
					$this->proveedorLogic->setproveedor($proveedor);
					
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
		/*$proveedorsSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->proveedors as $proveedor) {
			$proveedor->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->proveedors[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : proveedor_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
						
		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
		
		
		$this->proveedorReturnGeneral=new proveedor_param_return();
		$this->proveedorParameterGeneral=new proveedor_param_return();
			
		$this->proveedorParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualproveedor(this.proveedor,true);
			this.setVariablesFormularioToObjetoActualForeignKeysproveedor(this.proveedor);*/
			
			if($proveedor_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualproveedor(this.proveedor,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->proveedorActual=$this->proveedorClase;
				
				$this->setCopiarVariablesObjetos($this->proveedorActual,$this->proveedor,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->proveedorReturnGeneral=$this->proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->proveedorLogic->getproveedors(),$this->proveedor,$this->proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($proveedor_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanproveedor($classes,$this->proveedorReturnGeneral,$this->proveedorBean,false);*/
				}
					
				if($this->proveedorReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->proveedorReturnGeneral->getproveedor(),$this->proveedorActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyproveedor($this->proveedorReturnGeneral->getproveedor());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioproveedor($this->proveedorReturnGeneral->getproveedor());*/
				}
					
				if($this->proveedorReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->proveedorReturnGeneral->getproveedor(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->proveedor,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(proveedorJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualproveedor(this.proveedor,true);
				this.setVariablesFormularioToObjetoActualForeignKeysproveedor(this.proveedor);				
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
				
				if($this->proveedorAnterior!=null) {
					$this->proveedor=$this->proveedorAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->proveedorReturnGeneral=$this->proveedorLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->proveedorLogic->getproveedors(),$this->proveedor,$this->proveedorParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->proveedorReturnGeneral->getproveedor(),$this->proveedorLogic->getproveedors());
			*/
		}
		
		return $this->proveedorReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}

			$this->proveedorReturnGeneral=new proveedor_param_return();			
			$this->proveedorParameterGeneral=new proveedor_param_return();
			
			$this->proveedorParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->proveedorReturnGeneral=$this->proveedorLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->proveedors,$this->proveedorParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->proveedorReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->proveedorReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->proveedorReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
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
		
		$this->proveedorReturnGeneral=new proveedor_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_proveedor') {
		    $sDominio='proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->proveedorReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->proveedorReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='proveedor';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->proveedorReturnGeneral=new proveedor_param_return();
		$this->proveedorParameterGeneral=new proveedor_param_return();
			
		$this->proveedorParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->proveedorReturnGeneral=$this->proveedorLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->proveedorLogic->getproveedors(),$this->proveedor,$this->proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->proveedorReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->proveedorReturnGeneral->getproveedor(),$classes);*/
		}									
	
		if($this->proveedorReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->proveedorReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->proveedorReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $proveedors,proveedor $proveedor) {
		
		$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
						
		if($proveedor_session==null) {
			$proveedor_session=new proveedor_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(proveedor_util::$CLASSNAME);
			}	
			*/
			
			$this->proveedorReturnGeneral=new proveedor_param_return();
			$this->proveedorParameterGeneral=new proveedor_param_return();
			
			$this->proveedorParameterGeneral->setdata($this->data);
		
		
			
		if($proveedor_session->conGuardarRelaciones) {
			$classes=proveedor_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->proveedorActual,$this->proveedor,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->proveedorReturnGeneral=$this->proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->proveedorLogic->getproveedors(),$this->proveedorActual,$this->proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->proveedorReturnGeneral=$this->proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$proveedors,$proveedor,$this->proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelproveedor($this->proveedorLogic->getproveedor());*/
			
			$this->proveedor=$this->proveedorLogic->getproveedor();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->proveedor);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$proveedorActual=new proveedor();
			
			if($this->proveedorClase==null) {		
				$this->proveedorClase=new proveedor();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$proveedorActual=$this->proveedors[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $proveedorActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $proveedorActual->setid_tipo_persona((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $proveedorActual->setid_categoria_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $proveedorActual->setid_giro_negocio_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $proveedorActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $proveedorActual->setruc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $proveedorActual->setprimer_apellido($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $proveedorActual->setsegundo_apellido($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $proveedorActual->setprimer_nombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $proveedorActual->setsegundo_nombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $proveedorActual->setnombre_completo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $proveedorActual->setdireccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $proveedorActual->settelefono($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $proveedorActual->settelefono_movil($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $proveedorActual->sete_mail($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $proveedorActual->sete_mail2($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $proveedorActual->setcomentario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $proveedorActual->setimagen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $proveedorActual->setactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_21')));  } else { $proveedorActual->setactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $proveedorActual->setid_pais((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $proveedorActual->setid_provincia((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $proveedorActual->setid_ciudad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $proveedorActual->setcodigo_postal($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $proveedorActual->setfax($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $proveedorActual->setcontacto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $proveedorActual->setid_vendedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $proveedorActual->setmaximo_credito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $proveedorActual->setmaximo_descuento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $proveedorActual->setinteres_anual((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $proveedorActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $proveedorActual->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $proveedorActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $proveedorActual->setaplica_impuesto_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_35')));  } else { $proveedorActual->setaplica_impuesto_compras(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $proveedorActual->setid_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $proveedorActual->setaplica_retencion_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_37')));  } else { $proveedorActual->setaplica_retencion_impuesto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $proveedorActual->setid_retencion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $proveedorActual->setaplica_retencion_fuente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_39')));  } else { $proveedorActual->setaplica_retencion_fuente(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $proveedorActual->setid_retencion_fuente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $proveedorActual->setaplica_retencion_ica(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_41')));  } else { $proveedorActual->setaplica_retencion_ica(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_42','t'.$this->strSufijo)) {  $proveedorActual->setid_retencion_ica((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_42'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_43','t'.$this->strSufijo)) {  $proveedorActual->setaplica_2do_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_43')));  } else { $proveedorActual->setaplica_2do_impuesto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_44','t'.$this->strSufijo)) {  $proveedorActual->setid_otro_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_44'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_45','t'.$this->strSufijo)) {  $proveedorActual->setcreado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_45')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_46','t'.$this->strSufijo)) {  $proveedorActual->setmonto_ultima_transaccion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_46'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_47','t'.$this->strSufijo)) {  $proveedorActual->setfecha_ultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_47')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_48','t'.$this->strSufijo)) {  $proveedorActual->setdescripcion_ultima_transaccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_48'));  }

				$this->proveedorClase=$proveedorActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->proveedorModel->set($this->proveedorClase);
				
				/*$this->proveedorModel->set($this->migrarModelproveedor($this->proveedorClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->proveedors=$this->migrarModelproveedor($this->proveedorLogic->getproveedors());							
		$this->proveedors=$this->proveedorLogic->getproveedors();*/
		
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
			$this->Session->write(proveedor_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$proveedor_control_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($proveedor_control_session==null) {
				$proveedor_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($proveedor_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(proveedor_util::$STR_SESSION_NAME,$this);*/
		} else {
			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));
			
			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}
			
			$this->set(proveedor_util::$STR_SESSION_NAME, $proveedor_session);
		}
	}
	
	public function setCopiarVariablesObjetos(proveedor $proveedorOrigen,proveedor $proveedor,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($proveedor==null) {
				$proveedor=new proveedor();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $proveedorOrigen->getId()!=null && $proveedorOrigen->getId()!=0)) {$proveedor->setId($proveedorOrigen->getId());}}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_tipo_persona()!=null && $proveedorOrigen->getid_tipo_persona()!=-1)) {$proveedor->setid_tipo_persona($proveedorOrigen->getid_tipo_persona());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_categoria_proveedor()!=null && $proveedorOrigen->getid_categoria_proveedor()!=-1)) {$proveedor->setid_categoria_proveedor($proveedorOrigen->getid_categoria_proveedor());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_giro_negocio_proveedor()!=null && $proveedorOrigen->getid_giro_negocio_proveedor()!=-1)) {$proveedor->setid_giro_negocio_proveedor($proveedorOrigen->getid_giro_negocio_proveedor());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getcodigo()!=null && $proveedorOrigen->getcodigo()!='')) {$proveedor->setcodigo($proveedorOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getruc()!=null && $proveedorOrigen->getruc()!='')) {$proveedor->setruc($proveedorOrigen->getruc());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getprimer_apellido()!=null && $proveedorOrigen->getprimer_apellido()!='')) {$proveedor->setprimer_apellido($proveedorOrigen->getprimer_apellido());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getsegundo_apellido()!=null && $proveedorOrigen->getsegundo_apellido()!='')) {$proveedor->setsegundo_apellido($proveedorOrigen->getsegundo_apellido());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getprimer_nombre()!=null && $proveedorOrigen->getprimer_nombre()!='')) {$proveedor->setprimer_nombre($proveedorOrigen->getprimer_nombre());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getsegundo_nombre()!=null && $proveedorOrigen->getsegundo_nombre()!='')) {$proveedor->setsegundo_nombre($proveedorOrigen->getsegundo_nombre());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getnombre_completo()!=null && $proveedorOrigen->getnombre_completo()!='')) {$proveedor->setnombre_completo($proveedorOrigen->getnombre_completo());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getdireccion()!=null && $proveedorOrigen->getdireccion()!='')) {$proveedor->setdireccion($proveedorOrigen->getdireccion());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->gettelefono()!=null && $proveedorOrigen->gettelefono()!='')) {$proveedor->settelefono($proveedorOrigen->gettelefono());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->gettelefono_movil()!=null && $proveedorOrigen->gettelefono_movil()!='')) {$proveedor->settelefono_movil($proveedorOrigen->gettelefono_movil());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->gete_mail()!=null && $proveedorOrigen->gete_mail()!='')) {$proveedor->sete_mail($proveedorOrigen->gete_mail());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->gete_mail2()!=null && $proveedorOrigen->gete_mail2()!='')) {$proveedor->sete_mail2($proveedorOrigen->gete_mail2());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getcomentario()!=null && $proveedorOrigen->getcomentario()!='')) {$proveedor->setcomentario($proveedorOrigen->getcomentario());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getimagen()!=null && $proveedorOrigen->getimagen()!='')) {$proveedor->setimagen($proveedorOrigen->getimagen());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getactivo()!=null && $proveedorOrigen->getactivo()!=true)) {$proveedor->setactivo($proveedorOrigen->getactivo());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_pais()!=null && $proveedorOrigen->getid_pais()!=-1)) {$proveedor->setid_pais($proveedorOrigen->getid_pais());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_provincia()!=null && $proveedorOrigen->getid_provincia()!=-1)) {$proveedor->setid_provincia($proveedorOrigen->getid_provincia());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_ciudad()!=null && $proveedorOrigen->getid_ciudad()!=-1)) {$proveedor->setid_ciudad($proveedorOrigen->getid_ciudad());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getcodigo_postal()!=null && $proveedorOrigen->getcodigo_postal()!='')) {$proveedor->setcodigo_postal($proveedorOrigen->getcodigo_postal());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getfax()!=null && $proveedorOrigen->getfax()!='')) {$proveedor->setfax($proveedorOrigen->getfax());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getcontacto()!=null && $proveedorOrigen->getcontacto()!='')) {$proveedor->setcontacto($proveedorOrigen->getcontacto());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_vendedor()!=null && $proveedorOrigen->getid_vendedor()!=-1)) {$proveedor->setid_vendedor($proveedorOrigen->getid_vendedor());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getmaximo_credito()!=null && $proveedorOrigen->getmaximo_credito()!=0.0)) {$proveedor->setmaximo_credito($proveedorOrigen->getmaximo_credito());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getmaximo_descuento()!=null && $proveedorOrigen->getmaximo_descuento()!=0.0)) {$proveedor->setmaximo_descuento($proveedorOrigen->getmaximo_descuento());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getinteres_anual()!=null && $proveedorOrigen->getinteres_anual()!=0.0)) {$proveedor->setinteres_anual($proveedorOrigen->getinteres_anual());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getbalance()!=null && $proveedorOrigen->getbalance()!=0.0)) {$proveedor->setbalance($proveedorOrigen->getbalance());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_termino_pago_proveedor()!=null && $proveedorOrigen->getid_termino_pago_proveedor()!=-1)) {$proveedor->setid_termino_pago_proveedor($proveedorOrigen->getid_termino_pago_proveedor());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_cuenta()!=null && $proveedorOrigen->getid_cuenta()!=null)) {$proveedor->setid_cuenta($proveedorOrigen->getid_cuenta());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getaplica_impuesto_compras()!=null && $proveedorOrigen->getaplica_impuesto_compras()!=false)) {$proveedor->setaplica_impuesto_compras($proveedorOrigen->getaplica_impuesto_compras());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_impuesto()!=null && $proveedorOrigen->getid_impuesto()!=-1)) {$proveedor->setid_impuesto($proveedorOrigen->getid_impuesto());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getaplica_retencion_impuesto()!=null && $proveedorOrigen->getaplica_retencion_impuesto()!=false)) {$proveedor->setaplica_retencion_impuesto($proveedorOrigen->getaplica_retencion_impuesto());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_retencion()!=null && $proveedorOrigen->getid_retencion()!=null)) {$proveedor->setid_retencion($proveedorOrigen->getid_retencion());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getaplica_retencion_fuente()!=null && $proveedorOrigen->getaplica_retencion_fuente()!=false)) {$proveedor->setaplica_retencion_fuente($proveedorOrigen->getaplica_retencion_fuente());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_retencion_fuente()!=null && $proveedorOrigen->getid_retencion_fuente()!=null)) {$proveedor->setid_retencion_fuente($proveedorOrigen->getid_retencion_fuente());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getaplica_retencion_ica()!=null && $proveedorOrigen->getaplica_retencion_ica()!=false)) {$proveedor->setaplica_retencion_ica($proveedorOrigen->getaplica_retencion_ica());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_retencion_ica()!=null && $proveedorOrigen->getid_retencion_ica()!=null)) {$proveedor->setid_retencion_ica($proveedorOrigen->getid_retencion_ica());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getaplica_2do_impuesto()!=null && $proveedorOrigen->getaplica_2do_impuesto()!=false)) {$proveedor->setaplica_2do_impuesto($proveedorOrigen->getaplica_2do_impuesto());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getid_otro_impuesto()!=null && $proveedorOrigen->getid_otro_impuesto()!=null)) {$proveedor->setid_otro_impuesto($proveedorOrigen->getid_otro_impuesto());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getcreado()!=null && $proveedorOrigen->getcreado()!=date('Y-m-d'))) {$proveedor->setcreado($proveedorOrigen->getcreado());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getmonto_ultima_transaccion()!=null && $proveedorOrigen->getmonto_ultima_transaccion()!=0.0)) {$proveedor->setmonto_ultima_transaccion($proveedorOrigen->getmonto_ultima_transaccion());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getfecha_ultima_transaccion()!=null && $proveedorOrigen->getfecha_ultima_transaccion()!=date('Y-m-d'))) {$proveedor->setfecha_ultima_transaccion($proveedorOrigen->getfecha_ultima_transaccion());}
			if($conDefault || ($conDefault==false && $proveedorOrigen->getdescripcion_ultima_transaccion()!=null && $proveedorOrigen->getdescripcion_ultima_transaccion()!='')) {$proveedor->setdescripcion_ultima_transaccion($proveedorOrigen->getdescripcion_ultima_transaccion());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$proveedorsSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$proveedorsSeleccionados[]=$this->proveedors[$indice];
			}
		}
		
		return $proveedorsSeleccionados;
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
		$proveedor= new proveedor();
		
		foreach($this->proveedorLogic->getproveedors() as $proveedor) {
			
		$proveedor->listaprecios=array();
		$proveedor->ordencompras=array();
		$proveedor->cuentapagars=array();
		$proveedor->imagenproveedors=array();
		$proveedor->documentoproveedors=array();
		$proveedor->otrosuplidors=array();
		}		
		
		if($proveedor!=null);
	}
	
	public function cargarRelaciones(array $proveedors=array()) : array {	
		
		$proveedorsRespaldo = array();
		$proveedorsLocal = array();
		
		proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			imagen_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			documento_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$proveedorsResp=array();
		$classes=array();
			
		
				$class=new Classe('lista_precio'); 	$classes[]=$class;
				$class=new Classe('orden_compra'); 	$classes[]=$class;
				$class=new Classe('cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('imagen_proveedor'); 	$classes[]=$class;
				$class=new Classe('documento_proveedor'); 	$classes[]=$class;
				$class=new Classe('otro_suplidor'); 	$classes[]=$class;
			
			
		$proveedorsRespaldo=$this->proveedorLogic->getproveedors();
			
		$this->proveedorLogic->setIsConDeep(true);
		
		$this->proveedorLogic->setproveedors($proveedors);
			
		$this->proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$proveedorsLocal=$this->proveedorLogic->getproveedors();
			
		/*RESPALDO*/
		$this->proveedorLogic->setproveedors($proveedorsRespaldo);
			
		$this->proveedorLogic->setIsConDeep(false);
		
		if($proveedorsResp!=null);
		
		return $proveedorsLocal;
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
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(proveedor_session $proveedor_session) {
		$proveedor_session->strTypeOnLoad=$this->strTypeOnLoadproveedor;
		$proveedor_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarproveedor;
		$proveedor_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarproveedor;
		$proveedor_session->bitEsPopup=$this->bitEsPopup;
		$proveedor_session->bitEsBusqueda=$this->bitEsBusqueda;
		$proveedor_session->strFuncionJs=$this->strFuncionJs;
		/*$proveedor_session->strSufijo=$this->strSufijo;*/
		$proveedor_session->bitEsRelaciones=$this->bitEsRelaciones;
		$proveedor_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, proveedor_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisoslista_precio='none';
			$this->strTienePermisoslista_precio=((Funciones::existeCadenaArray(lista_precio_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoslista_precio='table-cell';

			$this->strTienePermisosorden_compra='none';
			$this->strTienePermisosorden_compra=((Funciones::existeCadenaArray(orden_compra_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosorden_compra='table-cell';

			$this->strTienePermisoscuenta_pagar='none';
			$this->strTienePermisoscuenta_pagar=((Funciones::existeCadenaArray(cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscuenta_pagar='table-cell';

			$this->strTienePermisosimagen_proveedor='none';
			$this->strTienePermisosimagen_proveedor=((Funciones::existeCadenaArray(imagen_proveedor_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosimagen_proveedor='table-cell';

			$this->strTienePermisosdocumento_proveedor='none';
			$this->strTienePermisosdocumento_proveedor=((Funciones::existeCadenaArray(documento_proveedor_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdocumento_proveedor='table-cell';

			$this->strTienePermisosotro_suplidor='none';
			$this->strTienePermisosotro_suplidor=((Funciones::existeCadenaArray(otro_suplidor_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosotro_suplidor='table-cell';
		} else {
			

			$this->strTienePermisoslista_precio='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoslista_precio=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, lista_precio_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoslista_precio='table-cell';

			$this->strTienePermisosorden_compra='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosorden_compra=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, orden_compra_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosorden_compra='table-cell';

			$this->strTienePermisoscuenta_pagar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscuenta_pagar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscuenta_pagar='table-cell';

			$this->strTienePermisosimagen_proveedor='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosimagen_proveedor=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, imagen_proveedor_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosimagen_proveedor='table-cell';

			$this->strTienePermisosdocumento_proveedor='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdocumento_proveedor=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, documento_proveedor_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdocumento_proveedor='table-cell';

			$this->strTienePermisosotro_suplidor='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosotro_suplidor=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, otro_suplidor_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosotro_suplidor='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$proveedorViewAdditional=new proveedorView_add();
		$proveedorViewAdditional->proveedors=$this->proveedors;
		$proveedorViewAdditional->Session=$this->Session;
		
		return $proveedorViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proveedorsLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$proveedorsLocal=$this->proveedors;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$proveedorsLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($proveedorsLocal)<=0) {
					$proveedorsLocal=$this->proveedors;
				}
			} else {
				$proveedorsLocal=$this->proveedors;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarproveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarproveedorsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$proveedorLogic=new proveedor_logic();
		$proveedorLogic->setproveedors($this->proveedors);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$lista_precio_session=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME));

		if($lista_precio_session==null) {
			$lista_precio_session=new lista_precio_session();
		}

		$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}

		$imagen_proveedor_session=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME));

		if($imagen_proveedor_session==null) {
			$imagen_proveedor_session=new imagen_proveedor_session();
		}

		$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));

		if($documento_proveedor_session==null) {
			$documento_proveedor_session=new documento_proveedor_session();
		}

		$otro_suplidor_session=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME));

		if($otro_suplidor_session==null) {
			$otro_suplidor_session=new otro_suplidor_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_persona');$classes[]=$class;
			$class=new Classe('categoria_proveedor');$classes[]=$class;
			$class=new Classe('giro_negocio_proveedor');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('provincia');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
			$class=new Classe('retencion_fuente');$classes[]=$class;
			$class=new Classe('retencion_ica');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$proveedorLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->proveedors=$proveedorLogic->getproveedors();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->proveedorsLocal=$this->proveedors;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=proveedor_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=proveedor_util::$STR_TABLE_NAME;		
			
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
			
			$proveedors = $this->proveedors;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = proveedor_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = proveedor_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/proveedor_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->proveedors=$proveedors;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->proveedorsLocal=$proveedorsLocal;
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
		
		$proveedorsLocal=array();
		
		$proveedorsLocal=$this->proveedors;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarproveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarproveedorsAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$proveedorLogic=new proveedor_logic();
		$proveedorLogic->setproveedors($this->proveedors);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$lista_precio_session=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME));

		if($lista_precio_session==null) {
			$lista_precio_session=new lista_precio_session();
		}

		$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));

		if($orden_compra_session==null) {
			$orden_compra_session=new orden_compra_session();
		}

		$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

		if($cuenta_pagar_session==null) {
			$cuenta_pagar_session=new cuenta_pagar_session();
		}

		$imagen_proveedor_session=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME));

		if($imagen_proveedor_session==null) {
			$imagen_proveedor_session=new imagen_proveedor_session();
		}

		$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));

		if($documento_proveedor_session==null) {
			$documento_proveedor_session=new documento_proveedor_session();
		}

		$otro_suplidor_session=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME));

		if($otro_suplidor_session==null) {
			$otro_suplidor_session=new otro_suplidor_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_persona');$classes[]=$class;
			$class=new Classe('categoria_proveedor');$classes[]=$class;
			$class=new Classe('giro_negocio_proveedor');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('provincia');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
			$class=new Classe('retencion_fuente');$classes[]=$class;
			$class=new Classe('retencion_ica');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$proveedorLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->proveedors=$proveedorLogic->getproveedors();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$proveedors = $this->proveedors;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = proveedor_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = proveedor_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentaspagar/presentation/templating/proveedor_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->proveedors=$proveedors;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->proveedorsLocal=$proveedorsLocal;
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
	
	public function getHtmlTablaDatosResumen(array $proveedors=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->proveedorsReporte = $proveedors;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarproveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarproveedorsAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $proveedors=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->proveedorsReporte = $proveedors;		
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
		
		
		$this->proveedorsReporte=$this->cargarRelaciones($proveedors);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarproveedorsAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarproveedorsAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(proveedor $proveedor=null) : string {	
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
			
			
			$proveedorsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$proveedorsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($proveedorsLocal)<=0) {
					/*//DEBE ESCOGER
					$proveedorsLocal=$this->proveedors;*/
				}
			} else {
				/*//DEBE ESCOGER
				$proveedorsLocal=$this->proveedors;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($proveedorsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($proveedorsLocal,true);
			
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
				$this->proveedorLogic->getNewConnexionToDeep();
			}
					
			$proveedorsLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$proveedorsLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($proveedorsLocal)<=0) {
					/*//DEBE ESCOGER
					$proveedorsLocal=$this->proveedors;*/
				}
			} else {
				/*//DEBE ESCOGER
				$proveedorsLocal=$this->proveedors;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($proveedorsLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($proveedorsLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Proveedores';
			
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
			$fileName='proveedor';
			
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
			
			$title='Reporte de  Proveedores';
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
			
			$title='Reporte de  Proveedores';
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
				$this->proveedorLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Proveedores';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->commitNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->proveedorLogic->rollbackNewConnexionToDeep();
				$this->proveedorLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=proveedor_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->proveedorsAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->proveedorsAuxiliar)<=0) {
					$this->proveedorsAuxiliar=$this->proveedors;
				}
			} else {
				$this->proveedorsAuxiliar=$this->proveedors;
			}
		/*} else {
			$this->proveedorsAuxiliar=$this->proveedorsReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->proveedorsAuxiliar as $proveedor) {
				$row=array();
				
				$row=proveedor_util::getDataReportRow($tipo,$proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			orden_compra_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			imagen_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			documento_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$proveedorsResp=array();
			$classes=array();
			
			
				$class=new Classe('lista_precio'); 	$classes[]=$class;
				$class=new Classe('orden_compra'); 	$classes[]=$class;
				$class=new Classe('cuenta_pagar'); 	$classes[]=$class;
				$class=new Classe('imagen_proveedor'); 	$classes[]=$class;
				$class=new Classe('documento_proveedor'); 	$classes[]=$class;
				$class=new Classe('otro_suplidor'); 	$classes[]=$class;
			
			
			$proveedorsResp=$this->proveedorLogic->getproveedors();
			
			$this->proveedorLogic->setIsConDeep(true);
			
			$this->proveedorLogic->setproveedors($this->proveedorsAuxiliar);
			
			$this->proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->proveedorsAuxiliar=$this->proveedorLogic->getproveedors();
			
			//RESPALDO
			$this->proveedorLogic->setproveedors($proveedorsResp);
			
			$this->proveedorLogic->setIsConDeep(false);
			*/
			
			$this->proveedorsAuxiliar=$this->cargarRelaciones($this->proveedorsAuxiliar);
			
			$i=0;
			
			foreach ($this->proveedorsAuxiliar as $proveedor) {
				$row=array();
				
				if($i!=0) {
					$row=proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=proveedor_util::getDataReportRow($tipo,$proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//lista_precio
				if(Funciones::existeCadenaArrayOrderBy(lista_precio_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($proveedor->getlista_precios())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(lista_precio_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=lista_precio_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($proveedor->getlista_precios() as $lista_precio) {
						$row=lista_precio_util::getDataReportRow('RELACIONADO',$lista_precio,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//orden_compra
				if(Funciones::existeCadenaArrayOrderBy(orden_compra_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($proveedor->getorden_compras())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(orden_compra_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=orden_compra_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($proveedor->getorden_compras() as $orden_compra) {
						$row=orden_compra_util::getDataReportRow('RELACIONADO',$orden_compra,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//cuenta_pagar
				if(Funciones::existeCadenaArrayOrderBy(cuenta_pagar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($proveedor->getcuenta_pagars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_pagar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cuenta_pagar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($proveedor->getcuenta_pagars() as $cuenta_pagar) {
						$row=cuenta_pagar_util::getDataReportRow('RELACIONADO',$cuenta_pagar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//imagen_proveedor
				if(Funciones::existeCadenaArrayOrderBy(imagen_proveedor_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($proveedor->getimagen_proveedors())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(imagen_proveedor_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=imagen_proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($proveedor->getimagen_proveedors() as $imagen_proveedor) {
						$row=imagen_proveedor_util::getDataReportRow('RELACIONADO',$imagen_proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//documento_proveedor
				if(Funciones::existeCadenaArrayOrderBy(documento_proveedor_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($proveedor->getdocumento_proveedors())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(documento_proveedor_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=documento_proveedor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($proveedor->getdocumento_proveedors() as $documento_proveedor) {
						$row=documento_proveedor_util::getDataReportRow('RELACIONADO',$documento_proveedor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//otro_suplidor
				if(Funciones::existeCadenaArrayOrderBy(otro_suplidor_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($proveedor->getotro_suplidors())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(otro_suplidor_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=otro_suplidor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($proveedor->getotro_suplidors() as $otro_suplidor) {
						$row=otro_suplidor_util::getDataReportRow('RELACIONADO',$otro_suplidor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->proveedorsAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->proveedorsAuxiliar)<=0) {
					$this->proveedorsAuxiliar=$this->proveedors;
				}
			} else {
				$this->proveedorsAuxiliar=$this->proveedors;
			}
		/*} else {
			$this->proveedorsAuxiliar=$this->proveedorsReporte;	
		}*/
		
		foreach ($this->proveedorsAuxiliar as $proveedor) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(proveedor_util::getproveedorDescripcion($proveedor),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Tipo Persona',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Persona',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_tipo_personaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Categoria',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Categoria',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_categoria_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Giro Negocio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Giro Negocio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_giro_negocio_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ruc',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ruc',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getruc(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Primer Apellido',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Primer Apellido',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getprimer_apellido(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Segundo Apellido',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Segundo Apellido',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getsegundo_apellido(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Primer Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Primer Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getprimer_nombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Segundo Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Segundo Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getsegundo_nombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Completo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Completo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getnombre_completo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getdireccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Telefono',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->gettelefono(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Telefono Movil',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono Movil',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->gettelefono_movil(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('E Mail',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('E Mail',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->gete_mail(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('E Mail2',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('E Mail2',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->gete_mail2(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Comentario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comentario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getcomentario(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Imagen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getimagen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Activo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Activo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getactivo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Pais',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Pais',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_paisDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Provincia',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Provincia',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_provinciaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ciudad',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ciudad',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_ciudadDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo Postal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Postal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getcodigo_postal(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fax',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fax',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getfax(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Contacto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Contacto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getcontacto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Vendedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Vendedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_vendedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Maximo Credito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Maximo Credito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getmaximo_credito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Maximo Descuento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Maximo Descuento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getmaximo_descuento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Interes Anual',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Interes Anual',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getinteres_anual(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Balance',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getbalance(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Termino Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Termino Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_termino_pago_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Aplica Impuesto Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Impuesto Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getaplica_impuesto_compras(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_impuestoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Retencion Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getaplica_retencion_impuesto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Retencion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_retencionDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Fuente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Retencion Fuente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getaplica_retencion_fuente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Retencion Fuente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion Fuente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_retencion_fuenteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Ica',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Retencion Ica',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getaplica_retencion_ica(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Retencion Ica',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion Ica',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_retencion_icaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Aplica 2do Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica 2do Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getaplica_2do_impuesto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Otro Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Otro Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getid_otro_impuestoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Creado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Creado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getcreado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto Ultima Transaccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Ultima Transaccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getmonto_ultima_transaccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Ultima Transaccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Ultima Transaccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getfecha_ultima_transaccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion Ultima Transaccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion Ultima Transaccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($proveedor->getdescripcion_ultima_transaccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface proveedor_base_controlI {			
		
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
		public function getIndiceActual(proveedor $proveedor,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(proveedor $proveedor,array $proveedors);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : proveedor_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $proveedors,proveedor $proveedor);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(proveedor_param_return $proveedorReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(proveedor_session $proveedor_session);		
		public function actualizarInvitadoSessionDivStyleVariables(proveedor_session $proveedor_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(proveedor $proveedorOrigen,proveedor $proveedor,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(proveedor_control $proveedor_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $proveedors=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(proveedor_session $proveedor_session);		
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
		public function getHtmlTablaDatosResumen(array $proveedors=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $proveedors=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(proveedor $proveedor=null) : string;
		
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
