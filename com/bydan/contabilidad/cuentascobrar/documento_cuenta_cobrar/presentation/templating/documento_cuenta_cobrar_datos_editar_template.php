



		<form id="frmTablaDatosdocumento_cuenta_cobrar" name="frmTablaDatosdocumento_cuenta_cobrar">
			<div id="divTablaDatosAuxiliardocumento_cuenta_cobrarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($documento_cuenta_cobrars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulodocumento_cuenta_cobrar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Documentos Cuentas por Cobrares</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosdocumento_cuenta_cobrars" name="tblTablaDatosdocumento_cuenta_cobrars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Parcial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vencimiento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro De Pagos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Pagado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Pagado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Destino.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Destino.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Pc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Hora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Mora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Mora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias Gracia Mora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Instrumento Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cambio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Clase Registro.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado Registro.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Motivo Anulacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto Incluido.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observaciones.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Idpv.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Forma Pago Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Hora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Base.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ncf.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas Loteses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
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

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Sucursal.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ejercicio.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Periodo.(*)</pre>
			</th>
		<?php } ?>

		<?php if($IS_DEVELOPING) { ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Usuario.(*)</pre>
			</th>
		<?php } ?>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Numero.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Emision.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Descripcion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Parcial.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Moneda.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Vencimiento.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro De Pagos.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Balance.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Pagado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Pagado.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Destino.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Destino.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nombre Pc.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Hora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Monto Mora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Interes Mora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Dias Gracia Mora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Instrumento Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Tipo Cambio.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Clase Registro.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Estado Registro.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Motivo Anulacion.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 1.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto 2.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Impuesto Incluido.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Observaciones.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Grupo Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Termino Idpv.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Forma Pago Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Nro Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Referencia Pago.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Fecha Hora.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Id Base.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Cuenta Cliente.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Ncf.(*)</pre>
			</th>

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Devolucion Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Facturas Loteses</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($documento_cuenta_cobrarsLocal!=null && count($documento_cuenta_cobrarsLocal)>0) { ?>
			<?php foreach ($documento_cuenta_cobrarsLocal as $documento_cuenta_cobrar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($documento_cuenta_cobrar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$documento_cuenta_cobrar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($documento_cuenta_cobrar->id) ?>
							</td>
							<td>
								<img class="imgseleccionardocumento_cuenta_cobrar" idactualdocumento_cuenta_cobrar="<?php echo($documento_cuenta_cobrar->id) ?>" title="SELECCIONAR Documentos Cuentas por Cobrar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($documento_cuenta_cobrar->id) ?>
							</td>
							<td>
								<img class="imgeliminartabladocumento_cuenta_cobrar" idactualdocumento_cuenta_cobrar="<?php echo($documento_cuenta_cobrar->id) ?>" title="ELIMINAR Documentos Cuentas por Cobrar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($documento_cuenta_cobrar->i) ?>" name="t-id_<?php echo($documento_cuenta_cobrar->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Documentos Cuentas por Cobrar ACTUAL" value="<?php echo($documento_cuenta_cobrar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_0" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_0" type="text" maxlength="25" value="<?php echo($documento_cuenta_cobrar->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($documento_cuenta_cobrar->id) ?><img class="imgseleccionarmostraraccionesrelacionesdocumento_cuenta_cobrar" idactualdocumento_cuenta_cobrar="<?php echo($documento_cuenta_cobrar->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $documento_cuenta_cobrar->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $documento_cuenta_cobrar->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_cobrar->id_empresa_Descripcion,$documento_cuenta_cobrar->id_empresa,'t-cel_'.$documento_cuenta_cobrar->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_sucursal" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_cobrar->id_sucursal_Descripcion,$documento_cuenta_cobrar->id_sucursal,'t-cel_'.$documento_cuenta_cobrar->i.'_4')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_cobrar->id_ejercicio_Descripcion,$documento_cuenta_cobrar->id_ejercicio,'t-cel_'.$documento_cuenta_cobrar->i.'_5')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_cobrar->id_periodo_Descripcion,$documento_cuenta_cobrar->id_periodo,'t-cel_'.$documento_cuenta_cobrar->i.'_6')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_cobrar->id_usuario_Descripcion,$documento_cuenta_cobrar->id_usuario,'t-cel_'.$documento_cuenta_cobrar->i.'_7')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero" >  '<textarea id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_8" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_8" class="form-control"  placeholder="Numero"  title="Numero"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($documento_cuenta_cobrar->numero) ?></textarea>
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero" >  '<input type="text" maxlength="250"  id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_8" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_8" class="form-control"  placeholder="Numero"  title="Numero"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($documento_cuenta_cobrar->numero) ?></input>
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_cliente" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_cobrar->id_cliente_Descripcion,$documento_cuenta_cobrar->id_cliente,'t-cel_'.$documento_cuenta_cobrar->i.'_9')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_tipo" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_10" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_10" type="text" class="form-control"  placeholder="Tipo"  title="Tipo"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->tipo) ?>" />
							<span id="spanstrMensajetipo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_tipo" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_10" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_10" type="text" class="form-control"  placeholder="Tipo"  title="Tipo"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->tipo) ?>" />
							<span id="spanstrMensajetipo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_emision" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_11" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_11" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10"  value="<?php echo($documento_cuenta_cobrar->fecha_emision) ?>" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_12" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_12" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_cobrar->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_12" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_12" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_cobrar->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_monto" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_13" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_13" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_cobrar->monto) ?>" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_monto_parcial" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_14" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_14" type="text" class="form-control"  placeholder="Monto Parcial"  title="Monto Parcial"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_cobrar->monto_parcial) ?>" >
							<span id="spanstrMensajemonto_parcial" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_moneda" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_15" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_15" type="text" class="form-control"  placeholder="Moneda"  title="Moneda"    size="1"  maxlength="1" value="<?php echo($documento_cuenta_cobrar->moneda) ?>" />
							<span id="spanstrMensajemoneda" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_moneda" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_15" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_15" type="text" class="form-control"  placeholder="Moneda"  title="Moneda"    size="1"  maxlength="1" value="<?php echo($documento_cuenta_cobrar->moneda) ?>" />
							<span id="spanstrMensajemoneda" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_vence" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_16" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_16" type="text" class="form-control"  placeholder="Fecha Vencimiento"  title="Fecha Vencimiento"    size="10"  value="<?php echo($documento_cuenta_cobrar->fecha_vence) ?>" >
							<span id="spanstrMensajefecha_vence" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_de_pagos" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_17" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_17" type="text" class="form-control"  placeholder="Nro De Pagos"  title="Nro De Pagos"    maxlength="10" size="10"  value="<?php echo($documento_cuenta_cobrar->numero_de_pagos) ?>" >
							<span id="spanstrMensajenumero_de_pagos" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_balance" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_18" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_18" type="text" class="form-control"  placeholder="Balance"  title="Balance"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_cobrar->balance) ?>" >
							<span id="spanstrMensajebalance" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero_pagado" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_19" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_19" type="text" class="form-control"  placeholder="Nro Documento Pagado"  title="Nro Documento Pagado"    size="10"  maxlength="10" value="<?php echo($documento_cuenta_cobrar->numero_pagado) ?>" />
							<span id="spanstrMensajenumero_pagado" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero_pagado" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_19" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_19" type="text" class="form-control"  placeholder="Nro Documento Pagado"  title="Nro Documento Pagado"    size="10"  maxlength="10" value="<?php echo($documento_cuenta_cobrar->numero_pagado) ?>" />
							<span id="spanstrMensajenumero_pagado" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_id_pagado" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_20" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_20" type="text" class="form-control"  placeholder="Id Pagado"  title="Id Pagado"    maxlength="19" size="10"  value="<?php echo($documento_cuenta_cobrar->id_pagado) ?>" >
							<span id="spanstrMensajeid_pagado" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_modulo_origen" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_21" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_21" type="text" class="form-control"  placeholder="Modulo Origen"  title="Modulo Origen"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->modulo_origen) ?>" />
							<span id="spanstrMensajemodulo_origen" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_modulo_origen" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_21" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_21" type="text" class="form-control"  placeholder="Modulo Origen"  title="Modulo Origen"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->modulo_origen) ?>" />
							<span id="spanstrMensajemodulo_origen" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_id_origen" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_22" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_22" type="text" class="form-control"  placeholder="Id Origen"  title="Id Origen"    maxlength="19" size="10"  value="<?php echo($documento_cuenta_cobrar->id_origen) ?>" >
							<span id="spanstrMensajeid_origen" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_modulo_destino" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_23" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_23" type="text" class="form-control"  placeholder="Modulo Destino"  title="Modulo Destino"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->modulo_destino) ?>" />
							<span id="spanstrMensajemodulo_destino" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_modulo_destino" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_23" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_23" type="text" class="form-control"  placeholder="Modulo Destino"  title="Modulo Destino"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->modulo_destino) ?>" />
							<span id="spanstrMensajemodulo_destino" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_id_destino" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_24" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_24" type="text" class="form-control"  placeholder="Id Destino"  title="Id Destino"    maxlength="19" size="10"  value="<?php echo($documento_cuenta_cobrar->id_destino) ?>" >
							<span id="spanstrMensajeid_destino" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_pc" >  '<textarea id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_25" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_25" class="form-control"  placeholder="Nombre Pc"  title="Nombre Pc"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_cobrar->nombre_pc) ?></textarea>
							<span id="spanstrMensajenombre_pc" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_pc" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_25" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_25" class="form-control"  placeholder="Nombre Pc"  title="Nombre Pc"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_cobrar->nombre_pc) ?></input>
							<span id="spanstrMensajenombre_pc" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_hora" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_26" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_26" type="text" class="form-control"  placeholder="Hora"  title="Hora"    size="10"  value="<?php echo($documento_cuenta_cobrar->hora) ?>" >
							<span id="spanstrMensajehora" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_monto_mora" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_27" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_27" type="text" class="form-control"  placeholder="Monto Mora"  title="Monto Mora"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_cobrar->monto_mora) ?>" >
							<span id="spanstrMensajemonto_mora" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_interes_mora" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_28" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_28" type="text" class="form-control"  placeholder="Interes Mora"  title="Interes Mora"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_cobrar->interes_mora) ?>" >
							<span id="spanstrMensajeinteres_mora" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_dias_gracia_mora" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_29" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_29" type="text" class="form-control"  placeholder="Dias Gracia Mora"  title="Dias Gracia Mora"    maxlength="10" size="10"  value="<?php echo($documento_cuenta_cobrar->dias_gracia_mora) ?>" >
							<span id="spanstrMensajedias_gracia_mora" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_instrumento_pago" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_30" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_30" type="text" class="form-control"  placeholder="Instrumento Pago"  title="Instrumento Pago"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->instrumento_pago) ?>" />
							<span id="spanstrMensajeinstrumento_pago" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_instrumento_pago" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_30" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_30" type="text" class="form-control"  placeholder="Instrumento Pago"  title="Instrumento Pago"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->instrumento_pago) ?>" />
							<span id="spanstrMensajeinstrumento_pago" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_tipo_cambio" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_31" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_31" type="text" class="form-control"  placeholder="Tipo Cambio"  title="Tipo Cambio"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_cobrar->tipo_cambio) ?>" >
							<span id="spanstrMensajetipo_cambio" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero_cliente" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_32" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_32" type="text" class="form-control"  placeholder="Nro Documento Cliente"  title="Nro Documento Cliente"    size="20"  maxlength="30" value="<?php echo($documento_cuenta_cobrar->numero_cliente) ?>" />
							<span id="spanstrMensajenumero_cliente" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero_cliente" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_32" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_32" type="text" class="form-control"  placeholder="Nro Documento Cliente"  title="Nro Documento Cliente"    size="20"  maxlength="30" value="<?php echo($documento_cuenta_cobrar->numero_cliente) ?>" />
							<span id="spanstrMensajenumero_cliente" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_clase_registro" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_33" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_33" type="text" class="form-control"  placeholder="Clase Registro"  title="Clase Registro"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->clase_registro) ?>" />
							<span id="spanstrMensajeclase_registro" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_clase_registro" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_33" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_33" type="text" class="form-control"  placeholder="Clase Registro"  title="Clase Registro"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->clase_registro) ?>" />
							<span id="spanstrMensajeclase_registro" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_estado_registro" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_34" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_34" type="text" class="form-control"  placeholder="Estado Registro"  title="Estado Registro"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->estado_registro) ?>" />
							<span id="spanstrMensajeestado_registro" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_estado_registro" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_34" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_34" type="text" class="form-control"  placeholder="Estado Registro"  title="Estado Registro"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->estado_registro) ?>" />
							<span id="spanstrMensajeestado_registro" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_motivo_anulacion" >  '<textarea id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_35" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_35" class="form-control"  placeholder="Motivo Anulacion"  title="Motivo Anulacion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($documento_cuenta_cobrar->motivo_anulacion) ?></textarea>
							<span id="spanstrMensajemotivo_anulacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_motivo_anulacion" >  '<input type="text" maxlength="1000"  id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_35" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_35" class="form-control"  placeholder="Motivo Anulacion"  title="Motivo Anulacion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($documento_cuenta_cobrar->motivo_anulacion) ?></input>
							<span id="spanstrMensajemotivo_anulacion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_impuesto_1" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_36" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_36" type="text" class="form-control"  placeholder="Impuesto 1"  title="Impuesto 1"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_cobrar->impuesto_1) ?>" >
							<span id="spanstrMensajeimpuesto_1" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_impuesto_2" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_37" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_37" type="text" class="form-control"  placeholder="Impuesto 2"  title="Impuesto 2"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_cobrar->impuesto_2) ?>" >
							<span id="spanstrMensajeimpuesto_2" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_impuesto_incluido" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_38" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_38" type="text" class="form-control"  placeholder="Impuesto Incluido"  title="Impuesto Incluido"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->impuesto_incluido) ?>" />
							<span id="spanstrMensajeimpuesto_incluido" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_impuesto_incluido" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_38" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_38" type="text" class="form-control"  placeholder="Impuesto Incluido"  title="Impuesto Incluido"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_cobrar->impuesto_incluido) ?>" />
							<span id="spanstrMensajeimpuesto_incluido" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_observaciones" >  '<textarea id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_39" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_39" class="form-control"  placeholder="Observaciones"  title="Observaciones"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($documento_cuenta_cobrar->observaciones) ?></textarea>
							<span id="spanstrMensajeobservaciones" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_observaciones" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_39" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_39" class="form-control"  placeholder="Observaciones"  title="Observaciones"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($documento_cuenta_cobrar->observaciones) ?></input>
							<span id="spanstrMensajeobservaciones" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_grupo_pago" >  '<textarea id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_40" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_40" class="form-control"  placeholder="Grupo Pago"  title="Grupo Pago"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_cobrar->grupo_pago) ?></textarea>
							<span id="spanstrMensajegrupo_pago" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_grupo_pago" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_40" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_40" class="form-control"  placeholder="Grupo Pago"  title="Grupo Pago"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_cobrar->grupo_pago) ?></input>
							<span id="spanstrMensajegrupo_pago" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_termino_idpv" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_41" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_41" type="text" class="form-control"  placeholder="Termino Idpv"  title="Termino Idpv"    maxlength="19" size="10"  value="<?php echo($documento_cuenta_cobrar->termino_idpv) ?>" >
							<span id="spanstrMensajetermino_idpv" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_forma_pago_cliente" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_cobrar->id_forma_pago_cliente_Descripcion,$documento_cuenta_cobrar->id_forma_pago_cliente,'t-cel_'.$documento_cuenta_cobrar->i.'_42')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nro_pago" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_43" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_43" type="text" class="form-control"  placeholder="Nro Pago"  title="Nro Pago"    size="20"  maxlength="30" value="<?php echo($documento_cuenta_cobrar->nro_pago) ?>" />
							<span id="spanstrMensajenro_pago" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nro_pago" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_43" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_43" type="text" class="form-control"  placeholder="Nro Pago"  title="Nro Pago"    size="20"  maxlength="30" value="<?php echo($documento_cuenta_cobrar->nro_pago) ?>" />
							<span id="spanstrMensajenro_pago" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_ref_pago" >  '<textarea id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_44" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_44" class="form-control"  placeholder="Referencia Pago"  title="Referencia Pago"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_cobrar->ref_pago) ?></textarea>
							<span id="spanstrMensajeref_pago" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_ref_pago" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_44" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_44" class="form-control"  placeholder="Referencia Pago"  title="Referencia Pago"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_cobrar->ref_pago) ?></input>
							<span id="spanstrMensajeref_pago" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_hora" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_45" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_45" type="text" class="form-control"  placeholder="Fecha Hora"  title="Fecha Hora"    size="10"  value="<?php echo($documento_cuenta_cobrar->fecha_hora) ?>" >
							<span id="spanstrMensajefecha_hora" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_id_base" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_46" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_46" type="text" class="form-control"  placeholder="Id Base"  title="Id Base"    maxlength="19" size="10"  value="<?php echo($documento_cuenta_cobrar->id_base) ?>" >
							<span id="spanstrMensajeid_base" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_cuenta_corriente" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_cobrar->id_cuenta_corriente_Descripcion,$documento_cuenta_cobrar->id_cuenta_corriente,'t-cel_'.$documento_cuenta_cobrar->i.'_47')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_ncf" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_48" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_48" type="text" class="form-control"  placeholder="Ncf"  title="Ncf"    size="20"  maxlength="50" value="<?php echo($documento_cuenta_cobrar->ncf) ?>" />
							<span id="spanstrMensajencf" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_ncf" >  '
							<input id="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_48" name="t-cel_<?php echo($documento_cuenta_cobrar->i) ?>_48" type="text" class="form-control"  placeholder="Ncf"  title="Ncf"    size="20"  maxlength="50" value="<?php echo($documento_cuenta_cobrar->ncf) ?>" />
							<span id="spanstrMensajencf" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($documento_cuenta_cobrar->id) ?>
							<img class="imgrelaciondevolucion_factura" idactualdocumento_cuenta_cobrar="<?php echo($documento_cuenta_cobrar->id) ?>" title="Devolucion FacturaS DE Documentos Cuentas por Cobrar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/devolucion_facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($documento_cuenta_cobrar->id) ?>
							<img class="imgrelacionfactura" idactualdocumento_cuenta_cobrar="<?php echo($documento_cuenta_cobrar->id) ?>" title="FacturaS DE Documentos Cuentas por Cobrar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/facturas.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($documento_cuenta_cobrar->id) ?>
							<img class="imgrelacionfactura_lote" idactualdocumento_cuenta_cobrar="<?php echo($documento_cuenta_cobrar->id) ?>" title="Facturas LotesS DE Documentos Cuentas por Cobrar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/factura_lotes.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($documento_cuenta_cobrar->id) ?>
							<img class="imgrelacionimagen_documento_cuenta_cobrar" idactualdocumento_cuenta_cobrar="<?php echo($documento_cuenta_cobrar->id) ?>" title="Imagenes Documentos Cuentas por CobrarS DE Documentos Cuentas por Cobrar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/imagen_documento_cuenta_cobrars.gif" alt="Seleccionar" border="" height="15" width="15">
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



