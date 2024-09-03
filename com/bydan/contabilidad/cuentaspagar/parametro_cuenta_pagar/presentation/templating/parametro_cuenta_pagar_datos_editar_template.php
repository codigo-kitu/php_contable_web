



		<form id="frmTablaDatosparametro_cuenta_pagar" name="frmTablaDatosparametro_cuenta_pagar">
			<div id="divTablaDatosAuxiliarparametro_cuenta_pagarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_cuenta_pagars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_cuenta_pagar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Cuentas Pagars</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_cuenta_pagars" name="tblTablaDatosparametro_cuenta_pagars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Numero Cuenta Pagar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Credito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Debito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Anulado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Proveedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Proveedor Inactivo</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Numero Cuenta Pagar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Credito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Debito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Anulado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Proveedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Proveedor Inactivo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_cuenta_pagarsLocal!=null && count($parametro_cuenta_pagarsLocal)>0) { ?>
			<?php foreach ($parametro_cuenta_pagarsLocal as $parametro_cuenta_pagar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_cuenta_pagar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_cuenta_pagar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_cuenta_pagar->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_cuenta_pagar" idactualparametro_cuenta_pagar="<?php echo($parametro_cuenta_pagar->id) ?>" title="SELECCIONAR Parametro Cuentas Pagar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($parametro_cuenta_pagar->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaparametro_cuenta_pagar" idactualparametro_cuenta_pagar="<?php echo($parametro_cuenta_pagar->id) ?>" title="ELIMINAR Parametro Cuentas Pagar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($parametro_cuenta_pagar->i) ?>" name="t-id_<?php echo($parametro_cuenta_pagar->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro Cuentas Pagar ACTUAL" value="<?php echo($parametro_cuenta_pagar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_0" name="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_cuenta_pagar->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $parametro_cuenta_pagar->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $parametro_cuenta_pagar->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($parametro_cuenta_pagar->id_empresa_Descripcion,$parametro_cuenta_pagar->id_empresa,'t-cel_'.$parametro_cuenta_pagar->i.'_3')) ?></td>
				<?php } ?>
				
						<td class="elementotabla col_numero_cuenta_pagar" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_4" name="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_4" type="text" class="form-control"  placeholder="Numero Cuenta Pagar"  title="Numero Cuenta Pagar"    maxlength="19" size="10"  value="<?php echo($parametro_cuenta_pagar->numero_cuenta_pagar) ?>" >
							<span id="spanstrMensajenumero_cuenta_pagar" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_credito" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_5" name="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_5" type="text" class="form-control"  placeholder="Numero Credito"  title="Numero Credito"    maxlength="19" size="10"  value="<?php echo($parametro_cuenta_pagar->numero_credito) ?>" >
							<span id="spanstrMensajenumero_credito" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_debito" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_6" name="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_6" type="text" class="form-control"  placeholder="Numero Debito"  title="Numero Debito"    maxlength="19" size="10"  value="<?php echo($parametro_cuenta_pagar->numero_debito) ?>" >
							<span id="spanstrMensajenumero_debito" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_pago" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_7" name="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_7" type="text" class="form-control"  placeholder="Numero Pago"  title="Numero Pago"    maxlength="19" size="10"  value="<?php echo($parametro_cuenta_pagar->numero_pago) ?>" >
							<span id="spanstrMensajenumero_pago" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_mostrar_anulado" ><?php  $funciones->getCheckBoxEditar($parametro_cuenta_pagar->mostrar_anulado,'t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_8',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_numero_proveedor" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_9" name="t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_9" type="text" class="form-control"  placeholder="Numero Proveedor"  title="Numero Proveedor"    maxlength="19" size="10"  value="<?php echo($parametro_cuenta_pagar->numero_proveedor) ?>" >
							<span id="spanstrMensajenumero_proveedor" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_proveedor_inactivo" ><?php  $funciones->getCheckBoxEditar($parametro_cuenta_pagar->con_proveedor_inactivo,'t-cel_<?php echo($parametro_cuenta_pagar->i) ?>_10',$paraReporte)  ?>
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



