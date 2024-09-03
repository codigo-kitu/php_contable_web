



		<form id="frmTablaDatosinventario_fisico" name="frmTablaDatosinventario_fisico">
			<div id="divTablaDatosAuxiliarinventario_fisicosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($inventario_fisicos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloinventario_fisico" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Inventario Fisicos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosinventario_fisicos" name="tblTablaDatosinventario_fisicos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Inventario Fisico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Almacen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Prod Cont Almacen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Productos Almacen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo3.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>s</pre></b>
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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Inventario Fisico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Bodega.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Almacen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Prod Cont Almacen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Productos Almacen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo3.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($inventario_fisicosLocal!=null && count($inventario_fisicosLocal)>0) { ?>
			<?php foreach ($inventario_fisicosLocal as $inventario_fisico) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($inventario_fisico->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$inventario_fisico->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($inventario_fisico->id) ?>
							</td>
							<td>
								<img class="imgseleccionarinventario_fisico" idactualinventario_fisico="<?php echo($inventario_fisico->id) ?>" title="SELECCIONAR Inventario Fisico ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($inventario_fisico->id) ?>
							</td>
							<td>
								<img class="imgeliminartablainventario_fisico" idactualinventario_fisico="<?php echo($inventario_fisico->id) ?>" title="ELIMINAR Inventario Fisico ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($inventario_fisico->i) ?>" name="t-id_<?php echo($inventario_fisico->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Inventario Fisico ACTUAL" value="<?php echo($inventario_fisico->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($inventario_fisico->i) ?>_0" name="t-cel_<?php echo($inventario_fisico->i) ?>_0" type="text" maxlength="25" value="<?php echo($inventario_fisico->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($inventario_fisico->id) ?><img class="imgseleccionarmostraraccionesrelacionesinventario_fisico" idactualinventario_fisico="<?php echo($inventario_fisico->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $inventario_fisico->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $inventario_fisico->updated_at 
					</td>
				<td class="elementotabla col_id_inventario_fisico" ><?php echo($funciones->getComboBoxEditar($inventario_fisico->id_inventario_fisico_Descripcion,$inventario_fisico->id_inventario_fisico,'t-cel_'.$inventario_fisico->i.'_3')) ?></td>
				<td class="elementotabla col_id_bodega" ><?php echo($funciones->getComboBoxEditar($inventario_fisico->id_bodega_Descripcion,$inventario_fisico->id_bodega,'t-cel_'.$inventario_fisico->i.'_4')) ?></td>
				
						<td class="elementotabla col_fecha" >  '
							<input id="t-cel_<?php echo($inventario_fisico->i) ?>_5" name="t-cel_<?php echo($inventario_fisico->i) ?>_5" type="text" class="form-control"  placeholder="Fecha"  title="Fecha"    size="10"  value="<?php echo($inventario_fisico->fecha) ?>" >
							<span id="spanstrMensajefecha" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($inventario_fisico->i) ?>_6" name="t-cel_<?php echo($inventario_fisico->i) ?>_6" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($inventario_fisico->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($inventario_fisico->i) ?>_6" name="t-cel_<?php echo($inventario_fisico->i) ?>_6" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($inventario_fisico->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_id_almacen" >  '
							<input id="t-cel_<?php echo($inventario_fisico->i) ?>_7" name="t-cel_<?php echo($inventario_fisico->i) ?>_7" type="text" class="form-control"  placeholder="Id Almacen"  title="Id Almacen"    maxlength="19" size="10"  value="<?php echo($inventario_fisico->id_almacen) ?>" >
							<span id="spanstrMensajeid_almacen" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_prod_cont_almacen" >  '
							<input id="t-cel_<?php echo($inventario_fisico->i) ?>_8" name="t-cel_<?php echo($inventario_fisico->i) ?>_8" type="text" class="form-control"  placeholder="Prod Cont Almacen"  title="Prod Cont Almacen"    maxlength="18" size="12"  value="<?php echo($inventario_fisico->prod_cont_almacen) ?>" >
							<span id="spanstrMensajeprod_cont_almacen" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_total_productos_almacen" >  '
							<input id="t-cel_<?php echo($inventario_fisico->i) ?>_9" name="t-cel_<?php echo($inventario_fisico->i) ?>_9" type="text" class="form-control"  placeholder="Total Productos Almacen"  title="Total Productos Almacen"    maxlength="18" size="12"  value="<?php echo($inventario_fisico->total_productos_almacen) ?>" >
							<span id="spanstrMensajetotal_productos_almacen" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_campo1" >  '<textarea id="t-cel_<?php echo($inventario_fisico->i) ?>_10" name="t-cel_<?php echo($inventario_fisico->i) ?>_10" class="form-control"  placeholder="Campo1"  title="Campo1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($inventario_fisico->campo1) ?></textarea>
							<span id="spanstrMensajecampo1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_campo1" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($inventario_fisico->i) ?>_10" name="t-cel_<?php echo($inventario_fisico->i) ?>_10" class="form-control"  placeholder="Campo1"  title="Campo1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($inventario_fisico->campo1) ?></input>
							<span id="spanstrMensajecampo1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_campo2" >  '
							<input id="t-cel_<?php echo($inventario_fisico->i) ?>_11" name="t-cel_<?php echo($inventario_fisico->i) ?>_11" type="text" class="form-control"  placeholder="Campo2"  title="Campo2"    maxlength="18" size="12"  value="<?php echo($inventario_fisico->campo2) ?>" >
							<span id="spanstrMensajecampo2" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_campo3" >  '<textarea id="t-cel_<?php echo($inventario_fisico->i) ?>_12" name="t-cel_<?php echo($inventario_fisico->i) ?>_12" class="form-control"  placeholder="Campo3"  title="Campo3"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($inventario_fisico->campo3) ?></textarea>
							<span id="spanstrMensajecampo3" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_campo3" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($inventario_fisico->i) ?>_12" name="t-cel_<?php echo($inventario_fisico->i) ?>_12" class="form-control"  placeholder="Campo3"  title="Campo3"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($inventario_fisico->campo3) ?></input>
							<span id="spanstrMensajecampo3" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($inventario_fisico->id) ?>
							<img class="imgrelacioninventario_fisico_detalle" idactualinventario_fisico="<?php echo($inventario_fisico->id) ?>" title="Inventario Fisico DetalleS DE Inventario Fisico" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/inventario_fisico_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($inventario_fisico->id) ?>
							<img class="imgrelacioninventario_fisico" idactualinventario_fisico="<?php echo($inventario_fisico->id) ?>" title="Inventario FisicoS DE Inventario Fisico" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/inventario_fisicos.gif" alt="Seleccionar" border="" height="15" width="15">
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



