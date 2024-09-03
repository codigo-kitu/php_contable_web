



		<form id="frmTablaDatosauditoria_detalle" name="frmTablaDatosauditoria_detalle">
			<div id="divTablaDatosAuxiliarauditoria_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($auditoria_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloauditoria_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Auditoria Detalles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosauditoria_detalles" name="tblTablaDatosauditoria_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Auditoria.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Del Campo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Anterior.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Actual.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Auditoria.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Del Campo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Anterior.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Actual.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($auditoria_detallesLocal!=null && count($auditoria_detallesLocal)>0) { ?>
			<?php foreach ($auditoria_detallesLocal as $auditoria_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($auditoria_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$auditoria_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($auditoria_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionarauditoria_detalle" idactualauditoria_detalle="<?php echo($auditoria_detalle->id) ?>" title="SELECCIONAR Auditoria Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($auditoria_detalle->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaauditoria_detalle" idactualauditoria_detalle="<?php echo($auditoria_detalle->id) ?>" title="ELIMINAR Auditoria Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($auditoria_detalle->i) ?>" name="t-id_<?php echo($auditoria_detalle->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Auditoria Detalle ACTUAL" value="<?php echo($auditoria_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($auditoria_detalle->i) ?>_0" name="t-cel_<?php echo($auditoria_detalle->i) ?>_0" type="text" maxlength="25" value="<?php echo($auditoria_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $auditoria_detalle->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $auditoria_detalle->updated_at 
					</td>
				<td class="elementotabla col_id_auditoria" ><?php echo($funciones->getComboBoxEditar($auditoria_detalle->id_auditoria_Descripcion,$auditoria_detalle->id_auditoria,'t-cel_'.$auditoria_detalle->i.'_3')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_campo" >  '<textarea id="t-cel_<?php echo($auditoria_detalle->i) ?>_4" name="t-cel_<?php echo($auditoria_detalle->i) ?>_4" class="form-control"  placeholder="Nombre Del Campo"  title="Nombre Del Campo"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($auditoria_detalle->nombre_campo) ?></textarea>
							<span id="spanstrMensajenombre_campo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_campo" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($auditoria_detalle->i) ?>_4" name="t-cel_<?php echo($auditoria_detalle->i) ?>_4" class="form-control"  placeholder="Nombre Del Campo"  title="Nombre Del Campo"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($auditoria_detalle->nombre_campo) ?></input>
							<span id="spanstrMensajenombre_campo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_valor_anterior" >  '<textarea id="t-cel_<?php echo($auditoria_detalle->i) ?>_5" name="t-cel_<?php echo($auditoria_detalle->i) ?>_5" class="form-control"  placeholder="Valor Anterior"  title="Valor Anterior"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($auditoria_detalle->valor_anterior) ?></textarea>
							<span id="spanstrMensajevalor_anterior" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_valor_anterior" >  '<input type="text" maxlength="250"  id="t-cel_<?php echo($auditoria_detalle->i) ?>_5" name="t-cel_<?php echo($auditoria_detalle->i) ?>_5" class="form-control"  placeholder="Valor Anterior"  title="Valor Anterior"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($auditoria_detalle->valor_anterior) ?></input>
							<span id="spanstrMensajevalor_anterior" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_valor_actual" >  '<textarea id="t-cel_<?php echo($auditoria_detalle->i) ?>_6" name="t-cel_<?php echo($auditoria_detalle->i) ?>_6" class="form-control"  placeholder="Valor Actual"  title="Valor Actual"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($auditoria_detalle->valor_actual) ?></textarea>
							<span id="spanstrMensajevalor_actual" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_valor_actual" >  '<input type="text" maxlength="250"  id="t-cel_<?php echo($auditoria_detalle->i) ?>_6" name="t-cel_<?php echo($auditoria_detalle->i) ?>_6" class="form-control"  placeholder="Valor Actual"  title="Valor Actual"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($auditoria_detalle->valor_actual) ?></input>
							<span id="spanstrMensajevalor_actual" class="mensajeerror"></span>' 
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



