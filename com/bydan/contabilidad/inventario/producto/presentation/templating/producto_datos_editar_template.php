



		<form id="frmTablaDatosproducto" name="frmTablaDatosproducto">
			<div id="divTablaDatosAuxiliarproductosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($productos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloproducto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Productos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosproductos" name="tblTablaDatosproductos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Proveedores.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Inicial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega Defecto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Fabricante</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Minima.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Maxima.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Sin Stock</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Componente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Equivalente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Avisa Expiracion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Requiere No Serie</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Acepta Lote</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Venta/Ingresos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Compra/Activo/Inventario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Costo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Inventario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Fisico.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Precioses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista ses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Suplidores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre> Bodegas</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla"> Proveedores.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Inicial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Impuesto Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Categoria Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega Defecto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Compra.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Equivalencia En Venta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Fabricante</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Minima.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad Maxima.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Factura Sin Stock</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Componente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Equivalente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Avisa Expiracion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Requiere No Serie</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Acepta Lote</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Venta/Ingresos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Compra/Activo/Inventario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Costo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Inventario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto Fisico.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Precioses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista ses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Suplidores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre> Bodegas</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($productosLocal!=null && count($productosLocal)>0) { ?>
			<?php foreach ($productosLocal as $producto) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($producto->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$producto->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($producto->id) ?>
							</td>
							<td>
								<img class="imgseleccionarproducto" idactualproducto="<?php echo($producto->id) ?>" title="SELECCIONAR Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($producto->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaproducto" idactualproducto="<?php echo($producto->id) ?>" title="ELIMINAR Producto ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($producto->i) ?>" name="t-id_<?php echo($producto->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Producto ACTUAL" value="<?php echo($producto->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($producto->i) ?>_0" name="t-cel_<?php echo($producto->i) ?>_0" type="text" maxlength="25" value="<?php echo($producto->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($producto->id) ?><img class="imgseleccionarmostraraccionesrelacionesproducto" idactualproducto="<?php echo($producto->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $producto->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $producto->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($producto->id_empresa_Descripcion,$producto->id_empresa,'t-cel_'.$producto->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_proveedor" ><?php echo($funciones->getComboBoxEditar($producto->id_proveedor_Descripcion,$producto->id_proveedor,'t-cel_'.$producto->i.'_4')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_5" name="t-cel_<?php echo($producto->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="26" value="<?php echo($producto->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_5" name="t-cel_<?php echo($producto->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="26" value="<?php echo($producto->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '<textarea id="t-cel_<?php echo($producto->i) ?>_6" name="t-cel_<?php echo($producto->i) ?>_6" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($producto->nombre) ?></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '<input type="text" maxlength="70"  id="t-cel_<?php echo($producto->i) ?>_6" name="t-cel_<?php echo($producto->i) ?>_6" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($producto->nombre) ?></input>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_costo" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_7" name="t-cel_<?php echo($producto->i) ?>_7" type="text" class="form-control"  placeholder="Costo"  title="Costo"    maxlength="18" size="12"  value="<?php echo($producto->costo) ?>" >
							<span id="spanstrMensajecosto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_activo" ><?php  $funciones->getCheckBoxEditar($producto->activo,'t-cel_<?php echo($producto->i) ?>_8',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_tipo_producto" ><?php echo($funciones->getComboBoxEditar($producto->id_tipo_producto_Descripcion,$producto->id_tipo_producto,'t-cel_'.$producto->i.'_9')) ?></td>
				
						<td class="elementotabla col_cantidad_inicial" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_10" name="t-cel_<?php echo($producto->i) ?>_10" type="text" class="form-control"  placeholder="Cantidad Inicial"  title="Cantidad Inicial"    maxlength="18" size="12"  value="<?php echo($producto->cantidad_inicial) ?>" >
							<span id="spanstrMensajecantidad_inicial" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_impuesto" ><?php echo($funciones->getComboBoxEditar($producto->id_impuesto_Descripcion,$producto->id_impuesto,'t-cel_'.$producto->i.'_11')) ?></td>
				<td class="elementotabla col_id_otro_impuesto" ><?php echo($funciones->getComboBoxEditar($producto->id_otro_impuesto_Descripcion,$producto->id_otro_impuesto,'t-cel_'.$producto->i.'_12')) ?></td>
				
						<td class="elementotabla col_impuesto_ventas" ><?php  $funciones->getCheckBoxEditar($producto->impuesto_ventas,'t-cel_<?php echo($producto->i) ?>_13',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_otro_impuesto_ventas" ><?php  $funciones->getCheckBoxEditar($producto->otro_impuesto_ventas,'t-cel_<?php echo($producto->i) ?>_14',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_impuesto_compras" ><?php  $funciones->getCheckBoxEditar($producto->impuesto_compras,'t-cel_<?php echo($producto->i) ?>_15',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_otro_impuesto_compras" ><?php  $funciones->getCheckBoxEditar($producto->otro_impuesto_compras,'t-cel_<?php echo($producto->i) ?>_16',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_categoria_producto" ><?php echo($funciones->getComboBoxEditar($producto->id_categoria_producto_Descripcion,$producto->id_categoria_producto,'t-cel_'.$producto->i.'_17')) ?></td>
				<td class="elementotabla col_id_sub_categoria_producto" ><?php echo($funciones->getComboBoxEditar($producto->id_sub_categoria_producto_Descripcion,$producto->id_sub_categoria_producto,'t-cel_'.$producto->i.'_18')) ?></td>
				<td class="elementotabla col_id_bodega_defecto" ><?php echo($funciones->getComboBoxEditar($producto->id_bodega_defecto_Descripcion,$producto->id_bodega_defecto,'t-cel_'.$producto->i.'_19')) ?></td>
				<td class="elementotabla col_id_unidad_compra" ><?php echo($funciones->getComboBoxEditar($producto->id_unidad_compra_Descripcion,$producto->id_unidad_compra,'t-cel_'.$producto->i.'_20')) ?></td>
				
						<td class="elementotabla col_equivalencia_compra" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_21" name="t-cel_<?php echo($producto->i) ?>_21" type="text" class="form-control"  placeholder="Equivalencia En Compra"  title="Equivalencia En Compra"    maxlength="18" size="12"  value="<?php echo($producto->equivalencia_compra) ?>" >
							<span id="spanstrMensajeequivalencia_compra" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_unidad_venta" ><?php echo($funciones->getComboBoxEditar($producto->id_unidad_venta_Descripcion,$producto->id_unidad_venta,'t-cel_'.$producto->i.'_22')) ?></td>
				
						<td class="elementotabla col_equivalencia_venta" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_23" name="t-cel_<?php echo($producto->i) ?>_23" type="text" class="form-control"  placeholder="Equivalencia En Venta"  title="Equivalencia En Venta"    maxlength="18" size="12"  value="<?php echo($producto->equivalencia_venta) ?>" >
							<span id="spanstrMensajeequivalencia_venta" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($producto->i) ?>_24" name="t-cel_<?php echo($producto->i) ?>_24" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($producto->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($producto->i) ?>_24" name="t-cel_<?php echo($producto->i) ?>_24" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($producto->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_imagen" >  '<textarea id="t-cel_<?php echo($producto->i) ?>_25" name="t-cel_<?php echo($producto->i) ?>_25" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($producto->imagen) ?></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_imagen" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($producto->i) ?>_25" name="t-cel_<?php echo($producto->i) ?>_25" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($producto->imagen) ?></input>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_observacion" >  '<textarea id="t-cel_<?php echo($producto->i) ?>_26" name="t-cel_<?php echo($producto->i) ?>_26" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($producto->observacion) ?></textarea>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_observacion" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($producto->i) ?>_26" name="t-cel_<?php echo($producto->i) ?>_26" class="form-control"  placeholder="Observacion"  title="Observacion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($producto->observacion) ?></input>
							<span id="spanstrMensajeobservacion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_comenta_factura" ><?php  $funciones->getCheckBoxEditar($producto->comenta_factura,'t-cel_<?php echo($producto->i) ?>_27',$paraReporte)  ?>
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_fabricante" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_28" name="t-cel_<?php echo($producto->i) ?>_28" type="text" class="form-control"  placeholder="Codigo Fabricante"  title="Codigo Fabricante"    size="20"  maxlength="24" value="<?php echo($producto->codigo_fabricante) ?>" />
							<span id="spanstrMensajecodigo_fabricante" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_fabricante" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_28" name="t-cel_<?php echo($producto->i) ?>_28" type="text" class="form-control"  placeholder="Codigo Fabricante"  title="Codigo Fabricante"    size="20"  maxlength="24" value="<?php echo($producto->codigo_fabricante) ?>" />
							<span id="spanstrMensajecodigo_fabricante" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_cantidad" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_29" name="t-cel_<?php echo($producto->i) ?>_29" type="text" class="form-control"  placeholder="Cantidad"  title="Cantidad"    maxlength="18" size="12"  value="<?php echo($producto->cantidad) ?>" >
							<span id="spanstrMensajecantidad" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_cantidad_minima" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_30" name="t-cel_<?php echo($producto->i) ?>_30" type="text" class="form-control"  placeholder="Cantidad Minima"  title="Cantidad Minima"    maxlength="18" size="12"  value="<?php echo($producto->cantidad_minima) ?>" >
							<span id="spanstrMensajecantidad_minima" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_cantidad_maxima" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_31" name="t-cel_<?php echo($producto->i) ?>_31" type="text" class="form-control"  placeholder="Cantidad Maxima"  title="Cantidad Maxima"    maxlength="18" size="12"  value="<?php echo($producto->cantidad_maxima) ?>" >
							<span id="spanstrMensajecantidad_maxima" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_factura_sin_stock" ><?php  $funciones->getCheckBoxEditar($producto->factura_sin_stock,'t-cel_<?php echo($producto->i) ?>_32',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_mostrar_componente" ><?php  $funciones->getCheckBoxEditar($producto->mostrar_componente,'t-cel_<?php echo($producto->i) ?>_33',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_producto_equivalente" ><?php  $funciones->getCheckBoxEditar($producto->producto_equivalente,'t-cel_<?php echo($producto->i) ?>_34',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_avisa_expiracion" ><?php  $funciones->getCheckBoxEditar($producto->avisa_expiracion,'t-cel_<?php echo($producto->i) ?>_35',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_requiere_serie" ><?php  $funciones->getCheckBoxEditar($producto->requiere_serie,'t-cel_<?php echo($producto->i) ?>_36',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_acepta_lote" ><?php  $funciones->getCheckBoxEditar($producto->acepta_lote,'t-cel_<?php echo($producto->i) ?>_37',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_cuenta_venta" ><?php echo($funciones->getComboBoxEditar($producto->id_cuenta_venta_Descripcion,$producto->id_cuenta_venta,'t-cel_'.$producto->i.'_38')) ?></td>
				<td class="elementotabla col_id_cuenta_compra" ><?php echo($funciones->getComboBoxEditar($producto->id_cuenta_compra_Descripcion,$producto->id_cuenta_compra,'t-cel_'.$producto->i.'_39')) ?></td>
				<td class="elementotabla col_id_cuenta_costo" ><?php echo($funciones->getComboBoxEditar($producto->id_cuenta_costo_Descripcion,$producto->id_cuenta_costo,'t-cel_'.$producto->i.'_40')) ?></td>
				
						<td class="elementotabla col_valor_inventario" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_41" name="t-cel_<?php echo($producto->i) ?>_41" type="text" class="form-control"  placeholder="Valor Inventario"  title="Valor Inventario"    maxlength="18" size="12"  value="<?php echo($producto->valor_inventario) ?>" >
							<span id="spanstrMensajevalor_inventario" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_producto_fisico" >  '
							<input id="t-cel_<?php echo($producto->i) ?>_42" name="t-cel_<?php echo($producto->i) ?>_42" type="text" class="form-control"  placeholder="Producto Fisico"  title="Producto Fisico"    maxlength="10" size="10"  value="<?php echo($producto->producto_fisico) ?>" >
							<span id="spanstrMensajeproducto_fisico" class="mensajeerror"></span>' 
						</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionimagen_producto" idactualproducto="<?php echo($producto->id) ?>" title="Imagenes ProductoS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/imagen_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionlista_cliente" idactualproducto="<?php echo($producto->id) ?>" title="Lista ClienteS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionlista_precio" idactualproducto="<?php echo($producto->id) ?>" title="Lista PreciosS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_precios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionlista_producto" idactualproducto="<?php echo($producto->id) ?>" title="Lista ProductosS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionotro_suplidor" idactualproducto="<?php echo($producto->id) ?>" title="Otro SuplidorS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/otro_suplidors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($producto->id) ?>
							<img class="imgrelacionproducto_bodega" idactualproducto="<?php echo($producto->id) ?>" title="Producto BodegaS DE Producto" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/producto_bodegas.gif" alt="Seleccionar" border="" height="15" width="15">
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



