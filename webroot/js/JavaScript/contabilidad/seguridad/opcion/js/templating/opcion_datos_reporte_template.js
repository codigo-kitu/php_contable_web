
<script id="opcion_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosopcion" name="frmTablaDatosopcion">
			<div id="divTablaDatosAuxiliaropcionsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count opcions}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloopcion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Opciones</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosopcions" name="tblTablaDatosopcions" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
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

		{{#if (ValCol 'Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sistema<a onclick="jQuery('#form-id_sistema_img').trigger('click' );"><img id="form{{strSufijo}}-id_sistema_img2" name="form{{strSufijo}}-id_sistema_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParasistema('id_sistema');"><img id="form{{strSufijo}}-id_sistema_img_busqueda2" name="form{{strSufijo}}-id_sistema_img_busqueda2" title="Buscar Sistema" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Opcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Opcion<a onclick="jQuery('#form-id_opcion_img').trigger('click' );"><img id="form{{strSufijo}}-id_opcion_img2" name="form{{strSufijo}}-id_opcion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParaopcion('id_opcion');"><img id="form{{strSufijo}}-id_opcion_img_busqueda2" name="form{{strSufijo}}-id_opcion_img_busqueda2" title="Buscar Opcion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Grupo Opcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Opcion<a onclick="jQuery('#form-id_grupo_opcion_img').trigger('click' );"><img id="form{{strSufijo}}-id_grupo_opcion_img2" name="form{{strSufijo}}-id_grupo_opcion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParagrupo_opcion('id_grupo_opcion');"><img id="form{{strSufijo}}-id_grupo_opcion_img_busqueda2" name="form{{strSufijo}}-id_grupo_opcion_img_busqueda2" title="Buscar Grupo Opcion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo<a onclick="jQuery('#form-id_modulo_img').trigger('click' );"><img id="form{{strSufijo}}-id_modulo_img2" name="form{{strSufijo}}-id_modulo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParamodulo('id_modulo');"><img id="form{{strSufijo}}-id_modulo_img_busqueda2" name="form{{strSufijo}}-id_modulo_img_busqueda2" title="Buscar Modulo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
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

		{{#if (ValCol 'Posicion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Posicion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Path Del Icono' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Path Del Icono</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre De Clase' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre De Clase</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Modulo 0' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo 0</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Sub Modulo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Modulo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Paquete' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Paquete</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Es Para Menu' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Para Menu</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Es Guardar Relaciones' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Guardar Relaciones</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Mostrar Acciones Campo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Acciones Campo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Estado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Acciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Campos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Perfil es</pre></b>
			</th>

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
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

		{{#if (ValCol 'Sistema' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sistema<a onclick="jQuery('#form-id_sistema_img').trigger('click' );"><img id="form{{strSufijo}}-id_sistema_img2" name="form{{strSufijo}}-id_sistema_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParasistema('id_sistema');"><img id="form{{strSufijo}}-id_sistema_img_busqueda2" name="form{{strSufijo}}-id_sistema_img_busqueda2" title="Buscar Sistema" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Opcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Opcion<a onclick="jQuery('#form-id_opcion_img').trigger('click' );"><img id="form{{strSufijo}}-id_opcion_img2" name="form{{strSufijo}}-id_opcion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParaopcion('id_opcion');"><img id="form{{strSufijo}}-id_opcion_img_busqueda2" name="form{{strSufijo}}-id_opcion_img_busqueda2" title="Buscar Opcion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Grupo Opcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Opcion<a onclick="jQuery('#form-id_grupo_opcion_img').trigger('click' );"><img id="form{{strSufijo}}-id_grupo_opcion_img2" name="form{{strSufijo}}-id_grupo_opcion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParagrupo_opcion('id_grupo_opcion');"><img id="form{{strSufijo}}-id_grupo_opcion_img_busqueda2" name="form{{strSufijo}}-id_grupo_opcion_img_busqueda2" title="Buscar Grupo Opcion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo<a onclick="jQuery('#form-id_modulo_img').trigger('click' );"><img id="form{{strSufijo}}-id_modulo_img2" name="form{{strSufijo}}-id_modulo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="opcion_webcontrol1.abrirBusquedaParamodulo('id_modulo');"><img id="form{{strSufijo}}-id_modulo_img_busqueda2" name="form{{strSufijo}}-id_modulo_img_busqueda2" title="Buscar Modulo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
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

		{{#if (ValCol 'Posicion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Posicion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Path Del Icono' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Path Del Icono</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre De Clase' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre De Clase</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Modulo 0' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo 0</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Sub Modulo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Modulo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Paquete' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Paquete</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Es Para Menu' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Para Menu</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Es Guardar Relaciones' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Guardar Relaciones</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Mostrar Acciones Campo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Acciones Campo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Estado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Acciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Campos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Perfil es</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist opcionsLocal)}}
			{{#each opcionsLocal}}

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
								<img class="imgseleccionaropcion" idactualopcion="{{id}}" title="SELECCIONAR Opcion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaopcion" idactualopcion="{{id}}" title="ELIMINAR Opcion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Opcion ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesopcion" idactualopcion="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
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

				{{#if (ValCol 'Sistema' ../paraReporte)}}
				<td class="elementotabla col_id_sistema" > {{id_sistema_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Opcion' ../paraReporte)}}
				<td class="elementotabla col_id_opcion" > {{id_opcion_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Grupo Opcion' ../paraReporte)}}
				<td class="elementotabla col_id_grupo_opcion" > {{id_grupo_opcion_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_modulo_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Codigo' ../paraReporte)}}
				
					<td class="elementotabla col_codigo" > 
						{{ codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre' ../paraReporte)}}
				
					<td class="elementotabla col_nombre" > 
						{{ nombre }}
					</td>
				{{/if}}

				{{#if (ValCol 'Posicion' ../paraReporte)}}
				
					<td class="elementotabla col_posicion" > 
						{{ posicion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Path Del Icono' ../paraReporte)}}
				
					<td class="elementotabla col_icon_name" > 
						{{ icon_name }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre De Clase' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_clase" > 
						{{ nombre_clase }}
					</td>
				{{/if}}

				{{#if (ValCol 'Modulo 0' ../paraReporte)}}
				
					<td class="elementotabla col_modulo0" > 
						{{ modulo0 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Sub Modulo' ../paraReporte)}}
				
					<td class="elementotabla col_sub_modulo" > 
						{{ sub_modulo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Paquete' ../paraReporte)}}
				
					<td class="elementotabla col_paquete" > 
						{{ paquete }}
					</td>
				{{/if}}

				{{#if (ValCol 'Es Para Menu' ../paraReporte)}}
				
					<td class="elementotabla col_es_para_menu" >{{{ getCheckBox es_para_menu 'form{{strSufijo}}-es_para_menui' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Es Guardar Relaciones' ../paraReporte)}}
				
					<td class="elementotabla col_es_guardar_relaciones" >{{{ getCheckBox es_guardar_relaciones 'form{{strSufijo}}-es_guardar_relacionesi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Mostrar Acciones Campo' ../paraReporte)}}
				
					<td class="elementotabla col_con_mostrar_acciones_campo" >{{{ getCheckBox con_mostrar_acciones_campo 'form{{strSufijo}}-con_mostrar_acciones_campoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Estado' ../paraReporte)}}
				
					<td class="elementotabla col_estado" >{{{ getCheckBox estado 'form{{strSufijo}}-estadoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (If_Not_AND_Not_AND_Not ../paraReporte  ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionaccion" idactualopcion="{{id}}" title="AccionS DE Opcion" src="{{PATH_IMAGEN}}/Imagenes/accions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncampo" idactualopcion="{{id}}" title="CampoS DE Opcion" src="{{PATH_IMAGEN}}/Imagenes/campos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionopcion" idactualopcion="{{id}}" title="OpcionS DE Opcion" src="{{PATH_IMAGEN}}/Imagenes/opcions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionperfil_opcion" idactualopcion="{{id}}" title="Perfil OpcionS DE Opcion" src="{{PATH_IMAGEN}}/Imagenes/perfil_opcions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

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

