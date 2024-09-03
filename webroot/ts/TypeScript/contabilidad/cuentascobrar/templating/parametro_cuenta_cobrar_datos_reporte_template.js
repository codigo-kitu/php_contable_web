
<script id="parametro_cuenta_cobrar_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosparametro_cuenta_cobrar" name="frmTablaDatosparametro_cuenta_cobrar">
			<div id="divTablaDatosAuxiliarparametro_cuenta_cobrarsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count parametro_cuenta_cobrars}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloparametro_cuenta_cobrar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Cuentas Cobrars</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosparametro_cuenta_cobrars" name="tblTablaDatosparametro_cuenta_cobrars" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Cuenta Cobrar' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cuenta Cobrar</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Debito' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Debito</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Credito' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Credito</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Pago</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Mostrar Anulado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Anulado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cliente</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Cliente Inactivo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Cliente Inactivo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Registro Tributario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Registro Tributario</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Cuenta Cobrar' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cuenta Cobrar</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Debito' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Debito</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Credito' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Credito</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Pago</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Mostrar Anulado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Mostrar Anulado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cliente</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Cliente Inactivo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Cliente Inactivo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Registro Tributario' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Registro Tributario</pre>
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

		{{#if (Is_List_Exist parametro_cuenta_cobrarsLocal)}}
			{{#each parametro_cuenta_cobrarsLocal}}

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
								<img class="imgseleccionarparametro_cuenta_cobrar" idactualparametro_cuenta_cobrar="{{id}}" title="SELECCIONAR Parametro Cuentas Cobrar ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaparametro_cuenta_cobrar" idactualparametro_cuenta_cobrar="{{id}}" title="ELIMINAR Parametro Cuentas Cobrar ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro Cuentas Cobrar ACTUAL" value="{{id}}"></input>
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
				<td> {{id_empresa_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Numero Cuenta Cobrar' ../paraReporte)}}
				
					<td class="elementotabla col_numero_cuenta_cobrar" > 
						{{ numero_cuenta_cobrar }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Debito' ../paraReporte)}}
				
					<td class="elementotabla col_numero_debito" > 
						{{ numero_debito }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Credito' ../paraReporte)}}
				
					<td class="elementotabla col_numero_credito" > 
						{{ numero_credito }}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Pago' ../paraReporte)}}
				
					<td class="elementotabla col_numero_pago" > 
						{{ numero_pago }}
					</td>
				{{/if}}

				{{#if (ValCol 'Mostrar Anulado' ../paraReporte)}}
				
					<td class="elementotabla col_mostrar_anulado" >{{{ getCheckBox mostrar_anulado 'form-mostrar_anuladoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Numero Cliente' ../paraReporte)}}
				
					<td class="elementotabla col_numero_cliente" > 
						{{ numero_cliente }}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Cliente Inactivo' ../paraReporte)}}
				
					<td class="elementotabla col_con_cliente_inactivo" >{{{ getCheckBox con_cliente_inactivo 'form-con_cliente_inactivoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Registro Tributario' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_registro_tributario" > 
						{{ nombre_registro_tributario }}
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

