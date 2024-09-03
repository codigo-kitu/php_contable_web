



		<form id="frmTablaDatosmoneda" name="frmTablaDatosmoneda">
			<div id="divTablaDatosAuxiliarmonedasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($monedas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulomoneda" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Monedas</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosmonedas" name="tblTablaDatosmonedas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Simbolo.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
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
				<b><pre>Parametro Generales</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Simbolo.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
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
				<b><pre>Parametro Generales</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($monedasLocal!=null && count($monedasLocal)>0) { ?>
			<?php foreach ($monedasLocal as $moneda) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($moneda->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$moneda->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($moneda->id) ?>
							</td>
							<td>
								<img class="imgseleccionarmoneda" idactualmoneda="<?php echo($moneda->id) ?>" title="SELECCIONAR Moneda ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($moneda->id) ?>
							</td>
							<td>
								<img class="imgeliminartablamoneda" idactualmoneda="<?php echo($moneda->id) ?>" title="ELIMINAR Moneda ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($moneda->i) ?>" name="t-id_<?php echo($moneda->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Moneda ACTUAL" value="<?php echo($moneda->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($moneda->i) ?>_0" name="t-cel_<?php echo($moneda->i) ?>_0" type="text" maxlength="25" value="<?php echo($moneda->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($moneda->id) ?><img class="imgseleccionarmostraraccionesrelacionesmoneda" idactualmoneda="<?php echo($moneda->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $moneda->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $moneda->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($moneda->id_empresa_Descripcion,$moneda->id_empresa,'t-cel_'.$moneda->i.'_3')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($moneda->i) ?>_4" name="t-cel_<?php echo($moneda->i) ?>_4" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="10"  maxlength="10" value="<?php echo($moneda->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($moneda->i) ?>_4" name="t-cel_<?php echo($moneda->i) ?>_4" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="10"  maxlength="10" value="<?php echo($moneda->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($moneda->i) ?>_5" name="t-cel_<?php echo($moneda->i) ?>_5" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="50" value="<?php echo($moneda->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($moneda->i) ?>_5" name="t-cel_<?php echo($moneda->i) ?>_5" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="50" value="<?php echo($moneda->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_simbolo" >  '
							<input id="t-cel_<?php echo($moneda->i) ?>_6" name="t-cel_<?php echo($moneda->i) ?>_6" type="text" class="form-control"  placeholder="Simbolo"  title="Simbolo"    size="5"  maxlength="5" value="<?php echo($moneda->simbolo) ?>" />
							<span id="spanstrMensajesimbolo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_simbolo" >  '
							<input id="t-cel_<?php echo($moneda->i) ?>_6" name="t-cel_<?php echo($moneda->i) ?>_6" type="text" class="form-control"  placeholder="Simbolo"  title="Simbolo"    size="5"  maxlength="5" value="<?php echo($moneda->simbolo) ?>" />
							<span id="spanstrMensajesimbolo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($moneda->id) ?>
							<img class="imgrelacionconsignacion" idactualmoneda="<?php echo($moneda->id) ?>" title="ConsignacionS DE Moneda" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/consignacions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($moneda->id) ?>
							<img class="imgrelacioncotizacion" idactualmoneda="<?php echo($moneda->id) ?>" title="CotizacionS DE Moneda" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cotizacions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($moneda->id) ?>
							<img class="imgrelaciondevolucion_factura" idactualmoneda="<?php echo($moneda->id) ?>" title="Devolucion FacturaS DE Moneda" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/devolucion_facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($moneda->id) ?>
							<img class="imgrelaciondevolucion" idactualmoneda="<?php echo($moneda->id) ?>" title="DevolucionS DE Moneda" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/devolucions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($moneda->id) ?>
							<img class="imgrelacionestimado" idactualmoneda="<?php echo($moneda->id) ?>" title="EstimadoS DE Moneda" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/estimados.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($moneda->id) ?>
							<img class="imgrelacionfactura_lote" idactualmoneda="<?php echo($moneda->id) ?>" title="Facturas LotesS DE Moneda" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/factura_lotes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($moneda->id) ?>
							<img class="imgrelacionfactura" idactualmoneda="<?php echo($moneda->id) ?>" title="FacturaS DE Moneda" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($moneda->id) ?>
							<img class="imgrelacionorden_compra" idactualmoneda="<?php echo($moneda->id) ?>" title="Orden CompraS DE Moneda" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/orden_compras.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($moneda->id) ?>
							<img class="imgrelacionparametro_general" idactualmoneda="<?php echo($moneda->id) ?>" title="Parametro GeneralS DE Moneda" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/parametro_generals.gif" alt="Seleccionar" border="" height="15" width="15">
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



