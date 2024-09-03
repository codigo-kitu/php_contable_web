
<script id="dato_general_usuario_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosdato_general_usuario" name="frmTablaDatosdato_general_usuario">
			<div id="divTablaDatosAuxiliardato_general_usuariosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count dato_general_usuarios}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulodato_general_usuario" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Dato General Usuarios</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosdato_general_usuarios" name="tblTablaDatosdato_general_usuarios" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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

		{{#if (ValCol 'Pais' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Provincia' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ciudad' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cedula' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cedula</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Apellidos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Apellidos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombres' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombres</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono Movil' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'E Mail' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Url' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Url</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Nacimiento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Nacimiento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
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

		{{#if (ValCol 'Pais' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Provincia' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ciudad' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cedula' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cedula</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Apellidos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Apellidos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombres' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombres</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono Movil' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'E Mail' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Url' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Url</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Nacimiento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Nacimiento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
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

		{{#if (Is_List_Exist dato_general_usuariosLocal)}}
			{{#each dato_general_usuariosLocal}}

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
								<img class="imgseleccionardato_general_usuario" idactualdato_general_usuario="{{id}}" title="SELECCIONAR Dato General Usuario ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartabladato_general_usuario" idactualdato_general_usuario="{{id}}" title="ELIMINAR Dato General Usuario ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Dato General Usuario ACTUAL" value="{{id}}"></input>
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

				{{#if (ValCol 'Pais' ../paraReporte)}}
				<td class="elementotabla col_id_pais" > {{id_pais_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Provincia' ../paraReporte)}}
				<td class="elementotabla col_id_provincia" > {{id_provincia_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Ciudad' ../paraReporte)}}
				<td class="elementotabla col_id_ciudad" > {{id_ciudad_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Cedula' ../paraReporte)}}
				
					<td class="elementotabla col_cedula" > 
						{{ cedula }}
					</td>
				{{/if}}

				{{#if (ValCol 'Apellidos' ../paraReporte)}}
				
					<td class="elementotabla col_apellidos" > 
						{{ apellidos }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombres' ../paraReporte)}}
				
					<td class="elementotabla col_nombres" > 
						{{ nombres }}
					</td>
				{{/if}}

				{{#if (ValCol 'Telefono' ../paraReporte)}}
				
					<td class="elementotabla col_telefono" > 
						{{ telefono }}
					</td>
				{{/if}}

				{{#if (ValCol 'Telefono Movil' ../paraReporte)}}
				
					<td class="elementotabla col_telefono_movil" > 
						{{ telefono_movil }}
					</td>
				{{/if}}

				{{#if (ValCol 'E Mail' ../paraReporte)}}
				
					<td class="elementotabla col_e_mail" > 
						{{ e_mail }}
					</td>
				{{/if}}

				{{#if (ValCol 'Url' ../paraReporte)}}
				
					<td class="elementotabla col_url" > 
						{{ url }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Nacimiento' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_nacimiento" > 
						{{ fecha_nacimiento }}
					</td>
				{{/if}}

				{{#if (ValCol 'Direccion' ../paraReporte)}}
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
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

