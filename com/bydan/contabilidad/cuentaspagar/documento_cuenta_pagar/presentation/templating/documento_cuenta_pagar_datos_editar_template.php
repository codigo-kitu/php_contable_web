



		<form id="frmTablaDatosdocumento_cuenta_pagar" name="frmTablaDatosdocumento_cuenta_pagar">
			<div id="divTablaDatosAuxiliardocumento_cuenta_pagarsAjaxWebPart" style="<?php echo($style_div) ?>">

				<input type="hidden" id="t<?php echo($strSufijo) ?>-maxima_fila" name="t<?php echo($strSufijo) ?>-maxima_fila" value="<?php echo(count($documento_cuenta_pagars)) ?>">

		<?php if(!$bitEsRelacionado) { ?>
			
			<table  id="tblTablaTitulodocumento_cuenta_pagar" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td>
						<span class="titulotabla">Documentos Cuentas por Pagares</span>
					</td>
				</tr>
			</table>
		<?php } ?>

		<table id="tblTablaDatosdocumento_cuenta_pagars" name="tblTablaDatosdocumento_cuenta_pagars" class="<?php echo($class_table) ?>" cellpadding="3" cellspacing="3" style="<?php echo($style_tabla) ?>" border="1" rules="rows">

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
				<pre class="cabecera_texto_titulo_tabla">Proveedor.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Balance Mon.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Destino.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Destino.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Proveedor.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Impuesto Incluido</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Forma Pago Proveedor.(*)</pre>
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

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Devoluciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
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
				<pre class="cabecera_texto_titulo_tabla">Proveedor.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Balance Mon.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Origen.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Modulo Destino.(*)</pre>
			</th>
		
			<th class="cabecera_titulo_tabla" >
				<pre class="cabecera_texto_titulo_tabla">Destino.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Nro Documento Proveedor.(*)</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Impuesto Incluido</pre>
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
				<pre class="cabecera_texto_titulo_tabla">Forma Pago Proveedor.(*)</pre>
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

		<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

		
			<th style="display:table-cell">
				<b><pre>Devoluciones</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Imagenes es</pre></b>
			</th>

		
			<th style="display:table-cell">
				<b><pre>Orden Compras</pre></b>
			</th>

		<?php } ?>
		<th style="display:none" class="actions"></th>

		
				</tr>
			</tfoot>
		<?php }/*!$bitEsRelacionado*/ ?>

		<tbody>

		<?php if($documento_cuenta_pagarsLocal!=null && count($documento_cuenta_pagarsLocal)>0) { ?>
			<?php foreach ($documento_cuenta_pagarsLocal as $documento_cuenta_pagar) { ?>

				<?php if($STR_TIPO_TABLA!='normal') { ?>
					
					<tr>
					
				<?php } else { ?>
					

					<tr class="<?php echo($funciones->getClassRowTableHtml($documento_cuenta_pagar->i)) ?>" <?php echo($funciones->getOnMouseOverHtml($STR_TIPO_TABLA,$documento_cuenta_pagar->i)) ?> >
				<?php } ?>

				<?php //CHECKBOX SELECCIONAR, ELIMINAR Y TEXTBOX ID ?>
				
				<td class="elementotabla col_id" >
					<a>
					<table>
						<tr>
							<td>
								<?php echo($documento_cuenta_pagar->id) ?>
							</td>
							<td>
								<img class="imgseleccionardocumento_cuenta_pagar" idactualdocumento_cuenta_pagar="<?php echo($documento_cuenta_pagar->id) ?>" title="SELECCIONAR Documentos Cuentas por Pagar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/seleccionar.gif" alt="Seleccionar" border="0" height="15" width="15">
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
								<?php echo($documento_cuenta_pagar->id) ?>
							</td>
							<td>
								<img class="imgeliminartabladocumento_cuenta_pagar" idactualdocumento_cuenta_pagar="<?php echo($documento_cuenta_pagar->id) ?>" title="ELIMINAR Documentos Cuentas por Pagar ACTUAL" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/eliminar.gif" alt="Eliminar" border="0" height="15" width="15">
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
								<input id="t-id_<?php echo($documento_cuenta_pagar->i) ?>" name="t-id_<?php echo($documento_cuenta_pagar->i) ?>" type="checkbox" class="chkb_id" title="SELECCIONAR Documentos Cuentas por Pagar ACTUAL" value="<?php echo($documento_cuenta_pagar->id) ?>"></input>
							</td>
							<td>
								<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_0" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_0" type="text" maxlength="25" value="<?php echo($documento_cuenta_pagar->id) ?>" style="width:50px" readonly></input>
							</td>
						</tr>
					</table>
				</td>

				
				<td class="elementotabla columna_tabla_selrel col_id"  style="display:<?php echo($strPermisoRelaciones) ?>">
					<a>
						<?php echo($documento_cuenta_pagar->id) ?><img class="imgseleccionarmostraraccionesrelacionesdocumento_cuenta_pagar" idactualdocumento_cuenta_pagar="<?php echo($documento_cuenta_pagar->id) ?>" title="DATOS RELACIONADOS" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/ejecutar_acciones.gif" alt="Ver" border="0" height="15" width="15">
					</a>
				</td>
				
					<td class="elementotabla col_created_at"  style="display:none">  $documento_cuenta_pagar->updated_at 
					</td>
				
					<td class="elementotabla col_updated_at"  style="display:none">  $documento_cuenta_pagar->updated_at 
					</td>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_empresa" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_pagar->id_empresa_Descripcion,$documento_cuenta_pagar->id_empresa,'t-cel_'.$documento_cuenta_pagar->i.'_3')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_sucursal" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_pagar->id_sucursal_Descripcion,$documento_cuenta_pagar->id_sucursal,'t-cel_'.$documento_cuenta_pagar->i.'_4')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_ejercicio" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_pagar->id_ejercicio_Descripcion,$documento_cuenta_pagar->id_ejercicio,'t-cel_'.$documento_cuenta_pagar->i.'_5')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_periodo" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_pagar->id_periodo_Descripcion,$documento_cuenta_pagar->id_periodo,'t-cel_'.$documento_cuenta_pagar->i.'_6')) ?></td>
				<?php } ?>
				<?php if($IS_DEVELOPING) { ?>
				<td class="elementotabla col_id_usuario" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_pagar->id_usuario_Descripcion,$documento_cuenta_pagar->id_usuario,'t-cel_'.$documento_cuenta_pagar->i.'_7')) ?></td>
				<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero" >  '<textarea id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_8" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_8" class="form-control"  placeholder="Numero"  title="Numero"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($documento_cuenta_pagar->numero) ?></textarea>
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero" >  '<input type="text" maxlength="250"  id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_8" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_8" class="form-control"  placeholder="Numero"  title="Numero"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($documento_cuenta_pagar->numero) ?></input>
							<span id="spanstrMensajenumero" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				<td class="elementotabla col_id_proveedor" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_pagar->id_proveedor_Descripcion,$documento_cuenta_pagar->id_proveedor,'t-cel_'.$documento_cuenta_pagar->i.'_9')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_tipo" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_10" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_10" type="text" class="form-control"  placeholder="Tipo"  title="Tipo"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->tipo) ?>" />
							<span id="spanstrMensajetipo" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_tipo" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_10" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_10" type="text" class="form-control"  placeholder="Tipo"  title="Tipo"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->tipo) ?>" />
							<span id="spanstrMensajetipo" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_emision" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_11" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_11" type="text" class="form-control"  placeholder="Fecha Emision"  title="Fecha Emision"    size="10"  value="<?php echo($documento_cuenta_pagar->fecha_emision) ?>" >
							<span id="spanstrMensajefecha_emision" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_descripcion" >  '<textarea id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_12" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_12" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_pagar->descripcion) ?></textarea>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_descripcion" >  '<input type="text" maxlength="120"  id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_12" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_12" class="form-control"  placeholder="Descripcion"  title="Descripcion"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_pagar->descripcion) ?></input>
							<span id="spanstrMensajedescripcion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_monto" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_13" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_13" type="text" class="form-control"  placeholder="Monto"  title="Monto"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_pagar->monto) ?>" >
							<span id="spanstrMensajemonto" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_monto_parcial" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_14" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_14" type="text" class="form-control"  placeholder="Monto Parcial"  title="Monto Parcial"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_pagar->monto_parcial) ?>" >
							<span id="spanstrMensajemonto_parcial" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_moneda" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_15" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_15" type="text" class="form-control"  placeholder="Moneda"  title="Moneda"    size="1"  maxlength="1" value="<?php echo($documento_cuenta_pagar->moneda) ?>" />
							<span id="spanstrMensajemoneda" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_moneda" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_15" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_15" type="text" class="form-control"  placeholder="Moneda"  title="Moneda"    size="1"  maxlength="1" value="<?php echo($documento_cuenta_pagar->moneda) ?>" />
							<span id="spanstrMensajemoneda" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_vence" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_16" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_16" type="text" class="form-control"  placeholder="Fecha Vencimiento"  title="Fecha Vencimiento"    size="10"  value="<?php echo($documento_cuenta_pagar->fecha_vence) ?>" >
							<span id="spanstrMensajefecha_vence" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_numero_de_pagos" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_17" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_17" type="text" class="form-control"  placeholder="Nro De Pagos"  title="Nro De Pagos"    maxlength="10" size="10"  value="<?php echo($documento_cuenta_pagar->numero_de_pagos) ?>" >
							<span id="spanstrMensajenumero_de_pagos" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_balance" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_18" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_18" type="text" class="form-control"  placeholder="Balance"  title="Balance"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_pagar->balance) ?>" >
							<span id="spanstrMensajebalance" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_balance_mon" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_19" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_19" type="text" class="form-control"  placeholder="Balance Mon"  title="Balance Mon"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_pagar->balance_mon) ?>" >
							<span id="spanstrMensajebalance_mon" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_numero_pagado" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_20" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_20" type="text" class="form-control"  placeholder="Nro Documento Pagado"  title="Nro Documento Pagado"    size="10"  maxlength="10" value="<?php echo($documento_cuenta_pagar->numero_pagado) ?>" />
							<span id="spanstrMensajenumero_pagado" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_numero_pagado" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_20" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_20" type="text" class="form-control"  placeholder="Nro Documento Pagado"  title="Nro Documento Pagado"    size="10"  maxlength="10" value="<?php echo($documento_cuenta_pagar->numero_pagado) ?>" />
							<span id="spanstrMensajenumero_pagado" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_id_pagado" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_21" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_21" type="text" class="form-control"  placeholder="Id Pagado"  title="Id Pagado"    maxlength="19" size="10"  value="<?php echo($documento_cuenta_pagar->id_pagado) ?>" >
							<span id="spanstrMensajeid_pagado" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_modulo_origen" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_22" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_22" type="text" class="form-control"  placeholder="Modulo Origen"  title="Modulo Origen"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->modulo_origen) ?>" />
							<span id="spanstrMensajemodulo_origen" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_modulo_origen" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_22" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_22" type="text" class="form-control"  placeholder="Modulo Origen"  title="Modulo Origen"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->modulo_origen) ?>" />
							<span id="spanstrMensajemodulo_origen" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_id_origen" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_23" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_23" type="text" class="form-control"  placeholder="Origen"  title="Origen"    maxlength="19" size="10"  value="<?php echo($documento_cuenta_pagar->id_origen) ?>" >
							<span id="spanstrMensajeid_origen" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_modulo_destino" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_24" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_24" type="text" class="form-control"  placeholder="Modulo Destino"  title="Modulo Destino"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->modulo_destino) ?>" />
							<span id="spanstrMensajemodulo_destino" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_modulo_destino" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_24" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_24" type="text" class="form-control"  placeholder="Modulo Destino"  title="Modulo Destino"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->modulo_destino) ?>" />
							<span id="spanstrMensajemodulo_destino" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_id_destino" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_25" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_25" type="text" class="form-control"  placeholder="Destino"  title="Destino"    maxlength="19" size="10"  value="<?php echo($documento_cuenta_pagar->id_destino) ?>" >
							<span id="spanstrMensajeid_destino" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nombre_pc" >  '<textarea id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_26" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_26" class="form-control"  placeholder="Nombre Pc"  title="Nombre Pc"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_pagar->nombre_pc) ?></textarea>
							<span id="spanstrMensajenombre_pc" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nombre_pc" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_26" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_26" class="form-control"  placeholder="Nombre Pc"  title="Nombre Pc"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_pagar->nombre_pc) ?></input>
							<span id="spanstrMensajenombre_pc" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_hora" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_27" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_27" type="text" class="form-control"  placeholder="Hora"  title="Hora"    size="10"  value="<?php echo($documento_cuenta_pagar->hora) ?>" >
							<span id="spanstrMensajehora" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_monto_mora" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_28" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_28" type="text" class="form-control"  placeholder="Monto Mora"  title="Monto Mora"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_pagar->monto_mora) ?>" >
							<span id="spanstrMensajemonto_mora" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_interes_mora" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_29" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_29" type="text" class="form-control"  placeholder="Interes Mora"  title="Interes Mora"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_pagar->interes_mora) ?>" >
							<span id="spanstrMensajeinteres_mora" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_dias_gracia_mora" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_30" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_30" type="text" class="form-control"  placeholder="Dias Gracia Mora"  title="Dias Gracia Mora"    maxlength="10" size="10"  value="<?php echo($documento_cuenta_pagar->dias_gracia_mora) ?>" >
							<span id="spanstrMensajedias_gracia_mora" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_instrumento_pago" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_31" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_31" type="text" class="form-control"  placeholder="Instrumento Pago"  title="Instrumento Pago"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->instrumento_pago) ?>" />
							<span id="spanstrMensajeinstrumento_pago" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_instrumento_pago" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_31" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_31" type="text" class="form-control"  placeholder="Instrumento Pago"  title="Instrumento Pago"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->instrumento_pago) ?>" />
							<span id="spanstrMensajeinstrumento_pago" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_tipo_cambio" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_32" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_32" type="text" class="form-control"  placeholder="Tipo Cambio"  title="Tipo Cambio"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_pagar->tipo_cambio) ?>" >
							<span id="spanstrMensajetipo_cambio" class="mensajeerror"></span>' 
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nro_documento_proveedor" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_33" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_33" type="text" class="form-control"  placeholder="Nro Documento Proveedor"  title="Nro Documento Proveedor"    size="20"  maxlength="30" value="<?php echo($documento_cuenta_pagar->nro_documento_proveedor) ?>" />
							<span id="spanstrMensajenro_documento_proveedor" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nro_documento_proveedor" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_33" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_33" type="text" class="form-control"  placeholder="Nro Documento Proveedor"  title="Nro Documento Proveedor"    size="20"  maxlength="30" value="<?php echo($documento_cuenta_pagar->nro_documento_proveedor) ?>" />
							<span id="spanstrMensajenro_documento_proveedor" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_clase_registro" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_34" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_34" type="text" class="form-control"  placeholder="Clase Registro"  title="Clase Registro"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->clase_registro) ?>" />
							<span id="spanstrMensajeclase_registro" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_clase_registro" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_34" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_34" type="text" class="form-control"  placeholder="Clase Registro"  title="Clase Registro"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->clase_registro) ?>" />
							<span id="spanstrMensajeclase_registro" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_estado_registro" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_35" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_35" type="text" class="form-control"  placeholder="Estado Registro"  title="Estado Registro"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->estado_registro) ?>" />
							<span id="spanstrMensajeestado_registro" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_estado_registro" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_35" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_35" type="text" class="form-control"  placeholder="Estado Registro"  title="Estado Registro"    size="2"  maxlength="2" value="<?php echo($documento_cuenta_pagar->estado_registro) ?>" />
							<span id="spanstrMensajeestado_registro" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_motivo_anulacion" >  '<textarea id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_36" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_36" class="form-control"  placeholder="Motivo Anulacion"  title="Motivo Anulacion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($documento_cuenta_pagar->motivo_anulacion) ?></textarea>
							<span id="spanstrMensajemotivo_anulacion" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_motivo_anulacion" >  '<input type="text" maxlength="1000"  id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_36" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_36" class="form-control"  placeholder="Motivo Anulacion"  title="Motivo Anulacion"   style="font-size: 13px;"  rows ="2" cols= "15"><?php echo($documento_cuenta_pagar->motivo_anulacion) ?></input>
							<span id="spanstrMensajemotivo_anulacion" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_impuesto_1" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_37" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_37" type="text" class="form-control"  placeholder="Impuesto 1"  title="Impuesto 1"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_pagar->impuesto_1) ?>" >
							<span id="spanstrMensajeimpuesto_1" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_impuesto_2" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_38" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_38" type="text" class="form-control"  placeholder="Impuesto 2"  title="Impuesto 2"    maxlength="18" size="12"  value="<?php echo($documento_cuenta_pagar->impuesto_2) ?>" >
							<span id="spanstrMensajeimpuesto_2" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_impuesto_incluido" ><?php  $funciones->getCheckBoxEditar($documento_cuenta_pagar->impuesto_incluido,'t-cel_<?php echo($documento_cuenta_pagar->i) ?>_39',$paraReporte)  ?>
						</td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_observaciones" >  '<textarea id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_40" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_40" class="form-control"  placeholder="Observaciones"  title="Observaciones"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($documento_cuenta_pagar->observaciones) ?></textarea>
							<span id="spanstrMensajeobservaciones" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_observaciones" >  '<input type="text" maxlength="-1"  id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_40" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_40" class="form-control"  placeholder="Observaciones"  title="Observaciones"   style="font-size: 13px;"  rows ="0" cols= "15"><?php echo($documento_cuenta_pagar->observaciones) ?></input>
							<span id="spanstrMensajeobservaciones" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_grupo_pago" >  '<textarea id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_41" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_41" class="form-control"  placeholder="Grupo Pago"  title="Grupo Pago"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_pagar->grupo_pago) ?></textarea>
							<span id="spanstrMensajegrupo_pago" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_grupo_pago" >  '<input type="text" maxlength="100"  id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_41" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_41" class="form-control"  placeholder="Grupo Pago"  title="Grupo Pago"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_pagar->grupo_pago) ?></input>
							<span id="spanstrMensajegrupo_pago" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_termino_idpv" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_42" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_42" type="text" class="form-control"  placeholder="Termino Idpv"  title="Termino Idpv"    maxlength="19" size="10"  value="<?php echo($documento_cuenta_pagar->termino_idpv) ?>" >
							<span id="spanstrMensajetermino_idpv" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_forma_pago_proveedor" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_pagar->id_forma_pago_proveedor_Descripcion,$documento_cuenta_pagar->id_forma_pago_proveedor,'t-cel_'.$documento_cuenta_pagar->i.'_43')) ?></td>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_nro_pago" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_44" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_44" type="text" class="form-control"  placeholder="Nro Pago"  title="Nro Pago"    size="20"  maxlength="30" value="<?php echo($documento_cuenta_pagar->nro_pago) ?>" />
							<span id="spanstrMensajenro_pago" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_nro_pago" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_44" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_44" type="text" class="form-control"  placeholder="Nro Pago"  title="Nro Pago"    size="20"  maxlength="30" value="<?php echo($documento_cuenta_pagar->nro_pago) ?>" />
							<span id="spanstrMensajenro_pago" class="mensajeerror"></span>' 
						</td>
					<?php } ?>

					<?php if($bitConUiMinimo==false) { ?>

				
						<td class="elementotabla col_referencia_pago" >  '<textarea id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_45" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_45" class="form-control"  placeholder="Referencia Pago"  title="Referencia Pago"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_pagar->referencia_pago) ?></textarea>
							<span id="spanstrMensajereferencia_pago" class="mensajeerror"></span>' 
						</td>
					<?php } else { ?>

				
						<td class="elementotabla col_referencia_pago" >  '<input type="text" maxlength="80"  id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_45" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_45" class="form-control"  placeholder="Referencia Pago"  title="Referencia Pago"   style="font-size: 13px;" rows="2" cols="15" size="20" ><?php echo($documento_cuenta_pagar->referencia_pago) ?></input>
							<span id="spanstrMensajereferencia_pago" class="mensajeerror"></span>' 
						</td>
					<?php } ?>
				
						<td class="elementotabla col_fecha_hora" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_46" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_46" type="text" class="form-control"  placeholder="Fecha Hora"  title="Fecha Hora"    size="10"  value="<?php echo($documento_cuenta_pagar->fecha_hora) ?>" >
							<span id="spanstrMensajefecha_hora" class="mensajeerror"></span>' 
						</td>
				
						<td class="elementotabla col_id_base" >  '
							<input id="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_47" name="t-cel_<?php echo($documento_cuenta_pagar->i) ?>_47" type="text" class="form-control"  placeholder="Id Base"  title="Id Base"    maxlength="19" size="10"  value="<?php echo($documento_cuenta_pagar->id_base) ?>" >
							<span id="spanstrMensajeid_base" class="mensajeerror"></span>' 
						</td>
				<td class="elementotabla col_id_cuenta_corriente" ><?php echo($funciones->getComboBoxEditar($documento_cuenta_pagar->id_cuenta_corriente_Descripcion,$documento_cuenta_pagar->id_cuenta_corriente,'t-cel_'.$documento_cuenta_pagar->i.'_48')) ?></td>

				<?php if(!$bitEsBusqueda && !$bitEsRelaciones) { ?>

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($documento_cuenta_pagar->id) ?>
							<img class="imgrelaciondevolucion" idactualdocumento_cuenta_pagar="<?php echo($documento_cuenta_pagar->id) ?>" title="DevolucionS DE Documentos Cuentas por Pagar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/devolucions.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($documento_cuenta_pagar->id) ?>
							<img class="imgrelacionimagen_documento_cuenta_pagar" idactualdocumento_cuenta_pagar="<?php echo($documento_cuenta_pagar->id) ?>" title="Imagenes Documentos Cuentas por PagarS DE Documentos Cuentas por Pagar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/imagen_documento_cuenta_pagars.gif" alt="Seleccionar" border="" height="15" width="15">
						</a>
					</td>
		

				
		
					<td class="elementotabla"  align="center" style="display:table-cell">
						<a><?php echo($documento_cuenta_pagar->id) ?>
							<img class="imgrelacionorden_compra" idactualdocumento_cuenta_pagar="<?php echo($documento_cuenta_pagar->id) ?>" title="Orden CompraS DE Documentos Cuentas por Pagar" src="<?php echo($PATH_IMAGEN) ?>/Imagenes/orden_compras.gif" alt="Seleccionar" border="" height="15" width="15">
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



