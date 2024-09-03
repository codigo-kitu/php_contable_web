



		<form id="frmTablaDatosvendedor" name="frmTablaDatosvendedor">
			<div id="divTablaDatosAuxiliarvendedorsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($vendedors)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulovendedor" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Vendedores</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosvendedors" name="tblTablaDatosvendedors" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion 1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion 2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comision.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cotizaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devoluciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas Loteses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion 1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion 2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comision.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cotizaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devoluciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas Loteses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
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

		<?php if($vendedorsLocal!=null && count($vendedorsLocal)>0) { ?>
			<?php foreach ($vendedorsLocal as $vendedor) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($vendedor->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$vendedor->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($vendedor->id) ?>
							</td>
							<td>
								<img class="imgseleccionarvendedor" idactualvendedor="<?php echo($vendedor->id) ?>" title="SELECCIONAR Vendedor ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($vendedor->id) ?>
							</td>
							<td>
								<img class="imgeliminartablavendedor" idactualvendedor="<?php echo($vendedor->id) ?>" title="ELIMINAR Vendedor ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($vendedor->i) ?>" name="t-id_<?php echo($vendedor->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Vendedor ACTUAL" value="<?php echo($vendedor->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($vendedor->i) ?>_0" name="t-cel_<?php echo($vendedor->i) ?>_0" type="text" maxlength="25" value="<?php echo($vendedor->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($vendedor->id) ?><img class="imgseleccionarmostraraccionesrelacionesvendedor" idactualvendedor="<?php echo($vendedor->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $vendedor->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $vendedor->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($vendedor->id_empresa_Descripcion,$vendedor->id_empresa,'t-cel_'.$vendedor->i.'_3')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($vendedor->i) ?>_4" name="t-cel_<?php echo($vendedor->i) ?>_4" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="6"  maxlength="6" value="<?php echo($vendedor->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($vendedor->i) ?>_4" name="t-cel_<?php echo($vendedor->i) ?>_4" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="6"  maxlength="6" value="<?php echo($vendedor->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($vendedor->i) ?>_5" name="t-cel_<?php echo($vendedor->i) ?>_5" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="40" value="<?php echo($vendedor->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($vendedor->i) ?>_5" name="t-cel_<?php echo($vendedor->i) ?>_5" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="40" value="<?php echo($vendedor->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion1" >  '<textarea id="t-cel_<?php echo($vendedor->i) ?>_6" name="t-cel_<?php echo($vendedor->i) ?>_6" class="form-control"  placeholder="Direccion 1"  title="Direccion 1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($vendedor->direccion1) ?></textarea>
							<span id="spanstrMensajedireccion1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion1" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($vendedor->i) ?>_6" name="t-cel_<?php echo($vendedor->i) ?>_6" class="form-control"  placeholder="Direccion 1"  title="Direccion 1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($vendedor->direccion1) ?></input>
							<span id="spanstrMensajedireccion1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion2" >  '<textarea id="t-cel_<?php echo($vendedor->i) ?>_7" name="t-cel_<?php echo($vendedor->i) ?>_7" class="form-control"  placeholder="Direccion 2"  title="Direccion 2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($vendedor->direccion2) ?></textarea>
							<span id="spanstrMensajedireccion2" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion2" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($vendedor->i) ?>_7" name="t-cel_<?php echo($vendedor->i) ?>_7" class="form-control"  placeholder="Direccion 2"  title="Direccion 2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($vendedor->direccion2) ?></input>
							<span id="spanstrMensajedireccion2" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_comision" >  '
							<input id="t-cel_<?php echo($vendedor->i) ?>_8" name="t-cel_<?php echo($vendedor->i) ?>_8" type="text" class="form-control"  placeholder="Comision"  title="Comision"    maxlength="18" size="12"  value="<?php echo($vendedor->comision) ?>" >
							<span id="spanstrMensajecomision" class="mensajeerror"></span>' 
						</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($vendedor->id) ?>
							<img class="imgrelacioncliente" idactualvendedor="<?php echo($vendedor->id) ?>" title="ClienteS DE Vendedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($vendedor->id) ?>
							<img class="imgrelacionconsignacion" idactualvendedor="<?php echo($vendedor->id) ?>" title="ConsignacionS DE Vendedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/consignacions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($vendedor->id) ?>
							<img class="imgrelacioncotizacion" idactualvendedor="<?php echo($vendedor->id) ?>" title="CotizacionS DE Vendedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cotizacions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($vendedor->id) ?>
							<img class="imgrelaciondevolucion_factura" idactualvendedor="<?php echo($vendedor->id) ?>" title="Devolucion FacturaS DE Vendedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/devolucion_facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($vendedor->id) ?>
							<img class="imgrelaciondevolucion" idactualvendedor="<?php echo($vendedor->id) ?>" title="DevolucionS DE Vendedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/devolucions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($vendedor->id) ?>
							<img class="imgrelacionestimado" idactualvendedor="<?php echo($vendedor->id) ?>" title="EstimadoS DE Vendedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/estimados.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($vendedor->id) ?>
							<img class="imgrelacionfactura_lote" idactualvendedor="<?php echo($vendedor->id) ?>" title="Facturas LotesS DE Vendedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/factura_lotes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($vendedor->id) ?>
							<img class="imgrelacionfactura" idactualvendedor="<?php echo($vendedor->id) ?>" title="FacturaS DE Vendedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($vendedor->id) ?>
							<img class="imgrelacionorden_compra" idactualvendedor="<?php echo($vendedor->id) ?>" title="Orden CompraS DE Vendedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/orden_compras.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($vendedor->id) ?>
							<img class="imgrelacionproveedor" idactualvendedor="<?php echo($vendedor->id) ?>" title="ProveedorS DE Vendedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
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



