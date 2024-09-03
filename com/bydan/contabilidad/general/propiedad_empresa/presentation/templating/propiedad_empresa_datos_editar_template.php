



		<form id="frmTablaDatospropiedad_empresa" name="frmTablaDatospropiedad_empresa">
			<div id="divTablaDatosAuxiliarpropiedad_empresasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($propiedad_empresas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulopropiedad_empresa" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Propiedades Empresas</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatospropiedad_empresas" name="tblTablaDatospropiedad_empresas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Nombre Empresa.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Calle 1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Calle 2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Calle 3.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Barrio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Pais.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Nombre Empresa.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Calle 1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Calle 2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Calle 3.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Barrio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Pais.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($propiedad_empresasLocal!=null && count($propiedad_empresasLocal)>0) { ?>
			<?php foreach ($propiedad_empresasLocal as $propiedad_empresa) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($propiedad_empresa->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$propiedad_empresa->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($propiedad_empresa->id) ?>
							</td>
							<td>
								<img class="imgseleccionarpropiedad_empresa" idactualpropiedad_empresa="<?php echo($propiedad_empresa->id) ?>" title="SELECCIONAR Propiedades Empresa ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($propiedad_empresa->id) ?>
							</td>
							<td>
								<img class="imgeliminartablapropiedad_empresa" idactualpropiedad_empresa="<?php echo($propiedad_empresa->id) ?>" title="ELIMINAR Propiedades Empresa ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($propiedad_empresa->i) ?>" name="t-id_<?php echo($propiedad_empresa->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Propiedades Empresa ACTUAL" value="<?php echo($propiedad_empresa->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($propiedad_empresa->i) ?>_0" name="t-cel_<?php echo($propiedad_empresa->i) ?>_0" type="text" maxlength="25" value="<?php echo($propiedad_empresa->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $propiedad_empresa->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $propiedad_empresa->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_empresa" >  '<textarea id="t-cel_<?php echo($propiedad_empresa->i) ?>_3" name="t-cel_<?php echo($propiedad_empresa->i) ?>_3" class="form-control"  placeholder="Nombre Empresa"  title="Nombre Empresa"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($propiedad_empresa->nombre_empresa) ?></textarea>
							<span id="spanstrMensajenombre_empresa" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_empresa" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($propiedad_empresa->i) ?>_3" name="t-cel_<?php echo($propiedad_empresa->i) ?>_3" class="form-control"  placeholder="Nombre Empresa"  title="Nombre Empresa"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($propiedad_empresa->nombre_empresa) ?></input>
							<span id="spanstrMensajenombre_empresa" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_calle_1" >  '<textarea id="t-cel_<?php echo($propiedad_empresa->i) ?>_4" name="t-cel_<?php echo($propiedad_empresa->i) ?>_4" class="form-control"  placeholder="Calle 1"  title="Calle 1"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->calle_1) ?></textarea>
							<span id="spanstrMensajecalle_1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_calle_1" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($propiedad_empresa->i) ?>_4" name="t-cel_<?php echo($propiedad_empresa->i) ?>_4" class="form-control"  placeholder="Calle 1"  title="Calle 1"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->calle_1) ?></input>
							<span id="spanstrMensajecalle_1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_calle_2" >  '<textarea id="t-cel_<?php echo($propiedad_empresa->i) ?>_5" name="t-cel_<?php echo($propiedad_empresa->i) ?>_5" class="form-control"  placeholder="Calle 2"  title="Calle 2"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->calle_2) ?></textarea>
							<span id="spanstrMensajecalle_2" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_calle_2" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($propiedad_empresa->i) ?>_5" name="t-cel_<?php echo($propiedad_empresa->i) ?>_5" class="form-control"  placeholder="Calle 2"  title="Calle 2"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->calle_2) ?></input>
							<span id="spanstrMensajecalle_2" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_calle_3" >  '<textarea id="t-cel_<?php echo($propiedad_empresa->i) ?>_6" name="t-cel_<?php echo($propiedad_empresa->i) ?>_6" class="form-control"  placeholder="Calle 3"  title="Calle 3"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->calle_3) ?></textarea>
							<span id="spanstrMensajecalle_3" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_calle_3" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($propiedad_empresa->i) ?>_6" name="t-cel_<?php echo($propiedad_empresa->i) ?>_6" class="form-control"  placeholder="Calle 3"  title="Calle 3"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->calle_3) ?></input>
							<span id="spanstrMensajecalle_3" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_barrio" >  '<textarea id="t-cel_<?php echo($propiedad_empresa->i) ?>_7" name="t-cel_<?php echo($propiedad_empresa->i) ?>_7" class="form-control"  placeholder="Barrio"  title="Barrio"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->barrio) ?></textarea>
							<span id="spanstrMensajebarrio" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_barrio" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($propiedad_empresa->i) ?>_7" name="t-cel_<?php echo($propiedad_empresa->i) ?>_7" class="form-control"  placeholder="Barrio"  title="Barrio"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->barrio) ?></input>
							<span id="spanstrMensajebarrio" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_ciudad" >  '<textarea id="t-cel_<?php echo($propiedad_empresa->i) ?>_8" name="t-cel_<?php echo($propiedad_empresa->i) ?>_8" class="form-control"  placeholder="Ciudad"  title="Ciudad"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->ciudad) ?></textarea>
							<span id="spanstrMensajeciudad" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_ciudad" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($propiedad_empresa->i) ?>_8" name="t-cel_<?php echo($propiedad_empresa->i) ?>_8" class="form-control"  placeholder="Ciudad"  title="Ciudad"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->ciudad) ?></input>
							<span id="spanstrMensajeciudad" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_estado" >  '<textarea id="t-cel_<?php echo($propiedad_empresa->i) ?>_9" name="t-cel_<?php echo($propiedad_empresa->i) ?>_9" class="form-control"  placeholder="Estado"  title="Estado"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->estado) ?></textarea>
							<span id="spanstrMensajeestado" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_estado" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($propiedad_empresa->i) ?>_9" name="t-cel_<?php echo($propiedad_empresa->i) ?>_9" class="form-control"  placeholder="Estado"  title="Estado"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($propiedad_empresa->estado) ?></input>
							<span id="spanstrMensajeestado" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_postal" >  '
							<input id="t-cel_<?php echo($propiedad_empresa->i) ?>_10" name="t-cel_<?php echo($propiedad_empresa->i) ?>_10" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="20"  maxlength="20" value="<?php echo($propiedad_empresa->codigo_postal) ?>" />
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_postal" >  '
							<input id="t-cel_<?php echo($propiedad_empresa->i) ?>_10" name="t-cel_<?php echo($propiedad_empresa->i) ?>_10" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="20"  maxlength="20" value="<?php echo($propiedad_empresa->codigo_postal) ?>" />
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_pais" >  '
							<input id="t-cel_<?php echo($propiedad_empresa->i) ?>_11" name="t-cel_<?php echo($propiedad_empresa->i) ?>_11" type="text" class="form-control"  placeholder="Codigo Pais"  title="Codigo Pais"    size="5"  maxlength="5" value="<?php echo($propiedad_empresa->codigo_pais) ?>" />
							<span id="spanstrMensajecodigo_pais" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_pais" >  '
							<input id="t-cel_<?php echo($propiedad_empresa->i) ?>_11" name="t-cel_<?php echo($propiedad_empresa->i) ?>_11" type="text" class="form-control"  placeholder="Codigo Pais"  title="Codigo Pais"    size="5"  maxlength="5" value="<?php echo($propiedad_empresa->codigo_pais) ?>" />
							<span id="spanstrMensajecodigo_pais" class="mensajeerror"></span>' 
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



