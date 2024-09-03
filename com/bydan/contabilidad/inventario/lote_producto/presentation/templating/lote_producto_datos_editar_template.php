



		<form id="frmTablaDatoslote_producto" name="frmTablaDatoslote_producto">
			<div id="divTablaDatosAuxiliarlote_productosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($lote_productos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulolote_producto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Lotes Productoes</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoslote_productos" name="tblTablaDatoslote_productos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:<?php echo($strPermisoRelaciones) ?>">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Nro Lote.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Expiracion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ubicacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Disponible.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Agotado En.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Item.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalles</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">ID__.(*)</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:<?php echo($strPermisoEliminar) ?>">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:<?php echo($strPermisoRelaciones) ?>">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Nro Lote.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Expiracion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ubicacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Disponible.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Agotado En.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Item.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalles</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($lote_productosLocal!=null && count($lote_productosLocal)>0) { ?>
			<?php foreach ($lote_productosLocal as $lote_producto) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($lote_producto->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$lote_producto->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($lote_producto->id) ?>
							</td>
							<td>
								<img class="imgseleccionarlote_producto" idactuallote_producto="<?php echo($lote_producto->id) ?>" title="SELECCIONAR Lotes Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($lote_producto->id) ?>
							</td>
							<td>
								<img class="imgeliminartablalote_producto" idactuallote_producto="<?php echo($lote_producto->id) ?>" title="ELIMINAR Lotes Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($lote_producto->i) ?>" name="t-id_<?php echo($lote_producto->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Lotes Producto ACTUAL" value="<?php echo($lote_producto->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($lote_producto->i) ?>_0" name="t-cel_<?php echo($lote_producto->i) ?>_0" type="text" maxlength="25" value="<?php echo($lote_producto->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($lote_producto->id) ?><img class="imgseleccionarmostraraccionesrelacioneslote_producto" idactuallote_producto="<?php echo($lote_producto->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $lote_producto->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $lote_producto->updated_at 
					</td>
				<td class="elementotabla col_id_producto" ><?php echo($funciones->getComboBoxEditar($lote_producto->id_producto_Descripcion,$lote_producto->id_producto,'t-cel_'.$lote_producto->i.'_3')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nro_lote" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_4" name="t-cel_<?php echo($lote_producto->i) ?>_4" type="text" class="form-control"  placeholder="Nro Lote"  title="Nro Lote"    size="20"  maxlength="50" value="<?php echo($lote_producto->nro_lote) ?>" />
							<span id="spanstrMensajenro_lote" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nro_lote" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_4" name="t-cel_<?php echo($lote_producto->i) ?>_4" type="text" class="form-control"  placeholder="Nro Lote"  title="Nro Lote"    size="20"  maxlength="50" value="<?php echo($lote_producto->nro_lote) ?>" />
							<span id="spanstrMensajenro_lote" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_5" name="t-cel_<?php echo($lote_producto->i) ?>_5" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="30" value="<?php echo($lote_producto->descripcion) ?>" />
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_5" name="t-cel_<?php echo($lote_producto->i) ?>_5" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="30" value="<?php echo($lote_producto->descripcion) ?>" />
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_bodega" ><?php echo($funciones->getComboBoxEditar($lote_producto->id_bodega_Descripcion,$lote_producto->id_bodega,'t-cel_'.$lote_producto->i.'_6')) ?></td>
				
						<td class="elementotabla col_fecha_ingreso" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_7" name="t-cel_<?php echo($lote_producto->i) ?>_7" type="text" class="form-control"  placeholder="Fecha Ingreso"  title="Fecha Ingreso"    size="10"  value="<?php echo($lote_producto->fecha_ingreso) ?>" >
							<span id="spanstrMensajefecha_ingreso" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_expiracion" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_8" name="t-cel_<?php echo($lote_producto->i) ?>_8" type="text" class="form-control"  placeholder="Fecha Expiracion"  title="Fecha Expiracion"    size="10"  value="<?php echo($lote_producto->fecha_expiracion) ?>" >
							<span id="spanstrMensajefecha_expiracion" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_ubicacion" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_9" name="t-cel_<?php echo($lote_producto->i) ?>_9" type="text" class="form-control"  placeholder="Ubicacion"  title="Ubicacion"    size="20"  maxlength="20" value="<?php echo($lote_producto->ubicacion) ?>" />
							<span id="spanstrMensajeubicacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_ubicacion" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_9" name="t-cel_<?php echo($lote_producto->i) ?>_9" type="text" class="form-control"  placeholder="Ubicacion"  title="Ubicacion"    size="20"  maxlength="20" value="<?php echo($lote_producto->ubicacion) ?>" />
							<span id="spanstrMensajeubicacion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_cantidad" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_10" name="t-cel_<?php echo($lote_producto->i) ?>_10" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12"  value="<?php echo($lote_producto->cantidad) ?>" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_comentario" >  '<textarea id="t-cel_<?php echo($lote_producto->i) ?>_11" name="t-cel_<?php echo($lote_producto->i) ?>_11" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($lote_producto->comentario) ?></textarea>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_comentario" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($lote_producto->i) ?>_11" name="t-cel_<?php echo($lote_producto->i) ?>_11" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($lote_producto->comentario) ?></input>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_nro_documento" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_12" name="t-cel_<?php echo($lote_producto->i) ?>_12" type="text" class="form-control"  placeholder="Nro Documento"  title="Nro Documento"    maxlength="10" size="10"  value="<?php echo($lote_producto->nro_documento) ?>" >
							<span id="spanstrMensajenro_documento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_disponible" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_13" name="t-cel_<?php echo($lote_producto->i) ?>_13" type="text" class="form-control"  placeholder="Disponible"  title="Disponible"    maxlength="18" size="12"  value="<?php echo($lote_producto->disponible) ?>" >
							<span id="spanstrMensajedisponible" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_agotado_en" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_14" name="t-cel_<?php echo($lote_producto->i) ?>_14" type="text" class="form-control"  placeholder="Agotado En"  title="Agotado En"    size="10"  value="<?php echo($lote_producto->agotado_en) ?>" >
							<span id="spanstrMensajeagotado_en" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_nro_item" >  '
							<input id="t-cel_<?php echo($lote_producto->i) ?>_15" name="t-cel_<?php echo($lote_producto->i) ?>_15" type="text" class="form-control"  placeholder="Nro Item"  title="Nro Item"    maxlength="10" size="10"  value="<?php echo($lote_producto->nro_item) ?>" >
							<span id="spanstrMensajenro_item" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_proveedor" ><?php echo($funciones->getComboBoxEditar($lote_producto->id_proveedor_Descripcion,$lote_producto->id_proveedor,'t-cel_'.$lote_producto->i.'_16')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($lote_producto->id) ?>
							<img class="imgrelacionkardex_detalle" idactuallote_producto="<?php echo($lote_producto->id) ?>" title="DetalleS DE Lotes Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/kardex_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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



