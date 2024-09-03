



		<form id="frmTablaDatosproveedor" name="frmTablaDatosproveedor">
			<div id="divTablaDatosAuxiliarproveedorsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($proveedors)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloproveedor" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Proveedores</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosproveedors" name="tblTablaDatosproveedors" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Tipo Persona.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Giro Negocio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Apellido.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contacto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Credito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Descuento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Anual.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Impuesto Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Ica</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ica</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica 2do Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Pagars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos eses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes eses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Precioses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Suplidores</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla"> Tipo Persona.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Giro Negocio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Apellido.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contacto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Credito.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Descuento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Anual.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Impuesto Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Ica</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ica</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica 2do Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Pagars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos eses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes eses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Precioses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Suplidores</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($proveedorsLocal!=null && count($proveedorsLocal)>0) { ?>
			<?php foreach ($proveedorsLocal as $proveedor) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($proveedor->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$proveedor->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($proveedor->id) ?>
							</td>
							<td>
								<img class="imgseleccionarproveedor" idactualproveedor="<?php echo($proveedor->id) ?>" title="SELECCIONAR Proveedor ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($proveedor->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaproveedor" idactualproveedor="<?php echo($proveedor->id) ?>" title="ELIMINAR Proveedor ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($proveedor->i) ?>" name="t-id_<?php echo($proveedor->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Proveedor ACTUAL" value="<?php echo($proveedor->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($proveedor->i) ?>_0" name="t-cel_<?php echo($proveedor->i) ?>_0" type="text" maxlength="25" value="<?php echo($proveedor->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($proveedor->id) ?><img class="imgseleccionarmostraraccionesrelacionesproveedor" idactualproveedor="<?php echo($proveedor->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $proveedor->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $proveedor->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($proveedor->id_empresa_Descripcion,$proveedor->id_empresa,'t-cel_'.$proveedor->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_tipo_persona" ><?php echo($funciones->getComboBoxEditar($proveedor->id_tipo_persona_Descripcion,$proveedor->id_tipo_persona,'t-cel_'.$proveedor->i.'_4')) ?></td>
				<td class="elementotabla col_id_categoria_proveedor" ><?php echo($funciones->getComboBoxEditar($proveedor->id_categoria_proveedor_Descripcion,$proveedor->id_categoria_proveedor,'t-cel_'.$proveedor->i.'_5')) ?></td>
				<td class="elementotabla col_id_giro_negocio_proveedor" ><?php echo($funciones->getComboBoxEditar($proveedor->id_giro_negocio_proveedor_Descripcion,$proveedor->id_giro_negocio_proveedor,'t-cel_'.$proveedor->i.'_6')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_7" name="t-cel_<?php echo($proveedor->i) ?>_7" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="20" value="<?php echo($proveedor->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_7" name="t-cel_<?php echo($proveedor->i) ?>_7" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="20" value="<?php echo($proveedor->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_ruc" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_8" name="t-cel_<?php echo($proveedor->i) ?>_8" type="text" class="form-control"  placeholder="Ruc"  title="Ruc"    size="20"  maxlength="30" value="<?php echo($proveedor->ruc) ?>" />
							<span id="spanstrMensajeruc" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_ruc" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_8" name="t-cel_<?php echo($proveedor->i) ?>_8" type="text" class="form-control"  placeholder="Ruc"  title="Ruc"    size="20"  maxlength="30" value="<?php echo($proveedor->ruc) ?>" />
							<span id="spanstrMensajeruc" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_primer_apellido" >  '<textarea id="t-cel_<?php echo($proveedor->i) ?>_9" name="t-cel_<?php echo($proveedor->i) ?>_9" class="form-control"  placeholder="Primer Apellido"  title="Primer Apellido"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->primer_apellido) ?></textarea>
							<span id="spanstrMensajeprimer_apellido" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_primer_apellido" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($proveedor->i) ?>_9" name="t-cel_<?php echo($proveedor->i) ?>_9" class="form-control"  placeholder="Primer Apellido"  title="Primer Apellido"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->primer_apellido) ?></input>
							<span id="spanstrMensajeprimer_apellido" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_segundo_apellido" >  '<textarea id="t-cel_<?php echo($proveedor->i) ?>_10" name="t-cel_<?php echo($proveedor->i) ?>_10" class="form-control"  placeholder="Segundo Apellido"  title="Segundo Apellido"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->segundo_apellido) ?></textarea>
							<span id="spanstrMensajesegundo_apellido" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_segundo_apellido" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($proveedor->i) ?>_10" name="t-cel_<?php echo($proveedor->i) ?>_10" class="form-control"  placeholder="Segundo Apellido"  title="Segundo Apellido"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->segundo_apellido) ?></input>
							<span id="spanstrMensajesegundo_apellido" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_primer_nombre" >  '<textarea id="t-cel_<?php echo($proveedor->i) ?>_11" name="t-cel_<?php echo($proveedor->i) ?>_11" class="form-control"  placeholder="Primer Nombre"  title="Primer Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->primer_nombre) ?></textarea>
							<span id="spanstrMensajeprimer_nombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_primer_nombre" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($proveedor->i) ?>_11" name="t-cel_<?php echo($proveedor->i) ?>_11" class="form-control"  placeholder="Primer Nombre"  title="Primer Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->primer_nombre) ?></input>
							<span id="spanstrMensajeprimer_nombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_segundo_nombre" >  '<textarea id="t-cel_<?php echo($proveedor->i) ?>_12" name="t-cel_<?php echo($proveedor->i) ?>_12" class="form-control"  placeholder="Segundo Nombre"  title="Segundo Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->segundo_nombre) ?></textarea>
							<span id="spanstrMensajesegundo_nombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_segundo_nombre" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($proveedor->i) ?>_12" name="t-cel_<?php echo($proveedor->i) ?>_12" class="form-control"  placeholder="Segundo Nombre"  title="Segundo Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->segundo_nombre) ?></input>
							<span id="spanstrMensajesegundo_nombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_completo" >  '<textarea id="t-cel_<?php echo($proveedor->i) ?>_13" name="t-cel_<?php echo($proveedor->i) ?>_13" class="form-control"  placeholder="Nombre Completo"  title="Nombre Completo"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->nombre_completo) ?></textarea>
							<span id="spanstrMensajenombre_completo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_completo" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($proveedor->i) ?>_13" name="t-cel_<?php echo($proveedor->i) ?>_13" class="form-control"  placeholder="Nombre Completo"  title="Nombre Completo"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->nombre_completo) ?></input>
							<span id="spanstrMensajenombre_completo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion" >  '<textarea id="t-cel_<?php echo($proveedor->i) ?>_14" name="t-cel_<?php echo($proveedor->i) ?>_14" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->direccion) ?></textarea>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($proveedor->i) ?>_14" name="t-cel_<?php echo($proveedor->i) ?>_14" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->direccion) ?></input>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_15" name="t-cel_<?php echo($proveedor->i) ?>_15" type="text" class="form-control"  placeholder="Telefono"  title="Telefono"    size="20"  maxlength="20" value="<?php echo($proveedor->telefono) ?>" />
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_15" name="t-cel_<?php echo($proveedor->i) ?>_15" type="text" class="form-control"  placeholder="Telefono"  title="Telefono"    size="20"  maxlength="20" value="<?php echo($proveedor->telefono) ?>" />
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono_movil" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_16" name="t-cel_<?php echo($proveedor->i) ?>_16" type="text" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"    size="20"  maxlength="20" value="<?php echo($proveedor->telefono_movil) ?>" />
							<span id="spanstrMensajetelefono_movil" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono_movil" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_16" name="t-cel_<?php echo($proveedor->i) ?>_16" type="text" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"    size="20"  maxlength="20" value="<?php echo($proveedor->telefono_movil) ?>" />
							<span id="spanstrMensajetelefono_movil" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_e_mail" >  '<textarea id="t-cel_<?php echo($proveedor->i) ?>_17" name="t-cel_<?php echo($proveedor->i) ?>_17" class="form-control"  placeholder="E Mail"  title="E Mail"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->e_mail) ?></textarea>
							<span id="spanstrMensajee_mail" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_e_mail" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($proveedor->i) ?>_17" name="t-cel_<?php echo($proveedor->i) ?>_17" class="form-control"  placeholder="E Mail"  title="E Mail"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->e_mail) ?></input>
							<span id="spanstrMensajee_mail" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_e_mail2" >  '<textarea id="t-cel_<?php echo($proveedor->i) ?>_18" name="t-cel_<?php echo($proveedor->i) ?>_18" class="form-control"  placeholder="E Mail2"  title="E Mail2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->e_mail2) ?></textarea>
							<span id="spanstrMensajee_mail2" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_e_mail2" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($proveedor->i) ?>_18" name="t-cel_<?php echo($proveedor->i) ?>_18" class="form-control"  placeholder="E Mail2"  title="E Mail2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($proveedor->e_mail2) ?></input>
							<span id="spanstrMensajee_mail2" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_comentario" >  '<textarea id="t-cel_<?php echo($proveedor->i) ?>_19" name="t-cel_<?php echo($proveedor->i) ?>_19" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($proveedor->comentario) ?></textarea>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_comentario" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($proveedor->i) ?>_19" name="t-cel_<?php echo($proveedor->i) ?>_19" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($proveedor->comentario) ?></input>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_imagen" >  '<textarea id="t-cel_<?php echo($proveedor->i) ?>_20" name="t-cel_<?php echo($proveedor->i) ?>_20" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($proveedor->imagen) ?></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_imagen" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($proveedor->i) ?>_20" name="t-cel_<?php echo($proveedor->i) ?>_20" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($proveedor->imagen) ?></input>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_activo" ><?php  $funciones->getCheckBoxEditar($proveedor->activo,'t-cel_<?php echo($proveedor->i) ?>_21',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_pais" ><?php echo($funciones->getComboBoxEditar($proveedor->id_pais_Descripcion,$proveedor->id_pais,'t-cel_'.$proveedor->i.'_22')) ?></td>
				<td class="elementotabla col_id_provincia" ><?php echo($funciones->getComboBoxEditar($proveedor->id_provincia_Descripcion,$proveedor->id_provincia,'t-cel_'.$proveedor->i.'_23')) ?></td>
				<td class="elementotabla col_id_ciudad" ><?php echo($funciones->getComboBoxEditar($proveedor->id_ciudad_Descripcion,$proveedor->id_ciudad,'t-cel_'.$proveedor->i.'_24')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_postal" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_25" name="t-cel_<?php echo($proveedor->i) ?>_25" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="15"  maxlength="15" value="<?php echo($proveedor->codigo_postal) ?>" />
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_postal" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_25" name="t-cel_<?php echo($proveedor->i) ?>_25" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="15"  maxlength="15" value="<?php echo($proveedor->codigo_postal) ?>" />
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_fax" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_26" name="t-cel_<?php echo($proveedor->i) ?>_26" type="text" class="form-control"  placeholder="Fax"  title="Fax"    size="20"  maxlength="20" value="<?php echo($proveedor->fax) ?>" />
							<span id="spanstrMensajefax" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_fax" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_26" name="t-cel_<?php echo($proveedor->i) ?>_26" type="text" class="form-control"  placeholder="Fax"  title="Fax"    size="20"  maxlength="20" value="<?php echo($proveedor->fax) ?>" />
							<span id="spanstrMensajefax" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_contacto" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_27" name="t-cel_<?php echo($proveedor->i) ?>_27" type="text" class="form-control"  placeholder="Contacto"  title="Contacto"    size="20"  maxlength="50" value="<?php echo($proveedor->contacto) ?>" />
							<span id="spanstrMensajecontacto" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_contacto" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_27" name="t-cel_<?php echo($proveedor->i) ?>_27" type="text" class="form-control"  placeholder="Contacto"  title="Contacto"    size="20"  maxlength="50" value="<?php echo($proveedor->contacto) ?>" />
							<span id="spanstrMensajecontacto" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_vendedor" ><?php echo($funciones->getComboBoxEditar($proveedor->id_vendedor_Descripcion,$proveedor->id_vendedor,'t-cel_'.$proveedor->i.'_28')) ?></td>
				
						<td class="elementotabla col_maximo_credito" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_29" name="t-cel_<?php echo($proveedor->i) ?>_29" type="text" class="form-control"  placeholder="Maximo Credito"  title="Maximo Credito"    maxlength="18" size="12"  value="<?php echo($proveedor->maximo_credito) ?>" >
							<span id="spanstrMensajemaximo_credito" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_maximo_descuento" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_30" name="t-cel_<?php echo($proveedor->i) ?>_30" type="text" class="form-control"  placeholder="Maximo Descuento"  title="Maximo Descuento"    maxlength="18" size="12"  value="<?php echo($proveedor->maximo_descuento) ?>" >
							<span id="spanstrMensajemaximo_descuento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_interes_anual" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_31" name="t-cel_<?php echo($proveedor->i) ?>_31" type="text" class="form-control"  placeholder="Interes Anual"  title="Interes Anual"    maxlength="18" size="12"  value="<?php echo($proveedor->interes_anual) ?>" >
							<span id="spanstrMensajeinteres_anual" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_balance" >  '
							<input id="t-cel_<?php echo($proveedor->i) ?>_32" name="t-cel_<?php echo($proveedor->i) ?>_32" type="text" class="form-control"  placeholder="Balance"  title="Balance"    maxlength="18" size="12"  value="<?php echo($proveedor->balance) ?>" >
							<span id="spanstrMensajebalance" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_termino_pago_proveedor" ><?php echo($funciones->getComboBoxEditar($proveedor->id_termino_pago_proveedor_Descripcion,$proveedor->id_termino_pago_proveedor,'t-cel_'.$proveedor->i.'_33')) ?></td>
				<td class="elementotabla col_id_cuenta" ><?php echo($funciones->getComboBoxEditar($proveedor->id_cuenta_Descripcion,$proveedor->id_cuenta,'t-cel_'.$proveedor->i.'_34')) ?></td>
				
						<td class="elementotabla col_aplica_impuesto_compras" ><?php  $funciones->getCheckBoxEditar($proveedor->aplica_impuesto_compras,'t-cel_<?php echo($proveedor->i) ?>_35',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_impuesto" ><?php echo($funciones->getComboBoxEditar($proveedor->id_impuesto_Descripcion,$proveedor->id_impuesto,'t-cel_'.$proveedor->i.'_36')) ?></td>
				
						<td class="elementotabla col_aplica_retencion_impuesto" ><?php  $funciones->getCheckBoxEditar($proveedor->aplica_retencion_impuesto,'t-cel_<?php echo($proveedor->i) ?>_37',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_retencion" ><?php echo($funciones->getComboBoxEditar($proveedor->id_retencion_Descripcion,$proveedor->id_retencion,'t-cel_'.$proveedor->i.'_38')) ?></td>
				
						<td class="elementotabla col_aplica_retencion_fuente" ><?php  $funciones->getCheckBoxEditar($proveedor->aplica_retencion_fuente,'t-cel_<?php echo($proveedor->i) ?>_39',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_retencion_fuente" ><?php echo($funciones->getComboBoxEditar($proveedor->id_retencion_fuente_Descripcion,$proveedor->id_retencion_fuente,'t-cel_'.$proveedor->i.'_40')) ?></td>
				
						<td class="elementotabla col_aplica_retencion_ica" ><?php  $funciones->getCheckBoxEditar($proveedor->aplica_retencion_ica,'t-cel_<?php echo($proveedor->i) ?>_41',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_retencion_ica" ><?php echo($funciones->getComboBoxEditar($proveedor->id_retencion_ica_Descripcion,$proveedor->id_retencion_ica,'t-cel_'.$proveedor->i.'_42')) ?></td>
				
						<td class="elementotabla col_aplica_2do_impuesto" ><?php  $funciones->getCheckBoxEditar($proveedor->aplica_2do_impuesto,'t-cel_<?php echo($proveedor->i) ?>_43',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_otro_impuesto" ><?php echo($funciones->getComboBoxEditar($proveedor->id_otro_impuesto_Descripcion,$proveedor->id_otro_impuesto,'t-cel_'.$proveedor->i.'_44')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($proveedor->id) ?>
							<img class="imgrelacioncuenta_pagar" idactualproveedor="<?php echo($proveedor->id) ?>" title="Cuenta PagarS DE Proveedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cuenta_pagars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($proveedor->id) ?>
							<img class="imgrelaciondocumento_proveedor" idactualproveedor="<?php echo($proveedor->id) ?>" title="Documentos ProveedoresS DE Proveedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/documento_proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($proveedor->id) ?>
							<img class="imgrelacionimagen_proveedor" idactualproveedor="<?php echo($proveedor->id) ?>" title="Imagenes ProveedoresS DE Proveedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/imagen_proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($proveedor->id) ?>
							<img class="imgrelacionlista_precio" idactualproveedor="<?php echo($proveedor->id) ?>" title="Lista PreciosS DE Proveedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_precios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($proveedor->id) ?>
							<img class="imgrelacionorden_compra" idactualproveedor="<?php echo($proveedor->id) ?>" title="Orden CompraS DE Proveedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/orden_compras.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($proveedor->id) ?>
							<img class="imgrelacionotro_suplidor" idactualproveedor="<?php echo($proveedor->id) ?>" title="Otro SuplidorS DE Proveedor" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/otro_suplidors.gif" alt="Seleccionar" border="" height="15" width="15">
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



