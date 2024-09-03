



		<form id="frmTablaDatosparametro_general" name="frmTablaDatosparametro_general">
			<div id="divTablaDatosAuxiliarparametro_generalsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_generals)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_general" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Generales</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_generals" name="tblTablaDatosparametro_generals" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Pais</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Simbolo Moneda.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Decimales.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Fecha MDA</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Cantidad Coma</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %.(*)</pre>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Pais</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Simbolo Moneda.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Decimales.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Fecha MDA</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Cantidad Coma</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_generalsLocal!=null && count($parametro_generalsLocal)>0) { ?>
			<?php foreach ($parametro_generalsLocal as $parametro_general) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_general->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_general->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_general->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_general" idactualparametro_general="<?php echo($parametro_general->id) ?>" title="SELECCIONAR Parametro General ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($parametro_general->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaparametro_general" idactualparametro_general="<?php echo($parametro_general->id) ?>" title="ELIMINAR Parametro General ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($parametro_general->i) ?>" name="t-id_<?php echo($parametro_general->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro General ACTUAL" value="<?php echo($parametro_general->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($parametro_general->i) ?>_0" name="t-cel_<?php echo($parametro_general->i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_general->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $parametro_general->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $parametro_general->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($parametro_general->id_empresa_Descripcion,$parametro_general->id_empresa,'t-cel_'.$parametro_general->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_pais" ><?php echo($funciones->getComboBoxEditar($parametro_general->id_pais_Descripcion,$parametro_general->id_pais,'t-cel_'.$parametro_general->i.'_4')) ?></td>
				<td class="elementotabla col_id_modena" ><?php echo($funciones->getComboBoxEditar($parametro_general->id_modena_Descripcion,$parametro_general->id_modena,'t-cel_'.$parametro_general->i.'_5')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_simbolo_moneda" >  '
							<input id="t-cel_<?php echo($parametro_general->i) ?>_6" name="t-cel_<?php echo($parametro_general->i) ?>_6" type="text" class="form-control"  placeholder="Simbolo Moneda"  title="Simbolo Moneda"    size="5"  maxlength="5" value="<?php echo($parametro_general->simbolo_moneda) ?>" />
							<span id="spanstrMensajesimbolo_moneda" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_simbolo_moneda" >  '
							<input id="t-cel_<?php echo($parametro_general->i) ?>_6" name="t-cel_<?php echo($parametro_general->i) ?>_6" type="text" class="form-control"  placeholder="Simbolo Moneda"  title="Simbolo Moneda"    size="5"  maxlength="5" value="<?php echo($parametro_general->simbolo_moneda) ?>" />
							<span id="spanstrMensajesimbolo_moneda" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_numero_decimales" >  '
							<input id="t-cel_<?php echo($parametro_general->i) ?>_7" name="t-cel_<?php echo($parametro_general->i) ?>_7" type="text" class="form-control"  placeholder="Numero Decimales"  title="Numero Decimales"    maxlength="10" size="10"  value="<?php echo($parametro_general->numero_decimales) ?>" >
							<span id="spanstrMensajenumero_decimales" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_formato_fecha_mda" ><?php  $funciones->getCheckBoxEditar($parametro_general->con_formato_fecha_mda,'t-cel_<?php echo($parametro_general->i) ?>_8',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_formato_cantidad_coma" ><?php  $funciones->getCheckBoxEditar($parametro_general->con_formato_cantidad_coma,'t-cel_<?php echo($parametro_general->i) ?>_9',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_iva_porciento" >  '
							<input id="t-cel_<?php echo($parametro_general->i) ?>_10" name="t-cel_<?php echo($parametro_general->i) ?>_10" type="text" class="form-control"  placeholder="Iva %"  title="Iva %"    maxlength="18" size="12"  value="<?php echo($parametro_general->iva_porciento) ?>" >
							<span id="spanstrMensajeiva_porciento" class="mensajeerror"></span>' 
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



