



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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Perfil.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo.(*)</pre>
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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Perfil.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo.(*)</pre>
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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
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
								<img class="imgseleccionarperfil_campo" idactualperfil_campo="<?php echo($perfil_campo->id) ?>" title="SELECCIONAR Perfil Campo ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($perfil_campo->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaperfil_campo" idactualperfil_campo="<?php echo($perfil_campo->id) ?>" title="ELIMINAR Perfil Campo ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($perfil_campo->i) ?>" name="t-id_<?php echo($perfil_campo->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Perfil Campo ACTUAL" value="<?php echo($perfil_campo->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($perfil_campo->i) ?>_0" name="t-cel_<?php echo($perfil_campo->i) ?>_0" type="text" maxlength="25" value="<?php echo($perfil_campo->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $perfil_campo->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $perfil_campo->updated_at 
					</td>
				<td class="elementotabla col_id_perfil" ><?php echo($funciones->getComboBoxEditar($perfil_campo->id_perfil_Descripcion,$perfil_campo->id_perfil,'t-cel_'.$perfil_campo->i.'_3')) ?></td>
				<td class="elementotabla col_id_campo" ><?php echo($funciones->getComboBoxEditar($perfil_campo->id_campo_Descripcion,$perfil_campo->id_campo,'t-cel_'.$perfil_campo->i.'_4')) ?></td>
				
						<td class="elementotabla col_todo" ><?php  $funciones->getCheckBoxEditar($perfil_campo->todo,'t-cel_<?php echo($perfil_campo->i) ?>_5',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_ingreso" ><?php  $funciones->getCheckBoxEditar($perfil_campo->ingreso,'t-cel_<?php echo($perfil_campo->i) ?>_6',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_modificacion" ><?php  $funciones->getCheckBoxEditar($perfil_campo->modificacion,'t-cel_<?php echo($perfil_campo->i) ?>_7',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_eliminacion" ><?php  $funciones->getCheckBoxEditar($perfil_campo->eliminacion,'t-cel_<?php echo($perfil_campo->i) ?>_8',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_consulta" ><?php  $funciones->getCheckBoxEditar($perfil_campo->consulta,'t-cel_<?php echo($perfil_campo->i) ?>_9',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_estado" ><?php  $funciones->getCheckBoxEditar($perfil_campo->estado,'t-cel_<?php echo($perfil_campo->i) ?>_10',$paraReporte)  ?>
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



