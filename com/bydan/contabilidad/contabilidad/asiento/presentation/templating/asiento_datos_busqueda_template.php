



		<form id="frmTablaDatosasiento" name="frmTablaDatosasiento">
			<div id="divTablaDatosAuxiliarasientosAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($asientos)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloasiento" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Asientos</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosasientos" name="tblTablaDatosasientos" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form$strSufijo-id_sucursal_img2" name="form$strSufijo-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form$strSufijo-id_sucursal_img_busqueda2" name="form$strSufijo-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form$strSufijo-id_ejercicio_img2" name="form$strSufijo-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form$strSufijo-id_ejercicio_img_busqueda2" name="form$strSufijo-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form$strSufijo-id_periodo_img2" name="form$strSufijo-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form$strSufijo-id_periodo_img_busqueda2" name="form$strSufijo-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form$strSufijo-id_usuario_img2" name="form$strSufijo-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form$strSufijo-id_usuario_img_busqueda2" name="form$strSufijo-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Asiento Predefinido<a onclick="jQuery('#form-id_asiento_predefinido_img').trigger('click' );"><img id="form$strSufijo-id_asiento_predefinido_img2" name="form$strSufijo-id_asiento_predefinido_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParaasiento_predefinido('id_asiento_predefinido');"><img id="form$strSufijo-id_asiento_predefinido_img_busqueda2" name="form$strSufijo-id_asiento_predefinido_img_busqueda2" title="Buscar Asiento Predefinido" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Documento Contable<a onclick="jQuery('#form-id_documento_contable_img').trigger('click' );"><img id="form$strSufijo-id_documento_contable_img2" name="form$strSufijo-id_documento_contable_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParadocumento_contable('id_documento_contable');"><img id="form$strSufijo-id_documento_contable_img_busqueda2" name="form$strSufijo-id_documento_contable_img_busqueda2" title="Buscar Documento Contable" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Libro Auxiliar<a onclick="jQuery('#form-id_libro_auxiliar_img').trigger('click' );"><img id="form$strSufijo-id_libro_auxiliar_img2" name="form$strSufijo-id_libro_auxiliar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParalibro_auxiliar('id_libro_auxiliar');"><img id="form$strSufijo-id_libro_auxiliar_img_busqueda2" name="form$strSufijo-id_libro_auxiliar_img_busqueda2" title="Buscar Libro Auxiliar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Fuente<a onclick="jQuery('#form-id_fuente_img').trigger('click' );"><img id="form$strSufijo-id_fuente_img2" name="form$strSufijo-id_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParafuente('id_fuente');"><img id="form$strSufijo-id_fuente_img_busqueda2" name="form$strSufijo-id_fuente_img_busqueda2" title="Buscar Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Centro Costo<a onclick="jQuery('#form-id_centro_costo_img').trigger('click' );"><img id="form$strSufijo-id_centro_costo_img2" name="form$strSufijo-id_centro_costo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParacentro_costo('id_centro_costo');"><img id="form$strSufijo-id_centro_costo_img_busqueda2" name="form$strSufijo-id_centro_costo_img_busqueda2" title="Buscar Centro Costo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Debito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Credito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalle es</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla"> Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form$strSufijo-id_sucursal_img2" name="form$strSufijo-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form$strSufijo-id_sucursal_img_busqueda2" name="form$strSufijo-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form$strSufijo-id_ejercicio_img2" name="form$strSufijo-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form$strSufijo-id_ejercicio_img_busqueda2" name="form$strSufijo-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form$strSufijo-id_periodo_img2" name="form$strSufijo-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form$strSufijo-id_periodo_img_busqueda2" name="form$strSufijo-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form$strSufijo-id_usuario_img2" name="form$strSufijo-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form$strSufijo-id_usuario_img_busqueda2" name="form$strSufijo-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Asiento Predefinido<a onclick="jQuery('#form-id_asiento_predefinido_img').trigger('click' );"><img id="form$strSufijo-id_asiento_predefinido_img2" name="form$strSufijo-id_asiento_predefinido_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParaasiento_predefinido('id_asiento_predefinido');"><img id="form$strSufijo-id_asiento_predefinido_img_busqueda2" name="form$strSufijo-id_asiento_predefinido_img_busqueda2" title="Buscar Asiento Predefinido" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Documento Contable<a onclick="jQuery('#form-id_documento_contable_img').trigger('click' );"><img id="form$strSufijo-id_documento_contable_img2" name="form$strSufijo-id_documento_contable_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParadocumento_contable('id_documento_contable');"><img id="form$strSufijo-id_documento_contable_img_busqueda2" name="form$strSufijo-id_documento_contable_img_busqueda2" title="Buscar Documento Contable" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Libro Auxiliar<a onclick="jQuery('#form-id_libro_auxiliar_img').trigger('click' );"><img id="form$strSufijo-id_libro_auxiliar_img2" name="form$strSufijo-id_libro_auxiliar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParalibro_auxiliar('id_libro_auxiliar');"><img id="form$strSufijo-id_libro_auxiliar_img_busqueda2" name="form$strSufijo-id_libro_auxiliar_img_busqueda2" title="Buscar Libro Auxiliar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Fuente<a onclick="jQuery('#form-id_fuente_img').trigger('click' );"><img id="form$strSufijo-id_fuente_img2" name="form$strSufijo-id_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParafuente('id_fuente');"><img id="form$strSufijo-id_fuente_img_busqueda2" name="form$strSufijo-id_fuente_img_busqueda2" title="Buscar Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Centro Costo<a onclick="jQuery('#form-id_centro_costo_img').trigger('click' );"><img id="form$strSufijo-id_centro_costo_img2" name="form$strSufijo-id_centro_costo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="asiento_webcontrol1.abrirBusquedaParacentro_costo('id_centro_costo');"><img id="form$strSufijo-id_centro_costo_img_busqueda2" name="form$strSufijo-id_centro_costo_img_busqueda2" title="Buscar Centro Costo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Debito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Credito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Detalle es</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($asientosLocal!=null && count($asientosLocal)>0) { ?>
			<?php foreach ($asientosLocal as $asiento) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($asiento->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$asiento->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($asiento->id) ?>
							</td>
							<td>
								<img class="imgseleccionarasiento" idactualasiento="<?php echo($asiento->id) ?>"  funcionjsactualasiento="'.str_replace('TO_REPLACE',$asiento->id.',\''.asiento_util::getasientoDescripcion($asiento).'\'',$this->strFuncionJs).'" title="SELECCIONAR Asiento ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Asiento ACTUAL" value="<?php echo($asiento->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($asiento->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $asiento->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $asiento->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($asiento->id_empresa_Descripcion) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($asiento->id_sucursal_Descripcion) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($asiento->id_ejercicio_Descripcion) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($asiento->id_periodo_Descripcion) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($asiento->id_usuario_Descripcion) ?></td>
				<?php } ?>
				
					<td class="elementotabla col_numero" > 
						<?php echo( $asiento->numero ) ?>
					</td>
				
					<td class="elementotabla col_fecha" > 
						<?php echo( $asiento->fecha ) ?>
					</td>
				<td class="elementotabla col_id_asiento_predefinido" > <?php echo($asiento->id_asiento_predefinido_Descripcion) ?></td>
				<td class="elementotabla col_id_documento_contable" > <?php echo($asiento->id_documento_contable_Descripcion) ?></td>
				<td class="elementotabla col_id_libro_auxiliar" > <?php echo($asiento->id_libro_auxiliar_Descripcion) ?></td>
				<td class="elementotabla col_id_fuente" > <?php echo($asiento->id_fuente_Descripcion) ?></td>
				<td class="elementotabla col_id_centro_costo" > <?php echo($asiento->id_centro_costo_Descripcion) ?></td>
				
					<td class="elementotabla col_descripcion" > 
						<?php echo( $asiento->descripcion ) ?>
					</td>
				
					<td class="elementotabla col_total_debito" > 
						<?php echo( $asiento->total_debito ) ?>
					</td>
				
					<td class="elementotabla col_total_credito" > 
						<?php echo( $asiento->total_credito ) ?>
					</td>
				<td class="elementotabla col_id_estado" > <?php echo($asiento->id_estado_Descripcion) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($asiento->id) ?>
							<img class="imgrelacionasiento_detalle" idactualasiento="<?php echo($asiento->id) ?>" title="Detalle AsientoS DE Asiento" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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



