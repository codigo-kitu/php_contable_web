//<script type="text/javascript" language="javascript">



//var cuenta_corriente_detalleJQueryPaginaWebInteraccion= function (cuenta_corriente_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_corriente_detalle_constante,cuenta_corriente_detalle_constante1} from '../util/cuenta_corriente_detalle_constante.js';

import {cuenta_corriente_detalle_funcion,cuenta_corriente_detalle_funcion1} from '../util/cuenta_corriente_detalle_funcion.js';


class cuenta_corriente_detalle_webcontrol extends GeneralEntityWebControl {
	
	cuenta_corriente_detalle_control=null;
	cuenta_corriente_detalle_controlInicial=null;
	cuenta_corriente_detalle_controlAuxiliar=null;
		
	//if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_corriente_detalle_control) {
		super();
		
		this.cuenta_corriente_detalle_control=cuenta_corriente_detalle_control;
	}
		
	actualizarVariablesPagina(cuenta_corriente_detalle_control) {
		
		if(cuenta_corriente_detalle_control.action=="index" || cuenta_corriente_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_corriente_detalle_control);
			
		} 
		
		
		else if(cuenta_corriente_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cuenta_corriente_detalle_control);
			
		} else if(cuenta_corriente_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cuenta_corriente_detalle_control);
			
		} else if(cuenta_corriente_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_corriente_detalle_control);		
		
		} else if(cuenta_corriente_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cuenta_corriente_detalle_control);
		
		}  else if(cuenta_corriente_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_corriente_detalle_control);
		
		} else if(cuenta_corriente_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_corriente_detalle_control);		
		
		} else if(cuenta_corriente_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_corriente_detalle_control);		
		
		} else if(cuenta_corriente_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_corriente_detalle_control);		
		
		} else if(cuenta_corriente_detalle_control.action.includes("Busqueda") ||
				  cuenta_corriente_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cuenta_corriente_detalle_control);
			
		} else if(cuenta_corriente_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_corriente_detalle_control)
		}
		
		
		
	
		else if(cuenta_corriente_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_corriente_detalle_control);	
		
		} else if(cuenta_corriente_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_corriente_detalle_control);		
		}
	
		else if(cuenta_corriente_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_detalle_control);		
		}
	
		else if(cuenta_corriente_detalle_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_corriente_detalle_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_corriente_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_corriente_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_corriente_detalle_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_corriente_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_corriente_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_corriente_detalle_control);
		this.actualizarPaginaOrderBy(cuenta_corriente_detalle_control);
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_detalle_control);
		this.actualizarPaginaAreaBusquedas(cuenta_corriente_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_corriente_detalle_control) {
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_corriente_detalle_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(cuenta_corriente_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_corriente_detalle_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_corriente_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_corriente_detalle_control);
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_corriente_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_detalle_control);
		this.actualizarPaginaAreaBusquedas(cuenta_corriente_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_corriente_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);		
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);		
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);		
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cuenta_corriente_detalle_control) {
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_corriente_detalle_control) {
		this.actualizarPaginaAbrirLink(cuenta_corriente_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);				
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cuenta_corriente_detalle_control) {
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);
		this.onLoadCombosDefectoFK(cuenta_corriente_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);
		this.onLoadCombosDefectoFK(cuenta_corriente_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_corriente_detalle_control) {
		this.actualizarPaginaAbrirLink(cuenta_corriente_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_corriente_detalle_control) {
					//super.actualizarPaginaImprimir(cuenta_corriente_detalle_control,"cuenta_corriente_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_corriente_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cuenta_corriente_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_corriente_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_corriente_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_corriente_detalle_control) {
		//super.actualizarPaginaImprimir(cuenta_corriente_detalle_control,"cuenta_corriente_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cuenta_corriente_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cuenta_corriente_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_corriente_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_corriente_detalle_control) {
		//super.actualizarPaginaImprimir(cuenta_corriente_detalle_control,"cuenta_corriente_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cuenta_corriente_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_corriente_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_corriente_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_corriente_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_corriente_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_corriente_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cuenta_corriente_detalle_control);
			
		this.actualizarPaginaAbrirLink(cuenta_corriente_detalle_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_corriente_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);
		this.actualizarPaginaFormulario(cuenta_corriente_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_corriente_detalle_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_corriente_detalle_control) {
		
		if(cuenta_corriente_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_corriente_detalle_control);
		}
		
		if(cuenta_corriente_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_corriente_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_corriente_detalle_control) {
		if(cuenta_corriente_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuenta_corriente_detalleReturnGeneral",JSON.stringify(cuenta_corriente_detalle_control.cuenta_corriente_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_corriente_detalle_control) {
		if(cuenta_corriente_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_corriente_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_corriente_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_corriente_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_corriente_detalle_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_corriente_detalle_funcion1.resaltarRestaurarDivsPagina(false,"cuenta_corriente_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_corriente_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta_corriente_detalle");
			}			
			
			cuenta_corriente_detalle_funcion1.mostrarDivMensaje(true,cuenta_corriente_detalle_control.strAuxiliarMensaje,cuenta_corriente_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_corriente_detalle_funcion1.mostrarDivMensaje(false,cuenta_corriente_detalle_control.strAuxiliarMensaje,cuenta_corriente_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_corriente_detalle_control) {
		if(cuenta_corriente_detalle_funcion1.esPaginaForm(cuenta_corriente_detalle_constante1)==true) {
			window.opener.cuenta_corriente_detalle_webcontrol1.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_corriente_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_corriente_detalle_control) {
		cuenta_corriente_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_corriente_detalle_control.strAuxiliarUrlPagina);
				
		cuenta_corriente_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_corriente_detalle_control.strAuxiliarTipo,cuenta_corriente_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_corriente_detalle_control) {
		cuenta_corriente_detalle_funcion1.resaltarRestaurarDivMensaje(true,cuenta_corriente_detalle_control.strAuxiliarMensajeAlert,cuenta_corriente_detalle_control.strAuxiliarCssMensaje);
			
		if(cuenta_corriente_detalle_funcion1.esPaginaForm(cuenta_corriente_detalle_constante1)==true) {
			window.opener.cuenta_corriente_detalle_funcion1.resaltarRestaurarDivMensaje(true,cuenta_corriente_detalle_control.strAuxiliarMensajeAlert,cuenta_corriente_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_corriente_detalle_control) {
		this.cuenta_corriente_detalle_controlInicial=cuenta_corriente_detalle_control;
			
		if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_corriente_detalle_control.strStyleDivArbol,cuenta_corriente_detalle_control.strStyleDivContent
																,cuenta_corriente_detalle_control.strStyleDivOpcionesBanner,cuenta_corriente_detalle_control.strStyleDivExpandirColapsar
																,cuenta_corriente_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cuenta_corriente_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cuenta_corriente_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_corriente_detalle_control) {
		this.actualizarCssBotonesPagina(cuenta_corriente_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_corriente_detalle_control.tiposReportes,cuenta_corriente_detalle_control.tiposReporte
															 	,cuenta_corriente_detalle_control.tiposPaginacion,cuenta_corriente_detalle_control.tiposAcciones
																,cuenta_corriente_detalle_control.tiposColumnasSelect,cuenta_corriente_detalle_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(cuenta_corriente_detalle_control.tiposRelaciones,cuenta_corriente_detalle_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_corriente_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_corriente_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_corriente_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_corriente_detalle_control) {
	
		var indexPosition=cuenta_corriente_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_corriente_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_corriente_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosempresasFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosejerciciosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosperiodosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosusuariosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_corrientesFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosclientesFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosproveedorsFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tabla",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombostablasFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosestadosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarCombosasientosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_pagarsFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_cobrarsFK(cuenta_corriente_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!=null && cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosempresasFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosejerciciosFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosperiodosFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosusuariosFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_corrientesFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosclientesFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosproveedorsFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_tabla",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombostablasFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosestadosFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarCombosasientosFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_pagarsFK(cuenta_corriente_detalle_control);
				}

				if(cuenta_corriente_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_corriente_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_corriente_detalle_webcontrol1.cargarComboscuenta_cobrarsFK(cuenta_corriente_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.empresasFK);
	}

	cargarComboEditarTablaejercicioFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.cuenta_corrientesFK);
	}

	cargarComboEditarTablaclienteFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.clientesFK);
	}

	cargarComboEditarTablaproveedorFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.proveedorsFK);
	}

	cargarComboEditarTablatablaFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.tablasFK);
	}

	cargarComboEditarTablaestadoFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.asientosFK);
	}

	cargarComboEditarTablacuenta_pagarFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.cuenta_pagarsFK);
	}

	cargarComboEditarTablacuenta_cobrarFK(cuenta_corriente_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_control.cuenta_cobrarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cuenta_corriente_detalle_control) {
		jQuery("#divBusquedacuenta_corriente_detalleAjaxWebPart").css("display",cuenta_corriente_detalle_control.strPermisoBusqueda);
		jQuery("#trcuenta_corriente_detalleCabeceraBusquedas").css("display",cuenta_corriente_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_corriente_detalle").css("display",cuenta_corriente_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cuenta_corriente_detalle_control.htmlTablaOrderBy!=null
			&& cuenta_corriente_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycuenta_corriente_detalleAjaxWebPart").html(cuenta_corriente_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cuenta_corriente_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cuenta_corriente_detalle_control.htmlTablaOrderByRel!=null
			&& cuenta_corriente_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcuenta_corriente_detalleAjaxWebPart").html(cuenta_corriente_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacuenta_corriente_detalleAjaxWebPart").css("display","none");
			jQuery("#trcuenta_corriente_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacuenta_corriente_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cuenta_corriente_detalle_control) {
		
		if(!cuenta_corriente_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cuenta_corriente_detalle_control);
		} else {
			jQuery("#divTablaDatoscuenta_corriente_detallesAjaxWebPart").html(cuenta_corriente_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscuenta_corriente_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscuenta_corriente_detalles=jQuery("#tblTablaDatoscuenta_corriente_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cuenta_corriente_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cuenta_corriente_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cuenta_corriente_detalle_webcontrol1.registrarControlesTableEdition(cuenta_corriente_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cuenta_corriente_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cuenta_corriente_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cuenta_corriente_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_corriente_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscuenta_corriente_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cuenta_corriente_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cuenta_corriente_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderBycuenta_corriente_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cuenta_corriente_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcuenta_corriente_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cuenta_corriente_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cuenta_corriente_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(cuenta_corriente_detalle_control) {
		var i=0;
		
		i=cuenta_corriente_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.versionRow);
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_empresa!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_ejercicio!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_3").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_periodo!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_periodo) {
				jQuery("#t-cel_"+i+"_4").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_usuario!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_usuario) {
				jQuery("#t-cel_"+i+"_5").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_corriente!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_6").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").prop('checked',cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.es_balance_inicial);
		jQuery("#t-cel_"+i+"_8").prop('checked',cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.es_cheque);
		jQuery("#t-cel_"+i+"_9").prop('checked',cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.es_deposito);
		jQuery("#t-cel_"+i+"_10").prop('checked',cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.es_retiro);
		jQuery("#t-cel_"+i+"_11").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.numero_cheque);
		jQuery("#t-cel_"+i+"_12").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.fecha_emision);
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cliente!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cliente) {
				jQuery("#t-cel_"+i+"_13").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cliente).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_13").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_proveedor!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_14").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_14").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_proveedor).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_14").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_14").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_15").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.monto);
		jQuery("#t-cel_"+i+"_16").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.debito);
		jQuery("#t-cel_"+i+"_17").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.credito);
		jQuery("#t-cel_"+i+"_18").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.balance);
		jQuery("#t-cel_"+i+"_19").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.fecha_hora);
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_tabla!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_tabla>-1){
			if(jQuery("#t-cel_"+i+"_20").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_tabla) {
				jQuery("#t-cel_"+i+"_20").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_tabla).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_20").select2("val", null);
			if(jQuery("#t-cel_"+i+"_20").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_20").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_21").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_origen);
		jQuery("#t-cel_"+i+"_22").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.descripcion);
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_estado!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_23").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_estado) {
				jQuery("#t-cel_"+i+"_23").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_23").select2("val", null);
			if(jQuery("#t-cel_"+i+"_23").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_23").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_asiento!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_24").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_asiento) {
				jQuery("#t-cel_"+i+"_24").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_24").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_24").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_pagar!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_pagar>-1){
			if(jQuery("#t-cel_"+i+"_25").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_pagar) {
				jQuery("#t-cel_"+i+"_25").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_25").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_25").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_cobrar!=null && cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_26").val() != cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_26").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.id_cuenta_cobrar).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_26").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_26").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_27").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.tabla_origen);
		jQuery("#t-cel_"+i+"_28").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.origen_empresa);
		jQuery("#t-cel_"+i+"_29").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.motivo_anulacion);
		jQuery("#t-cel_"+i+"_30").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.origen_dato);
		jQuery("#t-cel_"+i+"_31").val(cuenta_corriente_detalle_control.cuenta_corriente_detalleActual.computador_origen);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cuenta_corriente_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionclasificacion_cheque").click(function(){
		jQuery("#tblTablaDatoscuenta_corriente_detalles").on("click",".imgrelacionclasificacion_cheque", function () {

			var idActual=jQuery(this).attr("idactualcuenta_corriente_detalle");

			cuenta_corriente_detalle_webcontrol1.registrarSesionParaclasificacion_cheques(idActual);
		});				
	}
		
	

	registrarSesionParaclasificacion_cheques(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"cuenta_corriente_detalle","clasificacion_cheque","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1,"s","");
	}
	
	registrarControlesTableEdition(cuenta_corriente_detalle_control) {
		cuenta_corriente_detalle_funcion1.registrarControlesTableValidacionEdition(cuenta_corriente_detalle_control,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cuenta_corriente_detalle_control) {
		jQuery("#divResumencuenta_corriente_detalleActualAjaxWebPart").html(cuenta_corriente_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_corriente_detalle_control) {
		//jQuery("#divAccionesRelacionescuenta_corriente_detalleAjaxWebPart").html(cuenta_corriente_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cuenta_corriente_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_corriente_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescuenta_corriente_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cuenta_corriente_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cuenta_corriente_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cuenta_corriente_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cuenta_corriente_detalle_control) {
		
		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idasiento);
		}

		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idcliente);
		}

		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idcuenta_corriente);
		}

		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Iddocumento_cuenta_cobrar);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Iddocumento_cuenta_cobrar);
		}

		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Iddocumento_cuenta_pagar);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Iddocumento_cuenta_pagar);
		}

		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idejercicio);
		}

		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idempresa);
		}

		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idestado").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idestado").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idestado);
		}

		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idperiodo);
		}

		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idproveedor);
		}

		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idtabla").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idtabla);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idtabla").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idtabla);
		}

		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_corriente_detalle_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncuenta_corriente_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cuenta_corriente_detalle",id,"cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","empresa","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","ejercicio","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","periodo","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","usuario","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","cuenta_corriente","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","cliente","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","proveedor","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}

	abrirBusquedaParatabla(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","tabla","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","estado","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","asiento","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}

	abrirBusquedaParacuenta_pagar(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","cuenta_pagar","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}

	abrirBusquedaParacuenta_cobrar(strNombreCampoBusqueda){//idActual
		cuenta_corriente_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_corriente_detalle","cuenta_cobrar","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionclasificacion_cheque").click(function(){

			var idActual=jQuery(this).attr("idactualcuenta_corriente_detalle");

			cuenta_corriente_detalle_webcontrol1.registrarSesionParaclasificacion_cheques(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalleConstante,strParametros);
		
		//cuenta_corriente_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa",cuenta_corriente_detalle_control.empresasFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_2",cuenta_corriente_detalle_control.empresasFK);
		}
	};

	cargarCombosejerciciosFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio",cuenta_corriente_detalle_control.ejerciciosFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_3",cuenta_corriente_detalle_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo",cuenta_corriente_detalle_control.periodosFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_4",cuenta_corriente_detalle_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario",cuenta_corriente_detalle_control.usuariosFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_5",cuenta_corriente_detalle_control.usuariosFK);
		}
	};

	cargarComboscuenta_corrientesFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente",cuenta_corriente_detalle_control.cuenta_corrientesFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_6",cuenta_corriente_detalle_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",cuenta_corriente_detalle_control.cuenta_corrientesFK);

	};

	cargarCombosclientesFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente",cuenta_corriente_detalle_control.clientesFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_13",cuenta_corriente_detalle_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",cuenta_corriente_detalle_control.clientesFK);

	};

	cargarCombosproveedorsFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor",cuenta_corriente_detalle_control.proveedorsFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_14",cuenta_corriente_detalle_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",cuenta_corriente_detalle_control.proveedorsFK);

	};

	cargarCombostablasFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla",cuenta_corriente_detalle_control.tablasFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_20",cuenta_corriente_detalle_control.tablasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla",cuenta_corriente_detalle_control.tablasFK);

	};

	cargarCombosestadosFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado",cuenta_corriente_detalle_control.estadosFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_23",cuenta_corriente_detalle_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",cuenta_corriente_detalle_control.estadosFK);

	};

	cargarCombosasientosFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento",cuenta_corriente_detalle_control.asientosFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_24",cuenta_corriente_detalle_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",cuenta_corriente_detalle_control.asientosFK);

	};

	cargarComboscuenta_pagarsFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar",cuenta_corriente_detalle_control.cuenta_pagarsFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_25",cuenta_corriente_detalle_control.cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_cuenta_pagar",cuenta_corriente_detalle_control.cuenta_pagarsFK);

	};

	cargarComboscuenta_cobrarsFK(cuenta_corriente_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar",cuenta_corriente_detalle_control.cuenta_cobrarsFK);

		if(cuenta_corriente_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_corriente_detalle_control.idFilaTablaActual+"_26",cuenta_corriente_detalle_control.cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_cuenta_cobrar",cuenta_corriente_detalle_control.cuenta_cobrarsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosclientesFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombostablasFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosestadosFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeCombosasientosFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeComboscuenta_pagarsFK(cuenta_corriente_detalle_control) {

	};

	registrarComboActionChangeComboscuenta_cobrarsFK(cuenta_corriente_detalle_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_corriente_detalle_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_corriente_detalle_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idejercicioDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_corriente_detalle_control.idejercicioDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_corriente_detalle_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idperiodoDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_corriente_detalle_control.idperiodoDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_corriente_detalle_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_corriente_detalle_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_corriente_detalle_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != cuenta_corriente_detalle_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(cuenta_corriente_detalle_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(cuenta_corriente_detalle_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idclienteDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente").val() != cuenta_corriente_detalle_control.idclienteDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente").val(cuenta_corriente_detalle_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(cuenta_corriente_detalle_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idproveedorDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor").val() != cuenta_corriente_detalle_control.idproveedorDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor").val(cuenta_corriente_detalle_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(cuenta_corriente_detalle_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostablasFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idtablaDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla").val() != cuenta_corriente_detalle_control.idtablaDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla").val(cuenta_corriente_detalle_control.idtablaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla").val(cuenta_corriente_detalle_control.idtablaDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idtabla-cmbid_tabla").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idestadoDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado").val() != cuenta_corriente_detalle_control.idestadoDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado").val(cuenta_corriente_detalle_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(cuenta_corriente_detalle_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idasientoDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento").val() != cuenta_corriente_detalle_control.idasientoDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento").val(cuenta_corriente_detalle_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(cuenta_corriente_detalle_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_pagarsFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idcuenta_pagarDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != cuenta_corriente_detalle_control.idcuenta_pagarDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(cuenta_corriente_detalle_control.idcuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_cuenta_pagar").val(cuenta_corriente_detalle_control.idcuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_cobrarsFK(cuenta_corriente_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_corriente_detalle_control.idcuenta_cobrarDefaultFK>-1 && jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != cuenta_corriente_detalle_control.idcuenta_cobrarDefaultFK) {
				jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(cuenta_corriente_detalle_control.idcuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_cuenta_cobrar").val(cuenta_corriente_detalle_control.idcuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	












	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_corriente_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_corriente_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosempresasFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosejerciciosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosperiodosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorComboscuenta_corrientesFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosclientesFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosproveedorsFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tabla",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombostablasFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosestadosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorCombosasientosFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorComboscuenta_pagarsFK(cuenta_corriente_detalle_control);
			}

			if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_corriente_detalle_webcontrol1.setDefectoValorComboscuenta_cobrarsFK(cuenta_corriente_detalle_control);
			}

			
			//CODIGO PARA TOMAR PRIMER VALOR
			/*
			var strPrimerValor='0';
			jQuery("#ParamsBuscar-cmbPaginacion").each(function() {
				//console.log(jQuery(this).val());
				//console.log(jQuery(this).text());
				strPrimerValor=jQuery(this).val();
				return false;
			});
			
			alert(strPrimerValor);
			*/
		}
	}
	
	//VERIFICAR: Creo no se necesita Controller
	onLoadCombosEventosFK(cuenta_corriente_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosperiodosFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosclientesFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosproveedorsFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_tabla",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombostablasFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosestadosFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeCombosasientosFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeComboscuenta_pagarsFK(cuenta_corriente_detalle_control);
			//}

			//if(cuenta_corriente_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",cuenta_corriente_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_corriente_detalle_webcontrol1.registrarComboActionChangeComboscuenta_cobrarsFK(cuenta_corriente_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_corriente_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_corriente_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cuenta_corriente_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Idasiento","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Idcliente","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Idcuenta_corriente","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Iddocumento_cuenta_cobrar","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Iddocumento_cuenta_pagar","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Idejercicio","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Idempresa","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Idestado","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Idperiodo","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Idproveedor","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Idtabla","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_corriente_detalle","FK_Idusuario","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
		
			
			if(cuenta_corriente_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_corriente_detalle");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_corriente_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,"cuenta_corriente_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("tabla","id_tabla","general","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_tabla_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParatabla("id_tabla");
				//alert(jQuery('#form-id_tabla_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_pagar","id_cuenta_pagar","cuentaspagar","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_pagar("id_cuenta_pagar");
				//alert(jQuery('#form-id_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_cobrar","id_cuenta_cobrar","cuentascobrar","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_corriente_detalle_constante1.STR_SUFIJO+"-id_cuenta_cobrar_img_busqueda").click(function(){
				cuenta_corriente_detalle_webcontrol1.abrirBusquedaParacuenta_cobrar("id_cuenta_cobrar");
				//alert(jQuery('#form-id_cuenta_cobrar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("cuenta_corriente_detalle");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_corriente_detalle_control) {
		
		jQuery("#divBusquedacuenta_corriente_detalleAjaxWebPart").css("display",cuenta_corriente_detalle_control.strPermisoBusqueda);
		jQuery("#trcuenta_corriente_detalleCabeceraBusquedas").css("display",cuenta_corriente_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_corriente_detalle").css("display",cuenta_corriente_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecuenta_corriente_detalle").css("display",cuenta_corriente_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscuenta_corriente_detalle").attr("style",cuenta_corriente_detalle_control.strPermisoMostrarTodos);		
		
		if(cuenta_corriente_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdcuenta_corriente_detalleNuevo").css("display",cuenta_corriente_detalle_control.strPermisoNuevo);
			jQuery("#tdcuenta_corriente_detalleNuevoToolBar").css("display",cuenta_corriente_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcuenta_corriente_detalleDuplicar").css("display",cuenta_corriente_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_corriente_detalleDuplicarToolBar").css("display",cuenta_corriente_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_corriente_detalleNuevoGuardarCambios").css("display",cuenta_corriente_detalle_control.strPermisoNuevo);
			jQuery("#tdcuenta_corriente_detalleNuevoGuardarCambiosToolBar").css("display",cuenta_corriente_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cuenta_corriente_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_corriente_detalleCopiar").css("display",cuenta_corriente_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_corriente_detalleCopiarToolBar").css("display",cuenta_corriente_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_corriente_detalleConEditar").css("display",cuenta_corriente_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdcuenta_corriente_detalleGuardarCambios").css("display",cuenta_corriente_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcuenta_corriente_detalleGuardarCambiosToolBar").css("display",cuenta_corriente_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcuenta_corriente_detalleCerrarPagina").css("display",cuenta_corriente_detalle_control.strPermisoPopup);		
		jQuery("#tdcuenta_corriente_detalleCerrarPaginaToolBar").css("display",cuenta_corriente_detalle_control.strPermisoPopup);
		//jQuery("#trcuenta_corriente_detalleAccionesRelaciones").css("display",cuenta_corriente_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_corriente_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_corriente_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_corriente_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cuenta Corriente Detalles";
		sTituloBanner+=" - " + cuenta_corriente_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_corriente_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuenta_corriente_detalleRelacionesToolBar").css("display",cuenta_corriente_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta_corriente_detalle").css("display",cuenta_corriente_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_corriente_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_corriente_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_corriente_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_corriente_detalle_webcontrol1.registrarEventosControles();
		
		if(cuenta_corriente_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_corriente_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_corriente_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_corriente_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_corriente_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_corriente_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cuenta_corriente_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(cuenta_corriente_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cuenta_corriente_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_corriente_detalle","cuentascorrientes","",cuenta_corriente_detalle_funcion1,cuenta_corriente_detalle_webcontrol1,cuenta_corriente_detalle_constante1);	
	}
}

var cuenta_corriente_detalle_webcontrol1 = new cuenta_corriente_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_corriente_detalle_webcontrol,cuenta_corriente_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_corriente_detalle_webcontrol1 = cuenta_corriente_detalle_webcontrol1;


if(cuenta_corriente_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_corriente_detalle_webcontrol1.onLoadWindow; 
}

//</script>