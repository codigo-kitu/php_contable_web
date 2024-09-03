



		<form id="frmTablaDatosparametro_cuenta_cobrar" name="frmTablaDatosparametro_cuenta_cobrar">
			<div id="divTablaDatosAuxiliarparametro_cuenta_cobrarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($parametro_cuenta_cobrars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloparametro_cuenta_cobrar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Cuentas Cobrars</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosparametro_cuenta_cobrars" name="tblTablaDatosparametro_cuenta_cobrars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cuenta Cobrar</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Debito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Credito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Anulado</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cuenta Cobrar</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Debito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Credito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Anulado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($parametro_cuenta_cobrarsLocal!=null && count($parametro_cuenta_cobrarsLocal)>0) { ?>
			<?php foreach ($parametro_cuenta_cobrarsLocal as $parametro_cuenta_cobrar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($parametro_cuenta_cobrar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$parametro_cuenta_cobrar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($parametro_cuenta_cobrar->id) ?>
							</td>
							<td>
								<img class="imgseleccionarparametro_cuenta_cobrar" idactualparametro_cuenta_cobrar="<?php echo($parametro_cuenta_cobrar->id) ?>"  funcionjsactualparametro_cuenta_cobrar="'.str_replace('TO_REPLACE',$parametro_cuenta_cobrar->id.',\''.parametro_cuenta_cobrar_util::getparametro_cuenta_cobrarDescripcion($parametro_cuenta_cobrar).'\'',$this->strFuncionJs).'" title="SELECCIONAR Parametro Cuentas Cobrar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro Cuentas Cobrar ACTUAL" value="<?php echo($parametro_cuenta_cobrar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($parametro_cuenta_cobrar->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $parametro_cuenta_cobrar->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $parametro_cuenta_cobrar->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($parametro_cuenta_cobrar->id_empresa_Descripcion) ?></td>
				<?php } ?>
				
					<td class="elementotabla col_numero_cuenta_cobrar" > 
						<?php echo( $parametro_cuenta_cobrar->numero_cuenta_cobrar ) ?>
					</td>
				
					<td class="elementotabla col_numero_debito" > 
						<?php echo( $parametro_cuenta_cobrar->numero_debito ) ?>
					</td>
				
					<td class="elementotabla col_numero_credito" > 
						<?php echo( $parametro_cuenta_cobrar->numero_credito ) ?>
					</td>
				
					<td class="elementotabla col_numero_pago" > 
						<?php echo( $parametro_cuenta_cobrar->numero_pago ) ?>
					</td>
				
					<td class="elementotabla col_mostrar_anulado" ><?php  $funciones->getCheckBox($parametro_cuenta_cobrar->mostrar_anulado,'form<?php echo($strSufijo) ?>-mostrar_anuladoi',$paraReporte)  ?>
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



