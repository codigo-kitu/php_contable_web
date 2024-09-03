



		<form id="frmTablaDatossistema" name="frmTablaDatossistema">
			<div id="divTablaDatosAuxiliarsistemasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($sistemas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulosistema" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Sistemas</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatossistemas" name="tblTablaDatossistemas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Principal.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Secundario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Modulos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Opciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Paquetes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Perfiles</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Principal.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Secundario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Modulos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Opciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Paquetes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Perfiles</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($sistemasLocal!=null && count($sistemasLocal)>0) { ?>
			<?php foreach ($sistemasLocal as $sistema) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($sistema->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$sistema->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($sistema->id) ?>
							</td>
							<td>
								<img class="imgseleccionarsistema" idactualsistema="<?php echo($sistema->id) ?>" title="SELECCIONAR Sistema ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($sistema->id) ?>
							</td>
							<td>
								<img class="imgeliminartablasistema" idactualsistema="<?php echo($sistema->id) ?>" title="ELIMINAR Sistema ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($sistema->i) ?>" name="t-id_<?php echo($sistema->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Sistema ACTUAL" value="<?php echo($sistema->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($sistema->i) ?>_0" name="t-cel_<?php echo($sistema->i) ?>_0" type="text" maxlength="25" value="<?php echo($sistema->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($sistema->id) ?><img class="imgseleccionarmostraraccionesrelacionessistema" idactualsistema="<?php echo($sistema->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $sistema->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $sistema->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($sistema->i) ?>_3" name="t-cel_<?php echo($sistema->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50" value="<?php echo($sistema->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($sistema->i) ?>_3" name="t-cel_<?php echo($sistema->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50" value="<?php echo($sistema->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_principal" >  '<textarea id="t-cel_<?php echo($sistema->i) ?>_4" name="t-cel_<?php echo($sistema->i) ?>_4" class="form-control"  placeholder="Nombre Principal"  title="Nombre Principal"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sistema->nombre_principal) ?></textarea>
							<span id="spanstrMensajenombre_principal" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_principal" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($sistema->i) ?>_4" name="t-cel_<?php echo($sistema->i) ?>_4" class="form-control"  placeholder="Nombre Principal"  title="Nombre Principal"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sistema->nombre_principal) ?></input>
							<span id="spanstrMensajenombre_principal" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_secundario" >  '<textarea id="t-cel_<?php echo($sistema->i) ?>_5" name="t-cel_<?php echo($sistema->i) ?>_5" class="form-control"  placeholder="Nombre Secundario"  title="Nombre Secundario"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sistema->nombre_secundario) ?></textarea>
							<span id="spanstrMensajenombre_secundario" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_secundario" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($sistema->i) ?>_5" name="t-cel_<?php echo($sistema->i) ?>_5" class="form-control"  placeholder="Nombre Secundario"  title="Nombre Secundario"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($sistema->nombre_secundario) ?></input>
							<span id="spanstrMensajenombre_secundario" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_estado" ><?php  $funciones->getCheckBoxEditar($sistema->estado,'t-cel_<?php echo($sistema->i) ?>_6',$paraReporte)  ?>
						</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($sistema->id) ?>
							<img class="imgrelacionmodulo" idactualsistema="<?php echo($sistema->id) ?>" title="ModuloS DE Sistema" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/modulos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($sistema->id) ?>
							<img class="imgrelacionopcion" idactualsistema="<?php echo($sistema->id) ?>" title="OpcionS DE Sistema" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/opcions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($sistema->id) ?>
							<img class="imgrelacionpaquete" idactualsistema="<?php echo($sistema->id) ?>" title="PaqueteS DE Sistema" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/paquetes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($sistema->id) ?>
							<img class="imgrelacionperfil" idactualsistema="<?php echo($sistema->id) ?>" title="PerfilS DE Sistema" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/perfils.gif" alt="Seleccionar" border="" height="15" width="15">
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



