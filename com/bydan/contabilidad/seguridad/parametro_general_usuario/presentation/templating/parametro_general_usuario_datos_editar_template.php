



		<form id="frmTablaDatosparametro_general_usuario" name="frmTablaDatosparametro_general_usuario">
			<div id="divTablaDatosAuxiliarparametro_general_usuariosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_general_usuarios)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_general_usuario" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Generales</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_general_usuarios" name="tblTablaDatosparametro_general_usuarios" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Tipo Fondo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Empresa.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Path Exportar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Exportar Cabecera</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Exportar Campo Version</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Botones Tool Bar</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Cargar Por Parte</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Guardar Relaciones</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Acciones Campo General</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mensaje Confirmacion</pre>
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
				<pre class="cabecera_texto_titulo_tabla"> Tipo Fondo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Empresa.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Path Exportar.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Exportar Cabecera</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Exportar Campo Version</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Botones Tool Bar</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Cargar Por Parte</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Guardar Relaciones</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Acciones Campo General</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mensaje Confirmacion</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_general_usuariosLocal!=null && count($parametro_general_usuariosLocal)>0) { ?>
			<?php foreach ($parametro_general_usuariosLocal as $parametro_general_usuario) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_general_usuario->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_general_usuario->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_general_usuario->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_general_usuario" idactualparametro_general_usuario="<?php echo($parametro_general_usuario->id) ?>" title="SELECCIONAR Parametro General ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($parametro_general_usuario->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaparametro_general_usuario" idactualparametro_general_usuario="<?php echo($parametro_general_usuario->id) ?>" title="ELIMINAR Parametro General ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($parametro_general_usuario->i) ?>" name="t-id_<?php echo($parametro_general_usuario->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro General ACTUAL" value="<?php echo($parametro_general_usuario->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($parametro_general_usuario->i) ?>_0" name="t-cel_<?php echo($parametro_general_usuario->i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_general_usuario->id) ?>" style="width:50px" ></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $parametro_general_usuario->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $parametro_general_usuario->updated_at 
					</td>
				<td class="elementotabla col_id_tipo_fondo" ><?php echo($funciones->getComboBoxEditar($parametro_general_usuario->id_tipo_fondo_Descripcion,$parametro_general_usuario->id_tipo_fondo,'t-cel_'.$parametro_general_usuario->i.'_3')) ?></td>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($parametro_general_usuario->id_empresa_Descripcion,$parametro_general_usuario->id_empresa,'t-cel_'.$parametro_general_usuario->i.'_4')) ?></td>
				<td class="elementotabla col_id_sucursal" ><?php echo($funciones->getComboBoxEditar($parametro_general_usuario->id_sucursal_Descripcion,$parametro_general_usuario->id_sucursal,'t-cel_'.$parametro_general_usuario->i.'_5')) ?></td>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($parametro_general_usuario->id_ejercicio_Descripcion,$parametro_general_usuario->id_ejercicio,'t-cel_'.$parametro_general_usuario->i.'_6')) ?></td>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($parametro_general_usuario->id_periodo_Descripcion,$parametro_general_usuario->id_periodo,'t-cel_'.$parametro_general_usuario->i.'_7')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_path_exportar" >  '<textarea id="t-cel_<?php echo($parametro_general_usuario->i) ?>_8" name="t-cel_<?php echo($parametro_general_usuario->i) ?>_8" class="form-control"  placeholder="Path Exportar"  title="Path Exportar"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_usuario->path_exportar) ?></textarea>
							<span id="spanstrMensajepath_exportar" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_path_exportar" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($parametro_general_usuario->i) ?>_8" name="t-cel_<?php echo($parametro_general_usuario->i) ?>_8" class="form-control"  placeholder="Path Exportar"  title="Path Exportar"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($parametro_general_usuario->path_exportar) ?></input>
							<span id="spanstrMensajepath_exportar" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_con_exportar_cabecera" ><?php  $funciones->getCheckBoxEditar($parametro_general_usuario->con_exportar_cabecera,'t-cel_<?php echo($parametro_general_usuario->i) ?>_9',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_exportar_campo_version" ><?php  $funciones->getCheckBoxEditar($parametro_general_usuario->con_exportar_campo_version,'t-cel_<?php echo($parametro_general_usuario->i) ?>_10',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_botones_tool_bar" ><?php  $funciones->getCheckBoxEditar($parametro_general_usuario->con_botones_tool_bar,'t-cel_<?php echo($parametro_general_usuario->i) ?>_11',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_cargar_por_parte" ><?php  $funciones->getCheckBoxEditar($parametro_general_usuario->con_cargar_por_parte,'t-cel_<?php echo($parametro_general_usuario->i) ?>_12',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_guardar_relaciones" ><?php  $funciones->getCheckBoxEditar($parametro_general_usuario->con_guardar_relaciones,'t-cel_<?php echo($parametro_general_usuario->i) ?>_13',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_mostrar_acciones_campo_general" ><?php  $funciones->getCheckBoxEditar($parametro_general_usuario->con_mostrar_acciones_campo_general,'t-cel_<?php echo($parametro_general_usuario->i) ?>_14',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_mensaje_confirmacion" ><?php  $funciones->getCheckBoxEditar($parametro_general_usuario->con_mensaje_confirmacion,'t-cel_<?php echo($parametro_general_usuario->i) ?>_15',$paraReporte)  ?>
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



