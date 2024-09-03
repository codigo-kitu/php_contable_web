



		<form id="frmTablaDatoscuenta_corriente_detalle" name="frmTablaDatoscuenta_corriente_detalle">
			<div id="divTablaDatosAuxiliarcuenta_corriente_detallesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($cuenta_corriente_detalles)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocuenta_corriente_detalle" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cuenta Corriente Detalles</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscuenta_corriente_detalles" name="tblTablaDatoscuenta_corriente_detalles" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

		<?php if($IS_DEVELOPING && !$bitEsRelacionado) { ?>
			<caption>(<?php echo($STR_PREFIJO_TABLE.$STR_TABLE_NAME) ?>)</caption>
		<?php } ?>

		
			<thead>
				<tr class="<?php echo($class_cabecera) ?>">
		<?php // class="cabeceratabla" ?>

				<?php //EN UNA LINEA PRIMERO COLUMNAS(ID,ELIMINAR,SELECCIONAR) ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form$strSufijo-id_ejercicio_img2" name="form$strSufijo-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form$strSufijo-id_ejercicio_img_busqueda2" name="form$strSufijo-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form$strSufijo-id_periodo_img2" name="form$strSufijo-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form$strSufijo-id_periodo_img_busqueda2" name="form$strSufijo-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form$strSufijo-id_usuario_img2" name="form$strSufijo-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form$strSufijo-id_usuario_img_busqueda2" name="form$strSufijo-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_corriente_img2" name="form$strSufijo-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form$strSufijo-id_cuenta_corriente_img_busqueda2" name="form$strSufijo-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Balance Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Cheque</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Deposito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Retiro</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cheque</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form$strSufijo-id_cliente_img2" name="form$strSufijo-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form$strSufijo-id_cliente_img_busqueda2" name="form$strSufijo-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form$strSufijo-id_proveedor_img2" name="form$strSufijo-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form$strSufijo-id_proveedor_img_busqueda2" name="form$strSufijo-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tabla<a onclick="jQuery('#form-id_tabla_img').trigger('click' );"><img id="form$strSufijo-id_tabla_img2" name="form$strSufijo-id_tabla_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParatabla('id_tabla');"><img id="form$strSufijo-id_tabla_img_busqueda2" name="form$strSufijo-id_tabla_img_busqueda2" title="Buscar Tabla" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Asiento<a onclick="jQuery('#form-id_asiento_img').trigger('click' );"><img id="form$strSufijo-id_asiento_img2" name="form$strSufijo-id_asiento_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaasiento('id_asiento');"><img id="form$strSufijo-id_asiento_img_busqueda2" name="form$strSufijo-id_asiento_img_busqueda2" title="Buscar Asiento" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Pagar<a onclick="jQuery('#form-id_cuenta_pagar_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_pagar_img2" name="form$strSufijo-id_cuenta_pagar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_pagar('id_cuenta_pagar');"><img id="form$strSufijo-id_cuenta_pagar_img_busqueda2" name="form$strSufijo-id_cuenta_pagar_img_busqueda2" title="Buscar Cuenta Pagar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cobrar<a onclick="jQuery('#form-id_cuenta_cobrar_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_cobrar_img2" name="form$strSufijo-id_cuenta_cobrar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_cobrar('id_cuenta_cobrar');"><img id="form$strSufijo-id_cuenta_cobrar_img_busqueda2" name="form$strSufijo-id_cuenta_cobrar_img_busqueda2" title="Buscar Cuenta Cobrar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clasificacion Cheques</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</thead>
		<?php if(!$bitEsRelacionado) { ?>

		
			<tfoot>
				<tr class="<?php echo($class_cabecera) ?>">
		<?php // class="cabeceratabla" ?>

				<?php //EN UNA LINEA PRIMERO COLUMNAS(ID,ELIMINAR,SELECCIONAR) ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__</pre>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa<a onclick="jQuery('#form-id_empresa_img').trigger('click' );"><img id="form$strSufijo-id_empresa_img2" name="form$strSufijo-id_empresa_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaempresa('id_empresa');"><img id="form$strSufijo-id_empresa_img_busqueda2" name="form$strSufijo-id_empresa_img_busqueda2" title="Buscar Empresa" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio<a onclick="jQuery('#form-id_ejercicio_img').trigger('click' );"><img id="form$strSufijo-id_ejercicio_img2" name="form$strSufijo-id_ejercicio_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaejercicio('id_ejercicio');"><img id="form$strSufijo-id_ejercicio_img_busqueda2" name="form$strSufijo-id_ejercicio_img_busqueda2" title="Buscar ejercicio" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo<a onclick="jQuery('#form-id_periodo_img').trigger('click' );"><img id="form$strSufijo-id_periodo_img2" name="form$strSufijo-id_periodo_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaperiodo('id_periodo');"><img id="form$strSufijo-id_periodo_img_busqueda2" name="form$strSufijo-id_periodo_img_busqueda2" title="Buscar periodo" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario<a onclick="jQuery('#form-id_usuario_img').trigger('click' );"><img id="form$strSufijo-id_usuario_img2" name="form$strSufijo-id_usuario_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParausuario('id_usuario');"><img id="form$strSufijo-id_usuario_img_busqueda2" name="form$strSufijo-id_usuario_img_busqueda2" title="Buscar Usuario" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente<a onclick="jQuery('#form-id_cuenta_corriente_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_corriente_img2" name="form$strSufijo-id_cuenta_corriente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_corriente('id_cuenta_corriente');"><img id="form$strSufijo-id_cuenta_corriente_img_busqueda2" name="form$strSufijo-id_cuenta_corriente_img_busqueda2" title="Buscar Cuenta Corriente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Balance Inicial</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Cheque</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Deposito</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Es Retiro</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero Cheque</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente<a onclick="jQuery('#form-id_cliente_img').trigger('click' );"><img id="form$strSufijo-id_cliente_img2" name="form$strSufijo-id_cliente_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacliente('id_cliente');"><img id="form$strSufijo-id_cliente_img_busqueda2" name="form$strSufijo-id_cliente_img_busqueda2" title="Buscar Cliente" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Proveedor<a onclick="jQuery('#form-id_proveedor_img').trigger('click' );"><img id="form$strSufijo-id_proveedor_img2" name="form$strSufijo-id_proveedor_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaproveedor('id_proveedor');"><img id="form$strSufijo-id_proveedor_img_busqueda2" name="form$strSufijo-id_proveedor_img_busqueda2" title="Buscar Proveedor" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tabla<a onclick="jQuery('#form-id_tabla_img').trigger('click' );"><img id="form$strSufijo-id_tabla_img2" name="form$strSufijo-id_tabla_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParatabla('id_tabla');"><img id="form$strSufijo-id_tabla_img_busqueda2" name="form$strSufijo-id_tabla_img_busqueda2" title="Buscar Tabla" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Asiento<a onclick="jQuery('#form-id_asiento_img').trigger('click' );"><img id="form$strSufijo-id_asiento_img2" name="form$strSufijo-id_asiento_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaasiento('id_asiento');"><img id="form$strSufijo-id_asiento_img_busqueda2" name="form$strSufijo-id_asiento_img_busqueda2" title="Buscar Asiento" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Pagar<a onclick="jQuery('#form-id_cuenta_pagar_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_pagar_img2" name="form$strSufijo-id_cuenta_pagar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_pagar('id_cuenta_pagar');"><img id="form$strSufijo-id_cuenta_pagar_img_busqueda2" name="form$strSufijo-id_cuenta_pagar_img_busqueda2" title="Buscar Cuenta Pagar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cobrar<a onclick="jQuery('#form-id_cuenta_cobrar_img').trigger('click' );"><img id="form$strSufijo-id_cuenta_cobrar_img2" name="form$strSufijo-id_cuenta_cobrar_img2" class="imagen_actualizar" title="ACTUALIZAR DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>Imagenes/actualizardatos.gif" alt="Actualizar Datos" border="" height="15" width="15"></a><a onclick="cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_cobrar('id_cuenta_cobrar');"><img id="form$strSufijo-id_cuenta_cobrar_img_busqueda2" name="form$strSufijo-id_cuenta_cobrar_img_busqueda2" title="Buscar Cuenta Cobrar" style="width: 15px; height: 15px;text-align: center; visibility:visible;" src="<?php echo($PATH_IMAGEN) ?>Imagenes/buscar.gif" width="15" height="15"/></a></pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Clasificacion Cheques</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($cuenta_corriente_detallesLocal!=null && count($cuenta_corriente_detallesLocal)>0) { ?>
			<?php foreach ($cuenta_corriente_detallesLocal as $cuenta_corriente_detalle) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cuenta_corriente_detalle->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cuenta_corriente_detalle->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cuenta_corriente_detalle->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcuenta_corriente_detalle" idactualcuenta_corriente_detalle="<?php echo($cuenta_corriente_detalle->id) ?>"  funcionjsactualcuenta_corriente_detalle="'.str_replace('TO_REPLACE',$cuenta_corriente_detalle->id.',\''.cuenta_corriente_detalle_util::getcuenta_corriente_detalleDescripcion($cuenta_corriente_detalle).'\'',$this->strFuncionJs).'" title="SELECCIONAR Cuenta Corriente Detalle ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($i) ?>" name="t-id_<?php echo($i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cuenta Corriente Detalle ACTUAL" value="<?php echo($cuenta_corriente_detalle->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($i) ?>_0" name="t-cel_<?php echo($i) ?>_0" type="text" maxlength="25" value="<?php echo($cuenta_corriente_detalle->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none"> 
						<?php echo( $cuenta_corriente_detalle->updated_at ) ?>
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none"> 
						<?php echo( $cuenta_corriente_detalle->updated_at ) ?>
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($cuenta_corriente_detalle->id_empresa_Descripcion) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($cuenta_corriente_detalle->id_ejercicio_Descripcion) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($cuenta_corriente_detalle->id_periodo_Descripcion) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td> <?php echo($cuenta_corriente_detalle->id_usuario_Descripcion) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_cuenta_corriente" > <?php echo($cuenta_corriente_detalle->id_cuenta_corriente_Descripcion) ?></td>
				
					<td class="elementotabla col_es_balance_inicial" ><?php  $funciones->getCheckBox($cuenta_corriente_detalle->es_balance_inicial,'form<?php echo($strSufijo) ?>-es_balance_iniciali',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_es_cheque" ><?php  $funciones->getCheckBox($cuenta_corriente_detalle->es_cheque,'form<?php echo($strSufijo) ?>-es_chequei',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_es_deposito" ><?php  $funciones->getCheckBox($cuenta_corriente_detalle->es_deposito,'form<?php echo($strSufijo) ?>-es_depositoi',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_es_retiro" ><?php  $funciones->getCheckBox($cuenta_corriente_detalle->es_retiro,'form<?php echo($strSufijo) ?>-es_retiroi',$paraReporte)  ?>
					</td>
				
					<td class="elementotabla col_numero_cheque" > 
						<?php echo( $cuenta_corriente_detalle->numero_cheque ) ?>
					</td>
				<td class="elementotabla col_id_cliente" > <?php echo($cuenta_corriente_detalle->id_cliente_Descripcion) ?></td>
				<td class="elementotabla col_id_proveedor" > <?php echo($cuenta_corriente_detalle->id_proveedor_Descripcion) ?></td>
				<td class="elementotabla col_id_tabla" > <?php echo($cuenta_corriente_detalle->id_tabla_Descripcion) ?></td>
				<td class="elementotabla col_id_estado" > <?php echo($cuenta_corriente_detalle->id_estado_Descripcion) ?></td>
				<td class="elementotabla col_id_asiento" > <?php echo($cuenta_corriente_detalle->id_asiento_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta_pagar" > <?php echo($cuenta_corriente_detalle->id_cuenta_pagar_Descripcion) ?></td>
				<td class="elementotabla col_id_cuenta_cobrar" > <?php echo($cuenta_corriente_detalle->id_cuenta_cobrar_Descripcion) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta_corriente_detalle->id) ?>
							<img class="imgrelacionclasificacion_cheque" idactualcuenta_corriente_detalle="<?php echo($cuenta_corriente_detalle->id) ?>" title="Clasificacion ChequeS DE Cuenta Corriente Detalle" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/clasificacion_cheques.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				<?php } ?>

				<td style="display:none" class="actions"></td>

				</tr>
			<?php } ?>
		<?php } ?>

					</tbody>

				</table>

			</div>

		</form>



