



		<form id="frmTablaDatosretencion" name="frmTablaDatosretencion">
			<div id="divTablaDatosAuxiliarretencionsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($retencions)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloretencion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Retenciones</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosretencions" name="tblTablaDatosretencions" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="retencion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Base</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Ventas<a onclick="jQuery('#form-id_cuenta_ventas_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_ventas_img2" name="form$strSufijo-id_cuenta_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="retencion_webcontrol1.abrirBusquedaParacuenta('id_cuenta_ventas');"><img id="form$strSufijo-id_cuenta_ventas_img_busqueda2" name="form$strSufijo-id_cuenta_ventas_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Compras<a onclick="jQuery('#form-id_cuenta_compras_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_compras_img2" name="form$strSufijo-id_cuenta_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="retencion_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compras');"><img id="form$strSufijo-id_cuenta_compras_img_busqueda2" name="form$strSufijo-id_cuenta_compras_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Productos_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Productos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="retencion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Base</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Ventas<a onclick="jQuery('#form-id_cuenta_ventas_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_ventas_img2" name="form$strSufijo-id_cuenta_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="retencion_webcontrol1.abrirBusquedaParacuenta('id_cuenta_ventas');"><img id="form$strSufijo-id_cuenta_ventas_img_busqueda2" name="form$strSufijo-id_cuenta_ventas_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Compras<a onclick="jQuery('#form-id_cuenta_compras_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_compras_img2" name="form$strSufijo-id_cuenta_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="retencion_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compras');"><img id="form$strSufijo-id_cuenta_compras_img_busqueda2" name="form$strSufijo-id_cuenta_compras_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Productos_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Productos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($retencionsLocal!=null && count($retencionsLocal)>0) { ?>
			<?php foreach ($retencionsLocal as $retencion) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($retencion->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$retencion->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($retencion->id) ?>
							</td>
							<td>
								<img class="imgseleccionarretencion" idactualretencion="<?php echo($retencion->id) ?>"  funcionjsactualretencion="'.str_replace('TO_REPLACE',$retencion->id.',\''.retencion_util::getretencionDescripcion($retencion).'\'',$this->strFuncionJs).'" title="SELECCIONAR Retencion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Retencion ACTUAL" value="<?php echo($retencion->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($retencion->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $retencion->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $retencion->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($retencion->id_empresa_Descripcion) ?></td>
				<?php } ?>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $retencion->codigo ) ?>
					</td>
				
					<td class="elementotabla col_descripcion" > 
						<?php echo( $retencion->descripcion ) ?>
					</td>
				
					<td class="elementotabla col_valor" > 
						<?php echo( $retencion->valor ) ?>
					</td>
				
					<td class="elementotabla col_valor_base" > 
						<?php echo( $retencion->valor_base ) ?>
					</td>
				
					<td class="elementotabla col_predeterminado" ><?php  $funciones->getCheckBox($retencion->predeterminado,'form<?php echo($strSufijo) ?>-predeterminadoi',$paraReporte)  ?>
					</td>
				<td class="elementotabla col_id_cuenta_ventas" > <?php echo($retencion->id_cuenta_ventas_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta_compras" > <?php echo($retencion->id_cuenta_compras_Descripcion) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($retencion->id) ?>
							<img class="imgrelacioncliente" idactualretencion="<?php echo($retencion->id) ?>" title="ClienteS DE Retencion" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($retencion->id) ?>
							<img class="imgrelacionlista_producto_compras" idactualretencion="<?php echo($retencion->id) ?>" title="Lista ProductosS DE Retencion" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($retencion->id) ?>
							<img class="imgrelacionproducto" idactualretencion="<?php echo($retencion->id) ?>" title="ProductoS DE Retencion" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($retencion->id) ?>
							<img class="imgrelacionproveedor" idactualretencion="<?php echo($retencion->id) ?>" title="ProveedorS DE Retencion" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
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



