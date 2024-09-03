
<script id="moneda_datos_relaciones_template" type="text/x-handlebars-template">


<div id="divTablaDatosAuxiliarmonedasAjaxWebPart" style="width:100%;height:100%;overflow:auto;">

{{#each monedasReporte}}

			<table id="tablemoneda{{id}}" {{../strAuxStyleBackgroundTablaPrincipal}} width="{{../strTamanioTablaPrincipal}}" align="center" cellspacing="0" cellpadding="0" border="{{../borderValue}}">
						
				<tr>
					<td align="center" {{../strAuxStyleBackgroundTitulo}} >
						<p class="tituloficha">
							<b>{{strtoupper codigo}}</b>
						</p>
					</td>
				</tr>
			
				

			{{#if (existeCadenaArrayOrderBy 'Empresa' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Empresa</b>
								</td>
								<td>{{trim id_empresa_Descripcion}}
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

			{{#if (existeCadenaArrayOrderBy 'Simbolo' ../arrOrderBy ../bitParaReporteOrderBy) }}
				
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr {{../strAuxStyleBackgroundContenido}}>
								<td width="20%" {{../strAuxStyleBackgroundContenidoCabecera}} >
									<b>- Simbolo</b>
								</td>
								<td>{{trim simbolo}}
								</td>
							</tr>
						</table>
					</td>
				</tr>
			{{/if}}				
			</table>
			
			
		<form id="frmTablaDatosdevolucion_factura" name="frmTablaDatosdevolucion_factura">
			<div id="divTablaDatosAuxiliardevolucion_facturasAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count devolucion_facturas}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulodevolucion_factura" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Devolucion Facturas</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosdevolucion_facturas" name="tblTablaDatosdevolucion_facturas" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist devolucion_facturas)}}
			{{#each devolucion_facturas}}

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
								<img class="imgseleccionardevolucion_factura" idactualdevolucion_factura="{{id}}" title="SELECCIONAR Devolucion Factura ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartabladevolucion_factura" idactualdevolucion_factura="{{id}}" title="ELIMINAR Devolucion Factura ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Devolucion Factura ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesdevolucion_factura" idactualdevolucion_factura="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
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
				{{#if ../IS_DEVELOPING}}
				<td> {{id_sucursal_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_ejercicio_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_periodo_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_usuario_Descripcion}}</td>
				{{/if}}
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				<td class="elementotabla col_id_cliente" > {{id_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				
					<td class="elementotabla col_referencia_cliente" > 
						{{ referencia_cliente }}
					</td>
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				<td class="elementotabla col_id_termino_pago_cliente" > {{id_termino_pago_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				<td class="elementotabla col_id_moneda" > {{id_moneda_Descripcion}}</td>
				
					<td class="elementotabla col_cotizacion" > 
						{{ cotizacion }}
					</td>
				<td class="elementotabla col_id_estado" > {{id_estado_Descripcion}}</td>
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				
					<td class="elementotabla col_enviar_a" > 
						{{ enviar_a }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
					</td>
				
					<td class="elementotabla col_impuesto_en_precio" >{{{ getCheckBox impuesto_en_precio 'form{{strSufijo}}-impuesto_en_precioi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_monto" > 
						{{ retencion_fuente_monto }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_porciento" > 
						{{ retencion_fuente_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_iva_monto" > 
						{{ retencion_iva_monto }}
					</td>
				
					<td class="elementotabla col_retencion_iva_porciento" > 
						{{ retencion_iva_porciento }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondevolucion_factura_detalle" idactualdevolucion_factura="{{id}}" title="Devolucion Factura DetalleS DE Devolucion Factura" src="{{PATH_IMAGEN}}/Imagenes/devolucion_factura_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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
			
		<form id="frmTablaDatosdevolucion_factura_detalle" name="frmTablaDatosdevolucion_factura_detalle">
			<div id="divTablaDatosAuxiliardevolucion_factura_detallesAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count devolucion_factura_detalles}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulodevolucion_factura_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Devolucion Factura Detalles</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosdevolucion_factura_detalles" name="tblTablaDatosdevolucion_factura_detalles" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Devolucion Factura<a onclick="jQuery('#form-id_devolucion_factura_img').trigger('click' );"><img id="form{{strSufijo}}-id_devolucion_factura_img2" name="form{{strSufijo}}-id_devolucion_factura_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_detalle_webcontrol1.abrirBusquedaParadevolucion_factura('id_devolucion_factura');"><img id="form{{strSufijo}}-id_devolucion_factura_img_busqueda2" name="form{{strSufijo}}-id_devolucion_factura_img_busqueda2" title="Buscar Devolucion Factura" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_img2" name="form{{strSufijo}}-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form{{strSufijo}}-id_unidad_img_busqueda2" name="form{{strSufijo}}-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Recibidos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Devolucion Factura<a onclick="jQuery('#form-id_devolucion_factura_img').trigger('click' );"><img id="form{{strSufijo}}-id_devolucion_factura_img2" name="form{{strSufijo}}-id_devolucion_factura_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_detalle_webcontrol1.abrirBusquedaParadevolucion_factura('id_devolucion_factura');"><img id="form{{strSufijo}}-id_devolucion_factura_img_busqueda2" name="form{{strSufijo}}-id_devolucion_factura_img_busqueda2" title="Buscar Devolucion Factura" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_img2" name="form{{strSufijo}}-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_factura_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form{{strSufijo}}-id_unidad_img_busqueda2" name="form{{strSufijo}}-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Recibidos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist devolucion_factura_detalles)}}
			{{#each devolucion_factura_detalles}}

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
								<img class="imgseleccionardevolucion_factura_detalle" idactualdevolucion_factura_detalle="{{id}}" title="SELECCIONAR Devolucion Factura Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartabladevolucion_factura_detalle" idactualdevolucion_factura_detalle="{{id}}" title="ELIMINAR Devolucion Factura Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Devolucion Factura Detalle ACTUAL" value="{{id}}"></input>
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
				<td class="elementotabla col_id_devolucion_factura" > {{id_devolucion_factura_Descripcion}}</td>
				<td class="elementotabla col_id_bodega" > {{id_bodega_Descripcion}}</td>
				<td class="elementotabla col_id_producto" > {{id_producto_Descripcion}}</td>
				<td class="elementotabla col_id_unidad" > {{id_unidad_Descripcion}}</td>
				
					<td class="elementotabla col_cantidad" > 
						{{ cantidad }}
					</td>
				
					<td class="elementotabla col_precio" > 
						{{ precio }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>
				
					<td class="elementotabla col_recibido" > 
						{{ recibido }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
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
			
		<form id="frmTablaDatosfactura_lote" name="frmTablaDatosfactura_lote">
			<div id="divTablaDatosAuxiliarfactura_lotesAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count factura_lotes}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulofactura_lote" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Facturas Loteses</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosfactura_lotes" name="tblTablaDatosfactura_lotes" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_img2" name="form{{strSufijo}}-id_termino_pago_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago');"><img id="form{{strSufijo}}-id_termino_pago_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Factura Lote Detalles</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas Modeloses</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_img2" name="form{{strSufijo}}-id_termino_pago_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago');"><img id="form{{strSufijo}}-id_termino_pago_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Factura Lote Detalles</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas Modeloses</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist factura_lotes)}}
			{{#each factura_lotes}}

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
								<img class="imgseleccionarfactura_lote" idactualfactura_lote="{{id}}" title="SELECCIONAR Facturas Lotes ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablafactura_lote" idactualfactura_lote="{{id}}" title="ELIMINAR Facturas Lotes ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Facturas Lotes ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesfactura_lote" idactualfactura_lote="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
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
				{{#if ../IS_DEVELOPING}}
				<td> {{id_sucursal_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_ejercicio_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_periodo_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_usuario_Descripcion}}</td>
				{{/if}}
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				<td class="elementotabla col_id_cliente" > {{id_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				
					<td class="elementotabla col_referencia_cliente" > 
						{{ referencia_cliente }}
					</td>
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				<td class="elementotabla col_id_termino_pago" > {{id_termino_pago_Descripcion}}</td>
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				
					<td class="elementotabla col_cotizacion" > 
						{{ cotizacion }}
					</td>
				<td class="elementotabla col_id_moneda" > {{id_moneda_Descripcion}}</td>
				<td class="elementotabla col_id_estado" > {{id_estado_Descripcion}}</td>
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				
					<td class="elementotabla col_enviar_a" > 
						{{ enviar_a }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
					</td>
				
					<td class="elementotabla col_impuesto_en_precio" >{{{ getCheckBox impuesto_en_precio 'form{{strSufijo}}-impuesto_en_precioi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_monto" > 
						{{ retencion_fuente_monto }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_porciento" > 
						{{ retencion_fuente_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_iva_monto" > 
						{{ retencion_iva_monto }}
					</td>
				
					<td class="elementotabla col_retencion_iva_porciento" > 
						{{ retencion_iva_porciento }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionfactura_lote_detalle" idactualfactura_lote="{{id}}" title="Factura Lote DetalleS DE Facturas Lotes" src="{{PATH_IMAGEN}}/Imagenes/factura_lote_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionfactura_modelo" idactualfactura_lote="{{id}}" title="Facturas ModelosS DE Facturas Lotes" src="{{PATH_IMAGEN}}/Imagenes/factura_modelos.gif" alt="Seleccionar" border="" height="15" width="15">
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
			
		<form id="frmTablaDatosfactura_lote_detalle" name="frmTablaDatosfactura_lote_detalle">
			<div id="divTablaDatosAuxiliarfactura_lote_detallesAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count factura_lote_detalles}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulofactura_lote_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Factura Lote Detalles</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosfactura_lote_detalles" name="tblTablaDatosfactura_lote_detalles" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Factura Lote<a onclick="jQuery('#form-id_factura_lote_img').trigger('click' );"><img id="form{{strSufijo}}-id_factura_lote_img2" name="form{{strSufijo}}-id_factura_lote_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_detalle_webcontrol1.abrirBusquedaParafactura_lote('id_factura_lote');"><img id="form{{strSufijo}}-id_factura_lote_img_busqueda2" name="form{{strSufijo}}-id_factura_lote_img_busqueda2" title="Buscar Facturas Lotes" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_img2" name="form{{strSufijo}}-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form{{strSufijo}}-id_unidad_img_busqueda2" name="form{{strSufijo}}-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Porciento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Porciento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Recibidos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
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
				<pre class="cabecera_texto_titulo_tabla"> Factura Lote<a onclick="jQuery('#form-id_factura_lote_img').trigger('click' );"><img id="form{{strSufijo}}-id_factura_lote_img2" name="form{{strSufijo}}-id_factura_lote_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_detalle_webcontrol1.abrirBusquedaParafactura_lote('id_factura_lote');"><img id="form{{strSufijo}}-id_factura_lote_img_busqueda2" name="form{{strSufijo}}-id_factura_lote_img_busqueda2" title="Buscar Facturas Lotes" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_img2" name="form{{strSufijo}}-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form{{strSufijo}}-id_unidad_img_busqueda2" name="form{{strSufijo}}-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Porciento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Porciento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Recibidos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist factura_lote_detalles)}}
			{{#each factura_lote_detalles}}

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
								<img class="imgseleccionarfactura_lote_detalle" idactualfactura_lote_detalle="{{id}}" title="SELECCIONAR Factura Lote Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablafactura_lote_detalle" idactualfactura_lote_detalle="{{id}}" title="ELIMINAR Factura Lote Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Factura Lote Detalle ACTUAL" value="{{id}}"></input>
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
				<td class="elementotabla col_id_factura_lote" > {{id_factura_lote_Descripcion}}</td>
				<td class="elementotabla col_id_bodega" > {{id_bodega_Descripcion}}</td>
				<td class="elementotabla col_id_producto" > {{id_producto_Descripcion}}</td>
				<td class="elementotabla col_id_unidad" > {{id_unidad_Descripcion}}</td>
				
					<td class="elementotabla col_cantidad" > 
						{{ cantidad }}
					</td>
				
					<td class="elementotabla col_precio" > 
						{{ precio }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>
				
					<td class="elementotabla col_recibido" > 
						{{ recibido }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
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
			
		<form id="frmTablaDatosfactura_modelo" name="frmTablaDatosfactura_modelo">
			<div id="divTablaDatosAuxiliarfactura_modelosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count factura_modelos}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulofactura_modelo" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Facturas Modeloses</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosfactura_modelos" name="tblTablaDatosfactura_modelos" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Factura Lote<a onclick="jQuery('#form-id_factura_lote_img').trigger('click' );"><img id="form{{strSufijo}}-id_factura_lote_img2" name="form{{strSufijo}}-id_factura_lote_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_modelo_webcontrol1.abrirBusquedaParafactura_lote('id_factura_lote');"><img id="form{{strSufijo}}-id_factura_lote_img_busqueda2" name="form{{strSufijo}}-id_factura_lote_img_busqueda2" title="Buscar Facturas Lotes" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_modelo_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Marcado</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Factura Lote<a onclick="jQuery('#form-id_factura_lote_img').trigger('click' );"><img id="form{{strSufijo}}-id_factura_lote_img2" name="form{{strSufijo}}-id_factura_lote_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_modelo_webcontrol1.abrirBusquedaParafactura_lote('id_factura_lote');"><img id="form{{strSufijo}}-id_factura_lote_img_busqueda2" name="form{{strSufijo}}-id_factura_lote_img_busqueda2" title="Buscar Facturas Lotes" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_modelo_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Marcado</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist factura_modelos)}}
			{{#each factura_modelos}}

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
								<img class="imgseleccionarfactura_modelo" idactualfactura_modelo="{{id}}" title="SELECCIONAR Facturas Modelos ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablafactura_modelo" idactualfactura_modelo="{{id}}" title="ELIMINAR Facturas Modelos ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Facturas Modelos ACTUAL" value="{{id}}"></input>
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
				<td class="elementotabla col_id_factura_lote" > {{id_factura_lote_Descripcion}}</td>
				<td class="elementotabla col_id_cliente" > {{id_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_marcado" >{{{ getCheckBox marcado 'form{{strSufijo}}-marcadoi' ../paraReporte }}}
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
			
		<form id="frmTablaDatosestimado" name="frmTablaDatosestimado">
			<div id="divTablaDatosAuxiliarestimadosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count estimados}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloestimado" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Estimados</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosestimados" name="tblTablaDatosestimados" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ref. Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">F. Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">F. Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observaciones</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto en Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Genero Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ref. Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">F. Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">F. Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observaciones</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto en Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Genero Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes s</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist estimados)}}
			{{#each estimados}}

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
								<img class="imgseleccionarestimado" idactualestimado="{{id}}" title="SELECCIONAR Estimado ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaestimado" idactualestimado="{{id}}" title="ELIMINAR Estimado ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Estimado ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesestimado" idactualestimado="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
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
				{{#if ../IS_DEVELOPING}}
				<td> {{id_sucursal_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_ejercicio_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_periodo_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_usuario_Descripcion}}</td>
				{{/if}}
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				<td class="elementotabla col_id_cliente" > {{id_cliente_Descripcion}}</td>
				<td class="elementotabla col_id_proveedor" > {{id_proveedor_Descripcion}}</td>
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				
					<td class="elementotabla col_referencia_cliente" > 
						{{ referencia_cliente }}
					</td>
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				<td class="elementotabla col_id_termino_pago_cliente" > {{id_termino_pago_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				<td class="elementotabla col_id_moneda" > {{id_moneda_Descripcion}}</td>
				
					<td class="elementotabla col_cotizacion" > 
						{{ cotizacion }}
					</td>
				<td class="elementotabla col_id_estado" > {{id_estado_Descripcion}}</td>
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				
					<td class="elementotabla col_enviar_a" > 
						{{ enviar_a }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
					</td>
				
					<td class="elementotabla col_iva_en_precio" >{{{ getCheckBox iva_en_precio 'form{{strSufijo}}-iva_en_precioi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_genero_factura" >{{{ getCheckBox genero_factura 'form{{strSufijo}}-genero_facturai' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_monto" > 
						{{ retencion_fuente_monto }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_porciento" > 
						{{ retencion_fuente_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_iva_monto" > 
						{{ retencion_iva_monto }}
					</td>
				
					<td class="elementotabla col_retencion_iva_porciento" > 
						{{ retencion_iva_porciento }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionestimado_detalle" idactualestimado="{{id}}" title="Estimado DetalleS DE Estimado" src="{{PATH_IMAGEN}}/Imagenes/estimado_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionimagen_estimado" idactualestimado="{{id}}" title="Imagenes EstimadoS DE Estimado" src="{{PATH_IMAGEN}}/Imagenes/imagen_estimados.gif" alt="Seleccionar" border="" height="15" width="15">
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
			
		<form id="frmTablaDatosimagen_estimado" name="frmTablaDatosimagen_estimado">
			<div id="divTablaDatosAuxiliarimagen_estimadosAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count imagen_estimados}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloimagen_estimado" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Imagenes Estimados</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosimagen_estimados" name="tblTablaDatosimagen_estimados" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Estimado<a onclick="jQuery('#form-id_estimado_img').trigger('click' );"><img id="form{{strSufijo}}-id_estimado_img2" name="form{{strSufijo}}-id_estimado_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="imagen_estimado_webcontrol1.abrirBusquedaParaestimado('id_estimado');"><img id="form{{strSufijo}}-id_estimado_img_busqueda2" name="form{{strSufijo}}-id_estimado_img_busqueda2" title="Buscar Estimado" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
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
				<pre class="cabecera_texto_titulo_tabla"> Estimado<a onclick="jQuery('#form-id_estimado_img').trigger('click' );"><img id="form{{strSufijo}}-id_estimado_img2" name="form{{strSufijo}}-id_estimado_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="imagen_estimado_webcontrol1.abrirBusquedaParaestimado('id_estimado');"><img id="form{{strSufijo}}-id_estimado_img_busqueda2" name="form{{strSufijo}}-id_estimado_img_busqueda2" title="Buscar Estimado" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Imagen</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist imagen_estimados)}}
			{{#each imagen_estimados}}

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
								<img class="imgseleccionarimagen_estimado" idactualimagen_estimado="{{id}}" title="SELECCIONAR Imagenes Estimado ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaimagen_estimado" idactualimagen_estimado="{{id}}" title="ELIMINAR Imagenes Estimado ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Imagenes Estimado ACTUAL" value="{{id}}"></input>
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
				<td class="elementotabla col_id_estimado" > {{id_estimado_Descripcion}}</td>
				
					<td class="elementotabla col_imagen" > 
						{{ imagen }}
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
			
		<form id="frmTablaDatosestimado_detalle" name="frmTablaDatosestimado_detalle">
			<div id="divTablaDatosAuxiliarestimado_detallesAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count estimado_detalles}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloestimado_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Estimado Detalles</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosestimado_detalles" name="tblTablaDatosestimado_detalles" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Estimado<a onclick="jQuery('#form-id_estimado_img').trigger('click' );"><img id="form{{strSufijo}}-id_estimado_img2" name="form{{strSufijo}}-id_estimado_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_detalle_webcontrol1.abrirBusquedaParaestimado('id_estimado');"><img id="form{{strSufijo}}-id_estimado_img_busqueda2" name="form{{strSufijo}}-id_estimado_img_busqueda2" title="Buscar Estimado" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_img2" name="form{{strSufijo}}-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form{{strSufijo}}-id_unidad_img_busqueda2" name="form{{strSufijo}}-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Recibidos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Estimado<a onclick="jQuery('#form-id_estimado_img').trigger('click' );"><img id="form{{strSufijo}}-id_estimado_img2" name="form{{strSufijo}}-id_estimado_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_detalle_webcontrol1.abrirBusquedaParaestimado('id_estimado');"><img id="form{{strSufijo}}-id_estimado_img_busqueda2" name="form{{strSufijo}}-id_estimado_img_busqueda2" title="Buscar Estimado" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_img2" name="form{{strSufijo}}-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="estimado_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form{{strSufijo}}-id_unidad_img_busqueda2" name="form{{strSufijo}}-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Recibidos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist estimado_detalles)}}
			{{#each estimado_detalles}}

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
								<img class="imgseleccionarestimado_detalle" idactualestimado_detalle="{{id}}" title="SELECCIONAR Estimado Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaestimado_detalle" idactualestimado_detalle="{{id}}" title="ELIMINAR Estimado Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Estimado Detalle ACTUAL" value="{{id}}"></input>
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
				<td class="elementotabla col_id_estimado" > {{id_estimado_Descripcion}}</td>
				<td class="elementotabla col_id_bodega" > {{id_bodega_Descripcion}}</td>
				<td class="elementotabla col_id_producto" > {{id_producto_Descripcion}}</td>
				<td class="elementotabla col_id_unidad" > {{id_unidad_Descripcion}}</td>
				
					<td class="elementotabla col_cantidad" > 
						{{ cantidad }}
					</td>
				
					<td class="elementotabla col_precio" > 
						{{ precio }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>
				
					<td class="elementotabla col_recibido" > 
						{{ recibido }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
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
			
		<form id="frmTablaDatosdevolucion" name="frmTablaDatosdevolucion">
			<div id="divTablaDatosAuxiliardevolucionsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count devolucions}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulodevolucion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Devoluciones</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosdevolucions" name="tblTablaDatosdevolucions" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Envia</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Envia</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist devolucions)}}
			{{#each devolucions}}

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
								<img class="imgseleccionardevolucion" idactualdevolucion="{{id}}" title="SELECCIONAR Devolucion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartabladevolucion" idactualdevolucion="{{id}}" title="ELIMINAR Devolucion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Devolucion ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesdevolucion" idactualdevolucion="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
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
				{{#if ../IS_DEVELOPING}}
				<td> {{id_sucursal_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_ejercicio_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_periodo_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_usuario_Descripcion}}</td>
				{{/if}}
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				<td class="elementotabla col_id_proveedor" > {{id_proveedor_Descripcion}}</td>
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				<td class="elementotabla col_id_termino_pago_proveedor" > {{id_termino_pago_proveedor_Descripcion}}</td>
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				
					<td class="elementotabla col_cotizacion" > 
						{{ cotizacion }}
					</td>
				<td class="elementotabla col_id_moneda" > {{id_moneda_Descripcion}}</td>
				<td class="elementotabla col_id_estado" > {{id_estado_Descripcion}}</td>
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				
					<td class="elementotabla col_envia" > 
						{{ envia }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
					</td>
				
					<td class="elementotabla col_impuesto_en_precio" >{{{ getCheckBox impuesto_en_precio 'form{{strSufijo}}-impuesto_en_precioi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondevolucion_detalle" idactualdevolucion="{{id}}" title="Devolucion DetalleS DE Devolucion" src="{{PATH_IMAGEN}}/Imagenes/devolucion_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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
			
		<form id="frmTablaDatosdevolucion_detalle" name="frmTablaDatosdevolucion_detalle">
			<div id="divTablaDatosAuxiliardevolucion_detallesAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count devolucion_detalles}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulodevolucion_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Devolucion Detalles</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosdevolucion_detalles" name="tblTablaDatosdevolucion_detalles" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Devolucion<a onclick="jQuery('#form-id_devolucion_img').trigger('click' );"><img id="form{{strSufijo}}-id_devolucion_img2" name="form{{strSufijo}}-id_devolucion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_detalle_webcontrol1.abrirBusquedaParadevolucion('id_devolucion');"><img id="form{{strSufijo}}-id_devolucion_img_busqueda2" name="form{{strSufijo}}-id_devolucion_img_busqueda2" title="Buscar Devolucion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_img2" name="form{{strSufijo}}-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form{{strSufijo}}-id_unidad_img_busqueda2" name="form{{strSufijo}}-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Item</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Devolucion<a onclick="jQuery('#form-id_devolucion_img').trigger('click' );"><img id="form{{strSufijo}}-id_devolucion_img2" name="form{{strSufijo}}-id_devolucion_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_detalle_webcontrol1.abrirBusquedaParadevolucion('id_devolucion');"><img id="form{{strSufijo}}-id_devolucion_img_busqueda2" name="form{{strSufijo}}-id_devolucion_img_busqueda2" title="Buscar Devolucion" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_img2" name="form{{strSufijo}}-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="devolucion_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form{{strSufijo}}-id_unidad_img_busqueda2" name="form{{strSufijo}}-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">No Item</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist devolucion_detalles)}}
			{{#each devolucion_detalles}}

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
								<img class="imgseleccionardevolucion_detalle" idactualdevolucion_detalle="{{id}}" title="SELECCIONAR Devolucion Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartabladevolucion_detalle" idactualdevolucion_detalle="{{id}}" title="ELIMINAR Devolucion Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Devolucion Detalle ACTUAL" value="{{id}}"></input>
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
				<td class="elementotabla col_id_devolucion" > {{id_devolucion_Descripcion}}</td>
				<td class="elementotabla col_id_bodega" > {{id_bodega_Descripcion}}</td>
				<td class="elementotabla col_id_producto" > {{id_producto_Descripcion}}</td>
				<td class="elementotabla col_id_unidad" > {{id_unidad_Descripcion}}</td>
				
					<td class="elementotabla col_numero_item" > 
						{{ numero_item }}
					</td>
				
					<td class="elementotabla col_cantidad" > 
						{{ cantidad }}
					</td>
				
					<td class="elementotabla col_precio" > 
						{{ precio }}
					</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
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
			
		<form id="frmTablaDatosorden_compra" name="frmTablaDatosorden_compra">
			<div id="divTablaDatosAuxiliarorden_comprasAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count orden_compras}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloorden_compra" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Orden Compras</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosorden_compras" name="tblTablaDatosorden_compras" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Compras Detalles</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Compras Detalles</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist orden_compras)}}
			{{#each orden_compras}}

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
								<img class="imgseleccionarorden_compra" idactualorden_compra="{{id}}" title="SELECCIONAR Orden Compra ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaorden_compra" idactualorden_compra="{{id}}" title="ELIMINAR Orden Compra ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Orden Compra ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesorden_compra" idactualorden_compra="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
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
				{{#if ../IS_DEVELOPING}}
				<td> {{id_sucursal_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_ejercicio_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_periodo_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_usuario_Descripcion}}</td>
				{{/if}}
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				<td class="elementotabla col_id_proveedor" > {{id_proveedor_Descripcion}}</td>
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				<td class="elementotabla col_id_termino_pago_proveedor" > {{id_termino_pago_proveedor_Descripcion}}</td>
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				
					<td class="elementotabla col_cotizacion" > 
						{{ cotizacion }}
					</td>
				<td class="elementotabla col_id_moneda" > {{id_moneda_Descripcion}}</td>
				
					<td class="elementotabla col_impuesto_en_precio" >{{{ getCheckBox impuesto_en_precio 'form{{strSufijo}}-impuesto_en_precioi' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_estado" > {{id_estado_Descripcion}}</td>
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				
					<td class="elementotabla col_enviar" > 
						{{ enviar }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
					</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_monto" > 
						{{ retencion_fuente_monto }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_porciento" > 
						{{ retencion_fuente_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_iva_monto" > 
						{{ retencion_iva_monto }}
					</td>
				
					<td class="elementotabla col_retencion_iva_porciento" > 
						{{ retencion_iva_porciento }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionorden_compra_detalle" idactualorden_compra="{{id}}" title="Compras DetalleS DE Orden Compra" src="{{PATH_IMAGEN}}/Imagenes/orden_compra_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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
			
		<form id="frmTablaDatosorden_compra_detalle" name="frmTablaDatosorden_compra_detalle">
			<div id="divTablaDatosAuxiliarorden_compra_detallesAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count orden_compra_detalles}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloorden_compra_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Compras Detalles</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosorden_compra_detalles" name="tblTablaDatosorden_compra_detalles" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Orden Compra<a onclick="jQuery('#form-id_orden_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_orden_compra_img2" name="form{{strSufijo}}-id_orden_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaorden_compra('id_orden_compra');"><img id="form{{strSufijo}}-id_orden_compra_img_busqueda2" name="form{{strSufijo}}-id_orden_compra_img_busqueda2" title="Buscar Orden Compra" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_img2" name="form{{strSufijo}}-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form{{strSufijo}}-id_unidad_img_busqueda2" name="form{{strSufijo}}-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Recibido</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Orden Compra<a onclick="jQuery('#form-id_orden_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_orden_compra_img2" name="form{{strSufijo}}-id_orden_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaorden_compra('id_orden_compra');"><img id="form{{strSufijo}}-id_orden_compra_img_busqueda2" name="form{{strSufijo}}-id_orden_compra_img_busqueda2" title="Buscar Orden Compra" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Bodega<a onclick="jQuery('#form-id_bodega_img').trigger('click' );"><img id="form{{strSufijo}}-id_bodega_img2" name="form{{strSufijo}}-id_bodega_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParabodega('id_bodega');"><img id="form{{strSufijo}}-id_bodega_img_busqueda2" name="form{{strSufijo}}-id_bodega_img_busqueda2" title="Buscar Bodega" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Producto<a onclick="jQuery('#form-id_producto_img').trigger('click' );"><img id="form{{strSufijo}}-id_producto_img2" name="form{{strSufijo}}-id_producto_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaproducto('id_producto');"><img id="form{{strSufijo}}-id_producto_img_busqueda2" name="form{{strSufijo}}-id_producto_img_busqueda2" title="Buscar Producto" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Unidad<a onclick="jQuery('#form-id_unidad_img').trigger('click' );"><img id="form{{strSufijo}}-id_unidad_img2" name="form{{strSufijo}}-id_unidad_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="orden_compra_detalle_webcontrol1.abrirBusquedaParaunidad('id_unidad');"><img id="form{{strSufijo}}-id_unidad_img_busqueda2" name="form{{strSufijo}}-id_unidad_img_busqueda2" title="Buscar Unidad" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cantidad</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Recibido</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist orden_compra_detalles)}}
			{{#each orden_compra_detalles}}

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
								<img class="imgseleccionarorden_compra_detalle" idactualorden_compra_detalle="{{id}}" title="SELECCIONAR Compras Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaorden_compra_detalle" idactualorden_compra_detalle="{{id}}" title="ELIMINAR Compras Detalle ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Compras Detalle ACTUAL" value="{{id}}"></input>
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
				<td class="elementotabla col_id_orden_compra" > {{id_orden_compra_Descripcion}}</td>
				<td class="elementotabla col_id_bodega" > {{id_bodega_Descripcion}}</td>
				<td class="elementotabla col_id_producto" > {{id_producto_Descripcion}}</td>
				<td class="elementotabla col_id_unidad" > {{id_unidad_Descripcion}}</td>
				
					<td class="elementotabla col_cantidad" > 
						{{ cantidad }}
					</td>
				
					<td class="elementotabla col_precio" > 
						{{ precio }}
					</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
					</td>
				
					<td class="elementotabla col_recibido" > 
						{{ recibido }}
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
			
		<form id="frmTablaDatosfactura" name="frmTablaDatosfactura">
			<div id="divTablaDatosAuxiliarfacturasAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count facturas}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulofactura" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Facturas</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosfacturas" name="tblTablaDatosfacturas" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva en Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret. Fuente Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva en Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret. Fuente Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist facturas)}}
			{{#each facturas}}

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
								<img class="imgseleccionarfactura" idactualfactura="{{id}}" title="SELECCIONAR Factura ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablafactura" idactualfactura="{{id}}" title="ELIMINAR Factura ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Factura ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesfactura" idactualfactura="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
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
				{{#if ../IS_DEVELOPING}}
				<td> {{id_sucursal_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_ejercicio_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_periodo_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_usuario_Descripcion}}</td>
				{{/if}}
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				<td class="elementotabla col_id_cliente" > {{id_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				
					<td class="elementotabla col_referencia_cliente" > 
						{{ referencia_cliente }}
					</td>
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				<td class="elementotabla col_id_moneda" > {{id_moneda_Descripcion}}</td>
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				<td class="elementotabla col_id_termino_pago_cliente" > {{id_termino_pago_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				<td class="elementotabla col_id_estado" > {{id_estado_Descripcion}}</td>
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				
					<td class="elementotabla col_enviar_a" > 
						{{ enviar_a }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
					</td>
				
					<td class="elementotabla col_impuesto_en_precio" >{{{ getCheckBox impuesto_en_precio 'form{{strSufijo}}-impuesto_en_precioi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_monto" > 
						{{ retencion_fuente_monto }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_porciento" > 
						{{ retencion_fuente_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_iva_monto" > 
						{{ retencion_iva_monto }}
					</td>
				
					<td class="elementotabla col_retencion_iva_porciento" > 
						{{ retencion_iva_porciento }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionfactura_detalle" idactualfactura="{{id}}" title="Factura DetalleS DE Factura" src="{{PATH_IMAGEN}}/Imagenes/factura_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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
			
		<form id="frmTablaDatoscotizacion" name="frmTablaDatoscotizacion">
			<div id="divTablaDatosAuxiliarcotizacionsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count cotizacions}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulocotizacion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cotizaciones</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatoscotizacions" name="tblTablaDatoscotizacions" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Proveedores<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Proveedores<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cotizacion_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist cotizacions)}}
			{{#each cotizacions}}

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
								<img class="imgseleccionarcotizacion" idactualcotizacion="{{id}}" title="SELECCIONAR Cotizacion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablacotizacion" idactualcotizacion="{{id}}" title="ELIMINAR Cotizacion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Cotizacion ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionescotizacion" idactualcotizacion="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
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
				{{#if ../IS_DEVELOPING}}
				<td> {{id_sucursal_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_ejercicio_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_periodo_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_usuario_Descripcion}}</td>
				{{/if}}
				<td class="elementotabla col_id_proveedor" > {{id_proveedor_Descripcion}}</td>
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				<td class="elementotabla col_id_termino_pago_proveedor" > {{id_termino_pago_proveedor_Descripcion}}</td>
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				<td class="elementotabla col_id_moneda" > {{id_moneda_Descripcion}}</td>
				
					<td class="elementotabla col_cotizacion" > 
						{{ cotizacion }}
					</td>
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				
					<td class="elementotabla col_enviar" > 
						{{ enviar }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
					</td>
				<td class="elementotabla col_id_estado" > {{id_estado_Descripcion}}</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncotizacion_detalle" idactualcotizacion="{{id}}" title="Cotizacion DetalleS DE Cotizacion" src="{{PATH_IMAGEN}}/Imagenes/cotizacion_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
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
			
		<form id="frmTablaDatosparametro_general" name="frmTablaDatosparametro_general">
			<div id="divTablaDatosAuxiliarparametro_generalsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count parametro_generals}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloparametro_general" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Parametro Generales</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosparametro_generals" name="tblTablaDatosparametro_generals" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_modena_img').trigger('click' );"><img id="form{{strSufijo}}-id_modena_img2" name="form{{strSufijo}}-id_modena_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParamoneda('id_modena');"><img id="form{{strSufijo}}-id_modena_img_busqueda2" name="form{{strSufijo}}-id_modena_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Simbolo Moneda</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Decimales</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Fecha MDA</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Cantidad Coma</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Pais<a onclick="jQuery('#form-id_pais_img').trigger('click' );"><img id="form{{strSufijo}}-id_pais_img2" name="form{{strSufijo}}-id_pais_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParapais('id_pais');"><img id="form{{strSufijo}}-id_pais_img_busqueda2" name="form{{strSufijo}}-id_pais_img_busqueda2" title="Buscar Pais" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_modena_img').trigger('click' );"><img id="form{{strSufijo}}-id_modena_img2" name="form{{strSufijo}}-id_modena_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="parametro_general_webcontrol1.abrirBusquedaParamoneda('id_modena');"><img id="form{{strSufijo}}-id_modena_img_busqueda2" name="form{{strSufijo}}-id_modena_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Simbolo Moneda</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Decimales</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Fecha MDA</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Formato Cantidad Coma</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist parametro_generals)}}
			{{#each parametro_generals}}

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
								<img class="imgseleccionarparametro_general" idactualparametro_general="{{id}}" title="SELECCIONAR Parametro General ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaparametro_general" idactualparametro_general="{{id}}" title="ELIMINAR Parametro General ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Parametro General ACTUAL" value="{{id}}"></input>
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
				<td class="elementotabla col_id_modena" > {{id_modena_Descripcion}}</td>
				
					<td class="elementotabla col_simbolo_moneda" > 
						{{ simbolo_moneda }}
					</td>
				
					<td class="elementotabla col_numero_decimales" > 
						{{ numero_decimales }}
					</td>
				
					<td class="elementotabla col_con_formato_fecha_mda" >{{{ getCheckBox con_formato_fecha_mda 'form{{strSufijo}}-con_formato_fecha_mdai' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_con_formato_cantidad_coma" >{{{ getCheckBox con_formato_cantidad_coma 'form{{strSufijo}}-con_formato_cantidad_comai' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
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
			
		<form id="frmTablaDatosconsignacion" name="frmTablaDatosconsignacion">
			<div id="divTablaDatosAuxiliarconsignacionsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count consignacions}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTituloconsignacion" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Consignaciones</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosconsignacions" name="tblTablaDatosconsignacions" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Genero Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_cliente_img2" name="form{{strSufijo}}-id_termino_pago_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago_cliente');"><img id="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_cliente_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="consignacion_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Genero Factura</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descto %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>

		{{#if (If_Not_AND_Not bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre> Detalles</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist consignacions)}}
			{{#each consignacions}}

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
								<img class="imgseleccionarconsignacion" idactualconsignacion="{{id}}" title="SELECCIONAR Consignacion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablaconsignacion" idactualconsignacion="{{id}}" title="ELIMINAR Consignacion ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Consignacion ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesconsignacion" idactualconsignacion="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
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
				{{#if ../IS_DEVELOPING}}
				<td> {{id_sucursal_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_ejercicio_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_periodo_Descripcion}}</td>
				{{/if}}
				{{#if ../IS_DEVELOPING}}
				<td> {{id_usuario_Descripcion}}</td>
				{{/if}}
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				<td class="elementotabla col_id_cliente" > {{id_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				
					<td class="elementotabla col_referencia_cliente" > 
						{{ referencia_cliente }}
					</td>
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				<td class="elementotabla col_id_termino_pago_cliente" > {{id_termino_pago_cliente_Descripcion}}</td>
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				<td class="elementotabla col_id_moneda" > {{id_moneda_Descripcion}}</td>
				
					<td class="elementotabla col_cotizacion" > 
						{{ cotizacion }}
					</td>
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				
					<td class="elementotabla col_enviar_a" > 
						{{ enviar_a }}
					</td>
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
					</td>
				
					<td class="elementotabla col_impuesto_en_precio" >{{{ getCheckBox impuesto_en_precio 'form{{strSufijo}}-impuesto_en_precioi' ../paraReporte }}}
					</td>
				
					<td class="elementotabla col_genero_factura" >{{{ getCheckBox genero_factura 'form{{strSufijo}}-genero_facturai' ../paraReporte }}}
					</td>
				<td class="elementotabla col_id_estado" > {{id_estado_Descripcion}}</td>
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_monto" > 
						{{ retencion_fuente_monto }}
					</td>
				
					<td class="elementotabla col_retencion_fuente_porciento" > 
						{{ retencion_fuente_porciento }}
					</td>
				
					<td class="elementotabla col_retencion_iva_monto" > 
						{{ retencion_iva_monto }}
					</td>
				
					<td class="elementotabla col_retencion_iva_porciento" > 
						{{ retencion_iva_porciento }}
					</td>
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>

				{{#if (If_Not_AND_Not ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionconsignacion_detalle" idactualconsignacion="{{id}}" title="Consignacion DetalleS DE Consignacion" src="{{PATH_IMAGEN}}/Imagenes/consignacion_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionimagen_consignacion" idactualconsignacion="{{id}}" title="Imagenes ConsignacionS DE Consignacion" src="{{PATH_IMAGEN}}/Imagenes/imagen_consignacions.gif" alt="Seleccionar" border="" height="15" width="15">
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

