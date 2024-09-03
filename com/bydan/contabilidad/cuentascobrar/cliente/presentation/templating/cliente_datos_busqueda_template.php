



		<form id="frmTablaDatoscliente" name="frmTablaDatoscliente">
			<div id="divTablaDatosAuxiliarclientesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($clientes)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocliente" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Clientes</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosclientes" name="tblTablaDatosclientes" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Persona</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categorias Cliente<a onclick="jQuery('#form-id_categoria_cliente_img').trigger('click' );"><img id="form$strSufijo-id_categoria_cliente_img2" name="form$strSufijo-id_categoria_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacategoria_cliente('id_categoria_cliente');"><img id="form$strSufijo-id_categoria_cliente_img_busqueda2" name="form$strSufijo-id_categoria_cliente_img_busqueda2" title="Buscar Categorias Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Precio<a onclick="jQuery('#form-id_tipo_precio_img').trigger('click' );"><img id="form$strSufijo-id_tipo_precio_img2" name="form$strSufijo-id_tipo_precio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatipo_precio('id_tipo_precio');"><img id="form$strSufijo-id_tipo_precio_img_busqueda2" name="form$strSufijo-id_tipo_precio_img_busqueda2" title="Buscar Tipo Precio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Giro Negocio<a onclick="jQuery('#form-id_giro_negocio_cliente_img').trigger('click' );"><img id="form$strSufijo-id_giro_negocio_cliente_img2" name="form$strSufijo-id_giro_negocio_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParagiro_negocio_cliente('id_giro_negocio_cliente');"><img id="form$strSufijo-id_giro_negocio_cliente_img_busqueda2" name="form$strSufijo-id_giro_negocio_cliente_img_busqueda2" title="Buscar Giro Negocio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form$strSufijo-id_pais_img2" name="form$strSufijo-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form$strSufijo-id_pais_img_busqueda2" name="form$strSufijo-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form$strSufijo-id_provincia_img2" name="form$strSufijo-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form$strSufijo-id_provincia_img_busqueda2" name="form$strSufijo-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form$strSufijo-id_ciudad_img2" name="form$strSufijo-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form$strSufijo-id_ciudad_img_busqueda2" name="form$strSufijo-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form$strSufijo-id_vendedor_img2" name="form$strSufijo-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form$strSufijo-id_vendedor_img_busqueda2" name="form$strSufijo-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form$strSufijo-id_termino_pago_cliente_img2" name="form$strSufijo-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form$strSufijo-id_termino_pago_cliente_img_busqueda2" name="form$strSufijo-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_img2" name="form$strSufijo-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form$strSufijo-id_cuenta_img_busqueda2" name="form$strSufijo-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_impuesto_img2" name="form$strSufijo-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form$strSufijo-id_impuesto_img_busqueda2" name="form$strSufijo-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form$strSufijo-id_retencion_img2" name="form$strSufijo-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form$strSufijo-id_retencion_img_busqueda2" name="form$strSufijo-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Fuente<a onclick="jQuery('#form-id_retencion_fuente_img').trigger('click' );"><img id="form$strSufijo-id_retencion_fuente_img2" name="form$strSufijo-id_retencion_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_fuente('id_retencion_fuente');"><img id="form$strSufijo-id_retencion_fuente_img_busqueda2" name="form$strSufijo-id_retencion_fuente_img_busqueda2" title="Buscar Retencion Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ica<a onclick="jQuery('#form-id_retencion_ica_img').trigger('click' );"><img id="form$strSufijo-id_retencion_ica_img2" name="form$strSufijo-id_retencion_ica_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_ica('id_retencion_ica');"><img id="form$strSufijo-id_retencion_ica_img_busqueda2" name="form$strSufijo-id_retencion_ica_img_busqueda2" title="Buscar Retencion Ica" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_otro_impuesto_img2" name="form$strSufijo-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form$strSufijo-id_otro_impuesto_img_busqueda2" name="form$strSufijo-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos ses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista s</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Persona</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categorias Cliente<a onclick="jQuery('#form-id_categoria_cliente_img').trigger('click' );"><img id="form$strSufijo-id_categoria_cliente_img2" name="form$strSufijo-id_categoria_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacategoria_cliente('id_categoria_cliente');"><img id="form$strSufijo-id_categoria_cliente_img_busqueda2" name="form$strSufijo-id_categoria_cliente_img_busqueda2" title="Buscar Categorias Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Precio<a onclick="jQuery('#form-id_tipo_precio_img').trigger('click' );"><img id="form$strSufijo-id_tipo_precio_img2" name="form$strSufijo-id_tipo_precio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatipo_precio('id_tipo_precio');"><img id="form$strSufijo-id_tipo_precio_img_busqueda2" name="form$strSufijo-id_tipo_precio_img_busqueda2" title="Buscar Tipo Precio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Giro Negocio<a onclick="jQuery('#form-id_giro_negocio_cliente_img').trigger('click' );"><img id="form$strSufijo-id_giro_negocio_cliente_img2" name="form$strSufijo-id_giro_negocio_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParagiro_negocio_cliente('id_giro_negocio_cliente');"><img id="form$strSufijo-id_giro_negocio_cliente_img_busqueda2" name="form$strSufijo-id_giro_negocio_cliente_img_busqueda2" title="Buscar Giro Negocio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form$strSufijo-id_pais_img2" name="form$strSufijo-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form$strSufijo-id_pais_img_busqueda2" name="form$strSufijo-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form$strSufijo-id_provincia_img2" name="form$strSufijo-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form$strSufijo-id_provincia_img_busqueda2" name="form$strSufijo-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form$strSufijo-id_ciudad_img2" name="form$strSufijo-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form$strSufijo-id_ciudad_img_busqueda2" name="form$strSufijo-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form$strSufijo-id_vendedor_img2" name="form$strSufijo-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form$strSufijo-id_vendedor_img_busqueda2" name="form$strSufijo-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form$strSufijo-id_termino_pago_cliente_img2" name="form$strSufijo-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form$strSufijo-id_termino_pago_cliente_img_busqueda2" name="form$strSufijo-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_img2" name="form$strSufijo-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form$strSufijo-id_cuenta_img_busqueda2" name="form$strSufijo-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_impuesto_img2" name="form$strSufijo-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form$strSufijo-id_impuesto_img_busqueda2" name="form$strSufijo-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form$strSufijo-id_retencion_img2" name="form$strSufijo-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form$strSufijo-id_retencion_img_busqueda2" name="form$strSufijo-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Fuente<a onclick="jQuery('#form-id_retencion_fuente_img').trigger('click' );"><img id="form$strSufijo-id_retencion_fuente_img2" name="form$strSufijo-id_retencion_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_fuente('id_retencion_fuente');"><img id="form$strSufijo-id_retencion_fuente_img_busqueda2" name="form$strSufijo-id_retencion_fuente_img_busqueda2" title="Buscar Retencion Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ica<a onclick="jQuery('#form-id_retencion_ica_img').trigger('click' );"><img id="form$strSufijo-id_retencion_ica_img2" name="form$strSufijo-id_retencion_ica_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_ica('id_retencion_ica');"><img id="form$strSufijo-id_retencion_ica_img_busqueda2" name="form$strSufijo-id_retencion_ica_img_busqueda2" title="Buscar Retencion Ica" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form$strSufijo-id_otro_impuesto_img2" name="form$strSufijo-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form$strSufijo-id_otro_impuesto_img_busqueda2" name="form$strSufijo-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos ses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista s</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($clientesLocal!=null && count($clientesLocal)>0) { ?>
			<?php foreach ($clientesLocal as $cliente) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cliente->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cliente->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cliente->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcliente" idactualcliente="<?php echo($cliente->id) ?>"  funcionjsactualcliente="'.str_replace('TO_REPLACE',$cliente->id.',\''.cliente_util::getclienteDescripcion($cliente).'\'',$this->strFuncionJs).'" title="SELECCIONAR Cliente ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cliente ACTUAL" value="<?php echo($cliente->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($cliente->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $cliente->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $cliente->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($cliente->id_empresa_Descripcion) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_tipo_persona" > <?php echo($cliente->id_tipo_persona_Descripcion) ?></td>
				<td class="elementotabla col_id_categoria_cliente" > <?php echo($cliente->id_categoria_cliente_Descripcion) ?></td>
				<td class="elementotabla col_id_tipo_precio" > <?php echo($cliente->id_tipo_precio_Descripcion) ?></td>
				<td class="elementotabla col_id_giro_negocio_cliente" > <?php echo($cliente->id_giro_negocio_cliente_Descripcion) ?></td>
				
					<td class="elementotabla col_codigo" > 
						<?php echo( $cliente->codigo ) ?>
					</td>
				
					<td class="elementotabla col_ruc" > 
						<?php echo( $cliente->ruc ) ?>
					</td>
				
					<td class="elementotabla col_primer_apellido" > 
						<?php echo( $cliente->primer_apellido ) ?>
					</td>
				
					<td class="elementotabla col_segundo_apellido" > 
						<?php echo( $cliente->segundo_apellido ) ?>
					</td>
				
					<td class="elementotabla col_primer_nombre" > 
						<?php echo( $cliente->primer_nombre ) ?>
					</td>
				<td class="elementotabla col_id_pais" > <?php echo($cliente->id_pais_Descripcion) ?></td>
				<td class="elementotabla col_id_provincia" > <?php echo($cliente->id_provincia_Descripcion) ?></td>
				<td class="elementotabla col_id_ciudad" > <?php echo($cliente->id_ciudad_Descripcion) ?></td>
				<td class="elementotabla col_id_vendedor" > <?php echo($cliente->id_vendedor_Descripcion) ?></td>
				<td class="elementotabla col_id_termino_pago_cliente" > <?php echo($cliente->id_termino_pago_cliente_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta" > <?php echo($cliente->id_cuenta_Descripcion) ?></td>
				<td class="elementotabla col_id_impuesto" > <?php echo($cliente->id_impuesto_Descripcion) ?></td>
				<td class="elementotabla col_id_retencion" > <?php echo($cliente->id_retencion_Descripcion) ?></td>
				<td class="elementotabla col_id_retencion_fuente" > <?php echo($cliente->id_retencion_fuente_Descripcion) ?></td>
				<td class="elementotabla col_id_retencion_ica" > <?php echo($cliente->id_retencion_ica_Descripcion) ?></td>
				<td class="elementotabla col_id_otro_impuesto" > <?php echo($cliente->id_otro_impuesto_Descripcion) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacionconsignacion" idactualcliente="<?php echo($cliente->id) ?>" title="ConsignacionS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/consignacions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacioncuenta_cobrar" idactualcliente="<?php echo($cliente->id) ?>" title="Cuenta CobrarS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelaciondevolucion_factura" idactualcliente="<?php echo($cliente->id) ?>" title="Devolucion FacturaS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/devolucion_facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelaciondocumento_cliente" idactualcliente="<?php echo($cliente->id) ?>" title="Documentos ClientesS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/documento_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacionestimado" idactualcliente="<?php echo($cliente->id) ?>" title="EstimadoS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/estimados.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacionfactura" idactualcliente="<?php echo($cliente->id) ?>" title="FacturaS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacionimagen_cliente" idactualcliente="<?php echo($cliente->id) ?>" title="Imagenes ClienteS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/imagen_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cliente->id) ?>
							<img class="imgrelacionlista_cliente" idactualcliente="<?php echo($cliente->id) ?>" title="Lista ClienteS DE Cliente" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
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



