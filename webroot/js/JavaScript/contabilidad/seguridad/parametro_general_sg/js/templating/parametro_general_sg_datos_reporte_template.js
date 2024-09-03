
<script id="parametro_general_sg_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosparametro_general_sg" name="frmTablaDatosparametro_general_sg">
			<div id="divTablaDatosAuxiliarparametro_general_sgsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count parametro_general_sgs}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloparametro_general_sg" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Generales</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosparametro_general_sgs" name="tblTablaDatosparametro_general_sgs" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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

		{{#if (ValCol 'Nombre Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Simple Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Simple Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Empresa' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Empresa</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Version Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Version Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Siglas Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siglas Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Mail Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mail Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fax Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Representante Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Representante Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Proceso Actualizacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Proceso Actualizacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Esta Activo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Esta Activo</pre>
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

		{{#if (ValCol 'Nombre Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Simple Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Simple Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Empresa' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Empresa</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Version Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Version Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Siglas Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Siglas Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Mail Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mail Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fax Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax Sistema</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Representante Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Representante Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Proceso Actualizacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Proceso Actualizacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Esta Activo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Esta Activo</pre>
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

		{{#if (Is_List_Exist parametro_general_sgsLocal)}}
			{{#each parametro_general_sgsLocal}}

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
								<img class="imgseleccionarparametro_general_sg" idactualparametro_general_sg="{{id}}" title="SELECCIONAR Parametro General ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaparametro_general_sg" idactualparametro_general_sg="{{id}}" title="ELIMINAR Parametro General ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro General ACTUAL" value="{{id}}"></input>
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

				{{#if (ValCol 'Nombre Sistema' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_sistema" > 
						{{ nombre_sistema }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Simple Sistema' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_simple_sistema" > 
						{{ nombre_simple_sistema }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Empresa' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_empresa" > 
						{{ nombre_empresa }}
					</td>
				{{/if}}

				{{#if (ValCol 'Version Sistema' ../paraReporte)}}
				
					<td class="elementotabla col_version_sistema" > 
						{{ version_sistema }}
					</td>
				{{/if}}

				{{#if (ValCol 'Siglas Sistema' ../paraReporte)}}
				
					<td class="elementotabla col_siglas_sistema" > 
						{{ siglas_sistema }}
					</td>
				{{/if}}

				{{#if (ValCol 'Mail Sistema' ../paraReporte)}}
				
					<td class="elementotabla col_mail_sistema" > 
						{{ mail_sistema }}
					</td>
				{{/if}}

				{{#if (ValCol 'Telefono Sistema' ../paraReporte)}}
				
					<td class="elementotabla col_telefono_sistema" > 
						{{ telefono_sistema }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fax Sistema' ../paraReporte)}}
				
					<td class="elementotabla col_fax_sistema" > 
						{{ fax_sistema }}
					</td>
				{{/if}}

				{{#if (ValCol 'Representante Nombre' ../paraReporte)}}
				
					<td class="elementotabla col_representante_nombre" > 
						{{ representante_nombre }}
					</td>
				{{/if}}

				{{#if (ValCol 'Codigo Proceso Actualizacion' ../paraReporte)}}
				
					<td class="elementotabla col_codigo_proceso_actualizacion" > 
						{{ codigo_proceso_actualizacion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Esta Activo' ../paraReporte)}}
				
					<td class="elementotabla col_esta_activo" >{{{ getCheckBox esta_activo 'form{{strSufijo}}-esta_activoi' ../paraReporte }}}
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

