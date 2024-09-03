



		<form id="frmTablaDatoscuenta" name="frmTablaDatoscuenta">
			<div id="divTablaDatosAuxiliarcuentasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($cuentas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocuenta" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cuentases</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscuentas" name="tblTablaDatoscuentas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Nivel Cuenta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_img2" name="form$strSufijo-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form$strSufijo-id_cuenta_img_busqueda2" name="form$strSufijo-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nivel Cuenta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usa Monto Minimo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Minimo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asiento Automaticos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asientoes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asiento Predefinidos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Categoria Cheques</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Corrientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Impuesto_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Instrumento Pago_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Productos_VENTAes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Impuesto_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Producto_VENTAs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion Fuente_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion Ica_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Saldo Cuentas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Terminos Pago Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Terminos Pago Proveedoreses</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Nivel Cuenta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_img2" name="form$strSufijo-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form$strSufijo-id_cuenta_img_busqueda2" name="form$strSufijo-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nivel Cuenta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usa Monto Minimo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Minimo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asiento Automaticos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asientoes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asiento Predefinidos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Categoria Cheques</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Corrientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Impuesto_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Instrumento Pago_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Productos_VENTAes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Impuesto_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Producto_VENTAs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion Fuente_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion Ica_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Saldo Cuentas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Terminos Pago Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Terminos Pago Proveedoreses</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($cuentasLocal!=null && count($cuentasLocal)>0) { ?>
			<?php foreach ($cuentasLocal as $cuenta) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cuenta->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cuenta->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cuenta->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcuenta" idactualcuenta="<?php echo($cuenta->id) ?>"  funcionjsactualcuenta="'.str_replace('TO_REPLACE',$cuenta->id.',\''.cuenta_util::getcuentaDescripcion($cuenta).'\'',$this->strFuncionJs).'" title="SELECCIONAR Cuentas ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cuentas ACTUAL" value="<?php echo($cuenta->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($cuenta->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $cuenta->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $cuenta->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($cuenta->id_empresa_Descripcion) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_tipo_cuenta" > <?php echo($cuenta->id_tipo_cuenta_Descripcion) ?></td>
				<td class="elementotabla col_id_tipo_nivel_cuenta" > <?php echo($cuenta->id_tipo_nivel_cuenta_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta" > <?php echo($cuenta->id_cuenta_Descripcion) ?></td>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $cuenta->codigo ) ?>
					</td>
				
					<td class="elementotabla col_nombre" > 
						<?php echo( $cuenta->nombre ) ?>
					</td>
				
					<td class="elementotabla col_nivel_cuenta" > 
						<?php echo( $cuenta->nivel_cuenta ) ?>
					</td>
				
					<td class="elementotabla col_usa_monto_base" ><?php  $funciones->getCheckBox($cuenta->usa_monto_base,'form<?php echo($strSufijo) ?>-usa_monto_basei',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_monto_base" > 
						<?php echo( $cuenta->monto_base ) ?>
					</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionasiento_automatico_detalle" idactualcuenta="<?php echo($cuenta->id) ?>" title="Detalle Asiento AutomaticoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_automatico_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionasiento_detalle" idactualcuenta="<?php echo($cuenta->id) ?>" title="Detalle AsientoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionasiento_predefinido_detalle" idactualcuenta="<?php echo($cuenta->id) ?>" title="Detalle Asiento PredefinidoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_predefinido_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacioncategoria_cheque" idactualcuenta="<?php echo($cuenta->id) ?>" title="Categoria ChequeS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/categoria_cheques.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacioncliente" idactualcuenta="<?php echo($cuenta->id) ?>" title="ClienteS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacioncuenta_corriente" idactualcuenta="<?php echo($cuenta->id) ?>" title="Cuenta CorrienteS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cuenta_corrientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacioncuenta" idactualcuenta="<?php echo($cuenta->id) ?>" title="CuentasS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cuentas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionforma_pago_cliente" idactualcuenta="<?php echo($cuenta->id) ?>" title="Forma Pago ClienteS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/forma_pago_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionforma_pago_proveedor" idactualcuenta="<?php echo($cuenta->id) ?>" title="Forma Pago ProveedorS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/forma_pago_proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionimpuesto_ventas" idactualcuenta="<?php echo($cuenta->id) ?>" title="ImpuestoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/impuestos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacioninstrumento_pago_ventas" idactualcuenta="<?php echo($cuenta->id) ?>" title="Instrumento PagoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/instrumento_pagos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionlista_producto_venta" idactualcuenta="<?php echo($cuenta->id) ?>" title="Lista ProductosS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionotro_impuesto_ventas" idactualcuenta="<?php echo($cuenta->id) ?>" title="Otro ImpuestoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/otro_impuestos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionproducto_venta" idactualcuenta="<?php echo($cuenta->id) ?>" title="ProductoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionproveedor" idactualcuenta="<?php echo($cuenta->id) ?>" title="ProveedorS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionretencion_compras" idactualcuenta="<?php echo($cuenta->id) ?>" title="RetencionS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/retencions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionretencion_fuente_compras" idactualcuenta="<?php echo($cuenta->id) ?>" title="Retencion FuenteS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/retencion_fuentes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionretencion_ica_ventas" idactualcuenta="<?php echo($cuenta->id) ?>" title="Retencion IcaS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/retencion_icas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionsaldo_cuenta" idactualcuenta="<?php echo($cuenta->id) ?>" title="Saldo CuentaS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/saldo_cuentas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelaciontermino_pago_cliente" idactualcuenta="<?php echo($cuenta->id) ?>" title="Terminos Pago ClienteS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/termino_pago_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelaciontermino_pago_proveedor" idactualcuenta="<?php echo($cuenta->id) ?>" title="Terminos Pago ProveedoresS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/termino_pago_proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
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



