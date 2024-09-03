



		<form id="frmTablaDatosotro_impuesto" name="frmTablaDatosotro_impuesto">
			<div id="divTablaDatosAuxiliarotro_impuestosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($otro_impuestos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulootro_impuesto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Otro Impuestos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosotro_impuestos" name="tblTablaDatosotro_impuestos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Compras</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Productos_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Productos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Compras</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Productos_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Productos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($otro_impuestosLocal!=null && count($otro_impuestosLocal)>0) { ?>
			<?php foreach ($otro_impuestosLocal as $otro_impuesto) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($otro_impuesto->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$otro_impuesto->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($otro_impuesto->id) ?>
							</td>
							<td>
								<img class="imgseleccionarotro_impuesto" idactualotro_impuesto="<?php echo($otro_impuesto->id) ?>" title="SELECCIONAR Otro Impuesto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($otro_impuesto->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaotro_impuesto" idactualotro_impuesto="<?php echo($otro_impuesto->id) ?>" title="ELIMINAR Otro Impuesto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($otro_impuesto->i) ?>" name="t-id_<?php echo($otro_impuesto->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Otro Impuesto ACTUAL" value="<?php echo($otro_impuesto->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($otro_impuesto->i) ?>_0" name="t-cel_<?php echo($otro_impuesto->i) ?>_0" type="text" maxlength="25" value="<?php echo($otro_impuesto->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($otro_impuesto->id) ?><img class="imgseleccionarmostraraccionesrelacionesotro_impuesto" idactualotro_impuesto="<?php echo($otro_impuesto->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $otro_impuesto->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $otro_impuesto->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($otro_impuesto->id_empresa_Descripcion,$otro_impuesto->id_empresa,'t-cel_'.$otro_impuesto->i.'_3')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($otro_impuesto->i) ?>_4" name="t-cel_<?php echo($otro_impuesto->i) ?>_4" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="5"  maxlength="5" value="<?php echo($otro_impuesto->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($otro_impuesto->i) ?>_4" name="t-cel_<?php echo($otro_impuesto->i) ?>_4" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="5"  maxlength="5" value="<?php echo($otro_impuesto->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '
							<input id="t-cel_<?php echo($otro_impuesto->i) ?>_5" name="t-cel_<?php echo($otro_impuesto->i) ?>_5" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="40" value="<?php echo($otro_impuesto->descripcion) ?>" />
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '
							<input id="t-cel_<?php echo($otro_impuesto->i) ?>_5" name="t-cel_<?php echo($otro_impuesto->i) ?>_5" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="40" value="<?php echo($otro_impuesto->descripcion) ?>" />
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_valor" >  '
							<input id="t-cel_<?php echo($otro_impuesto->i) ?>_6" name="t-cel_<?php echo($otro_impuesto->i) ?>_6" type="text" class="form-control"  placeholder="Valor"  title="Valor"    maxlength="18" size="12"  value="<?php echo($otro_impuesto->valor) ?>" >
							<span id="spanstrMensajevalor" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_predeterminado" ><?php  $funciones->getCheckBoxEditar($otro_impuesto->predeterminado,'t-cel_<?php echo($otro_impuesto->i) ?>_7',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_cuenta_ventas" ><?php echo($funciones->getComboBoxEditar($otro_impuesto->id_cuenta_ventas_Descripcion,$otro_impuesto->id_cuenta_ventas,'t-cel_'.$otro_impuesto->i.'_8')) ?></td>
				<td class="elementotabla col_id_cuenta_compras" ><?php echo($funciones->getComboBoxEditar($otro_impuesto->id_cuenta_compras_Descripcion,$otro_impuesto->id_cuenta_compras,'t-cel_'.$otro_impuesto->i.'_9')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($otro_impuesto->id) ?>
							<img class="imgrelacioncliente" idactualotro_impuesto="<?php echo($otro_impuesto->id) ?>" title="ClienteS DE Otro Impuesto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($otro_impuesto->id) ?>
							<img class="imgrelacionlista_producto_compras" idactualotro_impuesto="<?php echo($otro_impuesto->id) ?>" title="Lista ProductosS DE Otro Impuesto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($otro_impuesto->id) ?>
							<img class="imgrelacionproducto" idactualotro_impuesto="<?php echo($otro_impuesto->id) ?>" title="ProductoS DE Otro Impuesto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($otro_impuesto->id) ?>
							<img class="imgrelacionproveedor" idactualotro_impuesto="<?php echo($otro_impuesto->id) ?>" title="ProveedorS DE Otro Impuesto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
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



