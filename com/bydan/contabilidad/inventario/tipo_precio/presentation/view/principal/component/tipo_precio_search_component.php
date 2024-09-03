<?php declare(strict_types = 1);
namespace com\bydan\contabilidad\inventario\tipo_precio\presentation\view\principal\component;

use com\bydan\contabilidad\inventario\tipo_precio\presentation\view\tipo_precio_web;

?>


		<tr id="trtipo_precioCabeceraBusquedas" class="busquedacabecera" style="display:none" >
			<td>
				<img id="imgExpandirContraerRowBusquedatipo_precio" title="MOSTRAR U OCULTAR BÚSQUEDAS" align="left" src="/contabilidad0/webroot/img/Imagenes/xcollapse.png" class="imagencabecera"  onclick="funcionGeneral.mostrarOcultarFilaCambiarImagenRelative('trBusquedatipo_precio',this,'../')">
				<span>BÚSQUEDAS</span>
			</td>
		</tr> <!-- trtipo_precioCabeceraBusquedas/super -->

		<tr id="trBusquedatipo_precio" class="busqueda" style="display:table-row">
			<td id="tdBusquedatipo_precio" align="center">
				<a id="Busquedas"></a>
				

				<form id="frmBusquedatipo_precio" name="frmBusquedatipo_precio">
				<!-- SECCION/BUSQUEDA -->
				<table id="tblBusquedatipo_precio" style="visibility:visible; text-align:left; width: 100%">
				<tr id="trtipo_precioBusquedas" class="busqueda" style="display:none"><td>
				<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="tabs" class="tabs" style="width: 70%">
				
				
				</div>
				<?php } ?>
				</td>
				</tr>

				<tr id="trParamsBuscartipo_precio" style="display:table-row">
					<td id="tdParamsBuscartipo_precio">
		<?php if(tipo_precio_web::$STR_ES_RELACIONADO=='false' ) {?>
				<div id="divParamsBuscartipo_precio">

			<?php include_once('com/bydan/contabilidad/inventario/tipo_precio/presentation/view/principal/component/tipo_precio_params_search_component.php'); ?>
				</div> <!-- divParamsBuscartipo_precio -->
		<?php } ?>
				</td> <!-- tdParamsBuscartipo_precio -->
				</tr><!-- trParamsBuscartipo_precio -->
				</table> <!-- tblBusquedatipo_precio -->
				</form> <!-- frmBusquedatipo_precio -->
				

			</td> <!-- tdBusquedatipo_precio -->
		</tr> <!-- trBusquedatipo_precio/super -->

 

