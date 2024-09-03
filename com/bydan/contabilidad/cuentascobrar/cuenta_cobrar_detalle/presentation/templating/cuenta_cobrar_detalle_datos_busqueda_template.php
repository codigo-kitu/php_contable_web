



		<form id="frmTablaDatoscuenta_cobrar_detalle" name="frmTablaDatoscuenta_cobrar_detalle">
			<div id="divTablaDatosAuxiliarcuenta_cobrar_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($cuenta_cobrar_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocuenta_cobrar_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Detalle Cuenta Cobrars</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscuenta_cobrar_detalles" name="tblTablaDatoscuenta_cobrar_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form$strSufijo-id_sucursal_img2" name="form$strSufijo-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form$strSufijo-id_sucursal_img_busqueda2" name="form$strSufijo-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form$strSufijo-id_ejercicio_img2" name="form$strSufijo-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form$strSufijo-id_ejercicio_img_busqueda2" name="form$strSufijo-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form$strSufijo-id_periodo_img2" name="form$strSufijo-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form$strSufijo-id_periodo_img_busqueda2" name="form$strSufijo-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form$strSufijo-id_usuario_img2" name="form$strSufijo-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form$strSufijo-id_usuario_img_busqueda2" name="form$strSufijo-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Cobrar<a onclick="jQuery('#form-id_cuenta_cobrar_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_cobrar_img2" name="form$strSufijo-id_cuenta_cobrar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParacuenta_cobrar('id_cuenta_cobrar');"><img id="form$strSufijo-id_cuenta_cobrar_img_busqueda2" name="form$strSufijo-id_cuenta_cobrar_img_busqueda2" title="Buscar Cuenta Cobrar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado</pre>
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
				<pre class="cabecera_texto_titulo_tabla"> Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form$strSufijo-id_sucursal_img2" name="form$strSufijo-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form$strSufijo-id_sucursal_img_busqueda2" name="form$strSufijo-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form$strSufijo-id_ejercicio_img2" name="form$strSufijo-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form$strSufijo-id_ejercicio_img_busqueda2" name="form$strSufijo-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form$strSufijo-id_periodo_img2" name="form$strSufijo-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form$strSufijo-id_periodo_img_busqueda2" name="form$strSufijo-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form$strSufijo-id_usuario_img2" name="form$strSufijo-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form$strSufijo-id_usuario_img_busqueda2" name="form$strSufijo-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Cobrar<a onclick="jQuery('#form-id_cuenta_cobrar_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_cobrar_img2" name="form$strSufijo-id_cuenta_cobrar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_cobrar_detalle_webcontrol1.abrirBusquedaParacuenta_cobrar('id_cuenta_cobrar');"><img id="form$strSufijo-id_cuenta_cobrar_img_busqueda2" name="form$strSufijo-id_cuenta_cobrar_img_busqueda2" title="Buscar Cuenta Cobrar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($cuenta_cobrar_detallesLocal!=null && count($cuenta_cobrar_detallesLocal)>0) { ?>
			<?php foreach ($cuenta_cobrar_detallesLocal as $cuenta_cobrar_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cuenta_cobrar_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cuenta_cobrar_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cuenta_cobrar_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcuenta_cobrar_detalle" idactualcuenta_cobrar_detalle="<?php echo($cuenta_cobrar_detalle->id) ?>"  funcionjsactualcuenta_cobrar_detalle="'.str_replace('TO_REPLACE',$cuenta_cobrar_detalle->id.',\''.cuenta_cobrar_detalle_util::getcuenta_cobrar_detalleDescripcion($cuenta_cobrar_detalle).'\'',$this->strFuncionJs).'" title="SELECCIONAR Detalle Cuenta Cobrar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Detalle Cuenta Cobrar ACTUAL" value="<?php echo($cuenta_cobrar_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($cuenta_cobrar_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $cuenta_cobrar_detalle->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $cuenta_cobrar_detalle->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($cuenta_cobrar_detalle->id_empresa_Descripcion) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($cuenta_cobrar_detalle->id_sucursal_Descripcion) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($cuenta_cobrar_detalle->id_ejercicio_Descripcion) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($cuenta_cobrar_detalle->id_periodo_Descripcion) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($cuenta_cobrar_detalle->id_usuario_Descripcion) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_cuenta_cobrar" > <?php echo($cuenta_cobrar_detalle->id_cuenta_cobrar_Descripcion) ?></td>
				
					<td class="elementotabla col_numero" > 
						<?php echo( $cuenta_cobrar_detalle->numero ) ?>
					</td>
				
					<td class="elementotabla col_fecha_emision" > 
						<?php echo( $cuenta_cobrar_detalle->fecha_emision ) ?>
					</td>
				
					<td class="elementotabla col_fecha_vence" > 
						<?php echo( $cuenta_cobrar_detalle->fecha_vence ) ?>
					</td>
				
					<td class="elementotabla col_referencia" > 
						<?php echo( $cuenta_cobrar_detalle->referencia ) ?>
					</td>
				
					<td class="elementotabla col_monto" > 
						<?php echo( $cuenta_cobrar_detalle->monto ) ?>
					</td>
				<td class="elementotabla col_id_estado" > <?php echo($cuenta_cobrar_detalle->id_estado_Descripcion) ?></td>

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



