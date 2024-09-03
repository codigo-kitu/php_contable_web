//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../../../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_precio_constante,tipo_precio_constante1} from '../../../util/tipo_precio_constante.js';
import {tipo_precio_funcion,tipo_precio_funcion1} from '../../../util/form/tipo_precio_form_funcion.js';
import {tipo_precio_form_evento_webcontrol} from '../../../webcontrol/form/tipo_precio_form_evento_webcontrol.js'; /*evento*/
import {tipo_precio_params_actions_webcontrol} from '../../../webcontrol/form/component/tipo_precio_params_actions_webcontrol.js';


class tipo_precio_actions_webcontrol extends tipo_precio_params_actions_webcontrol {
	
	constructor() {	
		super();
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	actualizarVariablesPaginaAccionNuevo(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatosAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionActualizar(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatosAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionEliminar(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatosAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
}

export {tipo_precio_actions_webcontrol};

//</script>
