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

namespace com\bydan\contabilidad\inventario\lista_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/lista_producto/util/lista_producto_carga.php');
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_param_return;
use com\bydan\contabilidad\inventario\lista_producto\business\logic\lista_producto_logic;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;


//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_carga;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\business\logic\categoria_producto_logic;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_carga;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\logic\sub_categoria_producto_logic;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_carga;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;

use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;
use com\bydan\contabilidad\inventario\tipo_producto\business\logic\tipo_producto_logic;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_carga;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\business\logic\otro_suplidor_logic;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
lista_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
lista_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
lista_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
lista_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*lista_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class lista_producto_base_control extends lista_producto_init_control {	
	
	function __construct () {		
		parent::__construct();		
	}
	
	public function cargarParametros() {			
		if($this->data!=null) {	
			if($this->lista_productoClase==null) {		
				$this->lista_productoClase=new lista_producto();
			}
				/*
				$sistemaCake['Sistema']['id'] = $sistemaLocal->getId();					
				$sistemaCake['Sistema']['codigo'] = $sistemaLocal->getstrCodigo();
				*/
				
				/*FK_DEFAULT*/
				
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_producto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_producto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad_compra')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_unidad_compra',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad_venta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_unidad_venta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_producto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_categoria_producto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sub_categoria_producto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_sub_categoria_producto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_producto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_tipo_producto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_bodega')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_bodega',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_compra')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_compra',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_venta')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_venta',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_inventario')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_cuenta_inventario',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_suplidor')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_otro_suplidor',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_impuesto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto_ventas')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_impuesto_ventas',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto_compras')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_impuesto_compras',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_otro_impuesto',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto_ventas')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_otro_impuesto_ventas',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto_compras')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_otro_impuesto_compras',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_retencion',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_ventas')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_retencion_ventas',null);}
				if($this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_compras')==Constantes::$BIG_ID_ESCOJA_OPCION){$this->setDataCampoForm('form'.$this->strSufijo,'id_retencion_compras',null);}
				/*FK_DEFAULT-FIN*/
				
				
				$this->lista_productoClase->setId((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id'));
				
				$this->lista_productoClase->setVersionRow($this->getDataCampoFormTabla('form'.$this->strSufijo,'updated_at'));
				
				$this->lista_productoClase->setid_producto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_producto'));
				
				$this->lista_productoClase->setcodigo_producto($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo_producto'));
				
				$this->lista_productoClase->setdescripcion_producto($this->getDataCampoFormTabla('form'.$this->strSufijo,'descripcion_producto'));
				
				$this->lista_productoClase->setprecio1((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'precio1'));
				
				$this->lista_productoClase->setprecio2((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'precio2'));
				
				$this->lista_productoClase->setprecio3((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'precio3'));
				
				$this->lista_productoClase->setprecio4((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'precio4'));
				
				$this->lista_productoClase->setcosto((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'costo'));
				
				$this->lista_productoClase->setid_unidad_compra((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad_compra'));
				
				$this->lista_productoClase->setunidad_en_compra((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'unidad_en_compra'));
				
				$this->lista_productoClase->setequivalencia_en_compra((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'equivalencia_en_compra'));
				
				$this->lista_productoClase->setid_unidad_venta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_unidad_venta'));
				
				$this->lista_productoClase->setunidad_en_venta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'unidad_en_venta'));
				
				$this->lista_productoClase->setequivalencia_en_venta((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'equivalencia_en_venta'));
				
				$this->lista_productoClase->setcantidad_total((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cantidad_total'));
				
				$this->lista_productoClase->setcantidad_minima((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'cantidad_minima'));
				
				$this->lista_productoClase->setid_categoria_producto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_categoria_producto'));
				
				$this->lista_productoClase->setid_sub_categoria_producto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_sub_categoria_producto'));
				
				$this->lista_productoClase->setacepta_lote($this->getDataCampoFormTabla('form'.$this->strSufijo,'acepta_lote'));
				
				$this->lista_productoClase->setvalor_inventario((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'valor_inventario'));
				
				$this->lista_productoClase->setimagen($this->getDataCampoFormTabla('form'.$this->strSufijo,'imagen'));
				
				$this->lista_productoClase->setincremento1((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento1'));
				
				$this->lista_productoClase->setincremento2((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento2'));
				
				$this->lista_productoClase->setincremento3((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento3'));
				
				$this->lista_productoClase->setincremento4((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'incremento4'));
				
				$this->lista_productoClase->setcodigo_fabricante($this->getDataCampoFormTabla('form'.$this->strSufijo,'codigo_fabricante'));
				
				$this->lista_productoClase->setproducto_fisico((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'producto_fisico'));
				
				$this->lista_productoClase->setsituacion_producto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'situacion_producto'));
				
				$this->lista_productoClase->setid_tipo_producto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_tipo_producto'));
				
				$this->lista_productoClase->settipo_producto_codigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'tipo_producto_codigo'));
				
				$this->lista_productoClase->setid_bodega((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_bodega'));
				
				$this->lista_productoClase->setmostrar_componente($this->getDataCampoFormTabla('form'.$this->strSufijo,'mostrar_componente'));
				
				$this->lista_productoClase->setfactura_sin_stock($this->getDataCampoFormTabla('form'.$this->strSufijo,'factura_sin_stock'));
				
				$this->lista_productoClase->setavisa_expiracion($this->getDataCampoFormTabla('form'.$this->strSufijo,'avisa_expiracion'));
				
				$this->lista_productoClase->setfactura_con_precio((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'factura_con_precio'));
				
				$this->lista_productoClase->setproducto_equivalente($this->getDataCampoFormTabla('form'.$this->strSufijo,'producto_equivalente'));
				
				$this->lista_productoClase->setid_cuenta_compra((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_compra'));
				
				$this->lista_productoClase->setid_cuenta_venta((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_venta'));
				
				$this->lista_productoClase->setid_cuenta_inventario((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_cuenta_inventario'));
				
				$this->lista_productoClase->setcuenta_compra_codigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'cuenta_compra_codigo'));
				
				$this->lista_productoClase->setcuenta_venta_codigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'cuenta_venta_codigo'));
				
				$this->lista_productoClase->setcuenta_inventario_codigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'cuenta_inventario_codigo'));
				
				$this->lista_productoClase->setid_otro_suplidor((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_suplidor'));
				
				$this->lista_productoClase->setid_impuesto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto'));
				
				$this->lista_productoClase->setid_impuesto_ventas((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto_ventas'));
				
				$this->lista_productoClase->setid_impuesto_compras((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_impuesto_compras'));
				
				$this->lista_productoClase->setimpuesto1_en_ventas($this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto1_en_ventas'));
				
				$this->lista_productoClase->setimpuesto1_en_compras($this->getDataCampoFormTabla('form'.$this->strSufijo,'impuesto1_en_compras'));
				
				$this->lista_productoClase->setultima_venta(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'ultima_venta')));
				
				$this->lista_productoClase->setid_otro_impuesto((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto'));
				
				$this->lista_productoClase->setid_otro_impuesto_ventas((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto_ventas'));
				
				$this->lista_productoClase->setid_otro_impuesto_compras((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_otro_impuesto_compras'));
				
				$this->lista_productoClase->setotro_impuesto_ventas_codigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'otro_impuesto_ventas_codigo'));
				
				$this->lista_productoClase->setotro_impuesto_compras_codigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'otro_impuesto_compras_codigo'));
				
				$this->lista_productoClase->setprecio_de_compra_0((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'precio_de_compra_0'));
				
				$this->lista_productoClase->setprecio_actualizado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('form'.$this->strSufijo,'precio_actualizado')));
				
				$this->lista_productoClase->setrequiere_nro_serie($this->getDataCampoFormTabla('form'.$this->strSufijo,'requiere_nro_serie'));
				
				$this->lista_productoClase->setcosto_dolar((float)$this->getDataCampoFormTabla('form'.$this->strSufijo,'costo_dolar'));
				
				$this->lista_productoClase->setcomentario($this->getDataCampoFormTabla('form'.$this->strSufijo,'comentario'));
				
				$this->lista_productoClase->setcomenta_factura($this->getDataCampoFormTabla('form'.$this->strSufijo,'comenta_factura'));
				
				$this->lista_productoClase->setid_retencion((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion'));
				
				$this->lista_productoClase->setid_retencion_ventas((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_ventas'));
				
				$this->lista_productoClase->setid_retencion_compras((int)$this->getDataCampoFormTabla('form'.$this->strSufijo,'id_retencion_compras'));
				
				$this->lista_productoClase->setretencion_ventas_codigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_ventas_codigo'));
				
				$this->lista_productoClase->setretencion_compras_codigo($this->getDataCampoFormTabla('form'.$this->strSufijo,'retencion_compras_codigo'));
				
				$this->lista_productoClase->setnotas($this->getDataCampoFormTabla('form'.$this->strSufijo,'notas'));
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->lista_productoModel->set($this->lista_productoClase);
				
				/*$this->lista_productoModel->set($this->migrarModellista_producto($this->lista_productoClase));*/
		}
	}
	
	public function cargarDatosLogicClaseBean(bool $esParaLogic=true) {
		if($esParaLogic) {
			$this->lista_productoLogic->getlista_producto()->setId($this->lista_productoClase->getId());	
			$this->lista_productoLogic->getlista_producto()->setVersionRow($this->lista_productoClase->getVersionRow());	
			$this->lista_productoLogic->getlista_producto()->setVersionRow($this->lista_productoClase->getVersionRow());	
			$this->lista_productoLogic->getlista_producto()->setid_producto($this->lista_productoClase->getid_producto());	
			$this->lista_productoLogic->getlista_producto()->setcodigo_producto($this->lista_productoClase->getcodigo_producto());	
			$this->lista_productoLogic->getlista_producto()->setdescripcion_producto($this->lista_productoClase->getdescripcion_producto());	
			$this->lista_productoLogic->getlista_producto()->setprecio1($this->lista_productoClase->getprecio1());	
			$this->lista_productoLogic->getlista_producto()->setprecio2($this->lista_productoClase->getprecio2());	
			$this->lista_productoLogic->getlista_producto()->setprecio3($this->lista_productoClase->getprecio3());	
			$this->lista_productoLogic->getlista_producto()->setprecio4($this->lista_productoClase->getprecio4());	
			$this->lista_productoLogic->getlista_producto()->setcosto($this->lista_productoClase->getcosto());	
			$this->lista_productoLogic->getlista_producto()->setid_unidad_compra($this->lista_productoClase->getid_unidad_compra());	
			$this->lista_productoLogic->getlista_producto()->setunidad_en_compra($this->lista_productoClase->getunidad_en_compra());	
			$this->lista_productoLogic->getlista_producto()->setequivalencia_en_compra($this->lista_productoClase->getequivalencia_en_compra());	
			$this->lista_productoLogic->getlista_producto()->setid_unidad_venta($this->lista_productoClase->getid_unidad_venta());	
			$this->lista_productoLogic->getlista_producto()->setunidad_en_venta($this->lista_productoClase->getunidad_en_venta());	
			$this->lista_productoLogic->getlista_producto()->setequivalencia_en_venta($this->lista_productoClase->getequivalencia_en_venta());	
			$this->lista_productoLogic->getlista_producto()->setcantidad_total($this->lista_productoClase->getcantidad_total());	
			$this->lista_productoLogic->getlista_producto()->setcantidad_minima($this->lista_productoClase->getcantidad_minima());	
			$this->lista_productoLogic->getlista_producto()->setid_categoria_producto($this->lista_productoClase->getid_categoria_producto());	
			$this->lista_productoLogic->getlista_producto()->setid_sub_categoria_producto($this->lista_productoClase->getid_sub_categoria_producto());	
			$this->lista_productoLogic->getlista_producto()->setacepta_lote($this->lista_productoClase->getacepta_lote());	
			$this->lista_productoLogic->getlista_producto()->setvalor_inventario($this->lista_productoClase->getvalor_inventario());	
			$this->lista_productoLogic->getlista_producto()->setimagen($this->lista_productoClase->getimagen());	
			$this->lista_productoLogic->getlista_producto()->setincremento1($this->lista_productoClase->getincremento1());	
			$this->lista_productoLogic->getlista_producto()->setincremento2($this->lista_productoClase->getincremento2());	
			$this->lista_productoLogic->getlista_producto()->setincremento3($this->lista_productoClase->getincremento3());	
			$this->lista_productoLogic->getlista_producto()->setincremento4($this->lista_productoClase->getincremento4());	
			$this->lista_productoLogic->getlista_producto()->setcodigo_fabricante($this->lista_productoClase->getcodigo_fabricante());	
			$this->lista_productoLogic->getlista_producto()->setproducto_fisico($this->lista_productoClase->getproducto_fisico());	
			$this->lista_productoLogic->getlista_producto()->setsituacion_producto($this->lista_productoClase->getsituacion_producto());	
			$this->lista_productoLogic->getlista_producto()->setid_tipo_producto($this->lista_productoClase->getid_tipo_producto());	
			$this->lista_productoLogic->getlista_producto()->settipo_producto_codigo($this->lista_productoClase->gettipo_producto_codigo());	
			$this->lista_productoLogic->getlista_producto()->setid_bodega($this->lista_productoClase->getid_bodega());	
			$this->lista_productoLogic->getlista_producto()->setmostrar_componente($this->lista_productoClase->getmostrar_componente());	
			$this->lista_productoLogic->getlista_producto()->setfactura_sin_stock($this->lista_productoClase->getfactura_sin_stock());	
			$this->lista_productoLogic->getlista_producto()->setavisa_expiracion($this->lista_productoClase->getavisa_expiracion());	
			$this->lista_productoLogic->getlista_producto()->setfactura_con_precio($this->lista_productoClase->getfactura_con_precio());	
			$this->lista_productoLogic->getlista_producto()->setproducto_equivalente($this->lista_productoClase->getproducto_equivalente());	
			$this->lista_productoLogic->getlista_producto()->setid_cuenta_compra($this->lista_productoClase->getid_cuenta_compra());	
			$this->lista_productoLogic->getlista_producto()->setid_cuenta_venta($this->lista_productoClase->getid_cuenta_venta());	
			$this->lista_productoLogic->getlista_producto()->setid_cuenta_inventario($this->lista_productoClase->getid_cuenta_inventario());	
			$this->lista_productoLogic->getlista_producto()->setcuenta_compra_codigo($this->lista_productoClase->getcuenta_compra_codigo());	
			$this->lista_productoLogic->getlista_producto()->setcuenta_venta_codigo($this->lista_productoClase->getcuenta_venta_codigo());	
			$this->lista_productoLogic->getlista_producto()->setcuenta_inventario_codigo($this->lista_productoClase->getcuenta_inventario_codigo());	
			$this->lista_productoLogic->getlista_producto()->setid_otro_suplidor($this->lista_productoClase->getid_otro_suplidor());	
			$this->lista_productoLogic->getlista_producto()->setid_impuesto($this->lista_productoClase->getid_impuesto());	
			$this->lista_productoLogic->getlista_producto()->setid_impuesto_ventas($this->lista_productoClase->getid_impuesto_ventas());	
			$this->lista_productoLogic->getlista_producto()->setid_impuesto_compras($this->lista_productoClase->getid_impuesto_compras());	
			$this->lista_productoLogic->getlista_producto()->setimpuesto1_en_ventas($this->lista_productoClase->getimpuesto1_en_ventas());	
			$this->lista_productoLogic->getlista_producto()->setimpuesto1_en_compras($this->lista_productoClase->getimpuesto1_en_compras());	
			$this->lista_productoLogic->getlista_producto()->setultima_venta($this->lista_productoClase->getultima_venta());	
			$this->lista_productoLogic->getlista_producto()->setid_otro_impuesto($this->lista_productoClase->getid_otro_impuesto());	
			$this->lista_productoLogic->getlista_producto()->setid_otro_impuesto_ventas($this->lista_productoClase->getid_otro_impuesto_ventas());	
			$this->lista_productoLogic->getlista_producto()->setid_otro_impuesto_compras($this->lista_productoClase->getid_otro_impuesto_compras());	
			$this->lista_productoLogic->getlista_producto()->setotro_impuesto_ventas_codigo($this->lista_productoClase->getotro_impuesto_ventas_codigo());	
			$this->lista_productoLogic->getlista_producto()->setotro_impuesto_compras_codigo($this->lista_productoClase->getotro_impuesto_compras_codigo());	
			$this->lista_productoLogic->getlista_producto()->setprecio_de_compra_0($this->lista_productoClase->getprecio_de_compra_0());	
			$this->lista_productoLogic->getlista_producto()->setprecio_actualizado($this->lista_productoClase->getprecio_actualizado());	
			$this->lista_productoLogic->getlista_producto()->setrequiere_nro_serie($this->lista_productoClase->getrequiere_nro_serie());	
			$this->lista_productoLogic->getlista_producto()->setcosto_dolar($this->lista_productoClase->getcosto_dolar());	
			$this->lista_productoLogic->getlista_producto()->setcomentario($this->lista_productoClase->getcomentario());	
			$this->lista_productoLogic->getlista_producto()->setcomenta_factura($this->lista_productoClase->getcomenta_factura());	
			$this->lista_productoLogic->getlista_producto()->setid_retencion($this->lista_productoClase->getid_retencion());	
			$this->lista_productoLogic->getlista_producto()->setid_retencion_ventas($this->lista_productoClase->getid_retencion_ventas());	
			$this->lista_productoLogic->getlista_producto()->setid_retencion_compras($this->lista_productoClase->getid_retencion_compras());	
			$this->lista_productoLogic->getlista_producto()->setretencion_ventas_codigo($this->lista_productoClase->getretencion_ventas_codigo());	
			$this->lista_productoLogic->getlista_producto()->setretencion_compras_codigo($this->lista_productoClase->getretencion_compras_codigo());	
			$this->lista_productoLogic->getlista_producto()->setnotas($this->lista_productoClase->getnotas());	
		} else {
			$this->lista_productoClase->setId($this->lista_productoLogic->getlista_producto()->getId());	
			$this->lista_productoClase->setVersionRow($this->lista_productoLogic->getlista_producto()->getVersionRow());	
			$this->lista_productoClase->setVersionRow($this->lista_productoLogic->getlista_producto()->getVersionRow());	
			$this->lista_productoClase->setid_producto($this->lista_productoLogic->getlista_producto()->getid_producto());	
			$this->lista_productoClase->setcodigo_producto($this->lista_productoLogic->getlista_producto()->getcodigo_producto());	
			$this->lista_productoClase->setdescripcion_producto($this->lista_productoLogic->getlista_producto()->getdescripcion_producto());	
			$this->lista_productoClase->setprecio1($this->lista_productoLogic->getlista_producto()->getprecio1());	
			$this->lista_productoClase->setprecio2($this->lista_productoLogic->getlista_producto()->getprecio2());	
			$this->lista_productoClase->setprecio3($this->lista_productoLogic->getlista_producto()->getprecio3());	
			$this->lista_productoClase->setprecio4($this->lista_productoLogic->getlista_producto()->getprecio4());	
			$this->lista_productoClase->setcosto($this->lista_productoLogic->getlista_producto()->getcosto());	
			$this->lista_productoClase->setid_unidad_compra($this->lista_productoLogic->getlista_producto()->getid_unidad_compra());	
			$this->lista_productoClase->setunidad_en_compra($this->lista_productoLogic->getlista_producto()->getunidad_en_compra());	
			$this->lista_productoClase->setequivalencia_en_compra($this->lista_productoLogic->getlista_producto()->getequivalencia_en_compra());	
			$this->lista_productoClase->setid_unidad_venta($this->lista_productoLogic->getlista_producto()->getid_unidad_venta());	
			$this->lista_productoClase->setunidad_en_venta($this->lista_productoLogic->getlista_producto()->getunidad_en_venta());	
			$this->lista_productoClase->setequivalencia_en_venta($this->lista_productoLogic->getlista_producto()->getequivalencia_en_venta());	
			$this->lista_productoClase->setcantidad_total($this->lista_productoLogic->getlista_producto()->getcantidad_total());	
			$this->lista_productoClase->setcantidad_minima($this->lista_productoLogic->getlista_producto()->getcantidad_minima());	
			$this->lista_productoClase->setid_categoria_producto($this->lista_productoLogic->getlista_producto()->getid_categoria_producto());	
			$this->lista_productoClase->setid_sub_categoria_producto($this->lista_productoLogic->getlista_producto()->getid_sub_categoria_producto());	
			$this->lista_productoClase->setacepta_lote($this->lista_productoLogic->getlista_producto()->getacepta_lote());	
			$this->lista_productoClase->setvalor_inventario($this->lista_productoLogic->getlista_producto()->getvalor_inventario());	
			$this->lista_productoClase->setimagen($this->lista_productoLogic->getlista_producto()->getimagen());	
			$this->lista_productoClase->setincremento1($this->lista_productoLogic->getlista_producto()->getincremento1());	
			$this->lista_productoClase->setincremento2($this->lista_productoLogic->getlista_producto()->getincremento2());	
			$this->lista_productoClase->setincremento3($this->lista_productoLogic->getlista_producto()->getincremento3());	
			$this->lista_productoClase->setincremento4($this->lista_productoLogic->getlista_producto()->getincremento4());	
			$this->lista_productoClase->setcodigo_fabricante($this->lista_productoLogic->getlista_producto()->getcodigo_fabricante());	
			$this->lista_productoClase->setproducto_fisico($this->lista_productoLogic->getlista_producto()->getproducto_fisico());	
			$this->lista_productoClase->setsituacion_producto($this->lista_productoLogic->getlista_producto()->getsituacion_producto());	
			$this->lista_productoClase->setid_tipo_producto($this->lista_productoLogic->getlista_producto()->getid_tipo_producto());	
			$this->lista_productoClase->settipo_producto_codigo($this->lista_productoLogic->getlista_producto()->gettipo_producto_codigo());	
			$this->lista_productoClase->setid_bodega($this->lista_productoLogic->getlista_producto()->getid_bodega());	
			$this->lista_productoClase->setmostrar_componente($this->lista_productoLogic->getlista_producto()->getmostrar_componente());	
			$this->lista_productoClase->setfactura_sin_stock($this->lista_productoLogic->getlista_producto()->getfactura_sin_stock());	
			$this->lista_productoClase->setavisa_expiracion($this->lista_productoLogic->getlista_producto()->getavisa_expiracion());	
			$this->lista_productoClase->setfactura_con_precio($this->lista_productoLogic->getlista_producto()->getfactura_con_precio());	
			$this->lista_productoClase->setproducto_equivalente($this->lista_productoLogic->getlista_producto()->getproducto_equivalente());	
			$this->lista_productoClase->setid_cuenta_compra($this->lista_productoLogic->getlista_producto()->getid_cuenta_compra());	
			$this->lista_productoClase->setid_cuenta_venta($this->lista_productoLogic->getlista_producto()->getid_cuenta_venta());	
			$this->lista_productoClase->setid_cuenta_inventario($this->lista_productoLogic->getlista_producto()->getid_cuenta_inventario());	
			$this->lista_productoClase->setcuenta_compra_codigo($this->lista_productoLogic->getlista_producto()->getcuenta_compra_codigo());	
			$this->lista_productoClase->setcuenta_venta_codigo($this->lista_productoLogic->getlista_producto()->getcuenta_venta_codigo());	
			$this->lista_productoClase->setcuenta_inventario_codigo($this->lista_productoLogic->getlista_producto()->getcuenta_inventario_codigo());	
			$this->lista_productoClase->setid_otro_suplidor($this->lista_productoLogic->getlista_producto()->getid_otro_suplidor());	
			$this->lista_productoClase->setid_impuesto($this->lista_productoLogic->getlista_producto()->getid_impuesto());	
			$this->lista_productoClase->setid_impuesto_ventas($this->lista_productoLogic->getlista_producto()->getid_impuesto_ventas());	
			$this->lista_productoClase->setid_impuesto_compras($this->lista_productoLogic->getlista_producto()->getid_impuesto_compras());	
			$this->lista_productoClase->setimpuesto1_en_ventas($this->lista_productoLogic->getlista_producto()->getimpuesto1_en_ventas());	
			$this->lista_productoClase->setimpuesto1_en_compras($this->lista_productoLogic->getlista_producto()->getimpuesto1_en_compras());	
			$this->lista_productoClase->setultima_venta($this->lista_productoLogic->getlista_producto()->getultima_venta());	
			$this->lista_productoClase->setid_otro_impuesto($this->lista_productoLogic->getlista_producto()->getid_otro_impuesto());	
			$this->lista_productoClase->setid_otro_impuesto_ventas($this->lista_productoLogic->getlista_producto()->getid_otro_impuesto_ventas());	
			$this->lista_productoClase->setid_otro_impuesto_compras($this->lista_productoLogic->getlista_producto()->getid_otro_impuesto_compras());	
			$this->lista_productoClase->setotro_impuesto_ventas_codigo($this->lista_productoLogic->getlista_producto()->getotro_impuesto_ventas_codigo());	
			$this->lista_productoClase->setotro_impuesto_compras_codigo($this->lista_productoLogic->getlista_producto()->getotro_impuesto_compras_codigo());	
			$this->lista_productoClase->setprecio_de_compra_0($this->lista_productoLogic->getlista_producto()->getprecio_de_compra_0());	
			$this->lista_productoClase->setprecio_actualizado($this->lista_productoLogic->getlista_producto()->getprecio_actualizado());	
			$this->lista_productoClase->setrequiere_nro_serie($this->lista_productoLogic->getlista_producto()->getrequiere_nro_serie());	
			$this->lista_productoClase->setcosto_dolar($this->lista_productoLogic->getlista_producto()->getcosto_dolar());	
			$this->lista_productoClase->setcomentario($this->lista_productoLogic->getlista_producto()->getcomentario());	
			$this->lista_productoClase->setcomenta_factura($this->lista_productoLogic->getlista_producto()->getcomenta_factura());	
			$this->lista_productoClase->setid_retencion($this->lista_productoLogic->getlista_producto()->getid_retencion());	
			$this->lista_productoClase->setid_retencion_ventas($this->lista_productoLogic->getlista_producto()->getid_retencion_ventas());	
			$this->lista_productoClase->setid_retencion_compras($this->lista_productoLogic->getlista_producto()->getid_retencion_compras());	
			$this->lista_productoClase->setretencion_ventas_codigo($this->lista_productoLogic->getlista_producto()->getretencion_ventas_codigo());	
			$this->lista_productoClase->setretencion_compras_codigo($this->lista_productoLogic->getlista_producto()->getretencion_compras_codigo());	
			$this->lista_productoClase->setnotas($this->lista_productoLogic->getlista_producto()->getnotas());	
		}
	}
	
	public function inicializarMensajesDatosInvalidos() {
		$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_ERROR;
		$this->strAuxiliarMensaje = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		$this->strAuxiliarMensajeAlert = Constantes::$S_MENSAJE_ERROR_DE_APLICACION.': revise los datos ingresados ';
		
		$this->inicializarMensajesDefectoDatosInvalidos();
		
		$arrErrors = $this->lista_productoModel->invalidFieldsMe();
		
		if($arrErrors!=null && count($arrErrors)>0){
			
			foreach($arrErrors as $keyCampo => $valueMensaje) { 
				$this->asignarMensajeCampo($keyCampo,$valueMensaje);
			}
			
			throw new Exception('Error de Validacion de datos');
		}
	}
	
	public function asignarMensajeCampo(string $strNombreCampo,string $strMensajeCampo) {
		if($strNombreCampo=='id_producto') {$this->strMensajeid_producto=$strMensajeCampo;}
		if($strNombreCampo=='codigo_producto') {$this->strMensajecodigo_producto=$strMensajeCampo;}
		if($strNombreCampo=='descripcion_producto') {$this->strMensajedescripcion_producto=$strMensajeCampo;}
		if($strNombreCampo=='precio1') {$this->strMensajeprecio1=$strMensajeCampo;}
		if($strNombreCampo=='precio2') {$this->strMensajeprecio2=$strMensajeCampo;}
		if($strNombreCampo=='precio3') {$this->strMensajeprecio3=$strMensajeCampo;}
		if($strNombreCampo=='precio4') {$this->strMensajeprecio4=$strMensajeCampo;}
		if($strNombreCampo=='costo') {$this->strMensajecosto=$strMensajeCampo;}
		if($strNombreCampo=='id_unidad_compra') {$this->strMensajeid_unidad_compra=$strMensajeCampo;}
		if($strNombreCampo=='unidad_en_compra') {$this->strMensajeunidad_en_compra=$strMensajeCampo;}
		if($strNombreCampo=='equivalencia_en_compra') {$this->strMensajeequivalencia_en_compra=$strMensajeCampo;}
		if($strNombreCampo=='id_unidad_venta') {$this->strMensajeid_unidad_venta=$strMensajeCampo;}
		if($strNombreCampo=='unidad_en_venta') {$this->strMensajeunidad_en_venta=$strMensajeCampo;}
		if($strNombreCampo=='equivalencia_en_venta') {$this->strMensajeequivalencia_en_venta=$strMensajeCampo;}
		if($strNombreCampo=='cantidad_total') {$this->strMensajecantidad_total=$strMensajeCampo;}
		if($strNombreCampo=='cantidad_minima') {$this->strMensajecantidad_minima=$strMensajeCampo;}
		if($strNombreCampo=='id_categoria_producto') {$this->strMensajeid_categoria_producto=$strMensajeCampo;}
		if($strNombreCampo=='id_sub_categoria_producto') {$this->strMensajeid_sub_categoria_producto=$strMensajeCampo;}
		if($strNombreCampo=='acepta_lote') {$this->strMensajeacepta_lote=$strMensajeCampo;}
		if($strNombreCampo=='valor_inventario') {$this->strMensajevalor_inventario=$strMensajeCampo;}
		if($strNombreCampo=='imagen') {$this->strMensajeimagen=$strMensajeCampo;}
		if($strNombreCampo=='incremento1') {$this->strMensajeincremento1=$strMensajeCampo;}
		if($strNombreCampo=='incremento2') {$this->strMensajeincremento2=$strMensajeCampo;}
		if($strNombreCampo=='incremento3') {$this->strMensajeincremento3=$strMensajeCampo;}
		if($strNombreCampo=='incremento4') {$this->strMensajeincremento4=$strMensajeCampo;}
		if($strNombreCampo=='codigo_fabricante') {$this->strMensajecodigo_fabricante=$strMensajeCampo;}
		if($strNombreCampo=='producto_fisico') {$this->strMensajeproducto_fisico=$strMensajeCampo;}
		if($strNombreCampo=='situacion_producto') {$this->strMensajesituacion_producto=$strMensajeCampo;}
		if($strNombreCampo=='id_tipo_producto') {$this->strMensajeid_tipo_producto=$strMensajeCampo;}
		if($strNombreCampo=='tipo_producto_codigo') {$this->strMensajetipo_producto_codigo=$strMensajeCampo;}
		if($strNombreCampo=='id_bodega') {$this->strMensajeid_bodega=$strMensajeCampo;}
		if($strNombreCampo=='mostrar_componente') {$this->strMensajemostrar_componente=$strMensajeCampo;}
		if($strNombreCampo=='factura_sin_stock') {$this->strMensajefactura_sin_stock=$strMensajeCampo;}
		if($strNombreCampo=='avisa_expiracion') {$this->strMensajeavisa_expiracion=$strMensajeCampo;}
		if($strNombreCampo=='factura_con_precio') {$this->strMensajefactura_con_precio=$strMensajeCampo;}
		if($strNombreCampo=='producto_equivalente') {$this->strMensajeproducto_equivalente=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_compra') {$this->strMensajeid_cuenta_compra=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_venta') {$this->strMensajeid_cuenta_venta=$strMensajeCampo;}
		if($strNombreCampo=='id_cuenta_inventario') {$this->strMensajeid_cuenta_inventario=$strMensajeCampo;}
		if($strNombreCampo=='cuenta_compra_codigo') {$this->strMensajecuenta_compra_codigo=$strMensajeCampo;}
		if($strNombreCampo=='cuenta_venta_codigo') {$this->strMensajecuenta_venta_codigo=$strMensajeCampo;}
		if($strNombreCampo=='cuenta_inventario_codigo') {$this->strMensajecuenta_inventario_codigo=$strMensajeCampo;}
		if($strNombreCampo=='id_otro_suplidor') {$this->strMensajeid_otro_suplidor=$strMensajeCampo;}
		if($strNombreCampo=='id_impuesto') {$this->strMensajeid_impuesto=$strMensajeCampo;}
		if($strNombreCampo=='id_impuesto_ventas') {$this->strMensajeid_impuesto_ventas=$strMensajeCampo;}
		if($strNombreCampo=='id_impuesto_compras') {$this->strMensajeid_impuesto_compras=$strMensajeCampo;}
		if($strNombreCampo=='impuesto1_en_ventas') {$this->strMensajeimpuesto1_en_ventas=$strMensajeCampo;}
		if($strNombreCampo=='impuesto1_en_compras') {$this->strMensajeimpuesto1_en_compras=$strMensajeCampo;}
		if($strNombreCampo=='ultima_venta') {$this->strMensajeultima_venta=$strMensajeCampo;}
		if($strNombreCampo=='id_otro_impuesto') {$this->strMensajeid_otro_impuesto=$strMensajeCampo;}
		if($strNombreCampo=='id_otro_impuesto_ventas') {$this->strMensajeid_otro_impuesto_ventas=$strMensajeCampo;}
		if($strNombreCampo=='id_otro_impuesto_compras') {$this->strMensajeid_otro_impuesto_compras=$strMensajeCampo;}
		if($strNombreCampo=='otro_impuesto_ventas_codigo') {$this->strMensajeotro_impuesto_ventas_codigo=$strMensajeCampo;}
		if($strNombreCampo=='otro_impuesto_compras_codigo') {$this->strMensajeotro_impuesto_compras_codigo=$strMensajeCampo;}
		if($strNombreCampo=='precio_de_compra_0') {$this->strMensajeprecio_de_compra_0=$strMensajeCampo;}
		if($strNombreCampo=='precio_actualizado') {$this->strMensajeprecio_actualizado=$strMensajeCampo;}
		if($strNombreCampo=='requiere_nro_serie') {$this->strMensajerequiere_nro_serie=$strMensajeCampo;}
		if($strNombreCampo=='costo_dolar') {$this->strMensajecosto_dolar=$strMensajeCampo;}
		if($strNombreCampo=='comentario') {$this->strMensajecomentario=$strMensajeCampo;}
		if($strNombreCampo=='comenta_factura') {$this->strMensajecomenta_factura=$strMensajeCampo;}
		if($strNombreCampo=='id_retencion') {$this->strMensajeid_retencion=$strMensajeCampo;}
		if($strNombreCampo=='id_retencion_ventas') {$this->strMensajeid_retencion_ventas=$strMensajeCampo;}
		if($strNombreCampo=='id_retencion_compras') {$this->strMensajeid_retencion_compras=$strMensajeCampo;}
		if($strNombreCampo=='retencion_ventas_codigo') {$this->strMensajeretencion_ventas_codigo=$strMensajeCampo;}
		if($strNombreCampo=='retencion_compras_codigo') {$this->strMensajeretencion_compras_codigo=$strMensajeCampo;}
		if($strNombreCampo=='notas') {$this->strMensajenotas=$strMensajeCampo;}
	}
	
	public function inicializarMensajesDefectoDatosInvalidos() {
		$this->strMensajeid_producto='';
		$this->strMensajecodigo_producto='';
		$this->strMensajedescripcion_producto='';
		$this->strMensajeprecio1='';
		$this->strMensajeprecio2='';
		$this->strMensajeprecio3='';
		$this->strMensajeprecio4='';
		$this->strMensajecosto='';
		$this->strMensajeid_unidad_compra='';
		$this->strMensajeunidad_en_compra='';
		$this->strMensajeequivalencia_en_compra='';
		$this->strMensajeid_unidad_venta='';
		$this->strMensajeunidad_en_venta='';
		$this->strMensajeequivalencia_en_venta='';
		$this->strMensajecantidad_total='';
		$this->strMensajecantidad_minima='';
		$this->strMensajeid_categoria_producto='';
		$this->strMensajeid_sub_categoria_producto='';
		$this->strMensajeacepta_lote='';
		$this->strMensajevalor_inventario='';
		$this->strMensajeimagen='';
		$this->strMensajeincremento1='';
		$this->strMensajeincremento2='';
		$this->strMensajeincremento3='';
		$this->strMensajeincremento4='';
		$this->strMensajecodigo_fabricante='';
		$this->strMensajeproducto_fisico='';
		$this->strMensajesituacion_producto='';
		$this->strMensajeid_tipo_producto='';
		$this->strMensajetipo_producto_codigo='';
		$this->strMensajeid_bodega='';
		$this->strMensajemostrar_componente='';
		$this->strMensajefactura_sin_stock='';
		$this->strMensajeavisa_expiracion='';
		$this->strMensajefactura_con_precio='';
		$this->strMensajeproducto_equivalente='';
		$this->strMensajeid_cuenta_compra='';
		$this->strMensajeid_cuenta_venta='';
		$this->strMensajeid_cuenta_inventario='';
		$this->strMensajecuenta_compra_codigo='';
		$this->strMensajecuenta_venta_codigo='';
		$this->strMensajecuenta_inventario_codigo='';
		$this->strMensajeid_otro_suplidor='';
		$this->strMensajeid_impuesto='';
		$this->strMensajeid_impuesto_ventas='';
		$this->strMensajeid_impuesto_compras='';
		$this->strMensajeimpuesto1_en_ventas='';
		$this->strMensajeimpuesto1_en_compras='';
		$this->strMensajeultima_venta='';
		$this->strMensajeid_otro_impuesto='';
		$this->strMensajeid_otro_impuesto_ventas='';
		$this->strMensajeid_otro_impuesto_compras='';
		$this->strMensajeotro_impuesto_ventas_codigo='';
		$this->strMensajeotro_impuesto_compras_codigo='';
		$this->strMensajeprecio_de_compra_0='';
		$this->strMensajeprecio_actualizado='';
		$this->strMensajerequiere_nro_serie='';
		$this->strMensajecosto_dolar='';
		$this->strMensajecomentario='';
		$this->strMensajecomenta_factura='';
		$this->strMensajeid_retencion='';
		$this->strMensajeid_retencion_ventas='';
		$this->strMensajeid_retencion_compras='';
		$this->strMensajeretencion_ventas_codigo='';
		$this->strMensajeretencion_compras_codigo='';
		$this->strMensajenotas='';
	}
	
	public function nuevo() {
		try {
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->ejecutarMantenimiento(MaintenanceType::$NUEVO);
			
			$this->bitEsnuevo=false;
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			$this->procesarPostAccion("form",MaintenanceType::$NUEVO);
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			*/
							
		} catch(Exception $e) {
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
						
			if($lista_producto_session==null) {
				$lista_producto_session=new lista_producto_session();
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
						$this->lista_productoLogic->getEntity($id);/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
					
					$this->cargarDatosLogicClaseBean(false);
				}									
			} else {
				$this->inicializar();
			}
			
			$this->lista_productoActual =$this->lista_productoClase;
			
			/*$this->lista_productoActual =$this->migrarModellista_producto($this->lista_productoClase);*/
			
			$this->inicializarMensajesTipo('ACTUALIZAR',null);
			
			$this->procesarPostAccion("form",MaintenanceType::$ACTUALIZAR);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$CHANGE,EventoSubTipo::$CHANGED,'FORM',$this->lista_productoLogic->getlista_productos(),$this->lista_productoActual);
			
			$this->actualizarControllerConReturnGeneral($this->lista_productoReturnGeneral);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
					
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function eliminar(?int $idActual=0) {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
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
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
						
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getIndiceNuevo() : int {
		$iIndice=0;
		//$existe=false;
		
		$lista_productosLocal=$this->getListaActual();
		
		$iIndice=lista_producto_util::getIndiceNuevo($lista_productosLocal,$this->idNuevo);
		
		return $iIndice;
	}
	
	public function getIndiceActual(lista_producto $lista_producto,int $iIndiceActual) : int {
		$iIndice=0;
		//$existe=false;
		
		$lista_productosLocal=$this->getListaActual();
		
		$iIndice=lista_producto_util::getIndiceActual($lista_productosLocal,$lista_producto,$iIndiceActual);
		
		return $iIndice;
	}
	
	public function cancelar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			/*if($this->Session->read('blnEsnuevolista_producto')!=null){ 	
			}*/			
			
			$this->inicializar();
			
			$this->idNuevo=0;
			
		
			$this->lista_productoActual =$this->lista_productoClase;
			
			/*$this->lista_productoActual =$this->migrarModellista_producto($this->lista_productoClase);*/
			
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
			
			$this->lista_productoLogic->setIsConDeepLoad(true);
			
			$classes=array();
			$class=new Classe('');
				
			
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('unidad_compra');$classes[]=$class;
				$class=new Classe('unidad_venta');$classes[]=$class;
				$class=new Classe('categoria_producto');$classes[]=$class;
				$class=new Classe('sub_categoria_producto');$classes[]=$class;
				$class=new Classe('tipo_producto');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('cuenta_compra');$classes[]=$class;
				$class=new Classe('cuenta_venta');$classes[]=$class;
				$class=new Classe('cuenta_inventario');$classes[]=$class;
				$class=new Classe('otro_suplidor');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('impuesto_ventas');$classes[]=$class;
				$class=new Classe('impuesto_compras');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
				$class=new Classe('otro_impuesto_ventas');$classes[]=$class;
				$class=new Classe('otro_impuesto_compras');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
				$class=new Classe('retencion_ventas');$classes[]=$class;
				$class=new Classe('retencion_compras');$classes[]=$class;
			
			$this->lista_productoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			$this->lista_productoLogic->setDatosCliente($this->datosCliente);
			
			if($maintenanceType==MaintenanceType::$NUEVO){ 
				$this->lista_productoLogic->setlista_producto(new lista_producto());
				
				$this->lista_productoLogic->getlista_producto()->setIsNew(true);
				$this->lista_productoLogic->getlista_producto()->setIsChanged(true);
				$this->lista_productoLogic->getlista_producto()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if ($this->lista_productoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
			
					$this->lista_productoLogic->lista_productos[]=$this->lista_productoLogic->getlista_producto();
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->lista_productoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->lista_productoLogic->saveRelaciones($this->lista_productoLogic->getlista_producto());/*WithConnection*/
								
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
						}
					}
										
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ACTUALIZAR){ 
				
				$this->lista_productoLogic->getlista_producto()->setIsChanged(true);
				$this->lista_productoLogic->getlista_producto()->setIsNew(false);
				$this->lista_productoLogic->getlista_producto()->setIsDeleted(false);
				
				$this->cargarParametros();
				
				if($this->lista_productoModel->validates()==true) {
					$this->cargarDatosLogicClaseBean(true);
					
					$this->actualizarLista($this->lista_productoLogic->getlista_producto(),$this->lista_productoLogic->getlista_productos());
					
					if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->lista_productoLogic->saves();/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
						
					} else if($this->bitEsRelaciones) {
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							
							
							$this->lista_productoLogic->saveRelaciones($this->lista_productoLogic->getlista_producto());/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
						}
					}
					
				} else {
					$this->inicializarMensajesDatosInvalidos();
				}
			} else  if($maintenanceType==MaintenanceType::$ELIMINAR){ 
				
				$this->cargarParametros();
				
				$this->cargarDatosLogicClaseBean(true);
				
				$this->lista_productoLogic->getlista_producto()->setIsDeleted(true);
				$this->lista_productoLogic->getlista_producto()->setIsNew(false);
				$this->lista_productoLogic->getlista_producto()->setIsChanged(false);				
				
				$this->actualizarLista($this->lista_productoLogic->getlista_producto(),$this->lista_productoLogic->getlista_productos());
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->lista_productoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}	
					
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->lista_productoLogic->saveRelaciones($this->lista_productoLogic->getlista_producto());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					$this->lista_productosEliminados[]=$this->lista_productoLogic->getlista_producto();
				}
				
			} else  if($maintenanceType==MaintenanceType::$GUARDARCAMBIOS){ 					
				
				if(!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado) {
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$this->lista_productoLogic->saves();/*WithConnection*/
					
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
								
					}
				} else if($this->bitEsRelaciones) {
					
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						
							
						$this->lista_productoLogic->saveRelaciones($this->lista_productoLogic->getlista_producto());/*WithConnection*/
							
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
					}
						
				} else if($this->bitEsRelacionado) {
					
				} 
				
				if($this->bitEsRelaciones || (!$this->bitGuardarCambiosEnLote && !$this->bitEsRelaciones && !$this->bitEsRelacionado)) {
					$this->lista_productosEliminados=array();
				}
			}
			
			
			
			if($this->bitEsRelacionado) {
				$classes=array();
				$class=null;
				
				
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('unidad_compra');$classes[]=$class;
				$class=new Classe('unidad_venta');$classes[]=$class;
				$class=new Classe('categoria_producto');$classes[]=$class;
				$class=new Classe('sub_categoria_producto');$classes[]=$class;
				$class=new Classe('tipo_producto');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('cuenta_compra');$classes[]=$class;
				$class=new Classe('cuenta_venta');$classes[]=$class;
				$class=new Classe('cuenta_inventario');$classes[]=$class;
				$class=new Classe('otro_suplidor');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('impuesto_ventas');$classes[]=$class;
				$class=new Classe('impuesto_compras');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
				$class=new Classe('otro_impuesto_ventas');$classes[]=$class;
				$class=new Classe('otro_impuesto_compras');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
				$class=new Classe('retencion_ventas');$classes[]=$class;
				$class=new Classe('retencion_compras');$classes[]=$class;
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					/*$this->lista_productoLogic->setlista_productos();*/
					
					$this->lista_productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
	
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
					
				}
			}
			
			
			$this->lista_productoLogic->setIsConDeepLoad(false);
			
			$this->lista_productos=$this->lista_productoLogic->getlista_productos();							
			
			
			if($this->bitEsRelacionado) {
				$this->Session->write(lista_producto_util::$STR_SESSION_NAME.'Lista',serialize($this->lista_productos));
				$this->Session->write(lista_producto_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->lista_productosEliminados));
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}
			
			
			$this->eliminarTablaBase($id);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}
			*/
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*//ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginallista_producto;*/
	
			if (!$id) {
				/*$this->redirect(array('action' => 'index'));*/
			}
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) {
					$this->lista_productoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}
			
						
			$indice=0;
			$existe=false;
			
			foreach($this->lista_productos as $lista_productoLocal) {
				if($this->lista_productoLogic->getlista_producto()->getId()==$lista_productoLocal->getId()) {
					$existe=true;
					break;
				}
				
				$indice++;
			}
			
			$this->lista_productoLogic->getlista_producto()->setIsDeleted(true);
			$this->lista_productosEliminados[]=$this->lista_productoLogic->getlista_producto();
			
			/*QUITAR DE LISTA MEMORIA*/
			if($existe) {
				unset($this->lista_productos[$indice]);
				
				$this->lista_productos = array_values($this->lista_productos);
			}
			
			/*$this->cargarDatosLogicClaseBean(false);			
			$this->data =$this->migrarModellista_producto($this->lista_productoClase);			
			$this->strVisibleTablaElementos='table-row';			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);*/
			
			
			
			/*SOLO SI ES NECESARIO*/
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			*/
			
		} catch(Exception $e) {
			
			throw $e;
			
			/*
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
			*/
		}
	}
	
	public function actualizarLista(lista_producto $lista_producto,array $lista_productos) {
		try {
			foreach($lista_productos as $lista_productoLocal){ 
				if($lista_productoLocal->getId()==$lista_producto->getId()) {
					$lista_productoLocal->setIsChanged($lista_producto->getIsChanged());
					$lista_productoLocal->setIsNew($lista_producto->getIsNew());
					$lista_productoLocal->setIsDeleted($lista_producto->getIsDeleted());
					//$lista_productoLocal->setbitExpired($lista_producto->getbitExpired());
					
					$lista_productoLocal->setId($lista_producto->getId());	
					$lista_productoLocal->setVersionRow($lista_producto->getVersionRow());	
					$lista_productoLocal->setVersionRow($lista_producto->getVersionRow());	
					$lista_productoLocal->setid_producto($lista_producto->getid_producto());	
					$lista_productoLocal->setcodigo_producto($lista_producto->getcodigo_producto());	
					$lista_productoLocal->setdescripcion_producto($lista_producto->getdescripcion_producto());	
					$lista_productoLocal->setprecio1($lista_producto->getprecio1());	
					$lista_productoLocal->setprecio2($lista_producto->getprecio2());	
					$lista_productoLocal->setprecio3($lista_producto->getprecio3());	
					$lista_productoLocal->setprecio4($lista_producto->getprecio4());	
					$lista_productoLocal->setcosto($lista_producto->getcosto());	
					$lista_productoLocal->setid_unidad_compra($lista_producto->getid_unidad_compra());	
					$lista_productoLocal->setunidad_en_compra($lista_producto->getunidad_en_compra());	
					$lista_productoLocal->setequivalencia_en_compra($lista_producto->getequivalencia_en_compra());	
					$lista_productoLocal->setid_unidad_venta($lista_producto->getid_unidad_venta());	
					$lista_productoLocal->setunidad_en_venta($lista_producto->getunidad_en_venta());	
					$lista_productoLocal->setequivalencia_en_venta($lista_producto->getequivalencia_en_venta());	
					$lista_productoLocal->setcantidad_total($lista_producto->getcantidad_total());	
					$lista_productoLocal->setcantidad_minima($lista_producto->getcantidad_minima());	
					$lista_productoLocal->setid_categoria_producto($lista_producto->getid_categoria_producto());	
					$lista_productoLocal->setid_sub_categoria_producto($lista_producto->getid_sub_categoria_producto());	
					$lista_productoLocal->setacepta_lote($lista_producto->getacepta_lote());	
					$lista_productoLocal->setvalor_inventario($lista_producto->getvalor_inventario());	
					$lista_productoLocal->setimagen($lista_producto->getimagen());	
					$lista_productoLocal->setincremento1($lista_producto->getincremento1());	
					$lista_productoLocal->setincremento2($lista_producto->getincremento2());	
					$lista_productoLocal->setincremento3($lista_producto->getincremento3());	
					$lista_productoLocal->setincremento4($lista_producto->getincremento4());	
					$lista_productoLocal->setcodigo_fabricante($lista_producto->getcodigo_fabricante());	
					$lista_productoLocal->setproducto_fisico($lista_producto->getproducto_fisico());	
					$lista_productoLocal->setsituacion_producto($lista_producto->getsituacion_producto());	
					$lista_productoLocal->setid_tipo_producto($lista_producto->getid_tipo_producto());	
					$lista_productoLocal->settipo_producto_codigo($lista_producto->gettipo_producto_codigo());	
					$lista_productoLocal->setid_bodega($lista_producto->getid_bodega());	
					$lista_productoLocal->setmostrar_componente($lista_producto->getmostrar_componente());	
					$lista_productoLocal->setfactura_sin_stock($lista_producto->getfactura_sin_stock());	
					$lista_productoLocal->setavisa_expiracion($lista_producto->getavisa_expiracion());	
					$lista_productoLocal->setfactura_con_precio($lista_producto->getfactura_con_precio());	
					$lista_productoLocal->setproducto_equivalente($lista_producto->getproducto_equivalente());	
					$lista_productoLocal->setid_cuenta_compra($lista_producto->getid_cuenta_compra());	
					$lista_productoLocal->setid_cuenta_venta($lista_producto->getid_cuenta_venta());	
					$lista_productoLocal->setid_cuenta_inventario($lista_producto->getid_cuenta_inventario());	
					$lista_productoLocal->setcuenta_compra_codigo($lista_producto->getcuenta_compra_codigo());	
					$lista_productoLocal->setcuenta_venta_codigo($lista_producto->getcuenta_venta_codigo());	
					$lista_productoLocal->setcuenta_inventario_codigo($lista_producto->getcuenta_inventario_codigo());	
					$lista_productoLocal->setid_otro_suplidor($lista_producto->getid_otro_suplidor());	
					$lista_productoLocal->setid_impuesto($lista_producto->getid_impuesto());	
					$lista_productoLocal->setid_impuesto_ventas($lista_producto->getid_impuesto_ventas());	
					$lista_productoLocal->setid_impuesto_compras($lista_producto->getid_impuesto_compras());	
					$lista_productoLocal->setimpuesto1_en_ventas($lista_producto->getimpuesto1_en_ventas());	
					$lista_productoLocal->setimpuesto1_en_compras($lista_producto->getimpuesto1_en_compras());	
					$lista_productoLocal->setultima_venta($lista_producto->getultima_venta());	
					$lista_productoLocal->setid_otro_impuesto($lista_producto->getid_otro_impuesto());	
					$lista_productoLocal->setid_otro_impuesto_ventas($lista_producto->getid_otro_impuesto_ventas());	
					$lista_productoLocal->setid_otro_impuesto_compras($lista_producto->getid_otro_impuesto_compras());	
					$lista_productoLocal->setotro_impuesto_ventas_codigo($lista_producto->getotro_impuesto_ventas_codigo());	
					$lista_productoLocal->setotro_impuesto_compras_codigo($lista_producto->getotro_impuesto_compras_codigo());	
					$lista_productoLocal->setprecio_de_compra_0($lista_producto->getprecio_de_compra_0());	
					$lista_productoLocal->setprecio_actualizado($lista_producto->getprecio_actualizado());	
					$lista_productoLocal->setrequiere_nro_serie($lista_producto->getrequiere_nro_serie());	
					$lista_productoLocal->setcosto_dolar($lista_producto->getcosto_dolar());	
					$lista_productoLocal->setcomentario($lista_producto->getcomentario());	
					$lista_productoLocal->setcomenta_factura($lista_producto->getcomenta_factura());	
					$lista_productoLocal->setid_retencion($lista_producto->getid_retencion());	
					$lista_productoLocal->setid_retencion_ventas($lista_producto->getid_retencion_ventas());	
					$lista_productoLocal->setid_retencion_compras($lista_producto->getid_retencion_compras());	
					$lista_productoLocal->setretencion_ventas_codigo($lista_producto->getretencion_ventas_codigo());	
					$lista_productoLocal->setretencion_compras_codigo($lista_producto->getretencion_compras_codigo());	
					$lista_productoLocal->setnotas($lista_producto->getnotas());	
				}
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getListaActual() : array {
		//$tiene=false;
		
		$lista_productosLocal=array();
		
		try	{			
			/*ARCHITECTURE*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$lista_productosLocal=$this->lista_productoLogic->getlista_productos();
			
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				$lista_productosLocal=$this->lista_productos;
			}
			/*ARCHITECTURE*/
		
		} catch(Exception $e) {
			throw $e;
		}
		
		return $lista_productosLocal;
	}	
	
	public function seleccionarActualDesdeLista(int $id = null) {		
		
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			foreach($this->lista_productoLogic->getlista_productos() as $lista_producto) {
				if($lista_producto->getId()==$id) {
					$this->lista_productoLogic->setlista_producto($lista_producto);
					
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
		/*$lista_productosSeleccionados=array();*/
		$checkbox_id=0;
		$indice=0;
		
		foreach($this->lista_productos as $lista_producto) {
			$lista_producto->setIsSelected(false);
		}
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			$checkbox_id=$this->getDataCheckBoxId($i);
			
			if($checkbox_id!=null && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {
				$this->lista_productos[$indice]->setIsSelected(true);
			}
		}
	}	
	
	public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : lista_producto_param_return{
		/*SOLO SI ES NECESARIO*/
		$this->saveGetSessionControllerAndPageAuxiliar(false);
			
		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
						
		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
		
		
		$this->lista_productoReturnGeneral=new lista_producto_param_return();
		$this->lista_productoParameterGeneral=new lista_producto_param_return();
			
		$this->lista_productoParameterGeneral->setdata($this->data);
		
		
		if(!$esControlTabla) {
			/*//NO APLICA
			this.setVariablesFormularioToObjetoActuallista_producto(this.lista_producto,true);
			this.setVariablesFormularioToObjetoActualForeignKeyslista_producto(this.lista_producto);*/
			
			if($lista_producto_session->conGuardarRelaciones) {
				/*$this->setVariablesFormularioRelacionesToObjetoActuallista_producto(this.lista_producto,classes);*/
			}
		
			if($conIrServidorAplicacion) {
			
				if(!$this->bitEsEventoTabla) {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametros();
					
				} else {
					/*DESDE FORM (COPIADO DESDE EJECUTAR MANTENIMIENTO)*/
					$this->cargarParametrosTabla();
				}
				
				$this->lista_productoActual=$this->lista_productoClase;
				
				$this->setCopiarVariablesObjetos($this->lista_productoActual,$this->lista_producto,true,true,false);
			
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->lista_productoReturnGeneral=$this->lista_productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->lista_productoLogic->getlista_productos(),$this->lista_producto,$this->lista_productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
									
				/*ACTUALIZA VARIABLES RELACIONES DEFECTO DESDE LOGIC A RETURN GENERAL Y LUEGO A BEAN*/
				if($lista_producto_session->estaModoGuardarRelaciones) {
					/*$this->setVariablesRelacionesObjetoReturnGeneralToBeanlista_producto($classes,$this->lista_productoReturnGeneral,$this->lista_productoBean,false);*/
				}
					
				if($this->lista_productoReturnGeneral->getConRecargarPropiedades()) {
					
					$this->setCopiarVariablesObjetos($this->lista_productoReturnGeneral->getlista_producto(),$this->lista_productoActual,true,true,false);
			
					/*//NO_APLICA
					//INICIALIZA VARIABLES COMBOS NORMALES (FK)
					$this->setVariablesObjetoActualToFormularioForeignKeylista_producto($this->lista_productoReturnGeneral->getlista_producto());
						
					//NO_APLICA
					//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
					$this->setVariablesObjetoActualToFormulariolista_producto($this->lista_productoReturnGeneral->getlista_producto());*/
				}
					
				if($this->lista_productoReturnGeneral->getConRecargarRelaciones()) {
					/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
					$this->setVariablesRelacionesObjetoActualToFormulario($this->lista_productoReturnGeneral->getlista_producto(),$classes);*/
				}									
				
			} else {				
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				$this->setVariablesRelacionesObjetoActualToFormulario($this->lista_producto,$classes);*/
			}
		
			/*NO APLICA*/
			/*
			if(lista_productoJInternalFrame::$ISBINDING_MANUAL_TABLA) {
				this.setVariablesFormularioToObjetoActuallista_producto(this.lista_producto,true);
				this.setVariablesFormularioToObjetoActualForeignKeyslista_producto(this.lista_producto);				
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
				
				if($this->lista_productoAnterior!=null) {
					$this->lista_producto=$this->lista_productoAnterior;
				}
			}
			
			if($conIrServidorAplicacion) {
				$this->lista_productoReturnGeneral=$this->lista_productoLogic->procesarEventosWithConnection($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->lista_productoLogic->getlista_productos(),$this->lista_producto,$this->lista_productoParameterGeneral,$this->bitEsnuevo,$classes);
			}
			
			$this->actualizarLista($this->lista_productoReturnGeneral->getlista_producto(),$this->lista_productoLogic->getlista_productos());
			*/
		}
		
		return $this->lista_productoReturnGeneral;
	}
	
	public function procesarAccionJson(bool $return_json,string $action) {
		$return_json=true;
		
		try {	
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}

			$this->lista_productoReturnGeneral=new lista_producto_param_return();			
			$this->lista_productoParameterGeneral=new lista_producto_param_return();
			
			$this->lista_productoParameterGeneral->setdata($this->data);
			
						
			$maxima_fila=$this->getDataMaximaFila();
			
			$this->setSeleccionars($maxima_fila);
			
			$this->lista_productoReturnGeneral=$this->lista_productoLogic->procesarAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$this->strProceso,$this->lista_productos,$this->lista_productoParameterGeneral);/*WithConnection*/
			
			
			
			
			if(!$this->lista_productoReturnGeneral->getConReturnJson()) {
				$return_json=false;
			}
			
			$this->actualizarControllerConReturnGeneral($this->lista_productoReturnGeneral);
			
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			/*return $this->lista_productoReturnGeneral;*/
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
		
		$this->lista_productoReturnGeneral=new lista_producto_param_return();
		
		/*FORMULARIO RECARGAR (FUNCION JS WEB)*/
		if( $sTipoControl=='form' || $sTipoControl=='form_lista_producto') {
		    $sDominio='lista_producto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_RECARGAR;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$RELOAD;		$eventoSubTipo=EventoSubTipo::$CHANGED;		$sTipoGeneral='FORM';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		


		
		if($sTipoControl!=null && $sTipoControl!='') {
			$this->lista_productoReturnGeneral=$this->recargarForm($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
		}
		
		return $this->lista_productoReturnGeneral;
	}
	
	public function procesarPostAccion(string $sTipoControl,string $sTipoAccion) {
		
		$sTipo=$sTipoControl;
		
		$sDominio='';	$eventoGlobalTipo='';	$controlTipo='';
		$eventoTipo=''; $eventoSubTipo='';		$sTipoGeneral='';
		$classes=array(); $conIrServidorAplicacion=false; $esControlTabla=false;
		
		/*CARGAR PARAMETROS*/
		if( $sTipoAccion==MaintenanceType::$NUEVO) {
		    $sDominio='lista_producto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$NEW;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ACTUALIZAR) {
		    $sDominio='lista_producto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$UPDATE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		
		} else if( $sTipoAccion==MaintenanceType::$ELIMINAR) {
		    $sDominio='lista_producto';		$eventoGlobalTipo=EventoGlobalTipo::$FORM_MANTENIMIENTO;	$controlTipo=ControlTipo::$FORM;
		    $eventoTipo=EventoTipo::$CRUD;		$eventoSubTipo=EventoSubTipo::$DELETE;		$sTipoGeneral='FORM_MANTENIMIENTO';
		    $classes=array();		$conIrServidorAplicacion=true;		$esControlTabla=false;
		}
		
		$this->procesarPostAccionGeneral($sTipo,$sDominio,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipoGeneral,$classes,$conIrServidorAplicacion,$esControlTabla);
	}
	
	public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) {
		
		$this->lista_productoReturnGeneral=new lista_producto_param_return();
		$this->lista_productoParameterGeneral=new lista_producto_param_return();
			
		$this->lista_productoParameterGeneral->setdata($this->data);
			
		if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$this->lista_productoReturnGeneral=$this->lista_productoLogic->procesarPostAccions($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$eventoGlobalTipo,$controlTipo,$eventoTipo,$eventoSubTipo,$sTipo,$this->lista_productoLogic->getlista_productos(),$this->lista_producto,$this->lista_productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
									
		} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
		}				
														
		if($this->lista_productoReturnGeneral->getConRecargarRelaciones()) {
			/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
			$this->setVariablesRelacionesObjetoActualToFormulario($this->lista_productoReturnGeneral->getlista_producto(),$classes);*/
		}									
	
		if($this->lista_productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$this->lista_productoReturnGeneral->getsFuncionJs();
		}
					
		/*return $this->lista_productoReturnGeneral;*/
	}
	
	public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $lista_productos,lista_producto $lista_producto) {
		
		$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
						
		if($lista_producto_session==null) {
			$lista_producto_session=new lista_producto_session();
		}
			
			/*MANEJAR EVENTO*/
			$classes=array();
		
			/*
			if($this->jInternalFrameParent!=null) {
				$this->jInternalFrameParent->actualizarObjetoPadreFk(lista_producto_util::$CLASSNAME);
			}	
			*/
			
			$this->lista_productoReturnGeneral=new lista_producto_param_return();
			$this->lista_productoParameterGeneral=new lista_producto_param_return();
			
			$this->lista_productoParameterGeneral->setdata($this->data);
		
		
			
		if($lista_producto_session->conGuardarRelaciones) {
			$classes=lista_producto_util::getClassesRelsOf(array(),DeepLoadType::$NONE);
		}
			
			$this->classesActual=array();
			$this->classesActual=array_merge($classes);
			
			//Esto esta en nuevoPreparar, pero no deberia estar en Seleccionar
			//$this->setCopiarVariablesObjetos($this->lista_productoActual,$this->lista_producto,true,true,false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				//Los cambios deberian ir directamente en el objeto, no en return
				//$this->lista_productoReturnGeneral=$this->lista_productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$UPDATE,'FORM',$this->lista_productoLogic->getlista_productos(),$this->lista_productoActual,$this->lista_productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
				$this->lista_productoReturnGeneral=$this->lista_productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,$evento_global,$control_tipo,$evento_tipo,$evento_subtipo,$control,$lista_productos,$lista_producto,$this->lista_productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
							
			}			
			
			
			if($classes!=null);
	}
	
	public function mostrarEjecutarAccionesRelaciones(int $id = null) {		
		try {
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getNewConnexionToDeep();
			}


			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->getEntity($id);/*WithConnection*/
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}			
			
			
			/*$this->data =$this->migrarModellista_producto($this->lista_productoLogic->getlista_producto());*/
			
			$this->lista_producto=$this->lista_productoLogic->getlista_producto();
			
			/*//SE LO QUITA CON JQUERY NO SE NECESITA
			$this->strVisibleTablaAccionesRelaciones='table-row';*/
			
			//DESHABILITADO, TEMPLATE CON JS
			//$this->htmlTablaAccionesRelaciones=$this->getHtmlTablaAccionesRelaciones($this->lista_producto);								
			
			/*DEBERIA FUNCIONAR EN ANTERIOR LINEA DE CODIGO*/
						
			/*SOLO SI ES NECESARIO*/
			/*$this->saveGetSessionControllerAndPageAuxiliar(true);*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarParametrosTabla() {			
		if($this->data!=null) {
			
			$lista_productoActual=new lista_producto();
			
			if($this->lista_productoClase==null) {		
				$this->lista_productoClase=new lista_producto();
			}
				
				$i=$this->idFilaTablaActual;
				
				/*$indice=$i-1;								
				
				$lista_productoActual=$this->lista_productos[$indice];*/
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $lista_productoActual->setid_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $lista_productoActual->setcodigo_producto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $lista_productoActual->setdescripcion_producto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $lista_productoActual->setprecio1((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $lista_productoActual->setprecio2((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $lista_productoActual->setprecio3((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $lista_productoActual->setprecio4((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $lista_productoActual->setcosto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $lista_productoActual->setid_unidad_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $lista_productoActual->setunidad_en_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $lista_productoActual->setequivalencia_en_compra((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $lista_productoActual->setid_unidad_venta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $lista_productoActual->setunidad_en_venta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $lista_productoActual->setequivalencia_en_venta((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $lista_productoActual->setcantidad_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $lista_productoActual->setcantidad_minima((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $lista_productoActual->setid_categoria_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $lista_productoActual->setid_sub_categoria_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $lista_productoActual->setacepta_lote($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $lista_productoActual->setvalor_inventario((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $lista_productoActual->setimagen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $lista_productoActual->setincremento1((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $lista_productoActual->setincremento2((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $lista_productoActual->setincremento3((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $lista_productoActual->setincremento4((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $lista_productoActual->setcodigo_fabricante($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $lista_productoActual->setproducto_fisico((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $lista_productoActual->setsituacion_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $lista_productoActual->setid_tipo_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $lista_productoActual->settipo_producto_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $lista_productoActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $lista_productoActual->setmostrar_componente($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $lista_productoActual->setfactura_sin_stock($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_35'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $lista_productoActual->setavisa_expiracion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $lista_productoActual->setfactura_con_precio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_37'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $lista_productoActual->setproducto_equivalente($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $lista_productoActual->setid_cuenta_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_39'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $lista_productoActual->setid_cuenta_venta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $lista_productoActual->setid_cuenta_inventario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_41'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_42','t'.$this->strSufijo)) {  $lista_productoActual->setcuenta_compra_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_42'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_43','t'.$this->strSufijo)) {  $lista_productoActual->setcuenta_venta_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_43'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_44','t'.$this->strSufijo)) {  $lista_productoActual->setcuenta_inventario_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_44'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_45','t'.$this->strSufijo)) {  $lista_productoActual->setid_otro_suplidor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_45'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_46','t'.$this->strSufijo)) {  $lista_productoActual->setid_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_46'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_47','t'.$this->strSufijo)) {  $lista_productoActual->setid_impuesto_ventas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_47'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_48','t'.$this->strSufijo)) {  $lista_productoActual->setid_impuesto_compras((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_48'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_49','t'.$this->strSufijo)) {  $lista_productoActual->setimpuesto1_en_ventas($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_49'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_50','t'.$this->strSufijo)) {  $lista_productoActual->setimpuesto1_en_compras($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_50'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_51','t'.$this->strSufijo)) {  $lista_productoActual->setultima_venta(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_51')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_52','t'.$this->strSufijo)) {  $lista_productoActual->setid_otro_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_52'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_53','t'.$this->strSufijo)) {  $lista_productoActual->setid_otro_impuesto_ventas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_53'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_54','t'.$this->strSufijo)) {  $lista_productoActual->setid_otro_impuesto_compras((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_54'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_55','t'.$this->strSufijo)) {  $lista_productoActual->setotro_impuesto_ventas_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_55'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_56','t'.$this->strSufijo)) {  $lista_productoActual->setotro_impuesto_compras_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_56'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_57','t'.$this->strSufijo)) {  $lista_productoActual->setprecio_de_compra_0((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_57'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_58','t'.$this->strSufijo)) {  $lista_productoActual->setprecio_actualizado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_58')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_59','t'.$this->strSufijo)) {  $lista_productoActual->setrequiere_nro_serie($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_59'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_60','t'.$this->strSufijo)) {  $lista_productoActual->setcosto_dolar((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_60'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_61','t'.$this->strSufijo)) {  $lista_productoActual->setcomentario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_61'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_62','t'.$this->strSufijo)) {  $lista_productoActual->setcomenta_factura($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_62'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_63','t'.$this->strSufijo)) {  $lista_productoActual->setid_retencion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_63'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_64','t'.$this->strSufijo)) {  $lista_productoActual->setid_retencion_ventas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_64'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_65','t'.$this->strSufijo)) {  $lista_productoActual->setid_retencion_compras((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_65'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_66','t'.$this->strSufijo)) {  $lista_productoActual->setretencion_ventas_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_66'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_67','t'.$this->strSufijo)) {  $lista_productoActual->setretencion_compras_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_67'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_68','t'.$this->strSufijo)) {  $lista_productoActual->setnotas($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_68'));  }

				$this->lista_productoClase=$lista_productoActual;
				
				
				
				/*NO USAR $this->data LO HACE MUY LENTO AL SISTEMA*/
				$this->lista_productoModel->set($this->lista_productoClase);
				
				/*$this->lista_productoModel->set($this->migrarModellista_producto($this->lista_productoClase));*/
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function returnHtml(bool $bitConRetrurnAjax) {				
		/*//SE ACTUALIZA AL FINAL DE procesarbusqueda Y AL FINAL DE ejecutarmantenimiento
		$this->lista_productos=$this->migrarModellista_producto($this->lista_productoLogic->getlista_productos());							
		$this->lista_productos=$this->lista_productoLogic->getlista_productos();*/
		
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
			$this->Session->write(lista_producto_util::$STR_SESSION_CONTROLLER_NAME,serialize($this));
		
		} else {
						
			$lista_producto_control_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_CONTROLLER_NAME));
			
			if($lista_producto_control_session==null) {
				$lista_producto_control_session=$this;
			}							
			
			$this->actualizarDesdeSession($lista_producto_control_session);
			
			$this->saveGetSessionPageAuxiliar($bitSaveSession);									
		}
	}
	
	public function saveGetSessionPageAuxiliar(bool $bitSaveSession) {						
		if($bitSaveSession==true) {			
			/*$this->Session->write(lista_producto_util::$STR_SESSION_NAME,$this);*/
		} else {
			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));
			
			if($lista_producto_session==null) {
				$lista_producto_session=new lista_producto_session();
			}
			
			$this->set(lista_producto_util::$STR_SESSION_NAME, $lista_producto_session);
		}
	}
	
	public function setCopiarVariablesObjetos(lista_producto $lista_productoOrigen,lista_producto $lista_producto,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false) { 
		try {
			if($lista_producto==null) {
				$lista_producto=new lista_producto();	
			}
			
			
			if($conColumnasBase) {if($conDefault || ($conDefault==false && $lista_productoOrigen->getId()!=null && $lista_productoOrigen->getId()!=0)) {$lista_producto->setId($lista_productoOrigen->getId());}}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_producto()!=null && $lista_productoOrigen->getid_producto()!=-1)) {$lista_producto->setid_producto($lista_productoOrigen->getid_producto());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getcodigo_producto()!=null && $lista_productoOrigen->getcodigo_producto()!='')) {$lista_producto->setcodigo_producto($lista_productoOrigen->getcodigo_producto());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getdescripcion_producto()!=null && $lista_productoOrigen->getdescripcion_producto()!='')) {$lista_producto->setdescripcion_producto($lista_productoOrigen->getdescripcion_producto());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getprecio1()!=null && $lista_productoOrigen->getprecio1()!=0.0)) {$lista_producto->setprecio1($lista_productoOrigen->getprecio1());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getprecio2()!=null && $lista_productoOrigen->getprecio2()!=0.0)) {$lista_producto->setprecio2($lista_productoOrigen->getprecio2());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getprecio3()!=null && $lista_productoOrigen->getprecio3()!=0.0)) {$lista_producto->setprecio3($lista_productoOrigen->getprecio3());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getprecio4()!=null && $lista_productoOrigen->getprecio4()!=0.0)) {$lista_producto->setprecio4($lista_productoOrigen->getprecio4());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getcosto()!=null && $lista_productoOrigen->getcosto()!=0.0)) {$lista_producto->setcosto($lista_productoOrigen->getcosto());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_unidad_compra()!=null && $lista_productoOrigen->getid_unidad_compra()!=-1)) {$lista_producto->setid_unidad_compra($lista_productoOrigen->getid_unidad_compra());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getunidad_en_compra()!=null && $lista_productoOrigen->getunidad_en_compra()!=0)) {$lista_producto->setunidad_en_compra($lista_productoOrigen->getunidad_en_compra());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getequivalencia_en_compra()!=null && $lista_productoOrigen->getequivalencia_en_compra()!=0.0)) {$lista_producto->setequivalencia_en_compra($lista_productoOrigen->getequivalencia_en_compra());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_unidad_venta()!=null && $lista_productoOrigen->getid_unidad_venta()!=-1)) {$lista_producto->setid_unidad_venta($lista_productoOrigen->getid_unidad_venta());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getunidad_en_venta()!=null && $lista_productoOrigen->getunidad_en_venta()!=0)) {$lista_producto->setunidad_en_venta($lista_productoOrigen->getunidad_en_venta());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getequivalencia_en_venta()!=null && $lista_productoOrigen->getequivalencia_en_venta()!=0.0)) {$lista_producto->setequivalencia_en_venta($lista_productoOrigen->getequivalencia_en_venta());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getcantidad_total()!=null && $lista_productoOrigen->getcantidad_total()!=0.0)) {$lista_producto->setcantidad_total($lista_productoOrigen->getcantidad_total());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getcantidad_minima()!=null && $lista_productoOrigen->getcantidad_minima()!=0.0)) {$lista_producto->setcantidad_minima($lista_productoOrigen->getcantidad_minima());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_categoria_producto()!=null && $lista_productoOrigen->getid_categoria_producto()!=-1)) {$lista_producto->setid_categoria_producto($lista_productoOrigen->getid_categoria_producto());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_sub_categoria_producto()!=null && $lista_productoOrigen->getid_sub_categoria_producto()!=-1)) {$lista_producto->setid_sub_categoria_producto($lista_productoOrigen->getid_sub_categoria_producto());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getacepta_lote()!=null && $lista_productoOrigen->getacepta_lote()!='')) {$lista_producto->setacepta_lote($lista_productoOrigen->getacepta_lote());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getvalor_inventario()!=null && $lista_productoOrigen->getvalor_inventario()!=0.0)) {$lista_producto->setvalor_inventario($lista_productoOrigen->getvalor_inventario());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getimagen()!=null && $lista_productoOrigen->getimagen()!='')) {$lista_producto->setimagen($lista_productoOrigen->getimagen());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getincremento1()!=null && $lista_productoOrigen->getincremento1()!=0.0)) {$lista_producto->setincremento1($lista_productoOrigen->getincremento1());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getincremento2()!=null && $lista_productoOrigen->getincremento2()!=0.0)) {$lista_producto->setincremento2($lista_productoOrigen->getincremento2());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getincremento3()!=null && $lista_productoOrigen->getincremento3()!=0.0)) {$lista_producto->setincremento3($lista_productoOrigen->getincremento3());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getincremento4()!=null && $lista_productoOrigen->getincremento4()!=0.0)) {$lista_producto->setincremento4($lista_productoOrigen->getincremento4());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getcodigo_fabricante()!=null && $lista_productoOrigen->getcodigo_fabricante()!='')) {$lista_producto->setcodigo_fabricante($lista_productoOrigen->getcodigo_fabricante());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getproducto_fisico()!=null && $lista_productoOrigen->getproducto_fisico()!=0)) {$lista_producto->setproducto_fisico($lista_productoOrigen->getproducto_fisico());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getsituacion_producto()!=null && $lista_productoOrigen->getsituacion_producto()!=0)) {$lista_producto->setsituacion_producto($lista_productoOrigen->getsituacion_producto());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_tipo_producto()!=null && $lista_productoOrigen->getid_tipo_producto()!=-1)) {$lista_producto->setid_tipo_producto($lista_productoOrigen->getid_tipo_producto());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->gettipo_producto_codigo()!=null && $lista_productoOrigen->gettipo_producto_codigo()!='')) {$lista_producto->settipo_producto_codigo($lista_productoOrigen->gettipo_producto_codigo());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_bodega()!=null && $lista_productoOrigen->getid_bodega()!=-1)) {$lista_producto->setid_bodega($lista_productoOrigen->getid_bodega());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getmostrar_componente()!=null && $lista_productoOrigen->getmostrar_componente()!='')) {$lista_producto->setmostrar_componente($lista_productoOrigen->getmostrar_componente());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getfactura_sin_stock()!=null && $lista_productoOrigen->getfactura_sin_stock()!='')) {$lista_producto->setfactura_sin_stock($lista_productoOrigen->getfactura_sin_stock());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getavisa_expiracion()!=null && $lista_productoOrigen->getavisa_expiracion()!='')) {$lista_producto->setavisa_expiracion($lista_productoOrigen->getavisa_expiracion());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getfactura_con_precio()!=null && $lista_productoOrigen->getfactura_con_precio()!=0)) {$lista_producto->setfactura_con_precio($lista_productoOrigen->getfactura_con_precio());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getproducto_equivalente()!=null && $lista_productoOrigen->getproducto_equivalente()!='')) {$lista_producto->setproducto_equivalente($lista_productoOrigen->getproducto_equivalente());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_cuenta_compra()!=null && $lista_productoOrigen->getid_cuenta_compra()!=-1)) {$lista_producto->setid_cuenta_compra($lista_productoOrigen->getid_cuenta_compra());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_cuenta_venta()!=null && $lista_productoOrigen->getid_cuenta_venta()!=-1)) {$lista_producto->setid_cuenta_venta($lista_productoOrigen->getid_cuenta_venta());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_cuenta_inventario()!=null && $lista_productoOrigen->getid_cuenta_inventario()!=-1)) {$lista_producto->setid_cuenta_inventario($lista_productoOrigen->getid_cuenta_inventario());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getcuenta_compra_codigo()!=null && $lista_productoOrigen->getcuenta_compra_codigo()!='')) {$lista_producto->setcuenta_compra_codigo($lista_productoOrigen->getcuenta_compra_codigo());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getcuenta_venta_codigo()!=null && $lista_productoOrigen->getcuenta_venta_codigo()!='')) {$lista_producto->setcuenta_venta_codigo($lista_productoOrigen->getcuenta_venta_codigo());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getcuenta_inventario_codigo()!=null && $lista_productoOrigen->getcuenta_inventario_codigo()!='')) {$lista_producto->setcuenta_inventario_codigo($lista_productoOrigen->getcuenta_inventario_codigo());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_otro_suplidor()!=null && $lista_productoOrigen->getid_otro_suplidor()!=-1)) {$lista_producto->setid_otro_suplidor($lista_productoOrigen->getid_otro_suplidor());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_impuesto()!=null && $lista_productoOrigen->getid_impuesto()!=-1)) {$lista_producto->setid_impuesto($lista_productoOrigen->getid_impuesto());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_impuesto_ventas()!=null && $lista_productoOrigen->getid_impuesto_ventas()!=-1)) {$lista_producto->setid_impuesto_ventas($lista_productoOrigen->getid_impuesto_ventas());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_impuesto_compras()!=null && $lista_productoOrigen->getid_impuesto_compras()!=-1)) {$lista_producto->setid_impuesto_compras($lista_productoOrigen->getid_impuesto_compras());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getimpuesto1_en_ventas()!=null && $lista_productoOrigen->getimpuesto1_en_ventas()!='')) {$lista_producto->setimpuesto1_en_ventas($lista_productoOrigen->getimpuesto1_en_ventas());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getimpuesto1_en_compras()!=null && $lista_productoOrigen->getimpuesto1_en_compras()!='')) {$lista_producto->setimpuesto1_en_compras($lista_productoOrigen->getimpuesto1_en_compras());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getultima_venta()!=null && $lista_productoOrigen->getultima_venta()!=date('Y-m-d'))) {$lista_producto->setultima_venta($lista_productoOrigen->getultima_venta());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_otro_impuesto()!=null && $lista_productoOrigen->getid_otro_impuesto()!=-1)) {$lista_producto->setid_otro_impuesto($lista_productoOrigen->getid_otro_impuesto());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_otro_impuesto_ventas()!=null && $lista_productoOrigen->getid_otro_impuesto_ventas()!=-1)) {$lista_producto->setid_otro_impuesto_ventas($lista_productoOrigen->getid_otro_impuesto_ventas());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_otro_impuesto_compras()!=null && $lista_productoOrigen->getid_otro_impuesto_compras()!=-1)) {$lista_producto->setid_otro_impuesto_compras($lista_productoOrigen->getid_otro_impuesto_compras());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getotro_impuesto_ventas_codigo()!=null && $lista_productoOrigen->getotro_impuesto_ventas_codigo()!='')) {$lista_producto->setotro_impuesto_ventas_codigo($lista_productoOrigen->getotro_impuesto_ventas_codigo());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getotro_impuesto_compras_codigo()!=null && $lista_productoOrigen->getotro_impuesto_compras_codigo()!='')) {$lista_producto->setotro_impuesto_compras_codigo($lista_productoOrigen->getotro_impuesto_compras_codigo());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getprecio_de_compra_0()!=null && $lista_productoOrigen->getprecio_de_compra_0()!=0.0)) {$lista_producto->setprecio_de_compra_0($lista_productoOrigen->getprecio_de_compra_0());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getprecio_actualizado()!=null && $lista_productoOrigen->getprecio_actualizado()!=date('Y-m-d'))) {$lista_producto->setprecio_actualizado($lista_productoOrigen->getprecio_actualizado());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getrequiere_nro_serie()!=null && $lista_productoOrigen->getrequiere_nro_serie()!='')) {$lista_producto->setrequiere_nro_serie($lista_productoOrigen->getrequiere_nro_serie());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getcosto_dolar()!=null && $lista_productoOrigen->getcosto_dolar()!=0.0)) {$lista_producto->setcosto_dolar($lista_productoOrigen->getcosto_dolar());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getcomentario()!=null && $lista_productoOrigen->getcomentario()!='')) {$lista_producto->setcomentario($lista_productoOrigen->getcomentario());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getcomenta_factura()!=null && $lista_productoOrigen->getcomenta_factura()!='')) {$lista_producto->setcomenta_factura($lista_productoOrigen->getcomenta_factura());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_retencion()!=null && $lista_productoOrigen->getid_retencion()!=-1)) {$lista_producto->setid_retencion($lista_productoOrigen->getid_retencion());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_retencion_ventas()!=null && $lista_productoOrigen->getid_retencion_ventas()!=-1)) {$lista_producto->setid_retencion_ventas($lista_productoOrigen->getid_retencion_ventas());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getid_retencion_compras()!=null && $lista_productoOrigen->getid_retencion_compras()!=-1)) {$lista_producto->setid_retencion_compras($lista_productoOrigen->getid_retencion_compras());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getretencion_ventas_codigo()!=null && $lista_productoOrigen->getretencion_ventas_codigo()!='')) {$lista_producto->setretencion_ventas_codigo($lista_productoOrigen->getretencion_ventas_codigo());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getretencion_compras_codigo()!=null && $lista_productoOrigen->getretencion_compras_codigo()!='')) {$lista_producto->setretencion_compras_codigo($lista_productoOrigen->getretencion_compras_codigo());}
			if($conDefault || ($conDefault==false && $lista_productoOrigen->getnotas()!=null && $lista_productoOrigen->getnotas()!='')) {$lista_producto->setnotas($lista_productoOrigen->getnotas());}
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function getsSeleccionados(int $maxima_fila) : array {
		$lista_productosSeleccionados=array();
		$checkbox_id=0;
		$indice=0;
		
		for($i=1;$i<=$maxima_fila;$i++) {
			$indice=$i-1;
			
			$checkbox_id = $this->getDataCheckBoxId($i);
			
			/*SI EXISTE, SE HA HECHO CLIC EN ESA FILA*/
			if($checkbox_id!=null) { /* && ($checkbox_id=='on' || $checkbox_id==true || $checkbox_id==1)) {*/
				$lista_productosSeleccionados[]=$this->lista_productos[$indice];
			}
		}
		
		return $lista_productosSeleccionados;
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
		$lista_producto= new lista_producto();
		
		foreach($this->lista_productoLogic->getlista_productos() as $lista_producto) {
			
		}		
		
		if($lista_producto!=null);
	}
	
	public function cargarRelaciones(array $lista_productos=array()) : array {	
		
		$lista_productosRespaldo = array();
		$lista_productosLocal = array();
		
		lista_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
		/*FK INCLUDE FROM CLASES RELACIONADAS*/
			
		
			
		/*FK INCLUDE FROM CLASES RELACIONADAS_FIN*/
			
		$lista_productosResp=array();
		$classes=array();
			
		
			
			
		$lista_productosRespaldo=$this->lista_productoLogic->getlista_productos();
			
		$this->lista_productoLogic->setIsConDeep(true);
		
		$this->lista_productoLogic->setlista_productos($lista_productos);
			
		$this->lista_productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
			
		$lista_productosLocal=$this->lista_productoLogic->getlista_productos();
			
		/*RESPALDO*/
		$this->lista_productoLogic->setlista_productos($lista_productosRespaldo);
			
		$this->lista_productoLogic->setIsConDeep(false);
		
		if($lista_productosResp!=null);
		
		return $lista_productosLocal;
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
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
					
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function setUrlPaginaVariables(lista_producto_session $lista_producto_session) {
		$lista_producto_session->strTypeOnLoad=$this->strTypeOnLoadlista_producto;
		$lista_producto_session->strTipoPaginaAuxiliar=$this->strTipoPaginaAuxiliarlista_producto;
		$lista_producto_session->strTipoUsuarioAuxiliar=$this->strTipoUsuarioAuxiliarlista_producto;
		$lista_producto_session->bitEsPopup=$this->bitEsPopup;
		$lista_producto_session->bitEsBusqueda=$this->bitEsBusqueda;
		$lista_producto_session->strFuncionJs=$this->strFuncionJs;
		/*$lista_producto_session->strSufijo=$this->strSufijo;*/
		$lista_producto_session->bitEsRelaciones=$this->bitEsRelaciones;
		$lista_producto_session->bitEsRelacionado=$this->bitEsRelacionado;
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
			$perfilOpcionUsuario=$this->sistemaLogicAdditional->traerPermisosPaginaWebPerfilOpcion($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, lista_producto_util::$STR_NOMBRE_CLASE,0,false,false);				
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
		$lista_productoViewAdditional=new lista_productoView_add();
		$lista_productoViewAdditional->lista_productos=$this->lista_productos;
		$lista_productoViewAdditional->Session=$this->Session;
		
		return $lista_productoViewAdditional->getHtmlTablaDatos(false);
		*/
	}
	
	public function getHtmlTablaDatos(bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$lista_productosLocal=array();
		$proceso_print='';
		
		if(!$this->bitEsRelaciones) {
			$this->strPermisoRelaciones='table-cell';
			
		} else {
			$this->strPermisoRelaciones='none';
		}
		
		
		if(!$paraReporte) {
			$lista_productosLocal=$this->lista_productos;
		
		} else {
			$maxima_fila=$this->getDataMaximaFila();
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$lista_productosLocal=$this->getsSeleccionados($maxima_fila);
				
				if(count($lista_productosLocal)<=0) {
					$lista_productosLocal=$this->lista_productos;
				}
			} else {
				$lista_productosLocal=$this->lista_productos;
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarlista_productosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarlista_productosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*
		$lista_productoLogic=new lista_producto_logic();
		$lista_productoLogic->setlista_productos($this->lista_productos);
		*/
		
		
		/*
		//PARA JQUERY
		$this->Session->start();
		*/
		
		
		 
			
		
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('unidad_compra');$classes[]=$class;
			$class=new Classe('unidad_venta');$classes[]=$class;
			$class=new Classe('categoria_producto');$classes[]=$class;
			$class=new Classe('sub_categoria_producto');$classes[]=$class;
			$class=new Classe('tipo_producto');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('cuenta_compra');$classes[]=$class;
			$class=new Classe('cuenta_venta');$classes[]=$class;
			$class=new Classe('cuenta_inventario');$classes[]=$class;
			$class=new Classe('otro_suplidor');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('impuesto_ventas');$classes[]=$class;
			$class=new Classe('impuesto_compras');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
			$class=new Classe('otro_impuesto_ventas');$classes[]=$class;
			$class=new Classe('otro_impuesto_compras');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
			$class=new Classe('retencion_ventas');$classes[]=$class;
			$class=new Classe('retencion_compras');$classes[]=$class;
		
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$lista_productoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->lista_productos=$lista_productoLogic->getlista_productos();
		*/
		
		
		//PARA TEMPLATE JS
		
		$this->lista_productosLocal=$this->lista_productos;	
		$this->CSS_CLASS_TABLE=Constantes::$CSS_CLASS_TABLE;
		$this->IS_DEVELOPING=Constantes::$IS_DEVELOPING;
		$this->PATH_IMAGEN=Constantes::$PATH_IMAGEN;
		$this->STR_TIPO_TABLA=Constantes::$STR_TIPO_TABLA;			
		$this->paraReporte=$paraReporte;
			
		$this->STR_PREFIJO_TABLE=lista_producto_util::$STR_PREFIJO_TABLE;
		$this->STR_TABLE_NAME=lista_producto_util::$STR_TABLE_NAME;		
			
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
			
			$lista_productos = $this->lista_productos;		
			$strSufijo = $this->strSufijo;
			$bitEsBusqueda = $this->bitEsBusqueda;
			$bitEsRelaciones = $this->bitEsRelaciones;
			$bitEsRelacionado = $this->bitEsRelacionado;
			$bitConUiMinimo = $this->bitConUiMinimo;
			
			$STR_PREFIJO_TABLE = lista_producto_util::$STR_PREFIJO_TABLE;
			$STR_TABLE_NAME = lista_producto_util::$STR_TABLE_NAME;
			
			
			
			$path_html_template='com/bydan/contabilidad/inventario/presentation/templating/lista_producto_datos_editar_template.php';
			
			$template = new Template($path_html_template);
			
			$template->funciones=$funciones;
			
			$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
			$template->IS_DEVELOPING=$IS_DEVELOPING;
			$template->PATH_IMAGEN=$PATH_IMAGEN;
			$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
			
			$template->lista_productos=$lista_productos;
			$template->paraReporte=$paraReporte;
			$template->strSufijo=$strSufijo;
			$template->bitEsBusqueda=$bitEsBusqueda;
			$template->bitEsRelaciones=$bitEsRelaciones;
			$template->bitEsRelacionado=$bitEsRelacionado;
			$template->bitConUiMinimo=$bitConUiMinimo;
			
			$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
			$template->STR_TABLE_NAME=$STR_TABLE_NAME;
			
			
			$template->lista_productosLocal=$lista_productosLocal;
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
		
		$lista_productosLocal=array();
		
		$lista_productosLocal=$this->lista_productos;
				
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
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarlista_productosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarlista_productosAjaxWebPart\').style.overflow=\'auto\';';
		}
		
		/*$lista_productoLogic=new lista_producto_logic();
		$lista_productoLogic->setlista_productos($this->lista_productos);*/
		
		/*//PARA JQUERY
		$this->Session->start();*/
		
		 
			
		
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('unidad_compra');$classes[]=$class;
			$class=new Classe('unidad_venta');$classes[]=$class;
			$class=new Classe('categoria_producto');$classes[]=$class;
			$class=new Classe('sub_categoria_producto');$classes[]=$class;
			$class=new Classe('tipo_producto');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('cuenta_compra');$classes[]=$class;
			$class=new Classe('cuenta_venta');$classes[]=$class;
			$class=new Classe('cuenta_inventario');$classes[]=$class;
			$class=new Classe('otro_suplidor');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('impuesto_ventas');$classes[]=$class;
			$class=new Classe('impuesto_compras');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
			$class=new Classe('otro_impuesto_ventas');$classes[]=$class;
			$class=new Classe('otro_impuesto_compras');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
			$class=new Classe('retencion_ventas');$classes[]=$class;
			$class=new Classe('retencion_compras');$classes[]=$class;
		
		/*
				//NO AQUI CON NUEVA CONEXION, LO HACE LENTO
				$lista_productoLogic->deepLoadsWithConnection(false,DeepLoadType::$INCLUDE, $classes,'');
			
		$this->lista_productos=$lista_productoLogic->getlista_productos();
		*/
		
		
		//TEMPLATING
		$funciones = new FuncionesObject();
		
		$funciones->arrOrderBy = $this->arrOrderBy;
		$funciones->bitParaReporteOrderBy = $this->bitParaReporteOrderBy;
		
		$CSS_CLASS_TABLE = Constantes::$CSS_CLASS_TABLE;
		$IS_DEVELOPING = Constantes::$IS_DEVELOPING;
		$PATH_IMAGEN = Constantes::$PATH_IMAGEN;
		$STR_TIPO_TABLA = Constantes::$STR_TIPO_TABLA;
		
		$lista_productos = $this->lista_productos;		
		$strSufijo = $this->strSufijo;
		$bitEsBusqueda = $this->bitEsBusqueda;
		$bitEsRelaciones = $this->bitEsRelaciones;
		$bitEsRelacionado = $this->bitEsRelacionado;
		
		$STR_PREFIJO_TABLE = lista_producto_util::$STR_PREFIJO_TABLE;
		$STR_TABLE_NAME = lista_producto_util::$STR_TABLE_NAME;
		
		
		
		$path_html_template='com/bydan/contabilidad/inventario/presentation/templating/lista_producto_datos_busqueda_template.php';
		
		$template = new Template($path_html_template);
		
		$template->funciones=$funciones;
		
		$template->CSS_CLASS_TABLE=$CSS_CLASS_TABLE;
		$template->IS_DEVELOPING=$IS_DEVELOPING;
		$template->PATH_IMAGEN=$PATH_IMAGEN;
		$template->STR_TIPO_TABLA=$STR_TIPO_TABLA;
		
		$template->lista_productos=$lista_productos;
		$template->paraReporte=$paraReporte;
		$template->strSufijo=$strSufijo;
		$template->bitEsBusqueda=$bitEsBusqueda;
		$template->bitEsRelaciones=$bitEsRelaciones;
		$template->bitEsRelacionado=$bitEsRelacionado;
		
		$template->STR_PREFIJO_TABLE=$STR_PREFIJO_TABLE;
		$template->STR_TABLE_NAME=$STR_TABLE_NAME;
		
		
		$template->lista_productosLocal=$lista_productosLocal;
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
	
	public function getHtmlTablaDatosResumen(array $lista_productos=array(),bool $paraReporte=false) : string {	
		$htmlTablaLocal='';
		$proceso_print='';
		
		
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';
		
		$this->lista_productosReporte = $lista_productos;		
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
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarlista_productosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarlista_productosAjaxWebPart\').style.overflow=\'auto\';';
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
	
	public function getHtmlTablaDatosRelaciones(array $lista_productos=array(),bool $paraReporte=false) : string {	
		
		$htmlTablaLocal='';
		
	
		$borderValue=1;
		$rowSpanValue=2;
		$blnTieneCampo=false;
		$rowSpanTiene='base';		
		$proceso_print='';
		
		$this->lista_productosReporte = $lista_productos;		
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
		
		
		$this->lista_productosReporte=$this->cargarRelaciones($lista_productos);
		
		$strAuxColumnRowSpan=trim($strAuxColumnRowSpan);
		$strAuxStyleBackgroundDerecha=trim($strAuxStyleBackgroundDerecha);
		$strAuxStyleBackgroundContenidoDetalle=trim($strAuxStyleBackgroundContenidoDetalle);
		$rowSpanTiene=trim($rowSpanTiene);
		
		
		if($paraReporte) {
			
			$proceso_print='document.getElementById(\'divTablaDatosAuxiliarlista_productosAjaxWebPart\').style.overflow=\'visible\';';
			$proceso_print.='window.print();';
			$proceso_print.='document.getElementById(\'divTablaDatosAuxiliarlista_productosAjaxWebPart\').style.overflow=\'auto\';';			
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
	
	public function getHtmlTablaAccionesRelaciones(lista_producto $lista_producto=null) : string {	
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
			
			
			$lista_productosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$lista_productosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($lista_productosLocal)<=0) {
					/*//DEBE ESCOGER
					$lista_productosLocal=$this->lista_productos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$lista_productosLocal=$this->lista_productos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($lista_productosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosResumen($lista_productosLocal,true);
			
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
				$this->lista_productoLogic->getNewConnexionToDeep();
			}
					
			$lista_productosLocal=array();
		
			$maxima_fila=$this->getDataMaximaFila();
				
			if($maxima_fila!=null && $maxima_fila>0) {
				$lista_productosLocal=$this->getsSeleccionados($maxima_fila);
					
				if(count($lista_productosLocal)<=0) {
					/*//DEBE ESCOGER
					$lista_productosLocal=$this->lista_productos;*/
				}
			} else {
				/*//DEBE ESCOGER
				$lista_productosLocal=$this->lista_productos;*/
			}
						
			/*$this->strAuxiliarHtmlReturn1=$this->getHtmlTablaDatosResumen($lista_productosLocal,true);*/
			
			
			
			/*PARA COLUMNAS DINAMICAS*/
			$orderByQueryAux=Funciones::getCargarOrderByQuery($this->arrOrderBy,$this->data,'REPORTE');
			$orderByQueryAux=trim($orderByQueryAux);
			
			$this->bitParaReporteOrderBy=false;
			$checkbox_parareporte=null;
				
			$this->getDataParaReporteOrderBy();
			
			/*PARA COLUMNAS DINAMICAS*/
									
			$this->htmlTablaReporteAuxiliars=$this->getHtmlTablaDatosRelaciones($lista_productosLocal,true);
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//ESTO LLENA TODO HTML DATOS
			//$this->returnHtml(true);			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
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
			$subtitulo='Reporte de  Lista Productoses';
			
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
			$fileName='lista_producto';
			
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
			
			$title='Reporte de  Lista Productoses';
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
			
			$title='Reporte de  Lista Productoses';
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
				$this->lista_productoLogic->getNewConnexionToDeep();
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
			
			$title='Reporte de  Lista Productoses';
			$tipo=$strTipoReporte;
			
			$excel_helper->generate($header,$data, $title,$tipo,'webroot');
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->commitNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
					
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->lista_productoLogic->rollbackNewConnexionToDeep();
				$this->lista_productoLogic->closeNewConnexionToDeep();
			}
					
			throw $e;
		}
    } 
	
	public function getHeadersReport(string $tipo='NORMAL') {				
		$header=array();
		/*$cellReport=new CellReport();*/					
			
		$header=lista_producto_util::getHeaderReportRow('NORMAL',$this->arrOrderBy,$this->bitParaReporteOrderBy);
		
		
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
		$this->lista_productosAuxiliar=null;
		$i=0;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->lista_productosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->lista_productosAuxiliar)<=0) {
					$this->lista_productosAuxiliar=$this->lista_productos;
				}
			} else {
				$this->lista_productosAuxiliar=$this->lista_productos;
			}
		/*} else {
			$this->lista_productosAuxiliar=$this->lista_productosReporte;	
		}*/
		
		if(!$paraRelaciones) {
			foreach ($this->lista_productosAuxiliar as $lista_producto) {
				$row=array();
				
				$row=lista_producto_util::getDataReportRow($tipo,$lista_producto,$this->arrOrderBy,$this->bitParaReporteOrderBy);
				
				
				$data[]=$row;			
			}
			
		} else {
			
			//RESPALDO
			/*
			lista_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);
			
			//FK INCLUDE FROM CLASES RELACIONADAS
			
			
			
			//FK INCLUDE FROM CLASES RELACIONADAS_FIN
			
			$lista_productosResp=array();
			$classes=array();
			
			
			
			
			$lista_productosResp=$this->lista_productoLogic->getlista_productos();
			
			$this->lista_productoLogic->setIsConDeep(true);
			
			$this->lista_productoLogic->setlista_productos($this->lista_productosAuxiliar);
			
			$this->lista_productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');
			
			$this->lista_productosAuxiliar=$this->lista_productoLogic->getlista_productos();
			
			//RESPALDO
			$this->lista_productoLogic->setlista_productos($lista_productosResp);
			
			$this->lista_productoLogic->setIsConDeep(false);
			*/
			
			$this->lista_productosAuxiliar=$this->cargarRelaciones($this->lista_productosAuxiliar);
			
			$i=0;
			
			foreach ($this->lista_productosAuxiliar as $lista_producto) {
				$row=array();
				
				if($i!=0) {
					$row=lista_producto_util::getHeaderReportRow('RELACIONADO',$this->arrOrderBy,$this->bitParaReporteOrderBy);								
					$data[]=$row;
				}
				
				$row=lista_producto_util::getDataReportRow($tipo,$lista_producto,$this->arrOrderBy,$this->bitParaReporteOrderBy);								
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
		$this->lista_productosAuxiliar=null;
		
		/*if($this->strTipoPaginacion!='TODOS') {*/
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->lista_productosAuxiliar=$this->getsSeleccionados($maxima_fila);
				
				if(count($this->lista_productosAuxiliar)<=0) {
					$this->lista_productosAuxiliar=$this->lista_productos;
				}
			} else {
				$this->lista_productosAuxiliar=$this->lista_productos;
			}
		/*} else {
			$this->lista_productosAuxiliar=$this->lista_productosReporte;	
		}*/
		
		foreach ($this->lista_productosAuxiliar as $lista_producto) {
			/*$row=array();*/
			
			$row=array();
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(lista_producto_util::getlista_productoDescripcion($lista_producto),100,6,1);$cellReport->setblnEsTituloGrupo(true); $row[]=$cellReport;
			$data[]=$row;
			
			

			if(Funciones::existeCadenaArrayOrderBy('Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_productoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcodigo_producto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Descripcion Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descripcion Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getdescripcion_producto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Precio1',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio1',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio1(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Precio2',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio2',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio2(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Precio3',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio3',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio3(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Precio4',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio4',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio4(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Costo',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Costo',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcosto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Unidad Compra',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Unidad Compra',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_unidad_compraDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Unidad En Compra',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Unidad En Compra',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getunidad_en_compra(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Compra',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Equivalencia En Compra',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getequivalencia_en_compra(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Unidad Venta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Unidad Venta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_unidad_ventaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Unidad En Venta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Unidad En Venta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getunidad_en_venta(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Equivalencia En Venta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Equivalencia En Venta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getequivalencia_en_venta(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cantidad Total',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad Total',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcantidad_total(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cantidad Minima',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad Minima',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcantidad_minima(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Categoria Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Categoria Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_categoria_productoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Sub Categoria Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Categoria Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_sub_categoria_productoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Acepta Lote',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Acepta Lote',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getacepta_lote(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Valor Inventario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Valor Inventario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getvalor_inventario(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Imagen',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getimagen(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento1',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento1',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getincremento1(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento2',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento2',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getincremento2(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento3',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento3',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getincremento3(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Incremento4',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento4',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getincremento4(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Codigo Fabricante',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo Fabricante',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcodigo_fabricante(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Producto Fisico',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto Fisico',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getproducto_fisico(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Situacion Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Situacion Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getsituacion_producto(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Tipo Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Tipo Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_tipo_productoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Tipo Producto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tipo Producto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->gettipo_producto_codigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Bodega',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Bodega',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_bodegaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Mostrar Componente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Componente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getmostrar_componente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Factura Sin Stock',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Factura Sin Stock',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getfactura_sin_stock(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Avisa Expiracion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Avisa Expiracion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getavisa_expiracion(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Factura Con Precio',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Factura Con Precio',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getfactura_con_precio(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Producto Equivalente',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto Equivalente',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getproducto_equivalente(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta Compra',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Compra',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_cuenta_compraDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta Venta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Venta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_cuenta_ventaDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Cuenta Inventario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Cuenta Inventario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_cuenta_inventarioDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Compra',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Compra',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcuenta_compra_codigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Venta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Venta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcuenta_venta_codigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Cuenta Inventario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cuenta Inventario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcuenta_inventario_codigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Otro Suplidor',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Suplidor',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_otro_suplidorDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_impuestoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Impuesto Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Impuesto Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_impuesto_ventasDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Impuesto Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Impuesto Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_impuesto_comprasDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto1 En Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto1 En Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getimpuesto1_en_ventas(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Impuesto1 En Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto1 En Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getimpuesto1_en_compras(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Ultima Venta',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ultima Venta',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getultima_venta(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_otro_impuestoDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Otro Impuesto Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Otro Impuesto Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_otro_impuesto_ventasDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Otro Impuesto Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Otro Impuesto Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_otro_impuesto_comprasDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getotro_impuesto_ventas_codigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Otro Impuesto Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Otro Impuesto Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getotro_impuesto_compras_codigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Precio De Compra 0',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio De Compra 0',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio_de_compra_0(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Precio Actualizado',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio Actualizado',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getprecio_actualizado(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Requiere Nro Serie',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Requiere Nro Serie',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getrequiere_nro_serie(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Costo Dolar',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Costo Dolar',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcosto_dolar(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Comentario',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comentario',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcomentario(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Comenta Factura',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Comenta Factura',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getcomenta_factura(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Retencion',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_retencionDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Retencion Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_retencion_ventasDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy(' Retencion Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Retencion Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getid_retencion_comprasDescription(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Retencion Ventas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion Ventas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getretencion_ventas_codigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Retencion Compras',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Retencion Compras',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getretencion_compras_codigo(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}

			if(Funciones::existeCadenaArrayOrderBy('Notas',$this->arrOrderBy,$this->bitParaReporteOrderBy)){
				$row=array();
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Notas',100,6,1); $row[]=$cellReport;
				$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($lista_producto->getnotas(),100,6,1); $row[]=$cellReport;
				$data[]=$row;
			}
	   		
			/*$data[]=$row;*/		
		}
		
		return $data;
	}
	
	/*
		interface lista_producto_base_controlI {			
		
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
		public function getIndiceActual(lista_producto $lista_producto,int $iIndiceActual) : int;		
		public function cancelar();		
		public function ejecutarMantenimiento(string $maintenanceType);		
		public function eliminarTabla(int $id = null);		
		public function eliminarTablaBase(int $id = null);		
		public function actualizarLista(lista_producto $lista_producto,array $lista_productos);		
		public function getListaActual() : array;
		
		public function seleccionarActualDesdeLista(int $id = null);		
		public function seleccionarActualAuxiliar(int $id = null);		
		public function setSeleccionars(int $maxima_fila);		
		public function recargarForm(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla) : lista_producto_param_return;
		
		public function procesarAccionJson(bool $return_json,string $action);		
		public function manejarEventos(string $sTipoControl,string $sTipoEvento);		
		public function procesarPostAccion(string $sTipoControl,string $sTipoAccion);		
		public function procesarPostAccionGeneral(string $sTipo,string $sDominio,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipoGeneral,array $classes,bool $conIrServidorAplicacion,bool $esControlTabla);		
		public function generarEvento(string $evento_global,string $control_tipo,string $evento_tipo,string $evento_subtipo,string $control,array $lista_productos,lista_producto $lista_producto);		
		public function mostrarEjecutarAccionesRelaciones(int $id = null);		
		public function cargarParametrosTabla();
		
		//---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------
		
		public function actualizarControllerConReturnGeneral(lista_producto_param_return $lista_productoReturnGeneral);		
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
		
		public function actualizarDesdeSessionDivStyleVariables(lista_producto_session $lista_producto_session);		
		public function actualizarInvitadoSessionDivStyleVariables(lista_producto_session $lista_producto_session);
		
		public function saveGetSessionControllerAndPageAuxiliar(bool $bitSaveSession);		
		public function saveGetSessionPageAuxiliar(bool $bitSaveSession);
		
		public function setCopiarVariablesObjetos(lista_producto $lista_productoOrigen,lista_producto $lista_producto,bool $conDefault,bool $conColumnasBase,bool $conColumnaVersion=false);		
		public function actualizarDesdeSession(lista_producto_control $lista_producto_control_session);		
		public function getsSeleccionados(int $maxima_fila) : array;		
		public function getIdsFksSeleccionados(int $maxima_fila) : array;
		
		public function quitarRelaciones();		
		public function cargarRelaciones(array $lista_productos=array()) : array;		
		public function quitarRelacionesReporte();		
		public function setUrlPaginaVariables(lista_producto_session $lista_producto_session);		
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
		public function getHtmlTablaDatosResumen(array $lista_productos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaDatosRelaciones(array $lista_productos=array(),bool $paraReporte=false) : string;		
		public function getHtmlTablaAccionesRelaciones(lista_producto $lista_producto=null) : string;
		
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
