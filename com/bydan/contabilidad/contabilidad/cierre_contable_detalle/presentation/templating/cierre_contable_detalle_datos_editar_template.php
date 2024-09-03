



		<form id="frmTablaDatoscierre_contable_detalle" name="frmTablaDatoscierre_contable_detalle">
			<div id="divTablaDatosAuxiliarcierre_contable_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($cierre_contable_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocierre_contable_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cierre Detalles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscierre_contable_detalles" name="tblTablaDatoscierre_contable_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Detalle.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cierres Contables.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Detalle.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cierres Contables.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($cierre_contable_detallesLocal!=null && count($cierre_contable_detallesLocal)>0) { ?>
			<?php foreach ($cierre_contable_detallesLocal as $cierre_contable_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cierre_contable_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cierre_contable_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cierre_contable_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcierre_contable_detalle" idactualcierre_contable_detalle="<?php echo($cierre_contable_detalle->id) ?>" title="SELECCIONAR Cierre Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($cierre_contable_detalle->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacierre_contable_detalle" idactualcierre_contable_detalle="<?php echo($cierre_contable_detalle->id) ?>" title="ELIMINAR Cierre Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($cierre_contable_detalle->i) ?>" name="t-id_<?php echo($cierre_contable_detalle->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cierre Detalle ACTUAL" value="<?php echo($cierre_contable_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($cierre_contable_detalle->i) ?>_0" name="t-cel_<?php echo($cierre_contable_detalle->i) ?>_0" type="text" maxlength="25" value="<?php echo($cierre_contable_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $cierre_contable_detalle->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $cierre_contable_detalle->updated_at 
					</td>
				
						<td class="elementotabla col_id_detalle" >  '
							<input id="t-cel_<?php echo($cierre_contable_detalle->i) ?>_3" name="t-cel_<?php echo($cierre_contable_detalle->i) ?>_3" type="text" class="form-control"  placeholder="Detalle"  title="Detalle"    maxlength="19" size="10"  value="<?php echo($cierre_contable_detalle->id_detalle) ?>" >
							<span id="spanstrMensajeid_detalle" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_cierre_contable" ><?php echo($funciones->getComboBoxEditar($cierre_contable_detalle->id_cierre_contable_Descripcion,$cierre_contable_detalle->id_cierre_contable,'t-cel_'.$cierre_contable_detalle->i.'_4')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nro_documento" >  '
							<input id="t-cel_<?php echo($cierre_contable_detalle->i) ?>_5" name="t-cel_<?php echo($cierre_contable_detalle->i) ?>_5" type="text" class="form-control"  placeholder="Nro Documento"  title="Nro Documento"    size="10"  maxlength="10" value="<?php echo($cierre_contable_detalle->nro_documento) ?>" />
							<span id="spanstrMensajenro_documento" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nro_documento" >  '
							<input id="t-cel_<?php echo($cierre_contable_detalle->i) ?>_5" name="t-cel_<?php echo($cierre_contable_detalle->i) ?>_5" type="text" class="form-control"  placeholder="Nro Documento"  title="Nro Documento"    size="10"  maxlength="10" value="<?php echo($cierre_contable_detalle->nro_documento) ?>" />
							<span id="spanstrMensajenro_documento" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_tipo_factura" >  '
							<input id="t-cel_<?php echo($cierre_contable_detalle->i) ?>_6" name="t-cel_<?php echo($cierre_contable_detalle->i) ?>_6" type="text" class="form-control"  placeholder="Tipo Factura"  title="Tipo Factura"    size="10"  maxlength="10" value="<?php echo($cierre_contable_detalle->tipo_factura) ?>" />
							<span id="spanstrMensajetipo_factura" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_tipo_factura" >  '
							<input id="t-cel_<?php echo($cierre_contable_detalle->i) ?>_6" name="t-cel_<?php echo($cierre_contable_detalle->i) ?>_6" type="text" class="form-control"  placeholder="Tipo Factura"  title="Tipo Factura"    size="10"  maxlength="10" value="<?php echo($cierre_contable_detalle->tipo_factura) ?>" />
							<span id="spanstrMensajetipo_factura" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_monto" >  '
							<input id="t-cel_<?php echo($cierre_contable_detalle->i) ?>_7" name="t-cel_<?php echo($cierre_contable_detalle->i) ?>_7" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12"  value="<?php echo($cierre_contable_detalle->monto) ?>" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>' 
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



