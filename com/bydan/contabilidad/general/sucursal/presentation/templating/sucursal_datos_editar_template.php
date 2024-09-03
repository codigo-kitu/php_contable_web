



		<form id="frmTablaDatossucursal" name="frmTablaDatossucursal">
			<div id="divTablaDatosAuxiliarsucursalsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($sucursals)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulosucursal" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Sucursals</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatossucursals" name="tblTablaDatossucursals" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Tributario (RUC).(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Empresarial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion3</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Celular</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Correo Electronico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sitio Web</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Barrio Distrito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Logo</pre>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Tributario (RUC).(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Empresarial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion3</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Celular</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Correo Electronico.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sitio Web</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Barrio Distrito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Logo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($sucursalsLocal!=null && count($sucursalsLocal)>0) { ?>
			<?php foreach ($sucursalsLocal as $sucursal) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($sucursal->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$sucursal->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($sucursal->id) ?>
							</td>
							<td>
								<img class="imgseleccionarsucursal" idactualsucursal="<?php echo($sucursal->id) ?>" title="SELECCIONAR Sucursal ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($sucursal->id) ?>
							</td>
							<td>
								<img class="imgeliminartablasucursal" idactualsucursal="<?php echo($sucursal->id) ?>" title="ELIMINAR Sucursal ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($sucursal->i) ?>" name="t-id_<?php echo($sucursal->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Sucursal ACTUAL" value="<?php echo($sucursal->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($sucursal->i) ?>_0" name="t-cel_<?php echo($sucursal->i) ?>_0" type="text" maxlength="25" value="<?php echo($sucursal->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $sucursal->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $sucursal->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($sucursal->id_empresa_Descripcion,$sucursal->id_empresa,'t-cel_'.$sucursal->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_pais" ><?php echo($funciones->getComboBoxEditar($sucursal->id_pais_Descripcion,$sucursal->id_pais,'t-cel_'.$sucursal->i.'_4')) ?></td>
				<td class="elementotabla col_id_ciudad" ><?php echo($funciones->getComboBoxEditar($sucursal->id_ciudad_Descripcion,$sucursal->id_ciudad,'t-cel_'.$sucursal->i.'_5')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '<textarea id="t-cel_<?php echo($sucursal->i) ?>_6" name="t-cel_<?php echo($sucursal->i) ?>_6" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->nombre) ?></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($sucursal->i) ?>_6" name="t-cel_<?php echo($sucursal->i) ?>_6" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->nombre) ?></input>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_registro_tributario" >  '
							<input id="t-cel_<?php echo($sucursal->i) ?>_7" name="t-cel_<?php echo($sucursal->i) ?>_7" type="text" class="form-control"  placeholder="Registro Tributario (RUC)"  title="Registro Tributario (RUC)"    size="15"  maxlength="15" value="<?php echo($sucursal->registro_tributario) ?>" />
							<span id="spanstrMensajeregistro_tributario" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_registro_tributario" >  '
							<input id="t-cel_<?php echo($sucursal->i) ?>_7" name="t-cel_<?php echo($sucursal->i) ?>_7" type="text" class="form-control"  placeholder="Registro Tributario (RUC)"  title="Registro Tributario (RUC)"    size="15"  maxlength="15" value="<?php echo($sucursal->registro_tributario) ?>" />
							<span id="spanstrMensajeregistro_tributario" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_registro_sucursalrial" >  '<textarea id="t-cel_<?php echo($sucursal->i) ?>_8" name="t-cel_<?php echo($sucursal->i) ?>_8" class="form-control"  placeholder="Registro Empresarial"  title="Registro Empresarial"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->registro_sucursalrial) ?></textarea>
							<span id="spanstrMensajeregistro_sucursalrial" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_registro_sucursalrial" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($sucursal->i) ?>_8" name="t-cel_<?php echo($sucursal->i) ?>_8" class="form-control"  placeholder="Registro Empresarial"  title="Registro Empresarial"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->registro_sucursalrial) ?></input>
							<span id="spanstrMensajeregistro_sucursalrial" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion1" >  '<textarea id="t-cel_<?php echo($sucursal->i) ?>_9" name="t-cel_<?php echo($sucursal->i) ?>_9" class="form-control"  placeholder="Direccion1"  title="Direccion1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->direccion1) ?></textarea>
							<span id="spanstrMensajedireccion1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion1" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($sucursal->i) ?>_9" name="t-cel_<?php echo($sucursal->i) ?>_9" class="form-control"  placeholder="Direccion1"  title="Direccion1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->direccion1) ?></input>
							<span id="spanstrMensajedireccion1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion2" >  '<textarea id="t-cel_<?php echo($sucursal->i) ?>_10" name="t-cel_<?php echo($sucursal->i) ?>_10" class="form-control"  placeholder="Direccion2"  title="Direccion2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->direccion2) ?></textarea>
							<span id="spanstrMensajedireccion2" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion2" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($sucursal->i) ?>_10" name="t-cel_<?php echo($sucursal->i) ?>_10" class="form-control"  placeholder="Direccion2"  title="Direccion2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->direccion2) ?></input>
							<span id="spanstrMensajedireccion2" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion3" >  '<textarea id="t-cel_<?php echo($sucursal->i) ?>_11" name="t-cel_<?php echo($sucursal->i) ?>_11" class="form-control"  placeholder="Direccion3"  title="Direccion3"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->direccion3) ?></textarea>
							<span id="spanstrMensajedireccion3" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion3" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($sucursal->i) ?>_11" name="t-cel_<?php echo($sucursal->i) ?>_11" class="form-control"  placeholder="Direccion3"  title="Direccion3"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->direccion3) ?></input>
							<span id="spanstrMensajedireccion3" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono1" >  '
							<input id="t-cel_<?php echo($sucursal->i) ?>_12" name="t-cel_<?php echo($sucursal->i) ?>_12" type="text" class="form-control"  placeholder="Telefono1"  title="Telefono1"    size="20"  maxlength="40" value="<?php echo($sucursal->telefono1) ?>" />
							<span id="spanstrMensajetelefono1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono1" >  '
							<input id="t-cel_<?php echo($sucursal->i) ?>_12" name="t-cel_<?php echo($sucursal->i) ?>_12" type="text" class="form-control"  placeholder="Telefono1"  title="Telefono1"    size="20"  maxlength="40" value="<?php echo($sucursal->telefono1) ?>" />
							<span id="spanstrMensajetelefono1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_celular" >  '
							<input id="t-cel_<?php echo($sucursal->i) ?>_13" name="t-cel_<?php echo($sucursal->i) ?>_13" type="text" class="form-control"  placeholder="Celular"  title="Celular"    size="20"  maxlength="40" value="<?php echo($sucursal->celular) ?>" />
							<span id="spanstrMensajecelular" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_celular" >  '
							<input id="t-cel_<?php echo($sucursal->i) ?>_13" name="t-cel_<?php echo($sucursal->i) ?>_13" type="text" class="form-control"  placeholder="Celular"  title="Celular"    size="20"  maxlength="40" value="<?php echo($sucursal->celular) ?>" />
							<span id="spanstrMensajecelular" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_correo_electronico" >  '<textarea id="t-cel_<?php echo($sucursal->i) ?>_14" name="t-cel_<?php echo($sucursal->i) ?>_14" class="form-control"  placeholder="Correo Electronico"  title="Correo Electronico"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->correo_electronico) ?></textarea>
							<span id="spanstrMensajecorreo_electronico" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_correo_electronico" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($sucursal->i) ?>_14" name="t-cel_<?php echo($sucursal->i) ?>_14" class="form-control"  placeholder="Correo Electronico"  title="Correo Electronico"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->correo_electronico) ?></input>
							<span id="spanstrMensajecorreo_electronico" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_sitio_web" >  '<textarea id="t-cel_<?php echo($sucursal->i) ?>_15" name="t-cel_<?php echo($sucursal->i) ?>_15" class="form-control"  placeholder="Sitio Web"  title="Sitio Web"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->sitio_web) ?></textarea>
							<span id="spanstrMensajesitio_web" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_sitio_web" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($sucursal->i) ?>_15" name="t-cel_<?php echo($sucursal->i) ?>_15" class="form-control"  placeholder="Sitio Web"  title="Sitio Web"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->sitio_web) ?></input>
							<span id="spanstrMensajesitio_web" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_postal" >  '
							<input id="t-cel_<?php echo($sucursal->i) ?>_16" name="t-cel_<?php echo($sucursal->i) ?>_16" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="20"  maxlength="40" value="<?php echo($sucursal->codigo_postal) ?>" />
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_postal" >  '
							<input id="t-cel_<?php echo($sucursal->i) ?>_16" name="t-cel_<?php echo($sucursal->i) ?>_16" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="20"  maxlength="40" value="<?php echo($sucursal->codigo_postal) ?>" />
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_fax" >  '
							<input id="t-cel_<?php echo($sucursal->i) ?>_17" name="t-cel_<?php echo($sucursal->i) ?>_17" type="text" class="form-control"  placeholder="Fax"  title="Fax"    size="20"  maxlength="40" value="<?php echo($sucursal->fax) ?>" />
							<span id="spanstrMensajefax" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_fax" >  '
							<input id="t-cel_<?php echo($sucursal->i) ?>_17" name="t-cel_<?php echo($sucursal->i) ?>_17" type="text" class="form-control"  placeholder="Fax"  title="Fax"    size="20"  maxlength="40" value="<?php echo($sucursal->fax) ?>" />
							<span id="spanstrMensajefax" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_barrio_distrito" >  '<textarea id="t-cel_<?php echo($sucursal->i) ?>_18" name="t-cel_<?php echo($sucursal->i) ?>_18" class="form-control"  placeholder="Barrio Distrito"  title="Barrio Distrito"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->barrio_distrito) ?></textarea>
							<span id="spanstrMensajebarrio_distrito" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_barrio_distrito" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($sucursal->i) ?>_18" name="t-cel_<?php echo($sucursal->i) ?>_18" class="form-control"  placeholder="Barrio Distrito"  title="Barrio Distrito"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sucursal->barrio_distrito) ?></input>
							<span id="spanstrMensajebarrio_distrito" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_logo" >  '<textarea id="t-cel_<?php echo($sucursal->i) ?>_19" name="t-cel_<?php echo($sucursal->i) ?>_19" class="form-control"  placeholder="Logo"  title="Logo"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($sucursal->logo) ?></textarea>
							<span id="spanstrMensajelogo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_logo" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($sucursal->i) ?>_19" name="t-cel_<?php echo($sucursal->i) ?>_19" class="form-control"  placeholder="Logo"  title="Logo"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($sucursal->logo) ?></input>
							<span id="spanstrMensajelogo" class="mensajeerror"></span>' 
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



