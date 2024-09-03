
<script id="modulo_datos_general_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosmodulo" name="frmTablaDatosmodulo">
			<div id="divTablaDatosAuxiliarmodulosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count modulos}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulomodulo" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Modulos</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosmodulos" name="tblTablaDatosmodulos" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">VERSIONROW</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sistema<a onclick="jQuery('#form-id_sistema_img').trigger('click' );"><img id="form{{strSufijo}}-id_sistema_img2" name="form{{strSufijo}}-id_sistema_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="modulo_webcontrol1.abrirBusquedaParasistema('id_sistema');"><img id="form{{strSufijo}}-id_sistema_img_busqueda2" name="form{{strSufijo}}-id_sistema_img_busqueda2" title="Buscar Sistema" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Paquete<a onclick="jQuery('#form-id_paquete_img').trigger('click' );"><img id="form{{strSufijo}}-id_paquete_img2" name="form{{strSufijo}}-id_paquete_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="modulo_webcontrol1.abrirBusquedaParapaquete('id_paquete');"><img id="form{{strSufijo}}-id_paquete_img_busqueda2" name="form{{strSufijo}}-id_paquete_img_busqueda2" title="Buscar Paquete" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Tecla Mascara<a onclick="jQuery('#form-id_tipo_tecla_mascara_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_tecla_mascara_img2" name="form{{strSufijo}}-id_tipo_tecla_mascara_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="modulo_webcontrol1.abrirBusquedaParatipo_tecla_mascara('id_tipo_tecla_mascara');"><img id="form{{strSufijo}}-id_tipo_tecla_mascara_img_busqueda2" name="form{{strSufijo}}-id_tipo_tecla_mascara_img_busqueda2" title="Buscar Tipo Tecla Mascara" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tecla</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Orden</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
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
				<pre class="cabecera_texto_titulo_tabla">VERSIONROW</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sistema<a onclick="jQuery('#form-id_sistema_img').trigger('click' );"><img id="form{{strSufijo}}-id_sistema_img2" name="form{{strSufijo}}-id_sistema_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="modulo_webcontrol1.abrirBusquedaParasistema('id_sistema');"><img id="form{{strSufijo}}-id_sistema_img_busqueda2" name="form{{strSufijo}}-id_sistema_img_busqueda2" title="Buscar Sistema" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Paquete<a onclick="jQuery('#form-id_paquete_img').trigger('click' );"><img id="form{{strSufijo}}-id_paquete_img2" name="form{{strSufijo}}-id_paquete_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="modulo_webcontrol1.abrirBusquedaParapaquete('id_paquete');"><img id="form{{strSufijo}}-id_paquete_img_busqueda2" name="form{{strSufijo}}-id_paquete_img_busqueda2" title="Buscar Paquete" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Tecla Mascara<a onclick="jQuery('#form-id_tipo_tecla_mascara_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_tecla_mascara_img2" name="form{{strSufijo}}-id_tipo_tecla_mascara_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="modulo_webcontrol1.abrirBusquedaParatipo_tecla_mascara('id_tipo_tecla_mascara');"><img id="form{{strSufijo}}-id_tipo_tecla_mascara_img_busqueda2" name="form{{strSufijo}}-id_tipo_tecla_mascara_img_busqueda2" title="Buscar Tipo Tecla Mascara" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tecla</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Orden</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist modulosLocal)}}
			{{#each modulosLocal}}

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
								<img class="imgseleccionarmodulo" idactualmodulo="{{id}}" title="SELECCIONAR Modulo ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablamodulo" idactualmodulo="{{id}}" title="ELIMINAR Modulo ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Modulo ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_version_row"  style="display:none"> 
						{{ versionRow }}
					</td>
				<td class="elementotabla col_id_sistema" > {{id_sistema_Descripcion}}</td>
				<td class="elementotabla col_id_paquete" > {{id_paquete_Descripcion}}</td>
				
					<td class="elementotabla col_codigo" > 
						{{ codigo }}
					</td>
				
					<td class="elementotabla col_nombre" > 
						{{ nombre }}
					</td>
				<td class="elementotabla col_id_tipo_tecla_mascara" > {{id_tipo_tecla_mascara_Descripcion}}</td>
				
					<td class="elementotabla col_tecla" > 
						{{ tecla }}
					</td>
				
					<td class="elementotabla col_estado" >{{{ getCheckBox estado 'form-estadoi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_orden" > 
						{{ orden }}
					</td>
				
					<td class="elementotabla col_descripcion" > 
						{{ descripcion }}
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

