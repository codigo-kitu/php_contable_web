



		<form id="frmTablaDatosejercicio" name="frmTablaDatosejercicio">
			<div id="divTablaDatosAuxiliarejerciciosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($ejercicios)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloejercicio" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">ejercicios</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosejercicios" name="tblTablaDatosejercicios" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Fecha Inicio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Fin.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Fecha Inicio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Fin.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($ejerciciosLocal!=null && count($ejerciciosLocal)>0) { ?>
			<?php foreach ($ejerciciosLocal as $ejercicio) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($ejercicio->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$ejercicio->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($ejercicio->id) ?>
							</td>
							<td>
								<img class="imgseleccionarejercicio" idactualejercicio="<?php echo($ejercicio->id) ?>" title="SELECCIONAR ejercicio ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($ejercicio->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaejercicio" idactualejercicio="<?php echo($ejercicio->id) ?>" title="ELIMINAR ejercicio ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($ejercicio->i) ?>" name="t-id_<?php echo($ejercicio->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR ejercicio ACTUAL" value="<?php echo($ejercicio->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($ejercicio->i) ?>_0" name="t-cel_<?php echo($ejercicio->i) ?>_0" type="text" maxlength="25" value="<?php echo($ejercicio->id) ?>" style="width:50px" ></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $ejercicio->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $ejercicio->updated_at 
					</td>
				
						<td class="elementotabla col_fecha_inicio" >  '
							<input id="t-cel_<?php echo($ejercicio->i) ?>_3" name="t-cel_<?php echo($ejercicio->i) ?>_3" type="text" class="form-control"  placeholder="Fecha Inicio"  title="Fecha Inicio"    size="10"  value="<?php echo($ejercicio->fecha_inicio) ?>" >
							<span id="spanstrMensajefecha_inicio" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_fin" >  '
							<input id="t-cel_<?php echo($ejercicio->i) ?>_4" name="t-cel_<?php echo($ejercicio->i) ?>_4" type="text" class="form-control"  placeholder="Fecha Fin"  title="Fecha Fin"    size="10"  value="<?php echo($ejercicio->fecha_fin) ?>" >
							<span id="spanstrMensajefecha_fin" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($ejercicio->i) ?>_5" name="t-cel_<?php echo($ejercicio->i) ?>_5" class="form-control"  placeholder="descripcion"  title="descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($ejercicio->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($ejercicio->i) ?>_5" name="t-cel_<?php echo($ejercicio->i) ?>_5" class="form-control"  placeholder="descripcion"  title="descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($ejercicio->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_activo" ><?php  $funciones->getCheckBoxEditar($ejercicio->activo,'t-cel_<?php echo($ejercicio->i) ?>_6',$paraReporte)  ?>
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



