//<script type="text/javascript" language="javascript">



//var tipo_precioJQueryPaginaWebInteraccion= function (tipo_precio_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../../../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../../../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_precio_constante,tipo_precio_constante1} from '../../../util/tipo_precio_constante.js';
import {tipo_precio_funcion,tipo_precio_funcion1} from '../../../util/principal/tipo_precio_funcion.js';
import {tipo_precio_evento_webcontrol} from '../../../webcontrol/principal/tipo_precio_evento_webcontrol.js'; /*evento*/


class tipo_precio_toolbar_webcontrol extends tipo_precio_evento_webcontrol { //GeneralEntityWebControl
	
	constructor() {	
		super(); 
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	actualizarVariablesPagina(tipo_precio_control) {
		
		if(tipo_precio_control.action=="index" || tipo_precio_control.action=="load") {
			this.getThis().actualizarVariablesPaginaAccionIndex(tipo_precio_control);
			
		} 
				
		else if(tipo_precio_control.action=="indexRecargarRelacionado") {
			this.getThis().actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="recargarInformacion") {
			this.getThis().actualizarVariablesPaginaAccionRecargarInformacion(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="buscarPorIdGeneral") {
			this.getThis().actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="anteriores") {
			this.getThis().actualizarVariablesPaginaAccionAnteriores(tipo_precio_control);
			
		} else if(tipo_precio_control.action=="siguientes") {
			this.getThis().actualizarVariablesPaginaAccionSiguientes(tipo_precio_control);
			
		} else if(tipo_precio_control.action=="recargarUltimaInformacion") {
			this.getThis().actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="seleccionarLoteFk") {
			this.getThis().actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_precio_control);		
		
		} else if(tipo_precio_control.action=="guardarCambios") {
			this.getThis().actualizarVariablesPaginaAccionGuardarCambios(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="duplicar") {
			this.getThis().actualizarVariablesPaginaAccionDuplicar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="copiar") {
			this.getThis().actualizarVariablesPaginaAccionCopiar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="seleccionarActual") {
			this.getThis().actualizarVariablesPaginaAccionSeleccionarActual(tipo_precio_control);
		
		}  else if(tipo_precio_control.action=="seleccionarActualAbrirPaginaForm") {
			this.getThis().actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="eliminarCascada") {
			this.getThis().actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="eliminarTabla") {
			this.getThis().actualizarVariablesPaginaAccionEliminarTabla(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="quitarElementosTabla") {
			this.getThis().actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoPreparar") {
			this.getThis().actualizarVariablesPaginaAccionNuevoPreparar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoTablaPreparar") {
			this.getThis().actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.getThis().actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="editarTablaDatos") {
			this.getThis().actualizarVariablesPaginaAccionEditarTablaDatos(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="generarHtmlReporte") {
			this.getThis().actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="generarHtmlFormReporte") {
			this.getThis().actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_precio_control);		
		
		} else if(tipo_precio_control.action=="generarHtmlRelacionesReporte") {
			this.getThis().actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_precio_control);		
		
		} else if(tipo_precio_control.action=="quitarRelacionesReporte") {
			this.getThis().actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_precio_control);		
		
		} else if(tipo_precio_control.action.includes("Busqueda") ||
				  tipo_precio_control.action.includes("FK_Id") ) {
					
			this.getThis().actualizarVariablesPaginaAccionBusquedas(tipo_precio_control);
			
		} else if(tipo_precio_control.action.includes(constantes.STR_REPORTE)) {
						
			this.getThis().actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_precio_control)
		}
		
	
		else if(tipo_precio_control.action=="cancelar") {
			this.getThis().actualizarVariablesPaginaAccionCancelar(tipo_precio_control);	
		
		} else if(tipo_precio_control.action.includes("registrarSesionPara")) {
			this.getThis().actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_precio_control);		
		}
	
		else if(tipo_precio_control.action=="eliminarCascada") {
			this.getThis().actualizarVariablesPaginaAccionEliminarCascada(tipo_precio_control);		
		}
	
		else if(tipo_precio_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.getThis().actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_precio_control);
		}
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_precio_control.action + " Revisar Manejo");
			
		}
		
		
		this.getThis().actualizarVariablesPaginaAccionesGenerales(tipo_precio_control);			
	}
	
	//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_precio_control) {
		this.getThis().actualizarPaginaAccionesGenerales(tipo_precio_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_precio_control) {
		
		this.getThis().actualizarPaginaCargaGeneral(tipo_precio_control);
		this.getThis().actualizarPaginaOrderBy(tipo_precio_control);
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);
		this.getThis().actualizarPaginaCargaGeneralControles(tipo_precio_control);
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);			
		this.getThis().actualizarPaginaAreaAuxiliarBusquedas(tipo_precio_control);
		this.getThis().actualizarPaginaAreaBusquedas(tipo_precio_control);
		this.getThis().actualizarPaginaCargaCombosFK(tipo_precio_control);	
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_precio_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_precio_control) {
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);							
		
		this.getThis().actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_precio_control) {
		
		this.getThis().actualizarPaginaCargaGeneral(tipo_precio_control);
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);
		this.getThis().actualizarPaginaCargaGeneralControles(tipo_precio_control);
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);			
		this.getThis().actualizarPaginaAreaAuxiliarBusquedas(tipo_precio_control);
		this.getThis().actualizarPaginaAreaBusquedas(tipo_precio_control);
		this.getThis().actualizarPaginaCargaCombosFK(tipo_precio_control);		
	}
}

export {tipo_precio_toolbar_webcontrol};

//</script>