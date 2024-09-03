<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\tipo_precio\presentation\view\form\component;

use com\bydan\contabilidad\inventario\tipo_precio\presentation\view\tipo_precio_web;

?>




				<form id="frmAccionesMantenimientotipo_precio" name="frmAccionesMantenimientotipo_precio">

			<?php if(tipo_precio_web::$STR_ES_BUSQUEDA=='false' ) {?>
			<table id="tbltipo_precioAcciones" class="elementos" style="text-align: center">
		<tr id="trtipo_precioAcciones" class="elementos" style="display:table-row">
			<td align="center">
				<a id="Acciones" ></a>

				<?php if(tipo_precio_web::$STR_ES_RELACIONES=='false' ) {?>
				<div align="right">
					<img style="visibility:visible" src="/contabilidad0/webroot/img/Imagenes/flechaarriba.gif" width="15" height="15" onclick="funcionGeneral.irAreaDePagina('ControlesSecciones')"/>
				</div>
				<?php } ?>

					<!-- SECCION/BOTONES -->
					<table id="tblAccionesMantenimientotipo_precio" class="busqueda" style="width: 50%;text-align: center">

						<?php if(tipo_precio_web::$STR_ES_RELACIONES=='false' ) {?>
						<!--
						<caption class="busquedacabecera">
							<span>Acciones</span>
						</caption>
						-->
						<?php } ?>

						<tr id="trAccionesMantenimientotipo_precioBasicos">
							<td id="tdbtnNuevotipo_precio" style="visibility:visible">
								<div id="divNuevotipo_precio" style="display:table-row">
									<input type="button" id="btnNuevotipo_precio" name="btnNuevotipo_precio" value="NUEVO" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnActualizartipo_precio" style="visibility:visible">
								<div id="divActualizartipo_precio" style="display:table-row">
									<input type="button" id="btnActualizartipo_precio" name="btnActualizartipo_precio" title="ACTUALIZAR Tipo Precio ACTUAL" value="Actualizar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnEliminartipo_precio" style="visibility:visible">
								<div id="divEliminartipo_precio" style="display:table-row">
									<input type="button" id="btnEliminartipo_precio" name="btnEliminartipo_precio" title="ELIMINAR Tipo Precio ACTUAL" value="Eliminar" class="btn btn-primary"/>
								</div>
							</td>
							<td id="tdbtnImprimirtipo_precio" style="visibility:visible">
								<input type="button" id="btnImprimirtipo_precio" name="btnImprimirtipo_precio" title="IMPRIMIR PAGINA Tipo Precio ACTUAL" value="Imp. Datos" class="btn btn-primary"/>
							</td>
							<td id="tdbtnCancelartipo_precio" style="visibility:visible">
								<input type="button" id="btnCancelartipo_precio" name="btnCancelartipo_precio" title="CANCELAR Tipo Precio ACTUAL" value="Cancelar" class="btn btn-primary"/>
							</td>
						</tr>
						<tr id="trAccionesMantenimientotipo_precioGuardar" style="display:none">
							<td id="tdbtnGuardarCambiostipo_precio" colspan="4" align="center" style="visibility:visible">
								<div id="divGuardarCambiostipo_precio" style="display:table-row">
									<input type="button" id="btnGuardarCambiosFormulariotipo_precio" name="btnGuardarCambiosFormulariotipo_precio" title="GUARDAR" value="GUADAR CAMBIOS" class="btn btn-primary"/>
								</div>
							</td>
						</tr>
					</table> <!-- tblAccionesMantenimientotipo_precio -->
			</td>
		</tr> <!-- trtipo_precioAcciones -->

			<?php include_once('com/bydan/contabilidad/inventario/tipo_precio/presentation/view/form/component/tipo_precio_params_actions_component.php'); ?>
			<?php } ?>

