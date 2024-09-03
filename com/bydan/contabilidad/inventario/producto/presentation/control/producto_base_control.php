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

namespace com\bydan\contabilidad\inventario\producto\presentation\control;

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

use com\bydan\contabilidad\inventario\producto\business\entity\producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/producto/util/producto_carga.php');
use com\bydan\contabilidad\inventario\producto\util\producto_carga;

use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\util\producto_param_return;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic_add;
use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;
use com\bydan\contabilidad\inventario\tipo_producto\business\logic\tipo_producto_logic;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_carga;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\business\logic\categoria_producto_logic;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_carga;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\logic\sub_categoria_producto_logic;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_carga;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_carga;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

//REL


use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_carga;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_util;
use com\bydan\contabilidad\inventario\lista_precio\presentation\session\lista_precio_session;

use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_carga;
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_util;
use com\bydan\contabilidad\inventario\producto_bodega\presentation\session\producto_bodega_session;

use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;
use com\bydan\contabilidad\inventario\otro_suplidor\presentation\session\otro_suplidor_session;

use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_carga;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_util;
use com\bydan\contabilidad\inventario\lista_cliente\presentation\session\lista_cliente_session;
use com\bydan\contabilidad\inventario\bodega\presentation\session\bodega_session;

use com\bydan\contabilidad\inventario\imagen_producto\util\imagen_producto_carga;
use com\bydan\contabilidad\inventario\imagen_producto\util\imagen_producto_util;
use com\bydan\contabilidad\inventario\imagen_producto\presentation\session\imagen_producto_session;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;


