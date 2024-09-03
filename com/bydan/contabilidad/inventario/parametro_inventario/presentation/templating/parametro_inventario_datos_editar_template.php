



		<form id="frmTablaDatosparametro_inventario" name="frmTablaDatosparametro_inventario">
			<div id="divTablaDatosAuxiliarparametro_inventariosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_inventarios)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_inventario" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Inventarios</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_inventarios" name="tblTablaDatosparametro_inventarios" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Termino Pago Proveedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Costeo Kardex.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Kardex.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Orden Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Devolucion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cotizacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Kardex.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Producto Inactivo</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Termino Pago Proveedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Costeo Kardex.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Kardex.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Orden Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Devolucion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cotizacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Kardex.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Producto Inactivo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_inventariosLocal!=null && count($parametro_inventariosLocal)>0) { ?>
			<?php foreach ($parametro_inventariosLocal as $parametro_inventario) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_inventario->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_inventario->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_inventario->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_inventario" idactualparametro_inventario="<?php echo($parametro_inventario->id) ?>" title="SELECCIONAR Parametro Inventario ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($parametro_inventario->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaparametro_inventario" idactualparametro_inventario="<?php echo($parametro_inventario->id) ?>" title="ELIMINAR Parametro Inventario ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($parametro_inventario->i) ?>" name="t-id_<?php echo($parametro_inventario->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro Inventario ACTUAL" value="<?php echo($parametro_inventario->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($parametro_inventario->i) ?>_0" name="t-cel_<?php echo($parametro_inventario->i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_inventario->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $parametro_inventario->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $parametro_inventario->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($parametro_inventario->id_empresa_Descripcion,$parametro_inventario->id_empresa,'t-cel_'.$parametro_inventario->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_termino_pago_proveedor" ><?php echo($funciones->getComboBoxEditar($parametro_inventario->id_termino_pago_proveedor_Descripcion,$parametro_inventario->id_termino_pago_proveedor,'t-cel_'.$parametro_inventario->i.'_4')) ?></td>
				<td class="elementotabla col_id_tipo_costeo_kardex" ><?php echo($funciones->getComboBoxEditar($parametro_inventario->id_tipo_costeo_kardex_Descripcion,$parametro_inventario->id_tipo_costeo_kardex,'t-cel_'.$parametro_inventario->i.'_5')) ?></td>
				<td class="elementotabla col_id_tipo_kardex" ><?php echo($funciones->getComboBoxEditar($parametro_inventario->id_tipo_kardex_Descripcion,$parametro_inventario->id_tipo_kardex,'t-cel_'.$parametro_inventario->i.'_6')) ?></td>
				
						<td class="elementotabla col_numero_producto" >  '
							<input id="t-cel_<?php echo($parametro_inventario->i) ?>_7" name="t-cel_<?php echo($parametro_inventario->i) ?>_7" type="text" class="form-control"  placeholder="Numero Producto"  title="Numero Producto"    maxlength="19" size="10"  value="<?php echo($parametro_inventario->numero_producto) ?>" >
							<span id="spanstrMensajenumero_producto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_orden_compra" >  '
							<input id="t-cel_<?php echo($parametro_inventario->i) ?>_8" name="t-cel_<?php echo($parametro_inventario->i) ?>_8" type="text" class="form-control"  placeholder="Numero Orden Compra"  title="Numero Orden Compra"    maxlength="19" size="10"  value="<?php echo($parametro_inventario->numero_orden_compra) ?>" >
							<span id="spanstrMensajenumero_orden_compra" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_devolucion" >  '
							<input id="t-cel_<?php echo($parametro_inventario->i) ?>_9" name="t-cel_<?php echo($parametro_inventario->i) ?>_9" type="text" class="form-control"  placeholder="Numero Devolucion"  title="Numero Devolucion"    maxlength="19" size="10"  value="<?php echo($parametro_inventario->numero_devolucion) ?>" >
							<span id="spanstrMensajenumero_devolucion" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_cotizacion" >  '
							<input id="t-cel_<?php echo($parametro_inventario->i) ?>_10" name="t-cel_<?php echo($parametro_inventario->i) ?>_10" type="text" class="form-control"  placeholder="Numero Cotizacion"  title="Numero Cotizacion"    maxlength="19" size="10"  value="<?php echo($parametro_inventario->numero_cotizacion) ?>" >
							<span id="spanstrMensajenumero_cotizacion" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_kardex" >  '
							<input id="t-cel_<?php echo($parametro_inventario->i) ?>_11" name="t-cel_<?php echo($parametro_inventario->i) ?>_11" type="text" class="form-control"  placeholder="Numero Kardex"  title="Numero Kardex"    maxlength="19" size="10"  value="<?php echo($parametro_inventario->numero_kardex) ?>" >
							<span id="spanstrMensajenumero_kardex" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_producto_inactivo" ><?php  $funciones->getCheckBoxEditar($parametro_inventario->con_producto_inactivo,'t-cel_<?php echo($parametro_inventario->i) ?>_12',$paraReporte)  ?>
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



