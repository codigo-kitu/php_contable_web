



		<form id="frmTablaDatosempresa" name="frmTablaDatosempresa">
			<div id="divTablaDatosAuxiliarempresasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($empresas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloempresa" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Empresas</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosempresas" name="tblTablaDatosempresas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Ciudad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">RUC.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Comercial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sector</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mail.(*)</pre>
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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">RUC.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Comercial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sector</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mail.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Logo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($empresasLocal!=null && count($empresasLocal)>0) { ?>
			<?php foreach ($empresasLocal as $empresa) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($empresa->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$empresa->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($empresa->id) ?>
							</td>
							<td>
								<img class="imgseleccionarempresa" idactualempresa="<?php echo($empresa->id) ?>" title="SELECCIONAR Empresa ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($empresa->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaempresa" idactualempresa="<?php echo($empresa->id) ?>" title="ELIMINAR Empresa ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($empresa->i) ?>" name="t-id_<?php echo($empresa->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Empresa ACTUAL" value="<?php echo($empresa->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($empresa->i) ?>_0" name="t-cel_<?php echo($empresa->i) ?>_0" type="text" maxlength="25" value="<?php echo($empresa->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $empresa->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $empresa->updated_at 
					</td>
				<td class="elementotabla col_id_pais" ><?php echo($funciones->getComboBoxEditar($empresa->id_pais_Descripcion,$empresa->id_pais,'t-cel_'.$empresa->i.'_3')) ?></td>
				<td class="elementotabla col_id_ciudad" ><?php echo($funciones->getComboBoxEditar($empresa->id_ciudad_Descripcion,$empresa->id_ciudad,'t-cel_'.$empresa->i.'_4')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_ruc" >  '
							<input id="t-cel_<?php echo($empresa->i) ?>_5" name="t-cel_<?php echo($empresa->i) ?>_5" type="text" class="form-control"  placeholder="RUC"  title="RUC"    size="15"  maxlength="15" value="<?php echo($empresa->ruc) ?>" />
							<span id="spanstrMensajeruc" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_ruc" >  '
							<input id="t-cel_<?php echo($empresa->i) ?>_5" name="t-cel_<?php echo($empresa->i) ?>_5" type="text" class="form-control"  placeholder="RUC"  title="RUC"    size="15"  maxlength="15" value="<?php echo($empresa->ruc) ?>" />
							<span id="spanstrMensajeruc" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '<textarea id="t-cel_<?php echo($empresa->i) ?>_6" name="t-cel_<?php echo($empresa->i) ?>_6" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->nombre) ?></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($empresa->i) ?>_6" name="t-cel_<?php echo($empresa->i) ?>_6" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->nombre) ?></input>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_comercial" >  '<textarea id="t-cel_<?php echo($empresa->i) ?>_7" name="t-cel_<?php echo($empresa->i) ?>_7" class="form-control"  placeholder="Nombre Comercial"  title="Nombre Comercial"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->nombre_comercial) ?></textarea>
							<span id="spanstrMensajenombre_comercial" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_comercial" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($empresa->i) ?>_7" name="t-cel_<?php echo($empresa->i) ?>_7" class="form-control"  placeholder="Nombre Comercial"  title="Nombre Comercial"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->nombre_comercial) ?></input>
							<span id="spanstrMensajenombre_comercial" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_sector" >  '<textarea id="t-cel_<?php echo($empresa->i) ?>_8" name="t-cel_<?php echo($empresa->i) ?>_8" class="form-control"  placeholder="Sector"  title="Sector"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->sector) ?></textarea>
							<span id="spanstrMensajesector" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_sector" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($empresa->i) ?>_8" name="t-cel_<?php echo($empresa->i) ?>_8" class="form-control"  placeholder="Sector"  title="Sector"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->sector) ?></input>
							<span id="spanstrMensajesector" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion1" >  '<textarea id="t-cel_<?php echo($empresa->i) ?>_9" name="t-cel_<?php echo($empresa->i) ?>_9" class="form-control"  placeholder="Direccion1"  title="Direccion1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->direccion1) ?></textarea>
							<span id="spanstrMensajedireccion1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion1" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($empresa->i) ?>_9" name="t-cel_<?php echo($empresa->i) ?>_9" class="form-control"  placeholder="Direccion1"  title="Direccion1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->direccion1) ?></input>
							<span id="spanstrMensajedireccion1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion2" >  '<textarea id="t-cel_<?php echo($empresa->i) ?>_10" name="t-cel_<?php echo($empresa->i) ?>_10" class="form-control"  placeholder="Direccion2"  title="Direccion2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->direccion2) ?></textarea>
							<span id="spanstrMensajedireccion2" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion2" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($empresa->i) ?>_10" name="t-cel_<?php echo($empresa->i) ?>_10" class="form-control"  placeholder="Direccion2"  title="Direccion2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->direccion2) ?></input>
							<span id="spanstrMensajedireccion2" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion3" >  '<textarea id="t-cel_<?php echo($empresa->i) ?>_11" name="t-cel_<?php echo($empresa->i) ?>_11" class="form-control"  placeholder="Direccion3"  title="Direccion3"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->direccion3) ?></textarea>
							<span id="spanstrMensajedireccion3" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion3" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($empresa->i) ?>_11" name="t-cel_<?php echo($empresa->i) ?>_11" class="form-control"  placeholder="Direccion3"  title="Direccion3"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->direccion3) ?></input>
							<span id="spanstrMensajedireccion3" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono1" >  '
							<input id="t-cel_<?php echo($empresa->i) ?>_12" name="t-cel_<?php echo($empresa->i) ?>_12" type="text" class="form-control"  placeholder="Telefono1"  title="Telefono1"    size="20"  maxlength="40" value="<?php echo($empresa->telefono1) ?>" />
							<span id="spanstrMensajetelefono1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono1" >  '
							<input id="t-cel_<?php echo($empresa->i) ?>_12" name="t-cel_<?php echo($empresa->i) ?>_12" type="text" class="form-control"  placeholder="Telefono1"  title="Telefono1"    size="20"  maxlength="40" value="<?php echo($empresa->telefono1) ?>" />
							<span id="spanstrMensajetelefono1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_movil" >  '
							<input id="t-cel_<?php echo($empresa->i) ?>_13" name="t-cel_<?php echo($empresa->i) ?>_13" type="text" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"    size="20"  maxlength="40" value="<?php echo($empresa->movil) ?>" />
							<span id="spanstrMensajemovil" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_movil" >  '
							<input id="t-cel_<?php echo($empresa->i) ?>_13" name="t-cel_<?php echo($empresa->i) ?>_13" type="text" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"    size="20"  maxlength="40" value="<?php echo($empresa->movil) ?>" />
							<span id="spanstrMensajemovil" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_mail" >  '<textarea id="t-cel_<?php echo($empresa->i) ?>_14" name="t-cel_<?php echo($empresa->i) ?>_14" class="form-control"  placeholder="Mail"  title="Mail"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->mail) ?></textarea>
							<span id="spanstrMensajemail" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_mail" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($empresa->i) ?>_14" name="t-cel_<?php echo($empresa->i) ?>_14" class="form-control"  placeholder="Mail"  title="Mail"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->mail) ?></input>
							<span id="spanstrMensajemail" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_sitio_web" >  '<textarea id="t-cel_<?php echo($empresa->i) ?>_15" name="t-cel_<?php echo($empresa->i) ?>_15" class="form-control"  placeholder="Sitio Web"  title="Sitio Web"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->sitio_web) ?></textarea>
							<span id="spanstrMensajesitio_web" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_sitio_web" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($empresa->i) ?>_15" name="t-cel_<?php echo($empresa->i) ?>_15" class="form-control"  placeholder="Sitio Web"  title="Sitio Web"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($empresa->sitio_web) ?></input>
							<span id="spanstrMensajesitio_web" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_postal" >  '
							<input id="t-cel_<?php echo($empresa->i) ?>_16" name="t-cel_<?php echo($empresa->i) ?>_16" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="20"  maxlength="40" value="<?php echo($empresa->codigo_postal) ?>" />
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_postal" >  '
							<input id="t-cel_<?php echo($empresa->i) ?>_16" name="t-cel_<?php echo($empresa->i) ?>_16" type="text" class="form-control"  placeholder="Codigo Postal"  title="Codigo Postal"    size="20"  maxlength="40" value="<?php echo($empresa->codigo_postal) ?>" />
							<span id="spanstrMensajecodigo_postal" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_fax" >  '
							<input id="t-cel_<?php echo($empresa->i) ?>_17" name="t-cel_<?php echo($empresa->i) ?>_17" type="text" class="form-control"  placeholder="Fax"  title="Fax"    size="20"  maxlength="40" value="<?php echo($empresa->fax) ?>" />
							<span id="spanstrMensajefax" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_fax" >  '
							<input id="t-cel_<?php echo($empresa->i) ?>_17" name="t-cel_<?php echo($empresa->i) ?>_17" type="text" class="form-control"  placeholder="Fax"  title="Fax"    size="20"  maxlength="40" value="<?php echo($empresa->fax) ?>" />
							<span id="spanstrMensajefax" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_logo" >  '<textarea id="t-cel_<?php echo($empresa->i) ?>_18" name="t-cel_<?php echo($empresa->i) ?>_18" class="form-control"  placeholder="Logo"  title="Logo"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($empresa->logo) ?></textarea>
							<span id="spanstrMensajelogo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_logo" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($empresa->i) ?>_18" name="t-cel_<?php echo($empresa->i) ?>_18" class="form-control"  placeholder="Logo"  title="Logo"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($empresa->logo) ?></input>
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



