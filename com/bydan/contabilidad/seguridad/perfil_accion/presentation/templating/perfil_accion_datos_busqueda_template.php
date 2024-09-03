



		<form id="frmTablaDatosperfil_accion" name="frmTablaDatosperfil_accion">
			<div id="divTablaDatosAuxiliarperfil_accionsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($perfil_accions)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloperfil_accion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Perfil Acciones</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosperfil_accions" name="tblTablaDatosperfil_accions" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Perfil<a onclick="jQuery('#form-id_perfil_img').trigger('click' );"><img id="form$strSufijo-id_perfil_img2" name="form$strSufijo-id_perfil_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="perfil_accion_webcontrol1.abrirBusquedaParaperfil('id_perfil');"><img id="form$strSufijo-id_perfil_img_busqueda2" name="form$strSufijo-id_perfil_img_busqueda2" title="Buscar Perfil" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Accion<a onclick="jQuery('#form-id_accion_img').trigger('click' );"><img id="form$strSufijo-id_accion_img2" name="form$strSufijo-id_accion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="perfil_accion_webcontrol1.abrirBusquedaParaaccion('id_accion');"><img id="form$strSufijo-id_accion_img_busqueda2" name="form$strSufijo-id_accion_img_busqueda2" title="Buscar Accion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejecusion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Perfil<a onclick="jQuery('#form-id_perfil_img').trigger('click' );"><img id="form$strSufijo-id_perfil_img2" name="form$strSufijo-id_perfil_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="perfil_accion_webcontrol1.abrirBusquedaParaperfil('id_perfil');"><img id="form$strSufijo-id_perfil_img_busqueda2" name="form$strSufijo-id_perfil_img_busqueda2" title="Buscar Perfil" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Accion<a onclick="jQuery('#form-id_accion_img').trigger('click' );"><img id="form$strSufijo-id_accion_img2" name="form$strSufijo-id_accion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="perfil_accion_webcontrol1.abrirBusquedaParaaccion('id_accion');"><img id="form$strSufijo-id_accion_img_busqueda2" name="form$strSufijo-id_accion_img_busqueda2" title="Buscar Accion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejecusion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($perfil_accionsLocal!=null && count($perfil_accionsLocal)>0) { ?>
			<?php foreach ($perfil_accionsLocal as $perfil_accion) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($perfil_accion->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$perfil_accion->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($perfil_accion->id) ?>
							</td>
							<td>
								<img class="imgseleccionarperfil_accion" idactualperfil_accion="<?php echo($perfil_accion->id) ?>"  funcionjsactualperfil_accion="'.str_replace('TO_REPLACE',$perfil_accion->id.',\''.perfil_accion_util::getperfil_accionDescripcion($perfil_accion).'\'',$this->strFuncionJs).'" title="SELECCIONAR Perfil Accion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Perfil Accion ACTUAL" value="<?php echo($perfil_accion->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($perfil_accion->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $perfil_accion->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $perfil_accion->updated_at ) ?>
					</td>
				<td class="elementotabla col_id_perfil" > <?php echo($perfil_accion->id_perfil_Descripcion) ?></td>
				<td class="elementotabla col_id_accion" > <?php echo($perfil_accion->id_accion_Descripcion) ?></td>
				
					<td class="elementotabla col_ejecusion" ><?php  $funciones->getCheckBox($perfil_accion->ejecusion,'form<?php echo($strSufijo) ?>-ejecusioni',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_estado" ><?php  $funciones->getCheckBox($perfil_accion->estado,'form<?php echo($strSufijo) ?>-estadoi',$paraReporte)  ?>
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