/*CARGA ARCHIVOS FRAMEWORK*/
producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class producto_base_control extends producto_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->productoClase==null) {		
				$this->productoClase=new producto();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_empresa',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_proveedor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_producto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_producto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_impuesto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_otro_impuesto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_producto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_categoria_producto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sub_categoria_producto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_sub_categoria_producto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_bodega_defecto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_bodega_defecto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad_compra')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_unidad_compra',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad_venta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_unidad_venta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_venta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_venta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_compra')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_compra',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_costo')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_costo',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_retencion',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->productoClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->productoClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->productoClase->setid_empresa((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_empresa'));
				
				$this->productoClase->setid_proveedor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_proveedor'));
				
				$this->productoClase->setcodigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo'));
				
				$this->productoClase->setnombre($this->getDataCampoFormTabla('form'.$this->strSufijo,'nombre'));
				
				$this->productoClase->setcosto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'costo'));
				
				$this->productoClase->setactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'activo')));
				
				$this->productoClase->setid_tipo_producto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_producto'));
				
				$this->productoClase->setcantidad_inicial((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cantidad_inicial'));
				
				$this->productoClase->setid_impuesto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto'));
				
				$this->productoClase->setid_otro_impuesto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto'));
				
				$this->productoClase->setimpuesto_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto_ventas')));
				
				$this->productoClase->setotro_impuesto_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'otro_impuesto_ventas')));
				
				$this->productoClase->setimpuesto_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto_compras')));
				
				$this->productoClase->setotro_impuesto_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'otro_impuesto_compras')));
				
				$this->productoClase->setid_categoria_producto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_producto'));
				
				$this->productoClase->setid_sub_categoria_producto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sub_categoria_producto'));
				
				$this->productoClase->setid_bodega_defecto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_bodega_defecto'));
				
				$this->productoClase->setid_unidad_compra((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad_compra'));
				
				$this->productoClase->setequivalencia_compra((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'equivalencia_compra'));
				
				$this->productoClase->setid_unidad_venta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad_venta'));
				
				$this->productoClase->setequivalencia_venta((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'equivalencia_venta'));
				
				$this->productoClase->setdescripcion($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion'));
				
				$this->productoClase->setimagen($this->getDataCampoFormTabla('form'.$this->strSufijo,'imagen'));
				
				$this->productoClase->setobservacion($this->getDataCampoFormTabla('form'.$this->strSufijo,'observacion'));
				
				$this->productoClase->setcomenta_factura(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'comenta_factura')));
				
				$this->productoClase->setcodigo_fabricante($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo_fabricante'));
				
				$this->productoClase->setcantidad((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cantidad'));
				
				$this->productoClase->setcantidad_minima((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cantidad_minima'));
				
				$this->productoClase->setcantidad_maxima((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cantidad_maxima'));
				
				$this->productoClase->setfactura_sin_stock(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'factura_sin_stock')));
				
				$this->productoClase->setmostrar_componente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'mostrar_componente')));
				
				$this->productoClase->setproducto_equivalente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'producto_equivalente')));
				
				$this->productoClase->setavisa_expiracion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'avisa_expiracion')));
				
				$this->productoClase->setrequiere_serie(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'requiere_serie')));
				
				$this->productoClase->setacepta_lote(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'acepta_lote')));
				
				$this->productoClase->setid_cuenta_venta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_venta'));
				
				$this->productoClase->setid_cuenta_compra((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_compra'));
				
				$this->productoClase->setid_cuenta_costo((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_costo'));
				
				$this->productoClase->setvalor_inventario((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'valor_inventario'));
				
				$this->productoClase->setproducto_fisico((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'producto_fisico'));
				
				$this->productoClase->setultima_venta(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'ultima_venta')));
				
				$this->productoClase->setprecio_actualizado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'precio_actualizado')));
				
				$this->productoClase->setid_retencion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion'));
				
				$this->productoClase->setretencion_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_ventas')));
				
				$this->productoClase->setretencion_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_compras')));
				
				$this->productoClase->setfactura_con_precio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'factura_con_precio'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->productoModel->set($this->productoClase);
				
				/*$this->productoModel->set($this->migrarModelproducto($this->productoClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->productoLogic->getproducto()->setId($this->productoClase->getId());	
			$this->productoLogic->getproducto()->setVersionRow($this->productoClase->getVersionRow());	
			$this->productoLogic->getproducto()->setVersionRow($this->productoClase->getVersionRow());	
			$this->productoLogic->getproducto()->setid_empresa($this->productoClase->getid_empresa());	
			$this->productoLogic->getproducto()->setid_proveedor($this->productoClase->getid_proveedor());	
			$this->productoLogic->getproducto()->setcodigo($this->productoClase->getcodigo());	
			$this->productoLogic->getproducto()->setnombre($this->productoClase->getnombre());	
			$this->productoLogic->getproducto()->setcosto($this->productoClase->getcosto());	
			$this->productoLogic->getproducto()->setactivo($this->productoClase->getactivo());	
			$this->productoLogic->getproducto()->setid_tipo_producto($this->productoClase->getid_tipo_producto());	
			$this->productoLogic->getproducto()->setcantidad_inicial($this->productoClase->getcantidad_inicial());	
			$this->productoLogic->getproducto()->setid_impuesto($this->productoClase->getid_impuesto());	
			$this->productoLogic->getproducto()->setid_otro_impuesto($this->productoClase->getid_otro_impuesto());	
			$this->productoLogic->getproducto()->setimpuesto_ventas($this->productoClase->getimpuesto_ventas());	
			$this->productoLogic->getproducto()->setotro_impuesto_ventas($this->productoClase->getotro_impuesto_ventas());	
			$this->productoLogic->getproducto()->setimpuesto_compras($this->productoClase->getimpuesto_compras());	
			$this->productoLogic->getproducto()->setotro_impuesto_compras($this->productoClase->getotro_impuesto_compras());	
			$this->productoLogic->getproducto()->setid_categoria_producto($this->productoClase->getid_categoria_producto());	
			$this->productoLogic->getproducto()->setid_sub_categoria_producto($this->productoClase->getid_sub_categoria_producto());	
			$this->productoLogic->getproducto()->setid_bodega_defecto($this->productoClase->getid_bodega_defecto());	
			$this->productoLogic->getproducto()->setid_unidad_compra($this->productoClase->getid_unidad_compra());	
			$this->productoLogic->getproducto()->setequivalencia_compra($this->productoClase->getequivalencia_compra());	
			$this->productoLogic->getproducto()->setid_unidad_venta($this->productoClase->getid_unidad_venta());	
			$this->productoLogic->getproducto()->setequivalencia_venta($this->productoClase->getequivalencia_venta());	
			$this->productoLogic->getproducto()->setdescripcion($this->productoClase->getdescripcion());	
			$this->productoLogic->getproducto()->setimagen($this->productoClase->getimagen());	
			$this->productoLogic->getproducto()->setobservacion($this->productoClase->getobservacion());	
			$this->productoLogic->getproducto()->setcomenta_factura($this->productoClase->getcomenta_factura());	
			$this->productoLogic->getproducto()->setcodigo_fabricante($this->productoClase->getcodigo_fabricante());	
			$this->productoLogic->getproducto()->setcantidad($this->productoClase->getcantidad());	
			$this->productoLogic->getproducto()->setcantidad_minima($this->productoClase->getcantidad_minima());	
			$this->productoLogic->getproducto()->setcantidad_maxima($this->productoClase->getcantidad_maxima());	
			$this->productoLogic->getproducto()->setfactura_sin_stock($this->productoClase->getfactura_sin_stock());	
			$this->productoLogic->getproducto()->setmostrar_componente($this->productoClase->getmostrar_componente());	
			$this->productoLogic->getproducto()->setproducto_equivalente($this->productoClase->getproducto_equivalente());	
			$this->productoLogic->getproducto()->setavisa_expiracion($this->productoClase->getavisa_expiracion());	
			$this->productoLogic->getproducto()->setrequiere_serie($this->productoClase->getrequiere_serie());	
			$this->productoLogic->getproducto()->setacepta_lote($this->productoClase->getacepta_lote());	
			$this->productoLogic->getproducto()->setid_cuenta_venta($this->productoClase->getid_cuenta_venta());	
			$this->productoLogic->getproducto()->setid_cuenta_compra($this->productoClase->getid_cuenta_compra());	
			$this->productoLogic->getproducto()->setid_cuenta_costo($this->productoClase->getid_cuenta_costo());	
			$this->productoLogic->getproducto()->setvalor_inventario($this->productoClase->getvalor_inventario());	
			$this->productoLogic->getproducto()->setproducto_fisico($this->productoClase->getproducto_fisico());	
			$this->productoLogic->getproducto()->setultima_venta($this->productoClase->getultima_venta());	
			$this->productoLogic->getproducto()->setprecio_actualizado($this->productoClase->getprecio_actualizado());	
			$this->productoLogic->getproducto()->setid_retencion($this->productoClase->getid_retencion());	
			$this->productoLogic->getproducto()->setretencion_ventas($this->productoClase->getretencion_ventas());	
			$this->productoLogic->getproducto()->setretencion_compras($this->productoClase->getretencion_compras());	
			$this->productoLogic->getproducto()->setfactura_con_precio($this->productoClase->getfactura_con_precio());	
		} else {
			$this->productoClase->setId($this->productoLogic->getproducto()->getId());	
			$this->productoClase->setVersionRow($this->productoLogic->getproducto()->getVersionRow());	
			$this->productoClase->setVersionRow($this->productoLogic->getproducto()->getVersionRow());	
			$this->productoClase->setid_empresa($this->productoLogic->getproducto()->getid_empresa());	
			$this->productoClase->setid_proveedor($this->productoLogic->getproducto()->getid_proveedor());	
			$this->productoClase->setcodigo($this->productoLogic->getproducto()->getcodigo());	
			$this->productoClase->setnombre($this->productoLogic->getproducto()->getnombre());	
			$this->productoClase->setcosto($this->productoLogic->getproducto()->getcosto());	
			$this->productoClase->setactivo($this->productoLogic->getproducto()->getactivo());	
			$this->productoClase->setid_tipo_producto($this->productoLogic->getproducto()->getid_tipo_producto());	
			$this->productoClase->setcantidad_inicial($this->productoLogic->getproducto()->getcantidad_inicial());	
			$this->productoClase->setid_impuesto($this->productoLogic->getproducto()->getid_impuesto());	
			$this->productoClase->setid_otro_impuesto($this->productoLogic->getproducto()->getid_otro_impuesto());	
			$this->productoClase->setimpuesto_ventas($this->productoLogic->getproducto()->getimpuesto_ventas());	
			$this->productoClase->setotro_impuesto_ventas($this->productoLogic->getproducto()->getotro_impuesto_ventas());	
			$this->productoClase->setimpuesto_compras($this->productoLogic->getproducto()->getimpuesto_compras());	
			$this->productoClase->setotro_impuesto_compras($this->productoLogic->getproducto()->getotro_impuesto_compras());	
			$this->productoClase->setid_categoria_producto($this->productoLogic->getproducto()->getid_categoria_producto());	
			$this->productoClase->setid_sub_categoria_producto($this->productoLogic->getproducto()->getid_sub_categoria_producto());	
			$this->productoClase->setid_bodega_defecto($this->productoLogic->getproducto()->getid_bodega_defecto());	
			$this->productoClase->setid_unidad_compra($this->productoLogic->getproducto()->getid_unidad_compra());	
			$this->productoClase->setequivalencia_compra($this->productoLogic->getproducto()->getequivalencia_compra());	
			$this->productoClase->setid_unidad_venta($this->productoLogic->getproducto()->getid_unidad_venta());	
			$this->productoClase->setequivalencia_venta($this->productoLogic->getproducto()->getequivalencia_venta());	
			$this->productoClase->setdescripcion($this->productoLogic->getproducto()->getdescripcion());	
			$this->productoClase->setimagen($this->productoLogic->getproducto()->getimagen());	
			$this->productoClase->setobservacion($this->productoLogic->getproducto()->getobservacion());	
			$this->productoClase->setcomenta_factura($this->productoLogic->getproducto()->getcomenta_factura());	
			$this->productoClase->setcodigo_fabricante($this->productoLogic->getproducto()->getcodigo_fabricante());	
			$this->productoClase->setcantidad($this->productoLogic->getproducto()->getcantidad());	
			$this->productoClase->setcantidad_minima($this->productoLogic->getproducto()->getcantidad_minima());	
			$this->productoClase->setcantidad_maxima($this->productoLogic->getproducto()->getcantidad_maxima());	
			$this->productoClase->setfactura_sin_stock($this->productoLogic->getproducto()->getfactura_sin_stock());	
			$this->productoClase->setmostrar_componente($this->productoLogic->getproducto()->getmostrar_componente());	
			$this->productoClase->setproducto_equivalente($this->productoLogic->getproducto()->getproducto_equivalente());	
			$this->productoClase->setavisa_expiracion($this->productoLogic->getproducto()->getavisa_expiracion());	
			$this->productoClase->setrequiere_serie($this->productoLogic->getproducto()->getrequiere_serie());	
			$this->productoClase->setacepta_lote($this->productoLogic->getproducto()->getacepta_lote());	
			$this->productoClase->setid_cuenta_venta($this->productoLogic->getproducto()->getid_cuenta_venta());	
			$this->productoClase->setid_cuenta_compra($this->productoLogic->getproducto()->getid_cuenta_compra());	
			$this->productoClase->setid_cuenta_costo($this->productoLogic->getproducto()->getid_cuenta_costo());	
			$this->productoClase->setvalor_inventario($this->productoLogic->getproducto()->getvalor_inventario());	
			$this->productoClase->setproducto_fisico($this->productoLogic->getproducto()->getproducto_fisico());	
			$this->productoClase->setultima_venta($this->productoLogic->getproducto()->getultima_venta());	
			$this->productoClase->setprecio_actualizado($this->productoLogic->getproducto()->getprecio_actualizado());	
			$this->productoClase->setid_retencion($this->productoLogic->getproducto()->getid_retencion());	
			$this->productoClase->setretencion_ventas($this->productoLogic->getproducto()->getretencion_ventas());	
			$this->productoClase->setretencion_compras($this->productoLogic->getproducto()->getretencion_compras());	
			$this->productoClase->setfactura_con_precio($this->productoLogic->getproducto()->getfactura_con_precio());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->productoModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_empresa') {$this->strMensajeid_empresa=$strMensajeCampo;}
		if($strNombreCampo=='id_proveedor') {$this->strMensajeid_proveedor=$strMensajeCampo;}
		if($strNombreCampo=='codigo') {$this->strMensajecodigo=$strMensajeCampo;}
		if($strNombreCampo=='nombre') {$this->strMensajenombre=$strMensajeCampo;}
		if($strNombreCampo=='costo') {$this->strMensajecosto=$strMensajeCampo;}
		if($strNombreCampo=='activo') {$this->strMensajeactivo=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_producto') {$this->strMensajeid_tipo_producto=$strMensajeCampo;}
		if($strNombreCampo=='cantidad_inicial') {$this->strMensajecantidad_inicial=$strMensajeCampo;}
		if($strNombreCampo=='id_impuesto') {$this->strMensajeid_impuesto=$strMensajeCampo;}
		if($strNombreCampo=='id_otro_impuesto') {$this->strMensajeid_otro_impuesto=$strMensajeCampo;}
		if($strNombreCampo=='impuesto_ventas') {$this->strMensajeimpuesto_ventas=$strMensajeCampo;}
		if($strNombreCampo=='otro_impuesto_ventas') {$this->strMensajeotro_impuesto_ventas=$strMensajeCampo;}
		if($strNombreCampo=='impuesto_compras') {$this->strMensajeimpuesto_compras=$strMensajeCampo;}
		if($strNombreCampo=='otro_impuesto_compras') {$this->strMensajeotro_impuesto_compras=$strMensajeCampo;}
		if($strNombreCampo=='id_categoria_producto') {$this->strMensajeid_categoria_producto=$strMensajeCampo;}
		if($strNombreCampo=='id_sub_categoria_producto') {$this->strMensajeid_sub_categoria_producto=$strMensajeCampo;}
		if($strNombreCampo=='id_bodega_defecto') {$this->strMensajeid_bodega_defecto=$strMensajeCampo;}
		if($strNombreCampo=='id_unidad_compra') {$this->strMensajeid_unidad_compra=$strMensajeCampo;}
		if($strNombreCampo=='equivalencia_compra') {$this->strMensajeequivalencia_compra=$strMensajeCampo;}
		if($strNombreCampo=='id_unidad_venta') {$this->strMensajeid_unidad_venta=$strMensajeCampo;}
		if($strNombreCampo=='equivalencia_venta') {$this->strMensajeequivalencia_venta=$strMensajeCampo;}
		if($strNombreCampo=='descripcion') {$this->strMensajedescripcion=$strMensajeCampo;}
		if($strNombreCampo=='imagen') {$this->strMensajeimagen=$strMensajeCampo;}
		if($strNombreCampo=='observacion') {$this->strMensajeobservacion=$strMensajeCampo;}
		if($strNombreCampo=='comenta_factura') {$this->strMensajecomenta_factura=$strMensajeCampo;}
		if($strNombreCampo=='codigo_fabricante') {$this->strMensajecodigo_fabricante=$strMensajeCampo;}
		if($strNombreCampo=='cantidad') {$this->strMensajecantidad=$strMensajeCampo;}
		if($strNombreCampo=='cantidad_minima') {$this->strMensajecantidad_minima=$strMensajeCampo;}
		if($strNombreCampo=='cantidad_maxima') {$this->strMensajecantidad_maxima=$strMensajeCampo;}
		if($strNombreCampo=='factura_sin_stock') {$this->strMensajefactura_sin_stock=$strMensajeCampo;}
		if($strNombreCampo=='mostrar_componente') {$this->strMensajemostrar_componente=$strMensajeCampo;}
		if($strNombreCampo=='producto_equivalente') {$this->strMensajeproducto_equivalente=$strMensajeCampo;}
		if($strNombreCampo=='avisa_expiracion') {$this->strMensajeavisa_expiracion=$strMensajeCampo;}
		if($strNombreCampo=='requiere_serie') {$this->strMensajerequiere_serie=$strMensajeCampo;}
		if($strNombreCampo=='acepta_lote') {$this->strMensajeacepta_lote=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_venta') {$this->strMensajeid_cuenta_venta=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_compra') {$this->strMensajeid_cuenta_compra=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_costo') {$this->strMensajeid_cuenta_costo=$strMensajeCampo;}
		if($strNombreCampo=='valor_inventario') {$this->strMensajevalor_inventario=$strMensajeCampo;}
		if($strNombreCampo=='producto_fisico') {$this->strMensajeproducto_fisico=$strMensajeCampo;}
		if($strNombreCampo=='ultima_venta') {$this->strMensajeultima_venta=$strMensajeCampo;}
		if($strNombreCampo=='precio_actualizado') {$this->strMensajeprecio_actualizado=$strMensajeCampo;}
		if($strNombreCampo=='id_retencion') {$this->strMensajeid_retencion=$strMensajeCampo;}
		if($strNombreCampo=='retencion_ventas') {$this->strMensajeretencion_ventas=$strMensajeCampo;}
		if($strNombreCampo=='retencion_compras') {$this->strMensajeretencion_compras=$strMensajeCampo;}
		if($strNombreCampo=='factura_con_precio') {$this->strMensajefactura_con_precio=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_empresa='';
		$this->strMensajeid_proveedor='';
		$this->strMensajecodigo='';
		$this->strMensajenombre='';
		$this->strMensajecosto='';
		$this->strMensajeactivo='';
		$this->strMensajeid_tipo_producto='';
		$this->strMensajecantidad_inicial='';
		$this->strMensajeid_impuesto='';
		$this->strMensajeid_otro_impuesto='';
		$this->strMensajeimpuesto_ventas='';
		$this->strMensajeotro_impuesto_ventas='';
		$this->strMensajeimpuesto_compras='';
		$this->strMensajeotro_impuesto_compras='';
		$this->strMensajeid_categoria_producto='';
		$this->strMensajeid_sub_categoria_producto='';
		$this->strMensajeid_bodega_defecto='';
		$this->strMensajeid_unidad_compra='';
		$this->strMensajeequivalencia_compra='';
		$this->strMensajeid_unidad_venta='';
		$this->strMensajeequivalencia_venta='';
		$this->strMensajedescripcion='';
		$this->strMensajeimagen='';
		$this->strMensajeobservacion='';
		$this->strMensajecomenta_factura='';
		$this->strMensajecodigo_fabricante='';
		$this->strMensajecantidad='';
		$this->strMensajecantidad_minima='';
		$this->strMensajecantidad_maxima='';
		$this->strMensajefactura_sin_stock='';
		$this->strMensajemostrar_componente='';
		$this->strMensajeproducto_equivalente='';
		$this->strMensajeavisa_expiracion='';
		$this->strMensajerequiere_serie='';
		$this->strMensajeacepta_lote='';
		$this->strMensajeid_cuenta_venta='';
		$this->strMensajeid_cuenta_compra='';
		$this->strMensajeid_cuenta_costo='';
		$this->strMensajevalor_inventario='';
		$this->strMensajeproducto_fisico='';
		$this->strMensajeultima_venta='';
		$this->strMensajeprecio_actualizado='';
		$this->strMensajeid_retencion='';
		$this->strMensajeretencion_ventas='';
		$this->strMensajeretencion_compras='';
		$this->strMensajefactura_con_precio='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
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
				$this->productoLogic->getNewConnexionToDeep();
			}

			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
						
			if($producto_session==null) {
				$producto_session=new producto_session();
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
						$this->productoLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->productoActual =$this->productoClase;
			
			/*$this->productoActual =$this->migrarModelproducto($this->productoClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->productoLogic->getproductos(),$this->productoActual);
			
			$this->actualizarControllerConReturnGeneral($this->productoReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
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
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$productosLocal=$this->getListaActual();
		
		$iIndice=producto_util::getIndiceNuevo($productosLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(producto $producto,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$productosLocal=$this->getListaActual();
		
		$iIndice=producto_util::getIndiceActual($productosLocal,$producto,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevoproducto')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->productoActual =$this->productoClase;
			
			/*$this->productoActual =$this->migrarModelproducto($this->productoClase);*/
			
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
			
			$this->productoLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('tipo_producto');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
				$class=new Classe('categoria_producto');$classes[]=$class;
				$class=new Classe('sub_categoria_producto');$classes[]=$class;
				$class=new Classe('bodega_defecto');$classes[]=$class;
				$class=new Classe('unidad_compra');$classes[]=$class;
				$class=new Classe('unidad_venta');$classes[]=$class;
				$class=new Classe('cuenta_venta');$classes[]=$class;
				$class=new Classe('cuenta_compra');$classes[]=$class;
				$class=new Classe('cuenta_costo');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
			
			$this->productoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->productoLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->productoLogic->setproducto(new producto());
				
				$this->productoLogic->getproducto()->setIsNew(true);
				$this->productoLogic->getproducto()->setIsChanged(true);
				$this->productoLogic->getproducto()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->productoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->productoLogic->productos[]=$this->productoLogic->getproducto();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->productoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaprecios=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'Lista'));
							$listapreciosEliminados=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaprecios=array_merge($listaprecios,$listapreciosEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_bodega_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productobodegas=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME.'Lista'));
							$productobodegasEliminados=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productobodegas=array_merge($productobodegas,$productobodegasEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otrosuplidors=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'Lista'));
							$otrosuplidorsEliminados=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otrosuplidors=array_merge($otrosuplidors,$otrosuplidorsEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaclientes=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'Lista'));
							$listaclientesEliminados=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaclientes=array_merge($listaclientes,$listaclientesEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenproductos=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME.'Lista'));
							$imagenproductosEliminados=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenproductos=array_merge($imagenproductos,$imagenproductosEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);
							
							$this->productoLogic->saveRelaciones($this->productoLogic->getproducto(),$listaprecios,$productobodegas,$otrosuplidors,$listaclientes,$imagenproductos,$listaproductos);/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->productoLogic->getproducto()->setIsChanged(true);
				$this->productoLogic->getproducto()->setIsNew(false);
				$this->productoLogic->getproducto()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->productoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->productoLogic->getproducto(),$this->productoLogic->getproductos());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->productoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaprecios=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'Lista'));
							$listapreciosEliminados=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaprecios=array_merge($listaprecios,$listapreciosEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_bodega_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productobodegas=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME.'Lista'));
							$productobodegasEliminados=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productobodegas=array_merge($productobodegas,$productobodegasEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otrosuplidors=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'Lista'));
							$otrosuplidorsEliminados=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otrosuplidors=array_merge($otrosuplidors,$otrosuplidorsEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaclientes=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'Lista'));
							$listaclientesEliminados=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaclientes=array_merge($listaclientes,$listaclientesEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenproductos=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME.'Lista'));
							$imagenproductosEliminados=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenproductos=array_merge($imagenproductos,$imagenproductosEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);
							
							$this->productoLogic->saveRelaciones($this->productoLogic->getproducto(),$listaprecios,$productobodegas,$otrosuplidors,$listaclientes,$imagenproductos,$listaproductos);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->productoLogic->getproducto()->setIsDeleted(true);
				$this->productoLogic->getproducto()->setIsNew(false);
				$this->productoLogic->getproducto()->setIsChanged(false);				
				
				$this->actualizarLista($this->productoLogic->getproducto(),$this->productoLogic->getproductos());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->productoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaprecios=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'Lista'));
							$listapreciosEliminados=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaprecios=array_merge($listaprecios,$listapreciosEliminados);

							foreach($listaprecios as $listaprecio1) {
								$listaprecio1->setIsDeleted(true);
							}
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_bodega_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productobodegas=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME.'Lista'));
							$productobodegasEliminados=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productobodegas=array_merge($productobodegas,$productobodegasEliminados);

							foreach($productobodegas as $productobodega1) {
								$productobodega1->setIsDeleted(true);
							}
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otrosuplidors=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'Lista'));
							$otrosuplidorsEliminados=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otrosuplidors=array_merge($otrosuplidors,$otrosuplidorsEliminados);

							foreach($otrosuplidors as $otrosuplidor1) {
								$otrosuplidor1->setIsDeleted(true);
							}
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaclientes=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'Lista'));
							$listaclientesEliminados=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaclientes=array_merge($listaclientes,$listaclientesEliminados);

							foreach($listaclientes as $listacliente1) {
								$listacliente1->setIsDeleted(true);
							}
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenproductos=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME.'Lista'));
							$imagenproductosEliminados=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenproductos=array_merge($imagenproductos,$imagenproductosEliminados);

							foreach($imagenproductos as $imagenproducto1) {
								$imagenproducto1->setIsDeleted(true);
							}
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);

							foreach($listaproductos as $listaproducto1) {
								$listaproducto1->setIsDeleted(true);
							}
							
						$this->productoLogic->saveRelaciones($this->productoLogic->getproducto(),$listaprecios,$productobodegas,$otrosuplidors,$listaclientes,$imagenproductos,$listaproductos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->productosEliminados[]=$this->productoLogic->getproducto();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->productoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaprecios=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'Lista'));
							$listapreciosEliminados=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaprecios=array_merge($listaprecios,$listapreciosEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							producto_bodega_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$productobodegas=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME.'Lista'));
							$productobodegasEliminados=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME.'ListaEliminados'));
							$productobodegas=array_merge($productobodegas,$productobodegasEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$otrosuplidors=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'Lista'));
							$otrosuplidorsEliminados=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME.'ListaEliminados'));
							$otrosuplidors=array_merge($otrosuplidors,$otrosuplidorsEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaclientes=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'Lista'));
							$listaclientesEliminados=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaclientes=array_merge($listaclientes,$listaclientesEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							imagen_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$imagenproductos=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME.'Lista'));
							$imagenproductosEliminados=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$imagenproductos=array_merge($imagenproductos,$imagenproductosEliminados);
							producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
							lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);

							$listaproductos=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'Lista'));
							$listaproductosEliminados=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados'));
							$listaproductos=array_merge($listaproductos,$listaproductosEliminados);
							
						$this->productoLogic->saveRelaciones($this->productoLogic->getproducto(),$listaprecios,$productobodegas,$otrosuplidors,$listaclientes,$imagenproductos,$listaproductos);/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->productosEliminados=array();
				}
			}
			
			else  if($maintenanceType==MaintenanceType::$ELIMINAR_CASCADA){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {

					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->productoLogic->deleteCascades();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->productoLogic->deleteCascades();/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				}
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->productosEliminados=array();
				}	 					
			}
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('tipo_producto');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
				$class=new Classe('categoria_producto');$classes[]=$class;
				$class=new Classe('sub_categoria_producto');$classes[]=$class;
				$class=new Classe('bodega_defecto');$classes[]=$class;
				$class=new Classe('unidad_compra');$classes[]=$class;
				$class=new Classe('unidad_venta');$classes[]=$class;
				$class=new Classe('cuenta_venta');$classes[]=$class;
				$class=new Classe('cuenta_compra');$classes[]=$class;
				$class=new Classe('cuenta_costo');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->productoLogic->setproductos();*/
					
					$this->productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->productoLogic->setIsConDeepLoad(false);
			
			$this->productos=$this->productoLogic->getproductos();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(producto_util::$STR_SESSION_NAME.'Lista',serialize($this->productos));
				$this->Session->write(producto_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->productosEliminados));
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
				$this->productoLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
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
				$this->productoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginalproducto;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->productoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->productos as $productoLocal) {
				if($this->productoLogic->getproducto()->getId()==$productoLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->productoLogic->getproducto()->setIsDeleted(true);
			$this->productosEliminados[]=$this->productoLogic->getproducto();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->productos[$indice]);
				
				$this->productos = array_values($this->productos);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModelproducto($this->productoClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(producto $producto,array $productos) {
		try {
			foreach($productos as $productoLocal){ 
				if($productoLocal->getId()==$producto->getId()) {
					$productoLocal->setIsChanged($producto->getIsChanged());
					$productoLocal->setIsNew($producto->getIsNew());
					$productoLocal->setIsDeleted($producto->getIsDeleted());
					//$productoLocal->setbitExpired($producto->getbitExpired());
					
					$productoLocal->setId($producto->getId());	
					$productoLocal->setVersionRow($producto->getVersionRow());	
					$productoLocal->setVersionRow($producto->getVersionRow());	
					$productoLocal->setid_empresa($producto->getid_empresa());	
					$productoLocal->setid_proveedor($producto->getid_proveedor());	
					$productoLocal->setcodigo($producto->getcodigo());	
					$productoLocal->setnombre($producto->getnombre());	
					$productoLocal->setcosto($producto->getcosto());	
					$productoLocal->setactivo($producto->getactivo());	
					$productoLocal->setid_tipo_producto($producto->getid_tipo_producto());	
					$productoLocal->setcantidad_inicial($producto->getcantidad_inicial());	
					$productoLocal->setid_impuesto($producto->getid_impuesto());	
					$productoLocal->setid_otro_impuesto($producto->getid_otro_impuesto());	
					$productoLocal->setimpuesto_ventas($producto->getimpuesto_ventas());	
					$productoLocal->setotro_impuesto_ventas($producto->getotro_impuesto_ventas());	
					$productoLocal->setimpuesto_compras($producto->getimpuesto_compras());	
					$productoLocal->setotro_impuesto_compras($producto->getotro_impuesto_compras());	
					$productoLocal->setid_categoria_producto($producto->getid_categoria_producto());	
					$productoLocal->setid_sub_categoria_producto($producto->getid_sub_categoria_producto());	
					$productoLocal->setid_bodega_defecto($producto->getid_bodega_defecto());	
					$productoLocal->setid_unidad_compra($producto->getid_unidad_compra());	
					$productoLocal->setequivalencia_compra($producto->getequivalencia_compra());	
					$productoLocal->setid_unidad_venta($producto->getid_unidad_venta());	
					$productoLocal->setequivalencia_venta($producto->getequivalencia_venta());	
					$productoLocal->setdescripcion($producto->getdescripcion());	
					$productoLocal->setimagen($producto->getimagen());	
					$productoLocal->setobservacion($producto->getobservacion());	
					$productoLocal->setcomenta_factura($producto->getcomenta_factura());	
					$productoLocal->setcodigo_fabricante($producto->getcodigo_fabricante());	
					$productoLocal->setcantidad($producto->getcantidad());	
					$productoLocal->setcantidad_minima($producto->getcantidad_minima());	
					$productoLocal->setcantidad_maxima($producto->getcantidad_maxima());	
					$productoLocal->setfactura_sin_stock($producto->getfactura_sin_stock());	
					$productoLocal->setmostrar_componente($producto->getmostrar_componente());	
					$productoLocal->setproducto_equivalente($producto->getproducto_equivalente());	
					$productoLocal->setavisa_expiracion($producto->getavisa_expiracion());	
					$productoLocal->setrequiere_serie($producto->getrequiere_serie());	
					$productoLocal->setacepta_lote($producto->getacepta_lote());	
					$productoLocal->setid_cuenta_venta($producto->getid_cuenta_venta());	
					$productoLocal->setid_cuenta_compra($producto->getid_cuenta_compra());	
					$productoLocal->setid_cuenta_costo($producto->getid_cuenta_costo());	
					$productoLocal->setvalor_inventario($producto->getvalor_inventario());	
					$productoLocal->setproducto_fisico($producto->getproducto_fisico());	
					$productoLocal->setultima_venta($producto->getultima_venta());	
					$productoLocal->setprecio_actualizado($producto->getprecio_actualizado());	
					$productoLocal->setid_retencion($producto->getid_retencion());	
					$productoLocal->setretencion_ventas($producto->getretencion_ventas());	
					$productoLocal->setretencion_compras($producto->getretencion_compras());	
					$productoLocal->setfactura_con_precio($producto->getfactura_con_precio());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$productosLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$productosLocal=$this->productoLogic->getproductos();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$productosLocal=$this->productos;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $productosLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->productoLogic->getproductos() as $producto) {
				if($producto->getId()==$id) {
					$this->productoLogic->setproducto($producto);
					
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
		/*$productosSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->productos as $producto) {
			$producto->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->productos[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : producto_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
						
		if($producto_session==null) {
			$producto_session=new producto_session();
		}
		
		
		$this->productoReturnGeneral=new producto_param_return();
		$this->productoParameterGeneral=new producto_param_return();
			
		$this->productoParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActualproducto(this.producto,true);
			this.setVariablesFormularioToObjetoActualForeignKeysproducto(this.producto);*/
			
			if($producto_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActualproducto(this.producto,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->productoActual=$this->productoClase;
				
				$this->setCopiarVariablesObjetos($this->productoActual,$this->producto,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->productoReturnGeneral=$this->productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->productoLogic->getproductos(),$this->producto,$this->productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($producto_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanproducto($classes,$this->productoReturnGeneral,$this->productoBean,false);*/
				}
					
				if($this->productoReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->productoReturnGeneral->getproducto(),$this->productoActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeyproducto($this->productoReturnGeneral->getproducto());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormularioproducto($this->productoReturnGeneral->getproducto());*/
				}
					
				if($this->productoReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->productoReturnGeneral->getproducto(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->producto,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(productoJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActualproducto(this.producto,true);
				this.setVariablesFormularioToObjetoActualForeignKeysproducto(this.producto);				
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
				
				if($this->productoAnterior!=null) {
					$this->producto=$this->productoAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->productoReturnGeneral=$this->productoLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->productoLogic->getproductos(),$this->producto,$this->productoParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->productoReturnGeneral->getproducto(),$this->productoLogic->getproductos());
			*/
		}
		
		return $this->productoReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}

			$this->productoReturnGeneral=new producto_param_return();			
			$this->productoParameterGeneral=new producto_param_return();
			
			$this->productoParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->productoReturnGeneral=$this->productoLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->productos,$this->productoParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->productoReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->productoReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->productoReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
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
		
		$this->productoReturnGeneral=new producto_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_producto') {
		    $sDominio='producto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->productoReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->productoReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='producto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='producto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='producto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->productoReturnGeneral=new producto_param_return();
		$this->productoParameterGeneral=new producto_param_return();
			
		$this->productoParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->productoReturnGeneral=$this->productoLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->productoLogic->getproductos(),$this->producto,$this->productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->productoReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->productoReturnGeneral->getproducto(),$classes);*/
		}									
	
		if($this->productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->productoReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->productoReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $productos,producto $producto) {
		
		$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
						
		if($producto_session==null) {
			$producto_session=new producto_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(producto_util::$CLASSNAME);
			}	
			*/
			
			$this->productoReturnGeneral=new producto_param_return();
			$this->productoParameterGeneral=new producto_param_return();
			
			$this->productoParameterGeneral->setdata($this->data);
		
		
			
		if($producto_session->conGuardarRelaciones) {
			$classes=producto_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->productoActual,$this->producto,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->productoReturnGeneral=$this->productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->productoLogic->getproductos(),$this->productoActual,$this->productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->productoReturnGeneral=$this->productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$productos,$producto,$this->productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModelproducto($this->productoLogic->getproducto());*/
			
			$this->producto=$this->productoLogic->getproducto();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->producto);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$productoActual=new producto();
			
			if($this->productoClase==null) {		
				$this->productoClase=new producto();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$productoActual=$this->productos[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $productoActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $productoActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $productoActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $productoActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $productoActual->setcosto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $productoActual->setactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $productoActual->setactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $productoActual->setid_tipo_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $productoActual->setcantidad_inicial((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $productoActual->setid_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $productoActual->setid_otro_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $productoActual->setimpuesto_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_13')));  } else { $productoActual->setimpuesto_ventas(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $productoActual->setotro_impuesto_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_14')));  } else { $productoActual->setotro_impuesto_ventas(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $productoActual->setimpuesto_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_15')));  } else { $productoActual->setimpuesto_compras(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $productoActual->setotro_impuesto_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_16')));  } else { $productoActual->setotro_impuesto_compras(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $productoActual->setid_categoria_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $productoActual->setid_sub_categoria_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $productoActual->setid_bodega_defecto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $productoActual->setid_unidad_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $productoActual->setequivalencia_compra((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $productoActual->setid_unidad_venta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $productoActual->setequivalencia_venta((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $productoActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $productoActual->setimagen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $productoActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $productoActual->setcomenta_factura(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_27')));  } else { $productoActual->setcomenta_factura(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $productoActual->setcodigo_fabricante($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $productoActual->setcantidad((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $productoActual->setcantidad_minima((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $productoActual->setcantidad_maxima((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $productoActual->setfactura_sin_stock(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_32')));  } else { $productoActual->setfactura_sin_stock(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $productoActual->setmostrar_componente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_33')));  } else { $productoActual->setmostrar_componente(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $productoActual->setproducto_equivalente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_34')));  } else { $productoActual->setproducto_equivalente(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $productoActual->setavisa_expiracion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_35')));  } else { $productoActual->setavisa_expiracion(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $productoActual->setrequiere_serie(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_36')));  } else { $productoActual->setrequiere_serie(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $productoActual->setacepta_lote(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_37')));  } else { $productoActual->setacepta_lote(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $productoActual->setid_cuenta_venta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $productoActual->setid_cuenta_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_39'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $productoActual->setid_cuenta_costo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $productoActual->setvalor_inventario((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_41'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_42','t'.$this->strSufijo)) {  $productoActual->setproducto_fisico((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_42'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_43','t'.$this->strSufijo)) {  $productoActual->setultima_venta(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_43')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_44','t'.$this->strSufijo)) {  $productoActual->setprecio_actualizado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_44')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_45','t'.$this->strSufijo)) {  $productoActual->setid_retencion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_45'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_46','t'.$this->strSufijo)) {  $productoActual->setretencion_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_46')));  } else { $productoActual->setretencion_ventas(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_47','t'.$this->strSufijo)) {  $productoActual->setretencion_compras(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_47')));  } else { $productoActual->setretencion_compras(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_48','t'.$this->strSufijo)) {  $productoActual->setfactura_con_precio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_48'));  }

				$this->productoClase=$productoActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->productoModel->set($this->productoClase);
				
				/*$this->productoModel->set($this->migrarModelproducto($this->productoClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->productos=$this->migrarModelproducto($this->productoLogic->getproductos());							
		$this->productos=$this->productoLogic->getproductos();*/
		
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
			$this->Session->write(producto_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$producto_control_session=unserialize($this->Session->read(producto_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($producto_control_session==null) {
				$producto_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($producto_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(producto_util::$STR_SESSION_NAME,$this);*/
		} else {
			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));
			
			if($producto_session==null) {
				$producto_session=new producto_session();
			}
			
			$this->set(producto_util::$STR_SESSION_NAME, $producto_session);
		}
	}
	
	public function setCopiarVariablesObjetos(producto $productoOrigen,producto $producto,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($producto==null) {
				$producto=new producto();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $productoOrigen->getId()!=null && $productoOrigen->getId()!=0)) {$producto->setId($productoOrigen->getId());}}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_proveedor()!=null && $productoOrigen->getid_proveedor()!=-1)) {$producto->setid_proveedor($productoOrigen->getid_proveedor());}
			if($conDefault || ($conDefault==false && $productoOrigen->getcodigo()!=null && $productoOrigen->getcodigo()!='')) {$producto->setcodigo($productoOrigen->getcodigo());}
			if($conDefault || ($conDefault==false && $productoOrigen->getnombre()!=null && $productoOrigen->getnombre()!='')) {$producto->setnombre($productoOrigen->getnombre());}
			if($conDefault || ($conDefault==false && $productoOrigen->getcosto()!=null && $productoOrigen->getcosto()!=0.0)) {$producto->setcosto($productoOrigen->getcosto());}
			if($conDefault || ($conDefault==false && $productoOrigen->getactivo()!=null && $productoOrigen->getactivo()!=true)) {$producto->setactivo($productoOrigen->getactivo());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_tipo_producto()!=null && $productoOrigen->getid_tipo_producto()!=-1)) {$producto->setid_tipo_producto($productoOrigen->getid_tipo_producto());}
			if($conDefault || ($conDefault==false && $productoOrigen->getcantidad_inicial()!=null && $productoOrigen->getcantidad_inicial()!=0.0)) {$producto->setcantidad_inicial($productoOrigen->getcantidad_inicial());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_impuesto()!=null && $productoOrigen->getid_impuesto()!=-1)) {$producto->setid_impuesto($productoOrigen->getid_impuesto());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_otro_impuesto()!=null && $productoOrigen->getid_otro_impuesto()!=null)) {$producto->setid_otro_impuesto($productoOrigen->getid_otro_impuesto());}
			if($conDefault || ($conDefault==false && $productoOrigen->getimpuesto_ventas()!=null && $productoOrigen->getimpuesto_ventas()!=false)) {$producto->setimpuesto_ventas($productoOrigen->getimpuesto_ventas());}
			if($conDefault || ($conDefault==false && $productoOrigen->getotro_impuesto_ventas()!=null && $productoOrigen->getotro_impuesto_ventas()!=false)) {$producto->setotro_impuesto_ventas($productoOrigen->getotro_impuesto_ventas());}
			if($conDefault || ($conDefault==false && $productoOrigen->getimpuesto_compras()!=null && $productoOrigen->getimpuesto_compras()!=false)) {$producto->setimpuesto_compras($productoOrigen->getimpuesto_compras());}
			if($conDefault || ($conDefault==false && $productoOrigen->getotro_impuesto_compras()!=null && $productoOrigen->getotro_impuesto_compras()!=false)) {$producto->setotro_impuesto_compras($productoOrigen->getotro_impuesto_compras());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_categoria_producto()!=null && $productoOrigen->getid_categoria_producto()!=-1)) {$producto->setid_categoria_producto($productoOrigen->getid_categoria_producto());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_sub_categoria_producto()!=null && $productoOrigen->getid_sub_categoria_producto()!=-1)) {$producto->setid_sub_categoria_producto($productoOrigen->getid_sub_categoria_producto());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_bodega_defecto()!=null && $productoOrigen->getid_bodega_defecto()!=-1)) {$producto->setid_bodega_defecto($productoOrigen->getid_bodega_defecto());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_unidad_compra()!=null && $productoOrigen->getid_unidad_compra()!=-1)) {$producto->setid_unidad_compra($productoOrigen->getid_unidad_compra());}
			if($conDefault || ($conDefault==false && $productoOrigen->getequivalencia_compra()!=null && $productoOrigen->getequivalencia_compra()!=0.0)) {$producto->setequivalencia_compra($productoOrigen->getequivalencia_compra());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_unidad_venta()!=null && $productoOrigen->getid_unidad_venta()!=-1)) {$producto->setid_unidad_venta($productoOrigen->getid_unidad_venta());}
			if($conDefault || ($conDefault==false && $productoOrigen->getequivalencia_venta()!=null && $productoOrigen->getequivalencia_venta()!=0.0)) {$producto->setequivalencia_venta($productoOrigen->getequivalencia_venta());}
			if($conDefault || ($conDefault==false && $productoOrigen->getdescripcion()!=null && $productoOrigen->getdescripcion()!='')) {$producto->setdescripcion($productoOrigen->getdescripcion());}
			if($conDefault || ($conDefault==false && $productoOrigen->getimagen()!=null && $productoOrigen->getimagen()!='')) {$producto->setimagen($productoOrigen->getimagen());}
			if($conDefault || ($conDefault==false && $productoOrigen->getobservacion()!=null && $productoOrigen->getobservacion()!='')) {$producto->setobservacion($productoOrigen->getobservacion());}
			if($conDefault || ($conDefault==false && $productoOrigen->getcomenta_factura()!=null && $productoOrigen->getcomenta_factura()!=false)) {$producto->setcomenta_factura($productoOrigen->getcomenta_factura());}
			if($conDefault || ($conDefault==false && $productoOrigen->getcodigo_fabricante()!=null && $productoOrigen->getcodigo_fabricante()!='')) {$producto->setcodigo_fabricante($productoOrigen->getcodigo_fabricante());}
			if($conDefault || ($conDefault==false && $productoOrigen->getcantidad()!=null && $productoOrigen->getcantidad()!=0.0)) {$producto->setcantidad($productoOrigen->getcantidad());}
			if($conDefault || ($conDefault==false && $productoOrigen->getcantidad_minima()!=null && $productoOrigen->getcantidad_minima()!=0.0)) {$producto->setcantidad_minima($productoOrigen->getcantidad_minima());}
			if($conDefault || ($conDefault==false && $productoOrigen->getcantidad_maxima()!=null && $productoOrigen->getcantidad_maxima()!=0.0)) {$producto->setcantidad_maxima($productoOrigen->getcantidad_maxima());}
			if($conDefault || ($conDefault==false && $productoOrigen->getfactura_sin_stock()!=null && $productoOrigen->getfactura_sin_stock()!=false)) {$producto->setfactura_sin_stock($productoOrigen->getfactura_sin_stock());}
			if($conDefault || ($conDefault==false && $productoOrigen->getmostrar_componente()!=null && $productoOrigen->getmostrar_componente()!=false)) {$producto->setmostrar_componente($productoOrigen->getmostrar_componente());}
			if($conDefault || ($conDefault==false && $productoOrigen->getproducto_equivalente()!=null && $productoOrigen->getproducto_equivalente()!=false)) {$producto->setproducto_equivalente($productoOrigen->getproducto_equivalente());}
			if($conDefault || ($conDefault==false && $productoOrigen->getavisa_expiracion()!=null && $productoOrigen->getavisa_expiracion()!=false)) {$producto->setavisa_expiracion($productoOrigen->getavisa_expiracion());}
			if($conDefault || ($conDefault==false && $productoOrigen->getrequiere_serie()!=null && $productoOrigen->getrequiere_serie()!=false)) {$producto->setrequiere_serie($productoOrigen->getrequiere_serie());}
			if($conDefault || ($conDefault==false && $productoOrigen->getacepta_lote()!=null && $productoOrigen->getacepta_lote()!=false)) {$producto->setacepta_lote($productoOrigen->getacepta_lote());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_cuenta_venta()!=null && $productoOrigen->getid_cuenta_venta()!=null)) {$producto->setid_cuenta_venta($productoOrigen->getid_cuenta_venta());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_cuenta_compra()!=null && $productoOrigen->getid_cuenta_compra()!=null)) {$producto->setid_cuenta_compra($productoOrigen->getid_cuenta_compra());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_cuenta_costo()!=null && $productoOrigen->getid_cuenta_costo()!=null)) {$producto->setid_cuenta_costo($productoOrigen->getid_cuenta_costo());}
			if($conDefault || ($conDefault==false && $productoOrigen->getvalor_inventario()!=null && $productoOrigen->getvalor_inventario()!=0.0)) {$producto->setvalor_inventario($productoOrigen->getvalor_inventario());}
			if($conDefault || ($conDefault==false && $productoOrigen->getproducto_fisico()!=null && $productoOrigen->getproducto_fisico()!=0)) {$producto->setproducto_fisico($productoOrigen->getproducto_fisico());}
			if($conDefault || ($conDefault==false && $productoOrigen->getultima_venta()!=null && $productoOrigen->getultima_venta()!=date('Y-m-d'))) {$producto->setultima_venta($productoOrigen->getultima_venta());}
			if($conDefault || ($conDefault==false && $productoOrigen->getprecio_actualizado()!=null && $productoOrigen->getprecio_actualizado()!=date('Y-m-d'))) {$producto->setprecio_actualizado($productoOrigen->getprecio_actualizado());}
			if($conDefault || ($conDefault==false && $productoOrigen->getid_retencion()!=null && $productoOrigen->getid_retencion()!=null)) {$producto->setid_retencion($productoOrigen->getid_retencion());}
			if($conDefault || ($conDefault==false && $productoOrigen->getretencion_ventas()!=null && $productoOrigen->getretencion_ventas()!=false)) {$producto->setretencion_ventas($productoOrigen->getretencion_ventas());}
			if($conDefault || ($conDefault==false && $productoOrigen->getretencion_compras()!=null && $productoOrigen->getretencion_compras()!=false)) {$producto->setretencion_compras($productoOrigen->getretencion_compras());}
			if($conDefault || ($conDefault==false && $productoOrigen->getfactura_con_precio()!=null && $productoOrigen->getfactura_con_precio()!=0)) {$producto->setfactura_con_precio($productoOrigen->getfactura_con_precio());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$productosSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$productosSeleccionados[]=$this->productos[$indice];
			}
		}
		
		return $productosSeleccionados;
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
		$producto= new producto();
		
		foreach($this->productoLogic->getproductos() as $producto) {
			
		$producto->listaprecios=array();
		$producto->productobodegas=array();
		$producto->otrosuplidors=array();
		$producto->listaclientes=array();
		$producto->bodegas=array();
		$producto->imagenproductos=array();
		$producto->listaproductos=array();
		}		
		
		if($producto!=null);
	}
	
	public function cargarRelaciones(array $productos=array()) : array {	
		
		$productosRespaldo = array();
		$productosLocal = array();
		
		producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			producto_bodega_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			imagen_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$productosResp=array();
		$classes=array();
			
		
				$class=new Classe('lista_precio'); 	$classes[]=$class;
				$class=new Classe('producto_bodega'); 	$classes[]=$class;
				$class=new Classe('otro_suplidor'); 	$classes[]=$class;
				$class=new Classe('lista_cliente'); 	$classes[]=$class;
				$class=new Classe('imagen_producto'); 	$classes[]=$class;
				$class=new Classe('lista_producto'); 	$classes[]=$class;
			
			
		$productosRespaldo=$this->productoLogic->getproductos();
			
		$this->productoLogic->setIsConDeep(true);
		
		$this->productoLogic->setproductos($productos);
			
		$this->productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$productosLocal=$this->productoLogic->getproductos();
			
		/*RESPALDO*/
		$this->productoLogic->setproductos($productosRespaldo);
			
		$this->productoLogic->setIsConDeep(false);
		
		if($productosResp!=null);
		
		return $productosLocal;
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
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(producto_session $producto_session) {
		$producto_session->strTypeOnLoad=$this->strTypeOnLoadproducto;
		$producto_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarproducto;
		$producto_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarproducto;
		$producto_session->bitEsPopup=$this->bitEsPopup;
		$producto_session->bitEsBusqueda=$this->bitEsBusqueda;
		$producto_session->strFuncionJs=$this->strFuncionJs;
		/*$producto_session->strSufijo=$this->strSufijo;*/
		$producto_session->bitEsRelaciones=$this->bitEsRelaciones;
		$producto_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, producto_util::$STR_NOMBRE_CLASE,0,false,false);				
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

			$this->strTienePermisosproducto_bodega='none';
			$this->strTienePermisosproducto_bodega=((Funciones::existeCadenaArray(producto_bodega_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosproducto_bodega='table-cell';

			$this->strTienePermisosotro_suplidor='none';
			$this->strTienePermisosotro_suplidor=((Funciones::existeCadenaArray(otro_suplidor_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosotro_suplidor='table-cell';

			$this->strTienePermisoslista_cliente='none';
			$this->strTienePermisoslista_cliente=((Funciones::existeCadenaArray(lista_cliente_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoslista_cliente='table-cell';

			$this->strTienePermisosimagen_producto='none';
			$this->strTienePermisosimagen_producto=((Funciones::existeCadenaArray(imagen_producto_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisosimagen_producto='table-cell';

			$this->strTienePermisoslista_producto='none';
			$this->strTienePermisoslista_producto=((Funciones::existeCadenaArray(lista_producto_util::$STR_NOMBRE_CLASE,$this->sistemaReturnGeneral->getArrClasesRelacionadasAcceso()))? 'table-cell':'none');
			//$this->strTienePermisoslista_producto='table-cell';
		} else {
			

			$this->strTienePermisoslista_precio='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoslista_precio=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, lista_precio_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoslista_precio='table-cell';

			$this->strTienePermisosproducto_bodega='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosproducto_bodega=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, producto_bodega_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosproducto_bodega='table-cell';

			$this->strTienePermisosotro_suplidor='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosotro_suplidor=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, otro_suplidor_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosotro_suplidor='table-cell';

			$this->strTienePermisoslista_cliente='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoslista_cliente=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, lista_cliente_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoslista_cliente='table-cell';

			$this->strTienePermisosimagen_producto='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisosimagen_producto=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, imagen_producto_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisosimagen_producto='table-cell';

			$this->strTienePermisoslista_producto='none';
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->strTienePermisoslista_producto=(($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, lista_producto_util::$STR_NOMBRE_CLASE,0,false,false))? 'table-cell':'none');/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			//$this->strTienePermisoslista_producto='table-cell';
		}
	}
	
	
	/*VIEW_LAYER*/
	
	public function setHtmlTablaDatos() : string {
		return $this->getHtmlTablaDatos(false);
		
		/*
		$productoViewAdditional=new productoView_add();
		$productoViewAdditional->productos=$this->productos;
		$productoViewAdditional->Session=$this->Session;
		
		return $productoViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$productosLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$productosLocal=$this->productos;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$productosLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($productosLocal)<=0) {
					$productosLocal=$this->productos;
				}
			} else {
				$productosLocal=$this->productos;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarproductosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarproductosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$productoLogic=new producto_logic();
		$productoLogic->setproductos($this->productos);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		

		$lista_precio_session=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME));

		if($lista_precio_session==null) {
			$lista_precio_session=new lista_precio_session();
		}

		$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));

		if($producto_bodega_session==null) {
			$producto_bodega_session=new producto_bodega_session();
		}

		$otro_suplidor_session=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME));

		if($otro_suplidor_session==null) {
			$otro_suplidor_session=new otro_suplidor_session();
		}

		$lista_cliente_session=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME));

		if($lista_cliente_session==null) {
			$lista_cliente_session=new lista_cliente_session();
		}

		$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));

		if($producto_bodega_session==null) {
			$producto_bodega_session=new producto_bodega_session();
		}

		$imagen_producto_session=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME));

		if($imagen_producto_session==null) {
			$imagen_producto_session=new imagen_producto_session();
		}

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('tipo_producto');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
			$class=new Classe('categoria_producto');$classes[]=$class;
			$class=new Classe('sub_categoria_producto');$classes[]=$class;
			$class=new Classe('bodega_defecto');$classes[]=$class;
			$class=new Classe('unidad_compra');$classes[]=$class;
			$class=new Classe('unidad_venta');$classes[]=$class;
			$class=new Classe('cuenta_venta');$classes[]=$class;
			$class=new Classe('cuenta_compra');$classes[]=$class;
			$class=new Classe('cuenta_costo');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$productoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->productos=$productoLogic->getproductos();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->productosLocal=$this->productos;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=producto_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=producto_util::$STR_TABLE_NAME;		
			
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
			
			$productos = $this->productos;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = producto_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = producto_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/inventario/presentation/templating/producto_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->productos=$productos;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->productosLocal=$productosLocal;
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
		
		$productosLocal=array();
		
		$productosLocal=$this->productos;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarproductosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarproductosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$productoLogic=new producto_logic();
		$productoLogic->setproductos($this->productos);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		

		$lista_precio_session=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME));

		if($lista_precio_session==null) {
			$lista_precio_session=new lista_precio_session();
		}

		$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));

		if($producto_bodega_session==null) {
			$producto_bodega_session=new producto_bodega_session();
		}

		$otro_suplidor_session=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME));

		if($otro_suplidor_session==null) {
			$otro_suplidor_session=new otro_suplidor_session();
		}

		$lista_cliente_session=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME));

		if($lista_cliente_session==null) {
			$lista_cliente_session=new lista_cliente_session();
		}

		$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));

		if($producto_bodega_session==null) {
			$producto_bodega_session=new producto_bodega_session();
		}

		$imagen_producto_session=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME));

		if($imagen_producto_session==null) {
			$imagen_producto_session=new imagen_producto_session();
		}

		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		} 
			
		
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('tipo_producto');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
			$class=new Classe('categoria_producto');$classes[]=$class;
			$class=new Classe('sub_categoria_producto');$classes[]=$class;
			$class=new Classe('bodega_defecto');$classes[]=$class;
			$class=new Classe('unidad_compra');$classes[]=$class;
			$class=new Classe('unidad_venta');$classes[]=$class;
			$class=new Classe('cuenta_venta');$classes[]=$class;
			$class=new Classe('cuenta_compra');$classes[]=$class;
			$class=new Classe('cuenta_costo');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$productoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->productos=$productoLogic->getproductos();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$productos = $this->productos;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = producto_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = producto_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/inventario/presentation/templating/producto_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->productos=$productos;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->productosLocal=$productosLocal;
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
	
	public function getHtmlTablaDatosResumen(array $productos=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->productosReporte = $productos;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarproductosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarproductosAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $productos=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->productosReporte = $productos;		
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
		
		
		$this->productosReporte=$this->cargarRelaciones($productos);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarproductosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarproductosAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(producto $producto=null) : string {	
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
			
			
			$productosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$productosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($productosLocal)<=0) {
					/*//DEBE ESCOGER
					$productosLocal=$this->productos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$productosLocal=$this->productos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($productosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($productosLocal,true);
			
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
				$this->productoLogic->getNewConnexionToDeep();
			}
					
			$productosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$productosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($productosLocal)<=0) {
					/*//DEBE ESCOGER
					$productosLocal=$this->productos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$productosLocal=$this->productos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($productosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($productosLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Productos';
			
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
			$fileName='producto';
			
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
			
			$title='Reporte de  Productos';
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
			
			$title='Reporte de  Productos';
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
				$this->productoLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Productos';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->commitNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->productoLogic->rollbackNewConnexionToDeep();
				$this->productoLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=producto_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->productosAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->productosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->productosAuxiliar)<=0) {
					$this->productosAuxiliar=$this->productos;
				}
			} else {
				$this->productosAuxiliar=$this->productos;
			}
		/*} else {
			$this->productosAuxiliar=$this->productosReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->productosAuxiliar as $producto) {
				$row=array();
				
				$row=producto_util::getDataReportRow($tipo,$producto,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			producto_bodega_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			lista_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			imagen_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$productosResp=array();
			$classes=array();
			
			
				$class=new Classe('lista_precio'); 	$classes[]=$class;
				$class=new Classe('producto_bodega'); 	$classes[]=$class;
				$class=new Classe('otro_suplidor'); 	$classes[]=$class;
				$class=new Classe('lista_cliente'); 	$classes[]=$class;
				$class=new Classe('imagen_producto'); 	$classes[]=$class;
				$class=new Classe('lista_producto'); 	$classes[]=$class;
			
			
			$productosResp=$this->productoLogic->getproductos();
			
			$this->productoLogic->setIsConDeep(true);
			
			$this->productoLogic->setproductos($this->productosAuxiliar);
			
			$this->productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->productosAuxiliar=$this->productoLogic->getproductos();
			
			//RESPALDO
			$this->productoLogic->setproductos($productosResp);
			
			$this->productoLogic->setIsConDeep(false);
			*/
			
			$this->productosAuxiliar=$this->cargarRelaciones($this->productosAuxiliar);
			
			$i=0;
			
			foreach ($this->productosAuxiliar as $producto) {
				$row=array();
				
				if($i!=0) {
					$row=producto_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=producto_util::getDataReportRow($tipo,$producto,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
				$data[]=$row;												
				
				
				


					//lista_precio
				if(Funciones::existeCadenaArrayOrderBy(lista_precio_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($producto->getlista_precios())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(lista_precio_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=lista_precio_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($producto->getlista_precios() as $lista_precio) {
						$row=lista_precio_util::getDataReportRow('RELACIONADO',$lista_precio,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//producto_bodega
				if(Funciones::existeCadenaArrayOrderBy(producto_bodega_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($producto->getproducto_bodegas())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(producto_bodega_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=producto_bodega_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($producto->getproducto_bodegas() as $producto_bodega) {
						$row=producto_bodega_util::getDataReportRow('RELACIONADO',$producto_bodega,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//otro_suplidor
				if(Funciones::existeCadenaArrayOrderBy(otro_suplidor_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($producto->getotro_suplidors())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(otro_suplidor_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=otro_suplidor_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($producto->getotro_suplidors() as $otro_suplidor) {
						$row=otro_suplidor_util::getDataReportRow('RELACIONADO',$otro_suplidor,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//lista_cliente
				if(Funciones::existeCadenaArrayOrderBy(lista_cliente_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($producto->getlista_clientes())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(lista_cliente_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=lista_cliente_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($producto->getlista_clientes() as $lista_cliente) {
						$row=lista_cliente_util::getDataReportRow('RELACIONADO',$lista_cliente,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//imagen_producto
				if(Funciones::existeCadenaArrayOrderBy(imagen_producto_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($producto->getimagen_productos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(imagen_producto_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=imagen_producto_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($producto->getimagen_productos() as $imagen_producto) {
						$row=imagen_producto_util::getDataReportRow('RELACIONADO',$imagen_producto,$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}
				}


					//lista_producto
				if(Funciones::existeCadenaArrayOrderBy(lista_producto_util::$STR_CLASS_WEB_TITULO,$this->arrOrderByRel,$this->bitParaReporteOrderByRel)) {

					if(count($producto->getlista_productos())>0) {
						$subheader=array();
						$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(lista_producto_util::$STR_CLASS_WEB_TITULO,40,7,1); $cellReport->setblnFill(true); $cellReport->setintColSpan(3);$subheader[]=$cellReport;
						$data[]=$subheader;

						$row=lista_producto_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);
						$data[]=$row;
					}

					foreach($producto->getlista_productos() as $lista_producto) {
						$row=lista_producto_util::getDataReportRow('RELACIONADO',$lista_producto,$this->arrOrderBy,$this->bitParaReporteOrderBy);
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
		$this->productosAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->productosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->productosAuxiliar)<=0) {
					$this->productosAuxiliar=$this->productos;
				}
			} else {
				$this->productosAuxiliar=$this->productos;
			}
		/*} else {
			$this->productosAuxiliar=$this->productosReporte;	
		}*/
		
		foreach ($this->productosAuxiliar as $producto) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(producto_util::getproductoDescripcion($producto),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Empresa',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_empresaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Proveedores',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Proveedores',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_proveedorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcodigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Nombre',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getnombre(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Costo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Costo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcosto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Activo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Activo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getactivo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_tipo_productoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cantidad Inicial',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad Inicial',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcantidad_inicial(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_impuestoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_otro_impuestoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto En Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto En Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getimpuesto_ventas(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getotro_impuesto_ventas(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto En Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto En Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getimpuesto_compras(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getotro_impuesto_compras(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Categoria Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Categoria Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_categoria_productoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sub Categoria Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Categoria Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_sub_categoria_productoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Bodega Defecto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Bodega Defecto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_bodega_defectoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Unidad Compra',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Unidad Compra',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_unidad_compraDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Compra',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Equivalencia En Compra',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getequivalencia_compra(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Unidad Venta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Unidad Venta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_unidad_ventaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Venta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Equivalencia En Venta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getequivalencia_venta(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getdescripcion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Imagen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getimagen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Observacion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observacion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getobservacion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Comenta Factura',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comenta Factura',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcomenta_factura(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo Fabricante',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Fabricante',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcodigo_fabricante(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cantidad',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcantidad(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cantidad Minima',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad Minima',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcantidad_minima(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cantidad Maxima',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad Maxima',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getcantidad_maxima(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Factura Sin Stock',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Factura Sin Stock',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getfactura_sin_stock(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Mostrar Componente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Componente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getmostrar_componente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Producto Equivalente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto Equivalente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getproducto_equivalente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Avisa Expiracion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Avisa Expiracion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getavisa_expiracion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Requiere No Serie',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Requiere No Serie',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getrequiere_serie(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Acepta Lote',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Acepta Lote',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getacepta_lote(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Venta/Ingresos',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Venta/Ingresos',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_cuenta_ventaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Compra/Activo/Inventario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Compra/Activo/Inventario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_cuenta_compraDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Costo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Costo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_cuenta_costoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Valor Inventario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Valor Inventario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getvalor_inventario(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Producto Fisico',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto Fisico',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getproducto_fisico(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ultima Venta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ultima Venta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getultima_venta(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Precio Actualizado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio Actualizado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getprecio_actualizado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Retencione',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencione',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getid_retencionDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Retencion Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getretencion_ventas(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Retencion Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getretencion_compras(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Factura Con Precio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Factura Con Precio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($producto->getfactura_con_precio(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface producto_base_controlI {			
		
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
		public function getIndiceActual(producto $producto,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(producto $producto,array $productos);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : producto_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $productos,producto $producto);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(producto_param_return $productoReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(producto_session $producto_session);		
		public function actualizarInvitadoSessionDivStyleVariables(producto_session $producto_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(producto $productoOrigen,producto $producto,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(producto_control $producto_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $productos=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(producto_session $producto_session);		
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
		public function getHtmlTablaDatosResumen(array $productos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $productos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(producto $producto=null) : string;
		
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
