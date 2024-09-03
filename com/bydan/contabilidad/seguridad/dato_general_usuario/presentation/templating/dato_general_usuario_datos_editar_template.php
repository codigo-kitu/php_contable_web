



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
				<pre class="cabecera_texto_titulo_tabla">Pais.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cedula.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Apellidos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombres.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Url.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Nacimiento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Pais.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cedula.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Apellidos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombres.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Url.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Nacimiento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion.(*)</pre>
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
								<img class="imgseleccionardato_general_usuario" idactualdato_general_usuario="<?php echo($dato_general_usuario->id) ?>" title="SELECCIONAR Dato General Usuario ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($dato_general_usuario->id) ?>
							</td>
							<td>
								<img class="imgeliminartabladato_general_usuario" idactualdato_general_usuario="<?php echo($dato_general_usuario->id) ?>" title="ELIMINAR Dato General Usuario ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($dato_general_usuario->i) ?>" name="t-id_<?php echo($dato_general_usuario->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Dato General Usuario ACTUAL" value="<?php echo($dato_general_usuario->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($dato_general_usuario->i) ?>_0" name="t-cel_<?php echo($dato_general_usuario->i) ?>_0" type="text" maxlength="25" value="<?php echo($dato_general_usuario->id) ?>" style="width:50px" ></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $dato_general_usuario->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $dato_general_usuario->updated_at 
					</td>
				<td class="elementotabla col_id_pais" ><?php echo($funciones->getComboBoxEditar($dato_general_usuario->id_pais_Descripcion,$dato_general_usuario->id_pais,'t-cel_'.$dato_general_usuario->i.'_3')) ?></td>
				<td class="elementotabla col_id_provincia" ><?php echo($funciones->getComboBoxEditar($dato_general_usuario->id_provincia_Descripcion,$dato_general_usuario->id_provincia,'t-cel_'.$dato_general_usuario->i.'_4')) ?></td>
				<td class="elementotabla col_id_ciudad" ><?php echo($funciones->getComboBoxEditar($dato_general_usuario->id_ciudad_Descripcion,$dato_general_usuario->id_ciudad,'t-cel_'.$dato_general_usuario->i.'_5')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_cedula" >  '
							<input id="t-cel_<?php echo($dato_general_usuario->i) ?>_6" name="t-cel_<?php echo($dato_general_usuario->i) ?>_6" type="text" class="form-control"  placeholder="Cedula"  title="Cedula"    size="20"  maxlength="20" value="<?php echo($dato_general_usuario->cedula) ?>" />
							<span id="spanstrMensajecedula" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_cedula" >  '
							<input id="t-cel_<?php echo($dato_general_usuario->i) ?>_6" name="t-cel_<?php echo($dato_general_usuario->i) ?>_6" type="text" class="form-control"  placeholder="Cedula"  title="Cedula"    size="20"  maxlength="20" value="<?php echo($dato_general_usuario->cedula) ?>" />
							<span id="spanstrMensajecedula" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_apellidos" >  '<textarea id="t-cel_<?php echo($dato_general_usuario->i) ?>_7" name="t-cel_<?php echo($dato_general_usuario->i) ?>_7" class="form-control"  placeholder="Apellidos"  title="Apellidos"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->apellidos) ?></textarea>
							<span id="spanstrMensajeapellidos" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_apellidos" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($dato_general_usuario->i) ?>_7" name="t-cel_<?php echo($dato_general_usuario->i) ?>_7" class="form-control"  placeholder="Apellidos"  title="Apellidos"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->apellidos) ?></input>
							<span id="spanstrMensajeapellidos" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombres" >  '<textarea id="t-cel_<?php echo($dato_general_usuario->i) ?>_8" name="t-cel_<?php echo($dato_general_usuario->i) ?>_8" class="form-control"  placeholder="Nombres"  title="Nombres"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->nombres) ?></textarea>
							<span id="spanstrMensajenombres" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombres" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($dato_general_usuario->i) ?>_8" name="t-cel_<?php echo($dato_general_usuario->i) ?>_8" class="form-control"  placeholder="Nombres"  title="Nombres"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->nombres) ?></input>
							<span id="spanstrMensajenombres" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono" >  '<textarea id="t-cel_<?php echo($dato_general_usuario->i) ?>_9" name="t-cel_<?php echo($dato_general_usuario->i) ?>_9" class="form-control"  placeholder="Telefono"  title="Telefono"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->telefono) ?></textarea>
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($dato_general_usuario->i) ?>_9" name="t-cel_<?php echo($dato_general_usuario->i) ?>_9" class="form-control"  placeholder="Telefono"  title="Telefono"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->telefono) ?></input>
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono_movil" >  '<textarea id="t-cel_<?php echo($dato_general_usuario->i) ?>_10" name="t-cel_<?php echo($dato_general_usuario->i) ?>_10" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->telefono_movil) ?></textarea>
							<span id="spanstrMensajetelefono_movil" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono_movil" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($dato_general_usuario->i) ?>_10" name="t-cel_<?php echo($dato_general_usuario->i) ?>_10" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->telefono_movil) ?></input>
							<span id="spanstrMensajetelefono_movil" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_e_mail" >  '<textarea id="t-cel_<?php echo($dato_general_usuario->i) ?>_11" name="t-cel_<?php echo($dato_general_usuario->i) ?>_11" class="form-control"  placeholder="E Mail"  title="E Mail"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->e_mail) ?></textarea>
							<span id="spanstrMensajee_mail" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_e_mail" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($dato_general_usuario->i) ?>_11" name="t-cel_<?php echo($dato_general_usuario->i) ?>_11" class="form-control"  placeholder="E Mail"  title="E Mail"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->e_mail) ?></input>
							<span id="spanstrMensajee_mail" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_url" >  '<textarea id="t-cel_<?php echo($dato_general_usuario->i) ?>_12" name="t-cel_<?php echo($dato_general_usuario->i) ?>_12" class="form-control"  placeholder="Url"  title="Url"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->url) ?></textarea>
							<span id="spanstrMensajeurl" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_url" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($dato_general_usuario->i) ?>_12" name="t-cel_<?php echo($dato_general_usuario->i) ?>_12" class="form-control"  placeholder="Url"  title="Url"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->url) ?></input>
							<span id="spanstrMensajeurl" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_nacimiento" >  '
							<input id="t-cel_<?php echo($dato_general_usuario->i) ?>_13" name="t-cel_<?php echo($dato_general_usuario->i) ?>_13" type="text" class="form-control"  placeholder="Fecha Nacimiento"  title="Fecha Nacimiento"    size="10"  value="<?php echo($dato_general_usuario->fecha_nacimiento) ?>" >
							<span id="spanstrMensajefecha_nacimiento" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion" >  '<textarea id="t-cel_<?php echo($dato_general_usuario->i) ?>_14" name="t-cel_<?php echo($dato_general_usuario->i) ?>_14" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->direccion) ?></textarea>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion" >  '<input type="text" maxlength="250"  id="t-cel_<?php echo($dato_general_usuario->i) ?>_14" name="t-cel_<?php echo($dato_general_usuario->i) ?>_14" class="form-control"  placeholder="Direccion"  title="Direccion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($dato_general_usuario->direccion) ?></input>
							<span id="spanstrMensajedireccion" class="mensajeerror"></span>' 
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



