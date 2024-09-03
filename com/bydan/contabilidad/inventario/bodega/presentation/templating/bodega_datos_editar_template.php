



		<form id="frmTablaDatosbodega" name="frmTablaDatosbodega">
			<div id="divTablaDatosAuxiliarbodegasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($bodegas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulobodega" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Bodegas</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosbodegas" name="tblTablaDatosbodegas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Productos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Producto_DEFECTOs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Producto s</pre></b>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Productos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Producto_DEFECTOs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Producto s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($bodegasLocal!=null && count($bodegasLocal)>0) { ?>
			<?php foreach ($bodegasLocal as $bodega) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($bodega->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$bodega->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($bodega->id) ?>
							</td>
							<td>
								<img class="imgseleccionarbodega" idactualbodega="<?php echo($bodega->id) ?>" title="SELECCIONAR Bodega ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($bodega->id) ?>
							</td>
							<td>
								<img class="imgeliminartablabodega" idactualbodega="<?php echo($bodega->id) ?>" title="ELIMINAR Bodega ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($bodega->i) ?>" name="t-id_<?php echo($bodega->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Bodega ACTUAL" value="<?php echo($bodega->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($bodega->i) ?>_0" name="t-cel_<?php echo($bodega->i) ?>_0" type="text" maxlength="25" value="<?php echo($bodega->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($bodega->id) ?><img class="imgseleccionarmostraraccionesrelacionesbodega" idactualbodega="<?php echo($bodega->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $bodega->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $bodega->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($bodega->id_empresa_Descripcion,$bodega->id_empresa,'t-cel_'.$bodega->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_sucursal" ><?php echo($funciones->getComboBoxEditar($bodega->id_sucursal_Descripcion,$bodega->id_sucursal,'t-cel_'.$bodega->i.'_4')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($bodega->i) ?>_5" name="t-cel_<?php echo($bodega->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="25" value="<?php echo($bodega->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($bodega->i) ?>_5" name="t-cel_<?php echo($bodega->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="25" value="<?php echo($bodega->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '<textarea id="t-cel_<?php echo($bodega->i) ?>_6" name="t-cel_<?php echo($bodega->i) ?>_6" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($bodega->nombre) ?></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($bodega->i) ?>_6" name="t-cel_<?php echo($bodega->i) ?>_6" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($bodega->nombre) ?></input>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion" >  '<textarea id="t-cel_<?php echo($bodega->i) ?>_7" name="t-cel_<?php echo($bodega->i) ?>_7" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($bodega->direccion) ?></textarea>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion" >  '<input type="text" maxlength="250"  id="t-cel_<?php echo($bodega->i) ?>_7" name="t-cel_<?php echo($bodega->i) ?>_7" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($bodega->direccion) ?></input>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono" >  '
							<input id="t-cel_<?php echo($bodega->i) ?>_8" name="t-cel_<?php echo($bodega->i) ?>_8" type="text" class="form-control"  placeholder="Telefono"  title="Telefono"    size="20"  maxlength="30" value="<?php echo($bodega->telefono) ?>" />
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono" >  '
							<input id="t-cel_<?php echo($bodega->i) ?>_8" name="t-cel_<?php echo($bodega->i) ?>_8" type="text" class="form-control"  placeholder="Telefono"  title="Telefono"    size="20"  maxlength="30" value="<?php echo($bodega->telefono) ?>" />
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_numero_productos" >  '
							<input id="t-cel_<?php echo($bodega->i) ?>_9" name="t-cel_<?php echo($bodega->i) ?>_9" type="text" class="form-control"  placeholder="No Productos"  title="No Productos"    maxlength="10" size="10"  value="<?php echo($bodega->numero_productos) ?>"  readonly="readonly">
							<span id="spanstrMensajenumero_productos" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_defecto" ><?php  $funciones->getCheckBoxEditar($bodega->defecto,'t-cel_<?php echo($bodega->i) ?>_10',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_activo" ><?php  $funciones->getCheckBoxEditar($bodega->activo,'t-cel_<?php echo($bodega->i) ?>_11',$paraReporte)  ?>
						</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($bodega->id) ?>
							<img class="imgrelacionproducto_defecto" idactualbodega="<?php echo($bodega->id) ?>" title="ProductoS DE Bodega" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($bodega->id) ?>
							<img class="imgrelacionproducto_bodega" idactualbodega="<?php echo($bodega->id) ?>" title="Producto BodegaS DE Bodega" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/producto_bodegas.gif" alt="Seleccionar" border="" height="15" width="15">
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



