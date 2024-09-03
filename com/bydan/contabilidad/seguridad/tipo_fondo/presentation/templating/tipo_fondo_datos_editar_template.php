



		<form id="frmTablaDatostipo_fondo" name="frmTablaDatostipo_fondo">
			<div id="divTablaDatosAuxiliartipo_fondosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($tipo_fondos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulotipo_fondo" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Tipo Fondos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatostipo_fondos" name="tblTablaDatostipo_fondos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($tipo_fondosLocal!=null && count($tipo_fondosLocal)>0) { ?>
			<?php foreach ($tipo_fondosLocal as $tipo_fondo) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($tipo_fondo->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$tipo_fondo->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($tipo_fondo->id) ?>
							</td>
							<td>
								<img class="imgseleccionartipo_fondo" idactualtipo_fondo="<?php echo($tipo_fondo->id) ?>" title="SELECCIONAR Tipo Fondo ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($tipo_fondo->id) ?>
							</td>
							<td>
								<img class="imgeliminartablatipo_fondo" idactualtipo_fondo="<?php echo($tipo_fondo->id) ?>" title="ELIMINAR Tipo Fondo ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($tipo_fondo->i) ?>" name="t-id_<?php echo($tipo_fondo->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Tipo Fondo ACTUAL" value="<?php echo($tipo_fondo->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($tipo_fondo->i) ?>_0" name="t-cel_<?php echo($tipo_fondo->i) ?>_0" type="text" maxlength="25" value="<?php echo($tipo_fondo->id) ?>" style="width:50px" ></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $tipo_fondo->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $tipo_fondo->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($tipo_fondo->i) ?>_3" name="t-cel_<?php echo($tipo_fondo->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50" value="<?php echo($tipo_fondo->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($tipo_fondo->i) ?>_3" name="t-cel_<?php echo($tipo_fondo->i) ?>_3" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="50" value="<?php echo($tipo_fondo->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '<textarea id="t-cel_<?php echo($tipo_fondo->i) ?>_4" name="t-cel_<?php echo($tipo_fondo->i) ?>_4" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($tipo_fondo->nombre) ?></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($tipo_fondo->i) ?>_4" name="t-cel_<?php echo($tipo_fondo->i) ?>_4" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($tipo_fondo->nombre) ?></input>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
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



