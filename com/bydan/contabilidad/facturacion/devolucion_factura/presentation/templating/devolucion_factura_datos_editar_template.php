



		<form id="frmTablaDatosdevolucion_factura" name="frmTablaDatosdevolucion_factura">
			<div id="divTablaDatosAuxiliardevolucion_facturasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($devolucion_facturas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulodevolucion_factura" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Devolucion Facturas</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosdevolucion_facturas" name="tblTablaDatosdevolucion_facturas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($devolucion_facturasLocal!=null && count($devolucion_facturasLocal)>0) { ?>
			<?php foreach ($devolucion_facturasLocal as $devolucion_factura) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($devolucion_factura->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$devolucion_factura->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($devolucion_factura->id) ?>
							</td>
							<td>
								<img class="imgseleccionardevolucion_factura" idactualdevolucion_factura="<?php echo($devolucion_factura->id) ?>" title="SELECCIONAR Devolucion Factura ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($devolucion_factura->id) ?>
							</td>
							<td>
								<img class="imgeliminartabladevolucion_factura" idactualdevolucion_factura="<?php echo($devolucion_factura->id) ?>" title="ELIMINAR Devolucion Factura ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($devolucion_factura->i) ?>" name="t-id_<?php echo($devolucion_factura->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Devolucion Factura ACTUAL" value="<?php echo($devolucion_factura->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($devolucion_factura->i) ?>_0" name="t-cel_<?php echo($devolucion_factura->i) ?>_0" type="text" maxlength="25" value="<?php echo($devolucion_factura->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($devolucion_factura->id) ?><img class="imgseleccionarmostraraccionesrelacionesdevolucion_factura" idactualdevolucion_factura="<?php echo($devolucion_factura->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $devolucion_factura->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $devolucion_factura->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($devolucion_factura->id_empresa_Descripcion,$devolucion_factura->id_empresa,'t-cel_'.$devolucion_factura->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_sucursal" ><?php echo($funciones->getComboBoxEditar($devolucion_factura->id_sucursal_Descripcion,$devolucion_factura->id_sucursal,'t-cel_'.$devolucion_factura->i.'_4')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($devolucion_factura->id_ejercicio_Descripcion,$devolucion_factura->id_ejercicio,'t-cel_'.$devolucion_factura->i.'_5')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($devolucion_factura->id_periodo_Descripcion,$devolucion_factura->id_periodo,'t-cel_'.$devolucion_factura->i.'_6')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($devolucion_factura->id_usuario_Descripcion,$devolucion_factura->id_usuario,'t-cel_'.$devolucion_factura->i.'_7')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_8" name="t-cel_<?php echo($devolucion_factura->i) ?>_8" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="10"  maxlength="10" value="<?php echo($devolucion_factura->numero) ?>" />
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_8" name="t-cel_<?php echo($devolucion_factura->i) ?>_8" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="10"  maxlength="10" value="<?php echo($devolucion_factura->numero) ?>" />
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_cliente" ><?php echo($funciones->getComboBoxEditar($devolucion_factura->id_cliente_Descripcion,$devolucion_factura->id_cliente,'t-cel_'.$devolucion_factura->i.'_9')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_ruc" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_10" name="t-cel_<?php echo($devolucion_factura->i) ?>_10" type="text" class="form-control"  placeholder="Ruc"  title="Ruc"    size="20"  maxlength="20" value="<?php echo($devolucion_factura->ruc) ?>" />
							<span id="spanstrMensajeruc" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_ruc" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_10" name="t-cel_<?php echo($devolucion_factura->i) ?>_10" type="text" class="form-control"  placeholder="Ruc"  title="Ruc"    size="20"  maxlength="20" value="<?php echo($devolucion_factura->ruc) ?>" />
							<span id="spanstrMensajeruc" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_referencia_cliente" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_11" name="t-cel_<?php echo($devolucion_factura->i) ?>_11" type="text" class="form-control"  placeholder="Referencia Cliente"  title="Referencia Cliente"    size="20"  maxlength="20" value="<?php echo($devolucion_factura->referencia_cliente) ?>" />
							<span id="spanstrMensajereferencia_cliente" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_referencia_cliente" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_11" name="t-cel_<?php echo($devolucion_factura->i) ?>_11" type="text" class="form-control"  placeholder="Referencia Cliente"  title="Referencia Cliente"    size="20"  maxlength="20" value="<?php echo($devolucion_factura->referencia_cliente) ?>" />
							<span id="spanstrMensajereferencia_cliente" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_emision" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_12" name="t-cel_<?php echo($devolucion_factura->i) ?>_12" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10"  value="<?php echo($devolucion_factura->fecha_emision) ?>" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_vendedor" ><?php echo($funciones->getComboBoxEditar($devolucion_factura->id_vendedor_Descripcion,$devolucion_factura->id_vendedor,'t-cel_'.$devolucion_factura->i.'_13')) ?></td>
				<td class="elementotabla col_id_termino_pago_cliente" ><?php echo($funciones->getComboBoxEditar($devolucion_factura->id_termino_pago_cliente_Descripcion,$devolucion_factura->id_termino_pago_cliente,'t-cel_'.$devolucion_factura->i.'_14')) ?></td>
				
						<td class="elementotabla col_fecha_vence" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_15" name="t-cel_<?php echo($devolucion_factura->i) ?>_15" type="text" class="form-control"  placeholder="Fecha Vence"  title="Fecha Vence"    size="10"  value="<?php echo($devolucion_factura->fecha_vence) ?>" >
							<span id="spanstrMensajefecha_vence" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_moneda" ><?php echo($funciones->getComboBoxEditar($devolucion_factura->id_moneda_Descripcion,$devolucion_factura->id_moneda,'t-cel_'.$devolucion_factura->i.'_16')) ?></td>
				
						<td class="elementotabla col_cotizacion" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_17" name="t-cel_<?php echo($devolucion_factura->i) ?>_17" type="text" class="form-control"  placeholder="Cotizacion"  title="Cotizacion"    maxlength="18" size="12"  value="<?php echo($devolucion_factura->cotizacion) ?>" >
							<span id="spanstrMensajecotizacion" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_estado" ><?php echo($funciones->getComboBoxEditar($devolucion_factura->id_estado_Descripcion,$devolucion_factura->id_estado,'t-cel_'.$devolucion_factura->i.'_18')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion" >  '<textarea id="t-cel_<?php echo($devolucion_factura->i) ?>_19" name="t-cel_<?php echo($devolucion_factura->i) ?>_19" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($devolucion_factura->direccion) ?></textarea>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion" >  '<input type="text" maxlength="250"  id="t-cel_<?php echo($devolucion_factura->i) ?>_19" name="t-cel_<?php echo($devolucion_factura->i) ?>_19" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($devolucion_factura->direccion) ?></input>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_enviar_a" >  '<textarea id="t-cel_<?php echo($devolucion_factura->i) ?>_20" name="t-cel_<?php echo($devolucion_factura->i) ?>_20" class="form-control"  placeholder="Enviar a"  title="Enviar a"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($devolucion_factura->enviar_a) ?></textarea>
							<span id="spanstrMensajeenviar_a" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_enviar_a" >  '<input type="text" maxlength="250"  id="t-cel_<?php echo($devolucion_factura->i) ?>_20" name="t-cel_<?php echo($devolucion_factura->i) ?>_20" class="form-control"  placeholder="Enviar a"  title="Enviar a"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($devolucion_factura->enviar_a) ?></input>
							<span id="spanstrMensajeenviar_a" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_observacion" >  '<textarea id="t-cel_<?php echo($devolucion_factura->i) ?>_21" name="t-cel_<?php echo($devolucion_factura->i) ?>_21" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($devolucion_factura->observacion) ?></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_observacion" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($devolucion_factura->i) ?>_21" name="t-cel_<?php echo($devolucion_factura->i) ?>_21" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($devolucion_factura->observacion) ?></input>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_impuesto_en_precio" ><?php  $funciones->getCheckBoxEditar($devolucion_factura->impuesto_en_precio,'t-cel_<?php echo($devolucion_factura->i) ?>_22',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_sub_total" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_23" name="t-cel_<?php echo($devolucion_factura->i) ?>_23" type="text" class="form-control"  placeholder="Sub Total"  title="Sub Total"    maxlength="18" size="12"  value="<?php echo($devolucion_factura->sub_total) ?>" >
							<span id="spanstrMensajesub_total" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_descuento_monto" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_24" name="t-cel_<?php echo($devolucion_factura->i) ?>_24" type="text" class="form-control"  placeholder="Descuento Monto"  title="Descuento Monto"    maxlength="18" size="12"  value="<?php echo($devolucion_factura->descuento_monto) ?>" >
							<span id="spanstrMensajedescuento_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_descuento_porciento" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_25" name="t-cel_<?php echo($devolucion_factura->i) ?>_25" type="text" class="form-control"  placeholder="Descuento %"  title="Descuento %"    maxlength="18" size="12"  value="<?php echo($devolucion_factura->descuento_porciento) ?>" >
							<span id="spanstrMensajedescuento_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_iva_monto" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_26" name="t-cel_<?php echo($devolucion_factura->i) ?>_26" type="text" class="form-control"  placeholder="Iva"  title="Iva"    maxlength="18" size="12"  value="<?php echo($devolucion_factura->iva_monto) ?>" >
							<span id="spanstrMensajeiva_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_iva_porciento" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_27" name="t-cel_<?php echo($devolucion_factura->i) ?>_27" type="text" class="form-control"  placeholder="Iva %"  title="Iva %"    maxlength="18" size="12"  value="<?php echo($devolucion_factura->iva_porciento) ?>" >
							<span id="spanstrMensajeiva_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_retencion_fuente_monto" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_28" name="t-cel_<?php echo($devolucion_factura->i) ?>_28" type="text" class="form-control"  placeholder="Ret.Fuente Monto"  title="Ret.Fuente Monto"    maxlength="18" size="12"  value="<?php echo($devolucion_factura->retencion_fuente_monto) ?>" >
							<span id="spanstrMensajeretencion_fuente_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_retencion_fuente_porciento" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_29" name="t-cel_<?php echo($devolucion_factura->i) ?>_29" type="text" class="form-control"  placeholder="Ret.Fuente %"  title="Ret.Fuente %"    maxlength="18" size="12"  value="<?php echo($devolucion_factura->retencion_fuente_porciento) ?>" >
							<span id="spanstrMensajeretencion_fuente_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_retencion_iva_monto" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_30" name="t-cel_<?php echo($devolucion_factura->i) ?>_30" type="text" class="form-control"  placeholder="Ret.Iva Monto"  title="Ret.Iva Monto"    maxlength="18" size="12"  value="<?php echo($devolucion_factura->retencion_iva_monto) ?>" >
							<span id="spanstrMensajeretencion_iva_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_retencion_iva_porciento" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_31" name="t-cel_<?php echo($devolucion_factura->i) ?>_31" type="text" class="form-control"  placeholder="Ret.Iva %"  title="Ret.Iva %"    maxlength="18" size="12"  value="<?php echo($devolucion_factura->retencion_iva_porciento) ?>" >
							<span id="spanstrMensajeretencion_iva_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_total" >  '
							<input id="t-cel_<?php echo($devolucion_factura->i) ?>_32" name="t-cel_<?php echo($devolucion_factura->i) ?>_32" type="text" class="form-control"  placeholder="Total"  title="Total"    maxlength="18" size="12"  value="<?php echo($devolucion_factura->total) ?>" >
							<span id="spanstrMensajetotal" class="mensajeerror"></span>' 
						</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($devolucion_factura->id) ?>
							<img class="imgrelaciondevolucion_factura_detalle" idactualdevolucion_factura="<?php echo($devolucion_factura->id) ?>" title="Devolucion Factura DetalleS DE Devolucion Factura" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/devolucion_factura_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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



