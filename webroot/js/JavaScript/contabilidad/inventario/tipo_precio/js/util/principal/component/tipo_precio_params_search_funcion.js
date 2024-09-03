//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../../../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../../Library/General/FuncionGeneralEventoJQuery.js';
import {tipo_precio_constante,tipo_precio_constante1} from '../../../util/tipo_precio_constante.js';
import {tipo_precio_search_funcion} from '../../../util/principal/component/tipo_precio_search_funcion.js'; /*/evento*/


class tipo_precio_params_search_funcion extends tipo_precio_search_funcion {
	constructor() {
		super();
	}
	
	getSuper() {
		return tipo_precio_funcion1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_funcion1;/*super*/	
	}
	
	/*---------- Clic-Reporte ----------------*/
	generarReporteOnClick() { 
		this.getThis().generarReporteInicio(); 
	}
	
	generarReporteOnComplete() { 
		this.getThis().generarReporteFinalizacion(); 
	}
	
	generarReporteInicio() { 
		funcionGeneral.mostrarOcultarProcesando(true,null); 
	}
	
	generarReporteFinalizacion() { 
		funcionGeneral.generarReporteFinalizacion(tipo_precio_constante1.STR_RELATIVE_PATH,tipo_precio_constante1.STR_NOMBRE_OPCION); 
	}
/*---------- Clic-Generar-Html -----------*/
	generarHtmlReporteOnClick() { 
		this.getSuper().procesarInicioProceso(tipo_precio_constante1); 
	}
	
	generarHtmlReporteOnComplete() { 
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio"); 
	}
	
	/*------------- Clic-Editar -------------	*/
	editarTablaDatosOnClick() { 
		this.getSuper().procesarInicioProceso(tipo_precio_constante1); 
	}
	
	editarTablaDatosOnComplete() { 
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio"); 
	}
	
	/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(tipo_precio_constante1.STR_RELATIVE_PATH,"tipo_precio"); 
	}
	
	eliminarOnComplete() {			
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio");
	}
	
	/*------------- Formulario-Combo-Accion -------------------*/
	setTipoColumnaAccion(strValueTipoColumna,idActual) {
		
		if(strValueTipoColumna!=constantes.STR_COLUMNAS && strValueTipoColumna!=null) {
										
			if(jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val() != constantes.STR_COLUMNAS) {
				jQuery("#ParamsBuscar-cmbTiposColumnasSelect").val(constantes.STR_COLUMNAS).trigger("change");
			}
						
			if(strValueTipoColumna=="AuxiliarTemporaMe") {
							
			}
			
			else if(strValueTipoColumna=="Id") {
				jQuery(".col_id").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Created At") {
				jQuery(".col_created_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Updated At") {
				jQuery(".col_updated_at").css({"border-color":"red"});
			}
			else if(strValueTipoColumna==" Empresa") {
				jQuery(".col_id_empresa").css({"border-color":"red"});

				if(jQuery("#ParamsBuscar-chbParaActualizarFk").prop('checked')==true) {
					//ABRIR VENTANA PARA ACTUALIZAR DATOS
					jQuery('#form-id_empresa_img').trigger("click" );
				} else {
					jQuery('#form-id_empresa_img_busqueda').trigger("click" );
				}
			}
			else if(strValueTipoColumna=="Codigo") {
				jQuery(".col_codigo").css({"border-color":"red"});
			}
			else if(strValueTipoColumna=="Nombre") {
				jQuery(".col_nombre").css({"border-color":"red"});
			}
					
			//alert(strValueTipoColumna);
		}
	}
/*------------- Formulario-Combo-Relaciones -------------------*/
	setTipoRelacionAccion(strValueTipoRelacion,idActual,tipo_precio_webcontrol1) {
	
		if(jQuery("#ParamsBuscar-cmbTiposRelaciones").val() != constantes.STR_RELACIONES) {
			jQuery("#ParamsBuscar-cmbTiposRelaciones").val(constantes.STR_RELACIONES).trigger("change");
		}
						
		if(strValueTipoRelacion=="AuxiliarTemporaMe") {
							
		}
		
		else if(strValueTipoRelacion=="cliente" || strValueTipoRelacion=="Cliente") {
			tipo_precio_webcontrol1.registrarSesionParaclientes(idActual);
		}
		else if(strValueTipoRelacion=="precio_producto" || strValueTipoRelacion=="Precio Producto") {
			tipo_precio_webcontrol1.registrarSesionParaprecio_productos(idActual);
		}
	}
}

/*Para ser llamado desde otro archivo (import)*/
export {tipo_precio_params_search_funcion};


//</script>
