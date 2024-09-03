



		<form id="frmTablaDatosreporte_monica" name="frmTablaDatosreporte_monica">
			<div id="divTablaDatosAuxiliarreporte_monicasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($reporte_monicas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloreporte_monica" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Reportes Monicas</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosreporte_monicas" name="tblTablaDatosreporte_monicas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Modulo.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Modulo.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($reporte_monicasLocal!=null && count($reporte_monicasLocal)>0) { ?>
			<?php foreach ($reporte_monicasLocal as $reporte_monica) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($reporte_monica->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$reporte_monica->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($reporte_monica->id) ?>
							</td>
							<td>
								<img class="imgseleccionarreporte_monica" idactualreporte_monica="<?php echo($reporte_monica->id) ?>" title="SELECCIONAR Reportes Monica ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($reporte_monica->id) ?>
							</td>
							<td>
								<img class="imgeliminartablareporte_monica" idactualreporte_monica="<?php echo($reporte_monica->id) ?>" title="ELIMINAR Reportes Monica ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($reporte_monica->i) ?>" name="t-id_<?php echo($reporte_monica->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Reportes Monica ACTUAL" value="<?php echo($reporte_monica->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($reporte_monica->i) ?>_0" name="t-cel_<?php echo($reporte_monica->i) ?>_0" type="text" maxlength="25" value="<?php echo($reporte_monica->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $reporte_monica->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $reporte_monica->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($reporte_monica->i) ?>_3" name="t-cel_<?php echo($reporte_monica->i) ?>_3" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="40" value="<?php echo($reporte_monica->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($reporte_monica->i) ?>_3" name="t-cel_<?php echo($reporte_monica->i) ?>_3" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="40" value="<?php echo($reporte_monica->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($reporte_monica->i) ?>_4" name="t-cel_<?php echo($reporte_monica->i) ?>_4" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($reporte_monica->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($reporte_monica->i) ?>_4" name="t-cel_<?php echo($reporte_monica->i) ?>_4" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($reporte_monica->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_estado" >  '
							<input id="t-cel_<?php echo($reporte_monica->i) ?>_5" name="t-cel_<?php echo($reporte_monica->i) ?>_5" type="text" class="form-control"  placeholder="Estado"  title="Estado"    maxlength="10" size="10"  value="<?php echo($reporte_monica->estado) ?>" >
							<span id="spanstrMensajeestado" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_modulo" >  '
							<input id="t-cel_<?php echo($reporte_monica->i) ?>_6" name="t-cel_<?php echo($reporte_monica->i) ?>_6" type="text" class="form-control"  placeholder="Modulo"  title="Modulo"    size="20"  maxlength="20" value="<?php echo($reporte_monica->modulo) ?>" />
							<span id="spanstrMensajemodulo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_modulo" >  '
							<input id="t-cel_<?php echo($reporte_monica->i) ?>_6" name="t-cel_<?php echo($reporte_monica->i) ?>_6" type="text" class="form-control"  placeholder="Modulo"  title="Modulo"    size="20"  maxlength="20" value="<?php echo($reporte_monica->modulo) ?>" />
							<span id="spanstrMensajemodulo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_sub_modulo" >  '
							<input id="t-cel_<?php echo($reporte_monica->i) ?>_7" name="t-cel_<?php echo($reporte_monica->i) ?>_7" type="text" class="form-control"  placeholder="Sub Modulo"  title="Sub Modulo"    size="20"  maxlength="40" value="<?php echo($reporte_monica->sub_modulo) ?>" />
							<span id="spanstrMensajesub_modulo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_sub_modulo" >  '
							<input id="t-cel_<?php echo($reporte_monica->i) ?>_7" name="t-cel_<?php echo($reporte_monica->i) ?>_7" type="text" class="form-control"  placeholder="Sub Modulo"  title="Sub Modulo"    size="20"  maxlength="40" value="<?php echo($reporte_monica->sub_modulo) ?>" />
							<span id="spanstrMensajesub_modulo" class="mensajeerror"></span>' 
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



