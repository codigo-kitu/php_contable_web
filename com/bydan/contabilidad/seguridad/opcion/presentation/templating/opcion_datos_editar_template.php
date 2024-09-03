



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
				<pre class="cabecera_texto_titulo_tabla">ID__.(*)</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:<?php echo($strPermisoEliminar) ?>">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:<?php echo($strPermisoRelaciones) ?>">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sistema.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Opcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Opcion.(*)</pre>
			</th>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Posicion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Path Del Icono.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre De Clase.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo 0.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Modulo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Paquete.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Para Menu</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Guardar Relaciones</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Acciones Campo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
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
				<pre class="cabecera_texto_titulo_tabla">ID__.(*)</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:<?php echo($strPermisoEliminar) ?>">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:<?php echo($strPermisoRelaciones) ?>">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sistema.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Opcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Opcion.(*)</pre>
			</th>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Posicion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Path Del Icono.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre De Clase.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo 0.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Modulo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Paquete.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Para Menu</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Guardar Relaciones</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Acciones Campo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
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
								<img class="imgseleccionaropcion" idactualopcion="<?php echo($opcion->id) ?>" title="SELECCIONAR Opcion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($opcion->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaopcion" idactualopcion="<?php echo($opcion->id) ?>" title="ELIMINAR Opcion ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($opcion->i) ?>" name="t-id_<?php echo($opcion->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Opcion ACTUAL" value="<?php echo($opcion->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($opcion->i) ?>_0" name="t-cel_<?php echo($opcion->i) ?>_0" type="text" maxlength="25" value="<?php echo($opcion->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($opcion->id) ?><img class="imgseleccionarmostraraccionesrelacionesopcion" idactualopcion="<?php echo($opcion->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $opcion->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $opcion->updated_at 
					</td>
				<td class="elementotabla col_id_sistema" ><?php echo($funciones->getComboBoxEditar($opcion->id_sistema_Descripcion,$opcion->id_sistema,'t-cel_'.$opcion->i.'_3')) ?></td>
				<td class="elementotabla col_id_opcion" ><?php echo($funciones->getComboBoxEditar($opcion->id_opcion_Descripcion,$opcion->id_opcion,'t-cel_'.$opcion->i.'_4')) ?></td>
				<td class="elementotabla col_id_grupo_opcion" ><?php echo($funciones->getComboBoxEditar($opcion->id_grupo_opcion_Descripcion,$opcion->id_grupo_opcion,'t-cel_'.$opcion->i.'_5')) ?></td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_modulo" ><?php echo($funciones->getComboBoxEditar($opcion->id_modulo_Descripcion,$opcion->id_modulo,'t-cel_'.$opcion->i.'_6')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($opcion->i) ?>_7" name="t-cel_<?php echo($opcion->i) ?>_7" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50" value="<?php echo($opcion->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($opcion->i) ?>_7" name="t-cel_<?php echo($opcion->i) ?>_7" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50" value="<?php echo($opcion->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($opcion->i) ?>_8" name="t-cel_<?php echo($opcion->i) ?>_8" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="50" value="<?php echo($opcion->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '
							<input id="t-cel_<?php echo($opcion->i) ?>_8" name="t-cel_<?php echo($opcion->i) ?>_8" type="text" class="form-control"  placeholder="Nombre"  title="Nombre"    size="20"  maxlength="50" value="<?php echo($opcion->nombre) ?>" />
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_posicion" >  '
							<input id="t-cel_<?php echo($opcion->i) ?>_9" name="t-cel_<?php echo($opcion->i) ?>_9" type="text" class="form-control"  placeholder="Posicion"  title="Posicion"    maxlength="5" size="10"  value="<?php echo($opcion->posicion) ?>" >
							<span id="spanstrMensajeposicion" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_icon_name" >  '<textarea id="t-cel_<?php echo($opcion->i) ?>_10" name="t-cel_<?php echo($opcion->i) ?>_10" class="form-control"  placeholder="Path Del Icono"  title="Path Del Icono"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($opcion->icon_name) ?></textarea>
							<span id="spanstrMensajeicon_name" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_icon_name" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($opcion->i) ?>_10" name="t-cel_<?php echo($opcion->i) ?>_10" class="form-control"  placeholder="Path Del Icono"  title="Path Del Icono"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($opcion->icon_name) ?></input>
							<span id="spanstrMensajeicon_name" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_clase" >  '<textarea id="t-cel_<?php echo($opcion->i) ?>_11" name="t-cel_<?php echo($opcion->i) ?>_11" class="form-control"  placeholder="Nombre De Clase"  title="Nombre De Clase"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($opcion->nombre_clase) ?></textarea>
							<span id="spanstrMensajenombre_clase" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_clase" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($opcion->i) ?>_11" name="t-cel_<?php echo($opcion->i) ?>_11" class="form-control"  placeholder="Nombre De Clase"  title="Nombre De Clase"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($opcion->nombre_clase) ?></input>
							<span id="spanstrMensajenombre_clase" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_modulo0" >  '
							<input id="t-cel_<?php echo($opcion->i) ?>_12" name="t-cel_<?php echo($opcion->i) ?>_12" type="text" class="form-control"  placeholder="Modulo 0"  title="Modulo 0"    size="20"  maxlength="50" value="<?php echo($opcion->modulo0) ?>" />
							<span id="spanstrMensajemodulo0" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_modulo0" >  '
							<input id="t-cel_<?php echo($opcion->i) ?>_12" name="t-cel_<?php echo($opcion->i) ?>_12" type="text" class="form-control"  placeholder="Modulo 0"  title="Modulo 0"    size="20"  maxlength="50" value="<?php echo($opcion->modulo0) ?>" />
							<span id="spanstrMensajemodulo0" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_sub_modulo" >  '
							<input id="t-cel_<?php echo($opcion->i) ?>_13" name="t-cel_<?php echo($opcion->i) ?>_13" type="text" class="form-control"  placeholder="Sub Modulo"  title="Sub Modulo"    size="20"  maxlength="50" value="<?php echo($opcion->sub_modulo) ?>" />
							<span id="spanstrMensajesub_modulo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_sub_modulo" >  '
							<input id="t-cel_<?php echo($opcion->i) ?>_13" name="t-cel_<?php echo($opcion->i) ?>_13" type="text" class="form-control"  placeholder="Sub Modulo"  title="Sub Modulo"    size="20"  maxlength="50" value="<?php echo($opcion->sub_modulo) ?>" />
							<span id="spanstrMensajesub_modulo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_paquete" >  '<textarea id="t-cel_<?php echo($opcion->i) ?>_14" name="t-cel_<?php echo($opcion->i) ?>_14" class="form-control"  placeholder="Paquete"  title="Paquete"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($opcion->paquete) ?></textarea>
							<span id="spanstrMensajepaquete" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_paquete" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($opcion->i) ?>_14" name="t-cel_<?php echo($opcion->i) ?>_14" class="form-control"  placeholder="Paquete"  title="Paquete"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($opcion->paquete) ?></input>
							<span id="spanstrMensajepaquete" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_es_para_menu" ><?php  $funciones->getCheckBoxEditar($opcion->es_para_menu,'t-cel_<?php echo($opcion->i) ?>_15',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_es_guardar_relaciones" ><?php  $funciones->getCheckBoxEditar($opcion->es_guardar_relaciones,'t-cel_<?php echo($opcion->i) ?>_16',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_mostrar_acciones_campo" ><?php  $funciones->getCheckBoxEditar($opcion->con_mostrar_acciones_campo,'t-cel_<?php echo($opcion->i) ?>_17',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_estado" ><?php  $funciones->getCheckBoxEditar($opcion->estado,'t-cel_<?php echo($opcion->i) ?>_18',$paraReporte)  ?>
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



