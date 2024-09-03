



		<form id="frmTablaDatoscuenta_cobrar" name="frmTablaDatoscuenta_cobrar">
			<div id="divTablaDatosAuxiliarcuenta_cobrarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($cuenta_cobrars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocuenta_cobrar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cuenta Cobrars</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscuenta_cobrars" name="tblTablaDatoscuenta_cobrars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Empresa.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Mov..(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Termino Pago Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">%.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado Cuentas Cobrar.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Credito s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Debito s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Pago s</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla"> Empresa.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Mov..(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Termino Pago Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">%.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado Cuentas Cobrar.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Credito s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Debito s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Pago s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($cuenta_cobrarsLocal!=null && count($cuenta_cobrarsLocal)>0) { ?>
			<?php foreach ($cuenta_cobrarsLocal as $cuenta_cobrar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cuenta_cobrar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cuenta_cobrar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cuenta_cobrar->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcuenta_cobrar" idactualcuenta_cobrar="<?php echo($cuenta_cobrar->id) ?>" title="SELECCIONAR Cuenta Cobrar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($cuenta_cobrar->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacuenta_cobrar" idactualcuenta_cobrar="<?php echo($cuenta_cobrar->id) ?>" title="ELIMINAR Cuenta Cobrar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($cuenta_cobrar->i) ?>" name="t-id_<?php echo($cuenta_cobrar->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cuenta Cobrar ACTUAL" value="<?php echo($cuenta_cobrar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($cuenta_cobrar->i) ?>_0" name="t-cel_<?php echo($cuenta_cobrar->i) ?>_0" type="text" maxlength="25" value="<?php echo($cuenta_cobrar->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($cuenta_cobrar->id) ?><img class="imgseleccionarmostraraccionesrelacionescuenta_cobrar" idactualcuenta_cobrar="<?php echo($cuenta_cobrar->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $cuenta_cobrar->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $cuenta_cobrar->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($cuenta_cobrar->id_empresa_Descripcion,$cuenta_cobrar->id_empresa,'t-cel_'.$cuenta_cobrar->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_sucursal" ><?php echo($funciones->getComboBoxEditar($cuenta_cobrar->id_sucursal_Descripcion,$cuenta_cobrar->id_sucursal,'t-cel_'.$cuenta_cobrar->i.'_4')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($cuenta_cobrar->id_ejercicio_Descripcion,$cuenta_cobrar->id_ejercicio,'t-cel_'.$cuenta_cobrar->i.'_5')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($cuenta_cobrar->id_periodo_Descripcion,$cuenta_cobrar->id_periodo,'t-cel_'.$cuenta_cobrar->i.'_6')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($cuenta_cobrar->id_usuario_Descripcion,$cuenta_cobrar->id_usuario,'t-cel_'.$cuenta_cobrar->i.'_7')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_factura" ><?php echo($funciones->getComboBoxEditar($cuenta_cobrar->id_factura_Descripcion,$cuenta_cobrar->id_factura,'t-cel_'.$cuenta_cobrar->i.'_8')) ?></td>
				<td class="elementotabla col_id_cliente" ><?php echo($funciones->getComboBoxEditar($cuenta_cobrar->id_cliente_Descripcion,$cuenta_cobrar->id_cliente,'t-cel_'.$cuenta_cobrar->i.'_9')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero" >  '
							<input id="t-cel_<?php echo($cuenta_cobrar->i) ?>_10" name="t-cel_<?php echo($cuenta_cobrar->i) ?>_10" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="12"  maxlength="12" value="<?php echo($cuenta_cobrar->numero) ?>" />
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero" >  '
							<input id="t-cel_<?php echo($cuenta_cobrar->i) ?>_10" name="t-cel_<?php echo($cuenta_cobrar->i) ?>_10" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="12"  maxlength="12" value="<?php echo($cuenta_cobrar->numero) ?>" />
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_emision" >  '
							<input id="t-cel_<?php echo($cuenta_cobrar->i) ?>_11" name="t-cel_<?php echo($cuenta_cobrar->i) ?>_11" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10"  value="<?php echo($cuenta_cobrar->fecha_emision) ?>" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_vence" >  '
							<input id="t-cel_<?php echo($cuenta_cobrar->i) ?>_12" name="t-cel_<?php echo($cuenta_cobrar->i) ?>_12" type="text" class="form-control"  placeholder="Fecha Vence"  title="Fecha Vence"    size="10"  value="<?php echo($cuenta_cobrar->fecha_vence) ?>" >
							<span id="spanstrMensajefecha_vence" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_ultimo_movimiento" >  '
							<input id="t-cel_<?php echo($cuenta_cobrar->i) ?>_13" name="t-cel_<?php echo($cuenta_cobrar->i) ?>_13" type="text" class="form-control"  placeholder="Fecha Ultimo Mov."  title="Fecha Ultimo Mov."    size="10"  value="<?php echo($cuenta_cobrar->fecha_ultimo_movimiento) ?>"  readonly="readonly">
							<span id="spanstrMensajefecha_ultimo_movimiento" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_termino_pago_cliente" ><?php echo($funciones->getComboBoxEditar($cuenta_cobrar->id_termino_pago_cliente_Descripcion,$cuenta_cobrar->id_termino_pago_cliente,'t-cel_'.$cuenta_cobrar->i.'_14')) ?></td>
				
						<td class="elementotabla col_monto" >  '
							<input id="t-cel_<?php echo($cuenta_cobrar->i) ?>_15" name="t-cel_<?php echo($cuenta_cobrar->i) ?>_15" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12"  value="<?php echo($cuenta_cobrar->monto) ?>" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_saldo" >  '
							<input id="t-cel_<?php echo($cuenta_cobrar->i) ?>_16" name="t-cel_<?php echo($cuenta_cobrar->i) ?>_16" type="text" class="form-control"  placeholder="Saldo"  title="Saldo"    maxlength="18" size="12"  value="<?php echo($cuenta_cobrar->saldo) ?>"  readonly="readonly">
							<span id="spanstrMensajesaldo" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_porcentaje" >  '
							<input id="t-cel_<?php echo($cuenta_cobrar->i) ?>_17" name="t-cel_<?php echo($cuenta_cobrar->i) ?>_17" type="text" class="form-control"  placeholder="%"  title="%"    maxlength="18" size="12"  value="<?php echo($cuenta_cobrar->porcentaje) ?>" >
							<span id="spanstrMensajeporcentaje" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($cuenta_cobrar->i) ?>_18" name="t-cel_<?php echo($cuenta_cobrar->i) ?>_18" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($cuenta_cobrar->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($cuenta_cobrar->i) ?>_18" name="t-cel_<?php echo($cuenta_cobrar->i) ?>_18" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($cuenta_cobrar->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_estado_cuentas_cobrar" ><?php echo($funciones->getComboBoxEditar($cuenta_cobrar->id_estado_cuentas_cobrar_Descripcion,$cuenta_cobrar->id_estado_cuentas_cobrar,'t-cel_'.$cuenta_cobrar->i.'_19')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta_cobrar->id) ?>
							<img class="imgrelacioncredito_cuenta_cobrar" idactualcuenta_cobrar="<?php echo($cuenta_cobrar->id) ?>" title="Credito Cuenta CobrarS DE Cuenta Cobrar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/credito_cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta_cobrar->id) ?>
							<img class="imgrelaciondebito_cuenta_cobrar" idactualcuenta_cobrar="<?php echo($cuenta_cobrar->id) ?>" title="Debito Cuenta CobrarS DE Cuenta Cobrar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/debito_cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta_cobrar->id) ?>
							<img class="imgrelacionpago_cuenta_cobrar" idactualcuenta_cobrar="<?php echo($cuenta_cobrar->id) ?>" title="Pago Cuenta CobrarS DE Cuenta Cobrar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/pago_cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
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



