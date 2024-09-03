



		<form id="frmTablaDatosparametro_auxiliar" name="frmTablaDatosparametro_auxiliar">
			<div id="divTablaDatosAuxiliarparametro_auxiliarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_auxiliars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_auxiliar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Auxiliares</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_auxiliars" name="tblTablaDatosparametro_auxiliars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Asignado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Solo Costo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Costeo Kardex.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Producto Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Busqueda Incremental</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Permitir Revisar Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Decimales Unidades.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Documento Anulado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Cc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Eliminacion Fisica Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Asiento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Asiento Simple Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Cliente Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Proveedor</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Proveedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Proveedor Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Abreviatura Registro Tributario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Asiento Cheque</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Asignado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Solo Costo Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Producto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Producto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Costeo Kardex.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Producto Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Busqueda Incremental</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Permitir Revisar Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Decimales Unidades.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Documento Anulado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Cc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Eliminacion Fisica Asiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Asiento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Asiento Simple Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Cliente Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Codigo Secuencial Proveedor</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador Proveedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Proveedor Inactivo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Abreviatura Registro Tributario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Asiento Cheque</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_auxiliarsLocal!=null && count($parametro_auxiliarsLocal)>0) { ?>
			<?php foreach ($parametro_auxiliarsLocal as $parametro_auxiliar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_auxiliar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_auxiliar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_auxiliar->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_auxiliar" idactualparametro_auxiliar="<?php echo($parametro_auxiliar->id) ?>" title="SELECCIONAR Parametro Auxiliar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($parametro_auxiliar->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaparametro_auxiliar" idactualparametro_auxiliar="<?php echo($parametro_auxiliar->id) ?>" title="ELIMINAR Parametro Auxiliar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($parametro_auxiliar->i) ?>" name="t-id_<?php echo($parametro_auxiliar->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro Auxiliar ACTUAL" value="<?php echo($parametro_auxiliar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_0" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_auxiliar->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $parametro_auxiliar->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $parametro_auxiliar->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($parametro_auxiliar->id_empresa_Descripcion,$parametro_auxiliar->id_empresa,'t-cel_'.$parametro_auxiliar->i.'_3')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_asignado" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_4" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_4" type="text" class="form-control"  placeholder="Nombre Asignado"  title="Nombre Asignado"    size="20"  maxlength="30" value="<?php echo($parametro_auxiliar->nombre_asignado) ?>" />
							<span id="spanstrMensajenombre_asignado" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_asignado" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_4" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_4" type="text" class="form-control"  placeholder="Nombre Asignado"  title="Nombre Asignado"    size="20"  maxlength="30" value="<?php echo($parametro_auxiliar->nombre_asignado) ?>" />
							<span id="spanstrMensajenombre_asignado" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_siguiente_numero_correlativo" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_5" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_5" type="text" class="form-control"  placeholder="Siguiente Numero Correlativo"  title="Siguiente Numero Correlativo"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar->siguiente_numero_correlativo) ?>" >
							<span id="spanstrMensajesiguiente_numero_correlativo" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_incremento" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_6" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_6" type="text" class="form-control"  placeholder="Incremento"  title="Incremento"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar->incremento) ?>" >
							<span id="spanstrMensajeincremento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_mostrar_solo_costo_producto" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->mostrar_solo_costo_producto,'t-cel_<?php echo($parametro_auxiliar->i) ?>_7',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_codigo_secuencial_producto" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->con_codigo_secuencial_producto,'t-cel_<?php echo($parametro_auxiliar->i) ?>_8',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_contador_producto" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_9" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_9" type="text" class="form-control"  placeholder="Contador Producto"  title="Contador Producto"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar->contador_producto) ?>" >
							<span id="spanstrMensajecontador_producto" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_tipo_costeo_kardex" ><?php echo($funciones->getComboBoxEditar($parametro_auxiliar->id_tipo_costeo_kardex_Descripcion,$parametro_auxiliar->id_tipo_costeo_kardex,'t-cel_'.$parametro_auxiliar->i.'_10')) ?></td>
				
						<td class="elementotabla col_con_producto_inactivo" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->con_producto_inactivo,'t-cel_<?php echo($parametro_auxiliar->i) ?>_11',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_busqueda_incremental" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->con_busqueda_incremental,'t-cel_<?php echo($parametro_auxiliar->i) ?>_12',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_permitir_revisar_asiento" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->permitir_revisar_asiento,'t-cel_<?php echo($parametro_auxiliar->i) ?>_13',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_numero_decimales_unidades" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_14" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_14" type="text" class="form-control"  placeholder="Numero Decimales Unidades"  title="Numero Decimales Unidades"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar->numero_decimales_unidades) ?>" >
							<span id="spanstrMensajenumero_decimales_unidades" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_mostrar_documento_anulado" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->mostrar_documento_anulado,'t-cel_<?php echo($parametro_auxiliar->i) ?>_15',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_siguiente_numero_correlativo_cc" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_16" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_16" type="text" class="form-control"  placeholder="Siguiente Numero Correlativo Cc"  title="Siguiente Numero Correlativo Cc"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar->siguiente_numero_correlativo_cc) ?>" >
							<span id="spanstrMensajesiguiente_numero_correlativo_cc" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_eliminacion_fisica_asiento" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->con_eliminacion_fisica_asiento,'t-cel_<?php echo($parametro_auxiliar->i) ?>_17',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_siguiente_numero_correlativo_asiento" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_18" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_18" type="text" class="form-control"  placeholder="Siguiente Numero Correlativo Asiento"  title="Siguiente Numero Correlativo Asiento"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar->siguiente_numero_correlativo_asiento) ?>" >
							<span id="spanstrMensajesiguiente_numero_correlativo_asiento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_asiento_simple_factura" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->con_asiento_simple_factura,'t-cel_<?php echo($parametro_auxiliar->i) ?>_19',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_codigo_secuencial_cliente" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->con_codigo_secuencial_cliente,'t-cel_<?php echo($parametro_auxiliar->i) ?>_20',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_contador_cliente" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_21" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_21" type="text" class="form-control"  placeholder="Contador Cliente"  title="Contador Cliente"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar->contador_cliente) ?>" >
							<span id="spanstrMensajecontador_cliente" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_cliente_inactivo" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->con_cliente_inactivo,'t-cel_<?php echo($parametro_auxiliar->i) ?>_22',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_codigo_secuencial_proveedor" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->con_codigo_secuencial_proveedor,'t-cel_<?php echo($parametro_auxiliar->i) ?>_23',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_contador_proveedor" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_24" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_24" type="text" class="form-control"  placeholder="Contador Proveedor"  title="Contador Proveedor"    maxlength="10" size="10"  value="<?php echo($parametro_auxiliar->contador_proveedor) ?>" >
							<span id="spanstrMensajecontador_proveedor" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_proveedor_inactivo" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->con_proveedor_inactivo,'t-cel_<?php echo($parametro_auxiliar->i) ?>_25',$paraReporte)  ?>
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_abreviatura_registro_tributario" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_26" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_26" type="text" class="form-control"  placeholder="Abreviatura Registro Tributario"  title="Abreviatura Registro Tributario"    size="20"  maxlength="20" value="<?php echo($parametro_auxiliar->abreviatura_registro_tributario) ?>" />
							<span id="spanstrMensajeabreviatura_registro_tributario" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_abreviatura_registro_tributario" >  '
							<input id="t-cel_<?php echo($parametro_auxiliar->i) ?>_26" name="t-cel_<?php echo($parametro_auxiliar->i) ?>_26" type="text" class="form-control"  placeholder="Abreviatura Registro Tributario"  title="Abreviatura Registro Tributario"    size="20"  maxlength="20" value="<?php echo($parametro_auxiliar->abreviatura_registro_tributario) ?>" />
							<span id="spanstrMensajeabreviatura_registro_tributario" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_con_asiento_cheque" ><?php  $funciones->getCheckBoxEditar($parametro_auxiliar->con_asiento_cheque,'t-cel_<?php echo($parametro_auxiliar->i) ?>_27',$paraReporte)  ?>
						</td>

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



