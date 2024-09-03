



		<form id="frmTablaDatoscambio_dolar" name="frmTablaDatoscambio_dolar">
			<div id="divTablaDatosAuxiliarcambio_dolarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($cambio_dolars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocambio_dolar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cambio Dolares</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscambio_dolars" name="tblTablaDatoscambio_dolars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Fecha Cambio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dolar Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dolar Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Origen.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Fecha Cambio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dolar Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dolar Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Origen.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($cambio_dolarsLocal!=null && count($cambio_dolarsLocal)>0) { ?>
			<?php foreach ($cambio_dolarsLocal as $cambio_dolar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cambio_dolar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cambio_dolar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cambio_dolar->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcambio_dolar" idactualcambio_dolar="<?php echo($cambio_dolar->id) ?>" title="SELECCIONAR Cambio Dolar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($cambio_dolar->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacambio_dolar" idactualcambio_dolar="<?php echo($cambio_dolar->id) ?>" title="ELIMINAR Cambio Dolar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($cambio_dolar->i) ?>" name="t-id_<?php echo($cambio_dolar->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cambio Dolar ACTUAL" value="<?php echo($cambio_dolar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($cambio_dolar->i) ?>_0" name="t-cel_<?php echo($cambio_dolar->i) ?>_0" type="text" maxlength="25" value="<?php echo($cambio_dolar->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $cambio_dolar->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $cambio_dolar->updated_at 
					</td>
				
						<td class="elementotabla col_fecha_cambio" >  '
							<input id="t-cel_<?php echo($cambio_dolar->i) ?>_3" name="t-cel_<?php echo($cambio_dolar->i) ?>_3" type="text" class="form-control"  placeholder="Fecha Cambio"  title="Fecha Cambio"    size="10"  value="<?php echo($cambio_dolar->fecha_cambio) ?>" >
							<span id="spanstrMensajefecha_cambio" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_dolar_compra" >  '
							<input id="t-cel_<?php echo($cambio_dolar->i) ?>_4" name="t-cel_<?php echo($cambio_dolar->i) ?>_4" type="text" class="form-control"  placeholder="Dolar Compra"  title="Dolar Compra"    maxlength="18" size="12"  value="<?php echo($cambio_dolar->dolar_compra) ?>" >
							<span id="spanstrMensajedolar_compra" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_dolar_venta" >  '
							<input id="t-cel_<?php echo($cambio_dolar->i) ?>_5" name="t-cel_<?php echo($cambio_dolar->i) ?>_5" type="text" class="form-control"  placeholder="Dolar Venta"  title="Dolar Venta"    maxlength="18" size="12"  value="<?php echo($cambio_dolar->dolar_venta) ?>" >
							<span id="spanstrMensajedolar_venta" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_origen" >  '
							<input id="t-cel_<?php echo($cambio_dolar->i) ?>_6" name="t-cel_<?php echo($cambio_dolar->i) ?>_6" type="text" class="form-control"  placeholder="Origen"  title="Origen"    size="2"  maxlength="2" value="<?php echo($cambio_dolar->origen) ?>" />
							<span id="spanstrMensajeorigen" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_origen" >  '
							<input id="t-cel_<?php echo($cambio_dolar->i) ?>_6" name="t-cel_<?php echo($cambio_dolar->i) ?>_6" type="text" class="form-control"  placeholder="Origen"  title="Origen"    size="2"  maxlength="2" value="<?php echo($cambio_dolar->origen) ?>" />
							<span id="spanstrMensajeorigen" class="mensajeerror"></span>' 
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



