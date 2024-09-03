



		<form id="frmTablaDatosdato_general_usuario" name="frmTablaDatosdato_general_usuario">
			<div id="divTablaDatosAuxiliardato_general_usuariosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($dato_general_usuarios)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulodato_general_usuario" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Dato General Usuarios</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosdato_general_usuarios" name="tblTablaDatosdato_general_usuarios" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form$strSufijo-id_pais_img2" name="form$strSufijo-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form$strSufijo-id_pais_img_busqueda2" name="form$strSufijo-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form$strSufijo-id_provincia_img2" name="form$strSufijo-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form$strSufijo-id_provincia_img_busqueda2" name="form$strSufijo-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form$strSufijo-id_ciudad_img2" name="form$strSufijo-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form$strSufijo-id_ciudad_img_busqueda2" name="form$strSufijo-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cedula</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Apellidos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombres</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form$strSufijo-id_pais_img2" name="form$strSufijo-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form$strSufijo-id_pais_img_busqueda2" name="form$strSufijo-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form$strSufijo-id_provincia_img2" name="form$strSufijo-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form$strSufijo-id_provincia_img_busqueda2" name="form$strSufijo-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form$strSufijo-id_ciudad_img2" name="form$strSufijo-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form$strSufijo-id_ciudad_img_busqueda2" name="form$strSufijo-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cedula</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Apellidos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombres</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($dato_general_usuariosLocal!=null && count($dato_general_usuariosLocal)>0) { ?>
			<?php foreach ($dato_general_usuariosLocal as $dato_general_usuario) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($dato_general_usuario->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$dato_general_usuario->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($dato_general_usuario->id) ?>
							</td>
							<td>
								<img class="imgseleccionardato_general_usuario" idactualdato_general_usuario="<?php echo($dato_general_usuario->id) ?>"  funcionjsactualdato_general_usuario="'.str_replace('TO_REPLACE',$dato_general_usuario->id.',\''.dato_general_usuario_util::getdato_general_usuarioDescripcion($dato_general_usuario).'\'',$this->strFuncionJs).'" title="SELECCIONAR Dato General Usuario ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Dato General Usuario ACTUAL" value="<?php echo($dato_general_usuario->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($dato_general_usuario->id) ?>" style="width:50px" ></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $dato_general_usuario->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $dato_general_usuario->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_pais" > <?php echo($dato_general_usuario->id_pais_Descripcion) ?></td>
				<td class="elementotabla col_id_provincia" > <?php echo($dato_general_usuario->id_provincia_Descripcion) ?></td>
				<td class="elementotabla col_id_ciudad" > <?php echo($dato_general_usuario->id_ciudad_Descripcion) ?></td>
				
					<td class="elementotabla col_cedula" > 
						<?php echo( $dato_general_usuario->cedula ) ?>
					</td>
				
					<td class="elementotabla col_apellidos" > 
						<?php echo( $dato_general_usuario->apellidos ) ?>
					</td>
				
					<td class="elementotabla col_nombres" > 
						<?php echo( $dato_general_usuario->nombres ) ?>
					</td>
				
					<td class="elementotabla col_telefono" > 
						<?php echo( $dato_general_usuario->telefono ) ?>
					</td>
				
					<td class="elementotabla col_telefono_movil" > 
						<?php echo( $dato_general_usuario->telefono_movil ) ?>
					</td>

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



