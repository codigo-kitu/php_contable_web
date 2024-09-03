



		<form id="frmTablaDatosparametro_general_sg" name="frmTablaDatosparametro_general_sg">
			<div id="divTablaDatosAuxiliarparametro_general_sgsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_general_sgs)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_general_sg" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Generales</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_general_sgs" name="tblTablaDatosparametro_general_sgs" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Nombre Sistema.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Simple Sistema.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Empresa.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Version Sistema.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siglas Sistema.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mail Sistema</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Sistema</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax Sistema</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Representante Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Proceso Actualizacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Esta Activo</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Nombre Sistema.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Simple Sistema.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Empresa.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Version Sistema.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siglas Sistema.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mail Sistema</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Sistema</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax Sistema</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Representante Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Proceso Actualizacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Esta Activo</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_general_sgsLocal!=null && count($parametro_general_sgsLocal)>0) { ?>
			<?php foreach ($parametro_general_sgsLocal as $parametro_general_sg) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_general_sg->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_general_sg->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_general_sg->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_general_sg" idactualparametro_general_sg="<?php echo($parametro_general_sg->id) ?>" title="SELECCIONAR Parametro General ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($parametro_general_sg->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaparametro_general_sg" idactualparametro_general_sg="<?php echo($parametro_general_sg->id) ?>" title="ELIMINAR Parametro General ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($parametro_general_sg->i) ?>" name="t-id_<?php echo($parametro_general_sg->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro General ACTUAL" value="<?php echo($parametro_general_sg->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($parametro_general_sg->i) ?>_0" name="t-cel_<?php echo($parametro_general_sg->i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_general_sg->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $parametro_general_sg->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $parametro_general_sg->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_sistema" >  '<textarea id="t-cel_<?php echo($parametro_general_sg->i) ?>_3" name="t-cel_<?php echo($parametro_general_sg->i) ?>_3" class="form-control"  placeholder="Nombre Sistema"  title="Nombre Sistema"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_sg->nombre_sistema) ?></textarea>
							<span id="spanstrMensajenombre_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_sistema" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($parametro_general_sg->i) ?>_3" name="t-cel_<?php echo($parametro_general_sg->i) ?>_3" class="form-control"  placeholder="Nombre Sistema"  title="Nombre Sistema"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_sg->nombre_sistema) ?></input>
							<span id="spanstrMensajenombre_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_simple_sistema" >  '<textarea id="t-cel_<?php echo($parametro_general_sg->i) ?>_4" name="t-cel_<?php echo($parametro_general_sg->i) ?>_4" class="form-control"  placeholder="Nombre Simple Sistema"  title="Nombre Simple Sistema"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_sg->nombre_simple_sistema) ?></textarea>
							<span id="spanstrMensajenombre_simple_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_simple_sistema" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($parametro_general_sg->i) ?>_4" name="t-cel_<?php echo($parametro_general_sg->i) ?>_4" class="form-control"  placeholder="Nombre Simple Sistema"  title="Nombre Simple Sistema"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_sg->nombre_simple_sistema) ?></input>
							<span id="spanstrMensajenombre_simple_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_empresa" >  '<textarea id="t-cel_<?php echo($parametro_general_sg->i) ?>_5" name="t-cel_<?php echo($parametro_general_sg->i) ?>_5" class="form-control"  placeholder="Nombre Empresa"  title="Nombre Empresa"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_sg->nombre_empresa) ?></textarea>
							<span id="spanstrMensajenombre_empresa" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_empresa" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($parametro_general_sg->i) ?>_5" name="t-cel_<?php echo($parametro_general_sg->i) ?>_5" class="form-control"  placeholder="Nombre Empresa"  title="Nombre Empresa"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_sg->nombre_empresa) ?></input>
							<span id="spanstrMensajenombre_empresa" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_version_sistema" >  '
							<input id="t-cel_<?php echo($parametro_general_sg->i) ?>_6" name="t-cel_<?php echo($parametro_general_sg->i) ?>_6" type="text" class="form-control"  placeholder="Version Sistema"  title="Version Sistema"    maxlength="18" size="12"  value="<?php echo($parametro_general_sg->version_sistema) ?>" >
							<span id="spanstrMensajeversion_sistema" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_siglas_sistema" >  '
							<input id="t-cel_<?php echo($parametro_general_sg->i) ?>_7" name="t-cel_<?php echo($parametro_general_sg->i) ?>_7" type="text" class="form-control"  placeholder="Siglas Sistema"  title="Siglas Sistema"    size="15"  maxlength="15" value="<?php echo($parametro_general_sg->siglas_sistema) ?>" />
							<span id="spanstrMensajesiglas_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_siglas_sistema" >  '
							<input id="t-cel_<?php echo($parametro_general_sg->i) ?>_7" name="t-cel_<?php echo($parametro_general_sg->i) ?>_7" type="text" class="form-control"  placeholder="Siglas Sistema"  title="Siglas Sistema"    size="15"  maxlength="15" value="<?php echo($parametro_general_sg->siglas_sistema) ?>" />
							<span id="spanstrMensajesiglas_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_mail_sistema" >  '<textarea id="t-cel_<?php echo($parametro_general_sg->i) ?>_8" name="t-cel_<?php echo($parametro_general_sg->i) ?>_8" class="form-control"  placeholder="Mail Sistema"  title="Mail Sistema"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_sg->mail_sistema) ?></textarea>
							<span id="spanstrMensajemail_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_mail_sistema" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($parametro_general_sg->i) ?>_8" name="t-cel_<?php echo($parametro_general_sg->i) ?>_8" class="form-control"  placeholder="Mail Sistema"  title="Mail Sistema"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_sg->mail_sistema) ?></input>
							<span id="spanstrMensajemail_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono_sistema" >  '
							<input id="t-cel_<?php echo($parametro_general_sg->i) ?>_9" name="t-cel_<?php echo($parametro_general_sg->i) ?>_9" type="text" class="form-control"  placeholder="Telefono Sistema"  title="Telefono Sistema"    size="20"  maxlength="50" value="<?php echo($parametro_general_sg->telefono_sistema) ?>" />
							<span id="spanstrMensajetelefono_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono_sistema" >  '
							<input id="t-cel_<?php echo($parametro_general_sg->i) ?>_9" name="t-cel_<?php echo($parametro_general_sg->i) ?>_9" type="text" class="form-control"  placeholder="Telefono Sistema"  title="Telefono Sistema"    size="20"  maxlength="50" value="<?php echo($parametro_general_sg->telefono_sistema) ?>" />
							<span id="spanstrMensajetelefono_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_fax_sistema" >  '
							<input id="t-cel_<?php echo($parametro_general_sg->i) ?>_10" name="t-cel_<?php echo($parametro_general_sg->i) ?>_10" type="text" class="form-control"  placeholder="Fax Sistema"  title="Fax Sistema"    size="20"  maxlength="50" value="<?php echo($parametro_general_sg->fax_sistema) ?>" />
							<span id="spanstrMensajefax_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_fax_sistema" >  '
							<input id="t-cel_<?php echo($parametro_general_sg->i) ?>_10" name="t-cel_<?php echo($parametro_general_sg->i) ?>_10" type="text" class="form-control"  placeholder="Fax Sistema"  title="Fax Sistema"    size="20"  maxlength="50" value="<?php echo($parametro_general_sg->fax_sistema) ?>" />
							<span id="spanstrMensajefax_sistema" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_representante_nombre" >  '<textarea id="t-cel_<?php echo($parametro_general_sg->i) ?>_11" name="t-cel_<?php echo($parametro_general_sg->i) ?>_11" class="form-control"  placeholder="Representante Nombre"  title="Representante Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_sg->representante_nombre) ?></textarea>
							<span id="spanstrMensajerepresentante_nombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_representante_nombre" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($parametro_general_sg->i) ?>_11" name="t-cel_<?php echo($parametro_general_sg->i) ?>_11" class="form-control"  placeholder="Representante Nombre"  title="Representante Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_sg->representante_nombre) ?></input>
							<span id="spanstrMensajerepresentante_nombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo_proceso_actualizacion" >  '
							<input id="t-cel_<?php echo($parametro_general_sg->i) ?>_12" name="t-cel_<?php echo($parametro_general_sg->i) ?>_12" type="text" class="form-control"  placeholder="Codigo Proceso Actualizacion"  title="Codigo Proceso Actualizacion"    size="20"  maxlength="50" value="<?php echo($parametro_general_sg->codigo_proceso_actualizacion) ?>" />
							<span id="spanstrMensajecodigo_proceso_actualizacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo_proceso_actualizacion" >  '
							<input id="t-cel_<?php echo($parametro_general_sg->i) ?>_12" name="t-cel_<?php echo($parametro_general_sg->i) ?>_12" type="text" class="form-control"  placeholder="Codigo Proceso Actualizacion"  title="Codigo Proceso Actualizacion"    size="20"  maxlength="50" value="<?php echo($parametro_general_sg->codigo_proceso_actualizacion) ?>" />
							<span id="spanstrMensajecodigo_proceso_actualizacion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_esta_activo" ><?php  $funciones->getCheckBoxEditar($parametro_general_sg->esta_activo,'t-cel_<?php echo($parametro_general_sg->i) ?>_13',$paraReporte)  ?>
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



