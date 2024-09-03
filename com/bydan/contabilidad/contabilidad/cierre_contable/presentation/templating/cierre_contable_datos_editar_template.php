



		<form id="frmTablaDatoscierre_contable" name="frmTablaDatoscierre_contable">
			<div id="divTablaDatosAuxiliarcierre_contablesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($cierre_contables)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocierre_contable" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cierres Contableses</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscierre_contables" name="tblTablaDatoscierre_contables" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Cierre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ganancias Perdidas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Cuentas.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Cierre Detalles</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Cierre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ganancias Perdidas.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Cuentas.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Cierre Detalles</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($cierre_contablesLocal!=null && count($cierre_contablesLocal)>0) { ?>
			<?php foreach ($cierre_contablesLocal as $cierre_contable) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cierre_contable->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cierre_contable->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cierre_contable->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcierre_contable" idactualcierre_contable="<?php echo($cierre_contable->id) ?>" title="SELECCIONAR Cierres Contables ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($cierre_contable->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacierre_contable" idactualcierre_contable="<?php echo($cierre_contable->id) ?>" title="ELIMINAR Cierres Contables ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($cierre_contable->i) ?>" name="t-id_<?php echo($cierre_contable->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cierres Contables ACTUAL" value="<?php echo($cierre_contable->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($cierre_contable->i) ?>_0" name="t-cel_<?php echo($cierre_contable->i) ?>_0" type="text" maxlength="25" value="<?php echo($cierre_contable->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($cierre_contable->id) ?><img class="imgseleccionarmostraraccionesrelacionescierre_contable" idactualcierre_contable="<?php echo($cierre_contable->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $cierre_contable->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $cierre_contable->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($cierre_contable->id_empresa_Descripcion,$cierre_contable->id_empresa,'t-cel_'.$cierre_contable->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($cierre_contable->id_ejercicio_Descripcion,$cierre_contable->id_ejercicio,'t-cel_'.$cierre_contable->i.'_4')) ?></td>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($cierre_contable->id_periodo_Descripcion,$cierre_contable->id_periodo,'t-cel_'.$cierre_contable->i.'_5')) ?></td>
				
						<td class="elementotabla col_fecha_cierre" >  '
							<input id="t-cel_<?php echo($cierre_contable->i) ?>_6" name="t-cel_<?php echo($cierre_contable->i) ?>_6" type="text" class="form-control"  placeholder="Fecha Cierre"  title="Fecha Cierre"    size="10"  value="<?php echo($cierre_contable->fecha_cierre) ?>" >
							<span id="spanstrMensajefecha_cierre" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_gan_per" >  '
							<input id="t-cel_<?php echo($cierre_contable->i) ?>_7" name="t-cel_<?php echo($cierre_contable->i) ?>_7" type="text" class="form-control"  placeholder="Ganancias Perdidas"  title="Ganancias Perdidas"    maxlength="22" size="12"  value="<?php echo($cierre_contable->gan_per) ?>" >
							<span id="spanstrMensajegan_per" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_total_cuentas" >  '
							<input id="t-cel_<?php echo($cierre_contable->i) ?>_8" name="t-cel_<?php echo($cierre_contable->i) ?>_8" type="text" class="form-control"  placeholder="Total Cuentas"  title="Total Cuentas"    maxlength="10" size="10"  value="<?php echo($cierre_contable->total_cuentas) ?>" >
							<span id="spanstrMensajetotal_cuentas" class="mensajeerror"></span>' 
						</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cierre_contable->id) ?>
							<img class="imgrelacioncierre_contable_detalle" idactualcierre_contable="<?php echo($cierre_contable->id) ?>" title="Cierre DetalleS DE Cierres Contables" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cierre_contable_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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



