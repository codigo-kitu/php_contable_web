



		<form id="frmTablaDatosbeneficiario_ocacional_cheque" name="frmTablaDatosbeneficiario_ocacional_cheque">
			<div id="divTablaDatosAuxiliarbeneficiario_ocacional_chequesAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($beneficiario_ocacional_cheques)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulobeneficiario_ocacional_cheque" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Beneficiario Ocacionales</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosbeneficiario_ocacional_cheques" name="tblTablaDatosbeneficiario_ocacional_cheques" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Beneficiario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion 1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion 2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion 3</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Email.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Notas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Ocacional</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Tributario</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Cheques</pre></b>
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
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Codigo Beneficiario.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion 1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion 2</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Direccion 3</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Telefono Movil.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Email.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Notas</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Ocacional</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Registro Tributario</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Cheques</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($beneficiario_ocacional_chequesLocal!=null && count($beneficiario_ocacional_chequesLocal)>0) { ?>
			<?php foreach ($beneficiario_ocacional_chequesLocal as $beneficiario_ocacional_cheque) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($beneficiario_ocacional_cheque->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$beneficiario_ocacional_cheque->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($beneficiario_ocacional_cheque->id) ?>
							</td>
							<td>
								<img class="imgseleccionarbeneficiario_ocacional_cheque" idactualbeneficiario_ocacional_cheque="<?php echo($beneficiario_ocacional_cheque->id) ?>" title="SELECCIONAR Beneficiario Ocacional ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($beneficiario_ocacional_cheque->id) ?>
							</td>
							<td>
								<img class="imgeliminartablabeneficiario_ocacional_cheque" idactualbeneficiario_ocacional_cheque="<?php echo($beneficiario_ocacional_cheque->id) ?>" title="ELIMINAR Beneficiario Ocacional ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($beneficiario_ocacional_cheque->i) ?>" name="t-id_<?php echo($beneficiario_ocacional_cheque->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Beneficiario Ocacional ACTUAL" value="<?php echo($beneficiario_ocacional_cheque->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_0" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_0" type="text" maxlength="25" value="<?php echo($beneficiario_ocacional_cheque->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($beneficiario_ocacional_cheque->id) ?><img class="imgseleccionarmostraraccionesrelacionesbeneficiario_ocacional_cheque" idactualbeneficiario_ocacional_cheque="<?php echo($beneficiario_ocacional_cheque->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $beneficiario_ocacional_cheque->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $beneficiario_ocacional_cheque->updated_at 
					</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_3" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_3" type="text" class="form-control"  placeholder="Codigo Beneficiario"  title="Codigo Beneficiario"    size="10"  maxlength="10" value="<?php echo($beneficiario_ocacional_cheque->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_codigo" >  '
							<input id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_3" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_3" type="text" class="form-control"  placeholder="Codigo Beneficiario"  title="Codigo Beneficiario"    size="10"  maxlength="10" value="<?php echo($beneficiario_ocacional_cheque->codigo) ?>" />
							<span id="spanstrMensajecodigo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre" >  '<textarea id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_4" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_4" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->nombre) ?></textarea>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_4" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_4" class="form-control"  placeholder="Nombre"  title="Nombre"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->nombre) ?></input>
							<span id="spanstrMensajenombre" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion_1" >  '<textarea id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_5" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_5" class="form-control"  placeholder="Direccion 1"  title="Direccion 1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->direccion_1) ?></textarea>
							<span id="spanstrMensajedireccion_1" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion_1" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_5" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_5" class="form-control"  placeholder="Direccion 1"  title="Direccion 1"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->direccion_1) ?></input>
							<span id="spanstrMensajedireccion_1" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion_2" >  '<textarea id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_6" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_6" class="form-control"  placeholder="Direccion 2"  title="Direccion 2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->direccion_2) ?></textarea>
							<span id="spanstrMensajedireccion_2" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion_2" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_6" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_6" class="form-control"  placeholder="Direccion 2"  title="Direccion 2"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->direccion_2) ?></input>
							<span id="spanstrMensajedireccion_2" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_direccion_3" >  '<textarea id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_7" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_7" class="form-control"  placeholder="Direccion 3"  title="Direccion 3"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->direccion_3) ?></textarea>
							<span id="spanstrMensajedireccion_3" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_direccion_3" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_7" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_7" class="form-control"  placeholder="Direccion 3"  title="Direccion 3"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->direccion_3) ?></input>
							<span id="spanstrMensajedireccion_3" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono" >  '
							<input id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_8" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_8" type="text" class="form-control"  placeholder="Telefono"  title="Telefono"    size="15"  maxlength="15" value="<?php echo($beneficiario_ocacional_cheque->telefono) ?>" />
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono" >  '
							<input id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_8" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_8" type="text" class="form-control"  placeholder="Telefono"  title="Telefono"    size="15"  maxlength="15" value="<?php echo($beneficiario_ocacional_cheque->telefono) ?>" />
							<span id="spanstrMensajetelefono" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_telefono_movil" >  '
							<input id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_9" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_9" type="text" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"    size="20"  maxlength="20" value="<?php echo($beneficiario_ocacional_cheque->telefono_movil) ?>" />
							<span id="spanstrMensajetelefono_movil" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_telefono_movil" >  '
							<input id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_9" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_9" type="text" class="form-control"  placeholder="Telefono Movil"  title="Telefono Movil"    size="20"  maxlength="20" value="<?php echo($beneficiario_ocacional_cheque->telefono_movil) ?>" />
							<span id="spanstrMensajetelefono_movil" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_email" >  '<textarea id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_10" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_10" class="form-control"  placeholder="Email"  title="Email"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->email) ?></textarea>
							<span id="spanstrMensajeemail" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_email" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_10" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_10" class="form-control"  placeholder="Email"  title="Email"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->email) ?></input>
							<span id="spanstrMensajeemail" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_notas" >  '<textarea id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_11" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_11" class="form-control"  placeholder="Notas"  title="Notas"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($beneficiario_ocacional_cheque->notas) ?></textarea>
							<span id="spanstrMensajenotas" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_notas" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_11" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_11" class="form-control"  placeholder="Notas"  title="Notas"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($beneficiario_ocacional_cheque->notas) ?></input>
							<span id="spanstrMensajenotas" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_registro_ocacional" >  '<textarea id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_12" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_12" class="form-control"  placeholder="Registro Ocacional"  title="Registro Ocacional"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->registro_ocacional) ?></textarea>
							<span id="spanstrMensajeregistro_ocacional" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_registro_ocacional" >  '<input type="text" maxlength="60"  id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_12" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_12" class="form-control"  placeholder="Registro Ocacional"  title="Registro Ocacional"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($beneficiario_ocacional_cheque->registro_ocacional) ?></input>
							<span id="spanstrMensajeregistro_ocacional" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_registro_tributario" >  '
							<input id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_13" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_13" type="text" class="form-control"  placeholder="Registro Tributario"  title="Registro Tributario"    size="20"  maxlength="30" value="<?php echo($beneficiario_ocacional_cheque->registro_tributario) ?>" />
							<span id="spanstrMensajeregistro_tributario" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_registro_tributario" >  '
							<input id="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_13" name="t-cel_<?php echo($beneficiario_ocacional_cheque->i) ?>_13" type="text" class="form-control"  placeholder="Registro Tributario"  title="Registro Tributario"    size="20"  maxlength="30" value="<?php echo($beneficiario_ocacional_cheque->registro_tributario) ?>" />
							<span id="spanstrMensajeregistro_tributario" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($beneficiario_ocacional_cheque->id) ?>
							<img class="imgrelacioncheque_cuenta_corriente" idactualbeneficiario_ocacional_cheque="<?php echo($beneficiario_ocacional_cheque->id) ?>" title="ChequeS DE Beneficiario Ocacional" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/cheque_cuenta_corrientes.gif" alt="Seleccionar" border="" height="15" width="15">
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



