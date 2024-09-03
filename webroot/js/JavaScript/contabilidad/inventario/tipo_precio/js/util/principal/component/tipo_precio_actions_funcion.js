//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../../../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../../Library/General/FuncionGeneralEventoJQuery.js';
import {tipo_precio_constante,tipo_precio_constante1} from '../../../util/tipo_precio_constante.js';
import {tipo_precio_table_funcion} from '../../../util/principal/component/tipo_precio_table_funcion.js'; /*/evento*/


class tipo_precio_actions_funcion extends tipo_precio_table_funcion {
	constructor() {
		super();
	}
	
	getSuper() {
		return tipo_precio_funcion1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_funcion1;/*super*/	
	}
	
	/*---------- Clic-Siguiente ----------*/
	siguientesOnClick() { 
		this.getThis().procesarInicioBusqueda(); 
	}
	
	siguientesOnComplete() { 
		this.getThis().procesarFinalizacionBusqueda(); 
	}
/*----------- Clic-Anteriores ---------*/
	anterioresOnClick() { 
		this.getThis().procesarInicioBusqueda(); 
	}
	
	anterioresOnComplete() { 
		this.getThis().procesarFinalizacionBusqueda(); 
	}
	
	/*------------ Clic-Guardar-Cambios --------------*/
	guardarCambiosOnClick() { 
		this.getSuper().procesarInicioProceso(tipo_precio_constante1); 
	}
	
	guardarCambiosOnComplete() { 
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio"); 
	}
/*------------ Clic-Duplicar --------------------*/
	duplicarOnClick() { 
		this.getSuper().procesarInicioProceso(tipo_precio_constante1); 
	}
	
	duplicarOnComplete() { 
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio"); 
	}
/*-------------- Clic-Copiar -------------------*/
	copiarOnClick() { 
		this.getSuper().procesarInicioProceso(tipo_precio_constante1); 
	}
	
	copiarOnComplete() { 
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio"); 
	}
	
	/*---------- Clic-Nuevo --------------*/
	nuevoPrepararOnClick() {
		this.getSuper().resaltarRestaurarDivMantenimiento(true,"tipo_precio");		
		this.getSuper().procesarInicioProceso(tipo_precio_constante1);
	}
	
	nuevoPrepararOnComplete() { 
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio"); 
	}
	
	nuevoTablaPrepararOnClick() { 
		this.getSuper().procesarInicioProceso(tipo_precio_constante1); 
	}
	
	nuevoTablaPrepararOnComplete() { 
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio"); 
	}
}

/*Para ser llamado desde otro archivo (import)*/
export {tipo_precio_actions_funcion};


//</script>
