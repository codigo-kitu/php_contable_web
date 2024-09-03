



		<form id="frmTablaDatosdevolucion_detalle" name="frmTablaDatosdevolucion_detalle">
			<div id="divTablaDatosAuxiliardevolucion_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($devolucion_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulodevolucion_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Devolucion Detalles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosdevolucion_detalles" name="tblTablaDatosdevolucion_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Devolucion</pre>
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
				<pre class="cabecera_texto_titulo_tabla">No Item.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Devolucion</pre>
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
				<pre class="cabecera_texto_titulo_tabla">No Item.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($devolucion_detallesLocal!=null && count($devolucion_detallesLocal)>0) { ?>
			<?php foreach ($devolucion_detallesLocal as $devolucion_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($devolucion_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$devolucion_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($devolucion_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionardevolucion_detalle" idactualdevolucion_detalle="<?php echo($devolucion_detalle->id) ?>" title="SELECCIONAR Devolucion Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($devolucion_detalle->id) ?>
							</td>
							<td>
								<img class="imgeliminartabladevolucion_detalle" idactualdevolucion_detalle="<?php echo($devolucion_detalle->id) ?>" title="ELIMINAR Devolucion Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($devolucion_detalle->i) ?>" name="t-id_<?php echo($devolucion_detalle->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Devolucion Detalle ACTUAL" value="<?php echo($devolucion_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($devolucion_detalle->i) ?>_0" name="t-cel_<?php echo($devolucion_detalle->i) ?>_0" type="text" maxlength="25" value="<?php echo($devolucion_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $devolucion_detalle->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $devolucion_detalle->updated_at 
					</td>
				<td class="elementotabla col_id_devolucion" ><?php echo($funciones->getComboBoxEditar($devolucion_detalle->id_devolucion_Descripcion,$devolucion_detalle->id_devolucion,'t-cel_'.$devolucion_detalle->i.'_3')) ?></td>
				<td class="elementotabla col_id_bodega" ><?php echo($funciones->getComboBoxEditar($devolucion_detalle->id_bodega_Descripcion,$devolucion_detalle->id_bodega,'t-cel_'.$devolucion_detalle->i.'_4')) ?></td>
				<td class="elementotabla col_id_producto" ><?php echo($funciones->getComboBoxEditar($devolucion_detalle->id_producto_Descripcion,$devolucion_detalle->id_producto,'t-cel_'.$devolucion_detalle->i.'_5')) ?></td>
				<td class="elementotabla col_id_unidad" ><?php echo($funciones->getComboBoxEditar($devolucion_detalle->id_unidad_Descripcion,$devolucion_detalle->id_unidad,'t-cel_'.$devolucion_detalle->i.'_6')) ?></td>
				
						<td class="elementotabla col_numero_item" >  '
							<input id="t-cel_<?php echo($devolucion_detalle->i) ?>_7" name="t-cel_<?php echo($devolucion_detalle->i) ?>_7" type="text" class="form-control"  placeholder="No Item"  title="No Item"    maxlength="10" size="10"  value="<?php echo($devolucion_detalle->numero_item) ?>" >
							<span id="spanstrMensajenumero_item" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_cantidad" >  '
							<input id="t-cel_<?php echo($devolucion_detalle->i) ?>_8" name="t-cel_<?php echo($devolucion_detalle->i) ?>_8" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12"  value="<?php echo($devolucion_detalle->cantidad) ?>" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_precio" >  '
							<input id="t-cel_<?php echo($devolucion_detalle->i) ?>_9" name="t-cel_<?php echo($devolucion_detalle->i) ?>_9" type="text" class="form-control"  placeholder="Precio"  title="Precio"    maxlength="18" size="12"  value="<?php echo($devolucion_detalle->precio) ?>" >
							<span id="spanstrMensajeprecio" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_sub_total" >  '
							<input id="t-cel_<?php echo($devolucion_detalle->i) ?>_10" name="t-cel_<?php echo($devolucion_detalle->i) ?>_10" type="text" class="form-control"  placeholder="Sub Total"  title="Sub Total"    maxlength="18" size="12"  value="<?php echo($devolucion_detalle->sub_total) ?>" >
							<span id="spanstrMensajesub_total" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_descuento_porciento" >  '
							<input id="t-cel_<?php echo($devolucion_detalle->i) ?>_11" name="t-cel_<?php echo($devolucion_detalle->i) ?>_11" type="text" class="form-control"  placeholder="Descuento %"  title="Descuento %"    maxlength="18" size="12"  value="<?php echo($devolucion_detalle->descuento_porciento) ?>" >
							<span id="spanstrMensajedescuento_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_descuento_monto" >  '
							<input id="t-cel_<?php echo($devolucion_detalle->i) ?>_12" name="t-cel_<?php echo($devolucion_detalle->i) ?>_12" type="text" class="form-control"  placeholder="Descuento Monto"  title="Descuento Monto"    maxlength="18" size="12"  value="<?php echo($devolucion_detalle->descuento_monto) ?>" >
							<span id="spanstrMensajedescuento_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_iva_porciento" >  '
							<input id="t-cel_<?php echo($devolucion_detalle->i) ?>_13" name="t-cel_<?php echo($devolucion_detalle->i) ?>_13" type="text" class="form-control"  placeholder="Iva %"  title="Iva %"    maxlength="18" size="12"  value="<?php echo($devolucion_detalle->iva_porciento) ?>" >
							<span id="spanstrMensajeiva_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_iva_monto" >  '
							<input id="t-cel_<?php echo($devolucion_detalle->i) ?>_14" name="t-cel_<?php echo($devolucion_detalle->i) ?>_14" type="text" class="form-control"  placeholder="Iva Monto"  title="Iva Monto"    maxlength="18" size="12"  value="<?php echo($devolucion_detalle->iva_monto) ?>" >
							<span id="spanstrMensajeiva_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_total" >  '
							<input id="t-cel_<?php echo($devolucion_detalle->i) ?>_15" name="t-cel_<?php echo($devolucion_detalle->i) ?>_15" type="text" class="form-control"  placeholder="Total"  title="Total"    maxlength="18" size="12"  value="<?php echo($devolucion_detalle->total) ?>" >
							<span id="spanstrMensajetotal" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_observacion" >  '<textarea id="t-cel_<?php echo($devolucion_detalle->i) ?>_16" name="t-cel_<?php echo($devolucion_detalle->i) ?>_16" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($devolucion_detalle->observacion) ?></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_observacion" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($devolucion_detalle->i) ?>_16" name="t-cel_<?php echo($devolucion_detalle->i) ?>_16" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($devolucion_detalle->observacion) ?></input>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
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



