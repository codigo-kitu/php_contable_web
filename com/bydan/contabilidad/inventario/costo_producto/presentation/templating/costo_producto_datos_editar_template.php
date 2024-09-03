



		<form id="frmTablaDatoscosto_producto" name="frmTablaDatoscosto_producto">
			<div id="divTablaDatosAuxiliarcosto_productosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($costo_productos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocosto_producto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Costo Productos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscosto_productos" name="tblTablaDatoscosto_productos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tabla.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Idn Detalle Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Unitario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Unitario Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Total Origen.(*)</pre>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tabla.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Idn Detalle Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Unitario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Unitario Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo Total Origen.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($costo_productosLocal!=null && count($costo_productosLocal)>0) { ?>
			<?php foreach ($costo_productosLocal as $costo_producto) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($costo_producto->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$costo_producto->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($costo_producto->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcosto_producto" idactualcosto_producto="<?php echo($costo_producto->id) ?>" title="SELECCIONAR Costo Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($costo_producto->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacosto_producto" idactualcosto_producto="<?php echo($costo_producto->id) ?>" title="ELIMINAR Costo Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($costo_producto->i) ?>" name="t-id_<?php echo($costo_producto->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Costo Producto ACTUAL" value="<?php echo($costo_producto->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($costo_producto->i) ?>_0" name="t-cel_<?php echo($costo_producto->i) ?>_0" type="text" maxlength="25" value="<?php echo($costo_producto->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $costo_producto->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $costo_producto->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($costo_producto->id_empresa_Descripcion,$costo_producto->id_empresa,'t-cel_'.$costo_producto->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_sucursal" ><?php echo($funciones->getComboBoxEditar($costo_producto->id_sucursal_Descripcion,$costo_producto->id_sucursal,'t-cel_'.$costo_producto->i.'_4')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($costo_producto->id_ejercicio_Descripcion,$costo_producto->id_ejercicio,'t-cel_'.$costo_producto->i.'_5')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($costo_producto->id_periodo_Descripcion,$costo_producto->id_periodo,'t-cel_'.$costo_producto->i.'_6')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($costo_producto->id_usuario_Descripcion,$costo_producto->id_usuario,'t-cel_'.$costo_producto->i.'_7')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_producto" ><?php echo($funciones->getComboBoxEditar($costo_producto->id_producto_Descripcion,$costo_producto->id_producto,'t-cel_'.$costo_producto->i.'_8')) ?></td>
				<td class="elementotabla col_id_tabla" ><?php echo($funciones->getComboBoxEditar($costo_producto->id_tabla_Descripcion,$costo_producto->id_tabla,'t-cel_'.$costo_producto->i.'_9')) ?></td>
				
						<td class="elementotabla col_idn_origen" >  '
							<input id="t-cel_<?php echo($costo_producto->i) ?>_10" name="t-cel_<?php echo($costo_producto->i) ?>_10" type="text" class="form-control"  placeholder="Id Origen"  title="Id Origen"    maxlength="19" size="10"  value="<?php echo($costo_producto->idn_origen) ?>" >
							<span id="spanstrMensajeidn_origen" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_idn_detalle_origen" >  '
							<input id="t-cel_<?php echo($costo_producto->i) ?>_11" name="t-cel_<?php echo($costo_producto->i) ?>_11" type="text" class="form-control"  placeholder="Idn Detalle Origen"  title="Idn Detalle Origen"    maxlength="19" size="10"  value="<?php echo($costo_producto->idn_detalle_origen) ?>" >
							<span id="spanstrMensajeidn_detalle_origen" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nro_documento" >  '
							<input id="t-cel_<?php echo($costo_producto->i) ?>_12" name="t-cel_<?php echo($costo_producto->i) ?>_12" type="text" class="form-control"  placeholder="Nro Documento"  title="Nro Documento"    size="10"  maxlength="10" value="<?php echo($costo_producto->nro_documento) ?>" />
							<span id="spanstrMensajenro_documento" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nro_documento" >  '
							<input id="t-cel_<?php echo($costo_producto->i) ?>_12" name="t-cel_<?php echo($costo_producto->i) ?>_12" type="text" class="form-control"  placeholder="Nro Documento"  title="Nro Documento"    size="10"  maxlength="10" value="<?php echo($costo_producto->nro_documento) ?>" />
							<span id="spanstrMensajenro_documento" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha" >  '
							<input id="t-cel_<?php echo($costo_producto->i) ?>_13" name="t-cel_<?php echo($costo_producto->i) ?>_13" type="text" class="form-control"  placeholder="Fecha"  title="Fecha"    size="10"  value="<?php echo($costo_producto->fecha) ?>" >
							<span id="spanstrMensajefecha" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_cantidad" >  '
							<input id="t-cel_<?php echo($costo_producto->i) ?>_14" name="t-cel_<?php echo($costo_producto->i) ?>_14" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12"  value="<?php echo($costo_producto->cantidad) ?>" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_costo_unitario" >  '
							<input id="t-cel_<?php echo($costo_producto->i) ?>_15" name="t-cel_<?php echo($costo_producto->i) ?>_15" type="text" class="form-control"  placeholder="Costo Unitario"  title="Costo Unitario"    maxlength="18" size="12"  value="<?php echo($costo_producto->costo_unitario) ?>" >
							<span id="spanstrMensajecosto_unitario" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_costo_total" >  '
							<input id="t-cel_<?php echo($costo_producto->i) ?>_16" name="t-cel_<?php echo($costo_producto->i) ?>_16" type="text" class="form-control"  placeholder="Costo Total"  title="Costo Total"    maxlength="18" size="12"  value="<?php echo($costo_producto->costo_total) ?>" >
							<span id="spanstrMensajecosto_total" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_cantidad_origen" >  '
							<input id="t-cel_<?php echo($costo_producto->i) ?>_17" name="t-cel_<?php echo($costo_producto->i) ?>_17" type="text" class="form-control"  placeholder="Cantidad Origen"  title="Cantidad Origen"    maxlength="18" size="12"  value="<?php echo($costo_producto->cantidad_origen) ?>" >
							<span id="spanstrMensajecantidad_origen" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_costo_unitario_origen" >  '
							<input id="t-cel_<?php echo($costo_producto->i) ?>_18" name="t-cel_<?php echo($costo_producto->i) ?>_18" type="text" class="form-control"  placeholder="Costo Unitario Origen"  title="Costo Unitario Origen"    maxlength="18" size="12"  value="<?php echo($costo_producto->costo_unitario_origen) ?>" >
							<span id="spanstrMensajecosto_unitario_origen" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_costo_total_origen" >  '
							<input id="t-cel_<?php echo($costo_producto->i) ?>_19" name="t-cel_<?php echo($costo_producto->i) ?>_19" type="text" class="form-control"  placeholder="Costo Total Origen"  title="Costo Total Origen"    maxlength="18" size="12"  value="<?php echo($costo_producto->costo_total_origen) ?>" >
							<span id="spanstrMensajecosto_total_origen" class="mensajeerror"></span>' 
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



