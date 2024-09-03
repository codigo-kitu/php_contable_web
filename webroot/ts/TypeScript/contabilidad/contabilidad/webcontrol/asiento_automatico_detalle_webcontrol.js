//<script type="text/javascript" language="javascript">



//var asiento_automatico_detalleJQueryPaginaWebInteraccion= function (asiento_automatico_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {asiento_automatico_detalle_constante,asiento_automatico_detalle_constante1} from '../util/asiento_automatico_detalle_constante.js';

import {asiento_automatico_detalle_funcion,asiento_automatico_detalle_funcion1} from '../util/asiento_automatico_detalle_funcion.js';


class asiento_automatico_detalle_webcontrol extends GeneralEntityWebControl {
	
	asiento_automatico_detalle_control=null;
	asiento_automatico_detalle_controlInicial=null;
	asiento_automatico_detalle_controlAuxiliar=null;
		
	//if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_automatico_detalle_control) {
		super();
		
		this.asiento_automatico_detalle_control=asiento_automatico_detalle_control;
	}
		
	actualizarVariablesPagina(asiento_automatico_detalle_control) {
		
		if(asiento_automatico_detalle_control.action=="index" || asiento_automatico_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_automatico_detalle_control);
			
		} 
		
		
		else if(asiento_automatico_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(asiento_automatico_detalle_control);
			
		} else if(asiento_automatico_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(asiento_automatico_detalle_control);
			
		} else if(asiento_automatico_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_automatico_detalle_control);		
		
		} else if(asiento_automatico_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(asiento_automatico_detalle_control);
		
		}  else if(asiento_automatico_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_automatico_detalle_control);
		
		} else if(asiento_automatico_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_automatico_detalle_control);		
		
		} else if(asiento_automatico_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(asiento_automatico_detalle_control);		
		
		} else if(asiento_automatico_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(asiento_automatico_detalle_control);		
		
		} else if(asiento_automatico_detalle_control.action.includes("Busqueda") ||
				  asiento_automatico_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(asiento_automatico_detalle_control);
			
		} else if(asiento_automatico_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(asiento_automatico_detalle_control)
		}
		
		
		
	
		else if(asiento_automatico_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_automatico_detalle_control);	
		
		} else if(asiento_automatico_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_detalle_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + asiento_automatico_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(asiento_automatico_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(asiento_automatico_detalle_control) {
		this.actualizarPaginaAccionesGenerales(asiento_automatico_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(asiento_automatico_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_automatico_detalle_control);
		this.actualizarPaginaOrderBy(asiento_automatico_detalle_control);
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control);
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_detalle_control);
		this.actualizarPaginaAreaBusquedas(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_automatico_detalle_control) {
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_detalle_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_automatico_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_automatico_detalle_control);
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control);
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_detalle_control);
		this.actualizarPaginaAreaBusquedas(asiento_automatico_detalle_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(asiento_automatico_detalle_control) {
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_automatico_detalle_control) {
		this.actualizarPaginaAbrirLink(asiento_automatico_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);				
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(asiento_automatico_detalle_control) {
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		this.onLoadCombosDefectoFK(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		//this.actualizarPaginaFormulario(asiento_automatico_detalle_control);
		this.onLoadCombosDefectoFK(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_automatico_detalle_control) {
		this.actualizarPaginaAbrirLink(asiento_automatico_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(asiento_automatico_detalle_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_automatico_detalle_control) {
					//super.actualizarPaginaImprimir(asiento_automatico_detalle_control,"asiento_automatico_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_automatico_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("asiento_automatico_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(asiento_automatico_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_automatico_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_automatico_detalle_control) {
		//super.actualizarPaginaImprimir(asiento_automatico_detalle_control,"asiento_automatico_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("asiento_automatico_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(asiento_automatico_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_automatico_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(asiento_automatico_detalle_control) {
		//super.actualizarPaginaImprimir(asiento_automatico_detalle_control,"asiento_automatico_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("asiento_automatico_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(asiento_automatico_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_automatico_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_automatico_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(asiento_automatico_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(asiento_automatico_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(asiento_automatico_detalle_control);
			
		this.actualizarPaginaAbrirLink(asiento_automatico_detalle_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(asiento_automatico_detalle_control) {
		
		if(asiento_automatico_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_automatico_detalle_control);
		}
		
		if(asiento_automatico_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(asiento_automatico_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(asiento_automatico_detalle_control) {
		if(asiento_automatico_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("asiento_automatico_detalleReturnGeneral",JSON.stringify(asiento_automatico_detalle_control.asiento_automatico_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_detalle_control) {
		if(asiento_automatico_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_automatico_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_automatico_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_automatico_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(asiento_automatico_detalle_control, mostrar) {
		
		if(mostrar==true) {
			asiento_automatico_detalle_funcion1.resaltarRestaurarDivsPagina(false,"asiento_automatico_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_automatico_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"asiento_automatico_detalle");
			}			
			
			asiento_automatico_detalle_funcion1.mostrarDivMensaje(true,asiento_automatico_detalle_control.strAuxiliarMensaje,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_automatico_detalle_funcion1.mostrarDivMensaje(false,asiento_automatico_detalle_control.strAuxiliarMensaje,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_automatico_detalle_control) {
		if(asiento_automatico_detalle_funcion1.esPaginaForm(asiento_automatico_detalle_constante1)==true) {
			window.opener.asiento_automatico_detalle_webcontrol1.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_automatico_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_automatico_detalle_control) {
		asiento_automatico_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_automatico_detalle_control.strAuxiliarUrlPagina);
				
		asiento_automatico_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_automatico_detalle_control.strAuxiliarTipo,asiento_automatico_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_automatico_detalle_control) {
		asiento_automatico_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_detalle_control.strAuxiliarMensajeAlert,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
			
		if(asiento_automatico_detalle_funcion1.esPaginaForm(asiento_automatico_detalle_constante1)==true) {
			window.opener.asiento_automatico_detalle_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_detalle_control.strAuxiliarMensajeAlert,asiento_automatico_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(asiento_automatico_detalle_control) {
		this.asiento_automatico_detalle_controlInicial=asiento_automatico_detalle_control;
			
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_automatico_detalle_control.strStyleDivArbol,asiento_automatico_detalle_control.strStyleDivContent
																,asiento_automatico_detalle_control.strStyleDivOpcionesBanner,asiento_automatico_detalle_control.strStyleDivExpandirColapsar
																,asiento_automatico_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=asiento_automatico_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",asiento_automatico_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(asiento_automatico_detalle_control) {
		this.actualizarCssBotonesPagina(asiento_automatico_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_automatico_detalle_control.tiposReportes,asiento_automatico_detalle_control.tiposReporte
															 	,asiento_automatico_detalle_control.tiposPaginacion,asiento_automatico_detalle_control.tiposAcciones
																,asiento_automatico_detalle_control.tiposColumnasSelect,asiento_automatico_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_automatico_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_automatico_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(asiento_automatico_detalle_control) {
	
		var indexPosition=asiento_automatico_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_automatico_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(asiento_automatico_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarCombosempresasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarCombosasiento_automaticosFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarComboscuentasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!=null && asiento_automatico_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_automatico_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarCombosempresasFK(asiento_automatico_detalle_control);
				}

				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarCombosasiento_automaticosFK(asiento_automatico_detalle_control);
				}

				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarComboscuentasFK(asiento_automatico_detalle_control);
				}

				if(asiento_automatico_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_detalle_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.empresasFK);
	}

	cargarComboEditarTablaasiento_automaticoFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.asiento_automaticosFK);
	}

	cargarComboEditarTablacuentaFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.cuentasFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_automatico_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_detalle_funcion1,asiento_automatico_detalle_control.centro_costosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(asiento_automatico_detalle_control) {
		jQuery("#divBusquedaasiento_automatico_detalleAjaxWebPart").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
		jQuery("#trasiento_automatico_detalleCabeceraBusquedas").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(asiento_automatico_detalle_control.htmlTablaOrderBy!=null
			&& asiento_automatico_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByasiento_automatico_detalleAjaxWebPart").html(asiento_automatico_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//asiento_automatico_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(asiento_automatico_detalle_control.htmlTablaOrderByRel!=null
			&& asiento_automatico_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelasiento_automatico_detalleAjaxWebPart").html(asiento_automatico_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaasiento_automatico_detalleAjaxWebPart").css("display","none");
			jQuery("#trasiento_automatico_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaasiento_automatico_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(asiento_automatico_detalle_control) {
		
		if(!asiento_automatico_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(asiento_automatico_detalle_control);
		} else {
			jQuery("#divTablaDatosasiento_automatico_detallesAjaxWebPart").html(asiento_automatico_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosasiento_automatico_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosasiento_automatico_detalles=jQuery("#tblTablaDatosasiento_automatico_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("asiento_automatico_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',asiento_automatico_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			asiento_automatico_detalle_webcontrol1.registrarControlesTableEdition(asiento_automatico_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		asiento_automatico_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(asiento_automatico_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("asiento_automatico_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(asiento_automatico_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosasiento_automatico_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(asiento_automatico_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(asiento_automatico_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderByasiento_automatico_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(asiento_automatico_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelasiento_automatico_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(asiento_automatico_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(asiento_automatico_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(asiento_automatico_detalle_control) {
		var i=0;
		
		i=asiento_automatico_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.versionRow);
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico) {
				jQuery("#t-cel_"+i+"_3").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_asiento_automatico).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta) {
				jQuery("#t-cel_"+i+"_4").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_cuenta).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo!=null && asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo) {
				jQuery("#t-cel_"+i+"_5").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").prop('checked',asiento_automatico_detalle_control.asiento_automatico_detalleActual.es_credito);
		jQuery("#t-cel_"+i+"_7").val(asiento_automatico_detalle_control.asiento_automatico_detalleActual.cuenta_contable);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(asiento_automatico_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(asiento_automatico_detalle_control) {
		asiento_automatico_detalle_funcion1.registrarControlesTableValidacionEdition(asiento_automatico_detalle_control,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(asiento_automatico_detalle_control) {
		jQuery("#divResumenasiento_automatico_detalleActualAjaxWebPart").html(asiento_automatico_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_automatico_detalle_control) {
		//jQuery("#divAccionesRelacionesasiento_automatico_detalleAjaxWebPart").html(asiento_automatico_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("asiento_automatico_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(asiento_automatico_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesasiento_automatico_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		asiento_automatico_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(asiento_automatico_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(asiento_automatico_detalle_control) {
		
		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idasiento_automatico);
			jQuery("#tblstrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idasiento_automatico);
		}

		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idcentro_costo);
			jQuery("#tblstrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idcentro_costo);
		}

		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idcuenta);
			jQuery("#tblstrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idcuenta);
		}

		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_automatico_detalle_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionasiento_automatico_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("asiento_automatico_detalle",id,"contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		asiento_automatico_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico_detalle","empresa","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}

	abrirBusquedaParaasiento_automatico(strNombreCampoBusqueda){//idActual
		asiento_automatico_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico_detalle","asiento_automatico","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		asiento_automatico_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico_detalle","cuenta","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}

	abrirBusquedaParacentro_costo(strNombreCampoBusqueda){//idActual
		asiento_automatico_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico_detalle","centro_costo","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalleConstante,strParametros);
		
		//asiento_automatico_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa",asiento_automatico_detalle_control.empresasFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_2",asiento_automatico_detalle_control.empresasFK);
		}
	};

	cargarCombosasiento_automaticosFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico",asiento_automatico_detalle_control.asiento_automaticosFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_3",asiento_automatico_detalle_control.asiento_automaticosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico",asiento_automatico_detalle_control.asiento_automaticosFK);

	};

	cargarComboscuentasFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta",asiento_automatico_detalle_control.cuentasFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_4",asiento_automatico_detalle_control.cuentasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta",asiento_automatico_detalle_control.cuentasFK);

	};

	cargarComboscentro_costosFK(asiento_automatico_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo",asiento_automatico_detalle_control.centro_costosFK);

		if(asiento_automatico_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_detalle_control.idFilaTablaActual+"_5",asiento_automatico_detalle_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_automatico_detalle_control.centro_costosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_automatico_detalle_control) {

	};

	registrarComboActionChangeCombosasiento_automaticosFK(asiento_automatico_detalle_control) {

	};

	registrarComboActionChangeComboscuentasFK(asiento_automatico_detalle_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_automatico_detalle_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_automatico_detalle_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa").val(asiento_automatico_detalle_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosasiento_automaticosFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idasiento_automaticoDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val() != asiento_automatico_detalle_control.idasiento_automaticoDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico").val(asiento_automatico_detalle_control.idasiento_automaticoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico").val(asiento_automatico_detalle_control.idasiento_automaticoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idasiento_automatico-cmbid_asiento_automatico").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuentasFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idcuentaDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val() != asiento_automatico_detalle_control.idcuentaDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta").val(asiento_automatico_detalle_control.idcuentaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(asiento_automatico_detalle_control.idcuentaDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcuenta-cmbid_cuenta").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_automatico_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_detalle_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_automatico_detalle_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_automatico_detalle_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_automatico_detalle_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_detalle_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_automatico_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_automatico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorCombosempresasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorCombosasiento_automaticosFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorComboscuentasFK(asiento_automatico_detalle_control);
			}

			if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 
				asiento_automatico_detalle_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_automatico_detalle_control);
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
	onLoadCombosEventosFK(asiento_automatico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_automatico_detalle_control);
			//}

			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento_automatico",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeCombosasiento_automaticosFK(asiento_automatico_detalle_control);
			//}

			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeComboscuentasFK(asiento_automatico_detalle_control);
			//}

			//if(asiento_automatico_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_detalle_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_automatico_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(asiento_automatico_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico_detalle","FK_Idasiento_automatico","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico_detalle","FK_Idcentro_costo","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico_detalle","FK_Idcuenta","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico_detalle","FK_Idempresa","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
		
			
			if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_automatico_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_automatico_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,"asiento_automatico_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento_automatico","id_asiento_automatico","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_asiento_automatico_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParaasiento_automatico("id_asiento_automatico");
				//alert(jQuery('#form-id_asiento_automatico_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_cuenta_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParacuenta("id_cuenta");
				//alert(jQuery('#form-id_cuenta_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_detalle_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_automatico_detalle_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_automatico_detalle_control) {
		
		jQuery("#divBusquedaasiento_automatico_detalleAjaxWebPart").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
		jQuery("#trasiento_automatico_detalleCabeceraBusquedas").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteasiento_automatico_detalle").css("display",asiento_automatico_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosasiento_automatico_detalle").attr("style",asiento_automatico_detalle_control.strPermisoMostrarTodos);		
		
		if(asiento_automatico_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdasiento_automatico_detalleNuevo").css("display",asiento_automatico_detalle_control.strPermisoNuevo);
			jQuery("#tdasiento_automatico_detalleNuevoToolBar").css("display",asiento_automatico_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdasiento_automatico_detalleDuplicar").css("display",asiento_automatico_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_automatico_detalleDuplicarToolBar").css("display",asiento_automatico_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_automatico_detalleNuevoGuardarCambios").css("display",asiento_automatico_detalle_control.strPermisoNuevo);
			jQuery("#tdasiento_automatico_detalleNuevoGuardarCambiosToolBar").css("display",asiento_automatico_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(asiento_automatico_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_automatico_detalleCopiar").css("display",asiento_automatico_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_automatico_detalleCopiarToolBar").css("display",asiento_automatico_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_automatico_detalleConEditar").css("display",asiento_automatico_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdasiento_automatico_detalleGuardarCambios").css("display",asiento_automatico_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdasiento_automatico_detalleGuardarCambiosToolBar").css("display",asiento_automatico_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdasiento_automatico_detalleCerrarPagina").css("display",asiento_automatico_detalle_control.strPermisoPopup);		
		jQuery("#tdasiento_automatico_detalleCerrarPaginaToolBar").css("display",asiento_automatico_detalle_control.strPermisoPopup);
		//jQuery("#trasiento_automatico_detalleAccionesRelaciones").css("display",asiento_automatico_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=asiento_automatico_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_automatico_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + asiento_automatico_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Detalle Asiento Automaticos";
		sTituloBanner+=" - " + asiento_automatico_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_automatico_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdasiento_automatico_detalleRelacionesToolBar").css("display",asiento_automatico_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosasiento_automatico_detalle").css("display",asiento_automatico_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		asiento_automatico_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		asiento_automatico_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_detalle_webcontrol1.registrarEventosControles();
		
		if(asiento_automatico_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
			asiento_automatico_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_automatico_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_automatico_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_automatico_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				asiento_automatico_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(asiento_automatico_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			asiento_automatico_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_automatico_detalle","contabilidad","",asiento_automatico_detalle_funcion1,asiento_automatico_detalle_webcontrol1,asiento_automatico_detalle_constante1);	
	}
}

var asiento_automatico_detalle_webcontrol1 = new asiento_automatico_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {asiento_automatico_detalle_webcontrol,asiento_automatico_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.asiento_automatico_detalle_webcontrol1 = asiento_automatico_detalle_webcontrol1;


if(asiento_automatico_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_automatico_detalle_webcontrol1.onLoadWindow; 
}

//</script>