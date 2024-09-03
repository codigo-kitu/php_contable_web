



		<form id="frmTablaDatosconsignacion" name="frmTablaDatosconsignacion">
			<div id="divTablaDatosAuxiliarconsignacionsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($consignacions)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloconsignacion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Consignaciones</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosconsignacions" name="tblTablaDatosconsignacions" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Genero Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva.(*)</pre>
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

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Genero Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva.(*)</pre>
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

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($consignacionsLocal!=null && count($consignacionsLocal)>0) { ?>
			<?php foreach ($consignacionsLocal as $consignacion) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($consignacion->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$consignacion->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($consignacion->id) ?>
							</td>
							<td>
								<img class="imgseleccionarconsignacion" idactualconsignacion="<?php echo($consignacion->id) ?>" title="SELECCIONAR Consignacion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($consignacion->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaconsignacion" idactualconsignacion="<?php echo($consignacion->id) ?>" title="ELIMINAR Consignacion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($consignacion->i) ?>" name="t-id_<?php echo($consignacion->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Consignacion ACTUAL" value="<?php echo($consignacion->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($consignacion->i) ?>_0" name="t-cel_<?php echo($consignacion->i) ?>_0" type="text" maxlength="25" value="<?php echo($consignacion->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($consignacion->id) ?><img class="imgseleccionarmostraraccionesrelacionesconsignacion" idactualconsignacion="<?php echo($consignacion->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $consignacion->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $consignacion->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($consignacion->id_empresa_Descripcion,$consignacion->id_empresa,'t-cel_'.$consignacion->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_sucursal" ><?php echo($funciones->getComboBoxEditar($consignacion->id_sucursal_Descripcion,$consignacion->id_sucursal,'t-cel_'.$consignacion->i.'_4')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($consignacion->id_ejercicio_Descripcion,$consignacion->id_ejercicio,'t-cel_'.$consignacion->i.'_5')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($consignacion->id_periodo_Descripcion,$consignacion->id_periodo,'t-cel_'.$consignacion->i.'_6')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($consignacion->id_usuario_Descripcion,$consignacion->id_usuario,'t-cel_'.$consignacion->i.'_7')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_8" name="t-cel_<?php echo($consignacion->i) ?>_8" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="10"  maxlength="10" value="<?php echo($consignacion->numero) ?>" />
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_8" name="t-cel_<?php echo($consignacion->i) ?>_8" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="10"  maxlength="10" value="<?php echo($consignacion->numero) ?>" />
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_cliente" ><?php echo($funciones->getComboBoxEditar($consignacion->id_cliente_Descripcion,$consignacion->id_cliente,'t-cel_'.$consignacion->i.'_9')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_ruc" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_10" name="t-cel_<?php echo($consignacion->i) ?>_10" type="text" class="form-control"  placeholder="Ruc"  title="Ruc"    size="20"  maxlength="20" value="<?php echo($consignacion->ruc) ?>" />
							<span id="spanstrMensajeruc" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_ruc" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_10" name="t-cel_<?php echo($consignacion->i) ?>_10" type="text" class="form-control"  placeholder="Ruc"  title="Ruc"    size="20"  maxlength="20" value="<?php echo($consignacion->ruc) ?>" />
							<span id="spanstrMensajeruc" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_referencia_cliente" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_11" name="t-cel_<?php echo($consignacion->i) ?>_11" type="text" class="form-control"  placeholder="Referencia Cliente"  title="Referencia Cliente"    size="20"  maxlength="20" value="<?php echo($consignacion->referencia_cliente) ?>" />
							<span id="spanstrMensajereferencia_cliente" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_referencia_cliente" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_11" name="t-cel_<?php echo($consignacion->i) ?>_11" type="text" class="form-control"  placeholder="Referencia Cliente"  title="Referencia Cliente"    size="20"  maxlength="20" value="<?php echo($consignacion->referencia_cliente) ?>" />
							<span id="spanstrMensajereferencia_cliente" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_emision" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_12" name="t-cel_<?php echo($consignacion->i) ?>_12" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10"  value="<?php echo($consignacion->fecha_emision) ?>" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_vendedor" ><?php echo($funciones->getComboBoxEditar($consignacion->id_vendedor_Descripcion,$consignacion->id_vendedor,'t-cel_'.$consignacion->i.'_13')) ?></td>
				<td class="elementotabla col_id_termino_pago_cliente" ><?php echo($funciones->getComboBoxEditar($consignacion->id_termino_pago_cliente_Descripcion,$consignacion->id_termino_pago_cliente,'t-cel_'.$consignacion->i.'_14')) ?></td>
				
						<td class="elementotabla col_fecha_vence" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_15" name="t-cel_<?php echo($consignacion->i) ?>_15" type="text" class="form-control"  placeholder="Fecha Vence"  title="Fecha Vence"    size="10"  value="<?php echo($consignacion->fecha_vence) ?>" >
							<span id="spanstrMensajefecha_vence" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_moneda" ><?php echo($funciones->getComboBoxEditar($consignacion->id_moneda_Descripcion,$consignacion->id_moneda,'t-cel_'.$consignacion->i.'_16')) ?></td>
				
						<td class="elementotabla col_cotizacion" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_17" name="t-cel_<?php echo($consignacion->i) ?>_17" type="text" class="form-control"  placeholder="Cotizacion"  title="Cotizacion"    maxlength="18" size="12"  value="<?php echo($consignacion->cotizacion) ?>" >
							<span id="spanstrMensajecotizacion" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion" >  '<textarea id="t-cel_<?php echo($consignacion->i) ?>_18" name="t-cel_<?php echo($consignacion->i) ?>_18" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($consignacion->direccion) ?></textarea>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion" >  '<input type="text" maxlength="250"  id="t-cel_<?php echo($consignacion->i) ?>_18" name="t-cel_<?php echo($consignacion->i) ?>_18" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($consignacion->direccion) ?></input>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_enviar_a" >  '<textarea id="t-cel_<?php echo($consignacion->i) ?>_19" name="t-cel_<?php echo($consignacion->i) ?>_19" class="form-control"  placeholder="Enviar a"  title="Enviar a"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($consignacion->enviar_a) ?></textarea>
							<span id="spanstrMensajeenviar_a" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_enviar_a" >  '<input type="text" maxlength="250"  id="t-cel_<?php echo($consignacion->i) ?>_19" name="t-cel_<?php echo($consignacion->i) ?>_19" class="form-control"  placeholder="Enviar a"  title="Enviar a"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($consignacion->enviar_a) ?></input>
							<span id="spanstrMensajeenviar_a" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_observacion" >  '<textarea id="t-cel_<?php echo($consignacion->i) ?>_20" name="t-cel_<?php echo($consignacion->i) ?>_20" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($consignacion->observacion) ?></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_observacion" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($consignacion->i) ?>_20" name="t-cel_<?php echo($consignacion->i) ?>_20" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($consignacion->observacion) ?></input>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_impuesto_en_precio" ><?php  $funciones->getCheckBoxEditar($consignacion->impuesto_en_precio,'t-cel_<?php echo($consignacion->i) ?>_21',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_genero_factura" ><?php  $funciones->getCheckBoxEditar($consignacion->genero_factura,'t-cel_<?php echo($consignacion->i) ?>_22',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_estado" ><?php echo($funciones->getComboBoxEditar($consignacion->id_estado_Descripcion,$consignacion->id_estado,'t-cel_'.$consignacion->i.'_23')) ?></td>
				
						<td class="elementotabla col_sub_total" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_24" name="t-cel_<?php echo($consignacion->i) ?>_24" type="text" class="form-control"  placeholder="Sub Total"  title="Sub Total"    maxlength="18" size="12"  value="<?php echo($consignacion->sub_total) ?>" >
							<span id="spanstrMensajesub_total" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_descuento_monto" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_25" name="t-cel_<?php echo($consignacion->i) ?>_25" type="text" class="form-control"  placeholder="Descto"  title="Descto"    maxlength="18" size="12"  value="<?php echo($consignacion->descuento_monto) ?>" >
							<span id="spanstrMensajedescuento_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_descuento_porciento" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_26" name="t-cel_<?php echo($consignacion->i) ?>_26" type="text" class="form-control"  placeholder="Descto %"  title="Descto %"    maxlength="18" size="12"  value="<?php echo($consignacion->descuento_porciento) ?>" >
							<span id="spanstrMensajedescuento_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_iva_monto" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_27" name="t-cel_<?php echo($consignacion->i) ?>_27" type="text" class="form-control"  placeholder="Iva"  title="Iva"    maxlength="18" size="12"  value="<?php echo($consignacion->iva_monto) ?>" >
							<span id="spanstrMensajeiva_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_iva_porciento" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_28" name="t-cel_<?php echo($consignacion->i) ?>_28" type="text" class="form-control"  placeholder="Iva %"  title="Iva %"    maxlength="18" size="12"  value="<?php echo($consignacion->iva_porciento) ?>" >
							<span id="spanstrMensajeiva_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_retencion_fuente_monto" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_29" name="t-cel_<?php echo($consignacion->i) ?>_29" type="text" class="form-control"  placeholder="Ret.Fuente"  title="Ret.Fuente"    maxlength="18" size="12"  value="<?php echo($consignacion->retencion_fuente_monto) ?>" >
							<span id="spanstrMensajeretencion_fuente_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_retencion_fuente_porciento" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_30" name="t-cel_<?php echo($consignacion->i) ?>_30" type="text" class="form-control"  placeholder="Ret.Fuente %"  title="Ret.Fuente %"    maxlength="18" size="12"  value="<?php echo($consignacion->retencion_fuente_porciento) ?>" >
							<span id="spanstrMensajeretencion_fuente_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_retencion_iva_monto" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_31" name="t-cel_<?php echo($consignacion->i) ?>_31" type="text" class="form-control"  placeholder="Ret.Iva"  title="Ret.Iva"    maxlength="18" size="12"  value="<?php echo($consignacion->retencion_iva_monto) ?>" >
							<span id="spanstrMensajeretencion_iva_monto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_retencion_iva_porciento" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_32" name="t-cel_<?php echo($consignacion->i) ?>_32" type="text" class="form-control"  placeholder="Ret.Iva %"  title="Ret.Iva %"    maxlength="18" size="12"  value="<?php echo($consignacion->retencion_iva_porciento) ?>" >
							<span id="spanstrMensajeretencion_iva_porciento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_total" >  '
							<input id="t-cel_<?php echo($consignacion->i) ?>_33" name="t-cel_<?php echo($consignacion->i) ?>_33" type="text" class="form-control"  placeholder="Total"  title="Total"    maxlength="18" size="12"  value="<?php echo($consignacion->total) ?>" >
							<span id="spanstrMensajetotal" class="mensajeerror"></span>' 
						</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($consignacion->id) ?>
							<img class="imgrelacionconsignacion_detalle" idactualconsignacion="<?php echo($consignacion->id) ?>" title="Consignacion DetalleS DE Consignacion" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/consignacion_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($consignacion->id) ?>
							<img class="imgrelacionimagen_consignacion" idactualconsignacion="<?php echo($consignacion->id) ?>" title="Imagenes ConsignacionS DE Consignacion" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/imagen_consignacions.gif" alt="Seleccionar" border="" height="15" width="15">
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



