



		<form id="frmTablaDatoslista_precio" name="frmTablaDatoslista_precio">
			<div id="divTablaDatosAuxiliarlista_preciosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($lista_precios)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulolista_precio" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Lista Precioses</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoslista_precios" name="tblTablaDatoslista_precios" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Rango Inicial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Rango Final.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Rango Inicial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Rango Final.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($lista_preciosLocal!=null && count($lista_preciosLocal)>0) { ?>
			<?php foreach ($lista_preciosLocal as $lista_precio) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($lista_precio->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$lista_precio->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($lista_precio->id) ?>
							</td>
							<td>
								<img class="imgseleccionarlista_precio" idactuallista_precio="<?php echo($lista_precio->id) ?>" title="SELECCIONAR Lista Precios ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($lista_precio->id) ?>
							</td>
							<td>
								<img class="imgeliminartablalista_precio" idactuallista_precio="<?php echo($lista_precio->id) ?>" title="ELIMINAR Lista Precios ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($lista_precio->i) ?>" name="t-id_<?php echo($lista_precio->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Lista Precios ACTUAL" value="<?php echo($lista_precio->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($lista_precio->i) ?>_0" name="t-cel_<?php echo($lista_precio->i) ?>_0" type="text" maxlength="25" value="<?php echo($lista_precio->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $lista_precio->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $lista_precio->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($lista_precio->id_empresa_Descripcion,$lista_precio->id_empresa,'t-cel_'.$lista_precio->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_bodega" ><?php echo($funciones->getComboBoxEditar($lista_precio->id_bodega_Descripcion,$lista_precio->id_bodega,'t-cel_'.$lista_precio->i.'_4')) ?></td>
				<td class="elementotabla col_id_producto" ><?php echo($funciones->getComboBoxEditar($lista_precio->id_producto_Descripcion,$lista_precio->id_producto,'t-cel_'.$lista_precio->i.'_5')) ?></td>
				<td class="elementotabla col_id_proveedor" ><?php echo($funciones->getComboBoxEditar($lista_precio->id_proveedor_Descripcion,$lista_precio->id_proveedor,'t-cel_'.$lista_precio->i.'_6')) ?></td>
				
						<td class="elementotabla col_precio_compra" >  '
							<input id="t-cel_<?php echo($lista_precio->i) ?>_7" name="t-cel_<?php echo($lista_precio->i) ?>_7" type="text" class="form-control"  placeholder="Precio Compra"  title="Precio Compra"    maxlength="18" size="12"  value="<?php echo($lista_precio->precio_compra) ?>" >
							<span id="spanstrMensajeprecio_compra" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_rango_inicial" >  '
							<input id="t-cel_<?php echo($lista_precio->i) ?>_8" name="t-cel_<?php echo($lista_precio->i) ?>_8" type="text" class="form-control"  placeholder="Rango Inicial"  title="Rango Inicial"    maxlength="18" size="12"  value="<?php echo($lista_precio->rango_inicial) ?>" >
							<span id="spanstrMensajerango_inicial" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_rango_final" >  '
							<input id="t-cel_<?php echo($lista_precio->i) ?>_9" name="t-cel_<?php echo($lista_precio->i) ?>_9" type="text" class="form-control"  placeholder="Rango Final"  title="Rango Final"    maxlength="18" size="12"  value="<?php echo($lista_precio->rango_final) ?>" >
							<span id="spanstrMensajerango_final" class="mensajeerror"></span>' 
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



