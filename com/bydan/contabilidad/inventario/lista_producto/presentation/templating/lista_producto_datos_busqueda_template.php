



		<form id="frmTablaDatoslista_producto" name="frmTablaDatoslista_producto">
			<div id="divTablaDatosAuxiliarlista_productosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($lista_productos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulolista_producto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Lista Productoses</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoslista_productos" name="tblTablaDatoslista_productos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

		<?php if($IS_DEVELOPING && !$bitEsRelacionado) { ?>
			<caption>(<?php echo($STR_PREFIJO_TABLE.$STR_TABLE_NAME) ?>)</caption>
		<?php } ?>

		
			<thead>
				<tr class="<?php echo($class_cabecera) ?>">
		<?php // class="cabeceratabla" ?>

				<?php //EN UNA LINEA PRIMERO COLUMNAS(ID,ELIMINAR,SELECCIONAR) ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form$strSufijo-id_producto_img2" name="form$strSufijo-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form$strSufijo-id_producto_img_busqueda2" name="form$strSufijo-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio3</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Compra<a onclick="jQuery('#form-id_unidad_compra_img').trigger('click' );"><img id="form$strSufijo-id_unidad_compra_img2" name="form$strSufijo-id_unidad_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_compra');"><img id="form$strSufijo-id_unidad_compra_img_busqueda2" name="form$strSufijo-id_unidad_compra_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Venta<a onclick="jQuery('#form-id_unidad_venta_img').trigger('click' );"><img id="form$strSufijo-id_unidad_venta_img2" name="form$strSufijo-id_unidad_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_venta');"><img id="form$strSufijo-id_unidad_venta_img_busqueda2" name="form$strSufijo-id_unidad_venta_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto<a onclick="jQuery('#form-id_categoria_producto_img').trigger('click' );"><img id="form$strSufijo-id_categoria_producto_img2" name="form$strSufijo-id_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacategoria_producto('id_categoria_producto');"><img id="form$strSufijo-id_categoria_producto_img_busqueda2" name="form$strSufijo-id_categoria_producto_img_busqueda2" title="Buscar Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto<a onclick="jQuery('#form-id_sub_categoria_producto_img').trigger('click' );"><img id="form$strSufijo-id_sub_categoria_producto_img2" name="form$strSufijo-id_sub_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParasub_categoria_producto('id_sub_categoria_producto');"><img id="form$strSufijo-id_sub_categoria_producto_img_busqueda2" name="form$strSufijo-id_sub_categoria_producto_img_busqueda2" title="Buscar Sub Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form$strSufijo-id_bodega_img2" name="form$strSufijo-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form$strSufijo-id_bodega_img_busqueda2" name="form$strSufijo-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compra<a onclick="jQuery('#form-id_cuenta_compra_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_compra_img2" name="form$strSufijo-id_cuenta_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compra');"><img id="form$strSufijo-id_cuenta_compra_img_busqueda2" name="form$strSufijo-id_cuenta_compra_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Venta<a onclick="jQuery('#form-id_cuenta_venta_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_venta_img2" name="form$strSufijo-id_cuenta_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_venta');"><img id="form$strSufijo-id_cuenta_venta_img_busqueda2" name="form$strSufijo-id_cuenta_venta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Inventario<a onclick="jQuery('#form-id_cuenta_inventario_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_inventario_img2" name="form$strSufijo-id_cuenta_inventario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_inventario');"><img id="form$strSufijo-id_cuenta_inventario_img_busqueda2" name="form$strSufijo-id_cuenta_inventario_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Suplidor<a onclick="jQuery('#form-id_otro_suplidor_img').trigger('click' );"><img id="form$strSufijo-id_otro_suplidor_img2" name="form$strSufijo-id_otro_suplidor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_suplidor('id_otro_suplidor');"><img id="form$strSufijo-id_otro_suplidor_img_busqueda2" name="form$strSufijo-id_otro_suplidor_img_busqueda2" title="Buscar Otro Suplidor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_impuesto_img2" name="form$strSufijo-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form$strSufijo-id_impuesto_img_busqueda2" name="form$strSufijo-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Ventas<a onclick="jQuery('#form-id_impuesto_ventas_img').trigger('click' );"><img id="form$strSufijo-id_impuesto_ventas_img2" name="form$strSufijo-id_impuesto_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto_ventas');"><img id="form$strSufijo-id_impuesto_ventas_img_busqueda2" name="form$strSufijo-id_impuesto_ventas_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Compras<a onclick="jQuery('#form-id_impuesto_compras_img').trigger('click' );"><img id="form$strSufijo-id_impuesto_compras_img2" name="form$strSufijo-id_impuesto_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto_compras');"><img id="form$strSufijo-id_impuesto_compras_img_busqueda2" name="form$strSufijo-id_impuesto_compras_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_otro_impuesto_img2" name="form$strSufijo-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form$strSufijo-id_otro_impuesto_img_busqueda2" name="form$strSufijo-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Ventas<a onclick="jQuery('#form-id_otro_impuesto_ventas_img').trigger('click' );"><img id="form$strSufijo-id_otro_impuesto_ventas_img2" name="form$strSufijo-id_otro_impuesto_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto_ventas');"><img id="form$strSufijo-id_otro_impuesto_ventas_img_busqueda2" name="form$strSufijo-id_otro_impuesto_ventas_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Compras<a onclick="jQuery('#form-id_otro_impuesto_compras_img').trigger('click' );"><img id="form$strSufijo-id_otro_impuesto_compras_img2" name="form$strSufijo-id_otro_impuesto_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto_compras');"><img id="form$strSufijo-id_otro_impuesto_compras_img_busqueda2" name="form$strSufijo-id_otro_impuesto_compras_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form$strSufijo-id_retencion_img2" name="form$strSufijo-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form$strSufijo-id_retencion_img_busqueda2" name="form$strSufijo-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ventas<a onclick="jQuery('#form-id_retencion_ventas_img').trigger('click' );"><img id="form$strSufijo-id_retencion_ventas_img2" name="form$strSufijo-id_retencion_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion_ventas');"><img id="form$strSufijo-id_retencion_ventas_img_busqueda2" name="form$strSufijo-id_retencion_ventas_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Compras<a onclick="jQuery('#form-id_retencion_compras_img').trigger('click' );"><img id="form$strSufijo-id_retencion_compras_img2" name="form$strSufijo-id_retencion_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion_compras');"><img id="form$strSufijo-id_retencion_compras_img_busqueda2" name="form$strSufijo-id_retencion_compras_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</thead>
		<?php if(!$bitEsRelacionado) { ?>

		
			<tfoot>
				<tr class="<?php echo($class_cabecera) ?>">
		<?php // class="cabeceratabla" ?>

				<?php //EN UNA LINEA PRIMERO COLUMNAS(ID,ELIMINAR,SELECCIONAR) ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form$strSufijo-id_producto_img2" name="form$strSufijo-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form$strSufijo-id_producto_img_busqueda2" name="form$strSufijo-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio3</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Compra<a onclick="jQuery('#form-id_unidad_compra_img').trigger('click' );"><img id="form$strSufijo-id_unidad_compra_img2" name="form$strSufijo-id_unidad_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_compra');"><img id="form$strSufijo-id_unidad_compra_img_busqueda2" name="form$strSufijo-id_unidad_compra_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Venta<a onclick="jQuery('#form-id_unidad_venta_img').trigger('click' );"><img id="form$strSufijo-id_unidad_venta_img2" name="form$strSufijo-id_unidad_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_venta');"><img id="form$strSufijo-id_unidad_venta_img_busqueda2" name="form$strSufijo-id_unidad_venta_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto<a onclick="jQuery('#form-id_categoria_producto_img').trigger('click' );"><img id="form$strSufijo-id_categoria_producto_img2" name="form$strSufijo-id_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacategoria_producto('id_categoria_producto');"><img id="form$strSufijo-id_categoria_producto_img_busqueda2" name="form$strSufijo-id_categoria_producto_img_busqueda2" title="Buscar Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto<a onclick="jQuery('#form-id_sub_categoria_producto_img').trigger('click' );"><img id="form$strSufijo-id_sub_categoria_producto_img2" name="form$strSufijo-id_sub_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParasub_categoria_producto('id_sub_categoria_producto');"><img id="form$strSufijo-id_sub_categoria_producto_img_busqueda2" name="form$strSufijo-id_sub_categoria_producto_img_busqueda2" title="Buscar Sub Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form$strSufijo-id_bodega_img2" name="form$strSufijo-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form$strSufijo-id_bodega_img_busqueda2" name="form$strSufijo-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compra<a onclick="jQuery('#form-id_cuenta_compra_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_compra_img2" name="form$strSufijo-id_cuenta_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compra');"><img id="form$strSufijo-id_cuenta_compra_img_busqueda2" name="form$strSufijo-id_cuenta_compra_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Venta<a onclick="jQuery('#form-id_cuenta_venta_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_venta_img2" name="form$strSufijo-id_cuenta_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_venta');"><img id="form$strSufijo-id_cuenta_venta_img_busqueda2" name="form$strSufijo-id_cuenta_venta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Inventario<a onclick="jQuery('#form-id_cuenta_inventario_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_inventario_img2" name="form$strSufijo-id_cuenta_inventario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_inventario');"><img id="form$strSufijo-id_cuenta_inventario_img_busqueda2" name="form$strSufijo-id_cuenta_inventario_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Suplidor<a onclick="jQuery('#form-id_otro_suplidor_img').trigger('click' );"><img id="form$strSufijo-id_otro_suplidor_img2" name="form$strSufijo-id_otro_suplidor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_suplidor('id_otro_suplidor');"><img id="form$strSufijo-id_otro_suplidor_img_busqueda2" name="form$strSufijo-id_otro_suplidor_img_busqueda2" title="Buscar Otro Suplidor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_impuesto_img2" name="form$strSufijo-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form$strSufijo-id_impuesto_img_busqueda2" name="form$strSufijo-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Ventas<a onclick="jQuery('#form-id_impuesto_ventas_img').trigger('click' );"><img id="form$strSufijo-id_impuesto_ventas_img2" name="form$strSufijo-id_impuesto_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto_ventas');"><img id="form$strSufijo-id_impuesto_ventas_img_busqueda2" name="form$strSufijo-id_impuesto_ventas_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Compras<a onclick="jQuery('#form-id_impuesto_compras_img').trigger('click' );"><img id="form$strSufijo-id_impuesto_compras_img2" name="form$strSufijo-id_impuesto_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto_compras');"><img id="form$strSufijo-id_impuesto_compras_img_busqueda2" name="form$strSufijo-id_impuesto_compras_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_otro_impuesto_img2" name="form$strSufijo-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form$strSufijo-id_otro_impuesto_img_busqueda2" name="form$strSufijo-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Ventas<a onclick="jQuery('#form-id_otro_impuesto_ventas_img').trigger('click' );"><img id="form$strSufijo-id_otro_impuesto_ventas_img2" name="form$strSufijo-id_otro_impuesto_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto_ventas');"><img id="form$strSufijo-id_otro_impuesto_ventas_img_busqueda2" name="form$strSufijo-id_otro_impuesto_ventas_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Compras<a onclick="jQuery('#form-id_otro_impuesto_compras_img').trigger('click' );"><img id="form$strSufijo-id_otro_impuesto_compras_img2" name="form$strSufijo-id_otro_impuesto_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto_compras');"><img id="form$strSufijo-id_otro_impuesto_compras_img_busqueda2" name="form$strSufijo-id_otro_impuesto_compras_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form$strSufijo-id_retencion_img2" name="form$strSufijo-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form$strSufijo-id_retencion_img_busqueda2" name="form$strSufijo-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ventas<a onclick="jQuery('#form-id_retencion_ventas_img').trigger('click' );"><img id="form$strSufijo-id_retencion_ventas_img2" name="form$strSufijo-id_retencion_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion_ventas');"><img id="form$strSufijo-id_retencion_ventas_img_busqueda2" name="form$strSufijo-id_retencion_ventas_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Compras<a onclick="jQuery('#form-id_retencion_compras_img').trigger('click' );"><img id="form$strSufijo-id_retencion_compras_img2" name="form$strSufijo-id_retencion_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lista_producto_webcontrol1.abrirBusquedaPararetencion('id_retencion_compras');"><img id="form$strSufijo-id_retencion_compras_img_busqueda2" name="form$strSufijo-id_retencion_compras_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($lista_productosLocal!=null && count($lista_productosLocal)>0) { ?>
			<?php foreach ($lista_productosLocal as $lista_producto) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($lista_producto->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$lista_producto->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($lista_producto->id) ?>
							</td>
							<td>
								<img class="imgseleccionarlista_producto" idactuallista_producto="<?php echo($lista_producto->id) ?>"  funcionjsactuallista_producto="'.str_replace('TO_REPLACE',$lista_producto->id.',\''.lista_producto_util::getlista_productoDescripcion($lista_producto).'\'',$this->strFuncionJs).'" title="SELECCIONAR Lista Productos ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Lista Productos ACTUAL" value="<?php echo($lista_producto->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($lista_producto->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $lista_producto->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $lista_producto->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_producto" > <?php echo($lista_producto->id_producto_Descripcion) ?></td>
				
					<td class="elementotabla col_codigo_producto" > 
						<?php echo( $lista_producto->codigo_producto ) ?>
					</td>
				
					<td class="elementotabla col_descripcion_producto" > 
						<?php echo( $lista_producto->descripcion_producto ) ?>
					</td>
				
					<td class="elementotabla col_precio1" > 
						<?php echo( $lista_producto->precio1 ) ?>
					</td>
				
					<td class="elementotabla col_precio2" > 
						<?php echo( $lista_producto->precio2 ) ?>
					</td>
				
					<td class="elementotabla col_precio3" > 
						<?php echo( $lista_producto->precio3 ) ?>
					</td>
				<td class="elementotabla col_id_unidad_compra" > <?php echo($lista_producto->id_unidad_compra_Descripcion) ?></td>
				<td class="elementotabla col_id_unidad_venta" > <?php echo($lista_producto->id_unidad_venta_Descripcion) ?></td>
				<td class="elementotabla col_id_categoria_producto" > <?php echo($lista_producto->id_categoria_producto_Descripcion) ?></td>
				<td class="elementotabla col_id_sub_categoria_producto" > <?php echo($lista_producto->id_sub_categoria_producto_Descripcion) ?></td>
				<td class="elementotabla col_id_tipo_producto" > <?php echo($lista_producto->id_tipo_producto_Descripcion) ?></td>
				<td class="elementotabla col_id_bodega" > <?php echo($lista_producto->id_bodega_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta_compra" > <?php echo($lista_producto->id_cuenta_compra_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta_venta" > <?php echo($lista_producto->id_cuenta_venta_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta_inventario" > <?php echo($lista_producto->id_cuenta_inventario_Descripcion) ?></td>
				<td class="elementotabla col_id_otro_suplidor" > <?php echo($lista_producto->id_otro_suplidor_Descripcion) ?></td>
				<td class="elementotabla col_id_impuesto" > <?php echo($lista_producto->id_impuesto_Descripcion) ?></td>
				<td class="elementotabla col_id_impuesto_ventas" > <?php echo($lista_producto->id_impuesto_ventas_Descripcion) ?></td>
				<td class="elementotabla col_id_impuesto_compras" > <?php echo($lista_producto->id_impuesto_compras_Descripcion) ?></td>
				<td class="elementotabla col_id_otro_impuesto" > <?php echo($lista_producto->id_otro_impuesto_Descripcion) ?></td>
				<td class="elementotabla col_id_otro_impuesto_ventas" > <?php echo($lista_producto->id_otro_impuesto_ventas_Descripcion) ?></td>
				<td class="elementotabla col_id_otro_impuesto_compras" > <?php echo($lista_producto->id_otro_impuesto_compras_Descripcion) ?></td>
				<td class="elementotabla col_id_retencion" > <?php echo($lista_producto->id_retencion_Descripcion) ?></td>
				<td class="elementotabla col_id_retencion_ventas" > <?php echo($lista_producto->id_retencion_ventas_Descripcion) ?></td>
				<td class="elementotabla col_id_retencion_compras" > <?php echo($lista_producto->id_retencion_compras_Descripcion) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				<?php } ?>

				<td style="display:none" class="actions"></td>

				</tr>
			<?php } ?>
		<?php } ?>

					</tbody>

				</table>

			</div>

		</form>



