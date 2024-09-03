
<script id="parametro_auxiliar_facturacion_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosparametro_auxiliar_facturacion" name="frmTablaDatosparametro_auxiliar_facturacion">
			<div id="divTablaDatosAuxiliarparametro_auxiliar_facturacionsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count parametro_auxiliar_facturacions}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloparametro_auxiliar_facturacion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro AuxiliarNOUSO Facturaciones</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosparametro_auxiliar_facturacions" name="tblTablaDatosparametro_auxiliar_facturacions" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_auxiliar_facturacion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Tipo Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Siguiente Numero Correlativo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Creacion Rapida Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Creacion Rapida Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Busqueda Producto Fabricante' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Busqueda Producto Fabricante</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Solo Costo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Solo Costo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Tipo Factura Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Siguiente Numero Correlativo Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Impuesto Final Boleta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Final Boleta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Ticket' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Ticket</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Tipo Factura Ticket' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura Ticket</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Siguiente Numero Correlativo Ticket' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Ticket</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Ticket' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Ticket</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Impuesto Final Ticket' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Final Ticket</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_auxiliar_facturacion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Tipo Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Siguiente Numero Correlativo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Creacion Rapida Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Creacion Rapida Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Busqueda Producto Fabricante' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Busqueda Producto Fabricante</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Solo Costo Producto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Solo Costo Producto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Tipo Factura Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Siguiente Numero Correlativo Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Recibo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Recibo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Impuesto Final Boleta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Final Boleta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Ticket' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Ticket</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Tipo Factura Ticket' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Tipo Factura Ticket</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Siguiente Numero Correlativo Ticket' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siguiente Numero Correlativo Ticket</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Incremento Ticket' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Incremento Ticket</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Impuesto Final Ticket' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Impuesto Final Ticket</pre>
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

		{{#if (Is_List_Exist parametro_auxiliar_facturacionsLocal)}}
			{{#each parametro_auxiliar_facturacionsLocal}}

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
								<img class="imgseleccionarparametro_auxiliar_facturacion" idactualparametro_auxiliar_facturacion="{{id}}" title="SELECCIONAR Parametro AuxiliarNOUSO Facturacion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaparametro_auxiliar_facturacion" idactualparametro_auxiliar_facturacion="{{id}}" title="ELIMINAR Parametro AuxiliarNOUSO Facturacion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro AuxiliarNOUSO Facturacion ACTUAL" value="{{id}}"></input>
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

				{{#if (ValCol 'Nombre Tipo Factura' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_tipo_factura" > 
						{{ nombre_tipo_factura }}
					</td>
				{{/if}}

				{{#if (ValCol 'Siguiente Numero Correlativo' ../paraReporte)}}
				
					<td class="elementotabla col_siguiente_numero_correlativo" > 
						{{ siguiente_numero_correlativo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento' ../paraReporte)}}
				
					<td class="elementotabla col_incremento" > 
						{{ incremento }}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Creacion Rapida Producto' ../paraReporte)}}
				
					<td class="elementotabla col_con_creacion_rapida_producto" >{{{ getCheckBox con_creacion_rapida_producto 'form{{strSufijo}}-con_creacion_rapida_productoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Busqueda Producto Fabricante' ../paraReporte)}}
				
					<td class="elementotabla col_con_busqueda_producto_fabricante" >{{{ getCheckBox con_busqueda_producto_fabricante 'form{{strSufijo}}-con_busqueda_producto_fabricantei' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Solo Costo Producto' ../paraReporte)}}
				
					<td class="elementotabla col_con_solo_costo_producto" >{{{ getCheckBox con_solo_costo_producto 'form{{strSufijo}}-con_solo_costo_productoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Recibo' ../paraReporte)}}
				
					<td class="elementotabla col_con_recibo" >{{{ getCheckBox con_recibo 'form{{strSufijo}}-con_reciboi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Tipo Factura Recibo' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_tipo_factura_recibo" > 
						{{ nombre_tipo_factura_recibo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Siguiente Numero Correlativo Recibo' ../paraReporte)}}
				
					<td class="elementotabla col_siguiente_numero_correlativo_recibo" > 
						{{ siguiente_numero_correlativo_recibo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento Recibo' ../paraReporte)}}
				
					<td class="elementotabla col_incremento_recibo" > 
						{{ incremento_recibo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Impuesto Final Boleta' ../paraReporte)}}
				
					<td class="elementotabla col_con_impuesto_final_boleta" >{{{ getCheckBox con_impuesto_final_boleta 'form{{strSufijo}}-con_impuesto_final_boletai' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Ticket' ../paraReporte)}}
				
					<td class="elementotabla col_con_ticket" >{{{ getCheckBox con_ticket 'form{{strSufijo}}-con_ticketi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Tipo Factura Ticket' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_tipo_factura_ticket" > 
						{{ nombre_tipo_factura_ticket }}
					</td>
				{{/if}}

				{{#if (ValCol 'Siguiente Numero Correlativo Ticket' ../paraReporte)}}
				
					<td class="elementotabla col_siguiente_numero_correlativo_ticket" > 
						{{ siguiente_numero_correlativo_ticket }}
					</td>
				{{/if}}

				{{#if (ValCol 'Incremento Ticket' ../paraReporte)}}
				
					<td class="elementotabla col_incremento_ticket" > 
						{{ incremento_ticket }}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Impuesto Final Ticket' ../paraReporte)}}
				
					<td class="elementotabla col_con_impuesto_final_ticket" >{{{ getCheckBox con_impuesto_final_ticket 'form{{strSufijo}}-con_impuesto_final_ticketi' ../paraReporte }}}
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

