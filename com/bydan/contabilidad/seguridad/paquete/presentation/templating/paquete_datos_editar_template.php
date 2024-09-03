



		<form id="frmTablaDatospaquete" name="frmTablaDatospaquete">
			<div id="divTablaDatosAuxiliarpaquetesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($paquetes)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulopaquete" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Paquetes</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatospaquetes" name="tblTablaDatospaquetes" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Modulos</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Modulos</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($paquetesLocal!=null && count($paquetesLocal)>0) { ?>
			<?php foreach ($paquetesLocal as $paquete) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($paquete->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$paquete->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($paquete->id) ?>
							</td>
							<td>
								<img class="imgseleccionarpaquete" idactualpaquete="<?php echo($paquete->id) ?>" title="SELECCIONAR Paquete ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($paquete->id) ?>
							</td>
							<td>
								<img class="imgeliminartablapaquete" idactualpaquete="<?php echo($paquete->id) ?>" title="ELIMINAR Paquete ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($paquete->i) ?>" name="t-id_<?php echo($paquete->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Paquete ACTUAL" value="<?php echo($paquete->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($paquete->i) ?>_0" name="t-cel_<?php echo($paquete->i) ?>_0" type="text" maxlength="25" value="<?php echo($paquete->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($paquete->id) ?><img class="imgseleccionarmostraraccionesrelacionespaquete" idactualpaquete="<?php echo($paquete->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $paquete->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $paquete->updated_at 
					</td>
				<td class="elementotabla col_id_sistema" ><?php echo($funciones->getComboBoxEditar($paquete->id_sistema_Descripcion,$paquete->id_sistema,'t-cel_'.$paquete->i.'_3')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '<textarea id="t-cel_<?php echo($paquete->i) ?>_4" name="t-cel_<?php echo($paquete->i) ?>_4" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($paquete->nombre) ?></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($paquete->i) ?>_4" name="t-cel_<?php echo($paquete->i) ?>_4" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($paquete->nombre) ?></input>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($paquete->i) ?>_5" name="t-cel_<?php echo($paquete->i) ?>_5" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($paquete->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="200"  id="t-cel_<?php echo($paquete->i) ?>_5" name="t-cel_<?php echo($paquete->i) ?>_5" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($paquete->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($paquete->id) ?>
							<img class="imgrelacionmodulo" idactualpaquete="<?php echo($paquete->id) ?>" title="ModuloS DE Paquete" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/modulos.gif" alt="Seleccionar" border="" height="15" width="15">
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



