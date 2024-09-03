



		<form id="frmTablaDatosauditoria" name="frmTablaDatosauditoria">
			<div id="divTablaDatosAuxiliarauditoriasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($auditorias)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloauditoria" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Auditorias</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosauditorias" name="tblTablaDatosauditorias" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:<?php echo($strPermisoRelaciones) ?>">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Nombre De La Tabla.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fila.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Accion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proceso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre De Pc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ip Del Pc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario Del Pc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Y Hora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">ID__.(*)</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:<?php echo($strPermisoEliminar) ?>">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:<?php echo($strPermisoRelaciones) ?>">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Nombre De La Tabla.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fila.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Accion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proceso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre De Pc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ip Del Pc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario Del Pc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Y Hora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($auditoriasLocal!=null && count($auditoriasLocal)>0) { ?>
			<?php foreach ($auditoriasLocal as $auditoria) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($auditoria->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$auditoria->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($auditoria->id) ?>
							</td>
							<td>
								<img class="imgseleccionarauditoria" idactualauditoria="<?php echo($auditoria->id) ?>" title="SELECCIONAR Auditoria ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($auditoria->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaauditoria" idactualauditoria="<?php echo($auditoria->id) ?>" title="ELIMINAR Auditoria ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($auditoria->i) ?>" name="t-id_<?php echo($auditoria->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Auditoria ACTUAL" value="<?php echo($auditoria->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($auditoria->i) ?>_0" name="t-cel_<?php echo($auditoria->i) ?>_0" type="text" maxlength="25" value="<?php echo($auditoria->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($auditoria->id) ?><img class="imgseleccionarmostraraccionesrelacionesauditoria" idactualauditoria="<?php echo($auditoria->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $auditoria->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $auditoria->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($auditoria->id_usuario_Descripcion,$auditoria->id_usuario,'t-cel_'.$auditoria->i.'_3')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_tabla" >  '<textarea id="t-cel_<?php echo($auditoria->i) ?>_4" name="t-cel_<?php echo($auditoria->i) ?>_4" class="form-control"  placeholder="Nombre De La Tabla"  title="Nombre De La Tabla"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($auditoria->nombre_tabla) ?></textarea>
							<span id="spanstrMensajenombre_tabla" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_tabla" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($auditoria->i) ?>_4" name="t-cel_<?php echo($auditoria->i) ?>_4" class="form-control"  placeholder="Nombre De La Tabla"  title="Nombre De La Tabla"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($auditoria->nombre_tabla) ?></input>
							<span id="spanstrMensajenombre_tabla" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_id_fila" >  '
							<input id="t-cel_<?php echo($auditoria->i) ?>_5" name="t-cel_<?php echo($auditoria->i) ?>_5" type="text" class="form-control"  placeholder="Fila"  title="Fila"    maxlength="19" size="10"  value="<?php echo($auditoria->id_fila) ?>" >
							<span id="spanstrMensajeid_fila" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_accion" >  '
							<input id="t-cel_<?php echo($auditoria->i) ?>_6" name="t-cel_<?php echo($auditoria->i) ?>_6" type="text" class="form-control"  placeholder="Accion"  title="Accion"    size="15"  maxlength="15" value="<?php echo($auditoria->accion) ?>" />
							<span id="spanstrMensajeaccion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_accion" >  '
							<input id="t-cel_<?php echo($auditoria->i) ?>_6" name="t-cel_<?php echo($auditoria->i) ?>_6" type="text" class="form-control"  placeholder="Accion"  title="Accion"    size="15"  maxlength="15" value="<?php echo($auditoria->accion) ?>" />
							<span id="spanstrMensajeaccion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_proceso" >  '<textarea id="t-cel_<?php echo($auditoria->i) ?>_7" name="t-cel_<?php echo($auditoria->i) ?>_7" class="form-control"  placeholder="Proceso"  title="Proceso"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($auditoria->proceso) ?></textarea>
							<span id="spanstrMensajeproceso" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_proceso" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($auditoria->i) ?>_7" name="t-cel_<?php echo($auditoria->i) ?>_7" class="form-control"  placeholder="Proceso"  title="Proceso"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($auditoria->proceso) ?></input>
							<span id="spanstrMensajeproceso" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_pc" >  '
							<input id="t-cel_<?php echo($auditoria->i) ?>_8" name="t-cel_<?php echo($auditoria->i) ?>_8" type="text" class="form-control"  placeholder="Nombre De Pc"  title="Nombre De Pc"    size="20"  maxlength="50" value="<?php echo($auditoria->nombre_pc) ?>" />
							<span id="spanstrMensajenombre_pc" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_pc" >  '
							<input id="t-cel_<?php echo($auditoria->i) ?>_8" name="t-cel_<?php echo($auditoria->i) ?>_8" type="text" class="form-control"  placeholder="Nombre De Pc"  title="Nombre De Pc"    size="20"  maxlength="50" value="<?php echo($auditoria->nombre_pc) ?>" />
							<span id="spanstrMensajenombre_pc" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_ip_pc" >  '
							<input id="t-cel_<?php echo($auditoria->i) ?>_9" name="t-cel_<?php echo($auditoria->i) ?>_9" type="text" class="form-control"  placeholder="Ip Del Pc"  title="Ip Del Pc"    size="20"  maxlength="20" value="<?php echo($auditoria->ip_pc) ?>" />
							<span id="spanstrMensajeip_pc" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_ip_pc" >  '
							<input id="t-cel_<?php echo($auditoria->i) ?>_9" name="t-cel_<?php echo($auditoria->i) ?>_9" type="text" class="form-control"  placeholder="Ip Del Pc"  title="Ip Del Pc"    size="20"  maxlength="20" value="<?php echo($auditoria->ip_pc) ?>" />
							<span id="spanstrMensajeip_pc" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_usuario_pc" >  '
							<input id="t-cel_<?php echo($auditoria->i) ?>_10" name="t-cel_<?php echo($auditoria->i) ?>_10" type="text" class="form-control"  placeholder="Usuario Del Pc"  title="Usuario Del Pc"    size="20"  maxlength="50" value="<?php echo($auditoria->usuario_pc) ?>" />
							<span id="spanstrMensajeusuario_pc" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_usuario_pc" >  '
							<input id="t-cel_<?php echo($auditoria->i) ?>_10" name="t-cel_<?php echo($auditoria->i) ?>_10" type="text" class="form-control"  placeholder="Usuario Del Pc"  title="Usuario Del Pc"    size="20"  maxlength="50" value="<?php echo($auditoria->usuario_pc) ?>" />
							<span id="spanstrMensajeusuario_pc" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_hora" >  '
							<input id="t-cel_<?php echo($auditoria->i) ?>_11" name="t-cel_<?php echo($auditoria->i) ?>_11" type="text" class="form-control"  placeholder="Fecha Y Hora"  title="Fecha Y Hora"    size="10"  value="<?php echo($auditoria->fecha_hora) ?>" >
							<span id="spanstrMensajefecha_hora" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_observacion" >  '<textarea id="t-cel_<?php echo($auditoria->i) ?>_12" name="t-cel_<?php echo($auditoria->i) ?>_12" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($auditoria->observacion) ?></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_observacion" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($auditoria->i) ?>_12" name="t-cel_<?php echo($auditoria->i) ?>_12" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($auditoria->observacion) ?></input>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($auditoria->id) ?>
							<img class="imgrelacionauditoria_detalle" idactualauditoria="<?php echo($auditoria->id) ?>" title="Auditoria DetalleS DE Auditoria" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/auditoria_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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



