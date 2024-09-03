//<script type="text/javascript" language="javascript">

//var tipo_precioJQueryPaginaWebInteraccion= function (tipo_precio_control) {

import {Constantes,constantes} from '../../../../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_precio_constante,tipo_precio_constante1} from '../../util/tipo_precio_constante.js';
import {tipo_precio_funcion,tipo_precio_funcion1} from '../../util/form/tipo_precio_form_funcion.js';


class tipo_precio_form_evento_webcontrol extends GeneralEntityWebControl {
	
	tipo_precio_control=null;
	tipo_precio_controlInicial=null;
	tipo_precio_controlAuxiliar=null;
	
	constructor() {	
		super(); /*GeneralEntityWebControl*/
	}
	
	getSuper() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	getThis() {
		return tipo_precio_webcontrol1;/*super*/	
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	

	}
	
	settipo_precio_constante(tipo_precio_constante2) {
		
		tipo_precio_constante1.STR_NOMBRE_PAGINA = tipo_precio_constante2.STR_NOMBRE_PAGINA;
		tipo_precio_constante1.STR_TYPE_ON_LOADtipo_precio = tipo_precio_constante2.STR_TYPE_ON_LOADtipo_precio;
		tipo_precio_constante1.STR_TIPO_PAGINA_AUXILIAR = tipo_precio_constante2.STR_TIPO_PAGINA_AUXILIAR;
		tipo_precio_constante1.STR_TIPO_USUARIO_AUXILIAR = tipo_precio_constante2.STR_TIPO_USUARIO_AUXILIAR;
		tipo_precio_constante1.STR_ACTION = tipo_precio_constante2.STR_ACTION;
		tipo_precio_constante1.STR_ES_POPUP = tipo_precio_constante2.STR_ES_POPUP;
		tipo_precio_constante1.STR_ES_BUSQUEDA = tipo_precio_constante2.STR_ES_BUSQUEDA;
		tipo_precio_constante1.STR_FUNCION_JS = tipo_precio_constante2.STR_FUNCION_JS;
		tipo_precio_constante1.BIG_ID_ACTUAL = tipo_precio_constante2.BIG_ID_ACTUAL;
		tipo_precio_constante1.BIG_ID_OPCION = tipo_precio_constante2.BIG_ID_OPCION;
		tipo_precio_constante1.STR_OBJETO_JS = tipo_precio_constante2.STR_OBJETO_JS;
		tipo_precio_constante1.STR_ES_RELACIONES = tipo_precio_constante2.STR_ES_RELACIONES;
		tipo_precio_constante1.STR_ES_RELACIONADO = tipo_precio_constante2.STR_ES_RELACIONADO;
		tipo_precio_constante1.STR_ES_SUB_PAGINA = tipo_precio_constante2.STR_ES_SUB_PAGINA;
		tipo_precio_constante1.BIT_ES_PAGINA_PRINCIPAL = tipo_precio_constante2.BIT_ES_PAGINA_PRINCIPAL;
		tipo_precio_constante1.BIT_ES_PAGINA_FORM = tipo_precio_constante2.BIT_ES_PAGINA_FORM;
		tipo_precio_constante1.STR_SUFIJO = tipo_precio_constante2.STR_SUFIJO;
		tipo_precio_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS = tipo_precio_constante2.STR_STYLE_DISPLAY_CAMPOS_OCULTOS;
		tipo_precio_constante1.STR_DESCRIPCION_USUARIO_SISTEMA = tipo_precio_constante2.STR_DESCRIPCION_USUARIO_SISTEMA;
		tipo_precio_constante1.STR_NOMBRE_MODULO_ACTUAL = tipo_precio_constante2.STR_NOMBRE_MODULO_ACTUAL;
		tipo_precio_constante1.STR_DESCRIPCION_PERIODO_SISTEMA = tipo_precio_constante2.STR_DESCRIPCION_PERIODO_SISTEMA;
		
		/*DEPENDE DE POST PARA DAR VALOR*/
		tipo_precio_constante1.BIT_ES_LOAD_NORMAL = tipo_precio_constante2.BIT_ES_LOAD_NORMAL;
		tipo_precio_constante1.BIT_ES_PARA_JQUERY = tipo_precio_constante2.BIT_ES_PARA_JQUERY;		
		tipo_precio_constante1.BIT_ES_PAGINA_ADDITIONAL = tipo_precio_constante2.BIT_ES_PAGINA_ADDITIONAL;
	}
	
