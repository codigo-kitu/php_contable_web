



		<form id="frmTablaDatosasiento_automatico" name="frmTablaDatosasiento_automatico">
			<div id="divTablaDatosAuxiliarasiento_automaticosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($asiento_automaticos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloasiento_automatico" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Asiento Automaticos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosasiento_automaticos" name="tblTablaDatosasiento_automaticos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Modulo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fuente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Libro Auxiliar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Centro Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalle s</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla"> Modulo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fuente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Libro Auxiliar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Centro Costo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalle s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($asiento_automaticosLocal!=null && count($asiento_automaticosLocal)>0) { ?>
			<?php foreach ($asiento_automaticosLocal as $asiento_automatico) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($asiento_automatico->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$asiento_automatico->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($asiento_automatico->id) ?>
							</td>
							<td>
								<img class="imgseleccionarasiento_automatico" idactualasiento_automatico="<?php echo($asiento_automatico->id) ?>" title="SELECCIONAR Asiento Automatico ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($asiento_automatico->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaasiento_automatico" idactualasiento_automatico="<?php echo($asiento_automatico->id) ?>" title="ELIMINAR Asiento Automatico ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($asiento_automatico->i) ?>" name="t-id_<?php echo($asiento_automatico->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Asiento Automatico ACTUAL" value="<?php echo($asiento_automatico->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($asiento_automatico->i) ?>_0" name="t-cel_<?php echo($asiento_automatico->i) ?>_0" type="text" maxlength="25" value="<?php echo($asiento_automatico->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($asiento_automatico->id) ?><img class="imgseleccionarmostraraccionesrelacionesasiento_automatico" idactualasiento_automatico="<?php echo($asiento_automatico->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $asiento_automatico->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $asiento_automatico->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($asiento_automatico->id_empresa_Descripcion,$asiento_automatico->id_empresa,'t-cel_'.$asiento_automatico->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_modulo" ><?php echo($funciones->getComboBoxEditar($asiento_automatico->id_modulo_Descripcion,$asiento_automatico->id_modulo,'t-cel_'.$asiento_automatico->i.'_4')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($asiento_automatico->i) ?>_5" name="t-cel_<?php echo($asiento_automatico->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50" value="<?php echo($asiento_automatico->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($asiento_automatico->i) ?>_5" name="t-cel_<?php echo($asiento_automatico->i) ?>_5" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50" value="<?php echo($asiento_automatico->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '<textarea id="t-cel_<?php echo($asiento_automatico->i) ?>_6" name="t-cel_<?php echo($asiento_automatico->i) ?>_6" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($asiento_automatico->nombre) ?></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($asiento_automatico->i) ?>_6" name="t-cel_<?php echo($asiento_automatico->i) ?>_6" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($asiento_automatico->nombre) ?></input>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_fuente" ><?php echo($funciones->getComboBoxEditar($asiento_automatico->id_fuente_Descripcion,$asiento_automatico->id_fuente,'t-cel_'.$asiento_automatico->i.'_7')) ?></td>
				<td class="elementotabla col_id_libro_auxiliar" ><?php echo($funciones->getComboBoxEditar($asiento_automatico->id_libro_auxiliar_Descripcion,$asiento_automatico->id_libro_auxiliar,'t-cel_'.$asiento_automatico->i.'_8')) ?></td>
				<td class="elementotabla col_id_centro_costo" ><?php echo($funciones->getComboBoxEditar($asiento_automatico->id_centro_costo_Descripcion,$asiento_automatico->id_centro_costo,'t-cel_'.$asiento_automatico->i.'_9')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($asiento_automatico->i) ?>_10" name="t-cel_<?php echo($asiento_automatico->i) ?>_10" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($asiento_automatico->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($asiento_automatico->i) ?>_10" name="t-cel_<?php echo($asiento_automatico->i) ?>_10" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($asiento_automatico->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_activo" ><?php  $funciones->getCheckBoxEditar($asiento_automatico->activo,'t-cel_<?php echo($asiento_automatico->i) ?>_11',$paraReporte)  ?>
						</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($asiento_automatico->id) ?>
							<img class="imgrelacionasiento_automatico_detalle" idactualasiento_automatico="<?php echo($asiento_automatico->id) ?>" title="Detalle Asiento AutomaticoS DE Asiento Automatico" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_automatico_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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



