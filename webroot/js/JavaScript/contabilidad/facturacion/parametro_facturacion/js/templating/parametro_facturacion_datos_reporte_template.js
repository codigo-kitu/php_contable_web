
<script id="parametro_facturacion_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosparametro_facturacion" name="frmTablaDatosparametro_facturacion">
			<div id="divTablaDatosAuxiliarparametro_facturacionsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count parametro_facturacions}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloparametro_facturacion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Facturacions</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosparametro_facturacions" name="tblTablaDatosparametro_facturacions" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_facturacion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Solo Costo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Factura Lote' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Factura Lote</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Factura Lote' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Factura Lote</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Devolucion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Devolucion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Devolucion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Devolucion</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Termino Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Termino Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_facturacion_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Estimado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Estimado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Estimado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Estimado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Estimado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Estimado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Solo Costo Producto Estimado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto Estimado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Consignacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Consignacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Consignacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Consignacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Consignacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Consignacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Solo Costo Producto Consignacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto Consignacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Recibos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Recibos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Impuesto Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Recibo</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_facturacion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Solo Costo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Factura Lote' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Factura Lote</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Factura Lote' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Factura Lote</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Devolucion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Devolucion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Devolucion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Devolucion</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Termino Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Termino Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_facturacion_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Estimado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Estimado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Estimado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Estimado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Estimado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Estimado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Solo Costo Producto Estimado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto Estimado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Consignacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Consignacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Consignacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Consignacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Consignacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Consignacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Solo Costo Producto Consignacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Solo Costo Producto Consignacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Recibos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Recibos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Impuesto Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Recibo</pre>
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

		{{#if (Is_List_Exist parametro_facturacionsLocal)}}
			{{#each parametro_facturacionsLocal}}

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
								<img class="imgseleccionarparametro_facturacion" idactualparametro_facturacion="{{id}}" title="SELECCIONAR Parametro Facturacion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaparametro_facturacion" idactualparametro_facturacion="{{id}}" title="ELIMINAR Parametro Facturacion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro Facturacion ACTUAL" value="{{id}}"></input>
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

				{{#if (ValCol 'Nombre Factura' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_factura" > 
						{{ nombre_factura }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Factura' ../paraReporte)}}
				
					<td class="elementotabla col_numero_factura" > 
						{{ numero_factura }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento Factura' ../paraReporte)}}
				
					<td class="elementotabla col_incremento_factura" > 
						{{ incremento_factura }}
					</td>
				{{/if}}

				{{#if (ValCol 'Solo Costo Producto' ../paraReporte)}}
				
					<td class="elementotabla col_solo_costo_producto" >{{{ getCheckBox solo_costo_producto 'form{{strSufijo}}-solo_costo_productoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Factura Lote' ../paraReporte)}}
				
					<td class="elementotabla col_numero_factura_lote" > 
						{{ numero_factura_lote }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento Factura Lote' ../paraReporte)}}
				
					<td class="elementotabla col_incremento_factura_lote" > 
						{{ incremento_factura_lote }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Devolucion' ../paraReporte)}}
				
					<td class="elementotabla col_numero_devolucion" > 
						{{ numero_devolucion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento Devolucion' ../paraReporte)}}
				
					<td class="elementotabla col_incremento_devolucion" > 
						{{ incremento_devolucion }}
					</td>
				{{/if}}

				{{#if (ValCol ' Termino Pago' ../paraReporte)}}
				<td class="elementotabla col_id_termino_pago_cliente" > {{id_termino_pago_cliente_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Nombre Estimado' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_estimado" > 
						{{ nombre_estimado }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Estimado' ../paraReporte)}}
				
					<td class="elementotabla col_numero_estimado" > 
						{{ numero_estimado }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento Estimado' ../paraReporte)}}
				
					<td class="elementotabla col_incremento_estimado" > 
						{{ incremento_estimado }}
					</td>
				{{/if}}

				{{#if (ValCol 'Solo Costo Producto Estimado' ../paraReporte)}}
				
					<td class="elementotabla col_solo_costo_producto_estimado" >{{{ getCheckBox solo_costo_producto_estimado 'form{{strSufijo}}-solo_costo_producto_estimadoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Consignacion' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_consignacion" > 
						{{ nombre_consignacion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Consignacion' ../paraReporte)}}
				
					<td class="elementotabla col_numero_consignacion" > 
						{{ numero_consignacion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento Consignacion' ../paraReporte)}}
				
					<td class="elementotabla col_incremento_consignacion" > 
						{{ incremento_consignacion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Solo Costo Producto Consignacion' ../paraReporte)}}
				
					<td class="elementotabla col_solo_costo_producto_consignacion" >{{{ getCheckBox solo_costo_producto_consignacion 'form{{strSufijo}}-solo_costo_producto_consignacioni' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Recibo' ../paraReporte)}}
				
					<td class="elementotabla col_con_recibo" >{{{ getCheckBox con_recibo 'form{{strSufijo}}-con_reciboi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Recibo' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_recibo" > 
						{{ nombre_recibo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Recibo' ../paraReporte)}}
				
					<td class="elementotabla col_numero_recibo" > 
						{{ numero_recibo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento Recibos' ../paraReporte)}}
				
					<td class="elementotabla col_incremento_recibo" > 
						{{ incremento_recibo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Impuesto Recibo' ../paraReporte)}}
				
					<td class="elementotabla col_con_impuesto_recibo" >{{{ getCheckBox con_impuesto_recibo 'form{{strSufijo}}-con_impuesto_reciboi' ../paraReporte }}}
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

