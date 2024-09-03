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

namespace com\bydan\contabilidad\cuentascobrar\cliente\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_carga.php');
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_param_return;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\general\tipo_persona\business\logic\tipo_persona_logic;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_carga;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_util;

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\entity\categoria_cliente;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\logic\categoria_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_util;

use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;
use com\bydan\contabilidad\inventario\tipo_precio\business\logic\tipo_precio_logic;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_carga;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_util;

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\entity\giro_negocio_cliente;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\logic\giro_negocio_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_util;

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

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

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


use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\session\cuenta_cobrar_session;

use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_util;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\session\documento_cliente_session;

use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\estimados\estimado\presentation\session\estimado_session;

use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_util;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\presentation\session\imagen_cliente_session;

use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\estimados\consignacion\presentation\session\consignacion_session;

use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_carga;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_util;
use com\bydan\contabilidad\inventario\lista_cliente\presentation\session\lista_cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cliente_base_control extends cliente_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->clienteClase==null) {		
				$this->clienteClase=new cliente();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_persona')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_persona',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_categoria_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_precio')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_precio',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_giro_negocio_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_giro_negocio_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_pais')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_pais',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_provincia')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_provincia',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ciudad')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_ciudad',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_vendedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_vendedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_cliente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_termino_pago_cliente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_impuesto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_retencion',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_fuente')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_retencion_fuente',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_ica')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_retencion_ica',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_otro_impuesto',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->clienteClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->clienteClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->clienteClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->clienteClase->setid_tipo_persona((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_persona'));
				
				$this->clienteClase->setid_categoria_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_cliente'));
				
				$this->clienteClase->setid_tipo_precio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_precio'));
				
				$this->clienteClase->setid_giro_negocio_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_giro_negocio_cliente'));
				
				$this->clienteClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->clienteClase->setruc($this->getDataCampoFormTabla('form'.$this->strSufijo,'ruc'));
				
				$this->clienteClase->setprimer_apellido($this->getDataCampoFormTabla('form'.$this->strSufijo,'primer_apellido'));
				
				$this->clienteClase->setsegundo_apellido($this->getDataCampoFormTabla('form'.$this->strSufijo,'segundo_apellido'));
				
				$this->clienteClase->setprimer_nombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'primer_nombre'));
				
				$this->clienteClase->setsegundo_nombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'segundo_nombre'));
				
				$this->clienteClase->setnombre_completo($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre_completo'));
				
				$this->clienteClase->setdireccion($this->getDataCampoFormTabla('form'.$this->strSufijo,'direccion'));
				
				$this->clienteClase->settelefono($this->getDataCampoFormTabla('form'.$this->strSufijo,'telefono'));
				
				$this->clienteClase->settelefono_movil($this->getDataCampoFormTabla('form'.$this->strSufijo,'telefono_movil'));
				
				$this->clienteClase->sete_mail($this->getDataCampoFormTabla('form'.$this->strSufijo,'e_mail'));
				
				$this->clienteClase->sete_mail2($this->getDataCampoFormTabla('form'.$this->strSufijo,'e_mail2'));
				
				$this->clienteClase->setcomentario($this->getDataCampoFormTabla('form'.$this->strSufijo,'comentario'));
				
				$this->clienteClase->setimagen($this->getDataCampoFormTabla('form'.$this->strSufijo,'imagen'));
				
				$this->clienteClase->setactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'activo')));
				
				$this->clienteClase->setid_pais((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_pais'));
				
				$this->clienteClase->setid_provincia((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_provincia'));
				
				$this->clienteClase->setid_ciudad((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_ciudad'));
				
				$this->clienteClase->setcodigo_postal($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo_postal'));
				
				$this->clienteClase->setfax($this->getDataCampoFormTabla('form'.$this->strSufijo,'fax'));
				
				$this->clienteClase->setcontacto($this->getDataCampoFormTabla('form'.$this->strSufijo,'contacto'));
				
				$this->clienteClase->setid_vendedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_vendedor'));
				
				$this->clienteClase->setmaximo_credito((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'maximo_credito'));
				
				$this->clienteClase->setmaximo_descuento((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'maximo_descuento'));
				
				$this->clienteClase->setinteres_anual((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'interes_anual'));
				
				$this->clienteClase->setbalance((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'balance'));
				
				$this->clienteClase->setid_termino_pago_cliente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_termino_pago_cliente'));
				
				$this->clienteClase->setid_cuenta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta'));
				
				$this->clienteClase->setfacturar_con((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'facturar_con'));
				
				$this->clienteClase->setaplica_impuesto_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'aplica_impuesto_ventas')));
				
				$this->clienteClase->setid_impuesto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto'));
				
				$this->clienteClase->setaplica_retencion_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'aplica_retencion_impuesto')));
				
				$this->clienteClase->setid_retencion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion'));
				
				$this->clienteClase->setaplica_retencion_fuente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'aplica_retencion_fuente')));
				
				$this->clienteClase->setid_retencion_fuente((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_fuente'));
				
				$this->clienteClase->setaplica_retencion_ica(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'aplica_retencion_ica')));
				
				$this->clienteClase->setid_retencion_ica((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_ica'));
				
				$this->clienteClase->setaplica_2do_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'aplica_2do_impuesto')));
				
				$this->clienteClase->setid_otro_impuesto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto'));
				
				$this->clienteClase->setcreado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'creado')));
				
				$this->clienteClase->setmonto_ultima_transaccion((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'monto_ultima_transaccion'));
				
				$this->clienteClase->setfecha_ultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'fecha_ultima_transaccion')));
				
				$this->clienteClase->setdescripcion_ultima_transaccion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion_ultima_transaccion'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->clienteModel->set($this->clienteClase);
				
				/*$this->clienteModel->set($this->migrarModelcliente($this->clienteClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->clienteLogic->getcliente()->setId($this->clienteClase->getId());	
			$this->clienteLogic->getcliente()->setVersionRow($this->clienteClase->getVersionRow());	
			$this->clienteLogic->getcliente()->setVersionRow($this->clienteClase->getVersionRow());	
			$this->clienteLogic->getcliente()->setid_empresa($this->clienteClase->getid_empresa());	
			$this->clienteLogic->getcliente()->setid_tipo_persona($this->clienteClase->getid_tipo_persona());	
			$this->clienteLogic->getcliente()->setid_categoria_cliente($this->clienteClase->getid_categoria_cliente());	
			$this->clienteLogic->getcliente()->setid_tipo_precio($this->clienteClase->getid_tipo_precio());	
			$this->clienteLogic->getcliente()->setid_giro_negocio_cliente($this->clienteClase->getid_giro_negocio_cliente());	
			$this->clienteLogic->getcliente()->setcodigo($this->clienteClase->getcodigo());	
			$this->clienteLogic->getcliente()->setruc($this->clienteClase->getruc());	
			$this->clienteLogic->getcliente()->setprimer_apellido($this->clienteClase->getprimer_apellido());	
			$this->clienteLogic->getcliente()->setsegundo_apellido($this->clienteClase->getsegundo_apellido());	
			$this->clienteLogic->getcliente()->setprimer_nombre($this->clienteClase->getprimer_nombre());	
			$this->clienteLogic->getcliente()->setsegundo_nombre($this->clienteClase->getsegundo_nombre());	
			$this->clienteLogic->getcliente()->setnombre_completo($this->clienteClase->getnombre_completo());	
			$this->clienteLogic->getcliente()->setdireccion($this->clienteClase->getdireccion());	
			$this->clienteLogic->getcliente()->settelefono($this->clienteClase->gettelefono());	
			$this->clienteLogic->getcliente()->settelefono_movil($this->clienteClase->gettelefono_movil());	
			$this->clienteLogic->getcliente()->sete_mail($this->clienteClase->gete_mail());	
			$this->clienteLogic->getcliente()->sete_mail2($this->clienteClase->gete_mail2());	
			$this->clienteLogic->getcliente()->setcomentario($this->clienteClase->getcomentario());	
			$this->clienteLogic->getcliente()->setimagen($this->clienteClase->getimagen());	
			$this->clienteLogic->getcliente()->setactivo($this->clienteClase->getactivo());	
			$this->clienteLogic->getcliente()->setid_pais($this->clienteClase->getid_pais());	
			$this->clienteLogic->getcliente()->setid_provincia($this->clienteClase->getid_provincia());	
			$this->clienteLogic->getcliente()->setid_ciudad($this->clienteClase->getid_ciudad());	
			$this->clienteLogic->getcliente()->setcodigo_postal($this->clienteClase->getcodigo_postal());	
			$this->clienteLogic->getcliente()->setfax($this->clienteClase->getfax());	
			$this->clienteLogic->getcliente()->setcontacto($this->clienteClase->getcontacto());	
			$this->clienteLogic->getcliente()->setid_vendedor($this->clienteClase->getid_vendedor());	
			$this->clienteLogic->getcliente()->setmaximo_credito($this->clienteClase->getmaximo_credito());	
			$this->clienteLogic->getcliente()->setmaximo_descuento($this->clienteClase->getmaximo_descuento());	
			$this->clienteLogic->getcliente()->setinteres_anual($this->clienteClase->getinteres_anual());	
			$this->clienteLogic->getcliente()->setbalance($this->clienteClase->getbalance());	
			$this->clienteLogic->getcliente()->setid_termino_pago_cliente($this->clienteClase->getid_termino_pago_cliente());	
			$this->clienteLogic->getcliente()->setid_cuenta($this->clienteClase->getid_cuenta());	
			$this->clienteLogic->getcliente()->setfacturar_con($this->clienteClase->getfacturar_con());	
			$this->clienteLogic->getcliente()->setaplica_impuesto_ventas($this->clienteClase->getaplica_impuesto_ventas());	
			$this->clienteLogic->getcliente()->setid_impuesto($this->clienteClase->getid_impuesto());	
			$this->clienteLogic->getcliente()->setaplica_retencion_impuesto($this->clienteClase->getaplica_retencion_impuesto());	
			$this->clienteLogic->getcliente()->setid_retencion($this->clienteClase->getid_retencion());	
			$this->clienteLogic->getcliente()->setaplica_retencion_fuente($this->clienteClase->getaplica_retencion_fuente());	
			$this->clienteLogic->getcliente()->setid_retencion_fuente($this->clienteClase->getid_retencion_fuente());	
			$this->clienteLogic->getcliente()->setaplica_retencion_ica($this->clienteClase->getaplica_retencion_ica());	
			$this->clienteLogic->getcliente()->setid_retencion_ica($this->clienteClase->getid_retencion_ica());	
			$this->clienteLogic->getcliente()->setaplica_2do_impuesto($this->clienteClase->getaplica_2do_impuesto());	
			$this->clienteLogic->getcliente()->setid_otro_impuesto($this->clienteClase->getid_otro_impuesto());	
			$this->clienteLogic->getcliente()->setcreado($this->clienteClase->getcreado());	
			$this->clienteLogic->getcliente()->setmonto_ultima_transaccion($this->clienteClase->getmonto_ultima_transaccion());	
			$this->clienteLogic->getcliente()->setfecha_ultima_transaccion($this->clienteClase->getfecha_ultima_transaccion());	
			$this->clienteLogic->getcliente()->setdescripcion_ultima_transaccion($this->clienteClase->getdescripcion_ultima_transaccion());	
		} else {
			$this->clienteClase->setId($this->clienteLogic->getcliente()->getId());	
			$this->clienteClase->setVersionRow($this->clienteLogic->getcliente()->getVersionRow());	
			$this->clienteClase->setVersionRow($this->clienteLogic->getcliente()->getVersionRow());	
			$this->clienteClase->setid_empresa($this->clienteLogic->getcliente()->getid_empresa());	
			$this->clienteClase->setid_tipo_persona($this->clienteLogic->getcliente()->getid_tipo_persona());	
			$this->clienteClase->setid_categoria_cliente($this->clienteLogic->getcliente()->getid_categoria_cliente());	
			$this->clienteClase->setid_tipo_precio($this->clienteLogic->getcliente()->getid_tipo_precio());	
			$this->clienteClase->setid_giro_negocio_cliente($this->clienteLogic->getcliente()->getid_giro_negocio_cliente());	
			$this->clienteClase->setcodigo($this->clienteLogic->getcliente()->getcodigo());	
			$this->clienteClase->setruc($this->clienteLogic->getcliente()->getruc());	
			$this->clienteClase->setprimer_apellido($this->clienteLogic->getcliente()->getprimer_apellido());	
			$this->clienteClase->setsegundo_apellido($this->clienteLogic->getcliente()->getsegundo_apellido());	
			$this->clienteClase->setprimer_nombre($this->clienteLogic->getcliente()->getprimer_nombre());	
			$this->clienteClase->setsegundo_nombre($this->clienteLogic->getcliente()->getsegundo_nombre());	
			$this->clienteClase->setnombre_completo($this->clienteLogic->getcliente()->getnombre_completo());	
			$this->clienteClase->setdireccion($this->clienteLogic->getcliente()->getdireccion());	
			$this->clienteClase->settelefono($this->clienteLogic->getcliente()->gettelefono());	
			$this->clienteClase->settelefono_movil($this->clienteLogic->getcliente()->gettelefono_movil());	
			$this->clienteClase->sete_mail($this->clienteLogic->getcliente()->gete_mail());	
			$this->clienteClase->sete_mail2($this->clienteLogic->getcliente()->gete_mail2());	
			$this->clienteClase->setcomentario($this->clienteLogic->getcliente()->getcomentario());	
			$this->clienteClase->setimagen($this->clienteLogic->getcliente()->getimagen());	
			$this->clienteClase->setactivo($this->clienteLogic->getcliente()->getactivo());	
			$this->clienteClase->setid_pais($this->clienteLogic->getcliente()->getid_pais());	
			$this->clienteClase->setid_provincia($this->clienteLogic->getcliente()->getid_provincia());	
			$this->clienteClase->setid_ciudad($this->clienteLogic->getcliente()->getid_ciudad());	
			$this->clienteClase->setcodigo_postal($this->clienteLogic->getcliente()->getcodigo_postal());	
			$this->clienteClase->setfax($this->clienteLogic->getcliente()->getfax());	
			$this->clienteClase->setcontacto($this->clienteLogic->getcliente()->getcontacto());	
			$this->clienteClase->setid_vendedor($this->clienteLogic->getcliente()->getid_vendedor());	
			$this->clienteClase->setmaximo_credito($this->clienteLogic->getcliente()->getmaximo_credito());	
			$this->clienteClase->setmaximo_descuento($this->clienteLogic->getcliente()->getmaximo_descuento());	
			$this->clienteClase->setinteres_anual($this->clienteLogic->getcliente()->getinteres_anual());	
			$this->clienteClase->setbalance($this->clienteLogic->getcliente()->getbalance());	
			$this->clienteClase->setid_termino_pago_cliente($this->clienteLogic->getcliente()->getid_termino_pago_cliente());	
			$this->clienteClase->setid_cuenta($this->clienteLogic->getcliente()->getid_cuenta());	
			$this->clienteClase->setfacturar_con($this->clienteLogic->getcliente()->getfacturar_con());	
			$this->clienteClase->setaplica_impuesto_ventas($this->clienteLogic->getcliente()->getaplica_impuesto_ventas());	
			$this->clienteClase->setid_impuesto($this->clienteLogic->getcliente()->getid_impuesto());	
			$this->clienteClase->setaplica_retencion_impuesto($this->clienteLogic->getcliente()->getaplica_retencion_impuesto());	
			$this->clienteClase->setid_retencion($this->clienteLogic->getcliente()->getid_retencion());	
			$this->clienteClase->setaplica_retencion_fuente($this->clienteLogic->getcliente()->getaplica_retencion_fuente());	
			$this->clienteClase->setid_retencion_fuente($this->clienteLogic->getcliente()->getid_retencion_fuente());	
			$this->clienteClase->setaplica_retencion_ica($this->clienteLogic->getcliente()->getaplica_retencion_ica());	
			$this->clienteClase->setid_retencion_ica($this->clienteLogic->getcliente()->getid_retencion_ica());	
			$this->clienteClase->setaplica_2do_impuesto($this->clienteLogic->getcliente()->getaplica_2do_impuesto());	
			$this->clienteClase->setid_otro_impuesto($this->clienteLogic->getcliente()->getid_otro_impuesto());	
			$this->clienteClase->setcreado($this->clienteLogic->getcliente()->getcreado());	
			$this->clienteClase->setmonto_ultima_transaccion($this->clienteLogic->getcliente()->getmonto_ultima_transaccion());	
			$this->clienteClase->setfecha_ultima_transaccion($this->clienteLogic->getcliente()->getfecha_ultima_transaccion());	
			$this->clienteClase->setdescripcion_ultima_transaccion($this->clienteLogic->getcliente()->getdescripcion_ultima_transaccion());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->clienteModel->invalidFieldsMe();
		
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
		if($strNombreCampo=='id_categoria_cliente') {$this->strMensajeid_categoria_cliente=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_precio') {$this->strMensajeid_tipo_precio=$strMensajeCampo;}
		if($strNombreCampo=='id_giro_negocio_cliente') {$this->strMensajeid_giro_negocio_cliente=$strMensajeCampo;}
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
		if($strNombreCampo=='id_termino_pago_cliente') {$this->strMensajeid_termino_pago_cliente=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta') {$this->strMensajeid_cuenta=$strMensajeCampo;}
		if($strNombreCampo=='facturar_con') {$this->strMensajefacturar_con=$strMensajeCampo;}
		if($strNombreCampo=='aplica_impuesto_ventas') {$this->strMensajeaplica_impuesto_ventas=$strMensajeCampo;}
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
		$this->strMensajeid_categoria_cliente='';
		$this->strMensajeid_tipo_precio='';
		$this->strMensajeid_giro_negocio_cliente='';
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
		$this->strMensajeid_termino_pago_cliente='';
		$this->strMensajeid_cuenta='';
		$this->strMensajefacturar_con='';
		$this->strMensajeaplica_impuesto_ventas='';
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
				$this->clienteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
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
				$this->clienteLogic->getNewConnexionToDeep();
			}

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
						
			if($cliente_session==null) {
				$cliente_session=new cliente_session();
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
						$this->clienteLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->clienteActual =$this->clienteClase;
			
			/*$this->clienteActual =$this->migrarModelcliente($this->clienteClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->clienteLogic->getclientes(),$this->clienteActual);
			
			$this->actualizarControllerConReturnGeneral($this->clienteReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
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
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$clientesLocal=$this->getListaActual();
		
		$iIndice=cliente_util::getIndiceNuevo($clientesLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(cliente $cliente,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$clientesLocal=$this->getListaActual();
		
		$iIndice=cliente_util::getIndiceActual($clientesLocal,$cliente,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevocliente')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->clienteActual =$this->clienteClase;
			
			/*$this->clienteActual =$this->migrarModelcliente($this->clienteClase);*/
			
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
			
			$this->clienteLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_persona');$classes[]=$class;
				$class=new Classe('categoria_cliente');$classes[]=$class;
				$class=new Classe('tipo_precio');$classes[]=$class;
				$class=new Classe('giro_negocio_cliente');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('provincia');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago_cliente');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
				$class=new Classe('retencion_fuente');$classes[]=$class;
				$class=new Classe('retencion_ica');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
			
			$this->clienteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->clienteLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->clienteLogic->setcliente(new cliente());
				
				$this->clienteLogic->getcliente()->setIsNew(true);
				$this->clienteLogic->getcliente()->setIsChanged(true);
				$this->clienteLogic->getcliente()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->clienteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->clienteLogic->clientes[]=$this->clienteLogic->getcliente();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->clienteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacobrars=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$cuentacobrarsEliminados=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacobrars=array_merge($cuentacobrars,$cuentacobrarsEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentoclientes=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME.'Lista'));
							$documentoclientesEliminados=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentoclientes=array_merge($documentoclientes,$documentoclientesEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenclientes=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME.'Lista'));
							$imagenclientesEliminados=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenclientes=array_merge($imagenclientes,$imagenclientesEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaclientes=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'Lista'));
							$listaclientesEliminados=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaclientes=array_merge($listaclientes,$listaclientesEliminados);
							
							$this->clienteLogic->saveRelaciones($this->clienteLogic->getcliente(),$devolucionfacturas,$cuentacobrars,$documentoclientes,$estimados,$imagenclientes,$facturas,$consignacions,$listaclientes);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->clienteLogic->getcliente()->setIsChanged(true);
				$this->clienteLogic->getcliente()->setIsNew(false);
				$this->clienteLogic->getcliente()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->clienteModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->clienteLogic->getcliente(),$this->clienteLogic->getclientes());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->clienteLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacobrars=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$cuentacobrarsEliminados=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacobrars=array_merge($cuentacobrars,$cuentacobrarsEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentoclientes=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME.'Lista'));
							$documentoclientesEliminados=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentoclientes=array_merge($documentoclientes,$documentoclientesEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenclientes=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME.'Lista'));
							$imagenclientesEliminados=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenclientes=array_merge($imagenclientes,$imagenclientesEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaclientes=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'Lista'));
							$listaclientesEliminados=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaclientes=array_merge($listaclientes,$listaclientesEliminados);
							
							$this->clienteLogic->saveRelaciones($this->clienteLogic->getcliente(),$devolucionfacturas,$cuentacobrars,$documentoclientes,$estimados,$imagenclientes,$facturas,$consignacions,$listaclientes);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->clienteLogic->getcliente()->setIsDeleted(true);
				$this->clienteLogic->getcliente()->setIsNew(false);
				$this->clienteLogic->getcliente()->setIsChanged(false);				
				
				$this->actualizarLista($this->clienteLogic->getcliente(),$this->clienteLogic->getclientes());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->clienteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);

							foreach($devolucionfacturas as $devolucionfactura1) {
								$devolucionfactura1->setIsDeleted(true);
							}
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacobrars=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$cuentacobrarsEliminados=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacobrars=array_merge($cuentacobrars,$cuentacobrarsEliminados);

							foreach($cuentacobrars as $cuentacobrar1) {
								$cuentacobrar1->setIsDeleted(true);
							}
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentoclientes=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME.'Lista'));
							$documentoclientesEliminados=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentoclientes=array_merge($documentoclientes,$documentoclientesEliminados);

							foreach($documentoclientes as $documentocliente1) {
								$documentocliente1->setIsDeleted(true);
							}
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);

							foreach($estimados as $estimado1) {
								$estimado1->setIsDeleted(true);
							}
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenclientes=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME.'Lista'));
							$imagenclientesEliminados=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenclientes=array_merge($imagenclientes,$imagenclientesEliminados);

							foreach($imagenclientes as $imagencliente1) {
								$imagencliente1->setIsDeleted(true);
							}
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);

							foreach($facturas as $factura1) {
								$factura1->setIsDeleted(true);
							}
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);

							foreach($consignacions as $consignacion1) {
								$consignacion1->setIsDeleted(true);
							}
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaclientes=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'Lista'));
							$listaclientesEliminados=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaclientes=array_merge($listaclientes,$listaclientesEliminados);

							foreach($listaclientes as $listacliente1) {
								$listacliente1->setIsDeleted(true);
							}
							
						$this->clienteLogic->saveRelaciones($this->clienteLogic->getcliente(),$devolucionfacturas,$cuentacobrars,$documentoclientes,$estimados,$imagenclientes,$facturas,$consignacions,$listaclientes);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->clientesEliminados[]=$this->clienteLogic->getcliente();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->clienteLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$devolucionfacturas=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'Lista'));
							$devolucionfacturasEliminados=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$devolucionfacturas=array_merge($devolucionfacturas,$devolucionfacturasEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$cuentacobrars=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'Lista'));
							$cuentacobrarsEliminados=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados'));
							$cuentacobrars=array_merge($cuentacobrars,$cuentacobrarsEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							documento_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$documentoclientes=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME.'Lista'));
							$documentoclientesEliminados=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$documentoclientes=array_merge($documentoclientes,$documentoclientesEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$estimados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'Lista'));
							$estimadosEliminados=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME.'ListaEliminados'));
							$estimados=array_merge($estimados,$estimadosEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenclientes=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME.'Lista'));
							$imagenclientesEliminados=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenclientes=array_merge($imagenclientes,$imagenclientesEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$facturas=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'Lista'));
							$facturasEliminados=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME.'ListaEliminados'));
							$facturas=array_merge($facturas,$facturasEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$consignacions=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'Lista'));
							$consignacionsEliminados=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME.'ListaEliminados'));
							$consignacions=array_merge($consignacions,$consignacionsEliminados);
							cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaclientes=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'Lista'));
							$listaclientesEliminados=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaclientes=array_merge($listaclientes,$listaclientesEliminados);
							
						$this->clienteLogic->saveRelaciones($this->clienteLogic->getcliente(),$devolucionfacturas,$cuentacobrars,$documentoclientes,$estimados,$imagenclientes,$facturas,$consignacions,$listaclientes);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->clientesEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->clienteLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->clienteLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->clientesEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_persona');$classes[]=$class;
				$class=new Classe('categoria_cliente');$classes[]=$class;
				$class=new Classe('tipo_precio');$classes[]=$class;
				$class=new Classe('giro_negocio_cliente');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('provincia');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago_cliente');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
				$class=new Classe('retencion_fuente');$classes[]=$class;
				$class=new Classe('retencion_ica');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->clienteLogic->setclientes();*/
					
					$this->clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->clienteLogic->setIsConDeepLoad(false);
			
			$this->clientes=$this->clienteLogic->getclientes();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(cliente_util::$STR_SESSION_NAME.'Lista',serialize($this->clientes));
				$this->Session->write(cliente_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->clientesEliminados));
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
				$this->clienteLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
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
				$this->clienteLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalcliente;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->clienteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->clientes as $clienteLocal) {
				if($this->clienteLogic->getcliente()->getId()==$clienteLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->clienteLogic->getcliente()->setIsDeleted(true);
			$this->clientesEliminados[]=$this->clienteLogic->getcliente();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->clientes[$indice]);
				
				$this->clientes = array_values($this->clientes);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelcliente($this->clienteClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(cliente $cliente,array $clientes) {
		try {
			foreach($clientes as $clienteLocal){ 
				if($clienteLocal->getId()==$cliente->getId()) {
					$clienteLocal->setIsChanged($cliente->getIsChanged());
					$clienteLocal->setIsNew($cliente->getIsNew());
					$clienteLocal->setIsDeleted($cliente->getIsDeleted());
					//$clienteLocal->setbitExpired($cliente->getbitExpired());
					
					$clienteLocal->setId($cliente->getId());	
					$clienteLocal->setVersionRow($cliente->getVersionRow());	
					$clienteLocal->setVersionRow($cliente->getVersionRow());	
					$clienteLocal->setid_empresa($cliente->getid_empresa());	
					$clienteLocal->setid_tipo_persona($cliente->getid_tipo_persona());	
					$clienteLocal->setid_categoria_cliente($cliente->getid_categoria_cliente());	
					$clienteLocal->setid_tipo_precio($cliente->getid_tipo_precio());	
					$clienteLocal->setid_giro_negocio_cliente($cliente->getid_giro_negocio_cliente());	
					$clienteLocal->setcodigo($cliente->getcodigo());	
					$clienteLocal->setruc($cliente->getruc());	
					$clienteLocal->setprimer_apellido($cliente->getprimer_apellido());	
					$clienteLocal->setsegundo_apellido($cliente->getsegundo_apellido());	
					$clienteLocal->setprimer_nombre($cliente->getprimer_nombre());	
					$clienteLocal->setsegundo_nombre($cliente->getsegundo_nombre());	
					$clienteLocal->setnombre_completo($cliente->getnombre_completo());	
					$clienteLocal->setdireccion($cliente->getdireccion());	
					$clienteLocal->settelefono($cliente->gettelefono());	
					$clienteLocal->settelefono_movil($cliente->gettelefono_movil());	
					$clienteLocal->sete_mail($cliente->gete_mail());	
					$clienteLocal->sete_mail2($cliente->gete_mail2());	
					$clienteLocal->setcomentario($cliente->getcomentario());	
					$clienteLocal->setimagen($cliente->getimagen());	
					$clienteLocal->setactivo($cliente->getactivo());	
					$clienteLocal->setid_pais($cliente->getid_pais());	
					$clienteLocal->setid_provincia($cliente->getid_provincia());	
					$clienteLocal->setid_ciudad($cliente->getid_ciudad());	
					$clienteLocal->setcodigo_postal($cliente->getcodigo_postal());	
					$clienteLocal->setfax($cliente->getfax());	
					$clienteLocal->setcontacto($cliente->getcontacto());	
					$clienteLocal->setid_vendedor($cliente->getid_vendedor());	
					$clienteLocal->setmaximo_credito($cliente->getmaximo_credito());	
					$clienteLocal->setmaximo_descuento($cliente->getmaximo_descuento());	
					$clienteLocal->setinteres_anual($cliente->getinteres_anual());	
					$clienteLocal->setbalance($cliente->getbalance());	
					$clienteLocal->setid_termino_pago_cliente($cliente->getid_termino_pago_cliente());	
					$clienteLocal->setid_cuenta($cliente->getid_cuenta());	
					$clienteLocal->setfacturar_con($cliente->getfacturar_con());	
					$clienteLocal->setaplica_impuesto_ventas($cliente->getaplica_impuesto_ventas());	
					$clienteLocal->setid_impuesto($cliente->getid_impuesto());	
					$clienteLocal->setaplica_retencion_impuesto($cliente->getaplica_retencion_impuesto());	
					$clienteLocal->setid_retencion($cliente->getid_retencion());	
					$clienteLocal->setaplica_retencion_fuente($cliente->getaplica_retencion_fuente());	
					$clienteLocal->setid_retencion_fuente($cliente->getid_retencion_fuente());	
					$clienteLocal->setaplica_retencion_ica($cliente->getaplica_retencion_ica());	
					$clienteLocal->setid_retencion_ica($cliente->getid_retencion_ica());	
					$clienteLocal->setaplica_2do_impuesto($cliente->getaplica_2do_impuesto());	
					$clienteLocal->setid_otro_impuesto($cliente->getid_otro_impuesto());	
					$clienteLocal->setcreado($cliente->getcreado());	
					$clienteLocal->setmonto_ultima_transaccion($cliente->getmonto_ultima_transaccion());	
					$clienteLocal->setfecha_ultima_transaccion($cliente->getfecha_ultima_transaccion());	
					$clienteLocal->setdescripcion_ultima_transaccion($cliente->getdescripcion_ultima_transaccion());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$clientesLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$clientesLocal=$this->clienteLogic->getclientes();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$clientesLocal=$this->clientes;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $clientesLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->clienteLogic->getclientes() as $cliente) {
				if($cliente->getId()==$id) {
					$this->clienteLogic->setcliente($cliente);
					
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
		/*$clientesSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->clientes as $cliente) {
			$cliente->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->clientes[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cliente_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
						
		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		
		$this->clienteReturnGeneral=new cliente_param_return();
		$this->clienteParameterGeneral=new cliente_param_return();
			
		$this->clienteParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualcliente(this.cliente,true);
			this.setVariablesFormularioToObjetoActualForeignKeyscliente(this.cliente);*/
			
			if($cliente_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualcliente(this.cliente,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->clienteActual=$this->clienteClase;
				
				$this->setCopiarVariablesObjetos($this->clienteActual,$this->cliente,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->clienteReturnGeneral=$this->clienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->clienteLogic->getclientes(),$this->cliente,$this->clienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($cliente_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeancliente($classes,$this->clienteReturnGeneral,$this->clienteBean,false);*/
				}
					
				if($this->clienteReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->clienteReturnGeneral->getcliente(),$this->clienteActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeycliente($this->clienteReturnGeneral->getcliente());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariocliente($this->clienteReturnGeneral->getcliente());*/
				}
					
				if($this->clienteReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->clienteReturnGeneral->getcliente(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cliente,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(clienteJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualcliente(this.cliente,true);
				this.setVariablesFormularioToObjetoActualForeignKeyscliente(this.cliente);				
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
				
				if($this->clienteAnterior!=null) {
					$this->cliente=$this->clienteAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->clienteReturnGeneral=$this->clienteLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->clienteLogic->getclientes(),$this->cliente,$this->clienteParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->clienteReturnGeneral->getcliente(),$this->clienteLogic->getclientes());
			*/
		}
		
		return $this->clienteReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			$this->clienteReturnGeneral=new cliente_param_return();			
			$this->clienteParameterGeneral=new cliente_param_return();
			
			$this->clienteParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->clienteReturnGeneral=$this->clienteLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->clientes,$this->clienteParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->clienteReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->clienteReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->clienteReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
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
		
		$this->clienteReturnGeneral=new cliente_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_cliente') {
		    $sDominio='cliente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->clienteReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->clienteReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='cliente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='cliente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='cliente';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->clienteReturnGeneral=new cliente_param_return();
		$this->clienteParameterGeneral=new cliente_param_return();
			
		$this->clienteParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->clienteReturnGeneral=$this->clienteLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->clienteLogic->getclientes(),$this->cliente,$this->clienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->clienteReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->clienteReturnGeneral->getcliente(),$classes);*/
		}									
	
		if($this->clienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->clienteReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->clienteReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $clientes,cliente $cliente) {
		
		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
						
		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(cliente_util::$CLASSNAME);
			}	
			*/
			
			$this->clienteReturnGeneral=new cliente_param_return();
			$this->clienteParameterGeneral=new cliente_param_return();
			
			$this->clienteParameterGeneral->setdata($this->data);
		
		
			
		if($cliente_session->conGuardarRelaciones) {
			$classes=cliente_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->clienteActual,$this->cliente,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->clienteReturnGeneral=$this->clienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->clienteLogic->getclientes(),$this->clienteActual,$this->clienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->clienteReturnGeneral=$this->clienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$clientes,$cliente,$this->clienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelcliente($this->clienteLogic->getcliente());*/
			
			$this->cliente=$this->clienteLogic->getcliente();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->cliente);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$clienteActual=new cliente();
			
			if($this->clienteClase==null) {		
				$this->clienteClase=new cliente();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$clienteActual=$this->clientes[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $clienteActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $clienteActual->setid_tipo_persona((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $clienteActual->setid_categoria_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $clienteActual->setid_tipo_precio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $clienteActual->setid_giro_negocio_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $clienteActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $clienteActual->setruc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $clienteActual->setprimer_apellido($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $clienteActual->setsegundo_apellido($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $clienteActual->setprimer_nombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $clienteActual->setsegundo_nombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $clienteActual->setnombre_completo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $clienteActual->setdireccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $clienteActual->settelefono($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $clienteActual->settelefono_movil($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $clienteActual->sete_mail($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $clienteActual->sete_mail2($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $clienteActual->setcomentario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $clienteActual->setimagen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $clienteActual->setactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_22')));  } else { $clienteActual->setactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $clienteActual->setid_pais((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $clienteActual->setid_provincia((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $clienteActual->setid_ciudad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $clienteActual->setcodigo_postal($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $clienteActual->setfax($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $clienteActual->setcontacto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $clienteActual->setid_vendedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $clienteActual->setmaximo_credito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $clienteActual->setmaximo_descuento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $clienteActual->setinteres_anual((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $clienteActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $clienteActual->setid_termino_pago_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $clienteActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_35'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $clienteActual->setfacturar_con((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $clienteActual->setaplica_impuesto_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_37')));  } else { $clienteActual->setaplica_impuesto_ventas(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $clienteActual->setid_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $clienteActual->setaplica_retencion_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_39')));  } else { $clienteActual->setaplica_retencion_impuesto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $clienteActual->setid_retencion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $clienteActual->setaplica_retencion_fuente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_41')));  } else { $clienteActual->setaplica_retencion_fuente(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_42','t'.$this->strSufijo)) {  $clienteActual->setid_retencion_fuente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_42'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_43','t'.$this->strSufijo)) {  $clienteActual->setaplica_retencion_ica(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_43')));  } else { $clienteActual->setaplica_retencion_ica(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_44','t'.$this->strSufijo)) {  $clienteActual->setid_retencion_ica((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_44'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_45','t'.$this->strSufijo)) {  $clienteActual->setaplica_2do_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_45')));  } else { $clienteActual->setaplica_2do_impuesto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_46','t'.$this->strSufijo)) {  $clienteActual->setid_otro_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_46'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_47','t'.$this->strSufijo)) {  $clienteActual->setcreado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_47')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_48','t'.$this->strSufijo)) {  $clienteActual->setmonto_ultima_transaccion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_48'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_49','t'.$this->strSufijo)) {  $clienteActual->setfecha_ultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_49')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_50','t'.$this->strSufijo)) {  $clienteActual->setdescripcion_ultima_transaccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_50'));  }

				$this->clienteClase=$clienteActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->clienteModel->set($this->clienteClase);
				
				/*$this->clienteModel->set($this->migrarModelcliente($this->clienteClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->clientes=$this->migrarModelcliente($this->clienteLogic->getclientes());							
		$this->clientes=$this->clienteLogic->getclientes();*/
		
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
			$this->Session->write(cliente_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$cliente_control_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($cliente_control_session==null) {
				$cliente_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($cliente_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(cliente_util::$STR_SESSION_NAME,$this);*/
		} else {
			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
			
			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}
			
			$this->set(cliente_util::$STR_SESSION_NAME, $cliente_session);
		}
	}
	
	public function setCopiarVariablesObjetos(cliente $clienteOrigen,cliente $cliente,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($cliente==null) {
				$cliente=new cliente();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $clienteOrigen->getId()!=null && $clienteOrigen->getId()!=0)) {$cliente->setId($clienteOrigen->getId());}}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_tipo_persona()!=null && $clienteOrigen->getid_tipo_persona()!=-1)) {$cliente->setid_tipo_persona($clienteOrigen->getid_tipo_persona());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_categoria_cliente()!=null && $clienteOrigen->getid_categoria_cliente()!=-1)) {$cliente->setid_categoria_cliente($clienteOrigen->getid_categoria_cliente());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_tipo_precio()!=null && $clienteOrigen->getid_tipo_precio()!=-1)) {$cliente->setid_tipo_precio($clienteOrigen->getid_tipo_precio());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_giro_negocio_cliente()!=null && $clienteOrigen->getid_giro_negocio_cliente()!=-1)) {$cliente->setid_giro_negocio_cliente($clienteOrigen->getid_giro_negocio_cliente());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getcodigo()!=null && $clienteOrigen->getcodigo()!='')) {$cliente->setcodigo($clienteOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getruc()!=null && $clienteOrigen->getruc()!='')) {$cliente->setruc($clienteOrigen->getruc());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getprimer_apellido()!=null && $clienteOrigen->getprimer_apellido()!='')) {$cliente->setprimer_apellido($clienteOrigen->getprimer_apellido());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getsegundo_apellido()!=null && $clienteOrigen->getsegundo_apellido()!='')) {$cliente->setsegundo_apellido($clienteOrigen->getsegundo_apellido());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getprimer_nombre()!=null && $clienteOrigen->getprimer_nombre()!='')) {$cliente->setprimer_nombre($clienteOrigen->getprimer_nombre());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getsegundo_nombre()!=null && $clienteOrigen->getsegundo_nombre()!='')) {$cliente->setsegundo_nombre($clienteOrigen->getsegundo_nombre());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getnombre_completo()!=null && $clienteOrigen->getnombre_completo()!='')) {$cliente->setnombre_completo($clienteOrigen->getnombre_completo());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getdireccion()!=null && $clienteOrigen->getdireccion()!='')) {$cliente->setdireccion($clienteOrigen->getdireccion());}
			if($conDefault || ($conDefault==false && $clienteOrigen->gettelefono()!=null && $clienteOrigen->gettelefono()!='')) {$cliente->settelefono($clienteOrigen->gettelefono());}
			if($conDefault || ($conDefault==false && $clienteOrigen->gettelefono_movil()!=null && $clienteOrigen->gettelefono_movil()!='')) {$cliente->settelefono_movil($clienteOrigen->gettelefono_movil());}
			if($conDefault || ($conDefault==false && $clienteOrigen->gete_mail()!=null && $clienteOrigen->gete_mail()!='')) {$cliente->sete_mail($clienteOrigen->gete_mail());}
			if($conDefault || ($conDefault==false && $clienteOrigen->gete_mail2()!=null && $clienteOrigen->gete_mail2()!='')) {$cliente->sete_mail2($clienteOrigen->gete_mail2());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getcomentario()!=null && $clienteOrigen->getcomentario()!='')) {$cliente->setcomentario($clienteOrigen->getcomentario());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getimagen()!=null && $clienteOrigen->getimagen()!='')) {$cliente->setimagen($clienteOrigen->getimagen());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getactivo()!=null && $clienteOrigen->getactivo()!=true)) {$cliente->setactivo($clienteOrigen->getactivo());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_pais()!=null && $clienteOrigen->getid_pais()!=-1)) {$cliente->setid_pais($clienteOrigen->getid_pais());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_provincia()!=null && $clienteOrigen->getid_provincia()!=-1)) {$cliente->setid_provincia($clienteOrigen->getid_provincia());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_ciudad()!=null && $clienteOrigen->getid_ciudad()!=-1)) {$cliente->setid_ciudad($clienteOrigen->getid_ciudad());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getcodigo_postal()!=null && $clienteOrigen->getcodigo_postal()!='')) {$cliente->setcodigo_postal($clienteOrigen->getcodigo_postal());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getfax()!=null && $clienteOrigen->getfax()!='')) {$cliente->setfax($clienteOrigen->getfax());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getcontacto()!=null && $clienteOrigen->getcontacto()!='')) {$cliente->setcontacto($clienteOrigen->getcontacto());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_vendedor()!=null && $clienteOrigen->getid_vendedor()!=-1)) {$cliente->setid_vendedor($clienteOrigen->getid_vendedor());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getmaximo_credito()!=null && $clienteOrigen->getmaximo_credito()!=0.0)) {$cliente->setmaximo_credito($clienteOrigen->getmaximo_credito());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getmaximo_descuento()!=null && $clienteOrigen->getmaximo_descuento()!=0.0)) {$cliente->setmaximo_descuento($clienteOrigen->getmaximo_descuento());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getinteres_anual()!=null && $clienteOrigen->getinteres_anual()!=0.0)) {$cliente->setinteres_anual($clienteOrigen->getinteres_anual());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getbalance()!=null && $clienteOrigen->getbalance()!=0.0)) {$cliente->setbalance($clienteOrigen->getbalance());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_termino_pago_cliente()!=null && $clienteOrigen->getid_termino_pago_cliente()!=-1)) {$cliente->setid_termino_pago_cliente($clienteOrigen->getid_termino_pago_cliente());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_cuenta()!=null && $clienteOrigen->getid_cuenta()!=null)) {$cliente->setid_cuenta($clienteOrigen->getid_cuenta());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getfacturar_con()!=null && $clienteOrigen->getfacturar_con()!=0)) {$cliente->setfacturar_con($clienteOrigen->getfacturar_con());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getaplica_impuesto_ventas()!=null && $clienteOrigen->getaplica_impuesto_ventas()!=false)) {$cliente->setaplica_impuesto_ventas($clienteOrigen->getaplica_impuesto_ventas());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_impuesto()!=null && $clienteOrigen->getid_impuesto()!=-1)) {$cliente->setid_impuesto($clienteOrigen->getid_impuesto());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getaplica_retencion_impuesto()!=null && $clienteOrigen->getaplica_retencion_impuesto()!=false)) {$cliente->setaplica_retencion_impuesto($clienteOrigen->getaplica_retencion_impuesto());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_retencion()!=null && $clienteOrigen->getid_retencion()!=null)) {$cliente->setid_retencion($clienteOrigen->getid_retencion());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getaplica_retencion_fuente()!=null && $clienteOrigen->getaplica_retencion_fuente()!=false)) {$cliente->setaplica_retencion_fuente($clienteOrigen->getaplica_retencion_fuente());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_retencion_fuente()!=null && $clienteOrigen->getid_retencion_fuente()!=null)) {$cliente->setid_retencion_fuente($clienteOrigen->getid_retencion_fuente());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getaplica_retencion_ica()!=null && $clienteOrigen->getaplica_retencion_ica()!=false)) {$cliente->setaplica_retencion_ica($clienteOrigen->getaplica_retencion_ica());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_retencion_ica()!=null && $clienteOrigen->getid_retencion_ica()!=null)) {$cliente->setid_retencion_ica($clienteOrigen->getid_retencion_ica());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getaplica_2do_impuesto()!=null && $clienteOrigen->getaplica_2do_impuesto()!=false)) {$cliente->setaplica_2do_impuesto($clienteOrigen->getaplica_2do_impuesto());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getid_otro_impuesto()!=null && $clienteOrigen->getid_otro_impuesto()!=null)) {$cliente->setid_otro_impuesto($clienteOrigen->getid_otro_impuesto());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getcreado()!=null && $clienteOrigen->getcreado()!=date('Y-m-d'))) {$cliente->setcreado($clienteOrigen->getcreado());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getmonto_ultima_transaccion()!=null && $clienteOrigen->getmonto_ultima_transaccion()!=0.0)) {$cliente->setmonto_ultima_transaccion($clienteOrigen->getmonto_ultima_transaccion());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getfecha_ultima_transaccion()!=null && $clienteOrigen->getfecha_ultima_transaccion()!=date('Y-m-d'))) {$cliente->setfecha_ultima_transaccion($clienteOrigen->getfecha_ultima_transaccion());}
			if($conDefault || ($conDefault==false && $clienteOrigen->getdescripcion_ultima_transaccion()!=null && $clienteOrigen->getdescripcion_ultima_transaccion()!='')) {$cliente->setdescripcion_ultima_transaccion($clienteOrigen->getdescripcion_ultima_transaccion());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$clientesSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$clientesSeleccionados[]=$this->clientes[$indice];
			}
		}
		
		return $clientesSeleccionados;
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
		$cliente= new cliente();
		
		foreach($this->clienteLogic->getclientes() as $cliente) {
			
		$cliente->devolucionfacturas=array();
		$cliente->cuentacobrars=array();
		$cliente->documentoclientes=array();
		$cliente->estimados=array();
		$cliente->imagenclientes=array();
		$cliente->facturas=array();
		$cliente->consignacions=array();
		$cliente->listaclientes=array();
		}		
		
		if($cliente!=null);
	}
	
	public function cargarRelaciones(array $clientes=array()) : array {	
		
		$clientesRespaldo = array();
		$clientesLocal = array();
		
		cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			documento_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			imagen_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$clientesResp=array();
		$classes=array();
			
		
				$class=new Classe('devolucion_factura'); 	$classes[]=$class;
				$class=new Classe('cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('documento_cliente'); 	$classes[]=$class;
				$class=new Classe('estimado'); 	$classes[]=$class;
				$class=new Classe('imagen_cliente'); 	$classes[]=$class;
				$class=new Classe('factura'); 	$classes[]=$class;
				$class=new Classe('consignacion'); 	$classes[]=$class;
				$class=new Classe('lista_cliente'); 	$classes[]=$class;
			
			
		$clientesRespaldo=$this->clienteLogic->getclientes();
			
		$this->clienteLogic->setIsConDeep(true);
		
		$this->clienteLogic->setclientes($clientes);
			
		$this->clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$clientesLocal=$this->clienteLogic->getclientes();
			
		/*RESPALDO*/
		$this->clienteLogic->setclientes($clientesRespaldo);
			
		$this->clienteLogic->setIsConDeep(false);
		
		if($clientesResp!=null);
		
		return $clientesLocal;
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
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(cliente_session $cliente_session) {
		$cliente_session->strTypeOnLoad=$this->strTypeOnLoadcliente;
		$cliente_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarcliente;
		$cliente_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarcliente;
		$cliente_session->bitEsPopup=$this->bitEsPopup;
		$cliente_session->bitEsBusqueda=$this->bitEsBusqueda;
		$cliente_session->strFuncionJs=$this->strFuncionJs;
		/*$cliente_session->strSufijo=$this->strSufijo;*/
		$cliente_session->bitEsRelaciones=$this->bitEsRelaciones;
		$cliente_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cliente_util::$STR_NOMBRE_CLASE,0,false,false);				
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
			

			$this->strTienePermisosdevolucion_factura='none';
			$this->strTienePermisosdevolucion_factura=((Funciones::existeCadenaArray(devolucion_factura_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdevolucion_factura='table-cell';

			$this->strTienePermisoscuenta_cobrar='none';
			$this->strTienePermisoscuenta_cobrar=((Funciones::existeCadenaArray(cuenta_cobrar_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoscuenta_cobrar='table-cell';

			$this->strTienePermisosdocumento_cliente='none';
			$this->strTienePermisosdocumento_cliente=((Funciones::existeCadenaArray(documento_cliente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosdocumento_cliente='table-cell';

			$this->strTienePermisosestimado='none';
			$this->strTienePermisosestimado=((Funciones::existeCadenaArray(estimado_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosestimado='table-cell';

			$this->strTienePermisosimagen_cliente='none';
			$this->strTienePermisosimagen_cliente=((Funciones::existeCadenaArray(imagen_cliente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosimagen_cliente='table-cell';

			$this->strTienePermisosfactura='none';
			$this->strTienePermisosfactura=((Funciones::existeCadenaArray(factura_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosfactura='table-cell';

			$this->strTienePermisosconsignacion='none';
			$this->strTienePermisosconsignacion=((Funciones::existeCadenaArray(consignacion_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosconsignacion='table-cell';

			$this->strTienePermisoslista_cliente='none';
			$this->strTienePermisoslista_cliente=((Funciones::existeCadenaArray(lista_cliente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoslista_cliente='table-cell';
		} else {
			

			$this->strTienePermisosdevolucion_factura='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdevolucion_factura=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, devolucion_factura_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdevolucion_factura='table-cell';

			$this->strTienePermisoscuenta_cobrar='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoscuenta_cobrar=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoscuenta_cobrar='table-cell';

			$this->strTienePermisosdocumento_cliente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosdocumento_cliente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, documento_cliente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosdocumento_cliente='table-cell';

			$this->strTienePermisosestimado='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosestimado=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, estimado_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosestimado='table-cell';

			$this->strTienePermisosimagen_cliente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosimagen_cliente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, imagen_cliente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosimagen_cliente='table-cell';

			$this->strTienePermisosfactura='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosfactura=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosfactura='table-cell';

			$this->strTienePermisosconsignacion='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosconsignacion=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, consignacion_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosconsignacion='table-cell';

			$this->strTienePermisoslista_cliente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoslista_cliente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, lista_cliente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoslista_cliente='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$clienteViewAdditional=new clienteView_add();
		$clienteViewAdditional->clientes=$this->clientes;
		$clienteViewAdditional->Session=$this->Session;
		
		return $clienteViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$clientesLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$clientesLocal=$this->clientes;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$clientesLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($clientesLocal)<=0) {
					$clientesLocal=$this->clientes;
				}
			} else {
				$clientesLocal=$this->clientes;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarclientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarclientesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$clienteLogic=new cliente_logic();
		$clienteLogic->setclientes($this->clientes);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}

		$documento_cliente_session=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME));

		if($documento_cliente_session==null) {
			$documento_cliente_session=new documento_cliente_session();
		}

		$estimado_session=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME));

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}

		$imagen_cliente_session=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME));

		if($imagen_cliente_session==null) {
			$imagen_cliente_session=new imagen_cliente_session();
		}

		$factura_session=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME));

		if($factura_session==null) {
			$factura_session=new factura_session();
		}

		$consignacion_session=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME));

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}

		$lista_cliente_session=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME));

		if($lista_cliente_session==null) {
			$lista_cliente_session=new lista_cliente_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_persona');$classes[]=$class;
			$class=new Classe('categoria_cliente');$classes[]=$class;
			$class=new Classe('tipo_precio');$classes[]=$class;
			$class=new Classe('giro_negocio_cliente');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('provincia');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago_cliente');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
			$class=new Classe('retencion_fuente');$classes[]=$class;
			$class=new Classe('retencion_ica');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$clienteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->clientes=$clienteLogic->getclientes();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->clientesLocal=$this->clientes;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=cliente_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=cliente_util::$STR_TABLE_NAME;		
			
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
			
			$clientes = $this->clientes;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = cliente_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = cliente_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/cliente_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->clientes=$clientes;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->clientesLocal=$clientesLocal;
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
		
		$clientesLocal=array();
		
		$clientesLocal=$this->clientes;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarclientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarclientesAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$clienteLogic=new cliente_logic();
		$clienteLogic->setclientes($this->clientes);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));

		if($devolucion_factura_session==null) {
			$devolucion_factura_session=new devolucion_factura_session();
		}

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}

		$documento_cliente_session=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME));

		if($documento_cliente_session==null) {
			$documento_cliente_session=new documento_cliente_session();
		}

		$estimado_session=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME));

		if($estimado_session==null) {
			$estimado_session=new estimado_session();
		}

		$imagen_cliente_session=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME));

		if($imagen_cliente_session==null) {
			$imagen_cliente_session=new imagen_cliente_session();
		}

		$factura_session=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME));

		if($factura_session==null) {
			$factura_session=new factura_session();
		}

		$consignacion_session=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME));

		if($consignacion_session==null) {
			$consignacion_session=new consignacion_session();
		}

		$lista_cliente_session=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME));

		if($lista_cliente_session==null) {
			$lista_cliente_session=new lista_cliente_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_persona');$classes[]=$class;
			$class=new Classe('categoria_cliente');$classes[]=$class;
			$class=new Classe('tipo_precio');$classes[]=$class;
			$class=new Classe('giro_negocio_cliente');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('provincia');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago_cliente');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
			$class=new Classe('retencion_fuente');$classes[]=$class;
			$class=new Classe('retencion_ica');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$clienteLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->clientes=$clienteLogic->getclientes();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$clientes = $this->clientes;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = cliente_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = cliente_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/cuentascobrar/presentation/templating/cliente_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->clientes=$clientes;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->clientesLocal=$clientesLocal;
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
	
	public function getHtmlTablaDatosResumen(array $clientes=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->clientesReporte = $clientes;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarclientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarclientesAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $clientes=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->clientesReporte = $clientes;		
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
		
		
		$this->clientesReporte=$this->cargarRelaciones($clientes);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarclientesAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarclientesAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(cliente $cliente=null) : string {	
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
			
			
			$clientesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$clientesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($clientesLocal)<=0) {
					/*//DEBE ESCOGER
					$clientesLocal=$this->clientes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$clientesLocal=$this->clientes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($clientesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($clientesLocal,true);
			
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
				$this->clienteLogic->getNewConnexionToDeep();
			}
					
			$clientesLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$clientesLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($clientesLocal)<=0) {
					/*//DEBE ESCOGER
					$clientesLocal=$this->clientes;*/
				}
			} else {
				/*//DEBE ESCOGER
				$clientesLocal=$this->clientes;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($clientesLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($clientesLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Clientes';
			
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
			$fileName='cliente';
			
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
			
			$title='Reporte de  Clientes';
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
			
			$title='Reporte de  Clientes';
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
				$this->clienteLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Clientes';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=cliente_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->clientesAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->clientesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->clientesAuxiliar)<=0) {
					$this->clientesAuxiliar=$this->clientes;
				}
			} else {
				$this->clientesAuxiliar=$this->clientes;
			}
		/*} else {
			$this->clientesAuxiliar=$this->clientesReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->clientesAuxiliar as $cliente) {
				$row=array();
				
				$row=cliente_util::getDataReportRow($tipo,$cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			devolucion_factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			documento_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			imagen_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			factura_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$clientesResp=array();
			$classes=array();
			
			
				$class=new Classe('devolucion_factura'); 	$classes[]=$class;
				$class=new Classe('cuenta_cobrar'); 	$classes[]=$class;
				$class=new Classe('documento_cliente'); 	$classes[]=$class;
				$class=new Classe('estimado'); 	$classes[]=$class;
				$class=new Classe('imagen_cliente'); 	$classes[]=$class;
				$class=new Classe('factura'); 	$classes[]=$class;
				$class=new Classe('consignacion'); 	$classes[]=$class;
				$class=new Classe('lista_cliente'); 	$classes[]=$class;
			
			
			$clientesResp=$this->clienteLogic->getclientes();
			
			$this->clienteLogic->setIsConDeep(true);
			
			$this->clienteLogic->setclientes($this->clientesAuxiliar);
			
			$this->clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->clientesAuxiliar=$this->clienteLogic->getclientes();
			
			//RESPALDO
			$this->clienteLogic->setclientes($clientesResp);
			
			$this->clienteLogic->setIsConDeep(false);
			*/
			
			$this->clientesAuxiliar=$this->cargarRelaciones($this->clientesAuxiliar);
			
			$i=0;
			
			foreach ($this->clientesAuxiliar as $cliente) {
				$row=array();
				
				if($i!=0) {
					$row=cliente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=cliente_util::getDataReportRow($tipo,$cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//devolucion_factura
				if(Funciones::existeCadenaArrayOrderBy(devolucion_factura_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cliente->getdevolucion_facturas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(devolucion_factura_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=devolucion_factura_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cliente->getdevolucion_facturas() as $devolucion_factura) {
						$row=devolucion_factura_util::getDataReportRow('RELACIONADO',$devolucion_factura,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//cuenta_cobrar
				if(Funciones::existeCadenaArrayOrderBy(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cliente->getcuenta_cobrars())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=cuenta_cobrar_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cliente->getcuenta_cobrars() as $cuenta_cobrar) {
						$row=cuenta_cobrar_util::getDataReportRow('RELACIONADO',$cuenta_cobrar,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//documento_cliente
				if(Funciones::existeCadenaArrayOrderBy(documento_cliente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cliente->getdocumento_clientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(documento_cliente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=documento_cliente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cliente->getdocumento_clientes() as $documento_cliente) {
						$row=documento_cliente_util::getDataReportRow('RELACIONADO',$documento_cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//estimado
				if(Funciones::existeCadenaArrayOrderBy(estimado_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cliente->getestimados())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(estimado_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=estimado_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cliente->getestimados() as $estimado) {
						$row=estimado_util::getDataReportRow('RELACIONADO',$estimado,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//imagen_cliente
				if(Funciones::existeCadenaArrayOrderBy(imagen_cliente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cliente->getimagen_clientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(imagen_cliente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=imagen_cliente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cliente->getimagen_clientes() as $imagen_cliente) {
						$row=imagen_cliente_util::getDataReportRow('RELACIONADO',$imagen_cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//factura
				if(Funciones::existeCadenaArrayOrderBy(factura_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cliente->getfacturas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(factura_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=factura_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cliente->getfacturas() as $factura) {
						$row=factura_util::getDataReportRow('RELACIONADO',$factura,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//consignacion
				if(Funciones::existeCadenaArrayOrderBy(consignacion_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cliente->getconsignacions())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(consignacion_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=consignacion_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cliente->getconsignacions() as $consignacion) {
						$row=consignacion_util::getDataReportRow('RELACIONADO',$consignacion,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//lista_cliente
				if(Funciones::existeCadenaArrayOrderBy(lista_cliente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($cliente->getlista_clientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(lista_cliente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=lista_cliente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($cliente->getlista_clientes() as $lista_cliente) {
						$row=lista_cliente_util::getDataReportRow('RELACIONADO',$lista_cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->clientesAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->clientesAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->clientesAuxiliar)<=0) {
					$this->clientesAuxiliar=$this->clientes;
				}
			} else {
				$this->clientesAuxiliar=$this->clientes;
			}
		/*} else {
			$this->clientesAuxiliar=$this->clientesReporte;	
		}*/
		
		foreach ($this->clientesAuxiliar as $cliente) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(cliente_util::getclienteDescripcion($cliente),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Tipo Persona',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Persona',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_tipo_personaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Categorias Cliente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Categorias Cliente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_categoria_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Tipo Precio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Precio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_tipo_precioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Giro Negocio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Giro Negocio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_giro_negocio_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ruc',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ruc',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getruc(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Primer Apellido',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Primer Apellido',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getprimer_apellido(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Segundo Apellido',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Segundo Apellido',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getsegundo_apellido(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Primer Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Primer Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getprimer_nombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Segundo Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Segundo Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getsegundo_nombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre Completo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Completo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getnombre_completo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Direccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getdireccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Telefono',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->gettelefono(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Telefono Movil',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Telefono Movil',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->gettelefono_movil(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('E Mail',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('E Mail',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->gete_mail(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('E Mail2',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('E Mail2',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->gete_mail2(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Comentario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comentario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getcomentario(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Imagen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getimagen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Activo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Activo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getactivo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Pais',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Pais',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_paisDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Provincia',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Provincia',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_provinciaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ciudad',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ciudad',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_ciudadDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo Postal',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Postal',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getcodigo_postal(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fax',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fax',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getfax(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Contacto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Contacto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getcontacto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Vendedor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Vendedor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_vendedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Maximo Credito',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Maximo Credito',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getmaximo_credito(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Maximo Descuento',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Maximo Descuento',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getmaximo_descuento(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Interes Anual',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Interes Anual',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getinteres_anual(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Balance',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Balance',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getbalance(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Terminos Pago',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Terminos Pago',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_termino_pago_clienteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Contable Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Contable Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_cuentaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Facturar Con',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Facturar Con',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getfacturar_con(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Aplica Impuesto Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Impuesto Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getaplica_impuesto_ventas(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_impuestoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Retencion Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getaplica_retencion_impuesto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Retencion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_retencionDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Fuente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Retencion Fuente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getaplica_retencion_fuente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Retencion Fuente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion Fuente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_retencion_fuenteDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Aplica Retencion Ica',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica Retencion Ica',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getaplica_retencion_ica(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Retencion Ica',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion Ica',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_retencion_icaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Aplica 2do Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Aplica 2do Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getaplica_2do_impuesto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Otro Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Otro Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getid_otro_impuestoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Creado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Creado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getcreado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Monto Ultima Transaccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Monto Ultima Transaccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getmonto_ultima_transaccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Fecha Ultima Transaccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Ultima Transaccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getfecha_ultima_transaccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion Ultima Transaccion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion Ultima Transaccion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($cliente->getdescripcion_ultima_transaccion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface cliente_base_controlI {			
		
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
		public function getIndiceActual(cliente $cliente,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(cliente $cliente,array $clientes);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : cliente_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $clientes,cliente $cliente);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(cliente_param_return $clienteReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(cliente_session $cliente_session);		
		public function actualizarInvitadoSessionDivStyleVariables(cliente_session $cliente_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(cliente $clienteOrigen,cliente $cliente,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(cliente_control $cliente_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $clientes=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(cliente_session $cliente_session);		
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
		public function getHtmlTablaDatosResumen(array $clientes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $clientes=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(cliente $cliente=null) : string;
		
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
