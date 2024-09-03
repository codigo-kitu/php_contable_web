



		<form id="frmTablaDatosperfil_campo" name="frmTablaDatosperfil_campo">
			<div id="divTablaDatosAuxiliarperfil_camposAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($perfil_campos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloperfil_campo" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Perfil Campos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosperfil_campos" name="tblTablaDatosperfil_campos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Perfil<a onclick="jQuery('#form-id_perfil_img').trigger('click' );"><img id="form$strSufijo-id_perfil_img2" name="form$strSufijo-id_perfil_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="perfil_campo_webcontrol1.abrirBusquedaParaperfil('id_perfil');"><img id="form$strSufijo-id_perfil_img_busqueda2" name="form$strSufijo-id_perfil_img_busqueda2" title="Buscar Perfil" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo<a onclick="jQuery('#form-id_campo_img').trigger('click' );"><img id="form$strSufijo-id_campo_img2" name="form$strSufijo-id_campo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="perfil_campo_webcontrol1.abrirBusquedaParacampo('id_campo');"><img id="form$strSufijo-id_campo_img_busqueda2" name="form$strSufijo-id_campo_img_busqueda2" title="Buscar Campo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Todo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ingreso</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modificacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Eliminacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Consulta</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Perfil<a onclick="jQuery('#form-id_perfil_img').trigger('click' );"><img id="form$strSufijo-id_perfil_img2" name="form$strSufijo-id_perfil_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="perfil_campo_webcontrol1.abrirBusquedaParaperfil('id_perfil');"><img id="form$strSufijo-id_perfil_img_busqueda2" name="form$strSufijo-id_perfil_img_busqueda2" title="Buscar Perfil" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo<a onclick="jQuery('#form-id_campo_img').trigger('click' );"><img id="form$strSufijo-id_campo_img2" name="form$strSufijo-id_campo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="perfil_campo_webcontrol1.abrirBusquedaParacampo('id_campo');"><img id="form$strSufijo-id_campo_img_busqueda2" name="form$strSufijo-id_campo_img_busqueda2" title="Buscar Campo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Todo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ingreso</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modificacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Eliminacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Consulta</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($perfil_camposLocal!=null && count($perfil_camposLocal)>0) { ?>
			<?php foreach ($perfil_camposLocal as $perfil_campo) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($perfil_campo->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$perfil_campo->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($perfil_campo->id) ?>
							</td>
							<td>
								<img class="imgseleccionarperfil_campo" idactualperfil_campo="<?php echo($perfil_campo->id) ?>"  funcionjsactualperfil_campo="'.str_replace('TO_REPLACE',$perfil_campo->id.',\''.perfil_campo_util::getperfil_campoDescripcion($perfil_campo).'\'',$this->strFuncionJs).'" title="SELECCIONAR Perfil Campo ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Perfil Campo ACTUAL" value="<?php echo($perfil_campo->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($perfil_campo->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $perfil_campo->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $perfil_campo->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_perfil" > <?php echo($perfil_campo->id_perfil_Descripcion) ?></td>
				<td class="elementotabla col_id_campo" > <?php echo($perfil_campo->id_campo_Descripcion) ?></td>
				
					<td class="elementotabla col_todo" ><?php  $funciones->getCheckBox($perfil_campo->todo,'form<?php echo($strSufijo) ?>-todoi',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_ingreso" ><?php  $funciones->getCheckBox($perfil_campo->ingreso,'form<?php echo($strSufijo) ?>-ingresoi',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_modificacion" ><?php  $funciones->getCheckBox($perfil_campo->modificacion,'form<?php echo($strSufijo) ?>-modificacioni',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_eliminacion" ><?php  $funciones->getCheckBox($perfil_campo->eliminacion,'form<?php echo($strSufijo) ?>-eliminacioni',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_consulta" ><?php  $funciones->getCheckBox($perfil_campo->consulta,'form<?php echo($strSufijo) ?>-consultai',$paraReporte)  ?>
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



