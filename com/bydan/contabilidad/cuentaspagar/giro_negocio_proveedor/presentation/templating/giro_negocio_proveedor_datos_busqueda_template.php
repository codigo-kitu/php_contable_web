



		<form id="frmTablaDatosgiro_negocio_proveedor" name="frmTablaDatosgiro_negocio_proveedor">
			<div id="divTablaDatosAuxiliargiro_negocio_proveedorsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($giro_negocio_proveedors)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulogiro_negocio_proveedor" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Giro Negocios Proveedores</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosgiro_negocio_proveedors" name="tblTablaDatosgiro_negocio_proveedors" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($giro_negocio_proveedorsLocal!=null && count($giro_negocio_proveedorsLocal)>0) { ?>
			<?php foreach ($giro_negocio_proveedorsLocal as $giro_negocio_proveedor) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($giro_negocio_proveedor->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$giro_negocio_proveedor->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($giro_negocio_proveedor->id) ?>
							</td>
							<td>
								<img class="imgseleccionargiro_negocio_proveedor" idactualgiro_negocio_proveedor="<?php echo($giro_negocio_proveedor->id) ?>"  funcionjsactualgiro_negocio_proveedor="'.str_replace('TO_REPLACE',$giro_negocio_proveedor->id.',\''.giro_negocio_proveedor_util::getgiro_negocio_proveedorDescripcion($giro_negocio_proveedor).'\'',$this->strFuncionJs).'" title="SELECCIONAR Giro Negocios Proveedor ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Giro Negocios Proveedor ACTUAL" value="<?php echo($giro_negocio_proveedor->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($giro_negocio_proveedor->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $giro_negocio_proveedor->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $giro_negocio_proveedor->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_nombre" > 
						<?php echo( $giro_negocio_proveedor->nombre ) ?>
					</td>
				
					<td class="elementotabla col_predeterminado" ><?php  $funciones->getCheckBox($giro_negocio_proveedor->predeterminado,'form<?php echo($strSufijo) ?>-predeterminadoi',$paraReporte)  ?>
					</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($giro_negocio_proveedor->id) ?>
							<img class="imgrelacionproveedor" idactualgiro_negocio_proveedor="<?php echo($giro_negocio_proveedor->id) ?>" title="ProveedorS DE Giro Negocios Proveedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
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



