
<script id="contador_auxiliar_datos_general_template" type="text/x-handlebars-template">



		<form id="frmTablaDatoscontador_auxiliar" name="frmTablaDatoscontador_auxiliar">
			<div id="divTablaDatosAuxiliarcontador_auxiliarsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count contador_auxiliars}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulocontador_auxiliar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Contadores Auxiliareses</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatoscontador_auxiliars" name="tblTablaDatoscontador_auxiliars" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

		{{#if (If_Yes_AND_Not IS_DEVELOPING  bitEsRelacionado)}}
			<caption>({{STR_PREFIJO_TABLE}} {{STR_TABLE_NAME}})</caption>
		{{/if}}

		
			<thead>
				<tr class="{{class_cabecera}}">
		
				
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:{{strPermisoEliminar}}">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Libro Auxiliar<a onclick="jQuery('#form-id_libro_auxiliar_img').trigger('click' );"><img id="form{{strSufijo}}-id_libro_auxiliar_img2" name="form{{strSufijo}}-id_libro_auxiliar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="contador_auxiliar_webcontrol1.abrirBusquedaParalibro_auxiliar('id_libro_auxiliar');"><img id="form{{strSufijo}}-id_libro_auxiliar_img_busqueda2" name="form{{strSufijo}}-id_libro_auxiliar_img_busqueda2" title="Buscar Libro Auxiliar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo Anual</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mes</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</thead>
		{{#if (If_Not bitEsRelacionado)}}

		
			<tfoot>
				<tr class="{{class_cabecera}}">
		
				
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:{{strPermisoEliminar}}">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Libro Auxiliar<a onclick="jQuery('#form-id_libro_auxiliar_img').trigger('click' );"><img id="form{{strSufijo}}-id_libro_auxiliar_img2" name="form{{strSufijo}}-id_libro_auxiliar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="contador_auxiliar_webcontrol1.abrirBusquedaParalibro_auxiliar('id_libro_auxiliar');"><img id="form{{strSufijo}}-id_libro_auxiliar_img_busqueda2" name="form{{strSufijo}}-id_libro_auxiliar_img_busqueda2" title="Buscar Libro Auxiliar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo Anual</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mes</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contador</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist contador_auxiliarsLocal)}}
			{{#each contador_auxiliarsLocal}}

				{{#if (If_NotText ../STR_TIPO_TABLA 'normal')}}
					
					<tr>
					
				{{else}}
					

					<tr class="{{getClassRowTableHtml i}}" {{getOnMouseOverHtml ../STR_TIPO_TABLA i}} >
				{{/if}}

				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								{{id}}
							</td>
							<td>
								<img class="imgseleccionarcontador_auxiliar" idactualcontador_auxiliar="{{id}}" title="SELECCIONAR Contadores Auxiliares ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablacontador_auxiliar" idactualcontador_auxiliar="{{id}}" title="ELIMINAR Contadores Auxiliares ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Contadores Auxiliares ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				
					<td class="elementotabla col_id_contador" > 
						{{ id_contador }}
					</td>
				<td class="elementotabla col_id_libro_auxiliar" > {{id_libro_auxiliar_Descripcion}}</td>
				
					<td class="elementotabla col_periodo_anual" > 
						{{ periodo_anual }}
					</td>
				
					<td class="elementotabla col_mes" > 
						{{ mes }}
					</td>
				
					<td class="elementotabla col_contador" > 
						{{ contador }}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				{{/if}}

				<td style="display:none" class="actions"></td>

				</tr>
			{{/each}}
		{{/if}}

					</tbody>

				</table>

			</div>

		</form>


</script>

