



		<form id="frmTablaDatosparametro_sql" name="frmTablaDatosparametro_sql">
			<div id="divTablaDatosAuxiliarparametro_sqlsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_sqls)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_sql" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametros Sqles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_sqls" name="tblTablaDatosparametro_sqls" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Binario1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario3.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario4.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario5.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Binario1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario3.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario4.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario5.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_sqlsLocal!=null && count($parametro_sqlsLocal)>0) { ?>
			<?php foreach ($parametro_sqlsLocal as $parametro_sql) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_sql->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_sql->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_sql->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_sql" idactualparametro_sql="<?php echo($parametro_sql->id) ?>" title="SELECCIONAR Parametros Sql ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($parametro_sql->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaparametro_sql" idactualparametro_sql="<?php echo($parametro_sql->id) ?>" title="ELIMINAR Parametros Sql ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($parametro_sql->i) ?>" name="t-id_<?php echo($parametro_sql->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametros Sql ACTUAL" value="<?php echo($parametro_sql->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($parametro_sql->i) ?>_0" name="t-cel_<?php echo($parametro_sql->i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_sql->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $parametro_sql->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $parametro_sql->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_binario1" >  '
							<input id="t-cel_<?php echo($parametro_sql->i) ?>_3" name="t-cel_<?php echo($parametro_sql->i) ?>_3" type="text" class="form-control"  placeholder="Binario1"  title="Binario1"    size="20"  maxlength="30" value="<?php echo($parametro_sql->binario1) ?>" />
							<span id="spanstrMensajebinario1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_binario1" >  '
							<input id="t-cel_<?php echo($parametro_sql->i) ?>_3" name="t-cel_<?php echo($parametro_sql->i) ?>_3" type="text" class="form-control"  placeholder="Binario1"  title="Binario1"    size="20"  maxlength="30" value="<?php echo($parametro_sql->binario1) ?>" />
							<span id="spanstrMensajebinario1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_binario2" >  '
							<input id="t-cel_<?php echo($parametro_sql->i) ?>_4" name="t-cel_<?php echo($parametro_sql->i) ?>_4" type="text" class="form-control"  placeholder="Binario2"  title="Binario2"    size="20"  maxlength="40" value="<?php echo($parametro_sql->binario2) ?>" />
							<span id="spanstrMensajebinario2" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_binario2" >  '
							<input id="t-cel_<?php echo($parametro_sql->i) ?>_4" name="t-cel_<?php echo($parametro_sql->i) ?>_4" type="text" class="form-control"  placeholder="Binario2"  title="Binario2"    size="20"  maxlength="40" value="<?php echo($parametro_sql->binario2) ?>" />
							<span id="spanstrMensajebinario2" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_binario3" >  '
							<input id="t-cel_<?php echo($parametro_sql->i) ?>_5" name="t-cel_<?php echo($parametro_sql->i) ?>_5" type="text" class="form-control"  placeholder="Binario3"  title="Binario3"    size="20"  maxlength="20" value="<?php echo($parametro_sql->binario3) ?>" />
							<span id="spanstrMensajebinario3" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_binario3" >  '
							<input id="t-cel_<?php echo($parametro_sql->i) ?>_5" name="t-cel_<?php echo($parametro_sql->i) ?>_5" type="text" class="form-control"  placeholder="Binario3"  title="Binario3"    size="20"  maxlength="20" value="<?php echo($parametro_sql->binario3) ?>" />
							<span id="spanstrMensajebinario3" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_binario4" >  '
							<input id="t-cel_<?php echo($parametro_sql->i) ?>_6" name="t-cel_<?php echo($parametro_sql->i) ?>_6" type="text" class="form-control"  placeholder="Binario4"  title="Binario4"    size="20"  maxlength="20" value="<?php echo($parametro_sql->binario4) ?>" />
							<span id="spanstrMensajebinario4" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_binario4" >  '
							<input id="t-cel_<?php echo($parametro_sql->i) ?>_6" name="t-cel_<?php echo($parametro_sql->i) ?>_6" type="text" class="form-control"  placeholder="Binario4"  title="Binario4"    size="20"  maxlength="20" value="<?php echo($parametro_sql->binario4) ?>" />
							<span id="spanstrMensajebinario4" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_binario5" >  '
							<input id="t-cel_<?php echo($parametro_sql->i) ?>_7" name="t-cel_<?php echo($parametro_sql->i) ?>_7" type="text" class="form-control"  placeholder="Binario5"  title="Binario5"    size="20"  maxlength="20" value="<?php echo($parametro_sql->binario5) ?>" />
							<span id="spanstrMensajebinario5" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_binario5" >  '
							<input id="t-cel_<?php echo($parametro_sql->i) ?>_7" name="t-cel_<?php echo($parametro_sql->i) ?>_7" type="text" class="form-control"  placeholder="Binario5"  title="Binario5"    size="20"  maxlength="20" value="<?php echo($parametro_sql->binario5) ?>" />
							<span id="spanstrMensajebinario5" class="mensajeerror"></span>' 
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



