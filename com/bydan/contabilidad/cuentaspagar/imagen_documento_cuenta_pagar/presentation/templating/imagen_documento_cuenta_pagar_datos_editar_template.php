



		<form id="frmTablaDatosimagen_documento_cuenta_pagar" name="frmTablaDatosimagen_documento_cuenta_pagar">
			<div id="divTablaDatosAuxiliarimagen_documento_cuenta_pagarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($imagen_documento_cuenta_pagars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloimagen_documento_cuenta_pagar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Imagenes Documentos Cuentas por Pagares</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosimagen_documento_cuenta_pagars" name="tblTablaDatosimagen_documento_cuenta_pagars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Docs.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento.(*)</pre>
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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Docs.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($imagen_documento_cuenta_pagarsLocal!=null && count($imagen_documento_cuenta_pagarsLocal)>0) { ?>
			<?php foreach ($imagen_documento_cuenta_pagarsLocal as $imagen_documento_cuenta_pagar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($imagen_documento_cuenta_pagar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$imagen_documento_cuenta_pagar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($imagen_documento_cuenta_pagar->id) ?>
							</td>
							<td>
								<img class="imgseleccionarimagen_documento_cuenta_pagar" idactualimagen_documento_cuenta_pagar="<?php echo($imagen_documento_cuenta_pagar->id) ?>" title="SELECCIONAR Imagenes Documentos Cuentas por Pagar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($imagen_documento_cuenta_pagar->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaimagen_documento_cuenta_pagar" idactualimagen_documento_cuenta_pagar="<?php echo($imagen_documento_cuenta_pagar->id) ?>" title="ELIMINAR Imagenes Documentos Cuentas por Pagar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($imagen_documento_cuenta_pagar->i) ?>" name="t-id_<?php echo($imagen_documento_cuenta_pagar->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Imagenes Documentos Cuentas por Pagar ACTUAL" value="<?php echo($imagen_documento_cuenta_pagar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($imagen_documento_cuenta_pagar->i) ?>_0" name="t-cel_<?php echo($imagen_documento_cuenta_pagar->i) ?>_0" type="text" maxlength="25" value="<?php echo($imagen_documento_cuenta_pagar->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $imagen_documento_cuenta_pagar->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $imagen_documento_cuenta_pagar->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_imagen" >  '<textarea id="t-cel_<?php echo($imagen_documento_cuenta_pagar->i) ?>_3" name="t-cel_<?php echo($imagen_documento_cuenta_pagar->i) ?>_3" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($imagen_documento_cuenta_pagar->imagen) ?></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_imagen" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($imagen_documento_cuenta_pagar->i) ?>_3" name="t-cel_<?php echo($imagen_documento_cuenta_pagar->i) ?>_3" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($imagen_documento_cuenta_pagar->imagen) ?></input>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_documento_cuenta_pagar" ><?php echo($funciones->getComboBoxEditar($imagen_documento_cuenta_pagar->id_documento_cuenta_pagar_Descripcion,$imagen_documento_cuenta_pagar->id_documento_cuenta_pagar,'t-cel_'.$imagen_documento_cuenta_pagar->i.'_4')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nro_documento" >  '
							<input id="t-cel_<?php echo($imagen_documento_cuenta_pagar->i) ?>_5" name="t-cel_<?php echo($imagen_documento_cuenta_pagar->i) ?>_5" type="text" class="form-control"  placeholder="Nro Documento"  title="Nro Documento"    size="10"  maxlength="10" value="<?php echo($imagen_documento_cuenta_pagar->nro_documento) ?>" />
							<span id="spanstrMensajenro_documento" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nro_documento" >  '
							<input id="t-cel_<?php echo($imagen_documento_cuenta_pagar->i) ?>_5" name="t-cel_<?php echo($imagen_documento_cuenta_pagar->i) ?>_5" type="text" class="form-control"  placeholder="Nro Documento"  title="Nro Documento"    size="10"  maxlength="10" value="<?php echo($imagen_documento_cuenta_pagar->nro_documento) ?>" />
							<span id="spanstrMensajenro_documento" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

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



