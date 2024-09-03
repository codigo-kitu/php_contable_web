



		<form id="frmTablaDatoscontador_auxiliar" name="frmTablaDatoscontador_auxiliar">
			<div id="divTablaDatosAuxiliarcontador_auxiliarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($contador_auxiliars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocontador_auxiliar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Contadores Auxiliareses</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscontador_auxiliars" name="tblTablaDatoscontador_auxiliars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Contador.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Libro Auxiliar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo Anual.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mes.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Contador.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Libro Auxiliar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo Anual.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mes.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($contador_auxiliarsLocal!=null && count($contador_auxiliarsLocal)>0) { ?>
			<?php foreach ($contador_auxiliarsLocal as $contador_auxiliar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($contador_auxiliar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$contador_auxiliar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($contador_auxiliar->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcontador_auxiliar" idactualcontador_auxiliar="<?php echo($contador_auxiliar->id) ?>" title="SELECCIONAR Contadores Auxiliares ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($contador_auxiliar->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacontador_auxiliar" idactualcontador_auxiliar="<?php echo($contador_auxiliar->id) ?>" title="ELIMINAR Contadores Auxiliares ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($contador_auxiliar->i) ?>" name="t-id_<?php echo($contador_auxiliar->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Contadores Auxiliares ACTUAL" value="<?php echo($contador_auxiliar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($contador_auxiliar->i) ?>_0" name="t-cel_<?php echo($contador_auxiliar->i) ?>_0" type="text" maxlength="25" value="<?php echo($contador_auxiliar->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $contador_auxiliar->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $contador_auxiliar->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_id_contador" >  '
							<input id="t-cel_<?php echo($contador_auxiliar->i) ?>_3" name="t-cel_<?php echo($contador_auxiliar->i) ?>_3" type="text" class="form-control"  placeholder="Contador"  title="Contador"    size="10"  maxlength="10" value="<?php echo($contador_auxiliar->id_contador) ?>" />
							<span id="spanstrMensajeid_contador" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_id_contador" >  '
							<input id="t-cel_<?php echo($contador_auxiliar->i) ?>_3" name="t-cel_<?php echo($contador_auxiliar->i) ?>_3" type="text" class="form-control"  placeholder="Contador"  title="Contador"    size="10"  maxlength="10" value="<?php echo($contador_auxiliar->id_contador) ?>" />
							<span id="spanstrMensajeid_contador" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_libro_auxiliar" ><?php echo($funciones->getComboBoxEditar($contador_auxiliar->id_libro_auxiliar_Descripcion,$contador_auxiliar->id_libro_auxiliar,'t-cel_'.$contador_auxiliar->i.'_4')) ?></td>
				
						<td class="elementotabla col_periodo_anual" >  '
							<input id="t-cel_<?php echo($contador_auxiliar->i) ?>_5" name="t-cel_<?php echo($contador_auxiliar->i) ?>_5" type="text" class="form-control"  placeholder="Periodo Anual"  title="Periodo Anual"    maxlength="10" size="10"  value="<?php echo($contador_auxiliar->periodo_anual) ?>" >
							<span id="spanstrMensajeperiodo_anual" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_mes" >  '
							<input id="t-cel_<?php echo($contador_auxiliar->i) ?>_6" name="t-cel_<?php echo($contador_auxiliar->i) ?>_6" type="text" class="form-control"  placeholder="Mes"  title="Mes"    maxlength="10" size="10"  value="<?php echo($contador_auxiliar->mes) ?>" >
							<span id="spanstrMensajemes" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_contador" >  '
							<input id="t-cel_<?php echo($contador_auxiliar->i) ?>_7" name="t-cel_<?php echo($contador_auxiliar->i) ?>_7" type="text" class="form-control"  placeholder="Contador"  title="Contador"    maxlength="10" size="10"  value="<?php echo($contador_auxiliar->contador) ?>" >
							<span id="spanstrMensajecontador" class="mensajeerror"></span>' 
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



