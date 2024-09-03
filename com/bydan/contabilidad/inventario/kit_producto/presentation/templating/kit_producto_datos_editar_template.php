



		<form id="frmTablaDatoskit_producto" name="frmTablaDatoskit_producto">
			<div id="divTablaDatosAuxiliarkit_productosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($kit_productos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulokit_producto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Kits Productoes</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoskit_productos" name="tblTablaDatoskit_productos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Id Padre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Hijo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Id Padre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Hijo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($kit_productosLocal!=null && count($kit_productosLocal)>0) { ?>
			<?php foreach ($kit_productosLocal as $kit_producto) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($kit_producto->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$kit_producto->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($kit_producto->id) ?>
							</td>
							<td>
								<img class="imgseleccionarkit_producto" idactualkit_producto="<?php echo($kit_producto->id) ?>" title="SELECCIONAR Kits Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($kit_producto->id) ?>
							</td>
							<td>
								<img class="imgeliminartablakit_producto" idactualkit_producto="<?php echo($kit_producto->id) ?>" title="ELIMINAR Kits Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($kit_producto->i) ?>" name="t-id_<?php echo($kit_producto->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Kits Producto ACTUAL" value="<?php echo($kit_producto->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($kit_producto->i) ?>_0" name="t-cel_<?php echo($kit_producto->i) ?>_0" type="text" maxlength="25" value="<?php echo($kit_producto->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $kit_producto->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $kit_producto->updated_at 
					</td>
				
						<td class="elementotabla col_id_padre" >  '
							<input id="t-cel_<?php echo($kit_producto->i) ?>_3" name="t-cel_<?php echo($kit_producto->i) ?>_3" type="text" class="form-control"  placeholder="Id Padre"  title="Id Padre"    maxlength="19" size="10"  value="<?php echo($kit_producto->id_padre) ?>" >
							<span id="spanstrMensajeid_padre" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_id_hijo" >  '
							<input id="t-cel_<?php echo($kit_producto->i) ?>_4" name="t-cel_<?php echo($kit_producto->i) ?>_4" type="text" class="form-control"  placeholder="Id Hijo"  title="Id Hijo"    maxlength="19" size="10"  value="<?php echo($kit_producto->id_hijo) ?>" >
							<span id="spanstrMensajeid_hijo" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_cantidad" >  '
							<input id="t-cel_<?php echo($kit_producto->i) ?>_5" name="t-cel_<?php echo($kit_producto->i) ?>_5" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12"  value="<?php echo($kit_producto->cantidad) ?>" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>' 
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



