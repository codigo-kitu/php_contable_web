



		<form id="frmTablaDatoslibro_auxiliar" name="frmTablaDatoslibro_auxiliar">
			<div id="divTablaDatosAuxiliarlibro_auxiliarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($libro_auxiliars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulolibro_auxiliar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Libro Auxiliares</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoslibro_auxiliars" name="tblTablaDatoslibro_auxiliars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iniciales.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Secuencial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Reinicia Secuencial Mes</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Asiento Automaticos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Asientos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Asiento Predefinidos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Contadores Auxiliareses</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iniciales.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Secuencial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Reinicia Secuencial Mes</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Asiento Automaticos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Asientos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Asiento Predefinidos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Contadores Auxiliareses</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($libro_auxiliarsLocal!=null && count($libro_auxiliarsLocal)>0) { ?>
			<?php foreach ($libro_auxiliarsLocal as $libro_auxiliar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($libro_auxiliar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$libro_auxiliar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($libro_auxiliar->id) ?>
							</td>
							<td>
								<img class="imgseleccionarlibro_auxiliar" idactuallibro_auxiliar="<?php echo($libro_auxiliar->id) ?>" title="SELECCIONAR Libro Auxiliar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($libro_auxiliar->id) ?>
							</td>
							<td>
								<img class="imgeliminartablalibro_auxiliar" idactuallibro_auxiliar="<?php echo($libro_auxiliar->id) ?>" title="ELIMINAR Libro Auxiliar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($libro_auxiliar->i) ?>" name="t-id_<?php echo($libro_auxiliar->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Libro Auxiliar ACTUAL" value="<?php echo($libro_auxiliar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($libro_auxiliar->i) ?>_0" name="t-cel_<?php echo($libro_auxiliar->i) ?>_0" type="text" maxlength="25" value="<?php echo($libro_auxiliar->id) ?>" style="width:50px" ></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($libro_auxiliar->id) ?><img class="imgseleccionarmostraraccionesrelacioneslibro_auxiliar" idactuallibro_auxiliar="<?php echo($libro_auxiliar->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $libro_auxiliar->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $libro_auxiliar->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($libro_auxiliar->id_empresa_Descripcion,$libro_auxiliar->id_empresa,'t-cel_'.$libro_auxiliar->i.'_3')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_iniciales" >  '
							<input id="t-cel_<?php echo($libro_auxiliar->i) ?>_4" name="t-cel_<?php echo($libro_auxiliar->i) ?>_4" type="text" class="form-control"  placeholder="Iniciales"  title="Iniciales"    size="3"  maxlength="3" value="<?php echo($libro_auxiliar->iniciales) ?>" />
							<span id="spanstrMensajeiniciales" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_iniciales" >  '
							<input id="t-cel_<?php echo($libro_auxiliar->i) ?>_4" name="t-cel_<?php echo($libro_auxiliar->i) ?>_4" type="text" class="form-control"  placeholder="Iniciales"  title="Iniciales"    size="3"  maxlength="3" value="<?php echo($libro_auxiliar->iniciales) ?>" />
							<span id="spanstrMensajeiniciales" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '<textarea id="t-cel_<?php echo($libro_auxiliar->i) ?>_5" name="t-cel_<?php echo($libro_auxiliar->i) ?>_5" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($libro_auxiliar->nombre) ?></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($libro_auxiliar->i) ?>_5" name="t-cel_<?php echo($libro_auxiliar->i) ?>_5" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($libro_auxiliar->nombre) ?></input>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_secuencial" >  '
							<input id="t-cel_<?php echo($libro_auxiliar->i) ?>_6" name="t-cel_<?php echo($libro_auxiliar->i) ?>_6" type="text" class="form-control"  placeholder="Secuencial"  title="Secuencial"    maxlength="10" size="10"  value="<?php echo($libro_auxiliar->secuencial) ?>" >
							<span id="spanstrMensajesecuencial" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento" >  '
							<input id="t-cel_<?php echo($libro_auxiliar->i) ?>_7" name="t-cel_<?php echo($libro_auxiliar->i) ?>_7" type="text" class="form-control"  placeholder="Incremento"  title="Incremento"    maxlength="10" size="10"  value="<?php echo($libro_auxiliar->incremento) ?>" >
							<span id="spanstrMensajeincremento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_reinicia_secuencial_mes" ><?php  $funciones->getCheckBoxEditar($libro_auxiliar->reinicia_secuencial_mes,'t-cel_<?php echo($libro_auxiliar->i) ?>_8',$paraReporte)  ?>
						</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($libro_auxiliar->id) ?>
							<img class="imgrelacionasiento_automatico" idactuallibro_auxiliar="<?php echo($libro_auxiliar->id) ?>" title="Asiento AutomaticoS DE Libro Auxiliar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_automaticos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($libro_auxiliar->id) ?>
							<img class="imgrelacionasiento" idactuallibro_auxiliar="<?php echo($libro_auxiliar->id) ?>" title="AsientoS DE Libro Auxiliar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asientos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($libro_auxiliar->id) ?>
							<img class="imgrelacionasiento_predefinido" idactuallibro_auxiliar="<?php echo($libro_auxiliar->id) ?>" title="Asiento PredefinidoS DE Libro Auxiliar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_predefinidos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($libro_auxiliar->id) ?>
							<img class="imgrelacioncontador_auxiliar" idactuallibro_auxiliar="<?php echo($libro_auxiliar->id) ?>" title="Contadores AuxiliaresS DE Libro Auxiliar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/contador_auxiliars.gif" alt="Seleccionar" border="" height="15" width="15">
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



