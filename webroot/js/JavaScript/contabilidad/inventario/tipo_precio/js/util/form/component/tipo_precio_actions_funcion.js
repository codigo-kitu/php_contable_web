//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../../../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../../Library/General/FuncionGeneralEventoJQuery.js';
import {tipo_precio_constante,tipo_precio_constante1} from '../../../util/tipo_precio_constante.js';
import {tipo_precio_params_actions_funcion} from '../../../util/form/component/tipo_precio_params_actions_funcion.js'; /*evento*/

class tipo_precio_actions_funcion extends tipo_precio_params_actions_funcion {
	
	constructor() {
		super();
	}
	
	getSuper() {
		return tipo_precio_funcion1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_funcion1;/*super*/	
	}
	
	/*---------- Clic-Nuevo --------------*/
	nuevoOnClick() { 
		/*this.getSuper().procesarInicioProceso(tipo_precio_constante1);*/
	}
	
	nuevoOnComplete() { 
		/*this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio");*/
	}
	
	/*------------- Clic-Actualizar -------------*/
	actualizarOnClick() { 
		this.getSuper().procesarInicioProceso(tipo_precio_constante1);
	}
	
	actualizarOnComplete() {
		funcionGeneralJQuery.actualizarOnComplete(tipo_precio_constante1.STR_ES_RELACIONES,tipo_precio_constante1.STR_ES_RELACIONADO,tipo_precio_constante1.STR_RELATIVE_PATH,"tipo_precio");		
		
		if(this.getSuper().esPaginaForm(tipo_precio_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}	
	/*------------- Clic-Eliminar --------------*/	
	eliminarOnClick() {		
		funcionGeneral.eliminarOnClick(tipo_precio_constante1.STR_RELATIVE_PATH,"tipo_precio"); 
	}
	
	eliminarOnComplete() {
		this.getSuper().resaltarRestaurarDivMantenimiento(false,"tipo_precio");
	
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio");
	}	
/*------------- Clic-Cancelar -------------------*/
	cancelarOnClick() { 
		this.getSuper().procesarInicioProceso(tipo_precio_constante1);
	}
	
	cancelarOnComplete() {
		this.getSuper().resaltarRestaurarDivMantenimiento(false,"tipo_precio");
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio");
				
		if(this.getSuper().esPaginaForm(tipo_precio_constante1)==true) {
			funcionGeneral.cerrarPagina();
		}
	}
}

export {tipo_precio_actions_funcion};

//</script>
