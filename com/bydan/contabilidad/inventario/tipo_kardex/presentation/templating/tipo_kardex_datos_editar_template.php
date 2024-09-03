



		<form id="frmTablaDatostipo_kardex" name="frmTablaDatostipo_kardex">
			<div id="divTablaDatosAuxiliartipo_kardexsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($tipo_kardexs)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulotipo_kardex" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Tipo Kadexs</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatostipo_kardexs" name="tblTablaDatostipo_kardexs" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Kardexes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Inventarios</pre></b>
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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Kardexes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Inventarios</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($tipo_kardexsLocal!=null && count($tipo_kardexsLocal)>0) { ?>
			<?php foreach ($tipo_kardexsLocal as $tipo_kardex) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($tipo_kardex->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$tipo_kardex->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($tipo_kardex->id) ?>
							</td>
							<td>
								<img class="imgseleccionartipo_kardex" idactualtipo_kardex="<?php echo($tipo_kardex->id) ?>" title="SELECCIONAR Tipo Kadex ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($tipo_kardex->id) ?>
							</td>
							<td>
								<img class="imgeliminartablatipo_kardex" idactualtipo_kardex="<?php echo($tipo_kardex->id) ?>" title="ELIMINAR Tipo Kadex ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($tipo_kardex->i) ?>" name="t-id_<?php echo($tipo_kardex->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Tipo Kadex ACTUAL" value="<?php echo($tipo_kardex->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($tipo_kardex->i) ?>_0" name="t-cel_<?php echo($tipo_kardex->i) ?>_0" type="text" maxlength="25" value="<?php echo($tipo_kardex->id) ?>" style="width:50px" ></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($tipo_kardex->id) ?><img class="imgseleccionarmostraraccionesrelacionestipo_kardex" idactualtipo_kardex="<?php echo($tipo_kardex->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $tipo_kardex->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $tipo_kardex->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($tipo_kardex->i) ?>_3" name="t-cel_<?php echo($tipo_kardex->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="25" value="<?php echo($tipo_kardex->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($tipo_kardex->i) ?>_3" name="t-cel_<?php echo($tipo_kardex->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="25" value="<?php echo($tipo_kardex->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($tipo_kardex->i) ?>_4" name="t-cel_<?php echo($tipo_kardex->i) ?>_4" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="50" value="<?php echo($tipo_kardex->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($tipo_kardex->i) ?>_4" name="t-cel_<?php echo($tipo_kardex->i) ?>_4" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="50" value="<?php echo($tipo_kardex->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($tipo_kardex->id) ?>
							<img class="imgrelacionkardex" idactualtipo_kardex="<?php echo($tipo_kardex->id) ?>" title="KardexS DE Tipo Kadex" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/kardexs.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($tipo_kardex->id) ?>
							<img class="imgrelacionparametro_inventario" idactualtipo_kardex="<?php echo($tipo_kardex->id) ?>" title="Parametro InventarioS DE Tipo Kadex" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/parametro_inventarios.gif" alt="Seleccionar" border="" height="15" width="15">
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



