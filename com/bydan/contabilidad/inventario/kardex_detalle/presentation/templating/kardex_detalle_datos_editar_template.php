



		<form id="frmTablaDatoskardex_detalle" name="frmTablaDatoskardex_detalle">
			<div id="divTablaDatosAuxiliarkardex_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($kardex_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulokardex_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Detalles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoskardex_detalles" name="tblTablaDatoskardex_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Kardex</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No. Item.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Lote</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Disponible.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Kardex</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No. Item.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Lote</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Disponible.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($kardex_detallesLocal!=null && count($kardex_detallesLocal)>0) { ?>
			<?php foreach ($kardex_detallesLocal as $kardex_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($kardex_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$kardex_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($kardex_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionarkardex_detalle" idactualkardex_detalle="<?php echo($kardex_detalle->id) ?>" title="SELECCIONAR Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($kardex_detalle->id) ?>
							</td>
							<td>
								<img class="imgeliminartablakardex_detalle" idactualkardex_detalle="<?php echo($kardex_detalle->id) ?>" title="ELIMINAR Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($kardex_detalle->i) ?>" name="t-id_<?php echo($kardex_detalle->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Detalle ACTUAL" value="<?php echo($kardex_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($kardex_detalle->i) ?>_0" name="t-cel_<?php echo($kardex_detalle->i) ?>_0" type="text" maxlength="25" value="<?php echo($kardex_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $kardex_detalle->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $kardex_detalle->updated_at 
					</td>
				<td class="elementotabla col_id_kardex" ><?php echo($funciones->getComboBoxEditar($kardex_detalle->id_kardex_Descripcion,$kardex_detalle->id_kardex,'t-cel_'.$kardex_detalle->i.'_3')) ?></td>
				
						<td class="elementotabla col_numero_item" >  '
							<input id="t-cel_<?php echo($kardex_detalle->i) ?>_4" name="t-cel_<?php echo($kardex_detalle->i) ?>_4" type="text" class="form-control"  placeholder="No. Item"  title="No. Item"    maxlength="10" size="10"  value="<?php echo($kardex_detalle->numero_item) ?>" >
							<span id="spanstrMensajenumero_item" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_bodega" ><?php echo($funciones->getComboBoxEditar($kardex_detalle->id_bodega_Descripcion,$kardex_detalle->id_bodega,'t-cel_'.$kardex_detalle->i.'_5')) ?></td>
				<td class="elementotabla col_id_producto" ><?php echo($funciones->getComboBoxEditar($kardex_detalle->id_producto_Descripcion,$kardex_detalle->id_producto,'t-cel_'.$kardex_detalle->i.'_6')) ?></td>
				<td class="elementotabla col_id_unidad" ><?php echo($funciones->getComboBoxEditar($kardex_detalle->id_unidad_Descripcion,$kardex_detalle->id_unidad,'t-cel_'.$kardex_detalle->i.'_7')) ?></td>
				
						<td class="elementotabla col_cantidad" >  '
							<input id="t-cel_<?php echo($kardex_detalle->i) ?>_8" name="t-cel_<?php echo($kardex_detalle->i) ?>_8" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12"  value="<?php echo($kardex_detalle->cantidad) ?>" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_costo" >  '
							<input id="t-cel_<?php echo($kardex_detalle->i) ?>_9" name="t-cel_<?php echo($kardex_detalle->i) ?>_9" type="text" class="form-control"  placeholder="Costo"  title="Costo"    maxlength="18" size="12"  value="<?php echo($kardex_detalle->costo) ?>" >
							<span id="spanstrMensajecosto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_total" >  '
							<input id="t-cel_<?php echo($kardex_detalle->i) ?>_10" name="t-cel_<?php echo($kardex_detalle->i) ?>_10" type="text" class="form-control"  placeholder="Total"  title="Total"    maxlength="18" size="12"  value="<?php echo($kardex_detalle->total) ?>" >
							<span id="spanstrMensajetotal" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_lote_producto" ><?php echo($funciones->getComboBoxEditar($kardex_detalle->id_lote_producto_Descripcion,$kardex_detalle->id_lote_producto,'t-cel_'.$kardex_detalle->i.'_11')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($kardex_detalle->i) ?>_12" name="t-cel_<?php echo($kardex_detalle->i) ?>_12" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($kardex_detalle->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($kardex_detalle->i) ?>_12" name="t-cel_<?php echo($kardex_detalle->i) ?>_12" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($kardex_detalle->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_cantidad_disponible" >  '
							<input id="t-cel_<?php echo($kardex_detalle->i) ?>_13" name="t-cel_<?php echo($kardex_detalle->i) ?>_13" type="text" class="form-control"  placeholder="Cantidad Disponible"  title="Cantidad Disponible"    maxlength="18" size="12"  value="<?php echo($kardex_detalle->cantidad_disponible) ?>" >
							<span id="spanstrMensajecantidad_disponible" class="mensajeerror"></span>' 
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



