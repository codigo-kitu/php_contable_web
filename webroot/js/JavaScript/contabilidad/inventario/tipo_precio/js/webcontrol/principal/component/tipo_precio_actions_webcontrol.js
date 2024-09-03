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
import {tipo_precio_table_webcontrol} from '../../../webcontrol/principal/component/tipo_precio_table_webcontrol.js';

class tipo_precio_actions_webcontrol extends tipo_precio_table_webcontrol {
	
	constructor() {	
		super();
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_precio_control) {
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);		
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		//this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);		
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		//this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);		
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);						
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		//this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tipo_precio_control) {
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);
		this.getThis().onLoadCombosDefectoFK(tipo_precio_control);		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_precio_control) {
		this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);
		//this.getThis().actualizarPaginaFormulario(tipo_precio_control);
		this.getThis().onLoadCombosDefectoFK(tipo_precio_control);		
		this.getThis().actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control);		
		//this.getThis().actualizarPaginaAreaMantenimiento(tipo_precio_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_precio_control) {
		this.getThis().actualizarPaginaAbrirLink(tipo_precio_control);
	}
	
	/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_precio_control) {
		
		jQuery("#divBusquedatipo_precioAjaxWebPart").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trtipo_precioCabeceraBusquedas").css("display",tipo_precio_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_precio").css("display",tipo_precio_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetipo_precio").css("display",tipo_precio_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostipo_precio").attr("style",tipo_precio_control.strPermisoMostrarTodos);		
		
		if(tipo_precio_control.strPermisoNuevo!=null) {
			jQuery("#tdtipo_precioNuevo").css("display",tipo_precio_control.strPermisoNuevo);
			jQuery("#tdtipo_precioNuevoToolBar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtipo_precioDuplicar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_precioDuplicarToolBar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_precioNuevoGuardarCambios").css("display",tipo_precio_control.strPermisoNuevo);
			jQuery("#tdtipo_precioNuevoGuardarCambiosToolBar").css("display",tipo_precio_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tipo_precio_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_precioCopiar").css("display",tipo_precio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_precioCopiarToolBar").css("display",tipo_precio_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_precioConEditar").css("display",tipo_precio_control.strPermisoActualizar);
		}
		
		jQuery("#tdtipo_precioGuardarCambios").css("display",tipo_precio_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtipo_precioGuardarCambiosToolBar").css("display",tipo_precio_control.strPermisoGuardar.replace("row","cell"));
				
		jQuery("#tdtipo_precioCerrarPagina").css("display",tipo_precio_control.strPermisoPopup);		
		jQuery("#tdtipo_precioCerrarPaginaToolBar").css("display",tipo_precio_control.strPermisoPopup);
		//jQuery("#trtipo_precioAccionesRelaciones").css("display",tipo_precio_control.strVisibleTablaAccionesRelaciones);		
	}
}

export {tipo_precio_actions_webcontrol};

//</script>