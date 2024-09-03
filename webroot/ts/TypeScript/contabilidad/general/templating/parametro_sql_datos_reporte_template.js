
<script id="parametro_sql_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosparametro_sql" name="frmTablaDatosparametro_sql">
			<div id="divTablaDatosAuxiliarparametro_sqlsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count parametro_sqls}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloparametro_sql" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametros Sqles</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosparametro_sqls" name="tblTablaDatosparametro_sqls" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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

		{{#if (ValCol 'Binario1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Binario2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Binario3' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario3</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Binario4' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario4</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Binario5' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario5</pre>
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

		{{#if (ValCol 'Binario1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Binario2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Binario3' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario3</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Binario4' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario4</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Binario5' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Binario5</pre>
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

		{{#if (Is_List_Exist parametro_sqlsLocal)}}
			{{#each parametro_sqlsLocal}}

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
								<img class="imgseleccionarparametro_sql" idactualparametro_sql="{{id}}" title="SELECCIONAR Parametros Sql ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaparametro_sql" idactualparametro_sql="{{id}}" title="ELIMINAR Parametros Sql ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Parametros Sql ACTUAL" value="{{id}}"></input>
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

				{{#if (ValCol 'Binario1' ../paraReporte)}}
				
					<td class="elementotabla col_binario1" > 
						{{ binario1 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Binario2' ../paraReporte)}}
				
					<td class="elementotabla col_binario2" > 
						{{ binario2 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Binario3' ../paraReporte)}}
				
					<td class="elementotabla col_binario3" > 
						{{ binario3 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Binario4' ../paraReporte)}}
				
					<td class="elementotabla col_binario4" > 
						{{ binario4 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Binario5' ../paraReporte)}}
				
					<td class="elementotabla col_binario5" > 
						{{ binario5 }}
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

