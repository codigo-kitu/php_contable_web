
<script id="parametro_inventario_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosparametro_inventario" name="frmTablaDatosparametro_inventario">
			<div id="divTablaDatosAuxiliarparametro_inventariosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count parametro_inventarios}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloparametro_inventario" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Inventarios</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosparametro_inventarios" name="tblTablaDatosparametro_inventarios" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_inventario_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Termino Pago Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Termino Pago Proveedor<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_inventario_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Costeo Kardex' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Costeo Kardex</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Kardex' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Kardex<a onclick="jQuery('#form-id_tipo_kardex_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_kardex_img2" name="form{{strSufijo}}-id_tipo_kardex_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_inventario_webcontrol1.abrirBusquedaParatipo_kardex('id_tipo_kardex');"><img id="form{{strSufijo}}-id_tipo_kardex_img_busqueda2" name="form{{strSufijo}}-id_tipo_kardex_img_busqueda2" title="Buscar Tipo Kadex" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Orden Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Orden Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Devolucion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Devolucion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Cotizacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cotizacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Kardex' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Kardex</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Producto Inactivo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Producto Inactivo</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_inventario_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Termino Pago Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Termino Pago Proveedor<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_inventario_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Costeo Kardex' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Costeo Kardex</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Kardex' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Kardex<a onclick="jQuery('#form-id_tipo_kardex_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_kardex_img2" name="form{{strSufijo}}-id_tipo_kardex_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_inventario_webcontrol1.abrirBusquedaParatipo_kardex('id_tipo_kardex');"><img id="form{{strSufijo}}-id_tipo_kardex_img_busqueda2" name="form{{strSufijo}}-id_tipo_kardex_img_busqueda2" title="Buscar Tipo Kadex" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Orden Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Orden Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Devolucion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Devolucion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Cotizacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cotizacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Kardex' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Kardex</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Producto Inactivo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Producto Inactivo</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist parametro_inventariosLocal)}}
			{{#each parametro_inventariosLocal}}

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
								<img class="imgseleccionarparametro_inventario" idactualparametro_inventario="{{id}}" title="SELECCIONAR Parametro Inventario ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaparametro_inventario" idactualparametro_inventario="{{id}}" title="ELIMINAR Parametro Inventario ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro Inventario ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
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

				{{#if (ValCol ' Termino Pago Proveedor' ../paraReporte)}}
				<td class="elementotabla col_id_termino_pago_proveedor" > {{id_termino_pago_proveedor_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Tipo Costeo Kardex' ../paraReporte)}}
				<td class="elementotabla col_id_tipo_costeo_kardex" > {{id_tipo_costeo_kardex_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Tipo Kardex' ../paraReporte)}}
				<td class="elementotabla col_id_tipo_kardex" > {{id_tipo_kardex_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Numero Producto' ../paraReporte)}}
				
					<td class="elementotabla col_numero_producto" > 
						{{ numero_producto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Orden Compra' ../paraReporte)}}
				
					<td class="elementotabla col_numero_orden_compra" > 
						{{ numero_orden_compra }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Devolucion' ../paraReporte)}}
				
					<td class="elementotabla col_numero_devolucion" > 
						{{ numero_devolucion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Cotizacion' ../paraReporte)}}
				
					<td class="elementotabla col_numero_cotizacion" > 
						{{ numero_cotizacion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Kardex' ../paraReporte)}}
				
					<td class="elementotabla col_numero_kardex" > 
						{{ numero_kardex }}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Producto Inactivo' ../paraReporte)}}
				
					<td class="elementotabla col_con_producto_inactivo" >{{{ getCheckBox con_producto_inactivo 'form{{strSufijo}}-con_producto_inactivoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (If_Not_AND_Not_AND_Not ../paraReporte  ../bitEsBusqueda  ../bitEsRelaciones)}}

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

