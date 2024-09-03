<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\control;

use com\bydan\contabilidad\inventario\bodega\presentation\control\bodega_control;
use com\bydan\contabilidad\inventario\categoria_producto\presentation\control\categoria_producto_control;
use com\bydan\contabilidad\inventario\costo_producto\presentation\control\costo_producto_control;
use com\bydan\contabilidad\inventario\cotizacion\presentation\control\cotizacion_control;
use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\control\cotizacion_detalle_control;
use com\bydan\contabilidad\inventario\devolucion\presentation\control\devolucion_control;
use com\bydan\contabilidad\inventario\devolucion_detalle\presentation\control\devolucion_detalle_control;
use com\bydan\contabilidad\inventario\imagen_cotizacion\presentation\control\imagen_cotizacion_control;
use com\bydan\contabilidad\inventario\imagen_devolucion\presentation\control\imagen_devolucion_control;
use com\bydan\contabilidad\inventario\imagen_devolucion_cliente\presentation\control\imagen_devolucion_cliente_control;
use com\bydan\contabilidad\inventario\imagen_kardex\presentation\control\imagen_kardex_control;
use com\bydan\contabilidad\inventario\imagen_orden_compra\presentation\control\imagen_orden_compra_control;
use com\bydan\contabilidad\inventario\imagen_producto\presentation\control\imagen_producto_control;
use com\bydan\contabilidad\inventario\inventario_fisico\presentation\control\inventario_fisico_control;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\control\inventario_fisico_detalle_control;
use com\bydan\contabilidad\inventario\kardex\presentation\control\kardex_control;
use com\bydan\contabilidad\inventario\kardex_detalle\presentation\control\kardex_detalle_control;
use com\bydan\contabilidad\inventario\kit_producto\presentation\control\kit_producto_control;
use com\bydan\contabilidad\inventario\lista_cliente\presentation\control\lista_cliente_control;
use com\bydan\contabilidad\inventario\lista_precio\presentation\control\lista_precio_control;
use com\bydan\contabilidad\inventario\lista_producto\presentation\control\lista_producto_control;
use com\bydan\contabilidad\inventario\lote_producto\presentation\control\lote_producto_control;
use com\bydan\contabilidad\inventario\orden_compra\presentation\control\orden_compra_control;
use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\control\orden_compra_detalle_control;
use com\bydan\contabilidad\inventario\otro_suplidor\presentation\control\otro_suplidor_control;
use com\bydan\contabilidad\inventario\parametro_inventario\presentation\control\parametro_inventario_control;
use com\bydan\contabilidad\inventario\precio_producto\presentation\control\precio_producto_control;
use com\bydan\contabilidad\inventario\producto\presentation\control\producto_control;
use com\bydan\contabilidad\inventario\producto_bodega\presentation\control\producto_bodega_control;
use com\bydan\contabilidad\inventario\producto_equivalente\presentation\control\producto_equivalente_control;
use com\bydan\contabilidad\inventario\serial_producto\presentation\control\serial_producto_control;
use com\bydan\contabilidad\inventario\sub_categoria_producto\presentation\control\sub_categoria_producto_control;
use com\bydan\contabilidad\inventario\tipo_kardex\presentation\control\tipo_kardex_control;
use com\bydan\contabilidad\inventario\tipo_precio\presentation\control\tipo_precio_control;
use com\bydan\contabilidad\inventario\tipo_producto\presentation\control\tipo_producto_control;
use com\bydan\contabilidad\inventario\unidad\presentation\control\unidad_control;
		
		

class InventarioGlobalController {
	
