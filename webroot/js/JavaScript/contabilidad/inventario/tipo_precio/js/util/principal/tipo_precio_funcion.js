//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../Library/General/FuncionGeneralEventoJQuery.js';
import {tipo_precio_constante,tipo_precio_constante1} from '../../util/tipo_precio_constante.js';
import {tipo_precio_actions_funcion} from '../../util/principal/component/tipo_precio_actions_funcion.js'; /*/evento*/


class tipo_precio_funcion extends tipo_precio_actions_funcion { /*extends GeneralEntityFuncion {*/
	
	constructor() {
		super(); //tipo_precio_evento_funcion	
	}
	
	getSuper() {
		return tipo_precio_funcion1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_funcion1;/*super*/	
	}
}

var tipo_precio_funcion1=new tipo_precio_funcion(); //var

/*Para ser llamado desde otro archivo (import)*/
export {tipo_precio_funcion,tipo_precio_funcion1};

/*Para ser llamado desde window.opener*/
window.tipo_precio_funcion1 = tipo_precio_funcion1;



/*
	interface tipo_precio_funcionI {
	
	
		//---------------------------------- AREA:TABLA ---------------------------
	//------------- Tabla-Validacion -------------------
		registrarControlesTableValidacionEdition(tipo_precio_control,tipo_precio_webcontrol1,tipo_precio_constante1);
		
	//---------- Clic-Nuevo --------------
		nuevoPrepararOnClick();		
		nuevoPrepararOnComplete();		
		nuevoTablaPrepararOnClick();		
		nuevoTablaPrepararOnComplete();	
	
	
	//---------------------------------- AREA:PROCESAR ------------------------	
		procesarOnClick();		
		procesarOnComplete();		
		procesarFinalizacionProcesoAbrirLink();		
		procesarFinalizacionProcesoAbrirLinkParametros(strTipo,strLink);		
		procesarInicioProcesoSimple();		
		procesarFinalizacionProcesoSimple();
		
	//------------- Formulario-Combo-Accion -------------------
		setTipoColumnaAccion(strValueTipoColumna,idActual);
	//------------- Formulario-Combo-Relaciones -------------------
		setTipoRelacionAccion(strValueTipoRelacion,idActual,tipo_precio_webcontrol1);
					
		
	}

*/

//</script>
