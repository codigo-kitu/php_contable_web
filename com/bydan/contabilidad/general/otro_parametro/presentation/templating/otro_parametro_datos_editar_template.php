



		<form id="frmTablaDatosotro_parametro" name="frmTablaDatosotro_parametro">
			<div id="divTablaDatosAuxiliarotro_parametrosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($otro_parametros)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulootro_parametro" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Otros Parametroses</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosotro_parametros" name="tblTablaDatosotro_parametros" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Codigo2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Texto1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Orden.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto1.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Texto1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Orden.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto1.(*)</pre>
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

		<?php if($otro_parametrosLocal!=null && count($otro_parametrosLocal)>0) { ?>
			<?php foreach ($otro_parametrosLocal as $otro_parametro) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($otro_parametro->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$otro_parametro->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($otro_parametro->id) ?>
							</td>
							<td>
								<img class="imgseleccionarotro_parametro" idactualotro_parametro="<?php echo($otro_parametro->id) ?>" title="SELECCIONAR Otros Parametros ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($otro_parametro->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaotro_parametro" idactualotro_parametro="<?php echo($otro_parametro->id) ?>" title="ELIMINAR Otros Parametros ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($otro_parametro->i) ?>" name="t-id_<?php echo($otro_parametro->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Otros Parametros ACTUAL" value="<?php echo($otro_parametro->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($otro_parametro->i) ?>_0" name="t-cel_<?php echo($otro_parametro->i) ?>_0" type="text" maxlength="25" value="<?php echo($otro_parametro->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $otro_parametro->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $otro_parametro->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($otro_parametro->i) ?>_3" name="t-cel_<?php echo($otro_parametro->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="10"  maxlength="10" value="<?php echo($otro_parametro->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($otro_parametro->i) ?>_3" name="t-cel_<?php echo($otro_parametro->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="10"  maxlength="10" value="<?php echo($otro_parametro->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo2" >  '
							<input id="t-cel_<?php echo($otro_parametro->i) ?>_4" name="t-cel_<?php echo($otro_parametro->i) ?>_4" type="text" class="form-control"  placeholder="Codigo2"  title="Codigo2"    size="10"  maxlength="10" value="<?php echo($otro_parametro->codigo2) ?>" />
							<span id="spanstrMensajecodigo2" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo2" >  '
							<input id="t-cel_<?php echo($otro_parametro->i) ?>_4" name="t-cel_<?php echo($otro_parametro->i) ?>_4" type="text" class="form-control"  placeholder="Codigo2"  title="Codigo2"    size="10"  maxlength="10" value="<?php echo($otro_parametro->codigo2) ?>" />
							<span id="spanstrMensajecodigo2" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_grupo" >  '
							<input id="t-cel_<?php echo($otro_parametro->i) ?>_5" name="t-cel_<?php echo($otro_parametro->i) ?>_5" type="text" class="form-control"  placeholder="Grupo"  title="Grupo"    size="10"  maxlength="10" value="<?php echo($otro_parametro->grupo) ?>" />
							<span id="spanstrMensajegrupo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_grupo" >  '
							<input id="t-cel_<?php echo($otro_parametro->i) ?>_5" name="t-cel_<?php echo($otro_parametro->i) ?>_5" type="text" class="form-control"  placeholder="Grupo"  title="Grupo"    size="10"  maxlength="10" value="<?php echo($otro_parametro->grupo) ?>" />
							<span id="spanstrMensajegrupo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($otro_parametro->i) ?>_6" name="t-cel_<?php echo($otro_parametro->i) ?>_6" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($otro_parametro->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($otro_parametro->i) ?>_6" name="t-cel_<?php echo($otro_parametro->i) ?>_6" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($otro_parametro->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_texto1" >  '
							<input id="t-cel_<?php echo($otro_parametro->i) ?>_7" name="t-cel_<?php echo($otro_parametro->i) ?>_7" type="text" class="form-control"  placeholder="Texto1"  title="Texto1"    size="20"  maxlength="25" value="<?php echo($otro_parametro->texto1) ?>" />
							<span id="spanstrMensajetexto1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_texto1" >  '
							<input id="t-cel_<?php echo($otro_parametro->i) ?>_7" name="t-cel_<?php echo($otro_parametro->i) ?>_7" type="text" class="form-control"  placeholder="Texto1"  title="Texto1"    size="20"  maxlength="25" value="<?php echo($otro_parametro->texto1) ?>" />
							<span id="spanstrMensajetexto1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_orden" >  '
							<input id="t-cel_<?php echo($otro_parametro->i) ?>_8" name="t-cel_<?php echo($otro_parametro->i) ?>_8" type="text" class="form-control"  placeholder="Orden"  title="Orden"    maxlength="10" size="10"  value="<?php echo($otro_parametro->orden) ?>" >
							<span id="spanstrMensajeorden" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_monto1" >  '
							<input id="t-cel_<?php echo($otro_parametro->i) ?>_9" name="t-cel_<?php echo($otro_parametro->i) ?>_9" type="text" class="form-control"  placeholder="Monto1"  title="Monto1"    maxlength="18" size="12"  value="<?php echo($otro_parametro->monto1) ?>" >
							<span id="spanstrMensajemonto1" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_activo" ><?php  $funciones->getCheckBoxEditar($otro_parametro->activo,'t-cel_<?php echo($otro_parametro->i) ?>_10',$paraReporte)  ?>
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



