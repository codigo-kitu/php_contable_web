



		<form id="frmTablaDatosmunicipio" name="frmTablaDatosmunicipio">
			<div id="divTablaDatosAuxiliarmunicipiosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($municipios)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulomunicipio" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Municipios</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosmunicipios" name="tblTablaDatosmunicipios" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Municipio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Departamento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Departamento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Municipio.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Municipio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Departamento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Departamento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Municipio.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($municipiosLocal!=null && count($municipiosLocal)>0) { ?>
			<?php foreach ($municipiosLocal as $municipio) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($municipio->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$municipio->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($municipio->id) ?>
							</td>
							<td>
								<img class="imgseleccionarmunicipio" idactualmunicipio="<?php echo($municipio->id) ?>" title="SELECCIONAR Municipio ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($municipio->id) ?>
							</td>
							<td>
								<img class="imgeliminartablamunicipio" idactualmunicipio="<?php echo($municipio->id) ?>" title="ELIMINAR Municipio ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($municipio->i) ?>" name="t-id_<?php echo($municipio->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Municipio ACTUAL" value="<?php echo($municipio->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($municipio->i) ?>_0" name="t-cel_<?php echo($municipio->i) ?>_0" type="text" maxlength="25" value="<?php echo($municipio->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $municipio->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $municipio->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($municipio->i) ?>_3" name="t-cel_<?php echo($municipio->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="10"  maxlength="10" value="<?php echo($municipio->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($municipio->i) ?>_3" name="t-cel_<?php echo($municipio->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="10"  maxlength="10" value="<?php echo($municipio->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_municipio" >  '
							<input id="t-cel_<?php echo($municipio->i) ?>_4" name="t-cel_<?php echo($municipio->i) ?>_4" type="text" class="form-control"  placeholder="Municipio"  title="Municipio"    size="20"  maxlength="50" value="<?php echo($municipio->municipio) ?>" />
							<span id="spanstrMensajemunicipio" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_municipio" >  '
							<input id="t-cel_<?php echo($municipio->i) ?>_4" name="t-cel_<?php echo($municipio->i) ?>_4" type="text" class="form-control"  placeholder="Municipio"  title="Municipio"    size="20"  maxlength="50" value="<?php echo($municipio->municipio) ?>" />
							<span id="spanstrMensajemunicipio" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_departamento" >  '
							<input id="t-cel_<?php echo($municipio->i) ?>_5" name="t-cel_<?php echo($municipio->i) ?>_5" type="text" class="form-control"  placeholder="Departamento"  title="Departamento"    size="20"  maxlength="50" value="<?php echo($municipio->departamento) ?>" />
							<span id="spanstrMensajedepartamento" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_departamento" >  '
							<input id="t-cel_<?php echo($municipio->i) ?>_5" name="t-cel_<?php echo($municipio->i) ?>_5" type="text" class="form-control"  placeholder="Departamento"  title="Departamento"    size="20"  maxlength="50" value="<?php echo($municipio->departamento) ?>" />
							<span id="spanstrMensajedepartamento" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_departamento" >  '
							<input id="t-cel_<?php echo($municipio->i) ?>_6" name="t-cel_<?php echo($municipio->i) ?>_6" type="text" class="form-control"  placeholder="Codigo Departamento"  title="Codigo Departamento"    size="4"  maxlength="4" value="<?php echo($municipio->codigo_departamento) ?>" />
							<span id="spanstrMensajecodigo_departamento" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_departamento" >  '
							<input id="t-cel_<?php echo($municipio->i) ?>_6" name="t-cel_<?php echo($municipio->i) ?>_6" type="text" class="form-control"  placeholder="Codigo Departamento"  title="Codigo Departamento"    size="4"  maxlength="4" value="<?php echo($municipio->codigo_departamento) ?>" />
							<span id="spanstrMensajecodigo_departamento" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_municipio" >  '
							<input id="t-cel_<?php echo($municipio->i) ?>_7" name="t-cel_<?php echo($municipio->i) ?>_7" type="text" class="form-control"  placeholder="Codigo Municipio"  title="Codigo Municipio"    size="4"  maxlength="4" value="<?php echo($municipio->codigo_municipio) ?>" />
							<span id="spanstrMensajecodigo_municipio" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_municipio" >  '
							<input id="t-cel_<?php echo($municipio->i) ?>_7" name="t-cel_<?php echo($municipio->i) ?>_7" type="text" class="form-control"  placeholder="Codigo Municipio"  title="Codigo Municipio"    size="4"  maxlength="4" value="<?php echo($municipio->codigo_municipio) ?>" />
							<span id="spanstrMensajecodigo_municipio" class="mensajeerror"></span>' 
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



