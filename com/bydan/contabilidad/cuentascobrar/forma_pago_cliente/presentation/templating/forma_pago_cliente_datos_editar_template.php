



		<form id="frmTablaDatosforma_pago_cliente" name="frmTablaDatosforma_pago_cliente">
			<div id="divTablaDatosAuxiliarforma_pago_clientesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($forma_pago_clientes)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloforma_pago_cliente" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Forma Pago Clientes</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosforma_pago_clientes" name="tblTablaDatosforma_pago_clientes" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Tipo Forma Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Credito Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos Cuentas por Cobrares</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Pago Cuenta Cobrars</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Tipo Forma Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Credito Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos Cuentas por Cobrares</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Pago Cuenta Cobrars</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($forma_pago_clientesLocal!=null && count($forma_pago_clientesLocal)>0) { ?>
			<?php foreach ($forma_pago_clientesLocal as $forma_pago_cliente) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($forma_pago_cliente->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$forma_pago_cliente->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($forma_pago_cliente->id) ?>
							</td>
							<td>
								<img class="imgseleccionarforma_pago_cliente" idactualforma_pago_cliente="<?php echo($forma_pago_cliente->id) ?>" title="SELECCIONAR Forma Pago Cliente ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($forma_pago_cliente->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaforma_pago_cliente" idactualforma_pago_cliente="<?php echo($forma_pago_cliente->id) ?>" title="ELIMINAR Forma Pago Cliente ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($forma_pago_cliente->i) ?>" name="t-id_<?php echo($forma_pago_cliente->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Forma Pago Cliente ACTUAL" value="<?php echo($forma_pago_cliente->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($forma_pago_cliente->i) ?>_0" name="t-cel_<?php echo($forma_pago_cliente->i) ?>_0" type="text" maxlength="25" value="<?php echo($forma_pago_cliente->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($forma_pago_cliente->id) ?><img class="imgseleccionarmostraraccionesrelacionesforma_pago_cliente" idactualforma_pago_cliente="<?php echo($forma_pago_cliente->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $forma_pago_cliente->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $forma_pago_cliente->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($forma_pago_cliente->id_empresa_Descripcion,$forma_pago_cliente->id_empresa,'t-cel_'.$forma_pago_cliente->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_tipo_forma_pago" ><?php echo($funciones->getComboBoxEditar($forma_pago_cliente->id_tipo_forma_pago_Descripcion,$forma_pago_cliente->id_tipo_forma_pago,'t-cel_'.$forma_pago_cliente->i.'_4')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($forma_pago_cliente->i) ?>_5" name="t-cel_<?php echo($forma_pago_cliente->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="4"  maxlength="4" value="<?php echo($forma_pago_cliente->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($forma_pago_cliente->i) ?>_5" name="t-cel_<?php echo($forma_pago_cliente->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="4"  maxlength="4" value="<?php echo($forma_pago_cliente->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($forma_pago_cliente->i) ?>_6" name="t-cel_<?php echo($forma_pago_cliente->i) ?>_6" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="50" value="<?php echo($forma_pago_cliente->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($forma_pago_cliente->i) ?>_6" name="t-cel_<?php echo($forma_pago_cliente->i) ?>_6" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="50" value="<?php echo($forma_pago_cliente->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_predeterminado" ><?php  $funciones->getCheckBoxEditar($forma_pago_cliente->predeterminado,'t-cel_<?php echo($forma_pago_cliente->i) ?>_7',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_cuenta" ><?php echo($funciones->getComboBoxEditar($forma_pago_cliente->id_cuenta_Descripcion,$forma_pago_cliente->id_cuenta,'t-cel_'.$forma_pago_cliente->i.'_8')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($forma_pago_cliente->id) ?>
							<img class="imgrelacioncredito_cuenta_cobrar" idactualforma_pago_cliente="<?php echo($forma_pago_cliente->id) ?>" title="Credito Cuenta CobrarS DE Forma Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/credito_cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($forma_pago_cliente->id) ?>
							<img class="imgrelaciondocumento_cuenta_cobrar" idactualforma_pago_cliente="<?php echo($forma_pago_cliente->id) ?>" title="Documentos Cuentas por CobrarS DE Forma Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/documento_cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($forma_pago_cliente->id) ?>
							<img class="imgrelacionpago_cuenta_cobrar" idactualforma_pago_cliente="<?php echo($forma_pago_cliente->id) ?>" title="Pago Cuenta CobrarS DE Forma Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/pago_cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
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



