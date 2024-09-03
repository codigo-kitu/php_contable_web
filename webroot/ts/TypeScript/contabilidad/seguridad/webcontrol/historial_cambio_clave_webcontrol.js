//<script type="text/javascript" language="javascript">



//var historial_cambio_claveJQueryPaginaWebInteraccion= function (historial_cambio_clave_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {historial_cambio_clave_constante,historial_cambio_clave_constante1} from '../util/historial_cambio_clave_constante.js';

import {historial_cambio_clave_funcion,historial_cambio_clave_funcion1} from '../util/historial_cambio_clave_funcion.js';


class historial_cambio_clave_webcontrol extends GeneralEntityWebControl {
	
	historial_cambio_clave_control=null;
	historial_cambio_clave_controlInicial=null;
	historial_cambio_clave_controlAuxiliar=null;
		
	//if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(historial_cambio_clave_control) {
		super();
		
		this.historial_cambio_clave_control=historial_cambio_clave_control;
	}
		
	actualizarVariablesPagina(historial_cambio_clave_control) {
		
		if(historial_cambio_clave_control.action=="index" || historial_cambio_clave_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(historial_cambio_clave_control);
			
		} 
		
		
		else if(historial_cambio_clave_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(historial_cambio_clave_control);
			
		} else if(historial_cambio_clave_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(historial_cambio_clave_control);
			
		} else if(historial_cambio_clave_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(historial_cambio_clave_control);		
		
		} else if(historial_cambio_clave_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(historial_cambio_clave_control);
		
		}  else if(historial_cambio_clave_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(historial_cambio_clave_control);
		
		} else if(historial_cambio_clave_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(historial_cambio_clave_control);		
		
		} else if(historial_cambio_clave_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(historial_cambio_clave_control);		
		
		} else if(historial_cambio_clave_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(historial_cambio_clave_control);		
		
		} else if(historial_cambio_clave_control.action.includes("Busqueda") ||
				  historial_cambio_clave_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(historial_cambio_clave_control);
			
		} else if(historial_cambio_clave_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(historial_cambio_clave_control)
		}
		
		
		
	
		else if(historial_cambio_clave_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(historial_cambio_clave_control);	
		
		} else if(historial_cambio_clave_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(historial_cambio_clave_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + historial_cambio_clave_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(historial_cambio_clave_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(historial_cambio_clave_control) {
		this.actualizarPaginaAccionesGenerales(historial_cambio_clave_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(historial_cambio_clave_control) {
		
		this.actualizarPaginaCargaGeneral(historial_cambio_clave_control);
		this.actualizarPaginaOrderBy(historial_cambio_clave_control);
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		this.actualizarPaginaCargaGeneralControles(historial_cambio_clave_control);
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(historial_cambio_clave_control);
		this.actualizarPaginaAreaBusquedas(historial_cambio_clave_control);
		this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(historial_cambio_clave_control) {
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(historial_cambio_clave_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(historial_cambio_clave_control) {
		
		this.actualizarPaginaCargaGeneral(historial_cambio_clave_control);
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		this.actualizarPaginaCargaGeneralControles(historial_cambio_clave_control);
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(historial_cambio_clave_control);
		this.actualizarPaginaAreaBusquedas(historial_cambio_clave_control);
		this.actualizarPaginaCargaCombosFK(historial_cambio_clave_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		//this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		//this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		//this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(historial_cambio_clave_control) {
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(historial_cambio_clave_control) {
		this.actualizarPaginaAbrirLink(historial_cambio_clave_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);				
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		//this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(historial_cambio_clave_control) {
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);
		this.onLoadCombosDefectoFK(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		//this.actualizarPaginaFormulario(historial_cambio_clave_control);
		this.onLoadCombosDefectoFK(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);		
		//this.actualizarPaginaAreaMantenimiento(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(historial_cambio_clave_control) {
		this.actualizarPaginaAbrirLink(historial_cambio_clave_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(historial_cambio_clave_control) {
		this.actualizarPaginaTablaDatos(historial_cambio_clave_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(historial_cambio_clave_control) {
					//super.actualizarPaginaImprimir(historial_cambio_clave_control,"historial_cambio_clave");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",historial_cambio_clave_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("historial_cambio_clave_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(historial_cambio_clave_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(historial_cambio_clave_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(historial_cambio_clave_control) {
		//super.actualizarPaginaImprimir(historial_cambio_clave_control,"historial_cambio_clave");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("historial_cambio_clave_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(historial_cambio_clave_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",historial_cambio_clave_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(historial_cambio_clave_control) {
		//super.actualizarPaginaImprimir(historial_cambio_clave_control,"historial_cambio_clave");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("historial_cambio_clave_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(historial_cambio_clave_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",historial_cambio_clave_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(historial_cambio_clave_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(historial_cambio_clave_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(historial_cambio_clave_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(historial_cambio_clave_control);
			
		this.actualizarPaginaAbrirLink(historial_cambio_clave_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(historial_cambio_clave_control) {
		
		if(historial_cambio_clave_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(historial_cambio_clave_control);
		}
		
		if(historial_cambio_clave_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(historial_cambio_clave_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(historial_cambio_clave_control) {
		if(historial_cambio_clave_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("historial_cambio_claveReturnGeneral",JSON.stringify(historial_cambio_clave_control.historial_cambio_claveReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(historial_cambio_clave_control) {
		if(historial_cambio_clave_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && historial_cambio_clave_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(historial_cambio_clave_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(historial_cambio_clave_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(historial_cambio_clave_control, mostrar) {
		
		if(mostrar==true) {
			historial_cambio_clave_funcion1.resaltarRestaurarDivsPagina(false,"historial_cambio_clave");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				historial_cambio_clave_funcion1.resaltarRestaurarDivMantenimiento(false,"historial_cambio_clave");
			}			
			
			historial_cambio_clave_funcion1.mostrarDivMensaje(true,historial_cambio_clave_control.strAuxiliarMensaje,historial_cambio_clave_control.strAuxiliarCssMensaje);
		
		} else {
			historial_cambio_clave_funcion1.mostrarDivMensaje(false,historial_cambio_clave_control.strAuxiliarMensaje,historial_cambio_clave_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(historial_cambio_clave_control) {
		if(historial_cambio_clave_funcion1.esPaginaForm(historial_cambio_clave_constante1)==true) {
			window.opener.historial_cambio_clave_webcontrol1.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		} else {
			this.actualizarPaginaTablaDatos(historial_cambio_clave_control);
		}
	}
	
	actualizarPaginaAbrirLink(historial_cambio_clave_control) {
		historial_cambio_clave_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(historial_cambio_clave_control.strAuxiliarUrlPagina);
				
		historial_cambio_clave_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(historial_cambio_clave_control.strAuxiliarTipo,historial_cambio_clave_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(historial_cambio_clave_control) {
		historial_cambio_clave_funcion1.resaltarRestaurarDivMensaje(true,historial_cambio_clave_control.strAuxiliarMensajeAlert,historial_cambio_clave_control.strAuxiliarCssMensaje);
			
		if(historial_cambio_clave_funcion1.esPaginaForm(historial_cambio_clave_constante1)==true) {
			window.opener.historial_cambio_clave_funcion1.resaltarRestaurarDivMensaje(true,historial_cambio_clave_control.strAuxiliarMensajeAlert,historial_cambio_clave_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(historial_cambio_clave_control) {
		this.historial_cambio_clave_controlInicial=historial_cambio_clave_control;
			
		if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(historial_cambio_clave_control.strStyleDivArbol,historial_cambio_clave_control.strStyleDivContent
																,historial_cambio_clave_control.strStyleDivOpcionesBanner,historial_cambio_clave_control.strStyleDivExpandirColapsar
																,historial_cambio_clave_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=historial_cambio_clave_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",historial_cambio_clave_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(historial_cambio_clave_control) {
		this.actualizarCssBotonesPagina(historial_cambio_clave_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(historial_cambio_clave_control.tiposReportes,historial_cambio_clave_control.tiposReporte
															 	,historial_cambio_clave_control.tiposPaginacion,historial_cambio_clave_control.tiposAcciones
																,historial_cambio_clave_control.tiposColumnasSelect,historial_cambio_clave_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(historial_cambio_clave_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(historial_cambio_clave_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(historial_cambio_clave_control);			
	}
	
	actualizarPaginaUsuarioInvitado(historial_cambio_clave_control) {
	
		var indexPosition=historial_cambio_clave_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=historial_cambio_clave_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(historial_cambio_clave_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(historial_cambio_clave_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTipos,",")) { 
				historial_cambio_clave_webcontrol1.cargarCombosusuariosFK(historial_cambio_clave_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(historial_cambio_clave_control.strRecargarFkTiposNinguno!=null && historial_cambio_clave_control.strRecargarFkTiposNinguno!='NINGUNO' && historial_cambio_clave_control.strRecargarFkTiposNinguno!='') {
			
				if(historial_cambio_clave_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTiposNinguno,",")) { 
					historial_cambio_clave_webcontrol1.cargarCombosusuariosFK(historial_cambio_clave_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablausuarioFK(historial_cambio_clave_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,historial_cambio_clave_funcion1,historial_cambio_clave_control.usuariosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(historial_cambio_clave_control) {
		jQuery("#divBusquedahistorial_cambio_claveAjaxWebPart").css("display",historial_cambio_clave_control.strPermisoBusqueda);
		jQuery("#trhistorial_cambio_claveCabeceraBusquedas").css("display",historial_cambio_clave_control.strPermisoBusqueda);
		jQuery("#trBusquedahistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(historial_cambio_clave_control.htmlTablaOrderBy!=null
			&& historial_cambio_clave_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByhistorial_cambio_claveAjaxWebPart").html(historial_cambio_clave_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//historial_cambio_clave_webcontrol1.registrarOrderByActions();
			
		}
			
		if(historial_cambio_clave_control.htmlTablaOrderByRel!=null
			&& historial_cambio_clave_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelhistorial_cambio_claveAjaxWebPart").html(historial_cambio_clave_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedahistorial_cambio_claveAjaxWebPart").css("display","none");
			jQuery("#trhistorial_cambio_claveCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedahistorial_cambio_clave").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(historial_cambio_clave_control) {
		
		if(!historial_cambio_clave_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(historial_cambio_clave_control);
		} else {
			jQuery("#divTablaDatoshistorial_cambio_clavesAjaxWebPart").html(historial_cambio_clave_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoshistorial_cambio_claves=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoshistorial_cambio_claves=jQuery("#tblTablaDatoshistorial_cambio_claves").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("historial_cambio_clave",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',historial_cambio_clave_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			historial_cambio_clave_webcontrol1.registrarControlesTableEdition(historial_cambio_clave_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		historial_cambio_clave_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(historial_cambio_clave_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("historial_cambio_clave_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(historial_cambio_clave_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoshistorial_cambio_clavesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(historial_cambio_clave_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(historial_cambio_clave_control);
		
		const divOrderBy = document.getElementById("divOrderByhistorial_cambio_claveAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(historial_cambio_clave_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelhistorial_cambio_claveAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(historial_cambio_clave_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(historial_cambio_clave_control.historial_cambio_claveActual!=null) {//form
			
			this.actualizarCamposFilaTabla(historial_cambio_clave_control);			
		}
	}
	
	actualizarCamposFilaTabla(historial_cambio_clave_control) {
		var i=0;
		
		i=historial_cambio_clave_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(historial_cambio_clave_control.historial_cambio_claveActual.id);
		jQuery("#t-version_row_"+i+"").val(historial_cambio_clave_control.historial_cambio_claveActual.versionRow);
		
		if(historial_cambio_clave_control.historial_cambio_claveActual.id_usuario!=null && historial_cambio_clave_control.historial_cambio_claveActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != historial_cambio_clave_control.historial_cambio_claveActual.id_usuario) {
				jQuery("#t-cel_"+i+"_2").val(historial_cambio_clave_control.historial_cambio_claveActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(historial_cambio_clave_control.historial_cambio_claveActual.nombre);
		jQuery("#t-cel_"+i+"_4").val(historial_cambio_clave_control.historial_cambio_claveActual.fecha_hora);
		jQuery("#t-cel_"+i+"_5").val(historial_cambio_clave_control.historial_cambio_claveActual.observacion);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(historial_cambio_clave_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(historial_cambio_clave_control) {
		historial_cambio_clave_funcion1.registrarControlesTableValidacionEdition(historial_cambio_clave_control,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(historial_cambio_clave_control) {
		jQuery("#divResumenhistorial_cambio_claveActualAjaxWebPart").html(historial_cambio_clave_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(historial_cambio_clave_control) {
		//jQuery("#divAccionesRelacioneshistorial_cambio_claveAjaxWebPart").html(historial_cambio_clave_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("historial_cambio_clave_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(historial_cambio_clave_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacioneshistorial_cambio_claveAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		historial_cambio_clave_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(historial_cambio_clave_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(historial_cambio_clave_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(historial_cambio_clave_control) {
		
		if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+historial_cambio_clave_constante1.STR_SUFIJO+"BusquedaPorIdUsuarioPorFechaHora").attr("style",historial_cambio_clave_control.strVisibleBusquedaPorIdUsuarioPorFechaHora);
			jQuery("#tblstrVisible"+historial_cambio_clave_constante1.STR_SUFIJO+"BusquedaPorIdUsuarioPorFechaHora").attr("style",historial_cambio_clave_control.strVisibleBusquedaPorIdUsuarioPorFechaHora);
		}

		if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+historial_cambio_clave_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",historial_cambio_clave_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+historial_cambio_clave_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",historial_cambio_clave_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionhistorial_cambio_clave();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("historial_cambio_clave",id,"seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);		
	}
	
	

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		historial_cambio_clave_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("historial_cambio_clave","usuario","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_claveConstante,strParametros);
		
		//historial_cambio_clave_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosusuariosFK(historial_cambio_clave_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario",historial_cambio_clave_control.usuariosFK);

		if(historial_cambio_clave_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+historial_cambio_clave_control.idFilaTablaActual+"_2",historial_cambio_clave_control.usuariosFK);
		}
	};

	
	
	registrarComboActionChangeCombosusuariosFK(historial_cambio_clave_control) {

	};

	
	
	setDefectoValorCombosusuariosFK(historial_cambio_clave_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(historial_cambio_clave_control.idusuarioDefaultFK>-1 && jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val() != historial_cambio_clave_control.idusuarioDefaultFK) {
				jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario").val(historial_cambio_clave_control.idusuarioDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//historial_cambio_clave_control
		
	
	}
	
	onLoadCombosDefectoFK(historial_cambio_clave_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(historial_cambio_clave_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(historial_cambio_clave_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTipos,",")) { 
				historial_cambio_clave_webcontrol1.setDefectoValorCombosusuariosFK(historial_cambio_clave_control);
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
	onLoadCombosEventosFK(historial_cambio_clave_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(historial_cambio_clave_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(historial_cambio_clave_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",historial_cambio_clave_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				historial_cambio_clave_webcontrol1.registrarComboActionChangeCombosusuariosFK(historial_cambio_clave_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(historial_cambio_clave_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(historial_cambio_clave_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(historial_cambio_clave_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("historial_cambio_clave","BusquedaPorIdUsuarioPorFechaHora","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("historial_cambio_clave","FK_Idusuario","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
		
			
			if(historial_cambio_clave_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("historial_cambio_clave");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("historial_cambio_clave");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,"historial_cambio_clave");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+historial_cambio_clave_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				historial_cambio_clave_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(historial_cambio_clave_control) {
		
		jQuery("#divBusquedahistorial_cambio_claveAjaxWebPart").css("display",historial_cambio_clave_control.strPermisoBusqueda);
		jQuery("#trhistorial_cambio_claveCabeceraBusquedas").css("display",historial_cambio_clave_control.strPermisoBusqueda);
		jQuery("#trBusquedahistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportehistorial_cambio_clave").css("display",historial_cambio_clave_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoshistorial_cambio_clave").attr("style",historial_cambio_clave_control.strPermisoMostrarTodos);		
		
		if(historial_cambio_clave_control.strPermisoNuevo!=null) {
			jQuery("#tdhistorial_cambio_claveNuevo").css("display",historial_cambio_clave_control.strPermisoNuevo);
			jQuery("#tdhistorial_cambio_claveNuevoToolBar").css("display",historial_cambio_clave_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdhistorial_cambio_claveDuplicar").css("display",historial_cambio_clave_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdhistorial_cambio_claveDuplicarToolBar").css("display",historial_cambio_clave_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdhistorial_cambio_claveNuevoGuardarCambios").css("display",historial_cambio_clave_control.strPermisoNuevo);
			jQuery("#tdhistorial_cambio_claveNuevoGuardarCambiosToolBar").css("display",historial_cambio_clave_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(historial_cambio_clave_control.strPermisoActualizar!=null) {
			jQuery("#tdhistorial_cambio_claveCopiar").css("display",historial_cambio_clave_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdhistorial_cambio_claveCopiarToolBar").css("display",historial_cambio_clave_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdhistorial_cambio_claveConEditar").css("display",historial_cambio_clave_control.strPermisoActualizar);
		}
		
		jQuery("#tdhistorial_cambio_claveGuardarCambios").css("display",historial_cambio_clave_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdhistorial_cambio_claveGuardarCambiosToolBar").css("display",historial_cambio_clave_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdhistorial_cambio_claveCerrarPagina").css("display",historial_cambio_clave_control.strPermisoPopup);		
		jQuery("#tdhistorial_cambio_claveCerrarPaginaToolBar").css("display",historial_cambio_clave_control.strPermisoPopup);
		//jQuery("#trhistorial_cambio_claveAccionesRelaciones").css("display",historial_cambio_clave_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=historial_cambio_clave_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + historial_cambio_clave_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + historial_cambio_clave_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Historial Cambio Claves";
		sTituloBanner+=" - " + historial_cambio_clave_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + historial_cambio_clave_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdhistorial_cambio_claveRelacionesToolBar").css("display",historial_cambio_clave_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoshistorial_cambio_clave").css("display",historial_cambio_clave_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		historial_cambio_clave_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		historial_cambio_clave_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		historial_cambio_clave_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		historial_cambio_clave_webcontrol1.registrarEventosControles();
		
		if(historial_cambio_clave_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
			historial_cambio_clave_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(historial_cambio_clave_constante1.STR_ES_RELACIONES=="true") {
			if(historial_cambio_clave_constante1.BIT_ES_PAGINA_FORM==true) {
				historial_cambio_clave_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(historial_cambio_clave_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(historial_cambio_clave_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				historial_cambio_clave_webcontrol1.onLoad();
			
			//} else {
				//if(historial_cambio_clave_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			historial_cambio_clave_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("historial_cambio_clave","seguridad","",historial_cambio_clave_funcion1,historial_cambio_clave_webcontrol1,historial_cambio_clave_constante1);	
	}
}

var historial_cambio_clave_webcontrol1 = new historial_cambio_clave_webcontrol();

//Para ser llamado desde otro archivo (import)
export {historial_cambio_clave_webcontrol,historial_cambio_clave_webcontrol1};

//Para ser llamado desde window.opener
window.historial_cambio_clave_webcontrol1 = historial_cambio_clave_webcontrol1;


if(historial_cambio_clave_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = historial_cambio_clave_webcontrol1.onLoadWindow; 
}

//</script>