
<script id="cuenta_predefinida_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatoscuenta_predefinida" name="frmTablaDatoscuenta_predefinida">
			<div id="divTablaDatosAuxiliarcuenta_predefinidasAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count cuenta_predefinidas}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulocuenta_predefinida" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cuentas Predefinidases</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatoscuenta_predefinidas" name="tblTablaDatoscuenta_predefinidas" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_predefinida_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Cuenta Predefinida' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta Predefinida<a onclick="jQuery('#form-id_tipo_cuenta_predefinida_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_cuenta_predefinida_img2" name="form{{strSufijo}}-id_tipo_cuenta_predefinida_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_predefinida_webcontrol1.abrirBusquedaParatipo_cuenta_predefinida('id_tipo_cuenta_predefinida');"><img id="form{{strSufijo}}-id_tipo_cuenta_predefinida_img_busqueda2" name="form{{strSufijo}}-id_tipo_cuenta_predefinida_img_busqueda2" title="Buscar Tipo Cuenta" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Nivel Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Nivel Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Tabla' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Tabla</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto Minimo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Minimo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Retencion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Retencion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Balance' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Porcentaje Base' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Porcentaje Base</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Seleccionar' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Seleccionar</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Centro Costos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Centro Costos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Retencion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Usa Base' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usa Base</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nit' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nit</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Modifica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modifica</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ultima Transaccion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ultima Transaccion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comenta1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comenta2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta2</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_predefinida_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Cuenta Predefinida' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta Predefinida<a onclick="jQuery('#form-id_tipo_cuenta_predefinida_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_cuenta_predefinida_img2" name="form{{strSufijo}}-id_tipo_cuenta_predefinida_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_predefinida_webcontrol1.abrirBusquedaParatipo_cuenta_predefinida('id_tipo_cuenta_predefinida');"><img id="form{{strSufijo}}-id_tipo_cuenta_predefinida_img_busqueda2" name="form{{strSufijo}}-id_tipo_cuenta_predefinida_img_busqueda2" title="Buscar Tipo Cuenta" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Nivel Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Nivel Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Tabla' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Tabla</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto Minimo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Minimo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Valor Retencion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Valor Retencion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Balance' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Porcentaje Base' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Porcentaje Base</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Seleccionar' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Seleccionar</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Centro Costos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Centro Costos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Retencion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Retencion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Usa Base' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usa Base</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nit' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nit</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Modifica' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modifica</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ultima Transaccion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ultima Transaccion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comenta1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Comenta2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Comenta2</pre>
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

		{{#if (Is_List_Exist cuenta_predefinidasLocal)}}
			{{#each cuenta_predefinidasLocal}}

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
								<img class="imgseleccionarcuenta_predefinida" idactualcuenta_predefinida="{{id}}" title="SELECCIONAR Cuentas Predefinidas ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablacuenta_predefinida" idactualcuenta_predefinida="{{id}}" title="ELIMINAR Cuentas Predefinidas ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Cuentas Predefinidas ACTUAL" value="{{id}}"></input>
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

				{{#if (ValCol 'Tipo Cuenta Predefinida' ../paraReporte)}}
				<td class="elementotabla col_id_tipo_cuenta_predefinida" > {{id_tipo_cuenta_predefinida_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Tipo Cuenta' ../paraReporte)}}
				<td class="elementotabla col_id_tipo_cuenta" > {{id_tipo_cuenta_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Tipo Nivel Cuenta' ../paraReporte)}}
				<td class="elementotabla col_id_tipo_nivel_cuenta" > {{id_tipo_nivel_cuenta_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Codigo Tabla' ../paraReporte)}}
				
					<td class="elementotabla col_codigo_tabla" > 
						{{ codigo_tabla }}
					</td>
				{{/if}}

				{{#if (ValCol 'Codigo Cuenta' ../paraReporte)}}
				
					<td class="elementotabla col_codigo_cuenta" > 
						{{ codigo_cuenta }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Cuenta' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_cuenta" > 
						{{ nombre_cuenta }}
					</td>
				{{/if}}

				{{#if (ValCol 'Monto Minimo' ../paraReporte)}}
				
					<td class="elementotabla col_monto_minimo" > 
						{{ monto_minimo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Valor Retencion' ../paraReporte)}}
				
					<td class="elementotabla col_valor_retencion" > 
						{{ valor_retencion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Balance' ../paraReporte)}}
				
					<td class="elementotabla col_balance" > 
						{{ balance }}
					</td>
				{{/if}}

				{{#if (ValCol 'Porcentaje Base' ../paraReporte)}}
				
					<td class="elementotabla col_porcentaje_base" > 
						{{ porcentaje_base }}
					</td>
				{{/if}}

				{{#if (ValCol 'Seleccionar' ../paraReporte)}}
				
					<td class="elementotabla col_seleccionar" > 
						{{ seleccionar }}
					</td>
				{{/if}}

				{{#if (ValCol 'Centro Costos' ../paraReporte)}}
				
					<td class="elementotabla col_centro_costos" >{{{ getCheckBox centro_costos 'form{{strSufijo}}-centro_costosi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Retencion' ../paraReporte)}}
				
					<td class="elementotabla col_retencion" >{{{ getCheckBox retencion 'form{{strSufijo}}-retencioni' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Usa Base' ../paraReporte)}}
				
					<td class="elementotabla col_usa_base" >{{{ getCheckBox usa_base 'form{{strSufijo}}-usa_basei' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Nit' ../paraReporte)}}
				
					<td class="elementotabla col_nit" >{{{ getCheckBox nit 'form{{strSufijo}}-niti' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Modifica' ../paraReporte)}}
				
					<td class="elementotabla col_modifica" >{{{ getCheckBox modifica 'form{{strSufijo}}-modificai' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Ultima Transaccion' ../paraReporte)}}
				
					<td class="elementotabla col_ultima_transaccion" > 
						{{ ultima_transaccion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Comenta1' ../paraReporte)}}
				
					<td class="elementotabla col_comenta1" > 
						{{ comenta1 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Comenta2' ../paraReporte)}}
				
					<td class="elementotabla col_comenta2" > 
						{{ comenta2 }}
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

