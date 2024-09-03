



		<form id="frmTablaDatostipo_forma_pago" name="frmTablaDatostipo_forma_pago">
			<div id="divTablaDatosAuxiliartipo_forma_pagosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($tipo_forma_pagos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulotipo_forma_pago" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Tipo Forma Pagos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatostipo_forma_pagos" name="tblTablaDatostipo_forma_pagos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Proveedores</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Proveedores</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($tipo_forma_pagosLocal!=null && count($tipo_forma_pagosLocal)>0) { ?>
			<?php foreach ($tipo_forma_pagosLocal as $tipo_forma_pago) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($tipo_forma_pago->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$tipo_forma_pago->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($tipo_forma_pago->id) ?>
							</td>
							<td>
								<img class="imgseleccionartipo_forma_pago" idactualtipo_forma_pago="<?php echo($tipo_forma_pago->id) ?>"  funcionjsactualtipo_forma_pago="'.str_replace('TO_REPLACE',$tipo_forma_pago->id.',\''.tipo_forma_pago_util::gettipo_forma_pagoDescripcion($tipo_forma_pago).'\'',$this->strFuncionJs).'" title="SELECCIONAR Tipo Forma Pago ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Tipo Forma Pago ACTUAL" value="<?php echo($tipo_forma_pago->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($tipo_forma_pago->id) ?>" style="width:50px" ></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $tipo_forma_pago->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $tipo_forma_pago->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $tipo_forma_pago->codigo ) ?>
					</td>
				
					<td class="elementotabla col_nombre" > 
						<?php echo( $tipo_forma_pago->nombre ) ?>
					</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($tipo_forma_pago->id) ?>
							<img class="imgrelacionforma_pago_cliente" idactualtipo_forma_pago="<?php echo($tipo_forma_pago->id) ?>" title="Forma Pago ClienteS DE Tipo Forma Pago" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/forma_pago_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($tipo_forma_pago->id) ?>
							<img class="imgrelacionforma_pago_proveedor" idactualtipo_forma_pago="<?php echo($tipo_forma_pago->id) ?>" title="Forma Pago ProveedorS DE Tipo Forma Pago" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/forma_pago_proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
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



