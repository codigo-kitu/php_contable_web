



		<form id="frmTablaDatosinventario_fisico_detalle" name="frmTablaDatosinventario_fisico_detalle">
			<div id="divTablaDatosAuxiliarinventario_fisico_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($inventario_fisico_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloinventario_fisico_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Inventario Fisico Detalles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosinventario_fisico_detalles" name="tblTablaDatosinventario_fisico_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Inventario Fisico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidades Contadas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo3.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Inventario Fisico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidades Contadas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo3.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($inventario_fisico_detallesLocal!=null && count($inventario_fisico_detallesLocal)>0) { ?>
			<?php foreach ($inventario_fisico_detallesLocal as $inventario_fisico_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($inventario_fisico_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$inventario_fisico_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($inventario_fisico_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionarinventario_fisico_detalle" idactualinventario_fisico_detalle="<?php echo($inventario_fisico_detalle->id) ?>" title="SELECCIONAR Inventario Fisico Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($inventario_fisico_detalle->id) ?>
							</td>
							<td>
								<img class="imgeliminartablainventario_fisico_detalle" idactualinventario_fisico_detalle="<?php echo($inventario_fisico_detalle->id) ?>" title="ELIMINAR Inventario Fisico Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($inventario_fisico_detalle->i) ?>" name="t-id_<?php echo($inventario_fisico_detalle->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Inventario Fisico Detalle ACTUAL" value="<?php echo($inventario_fisico_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_0" name="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_0" type="text" maxlength="25" value="<?php echo($inventario_fisico_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $inventario_fisico_detalle->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $inventario_fisico_detalle->updated_at 
					</td>
				<td class="elementotabla col_id_inventario_fisico" ><?php echo($funciones->getComboBoxEditar($inventario_fisico_detalle->id_inventario_fisico_Descripcion,$inventario_fisico_detalle->id_inventario_fisico,'t-cel_'.$inventario_fisico_detalle->i.'_3')) ?></td>
				<td class="elementotabla col_id_producto" ><?php echo($funciones->getComboBoxEditar($inventario_fisico_detalle->id_producto_Descripcion,$inventario_fisico_detalle->id_producto,'t-cel_'.$inventario_fisico_detalle->i.'_4')) ?></td>
				<td class="elementotabla col_id_bodega" ><?php echo($funciones->getComboBoxEditar($inventario_fisico_detalle->id_bodega_Descripcion,$inventario_fisico_detalle->id_bodega,'t-cel_'.$inventario_fisico_detalle->i.'_5')) ?></td>
				
						<td class="elementotabla col_unidades_contadas" >  '
							<input id="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_6" name="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_6" type="text" class="form-control"  placeholder="Unidades Contadas"  title="Unidades Contadas"    maxlength="18" size="12"  value="<?php echo($inventario_fisico_detalle->unidades_contadas) ?>" >
							<span id="spanstrMensajeunidades_contadas" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_campo1" >  '<textarea id="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_7" name="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_7" class="form-control"  placeholder="Campo1"  title="Campo1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($inventario_fisico_detalle->campo1) ?></textarea>
							<span id="spanstrMensajecampo1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_campo1" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_7" name="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_7" class="form-control"  placeholder="Campo1"  title="Campo1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($inventario_fisico_detalle->campo1) ?></input>
							<span id="spanstrMensajecampo1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_campo2" >  '
							<input id="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_8" name="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_8" type="text" class="form-control"  placeholder="Campo2"  title="Campo2"    maxlength="18" size="12"  value="<?php echo($inventario_fisico_detalle->campo2) ?>" >
							<span id="spanstrMensajecampo2" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_campo3" >  '<textarea id="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_9" name="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_9" class="form-control"  placeholder="Campo3"  title="Campo3"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($inventario_fisico_detalle->campo3) ?></textarea>
							<span id="spanstrMensajecampo3" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_campo3" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_9" name="t-cel_<?php echo($inventario_fisico_detalle->i) ?>_9" class="form-control"  placeholder="Campo3"  title="Campo3"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($inventario_fisico_detalle->campo3) ?></input>
							<span id="spanstrMensajecampo3" class="mensajeerror"></span>' 
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



