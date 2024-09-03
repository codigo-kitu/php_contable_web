
<script id="instrumento_pago_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosinstrumento_pago" name="frmTablaDatosinstrumento_pago">
			<div id="divTablaDatosAuxiliarinstrumento_pagosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count instrumento_pagos}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloinstrumento_pago" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Instrumento Pagos</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosinstrumento_pagos" name="tblTablaDatosinstrumento_pagos" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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

		{{#if (ValCol 'Codigo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Predeterminado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compras<a onclick="jQuery('#form-id_cuenta_compras_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_compras_img2" name="form{{strSufijo}}-id_cuenta_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compras');"><img id="form{{strSufijo}}-id_cuenta_compras_img_busqueda2" name="form{{strSufijo}}-id_cuenta_compras_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Ventas<a onclick="jQuery('#form-id_cuenta_ventas_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_ventas_img2" name="form{{strSufijo}}-id_cuenta_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta('id_cuenta_ventas');"><img id="form{{strSufijo}}-id_cuenta_ventas_img_busqueda2" name="form{{strSufijo}}-id_cuenta_ventas_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Contable Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Contable Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_corriente_img2" name="form{{strSufijo}}-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" name="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
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

		{{#if (ValCol 'Codigo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Predeterminado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Compras' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Compras<a onclick="jQuery('#form-id_cuenta_compras_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_compras_img2" name="form{{strSufijo}}-id_cuenta_compras_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta('id_cuenta_compras');"><img id="form{{strSufijo}}-id_cuenta_compras_img_busqueda2" name="form{{strSufijo}}-id_cuenta_compras_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Ventas<a onclick="jQuery('#form-id_cuenta_ventas_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_ventas_img2" name="form{{strSufijo}}-id_cuenta_ventas_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta('id_cuenta_ventas');"><img id="form{{strSufijo}}-id_cuenta_ventas_img_busqueda2" name="form{{strSufijo}}-id_cuenta_ventas_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Contable Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Compra</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Contable Ventas' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Contable Ventas</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_corriente_img2" name="form{{strSufijo}}-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="instrumento_pago_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" name="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
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

		{{#if (Is_List_Exist instrumento_pagosLocal)}}
			{{#each instrumento_pagosLocal}}

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
								<img class="imgseleccionarinstrumento_pago" idactualinstrumento_pago="{{id}}" title="SELECCIONAR Instrumento Pago ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablainstrumento_pago" idactualinstrumento_pago="{{id}}" title="ELIMINAR Instrumento Pago ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Instrumento Pago ACTUAL" value="{{id}}"></input>
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

				{{#if (ValCol 'Codigo' ../paraReporte)}}
				
					<td class="elementotabla col_codigo" > 
						{{ codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descripcion' ../paraReporte)}}
				
					<td class="elementotabla col_descripcion" > 
						{{ descripcion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Predeterminado' ../paraReporte)}}
				
					<td class="elementotabla col_predeterminado" > 
						{{ predeterminado }}
					</td>
				{{/if}}

				{{#if (ValCol ' Cuenta Compras' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta_compras" > {{id_cuenta_compras_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Cuenta Ventas' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta_ventas" > {{id_cuenta_ventas_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Cuenta Contable Compra' ../paraReporte)}}
				
					<td class="elementotabla col_cuenta_contable_compra" > 
						{{ cuenta_contable_compra }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cuenta Contable Ventas' ../paraReporte)}}
				
					<td class="elementotabla col_cuenta_contable_ventas" > 
						{{ cuenta_contable_ventas }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cuenta Cliente' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta_corriente" > {{id_cuenta_corriente_Descripcion}}</td>
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

