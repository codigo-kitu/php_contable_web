



		<form id="frmTablaDatoscredito_cuenta_pagar" name="frmTablaDatoscredito_cuenta_pagar">
			<div id="divTablaDatosAuxiliarcredito_cuenta_pagarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($credito_cuenta_pagars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocredito_cuenta_pagar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Credito Cuenta Pagars</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscredito_cuenta_pagars" name="tblTablaDatoscredito_cuenta_pagars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Pagar.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Termino Pago Proveedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Balance Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Pagar.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Termino Pago Proveedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Balance Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($credito_cuenta_pagarsLocal!=null && count($credito_cuenta_pagarsLocal)>0) { ?>
			<?php foreach ($credito_cuenta_pagarsLocal as $credito_cuenta_pagar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($credito_cuenta_pagar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$credito_cuenta_pagar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($credito_cuenta_pagar->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcredito_cuenta_pagar" idactualcredito_cuenta_pagar="<?php echo($credito_cuenta_pagar->id) ?>" title="SELECCIONAR Credito Cuenta Pagar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($credito_cuenta_pagar->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacredito_cuenta_pagar" idactualcredito_cuenta_pagar="<?php echo($credito_cuenta_pagar->id) ?>" title="ELIMINAR Credito Cuenta Pagar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($credito_cuenta_pagar->i) ?>" name="t-id_<?php echo($credito_cuenta_pagar->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Credito Cuenta Pagar ACTUAL" value="<?php echo($credito_cuenta_pagar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_0" name="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_0" type="text" maxlength="25" value="<?php echo($credito_cuenta_pagar->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $credito_cuenta_pagar->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $credito_cuenta_pagar->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($credito_cuenta_pagar->id_empresa_Descripcion,$credito_cuenta_pagar->id_empresa,'t-cel_'.$credito_cuenta_pagar->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_sucursal" ><?php echo($funciones->getComboBoxEditar($credito_cuenta_pagar->id_sucursal_Descripcion,$credito_cuenta_pagar->id_sucursal,'t-cel_'.$credito_cuenta_pagar->i.'_4')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($credito_cuenta_pagar->id_ejercicio_Descripcion,$credito_cuenta_pagar->id_ejercicio,'t-cel_'.$credito_cuenta_pagar->i.'_5')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($credito_cuenta_pagar->id_periodo_Descripcion,$credito_cuenta_pagar->id_periodo,'t-cel_'.$credito_cuenta_pagar->i.'_6')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($credito_cuenta_pagar->id_usuario_Descripcion,$credito_cuenta_pagar->id_usuario,'t-cel_'.$credito_cuenta_pagar->i.'_7')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_cuenta_pagar" ><?php echo($funciones->getComboBoxEditar($credito_cuenta_pagar->id_cuenta_pagar_Descripcion,$credito_cuenta_pagar->id_cuenta_pagar,'t-cel_'.$credito_cuenta_pagar->i.'_8')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero" >  '
							<input id="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_9" name="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_9" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="12"  maxlength="12" value="<?php echo($credito_cuenta_pagar->numero) ?>" />
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero" >  '
							<input id="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_9" name="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_9" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="12"  maxlength="12" value="<?php echo($credito_cuenta_pagar->numero) ?>" />
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_emision" >  '
							<input id="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_10" name="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_10" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10"  value="<?php echo($credito_cuenta_pagar->fecha_emision) ?>" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_vence" >  '
							<input id="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_11" name="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_11" type="text" class="form-control"  placeholder="Fecha Vence"  title="Fecha Vence"    size="10"  value="<?php echo($credito_cuenta_pagar->fecha_vence) ?>" >
							<span id="spanstrMensajefecha_vence" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_termino_pago_proveedor" ><?php echo($funciones->getComboBoxEditar($credito_cuenta_pagar->id_termino_pago_proveedor_Descripcion,$credito_cuenta_pagar->id_termino_pago_proveedor,'t-cel_'.$credito_cuenta_pagar->i.'_12')) ?></td>
				
						<td class="elementotabla col_monto" >  '
							<input id="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_13" name="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_13" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12"  value="<?php echo($credito_cuenta_pagar->monto) ?>" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_saldo" >  '
							<input id="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_14" name="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_14" type="text" class="form-control"  placeholder="Saldo"  title="Saldo"    maxlength="18" size="12"  value="<?php echo($credito_cuenta_pagar->saldo) ?>"  readonly="readonly">
							<span id="spanstrMensajesaldo" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_15" name="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_15" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($credito_cuenta_pagar->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_15" name="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_15" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($credito_cuenta_pagar->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_sub_total" >  '
							<input id="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_16" name="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_16" type="text" class="form-control"  placeholder="Sub Total"  title="Sub Total"    maxlength="18" size="12"  value="<?php echo($credito_cuenta_pagar->sub_total) ?>" >
							<span id="spanstrMensajesub_total" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_iva" >  '
							<input id="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_17" name="t-cel_<?php echo($credito_cuenta_pagar->i) ?>_17" type="text" class="form-control"  placeholder="Iva"  title="Iva"    maxlength="18" size="12"  value="<?php echo($credito_cuenta_pagar->iva) ?>" >
							<span id="spanstrMensajeiva" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_es_balance_inicial" ><?php  $funciones->getCheckBoxEditar($credito_cuenta_pagar->es_balance_inicial,'t-cel_<?php echo($credito_cuenta_pagar->i) ?>_18',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_estado" ><?php echo($funciones->getComboBoxEditar($credito_cuenta_pagar->id_estado_Descripcion,$credito_cuenta_pagar->id_estado,'t-cel_'.$credito_cuenta_pagar->i.'_19')) ?></td>

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



