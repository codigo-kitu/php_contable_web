



		<form id="frmTablaDatoscuenta_corriente" name="frmTablaDatoscuenta_corriente">
			<div id="divTablaDatosAuxiliarcuenta_corrientesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($cuenta_corrientes)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocuenta_corriente" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cuenta Corrientes</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscuenta_corrientes" name="tblTablaDatoscuenta_corrientes" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Id Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Banco.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance Inicial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Cheque.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Contable</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Icono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Cheques</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Deposito Cta Corrientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retiro Cta Corrientes</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Id Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Banco.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance Inicial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Cheque.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Contable</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Icono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Cheques</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Deposito Cta Corrientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retiro Cta Corrientes</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($cuenta_corrientesLocal!=null && count($cuenta_corrientesLocal)>0) { ?>
			<?php foreach ($cuenta_corrientesLocal as $cuenta_corriente) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cuenta_corriente->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cuenta_corriente->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cuenta_corriente->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcuenta_corriente" idactualcuenta_corriente="<?php echo($cuenta_corriente->id) ?>" title="SELECCIONAR Cuenta Corriente ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($cuenta_corriente->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacuenta_corriente" idactualcuenta_corriente="<?php echo($cuenta_corriente->id) ?>" title="ELIMINAR Cuenta Corriente ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($cuenta_corriente->i) ?>" name="t-id_<?php echo($cuenta_corriente->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cuenta Corriente ACTUAL" value="<?php echo($cuenta_corriente->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($cuenta_corriente->i) ?>_0" name="t-cel_<?php echo($cuenta_corriente->i) ?>_0" type="text" maxlength="25" value="<?php echo($cuenta_corriente->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($cuenta_corriente->id) ?><img class="imgseleccionarmostraraccionesrelacionescuenta_corriente" idactualcuenta_corriente="<?php echo($cuenta_corriente->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $cuenta_corriente->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $cuenta_corriente->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente->id_empresa_Descripcion,$cuenta_corriente->id_empresa,'t-cel_'.$cuenta_corriente->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente->id_usuario_Descripcion,$cuenta_corriente->id_usuario,'t-cel_'.$cuenta_corriente->i.'_4')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_banco" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente->id_banco_Descripcion,$cuenta_corriente->id_banco,'t-cel_'.$cuenta_corriente->i.'_5')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero_cuenta" >  '
							<input id="t-cel_<?php echo($cuenta_corriente->i) ?>_6" name="t-cel_<?php echo($cuenta_corriente->i) ?>_6" type="text" class="form-control"  placeholder="Nro Cuenta"  title="Nro Cuenta"    size="20"  maxlength="40" value="<?php echo($cuenta_corriente->numero_cuenta) ?>" />
							<span id="spanstrMensajenumero_cuenta" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero_cuenta" >  '
							<input id="t-cel_<?php echo($cuenta_corriente->i) ?>_6" name="t-cel_<?php echo($cuenta_corriente->i) ?>_6" type="text" class="form-control"  placeholder="Nro Cuenta"  title="Nro Cuenta"    size="20"  maxlength="40" value="<?php echo($cuenta_corriente->numero_cuenta) ?>" />
							<span id="spanstrMensajenumero_cuenta" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_balance_inicial" >  '
							<input id="t-cel_<?php echo($cuenta_corriente->i) ?>_7" name="t-cel_<?php echo($cuenta_corriente->i) ?>_7" type="text" class="form-control"  placeholder="Balance Inicial"  title="Balance Inicial"    maxlength="18" size="12"  value="<?php echo($cuenta_corriente->balance_inicial) ?>" >
							<span id="spanstrMensajebalance_inicial" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_saldo" >  '
							<input id="t-cel_<?php echo($cuenta_corriente->i) ?>_8" name="t-cel_<?php echo($cuenta_corriente->i) ?>_8" type="text" class="form-control"  placeholder="Saldo"  title="Saldo"    maxlength="18" size="12"  value="<?php echo($cuenta_corriente->saldo) ?>"  readonly="readonly">
							<span id="spanstrMensajesaldo" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_contador_cheque" >  '
							<input id="t-cel_<?php echo($cuenta_corriente->i) ?>_9" name="t-cel_<?php echo($cuenta_corriente->i) ?>_9" type="text" class="form-control"  placeholder="Contador Cheque"  title="Contador Cheque"    maxlength="10" size="10"  value="<?php echo($cuenta_corriente->contador_cheque) ?>" >
							<span id="spanstrMensajecontador_cheque" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_cuenta" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente->id_cuenta_Descripcion,$cuenta_corriente->id_cuenta,'t-cel_'.$cuenta_corriente->i.'_10')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($cuenta_corriente->i) ?>_11" name="t-cel_<?php echo($cuenta_corriente->i) ?>_11" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta_corriente->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($cuenta_corriente->i) ?>_11" name="t-cel_<?php echo($cuenta_corriente->i) ?>_11" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta_corriente->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_icono" >  '<textarea id="t-cel_<?php echo($cuenta_corriente->i) ?>_12" name="t-cel_<?php echo($cuenta_corriente->i) ?>_12" class="form-control"  placeholder="Icono"  title="Icono"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($cuenta_corriente->icono) ?></textarea>
							<span id="spanstrMensajeicono" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_icono" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($cuenta_corriente->i) ?>_12" name="t-cel_<?php echo($cuenta_corriente->i) ?>_12" class="form-control"  placeholder="Icono"  title="Icono"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($cuenta_corriente->icono) ?></input>
							<span id="spanstrMensajeicono" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_estado_cuentas_corrientes" ><?php echo($funciones->getComboBoxEditar($cuenta_corriente->id_estado_cuentas_corrientes_Descripcion,$cuenta_corriente->id_estado_cuentas_corrientes,'t-cel_'.$cuenta_corriente->i.'_13')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta_corriente->id) ?>
							<img class="imgrelacioncheque_cuenta_corriente" idactualcuenta_corriente="<?php echo($cuenta_corriente->id) ?>" title="ChequeS DE Cuenta Corriente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cheque_cuenta_corrientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta_corriente->id) ?>
							<img class="imgrelaciondeposito_cuenta_corriente" idactualcuenta_corriente="<?php echo($cuenta_corriente->id) ?>" title="Deposito Cta CorrienteS DE Cuenta Corriente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/deposito_cuenta_corrientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta_corriente->id) ?>
							<img class="imgrelacionretiro_cuenta_corriente" idactualcuenta_corriente="<?php echo($cuenta_corriente->id) ?>" title="Retiro Cta CorrienteS DE Cuenta Corriente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/retiro_cuenta_corrientes.gif" alt="Seleccionar" border="" height="15" width="15">
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



