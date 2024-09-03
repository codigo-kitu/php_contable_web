



		<form id="frmTablaDatosretiro_cuenta_corriente" name="frmTablaDatosretiro_cuenta_corriente">
			<div id="divTablaDatosAuxiliarretiro_cuenta_corrientesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($retiro_cuenta_corrientes)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTituloretiro_cuenta_corriente" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Retiro Cta Corrientes</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosretiro_cuenta_corrientes" name="tblTablaDatosretiro_cuenta_corrientes" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla"> Empresa.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Corriente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Texto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo Actual.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado Deposito Retiro.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla"> Empresa.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Cuenta Corriente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Texto</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Saldo Actual.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla"> Estado Deposito Retiro.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($retiro_cuenta_corrientesLocal!=null && count($retiro_cuenta_corrientesLocal)>0) { ?>
			<?php foreach ($retiro_cuenta_corrientesLocal as $retiro_cuenta_corriente) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($retiro_cuenta_corriente->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$retiro_cuenta_corriente->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($retiro_cuenta_corriente->id) ?>
							</td>
							<td>
								<img class="imgseleccionarretiro_cuenta_corriente" idactualretiro_cuenta_corriente="<?php echo($retiro_cuenta_corriente->id) ?>" title="SELECCIONAR Retiro Cta Corriente ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($retiro_cuenta_corriente->id) ?>
							</td>
							<td>
								<img class="imgeliminartablaretiro_cuenta_corriente" idactualretiro_cuenta_corriente="<?php echo($retiro_cuenta_corriente->id) ?>" title="ELIMINAR Retiro Cta Corriente ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($retiro_cuenta_corriente->i) ?>" name="t-id_<?php echo($retiro_cuenta_corriente->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Retiro Cta Corriente ACTUAL" value="<?php echo($retiro_cuenta_corriente->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_0" name="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_0" type="text" maxlength="25" value="<?php echo($retiro_cuenta_corriente->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $retiro_cuenta_corriente->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $retiro_cuenta_corriente->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($retiro_cuenta_corriente->id_empresa_Descripcion,$retiro_cuenta_corriente->id_empresa,'t-cel_'.$retiro_cuenta_corriente->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_sucursal" ><?php echo($funciones->getComboBoxEditar($retiro_cuenta_corriente->id_sucursal_Descripcion,$retiro_cuenta_corriente->id_sucursal,'t-cel_'.$retiro_cuenta_corriente->i.'_4')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($retiro_cuenta_corriente->id_ejercicio_Descripcion,$retiro_cuenta_corriente->id_ejercicio,'t-cel_'.$retiro_cuenta_corriente->i.'_5')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($retiro_cuenta_corriente->id_periodo_Descripcion,$retiro_cuenta_corriente->id_periodo,'t-cel_'.$retiro_cuenta_corriente->i.'_6')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($retiro_cuenta_corriente->id_usuario_Descripcion,$retiro_cuenta_corriente->id_usuario,'t-cel_'.$retiro_cuenta_corriente->i.'_7')) ?></td>
				<?php } ?>
				<td class="elementotabla col_id_cuenta_corriente" ><?php echo($funciones->getComboBoxEditar($retiro_cuenta_corriente->id_cuenta_corriente_Descripcion,$retiro_cuenta_corriente->id_cuenta_corriente,'t-cel_'.$retiro_cuenta_corriente->i.'_8')) ?></td>
				
						<td class="elementotabla col_fecha_emision" >  '
							<input id="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_9" name="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_9" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10"  value="<?php echo($retiro_cuenta_corriente->fecha_emision) ?>" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_monto" >  '
							<input id="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_10" name="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_10" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12"  value="<?php echo($retiro_cuenta_corriente->monto) ?>" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_monto_texto" >  '<textarea id="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_11" name="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_11" class="form-control"  placeholder="Monto Texto"  title="Monto Texto"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($retiro_cuenta_corriente->monto_texto) ?></textarea>
							<span id="spanstrMensajemonto_texto" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_monto_texto" >  '<input type="text" maxlength="150"  id="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_11" name="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_11" class="form-control"  placeholder="Monto Texto"  title="Monto Texto"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($retiro_cuenta_corriente->monto_texto) ?></input>
							<span id="spanstrMensajemonto_texto" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_saldo" >  '
							<input id="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_12" name="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_12" type="text" class="form-control"  placeholder="Saldo Actual"  title="Saldo Actual"    maxlength="18" size="12"  value="<?php echo($retiro_cuenta_corriente->saldo) ?>"  readonly="readonly">
							<span id="spanstrMensajesaldo" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_13" name="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_13" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($retiro_cuenta_corriente->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_13" name="t-cel_<?php echo($retiro_cuenta_corriente->i) ?>_13" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($retiro_cuenta_corriente->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_estado_deposito_retiro" ><?php echo($funciones->getComboBoxEditar($retiro_cuenta_corriente->id_estado_deposito_retiro_Descripcion,$retiro_cuenta_corriente->id_estado_deposito_retiro,'t-cel_'.$retiro_cuenta_corriente->i.'_14')) ?></td>

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



