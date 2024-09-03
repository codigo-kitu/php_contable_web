



		<form id="frmTablaDatosimagen_factura" name="frmTablaDatosimagen_factura">
			<div id="divTablaDatosAuxiliarimagen_facturasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($imagen_facturas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloimagen_factura" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Imagenes Facturases</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosimagen_facturas" name="tblTablaDatosimagen_facturas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Factura.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla"> Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Factura.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($imagen_facturasLocal!=null && count($imagen_facturasLocal)>0) { ?>
			<?php foreach ($imagen_facturasLocal as $imagen_factura) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($imagen_factura->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$imagen_factura->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($imagen_factura->id) ?>
							</td>
							<td>
								<img class="imgseleccionarimagen_factura" idactualimagen_factura="<?php echo($imagen_factura->id) ?>" title="SELECCIONAR Imagenes Facturas ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($imagen_factura->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaimagen_factura" idactualimagen_factura="<?php echo($imagen_factura->id) ?>" title="ELIMINAR Imagenes Facturas ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($imagen_factura->i) ?>" name="t-id_<?php echo($imagen_factura->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Imagenes Facturas ACTUAL" value="<?php echo($imagen_factura->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($imagen_factura->i) ?>_0" name="t-cel_<?php echo($imagen_factura->i) ?>_0" type="text" maxlength="25" value="<?php echo($imagen_factura->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $imagen_factura->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $imagen_factura->updated_at 
					</td>
				<td class="elementotabla col_id_factura" ><?php echo($funciones->getComboBoxEditar($imagen_factura->id_factura_Descripcion,$imagen_factura->id_factura,'t-cel_'.$imagen_factura->i.'_3')) ?></td>
				
						<td class="elementotabla col_id_imagen" >  '
							<input id="t-cel_<?php echo($imagen_factura->i) ?>_4" name="t-cel_<?php echo($imagen_factura->i) ?>_4" type="text" class="form-control"  placeholder="Imagen"  title="Imagen"    maxlength="19" size="10"  value="<?php echo($imagen_factura->id_imagen) ?>" >
							<span id="spanstrMensajeid_imagen" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_imagen" >  '<textarea id="t-cel_<?php echo($imagen_factura->i) ?>_5" name="t-cel_<?php echo($imagen_factura->i) ?>_5" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($imagen_factura->imagen) ?></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_imagen" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($imagen_factura->i) ?>_5" name="t-cel_<?php echo($imagen_factura->i) ?>_5" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($imagen_factura->imagen) ?></input>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nro_factura" >  '
							<input id="t-cel_<?php echo($imagen_factura->i) ?>_6" name="t-cel_<?php echo($imagen_factura->i) ?>_6" type="text" class="form-control"  placeholder="Nro Factura"  title="Nro Factura"    size="10"  maxlength="10" value="<?php echo($imagen_factura->nro_factura) ?>" />
							<span id="spanstrMensajenro_factura" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nro_factura" >  '
							<input id="t-cel_<?php echo($imagen_factura->i) ?>_6" name="t-cel_<?php echo($imagen_factura->i) ?>_6" type="text" class="form-control"  placeholder="Nro Factura"  title="Nro Factura"    size="10"  maxlength="10" value="<?php echo($imagen_factura->nro_factura) ?>" />
							<span id="spanstrMensajenro_factura" class="mensajeerror"></span>' 
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



