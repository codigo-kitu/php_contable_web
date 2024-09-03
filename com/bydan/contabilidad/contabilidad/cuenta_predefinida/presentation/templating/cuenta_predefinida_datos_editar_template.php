



		<form id="frmTablaDatoscuenta_predefinida" name="frmTablaDatoscuenta_predefinida">
			<div id="divTablaDatosAuxiliarcuenta_predefinidasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($cuenta_predefinidas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocuenta_predefinida" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cuentas Predefinidases</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscuenta_predefinidas" name="tblTablaDatoscuenta_predefinidas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta Predefinida.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Nivel Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Tabla</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Minimo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Retencion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Porcentaje Base.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Seleccionar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Centro Costos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usa Base</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nit</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modifica</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ultima Transaccion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta2</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta Predefinida.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Nivel Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Tabla</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Minimo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Retencion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Porcentaje Base.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Seleccionar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Centro Costos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usa Base</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nit</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modifica</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ultima Transaccion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta2</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($cuenta_predefinidasLocal!=null && count($cuenta_predefinidasLocal)>0) { ?>
			<?php foreach ($cuenta_predefinidasLocal as $cuenta_predefinida) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cuenta_predefinida->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cuenta_predefinida->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cuenta_predefinida->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcuenta_predefinida" idactualcuenta_predefinida="<?php echo($cuenta_predefinida->id) ?>" title="SELECCIONAR Cuentas Predefinidas ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($cuenta_predefinida->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacuenta_predefinida" idactualcuenta_predefinida="<?php echo($cuenta_predefinida->id) ?>" title="ELIMINAR Cuentas Predefinidas ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($cuenta_predefinida->i) ?>" name="t-id_<?php echo($cuenta_predefinida->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cuentas Predefinidas ACTUAL" value="<?php echo($cuenta_predefinida->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($cuenta_predefinida->i) ?>_0" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_0" type="text" maxlength="25" value="<?php echo($cuenta_predefinida->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $cuenta_predefinida->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $cuenta_predefinida->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($cuenta_predefinida->id_empresa_Descripcion,$cuenta_predefinida->id_empresa,'t-cel_'.$cuenta_predefinida->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_tipo_cuenta_predefinida" ><?php echo($funciones->getComboBoxEditar($cuenta_predefinida->id_tipo_cuenta_predefinida_Descripcion,$cuenta_predefinida->id_tipo_cuenta_predefinida,'t-cel_'.$cuenta_predefinida->i.'_4')) ?></td>
				<td class="elementotabla col_id_tipo_cuenta" ><?php echo($funciones->getComboBoxEditar($cuenta_predefinida->id_tipo_cuenta_Descripcion,$cuenta_predefinida->id_tipo_cuenta,'t-cel_'.$cuenta_predefinida->i.'_5')) ?></td>
				<td class="elementotabla col_id_tipo_nivel_cuenta" ><?php echo($funciones->getComboBoxEditar($cuenta_predefinida->id_tipo_nivel_cuenta_Descripcion,$cuenta_predefinida->id_tipo_nivel_cuenta,'t-cel_'.$cuenta_predefinida->i.'_6')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_tabla" >  '
							<input id="t-cel_<?php echo($cuenta_predefinida->i) ?>_7" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_7" type="text" class="form-control"  placeholder="Codigo Tabla"  title="Codigo Tabla"    size="10"  maxlength="10" value="<?php echo($cuenta_predefinida->codigo_tabla) ?>" />
							<span id="spanstrMensajecodigo_tabla" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_tabla" >  '
							<input id="t-cel_<?php echo($cuenta_predefinida->i) ?>_7" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_7" type="text" class="form-control"  placeholder="Codigo Tabla"  title="Codigo Tabla"    size="10"  maxlength="10" value="<?php echo($cuenta_predefinida->codigo_tabla) ?>" />
							<span id="spanstrMensajecodigo_tabla" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_cuenta" >  '
							<input id="t-cel_<?php echo($cuenta_predefinida->i) ?>_8" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_8" type="text" class="form-control"  placeholder="Codigo Cuenta"  title="Codigo Cuenta"    size="20"  maxlength="20" value="<?php echo($cuenta_predefinida->codigo_cuenta) ?>" />
							<span id="spanstrMensajecodigo_cuenta" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_cuenta" >  '
							<input id="t-cel_<?php echo($cuenta_predefinida->i) ?>_8" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_8" type="text" class="form-control"  placeholder="Codigo Cuenta"  title="Codigo Cuenta"    size="20"  maxlength="20" value="<?php echo($cuenta_predefinida->codigo_cuenta) ?>" />
							<span id="spanstrMensajecodigo_cuenta" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_cuenta" >  '<textarea id="t-cel_<?php echo($cuenta_predefinida->i) ?>_9" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_9" class="form-control"  placeholder="Nombre Cuenta"  title="Nombre Cuenta"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta_predefinida->nombre_cuenta) ?></textarea>
							<span id="spanstrMensajenombre_cuenta" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_cuenta" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($cuenta_predefinida->i) ?>_9" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_9" class="form-control"  placeholder="Nombre Cuenta"  title="Nombre Cuenta"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta_predefinida->nombre_cuenta) ?></input>
							<span id="spanstrMensajenombre_cuenta" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_monto_minimo" >  '
							<input id="t-cel_<?php echo($cuenta_predefinida->i) ?>_10" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_10" type="text" class="form-control"  placeholder="Monto Minimo"  title="Monto Minimo"    maxlength="18" size="12"  value="<?php echo($cuenta_predefinida->monto_minimo) ?>" >
							<span id="spanstrMensajemonto_minimo" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_valor_retencion" >  '
							<input id="t-cel_<?php echo($cuenta_predefinida->i) ?>_11" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_11" type="text" class="form-control"  placeholder="Valor Retencion"  title="Valor Retencion"    maxlength="18" size="12"  value="<?php echo($cuenta_predefinida->valor_retencion) ?>" >
							<span id="spanstrMensajevalor_retencion" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_balance" >  '
							<input id="t-cel_<?php echo($cuenta_predefinida->i) ?>_12" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_12" type="text" class="form-control"  placeholder="Balance"  title="Balance"    maxlength="24" size="12"  value="<?php echo($cuenta_predefinida->balance) ?>" >
							<span id="spanstrMensajebalance" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_porcentaje_base" >  '
							<input id="t-cel_<?php echo($cuenta_predefinida->i) ?>_13" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_13" type="text" class="form-control"  placeholder="Porcentaje Base"  title="Porcentaje Base"    maxlength="18" size="12"  value="<?php echo($cuenta_predefinida->porcentaje_base) ?>" >
							<span id="spanstrMensajeporcentaje_base" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_seleccionar" >  '
							<input id="t-cel_<?php echo($cuenta_predefinida->i) ?>_14" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_14" type="text" class="form-control"  placeholder="Seleccionar"  title="Seleccionar"    maxlength="10" size="10"  value="<?php echo($cuenta_predefinida->seleccionar) ?>" >
							<span id="spanstrMensajeseleccionar" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_centro_costos" ><?php  $funciones->getCheckBoxEditar($cuenta_predefinida->centro_costos,'t-cel_<?php echo($cuenta_predefinida->i) ?>_15',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_retencion" ><?php  $funciones->getCheckBoxEditar($cuenta_predefinida->retencion,'t-cel_<?php echo($cuenta_predefinida->i) ?>_16',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_usa_base" ><?php  $funciones->getCheckBoxEditar($cuenta_predefinida->usa_base,'t-cel_<?php echo($cuenta_predefinida->i) ?>_17',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_nit" ><?php  $funciones->getCheckBoxEditar($cuenta_predefinida->nit,'t-cel_<?php echo($cuenta_predefinida->i) ?>_18',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_modifica" ><?php  $funciones->getCheckBoxEditar($cuenta_predefinida->modifica,'t-cel_<?php echo($cuenta_predefinida->i) ?>_19',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_ultima_transaccion" >  '
							<input id="t-cel_<?php echo($cuenta_predefinida->i) ?>_20" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_20" type="text" class="form-control"  placeholder="Ultima Transaccion"  title="Ultima Transaccion"    size="10"  value="<?php echo($cuenta_predefinida->ultima_transaccion) ?>" >
							<span id="spanstrMensajeultima_transaccion" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_comenta1" >  '<textarea id="t-cel_<?php echo($cuenta_predefinida->i) ?>_21" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_21" class="form-control"  placeholder="Comenta1"  title="Comenta1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta_predefinida->comenta1) ?></textarea>
							<span id="spanstrMensajecomenta1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_comenta1" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($cuenta_predefinida->i) ?>_21" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_21" class="form-control"  placeholder="Comenta1"  title="Comenta1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta_predefinida->comenta1) ?></input>
							<span id="spanstrMensajecomenta1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_comenta2" >  '<textarea id="t-cel_<?php echo($cuenta_predefinida->i) ?>_22" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_22" class="form-control"  placeholder="Comenta2"  title="Comenta2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta_predefinida->comenta2) ?></textarea>
							<span id="spanstrMensajecomenta2" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_comenta2" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($cuenta_predefinida->i) ?>_22" name="t-cel_<?php echo($cuenta_predefinida->i) ?>_22" class="form-control"  placeholder="Comenta2"  title="Comenta2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta_predefinida->comenta2) ?></input>
							<span id="spanstrMensajecomenta2" class="mensajeerror"></span>' 
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



