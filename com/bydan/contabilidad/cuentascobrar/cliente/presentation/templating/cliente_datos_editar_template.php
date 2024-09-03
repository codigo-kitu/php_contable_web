



		<form id="frmTablaDatoscliente" name="frmTablaDatoscliente">
			<div id="divTablaDatosAuxiliarclientesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($clientes)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocliente" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Clientes</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosclientes" name="tblTablaDatosclientes" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Categorias Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Precio.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Telefono.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Facturar Con.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Impuesto Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion</pre>
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
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos ses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista s</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Categorias Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Precio.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Telefono.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Facturar Con.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Impuesto Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion</pre>
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
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos ses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($clientesLocal!=null && count($clientesLocal)>0) { ?>
			<?php foreach ($clientesLocal as $cliente) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cliente->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cliente->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cliente->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcliente" idactualcliente="<?php echo($cliente->id) ?>" title="SELECCIONAR Cliente ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($cliente->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacliente" idactualcliente="<?php echo($cliente->id) ?>" title="ELIMINAR Cliente ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($cliente->i) ?>" name="t-id_<?php echo($cliente->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cliente ACTUAL" value="<?php echo($cliente->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($cliente->i) ?>_0" name="t-cel_<?php echo($cliente->i) ?>_0" type="text" maxlength="25" value="<?php echo($cliente->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($cliente->id) ?><img class="imgseleccionarmostraraccionesrelacionescliente" idactualcliente="<?php echo($cliente->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $cliente->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $cliente->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($cliente->id_empresa_Descripcion,$cliente->id_empresa,'t-cel_'.$cliente->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_tipo_persona" ><?php echo($funciones->getComboBoxEditar($cliente->id_tipo_persona_Descripcion,$cliente->id_tipo_persona,'t-cel_'.$cliente->i.'_4')) ?></td>
				<td class="elementotabla col_id_categoria_cliente" ><?php echo($funciones->getComboBoxEditar($cliente->id_categoria_cliente_Descripcion,$cliente->id_categoria_cliente,'t-cel_'.$cliente->i.'_5')) ?></td>
				<td class="elementotabla col_id_tipo_precio" ><?php echo($funciones->getComboBoxEditar($cliente->id_tipo_precio_Descripcion,$cliente->id_tipo_precio,'t-cel_'.$cliente->i.'_6')) ?></td>
				<td class="elementotabla col_id_giro_negocio_cliente" ><?php echo($funciones->getComboBoxEditar($cliente->id_giro_negocio_cliente_Descripcion,$cliente->id_giro_negocio_cliente,'t-cel_'.$cliente->i.'_7')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_8" name="t-cel_<?php echo($cliente->i) ?>_8" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="20" value="<?php echo($cliente->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_8" name="t-cel_<?php echo($cliente->i) ?>_8" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="20" value="<?php echo($cliente->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_ruc" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_9" name="t-cel_<?php echo($cliente->i) ?>_9" type="text" class="form-control"  placeholder="Ruc"  title="Ruc"    size="20"  maxlength="30" value="<?php echo($cliente->ruc) ?>" />
							<span id="spanstrMensajeruc" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_ruc" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_9" name="t-cel_<?php echo($cliente->i) ?>_9" type="text" class="form-control"  placeholder="Ruc"  title="Ruc"    size="20"  maxlength="30" value="<?php echo($cliente->ruc) ?>" />
							<span id="spanstrMensajeruc" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_primer_apellido" >  '<textarea id="t-cel_<?php echo($cliente->i) ?>_10" name="t-cel_<?php echo($cliente->i) ?>_10" class="form-control"  placeholder="Primer Apellido"  title="Primer Apellido"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->primer_apellido) ?></textarea>
							<span id="spanstrMensajeprimer_apellido" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_primer_apellido" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($cliente->i) ?>_10" name="t-cel_<?php echo($cliente->i) ?>_10" class="form-control"  placeholder="Primer Apellido"  title="Primer Apellido"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->primer_apellido) ?></input>
							<span id="spanstrMensajeprimer_apellido" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_segundo_apellido" >  '<textarea id="t-cel_<?php echo($cliente->i) ?>_11" name="t-cel_<?php echo($cliente->i) ?>_11" class="form-control"  placeholder="Segundo Apellido"  title="Segundo Apellido"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->segundo_apellido) ?></textarea>
							<span id="spanstrMensajesegundo_apellido" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_segundo_apellido" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($cliente->i) ?>_11" name="t-cel_<?php echo($cliente->i) ?>_11" class="form-control"  placeholder="Segundo Apellido"  title="Segundo Apellido"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->segundo_apellido) ?></input>
							<span id="spanstrMensajesegundo_apellido" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_primer_nombre" >  '<textarea id="t-cel_<?php echo($cliente->i) ?>_12" name="t-cel_<?php echo($cliente->i) ?>_12" class="form-control"  placeholder="Primer Nombre"  title="Primer Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->primer_nombre) ?></textarea>
							<span id="spanstrMensajeprimer_nombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_primer_nombre" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($cliente->i) ?>_12" name="t-cel_<?php echo($cliente->i) ?>_12" class="form-control"  placeholder="Primer Nombre"  title="Primer Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->primer_nombre) ?></input>
							<span id="spanstrMensajeprimer_nombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_segundo_nombre" >  '<textarea id="t-cel_<?php echo($cliente->i) ?>_13" name="t-cel_<?php echo($cliente->i) ?>_13" class="form-control"  placeholder="Segundo Nombre"  title="Segundo Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->segundo_nombre) ?></textarea>
							<span id="spanstrMensajesegundo_nombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_segundo_nombre" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($cliente->i) ?>_13" name="t-cel_<?php echo($cliente->i) ?>_13" class="form-control"  placeholder="Segundo Nombre"  title="Segundo Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->segundo_nombre) ?></input>
							<span id="spanstrMensajesegundo_nombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_completo" >  '<textarea id="t-cel_<?php echo($cliente->i) ?>_14" name="t-cel_<?php echo($cliente->i) ?>_14" class="form-control"  placeholder="Nombre Completo"  title="Nombre Completo"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->nombre_completo) ?></textarea>
							<span id="spanstrMensajenombre_completo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_completo" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($cliente->i) ?>_14" name="t-cel_<?php echo($cliente->i) ?>_14" class="form-control"  placeholder="Nombre Completo"  title="Nombre Completo"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->nombre_completo) ?></input>
							<span id="spanstrMensajenombre_completo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion" >  '<textarea id="t-cel_<?php echo($cliente->i) ?>_15" name="t-cel_<?php echo($cliente->i) ?>_15" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->direccion) ?></textarea>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($cliente->i) ?>_15" name="t-cel_<?php echo($cliente->i) ?>_15" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->direccion) ?></input>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_16" name="t-cel_<?php echo($cliente->i) ?>_16" type="text" class="form-control"  placeholder="Telefono"  title="Telefono"    size="20"  maxlength="20" value="<?php echo($cliente->telefono) ?>" />
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_16" name="t-cel_<?php echo($cliente->i) ?>_16" type="text" class="form-control"  placeholder="Telefono"  title="Telefono"    size="20"  maxlength="20" value="<?php echo($cliente->telefono) ?>" />
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono_movil" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_17" name="t-cel_<?php echo($cliente->i) ?>_17" type="text" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"    size="20"  maxlength="20" value="<?php echo($cliente->telefono_movil) ?>" />
							<span id="spanstrMensajetelefono_movil" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono_movil" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_17" name="t-cel_<?php echo($cliente->i) ?>_17" type="text" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"    size="20"  maxlength="20" value="<?php echo($cliente->telefono_movil) ?>" />
							<span id="spanstrMensajetelefono_movil" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_e_mail" >  '<textarea id="t-cel_<?php echo($cliente->i) ?>_18" name="t-cel_<?php echo($cliente->i) ?>_18" class="form-control"  placeholder="E Mail"  title="E Mail"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->e_mail) ?></textarea>
							<span id="spanstrMensajee_mail" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_e_mail" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($cliente->i) ?>_18" name="t-cel_<?php echo($cliente->i) ?>_18" class="form-control"  placeholder="E Mail"  title="E Mail"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->e_mail) ?></input>
							<span id="spanstrMensajee_mail" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_e_mail2" >  '<textarea id="t-cel_<?php echo($cliente->i) ?>_19" name="t-cel_<?php echo($cliente->i) ?>_19" class="form-control"  placeholder="E Mail2"  title="E Mail2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->e_mail2) ?></textarea>
							<span id="spanstrMensajee_mail2" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_e_mail2" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($cliente->i) ?>_19" name="t-cel_<?php echo($cliente->i) ?>_19" class="form-control"  placeholder="E Mail2"  title="E Mail2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cliente->e_mail2) ?></input>
							<span id="spanstrMensajee_mail2" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_comentario" >  '<textarea id="t-cel_<?php echo($cliente->i) ?>_20" name="t-cel_<?php echo($cliente->i) ?>_20" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($cliente->comentario) ?></textarea>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_comentario" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($cliente->i) ?>_20" name="t-cel_<?php echo($cliente->i) ?>_20" class="form-control"  placeholder="Comentario"  title="Comentario"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($cliente->comentario) ?></input>
							<span id="spanstrMensajecomentario" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_imagen" >  '<textarea id="t-cel_<?php echo($cliente->i) ?>_21" name="t-cel_<?php echo($cliente->i) ?>_21" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($cliente->imagen) ?></textarea>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_imagen" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($cliente->i) ?>_21" name="t-cel_<?php echo($cliente->i) ?>_21" class="form-control"  placeholder="Imagen"  title="Imagen"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($cliente->imagen) ?></input>
							<span id="spanstrMensajeimagen" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_activo" ><?php  $funciones->getCheckBoxEditar($cliente->activo,'t-cel_<?php echo($cliente->i) ?>_22',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_pais" ><?php echo($funciones->getComboBoxEditar($cliente->id_pais_Descripcion,$cliente->id_pais,'t-cel_'.$cliente->i.'_23')) ?></td>
				<td class="elementotabla col_id_provincia" ><?php echo($funciones->getComboBoxEditar($cliente->id_provincia_Descripcion,$cliente->id_provincia,'t-cel_'.$cliente->i.'_24')) ?></td>
				<td class="elementotabla col_id_ciudad" ><?php echo($funciones->getComboBoxEditar($cliente->id_ciudad_Descripcion,$cliente->id_ciudad,'t-cel_'.$cliente->i.'_25')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_postal" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_26" name="t-cel_<?php echo($cliente->i) ?>_26" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="15"  maxlength="15" value="<?php echo($cliente->codigo_postal) ?>" />
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_postal" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_26" name="t-cel_<?php echo($cliente->i) ?>_26" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="15"  maxlength="15" value="<?php echo($cliente->codigo_postal) ?>" />
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_fax" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_27" name="t-cel_<?php echo($cliente->i) ?>_27" type="text" class="form-control"  placeholder="Fax"  title="Fax"    size="20"  maxlength="20" value="<?php echo($cliente->fax) ?>" />
							<span id="spanstrMensajefax" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_fax" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_27" name="t-cel_<?php echo($cliente->i) ?>_27" type="text" class="form-control"  placeholder="Fax"  title="Fax"    size="20"  maxlength="20" value="<?php echo($cliente->fax) ?>" />
							<span id="spanstrMensajefax" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_contacto" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_28" name="t-cel_<?php echo($cliente->i) ?>_28" type="text" class="form-control"  placeholder="Contacto"  title="Contacto"    size="20"  maxlength="50" value="<?php echo($cliente->contacto) ?>" />
							<span id="spanstrMensajecontacto" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_contacto" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_28" name="t-cel_<?php echo($cliente->i) ?>_28" type="text" class="form-control"  placeholder="Contacto"  title="Contacto"    size="20"  maxlength="50" value="<?php echo($cliente->contacto) ?>" />
							<span id="spanstrMensajecontacto" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_vendedor" ><?php echo($funciones->getComboBoxEditar($cliente->id_vendedor_Descripcion,$cliente->id_vendedor,'t-cel_'.$cliente->i.'_29')) ?></td>
				
						<td class="elementotabla col_maximo_credito" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_30" name="t-cel_<?php echo($cliente->i) ?>_30" type="text" class="form-control"  placeholder="Maximo Credito"  title="Maximo Credito"    maxlength="18" size="12"  value="<?php echo($cliente->maximo_credito) ?>" >
							<span id="spanstrMensajemaximo_credito" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_maximo_descuento" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_31" name="t-cel_<?php echo($cliente->i) ?>_31" type="text" class="form-control"  placeholder="Maximo Descuento"  title="Maximo Descuento"    maxlength="18" size="12"  value="<?php echo($cliente->maximo_descuento) ?>" >
							<span id="spanstrMensajemaximo_descuento" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_interes_anual" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_32" name="t-cel_<?php echo($cliente->i) ?>_32" type="text" class="form-control"  placeholder="Interes Anual"  title="Interes Anual"    maxlength="18" size="12"  value="<?php echo($cliente->interes_anual) ?>" >
							<span id="spanstrMensajeinteres_anual" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_balance" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_33" name="t-cel_<?php echo($cliente->i) ?>_33" type="text" class="form-control"  placeholder="Balance"  title="Balance"    maxlength="18" size="12"  value="<?php echo($cliente->balance) ?>" >
							<span id="spanstrMensajebalance" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_termino_pago_cliente" ><?php echo($funciones->getComboBoxEditar($cliente->id_termino_pago_cliente_Descripcion,$cliente->id_termino_pago_cliente,'t-cel_'.$cliente->i.'_34')) ?></td>
				<td class="elementotabla col_id_cuenta" ><?php echo($funciones->getComboBoxEditar($cliente->id_cuenta_Descripcion,$cliente->id_cuenta,'t-cel_'.$cliente->i.'_35')) ?></td>
				
						<td class="elementotabla col_facturar_con" >  '
							<input id="t-cel_<?php echo($cliente->i) ?>_36" name="t-cel_<?php echo($cliente->i) ?>_36" type="text" class="form-control"  placeholder="Facturar Con"  title="Facturar Con"    maxlength="10" size="10"  value="<?php echo($cliente->facturar_con) ?>" >
							<span id="spanstrMensajefacturar_con" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_aplica_impuesto_ventas" ><?php  $funciones->getCheckBoxEditar($cliente->aplica_impuesto_ventas,'t-cel_<?php echo($cliente->i) ?>_37',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_impuesto" ><?php echo($funciones->getComboBoxEditar($cliente->id_impuesto_Descripcion,$cliente->id_impuesto,'t-cel_'.$cliente->i.'_38')) ?></td>
				
						<td class="elementotabla col_aplica_retencion_impuesto" ><?php  $funciones->getCheckBoxEditar($cliente->aplica_retencion_impuesto,'t-cel_<?php echo($cliente->i) ?>_39',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_retencion" ><?php echo($funciones->getComboBoxEditar($cliente->id_retencion_Descripcion,$cliente->id_retencion,'t-cel_'.$cliente->i.'_40')) ?></td>
				
						<td class="elementotabla col_aplica_retencion_fuente" ><?php  $funciones->getCheckBoxEditar($cliente->aplica_retencion_fuente,'t-cel_<?php echo($cliente->i) ?>_41',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_retencion_fuente" ><?php echo($funciones->getComboBoxEditar($cliente->id_retencion_fuente_Descripcion,$cliente->id_retencion_fuente,'t-cel_'.$cliente->i.'_42')) ?></td>
				
						<td class="elementotabla col_aplica_retencion_ica" ><?php  $funciones->getCheckBoxEditar($cliente->aplica_retencion_ica,'t-cel_<?php echo($cliente->i) ?>_43',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_retencion_ica" ><?php echo($funciones->getComboBoxEditar($cliente->id_retencion_ica_Descripcion,$cliente->id_retencion_ica,'t-cel_'.$cliente->i.'_44')) ?></td>
				
						<td class="elementotabla col_aplica_2do_impuesto" ><?php  $funciones->getCheckBoxEditar($cliente->aplica_2do_impuesto,'t-cel_<?php echo($cliente->i) ?>_45',$paraReporte)  ?>
						</td>
				<td class="elementotabla col_id_otro_impuesto" ><?php echo($funciones->getComboBoxEditar($cliente->id_otro_impuesto_Descripcion,$cliente->id_otro_impuesto,'t-cel_'.$cliente->i.'_46')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacionconsignacion" idactualcliente="<?php echo($cliente->id) ?>" title="ConsignacionS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/consignacions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacioncuenta_cobrar" idactualcliente="<?php echo($cliente->id) ?>" title="Cuenta CobrarS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelaciondevolucion_factura" idactualcliente="<?php echo($cliente->id) ?>" title="Devolucion FacturaS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/devolucion_facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelaciondocumento_cliente" idactualcliente="<?php echo($cliente->id) ?>" title="Documentos ClientesS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/documento_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacionestimado" idactualcliente="<?php echo($cliente->id) ?>" title="EstimadoS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/estimados.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacionfactura" idactualcliente="<?php echo($cliente->id) ?>" title="FacturaS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacionimagen_cliente" idactualcliente="<?php echo($cliente->id) ?>" title="Imagenes ClienteS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/imagen_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacionlista_cliente" idactualcliente="<?php echo($cliente->id) ?>" title="Lista ClienteS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
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



