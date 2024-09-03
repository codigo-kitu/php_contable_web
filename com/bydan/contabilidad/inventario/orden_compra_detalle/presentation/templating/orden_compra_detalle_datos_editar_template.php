



		<form id="frmTablaDatosorden_compra_detalle" name="frmTablaDatosorden_compra_detalle">
			<div id="divTablaDatosAuxiliarorden_compra_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($orden_compra_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloorden_compra_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Compras Detalles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosorden_compra_detalles" name="tblTablaDatosorden_compra_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Orden Compra</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Recibido.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Orden Compra</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Recibido.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($orden_compra_detallesLocal!=null && count($orden_compra_detallesLocal)>0) { ?>
			<?php foreach ($orden_compra_detallesLocal as $orden_compra_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($orden_compra_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$orden_compra_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($orden_compra_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionarorden_compra_detalle" idactualorden_compra_detalle="<?php echo($orden_compra_detalle->id) ?>" title="SELECCIONAR Compras Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($orden_compra_detalle->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaorden_compra_detalle" idactualorden_compra_detalle="<?php echo($orden_compra_detalle->id) ?>" title="ELIMINAR Compras Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($orden_compra_detalle->i) ?>" name="t-id_<?php echo($orden_compra_detalle->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Compras Detalle ACTUAL" value="<?php echo($orden_compra_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($orden_compra_detalle->i) ?>_0" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_0" type="text" maxlength="25" value="<?php echo($orden_compra_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $orden_compra_detalle->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $orden_compra_detalle->updated_at 
					</td>
				<td class="elementotabla col_id_orden_compra" ><?php echo($funciones->getComboBoxEditar($orden_compra_detalle->id_orden_compra_Descripcion,$orden_compra_detalle->id_orden_compra,'t-cel_'.$orden_compra_detalle->i.'_3')) ?></td>
				<td class="elementotabla col_id_bodega" ><?php echo($funciones->getComboBoxEditar($orden_compra_detalle->id_bodega_Descripcion,$orden_compra_detalle->id_bodega,'t-cel_'.$orden_compra_detalle->i.'_4')) ?></td>
				<td class="elementotabla col_id_producto" ><?php echo($funciones->getComboBoxEditar($orden_compra_detalle->id_producto_Descripcion,$orden_compra_detalle->id_producto,'t-cel_'.$orden_compra_detalle->i.'_5')) ?></td>
				<td class="elementotabla col_id_unidad" ><?php echo($funciones->getComboBoxEditar($orden_compra_detalle->id_unidad_Descripcion,$orden_compra_detalle->id_unidad,'t-cel_'.$orden_compra_detalle->i.'_6')) ?></td>
				
						<td class="elementotabla col_cantidad" >  '
							<input id="t-cel_<?php echo($orden_compra_detalle->i) ?>_7" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_7" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12"  value="<?php echo($orden_compra_detalle->cantidad) ?>" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_precio" >  '
							<input id="t-cel_<?php echo($orden_compra_detalle->i) ?>_8" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_8" type="text" class="form-control"  placeholder="Precio"  title="Precio"    maxlength="18" size="12"  value="<?php echo($orden_compra_detalle->precio) ?>" >
							<span id="spanstrMensajeprecio" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_sub_total" >  '
							<input id="t-cel_<?php echo($orden_compra_detalle->i) ?>_9" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_9" type="text" class="form-control"  placeholder="Sub Total"  title="Sub Total"    maxlength="18" size="12"  value="<?php echo($orden_compra_detalle->sub_total) ?>" >
							<span id="spanstrMensajesub_total" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_descuento_porciento" >  '
							<input id="t-cel_<?php echo($orden_compra_detalle->i) ?>_10" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_10" type="text" class="form-control"  placeholder="Descuento %"  title="Descuento %"    maxlength="18" size="12"  value="<?php echo($orden_compra_detalle->descuento_porciento) ?>" >
							<span id="spanstrMensajedescuento_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_descuento_monto" >  '
							<input id="t-cel_<?php echo($orden_compra_detalle->i) ?>_11" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_11" type="text" class="form-control"  placeholder="Descuento"  title="Descuento"    maxlength="18" size="12"  value="<?php echo($orden_compra_detalle->descuento_monto) ?>" >
							<span id="spanstrMensajedescuento_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_iva_porciento" >  '
							<input id="t-cel_<?php echo($orden_compra_detalle->i) ?>_12" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_12" type="text" class="form-control"  placeholder="Iva %"  title="Iva %"    maxlength="18" size="12"  value="<?php echo($orden_compra_detalle->iva_porciento) ?>" >
							<span id="spanstrMensajeiva_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_iva_monto" >  '
							<input id="t-cel_<?php echo($orden_compra_detalle->i) ?>_13" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_13" type="text" class="form-control"  placeholder="Iva"  title="Iva"    maxlength="18" size="12"  value="<?php echo($orden_compra_detalle->iva_monto) ?>" >
							<span id="spanstrMensajeiva_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_total" >  '
							<input id="t-cel_<?php echo($orden_compra_detalle->i) ?>_14" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_14" type="text" class="form-control"  placeholder="Total"  title="Total"    maxlength="18" size="12"  value="<?php echo($orden_compra_detalle->total) ?>" >
							<span id="spanstrMensajetotal" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_observacion" >  '<textarea id="t-cel_<?php echo($orden_compra_detalle->i) ?>_15" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_15" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($orden_compra_detalle->observacion) ?></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_observacion" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($orden_compra_detalle->i) ?>_15" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_15" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($orden_compra_detalle->observacion) ?></input>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_recibido" >  '
							<input id="t-cel_<?php echo($orden_compra_detalle->i) ?>_16" name="t-cel_<?php echo($orden_compra_detalle->i) ?>_16" type="text" class="form-control"  placeholder="Recibido"  title="Recibido"    maxlength="18" size="12"  value="<?php echo($orden_compra_detalle->recibido) ?>" >
							<span id="spanstrMensajerecibido" class="mensajeerror"></span>' 
						</td>

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



