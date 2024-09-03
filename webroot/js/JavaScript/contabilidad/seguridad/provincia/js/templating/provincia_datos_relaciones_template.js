
<script id="provincia_datos_relaciones_template" type="text/x-handlebars-template">


<div id="divTablaDatosAuxiliarprovinciasAjaxWebPart" style="width:100%;height:100%;overflow:auto;">

{{#each provinciasReporte}}

			<table id="tableprovincia{{id}}" {{../strAuxStyleBackgroundTablaPrincipal}} width="{{../strTamanioTablaPrincipal}}" align="center" cellspacing="0" cellpadding="0" border="{{../borderValue}}">
						
				<tr>
					<td align="center" {{../strAuxStyleBackgroundTitulo}} >
						<p class="tituloficha">
							<b>{{strtoupper codigo}}</b>
						</p>
					</td>
				</tr>
			
				

			{{#if (existeCadenaArrayOrderBy 'Pais' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Pais</b>
								</td>
								<td>{{trim id_pais_Descripcion}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Codigo' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Codigo</b>
								</td>
								<td>{{trim codigo}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}

			{{#if (existeCadenaArrayOrderBy 'Nombre' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Nombre</b>
								</td>
								<td>{{trim nombre}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}				
			</table>
			
			
		<form id="frmTablaDatosciudad" name="frmTablaDatosciudad">
			<div id="divTablaDatosAuxiliarciudadsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count ciudads}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulociudad" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Ciudades</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosciudads" name="tblTablaDatosciudads" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="ciudad_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Dato General Usuarios</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Empresas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Sucursals</pre></b>
			</th>

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="ciudad_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Dato General Usuarios</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Empresas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Sucursals</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist ciudads)}}
			{{#each ciudads}}

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
								<img class="imgseleccionarciudad" idactualciudad="{{id}}" title="SELECCIONAR Ciudad ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaciudad" idactualciudad="{{id}}" title="ELIMINAR Ciudad ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Ciudad ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesciudad" idactualciudad="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				<td class="elementotabla col_id_provincia" > {{id_provincia_Descripcion}}</td>
				
					<td class="elementotabla col_codigo" > 
						{{ codigo }}
					</td>
				
					<td class="elementotabla col_nombre" > 
						{{ nombre }}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncliente" idactualciudad="{{id}}" title="ClienteS DE Ciudad" src="{{PATH_IMAGEN}}/Imagenes/clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondato_general_usuario" idactualciudad="{{id}}" title="Dato General UsuarioS DE Ciudad" src="{{PATH_IMAGEN}}/Imagenes/dato_general_usuarios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionempresa" idactualciudad="{{id}}" title="EmpresaS DE Ciudad" src="{{PATH_IMAGEN}}/Imagenes/empresas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionproveedor" idactualciudad="{{id}}" title="ProveedorS DE Ciudad" src="{{PATH_IMAGEN}}/Imagenes/proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionsucursal" idactualciudad="{{id}}" title="SucursalS DE Ciudad" src="{{PATH_IMAGEN}}/Imagenes/sucursals.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				{{/if}}

				<td style="display:none" class="actions"></td>

				</tr>
			{{/each}}
		{{/if}}

					</tbody>

				</table>

			</div>

		</form>
			
		<form id="frmTablaDatosproveedor" name="frmTablaDatosproveedor">
			<div id="divTablaDatosAuxiliarproveedorsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count proveedors}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloproveedor" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Proveedores</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosproveedors" name="tblTablaDatosproveedors" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Persona</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria<a onclick="jQuery('#form-id_categoria_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_proveedor_img2" name="form{{strSufijo}}-id_categoria_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParacategoria_proveedor('id_categoria_proveedor');"><img id="form{{strSufijo}}-id_categoria_proveedor_img_busqueda2" name="form{{strSufijo}}-id_categoria_proveedor_img_busqueda2" title="Buscar Categorias Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Giro Negocio<a onclick="jQuery('#form-id_giro_negocio_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_giro_negocio_proveedor_img2" name="form{{strSufijo}}-id_giro_negocio_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParagiro_negocio_proveedor('id_giro_negocio_proveedor');"><img id="form{{strSufijo}}-id_giro_negocio_proveedor_img_busqueda2" name="form{{strSufijo}}-id_giro_negocio_proveedor_img_busqueda2" title="Buscar Giro Negocios Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contacto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Credito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Descuento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Anual</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Pago<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_img2" name="form{{strSufijo}}-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form{{strSufijo}}-id_cuenta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Impuesto Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_img2" name="form{{strSufijo}}-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form{{strSufijo}}-id_impuesto_img_busqueda2" name="form{{strSufijo}}-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_img2" name="form{{strSufijo}}-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form{{strSufijo}}-id_retencion_img_busqueda2" name="form{{strSufijo}}-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Fuente<a onclick="jQuery('#form-id_retencion_fuente_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_fuente_img2" name="form{{strSufijo}}-id_retencion_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaPararetencion_fuente('id_retencion_fuente');"><img id="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" name="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" title="Buscar Retencion Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Ica</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ica<a onclick="jQuery('#form-id_retencion_ica_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_ica_img2" name="form{{strSufijo}}-id_retencion_ica_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaPararetencion_ica('id_retencion_ica');"><img id="form{{strSufijo}}-id_retencion_ica_img_busqueda2" name="form{{strSufijo}}-id_retencion_ica_img_busqueda2" title="Buscar Retencion Ica" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica 2do Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_img2" name="form{{strSufijo}}-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Cuenta Pagars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos eses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes eses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Precioses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Suplidores</pre></b>
			</th>

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Persona</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categoria<a onclick="jQuery('#form-id_categoria_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_proveedor_img2" name="form{{strSufijo}}-id_categoria_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParacategoria_proveedor('id_categoria_proveedor');"><img id="form{{strSufijo}}-id_categoria_proveedor_img_busqueda2" name="form{{strSufijo}}-id_categoria_proveedor_img_busqueda2" title="Buscar Categorias Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Giro Negocio<a onclick="jQuery('#form-id_giro_negocio_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_giro_negocio_proveedor_img2" name="form{{strSufijo}}-id_giro_negocio_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParagiro_negocio_proveedor('id_giro_negocio_proveedor');"><img id="form{{strSufijo}}-id_giro_negocio_proveedor_img_busqueda2" name="form{{strSufijo}}-id_giro_negocio_proveedor_img_busqueda2" title="Buscar Giro Negocios Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contacto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Credito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Descuento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Anual</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Pago<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_img2" name="form{{strSufijo}}-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form{{strSufijo}}-id_cuenta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Impuesto Compras</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_img2" name="form{{strSufijo}}-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form{{strSufijo}}-id_impuesto_img_busqueda2" name="form{{strSufijo}}-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_img2" name="form{{strSufijo}}-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form{{strSufijo}}-id_retencion_img_busqueda2" name="form{{strSufijo}}-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Fuente<a onclick="jQuery('#form-id_retencion_fuente_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_fuente_img2" name="form{{strSufijo}}-id_retencion_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaPararetencion_fuente('id_retencion_fuente');"><img id="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" name="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" title="Buscar Retencion Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Ica</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ica<a onclick="jQuery('#form-id_retencion_ica_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_ica_img2" name="form{{strSufijo}}-id_retencion_ica_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaPararetencion_ica('id_retencion_ica');"><img id="form{{strSufijo}}-id_retencion_ica_img_busqueda2" name="form{{strSufijo}}-id_retencion_ica_img_busqueda2" title="Buscar Retencion Ica" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica 2do Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_img2" name="form{{strSufijo}}-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="proveedor_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Cuenta Pagars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos eses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes eses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Precioses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Suplidores</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist proveedors)}}
			{{#each proveedors}}

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
								<img class="imgseleccionarproveedor" idactualproveedor="{{id}}" title="SELECCIONAR Proveedor ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaproveedor" idactualproveedor="{{id}}" title="ELIMINAR Proveedor ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Proveedor ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesproveedor" idactualproveedor="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				{{#if ../IS_DEVELOPING}}
				<td> {{id_empresa_Descripcion}}</td>
				{{/if}}
				<td class="elementotabla col_id_tipo_persona" > {{id_tipo_persona_Descripcion}}</td>
				<td class="elementotabla col_id_categoria_proveedor" > {{id_categoria_proveedor_Descripcion}}</td>
				<td class="elementotabla col_id_giro_negocio_proveedor" > {{id_giro_negocio_proveedor_Descripcion}}</td>
				
					<td class="elementotabla col_codigo" > 
						{{ codigo }}
					</td>
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				
					<td class="elementotabla col_primer_apellido" > 
						{{ primer_apellido }}
					</td>
				
					<td class="elementotabla col_segundo_apellido" > 
						{{ segundo_apellido }}
					</td>
				
					<td class="elementotabla col_primer_nombre" > 
						{{ primer_nombre }}
					</td>
				
					<td class="elementotabla col_segundo_nombre" > 
						{{ segundo_nombre }}
					</td>
				
					<td class="elementotabla col_nombre_completo" > 
						{{ nombre_completo }}
					</td>
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				
					<td class="elementotabla col_telefono" > 
						{{ telefono }}
					</td>
				
					<td class="elementotabla col_telefono_movil" > 
						{{ telefono_movil }}
					</td>
				
					<td class="elementotabla col_e_mail" > 
						{{ e_mail }}
					</td>
				
					<td class="elementotabla col_e_mail2" > 
						{{ e_mail2 }}
					</td>
				
					<td class="elementotabla col_comentario" > 
						{{ comentario }}
					</td>
				
					<td class="elementotabla col_imagen" > 
						{{ imagen }}
					</td>
				
					<td class="elementotabla col_activo" >{{{ getCheckBox activo 'form{{strSufijo}}-activoi' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_pais" > {{id_pais_Descripcion}}</td>
				<td class="elementotabla col_id_provincia" > {{id_provincia_Descripcion}}</td>
				<td class="elementotabla col_id_ciudad" > {{id_ciudad_Descripcion}}</td>
				
					<td class="elementotabla col_codigo_postal" > 
						{{ codigo_postal }}
					</td>
				
					<td class="elementotabla col_fax" > 
						{{ fax }}
					</td>
				
					<td class="elementotabla col_contacto" > 
						{{ contacto }}
					</td>
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				
					<td class="elementotabla col_maximo_credito" > 
						{{ maximo_credito }}
					</td>
				
					<td class="elementotabla col_maximo_descuento" > 
						{{ maximo_descuento }}
					</td>
				
					<td class="elementotabla col_interes_anual" > 
						{{ interes_anual }}
					</td>
				
					<td class="elementotabla col_balance" > 
						{{ balance }}
					</td>
				<td class="elementotabla col_id_termino_pago_proveedor" > {{id_termino_pago_proveedor_Descripcion}}</td>
				<td class="elementotabla col_id_cuenta" > {{id_cuenta_Descripcion}}</td>
				
					<td class="elementotabla col_aplica_impuesto_compras" >{{{ getCheckBox aplica_impuesto_compras 'form{{strSufijo}}-aplica_impuesto_comprasi' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_impuesto" > {{id_impuesto_Descripcion}}</td>
				
					<td class="elementotabla col_aplica_retencion_impuesto" >{{{ getCheckBox aplica_retencion_impuesto 'form{{strSufijo}}-aplica_retencion_impuestoi' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_retencion" > {{id_retencion_Descripcion}}</td>
				
					<td class="elementotabla col_aplica_retencion_fuente" >{{{ getCheckBox aplica_retencion_fuente 'form{{strSufijo}}-aplica_retencion_fuentei' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_retencion_fuente" > {{id_retencion_fuente_Descripcion}}</td>
				
					<td class="elementotabla col_aplica_retencion_ica" >{{{ getCheckBox aplica_retencion_ica 'form{{strSufijo}}-aplica_retencion_icai' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_retencion_ica" > {{id_retencion_ica_Descripcion}}</td>
				
					<td class="elementotabla col_aplica_2do_impuesto" >{{{ getCheckBox aplica_2do_impuesto 'form{{strSufijo}}-aplica_2do_impuestoi' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_otro_impuesto" > {{id_otro_impuesto_Descripcion}}</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncuenta_pagar" idactualproveedor="{{id}}" title="Cuenta PagarS DE Proveedor" src="{{PATH_IMAGEN}}/Imagenes/cuenta_pagars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondocumento_proveedor" idactualproveedor="{{id}}" title="Documentos ProveedoresS DE Proveedor" src="{{PATH_IMAGEN}}/Imagenes/documento_proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionimagen_proveedor" idactualproveedor="{{id}}" title="Imagenes ProveedoresS DE Proveedor" src="{{PATH_IMAGEN}}/Imagenes/imagen_proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionlista_precio" idactualproveedor="{{id}}" title="Lista PreciosS DE Proveedor" src="{{PATH_IMAGEN}}/Imagenes/lista_precios.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionorden_compra" idactualproveedor="{{id}}" title="Orden CompraS DE Proveedor" src="{{PATH_IMAGEN}}/Imagenes/orden_compras.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionotro_suplidor" idactualproveedor="{{id}}" title="Otro SuplidorS DE Proveedor" src="{{PATH_IMAGEN}}/Imagenes/otro_suplidors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				{{/if}}

				<td style="display:none" class="actions"></td>

				</tr>
			{{/each}}
		{{/if}}

					</tbody>

				</table>

			</div>

		</form>
			
		<form id="frmTablaDatoscliente" name="frmTablaDatoscliente">
			<div id="divTablaDatosAuxiliarclientesAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count clientes}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulocliente" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Clientes</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosclientes" name="tblTablaDatosclientes" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Persona</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categorias Cliente<a onclick="jQuery('#form-id_categoria_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_cliente_img2" name="form{{strSufijo}}-id_categoria_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacategoria_cliente('id_categoria_cliente');"><img id="form{{strSufijo}}-id_categoria_cliente_img_busqueda2" name="form{{strSufijo}}-id_categoria_cliente_img_busqueda2" title="Buscar Categorias Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Precio<a onclick="jQuery('#form-id_tipo_precio_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_precio_img2" name="form{{strSufijo}}-id_tipo_precio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatipo_precio('id_tipo_precio');"><img id="form{{strSufijo}}-id_tipo_precio_img_busqueda2" name="form{{strSufijo}}-id_tipo_precio_img_busqueda2" title="Buscar Tipo Precio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Giro Negocio<a onclick="jQuery('#form-id_giro_negocio_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_giro_negocio_cliente_img2" name="form{{strSufijo}}-id_giro_negocio_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParagiro_negocio_cliente('id_giro_negocio_cliente');"><img id="form{{strSufijo}}-id_giro_negocio_cliente_img_busqueda2" name="form{{strSufijo}}-id_giro_negocio_cliente_img_busqueda2" title="Buscar Giro Negocio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contacto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Credito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Descuento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Anual</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_img2" name="form{{strSufijo}}-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form{{strSufijo}}-id_cuenta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Facturar Con</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Impuesto Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_img2" name="form{{strSufijo}}-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form{{strSufijo}}-id_impuesto_img_busqueda2" name="form{{strSufijo}}-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_img2" name="form{{strSufijo}}-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form{{strSufijo}}-id_retencion_img_busqueda2" name="form{{strSufijo}}-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Fuente<a onclick="jQuery('#form-id_retencion_fuente_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_fuente_img2" name="form{{strSufijo}}-id_retencion_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_fuente('id_retencion_fuente');"><img id="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" name="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" title="Buscar Retencion Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Ica</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ica<a onclick="jQuery('#form-id_retencion_ica_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_ica_img2" name="form{{strSufijo}}-id_retencion_ica_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_ica('id_retencion_ica');"><img id="form{{strSufijo}}-id_retencion_ica_img_busqueda2" name="form{{strSufijo}}-id_retencion_ica_img_busqueda2" title="Buscar Retencion Ica" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica 2do Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_img2" name="form{{strSufijo}}-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos ses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista s</pre></b>
			</th>

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
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:{{strPermisoRelaciones}}">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT</pre>
			</th>

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Persona</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Categorias Cliente<a onclick="jQuery('#form-id_categoria_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_cliente_img2" name="form{{strSufijo}}-id_categoria_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacategoria_cliente('id_categoria_cliente');"><img id="form{{strSufijo}}-id_categoria_cliente_img_busqueda2" name="form{{strSufijo}}-id_categoria_cliente_img_busqueda2" title="Buscar Categorias Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Precio<a onclick="jQuery('#form-id_tipo_precio_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_precio_img2" name="form{{strSufijo}}-id_tipo_precio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatipo_precio('id_tipo_precio');"><img id="form{{strSufijo}}-id_tipo_precio_img_busqueda2" name="form{{strSufijo}}-id_tipo_precio_img_busqueda2" title="Buscar Tipo Precio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Giro Negocio<a onclick="jQuery('#form-id_giro_negocio_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_giro_negocio_cliente_img2" name="form{{strSufijo}}-id_giro_negocio_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParagiro_negocio_cliente('id_giro_negocio_cliente');"><img id="form{{strSufijo}}-id_giro_negocio_cliente_img_busqueda2" name="form{{strSufijo}}-id_giro_negocio_cliente_img_busqueda2" title="Buscar Giro Negocio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Apellido</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Primer Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Segundo Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Completo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comentario</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Activo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Contacto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Credito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Maximo Descuento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Anual</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_img2" name="form{{strSufijo}}-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form{{strSufijo}}-id_cuenta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Facturar Con</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Impuesto Ventas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto<a onclick="jQuery('#form-id_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_impuesto_img2" name="form{{strSufijo}}-id_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaimpuesto('id_impuesto');"><img id="form{{strSufijo}}-id_impuesto_img_busqueda2" name="form{{strSufijo}}-id_impuesto_img_busqueda2" title="Buscar Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion<a onclick="jQuery('#form-id_retencion_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_img2" name="form{{strSufijo}}-id_retencion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion('id_retencion');"><img id="form{{strSufijo}}-id_retencion_img_busqueda2" name="form{{strSufijo}}-id_retencion_img_busqueda2" title="Buscar Retencion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Fuente<a onclick="jQuery('#form-id_retencion_fuente_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_fuente_img2" name="form{{strSufijo}}-id_retencion_fuente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_fuente('id_retencion_fuente');"><img id="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" name="form{{strSufijo}}-id_retencion_fuente_img_busqueda2" title="Buscar Retencion Fuente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica Retencion Ica</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Retencion Ica<a onclick="jQuery('#form-id_retencion_ica_img').trigger('click' );"><img id="form{{strSufijo}}-id_retencion_ica_img2" name="form{{strSufijo}}-id_retencion_ica_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaPararetencion_ica('id_retencion_ica');"><img id="form{{strSufijo}}-id_retencion_ica_img_busqueda2" name="form{{strSufijo}}-id_retencion_ica_img_busqueda2" title="Buscar Retencion Ica" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Aplica 2do Impuesto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Otro Impuesto<a onclick="jQuery('#form-id_otro_impuesto_img').trigger('click' );"><img id="form{{strSufijo}}-id_otro_impuesto_img2" name="form{{strSufijo}}-id_otro_impuesto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cliente_webcontrol1.abrirBusquedaParaotro_impuesto('id_otro_impuesto');"><img id="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" name="form{{strSufijo}}-id_otro_impuesto_img_busqueda2" title="Buscar Otro Impuesto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Documentos ses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista s</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist clientes)}}
			{{#each clientes}}

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
								<img class="imgseleccionarcliente" idactualcliente="{{id}}" title="SELECCIONAR Cliente ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablacliente" idactualcliente="{{id}}" title="ELIMINAR Cliente ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Cliente ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionescliente" idactualcliente="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				{{#if ../IS_DEVELOPING}}
				<td> {{id_empresa_Descripcion}}</td>
				{{/if}}
				<td class="elementotabla col_id_tipo_persona" > {{id_tipo_persona_Descripcion}}</td>
				<td class="elementotabla col_id_categoria_cliente" > {{id_categoria_cliente_Descripcion}}</td>
				<td class="elementotabla col_id_tipo_precio" > {{id_tipo_precio_Descripcion}}</td>
				<td class="elementotabla col_id_giro_negocio_cliente" > {{id_giro_negocio_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_codigo" > 
						{{ codigo }}
					</td>
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				
					<td class="elementotabla col_primer_apellido" > 
						{{ primer_apellido }}
					</td>
				
					<td class="elementotabla col_segundo_apellido" > 
						{{ segundo_apellido }}
					</td>
				
					<td class="elementotabla col_primer_nombre" > 
						{{ primer_nombre }}
					</td>
				
					<td class="elementotabla col_segundo_nombre" > 
						{{ segundo_nombre }}
					</td>
				
					<td class="elementotabla col_nombre_completo" > 
						{{ nombre_completo }}
					</td>
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				
					<td class="elementotabla col_telefono" > 
						{{ telefono }}
					</td>
				
					<td class="elementotabla col_telefono_movil" > 
						{{ telefono_movil }}
					</td>
				
					<td class="elementotabla col_e_mail" > 
						{{ e_mail }}
					</td>
				
					<td class="elementotabla col_e_mail2" > 
						{{ e_mail2 }}
					</td>
				
					<td class="elementotabla col_comentario" > 
						{{ comentario }}
					</td>
				
					<td class="elementotabla col_imagen" > 
						{{ imagen }}
					</td>
				
					<td class="elementotabla col_activo" >{{{ getCheckBox activo 'form{{strSufijo}}-activoi' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_pais" > {{id_pais_Descripcion}}</td>
				<td class="elementotabla col_id_provincia" > {{id_provincia_Descripcion}}</td>
				<td class="elementotabla col_id_ciudad" > {{id_ciudad_Descripcion}}</td>
				
					<td class="elementotabla col_codigo_postal" > 
						{{ codigo_postal }}
					</td>
				
					<td class="elementotabla col_fax" > 
						{{ fax }}
					</td>
				
					<td class="elementotabla col_contacto" > 
						{{ contacto }}
					</td>
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				
					<td class="elementotabla col_maximo_credito" > 
						{{ maximo_credito }}
					</td>
				
					<td class="elementotabla col_maximo_descuento" > 
						{{ maximo_descuento }}
					</td>
				
					<td class="elementotabla col_interes_anual" > 
						{{ interes_anual }}
					</td>
				
					<td class="elementotabla col_balance" > 
						{{ balance }}
					</td>
				<td class="elementotabla col_id_termino_pago_cliente" > {{id_termino_pago_cliente_Descripcion}}</td>
				<td class="elementotabla col_id_cuenta" > {{id_cuenta_Descripcion}}</td>
				
					<td class="elementotabla col_facturar_con" > 
						{{ facturar_con }}
					</td>
				
					<td class="elementotabla col_aplica_impuesto_ventas" >{{{ getCheckBox aplica_impuesto_ventas 'form{{strSufijo}}-aplica_impuesto_ventasi' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_impuesto" > {{id_impuesto_Descripcion}}</td>
				
					<td class="elementotabla col_aplica_retencion_impuesto" >{{{ getCheckBox aplica_retencion_impuesto 'form{{strSufijo}}-aplica_retencion_impuestoi' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_retencion" > {{id_retencion_Descripcion}}</td>
				
					<td class="elementotabla col_aplica_retencion_fuente" >{{{ getCheckBox aplica_retencion_fuente 'form{{strSufijo}}-aplica_retencion_fuentei' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_retencion_fuente" > {{id_retencion_fuente_Descripcion}}</td>
				
					<td class="elementotabla col_aplica_retencion_ica" >{{{ getCheckBox aplica_retencion_ica 'form{{strSufijo}}-aplica_retencion_icai' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_retencion_ica" > {{id_retencion_ica_Descripcion}}</td>
				
					<td class="elementotabla col_aplica_2do_impuesto" >{{{ getCheckBox aplica_2do_impuesto 'form{{strSufijo}}-aplica_2do_impuestoi' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_otro_impuesto" > {{id_otro_impuesto_Descripcion}}</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionconsignacion" idactualcliente="{{id}}" title="ConsignacionS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/consignacions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncuenta_cobrar" idactualcliente="{{id}}" title="Cuenta CobrarS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondevolucion_factura" idactualcliente="{{id}}" title="Devolucion FacturaS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/devolucion_facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondocumento_cliente" idactualcliente="{{id}}" title="Documentos ClientesS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/documento_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionestimado" idactualcliente="{{id}}" title="EstimadoS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/estimados.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionfactura" idactualcliente="{{id}}" title="FacturaS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionimagen_cliente" idactualcliente="{{id}}" title="Imagenes ClienteS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/imagen_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionlista_cliente" idactualcliente="{{id}}" title="Lista ClienteS DE Cliente" src="{{PATH_IMAGEN}}/Imagenes/lista_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				{{/if}}

				<td style="display:none" class="actions"></td>

				</tr>
			{{/each}}
		{{/if}}

					</tbody>

				</table>

			</div>

		</form>
			
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
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cedula</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Apellidos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombres</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Url</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Nacimiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Provincia<a onclick="jQuery('#form-id_provincia_img').trigger('click' );"><img id="form{{strSufijo}}-id_provincia_img2" name="form{{strSufijo}}-id_provincia_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaprovincia('id_provincia');"><img id="form{{strSufijo}}-id_provincia_img_busqueda2" name="form{{strSufijo}}-id_provincia_img_busqueda2" title="Buscar Provincia" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="dato_general_usuario_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cedula</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Apellidos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombres</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">E Mail</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Url</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Nacimiento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist dato_general_usuarios)}}
			{{#each dato_general_usuarios}}

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
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				<td class="elementotabla col_id_pais" > {{id_pais_Descripcion}}</td>
				<td class="elementotabla col_id_provincia" > {{id_provincia_Descripcion}}</td>
				<td class="elementotabla col_id_ciudad" > {{id_ciudad_Descripcion}}</td>
				
					<td class="elementotabla col_cedula" > 
						{{ cedula }}
					</td>
				
					<td class="elementotabla col_apellidos" > 
						{{ apellidos }}
					</td>
				
					<td class="elementotabla col_nombres" > 
						{{ nombres }}
					</td>
				
					<td class="elementotabla col_telefono" > 
						{{ telefono }}
					</td>
				
					<td class="elementotabla col_telefono_movil" > 
						{{ telefono_movil }}
					</td>
				
					<td class="elementotabla col_e_mail" > 
						{{ e_mail }}
					</td>
				
					<td class="elementotabla col_url" > 
						{{ url }}
					</td>
				
					<td class="elementotabla col_fecha_nacimiento" > 
						{{ fecha_nacimiento }}
					</td>
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
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

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Tributario (RUC)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Empresarial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion3</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Celular</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Correo Electronico</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sitio Web</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Barrio Distrito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Logo</pre>
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

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="sucursal_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Tributario (RUC)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Empresarial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion3</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Celular</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Correo Electronico</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sitio Web</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Barrio Distrito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Logo</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist sucursals)}}
			{{#each sucursals}}

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
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						{{ updated_at }}
					</td>
				{{#if ../IS_DEVELOPING}}
				<td> {{id_empresa_Descripcion}}</td>
				{{/if}}
				<td class="elementotabla col_id_pais" > {{id_pais_Descripcion}}</td>
				<td class="elementotabla col_id_ciudad" > {{id_ciudad_Descripcion}}</td>
				
					<td class="elementotabla col_nombre" > 
						{{ nombre }}
					</td>
				
					<td class="elementotabla col_registro_tributario" > 
						{{ registro_tributario }}
					</td>
				
					<td class="elementotabla col_registro_sucursalrial" > 
						{{ registro_sucursalrial }}
					</td>
				
					<td class="elementotabla col_direccion1" > 
						{{ direccion1 }}
					</td>
				
					<td class="elementotabla col_direccion2" > 
						{{ direccion2 }}
					</td>
				
					<td class="elementotabla col_direccion3" > 
						{{ direccion3 }}
					</td>
				
					<td class="elementotabla col_telefono1" > 
						{{ telefono1 }}
					</td>
				
					<td class="elementotabla col_celular" > 
						{{ celular }}
					</td>
				
					<td class="elementotabla col_correo_electronico" > 
						{{ correo_electronico }}
					</td>
				
					<td class="elementotabla col_sitio_web" > 
						{{ sitio_web }}
					</td>
				
					<td class="elementotabla col_codigo_postal" > 
						{{ codigo_postal }}
					</td>
				
					<td class="elementotabla col_fax" > 
						{{ fax }}
					</td>
				
					<td class="elementotabla col_barrio_distrito" > 
						{{ barrio_distrito }}
					</td>
				
					<td class="elementotabla col_logo" > 
						{{ logo }}
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
			
		<form id="frmTablaDatosempresa" name="frmTablaDatosempresa">
			<div id="divTablaDatosAuxiliarempresasAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count empresas}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloempresa" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Empresas</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosempresas" name="tblTablaDatosempresas" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="empresa_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="empresa_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">RUC</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Comercial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sector</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion3</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mail</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sitio Web</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Logo</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="empresa_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ciudad<a onclick="jQuery('#form-id_ciudad_img').trigger('click' );"><img id="form{{strSufijo}}-id_ciudad_img2" name="form{{strSufijo}}-id_ciudad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="empresa_webcontrol1.abrirBusquedaParaciudad('id_ciudad');"><img id="form{{strSufijo}}-id_ciudad_img_busqueda2" name="form{{strSufijo}}-id_ciudad_img_busqueda2" title="Buscar Ciudad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">RUC</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Comercial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sector</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion3</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono1</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mail</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sitio Web</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Postal</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fax</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Logo</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist empresas)}}
			{{#each empresas}}

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
								<img class="imgseleccionarempresa" idactualempresa="{{id}}" title="SELECCIONAR Empresa ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaempresa" idactualempresa="{{id}}" title="ELIMINAR Empresa ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Empresa ACTUAL" value="{{id}}"></input>
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
				<td class="elementotabla col_id_pais" > {{id_pais_Descripcion}}</td>
				<td class="elementotabla col_id_ciudad" > {{id_ciudad_Descripcion}}</td>
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				
					<td class="elementotabla col_nombre" > 
						{{ nombre }}
					</td>
				
					<td class="elementotabla col_nombre_comercial" > 
						{{ nombre_comercial }}
					</td>
				
					<td class="elementotabla col_sector" > 
						{{ sector }}
					</td>
				
					<td class="elementotabla col_direccion1" > 
						{{ direccion1 }}
					</td>
				
					<td class="elementotabla col_direccion2" > 
						{{ direccion2 }}
					</td>
				
					<td class="elementotabla col_direccion3" > 
						{{ direccion3 }}
					</td>
				
					<td class="elementotabla col_telefono1" > 
						{{ telefono1 }}
					</td>
				
					<td class="elementotabla col_movil" > 
						{{ movil }}
					</td>
				
					<td class="elementotabla col_mail" > 
						{{ mail }}
					</td>
				
					<td class="elementotabla col_sitio_web" > 
						{{ sitio_web }}
					</td>
				
					<td class="elementotabla col_codigo_postal" > 
						{{ codigo_postal }}
					</td>
				
					<td class="elementotabla col_fax" > 
						{{ fax }}
					</td>
				
					<td class="elementotabla col_logo" > 
						{{ logo }}
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
			
{{/each}}
				
				
	{{#if paraReporte}}			
			
				<table>
					<tr>
						<td>
							<input type="button" onclick="{{proceso_print}}" style="visibility:visible" value="Imprimir" />
						</td>
					</tr>
				</table>
	{{/if}}
	
</div>


</script>

