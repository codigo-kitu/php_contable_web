
<script id="cheque_cuenta_corriente_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatoscheque_cuenta_corriente" name="frmTablaDatoscheque_cuenta_corriente">
			<div id="divTablaDatosAuxiliarcheque_cuenta_corrientesAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count cheque_cuenta_corrientes}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulocheque_cuenta_corriente" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cheques</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatoscheque_cuenta_corrientes" name="tblTablaDatoscheque_cuenta_corrientes" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Corriente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Corriente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_corriente_img2" name="form{{strSufijo}}-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" name="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Categoria Cheque' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Categoria Cheque<a onclick="jQuery('#form-id_categoria_cheque_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_cheque_img2" name="form{{strSufijo}}-id_categoria_cheque_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacategoria_cheque('id_categoria_cheque');"><img id="form{{strSufijo}}-id_categoria_cheque_img_busqueda2" name="form{{strSufijo}}-id_categoria_cheque_img_busqueda2" title="Buscar Categoria Cheque" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Beneficiario Ocacional' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Beneficiario Ocacional<a onclick="jQuery('#form-id_beneficiario_ocacional_cheque_img').trigger('click' );"><img id="form{{strSufijo}}-id_beneficiario_ocacional_cheque_img2" name="form{{strSufijo}}-id_beneficiario_ocacional_cheque_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParabeneficiario_ocacional_cheque('id_beneficiario_ocacional_cheque');"><img id="form{{strSufijo}}-id_beneficiario_ocacional_cheque_img_busqueda2" name="form{{strSufijo}}-id_beneficiario_ocacional_cheque_img_busqueda2" title="Buscar Beneficiario Ocacional" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Cheque' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cheque</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Emision' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto Texto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Texto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Saldo Actual' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo Actual</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cobrado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cobrado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impreso' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impreso</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Estado Deposito Retiro' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado Deposito Retiro<a onclick="jQuery('#form-id_estado_deposito_retiro_img').trigger('click' );"><img id="form{{strSufijo}}-id_estado_deposito_retiro_img2" name="form{{strSufijo}}-id_estado_deposito_retiro_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaestado_deposito_retiro('id_estado_deposito_retiro');"><img id="form{{strSufijo}}-id_estado_deposito_retiro_img_busqueda2" name="form{{strSufijo}}-id_estado_deposito_retiro_img_busqueda2" title="Buscar Estado Deposito Retiro Cheque" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
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
				<pre class="cabecera_texto_titulo_tabla"> Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta Corriente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Corriente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_corriente_img2" name="form{{strSufijo}}-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" name="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Categoria Cheque' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Categoria Cheque<a onclick="jQuery('#form-id_categoria_cheque_img').trigger('click' );"><img id="form{{strSufijo}}-id_categoria_cheque_img2" name="form{{strSufijo}}-id_categoria_cheque_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacategoria_cheque('id_categoria_cheque');"><img id="form{{strSufijo}}-id_categoria_cheque_img_busqueda2" name="form{{strSufijo}}-id_categoria_cheque_img_busqueda2" title="Buscar Categoria Cheque" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cliente_img2" name="form{{strSufijo}}-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form{{strSufijo}}-id_cliente_img_busqueda2" name="form{{strSufijo}}-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Beneficiario Ocacional' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Beneficiario Ocacional<a onclick="jQuery('#form-id_beneficiario_ocacional_cheque_img').trigger('click' );"><img id="form{{strSufijo}}-id_beneficiario_ocacional_cheque_img2" name="form{{strSufijo}}-id_beneficiario_ocacional_cheque_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParabeneficiario_ocacional_cheque('id_beneficiario_ocacional_cheque');"><img id="form{{strSufijo}}-id_beneficiario_ocacional_cheque_img_busqueda2" name="form{{strSufijo}}-id_beneficiario_ocacional_cheque_img_busqueda2" title="Buscar Beneficiario Ocacional" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero Cheque' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cheque</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Emision' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto Texto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Texto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Saldo Actual' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo Actual</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cobrado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cobrado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impreso' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impreso</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Estado Deposito Retiro' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado Deposito Retiro<a onclick="jQuery('#form-id_estado_deposito_retiro_img').trigger('click' );"><img id="form{{strSufijo}}-id_estado_deposito_retiro_img2" name="form{{strSufijo}}-id_estado_deposito_retiro_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cheque_cuenta_corriente_webcontrol1.abrirBusquedaParaestado_deposito_retiro('id_estado_deposito_retiro');"><img id="form{{strSufijo}}-id_estado_deposito_retiro_img_busqueda2" name="form{{strSufijo}}-id_estado_deposito_retiro_img_busqueda2" title="Buscar Estado Deposito Retiro Cheque" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
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

		{{#if (Is_List_Exist cheque_cuenta_corrientesLocal)}}
			{{#each cheque_cuenta_corrientesLocal}}

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
								<img class="imgseleccionarcheque_cuenta_corriente" idactualcheque_cuenta_corriente="{{id}}" title="SELECCIONAR Cheque ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablacheque_cuenta_corriente" idactualcheque_cuenta_corriente="{{id}}" title="ELIMINAR Cheque ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Cheque ACTUAL" value="{{id}}"></input>
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

				{{#if (ValCol ' Cuenta Corriente' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta_corriente" > {{id_cuenta_corriente_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Categoria Cheque' ../paraReporte)}}
				<td class="elementotabla col_id_categoria_cheque" > {{id_categoria_cheque_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Cliente' ../paraReporte)}}
				<td class="elementotabla col_id_cliente" > {{id_cliente_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Proveedor' ../paraReporte)}}
				<td class="elementotabla col_id_proveedor" > {{id_proveedor_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Beneficiario Ocacional' ../paraReporte)}}
				<td class="elementotabla col_id_beneficiario_ocacional_cheque" > {{id_beneficiario_ocacional_cheque_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Numero Cheque' ../paraReporte)}}
				
					<td class="elementotabla col_numero_cheque" > 
						{{ numero_cheque }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Emision' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				{{/if}}

				{{#if (ValCol 'Monto' ../paraReporte)}}
				
					<td class="elementotabla col_monto" > 
						{{ monto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Monto Texto' ../paraReporte)}}
				
					<td class="elementotabla col_monto_texto" > 
						{{ monto_texto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Saldo Actual' ../paraReporte)}}
				
					<td class="elementotabla col_saldo" > 
						{{ saldo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descripcion' ../paraReporte)}}
				
					<td class="elementotabla col_descripcion" > 
						{{ descripcion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cobrado' ../paraReporte)}}
				
					<td class="elementotabla col_cobrado" >{{{ getCheckBox cobrado 'form-cobradoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Impreso' ../paraReporte)}}
				
					<td class="elementotabla col_impreso" >{{{ getCheckBox impreso 'form-impresoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol ' Estado Deposito Retiro' ../paraReporte)}}
				<td class="elementotabla col_id_estado_deposito_retiro" > {{id_estado_deposito_retiro_Descripcion}}</td>
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

