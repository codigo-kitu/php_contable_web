



		<form id="frmTablaDatostermino_pago_cliente" name="frmTablaDatostermino_pago_cliente">
			<div id="divTablaDatosAuxiliartermino_pago_clientesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($termino_pago_clientes)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulotermino_pago_cliente" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Terminos Pago Clientes</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatostermino_pago_clientes" name="tblTablaDatostermino_pago_clientes" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

		<?php if($IS_DEVELOPING && !$bitEsRelacionado) { ?>
			<caption>(<?php echo($STR_PREFIJO_TABLE.$STR_TABLE_NAME) ?>)</caption>
		<?php } ?>

		
			<thead>
				<tr class="<?php echo($class_cabecera) ?>">
		<?php // class="cabeceratabla" ?>

				<?php //EN UNA LINEA PRIMERO COLUMNAS(ID,ELIMINAR,SELECCIONAR) ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Termino Pago<a onclick="jQuery('#form-id_tipo_termino_pago_img').trigger('click' );"><img id="form$strSufijo-id_tipo_termino_pago_img2" name="form$strSufijo-id_tipo_termino_pago_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParatipo_termino_pago('id_tipo_termino_pago');"><img id="form$strSufijo-id_tipo_termino_pago_img_busqueda2" name="form$strSufijo-id_tipo_termino_pago_img_busqueda2" title="Buscar Tipo Termino Pago" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_img2" name="form$strSufijo-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form$strSufijo-id_cuenta_img_busqueda2" name="form$strSufijo-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Debito Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas LotesID_TERMINO_PAGOes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Facturacions</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Termino Pago<a onclick="jQuery('#form-id_tipo_termino_pago_img').trigger('click' );"><img id="form$strSufijo-id_tipo_termino_pago_img2" name="form$strSufijo-id_tipo_termino_pago_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParatipo_termino_pago('id_tipo_termino_pago');"><img id="form$strSufijo-id_tipo_termino_pago_img_busqueda2" name="form$strSufijo-id_tipo_termino_pago_img_busqueda2" title="Buscar Tipo Termino Pago" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_img2" name="form$strSufijo-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form$strSufijo-id_cuenta_img_busqueda2" name="form$strSufijo-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Debito Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas LotesID_TERMINO_PAGOes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Facturacions</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($termino_pago_clientesLocal!=null && count($termino_pago_clientesLocal)>0) { ?>
			<?php foreach ($termino_pago_clientesLocal as $termino_pago_cliente) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($termino_pago_cliente->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$termino_pago_cliente->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($termino_pago_cliente->id) ?>
							</td>
							<td>
								<img class="imgseleccionartermino_pago_cliente" idactualtermino_pago_cliente="<?php echo($termino_pago_cliente->id) ?>"  funcionjsactualtermino_pago_cliente="'.str_replace('TO_REPLACE',$termino_pago_cliente->id.',\''.termino_pago_cliente_util::gettermino_pago_clienteDescripcion($termino_pago_cliente).'\'',$this->strFuncionJs).'" title="SELECCIONAR Terminos Pago Cliente ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Terminos Pago Cliente ACTUAL" value="<?php echo($termino_pago_cliente->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($termino_pago_cliente->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $termino_pago_cliente->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $termino_pago_cliente->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($termino_pago_cliente->id_empresa_Descripcion) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_tipo_termino_pago" > <?php echo($termino_pago_cliente->id_tipo_termino_pago_Descripcion) ?></td>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $termino_pago_cliente->codigo ) ?>
					</td>
				
					<td class="elementotabla col_descripcion" > 
						<?php echo( $termino_pago_cliente->descripcion ) ?>
					</td>
				
					<td class="elementotabla col_monto" > 
						<?php echo( $termino_pago_cliente->monto ) ?>
					</td>
				
					<td class="elementotabla col_dias" > 
						<?php echo( $termino_pago_cliente->dias ) ?>
					</td>
				
					<td class="elementotabla col_inicial" > 
						<?php echo( $termino_pago_cliente->inicial ) ?>
					</td>
				<td class="elementotabla col_id_cuenta" > <?php echo($termino_pago_cliente->id_cuenta_Descripcion) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_cliente->id) ?>
							<img class="imgrelacioncliente" idactualtermino_pago_cliente="<?php echo($termino_pago_cliente->id) ?>" title="ClienteS DE Terminos Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_cliente->id) ?>
							<img class="imgrelacionconsignacion" idactualtermino_pago_cliente="<?php echo($termino_pago_cliente->id) ?>" title="ConsignacionS DE Terminos Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/consignacions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_cliente->id) ?>
							<img class="imgrelacioncuenta_cobrar" idactualtermino_pago_cliente="<?php echo($termino_pago_cliente->id) ?>" title="Cuenta CobrarS DE Terminos Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_cliente->id) ?>
							<img class="imgrelaciondebito_cuenta_cobrar" idactualtermino_pago_cliente="<?php echo($termino_pago_cliente->id) ?>" title="Debito Cuenta CobrarS DE Terminos Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/debito_cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_cliente->id) ?>
							<img class="imgrelaciondevolucion_factura" idactualtermino_pago_cliente="<?php echo($termino_pago_cliente->id) ?>" title="Devolucion FacturaS DE Terminos Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/devolucion_facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_cliente->id) ?>
							<img class="imgrelacionestimado" idactualtermino_pago_cliente="<?php echo($termino_pago_cliente->id) ?>" title="EstimadoS DE Terminos Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/estimados.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_cliente->id) ?>
							<img class="imgrelacionfactura_loteid_termino_pago" idactualtermino_pago_cliente="<?php echo($termino_pago_cliente->id) ?>" title="Facturas LotesS DE Terminos Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/factura_lotes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_cliente->id) ?>
							<img class="imgrelacionfactura" idactualtermino_pago_cliente="<?php echo($termino_pago_cliente->id) ?>" title="FacturaS DE Terminos Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($termino_pago_cliente->id) ?>
							<img class="imgrelacionparametro_facturacion" idactualtermino_pago_cliente="<?php echo($termino_pago_cliente->id) ?>" title="Parametro FacturacionS DE Terminos Pago Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/parametro_facturacions.gif" alt="Seleccionar" border="" height="15" width="15">
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



