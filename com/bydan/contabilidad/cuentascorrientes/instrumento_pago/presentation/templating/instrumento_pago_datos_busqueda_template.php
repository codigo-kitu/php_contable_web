



		<form id="frmTablaDatosinstrumento_pago" name="frmTablaDatosinstrumento_pago">
			<div id="divTablaDatosAuxiliarinstrumento_pagosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($instrumento_pagos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloinstrumento_pago" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Instrumento Pagos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosinstrumento_pagos" name="tblTablaDatosinstrumento_pagos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compras<a onclick="jQuery('#form-id_cuenta_compras_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_compras_img2" name="form$strSufijo-id_cuenta_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compras');"><img id="form$strSufijo-id_cuenta_compras_img_busqueda2" name="form$strSufijo-id_cuenta_compras_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Ventas<a onclick="jQuery('#form-id_cuenta_ventas_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_ventas_img2" name="form$strSufijo-id_cuenta_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta('id_cuenta_ventas');"><img id="form$strSufijo-id_cuenta_ventas_img_busqueda2" name="form$strSufijo-id_cuenta_ventas_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Compra</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_corriente_img2" name="form$strSufijo-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form$strSufijo-id_cuenta_corriente_img_busqueda2" name="form$strSufijo-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compras<a onclick="jQuery('#form-id_cuenta_compras_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_compras_img2" name="form$strSufijo-id_cuenta_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compras');"><img id="form$strSufijo-id_cuenta_compras_img_busqueda2" name="form$strSufijo-id_cuenta_compras_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Ventas<a onclick="jQuery('#form-id_cuenta_ventas_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_ventas_img2" name="form$strSufijo-id_cuenta_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta('id_cuenta_ventas');"><img id="form$strSufijo-id_cuenta_ventas_img_busqueda2" name="form$strSufijo-id_cuenta_ventas_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Compra</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_corriente_img2" name="form$strSufijo-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form$strSufijo-id_cuenta_corriente_img_busqueda2" name="form$strSufijo-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($instrumento_pagosLocal!=null && count($instrumento_pagosLocal)>0) { ?>
			<?php foreach ($instrumento_pagosLocal as $instrumento_pago) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($instrumento_pago->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$instrumento_pago->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($instrumento_pago->id) ?>
							</td>
							<td>
								<img class="imgseleccionarinstrumento_pago" idactualinstrumento_pago="<?php echo($instrumento_pago->id) ?>"  funcionjsactualinstrumento_pago="'.str_replace('TO_REPLACE',$instrumento_pago->id.',\''.instrumento_pago_util::getinstrumento_pagoDescripcion($instrumento_pago).'\'',$this->strFuncionJs).'" title="SELECCIONAR Instrumento Pago ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Instrumento Pago ACTUAL" value="<?php echo($instrumento_pago->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($instrumento_pago->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $instrumento_pago->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $instrumento_pago->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $instrumento_pago->codigo ) ?>
					</td>
				
					<td class="elementotabla col_descripcion" > 
						<?php echo( $instrumento_pago->descripcion ) ?>
					</td>
				
					<td class="elementotabla col_predeterminado" > 
						<?php echo( $instrumento_pago->predeterminado ) ?>
					</td>
				<td class="elementotabla col_id_cuenta_compras" > <?php echo($instrumento_pago->id_cuenta_compras_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta_ventas" > <?php echo($instrumento_pago->id_cuenta_ventas_Descripcion) ?></td>
				
					<td class="elementotabla col_cuenta_contable_compra" > 
						<?php echo( $instrumento_pago->cuenta_contable_compra ) ?>
					</td>
				
					<td class="elementotabla col_cuenta_contable_ventas" > 
						<?php echo( $instrumento_pago->cuenta_contable_ventas ) ?>
					</td>
				<td class="elementotabla col_id_cuenta_corriente" > <?php echo($instrumento_pago->id_cuenta_corriente_Descripcion) ?></td>

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



