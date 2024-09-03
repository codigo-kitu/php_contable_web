
<script id="lista_producto_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatoslista_producto" name="frmTablaDatoslista_producto">
			<div id="divTablaDatosAuxiliarlista_productosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count lista_productos}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulolista_producto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Lista Productoses</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatoslista_productos" name="tblTablaDatoslista_productos" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

		{{#if (If_Yes_AND_Not IS_DEVELOPING  bitEsRelacionado)}}
			<caption>({{STR_PREFIJO_TABLE}} {{STR_TABLE_NAME}})</caption>
		{{/if}}

		
			<thead>
				<tr class="{{class_cabecera}}">
		
				
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:{{strPermisoEliminar}}">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		{{/if}}
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		{{/if}}
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio3' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio3</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio4' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio4</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Costo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Unidad Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Compra<a onclick="jQuery('#form-id_unidad_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_compra_img2" name="form{{strSufijo}}-id_unidad_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_compra');"><img id="form{{strSufijo}}-id_unidad_compra_img_busqueda2" name="form{{strSufijo}}-id_unidad_compra_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Unidad En Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad En Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Equivalencia En Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Unidad Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Venta<a onclick="jQuery('#form-id_unidad_venta_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_venta_img2" name="form{{strSufijo}}-id_unidad_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_venta');"><img id="form{{strSufijo}}-id_unidad_venta_img_busqueda2" name="form{{strSufijo}}-id_unidad_venta_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Unidad En Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad En Venta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Equivalencia En Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Venta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad Total' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Total</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad Minima' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Minima</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Categoria Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto<a onclick="jQuery('#form-id_categoria_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_producto_img2" name="form{{strSufijo}}-id_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacategoria_producto('id_categoria_producto');"><img id="form{{strSufijo}}-id_categoria_producto_img_busqueda2" name="form{{strSufijo}}-id_categoria_producto_img_busqueda2" title="Buscar Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Sub Categoria Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto<a onclick="jQuery('#form-id_sub_categoria_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_sub_categoria_producto_img2" name="form{{strSufijo}}-id_sub_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParasub_categoria_producto('id_sub_categoria_producto');"><img id="form{{strSufijo}}-id_sub_categoria_producto_img_busqueda2" name="form{{strSufijo}}-id_sub_categoria_producto_img_busqueda2" title="Buscar Sub Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Acepta Lote' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Acepta Lote</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Inventario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Inventario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Imagen' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento3' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento3</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento4' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento4</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Fabricante' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Fabricante</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto Fisico' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Fisico</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Situacion Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Situacion Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Bodega' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Mostrar Componente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Componente</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Factura Sin Stock' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Sin Stock</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Avisa Expiracion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Avisa Expiracion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Factura Con Precio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Con Precio</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto Equivalente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Equivalente</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compra<a onclick="jQuery('#form-id_cuenta_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_compra_img2" name="form{{strSufijo}}-id_cuenta_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compra');"><img id="form{{strSufijo}}-id_cuenta_compra_img_busqueda2" name="form{{strSufijo}}-id_cuenta_compra_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Venta<a onclick="jQuery('#form-id_cuenta_venta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_venta_img2" name="form{{strSufijo}}-id_cuenta_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_venta');"><img id="form{{strSufijo}}-id_cuenta_venta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_venta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Inventario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Inventario<a onclick="jQuery('#form-id_cuenta_inventario_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_inventario_img2" name="form{{strSufijo}}-id_cuenta_inventario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_inventario');"><img id="form{{strSufijo}}-id_cuenta_inventario_img_busqueda2" name="form{{strSufijo}}-id_cuenta_inventario_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Venta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Inventario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Inventario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Suplidor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Suplidor<a onclick="jQuery('#form-id_otro_suplidor_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_suplidor_img2" name="form{{strSufijo}}-id_otro_suplidor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_suplidor('id_otro_suplidor');"><img id="form{{strSufijo}}-id_otro_suplidor_img_busqueda2" name="form{{strSufijo}}-id_otro_suplidor_img_busqueda2" title="Buscar Otro Suplidor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_img2" name="form{{strSufijo}}-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form{{strSufijo}}-id_impuesto_img_busqueda2" name="form{{strSufijo}}-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Impuesto Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Ventas<a onclick="jQuery('#form-id_impuesto_ventas_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_ventas_img2" name="form{{strSufijo}}-id_impuesto_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto_ventas');"><img id="form{{strSufijo}}-id_impuesto_ventas_img_busqueda2" name="form{{strSufijo}}-id_impuesto_ventas_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Impuesto Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Compras<a onclick="jQuery('#form-id_impuesto_compras_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_compras_img2" name="form{{strSufijo}}-id_impuesto_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto_compras');"><img id="form{{strSufijo}}-id_impuesto_compras_img_busqueda2" name="form{{strSufijo}}-id_impuesto_compras_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto1 En Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto1 En Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto1 En Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto1 En Compras</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ultima Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ultima Venta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_img2" name="form{{strSufijo}}-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Otro Impuesto Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Ventas<a onclick="jQuery('#form-id_otro_impuesto_ventas_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_ventas_img2" name="form{{strSufijo}}-id_otro_impuesto_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto_ventas');"><img id="form{{strSufijo}}-id_otro_impuesto_ventas_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_ventas_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Otro Impuesto Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Compras<a onclick="jQuery('#form-id_otro_impuesto_compras_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_compras_img2" name="form{{strSufijo}}-id_otro_impuesto_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto_compras');"><img id="form{{strSufijo}}-id_otro_impuesto_compras_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_compras_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Compras</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio De Compra 0' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio De Compra 0</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio Actualizado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio Actualizado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Requiere Nro Serie' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Requiere Nro Serie</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Costo Dolar' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Dolar</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comentario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comenta Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Retencion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_img2" name="form{{strSufijo}}-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form{{strSufijo}}-id_retencion_img_busqueda2" name="form{{strSufijo}}-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Retencion Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ventas<a onclick="jQuery('#form-id_retencion_ventas_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_ventas_img2" name="form{{strSufijo}}-id_retencion_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion_ventas');"><img id="form{{strSufijo}}-id_retencion_ventas_img_busqueda2" name="form{{strSufijo}}-id_retencion_ventas_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Retencion Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Compras<a onclick="jQuery('#form-id_retencion_compras_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_compras_img2" name="form{{strSufijo}}-id_retencion_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion_compras');"><img id="form{{strSufijo}}-id_retencion_compras_img_busqueda2" name="form{{strSufijo}}-id_retencion_compras_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Retencion Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Retencion Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion Compras</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Notas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Notas</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</thead>

		{{#if (If_Not paraReporte)}}
		{{#if (If_Not bitEsRelacionado)}}

		
			<tfoot>
				<tr class="{{class_cabecera}}">
		
				
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:{{strPermisoEliminar}}">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		{{/if}}
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		{{/if}}
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio3' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio3</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio4' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio4</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Costo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Unidad Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Compra<a onclick="jQuery('#form-id_unidad_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_compra_img2" name="form{{strSufijo}}-id_unidad_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_compra');"><img id="form{{strSufijo}}-id_unidad_compra_img_busqueda2" name="form{{strSufijo}}-id_unidad_compra_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Unidad En Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad En Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Equivalencia En Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Unidad Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Venta<a onclick="jQuery('#form-id_unidad_venta_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_venta_img2" name="form{{strSufijo}}-id_unidad_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_venta');"><img id="form{{strSufijo}}-id_unidad_venta_img_busqueda2" name="form{{strSufijo}}-id_unidad_venta_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Unidad En Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad En Venta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Equivalencia En Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Venta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad Total' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Total</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad Minima' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Minima</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Categoria Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto<a onclick="jQuery('#form-id_categoria_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_producto_img2" name="form{{strSufijo}}-id_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacategoria_producto('id_categoria_producto');"><img id="form{{strSufijo}}-id_categoria_producto_img_busqueda2" name="form{{strSufijo}}-id_categoria_producto_img_busqueda2" title="Buscar Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Sub Categoria Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto<a onclick="jQuery('#form-id_sub_categoria_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_sub_categoria_producto_img2" name="form{{strSufijo}}-id_sub_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParasub_categoria_producto('id_sub_categoria_producto');"><img id="form{{strSufijo}}-id_sub_categoria_producto_img_busqueda2" name="form{{strSufijo}}-id_sub_categoria_producto_img_busqueda2" title="Buscar Sub Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Acepta Lote' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Acepta Lote</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Inventario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Inventario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Imagen' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento3' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento3</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento4' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento4</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Fabricante' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Fabricante</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto Fisico' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Fisico</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Situacion Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Situacion Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Bodega' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Mostrar Componente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Componente</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Factura Sin Stock' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Sin Stock</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Avisa Expiracion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Avisa Expiracion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Factura Con Precio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Con Precio</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto Equivalente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Equivalente</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compra<a onclick="jQuery('#form-id_cuenta_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_compra_img2" name="form{{strSufijo}}-id_cuenta_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compra');"><img id="form{{strSufijo}}-id_cuenta_compra_img_busqueda2" name="form{{strSufijo}}-id_cuenta_compra_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Venta<a onclick="jQuery('#form-id_cuenta_venta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_venta_img2" name="form{{strSufijo}}-id_cuenta_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_venta');"><img id="form{{strSufijo}}-id_cuenta_venta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_venta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Inventario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Inventario<a onclick="jQuery('#form-id_cuenta_inventario_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_inventario_img2" name="form{{strSufijo}}-id_cuenta_inventario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_inventario');"><img id="form{{strSufijo}}-id_cuenta_inventario_img_busqueda2" name="form{{strSufijo}}-id_cuenta_inventario_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Venta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Inventario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Inventario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Suplidor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Suplidor<a onclick="jQuery('#form-id_otro_suplidor_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_suplidor_img2" name="form{{strSufijo}}-id_otro_suplidor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_suplidor('id_otro_suplidor');"><img id="form{{strSufijo}}-id_otro_suplidor_img_busqueda2" name="form{{strSufijo}}-id_otro_suplidor_img_busqueda2" title="Buscar Otro Suplidor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_img2" name="form{{strSufijo}}-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form{{strSufijo}}-id_impuesto_img_busqueda2" name="form{{strSufijo}}-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Impuesto Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Ventas<a onclick="jQuery('#form-id_impuesto_ventas_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_ventas_img2" name="form{{strSufijo}}-id_impuesto_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto_ventas');"><img id="form{{strSufijo}}-id_impuesto_ventas_img_busqueda2" name="form{{strSufijo}}-id_impuesto_ventas_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Impuesto Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Compras<a onclick="jQuery('#form-id_impuesto_compras_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_compras_img2" name="form{{strSufijo}}-id_impuesto_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto_compras');"><img id="form{{strSufijo}}-id_impuesto_compras_img_busqueda2" name="form{{strSufijo}}-id_impuesto_compras_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto1 En Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto1 En Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto1 En Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto1 En Compras</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ultima Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ultima Venta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_img2" name="form{{strSufijo}}-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Otro Impuesto Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Ventas<a onclick="jQuery('#form-id_otro_impuesto_ventas_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_ventas_img2" name="form{{strSufijo}}-id_otro_impuesto_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto_ventas');"><img id="form{{strSufijo}}-id_otro_impuesto_ventas_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_ventas_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Otro Impuesto Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Compras<a onclick="jQuery('#form-id_otro_impuesto_compras_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_compras_img2" name="form{{strSufijo}}-id_otro_impuesto_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto_compras');"><img id="form{{strSufijo}}-id_otro_impuesto_compras_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_compras_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Compras</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio De Compra 0' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio De Compra 0</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio Actualizado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio Actualizado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Requiere Nro Serie' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Requiere Nro Serie</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Costo Dolar' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Dolar</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comentario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comenta Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Retencion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_img2" name="form{{strSufijo}}-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form{{strSufijo}}-id_retencion_img_busqueda2" name="form{{strSufijo}}-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Retencion Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ventas<a onclick="jQuery('#form-id_retencion_ventas_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_ventas_img2" name="form{{strSufijo}}-id_retencion_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion_ventas');"><img id="form{{strSufijo}}-id_retencion_ventas_img_busqueda2" name="form{{strSufijo}}-id_retencion_ventas_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Retencion Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Compras<a onclick="jQuery('#form-id_retencion_compras_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_compras_img2" name="form{{strSufijo}}-id_retencion_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion_compras');"><img id="form{{strSufijo}}-id_retencion_compras_img_busqueda2" name="form{{strSufijo}}-id_retencion_compras_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Retencion Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Retencion Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion Compras</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Notas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Notas</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist lista_productosLocal)}}
			{{#each lista_productosLocal}}

				{{#if (If_NotText_AND_Not ../STR_TIPO_TABLA 'normal'  ../paraReporte)}}
					
					<tr>
					
				{{else}}
					

					<tr class="{{getClassRowTableHtml i}}" {{getOnMouseOverHtmlReporte ../paraReporte ../STR_TIPO_TABLA i}} >
				{{/if}}

				{{#if (If_Not ../paraReporte)}}
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								{{id}}
							</td>
							<td>
								<img class="imgseleccionarlista_producto" idactuallista_producto="{{id}}" title="SELECCIONAR Lista Productos ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_eli col_id"  style="display:{{../strPermisoEliminar}}">
					<a>
					<table>
						<tr>
							<td>
								{{id}}
							</td>
							<td>
								<img class="imgeliminartablalista_producto" idactuallista_producto="{{id}}" title="ELIMINAR Lista Productos ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Lista Productos ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>
				{{/if}}
				{{#if (If_Not ../paraReporte)}}
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				{{/if}}
				{{#if (If_Not ../paraReporte)}}
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				{{/if}}

				{{#if (ValCol 'Producto' ../paraReporte)}}
				<td class="elementotabla col_id_producto" > {{id_producto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Codigo Producto' ../paraReporte)}}
				
					<td class="elementotabla col_codigo_producto" > 
						{{ codigo_producto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descripcion Producto' ../paraReporte)}}
				
					<td class="elementotabla col_descripcion_producto" > 
						{{ descripcion_producto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Precio1' ../paraReporte)}}
				
					<td class="elementotabla col_precio1" > 
						{{ precio1 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Precio2' ../paraReporte)}}
				
					<td class="elementotabla col_precio2" > 
						{{ precio2 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Precio3' ../paraReporte)}}
				
					<td class="elementotabla col_precio3" > 
						{{ precio3 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Precio4' ../paraReporte)}}
				
					<td class="elementotabla col_precio4" > 
						{{ precio4 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Costo' ../paraReporte)}}
				
					<td class="elementotabla col_costo" > 
						{{ costo }}
					</td>
				{{/if}}

				{{#if (ValCol ' Unidad Compra' ../paraReporte)}}
				<td class="elementotabla col_id_unidad_compra" > {{id_unidad_compra_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Unidad En Compra' ../paraReporte)}}
				
					<td class="elementotabla col_unidad_en_compra" > 
						{{ unidad_en_compra }}
					</td>
				{{/if}}

				{{#if (ValCol 'Equivalencia En Compra' ../paraReporte)}}
				
					<td class="elementotabla col_equivalencia_en_compra" > 
						{{ equivalencia_en_compra }}
					</td>
				{{/if}}

				{{#if (ValCol ' Unidad Venta' ../paraReporte)}}
				<td class="elementotabla col_id_unidad_venta" > {{id_unidad_venta_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Unidad En Venta' ../paraReporte)}}
				
					<td class="elementotabla col_unidad_en_venta" > 
						{{ unidad_en_venta }}
					</td>
				{{/if}}

				{{#if (ValCol 'Equivalencia En Venta' ../paraReporte)}}
				
					<td class="elementotabla col_equivalencia_en_venta" > 
						{{ equivalencia_en_venta }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cantidad Total' ../paraReporte)}}
				
					<td class="elementotabla col_cantidad_total" > 
						{{ cantidad_total }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cantidad Minima' ../paraReporte)}}
				
					<td class="elementotabla col_cantidad_minima" > 
						{{ cantidad_minima }}
					</td>
				{{/if}}

				{{#if (ValCol 'Categoria Producto' ../paraReporte)}}
				<td class="elementotabla col_id_categoria_producto" > {{id_categoria_producto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Sub Categoria Producto' ../paraReporte)}}
				<td class="elementotabla col_id_sub_categoria_producto" > {{id_sub_categoria_producto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Acepta Lote' ../paraReporte)}}
				
					<td class="elementotabla col_acepta_lote" > 
						{{ acepta_lote }}
					</td>
				{{/if}}

				{{#if (ValCol 'Valor Inventario' ../paraReporte)}}
				
					<td class="elementotabla col_valor_inventario" > 
						{{ valor_inventario }}
					</td>
				{{/if}}

				{{#if (ValCol 'Imagen' ../paraReporte)}}
				
					<td class="elementotabla col_imagen" > 
						{{ imagen }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento1' ../paraReporte)}}
				
					<td class="elementotabla col_incremento1" > 
						{{ incremento1 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento2' ../paraReporte)}}
				
					<td class="elementotabla col_incremento2" > 
						{{ incremento2 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento3' ../paraReporte)}}
				
					<td class="elementotabla col_incremento3" > 
						{{ incremento3 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento4' ../paraReporte)}}
				
					<td class="elementotabla col_incremento4" > 
						{{ incremento4 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Codigo Fabricante' ../paraReporte)}}
				
					<td class="elementotabla col_codigo_fabricante" > 
						{{ codigo_fabricante }}
					</td>
				{{/if}}

				{{#if (ValCol 'Producto Fisico' ../paraReporte)}}
				
					<td class="elementotabla col_producto_fisico" > 
						{{ producto_fisico }}
					</td>
				{{/if}}

				{{#if (ValCol 'Situacion Producto' ../paraReporte)}}
				
					<td class="elementotabla col_situacion_producto" > 
						{{ situacion_producto }}
					</td>
				{{/if}}

				{{#if (ValCol ' Tipo Producto' ../paraReporte)}}
				<td class="elementotabla col_id_tipo_producto" > {{id_tipo_producto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Tipo Producto' ../paraReporte)}}
				
					<td class="elementotabla col_tipo_producto_codigo" > 
						{{ tipo_producto_codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Bodega' ../paraReporte)}}
				<td class="elementotabla col_id_bodega" > {{id_bodega_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Mostrar Componente' ../paraReporte)}}
				
					<td class="elementotabla col_mostrar_componente" > 
						{{ mostrar_componente }}
					</td>
				{{/if}}

				{{#if (ValCol 'Factura Sin Stock' ../paraReporte)}}
				
					<td class="elementotabla col_factura_sin_stock" > 
						{{ factura_sin_stock }}
					</td>
				{{/if}}

				{{#if (ValCol 'Avisa Expiracion' ../paraReporte)}}
				
					<td class="elementotabla col_avisa_expiracion" > 
						{{ avisa_expiracion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Factura Con Precio' ../paraReporte)}}
				
					<td class="elementotabla col_factura_con_precio" > 
						{{ factura_con_precio }}
					</td>
				{{/if}}

				{{#if (ValCol 'Producto Equivalente' ../paraReporte)}}
				
					<td class="elementotabla col_producto_equivalente" > 
						{{ producto_equivalente }}
					</td>
				{{/if}}

				{{#if (ValCol ' Cuenta Compra' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta_compra" > {{id_cuenta_compra_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Cuenta Venta' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta_venta" > {{id_cuenta_venta_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Cuenta Inventario' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta_inventario" > {{id_cuenta_inventario_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Cuenta Compra' ../paraReporte)}}
				
					<td class="elementotabla col_cuenta_compra_codigo" > 
						{{ cuenta_compra_codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cuenta Venta' ../paraReporte)}}
				
					<td class="elementotabla col_cuenta_venta_codigo" > 
						{{ cuenta_venta_codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cuenta Inventario' ../paraReporte)}}
				
					<td class="elementotabla col_cuenta_inventario_codigo" > 
						{{ cuenta_inventario_codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Otro Suplidor' ../paraReporte)}}
				<td class="elementotabla col_id_otro_suplidor" > {{id_otro_suplidor_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Impuesto' ../paraReporte)}}
				<td class="elementotabla col_id_impuesto" > {{id_impuesto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Impuesto Ventas' ../paraReporte)}}
				<td class="elementotabla col_id_impuesto_ventas" > {{id_impuesto_ventas_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Impuesto Compras' ../paraReporte)}}
				<td class="elementotabla col_id_impuesto_compras" > {{id_impuesto_compras_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Impuesto1 En Ventas' ../paraReporte)}}
				
					<td class="elementotabla col_impuesto1_en_ventas" > 
						{{ impuesto1_en_ventas }}
					</td>
				{{/if}}

				{{#if (ValCol 'Impuesto1 En Compras' ../paraReporte)}}
				
					<td class="elementotabla col_impuesto1_en_compras" > 
						{{ impuesto1_en_compras }}
					</td>
				{{/if}}

				{{#if (ValCol 'Ultima Venta' ../paraReporte)}}
				
					<td class="elementotabla col_ultima_venta" > 
						{{ ultima_venta }}
					</td>
				{{/if}}

				{{#if (ValCol 'Otro Impuesto' ../paraReporte)}}
				<td class="elementotabla col_id_otro_impuesto" > {{id_otro_impuesto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Otro Impuesto Ventas' ../paraReporte)}}
				<td class="elementotabla col_id_otro_impuesto_ventas" > {{id_otro_impuesto_ventas_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Otro Impuesto Compras' ../paraReporte)}}
				<td class="elementotabla col_id_otro_impuesto_compras" > {{id_otro_impuesto_compras_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Otro Impuesto Ventas' ../paraReporte)}}
				
					<td class="elementotabla col_otro_impuesto_ventas_codigo" > 
						{{ otro_impuesto_ventas_codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Otro Impuesto Compras' ../paraReporte)}}
				
					<td class="elementotabla col_otro_impuesto_compras_codigo" > 
						{{ otro_impuesto_compras_codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Precio De Compra 0' ../paraReporte)}}
				
					<td class="elementotabla col_precio_de_compra_0" > 
						{{ precio_de_compra_0 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Precio Actualizado' ../paraReporte)}}
				
					<td class="elementotabla col_precio_actualizado" > 
						{{ precio_actualizado }}
					</td>
				{{/if}}

				{{#if (ValCol 'Requiere Nro Serie' ../paraReporte)}}
				
					<td class="elementotabla col_requiere_nro_serie" > 
						{{ requiere_nro_serie }}
					</td>
				{{/if}}

				{{#if (ValCol 'Costo Dolar' ../paraReporte)}}
				
					<td class="elementotabla col_costo_dolar" > 
						{{ costo_dolar }}
					</td>
				{{/if}}

				{{#if (ValCol 'Comentario' ../paraReporte)}}
				
					<td class="elementotabla col_comentario" > 
						{{ comentario }}
					</td>
				{{/if}}

				{{#if (ValCol 'Comenta Factura' ../paraReporte)}}
				
					<td class="elementotabla col_comenta_factura" > 
						{{ comenta_factura }}
					</td>
				{{/if}}

				{{#if (ValCol 'Retencion' ../paraReporte)}}
				<td class="elementotabla col_id_retencion" > {{id_retencion_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Retencion Ventas' ../paraReporte)}}
				<td class="elementotabla col_id_retencion_ventas" > {{id_retencion_ventas_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Retencion Compras' ../paraReporte)}}
				<td class="elementotabla col_id_retencion_compras" > {{id_retencion_compras_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Retencion Ventas' ../paraReporte)}}
				
					<td class="elementotabla col_retencion_ventas_codigo" > 
						{{ retencion_ventas_codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Retencion Compras' ../paraReporte)}}
				
					<td class="elementotabla col_retencion_compras_codigo" > 
						{{ retencion_compras_codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Notas' ../paraReporte)}}
				
					<td class="elementotabla col_notas" > 
						{{ notas }}
					</td>
				{{/if}}

				{{#if (If_Not_AND_Not_AND_Not ../paraReporte  ../bitEsBusqueda  ../bitEsRelaciones)}}

				{{/if}}

				<td style="display:none" class="actions"></td>

				</tr>
			{{/each}}
		{{/if}}

		{{#if paraReporte}}

			
			<tr>
				<td>
					<input type="button" onclick="{{proceso_print}}" style="visibility:visible" value="Imprimir" />
				</td>
			</tr>
		{{/if}}

					</tbody>

				</table>

			</div>

		</form>


</script>

