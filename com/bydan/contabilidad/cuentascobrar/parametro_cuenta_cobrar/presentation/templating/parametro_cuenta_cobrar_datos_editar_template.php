



		<form id="frmTablaDatosparametro_cuenta_cobrar" name="frmTablaDatosparametro_cuenta_cobrar">
			<div id="divTablaDatosAuxiliarparametro_cuenta_cobrarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_cuenta_cobrars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_cuenta_cobrar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Cuentas Cobrars</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_cuenta_cobrars" name="tblTablaDatosparametro_cuenta_cobrars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cuenta Cobrar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Debito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Credito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Anulado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Cliente Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Registro Tributario.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cuenta Cobrar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Debito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Credito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Anulado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Cliente Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Registro Tributario.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_cuenta_cobrarsLocal!=null && count($parametro_cuenta_cobrarsLocal)>0) { ?>
			<?php foreach ($parametro_cuenta_cobrarsLocal as $parametro_cuenta_cobrar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_cuenta_cobrar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_cuenta_cobrar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_cuenta_cobrar->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_cuenta_cobrar" idactualparametro_cuenta_cobrar="<?php echo($parametro_cuenta_cobrar->id) ?>" title="SELECCIONAR Parametro Cuentas Cobrar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($parametro_cuenta_cobrar->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaparametro_cuenta_cobrar" idactualparametro_cuenta_cobrar="<?php echo($parametro_cuenta_cobrar->id) ?>" title="ELIMINAR Parametro Cuentas Cobrar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($parametro_cuenta_cobrar->i) ?>" name="t-id_<?php echo($parametro_cuenta_cobrar->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro Cuentas Cobrar ACTUAL" value="<?php echo($parametro_cuenta_cobrar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_0" name="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_cuenta_cobrar->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $parametro_cuenta_cobrar->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $parametro_cuenta_cobrar->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($parametro_cuenta_cobrar->id_empresa_Descripcion,$parametro_cuenta_cobrar->id_empresa,'t-cel_'.$parametro_cuenta_cobrar->i.'_3')) ?></td>
				<?php } ?>
				
						<td class="elementotabla col_numero_cuenta_cobrar" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_4" name="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_4" type="text" class="form-control"  placeholder="Numero Cuenta Cobrar"  title="Numero Cuenta Cobrar"    maxlength="19" size="10"  value="<?php echo($parametro_cuenta_cobrar->numero_cuenta_cobrar) ?>" >
							<span id="spanstrMensajenumero_cuenta_cobrar" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_debito" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_5" name="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_5" type="text" class="form-control"  placeholder="Numero Debito"  title="Numero Debito"    maxlength="19" size="10"  value="<?php echo($parametro_cuenta_cobrar->numero_debito) ?>" >
							<span id="spanstrMensajenumero_debito" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_credito" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_6" name="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_6" type="text" class="form-control"  placeholder="Numero Credito"  title="Numero Credito"    maxlength="19" size="10"  value="<?php echo($parametro_cuenta_cobrar->numero_credito) ?>" >
							<span id="spanstrMensajenumero_credito" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_pago" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_7" name="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_7" type="text" class="form-control"  placeholder="Numero Pago"  title="Numero Pago"    maxlength="19" size="10"  value="<?php echo($parametro_cuenta_cobrar->numero_pago) ?>" >
							<span id="spanstrMensajenumero_pago" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_mostrar_anulado" ><?php  $funciones->getCheckBoxEditar($parametro_cuenta_cobrar->mostrar_anulado,'t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_8',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_numero_cliente" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_9" name="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_9" type="text" class="form-control"  placeholder="Numero Cliente"  title="Numero Cliente"    maxlength="19" size="10"  value="<?php echo($parametro_cuenta_cobrar->numero_cliente) ?>" >
							<span id="spanstrMensajenumero_cliente" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_cliente_inactivo" ><?php  $funciones->getCheckBoxEditar($parametro_cuenta_cobrar->con_cliente_inactivo,'t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_10',$paraReporte)  ?>
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_registro_tributario" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_11" name="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_11" type="text" class="form-control"  placeholder="Nombre Registro Tributario"  title="Nombre Registro Tributario"    size="20"  maxlength="30" value="<?php echo($parametro_cuenta_cobrar->nombre_registro_tributario) ?>" />
							<span id="spanstrMensajenombre_registro_tributario" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_registro_tributario" >  '
							<input id="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_11" name="t-cel_<?php echo($parametro_cuenta_cobrar->i) ?>_11" type="text" class="form-control"  placeholder="Nombre Registro Tributario"  title="Nombre Registro Tributario"    size="20"  maxlength="30" value="<?php echo($parametro_cuenta_cobrar->nombre_registro_tributario) ?>" />
							<span id="spanstrMensajenombre_registro_tributario" class="mensajeerror"></span>' 
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



