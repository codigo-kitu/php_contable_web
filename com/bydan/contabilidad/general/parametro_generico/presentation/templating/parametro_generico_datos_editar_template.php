



		<form id="frmTablaDatosparametro_generico" name="frmTablaDatosparametro_generico">
			<div id="divTablaDatosAuxiliarparametro_genericosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_genericos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_generico" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametros Genericoses</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_genericos" name="tblTablaDatosparametro_genericos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Parametro.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion Pantalla.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Caracteristica.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor2 Caracteristica.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor3 Caracteristica.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Fecha.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Numerico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor2 Numerico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Binario.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Parametro.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion Pantalla.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Caracteristica.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor2 Caracteristica.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor3 Caracteristica.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Fecha.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Numerico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor2 Numerico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Binario.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_genericosLocal!=null && count($parametro_genericosLocal)>0) { ?>
			<?php foreach ($parametro_genericosLocal as $parametro_generico) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_generico->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_generico->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_generico->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_generico" idactualparametro_generico="<?php echo($parametro_generico->id) ?>" title="SELECCIONAR Parametros Genericos ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($parametro_generico->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaparametro_generico" idactualparametro_generico="<?php echo($parametro_generico->id) ?>" title="ELIMINAR Parametros Genericos ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($parametro_generico->i) ?>" name="t-id_<?php echo($parametro_generico->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametros Genericos ACTUAL" value="<?php echo($parametro_generico->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($parametro_generico->i) ?>_0" name="t-cel_<?php echo($parametro_generico->i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_generico->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $parametro_generico->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $parametro_generico->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_parametro" >  '
							<input id="t-cel_<?php echo($parametro_generico->i) ?>_3" name="t-cel_<?php echo($parametro_generico->i) ?>_3" type="text" class="form-control"  placeholder="Parametro"  title="Parametro"    size="20"  maxlength="30" value="<?php echo($parametro_generico->parametro) ?>" />
							<span id="spanstrMensajeparametro" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_parametro" >  '
							<input id="t-cel_<?php echo($parametro_generico->i) ?>_3" name="t-cel_<?php echo($parametro_generico->i) ?>_3" type="text" class="form-control"  placeholder="Parametro"  title="Parametro"    size="20"  maxlength="30" value="<?php echo($parametro_generico->parametro) ?>" />
							<span id="spanstrMensajeparametro" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion_pantalla" >  '<textarea id="t-cel_<?php echo($parametro_generico->i) ?>_4" name="t-cel_<?php echo($parametro_generico->i) ?>_4" class="form-control"  placeholder="Descripcion Pantalla"  title="Descripcion Pantalla"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($parametro_generico->descripcion_pantalla) ?></textarea>
							<span id="spanstrMensajedescripcion_pantalla" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion_pantalla" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($parametro_generico->i) ?>_4" name="t-cel_<?php echo($parametro_generico->i) ?>_4" class="form-control"  placeholder="Descripcion Pantalla"  title="Descripcion Pantalla"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($parametro_generico->descripcion_pantalla) ?></input>
							<span id="spanstrMensajedescripcion_pantalla" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_valor_caracteristica" >  '<textarea id="t-cel_<?php echo($parametro_generico->i) ?>_5" name="t-cel_<?php echo($parametro_generico->i) ?>_5" class="form-control"  placeholder="Valor Caracteristica"  title="Valor Caracteristica"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($parametro_generico->valor_caracteristica) ?></textarea>
							<span id="spanstrMensajevalor_caracteristica" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_valor_caracteristica" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($parametro_generico->i) ?>_5" name="t-cel_<?php echo($parametro_generico->i) ?>_5" class="form-control"  placeholder="Valor Caracteristica"  title="Valor Caracteristica"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($parametro_generico->valor_caracteristica) ?></input>
							<span id="spanstrMensajevalor_caracteristica" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_valor2_caracteristica" >  '<textarea id="t-cel_<?php echo($parametro_generico->i) ?>_6" name="t-cel_<?php echo($parametro_generico->i) ?>_6" class="form-control"  placeholder="Valor2 Caracteristica"  title="Valor2 Caracteristica"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($parametro_generico->valor2_caracteristica) ?></textarea>
							<span id="spanstrMensajevalor2_caracteristica" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_valor2_caracteristica" >  '<input type="text" maxlength="254"  id="t-cel_<?php echo($parametro_generico->i) ?>_6" name="t-cel_<?php echo($parametro_generico->i) ?>_6" class="form-control"  placeholder="Valor2 Caracteristica"  title="Valor2 Caracteristica"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($parametro_generico->valor2_caracteristica) ?></input>
							<span id="spanstrMensajevalor2_caracteristica" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_valor3_caracteristica" >  '<textarea id="t-cel_<?php echo($parametro_generico->i) ?>_7" name="t-cel_<?php echo($parametro_generico->i) ?>_7" class="form-control"  placeholder="Valor3 Caracteristica"  title="Valor3 Caracteristica"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($parametro_generico->valor3_caracteristica) ?></textarea>
							<span id="spanstrMensajevalor3_caracteristica" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_valor3_caracteristica" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($parametro_generico->i) ?>_7" name="t-cel_<?php echo($parametro_generico->i) ?>_7" class="form-control"  placeholder="Valor3 Caracteristica"  title="Valor3 Caracteristica"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($parametro_generico->valor3_caracteristica) ?></input>
							<span id="spanstrMensajevalor3_caracteristica" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_valor_fecha" >  '
							<input id="t-cel_<?php echo($parametro_generico->i) ?>_8" name="t-cel_<?php echo($parametro_generico->i) ?>_8" type="text" class="form-control"  placeholder="Valor Fecha"  title="Valor Fecha"    size="10"  value="<?php echo($parametro_generico->valor_fecha) ?>" >
							<span id="spanstrMensajevalor_fecha" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_valor_numerico" >  '
							<input id="t-cel_<?php echo($parametro_generico->i) ?>_9" name="t-cel_<?php echo($parametro_generico->i) ?>_9" type="text" class="form-control"  placeholder="Valor Numerico"  title="Valor Numerico"    maxlength="18" size="12"  value="<?php echo($parametro_generico->valor_numerico) ?>" >
							<span id="spanstrMensajevalor_numerico" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_valor2_numerico" >  '
							<input id="t-cel_<?php echo($parametro_generico->i) ?>_10" name="t-cel_<?php echo($parametro_generico->i) ?>_10" type="text" class="form-control"  placeholder="Valor2 Numerico"  title="Valor2 Numerico"    maxlength="18" size="12"  value="<?php echo($parametro_generico->valor2_numerico) ?>" >
							<span id="spanstrMensajevalor2_numerico" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_valor_binario" >  '<textarea id="t-cel_<?php echo($parametro_generico->i) ?>_11" name="t-cel_<?php echo($parametro_generico->i) ?>_11" class="form-control"  placeholder="Valor Binario"  title="Valor Binario"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($parametro_generico->valor_binario) ?></textarea>
							<span id="spanstrMensajevalor_binario" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_valor_binario" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($parametro_generico->i) ?>_11" name="t-cel_<?php echo($parametro_generico->i) ?>_11" class="form-control"  placeholder="Valor Binario"  title="Valor Binario"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($parametro_generico->valor_binario) ?></input>
							<span id="spanstrMensajevalor_binario" class="mensajeerror"></span>' 
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



