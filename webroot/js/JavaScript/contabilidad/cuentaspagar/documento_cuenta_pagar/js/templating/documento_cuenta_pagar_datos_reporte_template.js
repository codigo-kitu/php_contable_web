
<script id="documento_cuenta_pagar_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatosdocumento_cuenta_pagar" name="frmTablaDatosdocumento_cuenta_pagar">
			<div id="divTablaDatosAuxiliardocumento_cuenta_pagarsAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count documento_cuenta_pagars}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulodocumento_cuenta_pagar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Documentos Cuentas por Pagares</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatosdocumento_cuenta_pagars" name="tblTablaDatosdocumento_cuenta_pagars" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Emision' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto Parcial' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Parcial</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Moneda' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Vencimiento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vencimiento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro De Pagos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro De Pagos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Balance' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Balance Mon' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance Mon</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Documento Pagado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Pagado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Id Pagado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Pagado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Modulo Origen' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Origen</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Origen' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Origen</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Modulo Destino' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Destino</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Destino' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Destino</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Pc' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Pc</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Hora' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Hora</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto Mora' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Mora</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Interes Mora' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Mora</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Dias Gracia Mora' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias Gracia Mora</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Instrumento Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Instrumento Pago</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Cambio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cambio</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Documento Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Proveedor</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Clase Registro' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Clase Registro</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Estado Registro' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado Registro</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Motivo Anulacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Motivo Anulacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto 1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto 2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto Incluido' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto Incluido</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Observaciones' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observaciones</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Grupo Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Pago</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Termino Idpv' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Idpv</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Forma Pago Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Forma Pago Proveedor<a onclick="jQuery('#form-id_forma_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_forma_pago_proveedor_img2" name="form{{strSufijo}}-id_forma_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParaforma_pago_proveedor('id_forma_pago_proveedor');"><img id="form{{strSufijo}}-id_forma_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_forma_pago_proveedor_img_busqueda2" title="Buscar Forma Pago Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Pago</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Referencia Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Pago</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Hora' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Hora</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Id Base' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Base</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_corriente_img2" name="form{{strSufijo}}-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" name="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Devoluciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal<a onclick="jQuery('#form-id_sucursal_img').trigger('click' );"><img id="form{{strSufijo}}-id_sucursal_img2" name="form{{strSufijo}}-id_sucursal_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParasucursal('id_sucursal');"><img id="form{{strSufijo}}-id_sucursal_img_busqueda2" name="form{{strSufijo}}-id_sucursal_img_busqueda2" title="Buscar Sucursal" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form{{strSufijo}}-id_ejercicio_img2" name="form{{strSufijo}}-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form{{strSufijo}}-id_ejercicio_img_busqueda2" name="form{{strSufijo}}-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form{{strSufijo}}-id_periodo_img2" name="form{{strSufijo}}-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form{{strSufijo}}-id_periodo_img_busqueda2" name="form{{strSufijo}}-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if IS_DEVELOPING}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form{{strSufijo}}-id_usuario_img2" name="form{{strSufijo}}-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form{{strSufijo}}-id_usuario_img_busqueda2" name="form{{strSufijo}}-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Numero' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_proveedor_img2" name="form{{strSufijo}}-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form{{strSufijo}}-id_proveedor_img_busqueda2" name="form{{strSufijo}}-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Emision' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto Parcial' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Parcial</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Moneda' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Vencimiento' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vencimiento</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro De Pagos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro De Pagos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Balance' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Balance Mon' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance Mon</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Documento Pagado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Pagado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Id Pagado' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Pagado</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Modulo Origen' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Origen</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Origen' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Origen</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Modulo Destino' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Destino</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Destino' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Destino</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre Pc' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Pc</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Hora' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Hora</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto Mora' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Mora</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Interes Mora' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Mora</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Dias Gracia Mora' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias Gracia Mora</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Instrumento Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Instrumento Pago</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Cambio' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cambio</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Documento Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Proveedor</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Clase Registro' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Clase Registro</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Estado Registro' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado Registro</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Motivo Anulacion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Motivo Anulacion</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto 1' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 1</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto 2' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 2</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Impuesto Incluido' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto Incluido</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Observaciones' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observaciones</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Grupo Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Pago</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Termino Idpv' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Idpv</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Forma Pago Proveedor' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Forma Pago Proveedor<a onclick="jQuery('#form-id_forma_pago_proveedor_img').trigger('click' );"><img id="form{{strSufijo}}-id_forma_pago_proveedor_img2" name="form{{strSufijo}}-id_forma_pago_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParaforma_pago_proveedor('id_forma_pago_proveedor');"><img id="form{{strSufijo}}-id_forma_pago_proveedor_img_busqueda2" name="form{{strSufijo}}-id_forma_pago_proveedor_img_busqueda2" title="Buscar Forma Pago Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nro Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Pago</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Referencia Pago' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Pago</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Fecha Hora' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Hora</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Id Base' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Base</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Cuenta Cliente' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_corriente_img2" name="form{{strSufijo}}-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="documento_cuenta_pagar_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" name="form{{strSufijo}}-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Devoluciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist documento_cuenta_pagarsLocal)}}
			{{#each documento_cuenta_pagarsLocal}}

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
								<img class="imgseleccionardocumento_cuenta_pagar" idactualdocumento_cuenta_pagar="{{id}}" title="SELECCIONAR Documentos Cuentas por Pagar ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartabladocumento_cuenta_pagar" idactualdocumento_cuenta_pagar="{{id}}" title="ELIMINAR Documentos Cuentas por Pagar ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Documentos Cuentas por Pagar ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionesdocumento_cuenta_pagar" idactualdocumento_cuenta_pagar="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
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

				{{#if (ValCol 'Proveedor' ../paraReporte)}}
				<td class="elementotabla col_id_proveedor" > {{id_proveedor_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Tipo' ../paraReporte)}}
				
					<td class="elementotabla col_tipo" > 
						{{ tipo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Emision' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_emision" > 
						{{ fecha_emision }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descripcion' ../paraReporte)}}
				
					<td class="elementotabla col_descripcion" > 
						{{ descripcion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Monto' ../paraReporte)}}
				
					<td class="elementotabla col_monto" > 
						{{ monto }}
					</td>
				{{/if}}

				{{#if (ValCol 'Monto Parcial' ../paraReporte)}}
				
					<td class="elementotabla col_monto_parcial" > 
						{{ monto_parcial }}
					</td>
				{{/if}}

				{{#if (ValCol 'Moneda' ../paraReporte)}}
				
					<td class="elementotabla col_moneda" > 
						{{ moneda }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Vencimiento' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_vence" > 
						{{ fecha_vence }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nro De Pagos' ../paraReporte)}}
				
					<td class="elementotabla col_numero_de_pagos" > 
						{{ numero_de_pagos }}
					</td>
				{{/if}}

				{{#if (ValCol 'Balance' ../paraReporte)}}
				
					<td class="elementotabla col_balance" > 
						{{ balance }}
					</td>
				{{/if}}

				{{#if (ValCol 'Balance Mon' ../paraReporte)}}
				
					<td class="elementotabla col_balance_mon" > 
						{{ balance_mon }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nro Documento Pagado' ../paraReporte)}}
				
					<td class="elementotabla col_numero_pagado" > 
						{{ numero_pagado }}
					</td>
				{{/if}}

				{{#if (ValCol 'Id Pagado' ../paraReporte)}}
				
					<td class="elementotabla col_id_pagado" > 
						{{ id_pagado }}
					</td>
				{{/if}}

				{{#if (ValCol 'Modulo Origen' ../paraReporte)}}
				
					<td class="elementotabla col_modulo_origen" > 
						{{ modulo_origen }}
					</td>
				{{/if}}

				{{#if (ValCol 'Origen' ../paraReporte)}}
				
					<td class="elementotabla col_id_origen" > 
						{{ id_origen }}
					</td>
				{{/if}}

				{{#if (ValCol 'Modulo Destino' ../paraReporte)}}
				
					<td class="elementotabla col_modulo_destino" > 
						{{ modulo_destino }}
					</td>
				{{/if}}

				{{#if (ValCol 'Destino' ../paraReporte)}}
				
					<td class="elementotabla col_id_destino" > 
						{{ id_destino }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre Pc' ../paraReporte)}}
				
					<td class="elementotabla col_nombre_pc" > 
						{{ nombre_pc }}
					</td>
				{{/if}}

				{{#if (ValCol 'Hora' ../paraReporte)}}
				
					<td class="elementotabla col_hora" > 
						{{ hora }}
					</td>
				{{/if}}

				{{#if (ValCol 'Monto Mora' ../paraReporte)}}
				
					<td class="elementotabla col_monto_mora" > 
						{{ monto_mora }}
					</td>
				{{/if}}

				{{#if (ValCol 'Interes Mora' ../paraReporte)}}
				
					<td class="elementotabla col_interes_mora" > 
						{{ interes_mora }}
					</td>
				{{/if}}

				{{#if (ValCol 'Dias Gracia Mora' ../paraReporte)}}
				
					<td class="elementotabla col_dias_gracia_mora" > 
						{{ dias_gracia_mora }}
					</td>
				{{/if}}

				{{#if (ValCol 'Instrumento Pago' ../paraReporte)}}
				
					<td class="elementotabla col_instrumento_pago" > 
						{{ instrumento_pago }}
					</td>
				{{/if}}

				{{#if (ValCol 'Tipo Cambio' ../paraReporte)}}
				
					<td class="elementotabla col_tipo_cambio" > 
						{{ tipo_cambio }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nro Documento Proveedor' ../paraReporte)}}
				
					<td class="elementotabla col_nro_documento_proveedor" > 
						{{ nro_documento_proveedor }}
					</td>
				{{/if}}

				{{#if (ValCol 'Clase Registro' ../paraReporte)}}
				
					<td class="elementotabla col_clase_registro" > 
						{{ clase_registro }}
					</td>
				{{/if}}

				{{#if (ValCol 'Estado Registro' ../paraReporte)}}
				
					<td class="elementotabla col_estado_registro" > 
						{{ estado_registro }}
					</td>
				{{/if}}

				{{#if (ValCol 'Motivo Anulacion' ../paraReporte)}}
				
					<td class="elementotabla col_motivo_anulacion" > 
						{{ motivo_anulacion }}
					</td>
				{{/if}}

				{{#if (ValCol 'Impuesto 1' ../paraReporte)}}
				
					<td class="elementotabla col_impuesto_1" > 
						{{ impuesto_1 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Impuesto 2' ../paraReporte)}}
				
					<td class="elementotabla col_impuesto_2" > 
						{{ impuesto_2 }}
					</td>
				{{/if}}

				{{#if (ValCol 'Impuesto Incluido' ../paraReporte)}}
				
					<td class="elementotabla col_impuesto_incluido" >{{{ getCheckBox impuesto_incluido 'form{{strSufijo}}-impuesto_incluidoi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Observaciones' ../paraReporte)}}
				
					<td class="elementotabla col_observaciones" > 
						{{ observaciones }}
					</td>
				{{/if}}

				{{#if (ValCol 'Grupo Pago' ../paraReporte)}}
				
					<td class="elementotabla col_grupo_pago" > 
						{{ grupo_pago }}
					</td>
				{{/if}}

				{{#if (ValCol 'Termino Idpv' ../paraReporte)}}
				
					<td class="elementotabla col_termino_idpv" > 
						{{ termino_idpv }}
					</td>
				{{/if}}

				{{#if (ValCol 'Forma Pago Proveedor' ../paraReporte)}}
				<td class="elementotabla col_id_forma_pago_proveedor" > {{id_forma_pago_proveedor_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Nro Pago' ../paraReporte)}}
				
					<td class="elementotabla col_nro_pago" > 
						{{ nro_pago }}
					</td>
				{{/if}}

				{{#if (ValCol 'Referencia Pago' ../paraReporte)}}
				
					<td class="elementotabla col_referencia_pago" > 
						{{ referencia_pago }}
					</td>
				{{/if}}

				{{#if (ValCol 'Fecha Hora' ../paraReporte)}}
				
					<td class="elementotabla col_fecha_hora" > 
						{{ fecha_hora }}
					</td>
				{{/if}}

				{{#if (ValCol 'Id Base' ../paraReporte)}}
				
					<td class="elementotabla col_id_base" > 
						{{ id_base }}
					</td>
				{{/if}}

				{{#if (ValCol 'Cuenta Cliente' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta_corriente" > {{id_cuenta_corriente_Descripcion}}</td>
				{{/if}}

				{{#if (If_Not_AND_Not_AND_Not ../paraReporte  ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciondevolucion" idactualdocumento_cuenta_pagar="{{id}}" title="DevolucionS DE Documentos Cuentas por Pagar" src="{{PATH_IMAGEN}}/Imagenes/devolucions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionimagen_documento_cuenta_pagar" idactualdocumento_cuenta_pagar="{{id}}" title="Imagenes Documentos Cuentas por PagarS DE Documentos Cuentas por Pagar" src="{{PATH_IMAGEN}}/Imagenes/imagen_documento_cuenta_pagars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionorden_compra" idactualdocumento_cuenta_pagar="{{id}}" title="Orden CompraS DE Documentos Cuentas por Pagar" src="{{PATH_IMAGEN}}/Imagenes/orden_compras.gif" alt="Seleccionar" border="" height="15" width="15">
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

