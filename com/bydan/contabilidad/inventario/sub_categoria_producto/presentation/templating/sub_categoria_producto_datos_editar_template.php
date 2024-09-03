



		<form id="frmTablaDatossub_categoria_producto" name="frmTablaDatossub_categoria_producto">
			<div id="divTablaDatosAuxiliarsub_categoria_productosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($sub_categoria_productos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulosub_categoria_producto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Sub Categoria Productos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatossub_categoria_productos" name="tblTablaDatossub_categoria_productos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:<?php echo($strPermisoRelaciones) ?>">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Productos.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Lista Productoses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Productos</pre></b>
			</th>

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:<?php echo($strPermisoRelaciones) ?>">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Productos.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Lista Productoses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Productos</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($sub_categoria_productosLocal!=null && count($sub_categoria_productosLocal)>0) { ?>
			<?php foreach ($sub_categoria_productosLocal as $sub_categoria_producto) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($sub_categoria_producto->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$sub_categoria_producto->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($sub_categoria_producto->id) ?>
							</td>
							<td>
								<img class="imgseleccionarsub_categoria_producto" idactualsub_categoria_producto="<?php echo($sub_categoria_producto->id) ?>" title="SELECCIONAR Sub Categoria Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($sub_categoria_producto->id) ?>
							</td>
							<td>
								<img class="imgeliminartablasub_categoria_producto" idactualsub_categoria_producto="<?php echo($sub_categoria_producto->id) ?>" title="ELIMINAR Sub Categoria Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($sub_categoria_producto->i) ?>" name="t-id_<?php echo($sub_categoria_producto->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Sub Categoria Producto ACTUAL" value="<?php echo($sub_categoria_producto->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($sub_categoria_producto->i) ?>_0" name="t-cel_<?php echo($sub_categoria_producto->i) ?>_0" type="text" maxlength="25" value="<?php echo($sub_categoria_producto->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($sub_categoria_producto->id) ?><img class="imgseleccionarmostraraccionesrelacionessub_categoria_producto" idactualsub_categoria_producto="<?php echo($sub_categoria_producto->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $sub_categoria_producto->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $sub_categoria_producto->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($sub_categoria_producto->id_empresa_Descripcion,$sub_categoria_producto->id_empresa,'t-cel_'.$sub_categoria_producto->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_categoria_producto" ><?php echo($funciones->getComboBoxEditar($sub_categoria_producto->id_categoria_producto_Descripcion,$sub_categoria_producto->id_categoria_producto,'t-cel_'.$sub_categoria_producto->i.'_4')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($sub_categoria_producto->i) ?>_5" name="t-cel_<?php echo($sub_categoria_producto->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="10"  maxlength="10" value="<?php echo($sub_categoria_producto->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($sub_categoria_producto->i) ?>_5" name="t-cel_<?php echo($sub_categoria_producto->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="10"  maxlength="10" value="<?php echo($sub_categoria_producto->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($sub_categoria_producto->i) ?>_6" name="t-cel_<?php echo($sub_categoria_producto->i) ?>_6" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="40" value="<?php echo($sub_categoria_producto->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($sub_categoria_producto->i) ?>_6" name="t-cel_<?php echo($sub_categoria_producto->i) ?>_6" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="40" value="<?php echo($sub_categoria_producto->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_predeterminado" ><?php  $funciones->getCheckBoxEditar($sub_categoria_producto->predeterminado,'t-cel_<?php echo($sub_categoria_producto->i) ?>_7',$paraReporte)  ?>
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_imagen" >  '<textarea id="t-cel_<?php echo($sub_categoria_producto->i) ?>_8" name="t-cel_<?php echo($sub_categoria_producto->i) ?>_8" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($sub_categoria_producto->imagen) ?></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_imagen" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($sub_categoria_producto->i) ?>_8" name="t-cel_<?php echo($sub_categoria_producto->i) ?>_8" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($sub_categoria_producto->imagen) ?></input>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_numero_productos" >  '
							<input id="t-cel_<?php echo($sub_categoria_producto->i) ?>_9" name="t-cel_<?php echo($sub_categoria_producto->i) ?>_9" type="text" class="form-control"  placeholder="No Productos"  title="No Productos"    maxlength="10" size="10"  value="<?php echo($sub_categoria_producto->numero_productos) ?>"  readonly="readonly">
							<span id="spanstrMensajenumero_productos" class="mensajeerror"></span>' 
						</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($sub_categoria_producto->id) ?>
							<img class="imgrelacionlista_producto" idactualsub_categoria_producto="<?php echo($sub_categoria_producto->id) ?>" title="Lista ProductosS DE Sub Categoria Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($sub_categoria_producto->id) ?>
							<img class="imgrelacionproducto" idactualsub_categoria_producto="<?php echo($sub_categoria_producto->id) ?>" title="ProductoS DE Sub Categoria Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				<?php } ?>

				<td style="display:none" class="actions"></td>

				</tr>
			<?php } ?>
		<?php } ?>

					</tbody>

				</table>

			</div>

		</form>



