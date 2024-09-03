



		<form id="frmTablaDatosperfil" name="frmTablaDatosperfil">
			<div id="divTablaDatosAuxiliarperfilsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($perfils)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloperfil" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Perfiles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosperfils" name="tblTablaDatosperfils" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Sistema<a onclick="jQuery('#form-id_sistema_img').trigger('click' );"><img id="form$strSufijo-id_sistema_img2" name="form$strSufijo-id_sistema_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="perfil_webcontrol1.abrirBusquedaParasistema('id_sistema');"><img id="form$strSufijo-id_sistema_img_busqueda2" name="form$strSufijo-id_sistema_img_busqueda2" title="Buscar Sistema" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Alterno</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre> Acciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre> Campos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre> Opciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Usuarios es s</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Sistema<a onclick="jQuery('#form-id_sistema_img').trigger('click' );"><img id="form$strSufijo-id_sistema_img2" name="form$strSufijo-id_sistema_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="perfil_webcontrol1.abrirBusquedaParasistema('id_sistema');"><img id="form$strSufijo-id_sistema_img_busqueda2" name="form$strSufijo-id_sistema_img_busqueda2" title="Buscar Sistema" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Alterno</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre> Acciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre> Campos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre> Opciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Usuarios es s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($perfilsLocal!=null && count($perfilsLocal)>0) { ?>
			<?php foreach ($perfilsLocal as $perfil) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($perfil->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$perfil->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($perfil->id) ?>
							</td>
							<td>
								<img class="imgseleccionarperfil" idactualperfil="<?php echo($perfil->id) ?>"  funcionjsactualperfil="'.str_replace('TO_REPLACE',$perfil->id.',\''.perfil_util::getperfilDescripcion($perfil).'\'',$this->strFuncionJs).'" title="SELECCIONAR Perfil ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Perfil ACTUAL" value="<?php echo($perfil->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($perfil->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $perfil->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $perfil->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_sistema" > <?php echo($perfil->id_sistema_Descripcion) ?></td>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $perfil->codigo ) ?>
					</td>
				
					<td class="elementotabla col_nombre" > 
						<?php echo( $perfil->nombre ) ?>
					</td>
				
					<td class="elementotabla col_nombre2" > 
						<?php echo( $perfil->nombre2 ) ?>
					</td>
				
					<td class="elementotabla col_estado" ><?php  $funciones->getCheckBox($perfil->estado,'form<?php echo($strSufijo) ?>-estadoi',$paraReporte)  ?>
					</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($perfil->id) ?>
							<img class="imgrelacionperfil_accion" idactualperfil="<?php echo($perfil->id) ?>" title="Perfil AccionS DE Perfil" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/perfil_accions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($perfil->id) ?>
							<img class="imgrelacionperfil_campo" idactualperfil="<?php echo($perfil->id) ?>" title="Perfil CampoS DE Perfil" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/perfil_campos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($perfil->id) ?>
							<img class="imgrelacionperfil_opcion" idactualperfil="<?php echo($perfil->id) ?>" title="Perfil OpcionS DE Perfil" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/perfil_opcions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($perfil->id) ?>
							<img class="imgrelacionperfil_usuario" idactualperfil="<?php echo($perfil->id) ?>" title="Usuarios Perfiles S DE Perfil" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/perfil_usuarios.gif" alt="Seleccionar" border="" height="15" width="15">
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



