



		<form id="frmTablaDatosperfil_opcion" name="frmTablaDatosperfil_opcion">
			<div id="divTablaDatosAuxiliarperfil_opcionsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($perfil_opcions)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloperfil_opcion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Perfil Opciones</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosperfil_opcions" name="tblTablaDatosperfil_opcions" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Opcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Todo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ingreso</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modificación</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Eliminación</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Consulta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Busqueda</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Reporte</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Opcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Todo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ingreso</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modificación</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Eliminación</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Consulta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Busqueda</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Reporte</pre>
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

		<?php if($perfil_opcionsLocal!=null && count($perfil_opcionsLocal)>0) { ?>
			<?php foreach ($perfil_opcionsLocal as $perfil_opcion) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($perfil_opcion->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$perfil_opcion->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($perfil_opcion->id) ?>
							</td>
							<td>
								<img class="imgseleccionarperfil_opcion" idactualperfil_opcion="<?php echo($perfil_opcion->id) ?>" title="SELECCIONAR Perfil Opcion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($perfil_opcion->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaperfil_opcion" idactualperfil_opcion="<?php echo($perfil_opcion->id) ?>" title="ELIMINAR Perfil Opcion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($perfil_opcion->i) ?>" name="t-id_<?php echo($perfil_opcion->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Perfil Opcion ACTUAL" value="<?php echo($perfil_opcion->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($perfil_opcion->i) ?>_0" name="t-cel_<?php echo($perfil_opcion->i) ?>_0" type="text" maxlength="25" value="<?php echo($perfil_opcion->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $perfil_opcion->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $perfil_opcion->updated_at 
					</td>
				<td class="elementotabla col_id_perfil" ><?php echo($funciones->getComboBoxEditar($perfil_opcion->id_perfil_Descripcion,$perfil_opcion->id_perfil,'t-cel_'.$perfil_opcion->i.'_3')) ?></td>
				<td class="elementotabla col_id_opcion" ><?php echo($funciones->getComboBoxEditar($perfil_opcion->id_opcion_Descripcion,$perfil_opcion->id_opcion,'t-cel_'.$perfil_opcion->i.'_4')) ?></td>
				
						<td class="elementotabla col_todo" ><?php  $funciones->getCheckBoxEditar($perfil_opcion->todo,'t-cel_<?php echo($perfil_opcion->i) ?>_5',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_ingreso" ><?php  $funciones->getCheckBoxEditar($perfil_opcion->ingreso,'t-cel_<?php echo($perfil_opcion->i) ?>_6',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_modificacion" ><?php  $funciones->getCheckBoxEditar($perfil_opcion->modificacion,'t-cel_<?php echo($perfil_opcion->i) ?>_7',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_eliminacion" ><?php  $funciones->getCheckBoxEditar($perfil_opcion->eliminacion,'t-cel_<?php echo($perfil_opcion->i) ?>_8',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_consulta" ><?php  $funciones->getCheckBoxEditar($perfil_opcion->consulta,'t-cel_<?php echo($perfil_opcion->i) ?>_9',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_busqueda" ><?php  $funciones->getCheckBoxEditar($perfil_opcion->busqueda,'t-cel_<?php echo($perfil_opcion->i) ?>_10',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_reporte" ><?php  $funciones->getCheckBoxEditar($perfil_opcion->reporte,'t-cel_<?php echo($perfil_opcion->i) ?>_11',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_estado" ><?php  $funciones->getCheckBoxEditar($perfil_opcion->estado,'t-cel_<?php echo($perfil_opcion->i) ?>_12',$paraReporte)  ?>
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



