
<script id="sucursal_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatossucursal" name="frmTablaDatossucursal">
			<div id="divTablaDatosAuxiliarsucursalsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count sucursals}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulosucursal" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Sucursals</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatossucursals" name="tblTablaDatossucursals" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Pais' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ciudad' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Registro Tributario (RUC)' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Tributario (RUC)</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Registro Empresarial' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Empresarial</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion3' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion3</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Celular' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Celular</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Correo Electronico' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Correo Electronico</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Sitio Web' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sitio Web</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Postal' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fax' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Barrio Distrito' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Barrio Distrito</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Logo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Logo</pre>
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

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Pais' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ciudad' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Registro Tributario (RUC)' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Tributario (RUC)</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Registro Empresarial' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Empresarial</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion3' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion3</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Telefono1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Celular' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Celular</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Correo Electronico' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Correo Electronico</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Sitio Web' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sitio Web</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Postal' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fax' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Barrio Distrito' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Barrio Distrito</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Logo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Logo</pre>
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

		{{#if (Is_List_Exist sucursalsLocal)}}
			{{#each sucursalsLocal}}

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
								<img class="imgseleccionarsucursal" idactualsucursal="{{id}}" title="SELECCIONAR Sucursal ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablasucursal" idactualsucursal="{{id}}" title="ELIMINAR Sucursal ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Sucursal ACTUAL" value="{{id}}"></input>
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
				{{#if ../IS_DEVELOPING}}
				<td> {{id_empresa_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Pais' ../paraReporte)}}
				<td class="elementotabla col_id_pais" > {{id_pais_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Ciudad' ../paraReporte)}}
				<td class="elementotabla col_id_ciudad" > {{id_ciudad_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Nombre' ../paraReporte)}}
				
					<td class="elementotabla col_nombre" > 
						{{ nombre }}
					</td>
				{{/if}}

				{{#if (ValCol 'Registro Tributario (RUC)' ../paraReporte)}}
				
					<td class="elementotabla col_registro_tributario" > 
						{{ registro_tributario }}
					</td>
				{{/if}}

				{{#if (ValCol 'Registro Empresarial' ../paraReporte)}}
				
					<td class="elementotabla col_registro_sucursalrial" > 
						{{ registro_sucursalrial }}
					</td>
				{{/if}}

				{{#if (ValCol 'Direccion1' ../paraReporte)}}
				
					<td class="elementotabla col_direccion1" > 
						{{ direccion1 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Direccion2' ../paraReporte)}}
				
					<td class="elementotabla col_direccion2" > 
						{{ direccion2 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Direccion3' ../paraReporte)}}
				
					<td class="elementotabla col_direccion3" > 
						{{ direccion3 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Telefono1' ../paraReporte)}}
				
					<td class="elementotabla col_telefono1" > 
						{{ telefono1 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Celular' ../paraReporte)}}
				
					<td class="elementotabla col_celular" > 
						{{ celular }}
					</td>
				{{/if}}

				{{#if (ValCol 'Correo Electronico' ../paraReporte)}}
				
					<td class="elementotabla col_correo_electronico" > 
						{{ correo_electronico }}
					</td>
				{{/if}}

				{{#if (ValCol 'Sitio Web' ../paraReporte)}}
				
					<td class="elementotabla col_sitio_web" > 
						{{ sitio_web }}
					</td>
				{{/if}}

				{{#if (ValCol 'Codigo Postal' ../paraReporte)}}
				
					<td class="elementotabla col_codigo_postal" > 
						{{ codigo_postal }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fax' ../paraReporte)}}
				
					<td class="elementotabla col_fax" > 
						{{ fax }}
					</td>
				{{/if}}

				{{#if (ValCol 'Barrio Distrito' ../paraReporte)}}
				
					<td class="elementotabla col_barrio_distrito" > 
						{{ barrio_distrito }}
					</td>
				{{/if}}

				{{#if (ValCol 'Logo' ../paraReporte)}}
				
					<td class="elementotabla col_logo" > 
						{{ logo }}
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

