<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\tipo_precio\presentation\view\principal\component;

use com\bydan\contabilidad\inventario\tipo_precio\presentation\view\tipo_precio_web;

?>


					<!-- SECCION/PARAMETROS -->
					<table id="tblParamsBuscarNumeroRegistrostipo_precio" style="text-align:left" class="impresion">
						<tr id="trParamsBuscarNumeroRegistrostipo_precio"  style="visibility:hidden;display:none">
							<td>
							</td>
							<td colspan="2">
								<input id="ParamsBuscar-txtNumeroRegistrostipo_precio" name="ParamsBuscar-txtNumeroRegistrostipo_precio" type="text" class="form-control">
							</td>
						</tr>
				<tr id="trRecargarInformaciontipo_precio">
					<td id="tdGenerarReportetipo_precio" class="elementos" style="display:table-row">
				
								<table id="tblMostrarTodostipo_precio" style="padding: 0px; border-spacing: 0px;">
						
							<tr id="tdMostrarTodostipo_precio" class="elementos1" style="display:table-row">
										<td style="visibility:visible">
											<input type="button" id="btnRecargarInformaciontipo_precio" name="btnRecargarInformaciontipo_precio" title="RECARGAR INFORMACION" value="   Recargar" class="btn btn-primary"/>
										</td>
										<td>
											<select id="ParamsBuscar-cmbPaginacion" name="ParamsBuscar-cmbPaginacion" title="TIPOS DE PAGINACION" style="width:100px"></select>
											<input id="ParamsBuscar-chbConPaginacionInterna" name="ParamsBuscar-chbConPaginacionInterna" title="CON PAGINACION INTERNA" type="checkbox"></input>
										</td>
								<td>
									<label>
										<input id="ParamsBuscar-chbConAltoMaximoTabla" name="ParamsBuscar-chbConAltoMaximoTabla" title="CON ALTO MAXIMO DE TABLA" type="checkbox" checked></input>Alt Max.
									</label>
								</td>					
										<td>					
											<select id="ParamsBuscar-cmbGenerarReporte" name="ParamsBuscar-cmbGenerarReporte" title="TIPOS IMPRESION DE REPORTES" style="width:100px"></select>					
											<input id="ParamsBuscar-chbConReportico" name="ParamsBuscar-chbConReportico" title="CON REPORTICO" type="checkbox">					
										</td>					
										<td>					
											<select id="ParamsBuscar-cmbTiposReporte" name="ParamsBuscar-cmbTiposReporte" title="TIPOS DE REPORTES" style="width:100px"></select>					
										</td>					
										<td>					
											<input type="button" id="btnImprimirPaginatipo_precio" name="btnImprimirPaginatipo_precio" title="IMPRIMIR PAGINA" value="Imp. Datos" class="btn btn-primary"/>					
										</td>
									</tr>
									<?php if(/*tipo_precio_web::$STR_ES_BUSQUEDA=='false'  &&*/ tipo_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
									<tr id="trOrderBytipo_precio">
										<td>
											<table>
												<tr>
													<td>
														<input type="button" id="btnOrderBytipo_precio" name="btnOrderBytipo_precio" title="COLUMNAS DE DATOS" value="   Cols" class="btn btn-primary"/>
													</td>
													<td>
														<input type="button" id="btnOrderByReltipo_precio" name="btnOrderByReltipo_precio" title="RELACIONES DE DATOS" value="   Rels" class="btn btn-primary"/>
													</td>
												</tr>
											</table>
										</td>
										<td>
											<select id="ParamsBuscar-cmbTiposColumnasSelect" name="ParamsBuscar-cmbTiposColumnasSelect" title="TIPOS DE COLUMNAS DE TABLA" style="width:125px"></select>
											<label>
												<input id="ParamsBuscar-chbParaActualizarFk" name="ParamsBuscar-chbParaActualizarFk" title="ABRIR VENTANA ACTUALIZAR DATOS RELACIONADOS" type="checkbox">
											</label>
										</td>
										<td>
											<label>
												<input id="ParamsBuscar-chbSelTodos" name="ParamsBuscar-chbSelTodos" title="SELECCIONAR TODOS LOS REGISTROS" type="checkbox">Sel.Todos
											</label>
										</td>

										<?php if(tipo_precio_web::$STR_ES_RELACIONES=='false' && tipo_precio_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbTiposRelaciones" name="ParamsBuscar-cmbTiposRelaciones" title="TIPOS DE RELACIONES" style="width:150px"></select>
										</td>
										<?php } ?>

										<?php if(tipo_precio_web::$STR_ES_BUSQUEDA=='false') {?>
										<td>
											<select id="ParamsBuscar-cmbAcciones" name="ParamsBuscar-cmbAcciones" title="TIPOS DE ACCIONES" style="width:200px"></select>
										</td>
										<?php } ?>

										<td id="tdtipo_precioConEditar">
											<label>
												<input id="ParamsBuscar-chbConEditar" name="ParamsBuscar-chbConEditar" title="EDITAR INFORMACION" type="checkbox">Edición
											</label>
											<label>
												<input id="ParamsBuscar-chbConUiMinimo" name="ParamsBuscar-chbConUiMinimo" title="UI MINIMO" type="checkbox" checked>Ui.Min
											</label>
										</td>
									</tr>
									<?php } ?>
								</table> <!-- tblMostrarTodostipo_precio -->

					</td><!-- tdGenerarReportetipo_precio -->
				</tr><!-- trRecargarInformaciontipo_precio -->
					</table><!-- tblParamsBuscarNumeroRegistrostipo_precio -->

