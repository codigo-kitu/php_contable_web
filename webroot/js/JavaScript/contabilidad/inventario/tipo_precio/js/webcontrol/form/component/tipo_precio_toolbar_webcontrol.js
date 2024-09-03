//<script type="text/javascript" language="javascript">

import {Constantes,constantes} from '../../../../../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../../../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_precio_constante,tipo_precio_constante1} from '../../../util/tipo_precio_constante.js';
import {tipo_precio_funcion,tipo_precio_funcion1} from '../../../util/form/tipo_precio_form_funcion.js';
import {tipo_precio_form_evento_webcontrol} from '../../../webcontrol/form/tipo_precio_form_evento_webcontrol.js'; /*evento*/


class tipo_precio_toolbar_webcontrol extends tipo_precio_form_evento_webcontrol {
	
	constructor() {	
		super();
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;
	}
	
	getThis() {
		return tipo_precio_webcontrol1;
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
	
	actualizarVariablesPaginaAccionCancelar(tipo_precio_control) {
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_precio_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_precio_control) {
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);							
		
		this.getThis().actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_precio_control) {
		this.getThis().actualizarPaginaCargaGeneralControles(tipo_precio_control);
		this.getThis().actualizarPaginaCargaCombosFK(tipo_precio_control);
		this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);		
		
		//FORMULARIO SELECCIONAR ACTUAL ADD
		this.getThis().seleccionarActualPaginaFormularioAdd(tipo_precio_control);
		
	}
		
	actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_precio_control) {
		this.getThis().actualizarPaginaCargaGeneralControles(tipo_precio_control);
		this.getThis().actualizarPaginaCargaCombosFK(tipo_precio_control);
		this.getThis().actualizarPaginaFormulario(tipo_precio_control);
		this.getThis().onLoadCombosDefectoFK(tipo_precio_control);		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);		
	}
	
	
	actualizarPaginaCargaGeneral(tipo_precio_control) {
		this.getThis().tipo_precio_controlInicial=tipo_precio_control;
			
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_precio_control.strStyleDivArbol,tipo_precio_control.strStyleDivContent
																,tipo_precio_control.strStyleDivOpcionesBanner,tipo_precio_control.strStyleDivExpandirColapsar
																,tipo_precio_control.strStyleDivHeader);
			
		}
	}
	
	actualizarPaginaCargaGeneralControles(tipo_precio_control) {
		this.getThis().actualizarCssBotonesPagina(tipo_precio_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_precio_control.tiposReportes,tipo_precio_control.tiposReporte
															 	,tipo_precio_control.tiposPaginacion,tipo_precio_control.tiposAcciones
																,tipo_precio_control.tiposColumnasSelect,tipo_precio_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_precio_control.tiposRelaciones,tipo_precio_control.tiposRelacionesFormulario);		
			
			this.getThis().onLoadCombosDefectoPaginaGeneralControles(tipo_precio_control);
		}						
	}
	
	actualizarPaginaUsuarioInvitado(tipo_precio_control) {
	
		var indexPosition=tipo_precio_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_precio_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}

	actualizarPaginaAreaMantenimiento(tipo_precio_control) {
		jQuery("#tdtipo_precioNuevo").css("display",tipo_precio_control.strPermisoNuevo);
		jQuery("#trtipo_precioElementos").css("display",tipo_precio_control.strVisibleTablaElementos);
		jQuery("#trtipo_precioAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);
		jQuery("#trtipo_precioParametrosAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);			
	}
/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_precio_control) {	
		
		if(tipo_precio_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_precioActualizarToolBar").css("display",tipo_precio_control.strPermisoActualizar.replace("row","cell"));	
		}
		
		jQuery("#tdtipo_precioEliminarToolBar").css("display",tipo_precio_control.strPermisoEliminar.replace("row","cell"));
				
		jQuery("#trtipo_precioElementos").css("display",tipo_precio_control.strVisibleTablaElementos);
		
		jQuery("#trtipo_precioAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);
		jQuery("#trtipo_precioParametrosAcciones").css("display",tipo_precio_control.strVisibleTablaAcciones);
		
		jQuery("#tdtipo_precioCerrarPagina").css("display",tipo_precio_control.strPermisoPopup);		
		jQuery("#tdtipo_precioCerrarPaginaToolBar").css("display",tipo_precio_control.strPermisoPopup);
		//jQuery("#trtipo_precioAccionesRelaciones").css("display",tipo_precio_control.strVisibleTablaAccionesRelaciones);		
	}
}

export {tipo_precio_toolbar_webcontrol};

//</script>
