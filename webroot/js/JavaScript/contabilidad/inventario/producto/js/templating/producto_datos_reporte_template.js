
<script id="producto_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosproducto" name="frmTablaDatosproducto">
			<div id="divTablaDatosAuxiliarproductosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count productos}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloproducto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Productos</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosproductos" name="tblTablaDatosproductos" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
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

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Proveedores' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Proveedores<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Costo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Activo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad Inicial' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Inicial</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_img2" name="form{{strSufijo}}-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form{{strSufijo}}-id_impuesto_img_busqueda2" name="form{{strSufijo}}-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_img2" name="form{{strSufijo}}-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto En Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto En Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Compras</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Compras</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Categoria Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto<a onclick="jQuery('#form-id_categoria_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_producto_img2" name="form{{strSufijo}}-id_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacategoria_producto('id_categoria_producto');"><img id="form{{strSufijo}}-id_categoria_producto_img_busqueda2" name="form{{strSufijo}}-id_categoria_producto_img_busqueda2" title="Buscar Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Sub Categoria Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto<a onclick="jQuery('#form-id_sub_categoria_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_sub_categoria_producto_img2" name="form{{strSufijo}}-id_sub_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParasub_categoria_producto('id_sub_categoria_producto');"><img id="form{{strSufijo}}-id_sub_categoria_producto_img_busqueda2" name="form{{strSufijo}}-id_sub_categoria_producto_img_busqueda2" title="Buscar Sub Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Bodega Defecto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega Defecto<a onclick="jQuery('#form-id_bodega_defecto_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_defecto_img2" name="form{{strSufijo}}-id_bodega_defecto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParabodega('id_bodega_defecto');"><img id="form{{strSufijo}}-id_bodega_defecto_img_busqueda2" name="form{{strSufijo}}-id_bodega_defecto_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Unidad Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Compra<a onclick="jQuery('#form-id_unidad_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_compra_img2" name="form{{strSufijo}}-id_unidad_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_compra');"><img id="form{{strSufijo}}-id_unidad_compra_img_busqueda2" name="form{{strSufijo}}-id_unidad_compra_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Equivalencia En Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Unidad Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Venta<a onclick="jQuery('#form-id_unidad_venta_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_venta_img2" name="form{{strSufijo}}-id_unidad_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_venta');"><img id="form{{strSufijo}}-id_unidad_venta_img_busqueda2" name="form{{strSufijo}}-id_unidad_venta_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Equivalencia En Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Venta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Imagen' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Observacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comenta Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Fabricante' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Fabricante</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad Minima' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Minima</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad Maxima' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Maxima</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Factura Sin Stock' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Sin Stock</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Mostrar Componente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Componente</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto Equivalente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Equivalente</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Avisa Expiracion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Avisa Expiracion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Requiere No Serie' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Requiere No Serie</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Acepta Lote' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Acepta Lote</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Venta/Ingresos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Venta/Ingresos<a onclick="jQuery('#form-id_cuenta_venta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_venta_img2" name="form{{strSufijo}}-id_cuenta_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_venta');"><img id="form{{strSufijo}}-id_cuenta_venta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_venta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Compra/Activo/Inventario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Compra/Activo/Inventario<a onclick="jQuery('#form-id_cuenta_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_compra_img2" name="form{{strSufijo}}-id_cuenta_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compra');"><img id="form{{strSufijo}}-id_cuenta_compra_img_busqueda2" name="form{{strSufijo}}-id_cuenta_compra_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Costo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Costo<a onclick="jQuery('#form-id_cuenta_costo_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_costo_img2" name="form{{strSufijo}}-id_cuenta_costo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_costo');"><img id="form{{strSufijo}}-id_cuenta_costo_img_busqueda2" name="form{{strSufijo}}-id_cuenta_costo_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Inventario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Inventario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto Fisico' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Fisico</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Precioses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista ses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Suplidores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre> Bodegas</pre></b>
			</th>

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
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

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Proveedores' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Proveedores<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Costo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Activo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad Inicial' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Inicial</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_img2" name="form{{strSufijo}}-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form{{strSufijo}}-id_impuesto_img_busqueda2" name="form{{strSufijo}}-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_img2" name="form{{strSufijo}}-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto En Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto En Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Compras</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Impuesto Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Compras</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Categoria Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto<a onclick="jQuery('#form-id_categoria_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_producto_img2" name="form{{strSufijo}}-id_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacategoria_producto('id_categoria_producto');"><img id="form{{strSufijo}}-id_categoria_producto_img_busqueda2" name="form{{strSufijo}}-id_categoria_producto_img_busqueda2" title="Buscar Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Sub Categoria Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto<a onclick="jQuery('#form-id_sub_categoria_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_sub_categoria_producto_img2" name="form{{strSufijo}}-id_sub_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParasub_categoria_producto('id_sub_categoria_producto');"><img id="form{{strSufijo}}-id_sub_categoria_producto_img_busqueda2" name="form{{strSufijo}}-id_sub_categoria_producto_img_busqueda2" title="Buscar Sub Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Bodega Defecto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega Defecto<a onclick="jQuery('#form-id_bodega_defecto_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_defecto_img2" name="form{{strSufijo}}-id_bodega_defecto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParabodega('id_bodega_defecto');"><img id="form{{strSufijo}}-id_bodega_defecto_img_busqueda2" name="form{{strSufijo}}-id_bodega_defecto_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Unidad Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Compra<a onclick="jQuery('#form-id_unidad_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_compra_img2" name="form{{strSufijo}}-id_unidad_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_compra');"><img id="form{{strSufijo}}-id_unidad_compra_img_busqueda2" name="form{{strSufijo}}-id_unidad_compra_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Equivalencia En Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Unidad Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Venta<a onclick="jQuery('#form-id_unidad_venta_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_venta_img2" name="form{{strSufijo}}-id_unidad_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_venta');"><img id="form{{strSufijo}}-id_unidad_venta_img_busqueda2" name="form{{strSufijo}}-id_unidad_venta_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Equivalencia En Venta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Venta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Imagen' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Observacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comenta Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Fabricante' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Fabricante</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad Minima' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Minima</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad Maxima' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Maxima</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Factura Sin Stock' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Sin Stock</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Mostrar Componente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Componente</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto Equivalente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Equivalente</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Avisa Expiracion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Avisa Expiracion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Requiere No Serie' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Requiere No Serie</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Acepta Lote' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Acepta Lote</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Venta/Ingresos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Venta/Ingresos<a onclick="jQuery('#form-id_cuenta_venta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_venta_img2" name="form{{strSufijo}}-id_cuenta_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_venta');"><img id="form{{strSufijo}}-id_cuenta_venta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_venta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Compra/Activo/Inventario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Compra/Activo/Inventario<a onclick="jQuery('#form-id_cuenta_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_compra_img2" name="form{{strSufijo}}-id_cuenta_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compra');"><img id="form{{strSufijo}}-id_cuenta_compra_img_busqueda2" name="form{{strSufijo}}-id_cuenta_compra_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Costo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Costo<a onclick="jQuery('#form-id_cuenta_costo_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_costo_img2" name="form{{strSufijo}}-id_cuenta_costo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_costo');"><img id="form{{strSufijo}}-id_cuenta_costo_img_busqueda2" name="form{{strSufijo}}-id_cuenta_costo_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Inventario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Inventario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto Fisico' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Fisico</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Precioses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista ses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Suplidores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre> Bodegas</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist productosLocal)}}
			{{#each productosLocal}}

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
								<img class="imgseleccionarproducto" idactualproducto="{{id}}" title="SELECCIONAR Producto ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaproducto" idactualproducto="{{id}}" title="ELIMINAR Producto ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Producto ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesproducto" idactualproducto="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
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
				{{#if ../IS_DEVELOPING}}
				<td> {{id_empresa_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Proveedores' ../paraReporte)}}
				<td class="elementotabla col_id_proveedor" > {{id_proveedor_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Codigo' ../paraReporte)}}
				
					<td class="elementotabla col_codigo" > 
						{{ codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre' ../paraReporte)}}
				
					<td class="elementotabla col_nombre" > 
						{{ nombre }}
					</td>
				{{/if}}

				{{#if (ValCol 'Costo' ../paraReporte)}}
				
					<td class="elementotabla col_costo" > 
						{{ costo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Activo' ../paraReporte)}}
				
					<td class="elementotabla col_activo" >{{{ getCheckBox activo 'form{{strSufijo}}-activoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Tipo Producto' ../paraReporte)}}
				<td class="elementotabla col_id_tipo_producto" > {{id_tipo_producto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Cantidad Inicial' ../paraReporte)}}
				
					<td class="elementotabla col_cantidad_inicial" > 
						{{ cantidad_inicial }}
					</td>
				{{/if}}

				{{#if (ValCol 'Impuesto' ../paraReporte)}}
				<td class="elementotabla col_id_impuesto" > {{id_impuesto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Otro Impuesto' ../paraReporte)}}
				<td class="elementotabla col_id_otro_impuesto" > {{id_otro_impuesto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Impuesto En Ventas' ../paraReporte)}}
				
					<td class="elementotabla col_impuesto_ventas" >{{{ getCheckBox impuesto_ventas 'form{{strSufijo}}-impuesto_ventasi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Otro Impuesto Ventas' ../paraReporte)}}
				
					<td class="elementotabla col_otro_impuesto_ventas" >{{{ getCheckBox otro_impuesto_ventas 'form{{strSufijo}}-otro_impuesto_ventasi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Impuesto En Compras' ../paraReporte)}}
				
					<td class="elementotabla col_impuesto_compras" >{{{ getCheckBox impuesto_compras 'form{{strSufijo}}-impuesto_comprasi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Otro Impuesto Compras' ../paraReporte)}}
				
					<td class="elementotabla col_otro_impuesto_compras" >{{{ getCheckBox otro_impuesto_compras 'form{{strSufijo}}-otro_impuesto_comprasi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Categoria Producto' ../paraReporte)}}
				<td class="elementotabla col_id_categoria_producto" > {{id_categoria_producto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Sub Categoria Producto' ../paraReporte)}}
				<td class="elementotabla col_id_sub_categoria_producto" > {{id_sub_categoria_producto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Bodega Defecto' ../paraReporte)}}
				<td class="elementotabla col_id_bodega_defecto" > {{id_bodega_defecto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Unidad Compra' ../paraReporte)}}
				<td class="elementotabla col_id_unidad_compra" > {{id_unidad_compra_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Equivalencia En Compra' ../paraReporte)}}
				
					<td class="elementotabla col_equivalencia_compra" > 
						{{ equivalencia_compra }}
					</td>
				{{/if}}

				{{#if (ValCol 'Unidad Venta' ../paraReporte)}}
				<td class="elementotabla col_id_unidad_venta" > {{id_unidad_venta_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Equivalencia En Venta' ../paraReporte)}}
				
					<td class="elementotabla col_equivalencia_venta" > 
						{{ equivalencia_venta }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descripcion' ../paraReporte)}}
				
					<td class="elementotabla col_descripcion" > 
						{{ descripcion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Imagen' ../paraReporte)}}
				
					<td class="elementotabla col_imagen" > 
						{{ imagen }}
					</td>
				{{/if}}

				{{#if (ValCol 'Observacion' ../paraReporte)}}
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Comenta Factura' ../paraReporte)}}
				
					<td class="elementotabla col_comenta_factura" >{{{ getCheckBox comenta_factura 'form{{strSufijo}}-comenta_facturai' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Codigo Fabricante' ../paraReporte)}}
				
					<td class="elementotabla col_codigo_fabricante" > 
						{{ codigo_fabricante }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cantidad' ../paraReporte)}}
				
					<td class="elementotabla col_cantidad" > 
						{{ cantidad }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cantidad Minima' ../paraReporte)}}
				
					<td class="elementotabla col_cantidad_minima" > 
						{{ cantidad_minima }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cantidad Maxima' ../paraReporte)}}
				
					<td class="elementotabla col_cantidad_maxima" > 
						{{ cantidad_maxima }}
					</td>
				{{/if}}

				{{#if (ValCol 'Factura Sin Stock' ../paraReporte)}}
				
					<td class="elementotabla col_factura_sin_stock" >{{{ getCheckBox factura_sin_stock 'form{{strSufijo}}-factura_sin_stocki' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Mostrar Componente' ../paraReporte)}}
				
					<td class="elementotabla col_mostrar_componente" >{{{ getCheckBox mostrar_componente 'form{{strSufijo}}-mostrar_componentei' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Producto Equivalente' ../paraReporte)}}
				
					<td class="elementotabla col_producto_equivalente" >{{{ getCheckBox producto_equivalente 'form{{strSufijo}}-producto_equivalentei' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Avisa Expiracion' ../paraReporte)}}
				
					<td class="elementotabla col_avisa_expiracion" >{{{ getCheckBox avisa_expiracion 'form{{strSufijo}}-avisa_expiracioni' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Requiere No Serie' ../paraReporte)}}
				
					<td class="elementotabla col_requiere_serie" >{{{ getCheckBox requiere_serie 'form{{strSufijo}}-requiere_seriei' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Acepta Lote' ../paraReporte)}}
				
					<td class="elementotabla col_acepta_lote" >{{{ getCheckBox acepta_lote 'form{{strSufijo}}-acepta_lotei' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Cuenta Venta/Ingresos' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta_venta" > {{id_cuenta_venta_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Cuenta Compra/Activo/Inventario' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta_compra" > {{id_cuenta_compra_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Cuenta Costo' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta_costo" > {{id_cuenta_costo_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Valor Inventario' ../paraReporte)}}
				
					<td class="elementotabla col_valor_inventario" > 
						{{ valor_inventario }}
					</td>
				{{/if}}

				{{#if (ValCol 'Producto Fisico' ../paraReporte)}}
				
					<td class="elementotabla col_producto_fisico" > 
						{{ producto_fisico }}
					</td>
				{{/if}}

				{{#if (If_Not_AND_Not_AND_Not ../paraReporte  ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionimagen_producto" idactualproducto="{{id}}" title="Imagenes ProductoS DE Producto" src="{{PATH_IMAGEN}}/Imagenes/imagen_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionlista_cliente" idactualproducto="{{id}}" title="Lista ClienteS DE Producto" src="{{PATH_IMAGEN}}/Imagenes/lista_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionlista_precio" idactualproducto="{{id}}" title="Lista PreciosS DE Producto" src="{{PATH_IMAGEN}}/Imagenes/lista_precios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionlista_producto" idactualproducto="{{id}}" title="Lista ProductosS DE Producto" src="{{PATH_IMAGEN}}/Imagenes/lista_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionotro_suplidor" idactualproducto="{{id}}" title="Otro SuplidorS DE Producto" src="{{PATH_IMAGEN}}/Imagenes/otro_suplidors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionproducto_bodega" idactualproducto="{{id}}" title="Producto BodegaS DE Producto" src="{{PATH_IMAGEN}}/Imagenes/producto_bodegas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

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

