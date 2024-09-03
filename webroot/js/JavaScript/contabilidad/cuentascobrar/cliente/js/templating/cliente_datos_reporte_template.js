
<script id="cliente_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatoscliente" name="frmTablaDatoscliente">
			<div id="divTablaDatosAuxiliarclientesAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count clientes}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulocliente" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Clientes</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosclientes" name="tblTablaDatosclientes" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

		{{#if (If_Yes_AND_Not IS_DEVELOPING  bitEsRelacionado)}}
			<caption>({{STR_PREFIJO_TABLE}} {{STR_TABLE_NAME}})</caption>
		{{/if}}

		
			<thead>
				<tr class="{{class_cabecera}}">
		
				
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:{{strPermisoEliminar}}">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		{{/if}}
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		{{/if}}
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Persona' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Persona</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Categorias Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categorias Cliente<a onclick="jQuery('#form-id_categoria_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_cliente_img2" name="form{{strSufijo}}-id_categoria_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacategoria_cliente('id_categoria_cliente');"><img id="form{{strSufijo}}-id_categoria_cliente_img_busqueda2" name="form{{strSufijo}}-id_categoria_cliente_img_busqueda2" title="Buscar Categorias Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Precio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Precio<a onclick="jQuery('#form-id_tipo_precio_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_precio_img2" name="form{{strSufijo}}-id_tipo_precio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatipo_precio('id_tipo_precio');"><img id="form{{strSufijo}}-id_tipo_precio_img_busqueda2" name="form{{strSufijo}}-id_tipo_precio_img_busqueda2" title="Buscar Tipo Precio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Giro Negocio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Giro Negocio<a onclick="jQuery('#form-id_giro_negocio_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_giro_negocio_cliente_img2" name="form{{strSufijo}}-id_giro_negocio_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParagiro_negocio_cliente('id_giro_negocio_cliente');"><img id="form{{strSufijo}}-id_giro_negocio_cliente_img_busqueda2" name="form{{strSufijo}}-id_giro_negocio_cliente_img_busqueda2" title="Buscar Giro Negocio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ruc' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Primer Apellido' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Apellido</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Segundo Apellido' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Apellido</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Primer Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Segundo Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Completo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono Movil' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'E Mail' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'E Mail2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comentario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Imagen' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Activo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Pais' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Provincia' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ciudad' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Postal' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fax' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Contacto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contacto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Vendedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Maximo Credito' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Credito</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Maximo Descuento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Descuento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Interes Anual' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Anual</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Balance' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Terminos Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Contable Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_img2" name="form{{strSufijo}}-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form{{strSufijo}}-id_cuenta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Facturar Con' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Facturar Con</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Aplica Impuesto Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Impuesto Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_img2" name="form{{strSufijo}}-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form{{strSufijo}}-id_impuesto_img_busqueda2" name="form{{strSufijo}}-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Aplica Retencion Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Impuesto</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Retencion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_img2" name="form{{strSufijo}}-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form{{strSufijo}}-id_retencion_img_busqueda2" name="form{{strSufijo}}-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Aplica Retencion Fuente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Fuente</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Retencion Fuente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Fuente<a onclick="jQuery('#form-id_retencion_fuente_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_fuente_img2" name="form{{strSufijo}}-id_retencion_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_fuente('id_retencion_fuente');"><img id="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" name="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" title="Buscar Retencion Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Aplica Retencion Ica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Ica</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Retencion Ica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ica<a onclick="jQuery('#form-id_retencion_ica_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_ica_img2" name="form{{strSufijo}}-id_retencion_ica_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_ica('id_retencion_ica');"><img id="form{{strSufijo}}-id_retencion_ica_img_busqueda2" name="form{{strSufijo}}-id_retencion_ica_img_busqueda2" title="Buscar Retencion Ica" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Aplica 2do Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica 2do Impuesto</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Otro Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_img2" name="form{{strSufijo}}-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
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

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</thead>

		{{#if (If_Not paraReporte)}}
		{{#if (If_Not bitEsRelacionado)}}

		
			<tfoot>
				<tr class="{{class_cabecera}}">
		
				
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:{{strPermisoEliminar}}">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		{{/if}}
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		{{/if}}
		{{#if (If_Not paraReporte)}}
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Persona' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Persona</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Categorias Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categorias Cliente<a onclick="jQuery('#form-id_categoria_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_cliente_img2" name="form{{strSufijo}}-id_categoria_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacategoria_cliente('id_categoria_cliente');"><img id="form{{strSufijo}}-id_categoria_cliente_img_busqueda2" name="form{{strSufijo}}-id_categoria_cliente_img_busqueda2" title="Buscar Categorias Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Precio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Precio<a onclick="jQuery('#form-id_tipo_precio_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_precio_img2" name="form{{strSufijo}}-id_tipo_precio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatipo_precio('id_tipo_precio');"><img id="form{{strSufijo}}-id_tipo_precio_img_busqueda2" name="form{{strSufijo}}-id_tipo_precio_img_busqueda2" title="Buscar Tipo Precio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Giro Negocio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Giro Negocio<a onclick="jQuery('#form-id_giro_negocio_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_giro_negocio_cliente_img2" name="form{{strSufijo}}-id_giro_negocio_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParagiro_negocio_cliente('id_giro_negocio_cliente');"><img id="form{{strSufijo}}-id_giro_negocio_cliente_img_busqueda2" name="form{{strSufijo}}-id_giro_negocio_cliente_img_busqueda2" title="Buscar Giro Negocio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ruc' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Primer Apellido' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Apellido</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Segundo Apellido' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Apellido</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Primer Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Segundo Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Completo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono Movil' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'E Mail' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'E Mail2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comentario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Imagen' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Activo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Pais' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Provincia' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ciudad' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Postal' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fax' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Contacto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contacto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Vendedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Maximo Credito' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Credito</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Maximo Descuento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Descuento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Interes Anual' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Anual</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Balance' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Terminos Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Contable Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_img2" name="form{{strSufijo}}-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form{{strSufijo}}-id_cuenta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Facturar Con' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Facturar Con</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Aplica Impuesto Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Impuesto Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_img2" name="form{{strSufijo}}-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form{{strSufijo}}-id_impuesto_img_busqueda2" name="form{{strSufijo}}-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Aplica Retencion Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Impuesto</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Retencion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_img2" name="form{{strSufijo}}-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form{{strSufijo}}-id_retencion_img_busqueda2" name="form{{strSufijo}}-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Aplica Retencion Fuente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Fuente</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Retencion Fuente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Fuente<a onclick="jQuery('#form-id_retencion_fuente_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_fuente_img2" name="form{{strSufijo}}-id_retencion_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_fuente('id_retencion_fuente');"><img id="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" name="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" title="Buscar Retencion Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Aplica Retencion Ica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Ica</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Retencion Ica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ica<a onclick="jQuery('#form-id_retencion_ica_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_ica_img2" name="form{{strSufijo}}-id_retencion_ica_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_ica('id_retencion_ica');"><img id="form{{strSufijo}}-id_retencion_ica_img_busqueda2" name="form{{strSufijo}}-id_retencion_ica_img_busqueda2" title="Buscar Retencion Ica" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Aplica 2do Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica 2do Impuesto</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Otro Impuesto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_img2" name="form{{strSufijo}}-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
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

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist clientesLocal)}}
			{{#each clientesLocal}}

				{{#if (If_NotText_AND_Not ../STR_TIPO_TABLA 'normal'  ../paraReporte)}}
					
					<tr>
					
				{{else}}
					

					<tr class="{{getClassRowTableHtml i}}" {{getOnMouseOverHtmlReporte ../paraReporte ../STR_TIPO_TABLA i}} >
				{{/if}}

				{{#if (If_Not ../paraReporte)}}
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								{{id}}
							</td>
							<td>
								<img class="imgseleccionarcliente" idactualcliente="{{id}}" title="SELECCIONAR Cliente ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_eli col_id"  style="display:{{../strPermisoEliminar}}">
					<a>
					<table>
						<tr>
							<td>
								{{id}}
							</td>
							<td>
								<img class="imgeliminartablacliente" idactualcliente="{{id}}" title="ELIMINAR Cliente ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Cliente ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionescliente" idactualcliente="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				{{/if}}
				{{#if (If_Not ../paraReporte)}}
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				{{/if}}
				{{#if (If_Not ../paraReporte)}}
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_empresa_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Tipo Persona' ../paraReporte)}}
				<td class="elementotabla col_id_tipo_persona" > {{id_tipo_persona_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Categorias Cliente' ../paraReporte)}}
				<td class="elementotabla col_id_categoria_cliente" > {{id_categoria_cliente_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Tipo Precio' ../paraReporte)}}
				<td class="elementotabla col_id_tipo_precio" > {{id_tipo_precio_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Giro Negocio' ../paraReporte)}}
				<td class="elementotabla col_id_giro_negocio_cliente" > {{id_giro_negocio_cliente_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Codigo' ../paraReporte)}}
				
					<td class="elementotabla col_codigo" > 
						{{ codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Ruc' ../paraReporte)}}
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				{{/if}}

				{{#if (ValCol 'Primer Apellido' ../paraReporte)}}
				
					<td class="elementotabla col_primer_apellido" > 
						{{ primer_apellido }}
					</td>
				{{/if}}

				{{#if (ValCol 'Segundo Apellido' ../paraReporte)}}
				
					<td class="elementotabla col_segundo_apellido" > 
						{{ segundo_apellido }}
					</td>
				{{/if}}

				{{#if (ValCol 'Primer Nombre' ../paraReporte)}}
				
					<td class="elementotabla col_primer_nombre" > 
						{{ primer_nombre }}
					</td>
				{{/if}}

				{{#if (ValCol 'Segundo Nombre' ../paraReporte)}}
				
					<td class="elementotabla col_segundo_nombre" > 
						{{ segundo_nombre }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Completo' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_completo" > 
						{{ nombre_completo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Direccion' ../paraReporte)}}
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Telefono' ../paraReporte)}}
				
					<td class="elementotabla col_telefono" > 
						{{ telefono }}
					</td>
				{{/if}}

				{{#if (ValCol 'Telefono Movil' ../paraReporte)}}
				
					<td class="elementotabla col_telefono_movil" > 
						{{ telefono_movil }}
					</td>
				{{/if}}

				{{#if (ValCol 'E Mail' ../paraReporte)}}
				
					<td class="elementotabla col_e_mail" > 
						{{ e_mail }}
					</td>
				{{/if}}

				{{#if (ValCol 'E Mail2' ../paraReporte)}}
				
					<td class="elementotabla col_e_mail2" > 
						{{ e_mail2 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Comentario' ../paraReporte)}}
				
					<td class="elementotabla col_comentario" > 
						{{ comentario }}
					</td>
				{{/if}}

				{{#if (ValCol 'Imagen' ../paraReporte)}}
				
					<td class="elementotabla col_imagen" > 
						{{ imagen }}
					</td>
				{{/if}}

				{{#if (ValCol 'Activo' ../paraReporte)}}
				
					<td class="elementotabla col_activo" >{{{ getCheckBox activo 'form{{strSufijo}}-activoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Pais' ../paraReporte)}}
				<td class="elementotabla col_id_pais" > {{id_pais_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Provincia' ../paraReporte)}}
				<td class="elementotabla col_id_provincia" > {{id_provincia_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Ciudad' ../paraReporte)}}
				<td class="elementotabla col_id_ciudad" > {{id_ciudad_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Codigo Postal' ../paraReporte)}}
				
					<td class="elementotabla col_codigo_postal" > 
						{{ codigo_postal }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fax' ../paraReporte)}}
				
					<td class="elementotabla col_fax" > 
						{{ fax }}
					</td>
				{{/if}}

				{{#if (ValCol 'Contacto' ../paraReporte)}}
				
					<td class="elementotabla col_contacto" > 
						{{ contacto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Vendedor' ../paraReporte)}}
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Maximo Credito' ../paraReporte)}}
				
					<td class="elementotabla col_maximo_credito" > 
						{{ maximo_credito }}
					</td>
				{{/if}}

				{{#if (ValCol 'Maximo Descuento' ../paraReporte)}}
				
					<td class="elementotabla col_maximo_descuento" > 
						{{ maximo_descuento }}
					</td>
				{{/if}}

				{{#if (ValCol 'Interes Anual' ../paraReporte)}}
				
					<td class="elementotabla col_interes_anual" > 
						{{ interes_anual }}
					</td>
				{{/if}}

				{{#if (ValCol 'Balance' ../paraReporte)}}
				
					<td class="elementotabla col_balance" > 
						{{ balance }}
					</td>
				{{/if}}

				{{#if (ValCol 'Terminos Pago' ../paraReporte)}}
				<td class="elementotabla col_id_termino_pago_cliente" > {{id_termino_pago_cliente_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Cuenta Contable Ventas' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta" > {{id_cuenta_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Facturar Con' ../paraReporte)}}
				
					<td class="elementotabla col_facturar_con" > 
						{{ facturar_con }}
					</td>
				{{/if}}

				{{#if (ValCol 'Aplica Impuesto Ventas' ../paraReporte)}}
				
					<td class="elementotabla col_aplica_impuesto_ventas" >{{{ getCheckBox aplica_impuesto_ventas 'form{{strSufijo}}-aplica_impuesto_ventasi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Impuesto' ../paraReporte)}}
				<td class="elementotabla col_id_impuesto" > {{id_impuesto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Aplica Retencion Impuesto' ../paraReporte)}}
				
					<td class="elementotabla col_aplica_retencion_impuesto" >{{{ getCheckBox aplica_retencion_impuesto 'form{{strSufijo}}-aplica_retencion_impuestoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol ' Retencion' ../paraReporte)}}
				<td class="elementotabla col_id_retencion" > {{id_retencion_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Aplica Retencion Fuente' ../paraReporte)}}
				
					<td class="elementotabla col_aplica_retencion_fuente" >{{{ getCheckBox aplica_retencion_fuente 'form{{strSufijo}}-aplica_retencion_fuentei' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol ' Retencion Fuente' ../paraReporte)}}
				<td class="elementotabla col_id_retencion_fuente" > {{id_retencion_fuente_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Aplica Retencion Ica' ../paraReporte)}}
				
					<td class="elementotabla col_aplica_retencion_ica" >{{{ getCheckBox aplica_retencion_ica 'form{{strSufijo}}-aplica_retencion_icai' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol ' Retencion Ica' ../paraReporte)}}
				<td class="elementotabla col_id_retencion_ica" > {{id_retencion_ica_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Aplica 2do Impuesto' ../paraReporte)}}
				
					<td class="elementotabla col_aplica_2do_impuesto" >{{{ getCheckBox aplica_2do_impuesto 'form{{strSufijo}}-aplica_2do_impuestoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol ' Otro Impuesto' ../paraReporte)}}
				<td class="elementotabla col_id_otro_impuesto" > {{id_otro_impuesto_Descripcion}}</td>
				{{/if}}

				{{#if (If_Not_AND_Not_AND_Not ../paraReporte  ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionconsignacion" idactualcliente="{{id}}" title="ConsignacionS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/consignacions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncuenta_cobrar" idactualcliente="{{id}}" title="Cuenta CobrarS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondevolucion_factura" idactualcliente="{{id}}" title="Devolucion FacturaS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/devolucion_facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondocumento_cliente" idactualcliente="{{id}}" title="Documentos ClientesS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/documento_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionestimado" idactualcliente="{{id}}" title="EstimadoS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/estimados.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionfactura" idactualcliente="{{id}}" title="FacturaS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionimagen_cliente" idactualcliente="{{id}}" title="Imagenes ClienteS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/imagen_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionlista_cliente" idactualcliente="{{id}}" title="Lista ClienteS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/lista_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				{{/if}}

				<td style="display:none" class="actions"></td>

				</tr>
			{{/each}}
		{{/if}}

		{{#if paraReporte}}

			
			<tr>
				<td>
					<input type="button" onclick="{{proceso_print}}" style="visibility:visible" value="Imprimir" />
				</td>
			</tr>
		{{/if}}

					</tbody>

				</table>

			</div>

		</form>


</script>

