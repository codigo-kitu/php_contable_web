//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../../../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../../Library/General/FuncionGeneralEventoJQuery.js';
import {tipo_precio_constante,tipo_precio_constante1} from '../../../util/tipo_precio_constante.js';
import {tipo_precio_toolbar_funcion} from '../../../util/principal/component/tipo_precio_toolbar_funcion.js'; /*/evento*/


class tipo_precio_search_funcion extends tipo_precio_toolbar_funcion {
	constructor() {
		super();
	}
	
	getSuper() {
		return tipo_precio_funcion1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_funcion1;/*super*/	
	}
	
	/*---------------------------------- AREA:EVENTOS ---------------------------*/

/*---------- Clic-Buscar ----------*/
	buscarOnClick() { 
		this.getThis().procesarInicioBusqueda(); 
	}
	
	buscarOnComplete() { 
		this.getThis().procesarFinalizacionBusqueda(); 
	}
	
	buscarFksOnClick() { 
		this.getSuper().procesarInicioProceso(tipo_precio_constante1); 
	}
	
	
/*---------- Clic-Buscar-Auxiliar ----------*/
	procesarInicioBusqueda() { 
		funcionGeneral.procesarInicioBusquedaPrincipal(tipo_precio_constante1.STR_RELATIVE_PATH,"tipo_precio"); 
	}
	
	procesarFinalizacionBusqueda() { 
		funcionGeneral.procesarFinalizacionBusquedaPrincipal(tipo_precio_constante1.STR_RELATIVE_PATH,tipo_precio_constante1.STR_NOMBRE_OPCION,"tipo_precio"); 
	}
	
}

/*Para ser llamado desde otro archivo (import)*/
export {tipo_precio_search_funcion};


//</script>
