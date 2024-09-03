
<script id="resumen_usuario_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosresumen_usuario" name="frmTablaDatosresumen_usuario">
			<div id="divTablaDatosAuxiliarresumen_usuariosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count resumen_usuarios}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloresumen_usuario" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Resumen Usuarios</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosresumen_usuarios" name="tblTablaDatosresumen_usuarios" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="resumen_usuario_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Ingresos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Ingresos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Error Ingreso' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Error Ingreso</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Intentos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Intentos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Cierres' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cierres</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Reinicios' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Reinicios</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Ingreso Actual' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Ingreso Actual</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ultimo Ingreso' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Ingreso</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ultimo Error Ingreso' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Error Ingreso</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ultimo Intento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Intento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ultimo Cierre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Cierre</pre>
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

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="resumen_usuario_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Ingresos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Ingresos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Error Ingreso' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Error Ingreso</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Intentos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Intentos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Cierres' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cierres</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Reinicios' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Reinicios</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Ingreso Actual' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Ingreso Actual</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ultimo Ingreso' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Ingreso</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ultimo Error Ingreso' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Error Ingreso</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ultimo Intento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Intento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ultimo Cierre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Cierre</pre>
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

		{{#if (Is_List_Exist resumen_usuariosLocal)}}
			{{#each resumen_usuariosLocal}}

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
								<img class="imgseleccionarresumen_usuario" idactualresumen_usuario="{{id}}" title="SELECCIONAR Resumen Usuario ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaresumen_usuario" idactualresumen_usuario="{{id}}" title="ELIMINAR Resumen Usuario ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Resumen Usuario ACTUAL" value="{{id}}"></input>
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
				{{#if ../IS_DEVELOPING}}
				<td> {{id_usuario_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Numero Ingresos' ../paraReporte)}}
				
					<td class="elementotabla col_numero_ingresos" > 
						{{ numero_ingresos }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Error Ingreso' ../paraReporte)}}
				
					<td class="elementotabla col_numero_error_ingreso" > 
						{{ numero_error_ingreso }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Intentos' ../paraReporte)}}
				
					<td class="elementotabla col_numero_intentos" > 
						{{ numero_intentos }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Cierres' ../paraReporte)}}
				
					<td class="elementotabla col_numero_cierres" > 
						{{ numero_cierres }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Reinicios' ../paraReporte)}}
				
					<td class="elementotabla col_numero_reinicios" > 
						{{ numero_reinicios }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Ingreso Actual' ../paraReporte)}}
				
					<td class="elementotabla col_numero_ingreso_actual" > 
						{{ numero_ingreso_actual }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Ultimo Ingreso' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_ultimo_ingreso" > 
						{{ fecha_ultimo_ingreso }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Ultimo Error Ingreso' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_ultimo_error_ingreso" > 
						{{ fecha_ultimo_error_ingreso }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Ultimo Intento' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_ultimo_intento" > 
						{{ fecha_ultimo_intento }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Ultimo Cierre' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_ultimo_cierre" > 
						{{ fecha_ultimo_cierre }}
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

