<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\tipo_precio\presentation\view\form\component;

use com\bydan\contabilidad\inventario\tipo_precio\presentation\view\tipo_precio_web;

?>


			<!-- SECCION/TOOLBAR -->
			<table id="tbltipo_precioToolBarFormularioExterior" style="width: 65%">
				<tr style="display:table-row">
					<td align="center">

						<table id="tbltipo_precioToolBarFormulario" style="text-align: center"  style="display:table-row">
							<tr>
								<td id="tdtipo_precioActualizarToolBar" style="visibility:visible">
									<img id="imgActualizarToolBartipo_precio" name="imgActualizarToolBartipo_precio" title="ACTUALIZAR Tipo Precio ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/actualizar.gif" width="25" height="25"/>
								</td>
								<td id="tdtipo_precioEliminarToolBar" style="visibility:visible">
									<img id="imgEliminarToolBartipo_precio" name="imgEliminarToolBartipo_precio" title="ELIMINAR Tipo Precio ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/eliminar.gif" width="25" height="25"/>
								</td>
								<td id="tdtipo_precioCancelarToolBar" style="visibility:visible">
									<img id="imgCancelarToolBartipo_precio" name="imgCancelarToolBartipo_precio" title="CANCELAR Tipo Precio ACTUAL" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/cancelar.gif" width="25" height="25"/>
								</td>
								<td id="tdtipo_precioRelacionesToolBar" style="display:table-row">
									<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/xexpand.png" width="25" height="25" onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('tblCamposOcultostipo_precio',this,'../')"/>
								</td>
							</tr>
						</table> <!-- tbltipo_precioToolBarFormulario -->

					</td>
				</tr>
			</table> <!-- tbltipo_precioToolBarFormularioExterior -->

