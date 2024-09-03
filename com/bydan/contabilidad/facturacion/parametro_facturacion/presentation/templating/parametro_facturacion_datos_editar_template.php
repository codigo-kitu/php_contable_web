



		<form id="frmTablaDatosparametro_facturacion" name="frmTablaDatosparametro_facturacion">
			<div id="divTablaDatosAuxiliarparametro_facturacionsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_facturacions)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_facturacion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Facturacions</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_facturacions" name="tblTablaDatosparametro_facturacions" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Factura Lote.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Factura Lote.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Devolucion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Devolucion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Termino Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Estimado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Estimado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Estimado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto Estimado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Consignacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Consignacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Consignacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto Consignacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Recibo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Recibo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Recibo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Recibos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Recibo</pre>
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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Factura Lote.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Factura Lote.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Devolucion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Devolucion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Termino Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Estimado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Estimado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Estimado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto Estimado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Consignacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Consignacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Consignacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto Consignacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Recibo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Recibo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Recibo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Recibos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Recibo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_facturacionsLocal!=null && count($parametro_facturacionsLocal)>0) { ?>
			<?php foreach ($parametro_facturacionsLocal as $parametro_facturacion) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_facturacion->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_facturacion->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_facturacion->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_facturacion" idactualparametro_facturacion="<?php echo($parametro_facturacion->id) ?>" title="SELECCIONAR Parametro Facturacion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($parametro_facturacion->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaparametro_facturacion" idactualparametro_facturacion="<?php echo($parametro_facturacion->id) ?>" title="ELIMINAR Parametro Facturacion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($parametro_facturacion->i) ?>" name="t-id_<?php echo($parametro_facturacion->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro Facturacion ACTUAL" value="<?php echo($parametro_facturacion->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_0" name="t-cel_<?php echo($parametro_facturacion->i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_facturacion->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $parametro_facturacion->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $parametro_facturacion->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($parametro_facturacion->id_empresa_Descripcion,$parametro_facturacion->id_empresa,'t-cel_'.$parametro_facturacion->i.'_3')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_factura" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_4" name="t-cel_<?php echo($parametro_facturacion->i) ?>_4" type="text" class="form-control"  placeholder="Nombre Factura"  title="Nombre Factura"    size="20"  maxlength="50" value="<?php echo($parametro_facturacion->nombre_factura) ?>" />
							<span id="spanstrMensajenombre_factura" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_factura" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_4" name="t-cel_<?php echo($parametro_facturacion->i) ?>_4" type="text" class="form-control"  placeholder="Nombre Factura"  title="Nombre Factura"    size="20"  maxlength="50" value="<?php echo($parametro_facturacion->nombre_factura) ?>" />
							<span id="spanstrMensajenombre_factura" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_numero_factura" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_5" name="t-cel_<?php echo($parametro_facturacion->i) ?>_5" type="text" class="form-control"  placeholder="Numero Factura"  title="Numero Factura"    maxlength="19" size="10"  value="<?php echo($parametro_facturacion->numero_factura) ?>" >
							<span id="spanstrMensajenumero_factura" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento_factura" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_6" name="t-cel_<?php echo($parametro_facturacion->i) ?>_6" type="text" class="form-control"  placeholder="Incremento Factura"  title="Incremento Factura"    maxlength="10" size="10"  value="<?php echo($parametro_facturacion->incremento_factura) ?>" >
							<span id="spanstrMensajeincremento_factura" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_solo_costo_producto" ><?php  $funciones->getCheckBoxEditar($parametro_facturacion->solo_costo_producto,'t-cel_<?php echo($parametro_facturacion->i) ?>_7',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_numero_factura_lote" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_8" name="t-cel_<?php echo($parametro_facturacion->i) ?>_8" type="text" class="form-control"  placeholder="Numero Factura Lote"  title="Numero Factura Lote"    maxlength="19" size="10"  value="<?php echo($parametro_facturacion->numero_factura_lote) ?>" >
							<span id="spanstrMensajenumero_factura_lote" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento_factura_lote" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_9" name="t-cel_<?php echo($parametro_facturacion->i) ?>_9" type="text" class="form-control"  placeholder="Incremento Factura Lote"  title="Incremento Factura Lote"    maxlength="10" size="10"  value="<?php echo($parametro_facturacion->incremento_factura_lote) ?>" >
							<span id="spanstrMensajeincremento_factura_lote" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_devolucion" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_10" name="t-cel_<?php echo($parametro_facturacion->i) ?>_10" type="text" class="form-control"  placeholder="Numero Devolucion"  title="Numero Devolucion"    maxlength="19" size="10"  value="<?php echo($parametro_facturacion->numero_devolucion) ?>" >
							<span id="spanstrMensajenumero_devolucion" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento_devolucion" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_11" name="t-cel_<?php echo($parametro_facturacion->i) ?>_11" type="text" class="form-control"  placeholder="Incremento Devolucion"  title="Incremento Devolucion"    maxlength="10" size="10"  value="<?php echo($parametro_facturacion->incremento_devolucion) ?>" >
							<span id="spanstrMensajeincremento_devolucion" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_termino_pago_cliente" ><?php echo($funciones->getComboBoxEditar($parametro_facturacion->id_termino_pago_cliente_Descripcion,$parametro_facturacion->id_termino_pago_cliente,'t-cel_'.$parametro_facturacion->i.'_12')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_estimado" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_13" name="t-cel_<?php echo($parametro_facturacion->i) ?>_13" type="text" class="form-control"  placeholder="Nombre Estimado"  title="Nombre Estimado"    size="20"  maxlength="50" value="<?php echo($parametro_facturacion->nombre_estimado) ?>" />
							<span id="spanstrMensajenombre_estimado" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_estimado" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_13" name="t-cel_<?php echo($parametro_facturacion->i) ?>_13" type="text" class="form-control"  placeholder="Nombre Estimado"  title="Nombre Estimado"    size="20"  maxlength="50" value="<?php echo($parametro_facturacion->nombre_estimado) ?>" />
							<span id="spanstrMensajenombre_estimado" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_numero_estimado" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_14" name="t-cel_<?php echo($parametro_facturacion->i) ?>_14" type="text" class="form-control"  placeholder="Numero Estimado"  title="Numero Estimado"    maxlength="19" size="10"  value="<?php echo($parametro_facturacion->numero_estimado) ?>" >
							<span id="spanstrMensajenumero_estimado" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento_estimado" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_15" name="t-cel_<?php echo($parametro_facturacion->i) ?>_15" type="text" class="form-control"  placeholder="Incremento Estimado"  title="Incremento Estimado"    maxlength="10" size="10"  value="<?php echo($parametro_facturacion->incremento_estimado) ?>" >
							<span id="spanstrMensajeincremento_estimado" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_solo_costo_producto_estimado" ><?php  $funciones->getCheckBoxEditar($parametro_facturacion->solo_costo_producto_estimado,'t-cel_<?php echo($parametro_facturacion->i) ?>_16',$paraReporte)  ?>
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_consignacion" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_17" name="t-cel_<?php echo($parametro_facturacion->i) ?>_17" type="text" class="form-control"  placeholder="Nombre Consignacion"  title="Nombre Consignacion"    size="20"  maxlength="50" value="<?php echo($parametro_facturacion->nombre_consignacion) ?>" />
							<span id="spanstrMensajenombre_consignacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_consignacion" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_17" name="t-cel_<?php echo($parametro_facturacion->i) ?>_17" type="text" class="form-control"  placeholder="Nombre Consignacion"  title="Nombre Consignacion"    size="20"  maxlength="50" value="<?php echo($parametro_facturacion->nombre_consignacion) ?>" />
							<span id="spanstrMensajenombre_consignacion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_numero_consignacion" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_18" name="t-cel_<?php echo($parametro_facturacion->i) ?>_18" type="text" class="form-control"  placeholder="Numero Consignacion"  title="Numero Consignacion"    maxlength="19" size="10"  value="<?php echo($parametro_facturacion->numero_consignacion) ?>" >
							<span id="spanstrMensajenumero_consignacion" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento_consignacion" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_19" name="t-cel_<?php echo($parametro_facturacion->i) ?>_19" type="text" class="form-control"  placeholder="Incremento Consignacion"  title="Incremento Consignacion"    maxlength="10" size="10"  value="<?php echo($parametro_facturacion->incremento_consignacion) ?>" >
							<span id="spanstrMensajeincremento_consignacion" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_solo_costo_producto_consignacion" ><?php  $funciones->getCheckBoxEditar($parametro_facturacion->solo_costo_producto_consignacion,'t-cel_<?php echo($parametro_facturacion->i) ?>_20',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_recibo" ><?php  $funciones->getCheckBoxEditar($parametro_facturacion->con_recibo,'t-cel_<?php echo($parametro_facturacion->i) ?>_21',$paraReporte)  ?>
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_recibo" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_22" name="t-cel_<?php echo($parametro_facturacion->i) ?>_22" type="text" class="form-control"  placeholder="Nombre Recibo"  title="Nombre Recibo"    size="20"  maxlength="50" value="<?php echo($parametro_facturacion->nombre_recibo) ?>" />
							<span id="spanstrMensajenombre_recibo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_recibo" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_22" name="t-cel_<?php echo($parametro_facturacion->i) ?>_22" type="text" class="form-control"  placeholder="Nombre Recibo"  title="Nombre Recibo"    size="20"  maxlength="50" value="<?php echo($parametro_facturacion->nombre_recibo) ?>" />
							<span id="spanstrMensajenombre_recibo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_numero_recibo" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_23" name="t-cel_<?php echo($parametro_facturacion->i) ?>_23" type="text" class="form-control"  placeholder="Numero Recibo"  title="Numero Recibo"    maxlength="19" size="10"  value="<?php echo($parametro_facturacion->numero_recibo) ?>" >
							<span id="spanstrMensajenumero_recibo" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento_recibo" >  '
							<input id="t-cel_<?php echo($parametro_facturacion->i) ?>_24" name="t-cel_<?php echo($parametro_facturacion->i) ?>_24" type="text" class="form-control"  placeholder="Incremento Recibos"  title="Incremento Recibos"    maxlength="10" size="10"  value="<?php echo($parametro_facturacion->incremento_recibo) ?>" >
							<span id="spanstrMensajeincremento_recibo" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_impuesto_recibo" ><?php  $funciones->getCheckBoxEditar($parametro_facturacion->con_impuesto_recibo,'t-cel_<?php echo($parametro_facturacion->i) ?>_25',$paraReporte)  ?>
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



