



		<form id="frmTablaDatosasiento" name="frmTablaDatosasiento">
			<div id="divTablaDatosAuxiliarasientosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($asientos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloasiento" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Asientos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosasientos" name="tblTablaDatosasientos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Empresa.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Asiento Predefinido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Documento Contable.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Libro Auxiliar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Fuente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Centro Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Debito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Credito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Diferencia.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalle es</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla"> Empresa.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Asiento Predefinido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Documento Contable.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Libro Auxiliar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Fuente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Centro Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Debito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Credito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Diferencia.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalle es</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($asientosLocal!=null && count($asientosLocal)>0) { ?>
			<?php foreach ($asientosLocal as $asiento) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($asiento->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$asiento->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($asiento->id) ?>
							</td>
							<td>
								<img class="imgseleccionarasiento" idactualasiento="<?php echo($asiento->id) ?>" title="SELECCIONAR Asiento ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($asiento->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaasiento" idactualasiento="<?php echo($asiento->id) ?>" title="ELIMINAR Asiento ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($asiento->i) ?>" name="t-id_<?php echo($asiento->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Asiento ACTUAL" value="<?php echo($asiento->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($asiento->i) ?>_0" name="t-cel_<?php echo($asiento->i) ?>_0" type="text" maxlength="25" value="<?php echo($asiento->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($asiento->id) ?><img class="imgseleccionarmostraraccionesrelacionesasiento" idactualasiento="<?php echo($asiento->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $asiento->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $asiento->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($asiento->id_empresa_Descripcion,$asiento->id_empresa,'t-cel_'.$asiento->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_sucursal" ><?php echo($funciones->getComboBoxEditar($asiento->id_sucursal_Descripcion,$asiento->id_sucursal,'t-cel_'.$asiento->i.'_4')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($asiento->id_ejercicio_Descripcion,$asiento->id_ejercicio,'t-cel_'.$asiento->i.'_5')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($asiento->id_periodo_Descripcion,$asiento->id_periodo,'t-cel_'.$asiento->i.'_6')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($asiento->id_usuario_Descripcion,$asiento->id_usuario,'t-cel_'.$asiento->i.'_7')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero" >  '
							<input id="t-cel_<?php echo($asiento->i) ?>_8" name="t-cel_<?php echo($asiento->i) ?>_8" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="10"  maxlength="10" value="<?php echo($asiento->numero) ?>" />
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero" >  '
							<input id="t-cel_<?php echo($asiento->i) ?>_8" name="t-cel_<?php echo($asiento->i) ?>_8" type="text" class="form-control"  placeholder="Numero"  title="Numero"    size="10"  maxlength="10" value="<?php echo($asiento->numero) ?>" />
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha" >  '
							<input id="t-cel_<?php echo($asiento->i) ?>_9" name="t-cel_<?php echo($asiento->i) ?>_9" type="text" class="form-control"  placeholder="Fecha"  title="Fecha"    size="10"  value="<?php echo($asiento->fecha) ?>" >
							<span id="spanstrMensajefecha" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_asiento_predefinido" ><?php echo($funciones->getComboBoxEditar($asiento->id_asiento_predefinido_Descripcion,$asiento->id_asiento_predefinido,'t-cel_'.$asiento->i.'_10')) ?></td>
				<td class="elementotabla col_id_documento_contable" ><?php echo($funciones->getComboBoxEditar($asiento->id_documento_contable_Descripcion,$asiento->id_documento_contable,'t-cel_'.$asiento->i.'_11')) ?></td>
				<td class="elementotabla col_id_libro_auxiliar" ><?php echo($funciones->getComboBoxEditar($asiento->id_libro_auxiliar_Descripcion,$asiento->id_libro_auxiliar,'t-cel_'.$asiento->i.'_12')) ?></td>
				<td class="elementotabla col_id_fuente" ><?php echo($funciones->getComboBoxEditar($asiento->id_fuente_Descripcion,$asiento->id_fuente,'t-cel_'.$asiento->i.'_13')) ?></td>
				<td class="elementotabla col_id_centro_costo" ><?php echo($funciones->getComboBoxEditar($asiento->id_centro_costo_Descripcion,$asiento->id_centro_costo,'t-cel_'.$asiento->i.'_14')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($asiento->i) ?>_15" name="t-cel_<?php echo($asiento->i) ?>_15" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($asiento->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($asiento->i) ?>_15" name="t-cel_<?php echo($asiento->i) ?>_15" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($asiento->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_total_debito" >  '
							<input id="t-cel_<?php echo($asiento->i) ?>_16" name="t-cel_<?php echo($asiento->i) ?>_16" type="text" class="form-control"  placeholder="Total Debito"  title="Total Debito"    maxlength="18" size="12"  value="<?php echo($asiento->total_debito) ?>"  readonly="readonly">
							<span id="spanstrMensajetotal_debito" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_total_credito" >  '
							<input id="t-cel_<?php echo($asiento->i) ?>_17" name="t-cel_<?php echo($asiento->i) ?>_17" type="text" class="form-control"  placeholder="Total Credito"  title="Total Credito"    maxlength="18" size="12"  value="<?php echo($asiento->total_credito) ?>"  readonly="readonly">
							<span id="spanstrMensajetotal_credito" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_diferencia" >  '
							<input id="t-cel_<?php echo($asiento->i) ?>_18" name="t-cel_<?php echo($asiento->i) ?>_18" type="text" class="form-control"  placeholder="Diferencia"  title="Diferencia"    maxlength="18" size="12"  value="<?php echo($asiento->diferencia) ?>"  readonly="readonly">
							<span id="spanstrMensajediferencia" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_estado" ><?php echo($funciones->getComboBoxEditar($asiento->id_estado_Descripcion,$asiento->id_estado,'t-cel_'.$asiento->i.'_19')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($asiento->id) ?>
							<img class="imgrelacionasiento_detalle" idactualasiento="<?php echo($asiento->id) ?>" title="Detalle AsientoS DE Asiento" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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



