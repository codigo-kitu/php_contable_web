



		<form id="frmTablaDatosorden_compra_detalle" name="frmTablaDatosorden_compra_detalle">
			<div id="divTablaDatosAuxiliarorden_compra_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($orden_compra_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloorden_compra_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Compras Detalles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosorden_compra_detalles" name="tblTablaDatosorden_compra_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

		<?php if($IS_DEVELOPING && !$bitEsRelacionado) { ?>
			<caption>(<?php echo($STR_PREFIJO_TABLE.$STR_TABLE_NAME) ?>)</caption>
		<?php } ?>

		
			<thead>
				<tr class="<?php echo($class_cabecera) ?>">
		<?php // class="cabeceratabla" ?>

				<?php //EN UNA LINEA PRIMERO COLUMNAS(ID,ELIMINAR,SELECCIONAR) ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Orden Compra<a onclick="jQuery('#form-id_orden_compra_img').trigger('click' );"><img id="form$strSufijo-id_orden_compra_img2" name="form$strSufijo-id_orden_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaorden_compra('id_orden_compra');"><img id="form$strSufijo-id_orden_compra_img_busqueda2" name="form$strSufijo-id_orden_compra_img_busqueda2" title="Buscar Orden Compra" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form$strSufijo-id_bodega_img2" name="form$strSufijo-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form$strSufijo-id_bodega_img_busqueda2" name="form$strSufijo-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form$strSufijo-id_producto_img2" name="form$strSufijo-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form$strSufijo-id_producto_img_busqueda2" name="form$strSufijo-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form$strSufijo-id_unidad_img2" name="form$strSufijo-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form$strSufijo-id_unidad_img_busqueda2" name="form$strSufijo-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento</pre>
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
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Orden Compra<a onclick="jQuery('#form-id_orden_compra_img').trigger('click' );"><img id="form$strSufijo-id_orden_compra_img2" name="form$strSufijo-id_orden_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaorden_compra('id_orden_compra');"><img id="form$strSufijo-id_orden_compra_img_busqueda2" name="form$strSufijo-id_orden_compra_img_busqueda2" title="Buscar Orden Compra" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form$strSufijo-id_bodega_img2" name="form$strSufijo-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form$strSufijo-id_bodega_img_busqueda2" name="form$strSufijo-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form$strSufijo-id_producto_img2" name="form$strSufijo-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form$strSufijo-id_producto_img_busqueda2" name="form$strSufijo-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form$strSufijo-id_unidad_img2" name="form$strSufijo-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form$strSufijo-id_unidad_img_busqueda2" name="form$strSufijo-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($orden_compra_detallesLocal!=null && count($orden_compra_detallesLocal)>0) { ?>
			<?php foreach ($orden_compra_detallesLocal as $orden_compra_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($orden_compra_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$orden_compra_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($orden_compra_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionarorden_compra_detalle" idactualorden_compra_detalle="<?php echo($orden_compra_detalle->id) ?>"  funcionjsactualorden_compra_detalle="'.str_replace('TO_REPLACE',$orden_compra_detalle->id.',\''.orden_compra_detalle_util::getorden_compra_detalleDescripcion($orden_compra_detalle).'\'',$this->strFuncionJs).'" title="SELECCIONAR Compras Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Compras Detalle ACTUAL" value="<?php echo($orden_compra_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($orden_compra_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $orden_compra_detalle->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $orden_compra_detalle->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_orden_compra" > <?php echo($orden_compra_detalle->id_orden_compra_Descripcion) ?></td>
				<td class="elementotabla col_id_bodega" > <?php echo($orden_compra_detalle->id_bodega_Descripcion) ?></td>
				<td class="elementotabla col_id_producto" > <?php echo($orden_compra_detalle->id_producto_Descripcion) ?></td>
				<td class="elementotabla col_id_unidad" > <?php echo($orden_compra_detalle->id_unidad_Descripcion) ?></td>
				
					<td class="elementotabla col_cantidad" > 
						<?php echo( $orden_compra_detalle->cantidad ) ?>
					</td>
				
					<td class="elementotabla col_precio" > 
						<?php echo( $orden_compra_detalle->precio ) ?>
					</td>
				
					<td class="elementotabla col_sub_total" > 
						<?php echo( $orden_compra_detalle->sub_total ) ?>
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						<?php echo( $orden_compra_detalle->descuento_porciento ) ?>
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						<?php echo( $orden_compra_detalle->descuento_monto ) ?>
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



