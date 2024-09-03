



		<form id="frmTablaDatosinstrumento_pago" name="frmTablaDatosinstrumento_pago">
			<div id="divTablaDatosAuxiliarinstrumento_pagosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($instrumento_pagos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloinstrumento_pago" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Instrumento Pagos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosinstrumento_pagos" name="tblTablaDatosinstrumento_pagos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($instrumento_pagosLocal!=null && count($instrumento_pagosLocal)>0) { ?>
			<?php foreach ($instrumento_pagosLocal as $instrumento_pago) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($instrumento_pago->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$instrumento_pago->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($instrumento_pago->id) ?>
							</td>
							<td>
								<img class="imgseleccionarinstrumento_pago" idactualinstrumento_pago="<?php echo($instrumento_pago->id) ?>" title="SELECCIONAR Instrumento Pago ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($instrumento_pago->id) ?>
							</td>
							<td>
								<img class="imgeliminartablainstrumento_pago" idactualinstrumento_pago="<?php echo($instrumento_pago->id) ?>" title="ELIMINAR Instrumento Pago ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($instrumento_pago->i) ?>" name="t-id_<?php echo($instrumento_pago->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Instrumento Pago ACTUAL" value="<?php echo($instrumento_pago->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($instrumento_pago->i) ?>_0" name="t-cel_<?php echo($instrumento_pago->i) ?>_0" type="text" maxlength="25" value="<?php echo($instrumento_pago->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $instrumento_pago->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $instrumento_pago->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($instrumento_pago->i) ?>_3" name="t-cel_<?php echo($instrumento_pago->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="4"  maxlength="4" value="<?php echo($instrumento_pago->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($instrumento_pago->i) ?>_3" name="t-cel_<?php echo($instrumento_pago->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="4"  maxlength="4" value="<?php echo($instrumento_pago->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '
							<input id="t-cel_<?php echo($instrumento_pago->i) ?>_4" name="t-cel_<?php echo($instrumento_pago->i) ?>_4" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="50" value="<?php echo($instrumento_pago->descripcion) ?>" />
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '
							<input id="t-cel_<?php echo($instrumento_pago->i) ?>_4" name="t-cel_<?php echo($instrumento_pago->i) ?>_4" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="50" value="<?php echo($instrumento_pago->descripcion) ?>" />
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_predeterminado" >  '
							<input id="t-cel_<?php echo($instrumento_pago->i) ?>_5" name="t-cel_<?php echo($instrumento_pago->i) ?>_5" type="text" class="form-control"  placeholder="Predeterminado"  title="Predeterminado"    maxlength="10" size="10"  value="<?php echo($instrumento_pago->predeterminado) ?>" >
							<span id="spanstrMensajepredeterminado" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_cuenta_compras" ><?php echo($funciones->getComboBoxEditar($instrumento_pago->id_cuenta_compras_Descripcion,$instrumento_pago->id_cuenta_compras,'t-cel_'.$instrumento_pago->i.'_6')) ?></td>
				<td class="elementotabla col_id_cuenta_ventas" ><?php echo($funciones->getComboBoxEditar($instrumento_pago->id_cuenta_ventas_Descripcion,$instrumento_pago->id_cuenta_ventas,'t-cel_'.$instrumento_pago->i.'_7')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_cuenta_contable_compra" >  '
							<input id="t-cel_<?php echo($instrumento_pago->i) ?>_8" name="t-cel_<?php echo($instrumento_pago->i) ?>_8" type="text" class="form-control"  placeholder="Cuenta Contable Compra"  title="Cuenta Contable Compra"    size="20"  maxlength="20" value="<?php echo($instrumento_pago->cuenta_contable_compra) ?>" />
							<span id="spanstrMensajecuenta_contable_compra" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_cuenta_contable_compra" >  '
							<input id="t-cel_<?php echo($instrumento_pago->i) ?>_8" name="t-cel_<?php echo($instrumento_pago->i) ?>_8" type="text" class="form-control"  placeholder="Cuenta Contable Compra"  title="Cuenta Contable Compra"    size="20"  maxlength="20" value="<?php echo($instrumento_pago->cuenta_contable_compra) ?>" />
							<span id="spanstrMensajecuenta_contable_compra" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_cuenta_contable_ventas" >  '
							<input id="t-cel_<?php echo($instrumento_pago->i) ?>_9" name="t-cel_<?php echo($instrumento_pago->i) ?>_9" type="text" class="form-control"  placeholder="Cuenta Contable Ventas"  title="Cuenta Contable Ventas"    size="20"  maxlength="20" value="<?php echo($instrumento_pago->cuenta_contable_ventas) ?>" />
							<span id="spanstrMensajecuenta_contable_ventas" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_cuenta_contable_ventas" >  '
							<input id="t-cel_<?php echo($instrumento_pago->i) ?>_9" name="t-cel_<?php echo($instrumento_pago->i) ?>_9" type="text" class="form-control"  placeholder="Cuenta Contable Ventas"  title="Cuenta Contable Ventas"    size="20"  maxlength="20" value="<?php echo($instrumento_pago->cuenta_contable_ventas) ?>" />
							<span id="spanstrMensajecuenta_contable_ventas" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_cuenta_corriente" ><?php echo($funciones->getComboBoxEditar($instrumento_pago->id_cuenta_corriente_Descripcion,$instrumento_pago->id_cuenta_corriente,'t-cel_'.$instrumento_pago->i.'_10')) ?></td>

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



