



		<form id="frmTablaDatosciudad" name="frmTablaDatosciudad">
			<div id="divTablaDatosAuxiliarciudadsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($ciudads)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulociudad" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Ciudades</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosciudads" name="tblTablaDatosciudads" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form$strSufijo-id_provincia_img2" name="form$strSufijo-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="ciudad_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form$strSufijo-id_provincia_img_busqueda2" name="form$strSufijo-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Dato General Usuarios</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Empresas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Sucursals</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form$strSufijo-id_provincia_img2" name="form$strSufijo-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="ciudad_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form$strSufijo-id_provincia_img_busqueda2" name="form$strSufijo-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Dato General Usuarios</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Empresas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Sucursals</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($ciudadsLocal!=null && count($ciudadsLocal)>0) { ?>
			<?php foreach ($ciudadsLocal as $ciudad) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($ciudad->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$ciudad->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($ciudad->id) ?>
							</td>
							<td>
								<img class="imgseleccionarciudad" idactualciudad="<?php echo($ciudad->id) ?>"  funcionjsactualciudad="'.str_replace('TO_REPLACE',$ciudad->id.',\''.ciudad_util::getciudadDescripcion($ciudad).'\'',$this->strFuncionJs).'" title="SELECCIONAR Ciudad ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Ciudad ACTUAL" value="<?php echo($ciudad->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($ciudad->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $ciudad->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $ciudad->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_provincia" > <?php echo($ciudad->id_provincia_Descripcion) ?></td>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $ciudad->codigo ) ?>
					</td>
				
					<td class="elementotabla col_nombre" > 
						<?php echo( $ciudad->nombre ) ?>
					</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($ciudad->id) ?>
							<img class="imgrelacioncliente" idactualciudad="<?php echo($ciudad->id) ?>" title="ClienteS DE Ciudad" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($ciudad->id) ?>
							<img class="imgrelaciondato_general_usuario" idactualciudad="<?php echo($ciudad->id) ?>" title="Dato General UsuarioS DE Ciudad" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/dato_general_usuarios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($ciudad->id) ?>
							<img class="imgrelacionempresa" idactualciudad="<?php echo($ciudad->id) ?>" title="EmpresaS DE Ciudad" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/empresas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($ciudad->id) ?>
							<img class="imgrelacionproveedor" idactualciudad="<?php echo($ciudad->id) ?>" title="ProveedorS DE Ciudad" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($ciudad->id) ?>
							<img class="imgrelacionsucursal" idactualciudad="<?php echo($ciudad->id) ?>" title="SucursalS DE Ciudad" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/sucursals.gif" alt="Seleccionar" border="" height="15" width="15">
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



