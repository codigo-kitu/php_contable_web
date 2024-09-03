



		<form id="frmTablaDatosclasificacion_cheque" name="frmTablaDatosclasificacion_cheque">
			<div id="divTablaDatosAuxiliarclasificacion_chequesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($clasificacion_cheques)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloclasificacion_cheque" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Clasificacion Cheques</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosclasificacion_cheques" name="tblTablaDatosclasificacion_cheques" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente Detalle<a onclick="jQuery('#form-id_cuenta_corriente_detalle_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_corriente_detalle_img2" name="form$strSufijo-id_cuenta_corriente_detalle_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="clasificacion_cheque_webcontrol1.abrirBusquedaParacuenta_corriente_detalle('id_cuenta_corriente_detalle');"><img id="form$strSufijo-id_cuenta_corriente_detalle_img_busqueda2" name="form$strSufijo-id_cuenta_corriente_detalle_img_busqueda2" title="Buscar Cuenta Corriente Detalle" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Cheque<a onclick="jQuery('#form-id_categoria_cheque_img').trigger('click' );"><img id="form$strSufijo-id_categoria_cheque_img2" name="form$strSufijo-id_categoria_cheque_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="clasificacion_cheque_webcontrol1.abrirBusquedaParacategoria_cheque('id_categoria_cheque');"><img id="form$strSufijo-id_categoria_cheque_img_busqueda2" name="form$strSufijo-id_categoria_cheque_img_busqueda2" title="Buscar Categoria Cheque" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente Detalle<a onclick="jQuery('#form-id_cuenta_corriente_detalle_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_corriente_detalle_img2" name="form$strSufijo-id_cuenta_corriente_detalle_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="clasificacion_cheque_webcontrol1.abrirBusquedaParacuenta_corriente_detalle('id_cuenta_corriente_detalle');"><img id="form$strSufijo-id_cuenta_corriente_detalle_img_busqueda2" name="form$strSufijo-id_cuenta_corriente_detalle_img_busqueda2" title="Buscar Cuenta Corriente Detalle" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Cheque<a onclick="jQuery('#form-id_categoria_cheque_img').trigger('click' );"><img id="form$strSufijo-id_categoria_cheque_img2" name="form$strSufijo-id_categoria_cheque_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="clasificacion_cheque_webcontrol1.abrirBusquedaParacategoria_cheque('id_categoria_cheque');"><img id="form$strSufijo-id_categoria_cheque_img_busqueda2" name="form$strSufijo-id_categoria_cheque_img_busqueda2" title="Buscar Categoria Cheque" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($clasificacion_chequesLocal!=null && count($clasificacion_chequesLocal)>0) { ?>
			<?php foreach ($clasificacion_chequesLocal as $clasificacion_cheque) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($clasificacion_cheque->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$clasificacion_cheque->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($clasificacion_cheque->id) ?>
							</td>
							<td>
								<img class="imgseleccionarclasificacion_cheque" idactualclasificacion_cheque="<?php echo($clasificacion_cheque->id) ?>"  funcionjsactualclasificacion_cheque="'.str_replace('TO_REPLACE',$clasificacion_cheque->id.',\''.clasificacion_cheque_util::getclasificacion_chequeDescripcion($clasificacion_cheque).'\'',$this->strFuncionJs).'" title="SELECCIONAR Clasificacion Cheque ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Clasificacion Cheque ACTUAL" value="<?php echo($clasificacion_cheque->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($clasificacion_cheque->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $clasificacion_cheque->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $clasificacion_cheque->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_cuenta_corriente_detalle" > <?php echo($clasificacion_cheque->id_cuenta_corriente_detalle_Descripcion) ?></td>
				<td class="elementotabla col_id_categoria_cheque" > <?php echo($clasificacion_cheque->id_categoria_cheque_Descripcion) ?></td>
				
					<td class="elementotabla col_monto" > 
						<?php echo( $clasificacion_cheque->monto ) ?>
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



