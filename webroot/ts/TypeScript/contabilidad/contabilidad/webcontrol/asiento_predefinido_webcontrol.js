//<script type="text/javascript" language="javascript">



//var asiento_predefinidoJQueryPaginaWebInteraccion= function (asiento_predefinido_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {asiento_predefinido_constante,asiento_predefinido_constante1} from '../util/asiento_predefinido_constante.js';

import {asiento_predefinido_funcion,asiento_predefinido_funcion1} from '../util/asiento_predefinido_funcion.js';


class asiento_predefinido_webcontrol extends GeneralEntityWebControl {
	
	asiento_predefinido_control=null;
	asiento_predefinido_controlInicial=null;
	asiento_predefinido_controlAuxiliar=null;
		
	//if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_predefinido_control) {
		super();
		
		this.asiento_predefinido_control=asiento_predefinido_control;
	}
		
	actualizarVariablesPagina(asiento_predefinido_control) {
		
		if(asiento_predefinido_control.action=="index" || asiento_predefinido_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_predefinido_control);
			
		} 
		
		
		else if(asiento_predefinido_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(asiento_predefinido_control);
			
		} else if(asiento_predefinido_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(asiento_predefinido_control);
			
		} else if(asiento_predefinido_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_predefinido_control);		
		
		} else if(asiento_predefinido_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(asiento_predefinido_control);
		
		}  else if(asiento_predefinido_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_predefinido_control);
		
		} else if(asiento_predefinido_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_predefinido_control);		
		
		} else if(asiento_predefinido_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(asiento_predefinido_control);		
		
		} else if(asiento_predefinido_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(asiento_predefinido_control);		
		
		} else if(asiento_predefinido_control.action.includes("Busqueda") ||
				  asiento_predefinido_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(asiento_predefinido_control);
			
		} else if(asiento_predefinido_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(asiento_predefinido_control)
		}
		
		
		
	
		else if(asiento_predefinido_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_predefinido_control);	
		
		} else if(asiento_predefinido_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_predefinido_control);		
		}
	
		else if(asiento_predefinido_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_predefinido_control);		
		}
	
		else if(asiento_predefinido_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_predefinido_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + asiento_predefinido_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(asiento_predefinido_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(asiento_predefinido_control) {
		this.actualizarPaginaAccionesGenerales(asiento_predefinido_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(asiento_predefinido_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_predefinido_control);
		this.actualizarPaginaOrderBy(asiento_predefinido_control);
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_control);
		//this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_control);
		this.actualizarPaginaAreaBusquedas(asiento_predefinido_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_predefinido_control) {
		//this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_predefinido_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_predefinido_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_predefinido_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_predefinido_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_predefinido_control);
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		this.actualizarPaginaCargaGeneralControles(asiento_predefinido_control);
		//this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_control);
		this.actualizarPaginaAreaBusquedas(asiento_predefinido_control);
		this.actualizarPaginaCargaCombosFK(asiento_predefinido_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		//this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		//this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		//this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(asiento_predefinido_control) {
		//this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_predefinido_control) {
		this.actualizarPaginaAbrirLink(asiento_predefinido_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);				
		//this.actualizarPaginaFormulario(asiento_predefinido_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		//this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		//this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(asiento_predefinido_control) {
		//this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.onLoadCombosDefectoFK(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		//this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.onLoadCombosDefectoFK(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_predefinido_control) {
		this.actualizarPaginaAbrirLink(asiento_predefinido_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_predefinido_control) {
					//super.actualizarPaginaImprimir(asiento_predefinido_control,"asiento_predefinido");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_predefinido_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("asiento_predefinido_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(asiento_predefinido_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_predefinido_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_predefinido_control) {
		//super.actualizarPaginaImprimir(asiento_predefinido_control,"asiento_predefinido");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("asiento_predefinido_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(asiento_predefinido_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_predefinido_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(asiento_predefinido_control) {
		//super.actualizarPaginaImprimir(asiento_predefinido_control,"asiento_predefinido");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("asiento_predefinido_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(asiento_predefinido_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_predefinido_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_predefinido_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(asiento_predefinido_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(asiento_predefinido_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(asiento_predefinido_control);
			
		this.actualizarPaginaAbrirLink(asiento_predefinido_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(asiento_predefinido_control) {
		this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		this.actualizarPaginaFormulario(asiento_predefinido_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_predefinido_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(asiento_predefinido_control) {
		
		if(asiento_predefinido_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_predefinido_control);
		}
		
		if(asiento_predefinido_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(asiento_predefinido_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(asiento_predefinido_control) {
		if(asiento_predefinido_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("asiento_predefinidoReturnGeneral",JSON.stringify(asiento_predefinido_control.asiento_predefinidoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(asiento_predefinido_control) {
		if(asiento_predefinido_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_predefinido_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_predefinido_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_predefinido_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(asiento_predefinido_control, mostrar) {
		
		if(mostrar==true) {
			asiento_predefinido_funcion1.resaltarRestaurarDivsPagina(false,"asiento_predefinido");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_predefinido_funcion1.resaltarRestaurarDivMantenimiento(false,"asiento_predefinido");
			}			
			
			asiento_predefinido_funcion1.mostrarDivMensaje(true,asiento_predefinido_control.strAuxiliarMensaje,asiento_predefinido_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_predefinido_funcion1.mostrarDivMensaje(false,asiento_predefinido_control.strAuxiliarMensaje,asiento_predefinido_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_predefinido_control) {
		if(asiento_predefinido_funcion1.esPaginaForm(asiento_predefinido_constante1)==true) {
			window.opener.asiento_predefinido_webcontrol1.actualizarPaginaTablaDatos(asiento_predefinido_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_predefinido_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_predefinido_control) {
		asiento_predefinido_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_predefinido_control.strAuxiliarUrlPagina);
				
		asiento_predefinido_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_predefinido_control.strAuxiliarTipo,asiento_predefinido_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_predefinido_control) {
		asiento_predefinido_funcion1.resaltarRestaurarDivMensaje(true,asiento_predefinido_control.strAuxiliarMensajeAlert,asiento_predefinido_control.strAuxiliarCssMensaje);
			
		if(asiento_predefinido_funcion1.esPaginaForm(asiento_predefinido_constante1)==true) {
			window.opener.asiento_predefinido_funcion1.resaltarRestaurarDivMensaje(true,asiento_predefinido_control.strAuxiliarMensajeAlert,asiento_predefinido_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(asiento_predefinido_control) {
		this.asiento_predefinido_controlInicial=asiento_predefinido_control;
			
		if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_predefinido_control.strStyleDivArbol,asiento_predefinido_control.strStyleDivContent
																,asiento_predefinido_control.strStyleDivOpcionesBanner,asiento_predefinido_control.strStyleDivExpandirColapsar
																,asiento_predefinido_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=asiento_predefinido_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",asiento_predefinido_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(asiento_predefinido_control) {
		this.actualizarCssBotonesPagina(asiento_predefinido_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_predefinido_control.tiposReportes,asiento_predefinido_control.tiposReporte
															 	,asiento_predefinido_control.tiposPaginacion,asiento_predefinido_control.tiposAcciones
																,asiento_predefinido_control.tiposColumnasSelect,asiento_predefinido_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(asiento_predefinido_control.tiposRelaciones,asiento_predefinido_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_predefinido_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_predefinido_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_predefinido_control);			
	}
	
	actualizarPaginaUsuarioInvitado(asiento_predefinido_control) {
	
		var indexPosition=asiento_predefinido_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_predefinido_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(asiento_predefinido_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosempresasFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombossucursalsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosejerciciosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosperiodosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosusuariosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosmodulosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosfuentesFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarComboscentro_costosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.cargarCombosdocumento_contablesFK(asiento_predefinido_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_predefinido_control.strRecargarFkTiposNinguno!=null && asiento_predefinido_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_predefinido_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosempresasFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombossucursalsFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosejerciciosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosperiodosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosusuariosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosmodulosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosfuentesFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarComboscentro_costosFK(asiento_predefinido_control);
				}

				if(asiento_predefinido_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTiposNinguno,",")) { 
					asiento_predefinido_webcontrol1.cargarCombosdocumento_contablesFK(asiento_predefinido_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.usuariosFK);
	}

	cargarComboEditarTablamoduloFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.modulosFK);
	}

	cargarComboEditarTablafuenteFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.fuentesFK);
	}

	cargarComboEditarTablalibro_auxiliarFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.libro_auxiliarsFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.centro_costosFK);
	}

	cargarComboEditarTabladocumento_contableFK(asiento_predefinido_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_predefinido_funcion1,asiento_predefinido_control.documento_contablesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(asiento_predefinido_control) {
		jQuery("#divBusquedaasiento_predefinidoAjaxWebPart").css("display",asiento_predefinido_control.strPermisoBusqueda);
		jQuery("#trasiento_predefinidoCabeceraBusquedas").css("display",asiento_predefinido_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_predefinido").css("display",asiento_predefinido_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(asiento_predefinido_control.htmlTablaOrderBy!=null
			&& asiento_predefinido_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByasiento_predefinidoAjaxWebPart").html(asiento_predefinido_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//asiento_predefinido_webcontrol1.registrarOrderByActions();
			
		}
			
		if(asiento_predefinido_control.htmlTablaOrderByRel!=null
			&& asiento_predefinido_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelasiento_predefinidoAjaxWebPart").html(asiento_predefinido_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaasiento_predefinidoAjaxWebPart").css("display","none");
			jQuery("#trasiento_predefinidoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaasiento_predefinido").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(asiento_predefinido_control) {
		
		if(!asiento_predefinido_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(asiento_predefinido_control);
		} else {
			jQuery("#divTablaDatosasiento_predefinidosAjaxWebPart").html(asiento_predefinido_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosasiento_predefinidos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosasiento_predefinidos=jQuery("#tblTablaDatosasiento_predefinidos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("asiento_predefinido",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',asiento_predefinido_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			asiento_predefinido_webcontrol1.registrarControlesTableEdition(asiento_predefinido_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		asiento_predefinido_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(asiento_predefinido_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("asiento_predefinido_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(asiento_predefinido_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosasiento_predefinidosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(asiento_predefinido_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(asiento_predefinido_control);
		
		const divOrderBy = document.getElementById("divOrderByasiento_predefinidoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(asiento_predefinido_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelasiento_predefinidoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(asiento_predefinido_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(asiento_predefinido_control.asiento_predefinidoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(asiento_predefinido_control);			
		}
	}
	
	actualizarCamposFilaTabla(asiento_predefinido_control) {
		var i=0;
		
		i=asiento_predefinido_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(asiento_predefinido_control.asiento_predefinidoActual.id);
		jQuery("#t-version_row_"+i+"").val(asiento_predefinido_control.asiento_predefinidoActual.versionRow);
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_empresa!=null && asiento_predefinido_control.asiento_predefinidoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != asiento_predefinido_control.asiento_predefinidoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(asiento_predefinido_control.asiento_predefinidoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_sucursal!=null && asiento_predefinido_control.asiento_predefinidoActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != asiento_predefinido_control.asiento_predefinidoActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(asiento_predefinido_control.asiento_predefinidoActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio!=null && asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(asiento_predefinido_control.asiento_predefinidoActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_periodo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != asiento_predefinido_control.asiento_predefinidoActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(asiento_predefinido_control.asiento_predefinidoActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_usuario!=null && asiento_predefinido_control.asiento_predefinidoActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != asiento_predefinido_control.asiento_predefinidoActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(asiento_predefinido_control.asiento_predefinidoActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_modulo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_modulo>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != asiento_predefinido_control.asiento_predefinidoActual.id_modulo) {
				jQuery("#t-cel_"+i+"_7").val(asiento_predefinido_control.asiento_predefinidoActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(asiento_predefinido_control.asiento_predefinidoActual.codigo);
		jQuery("#t-cel_"+i+"_9").val(asiento_predefinido_control.asiento_predefinidoActual.nombre);
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_fuente!=null && asiento_predefinido_control.asiento_predefinidoActual.id_fuente>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != asiento_predefinido_control.asiento_predefinidoActual.id_fuente) {
				jQuery("#t-cel_"+i+"_10").val(asiento_predefinido_control.asiento_predefinidoActual.id_fuente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_10").select2("val", null);
			if(jQuery("#t-cel_"+i+"_10").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar!=null && asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar>-1){
			if(jQuery("#t-cel_"+i+"_11").val() != asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar) {
				jQuery("#t-cel_"+i+"_11").val(asiento_predefinido_control.asiento_predefinidoActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_11").select2("val", null);
			if(jQuery("#t-cel_"+i+"_11").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_11").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo!=null && asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo) {
				jQuery("#t-cel_"+i+"_12").val(asiento_predefinido_control.asiento_predefinidoActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable!=null && asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable) {
				jQuery("#t-cel_"+i+"_13").val(asiento_predefinido_control.asiento_predefinidoActual.id_documento_contable).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(asiento_predefinido_control.asiento_predefinidoActual.descripcion);
		jQuery("#t-cel_"+i+"_15").val(asiento_predefinido_control.asiento_predefinidoActual.nro_nit);
		jQuery("#t-cel_"+i+"_16").val(asiento_predefinido_control.asiento_predefinidoActual.referencia);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(asiento_predefinido_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento").click(function(){
		jQuery("#tblTablaDatosasiento_predefinidos").on("click",".imgrelacionasiento", function () {

			var idActual=jQuery(this).attr("idactualasiento_predefinido");

			asiento_predefinido_webcontrol1.registrarSesionParaasientos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_predefinido_detalle").click(function(){
		jQuery("#tblTablaDatosasiento_predefinidos").on("click",".imgrelacionasiento_predefinido_detalle", function () {

			var idActual=jQuery(this).attr("idactualasiento_predefinido");

			asiento_predefinido_webcontrol1.registrarSesionParaasiento_predefinido_detalles(idActual);
		});				
	}
		
	

	registrarSesionParaasientos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"asiento_predefinido","asiento","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1,"s","");
	}

	registrarSesionParaasiento_predefinido_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"asiento_predefinido","asiento_predefinido_detalle","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1,"s","");
	}
	
	registrarControlesTableEdition(asiento_predefinido_control) {
		asiento_predefinido_funcion1.registrarControlesTableValidacionEdition(asiento_predefinido_control,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(asiento_predefinido_control) {
		jQuery("#divResumenasiento_predefinidoActualAjaxWebPart").html(asiento_predefinido_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_predefinido_control) {
		//jQuery("#divAccionesRelacionesasiento_predefinidoAjaxWebPart").html(asiento_predefinido_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("asiento_predefinido_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(asiento_predefinido_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesasiento_predefinidoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		asiento_predefinido_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(asiento_predefinido_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(asiento_predefinido_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(asiento_predefinido_control) {
		
		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_predefinido_control.strVisibleFK_Idcentro_costo);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_predefinido_control.strVisibleFK_Idcentro_costo);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable").attr("style",asiento_predefinido_control.strVisibleFK_Iddocumento_contable);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable").attr("style",asiento_predefinido_control.strVisibleFK_Iddocumento_contable);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",asiento_predefinido_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",asiento_predefinido_control.strVisibleFK_Idejercicio);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_predefinido_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_predefinido_control.strVisibleFK_Idempresa);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente").attr("style",asiento_predefinido_control.strVisibleFK_Idfuente);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente").attr("style",asiento_predefinido_control.strVisibleFK_Idfuente);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",asiento_predefinido_control.strVisibleFK_Idlibro_auxiliar);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",asiento_predefinido_control.strVisibleFK_Idlibro_auxiliar);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",asiento_predefinido_control.strVisibleFK_Idmodulo);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",asiento_predefinido_control.strVisibleFK_Idmodulo);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",asiento_predefinido_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",asiento_predefinido_control.strVisibleFK_Idperiodo);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",asiento_predefinido_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",asiento_predefinido_control.strVisibleFK_Idsucursal);
		}

		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",asiento_predefinido_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",asiento_predefinido_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionasiento_predefinido();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("asiento_predefinido",id,"contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","empresa","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","sucursal","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","ejercicio","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","periodo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","usuario","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParamodulo(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","modulo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParafuente(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","fuente","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParalibro_auxiliar(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","libro_auxiliar","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParacentro_costo(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","centro_costo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}

	abrirBusquedaParadocumento_contable(strNombreCampoBusqueda){//idActual
		asiento_predefinido_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_predefinido","documento_contable","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionasiento").click(function(){

			var idActual=jQuery(this).attr("idactualasiento_predefinido");

			asiento_predefinido_webcontrol1.registrarSesionParaasientos(idActual);
		});
		jQuery("#imgdivrelacionasiento_predefinido_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualasiento_predefinido");

			asiento_predefinido_webcontrol1.registrarSesionParaasiento_predefinido_detalles(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinidoConstante,strParametros);
		
		//asiento_predefinido_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa",asiento_predefinido_control.empresasFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_2",asiento_predefinido_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal",asiento_predefinido_control.sucursalsFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_3",asiento_predefinido_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio",asiento_predefinido_control.ejerciciosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_4",asiento_predefinido_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo",asiento_predefinido_control.periodosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_5",asiento_predefinido_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario",asiento_predefinido_control.usuariosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_6",asiento_predefinido_control.usuariosFK);
		}
	};

	cargarCombosmodulosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo",asiento_predefinido_control.modulosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_7",asiento_predefinido_control.modulosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo",asiento_predefinido_control.modulosFK);

	};

	cargarCombosfuentesFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente",asiento_predefinido_control.fuentesFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_10",asiento_predefinido_control.fuentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente",asiento_predefinido_control.fuentesFK);

	};

	cargarComboslibro_auxiliarsFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar",asiento_predefinido_control.libro_auxiliarsFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_11",asiento_predefinido_control.libro_auxiliarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar",asiento_predefinido_control.libro_auxiliarsFK);

	};

	cargarComboscentro_costosFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo",asiento_predefinido_control.centro_costosFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_12",asiento_predefinido_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_predefinido_control.centro_costosFK);

	};

	cargarCombosdocumento_contablesFK(asiento_predefinido_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable",asiento_predefinido_control.documento_contablesFK);

		if(asiento_predefinido_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_predefinido_control.idFilaTablaActual+"_13",asiento_predefinido_control.documento_contablesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable",asiento_predefinido_control.documento_contablesFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombossucursalsFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosperiodosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosusuariosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosmodulosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosfuentesFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeComboslibro_auxiliarsFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_predefinido_control) {

	};

	registrarComboActionChangeCombosdocumento_contablesFK(asiento_predefinido_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_predefinido_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa").val(asiento_predefinido_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idsucursalDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val() != asiento_predefinido_control.idsucursalDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal").val(asiento_predefinido_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idejercicioDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val() != asiento_predefinido_control.idejercicioDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio").val(asiento_predefinido_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idperiodoDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val() != asiento_predefinido_control.idperiodoDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo").val(asiento_predefinido_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idusuarioDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val() != asiento_predefinido_control.idusuarioDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario").val(asiento_predefinido_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosmodulosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idmoduloDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val() != asiento_predefinido_control.idmoduloDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo").val(asiento_predefinido_control.idmoduloDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(asiento_predefinido_control.idmoduloDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosfuentesFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idfuenteDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val() != asiento_predefinido_control.idfuenteDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente").val(asiento_predefinido_control.idfuenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(asiento_predefinido_control.idfuenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboslibro_auxiliarsFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idlibro_auxiliarDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != asiento_predefinido_control.idlibro_auxiliarDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(asiento_predefinido_control.idlibro_auxiliarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(asiento_predefinido_control.idlibro_auxiliarDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_predefinido_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_predefinido_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_predefinido_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_contablesFK(asiento_predefinido_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_predefinido_control.iddocumento_contableDefaultFK>-1 && jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val() != asiento_predefinido_control.iddocumento_contableDefaultFK) {
				jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable").val(asiento_predefinido_control.iddocumento_contableDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val(asiento_predefinido_control.iddocumento_contableDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_predefinido_constante1.STR_SUFIJO+"FK_Iddocumento_contable-cmbid_documento_contable").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_predefinido_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_predefinido_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosempresasFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombossucursalsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosejerciciosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosperiodosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosusuariosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosmodulosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosfuentesFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorComboslibro_auxiliarsFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_predefinido_control);
			}

			if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTipos,",")) { 
				asiento_predefinido_webcontrol1.setDefectoValorCombosdocumento_contablesFK(asiento_predefinido_control);
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
	onLoadCombosEventosFK(asiento_predefinido_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombossucursalsFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosejerciciosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosperiodosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosusuariosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosmodulosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosfuentesFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeComboslibro_auxiliarsFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_predefinido_control);
			//}

			//if(asiento_predefinido_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_contable",asiento_predefinido_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_predefinido_webcontrol1.registrarComboActionChangeCombosdocumento_contablesFK(asiento_predefinido_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_predefinido_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_predefinido_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(asiento_predefinido_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idcentro_costo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Iddocumento_contable","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idejercicio","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idempresa","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idfuente","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idlibro_auxiliar","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idmodulo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idperiodo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idsucursal","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_predefinido","FK_Idusuario","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
		
			
			if(asiento_predefinido_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_predefinido");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_predefinido");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,"asiento_predefinido");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("fuente","id_fuente","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_fuente_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParafuente("id_fuente");
				//alert(jQuery('#form-id_fuente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("libro_auxiliar","id_libro_auxiliar","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_libro_auxiliar_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParalibro_auxiliar("id_libro_auxiliar");
				//alert(jQuery('#form-id_libro_auxiliar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_contable","id_documento_contable","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_predefinido_constante1.STR_SUFIJO+"-id_documento_contable_img_busqueda").click(function(){
				asiento_predefinido_webcontrol1.abrirBusquedaParadocumento_contable("id_documento_contable");
				//alert(jQuery('#form-id_documento_contable_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("asiento_predefinido");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_predefinido_control) {
		
		jQuery("#divBusquedaasiento_predefinidoAjaxWebPart").css("display",asiento_predefinido_control.strPermisoBusqueda);
		jQuery("#trasiento_predefinidoCabeceraBusquedas").css("display",asiento_predefinido_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_predefinido").css("display",asiento_predefinido_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteasiento_predefinido").css("display",asiento_predefinido_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosasiento_predefinido").attr("style",asiento_predefinido_control.strPermisoMostrarTodos);		
		
		if(asiento_predefinido_control.strPermisoNuevo!=null) {
			jQuery("#tdasiento_predefinidoNuevo").css("display",asiento_predefinido_control.strPermisoNuevo);
			jQuery("#tdasiento_predefinidoNuevoToolBar").css("display",asiento_predefinido_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdasiento_predefinidoDuplicar").css("display",asiento_predefinido_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_predefinidoDuplicarToolBar").css("display",asiento_predefinido_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_predefinidoNuevoGuardarCambios").css("display",asiento_predefinido_control.strPermisoNuevo);
			jQuery("#tdasiento_predefinidoNuevoGuardarCambiosToolBar").css("display",asiento_predefinido_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(asiento_predefinido_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_predefinidoCopiar").css("display",asiento_predefinido_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_predefinidoCopiarToolBar").css("display",asiento_predefinido_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_predefinidoConEditar").css("display",asiento_predefinido_control.strPermisoActualizar);
		}
		
		jQuery("#tdasiento_predefinidoGuardarCambios").css("display",asiento_predefinido_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdasiento_predefinidoGuardarCambiosToolBar").css("display",asiento_predefinido_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdasiento_predefinidoCerrarPagina").css("display",asiento_predefinido_control.strPermisoPopup);		
		jQuery("#tdasiento_predefinidoCerrarPaginaToolBar").css("display",asiento_predefinido_control.strPermisoPopup);
		//jQuery("#trasiento_predefinidoAccionesRelaciones").css("display",asiento_predefinido_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=asiento_predefinido_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_predefinido_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + asiento_predefinido_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Asiento Predefinidos";
		sTituloBanner+=" - " + asiento_predefinido_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_predefinido_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdasiento_predefinidoRelacionesToolBar").css("display",asiento_predefinido_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosasiento_predefinido").css("display",asiento_predefinido_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		asiento_predefinido_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		asiento_predefinido_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_predefinido_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_predefinido_webcontrol1.registrarEventosControles();
		
		if(asiento_predefinido_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
			asiento_predefinido_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_predefinido_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_predefinido_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_predefinido_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_predefinido_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(asiento_predefinido_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				asiento_predefinido_webcontrol1.onLoad();
			
			//} else {
				//if(asiento_predefinido_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			asiento_predefinido_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_predefinido","contabilidad","",asiento_predefinido_funcion1,asiento_predefinido_webcontrol1,asiento_predefinido_constante1);	
	}
}

var asiento_predefinido_webcontrol1 = new asiento_predefinido_webcontrol();

//Para ser llamado desde otro archivo (import)
export {asiento_predefinido_webcontrol,asiento_predefinido_webcontrol1};

//Para ser llamado desde window.opener
window.asiento_predefinido_webcontrol1 = asiento_predefinido_webcontrol1;


if(asiento_predefinido_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_predefinido_webcontrol1.onLoadWindow; 
}

//</script>