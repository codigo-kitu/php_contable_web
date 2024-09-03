



		<form id="frmTablaDatoslog_actividad" name="frmTablaDatoslog_actividad">
			<div id="divTablaDatosAuxiliarlog_actividadsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($log_actividads)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulolog_actividad" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Log Actividadeses</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoslog_actividads" name="tblTablaDatoslog_actividads" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Log Id.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Hora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Computador.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Log Id.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Hora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Computador.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($log_actividadsLocal!=null && count($log_actividadsLocal)>0) { ?>
			<?php foreach ($log_actividadsLocal as $log_actividad) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($log_actividad->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$log_actividad->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($log_actividad->id) ?>
							</td>
							<td>
								<img class="imgseleccionarlog_actividad" idactuallog_actividad="<?php echo($log_actividad->id) ?>" title="SELECCIONAR Log Actividades ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($log_actividad->id) ?>
							</td>
							<td>
								<img class="imgeliminartablalog_actividad" idactuallog_actividad="<?php echo($log_actividad->id) ?>" title="ELIMINAR Log Actividades ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($log_actividad->i) ?>" name="t-id_<?php echo($log_actividad->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Log Actividades ACTUAL" value="<?php echo($log_actividad->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($log_actividad->i) ?>_0" name="t-cel_<?php echo($log_actividad->i) ?>_0" type="text" maxlength="25" value="<?php echo($log_actividad->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $log_actividad->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $log_actividad->updated_at 
					</td>
				
						<td class="elementotabla col_log_id" >  '
							<input id="t-cel_<?php echo($log_actividad->i) ?>_3" name="t-cel_<?php echo($log_actividad->i) ?>_3" type="text" class="form-control"  placeholder="Log Id"  title="Log Id"    maxlength="10" size="10"  value="<?php echo($log_actividad->log_id) ?>" >
							<span id="spanstrMensajelog_id" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha" >  '
							<input id="t-cel_<?php echo($log_actividad->i) ?>_4" name="t-cel_<?php echo($log_actividad->i) ?>_4" type="text" class="form-control"  placeholder="Fecha"  title="Fecha"    size="10"  value="<?php echo($log_actividad->fecha) ?>" >
							<span id="spanstrMensajefecha" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_hora" >  '
							<input id="t-cel_<?php echo($log_actividad->i) ?>_5" name="t-cel_<?php echo($log_actividad->i) ?>_5" type="text" class="form-control"  placeholder="Hora"  title="Hora"    size="10"  value="<?php echo($log_actividad->hora) ?>" >
							<span id="spanstrMensajehora" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_computador" >  '
							<input id="t-cel_<?php echo($log_actividad->i) ?>_6" name="t-cel_<?php echo($log_actividad->i) ?>_6" type="text" class="form-control"  placeholder="Computador"  title="Computador"    size="20"  maxlength="50" value="<?php echo($log_actividad->computador) ?>" />
							<span id="spanstrMensajecomputador" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_computador" >  '
							<input id="t-cel_<?php echo($log_actividad->i) ?>_6" name="t-cel_<?php echo($log_actividad->i) ?>_6" type="text" class="form-control"  placeholder="Computador"  title="Computador"    size="20"  maxlength="50" value="<?php echo($log_actividad->computador) ?>" />
							<span id="spanstrMensajecomputador" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_usuario" >  '
							<input id="t-cel_<?php echo($log_actividad->i) ?>_7" name="t-cel_<?php echo($log_actividad->i) ?>_7" type="text" class="form-control"  placeholder="Usuario"  title="Usuario"    size="20"  maxlength="30" value="<?php echo($log_actividad->usuario) ?>" />
							<span id="spanstrMensajeusuario" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_usuario" >  '
							<input id="t-cel_<?php echo($log_actividad->i) ?>_7" name="t-cel_<?php echo($log_actividad->i) ?>_7" type="text" class="form-control"  placeholder="Usuario"  title="Usuario"    size="20"  maxlength="30" value="<?php echo($log_actividad->usuario) ?>" />
							<span id="spanstrMensajeusuario" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($log_actividad->i) ?>_8" name="t-cel_<?php echo($log_actividad->i) ?>_8" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($log_actividad->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($log_actividad->i) ?>_8" name="t-cel_<?php echo($log_actividad->i) ?>_8" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($log_actividad->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_modulo" >  '
							<input id="t-cel_<?php echo($log_actividad->i) ?>_9" name="t-cel_<?php echo($log_actividad->i) ?>_9" type="text" class="form-control"  placeholder="Modulo"  title="Modulo"    size="20"  maxlength="30" value="<?php echo($log_actividad->modulo) ?>" />
							<span id="spanstrMensajemodulo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_modulo" >  '
							<input id="t-cel_<?php echo($log_actividad->i) ?>_9" name="t-cel_<?php echo($log_actividad->i) ?>_9" type="text" class="form-control"  placeholder="Modulo"  title="Modulo"    size="20"  maxlength="30" value="<?php echo($log_actividad->modulo) ?>" />
							<span id="spanstrMensajemodulo" class="mensajeerror"></span>' 
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



