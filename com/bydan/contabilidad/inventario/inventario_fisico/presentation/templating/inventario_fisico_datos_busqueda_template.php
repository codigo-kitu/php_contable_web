



		<form id="frmTablaDatosinventario_fisico" name="frmTablaDatosinventario_fisico">
			<div id="divTablaDatosAuxiliarinventario_fisicosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($inventario_fisicos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloinventario_fisico" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Inventario Fisicos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosinventario_fisicos" name="tblTablaDatosinventario_fisicos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Inventario Fisico<a onclick="jQuery('#form-id_inventario_fisico_img').trigger('click' );"><img id="form$strSufijo-id_inventario_fisico_img2" name="form$strSufijo-id_inventario_fisico_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="inventario_fisico_webcontrol1.abrirBusquedaParainventario_fisico('id_inventario_fisico');"><img id="form$strSufijo-id_inventario_fisico_img_busqueda2" name="form$strSufijo-id_inventario_fisico_img_busqueda2" title="Buscar Inventario Fisico" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form$strSufijo-id_bodega_img2" name="form$strSufijo-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="inventario_fisico_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form$strSufijo-id_bodega_img_busqueda2" name="form$strSufijo-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Almacen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Prod Cont Almacen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Productos Almacen</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>s</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Inventario Fisico<a onclick="jQuery('#form-id_inventario_fisico_img').trigger('click' );"><img id="form$strSufijo-id_inventario_fisico_img2" name="form$strSufijo-id_inventario_fisico_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="inventario_fisico_webcontrol1.abrirBusquedaParainventario_fisico('id_inventario_fisico');"><img id="form$strSufijo-id_inventario_fisico_img_busqueda2" name="form$strSufijo-id_inventario_fisico_img_busqueda2" title="Buscar Inventario Fisico" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form$strSufijo-id_bodega_img2" name="form$strSufijo-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="inventario_fisico_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form$strSufijo-id_bodega_img_busqueda2" name="form$strSufijo-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Almacen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Prod Cont Almacen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Productos Almacen</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($inventario_fisicosLocal!=null && count($inventario_fisicosLocal)>0) { ?>
			<?php foreach ($inventario_fisicosLocal as $inventario_fisico) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($inventario_fisico->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$inventario_fisico->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($inventario_fisico->id) ?>
							</td>
							<td>
								<img class="imgseleccionarinventario_fisico" idactualinventario_fisico="<?php echo($inventario_fisico->id) ?>"  funcionjsactualinventario_fisico="'.str_replace('TO_REPLACE',$inventario_fisico->id.',\''.inventario_fisico_util::getinventario_fisicoDescripcion($inventario_fisico).'\'',$this->strFuncionJs).'" title="SELECCIONAR Inventario Fisico ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Inventario Fisico ACTUAL" value="<?php echo($inventario_fisico->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($inventario_fisico->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $inventario_fisico->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $inventario_fisico->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_inventario_fisico" > <?php echo($inventario_fisico->id_inventario_fisico_Descripcion) ?></td>
				<td class="elementotabla col_id_bodega" > <?php echo($inventario_fisico->id_bodega_Descripcion) ?></td>
				
					<td class="elementotabla col_fecha" > 
						<?php echo( $inventario_fisico->fecha ) ?>
					</td>
				
					<td class="elementotabla col_descripcion" > 
						<?php echo( $inventario_fisico->descripcion ) ?>
					</td>
				
					<td class="elementotabla col_id_almacen" > 
						<?php echo( $inventario_fisico->id_almacen ) ?>
					</td>
				
					<td class="elementotabla col_prod_cont_almacen" > 
						<?php echo( $inventario_fisico->prod_cont_almacen ) ?>
					</td>
				
					<td class="elementotabla col_total_productos_almacen" > 
						<?php echo( $inventario_fisico->total_productos_almacen ) ?>
					</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($inventario_fisico->id) ?>
							<img class="imgrelacioninventario_fisico_detalle" idactualinventario_fisico="<?php echo($inventario_fisico->id) ?>" title="Inventario Fisico DetalleS DE Inventario Fisico" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/inventario_fisico_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($inventario_fisico->id) ?>
							<img class="imgrelacioninventario_fisico" idactualinventario_fisico="<?php echo($inventario_fisico->id) ?>" title="Inventario FisicoS DE Inventario Fisico" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/inventario_fisicos.gif" alt="Seleccionar" border="" height="15" width="15">
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



