



		<form id="frmTablaDatosresumen_usuario" name="frmTablaDatosresumen_usuario">
			<div id="divTablaDatosAuxiliarresumen_usuariosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($resumen_usuarios)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloresumen_usuario" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Resumen Usuarios</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosresumen_usuarios" name="tblTablaDatosresumen_usuarios" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Ingresos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Error Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Intentos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cierres.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Reinicios.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Ingreso Actual.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Error Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Intento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Cierre.(*)</pre>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Ingresos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Error Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Intentos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cierres.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Reinicios.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Ingreso Actual.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Error Ingreso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Intento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Cierre.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($resumen_usuariosLocal!=null && count($resumen_usuariosLocal)>0) { ?>
			<?php foreach ($resumen_usuariosLocal as $resumen_usuario) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($resumen_usuario->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$resumen_usuario->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($resumen_usuario->id) ?>
							</td>
							<td>
								<img class="imgseleccionarresumen_usuario" idactualresumen_usuario="<?php echo($resumen_usuario->id) ?>" title="SELECCIONAR Resumen Usuario ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($resumen_usuario->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaresumen_usuario" idactualresumen_usuario="<?php echo($resumen_usuario->id) ?>" title="ELIMINAR Resumen Usuario ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($resumen_usuario->i) ?>" name="t-id_<?php echo($resumen_usuario->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Resumen Usuario ACTUAL" value="<?php echo($resumen_usuario->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($resumen_usuario->i) ?>_0" name="t-cel_<?php echo($resumen_usuario->i) ?>_0" type="text" maxlength="25" value="<?php echo($resumen_usuario->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $resumen_usuario->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $resumen_usuario->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($resumen_usuario->id_usuario_Descripcion,$resumen_usuario->id_usuario,'t-cel_'.$resumen_usuario->i.'_3')) ?></td>
				<?php } ?>
				
						<td class="elementotabla col_numero_ingresos" >  '
							<input id="t-cel_<?php echo($resumen_usuario->i) ?>_4" name="t-cel_<?php echo($resumen_usuario->i) ?>_4" type="text" class="form-control"  placeholder="Numero Ingresos"  title="Numero Ingresos"    maxlength="19" size="10"  value="<?php echo($resumen_usuario->numero_ingresos) ?>" >
							<span id="spanstrMensajenumero_ingresos" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_error_ingreso" >  '
							<input id="t-cel_<?php echo($resumen_usuario->i) ?>_5" name="t-cel_<?php echo($resumen_usuario->i) ?>_5" type="text" class="form-control"  placeholder="Numero Error Ingreso"  title="Numero Error Ingreso"    maxlength="19" size="10"  value="<?php echo($resumen_usuario->numero_error_ingreso) ?>" >
							<span id="spanstrMensajenumero_error_ingreso" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_intentos" >  '
							<input id="t-cel_<?php echo($resumen_usuario->i) ?>_6" name="t-cel_<?php echo($resumen_usuario->i) ?>_6" type="text" class="form-control"  placeholder="Numero Intentos"  title="Numero Intentos"    maxlength="19" size="10"  value="<?php echo($resumen_usuario->numero_intentos) ?>" >
							<span id="spanstrMensajenumero_intentos" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_cierres" >  '
							<input id="t-cel_<?php echo($resumen_usuario->i) ?>_7" name="t-cel_<?php echo($resumen_usuario->i) ?>_7" type="text" class="form-control"  placeholder="Numero Cierres"  title="Numero Cierres"    maxlength="19" size="10"  value="<?php echo($resumen_usuario->numero_cierres) ?>" >
							<span id="spanstrMensajenumero_cierres" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_reinicios" >  '
							<input id="t-cel_<?php echo($resumen_usuario->i) ?>_8" name="t-cel_<?php echo($resumen_usuario->i) ?>_8" type="text" class="form-control"  placeholder="Numero Reinicios"  title="Numero Reinicios"    maxlength="19" size="10"  value="<?php echo($resumen_usuario->numero_reinicios) ?>" >
							<span id="spanstrMensajenumero_reinicios" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_ingreso_actual" >  '
							<input id="t-cel_<?php echo($resumen_usuario->i) ?>_9" name="t-cel_<?php echo($resumen_usuario->i) ?>_9" type="text" class="form-control"  placeholder="Numero Ingreso Actual"  title="Numero Ingreso Actual"    maxlength="19" size="10"  value="<?php echo($resumen_usuario->numero_ingreso_actual) ?>" >
							<span id="spanstrMensajenumero_ingreso_actual" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_ultimo_ingreso" >  '
							<input id="t-cel_<?php echo($resumen_usuario->i) ?>_10" name="t-cel_<?php echo($resumen_usuario->i) ?>_10" type="text" class="form-control"  placeholder="Fecha Ultimo Ingreso"  title="Fecha Ultimo Ingreso"    size="10"  value="<?php echo($resumen_usuario->fecha_ultimo_ingreso) ?>" >
							<span id="spanstrMensajefecha_ultimo_ingreso" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_ultimo_error_ingreso" >  '
							<input id="t-cel_<?php echo($resumen_usuario->i) ?>_11" name="t-cel_<?php echo($resumen_usuario->i) ?>_11" type="text" class="form-control"  placeholder="Fecha Ultimo Error Ingreso"  title="Fecha Ultimo Error Ingreso"    size="10"  value="<?php echo($resumen_usuario->fecha_ultimo_error_ingreso) ?>" >
							<span id="spanstrMensajefecha_ultimo_error_ingreso" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_ultimo_intento" >  '
							<input id="t-cel_<?php echo($resumen_usuario->i) ?>_12" name="t-cel_<?php echo($resumen_usuario->i) ?>_12" type="text" class="form-control"  placeholder="Fecha Ultimo Intento"  title="Fecha Ultimo Intento"    size="10"  value="<?php echo($resumen_usuario->fecha_ultimo_intento) ?>" >
							<span id="spanstrMensajefecha_ultimo_intento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_ultimo_cierre" >  '
							<input id="t-cel_<?php echo($resumen_usuario->i) ?>_13" name="t-cel_<?php echo($resumen_usuario->i) ?>_13" type="text" class="form-control"  placeholder="Fecha Ultimo Cierre"  title="Fecha Ultimo Cierre"    size="10"  value="<?php echo($resumen_usuario->fecha_ultimo_cierre) ?>" >
							<span id="spanstrMensajefecha_ultimo_cierre" class="mensajeerror"></span>' 
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



