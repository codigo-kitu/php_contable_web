



		<form id="frmTablaDatosopcion" name="frmTablaDatosopcion">
			<div id="divTablaDatosAuxiliaropcionsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($opcions)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloopcion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Opciones</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosopcions" name="tblTablaDatosopcions" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Sistema<a onclick="jQuery('#form-id_sistema_img').trigger('click' );"><img id="form$strSufijo-id_sistema_img2" name="form$strSufijo-id_sistema_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParasistema('id_sistema');"><img id="form$strSufijo-id_sistema_img_busqueda2" name="form$strSufijo-id_sistema_img_busqueda2" title="Buscar Sistema" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Opcion<a onclick="jQuery('#form-id_opcion_img').trigger('click' );"><img id="form$strSufijo-id_opcion_img2" name="form$strSufijo-id_opcion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParaopcion('id_opcion');"><img id="form$strSufijo-id_opcion_img_busqueda2" name="form$strSufijo-id_opcion_img_busqueda2" title="Buscar Opcion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Opcion<a onclick="jQuery('#form-id_grupo_opcion_img').trigger('click' );"><img id="form$strSufijo-id_grupo_opcion_img2" name="form$strSufijo-id_grupo_opcion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParagrupo_opcion('id_grupo_opcion');"><img id="form$strSufijo-id_grupo_opcion_img_busqueda2" name="form$strSufijo-id_grupo_opcion_img_busqueda2" title="Buscar Grupo Opcion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo<a onclick="jQuery('#form-id_modulo_img').trigger('click' );"><img id="form$strSufijo-id_modulo_img2" name="form$strSufijo-id_modulo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParamodulo('id_modulo');"><img id="form$strSufijo-id_modulo_img_busqueda2" name="form$strSufijo-id_modulo_img_busqueda2" title="Buscar Modulo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Posicion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Path Del Icono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre De Clase</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Acciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Campos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Perfil es</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Sistema<a onclick="jQuery('#form-id_sistema_img').trigger('click' );"><img id="form$strSufijo-id_sistema_img2" name="form$strSufijo-id_sistema_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParasistema('id_sistema');"><img id="form$strSufijo-id_sistema_img_busqueda2" name="form$strSufijo-id_sistema_img_busqueda2" title="Buscar Sistema" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Opcion<a onclick="jQuery('#form-id_opcion_img').trigger('click' );"><img id="form$strSufijo-id_opcion_img2" name="form$strSufijo-id_opcion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParaopcion('id_opcion');"><img id="form$strSufijo-id_opcion_img_busqueda2" name="form$strSufijo-id_opcion_img_busqueda2" title="Buscar Opcion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Opcion<a onclick="jQuery('#form-id_grupo_opcion_img').trigger('click' );"><img id="form$strSufijo-id_grupo_opcion_img2" name="form$strSufijo-id_grupo_opcion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParagrupo_opcion('id_grupo_opcion');"><img id="form$strSufijo-id_grupo_opcion_img_busqueda2" name="form$strSufijo-id_grupo_opcion_img_busqueda2" title="Buscar Grupo Opcion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo<a onclick="jQuery('#form-id_modulo_img').trigger('click' );"><img id="form$strSufijo-id_modulo_img2" name="form$strSufijo-id_modulo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParamodulo('id_modulo');"><img id="form$strSufijo-id_modulo_img_busqueda2" name="form$strSufijo-id_modulo_img_busqueda2" title="Buscar Modulo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Posicion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Path Del Icono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre De Clase</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Acciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Campos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Perfil es</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($opcionsLocal!=null && count($opcionsLocal)>0) { ?>
			<?php foreach ($opcionsLocal as $opcion) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($opcion->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$opcion->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($opcion->id) ?>
							</td>
							<td>
								<img class="imgseleccionaropcion" idactualopcion="<?php echo($opcion->id) ?>"  funcionjsactualopcion="'.str_replace('TO_REPLACE',$opcion->id.',\''.opcion_util::getopcionDescripcion($opcion).'\'',$this->strFuncionJs).'" title="SELECCIONAR Opcion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Opcion ACTUAL" value="<?php echo($opcion->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($opcion->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $opcion->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $opcion->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_sistema" > <?php echo($opcion->id_sistema_Descripcion) ?></td>
				<td class="elementotabla col_id_opcion" > <?php echo($opcion->id_opcion_Descripcion) ?></td>
				<td class="elementotabla col_id_grupo_opcion" > <?php echo($opcion->id_grupo_opcion_Descripcion) ?></td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($opcion->id_modulo_Descripcion) ?></td>
				<?php } ?>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $opcion->codigo ) ?>
					</td>
				
					<td class="elementotabla col_nombre" > 
						<?php echo( $opcion->nombre ) ?>
					</td>
				
					<td class="elementotabla col_posicion" > 
						<?php echo( $opcion->posicion ) ?>
					</td>
				
					<td class="elementotabla col_icon_name" > 
						<?php echo( $opcion->icon_name ) ?>
					</td>
				
					<td class="elementotabla col_nombre_clase" > 
						<?php echo( $opcion->nombre_clase ) ?>
					</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($opcion->id) ?>
							<img class="imgrelacionaccion" idactualopcion="<?php echo($opcion->id) ?>" title="AccionS DE Opcion" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/accions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($opcion->id) ?>
							<img class="imgrelacioncampo" idactualopcion="<?php echo($opcion->id) ?>" title="CampoS DE Opcion" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/campos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($opcion->id) ?>
							<img class="imgrelacionopcion" idactualopcion="<?php echo($opcion->id) ?>" title="OpcionS DE Opcion" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/opcions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($opcion->id) ?>
							<img class="imgrelacionperfil_opcion" idactualopcion="<?php echo($opcion->id) ?>" title="Perfil OpcionS DE Opcion" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/perfil_opcions.gif" alt="Seleccionar" border="" height="15" width="15">
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



