



		<form id="frmTablaDatoskardex_detalle" name="frmTablaDatoskardex_detalle">
			<div id="divTablaDatosAuxiliarkardex_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($kardex_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulokardex_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Detalles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoskardex_detalles" name="tblTablaDatoskardex_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Kardex<a onclick="jQuery('#form-id_kardex_img').trigger('click' );"><img id="form$strSufijo-id_kardex_img2" name="form$strSufijo-id_kardex_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="kardex_detalle_webcontrol1.abrirBusquedaParakardex('id_kardex');"><img id="form$strSufijo-id_kardex_img_busqueda2" name="form$strSufijo-id_kardex_img_busqueda2" title="Buscar Kardex" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No. Item</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form$strSufijo-id_bodega_img2" name="form$strSufijo-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="kardex_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form$strSufijo-id_bodega_img_busqueda2" name="form$strSufijo-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form$strSufijo-id_producto_img2" name="form$strSufijo-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="kardex_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form$strSufijo-id_producto_img_busqueda2" name="form$strSufijo-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form$strSufijo-id_unidad_img2" name="form$strSufijo-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="kardex_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form$strSufijo-id_unidad_img_busqueda2" name="form$strSufijo-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Lote<a onclick="jQuery('#form-id_lote_producto_img').trigger('click' );"><img id="form$strSufijo-id_lote_producto_img2" name="form$strSufijo-id_lote_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="kardex_detalle_webcontrol1.abrirBusquedaParalote_producto('id_lote_producto');"><img id="form$strSufijo-id_lote_producto_img_busqueda2" name="form$strSufijo-id_lote_producto_img_busqueda2" title="Buscar Lotes Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Kardex<a onclick="jQuery('#form-id_kardex_img').trigger('click' );"><img id="form$strSufijo-id_kardex_img2" name="form$strSufijo-id_kardex_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="kardex_detalle_webcontrol1.abrirBusquedaParakardex('id_kardex');"><img id="form$strSufijo-id_kardex_img_busqueda2" name="form$strSufijo-id_kardex_img_busqueda2" title="Buscar Kardex" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No. Item</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form$strSufijo-id_bodega_img2" name="form$strSufijo-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="kardex_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form$strSufijo-id_bodega_img_busqueda2" name="form$strSufijo-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form$strSufijo-id_producto_img2" name="form$strSufijo-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="kardex_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form$strSufijo-id_producto_img_busqueda2" name="form$strSufijo-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form$strSufijo-id_unidad_img2" name="form$strSufijo-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="kardex_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form$strSufijo-id_unidad_img_busqueda2" name="form$strSufijo-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Lote<a onclick="jQuery('#form-id_lote_producto_img').trigger('click' );"><img id="form$strSufijo-id_lote_producto_img2" name="form$strSufijo-id_lote_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="kardex_detalle_webcontrol1.abrirBusquedaParalote_producto('id_lote_producto');"><img id="form$strSufijo-id_lote_producto_img_busqueda2" name="form$strSufijo-id_lote_producto_img_busqueda2" title="Buscar Lotes Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($kardex_detallesLocal!=null && count($kardex_detallesLocal)>0) { ?>
			<?php foreach ($kardex_detallesLocal as $kardex_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($kardex_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$kardex_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($kardex_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionarkardex_detalle" idactualkardex_detalle="<?php echo($kardex_detalle->id) ?>"  funcionjsactualkardex_detalle="'.str_replace('TO_REPLACE',$kardex_detalle->id.',\''.kardex_detalle_util::getkardex_detalleDescripcion($kardex_detalle).'\'',$this->strFuncionJs).'" title="SELECCIONAR Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Detalle ACTUAL" value="<?php echo($kardex_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($kardex_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $kardex_detalle->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $kardex_detalle->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_kardex" > <?php echo($kardex_detalle->id_kardex_Descripcion) ?></td>
				
					<td class="elementotabla col_numero_item" > 
						<?php echo( $kardex_detalle->numero_item ) ?>
					</td>
				<td class="elementotabla col_id_bodega" > <?php echo($kardex_detalle->id_bodega_Descripcion) ?></td>
				<td class="elementotabla col_id_producto" > <?php echo($kardex_detalle->id_producto_Descripcion) ?></td>
				<td class="elementotabla col_id_unidad" > <?php echo($kardex_detalle->id_unidad_Descripcion) ?></td>
				
					<td class="elementotabla col_cantidad" > 
						<?php echo( $kardex_detalle->cantidad ) ?>
					</td>
				
					<td class="elementotabla col_costo" > 
						<?php echo( $kardex_detalle->costo ) ?>
					</td>
				
					<td class="elementotabla col_total" > 
						<?php echo( $kardex_detalle->total ) ?>
					</td>
				<td class="elementotabla col_id_lote_producto" > <?php echo($kardex_detalle->id_lote_producto_Descripcion) ?></td>
				
					<td class="elementotabla col_descripcion" > 
						<?php echo( $kardex_detalle->descripcion ) ?>
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



