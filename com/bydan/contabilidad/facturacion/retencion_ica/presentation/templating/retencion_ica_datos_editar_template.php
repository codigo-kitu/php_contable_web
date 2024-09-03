



		<form id="frmTablaDatosretencion_ica" name="frmTablaDatosretencion_ica">
			<div id="divTablaDatosAuxiliarretencion_icasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($retencion_icas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloretencion_ica" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Retencion Icas</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosretencion_icas" name="tblTablaDatosretencion_icas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Base.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Compras</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Base.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuentas Compras</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
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

		<?php if($retencion_icasLocal!=null && count($retencion_icasLocal)>0) { ?>
			<?php foreach ($retencion_icasLocal as $retencion_ica) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($retencion_ica->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$retencion_ica->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($retencion_ica->id) ?>
							</td>
							<td>
								<img class="imgseleccionarretencion_ica" idactualretencion_ica="<?php echo($retencion_ica->id) ?>" title="SELECCIONAR Retencion Ica ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($retencion_ica->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaretencion_ica" idactualretencion_ica="<?php echo($retencion_ica->id) ?>" title="ELIMINAR Retencion Ica ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($retencion_ica->i) ?>" name="t-id_<?php echo($retencion_ica->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Retencion Ica ACTUAL" value="<?php echo($retencion_ica->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($retencion_ica->i) ?>_0" name="t-cel_<?php echo($retencion_ica->i) ?>_0" type="text" maxlength="25" value="<?php echo($retencion_ica->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($retencion_ica->id) ?><img class="imgseleccionarmostraraccionesrelacionesretencion_ica" idactualretencion_ica="<?php echo($retencion_ica->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $retencion_ica->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $retencion_ica->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($retencion_ica->id_empresa_Descripcion,$retencion_ica->id_empresa,'t-cel_'.$retencion_ica->i.'_3')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($retencion_ica->i) ?>_4" name="t-cel_<?php echo($retencion_ica->i) ?>_4" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="5"  maxlength="5" value="<?php echo($retencion_ica->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($retencion_ica->i) ?>_4" name="t-cel_<?php echo($retencion_ica->i) ?>_4" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="5"  maxlength="5" value="<?php echo($retencion_ica->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '
							<input id="t-cel_<?php echo($retencion_ica->i) ?>_5" name="t-cel_<?php echo($retencion_ica->i) ?>_5" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="40" value="<?php echo($retencion_ica->descripcion) ?>" />
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '
							<input id="t-cel_<?php echo($retencion_ica->i) ?>_5" name="t-cel_<?php echo($retencion_ica->i) ?>_5" type="text" class="form-control"  placeholder="Descripcion"  title="Descripcion"    size="20"  maxlength="40" value="<?php echo($retencion_ica->descripcion) ?>" />
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_valor" >  '
							<input id="t-cel_<?php echo($retencion_ica->i) ?>_6" name="t-cel_<?php echo($retencion_ica->i) ?>_6" type="text" class="form-control"  placeholder="Valor"  title="Valor"    maxlength="18" size="12"  value="<?php echo($retencion_ica->valor) ?>" >
							<span id="spanstrMensajevalor" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_valor_base" >  '
							<input id="t-cel_<?php echo($retencion_ica->i) ?>_7" name="t-cel_<?php echo($retencion_ica->i) ?>_7" type="text" class="form-control"  placeholder="Valor Base"  title="Valor Base"    maxlength="18" size="12"  value="<?php echo($retencion_ica->valor_base) ?>" >
							<span id="spanstrMensajevalor_base" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_predeterminado" ><?php  $funciones->getCheckBoxEditar($retencion_ica->predeterminado,'t-cel_<?php echo($retencion_ica->i) ?>_8',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_cuenta_ventas" ><?php echo($funciones->getComboBoxEditar($retencion_ica->id_cuenta_ventas_Descripcion,$retencion_ica->id_cuenta_ventas,'t-cel_'.$retencion_ica->i.'_9')) ?></td>
				<td class="elementotabla col_id_cuenta_compras" ><?php echo($funciones->getComboBoxEditar($retencion_ica->id_cuenta_compras_Descripcion,$retencion_ica->id_cuenta_compras,'t-cel_'.$retencion_ica->i.'_10')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($retencion_ica->id) ?>
							<img class="imgrelacioncliente" idactualretencion_ica="<?php echo($retencion_ica->id) ?>" title="ClienteS DE Retencion Ica" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($retencion_ica->id) ?>
							<img class="imgrelacionproveedor" idactualretencion_ica="<?php echo($retencion_ica->id) ?>" title="ProveedorS DE Retencion Ica" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
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



