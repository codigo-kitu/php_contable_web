
<script id="parametro_generico_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosparametro_generico" name="frmTablaDatosparametro_generico">
			<div id="divTablaDatosAuxiliarparametro_genericosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count parametro_genericos}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloparametro_generico" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametros Genericoses</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosparametro_genericos" name="tblTablaDatosparametro_genericos" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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

		{{#if (ValCol 'Parametro' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Parametro</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion Pantalla' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion Pantalla</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Caracteristica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Caracteristica</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor2 Caracteristica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor2 Caracteristica</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor3 Caracteristica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor3 Caracteristica</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Fecha' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Fecha</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Numerico' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Numerico</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor2 Numerico' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor2 Numerico</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Binario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Binario</pre>
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

		{{#if (ValCol 'Parametro' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Parametro</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion Pantalla' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion Pantalla</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Caracteristica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Caracteristica</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor2 Caracteristica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor2 Caracteristica</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor3 Caracteristica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor3 Caracteristica</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Fecha' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Fecha</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Numerico' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Numerico</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor2 Numerico' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor2 Numerico</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Binario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Binario</pre>
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

		{{#if (Is_List_Exist parametro_genericosLocal)}}
			{{#each parametro_genericosLocal}}

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
								<img class="imgseleccionarparametro_generico" idactualparametro_generico="{{id}}" title="SELECCIONAR Parametros Genericos ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaparametro_generico" idactualparametro_generico="{{id}}" title="ELIMINAR Parametros Genericos ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Parametros Genericos ACTUAL" value="{{id}}"></input>
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

				{{#if (ValCol 'Parametro' ../paraReporte)}}
				
					<td class="elementotabla col_parametro" > 
						{{ parametro }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descripcion Pantalla' ../paraReporte)}}
				
					<td class="elementotabla col_descripcion_pantalla" > 
						{{ descripcion_pantalla }}
					</td>
				{{/if}}

				{{#if (ValCol 'Valor Caracteristica' ../paraReporte)}}
				
					<td class="elementotabla col_valor_caracteristica" > 
						{{ valor_caracteristica }}
					</td>
				{{/if}}

				{{#if (ValCol 'Valor2 Caracteristica' ../paraReporte)}}
				
					<td class="elementotabla col_valor2_caracteristica" > 
						{{ valor2_caracteristica }}
					</td>
				{{/if}}

				{{#if (ValCol 'Valor3 Caracteristica' ../paraReporte)}}
				
					<td class="elementotabla col_valor3_caracteristica" > 
						{{ valor3_caracteristica }}
					</td>
				{{/if}}

				{{#if (ValCol 'Valor Fecha' ../paraReporte)}}
				
					<td class="elementotabla col_valor_fecha" > 
						{{ valor_fecha }}
					</td>
				{{/if}}

				{{#if (ValCol 'Valor Numerico' ../paraReporte)}}
				
					<td class="elementotabla col_valor_numerico" > 
						{{ valor_numerico }}
					</td>
				{{/if}}

				{{#if (ValCol 'Valor2 Numerico' ../paraReporte)}}
				
					<td class="elementotabla col_valor2_numerico" > 
						{{ valor2_numerico }}
					</td>
				{{/if}}

				{{#if (ValCol 'Valor Binario' ../paraReporte)}}
				
					<td class="elementotabla col_valor_binario" > 
						{{ valor_binario }}
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

