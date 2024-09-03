



		<form id="frmTablaDatosserial_producto" name="frmTablaDatosserial_producto">
			<div id="divTablaDatosAuxiliarserial_productosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($serial_productos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloserial_producto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Seriales Producto</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosserial_productos" name="tblTablaDatosserial_productos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Nro Serial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ingresado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor Mid.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Salida.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente Mid.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Salida.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Item.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Salida.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Items.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Nro Serial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ingresado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor Mid.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Salida.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente Mid.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Salida.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Item.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Salida.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Items.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($serial_productosLocal!=null && count($serial_productosLocal)>0) { ?>
			<?php foreach ($serial_productosLocal as $serial_producto) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($serial_producto->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$serial_producto->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($serial_producto->id) ?>
							</td>
							<td>
								<img class="imgseleccionarserial_producto" idactualserial_producto="<?php echo($serial_producto->id) ?>" title="SELECCIONAR Seriales Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($serial_producto->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaserial_producto" idactualserial_producto="<?php echo($serial_producto->id) ?>" title="ELIMINAR Seriales Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($serial_producto->i) ?>" name="t-id_<?php echo($serial_producto->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Seriales Producto ACTUAL" value="<?php echo($serial_producto->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($serial_producto->i) ?>_0" name="t-cel_<?php echo($serial_producto->i) ?>_0" type="text" maxlength="25" value="<?php echo($serial_producto->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $serial_producto->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $serial_producto->updated_at 
					</td>
				<td class="elementotabla col_id_producto" ><?php echo($funciones->getComboBoxEditar($serial_producto->id_producto_Descripcion,$serial_producto->id_producto,'t-cel_'.$serial_producto->i.'_3')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nro_serial" >  '<textarea id="t-cel_<?php echo($serial_producto->i) ?>_4" name="t-cel_<?php echo($serial_producto->i) ?>_4" class="form-control"  placeholder="Nro Serial"  title="Nro Serial"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($serial_producto->nro_serial) ?></textarea>
							<span id="spanstrMensajenro_serial" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nro_serial" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($serial_producto->i) ?>_4" name="t-cel_<?php echo($serial_producto->i) ?>_4" class="form-control"  placeholder="Nro Serial"  title="Nro Serial"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($serial_producto->nro_serial) ?></input>
							<span id="spanstrMensajenro_serial" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_ingresado" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_5" name="t-cel_<?php echo($serial_producto->i) ?>_5" type="text" class="form-control"  placeholder="Ingresado"  title="Ingresado"    size="10"  value="<?php echo($serial_producto->ingresado) ?>" >
							<span id="spanstrMensajeingresado" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_proveedor_mid" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_6" name="t-cel_<?php echo($serial_producto->i) ?>_6" type="text" class="form-control"  placeholder="Proveedor Mid"  title="Proveedor Mid"    maxlength="10" size="10"  value="<?php echo($serial_producto->proveedor_mid) ?>" >
							<span id="spanstrMensajeproveedor_mid" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_modulo_ingreso" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_7" name="t-cel_<?php echo($serial_producto->i) ?>_7" type="text" class="form-control"  placeholder="Modulo Ingreso"  title="Modulo Ingreso"    size="3"  maxlength="3" value="<?php echo($serial_producto->modulo_ingreso) ?>" />
							<span id="spanstrMensajemodulo_ingreso" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_modulo_ingreso" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_7" name="t-cel_<?php echo($serial_producto->i) ?>_7" type="text" class="form-control"  placeholder="Modulo Ingreso"  title="Modulo Ingreso"    size="3"  maxlength="3" value="<?php echo($serial_producto->modulo_ingreso) ?>" />
							<span id="spanstrMensajemodulo_ingreso" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nro_documento_ingreso" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_8" name="t-cel_<?php echo($serial_producto->i) ?>_8" type="text" class="form-control"  placeholder="Nro Documento Ingreso"  title="Nro Documento Ingreso"    size="10"  maxlength="10" value="<?php echo($serial_producto->nro_documento_ingreso) ?>" />
							<span id="spanstrMensajenro_documento_ingreso" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nro_documento_ingreso" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_8" name="t-cel_<?php echo($serial_producto->i) ?>_8" type="text" class="form-control"  placeholder="Nro Documento Ingreso"  title="Nro Documento Ingreso"    size="10"  maxlength="10" value="<?php echo($serial_producto->nro_documento_ingreso) ?>" />
							<span id="spanstrMensajenro_documento_ingreso" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_salida" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_9" name="t-cel_<?php echo($serial_producto->i) ?>_9" type="text" class="form-control"  placeholder="Salida"  title="Salida"    size="10"  value="<?php echo($serial_producto->salida) ?>" >
							<span id="spanstrMensajesalida" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_cliente_mid" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_10" name="t-cel_<?php echo($serial_producto->i) ?>_10" type="text" class="form-control"  placeholder="Cliente Mid"  title="Cliente Mid"    maxlength="10" size="10"  value="<?php echo($serial_producto->cliente_mid) ?>" >
							<span id="spanstrMensajecliente_mid" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_modulo_salida" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_11" name="t-cel_<?php echo($serial_producto->i) ?>_11" type="text" class="form-control"  placeholder="Modulo Salida"  title="Modulo Salida"    size="3"  maxlength="3" value="<?php echo($serial_producto->modulo_salida) ?>" />
							<span id="spanstrMensajemodulo_salida" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_modulo_salida" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_11" name="t-cel_<?php echo($serial_producto->i) ?>_11" type="text" class="form-control"  placeholder="Modulo Salida"  title="Modulo Salida"    size="3"  maxlength="3" value="<?php echo($serial_producto->modulo_salida) ?>" />
							<span id="spanstrMensajemodulo_salida" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_bodega" ><?php echo($funciones->getComboBoxEditar($serial_producto->id_bodega_Descripcion,$serial_producto->id_bodega,'t-cel_'.$serial_producto->i.'_12')) ?></td>
				
						<td class="elementotabla col_nro_item" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_13" name="t-cel_<?php echo($serial_producto->i) ?>_13" type="text" class="form-control"  placeholder="Nro Item"  title="Nro Item"    maxlength="10" size="10"  value="<?php echo($serial_producto->nro_item) ?>" >
							<span id="spanstrMensajenro_item" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nro_documento_salida" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_14" name="t-cel_<?php echo($serial_producto->i) ?>_14" type="text" class="form-control"  placeholder="Nro Documento Salida"  title="Nro Documento Salida"    size="10"  maxlength="10" value="<?php echo($serial_producto->nro_documento_salida) ?>" />
							<span id="spanstrMensajenro_documento_salida" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nro_documento_salida" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_14" name="t-cel_<?php echo($serial_producto->i) ?>_14" type="text" class="form-control"  placeholder="Nro Documento Salida"  title="Nro Documento Salida"    size="10"  maxlength="10" value="<?php echo($serial_producto->nro_documento_salida) ?>" />
							<span id="spanstrMensajenro_documento_salida" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_nro_items" >  '
							<input id="t-cel_<?php echo($serial_producto->i) ?>_15" name="t-cel_<?php echo($serial_producto->i) ?>_15" type="text" class="form-control"  placeholder="Nro Items"  title="Nro Items"    maxlength="10" size="10"  value="<?php echo($serial_producto->nro_items) ?>" >
							<span id="spanstrMensajenro_items" class="mensajeerror"></span>' 
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



