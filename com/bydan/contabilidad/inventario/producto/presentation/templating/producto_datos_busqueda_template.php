



		<form id="frmTablaDatosproducto" name="frmTablaDatosproducto">
			<div id="divTablaDatosAuxiliarproductosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($productos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloproducto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Productos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosproductos" name="tblTablaDatosproductos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Proveedores<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form$strSufijo-id_proveedor_img2" name="form$strSufijo-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form$strSufijo-id_proveedor_img_busqueda2" name="form$strSufijo-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_impuesto_img2" name="form$strSufijo-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form$strSufijo-id_impuesto_img_busqueda2" name="form$strSufijo-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_otro_impuesto_img2" name="form$strSufijo-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form$strSufijo-id_otro_impuesto_img_busqueda2" name="form$strSufijo-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto<a onclick="jQuery('#form-id_categoria_producto_img').trigger('click' );"><img id="form$strSufijo-id_categoria_producto_img2" name="form$strSufijo-id_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacategoria_producto('id_categoria_producto');"><img id="form$strSufijo-id_categoria_producto_img_busqueda2" name="form$strSufijo-id_categoria_producto_img_busqueda2" title="Buscar Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto<a onclick="jQuery('#form-id_sub_categoria_producto_img').trigger('click' );"><img id="form$strSufijo-id_sub_categoria_producto_img2" name="form$strSufijo-id_sub_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParasub_categoria_producto('id_sub_categoria_producto');"><img id="form$strSufijo-id_sub_categoria_producto_img_busqueda2" name="form$strSufijo-id_sub_categoria_producto_img_busqueda2" title="Buscar Sub Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega Defecto<a onclick="jQuery('#form-id_bodega_defecto_img').trigger('click' );"><img id="form$strSufijo-id_bodega_defecto_img2" name="form$strSufijo-id_bodega_defecto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParabodega('id_bodega_defecto');"><img id="form$strSufijo-id_bodega_defecto_img_busqueda2" name="form$strSufijo-id_bodega_defecto_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Compra<a onclick="jQuery('#form-id_unidad_compra_img').trigger('click' );"><img id="form$strSufijo-id_unidad_compra_img2" name="form$strSufijo-id_unidad_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_compra');"><img id="form$strSufijo-id_unidad_compra_img_busqueda2" name="form$strSufijo-id_unidad_compra_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Venta<a onclick="jQuery('#form-id_unidad_venta_img').trigger('click' );"><img id="form$strSufijo-id_unidad_venta_img2" name="form$strSufijo-id_unidad_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_venta');"><img id="form$strSufijo-id_unidad_venta_img_busqueda2" name="form$strSufijo-id_unidad_venta_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Venta/Ingresos<a onclick="jQuery('#form-id_cuenta_venta_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_venta_img2" name="form$strSufijo-id_cuenta_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_venta');"><img id="form$strSufijo-id_cuenta_venta_img_busqueda2" name="form$strSufijo-id_cuenta_venta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Compra/Activo/Inventario<a onclick="jQuery('#form-id_cuenta_compra_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_compra_img2" name="form$strSufijo-id_cuenta_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compra');"><img id="form$strSufijo-id_cuenta_compra_img_busqueda2" name="form$strSufijo-id_cuenta_compra_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Costo<a onclick="jQuery('#form-id_cuenta_costo_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_costo_img2" name="form$strSufijo-id_cuenta_costo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_costo');"><img id="form$strSufijo-id_cuenta_costo_img_busqueda2" name="form$strSufijo-id_cuenta_costo_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Proveedores<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form$strSufijo-id_proveedor_img2" name="form$strSufijo-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form$strSufijo-id_proveedor_img_busqueda2" name="form$strSufijo-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_impuesto_img2" name="form$strSufijo-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form$strSufijo-id_impuesto_img_busqueda2" name="form$strSufijo-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_otro_impuesto_img2" name="form$strSufijo-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form$strSufijo-id_otro_impuesto_img_busqueda2" name="form$strSufijo-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto<a onclick="jQuery('#form-id_categoria_producto_img').trigger('click' );"><img id="form$strSufijo-id_categoria_producto_img2" name="form$strSufijo-id_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacategoria_producto('id_categoria_producto');"><img id="form$strSufijo-id_categoria_producto_img_busqueda2" name="form$strSufijo-id_categoria_producto_img_busqueda2" title="Buscar Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto<a onclick="jQuery('#form-id_sub_categoria_producto_img').trigger('click' );"><img id="form$strSufijo-id_sub_categoria_producto_img2" name="form$strSufijo-id_sub_categoria_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParasub_categoria_producto('id_sub_categoria_producto');"><img id="form$strSufijo-id_sub_categoria_producto_img_busqueda2" name="form$strSufijo-id_sub_categoria_producto_img_busqueda2" title="Buscar Sub Categoria Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega Defecto<a onclick="jQuery('#form-id_bodega_defecto_img').trigger('click' );"><img id="form$strSufijo-id_bodega_defecto_img2" name="form$strSufijo-id_bodega_defecto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParabodega('id_bodega_defecto');"><img id="form$strSufijo-id_bodega_defecto_img_busqueda2" name="form$strSufijo-id_bodega_defecto_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Compra<a onclick="jQuery('#form-id_unidad_compra_img').trigger('click' );"><img id="form$strSufijo-id_unidad_compra_img2" name="form$strSufijo-id_unidad_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_compra');"><img id="form$strSufijo-id_unidad_compra_img_busqueda2" name="form$strSufijo-id_unidad_compra_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Venta<a onclick="jQuery('#form-id_unidad_venta_img').trigger('click' );"><img id="form$strSufijo-id_unidad_venta_img2" name="form$strSufijo-id_unidad_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParaunidad('id_unidad_venta');"><img id="form$strSufijo-id_unidad_venta_img_busqueda2" name="form$strSufijo-id_unidad_venta_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Venta/Ingresos<a onclick="jQuery('#form-id_cuenta_venta_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_venta_img2" name="form$strSufijo-id_cuenta_venta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_venta');"><img id="form$strSufijo-id_cuenta_venta_img_busqueda2" name="form$strSufijo-id_cuenta_venta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Compra/Activo/Inventario<a onclick="jQuery('#form-id_cuenta_compra_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_compra_img2" name="form$strSufijo-id_cuenta_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compra');"><img id="form$strSufijo-id_cuenta_compra_img_busqueda2" name="form$strSufijo-id_cuenta_compra_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Costo<a onclick="jQuery('#form-id_cuenta_costo_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_costo_img2" name="form$strSufijo-id_cuenta_costo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_webcontrol1.abrirBusquedaParacuenta('id_cuenta_costo');"><img id="form$strSufijo-id_cuenta_costo_img_busqueda2" name="form$strSufijo-id_cuenta_costo_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
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

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($productosLocal!=null && count($productosLocal)>0) { ?>
			<?php foreach ($productosLocal as $producto) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($producto->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$producto->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($producto->id) ?>
							</td>
							<td>
								<img class="imgseleccionarproducto" idactualproducto="<?php echo($producto->id) ?>"  funcionjsactualproducto="'.str_replace('TO_REPLACE',$producto->id.',\''.producto_util::getproductoDescripcion($producto).'\'',$this->strFuncionJs).'" title="SELECCIONAR Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Producto ACTUAL" value="<?php echo($producto->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($producto->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $producto->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $producto->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($producto->id_empresa_Descripcion) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_proveedor" > <?php echo($producto->id_proveedor_Descripcion) ?></td>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $producto->codigo ) ?>
					</td>
				
					<td class="elementotabla col_nombre" > 
						<?php echo( $producto->nombre ) ?>
					</td>
				
					<td class="elementotabla col_costo" > 
						<?php echo( $producto->costo ) ?>
					</td>
				
					<td class="elementotabla col_activo" ><?php  $funciones->getCheckBox($producto->activo,'form<?php echo($strSufijo) ?>-activoi',$paraReporte)  ?>
					</td>
				<td class="elementotabla col_id_tipo_producto" > <?php echo($producto->id_tipo_producto_Descripcion) ?></td>
				
					<td class="elementotabla col_cantidad_inicial" > 
						<?php echo( $producto->cantidad_inicial ) ?>
					</td>
				<td class="elementotabla col_id_impuesto" > <?php echo($producto->id_impuesto_Descripcion) ?></td>
				<td class="elementotabla col_id_otro_impuesto" > <?php echo($producto->id_otro_impuesto_Descripcion) ?></td>
				<td class="elementotabla col_id_categoria_producto" > <?php echo($producto->id_categoria_producto_Descripcion) ?></td>
				<td class="elementotabla col_id_sub_categoria_producto" > <?php echo($producto->id_sub_categoria_producto_Descripcion) ?></td>
				<td class="elementotabla col_id_bodega_defecto" > <?php echo($producto->id_bodega_defecto_Descripcion) ?></td>
				<td class="elementotabla col_id_unidad_compra" > <?php echo($producto->id_unidad_compra_Descripcion) ?></td>
				<td class="elementotabla col_id_unidad_venta" > <?php echo($producto->id_unidad_venta_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta_venta" > <?php echo($producto->id_cuenta_venta_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta_compra" > <?php echo($producto->id_cuenta_compra_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta_costo" > <?php echo($producto->id_cuenta_costo_Descripcion) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionimagen_producto" idactualproducto="<?php echo($producto->id) ?>" title="Imagenes ProductoS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/imagen_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionlista_cliente" idactualproducto="<?php echo($producto->id) ?>" title="Lista ClienteS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionlista_precio" idactualproducto="<?php echo($producto->id) ?>" title="Lista PreciosS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_precios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionlista_producto" idactualproducto="<?php echo($producto->id) ?>" title="Lista ProductosS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionotro_suplidor" idactualproducto="<?php echo($producto->id) ?>" title="Otro SuplidorS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/otro_suplidors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionproducto_bodega" idactualproducto="<?php echo($producto->id) ?>" title="Producto BodegaS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/producto_bodegas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				<?php } ?>

				<td style="display:none" class="actions"></td>

				</tr>
			<?php } ?>
		<?php } ?>

					</tbody>

				</table>

			</div>

		</form>



