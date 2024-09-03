



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
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente Detalle.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Cheque.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente Detalle.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Cheque.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
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
								<img class="imgseleccionarclasificacion_cheque" idactualclasificacion_cheque="<?php echo($clasificacion_cheque->id) ?>" title="SELECCIONAR Clasificacion Cheque ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($clasificacion_cheque->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaclasificacion_cheque" idactualclasificacion_cheque="<?php echo($clasificacion_cheque->id) ?>" title="ELIMINAR Clasificacion Cheque ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($clasificacion_cheque->i) ?>" name="t-id_<?php echo($clasificacion_cheque->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Clasificacion Cheque ACTUAL" value="<?php echo($clasificacion_cheque->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($clasificacion_cheque->i) ?>_0" name="t-cel_<?php echo($clasificacion_cheque->i) ?>_0" type="text" maxlength="25" value="<?php echo($clasificacion_cheque->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $clasificacion_cheque->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $clasificacion_cheque->updated_at 
					</td>
				<td class="elementotabla col_id_cuenta_corriente_detalle" ><?php echo($funciones->getComboBoxEditar($clasificacion_cheque->id_cuenta_corriente_detalle_Descripcion,$clasificacion_cheque->id_cuenta_corriente_detalle,'t-cel_'.$clasificacion_cheque->i.'_3')) ?></td>
				<td class="elementotabla col_id_categoria_cheque" ><?php echo($funciones->getComboBoxEditar($clasificacion_cheque->id_categoria_cheque_Descripcion,$clasificacion_cheque->id_categoria_cheque,'t-cel_'.$clasificacion_cheque->i.'_4')) ?></td>
				
						<td class="elementotabla col_monto" >  '
							<input id="t-cel_<?php echo($clasificacion_cheque->i) ?>_5" name="t-cel_<?php echo($clasificacion_cheque->i) ?>_5" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12"  value="<?php echo($clasificacion_cheque->monto) ?>" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>' 
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



