
<script id="estimados_porfechas_porbodegas_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosestimados_porfechas_porbodegas" name="frmTablaDatosestimados_porfechas_porbodegas">
			<div id="divTablaDatosAuxiliarestimados_porfechas_porbodegassAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count estimados_porfechas_porbodegass}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloestimados_porfechas_porbodegas" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Estimados Porfechas Porbodegases</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosestimados_porfechas_porbodegass" name="tblTablaDatosestimados_porfechas_porbodegass" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">VERSIONROW</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Emision' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Cambio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cambio</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Moneda' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Total Iva Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Iva Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Completo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Productos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Productos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Subtotal' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Subtotal</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Iva Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descuento Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Total' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Costo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo</pre>
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
				<pre class="cabecera_texto_titulo_tabla">VERSIONROW</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Emision' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Cambio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cambio</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Moneda' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Precio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Total Iva Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total Iva Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Completo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Productos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Productos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Subtotal' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Subtotal</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Iva Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Otro Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Otro Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descuento Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Total' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Costo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Costo</pre>
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

		{{#if (Is_List_Exist estimados_porfechas_porbodegassLocal)}}
			{{#each estimados_porfechas_porbodegassLocal}}

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
								<img class="imgseleccionarestimados_porfechas_porbodegas" idactualestimados_porfechas_porbodegas="{{id}}" title="SELECCIONAR Estimados Porfechas Porbodegas ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaestimados_porfechas_porbodegas" idactualestimados_porfechas_porbodegas="{{id}}" title="ELIMINAR Estimados Porfechas Porbodegas ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Estimados Porfechas Porbodegas ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>
				{{/if}}
				{{#if (If_Not ../paraReporte)}}
				
					<td class="elementotabla col_version_row"  style="display:none"> 
						{{ versionRow }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero' ../paraReporte)}}
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Emision' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				{{/if}}

				{{#if (ValCol 'Tipo Cambio' ../paraReporte)}}
				
					<td class="elementotabla col_tipo_cambio" > 
						{{ tipo_cambio }}
					</td>
				{{/if}}

				{{#if (ValCol 'Moneda' ../paraReporte)}}
				
					<td class="elementotabla col_moneda" > 
						{{ moneda }}
					</td>
				{{/if}}

				{{#if (ValCol 'Precio' ../paraReporte)}}
				
					<td class="elementotabla col_precio" > 
						{{ precio }}
					</td>
				{{/if}}

				{{#if (ValCol 'Total Iva Monto' ../paraReporte)}}
				
					<td class="elementotabla col_total_iva_monto" > 
						{{ total_iva_monto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Codigo' ../paraReporte)}}
				
					<td class="elementotabla col_codigo_dato" > 
						{{ codigo_dato }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre' ../paraReporte)}}
				
					<td class="elementotabla col_nombre" > 
						{{ nombre }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Completo' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_completo" > 
						{{ nombre_completo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Codigo Productos' ../paraReporte)}}
				
					<td class="elementotabla col_codigo_productos" > 
						{{ codigo_productos }}
					</td>
				{{/if}}

				{{#if (ValCol 'Subtotal' ../paraReporte)}}
				
					<td class="elementotabla col_subtotal" > 
						{{ subtotal }}
					</td>
				{{/if}}

				{{#if (ValCol 'Iva Monto' ../paraReporte)}}
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Otro Monto' ../paraReporte)}}
				
					<td class="elementotabla col_otro_monto" > 
						{{ otro_monto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descuento Monto' ../paraReporte)}}
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Total' ../paraReporte)}}
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>
				{{/if}}

				{{#if (ValCol 'Costo' ../paraReporte)}}
				
					<td class="elementotabla col_costo" > 
						{{ costo }}
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

