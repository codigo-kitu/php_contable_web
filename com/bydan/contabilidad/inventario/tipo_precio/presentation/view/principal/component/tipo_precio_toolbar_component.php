<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\tipo_precio\presentation\view\principal\component;

use com\bydan\contabilidad\inventario\tipo_precio\presentation\view\tipo_precio_web;
?>


							<!-- SECCION/TOOLBAR -->
							<table id="tblToolBar">
								<tr>
									<td id="tdtipo_precioNuevoToolBar">
										<img id="imgNuevoToolBartipo_precio" name="imgNuevoToolBartipo_precio" title="Nuevo Tipo Precio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevo.gif" width="25" height="25"/>
									</td>

									<?php if(tipo_precio_web::$STR_ES_BUSQUEDA=='false' && tipo_precio_web::$STR_ES_RELACIONES=='false') {?>
									<td id="tdtipo_precioNuevoGuardarCambiosToolBar">
										<img id="imgNuevoGuardarCambiosToolBartipo_precio" name="imgNuevoGuardarCambiosToolBartipo_precio" title="Nuevo TABLA Tipo Precio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/nuevoguardarcambios.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(tipo_precio_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdtipo_precioGuardarCambiosToolBar">
										<img id="imgGuardarCambiosToolBartipo_precio" name="imgGuardarCambiosToolBartipo_precio" title="Guardar Tipo Precio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/guardarcambiostabla.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false' && tipo_precio_web::$STR_ES_RELACIONES=='false' && tipo_precio_web::$STR_ES_BUSQUEDA=='false') {?>
									<td id="tdtipo_precioCopiarToolBar">
										<img id="imgCopiarToolBartipo_precio" name="imgCopiarToolBartipo_precio" title="Copiar Tipo Precio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/copiar.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_precioDuplicarToolBar">
										<img id="imgDuplicarToolBartipo_precio" name="imgDuplicarToolBartipo_precio" title="Duplicar Tipo Precio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/duplicar.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false') {?>
									<td id="tdtipo_precioRecargarInformacionToolBar">
										<img id="imgRecargarInformacionToolBartipo_precio" name="imgRecargarInformacionToolBartipo_precio" title="Recargar Tipo Precio" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/recargar.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_precioAnterioresToolBar">
										<img id="imgAnterioresToolBartipo_precio" name="imgAnterioresToolBartipo_precio" title="Anteriores" style="width: 22px; height: 22px;text-align: center" src="/contabilidad0/webroot/img/Imagenes/anteriores.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_precioSiguientesToolBar">
										<img id="imgSiguientesToolBartipo_precio" name="imgSiguientesToolBartipo_precio" title="Siguientes" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/siguientes.gif" width="25" height="25"/>
									</td>
									<td id="tdtipo_precioAbrirOrderByToolBar">
										<img id="imgAbrirOrderByToolBartipo_precio" name="imgAbrirOrderByToolBartipo_precio" title="Orden DE DATOS" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/orden.gif" width="25" height="25"/>
									</td>
									<?php } ?>

									<?php if((tipo_precio_web::$STR_ES_RELACIONADO=='false' && tipo_precio_web::$STR_ES_RELACIONES=='false') || tipo_precio_web::$STR_ES_BUSQUEDA=='true'  || tipo_precio_web::$STR_ES_SUB_PAGINA=='true') {?>
									<td id="tdtipo_precioCerrarPaginaToolBar">
										<img id="imgCerrarPaginaToolBartipo_precio" name="imgCerrarPaginaToolBartipo_precio" title="Cerrar" style="width: 22px; height: 22px; text-align: center" src="/contabilidad0/webroot/img/Imagenes/cerrar.gif" width="25" height="25"/>
									</td>
									<?php } ?>
								</tr>
							</table> <!-- tblToolBar -->

