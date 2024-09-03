



		<form id="frmTablaDatoscentro_costo" name="frmTablaDatoscentro_costo">
			<div id="divTablaDatosAuxiliarcentro_costosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($centro_costos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocentro_costo" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Centro Costos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscentro_costos" name="tblTablaDatoscentro_costos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="centro_costo_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Asiento Automaticos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asiento Automaticos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Asiento Predefinidos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Asientos</pre></b>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="centro_costo_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Asiento Automaticos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asiento Automaticos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Asiento Predefinidos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Asientos</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($centro_costosLocal!=null && count($centro_costosLocal)>0) { ?>
			<?php foreach ($centro_costosLocal as $centro_costo) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($centro_costo->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$centro_costo->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($centro_costo->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcentro_costo" idactualcentro_costo="<?php echo($centro_costo->id) ?>"  funcionjsactualcentro_costo="'.str_replace('TO_REPLACE',$centro_costo->id.',\''.centro_costo_util::getcentro_costoDescripcion($centro_costo).'\'',$this->strFuncionJs).'" title="SELECCIONAR Centro Costo ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Centro Costo ACTUAL" value="<?php echo($centro_costo->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($centro_costo->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $centro_costo->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $centro_costo->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($centro_costo->id_empresa_Descripcion) ?></td>
				<?php } ?>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $centro_costo->codigo ) ?>
					</td>
				
					<td class="elementotabla col_nombre" > 
						<?php echo( $centro_costo->nombre ) ?>
					</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($centro_costo->id) ?>
							<img class="imgrelacionasiento_automatico" idactualcentro_costo="<?php echo($centro_costo->id) ?>" title="Asiento AutomaticoS DE Centro Costo" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_automaticos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($centro_costo->id) ?>
							<img class="imgrelacionasiento_automatico_detalle" idactualcentro_costo="<?php echo($centro_costo->id) ?>" title="Detalle Asiento AutomaticoS DE Centro Costo" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_automatico_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($centro_costo->id) ?>
							<img class="imgrelacionasiento_predefinido" idactualcentro_costo="<?php echo($centro_costo->id) ?>" title="Asiento PredefinidoS DE Centro Costo" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_predefinidos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($centro_costo->id) ?>
							<img class="imgrelacionasiento" idactualcentro_costo="<?php echo($centro_costo->id) ?>" title="AsientoS DE Centro Costo" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asientos.gif" alt="Seleccionar" border="" height="15" width="15">
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



