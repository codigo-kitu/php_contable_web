



		<form id="frmTablaDatoscuenta_corriente_detalle" name="frmTablaDatoscuenta_corriente_detalle">
			<div id="divTablaDatosAuxiliarcuenta_corriente_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($cuenta_corriente_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocuenta_corriente_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cuenta Corriente Detalles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscuenta_corriente_detalles" name="tblTablaDatoscuenta_corriente_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Balance Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Cheque</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Deposito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Retiro</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cheque</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Debito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Credito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Hora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tabla.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Pagar</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cobrar</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clasificacion Cheques</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Balance Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Cheque</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Deposito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Retiro</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cheque</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Debito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Credito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Hora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tabla.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Pagar</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cobrar</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clasificacion Cheques</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($cuenta_corriente_detallesLocal!=null && count($cuenta_corriente_detallesLocal)>0) { ?>
			<?php foreach ($cuenta_corriente_detallesLocal as $cuenta_corriente_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cuenta_corriente_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cuenta_corriente_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cuenta_corriente_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcuenta_corriente_detalle" idactualcuenta_corriente_detalle="<?php echo($cuenta_corriente_detalle->id) ?>" title="SELECCIONAR Cuenta Corriente Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($cuenta_corriente_detalle->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacuenta_corriente_detalle" idactualcuenta_corriente_detalle="<?php echo($cuenta_corriente_detalle->id) ?>" title="ELIMINAR Cuenta Corriente Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($cuenta_corriente_detalle->i) ?>" name="t-id_<?php echo($cuenta_corriente_detalle->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cuenta Corriente Detalle ACTUAL" value="<?php echo($cuenta_corriente_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_0" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_0" type="text" maxlength="25" value="<?php echo($cuenta_corriente_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($cuenta_corriente_detalle->id) ?><img class="imgseleccionarmostraraccionesrelacionescuenta_corriente_detalle" idactualcuenta_corriente_detalle="<?php echo($cuenta_corriente_detalle->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $cuenta_corriente_detalle->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $cuenta_corriente_detalle->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_empresa_Descripcion,$cuenta_corriente_detalle->id_empresa,'t-cel_'.$cuenta_corriente_detalle->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_ejercicio_Descripcion,$cuenta_corriente_detalle->id_ejercicio,'t-cel_'.$cuenta_corriente_detalle->i.'_4')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_periodo_Descripcion,$cuenta_corriente_detalle->id_periodo,'t-cel_'.$cuenta_corriente_detalle->i.'_5')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_usuario_Descripcion,$cuenta_corriente_detalle->id_usuario,'t-cel_'.$cuenta_corriente_detalle->i.'_6')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_cuenta_corriente" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_cuenta_corriente_Descripcion,$cuenta_corriente_detalle->id_cuenta_corriente,'t-cel_'.$cuenta_corriente_detalle->i.'_7')) ?></td>
				
						<td class="elementotabla col_es_balance_inicial" ><?php  $funciones->getCheckBoxEditar($cuenta_corriente_detalle->es_balance_inicial,'t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_8',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_es_cheque" ><?php  $funciones->getCheckBoxEditar($cuenta_corriente_detalle->es_cheque,'t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_9',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_es_deposito" ><?php  $funciones->getCheckBoxEditar($cuenta_corriente_detalle->es_deposito,'t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_10',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_es_retiro" ><?php  $funciones->getCheckBoxEditar($cuenta_corriente_detalle->es_retiro,'t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_11',$paraReporte)  ?>
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero_cheque" >  '
							<input id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_12" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_12" type="text" class="form-control"  placeholder="Numero Cheque"  title="Numero Cheque"    size="12"  maxlength="12" value="<?php echo($cuenta_corriente_detalle->numero_cheque) ?>" />
							<span id="spanstrMensajenumero_cheque" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero_cheque" >  '
							<input id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_12" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_12" type="text" class="form-control"  placeholder="Numero Cheque"  title="Numero Cheque"    size="12"  maxlength="12" value="<?php echo($cuenta_corriente_detalle->numero_cheque) ?>" />
							<span id="spanstrMensajenumero_cheque" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_emision" >  '
							<input id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_13" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_13" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10"  value="<?php echo($cuenta_corriente_detalle->fecha_emision) ?>" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_cliente" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_cliente_Descripcion,$cuenta_corriente_detalle->id_cliente,'t-cel_'.$cuenta_corriente_detalle->i.'_14')) ?></td>
				<td class="elementotabla col_id_proveedor" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_proveedor_Descripcion,$cuenta_corriente_detalle->id_proveedor,'t-cel_'.$cuenta_corriente_detalle->i.'_15')) ?></td>
				
						<td class="elementotabla col_monto" >  '
							<input id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_16" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_16" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12"  value="<?php echo($cuenta_corriente_detalle->monto) ?>" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_debito" >  '
							<input id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_17" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_17" type="text" class="form-control"  placeholder="Debito"  title="Debito"    maxlength="18" size="12"  value="<?php echo($cuenta_corriente_detalle->debito) ?>" >
							<span id="spanstrMensajedebito" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_credito" >  '
							<input id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_18" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_18" type="text" class="form-control"  placeholder="Credito"  title="Credito"    maxlength="18" size="12"  value="<?php echo($cuenta_corriente_detalle->credito) ?>" >
							<span id="spanstrMensajecredito" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_balance" >  '
							<input id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_19" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_19" type="text" class="form-control"  placeholder="Balance"  title="Balance"    maxlength="18" size="12"  value="<?php echo($cuenta_corriente_detalle->balance) ?>" >
							<span id="spanstrMensajebalance" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_hora" >  '
							<input id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_20" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_20" type="text" class="form-control"  placeholder="Fecha Hora"  title="Fecha Hora"    size="10"  value="<?php echo($cuenta_corriente_detalle->fecha_hora) ?>" >
							<span id="spanstrMensajefecha_hora" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_tabla" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_tabla_Descripcion,$cuenta_corriente_detalle->id_tabla,'t-cel_'.$cuenta_corriente_detalle->i.'_21')) ?></td>
				
						<td class="elementotabla col_id_origen" >  '
							<input id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_22" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_22" type="text" class="form-control"  placeholder="Origen"  title="Origen"    maxlength="19" size="10"  value="<?php echo($cuenta_corriente_detalle->id_origen) ?>" >
							<span id="spanstrMensajeid_origen" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_23" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_23" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($cuenta_corriente_detalle->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_23" name="t-cel_<?php echo($cuenta_corriente_detalle->i) ?>_23" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($cuenta_corriente_detalle->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_estado" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_estado_Descripcion,$cuenta_corriente_detalle->id_estado,'t-cel_'.$cuenta_corriente_detalle->i.'_24')) ?></td>
				<td class="elementotabla col_id_asiento" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_asiento_Descripcion,$cuenta_corriente_detalle->id_asiento,'t-cel_'.$cuenta_corriente_detalle->i.'_25')) ?></td>
				<td class="elementotabla col_id_cuenta_pagar" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_cuenta_pagar_Descripcion,$cuenta_corriente_detalle->id_cuenta_pagar,'t-cel_'.$cuenta_corriente_detalle->i.'_26')) ?></td>
				<td class="elementotabla col_id_cuenta_cobrar" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente_detalle->id_cuenta_cobrar_Descripcion,$cuenta_corriente_detalle->id_cuenta_cobrar,'t-cel_'.$cuenta_corriente_detalle->i.'_27')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta_corriente_detalle->id) ?>
							<img class="imgrelacionclasificacion_cheque" idactualcuenta_corriente_detalle="<?php echo($cuenta_corriente_detalle->id) ?>" title="Clasificacion ChequeS DE Cuenta Corriente Detalle" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/clasificacion_cheques.gif" alt="Seleccionar" border="" height="15" width="15">
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



