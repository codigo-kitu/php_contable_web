



		<form id="frmTablaDatoscuenta" name="frmTablaDatoscuenta">
			<div id="divTablaDatosAuxiliarcuentasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($cuentas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulocuenta" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Cuentases</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatoscuentas" name="tblTablaDatoscuentas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

		<?php if($IS_DEVELOPING && !$bitEsRelacionado) { ?>
			<caption>(<?php echo($STR_PREFIJO_TABLE.$STR_TABLE_NAME) ?>)</caption>
		<?php } ?>

		
			<thead>
				<tr class="<?php echo($class_cabecera) ?>">
		<?php // class="cabeceratabla" ?>

				<?php //EN UNA LINEA PRIMERO COLUMNAS(ID,ELIMINAR,SELECCIONAR) ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">ID__.(*)</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:<?php echo($strPermisoEliminar) ?>">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:<?php echo($strPermisoRelaciones) ?>">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Nivel Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nivel Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usa Monto Minimo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Minimo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Porcentaje Minimo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Centro Costos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
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
				<b><pre>Instrumento Pago_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Productos_VENTAes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Impuesto_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Producto_VENTAs</pre></b>
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
				<b><pre>Retencion Ica_VENTASs</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">ID__.(*)</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_eli"  style="display:<?php echo($strPermisoEliminar) ?>">
				<pre class="cabecera_texto_titulo_tabla">Eli</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_sel" >
				<pre class="cabecera_texto_titulo_tabla">Sel</pre>
			</th>
			<th class="cabecera_titulo_tabla columna_tabla_selrel"  style="display:<?php echo($strPermisoRelaciones) ?>">
				<pre class="cabecera_texto_titulo_tabla">Rel</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>
		
		
			<th class="cabecera_titulo_tabla"  style="display:none">
				<pre class="cabecera_texto_titulo_tabla">UPDATED_AT.(*)</pre>
			</th>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Empresa.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Nivel Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nivel Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usa Monto Minimo</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Minimo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Porcentaje Minimo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Con Centro Costos</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ruc</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
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
				<b><pre>Instrumento Pago_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Lista Productos_VENTAes</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Otro Impuesto_VENTASs</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Producto_VENTAs</pre></b>
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
				<b><pre>Retencion Ica_VENTASs</pre></b>
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

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($cuentasLocal!=null && count($cuentasLocal)>0) { ?>
			<?php foreach ($cuentasLocal as $cuenta) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($cuenta->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$cuenta->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cuenta->id) ?>
							</td>
							<td>
								<img class="imgseleccionarcuenta" idactualcuenta="<?php echo($cuenta->id) ?>" title="SELECCIONAR Cuentas ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>

				
				<td class="elementotabla columna_tabla_eli col_id"  style="display:<?php echo($strPermisoEliminar) ?>">
					<a>
					<table>
						<tr>
							<td>
								<?php echo($cuenta->id) ?>
							</td>
							<td>
								<img class="imgeliminartablacuenta" idactualcuenta="<?php echo($cuenta->id) ?>" title="ELIMINAR Cuentas ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
							</td>
						</tr>
					</table>
					</a>
				</td>
				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>

				
				<td class="elementotabla columna_tabla_sel col_id" >
					<table>
						<tr>
							<td>
								<input id="t-id_<?php echo($cuenta->i) ?>" name="t-id_<?php echo($cuenta->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Cuentas ACTUAL" value="<?php echo($cuenta->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($cuenta->i) ?>_0" name="t-cel_<?php echo($cuenta->i) ?>_0" type="text" maxlength="25" value="<?php echo($cuenta->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($cuenta->id) ?><img class="imgseleccionarmostraraccionesrelacionescuenta" idactualcuenta="<?php echo($cuenta->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $cuenta->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $cuenta->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($cuenta->id_empresa_Descripcion,$cuenta->id_empresa,'t-cel_'.$cuenta->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_tipo_cuenta" ><?php echo($funciones->getComboBoxEditar($cuenta->id_tipo_cuenta_Descripcion,$cuenta->id_tipo_cuenta,'t-cel_'.$cuenta->i.'_4')) ?></td>
				<td class="elementotabla col_id_tipo_nivel_cuenta" ><?php echo($funciones->getComboBoxEditar($cuenta->id_tipo_nivel_cuenta_Descripcion,$cuenta->id_tipo_nivel_cuenta,'t-cel_'.$cuenta->i.'_5')) ?></td>
				<td class="elementotabla col_id_cuenta" ><?php echo($funciones->getComboBoxEditar($cuenta->id_cuenta_Descripcion,$cuenta->id_cuenta,'t-cel_'.$cuenta->i.'_6')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($cuenta->i) ?>_7" name="t-cel_<?php echo($cuenta->i) ?>_7" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="20" value="<?php echo($cuenta->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($cuenta->i) ?>_7" name="t-cel_<?php echo($cuenta->i) ?>_7" type="text" class="form-control"  placeholder="Codigo"  title="Codigo"    size="20"  maxlength="20" value="<?php echo($cuenta->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '<textarea id="t-cel_<?php echo($cuenta->i) ?>_8" name="t-cel_<?php echo($cuenta->i) ?>_8" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta->nombre) ?></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($cuenta->i) ?>_8" name="t-cel_<?php echo($cuenta->i) ?>_8" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta->nombre) ?></input>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_nivel_cuenta" >  '
							<input id="t-cel_<?php echo($cuenta->i) ?>_9" name="t-cel_<?php echo($cuenta->i) ?>_9" type="text" class="form-control"  placeholder="Nivel Cuenta"  title="Nivel Cuenta"    maxlength="10" size="10"  value="<?php echo($cuenta->nivel_cuenta) ?>" >
							<span id="spanstrMensajenivel_cuenta" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_usa_monto_base" ><?php  $funciones->getCheckBoxEditar($cuenta->usa_monto_base,'t-cel_<?php echo($cuenta->i) ?>_10',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_monto_base" >  '
							<input id="t-cel_<?php echo($cuenta->i) ?>_11" name="t-cel_<?php echo($cuenta->i) ?>_11" type="text" class="form-control"  placeholder="Monto Minimo"  title="Monto Minimo"    maxlength="18" size="12"  value="<?php echo($cuenta->monto_base) ?>" >
							<span id="spanstrMensajemonto_base" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_porcentaje_base" >  '
							<input id="t-cel_<?php echo($cuenta->i) ?>_12" name="t-cel_<?php echo($cuenta->i) ?>_12" type="text" class="form-control"  placeholder="Porcentaje Minimo"  title="Porcentaje Minimo"    maxlength="18" size="12"  value="<?php echo($cuenta->porcentaje_base) ?>" >
							<span id="spanstrMensajeporcentaje_base" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_con_centro_costos" ><?php  $funciones->getCheckBoxEditar($cuenta->con_centro_costos,'t-cel_<?php echo($cuenta->i) ?>_13',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_con_ruc" ><?php  $funciones->getCheckBoxEditar($cuenta->con_ruc,'t-cel_<?php echo($cuenta->i) ?>_14',$paraReporte)  ?>
						</td>
				
						<td class="elementotabla col_balance" >  '
							<input id="t-cel_<?php echo($cuenta->i) ?>_15" name="t-cel_<?php echo($cuenta->i) ?>_15" type="text" class="form-control"  placeholder="Balance"  title="Balance"    maxlength="24" size="12"  value="<?php echo($cuenta->balance) ?>" >
							<span id="spanstrMensajebalance" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($cuenta->i) ?>_16" name="t-cel_<?php echo($cuenta->i) ?>_16" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($cuenta->i) ?>_16" name="t-cel_<?php echo($cuenta->i) ?>_16" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($cuenta->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionasiento_automatico_detalle" idactualcuenta="<?php echo($cuenta->id) ?>" title="Detalle Asiento AutomaticoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_automatico_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionasiento_detalle" idactualcuenta="<?php echo($cuenta->id) ?>" title="Detalle AsientoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionasiento_predefinido_detalle" idactualcuenta="<?php echo($cuenta->id) ?>" title="Detalle Asiento PredefinidoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/asiento_predefinido_detalles.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacioncategoria_cheque" idactualcuenta="<?php echo($cuenta->id) ?>" title="Categoria ChequeS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/categoria_cheques.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacioncliente" idactualcuenta="<?php echo($cuenta->id) ?>" title="ClienteS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacioncuenta_corriente" idactualcuenta="<?php echo($cuenta->id) ?>" title="Cuenta CorrienteS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cuenta_corrientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacioncuenta" idactualcuenta="<?php echo($cuenta->id) ?>" title="CuentasS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cuentas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionforma_pago_cliente" idactualcuenta="<?php echo($cuenta->id) ?>" title="Forma Pago ClienteS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/forma_pago_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionforma_pago_proveedor" idactualcuenta="<?php echo($cuenta->id) ?>" title="Forma Pago ProveedorS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/forma_pago_proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionimpuesto_ventas" idactualcuenta="<?php echo($cuenta->id) ?>" title="ImpuestoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/impuestos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacioninstrumento_pago_ventas" idactualcuenta="<?php echo($cuenta->id) ?>" title="Instrumento PagoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/instrumento_pagos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionlista_producto_venta" idactualcuenta="<?php echo($cuenta->id) ?>" title="Lista ProductosS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/lista_productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionotro_impuesto_ventas" idactualcuenta="<?php echo($cuenta->id) ?>" title="Otro ImpuestoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/otro_impuestos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionproducto_venta" idactualcuenta="<?php echo($cuenta->id) ?>" title="ProductoS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/productos.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionproveedor" idactualcuenta="<?php echo($cuenta->id) ?>" title="ProveedorS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionretencion_compras" idactualcuenta="<?php echo($cuenta->id) ?>" title="RetencionS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/retencions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionretencion_fuente_compras" idactualcuenta="<?php echo($cuenta->id) ?>" title="Retencion FuenteS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/retencion_fuentes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionretencion_ica_ventas" idactualcuenta="<?php echo($cuenta->id) ?>" title="Retencion IcaS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/retencion_icas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelacionsaldo_cuenta" idactualcuenta="<?php echo($cuenta->id) ?>" title="Saldo CuentaS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/saldo_cuentas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelaciontermino_pago_cliente" idactualcuenta="<?php echo($cuenta->id) ?>" title="Terminos Pago ClienteS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/termino_pago_clientes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($cuenta->id) ?>
							<img class="imgrelaciontermino_pago_proveedor" idactualcuenta="<?php echo($cuenta->id) ?>" title="Terminos Pago ProveedoresS DE Cuentas" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/termino_pago_proveedors.gif" alt="Seleccionar" border="" height="15" width="15">
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



