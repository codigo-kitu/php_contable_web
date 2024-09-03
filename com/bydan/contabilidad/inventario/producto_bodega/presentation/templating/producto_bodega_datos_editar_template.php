



		<form id="frmTablaDatosproducto_bodega" name="frmTablaDatosproducto_bodega">
			<div id="divTablaDatosAuxiliarproducto_bodegasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($producto_bodegas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloproducto_bodega" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Producto Bodegas</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosproducto_bodegas" name="tblTablaDatosproducto_bodegas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ubicacion</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ubicacion</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($producto_bodegasLocal!=null && count($producto_bodegasLocal)>0) { ?>
			<?php foreach ($producto_bodegasLocal as $producto_bodega) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($producto_bodega->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$producto_bodega->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($producto_bodega->id) ?>
							</td>
							<td>
								<img class="imgseleccionarproducto_bodega" idactualproducto_bodega="<?php echo($producto_bodega->id) ?>" title="SELECCIONAR Producto Bodega ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($producto_bodega->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaproducto_bodega" idactualproducto_bodega="<?php echo($producto_bodega->id) ?>" title="ELIMINAR Producto Bodega ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($producto_bodega->i) ?>" name="t-id_<?php echo($producto_bodega->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Producto Bodega ACTUAL" value="<?php echo($producto_bodega->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($producto_bodega->i) ?>_0" name="t-cel_<?php echo($producto_bodega->i) ?>_0" type="text" maxlength="25" value="<?php echo($producto_bodega->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $producto_bodega->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $producto_bodega->updated_at 
					</td>
				<td class="elementotabla col_id_bodega" ><?php echo($funciones->getComboBoxEditar($producto_bodega->id_bodega_Descripcion,$producto_bodega->id_bodega,'t-cel_'.$producto_bodega->i.'_3')) ?></td>
				<td class="elementotabla col_id_producto" ><?php echo($funciones->getComboBoxEditar($producto_bodega->id_producto_Descripcion,$producto_bodega->id_producto,'t-cel_'.$producto_bodega->i.'_4')) ?></td>
				
						<td class="elementotabla col_cantidad" >  '
							<input id="t-cel_<?php echo($producto_bodega->i) ?>_5" name="t-cel_<?php echo($producto_bodega->i) ?>_5" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12"  value="<?php echo($producto_bodega->cantidad) ?>" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_costo" >  '
							<input id="t-cel_<?php echo($producto_bodega->i) ?>_6" name="t-cel_<?php echo($producto_bodega->i) ?>_6" type="text" class="form-control"  placeholder="Costo"  title="Costo"    maxlength="18" size="12"  value="<?php echo($producto_bodega->costo) ?>" >
							<span id="spanstrMensajecosto" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_ubicacion" >  '
							<input id="t-cel_<?php echo($producto_bodega->i) ?>_7" name="t-cel_<?php echo($producto_bodega->i) ?>_7" type="text" class="form-control"  placeholder="Ubicacion"  title="Ubicacion"    size="20"  maxlength="30" value="<?php echo($producto_bodega->ubicacion) ?>" />
							<span id="spanstrMensajeubicacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_ubicacion" >  '
							<input id="t-cel_<?php echo($producto_bodega->i) ?>_7" name="t-cel_<?php echo($producto_bodega->i) ?>_7" type="text" class="form-control"  placeholder="Ubicacion"  title="Ubicacion"    size="20"  maxlength="30" value="<?php echo($producto_bodega->ubicacion) ?>" />
							<span id="spanstrMensajeubicacion" class="mensajeerror"></span>' 
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



