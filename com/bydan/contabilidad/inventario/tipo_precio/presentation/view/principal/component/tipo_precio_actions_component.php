<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\tipo_precio\presentation\view\principal\component;

use com\bydan\contabilidad\inventario\tipo_precio\presentation\view\tipo_precio_web;

?>


				<div id="divtipo_precioPaginacionAjaxWebPart">
				<form id="frmPaginaciontipo_precio" name="frmPaginaciontipo_precio">
				<!-- SECCION/ACCIONES -->
				<table id="tblPaginaciontipo_precio" style="width: 250px;padding: 0px; border-spacing: 0px;text-align:center">
					<tr>
						<?php if(tipo_precio_web::$STR_ES_BUSQUEDA=='true') {?>
						<td align="left">
							<input type="button" id="btnSeleccionarLoteFktipo_precio" name="btnSeleccionarLoteFktipo_precio" title="SELECCIONAR LOTE" value="Sel. Lote" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false' /*&& tipo_precio_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnAnteriorestipo_precio" name="btnAnteriorestipo_precio" title="ANTERIORES" value="&lt;&lt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
						<?php if(tipo_precio_web::$STR_ES_BUSQUEDA=='false' && tipo_precio_web::$STR_ES_RELACIONES=='false') {?>
						<td align="center" id="tdtipo_precioNuevoGuardarCambios" style="visibility:visible">
							<input type="button" id="btnNuevoTablaPreparartipo_precio" name="btnNuevoTablaPreparartipo_precio" title="NUEVO Tipo Precio" value="   Nuevo T." class="btn btn-primary"/>
							<input id="ParamsPaginar-txtNumeroNuevoTablatipo_precio" name="ParamsPaginar-txtNumeroNuevoTablatipo_precio" type="text" class="form-control" value="1" size="2"/>
						</td>
						<?php } ?>

						<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='true') {?>
						<td id="tdtipo_precioConEditartipo_precio">
							<label>
								<input id="ParamsBuscar-chbConEditartipo_precio" name="ParamsBuscar-chbConEditartipo_precio" title="EDITAR INFORMACION" type="checkbox"/>Edición
							</label>
						</td>
						<?php } ?>

						<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false'/* && tipo_precio_web::$STR_ES_RELACIONES=='false'*/ ) {?>
						<td align="center">
							<input type="button" id="btnSiguientestipo_precio" name="btnSiguientestipo_precio" title="SIGUIENTES" value="&gt;&gt;" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblPaginaciontipo_precio -->
				</form> <!-- frmPaginaciontipo_precio -->
				<form id="frmNuevoPreparartipo_precio" name="frmNuevoPreparartipo_precio">
				<table id="tblNuevoPreparartipo_precio" style="width: 100px; padding: 0px; border-spacing: 0px; text-align:center">
					<tr id="trtipo_precioNuevo" height="10">
						<?php if(tipo_precio_web::$STR_ES_BUSQUEDA=='false' ) {?>
						<td id="tdtipo_precioNuevo" align="center">
							<input type="button" id="btnNuevoPreparartipo_precio" name="btnNuevoPreparartipo_precio" title="NUEVO Tipo Precio" value="   Nuevo" class="btn btn-primary"/>
						</td>
						<td id="tdtipo_precioGuardarCambios" align="center">
							<input type="button" id="btnGuardarCambiostipo_precio" name="btnGuardarCambiostipo_precio" title="GUARDAR Tipo Precio" value="   Guardar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false' && tipo_precio_web::$STR_ES_RELACIONES=='false' && tipo_precio_web::$STR_ES_BUSQUEDA=='false') {?>
						<td id="tdtipo_precioDuplicar" align="center">
							<input type="button" id="btnDuplicartipo_precio" name="btnDuplicartipo_precio" title="DUPLICAR Tipo Precio" value="   Duplicar" class="btn btn-primary"/>
						</td>
						<td id="tdtipo_precioCopiar" align="center">
							<input type="button" id="btnCopiartipo_precio" name="btnCopiartipo_precio" title="COPIAR Tipo Precio" value="   Copiar" class="btn btn-primary"/>
						</td>
						<?php } ?>

						<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false' && ((tipo_precio_web::$STR_ES_RELACIONADO=='false' && tipo_precio_web::$STR_ES_RELACIONES=='false') || tipo_precio_web::$STR_ES_BUSQUEDA=='true'  || tipo_precio_web::$STR_ES_SUB_PAGINA=='true')) {?>
						<td id="tdtipo_precioCerrarPagina" align="center">
							<input type="button" id="btnCerrarPaginatipo_precio" name="btnCerrarPaginatipo_precio" title="CERRAR" value="   Cerrar" class="btn btn-primary"/>
						</td>
						<?php } ?>
					</tr>
				</table> <!-- tblNuevoPreparartipo_precio -->
				</form> <!-- frmNuevoPreparartipo_precio -->
				</div> <!-- divtipo_precioPaginacionAjaxWebPart -->

