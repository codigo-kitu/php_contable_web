
<script id="cierre_contable_detalle_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatoscierre_contable_detalle" name="frmTablaDatoscierre_contable_detalle">
			<div id="divTablaDatosAuxiliarcierre_contable_detallesAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count cierre_contable_detalles}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulocierre_contable_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cierre Detalles</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatoscierre_contable_detalles" name="tblTablaDatoscierre_contable_detalles" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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

		{{#if (ValCol 'Detalle' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Detalle</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cierres Contables' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cierres Contables<a onclick="jQuery('#form-id_cierre_contable_img').trigger('click' );"><img id="form{{strSufijo}}-id_cierre_contable_img2" name="form{{strSufijo}}-id_cierre_contable_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cierre_contable_detalle_webcontrol1.abrirBusquedaParacierre_contable('id_cierre_contable');"><img id="form{{strSufijo}}-id_cierre_contable_img_busqueda2" name="form{{strSufijo}}-id_cierre_contable_img_busqueda2" title="Buscar Cierres Contables" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Documento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
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

		{{#if (ValCol 'Detalle' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Detalle</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cierres Contables' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cierres Contables<a onclick="jQuery('#form-id_cierre_contable_img').trigger('click' );"><img id="form{{strSufijo}}-id_cierre_contable_img2" name="form{{strSufijo}}-id_cierre_contable_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cierre_contable_detalle_webcontrol1.abrirBusquedaParacierre_contable('id_cierre_contable');"><img id="form{{strSufijo}}-id_cierre_contable_img_busqueda2" name="form{{strSufijo}}-id_cierre_contable_img_busqueda2" title="Buscar Cierres Contables" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Documento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Factura' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Factura</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
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

		{{#if (Is_List_Exist cierre_contable_detallesLocal)}}
			{{#each cierre_contable_detallesLocal}}

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
								<img class="imgseleccionarcierre_contable_detalle" idactualcierre_contable_detalle="{{id}}" title="SELECCIONAR Cierre Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablacierre_contable_detalle" idactualcierre_contable_detalle="{{id}}" title="ELIMINAR Cierre Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Cierre Detalle ACTUAL" value="{{id}}"></input>
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

				{{#if (ValCol 'Detalle' ../paraReporte)}}
				
					<td class="elementotabla col_id_detalle" > 
						{{ id_detalle }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cierres Contables' ../paraReporte)}}
				<td class="elementotabla col_id_cierre_contable" > {{id_cierre_contable_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Nro Documento' ../paraReporte)}}
				
					<td class="elementotabla col_nro_documento" > 
						{{ nro_documento }}
					</td>
				{{/if}}

				{{#if (ValCol 'Tipo Factura' ../paraReporte)}}
				
					<td class="elementotabla col_tipo_factura" > 
						{{ tipo_factura }}
					</td>
				{{/if}}

				{{#if (ValCol 'Monto' ../paraReporte)}}
				
					<td class="elementotabla col_monto" > 
						{{ monto }}
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

