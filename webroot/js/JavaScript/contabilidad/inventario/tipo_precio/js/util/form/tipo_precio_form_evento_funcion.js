//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../Library/General/FuncionGeneralEventoJQuery.js';
import {tipo_precio_constante,tipo_precio_constante1} from '../../util/tipo_precio_constante.js';


class tipo_precio_form_evento_funcion extends GeneralEntityFuncion {
	
	constructor() {
		super(); //GeneralEntityFuncion	
	}
	
	getSuper() {
		return tipo_precio_funcion1;/*super*/	
	}

/*---------------------------------- AREA:AUXILIAR ---------------------------*/

	cancelarControles() {
	
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_precio.hdnIdActual);
		jQuery('hdncreated_at').val(new Date());
		jQuery('cmbtipo_precioid_empresa').val("");
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_precio.txtcodigo);
		funcionGeneral.setEmptyControl(document.frmMantenimientotipo_precio.txtnombre);	
	}
	

	mostrarOcultarControlesMantenimiento(blnEsMostrar) {
		if(blnEsMostrar==true) {
			tipo_precioFuncionGeneral.bitEstaEnModoEdicion=true;
		}
		
		funcionGeneral.mostrarOcultarControlesMantenimiento(blnEsMostrar,"tipo_precio");		
	}
	
	habilitarDeshabilitarControles(bitEsHabilitar) {
		if(bitEsHabilitar==true) {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_precio.txtcodigo,false);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_precio.txtnombre,false);
		} else {
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_precio.txtcodigo,true);
			funcionGeneral.setReadOnlyControl(document.frmMantenimientotipo_precio.txtnombre,true);
		}	
	}
	
	actualizarEstadoBotones(strAccion,strPermisos) { 
		funcionGeneral.actualizarEstadoBotones(strAccion,strPermisos,tipo_precio_constante1.BIT_GUARDAR_CAMBIOS_EN_LOTE,tipo_precio_constante1.BIT_ES_MANTENIMIENTO_RELACIONADO,"tipo_precio"); 
	}

}

/*var tipo_precio_form_evento_funcion1=new tipo_precio_form_evento_funcion();*/ //var

/*Para ser llamado desde otro archivo (import)*/
export {tipo_precio_form_evento_funcion};

/*,tipo_precio_form_evento_funcion1*/

/*Para ser llamado desde window.opener*/
/*window.tipo_precio_form_funcion1 = tipo_precio_form_funcion1;*/


/*
	interface tipo_precio_funcionI {
	
	//---------------------------------- AREA:EVENTOS ---------------------------
	
	//---------- Clic-Nuevo --------------
		nuevoOnClick();	
		nuevoOnComplete();	
		nuevoPrepararPaginaFormOnClick();		
		nuevoPrepararPaginaFormOnComplete();
	//-------------- Clic-Seleccionar -------------	
		seleccionarPaginaFormOnClick();		
		seleccionarPaginaFormOnComplete();
	//------------- Clic-Actualizar -------------
		actualizarOnClick();		
		actualizarOnComplete();
	//------------- Clic-Eliminar --------------	
		eliminarOnClick();		
		eliminarOnComplete();
	//------------- Clic-Cancelar -------------------
		cancelarOnClick();		
		cancelarOnComplete();		
		cancelarControles();
		
	//---------------------------------- AREA:AUXILIAR ---------------------------
		mostrarOcultarControlesMantenimiento(blnEsMostrar);		
		habilitarDeshabilitarControles(bitEsHabilitar);		
		actualizarEstadoBotones(strAccion,strPermisos);
	

*/

//</script>
