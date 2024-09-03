



		<form id="frmTablaDatostermino_pago_proveedor" name="frmTablaDatostermino_pago_proveedor">
			<div id="divTablaDatosAuxiliartermino_pago_proveedorsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($termino_pago_proveedors)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulotermino_pago_proveedor" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Terminos Pago Proveedoreses</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatostermino_pago_proveedors" name="tblTablaDatostermino_pago_proveedors" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Termino Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Inicial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuotas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Pronto Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Cotizaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Credito Cuenta Pagars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Pagars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devoluciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Inventarios</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Termino Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Inicial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuotas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Pronto Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Cotizaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Credito Cuenta Pagars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Pagars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devoluciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Inventarios</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($termino_pago_proveedorsLocal!=null && count($termino_pago_proveedorsLocal)>0) { ?>
			<?php foreach ($termino_pago_proveedorsLocal as $termino_pago_proveedor) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($termino_pago_proveedor->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$termino_pago_proveedor->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($termino_pago_proveedor->id) ?>
							</td>
							<td>
								<img class="imgseleccionartermino_pago_proveedor" idactualtermino_pago_proveedor="<?php echo($termino_pago_proveedor->id) ?>" title="SELECCIONAR Terminos Pago Proveedores ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($termino_pago_proveedor->id) ?>
							</td>
							<td>
								<img class="imgeliminartablatermino_pago_proveedor" idactualtermino_pago_proveedor="<?php echo($termino_pago_proveedor->id) ?>" title="ELIMINAR Terminos Pago Proveedores ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($termino_pago_proveedor->i) ?>" name="t-id_<?php echo($termino_pago_proveedor->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Terminos Pago Proveedores ACTUAL" value="<?php echo($termino_pago_proveedor->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($termino_pago_proveedor->i) ?>_0" name="t-cel_<?php echo($termino_pago_proveedor->i) ?>_0" type="text" maxlength="25" value="<?php echo($termino_pago_proveedor->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($termino_pago_proveedor->id) ?><img class="imgseleccionarmostraraccionesrelacionestermino_pago_proveedor" idactualtermino_pago_proveedor="<?php echo($termino_pago_proveedor->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $termino_pago_proveedor->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $termino_pago_proveedor->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($termino_pago_proveedor->id_empresa_Descripcion,$termino_pago_proveedor->id_empresa,'t-cel_'.$termino_pago_proveedor->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_tipo_termino_pago" ><?php echo($funciones->getComboBoxEditar($termino_pago_proveedor->id_tipo_termino_pago_Descripcion,$termino_pago_proveedor->id_tipo_termino_pago,'t-cel_'.$termino_pago_proveedor->i.'_4')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($termino_pago_proveedor->i) ?>_5" name="t-cel_<?php echo($termino_pago_proveedor->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="4"  maxlength="4" value="<?php echo($termino_pago_proveedor->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($termino_pago_proveedor->i) ?>_5" name="t-cel_<?php echo($termino_pago_proveedor->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="4"  maxlength="4" value="<?php echo($termino_pago_proveedor->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '
							<input id="t-cel_<?php echo($termino_pago_proveedor->i) ?>_6" name="t-cel_<?php echo($termino_pago_proveedor->i) ?>_6" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="40" value="<?php echo($termino_pago_proveedor->descripcion) ?>" />
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '
							<input id="t-cel_<?php echo($termino_pago_proveedor->i) ?>_6" name="t-cel_<?php echo($termino_pago_proveedor->i) ?>_6" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="40" value="<?php echo($termino_pago_proveedor->descripcion) ?>" />
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_monto" >  '
							<input id="t-cel_<?php echo($termino_pago_proveedor->i) ?>_7" name="t-cel_<?php echo($termino_pago_proveedor->i) ?>_7" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12"  value="<?php echo($termino_pago_proveedor->monto) ?>" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_dias" >  '
							<input id="t-cel_<?php echo($termino_pago_proveedor->i) ?>_8" name="t-cel_<?php echo($termino_pago_proveedor->i) ?>_8" type="text" class="form-control"  placeholder="Dias"  title="Dias"    maxlength="10" size="10"  value="<?php echo($termino_pago_proveedor->dias) ?>" >
							<span id="spanstrMensajedias" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_inicial" >  '
							<input id="t-cel_<?php echo($termino_pago_proveedor->i) ?>_9" name="t-cel_<?php echo($termino_pago_proveedor->i) ?>_9" type="text" class="form-control"  placeholder="Inicial"  title="Inicial"    maxlength="18" size="12"  value="<?php echo($termino_pago_proveedor->inicial) ?>" >
							<span id="spanstrMensajeinicial" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_cuotas" >  '
							<input id="t-cel_<?php echo($termino_pago_proveedor->i) ?>_10" name="t-cel_<?php echo($termino_pago_proveedor->i) ?>_10" type="text" class="form-control"  placeholder="Cuotas"  title="Cuotas"    maxlength="10" size="10"  value="<?php echo($termino_pago_proveedor->cuotas) ?>" >
							<span id="spanstrMensajecuotas" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_descuento_pronto_pago" >  '
							<input id="t-cel_<?php echo($termino_pago_proveedor->i) ?>_11" name="t-cel_<?php echo($termino_pago_proveedor->i) ?>_11" type="text" class="form-control"  placeholder="Descuento Pronto Pago"  title="Descuento Pronto Pago"    maxlength="18" size="12"  value="<?php echo($termino_pago_proveedor->descuento_pronto_pago) ?>" >
							<span id="spanstrMensajedescuento_pronto_pago" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_predeterminado" ><?php  $funciones->getCheckBoxEditar($termino_pago_proveedor->predeterminado,'t-cel_<?php echo($termino_pago_proveedor->i) ?>_12',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_cuenta" ><?php echo($funciones->getComboBoxEditar($termino_pago_proveedor->id_cuenta_Descripcion,$termino_pago_proveedor->id_cuenta,'t-cel_'.$termino_pago_proveedor->i.'_13')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_proveedor->id) ?>
							<img class="imgrelacioncotizacion" idactualtermino_pago_proveedor="<?php echo($termino_pago_proveedor->id) ?>" title="CotizacionS DE Terminos Pago Proveedores" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cotizacions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_proveedor->id) ?>
							<img class="imgrelacioncredito_cuenta_pagar" idactualtermino_pago_proveedor="<?php echo($termino_pago_proveedor->id) ?>" title="Credito Cuenta PagarS DE Terminos Pago Proveedores" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/credito_cuenta_pagars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_proveedor->id) ?>
							<img class="imgrelacioncuenta_pagar" idactualtermino_pago_proveedor="<?php echo($termino_pago_proveedor->id) ?>" title="Cuenta PagarS DE Terminos Pago Proveedores" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cuenta_pagars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_proveedor->id) ?>
							<img class="imgrelaciondevolucion" idactualtermino_pago_proveedor="<?php echo($termino_pago_proveedor->id) ?>" title="DevolucionS DE Terminos Pago Proveedores" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/devolucions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_proveedor->id) ?>
							<img class="imgrelacionorden_compra" idactualtermino_pago_proveedor="<?php echo($termino_pago_proveedor->id) ?>" title="Orden CompraS DE Terminos Pago Proveedores" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/orden_compras.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_proveedor->id) ?>
							<img class="imgrelacionparametro_inventario" idactualtermino_pago_proveedor="<?php echo($termino_pago_proveedor->id) ?>" title="Parametro InventarioS DE Terminos Pago Proveedores" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/parametro_inventarios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_proveedor->id) ?>
							<img class="imgrelacionproveedor" idactualtermino_pago_proveedor="<?php echo($termino_pago_proveedor->id) ?>" title="ProveedorS DE Terminos Pago Proveedores" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
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



