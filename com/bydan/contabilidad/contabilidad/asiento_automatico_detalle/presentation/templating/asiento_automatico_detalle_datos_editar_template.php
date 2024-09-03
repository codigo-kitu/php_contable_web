



		<form id="frmTablaDatosasiento_automatico_detalle" name="frmTablaDatosasiento_automatico_detalle">
			<div id="divTablaDatosAuxiliarasiento_automatico_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($asiento_automatico_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloasiento_automatico_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Detalle Asiento Automaticos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosasiento_automatico_detalles" name="tblTablaDatosasiento_automatico_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Asiento Automatico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Centro Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Credito</pre>
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
				<pre class="cabecera_texto_titulo_tabla"> Asiento Automatico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Centro Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Credito</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($asiento_automatico_detallesLocal!=null && count($asiento_automatico_detallesLocal)>0) { ?>
			<?php foreach ($asiento_automatico_detallesLocal as $asiento_automatico_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($asiento_automatico_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$asiento_automatico_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($asiento_automatico_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionarasiento_automatico_detalle" idactualasiento_automatico_detalle="<?php echo($asiento_automatico_detalle->id) ?>" title="SELECCIONAR Detalle Asiento Automatico ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($asiento_automatico_detalle->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaasiento_automatico_detalle" idactualasiento_automatico_detalle="<?php echo($asiento_automatico_detalle->id) ?>" title="ELIMINAR Detalle Asiento Automatico ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($asiento_automatico_detalle->i) ?>" name="t-id_<?php echo($asiento_automatico_detalle->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Detalle Asiento Automatico ACTUAL" value="<?php echo($asiento_automatico_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($asiento_automatico_detalle->i) ?>_0" name="t-cel_<?php echo($asiento_automatico_detalle->i) ?>_0" type="text" maxlength="25" value="<?php echo($asiento_automatico_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $asiento_automatico_detalle->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $asiento_automatico_detalle->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($asiento_automatico_detalle->id_empresa_Descripcion,$asiento_automatico_detalle->id_empresa,'t-cel_'.$asiento_automatico_detalle->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_asiento_automatico" ><?php echo($funciones->getComboBoxEditar($asiento_automatico_detalle->id_asiento_automatico_Descripcion,$asiento_automatico_detalle->id_asiento_automatico,'t-cel_'.$asiento_automatico_detalle->i.'_4')) ?></td>
				<td class="elementotabla col_id_cuenta" ><?php echo($funciones->getComboBoxEditar($asiento_automatico_detalle->id_cuenta_Descripcion,$asiento_automatico_detalle->id_cuenta,'t-cel_'.$asiento_automatico_detalle->i.'_5')) ?></td>
				<td class="elementotabla col_id_centro_costo" ><?php echo($funciones->getComboBoxEditar($asiento_automatico_detalle->id_centro_costo_Descripcion,$asiento_automatico_detalle->id_centro_costo,'t-cel_'.$asiento_automatico_detalle->i.'_6')) ?></td>
				
						<td class="elementotabla col_es_credito" ><?php  $funciones->getCheckBoxEditar($asiento_automatico_detalle->es_credito,'t-cel_<?php echo($asiento_automatico_detalle->i) ?>_7',$paraReporte)  ?>
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



