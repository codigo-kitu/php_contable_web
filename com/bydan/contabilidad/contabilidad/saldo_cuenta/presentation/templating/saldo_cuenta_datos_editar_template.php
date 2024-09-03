



		<form id="frmTablaDatossaldo_cuenta" name="frmTablaDatossaldo_cuenta">
			<div id="divTablaDatosAuxiliarsaldo_cuentasAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($saldo_cuentas)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulosaldo_cuenta" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Saldo Cuentas</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatossaldo_cuentas" name="tblTablaDatossaldo_cuentas" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Suma Debe.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Suma Haber.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Deudor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Acreedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Proceso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Fin Mes.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

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
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Tipo Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Suma Debe.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Suma Haber.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Deudor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Acreedor.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Proceso.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Fin Mes.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($saldo_cuentasLocal!=null && count($saldo_cuentasLocal)>0) { ?>
			<?php foreach ($saldo_cuentasLocal as $saldo_cuenta) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($saldo_cuenta->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$saldo_cuenta->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($saldo_cuenta->id) ?>
							</td>
							<td>
								<img class="imgseleccionarsaldo_cuenta" idactualsaldo_cuenta="<?php echo($saldo_cuenta->id) ?>" title="SELECCIONAR Saldo Cuenta ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($saldo_cuenta->id) ?>
							</td>
							<td>
								<img class="imgeliminartablasaldo_cuenta" idactualsaldo_cuenta="<?php echo($saldo_cuenta->id) ?>" title="ELIMINAR Saldo Cuenta ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($saldo_cuenta->i) ?>" name="t-id_<?php echo($saldo_cuenta->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Saldo Cuenta ACTUAL" value="<?php echo($saldo_cuenta->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($saldo_cuenta->i) ?>_0" name="t-cel_<?php echo($saldo_cuenta->i) ?>_0" type="text" maxlength="25" value="<?php echo($saldo_cuenta->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $saldo_cuenta->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $saldo_cuenta->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($saldo_cuenta->id_empresa_Descripcion,$saldo_cuenta->id_empresa,'t-cel_'.$saldo_cuenta->i.'_3')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($saldo_cuenta->id_ejercicio_Descripcion,$saldo_cuenta->id_ejercicio,'t-cel_'.$saldo_cuenta->i.'_4')) ?></td>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($saldo_cuenta->id_periodo_Descripcion,$saldo_cuenta->id_periodo,'t-cel_'.$saldo_cuenta->i.'_5')) ?></td>
				<td class="elementotabla col_id_tipo_cuenta" ><?php echo($funciones->getComboBoxEditar($saldo_cuenta->id_tipo_cuenta_Descripcion,$saldo_cuenta->id_tipo_cuenta,'t-cel_'.$saldo_cuenta->i.'_6')) ?></td>
				<td class="elementotabla col_id_cuenta" ><?php echo($funciones->getComboBoxEditar($saldo_cuenta->id_cuenta_Descripcion,$saldo_cuenta->id_cuenta,'t-cel_'.$saldo_cuenta->i.'_7')) ?></td>
				
						<td class="elementotabla col_suma_debe" >  '
							<input id="t-cel_<?php echo($saldo_cuenta->i) ?>_8" name="t-cel_<?php echo($saldo_cuenta->i) ?>_8" type="text" class="form-control"  placeholder="Suma Debe"  title="Suma Debe"    maxlength="22" size="12"  value="<?php echo($saldo_cuenta->suma_debe) ?>" >
							<span id="spanstrMensajesuma_debe" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_suma_haber" >  '
							<input id="t-cel_<?php echo($saldo_cuenta->i) ?>_9" name="t-cel_<?php echo($saldo_cuenta->i) ?>_9" type="text" class="form-control"  placeholder="Suma Haber"  title="Suma Haber"    maxlength="22" size="12"  value="<?php echo($saldo_cuenta->suma_haber) ?>" >
							<span id="spanstrMensajesuma_haber" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_deudor" >  '
							<input id="t-cel_<?php echo($saldo_cuenta->i) ?>_10" name="t-cel_<?php echo($saldo_cuenta->i) ?>_10" type="text" class="form-control"  placeholder="Deudor"  title="Deudor"    maxlength="22" size="12"  value="<?php echo($saldo_cuenta->deudor) ?>" >
							<span id="spanstrMensajedeudor" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_acreedor" >  '
							<input id="t-cel_<?php echo($saldo_cuenta->i) ?>_11" name="t-cel_<?php echo($saldo_cuenta->i) ?>_11" type="text" class="form-control"  placeholder="Acreedor"  title="Acreedor"    maxlength="22" size="12"  value="<?php echo($saldo_cuenta->acreedor) ?>" >
							<span id="spanstrMensajeacreedor" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_saldo" >  '
							<input id="t-cel_<?php echo($saldo_cuenta->i) ?>_12" name="t-cel_<?php echo($saldo_cuenta->i) ?>_12" type="text" class="form-control"  placeholder="Saldo"  title="Saldo"    maxlength="22" size="12"  value="<?php echo($saldo_cuenta->saldo) ?>" >
							<span id="spanstrMensajesaldo" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_proceso" >  '
							<input id="t-cel_<?php echo($saldo_cuenta->i) ?>_13" name="t-cel_<?php echo($saldo_cuenta->i) ?>_13" type="text" class="form-control"  placeholder="Fecha Proceso"  title="Fecha Proceso"    size="10"  value="<?php echo($saldo_cuenta->fecha_proceso) ?>" >
							<span id="spanstrMensajefecha_proceso" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_fecha_fin_mes" >  '
							<input id="t-cel_<?php echo($saldo_cuenta->i) ?>_14" name="t-cel_<?php echo($saldo_cuenta->i) ?>_14" type="text" class="form-control"  placeholder="Fecha Fin Mes"  title="Fecha Fin Mes"    size="10"  value="<?php echo($saldo_cuenta->fecha_fin_mes) ?>" >
							<span id="spanstrMensajefecha_fin_mes" class="mensajeerror"></span>' 
						</td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				<?php } ?>

				<td style="display:none" class="actions"></td>

				</tr>
			<?php } ?>
		<?php } ?>

					</tbody>

				</table>

			</div>

		</form>



