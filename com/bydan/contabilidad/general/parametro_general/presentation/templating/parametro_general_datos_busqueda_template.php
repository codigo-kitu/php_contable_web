



		<form id="frmTablaDatosparametro_general" name="frmTablaDatosparametro_general">
			<div id="divTablaDatosAuxiliarparametro_generalsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_generals)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_general" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Generales</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_generals" name="tblTablaDatosparametro_generals" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form$strSufijo-id_pais_img2" name="form$strSufijo-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form$strSufijo-id_pais_img_busqueda2" name="form$strSufijo-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_modena_img').trigger('click' );"><img id="form$strSufijo-id_modena_img2" name="form$strSufijo-id_modena_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParamoneda('id_modena');"><img id="form$strSufijo-id_modena_img_busqueda2" name="form$strSufijo-id_modena_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Simbolo Moneda</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Decimales</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Fecha MDA</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Cantidad Coma</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form$strSufijo-id_pais_img2" name="form$strSufijo-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form$strSufijo-id_pais_img_busqueda2" name="form$strSufijo-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_modena_img').trigger('click' );"><img id="form$strSufijo-id_modena_img2" name="form$strSufijo-id_modena_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParamoneda('id_modena');"><img id="form$strSufijo-id_modena_img_busqueda2" name="form$strSufijo-id_modena_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Simbolo Moneda</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Decimales</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Fecha MDA</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Cantidad Coma</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_generalsLocal!=null && count($parametro_generalsLocal)>0) { ?>
			<?php foreach ($parametro_generalsLocal as $parametro_general) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_general->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_general->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_general->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_general" idactualparametro_general="<?php echo($parametro_general->id) ?>"  funcionjsactualparametro_general="'.str_replace('TO_REPLACE',$parametro_general->id.',\''.parametro_general_util::getparametro_generalDescripcion($parametro_general).'\'',$this->strFuncionJs).'" title="SELECCIONAR Parametro General ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro General ACTUAL" value="<?php echo($parametro_general->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_general->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $parametro_general->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $parametro_general->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($parametro_general->id_empresa_Descripcion) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_pais" > <?php echo($parametro_general->id_pais_Descripcion) ?></td>
				<td class="elementotabla col_id_modena" > <?php echo($parametro_general->id_modena_Descripcion) ?></td>
				
					<td class="elementotabla col_simbolo_moneda" > 
						<?php echo( $parametro_general->simbolo_moneda ) ?>
					</td>
				
					<td class="elementotabla col_numero_decimales" > 
						<?php echo( $parametro_general->numero_decimales ) ?>
					</td>
				
					<td class="elementotabla col_con_formato_fecha_mda" ><?php  $funciones->getCheckBox($parametro_general->con_formato_fecha_mda,'form<?php echo($strSufijo) ?>-con_formato_fecha_mdai',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_con_formato_cantidad_coma" ><?php  $funciones->getCheckBox($parametro_general->con_formato_cantidad_coma,'form<?php echo($strSufijo) ?>-con_formato_cantidad_comai',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						<?php echo( $parametro_general->iva_porciento ) ?>
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



