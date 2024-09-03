
<script id="otro_documento_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosotro_documento" name="frmTablaDatosotro_documento">
			<div id="divTablaDatosAuxiliarotro_documentosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count otro_documentos}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulootro_documento" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Otros Documentoses</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosotro_documentos" name="tblTablaDatosotro_documentos" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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

		{{#if (ValCol 'Archivo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Archivo<a onclick="jQuery('#form-id_archivo_img').trigger('click' );"><img id="form{{strSufijo}}-id_archivo_img2" name="form{{strSufijo}}-id_archivo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="otro_documento_webcontrol1.abrirBusquedaParaarchivo('id_archivo');"><img id="form{{strSufijo}}-id_archivo_img_busqueda2" name="form{{strSufijo}}-id_archivo_img_busqueda2" title="Buscar Archivos" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Archivo Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Archivo Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Archivo Data' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Archivo Data</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Campo1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Campo2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Campo3' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo3</pre>
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

		{{#if (ValCol 'Archivo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Archivo<a onclick="jQuery('#form-id_archivo_img').trigger('click' );"><img id="form{{strSufijo}}-id_archivo_img2" name="form{{strSufijo}}-id_archivo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="otro_documento_webcontrol1.abrirBusquedaParaarchivo('id_archivo');"><img id="form{{strSufijo}}-id_archivo_img_busqueda2" name="form{{strSufijo}}-id_archivo_img_busqueda2" title="Buscar Archivos" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Archivo Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Archivo Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Archivo Data' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Archivo Data</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Campo1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Campo2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Campo3' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Campo3</pre>
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

		{{#if (Is_List_Exist otro_documentosLocal)}}
			{{#each otro_documentosLocal}}

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
								<img class="imgseleccionarotro_documento" idactualotro_documento="{{id}}" title="SELECCIONAR Otros Documentos ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaotro_documento" idactualotro_documento="{{id}}" title="ELIMINAR Otros Documentos ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Otros Documentos ACTUAL" value="{{id}}"></input>
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

				{{#if (ValCol 'Archivo' ../paraReporte)}}
				<td class="elementotabla col_id_archivo" > {{id_archivo_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Archivo Nombre' ../paraReporte)}}
				
					<td class="elementotabla col_nombre" > 
						{{ nombre }}
					</td>
				{{/if}}

				{{#if (ValCol 'Archivo Data' ../paraReporte)}}
				
					<td class="elementotabla col_data" > 
						{{ data }}
					</td>
				{{/if}}

				{{#if (ValCol 'Campo1' ../paraReporte)}}
				
					<td class="elementotabla col_campo1" > 
						{{ campo1 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Campo2' ../paraReporte)}}
				
					<td class="elementotabla col_campo2" > 
						{{ campo2 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Campo3' ../paraReporte)}}
				
					<td class="elementotabla col_campo3" > 
						{{ campo3 }}
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

