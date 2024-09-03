
<script id="usuario_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosusuario" name="frmTablaDatosusuario">
			<div id="divTablaDatosAuxiliarusuariosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count usuarios}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulousuario" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Usuarios</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosusuarios" name="tblTablaDatosusuarios" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">VERSIONROW</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre De Usuario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre De Usuario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Clave' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Clave</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Confirmar Clave' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Confirmar Clave</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Completo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Código Alterno' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Código Alterno</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Estado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Auditorias</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Dato General s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Historial Cambio Claves</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Generales</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>s Perfiles s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Resumen s</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">VERSIONROW</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre De Usuario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre De Usuario</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Clave' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Clave</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Confirmar Clave' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Confirmar Clave</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Completo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Código Alterno' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Código Alterno</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Estado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Auditorias</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Dato General s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Historial Cambio Claves</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Generales</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>s Perfiles s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Resumen s</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist usuariosLocal)}}
			{{#each usuariosLocal}}

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
								<img class="imgseleccionarusuario" idactualusuario="{{id}}" title="SELECCIONAR Usuario ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablausuario" idactualusuario="{{id}}" title="ELIMINAR Usuario ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Usuario ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesusuario" idactualusuario="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				{{/if}}
				{{#if (If_Not ../paraReporte)}}
				
					<td class="elementotabla col_version_row"  style="display:none"> 
						{{ versionRow }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre De Usuario' ../paraReporte)}}
				
					<td class="elementotabla col_user_name" > 
						{{ user_name }}
					</td>
				{{/if}}

				{{#if (ValCol 'Clave' ../paraReporte)}}
				
					<td class="elementotabla col_clave" > 
						{{ clave }}
					</td>
				{{/if}}

				{{#if (ValCol 'Confirmar Clave' ../paraReporte)}}
				
					<td class="elementotabla col_confirmar_clave" > 
						{{ confirmar_clave }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Completo' ../paraReporte)}}
				
					<td class="elementotabla col_nombre" > 
						{{ nombre }}
					</td>
				{{/if}}

				{{#if (ValCol 'Código Alterno' ../paraReporte)}}
				
					<td class="elementotabla col_codigo_alterno" > 
						{{ codigo_alterno }}
					</td>
				{{/if}}

				{{#if (ValCol 'Tipo' ../paraReporte)}}
				
					<td class="elementotabla col_tipo" >{{{ getCheckBox tipo 'form-tipoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Estado' ../paraReporte)}}
				
					<td class="elementotabla col_estado" >{{{ getCheckBox estado 'form-estadoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (If_Not_AND_Not_AND_Not ../paraReporte  ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionauditoria" idactualusuario="{{id}}" title="AuditoriaS DE Usuario" src="{{PATH_IMAGEN}}/Imagenes/auditorias.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondato_general_usuario" idactualusuario="{{id}}" title="Dato General UsuarioS DE Usuario" src="{{PATH_IMAGEN}}/Imagenes/dato_general_usuarios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionhistorial_cambio_clave" idactualusuario="{{id}}" title="Historial Cambio ClaveS DE Usuario" src="{{PATH_IMAGEN}}/Imagenes/historial_cambio_claves.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionparametro_general_usuario" idactualusuario="{{id}}" title="Parametro GeneralS DE Usuario" src="{{PATH_IMAGEN}}/Imagenes/parametro_general_usuarios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionperfil_usuario" idactualusuario="{{id}}" title="Usuarios Perfiles S DE Usuario" src="{{PATH_IMAGEN}}/Imagenes/perfil_usuarios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionresumen_usuario" idactualusuario="{{id}}" title="Resumen UsuarioS DE Usuario" src="{{PATH_IMAGEN}}/Imagenes/resumen_usuarios.gif" alt="Seleccionar" border="" height="15" width="15">
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

