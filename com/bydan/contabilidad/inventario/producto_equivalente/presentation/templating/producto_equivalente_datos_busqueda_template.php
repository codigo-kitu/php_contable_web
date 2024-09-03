



		<form id="frmTablaDatosproducto_equivalente" name="frmTablaDatosproducto_equivalente">
			<div id="divTablaDatosAuxiliarproducto_equivalentesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($producto_equivalentes)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloproducto_equivalente" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Producto Equivalentess</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosproducto_equivalentes" name="tblTablaDatosproducto_equivalentes" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Producto Principal<a onclick="jQuery('#form-id_producto_principal_img').trigger('click' );"><img id="form$strSufijo-id_producto_principal_img2" name="form$strSufijo-id_producto_principal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_equivalente_webcontrol1.abrirBusquedaParaproducto('id_producto_principal');"><img id="form$strSufijo-id_producto_principal_img_busqueda2" name="form$strSufijo-id_producto_principal_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Producto Equivalente<a onclick="jQuery('#form-id_producto_equivalente_img').trigger('click' );"><img id="form$strSufijo-id_producto_equivalente_img2" name="form$strSufijo-id_producto_equivalente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_equivalente_webcontrol1.abrirBusquedaParaproducto_equivalente('id_producto_equivalente');"><img id="form$strSufijo-id_producto_equivalente_img_busqueda2" name="form$strSufijo-id_producto_equivalente_img_busqueda2" title="Buscar Producto Equivalentes" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Id Principal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Id Equivalente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
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
				<pre class="cabecera_texto_titulo_tabla"> Producto Principal<a onclick="jQuery('#form-id_producto_principal_img').trigger('click' );"><img id="form$strSufijo-id_producto_principal_img2" name="form$strSufijo-id_producto_principal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_equivalente_webcontrol1.abrirBusquedaParaproducto('id_producto_principal');"><img id="form$strSufijo-id_producto_principal_img_busqueda2" name="form$strSufijo-id_producto_principal_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Producto Equivalente<a onclick="jQuery('#form-id_producto_equivalente_img').trigger('click' );"><img id="form$strSufijo-id_producto_equivalente_img2" name="form$strSufijo-id_producto_equivalente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="producto_equivalente_webcontrol1.abrirBusquedaParaproducto_equivalente('id_producto_equivalente');"><img id="form$strSufijo-id_producto_equivalente_img_busqueda2" name="form$strSufijo-id_producto_equivalente_img_busqueda2" title="Buscar Producto Equivalentes" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Id Principal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Id Equivalente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($producto_equivalentesLocal!=null && count($producto_equivalentesLocal)>0) { ?>
			<?php foreach ($producto_equivalentesLocal as $producto_equivalente) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($producto_equivalente->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$producto_equivalente->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($producto_equivalente->id) ?>
							</td>
							<td>
								<img class="imgseleccionarproducto_equivalente" idactualproducto_equivalente="<?php echo($producto_equivalente->id) ?>"  funcionjsactualproducto_equivalente="'.str_replace('TO_REPLACE',$producto_equivalente->id.',\''.producto_equivalente_util::getproducto_equivalenteDescripcion($producto_equivalente).'\'',$this->strFuncionJs).'" title="SELECCIONAR Producto Equivalentes ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Producto Equivalentes ACTUAL" value="<?php echo($producto_equivalente->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($producto_equivalente->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $producto_equivalente->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $producto_equivalente->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_producto_principal" > <?php echo($producto_equivalente->id_producto_principal_Descripcion) ?></td>
				<td class="elementotabla col_id_producto_equivalente" > <?php echo($producto_equivalente->id_producto_equivalente_Descripcion) ?></td>
				
					<td class="elementotabla col_producto_id_principal" > 
						<?php echo( $producto_equivalente->producto_id_principal ) ?>
					</td>
				
					<td class="elementotabla col_producto_id_equivalente" > 
						<?php echo( $producto_equivalente->producto_id_equivalente ) ?>
					</td>
				
					<td class="elementotabla col_comentario" > 
						<?php echo( $producto_equivalente->comentario ) ?>
					</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto_equivalente->id) ?>
							<img class="imgrelacionproducto_equivalente" idactualproducto_equivalente="<?php echo($producto_equivalente->id) ?>" title="Producto EquivalentesS DE Producto Equivalentes" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/producto_equivalentes.gif" alt="Seleccionar" border="" height="15" width="15">
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



