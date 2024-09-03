
<script id="lote_producto_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatoslote_producto" name="frmTablaDatoslote_producto">
			<div id="divTablaDatosAuxiliarlote_productosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count lote_productos}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulolote_producto" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Lotes Productoes</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatoslote_productos" name="tblTablaDatoslote_productos" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">VERSIONROW</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lote_producto_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Lote' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Lote</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Bodega' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lote_producto_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ingreso' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ingreso</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Expiracion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Expiracion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ubicacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ubicacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comentario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Documento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Disponible' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Disponible</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Agotado En' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Agotado En</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Item' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Item</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lote_producto_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Detalles</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">VERSIONROW</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lote_producto_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Lote' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Lote</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Bodega' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lote_producto_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ingreso' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ingreso</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Expiracion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Expiracion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ubicacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ubicacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cantidad' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comentario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Documento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Disponible' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Disponible</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Agotado En' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Agotado En</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Item' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Item</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="lote_producto_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Detalles</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist lote_productosLocal)}}
			{{#each lote_productosLocal}}

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
								<img class="imgseleccionarlote_producto" idactuallote_producto="{{id}}" title="SELECCIONAR Lotes Producto ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablalote_producto" idactuallote_producto="{{id}}" title="ELIMINAR Lotes Producto ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Lotes Producto ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacioneslote_producto" idactuallote_producto="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				{{/if}}
				{{#if (If_Not ../paraReporte)}}
				
					<td class="elementotabla col_version_row"  style="display:none"> 
						{{ versionRow }}
					</td>
				{{/if}}

				{{#if (ValCol 'Producto' ../paraReporte)}}
				<td class="elementotabla col_id_producto" > {{id_producto_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Nro Lote' ../paraReporte)}}
				
					<td class="elementotabla col_nro_lote" > 
						{{ nro_lote }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descripcion' ../paraReporte)}}
				
					<td class="elementotabla col_descripcion" > 
						{{ descripcion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Bodega' ../paraReporte)}}
				<td class="elementotabla col_id_bodega" > {{id_bodega_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Fecha Ingreso' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_ingreso" > 
						{{ fecha_ingreso }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Expiracion' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_expiracion" > 
						{{ fecha_expiracion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Ubicacion' ../paraReporte)}}
				
					<td class="elementotabla col_ubicacion" > 
						{{ ubicacion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cantidad' ../paraReporte)}}
				
					<td class="elementotabla col_cantidad" > 
						{{ cantidad }}
					</td>
				{{/if}}

				{{#if (ValCol 'Comentario' ../paraReporte)}}
				
					<td class="elementotabla col_comentario" > 
						{{ comentario }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nro Documento' ../paraReporte)}}
				
					<td class="elementotabla col_nro_documento" > 
						{{ nro_documento }}
					</td>
				{{/if}}

				{{#if (ValCol 'Disponible' ../paraReporte)}}
				
					<td class="elementotabla col_disponible" > 
						{{ disponible }}
					</td>
				{{/if}}

				{{#if (ValCol 'Agotado En' ../paraReporte)}}
				
					<td class="elementotabla col_agotado_en" > 
						{{ agotado_en }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nro Item' ../paraReporte)}}
				
					<td class="elementotabla col_nro_item" > 
						{{ nro_item }}
					</td>
				{{/if}}

				{{#if (ValCol 'Proveedor' ../paraReporte)}}
				<td class="elementotabla col_id_proveedor" > {{id_proveedor_Descripcion}}</td>
				{{/if}}

				{{#if (If_Not_AND_Not_AND_Not ../paraReporte  ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionkardex_detalle" idactuallote_producto="{{id}}" title="DetalleS DE Lotes Producto" src="{{PATH_IMAGEN}}/Imagenes/kardex_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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

