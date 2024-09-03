
<script id="cuenta_datos_reporte_template" type="text/x-handlebars-template">



		<form id="frmTablaDatoscuenta" name="frmTablaDatoscuenta">
			<div id="divTablaDatosAuxiliarcuentasAjaxWebPart" style="{{style_div}}">

				<input type="hidden" id="t{{strSufijo}}-maxima_fila" name="t{{strSufijo}}-maxima_fila" value="{{count cuentas}}">

		{{#if (If_Not bitEsRelacionado)}}
			
			<table  id="tblTablaTitulocuenta" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cuentases</span>
					</td>
				</tr>
			</table>
		{{/if}}

		<table id="tblTablaDatoscuentas" name="tblTablaDatoscuentas" class="{{class_table}}" cellpadding="3" cellspacing="3" style="{{style_tabla}}" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Nivel Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Nivel Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_img2" name="form{{strSufijo}}-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form{{strSufijo}}-id_cuenta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nivel Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nivel Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Usa Monto Minimo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usa Monto Minimo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto Minimo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Minimo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Porcentaje Minimo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Porcentaje Minimo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Centro Costos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Centro Costos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ruc' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Balance' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Detalle Asiento Automaticos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asientoes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asiento Predefinidos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Categoria Cheques</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Corrientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Impuesto_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Instrumento Pago_COMPRASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Productos_INVENTARIOes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Impuesto_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Producto_COSTOs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion Fuente_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion Ica_COMPRASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Saldo Cuentas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Terminos Pago Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Terminos Pago Proveedoreses</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form{{strSufijo}}-id_empresa_img2" name="form{{strSufijo}}-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form{{strSufijo}}-id_empresa_img_busqueda2" name="form{{strSufijo}}-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Tipo Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Tipo Nivel Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Nivel Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol ' Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta<a onclick="jQuery('#form-id_cuenta_img').trigger('click' );"><img id="form{{strSufijo}}-id_cuenta_img2" name="form{{strSufijo}}-id_cuenta_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="{{PATH_IMAGEN}}Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_webcontrol1.abrirBusquedaParacuenta('id_cuenta');"><img id="form{{strSufijo}}-id_cuenta_img_busqueda2" name="form{{strSufijo}}-id_cuenta_img_busqueda2" title="Buscar Cuentas" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="{{PATH_IMAGEN}}Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Codigo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nombre' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Nivel Cuenta' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nivel Cuenta</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Usa Monto Minimo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usa Monto Minimo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Monto Minimo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Minimo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Porcentaje Minimo' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Porcentaje Minimo</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Con Centro Costos' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Centro Costos</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Ruc' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Balance' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance</pre>
			</th>
		{{/if}}

		{{#if (ValCol 'Descripcion' paraReporte)}}
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		{{/if}}

		{{#if (If_Not_AND_Not_AND_Not paraReporte  bitEsBusqueda  bitEsRelaciones)}}

		
			<th style="display:table-cell">
				<b><pre>Detalle Asiento Automaticos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asientoes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Detalle Asiento Predefinidos</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Categoria Cheques</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Cuenta Corrientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Forma Pago Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Impuesto_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Instrumento Pago_COMPRASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Productos_INVENTARIOes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Impuesto_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Producto_COSTOs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Proveedores</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion Fuente_COMPRASes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Retencion Ica_COMPRASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Saldo Cuentas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Terminos Pago Clientes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Terminos Pago Proveedoreses</pre></b>
			</th>

		{{/if}}
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		{{/if}}
		{{/if}}

		<tbody>

		{{#if (Is_List_Exist cuentasLocal)}}
			{{#each cuentasLocal}}

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
								<img class="imgseleccionarcuenta" idactualcuenta="{{id}}" title="SELECCIONAR Cuentas ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<img class="imgeliminartablacuenta" idactualcuenta="{{id}}" title="ELIMINAR Cuentas ACTUAL" src="{{../PATH_IMAGEN}}/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_{{i}}" name="t-id_{{i}}" type="checkbox" class="chkb_id" title="SELECCIONAR Cuentas ACTUAL" value="{{id}}"></input>
							</td>
							<td>
								{{i}}
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:{{../strPermisoRelaciones}}">
					<a>
						{{id}}<img class="imgseleccionarmostraraccionesrelacionescuenta" idactualcuenta="{{id}}" title="DATOS RELACIONADOS" src="{{../PATH_IMAGEN}}/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
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

				{{#if (ValCol 'Tipo Cuenta' ../paraReporte)}}
				<td class="elementotabla col_id_tipo_cuenta" > {{id_tipo_cuenta_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Tipo Nivel Cuenta' ../paraReporte)}}
				<td class="elementotabla col_id_tipo_nivel_cuenta" > {{id_tipo_nivel_cuenta_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol ' Cuenta' ../paraReporte)}}
				<td class="elementotabla col_id_cuenta" > {{id_cuenta_Descripcion}}</td>
				{{/if}}

				{{#if (ValCol 'Codigo' ../paraReporte)}}
				
					<td class="elementotabla col_codigo" > 
						{{ codigo }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nombre' ../paraReporte)}}
				
					<td class="elementotabla col_nombre" > 
						{{ nombre }}
					</td>
				{{/if}}

				{{#if (ValCol 'Nivel Cuenta' ../paraReporte)}}
				
					<td class="elementotabla col_nivel_cuenta" > 
						{{ nivel_cuenta }}
					</td>
				{{/if}}

				{{#if (ValCol 'Usa Monto Minimo' ../paraReporte)}}
				
					<td class="elementotabla col_usa_monto_base" >{{{ getCheckBox usa_monto_base 'form-usa_monto_basei' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Monto Minimo' ../paraReporte)}}
				
					<td class="elementotabla col_monto_base" > 
						{{ monto_base }}
					</td>
				{{/if}}

				{{#if (ValCol 'Porcentaje Minimo' ../paraReporte)}}
				
					<td class="elementotabla col_porcentaje_base" > 
						{{ porcentaje_base }}
					</td>
				{{/if}}

				{{#if (ValCol 'Con Centro Costos' ../paraReporte)}}
				
					<td class="elementotabla col_con_centro_costos" >{{{ getCheckBox con_centro_costos 'form-con_centro_costosi' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Ruc' ../paraReporte)}}
				
					<td class="elementotabla col_con_ruc" >{{{ getCheckBox con_ruc 'form-con_ruci' ../paraReporte }}}
					</td>
				{{/if}}

				{{#if (ValCol 'Balance' ../paraReporte)}}
				
					<td class="elementotabla col_balance" > 
						{{ balance }}
					</td>
				{{/if}}

				{{#if (ValCol 'Descripcion' ../paraReporte)}}
				
					<td class="elementotabla col_descripcion" > 
						{{ descripcion }}
					</td>
				{{/if}}

				{{#if (If_Not_AND_Not_AND_Not ../paraReporte  ../bitEsBusqueda  ../bitEsRelaciones)}}

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionasiento_automatico_detalle" idactualcuenta="{{id}}" title="Detalle Asiento AutomaticoS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/asiento_automatico_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionasiento_detalle" idactualcuenta="{{id}}" title="Detalle AsientoS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/asiento_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionasiento_predefinido_detalle" idactualcuenta="{{id}}" title="Detalle Asiento PredefinidoS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/asiento_predefinido_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncategoria_cheque" idactualcuenta="{{id}}" title="Categoria ChequeS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/categoria_cheques.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncliente" idactualcuenta="{{id}}" title="ClienteS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncuenta_corriente" idactualcuenta="{{id}}" title="Cuenta CorrienteS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/cuenta_corrientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioncuenta" idactualcuenta="{{id}}" title="CuentasS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/cuentas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionforma_pago_cliente" idactualcuenta="{{id}}" title="Forma Pago ClienteS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/forma_pago_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionforma_pago_proveedor" idactualcuenta="{{id}}" title="Forma Pago ProveedorS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/forma_pago_proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionimpuesto_ventas" idactualcuenta="{{id}}" title="ImpuestoS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/impuestos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacioninstrumento_pago_compras" idactualcuenta="{{id}}" title="Instrumento PagoS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/instrumento_pagos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionlista_producto_inventario" idactualcuenta="{{id}}" title="Lista ProductosS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/lista_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionotro_impuesto_ventas" idactualcuenta="{{id}}" title="Otro ImpuestoS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/otro_impuestos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionproducto_costo" idactualcuenta="{{id}}" title="ProductoS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionproveedor" idactualcuenta="{{id}}" title="ProveedorS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionretencion_compras" idactualcuenta="{{id}}" title="RetencionS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/retencions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionretencion_fuente_compras" idactualcuenta="{{id}}" title="Retencion FuenteS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/retencion_fuentes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionretencion_ica_compras" idactualcuenta="{{id}}" title="Retencion IcaS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/retencion_icas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelacionsaldo_cuenta" idactualcuenta="{{id}}" title="Saldo CuentaS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/saldo_cuentas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciontermino_pago_cliente" idactualcuenta="{{id}}" title="Terminos Pago ClienteS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/termino_pago_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a>{{id}}
							<img class="imgrelaciontermino_pago_proveedor" idactualcuenta="{{id}}" title="Terminos Pago ProveedoresS DE Cuentas" src="{{PATH_IMAGEN}}/Imagenes/termino_pago_proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
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

