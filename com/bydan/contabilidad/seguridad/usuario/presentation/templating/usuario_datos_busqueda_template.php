



		<form id="frmTablaDatosusuario" name="frmTablaDatosusuario">
			<div id="divTablaDatosAuxiliarusuariosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($usuarios)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulousuario" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Usuarios</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosusuarios" name="tblTablaDatosusuarios" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Nombre De Usuario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Clave</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Confirmar Clave</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Código Alterno</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Auditorias</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Dato General s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Historial Cambio Claves</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Generales</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>s Perfiles s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Resumen s</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Nombre De Usuario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Clave</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Confirmar Clave</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Código Alterno</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Auditorias</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Dato General s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Historial Cambio Claves</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Generales</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>s Perfiles s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Resumen s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($usuariosLocal!=null && count($usuariosLocal)>0) { ?>
			<?php foreach ($usuariosLocal as $usuario) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($usuario->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$usuario->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($usuario->id) ?>
							</td>
							<td>
								<img class="imgseleccionarusuario" idactualusuario="<?php echo($usuario->id) ?>"  funcionjsactualusuario="'.str_replace('TO_REPLACE',$usuario->id.',\''.usuario_util::getusuarioDescripcion($usuario).'\'',$this->strFuncionJs).'" title="SELECCIONAR Usuario ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Usuario ACTUAL" value="<?php echo($usuario->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($usuario->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $usuario->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $usuario->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_user_name" > 
						<?php echo( $usuario->user_name ) ?>
					</td>
				
					<td class="elementotabla col_clave" > 
						<?php echo( $usuario->clave ) ?>
					</td>
				
					<td class="elementotabla col_confirmar_clave" > 
						<?php echo( $usuario->confirmar_clave ) ?>
					</td>
				
					<td class="elementotabla col_nombre" > 
						<?php echo( $usuario->nombre ) ?>
					</td>
				
					<td class="elementotabla col_codigo_alterno" > 
						<?php echo( $usuario->codigo_alterno ) ?>
					</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($usuario->id) ?>
							<img class="imgrelacionauditoria" idactualusuario="<?php echo($usuario->id) ?>" title="AuditoriaS DE Usuario" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/auditorias.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($usuario->id) ?>
							<img class="imgrelaciondato_general_usuario" idactualusuario="<?php echo($usuario->id) ?>" title="Dato General UsuarioS DE Usuario" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/dato_general_usuarios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($usuario->id) ?>
							<img class="imgrelacionhistorial_cambio_clave" idactualusuario="<?php echo($usuario->id) ?>" title="Historial Cambio ClaveS DE Usuario" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/historial_cambio_claves.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($usuario->id) ?>
							<img class="imgrelacionparametro_general_usuario" idactualusuario="<?php echo($usuario->id) ?>" title="Parametro GeneralS DE Usuario" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/parametro_general_usuarios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($usuario->id) ?>
							<img class="imgrelacionperfil_usuario" idactualusuario="<?php echo($usuario->id) ?>" title="Usuarios Perfiles S DE Usuario" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/perfil_usuarios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($usuario->id) ?>
							<img class="imgrelacionresumen_usuario" idactualusuario="<?php echo($usuario->id) ?>" title="Resumen UsuarioS DE Usuario" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/resumen_usuarios.gif" alt="Seleccionar" border="" height="15" width="15">
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



