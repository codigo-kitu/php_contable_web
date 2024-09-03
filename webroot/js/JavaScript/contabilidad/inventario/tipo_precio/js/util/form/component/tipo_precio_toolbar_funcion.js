//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../../../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../../Library/General/FuncionGeneralEventoJQuery.js';
import {tipo_precio_constante,tipo_precio_constante1} from '../../../util/tipo_precio_constante.js';
import {tipo_precio_form_evento_funcion} from '../../../util/form/tipo_precio_form_evento_funcion.js'; /*evento*/

class tipo_precio_toolbar_funcion extends tipo_precio_form_evento_funcion {
	
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
	
	nuevoPrepararPaginaFormOnClick() {
		this.getSuper().resaltarRestaurarDivMantenimiento(true,"tipo_precio");
		this.getSuper().procesarInicioProceso(tipo_precio_constante1);
	}
	
	nuevoPrepararPaginaFormOnComplete() { 
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio");
	}	
/*-------------- Clic-Seleccionar -------------*/	
	seleccionarPaginaFormOnClick() {
		this.getSuper().resaltarRestaurarDivMantenimiento(true,"tipo_precio");
		this.getSuper().procesarInicioProceso(tipo_precio_constante1);
	}
	
	seleccionarPaginaFormOnComplete() { 
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio");
	}
	
	/*---------------------------------- AREA:PROCESAR ------------------------*/	
	procesarOnClick() { 
		this.getSuper().procesarInicioProceso(tipo_precio_constante1);
	}
	
	procesarOnComplete() {		
		this.getSuper().procesarFinalizacionProceso(tipo_precio_constante1,"tipo_precio");
	}
	
	procesarFinalizacionProcesoAbrirLink() { 
		this.getSuper().procesarFinalizacionProcesoAbrirLink(tipo_precio_constante1,"tipo_precio");
	}
	
	procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink) { 
		this.getSuper().procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink,"tipo_precio");
	}
	
	procesarInicioProcesoSimple() { 
		this.getSuper().procesarInicioProcesoSimple(tipo_precio_constante1);
	}
	
	procesarFinalizacionProcesoSimple() { 
		this.getSuper().procesarFinalizacionProcesoSimple(tipo_precio_constante1,"tipo_precio");
	}
}

export {tipo_precio_toolbar_funcion};

//</script>
