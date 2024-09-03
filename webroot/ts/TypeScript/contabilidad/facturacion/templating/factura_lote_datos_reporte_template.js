
<script id="factura_lote_datos_reporte_template" type="text/x-handlebars-template">



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

		{{#if (ValCol 'Numero' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ruc' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Referencia Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Emision' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Vendedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Terminos Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_img2" name="form{{strSufijo}}-id_termino_pago_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago');"><img id="form{{strSufijo}}-id_termino_pago_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Vence' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cotizacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Moneda' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Estado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Enviar a' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Observacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto En Precio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Sub Total' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descuento Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descuento %' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Iva Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Iva %' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ret.Fuente Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ret.Fuente %' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ret.Iva Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ret.Iva %' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Total' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
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

		{{#if (ValCol 'Numero' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ruc' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Referencia Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Cliente</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Emision' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Vendedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Vendedor<a onclick="jQuery('#form-id_vendedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_vendedor_img2" name="form{{strSufijo}}-id_vendedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParavendedor('id_vendedor');"><img id="form{{strSufijo}}-id_vendedor_img_busqueda2" name="form{{strSufijo}}-id_vendedor_img_busqueda2" title="Buscar Vendedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Terminos Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Terminos Pago<a onclick="jQuery('#form-id_termino_pago_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_img2" name="form{{strSufijo}}-id_termino_pago_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParatermino_pago_cliente('id_termino_pago');"><img id="form{{strSufijo}}-id_termino_pago_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_img_busqueda2" title="Buscar Terminos Pago Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Vence' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cotizacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cotizacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Moneda' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda<a onclick="jQuery('#form-id_moneda_img').trigger('click' );"><img id="form{{strSufijo}}-id_moneda_img2" name="form{{strSufijo}}-id_moneda_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="factura_lote_webcontrol1.abrirBusquedaParamoneda('id_moneda');"><img id="form{{strSufijo}}-id_moneda_img_busqueda2" name="form{{strSufijo}}-id_moneda_img_busqueda2" title="Buscar Moneda" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Estado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Direccion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Enviar a' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Enviar a</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Observacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto En Precio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto En Precio</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Sub Total' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sub Total</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descuento Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descuento %' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descuento %</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Iva Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Iva %' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Iva %</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ret.Fuente Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ret.Fuente %' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Fuente %</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ret.Iva Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ret.Iva %' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ret.Iva %</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Total' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Total</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
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
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist factura_lotesLocal)}}
			{{#each factura_lotesLocal}}

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
				{{/if}}
				{{#if (If_Not ../paraReporte)}}
				
					<td class="elementotabla col_version_row"  style="display:none"> 
						{{ versionRow }}
					</td>
				{{/if}}
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

				{{#if (ValCol 'Numero' ../paraReporte)}}
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cliente' ../paraReporte)}}
				<td class="elementotabla col_id_cliente" > {{id_cliente_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Ruc' ../paraReporte)}}
				
					<td class="elementotabla col_ruc" > 
						{{ ruc }}
					</td>
				{{/if}}

				{{#if (ValCol 'Referencia Cliente' ../paraReporte)}}
				
					<td class="elementotabla col_referencia_cliente" > 
						{{ referencia_cliente }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Emision' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				{{/if}}

				{{#if (ValCol 'Vendedor' ../paraReporte)}}
				<td class="elementotabla col_id_vendedor" > {{id_vendedor_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Terminos Pago' ../paraReporte)}}
				<td class="elementotabla col_id_termino_pago" > {{id_termino_pago_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Fecha Vence' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cotizacion' ../paraReporte)}}
				
					<td class="elementotabla col_cotizacion" > 
						{{ cotizacion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Moneda' ../paraReporte)}}
				<td class="elementotabla col_id_moneda" > {{id_moneda_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Estado' ../paraReporte)}}
				<td class="elementotabla col_id_estado" > {{id_estado_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Direccion' ../paraReporte)}}
				
					<td class="elementotabla col_direccion" > 
						{{ direccion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Enviar a' ../paraReporte)}}
				
					<td class="elementotabla col_enviar_a" > 
						{{ enviar_a }}
					</td>
				{{/if}}

				{{#if (ValCol 'Observacion' ../paraReporte)}}
				
					<td class="elementotabla col_observacion" > 
						{{ observacion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Impuesto En Precio' ../paraReporte)}}
				
					<td class="elementotabla col_impuesto_en_precio" >{{{ getCheckBox impuesto_en_precio 'form-impuesto_en_precioi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Sub Total' ../paraReporte)}}
				
					<td class="elementotabla col_sub_total" > 
						{{ sub_total }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descuento Monto' ../paraReporte)}}
				
					<td class="elementotabla col_descuento_monto" > 
						{{ descuento_monto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descuento %' ../paraReporte)}}
				
					<td class="elementotabla col_descuento_porciento" > 
						{{ descuento_porciento }}
					</td>
				{{/if}}

				{{#if (ValCol 'Iva Monto' ../paraReporte)}}
				
					<td class="elementotabla col_iva_monto" > 
						{{ iva_monto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Iva %' ../paraReporte)}}
				
					<td class="elementotabla col_iva_porciento" > 
						{{ iva_porciento }}
					</td>
				{{/if}}

				{{#if (ValCol 'Ret.Fuente Monto' ../paraReporte)}}
				
					<td class="elementotabla col_retencion_fuente_monto" > 
						{{ retencion_fuente_monto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Ret.Fuente %' ../paraReporte)}}
				
					<td class="elementotabla col_retencion_fuente_porciento" > 
						{{ retencion_fuente_porciento }}
					</td>
				{{/if}}

				{{#if (ValCol 'Ret.Iva Monto' ../paraReporte)}}
				
					<td class="elementotabla col_retencion_iva_monto" > 
						{{ retencion_iva_monto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Ret.Iva %' ../paraReporte)}}
				
					<td class="elementotabla col_retencion_iva_porciento" > 
						{{ retencion_iva_porciento }}
					</td>
				{{/if}}

				{{#if (ValCol 'Total' ../paraReporte)}}
				
					<td class="elementotabla col_total" > 
						{{ total }}
					</td>
				{{/if}}

				{{#if (If_Not_AND_Not_AND_Not ../paraReporte  ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
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

