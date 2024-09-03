
<script id="termino_pago_cliente_datos_general_template" type="text/x-handlebars-template">



		<form id="frmTablaDatostermino_pago_cliente" name="frmTablaDatostermino_pago_cliente">
			<div id="divTablaDatosAuxiliartermino_pago_clientesAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count termino_pago_clientes}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulotermino_pago_cliente" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Terminos Pago Clientes</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatostermino_pago_clientes" name="tblTablaDatostermino_pago_clientes" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Termino Pago<a onclick="jQuery('#form-id_tipo_termino_pago_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_termino_pago_img2" name="form{{strSufijo}}-id_tipo_termino_pago_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParatipo_termino_pago('id_tipo_termino_pago');"><img id="form{{strSufijo}}-id_tipo_termino_pago_img_busqueda2" name="form{{strSufijo}}-id_tipo_termino_pago_img_busqueda2" title="Buscar Tipo Termino Pago" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuotas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Pronto Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_img2" name="form{{strSufijo}}-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form{{strSufijo}}-id_cuenta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Debito Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas LotesID_TERMINO_PAGOes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Facturacions</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Termino Pago<a onclick="jQuery('#form-id_tipo_termino_pago_img').trigger('click' );"><img id="form{{strSufijo}}-id_tipo_termino_pago_img2" name="form{{strSufijo}}-id_tipo_termino_pago_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParatipo_termino_pago('id_tipo_termino_pago');"><img id="form{{strSufijo}}-id_tipo_termino_pago_img_busqueda2" name="form{{strSufijo}}-id_tipo_termino_pago_img_busqueda2" title="Buscar Tipo Termino Pago" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuotas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Pronto Pago</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Predeterminado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_img2" name="form{{strSufijo}}-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="termino_pago_cliente_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form{{strSufijo}}-id_cuenta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Consignaciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Debito Cuenta Cobrars</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Estimados</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas LotesID_TERMINO_PAGOes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Parametro Facturacions</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist termino_pago_clientesLocal)}}
			{{#each termino_pago_clientesLocal}}

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
								<img class="imgseleccionartermino_pago_cliente" idactualtermino_pago_cliente="{{id}}" title="SELECCIONAR Terminos Pago Cliente ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablatermino_pago_cliente" idactualtermino_pago_cliente="{{id}}" title="ELIMINAR Terminos Pago Cliente ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Terminos Pago Cliente ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionestermino_pago_cliente" idactualtermino_pago_cliente="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
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
				<td class="elementotabla col_id_tipo_termino_pago" > {{id_tipo_termino_pago_Descripcion}}</td>
				
					<td class="elementotabla col_codigo" > 
						{{ codigo }}
					</td>
				
					<td class="elementotabla col_descripcion" > 
						{{ descripcion }}
					</td>
				
					<td class="elementotabla col_monto" > 
						{{ monto }}
					</td>
				
					<td class="elementotabla col_dias" > 
						{{ dias }}
					</td>
				
					<td class="elementotabla col_inicial" > 
						{{ inicial }}
					</td>
				
					<td class="elementotabla col_cuotas" > 
						{{ cuotas }}
					</td>
				
					<td class="elementotabla col_descuento_pronto_pago" > 
						{{ descuento_pronto_pago }}
					</td>
				
					<td class="elementotabla col_predeterminado" >{{{ getCheckBox predeterminado 'form{{strSufijo}}-predeterminadoi' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_cuenta" > {{id_cuenta_Descripcion}}</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncliente" idactualtermino_pago_cliente="{{id}}" title="ClienteS DE Terminos Pago Cliente" src="{{PATH_IMAGEN}}/Imagenes/clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionconsignacion" idactualtermino_pago_cliente="{{id}}" title="ConsignacionS DE Terminos Pago Cliente" src="{{PATH_IMAGEN}}/Imagenes/consignacions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncuenta_cobrar" idactualtermino_pago_cliente="{{id}}" title="Cuenta CobrarS DE Terminos Pago Cliente" src="{{PATH_IMAGEN}}/Imagenes/cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondebito_cuenta_cobrar" idactualtermino_pago_cliente="{{id}}" title="Debito Cuenta CobrarS DE Terminos Pago Cliente" src="{{PATH_IMAGEN}}/Imagenes/debito_cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondevolucion_factura" idactualtermino_pago_cliente="{{id}}" title="Devolucion FacturaS DE Terminos Pago Cliente" src="{{PATH_IMAGEN}}/Imagenes/devolucion_facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionestimado" idactualtermino_pago_cliente="{{id}}" title="EstimadoS DE Terminos Pago Cliente" src="{{PATH_IMAGEN}}/Imagenes/estimados.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionfactura_loteid_termino_pago" idactualtermino_pago_cliente="{{id}}" title="Facturas LotesS DE Terminos Pago Cliente" src="{{PATH_IMAGEN}}/Imagenes/factura_lotes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionfactura" idactualtermino_pago_cliente="{{id}}" title="FacturaS DE Terminos Pago Cliente" src="{{PATH_IMAGEN}}/Imagenes/facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionparametro_facturacion" idactualtermino_pago_cliente="{{id}}" title="Parametro FacturacionS DE Terminos Pago Cliente" src="{{PATH_IMAGEN}}/Imagenes/parametro_facturacions.gif" alt="Seleccionar" border="" height="15" width="15">
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


</script>