    public static function CargarEjecutarController(string $controller,string $sub_modulo='',mixed $post1) {
		
		if($sub_modulo==null || $sub_modulo=='') {

			if($controller=='bodega') {  
			//include_once('com/bydan/contabilidad/inventario/bodega/presentation/control/bodega_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/bodega_control;

			$bodega_control=new bodega_control();
			$bodega_control->inicializarParametrosQueryString($post1);
			$bodega_control->ejecutarParametrosQueryString();
		}
		else if($controller=='categoria_producto') {  
			//include_once('com/bydan/contabilidad/inventario/categoria_producto/presentation/control/categoria_producto_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/categoria_producto_control;

			$categoria_producto_control=new categoria_producto_control();
			$categoria_producto_control->inicializarParametrosQueryString($post1);
			$categoria_producto_control->ejecutarParametrosQueryString();
		}
		else if($controller=='costo_producto') {  
			//include_once('com/bydan/contabilidad/inventario/costo_producto/presentation/control/costo_producto_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/costo_producto_control;

			$costo_producto_control=new costo_producto_control();
			$costo_producto_control->inicializarParametrosQueryString($post1);
			$costo_producto_control->ejecutarParametrosQueryString();
		}
		else if($controller=='cotizacion') {  
			//include_once('com/bydan/contabilidad/inventario/cotizacion/presentation/control/cotizacion_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/cotizacion_control;

			$cotizacion_control=new cotizacion_control();
			$cotizacion_control->inicializarParametrosQueryString($post1);
			$cotizacion_control->ejecutarParametrosQueryString();
		}
		else if($controller=='cotizacion_detalle') {  
			//include_once('com/bydan/contabilidad/inventario/cotizacion_detalle/presentation/control/cotizacion_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/cotizacion_detalle_control;

			$cotizacion_detalle_control=new cotizacion_detalle_control();
			$cotizacion_detalle_control->inicializarParametrosQueryString($post1);
			$cotizacion_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controller=='devolucion') {  
			//include_once('com/bydan/contabilidad/inventario/devolucion/presentation/control/devolucion_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/devolucion_control;

			$devolucion_control=new devolucion_control();
			$devolucion_control->inicializarParametrosQueryString($post1);
			$devolucion_control->ejecutarParametrosQueryString();
		}
		else if($controller=='devolucion_detalle') {  
			//include_once('com/bydan/contabilidad/inventario/devolucion_detalle/presentation/control/devolucion_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/devolucion_detalle_control;

			$devolucion_detalle_control=new devolucion_detalle_control();
			$devolucion_detalle_control->inicializarParametrosQueryString($post1);
			$devolucion_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controller=='imagen_cotizacion') {  
			//include_once('com/bydan/contabilidad/inventario/imagen_cotizacion/presentation/control/imagen_cotizacion_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/imagen_cotizacion_control;

			$imagen_cotizacion_control=new imagen_cotizacion_control();
			$imagen_cotizacion_control->inicializarParametrosQueryString($post1);
			$imagen_cotizacion_control->ejecutarParametrosQueryString();
		}
		else if($controller=='imagen_devolucion') {  
			//include_once('com/bydan/contabilidad/inventario/imagen_devolucion/presentation/control/imagen_devolucion_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/imagen_devolucion_control;

			$imagen_devolucion_control=new imagen_devolucion_control();
			$imagen_devolucion_control->inicializarParametrosQueryString($post1);
			$imagen_devolucion_control->ejecutarParametrosQueryString();
		}
		else if($controller=='imagen_devolucion_cliente') {  
			//include_once('com/bydan/contabilidad/inventario/imagen_devolucion_cliente/presentation/control/imagen_devolucion_cliente_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/imagen_devolucion_cliente_control;

			$imagen_devolucion_cliente_control=new imagen_devolucion_cliente_control();
			$imagen_devolucion_cliente_control->inicializarParametrosQueryString($post1);
			$imagen_devolucion_cliente_control->ejecutarParametrosQueryString();
		}
		else if($controller=='imagen_kardex') {  
			//include_once('com/bydan/contabilidad/inventario/imagen_kardex/presentation/control/imagen_kardex_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/imagen_kardex_control;

			$imagen_kardex_control=new imagen_kardex_control();
			$imagen_kardex_control->inicializarParametrosQueryString($post1);
			$imagen_kardex_control->ejecutarParametrosQueryString();
		}
		else if($controller=='imagen_orden_compra') {  
			//include_once('com/bydan/contabilidad/inventario/imagen_orden_compra/presentation/control/imagen_orden_compra_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/imagen_orden_compra_control;

			$imagen_orden_compra_control=new imagen_orden_compra_control();
			$imagen_orden_compra_control->inicializarParametrosQueryString($post1);
			$imagen_orden_compra_control->ejecutarParametrosQueryString();
		}
		else if($controller=='imagen_producto') {  
			//include_once('com/bydan/contabilidad/inventario/imagen_producto/presentation/control/imagen_producto_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/imagen_producto_control;

			$imagen_producto_control=new imagen_producto_control();
			$imagen_producto_control->inicializarParametrosQueryString($post1);
			$imagen_producto_control->ejecutarParametrosQueryString();
		}
		else if($controller=='inventario_fisico') {  
			//include_once('com/bydan/contabilidad/inventario/inventario_fisico/presentation/control/inventario_fisico_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/inventario_fisico_control;

			$inventario_fisico_control=new inventario_fisico_control();
			$inventario_fisico_control->inicializarParametrosQueryString($post1);
			$inventario_fisico_control->ejecutarParametrosQueryString();
		}
		else if($controller=='inventario_fisico_detalle') {  
			//include_once('com/bydan/contabilidad/inventario/inventario_fisico_detalle/presentation/control/inventario_fisico_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/inventario_fisico_detalle_control;

			$inventario_fisico_detalle_control=new inventario_fisico_detalle_control();
			$inventario_fisico_detalle_control->inicializarParametrosQueryString($post1);
			$inventario_fisico_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controller=='kardex') {  
			//include_once('com/bydan/contabilidad/inventario/kardex/presentation/control/kardex_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/kardex_control;

			$kardex_control=new kardex_control();
			$kardex_control->inicializarParametrosQueryString($post1);
			$kardex_control->ejecutarParametrosQueryString();
		}
		else if($controller=='kardex_detalle') {  
			//include_once('com/bydan/contabilidad/inventario/kardex_detalle/presentation/control/kardex_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/kardex_detalle_control;

			$kardex_detalle_control=new kardex_detalle_control();
			$kardex_detalle_control->inicializarParametrosQueryString($post1);
			$kardex_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controller=='kit_producto') {  
			//include_once('com/bydan/contabilidad/inventario/kit_producto/presentation/control/kit_producto_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/kit_producto_control;

			$kit_producto_control=new kit_producto_control();
			$kit_producto_control->inicializarParametrosQueryString($post1);
			$kit_producto_control->ejecutarParametrosQueryString();
		}
		else if($controller=='lista_cliente') {  
			//include_once('com/bydan/contabilidad/inventario/lista_cliente/presentation/control/lista_cliente_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/lista_cliente_control;

			$lista_cliente_control=new lista_cliente_control();
			$lista_cliente_control->inicializarParametrosQueryString($post1);
			$lista_cliente_control->ejecutarParametrosQueryString();
		}
		else if($controller=='lista_precio') {  
			//include_once('com/bydan/contabilidad/inventario/lista_precio/presentation/control/lista_precio_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/lista_precio_control;

			$lista_precio_control=new lista_precio_control();
			$lista_precio_control->inicializarParametrosQueryString($post1);
			$lista_precio_control->ejecutarParametrosQueryString();
		}
		else if($controller=='lista_producto') {  
			//include_once('com/bydan/contabilidad/inventario/lista_producto/presentation/control/lista_producto_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/lista_producto_control;

			$lista_producto_control=new lista_producto_control();
			$lista_producto_control->inicializarParametrosQueryString($post1);
			$lista_producto_control->ejecutarParametrosQueryString();
		}
		else if($controller=='lote_producto') {  
			//include_once('com/bydan/contabilidad/inventario/lote_producto/presentation/control/lote_producto_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/lote_producto_control;

			$lote_producto_control=new lote_producto_control();
			$lote_producto_control->inicializarParametrosQueryString($post1);
			$lote_producto_control->ejecutarParametrosQueryString();
		}
		else if($controller=='orden_compra') {  
			//include_once('com/bydan/contabilidad/inventario/orden_compra/presentation/control/orden_compra_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/orden_compra_control;

			$orden_compra_control=new orden_compra_control();
			$orden_compra_control->inicializarParametrosQueryString($post1);
			$orden_compra_control->ejecutarParametrosQueryString();
		}
		else if($controller=='orden_compra_detalle') {  
			//include_once('com/bydan/contabilidad/inventario/orden_compra_detalle/presentation/control/orden_compra_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/orden_compra_detalle_control;

			$orden_compra_detalle_control=new orden_compra_detalle_control();
			$orden_compra_detalle_control->inicializarParametrosQueryString($post1);
			$orden_compra_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controller=='otro_suplidor') {  
			//include_once('com/bydan/contabilidad/inventario/otro_suplidor/presentation/control/otro_suplidor_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/otro_suplidor_control;

			$otro_suplidor_control=new otro_suplidor_control();
			$otro_suplidor_control->inicializarParametrosQueryString($post1);
			$otro_suplidor_control->ejecutarParametrosQueryString();
		}
		else if($controller=='parametro_inventario') {  
			//include_once('com/bydan/contabilidad/inventario/parametro_inventario/presentation/control/parametro_inventario_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/parametro_inventario_control;

			$parametro_inventario_control=new parametro_inventario_control();
			$parametro_inventario_control->inicializarParametrosQueryString($post1);
			$parametro_inventario_control->ejecutarParametrosQueryString();
		}
		else if($controller=='precio_producto') {  
			//include_once('com/bydan/contabilidad/inventario/precio_producto/presentation/control/precio_producto_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/precio_producto_control;

			$precio_producto_control=new precio_producto_control();
			$precio_producto_control->inicializarParametrosQueryString($post1);
			$precio_producto_control->ejecutarParametrosQueryString();
		}
		else if($controller=='producto') {  
			//include_once('com/bydan/contabilidad/inventario/producto/presentation/control/producto_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/producto_control;

			$producto_control=new producto_control();
			$producto_control->inicializarParametrosQueryString($post1);
			$producto_control->ejecutarParametrosQueryString();
		}
		else if($controller=='producto_bodega') {  
			//include_once('com/bydan/contabilidad/inventario/producto_bodega/presentation/control/producto_bodega_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/producto_bodega_control;

			$producto_bodega_control=new producto_bodega_control();
			$producto_bodega_control->inicializarParametrosQueryString($post1);
			$producto_bodega_control->ejecutarParametrosQueryString();
		}
		else if($controller=='producto_equivalente') {  
			//include_once('com/bydan/contabilidad/inventario/producto_equivalente/presentation/control/producto_equivalente_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/producto_equivalente_control;

			$producto_equivalente_control=new producto_equivalente_control();
			$producto_equivalente_control->inicializarParametrosQueryString($post1);
			$producto_equivalente_control->ejecutarParametrosQueryString();
		}
		else if($controller=='serial_producto') {  
			//include_once('com/bydan/contabilidad/inventario/serial_producto/presentation/control/serial_producto_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/serial_producto_control;

			$serial_producto_control=new serial_producto_control();
			$serial_producto_control->inicializarParametrosQueryString($post1);
			$serial_producto_control->ejecutarParametrosQueryString();
		}
		else if($controller=='sub_categoria_producto') {  
			//include_once('com/bydan/contabilidad/inventario/sub_categoria_producto/presentation/control/sub_categoria_producto_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/sub_categoria_producto_control;

			$sub_categoria_producto_control=new sub_categoria_producto_control();
			$sub_categoria_producto_control->inicializarParametrosQueryString($post1);
			$sub_categoria_producto_control->ejecutarParametrosQueryString();
		}
		else if($controller=='tipo_kardex') {  
			//include_once('com/bydan/contabilidad/inventario/tipo_kardex/presentation/control/tipo_kardex_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/tipo_kardex_control;

			$tipo_kardex_control=new tipo_kardex_control();
			$tipo_kardex_control->inicializarParametrosQueryString($post1);
			$tipo_kardex_control->ejecutarParametrosQueryString();
		}
		else if($controller=='tipo_precio') {  
			//include_once('com/bydan/contabilidad/inventario/tipo_precio/presentation/control/tipo_precio_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/tipo_precio_control;

			$tipo_precio_control=new tipo_precio_control();
			$tipo_precio_control->inicializarParametrosQueryString($post1);
			$tipo_precio_control->ejecutarParametrosQueryString();
		}
		else if($controller=='tipo_producto') {  
			//include_once('com/bydan/contabilidad/inventario/tipo_producto/presentation/control/tipo_producto_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/tipo_producto_control;

			$tipo_producto_control=new tipo_producto_control();
			$tipo_producto_control->inicializarParametrosQueryString($post1);
			$tipo_producto_control->ejecutarParametrosQueryString();
		}
		else if($controller=='unidad') {  
			//include_once('com/bydan/contabilidad/inventario/unidad/presentation/control/unidad_control.php');
			//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/unidad_control;

			$unidad_control=new unidad_control();
			$unidad_control->inicializarParametrosQueryString($post1);
			$unidad_control->ejecutarParametrosQueryString();
		}

		} else if($sub_modulo=='report') {

            /*
			if($controller=='kardex') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/kardex_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/kardex_control;
			
				$kardexController=new kardex_control();
				$kardexController->inicializarParametrosQueryString($post1);
				$kardexController->ejecutarParametrosQueryString();
			}
			else if($controller=='lista_para_conteo') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/lista_para_conteo_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/lista_para_conteo_control;
			
				$lista_para_conteoController=new lista_para_conteo_control();
				$lista_para_conteoController->inicializarParametrosQueryString($post1);
				$lista_para_conteoController->ejecutarParametrosQueryString();
			}
			else if($controller=='listado_productos') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/listado_productos_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/listado_productos_control;
			
				$listado_productosController=new listado_productos_control();
				$listado_productosController->inicializarParametrosQueryString($post1);
				$listado_productosController->ejecutarParametrosQueryString();
			}
			else if($controller=='lotes') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/lotes_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/lotes_control;
			
				$loteController=new lote_control();
				$loteController->inicializarParametrosQueryString($post1);
				$loteController->ejecutarParametrosQueryString();
			}
			else if($controller=='movimiento_porcliente') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/movimiento_porcliente_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/movimiento_porcliente_control;
			
				$movimiento_porclienteController=new movimiento_porcliente_control();
				$movimiento_porclienteController->inicializarParametrosQueryString($post1);
				$movimiento_porclienteController->ejecutarParametrosQueryString();
			}
			else if($controller=='movimiento_pordocumento') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/movimiento_pordocumento_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/movimiento_pordocumento_control;
			
				$movimiento_pordocumentoController=new movimiento_pordocumento_control();
				$movimiento_pordocumentoController->inicializarParametrosQueryString($post1);
				$movimiento_pordocumentoController->ejecutarParametrosQueryString();
			}
			else if($controller=='movimientos_por_proveedor') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/movimientos_por_proveedor_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/movimientos_por_proveedor_control;
			
				$movimientos_por_proveedorController=new movimientos_por_proveedor_control();
				$movimientos_por_proveedorController->inicializarParametrosQueryString($post1);
				$movimientos_por_proveedorController->ejecutarParametrosQueryString();
			}
			else if($controller=='numeros_serie') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/numeros_serie_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/numeros_serie_control;
			
				$numeros_serieController=new numeros_serie_control();
				$numeros_serieController->inicializarParametrosQueryString($post1);
				$numeros_serieController->ejecutarParametrosQueryString();
			}
			else if($controller=='productos_existencia_negativos') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/productos_existencia_negativos_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/productos_existencia_negativos_control;
			
				$productos_existencia_negativosController=new productos_existencia_negativos_control();
				$productos_existencia_negativosController->inicializarParametrosQueryString($post1);
				$productos_existencia_negativosController->ejecutarParametrosQueryString();
			}
			else if($controller=='productos_para_reorden') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/productos_para_reorden_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/productos_para_reorden_control;
			
				$productos_para_reordenController=new productos_para_reorden_control();
				$productos_para_reordenController->inicializarParametrosQueryString($post1);
				$productos_para_reordenController->ejecutarParametrosQueryString();
			}
			else if($controller=='productos_sincosto') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/productos_sincosto_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/productos_sincosto_control;
			
				$productos_sincostoController=new productos_sincosto_control();
				$productos_sincostoController->inicializarParametrosQueryString($post1);
				$productos_sincostoController->ejecutarParametrosQueryString();
			}
			else if($controller=='reimpresion_docs') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/reimpresion_docs_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/reimpresion_docs_control;
			
				$reimpresion_docsController=new reimpresion_docs_control();
				$reimpresion_docsController->inicializarParametrosQueryString($post1);
				$reimpresion_docsController->ejecutarParametrosQueryString();
			}
			else if($controller=='reimprimir_cotizacion') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/reimprimir_cotizacion_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/reimprimir_cotizacion_control;
			
				$reimprimir_cotizacionController=new reimprimir_cotizacion_control();
				$reimprimir_cotizacionController->inicializarParametrosQueryString($post1);
				$reimprimir_cotizacionController->ejecutarParametrosQueryString();
			}
			else if($controller=='reimprimir_devoluciones') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/reimprimir_devoluciones_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/reimprimir_devoluciones_control;
			
				$reimprimir_devolucionesController=new reimprimir_devoluciones_control();
				$reimprimir_devolucionesController->inicializarParametrosQueryString($post1);
				$reimprimir_devolucionesController->ejecutarParametrosQueryString();
			}
			else if($controller=='resumen_cotizaciones') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/resumen_cotizaciones_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/resumen_cotizaciones_control;
			
				$resumen_cotizacionesController=new resumen_cotizaciones_control();
				$resumen_cotizacionesController->inicializarParametrosQueryString($post1);
				$resumen_cotizacionesController->ejecutarParametrosQueryString();
			}
			else if($controller=='resumen_devolucion') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/resumen_devolucion_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/resumen_devolucion_control;
			
				$resumen_devolucionController=new resumen_devolucion_control();
				$resumen_devolucionController->inicializarParametrosQueryString($post1);
				$resumen_devolucionController->ejecutarParametrosQueryString();
			}
			else if($controller=='valor_inventario') {
				//include_once('com/bydan/contabilidad/inventario/presentation/control/report/valor_inventario_control.php');
				//PHP5.3-use com/bydan/contabilidad/inventariopresentation/control/report/valor_inventario_control;
			
				$valor_inventarioController=new valor_inventario_control();
				$valor_inventarioController->inicializarParametrosQueryString($post1);
				$valor_inventarioController->ejecutarParametrosQueryString();
			}
			*/							
		}
	}
}

?>