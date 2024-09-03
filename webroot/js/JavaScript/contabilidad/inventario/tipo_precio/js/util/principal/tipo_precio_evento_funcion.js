//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../Library/General/Constantes.js';
import {GeneralEntityFuncion} from '../../../../../../Library/Entity/GeneralEntityFuncion.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../Library/General/FuncionGeneralEventoJQuery.js';
import {tipo_precio_constante,tipo_precio_constante1} from '../../util/tipo_precio_constante.js';


class tipo_precio_evento_funcion extends GeneralEntityFuncion {
	
	constructor() {
		super(); //GeneralEntityFuncion	
	}
	
	getSuper() {
		return tipo_precio_funcion1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_funcion1;/*super*/	
	}	
}

/*var tipo_precio_funcion1=new tipo_precio_funcion(); //var*/

/*Para ser llamado desde otro archivo (import)*/
export {tipo_precio_evento_funcion};
/*,tipo_precio_funcion1*/

/*Para ser llamado desde window.opener*/
/*window.tipo_precio_funcion1 = tipo_precio_funcion1;*/



/*
	interface tipo_precio_funcionI {
	
	//---------------------------------- AREA:EVENTOS ---------------------------
	
	//---------- Clic-Buscar ----------
		buscarOnClick();		
		buscarOnComplete();		
		buscarFksOnClick();
		
	//---------- Clic-Buscar-Auxiliar ----------
		procesarInicioBusqueda();		
		procesarFinalizacionBusqueda();
	//---------- Clic-Siguiente ----------
		siguientesOnClick();		
		siguientesOnComplete();
	//----------- Clic-Anteriores ---------
		anterioresOnClick();		
		anterioresOnComplete();
	//---------- Clic-Seleccionar ----------
		seleccionarOnClick();		
		seleccionarOnComplete();
		
		
		seleccionarMostrarDivAccionesRelacionesActualOnClick();		
		seleccionarMostrarDivAccionesRelacionesActualOnComplete();
	//---------- Clic-Reporte ----------------
		generarReporteOnClick();		
		generarReporteOnComplete();		
		generarReporteInicio();		
		generarReporteFinalizacion();
	//---------- Clic-Generar-Html -----------
		generarHtmlReporteOnClick();		
		generarHtmlReporteOnComplete();
	//------------- Clic-Actualizar -------------	
		editarTablaDatosOnClick();		
		editarTablaDatosOnComplete();
	//------------- Clic-Eliminar --------------	
		eliminarOnClick();		
		eliminarOnComplete();
	//------------- Clic-Eliminar --------------
		eliminarTablaOnClick();		
		eliminarTablaOnComplete();
	//------------ Clic-Guardar-Cambios --------------
		guardarCambiosOnClick();		
		guardarCambiosOnComplete();
	//------------ Clic-Duplicar --------------------
		duplicarOnClick();		
		duplicarOnComplete();
	//-------------- Clic-Copiar -------------------
		copiarOnClick();		
		copiarOnComplete();
		
	}

*/

//</script>
