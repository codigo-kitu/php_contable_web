
<script id="cuenta_pagar_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatoscuenta_pagar" name="frmTablaDatoscuenta_pagar">
			<div id="divTablaDatosAuxiliarcuenta_pagarsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count cuenta_pagars}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulocuenta_pagar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cuenta Pagars</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatoscuenta_pagars" name="tblTablaDatoscuenta_pagars" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Orden Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Orden Compra<a onclick="jQuery('#form-id_orden_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_orden_compra_img2" name="form{{strSufijo}}-id_orden_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParaorden_compra('id_orden_compra');"><img id="form{{strSufijo}}-id_orden_compra_img_busqueda2" name="form{{strSufijo}}-id_orden_compra_img_busqueda2" title="Buscar Orden Compra" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Termino Pago Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Pago Proveedor<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Emision' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Vence' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ultimo Mov.' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Mov.</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Saldo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo</pre>
			</th>
		{{/if}}

		{{#if (ValCol '% Interes' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">% Interes</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Estado Cuentas Pagar' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado Cuentas Pagar</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Credito s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Debito s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Pago s</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla"> Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Orden Compra' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Orden Compra<a onclick="jQuery('#form-id_orden_compra_img').trigger('click' );"><img id="form{{strSufijo}}-id_orden_compra_img2" name="form{{strSufijo}}-id_orden_compra_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParaorden_compra('id_orden_compra');"><img id="form{{strSufijo}}-id_orden_compra_img_busqueda2" name="form{{strSufijo}}-id_orden_compra_img_busqueda2" title="Buscar Orden Compra" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Termino Pago Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Pago Proveedor<a onclick="jQuery('#form-id_termino_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img2" name="form{{strSufijo}}-id_termino_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_pagar_webcontrol1.abrirBusquedaParatermino_pago_proveedor('id_termino_pago_proveedor');"><img id="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_termino_pago_proveedor_img_busqueda2" title="Buscar Terminos Pago Proveedores" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Emision' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Vence' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vence</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Ultimo Mov.' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Ultimo Mov.</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Saldo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo</pre>
			</th>
		{{/if}}

		{{#if (ValCol '% Interes' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">% Interes</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Estado Cuentas Pagar' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado Cuentas Pagar</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Credito s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Debito s</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Pago s</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist cuenta_pagarsLocal)}}
			{{#each cuenta_pagarsLocal}}

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
								<img class="imgseleccionarcuenta_pagar" idactualcuenta_pagar="{{id}}" title="SELECCIONAR Cuenta Pagar ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablacuenta_pagar" idactualcuenta_pagar="{{id}}" title="ELIMINAR Cuenta Pagar ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Cuenta Pagar ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionescuenta_pagar" idactualcuenta_pagar="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
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

				{{#if (ValCol ' Orden Compra' ../paraReporte)}}
				<td class="elementotabla col_id_orden_compra" > {{id_orden_compra_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Proveedor' ../paraReporte)}}
				<td class="elementotabla col_id_proveedor" > {{id_proveedor_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Termino Pago Proveedor' ../paraReporte)}}
				<td class="elementotabla col_id_termino_pago_proveedor" > {{id_termino_pago_proveedor_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Numero' ../paraReporte)}}
				
					<td class="elementotabla col_numero" > 
						{{ numero }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Emision' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Vence' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Ultimo Mov.' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_ultimo_movimiento" > 
						{{ fecha_ultimo_movimiento }}
					</td>
				{{/if}}

				{{#if (ValCol 'Monto' ../paraReporte)}}
				
					<td class="elementotabla col_monto" > 
						{{ monto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Saldo' ../paraReporte)}}
				
					<td class="elementotabla col_saldo" > 
						{{ saldo }}
					</td>
				{{/if}}

				{{#if (ValCol '% Interes' ../paraReporte)}}
				
					<td class="elementotabla col_porcentaje" > 
						{{ porcentaje }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descripcion' ../paraReporte)}}
				
					<td class="elementotabla col_descripcion" > 
						{{ descripcion }}
					</td>
				{{/if}}

				{{#if (ValCol ' Estado Cuentas Pagar' ../paraReporte)}}
				<td class="elementotabla col_id_estado_cuentas_pagar" > {{id_estado_cuentas_pagar_Descripcion}}</td>
				{{/if}}

				{{#if (If_Not_AND_Not_AND_Not ../paraReporte  ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncredito_cuenta_pagar" idactualcuenta_pagar="{{id}}" title="Credito Cuenta PagarS DE Cuenta Pagar" src="{{PATH_IMAGEN}}/Imagenes/credito_cuenta_pagars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondebito_cuenta_pagar" idactualcuenta_pagar="{{id}}" title="Debito Cuenta PagarS DE Cuenta Pagar" src="{{PATH_IMAGEN}}/Imagenes/debito_cuenta_pagars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionpago_cuenta_pagar" idactualcuenta_pagar="{{id}}" title="Pago Cuenta PagarS DE Cuenta Pagar" src="{{PATH_IMAGEN}}/Imagenes/pago_cuenta_pagars.gif" alt="Seleccionar" border="" height="15" width="15">
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

