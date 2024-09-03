



		<form id="frmTablaDatosparametro_auxiliar_facturacion" name="frmTablaDatosparametro_auxiliar_facturacion">
			<div id="divTablaDatosAuxiliarparametro_auxiliar_facturacionsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_auxiliar_facturacions)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_auxiliar_facturacion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro AuxiliarNOUSO Facturaciones</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_auxiliar_facturacions" name="tblTablaDatosparametro_auxiliar_facturacions" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Creacion Rapida Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Busqueda Producto Fabricante</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Solo Costo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Recibo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura Recibo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Recibo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Recibo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Final Boleta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Ticket</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura Ticket.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Ticket.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Ticket.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Final Ticket</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Creacion Rapida Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Busqueda Producto Fabricante</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Solo Costo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Recibo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura Recibo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Recibo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Recibo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Final Boleta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Ticket</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura Ticket.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Ticket.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Ticket.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Final Ticket</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_auxiliar_facturacionsLocal!=null && count($parametro_auxiliar_facturacionsLocal)>0) { ?>
			<?php foreach ($parametro_auxiliar_facturacionsLocal as $parametro_auxiliar_facturacion) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_auxiliar_facturacion->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_auxiliar_facturacion->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_auxiliar_facturacion->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_auxiliar_facturacion" idactualparametro_auxiliar_facturacion="<?php echo($parametro_auxiliar_facturacion->id) ?>" title="SELECCIONAR Parametro AuxiliarNOUSO Facturacion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($parametro_auxiliar_facturacion->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaparametro_auxiliar_facturacion" idactualparametro_auxiliar_facturacion="<?php echo($parametro_auxiliar_facturacion->id) ?>" title="ELIMINAR Parametro AuxiliarNOUSO Facturacion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($parametro_auxiliar_facturacion->i) ?>" name="t-id_<?php echo($parametro_auxiliar_facturacion->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro AuxiliarNOUSO Facturacion ACTUAL" value="<?php echo($parametro_auxiliar_facturacion->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_0" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_auxiliar_facturacion->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $parametro_auxiliar_facturacion->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $parametro_auxiliar_facturacion->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($parametro_auxiliar_facturacion->id_empresa_Descripcion,$parametro_auxiliar_facturacion->id_empresa,'t-cel_'.$parametro_auxiliar_facturacion->i.'_3')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_tipo_factura" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_4" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_4" type="text" class="form-control"  placeholder="Nombre Tipo Factura"  title="Nombre Tipo Factura"    size="20"  maxlength="25" value="<?php echo($parametro_auxiliar_facturacion->nombre_tipo_factura) ?>" />
							<span id="spanstrMensajenombre_tipo_factura" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_tipo_factura" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_4" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_4" type="text" class="form-control"  placeholder="Nombre Tipo Factura"  title="Nombre Tipo Factura"    size="20"  maxlength="25" value="<?php echo($parametro_auxiliar_facturacion->nombre_tipo_factura) ?>" />
							<span id="spanstrMensajenombre_tipo_factura" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_siguiente_numero_correlativo" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_5" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_5" type="text" class="form-control"  placeholder="Siguiente Numero Correlativo"  title="Siguiente Numero Correlativo"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar_facturacion->siguiente_numero_correlativo) ?>" >
							<span id="spanstrMensajesiguiente_numero_correlativo" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_6" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_6" type="text" class="form-control"  placeholder="Incremento"  title="Incremento"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar_facturacion->incremento) ?>" >
							<span id="spanstrMensajeincremento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_creacion_rapida_producto" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar_facturacion->con_creacion_rapida_producto,'t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_7',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_busqueda_producto_fabricante" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar_facturacion->con_busqueda_producto_fabricante,'t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_8',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_solo_costo_producto" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar_facturacion->con_solo_costo_producto,'t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_9',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_recibo" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar_facturacion->con_recibo,'t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_10',$paraReporte)  ?>
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_tipo_factura_recibo" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_11" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_11" type="text" class="form-control"  placeholder="Nombre Tipo Factura Recibo"  title="Nombre Tipo Factura Recibo"    size="20"  maxlength="25" value="<?php echo($parametro_auxiliar_facturacion->nombre_tipo_factura_recibo) ?>" />
							<span id="spanstrMensajenombre_tipo_factura_recibo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_tipo_factura_recibo" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_11" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_11" type="text" class="form-control"  placeholder="Nombre Tipo Factura Recibo"  title="Nombre Tipo Factura Recibo"    size="20"  maxlength="25" value="<?php echo($parametro_auxiliar_facturacion->nombre_tipo_factura_recibo) ?>" />
							<span id="spanstrMensajenombre_tipo_factura_recibo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_siguiente_numero_correlativo_recibo" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_12" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_12" type="text" class="form-control"  placeholder="Siguiente Numero Correlativo Recibo"  title="Siguiente Numero Correlativo Recibo"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar_facturacion->siguiente_numero_correlativo_recibo) ?>" >
							<span id="spanstrMensajesiguiente_numero_correlativo_recibo" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento_recibo" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_13" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_13" type="text" class="form-control"  placeholder="Incremento Recibo"  title="Incremento Recibo"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar_facturacion->incremento_recibo) ?>" >
							<span id="spanstrMensajeincremento_recibo" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_impuesto_final_boleta" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar_facturacion->con_impuesto_final_boleta,'t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_14',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_ticket" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar_facturacion->con_ticket,'t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_15',$paraReporte)  ?>
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_tipo_factura_ticket" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_16" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_16" type="text" class="form-control"  placeholder="Nombre Tipo Factura Ticket"  title="Nombre Tipo Factura Ticket"    size="20"  maxlength="25" value="<?php echo($parametro_auxiliar_facturacion->nombre_tipo_factura_ticket) ?>" />
							<span id="spanstrMensajenombre_tipo_factura_ticket" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_tipo_factura_ticket" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_16" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_16" type="text" class="form-control"  placeholder="Nombre Tipo Factura Ticket"  title="Nombre Tipo Factura Ticket"    size="20"  maxlength="25" value="<?php echo($parametro_auxiliar_facturacion->nombre_tipo_factura_ticket) ?>" />
							<span id="spanstrMensajenombre_tipo_factura_ticket" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_siguiente_numero_correlativo_ticket" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_17" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_17" type="text" class="form-control"  placeholder="Siguiente Numero Correlativo Ticket"  title="Siguiente Numero Correlativo Ticket"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar_facturacion->siguiente_numero_correlativo_ticket) ?>" >
							<span id="spanstrMensajesiguiente_numero_correlativo_ticket" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento_ticket" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_18" name="t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_18" type="text" class="form-control"  placeholder="Incremento Ticket"  title="Incremento Ticket"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar_facturacion->incremento_ticket) ?>" >
							<span id="spanstrMensajeincremento_ticket" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_impuesto_final_ticket" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar_facturacion->con_impuesto_final_ticket,'t-cel_<?php echo($parametro_auxiliar_facturacion->i) ?>_19',$paraReporte)  ?>
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



