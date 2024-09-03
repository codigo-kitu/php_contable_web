



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
				<pre class="cabecera_texto_titulo_tabla">ID__.(*)</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:<?php echo($strPermisoEliminar) ?>">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio3.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio4.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad En Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad En Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Minima.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Acepta Lote.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Inventario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento3.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento4.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Fabricante.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Fisico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Situacion Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Componente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Sin Stock.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Avisa Expiracion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Con Precio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Equivalente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compra</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Venta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Inventario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Inventario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Suplidor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto1 En Ventas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto1 En Compras.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ultima Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Ventas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Compras.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio De Compra 0.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio Actualizado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Requiere Nro Serie.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Dolar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion Ventas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion Compras.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Notas.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">ID__.(*)</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:<?php echo($strPermisoEliminar) ?>">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio3.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio4.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad En Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad En Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Minima.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Acepta Lote.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Inventario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento3.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento4.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Fabricante.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Fisico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Situacion Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Componente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Sin Stock.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Avisa Expiracion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Con Precio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Equivalente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compra</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Venta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Inventario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Inventario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Suplidor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Impuesto Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto1 En Ventas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto1 En Compras.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ultima Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Ventas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Compras.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio De Compra 0.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio Actualizado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Requiere Nro Serie.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Dolar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion Ventas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion Compras.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Notas.(*)</pre>
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
								<img class="imgseleccionarlista_producto" idactuallista_producto="<?php echo($lista_producto->id) ?>" title="SELECCIONAR Lista Productos ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_eli col_id"  style="display:<?php echo($strPermisoEliminar) ?>">
					<a>
					<table>
						<tr>
							<td>
								<?php echo($lista_producto->id) ?>
							</td>
							<td>
								<img class="imgeliminartablalista_producto" idactuallista_producto="<?php echo($lista_producto->id) ?>" title="ELIMINAR Lista Productos ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>
				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($lista_producto->i) ?>" name="t-id_<?php echo($lista_producto->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Lista Productos ACTUAL" value="<?php echo($lista_producto->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($lista_producto->i) ?>_0" name="t-cel_<?php echo($lista_producto->i) ?>_0" type="text" maxlength="25" value="<?php echo($lista_producto->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $lista_producto->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $lista_producto->updated_at 
					</td>
				<td class="elementotabla col_id_producto" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_producto_Descripcion,$lista_producto->id_producto,'t-cel_'.$lista_producto->i.'_3')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_producto" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_4" name="t-cel_<?php echo($lista_producto->i) ?>_4" type="text" class="form-control"  placeholder="Codigo Producto"  title="Codigo Producto"    size="20"  maxlength="26" value="<?php echo($lista_producto->codigo_producto) ?>" />
							<span id="spanstrMensajecodigo_producto" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_producto" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_4" name="t-cel_<?php echo($lista_producto->i) ?>_4" type="text" class="form-control"  placeholder="Codigo Producto"  title="Codigo Producto"    size="20"  maxlength="26" value="<?php echo($lista_producto->codigo_producto) ?>" />
							<span id="spanstrMensajecodigo_producto" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion_producto" >  '<textarea id="t-cel_<?php echo($lista_producto->i) ?>_5" name="t-cel_<?php echo($lista_producto->i) ?>_5" class="form-control"  placeholder="Descripcion Producto"  title="Descripcion Producto"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($lista_producto->descripcion_producto) ?></textarea>
							<span id="spanstrMensajedescripcion_producto" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion_producto" >  '<input type="text" maxlength="70"  id="t-cel_<?php echo($lista_producto->i) ?>_5" name="t-cel_<?php echo($lista_producto->i) ?>_5" class="form-control"  placeholder="Descripcion Producto"  title="Descripcion Producto"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($lista_producto->descripcion_producto) ?></input>
							<span id="spanstrMensajedescripcion_producto" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_precio1" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_6" name="t-cel_<?php echo($lista_producto->i) ?>_6" type="text" class="form-control"  placeholder="Precio1"  title="Precio1"    maxlength="18" size="12"  value="<?php echo($lista_producto->precio1) ?>" >
							<span id="spanstrMensajeprecio1" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_precio2" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_7" name="t-cel_<?php echo($lista_producto->i) ?>_7" type="text" class="form-control"  placeholder="Precio2"  title="Precio2"    maxlength="18" size="12"  value="<?php echo($lista_producto->precio2) ?>" >
							<span id="spanstrMensajeprecio2" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_precio3" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_8" name="t-cel_<?php echo($lista_producto->i) ?>_8" type="text" class="form-control"  placeholder="Precio3"  title="Precio3"    maxlength="18" size="12"  value="<?php echo($lista_producto->precio3) ?>" >
							<span id="spanstrMensajeprecio3" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_precio4" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_9" name="t-cel_<?php echo($lista_producto->i) ?>_9" type="text" class="form-control"  placeholder="Precio4"  title="Precio4"    maxlength="18" size="12"  value="<?php echo($lista_producto->precio4) ?>" >
							<span id="spanstrMensajeprecio4" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_costo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_10" name="t-cel_<?php echo($lista_producto->i) ?>_10" type="text" class="form-control"  placeholder="Costo"  title="Costo"    maxlength="18" size="12"  value="<?php echo($lista_producto->costo) ?>" >
							<span id="spanstrMensajecosto" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_unidad_compra" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_unidad_compra_Descripcion,$lista_producto->id_unidad_compra,'t-cel_'.$lista_producto->i.'_11')) ?></td>
				
						<td class="elementotabla col_unidad_en_compra" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_12" name="t-cel_<?php echo($lista_producto->i) ?>_12" type="text" class="form-control"  placeholder="Unidad En Compra"  title="Unidad En Compra"    maxlength="10" size="10"  value="<?php echo($lista_producto->unidad_en_compra) ?>" >
							<span id="spanstrMensajeunidad_en_compra" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_equivalencia_en_compra" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_13" name="t-cel_<?php echo($lista_producto->i) ?>_13" type="text" class="form-control"  placeholder="Equivalencia En Compra"  title="Equivalencia En Compra"    maxlength="18" size="12"  value="<?php echo($lista_producto->equivalencia_en_compra) ?>" >
							<span id="spanstrMensajeequivalencia_en_compra" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_unidad_venta" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_unidad_venta_Descripcion,$lista_producto->id_unidad_venta,'t-cel_'.$lista_producto->i.'_14')) ?></td>
				
						<td class="elementotabla col_unidad_en_venta" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_15" name="t-cel_<?php echo($lista_producto->i) ?>_15" type="text" class="form-control"  placeholder="Unidad En Venta"  title="Unidad En Venta"    maxlength="10" size="10"  value="<?php echo($lista_producto->unidad_en_venta) ?>" >
							<span id="spanstrMensajeunidad_en_venta" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_equivalencia_en_venta" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_16" name="t-cel_<?php echo($lista_producto->i) ?>_16" type="text" class="form-control"  placeholder="Equivalencia En Venta"  title="Equivalencia En Venta"    maxlength="18" size="12"  value="<?php echo($lista_producto->equivalencia_en_venta) ?>" >
							<span id="spanstrMensajeequivalencia_en_venta" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_cantidad_total" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_17" name="t-cel_<?php echo($lista_producto->i) ?>_17" type="text" class="form-control"  placeholder="Cantidad Total"  title="Cantidad Total"    maxlength="18" size="12"  value="<?php echo($lista_producto->cantidad_total) ?>" >
							<span id="spanstrMensajecantidad_total" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_cantidad_minima" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_18" name="t-cel_<?php echo($lista_producto->i) ?>_18" type="text" class="form-control"  placeholder="Cantidad Minima"  title="Cantidad Minima"    maxlength="18" size="12"  value="<?php echo($lista_producto->cantidad_minima) ?>" >
							<span id="spanstrMensajecantidad_minima" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_categoria_producto" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_categoria_producto_Descripcion,$lista_producto->id_categoria_producto,'t-cel_'.$lista_producto->i.'_19')) ?></td>
				<td class="elementotabla col_id_sub_categoria_producto" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_sub_categoria_producto_Descripcion,$lista_producto->id_sub_categoria_producto,'t-cel_'.$lista_producto->i.'_20')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_acepta_lote" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_21" name="t-cel_<?php echo($lista_producto->i) ?>_21" type="text" class="form-control"  placeholder="Acepta Lote"  title="Acepta Lote"    size="2"  maxlength="2" value="<?php echo($lista_producto->acepta_lote) ?>" />
							<span id="spanstrMensajeacepta_lote" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_acepta_lote" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_21" name="t-cel_<?php echo($lista_producto->i) ?>_21" type="text" class="form-control"  placeholder="Acepta Lote"  title="Acepta Lote"    size="2"  maxlength="2" value="<?php echo($lista_producto->acepta_lote) ?>" />
							<span id="spanstrMensajeacepta_lote" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_valor_inventario" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_22" name="t-cel_<?php echo($lista_producto->i) ?>_22" type="text" class="form-control"  placeholder="Valor Inventario"  title="Valor Inventario"    maxlength="18" size="12"  value="<?php echo($lista_producto->valor_inventario) ?>" >
							<span id="spanstrMensajevalor_inventario" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_imagen" >  '<textarea id="t-cel_<?php echo($lista_producto->i) ?>_23" name="t-cel_<?php echo($lista_producto->i) ?>_23" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($lista_producto->imagen) ?></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_imagen" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($lista_producto->i) ?>_23" name="t-cel_<?php echo($lista_producto->i) ?>_23" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($lista_producto->imagen) ?></input>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_incremento1" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_24" name="t-cel_<?php echo($lista_producto->i) ?>_24" type="text" class="form-control"  placeholder="Incremento1"  title="Incremento1"    maxlength="18" size="12"  value="<?php echo($lista_producto->incremento1) ?>" >
							<span id="spanstrMensajeincremento1" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento2" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_25" name="t-cel_<?php echo($lista_producto->i) ?>_25" type="text" class="form-control"  placeholder="Incremento2"  title="Incremento2"    maxlength="18" size="12"  value="<?php echo($lista_producto->incremento2) ?>" >
							<span id="spanstrMensajeincremento2" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento3" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_26" name="t-cel_<?php echo($lista_producto->i) ?>_26" type="text" class="form-control"  placeholder="Incremento3"  title="Incremento3"    maxlength="18" size="12"  value="<?php echo($lista_producto->incremento3) ?>" >
							<span id="spanstrMensajeincremento3" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento4" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_27" name="t-cel_<?php echo($lista_producto->i) ?>_27" type="text" class="form-control"  placeholder="Incremento4"  title="Incremento4"    maxlength="18" size="12"  value="<?php echo($lista_producto->incremento4) ?>" >
							<span id="spanstrMensajeincremento4" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_fabricante" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_28" name="t-cel_<?php echo($lista_producto->i) ?>_28" type="text" class="form-control"  placeholder="Codigo Fabricante"  title="Codigo Fabricante"    size="20"  maxlength="24" value="<?php echo($lista_producto->codigo_fabricante) ?>" />
							<span id="spanstrMensajecodigo_fabricante" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_fabricante" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_28" name="t-cel_<?php echo($lista_producto->i) ?>_28" type="text" class="form-control"  placeholder="Codigo Fabricante"  title="Codigo Fabricante"    size="20"  maxlength="24" value="<?php echo($lista_producto->codigo_fabricante) ?>" />
							<span id="spanstrMensajecodigo_fabricante" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_producto_fisico" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_29" name="t-cel_<?php echo($lista_producto->i) ?>_29" type="text" class="form-control"  placeholder="Producto Fisico"  title="Producto Fisico"    maxlength="10" size="10"  value="<?php echo($lista_producto->producto_fisico) ?>" >
							<span id="spanstrMensajeproducto_fisico" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_situacion_producto" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_30" name="t-cel_<?php echo($lista_producto->i) ?>_30" type="text" class="form-control"  placeholder="Situacion Producto"  title="Situacion Producto"    maxlength="10" size="10"  value="<?php echo($lista_producto->situacion_producto) ?>" >
							<span id="spanstrMensajesituacion_producto" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_tipo_producto" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_tipo_producto_Descripcion,$lista_producto->id_tipo_producto,'t-cel_'.$lista_producto->i.'_31')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_tipo_producto_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_32" name="t-cel_<?php echo($lista_producto->i) ?>_32" type="text" class="form-control"  placeholder="Tipo Producto"  title="Tipo Producto"    size="1"  maxlength="1" value="<?php echo($lista_producto->tipo_producto_codigo) ?>" />
							<span id="spanstrMensajetipo_producto_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_tipo_producto_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_32" name="t-cel_<?php echo($lista_producto->i) ?>_32" type="text" class="form-control"  placeholder="Tipo Producto"  title="Tipo Producto"    size="1"  maxlength="1" value="<?php echo($lista_producto->tipo_producto_codigo) ?>" />
							<span id="spanstrMensajetipo_producto_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_bodega" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_bodega_Descripcion,$lista_producto->id_bodega,'t-cel_'.$lista_producto->i.'_33')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_mostrar_componente" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_34" name="t-cel_<?php echo($lista_producto->i) ?>_34" type="text" class="form-control"  placeholder="Mostrar Componente"  title="Mostrar Componente"    size="1"  maxlength="1" value="<?php echo($lista_producto->mostrar_componente) ?>" />
							<span id="spanstrMensajemostrar_componente" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_mostrar_componente" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_34" name="t-cel_<?php echo($lista_producto->i) ?>_34" type="text" class="form-control"  placeholder="Mostrar Componente"  title="Mostrar Componente"    size="1"  maxlength="1" value="<?php echo($lista_producto->mostrar_componente) ?>" />
							<span id="spanstrMensajemostrar_componente" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_factura_sin_stock" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_35" name="t-cel_<?php echo($lista_producto->i) ?>_35" type="text" class="form-control"  placeholder="Factura Sin Stock"  title="Factura Sin Stock"    size="2"  maxlength="2" value="<?php echo($lista_producto->factura_sin_stock) ?>" />
							<span id="spanstrMensajefactura_sin_stock" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_factura_sin_stock" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_35" name="t-cel_<?php echo($lista_producto->i) ?>_35" type="text" class="form-control"  placeholder="Factura Sin Stock"  title="Factura Sin Stock"    size="2"  maxlength="2" value="<?php echo($lista_producto->factura_sin_stock) ?>" />
							<span id="spanstrMensajefactura_sin_stock" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_avisa_expiracion" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_36" name="t-cel_<?php echo($lista_producto->i) ?>_36" type="text" class="form-control"  placeholder="Avisa Expiracion"  title="Avisa Expiracion"    size="2"  maxlength="2" value="<?php echo($lista_producto->avisa_expiracion) ?>" />
							<span id="spanstrMensajeavisa_expiracion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_avisa_expiracion" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_36" name="t-cel_<?php echo($lista_producto->i) ?>_36" type="text" class="form-control"  placeholder="Avisa Expiracion"  title="Avisa Expiracion"    size="2"  maxlength="2" value="<?php echo($lista_producto->avisa_expiracion) ?>" />
							<span id="spanstrMensajeavisa_expiracion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_factura_con_precio" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_37" name="t-cel_<?php echo($lista_producto->i) ?>_37" type="text" class="form-control"  placeholder="Factura Con Precio"  title="Factura Con Precio"    maxlength="10" size="10"  value="<?php echo($lista_producto->factura_con_precio) ?>" >
							<span id="spanstrMensajefactura_con_precio" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_producto_equivalente" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_38" name="t-cel_<?php echo($lista_producto->i) ?>_38" type="text" class="form-control"  placeholder="Producto Equivalente"  title="Producto Equivalente"    size="2"  maxlength="2" value="<?php echo($lista_producto->producto_equivalente) ?>" />
							<span id="spanstrMensajeproducto_equivalente" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_producto_equivalente" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_38" name="t-cel_<?php echo($lista_producto->i) ?>_38" type="text" class="form-control"  placeholder="Producto Equivalente"  title="Producto Equivalente"    size="2"  maxlength="2" value="<?php echo($lista_producto->producto_equivalente) ?>" />
							<span id="spanstrMensajeproducto_equivalente" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_cuenta_compra" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_cuenta_compra_Descripcion,$lista_producto->id_cuenta_compra,'t-cel_'.$lista_producto->i.'_39')) ?></td>
				<td class="elementotabla col_id_cuenta_venta" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_cuenta_venta_Descripcion,$lista_producto->id_cuenta_venta,'t-cel_'.$lista_producto->i.'_40')) ?></td>
				<td class="elementotabla col_id_cuenta_inventario" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_cuenta_inventario_Descripcion,$lista_producto->id_cuenta_inventario,'t-cel_'.$lista_producto->i.'_41')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_cuenta_compra_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_42" name="t-cel_<?php echo($lista_producto->i) ?>_42" type="text" class="form-control"  placeholder="Cuenta Compra"  title="Cuenta Compra"    size="14"  maxlength="14" value="<?php echo($lista_producto->cuenta_compra_codigo) ?>" />
							<span id="spanstrMensajecuenta_compra_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_cuenta_compra_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_42" name="t-cel_<?php echo($lista_producto->i) ?>_42" type="text" class="form-control"  placeholder="Cuenta Compra"  title="Cuenta Compra"    size="14"  maxlength="14" value="<?php echo($lista_producto->cuenta_compra_codigo) ?>" />
							<span id="spanstrMensajecuenta_compra_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_cuenta_venta_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_43" name="t-cel_<?php echo($lista_producto->i) ?>_43" type="text" class="form-control"  placeholder="Cuenta Venta"  title="Cuenta Venta"    size="14"  maxlength="14" value="<?php echo($lista_producto->cuenta_venta_codigo) ?>" />
							<span id="spanstrMensajecuenta_venta_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_cuenta_venta_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_43" name="t-cel_<?php echo($lista_producto->i) ?>_43" type="text" class="form-control"  placeholder="Cuenta Venta"  title="Cuenta Venta"    size="14"  maxlength="14" value="<?php echo($lista_producto->cuenta_venta_codigo) ?>" />
							<span id="spanstrMensajecuenta_venta_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_cuenta_inventario_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_44" name="t-cel_<?php echo($lista_producto->i) ?>_44" type="text" class="form-control"  placeholder="Cuenta Inventario"  title="Cuenta Inventario"    size="14"  maxlength="14" value="<?php echo($lista_producto->cuenta_inventario_codigo) ?>" />
							<span id="spanstrMensajecuenta_inventario_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_cuenta_inventario_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_44" name="t-cel_<?php echo($lista_producto->i) ?>_44" type="text" class="form-control"  placeholder="Cuenta Inventario"  title="Cuenta Inventario"    size="14"  maxlength="14" value="<?php echo($lista_producto->cuenta_inventario_codigo) ?>" />
							<span id="spanstrMensajecuenta_inventario_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_otro_suplidor" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_otro_suplidor_Descripcion,$lista_producto->id_otro_suplidor,'t-cel_'.$lista_producto->i.'_45')) ?></td>
				<td class="elementotabla col_id_impuesto" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_impuesto_Descripcion,$lista_producto->id_impuesto,'t-cel_'.$lista_producto->i.'_46')) ?></td>
				<td class="elementotabla col_id_impuesto_ventas" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_impuesto_ventas_Descripcion,$lista_producto->id_impuesto_ventas,'t-cel_'.$lista_producto->i.'_47')) ?></td>
				<td class="elementotabla col_id_impuesto_compras" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_impuesto_compras_Descripcion,$lista_producto->id_impuesto_compras,'t-cel_'.$lista_producto->i.'_48')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_impuesto1_en_ventas" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_49" name="t-cel_<?php echo($lista_producto->i) ?>_49" type="text" class="form-control"  placeholder="Impuesto1 En Ventas"  title="Impuesto1 En Ventas"    size="2"  maxlength="2" value="<?php echo($lista_producto->impuesto1_en_ventas) ?>" />
							<span id="spanstrMensajeimpuesto1_en_ventas" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_impuesto1_en_ventas" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_49" name="t-cel_<?php echo($lista_producto->i) ?>_49" type="text" class="form-control"  placeholder="Impuesto1 En Ventas"  title="Impuesto1 En Ventas"    size="2"  maxlength="2" value="<?php echo($lista_producto->impuesto1_en_ventas) ?>" />
							<span id="spanstrMensajeimpuesto1_en_ventas" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_impuesto1_en_compras" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_50" name="t-cel_<?php echo($lista_producto->i) ?>_50" type="text" class="form-control"  placeholder="Impuesto1 En Compras"  title="Impuesto1 En Compras"    size="2"  maxlength="2" value="<?php echo($lista_producto->impuesto1_en_compras) ?>" />
							<span id="spanstrMensajeimpuesto1_en_compras" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_impuesto1_en_compras" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_50" name="t-cel_<?php echo($lista_producto->i) ?>_50" type="text" class="form-control"  placeholder="Impuesto1 En Compras"  title="Impuesto1 En Compras"    size="2"  maxlength="2" value="<?php echo($lista_producto->impuesto1_en_compras) ?>" />
							<span id="spanstrMensajeimpuesto1_en_compras" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_ultima_venta" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_51" name="t-cel_<?php echo($lista_producto->i) ?>_51" type="text" class="form-control"  placeholder="Ultima Venta"  title="Ultima Venta"    size="10"  value="<?php echo($lista_producto->ultima_venta) ?>" >
							<span id="spanstrMensajeultima_venta" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_otro_impuesto" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_otro_impuesto_Descripcion,$lista_producto->id_otro_impuesto,'t-cel_'.$lista_producto->i.'_52')) ?></td>
				<td class="elementotabla col_id_otro_impuesto_ventas" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_otro_impuesto_ventas_Descripcion,$lista_producto->id_otro_impuesto_ventas,'t-cel_'.$lista_producto->i.'_53')) ?></td>
				<td class="elementotabla col_id_otro_impuesto_compras" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_otro_impuesto_compras_Descripcion,$lista_producto->id_otro_impuesto_compras,'t-cel_'.$lista_producto->i.'_54')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_otro_impuesto_ventas_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_55" name="t-cel_<?php echo($lista_producto->i) ?>_55" type="text" class="form-control"  placeholder="Otro Impuesto Ventas"  title="Otro Impuesto Ventas"    size="2"  maxlength="2" value="<?php echo($lista_producto->otro_impuesto_ventas_codigo) ?>" />
							<span id="spanstrMensajeotro_impuesto_ventas_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_otro_impuesto_ventas_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_55" name="t-cel_<?php echo($lista_producto->i) ?>_55" type="text" class="form-control"  placeholder="Otro Impuesto Ventas"  title="Otro Impuesto Ventas"    size="2"  maxlength="2" value="<?php echo($lista_producto->otro_impuesto_ventas_codigo) ?>" />
							<span id="spanstrMensajeotro_impuesto_ventas_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_otro_impuesto_compras_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_56" name="t-cel_<?php echo($lista_producto->i) ?>_56" type="text" class="form-control"  placeholder="Otro Impuesto Compras"  title="Otro Impuesto Compras"    size="2"  maxlength="2" value="<?php echo($lista_producto->otro_impuesto_compras_codigo) ?>" />
							<span id="spanstrMensajeotro_impuesto_compras_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_otro_impuesto_compras_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_56" name="t-cel_<?php echo($lista_producto->i) ?>_56" type="text" class="form-control"  placeholder="Otro Impuesto Compras"  title="Otro Impuesto Compras"    size="2"  maxlength="2" value="<?php echo($lista_producto->otro_impuesto_compras_codigo) ?>" />
							<span id="spanstrMensajeotro_impuesto_compras_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_precio_de_compra_0" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_57" name="t-cel_<?php echo($lista_producto->i) ?>_57" type="text" class="form-control"  placeholder="Precio De Compra 0"  title="Precio De Compra 0"    maxlength="18" size="12"  value="<?php echo($lista_producto->precio_de_compra_0) ?>" >
							<span id="spanstrMensajeprecio_de_compra_0" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_precio_actualizado" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_58" name="t-cel_<?php echo($lista_producto->i) ?>_58" type="text" class="form-control"  placeholder="Precio Actualizado"  title="Precio Actualizado"    size="10"  value="<?php echo($lista_producto->precio_actualizado) ?>" >
							<span id="spanstrMensajeprecio_actualizado" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_requiere_nro_serie" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_59" name="t-cel_<?php echo($lista_producto->i) ?>_59" type="text" class="form-control"  placeholder="Requiere Nro Serie"  title="Requiere Nro Serie"    size="1"  maxlength="1" value="<?php echo($lista_producto->requiere_nro_serie) ?>" />
							<span id="spanstrMensajerequiere_nro_serie" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_requiere_nro_serie" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_59" name="t-cel_<?php echo($lista_producto->i) ?>_59" type="text" class="form-control"  placeholder="Requiere Nro Serie"  title="Requiere Nro Serie"    size="1"  maxlength="1" value="<?php echo($lista_producto->requiere_nro_serie) ?>" />
							<span id="spanstrMensajerequiere_nro_serie" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_costo_dolar" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_60" name="t-cel_<?php echo($lista_producto->i) ?>_60" type="text" class="form-control"  placeholder="Costo Dolar"  title="Costo Dolar"    maxlength="18" size="12"  value="<?php echo($lista_producto->costo_dolar) ?>" >
							<span id="spanstrMensajecosto_dolar" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_comentario" >  '<textarea id="t-cel_<?php echo($lista_producto->i) ?>_61" name="t-cel_<?php echo($lista_producto->i) ?>_61" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($lista_producto->comentario) ?></textarea>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_comentario" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($lista_producto->i) ?>_61" name="t-cel_<?php echo($lista_producto->i) ?>_61" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($lista_producto->comentario) ?></input>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_comenta_factura" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_62" name="t-cel_<?php echo($lista_producto->i) ?>_62" type="text" class="form-control"  placeholder="Comenta Factura"  title="Comenta Factura"    size="2"  maxlength="2" value="<?php echo($lista_producto->comenta_factura) ?>" />
							<span id="spanstrMensajecomenta_factura" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_comenta_factura" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_62" name="t-cel_<?php echo($lista_producto->i) ?>_62" type="text" class="form-control"  placeholder="Comenta Factura"  title="Comenta Factura"    size="2"  maxlength="2" value="<?php echo($lista_producto->comenta_factura) ?>" />
							<span id="spanstrMensajecomenta_factura" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_retencion" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_retencion_Descripcion,$lista_producto->id_retencion,'t-cel_'.$lista_producto->i.'_63')) ?></td>
				<td class="elementotabla col_id_retencion_ventas" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_retencion_ventas_Descripcion,$lista_producto->id_retencion_ventas,'t-cel_'.$lista_producto->i.'_64')) ?></td>
				<td class="elementotabla col_id_retencion_compras" ><?php echo($funciones->getComboBoxEditar($lista_producto->id_retencion_compras_Descripcion,$lista_producto->id_retencion_compras,'t-cel_'.$lista_producto->i.'_65')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_retencion_ventas_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_66" name="t-cel_<?php echo($lista_producto->i) ?>_66" type="text" class="form-control"  placeholder="Retencion Ventas"  title="Retencion Ventas"    size="2"  maxlength="2" value="<?php echo($lista_producto->retencion_ventas_codigo) ?>" />
							<span id="spanstrMensajeretencion_ventas_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_retencion_ventas_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_66" name="t-cel_<?php echo($lista_producto->i) ?>_66" type="text" class="form-control"  placeholder="Retencion Ventas"  title="Retencion Ventas"    size="2"  maxlength="2" value="<?php echo($lista_producto->retencion_ventas_codigo) ?>" />
							<span id="spanstrMensajeretencion_ventas_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_retencion_compras_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_67" name="t-cel_<?php echo($lista_producto->i) ?>_67" type="text" class="form-control"  placeholder="Retencion Compras"  title="Retencion Compras"    size="2"  maxlength="2" value="<?php echo($lista_producto->retencion_compras_codigo) ?>" />
							<span id="spanstrMensajeretencion_compras_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_retencion_compras_codigo" >  '
							<input id="t-cel_<?php echo($lista_producto->i) ?>_67" name="t-cel_<?php echo($lista_producto->i) ?>_67" type="text" class="form-control"  placeholder="Retencion Compras"  title="Retencion Compras"    size="2"  maxlength="2" value="<?php echo($lista_producto->retencion_compras_codigo) ?>" />
							<span id="spanstrMensajeretencion_compras_codigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_notas" >  '<textarea id="t-cel_<?php echo($lista_producto->i) ?>_68" name="t-cel_<?php echo($lista_producto->i) ?>_68" class="form-control"  placeholder="Notas"  title="Notas"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($lista_producto->notas) ?></textarea>
							<span id="spanstrMensajenotas" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_notas" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($lista_producto->i) ?>_68" name="t-cel_<?php echo($lista_producto->i) ?>_68" class="form-control"  placeholder="Notas"  title="Notas"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($lista_producto->notas) ?></input>
							<span id="spanstrMensajenotas" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

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



