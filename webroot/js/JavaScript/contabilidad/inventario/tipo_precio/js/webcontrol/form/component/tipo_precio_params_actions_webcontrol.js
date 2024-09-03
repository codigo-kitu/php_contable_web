//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../../../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_precio_constante,tipo_precio_constante1} from '../../../util/tipo_precio_constante.js';
import {tipo_precio_funcion,tipo_precio_funcion1} from '../../../util/form/tipo_precio_form_funcion.js';
import {tipo_precio_form_evento_webcontrol} from '../../../webcontrol/form/tipo_precio_form_evento_webcontrol.js'; /*evento*/
import {tipo_precio_form_webcontrol} from '../../../webcontrol/form/component/tipo_precio_form_webcontrol.js';


class tipo_precio_params_actions_webcontrol extends tipo_precio_form_webcontrol {

	constructor() {	
		super();
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	actualizarPaginaMensajePantalla(tipo_precio_control, mostrar) {
		
		if(mostrar==true) {
			tipo_precio_funcion1.resaltarRestaurarDivsPagina(false,"tipo_precio");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_precio_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_precio");
			}			
			
			tipo_precio_funcion1.mostrarDivMensaje(true,tipo_precio_control.strAuxiliarMensaje,tipo_precio_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_precio_funcion1.mostrarDivMensaje(false,tipo_precio_control.strAuxiliarMensaje,tipo_precio_control.strAuxiliarCssMensaje);
		}
	}
}

export {tipo_precio_params_actions_webcontrol};

//</script>
