



		<form id="frmTablaDatosotro_documento" name="frmTablaDatosotro_documento">
			<div id="divTablaDatosAuxiliarotro_documentosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($otro_documentos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulootro_documento" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Otros Documentoses</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosotro_documentos" name="tblTablaDatosotro_documentos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Archivo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Archivo Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Archivo Data.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo3.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Archivo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Archivo Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Archivo Data.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo3.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($otro_documentosLocal!=null && count($otro_documentosLocal)>0) { ?>
			<?php foreach ($otro_documentosLocal as $otro_documento) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($otro_documento->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$otro_documento->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($otro_documento->id) ?>
							</td>
							<td>
								<img class="imgseleccionarotro_documento" idactualotro_documento="<?php echo($otro_documento->id) ?>" title="SELECCIONAR Otros Documentos ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($otro_documento->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaotro_documento" idactualotro_documento="<?php echo($otro_documento->id) ?>" title="ELIMINAR Otros Documentos ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($otro_documento->i) ?>" name="t-id_<?php echo($otro_documento->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Otros Documentos ACTUAL" value="<?php echo($otro_documento->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($otro_documento->i) ?>_0" name="t-cel_<?php echo($otro_documento->i) ?>_0" type="text" maxlength="25" value="<?php echo($otro_documento->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $otro_documento->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $otro_documento->updated_at 
					</td>
				<td class="elementotabla col_id_archivo" ><?php echo($funciones->getComboBoxEditar($otro_documento->id_archivo_Descripcion,$otro_documento->id_archivo,'t-cel_'.$otro_documento->i.'_3')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '<textarea id="t-cel_<?php echo($otro_documento->i) ?>_4" name="t-cel_<?php echo($otro_documento->i) ?>_4" class="form-control"  placeholder="Archivo Nombre"  title="Archivo Nombre"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($otro_documento->nombre) ?></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($otro_documento->i) ?>_4" name="t-cel_<?php echo($otro_documento->i) ?>_4" class="form-control"  placeholder="Archivo Nombre"  title="Archivo Nombre"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($otro_documento->nombre) ?></input>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_data" >  '<textarea id="t-cel_<?php echo($otro_documento->i) ?>_5" name="t-cel_<?php echo($otro_documento->i) ?>_5" class="form-control"  placeholder="Archivo Data"  title="Archivo Data"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($otro_documento->data) ?></textarea>
							<span id="spanstrMensajedata" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_data" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($otro_documento->i) ?>_5" name="t-cel_<?php echo($otro_documento->i) ?>_5" class="form-control"  placeholder="Archivo Data"  title="Archivo Data"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($otro_documento->data) ?></input>
							<span id="spanstrMensajedata" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_campo1" >  '<textarea id="t-cel_<?php echo($otro_documento->i) ?>_6" name="t-cel_<?php echo($otro_documento->i) ?>_6" class="form-control"  placeholder="Campo1"  title="Campo1"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($otro_documento->campo1) ?></textarea>
							<span id="spanstrMensajecampo1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_campo1" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($otro_documento->i) ?>_6" name="t-cel_<?php echo($otro_documento->i) ?>_6" class="form-control"  placeholder="Campo1"  title="Campo1"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($otro_documento->campo1) ?></input>
							<span id="spanstrMensajecampo1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_campo2" >  '
							<input id="t-cel_<?php echo($otro_documento->i) ?>_7" name="t-cel_<?php echo($otro_documento->i) ?>_7" type="text" class="form-control"  placeholder="Campo2"  title="Campo2"    maxlength="18" size="12"  value="<?php echo($otro_documento->campo2) ?>" >
							<span id="spanstrMensajecampo2" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_campo3" >  '<textarea id="t-cel_<?php echo($otro_documento->i) ?>_8" name="t-cel_<?php echo($otro_documento->i) ?>_8" class="form-control"  placeholder="Campo3"  title="Campo3"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($otro_documento->campo3) ?></textarea>
							<span id="spanstrMensajecampo3" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_campo3" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($otro_documento->i) ?>_8" name="t-cel_<?php echo($otro_documento->i) ?>_8" class="form-control"  placeholder="Campo3"  title="Campo3"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($otro_documento->campo3) ?></input>
							<span id="spanstrMensajecampo3" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

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