	actualizarVariablesPagina(tipo_precio_control) {
		
		if(tipo_precio_control.action=="index" || tipo_precio_control.action=="load") {
			this.getThis().actualizarVariablesPaginaAccionIndex(tipo_precio_control);
			
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
		
		
		else if(tipo_precio_control.action=="nuevo") {
			this.getThis().actualizarVariablesPaginaAccionNuevo(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="actualizar") {
			this.getThis().actualizarVariablesPaginaAccionActualizar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="eliminar") {
			this.getThis().actualizarVariablesPaginaAccionEliminar(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="seleccionarActualPaginaForm") {
			this.getThis().actualizarVariablesPaginaAccionSeleccionarActualPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="nuevoPrepararPaginaForm") {
			this.getThis().actualizarVariablesPaginaAccionNuevoPrepararPaginaForm(tipo_precio_control);
		
		} else if(tipo_precio_control.action=="manejarEventos") {
			this.getThis().actualizarVariablesPaginaAccionManejarEventos(tipo_precio_control);		
		
		} else if(tipo_precio_control.action=="recargarFormularioGeneral") {
			this.getThis().actualizarVariablesPaginaAccionRecargarFomularioGeneral(tipo_precio_control);		
		
		} 
		//else if(tipo_precio_control.action=="recargarFormularioGeneralFk") {
		//	this.getThis().actualizarVariablesPaginaAccionRecargarFormularioGeneralFk(tipo_precio_control);		
		//}

		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_precio_control.action + " Revisar Manejo");
			
		}
		
		
		this.getThis().actualizarVariablesPaginaAccionesGenerales(tipo_precio_control);			
	}
	
	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_precio_control) {
		
		if(tipo_precio_control.strAuxiliarMensajeAlert!=""){
			this.getThis().actualizarPaginaMensajeAlert(tipo_precio_control);
		}
		
		if(tipo_precio_control.bitEsEjecutarFuncionJavaScript==true){
			this.getSuper().actualizarPaginaEjecutarJavaScript(tipo_precio_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_precio_control) {
		if(tipo_precio_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_precioReturnGeneral",JSON.stringify(tipo_precio_control.tipo_precioReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_precio_control) {
		if(tipo_precio_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_precio_control.strAuxiliarMensaje!=""){
			this.getThis().actualizarPaginaMensajePantalla(tipo_precio_control, true);
		} else {
			this.getThis().actualizarPaginaMensajePantalla(tipo_precio_control, false);			
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_precio_control) {
		if(tipo_precio_funcion1.esPaginaForm(tipo_precio_constante1)==true) {
			window.opener.tipo_precio_webcontrol1.actualizarPaginaTablaDatos(tipo_precio_control);
		} else {
			this.getThis().actualizarPaginaTablaDatos(tipo_precio_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_precio_control) {
		tipo_precio_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_precio_control.strAuxiliarUrlPagina);
				
		tipo_precio_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_precio_control.strAuxiliarTipo,tipo_precio_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_precio_control) {
		tipo_precio_funcion1.resaltarRestaurarDivMensaje(true,tipo_precio_control.strAuxiliarMensajeAlert,tipo_precio_control.strAuxiliarCssMensaje);
			
		if(tipo_precio_funcion1.esPaginaForm(tipo_precio_constante1)==true) {
			window.opener.tipo_precio_funcion1.resaltarRestaurarDivMensaje(true,tipo_precio_control.strAuxiliarMensajeAlert,tipo_precio_control.strAuxiliarCssMensaje);
		}
	}
}

export {tipo_precio_form_evento_webcontrol};

if(tipo_precio_constante1.STR_ES_RELACIONADO=="false") {
	/*window.onload = tipo_precio_form_webcontrol1.onLoadWindow; */
}

/*
*/

//</script>
