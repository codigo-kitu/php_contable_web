//<script type="text/javascript" language="javascript">



//var retencion_icaJQueryPaginaWebInteraccion= function (retencion_ica_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {retencion_ica_constante,retencion_ica_constante1} from '../util/retencion_ica_constante.js';

import {retencion_ica_funcion,retencion_ica_funcion1} from '../util/retencion_ica_funcion.js';


class retencion_ica_webcontrol extends GeneralEntityWebControl {
	
	retencion_ica_control=null;
	retencion_ica_controlInicial=null;
	retencion_ica_controlAuxiliar=null;
		
	//if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(retencion_ica_control) {
		super();
		
		this.retencion_ica_control=retencion_ica_control;
	}
		
	actualizarVariablesPagina(retencion_ica_control) {
		
		if(retencion_ica_control.action=="index" || retencion_ica_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(retencion_ica_control);
			
		} 
		
		
		else if(retencion_ica_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(retencion_ica_control);
			
		} else if(retencion_ica_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(retencion_ica_control);
			
		} else if(retencion_ica_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_ica_control);		
		
		} else if(retencion_ica_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(retencion_ica_control);
		
		}  else if(retencion_ica_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_ica_control);
		
		} else if(retencion_ica_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_ica_control);		
		
		} else if(retencion_ica_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(retencion_ica_control);		
		
		} else if(retencion_ica_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(retencion_ica_control);		
		
		} else if(retencion_ica_control.action.includes("Busqueda") ||
				  retencion_ica_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(retencion_ica_control);
			
		} else if(retencion_ica_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(retencion_ica_control)
		}
		
		
		
	
		else if(retencion_ica_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(retencion_ica_control);	
		
		} else if(retencion_ica_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_ica_control);		
		}
	
		else if(retencion_ica_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_ica_control);		
		}
	
		else if(retencion_ica_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_ica_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + retencion_ica_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(retencion_ica_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(retencion_ica_control) {
		this.actualizarPaginaAccionesGenerales(retencion_ica_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(retencion_ica_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_ica_control);
		this.actualizarPaginaOrderBy(retencion_ica_control);
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		this.actualizarPaginaCargaGeneralControles(retencion_ica_control);
		//this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_ica_control);
		this.actualizarPaginaAreaBusquedas(retencion_ica_control);
		this.actualizarPaginaCargaCombosFK(retencion_ica_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(retencion_ica_control) {
		//this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_ica_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_ica_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_ica_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_ica_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_ica_control);
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		this.actualizarPaginaCargaGeneralControles(retencion_ica_control);
		//this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_ica_control);
		this.actualizarPaginaAreaBusquedas(retencion_ica_control);
		this.actualizarPaginaCargaCombosFK(retencion_ica_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		//this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		//this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		//this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(retencion_ica_control) {
		//this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_ica_control) {
		this.actualizarPaginaAbrirLink(retencion_ica_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);				
		//this.actualizarPaginaFormulario(retencion_ica_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		//this.actualizarPaginaFormulario(retencion_ica_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		//this.actualizarPaginaFormulario(retencion_ica_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(retencion_ica_control) {
		//this.actualizarPaginaFormulario(retencion_ica_control);
		this.onLoadCombosDefectoFK(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		//this.actualizarPaginaFormulario(retencion_ica_control);
		this.onLoadCombosDefectoFK(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_ica_control) {
		this.actualizarPaginaAbrirLink(retencion_ica_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_ica_control) {
					//super.actualizarPaginaImprimir(retencion_ica_control,"retencion_ica");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retencion_ica_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("retencion_ica_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(retencion_ica_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retencion_ica_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_ica_control) {
		//super.actualizarPaginaImprimir(retencion_ica_control,"retencion_ica");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("retencion_ica_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(retencion_ica_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retencion_ica_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(retencion_ica_control) {
		//super.actualizarPaginaImprimir(retencion_ica_control,"retencion_ica");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("retencion_ica_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(retencion_ica_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retencion_ica_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retencion_ica_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(retencion_ica_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(retencion_ica_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(retencion_ica_control);
			
		this.actualizarPaginaAbrirLink(retencion_ica_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(retencion_ica_control) {
		this.actualizarPaginaTablaDatos(retencion_ica_control);
		this.actualizarPaginaFormulario(retencion_ica_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_ica_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(retencion_ica_control) {
		
		if(retencion_ica_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(retencion_ica_control);
		}
		
		if(retencion_ica_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(retencion_ica_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(retencion_ica_control) {
		if(retencion_ica_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("retencion_icaReturnGeneral",JSON.stringify(retencion_ica_control.retencion_icaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(retencion_ica_control) {
		if(retencion_ica_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_ica_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(retencion_ica_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(retencion_ica_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(retencion_ica_control, mostrar) {
		
		if(mostrar==true) {
			retencion_ica_funcion1.resaltarRestaurarDivsPagina(false,"retencion_ica");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				retencion_ica_funcion1.resaltarRestaurarDivMantenimiento(false,"retencion_ica");
			}			
			
			retencion_ica_funcion1.mostrarDivMensaje(true,retencion_ica_control.strAuxiliarMensaje,retencion_ica_control.strAuxiliarCssMensaje);
		
		} else {
			retencion_ica_funcion1.mostrarDivMensaje(false,retencion_ica_control.strAuxiliarMensaje,retencion_ica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(retencion_ica_control) {
		if(retencion_ica_funcion1.esPaginaForm(retencion_ica_constante1)==true) {
			window.opener.retencion_ica_webcontrol1.actualizarPaginaTablaDatos(retencion_ica_control);
		} else {
			this.actualizarPaginaTablaDatos(retencion_ica_control);
		}
	}
	
	actualizarPaginaAbrirLink(retencion_ica_control) {
		retencion_ica_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(retencion_ica_control.strAuxiliarUrlPagina);
				
		retencion_ica_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(retencion_ica_control.strAuxiliarTipo,retencion_ica_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(retencion_ica_control) {
		retencion_ica_funcion1.resaltarRestaurarDivMensaje(true,retencion_ica_control.strAuxiliarMensajeAlert,retencion_ica_control.strAuxiliarCssMensaje);
			
		if(retencion_ica_funcion1.esPaginaForm(retencion_ica_constante1)==true) {
			window.opener.retencion_ica_funcion1.resaltarRestaurarDivMensaje(true,retencion_ica_control.strAuxiliarMensajeAlert,retencion_ica_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(retencion_ica_control) {
		this.retencion_ica_controlInicial=retencion_ica_control;
			
		if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(retencion_ica_control.strStyleDivArbol,retencion_ica_control.strStyleDivContent
																,retencion_ica_control.strStyleDivOpcionesBanner,retencion_ica_control.strStyleDivExpandirColapsar
																,retencion_ica_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=retencion_ica_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",retencion_ica_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(retencion_ica_control) {
		this.actualizarCssBotonesPagina(retencion_ica_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(retencion_ica_control.tiposReportes,retencion_ica_control.tiposReporte
															 	,retencion_ica_control.tiposPaginacion,retencion_ica_control.tiposAcciones
																,retencion_ica_control.tiposColumnasSelect,retencion_ica_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(retencion_ica_control.tiposRelaciones,retencion_ica_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(retencion_ica_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(retencion_ica_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(retencion_ica_control);			
	}
	
	actualizarPaginaUsuarioInvitado(retencion_ica_control) {
	
		var indexPosition=retencion_ica_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=retencion_ica_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(retencion_ica_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.cargarCombosempresasFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.cargarComboscuenta_ventassFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.cargarComboscuenta_comprassFK(retencion_ica_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(retencion_ica_control.strRecargarFkTiposNinguno!=null && retencion_ica_control.strRecargarFkTiposNinguno!='NINGUNO' && retencion_ica_control.strRecargarFkTiposNinguno!='') {
			
				if(retencion_ica_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTiposNinguno,",")) { 
					retencion_ica_webcontrol1.cargarCombosempresasFK(retencion_ica_control);
				}

				if(retencion_ica_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTiposNinguno,",")) { 
					retencion_ica_webcontrol1.cargarComboscuenta_ventassFK(retencion_ica_control);
				}

				if(retencion_ica_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTiposNinguno,",")) { 
					retencion_ica_webcontrol1.cargarComboscuenta_comprassFK(retencion_ica_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(retencion_ica_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_ica_funcion1,retencion_ica_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(retencion_ica_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_ica_funcion1,retencion_ica_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(retencion_ica_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_ica_funcion1,retencion_ica_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(retencion_ica_control) {
		jQuery("#divBusquedaretencion_icaAjaxWebPart").css("display",retencion_ica_control.strPermisoBusqueda);
		jQuery("#trretencion_icaCabeceraBusquedas").css("display",retencion_ica_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion_ica").css("display",retencion_ica_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(retencion_ica_control.htmlTablaOrderBy!=null
			&& retencion_ica_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByretencion_icaAjaxWebPart").html(retencion_ica_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//retencion_ica_webcontrol1.registrarOrderByActions();
			
		}
			
		if(retencion_ica_control.htmlTablaOrderByRel!=null
			&& retencion_ica_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelretencion_icaAjaxWebPart").html(retencion_ica_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(retencion_ica_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaretencion_icaAjaxWebPart").css("display","none");
			jQuery("#trretencion_icaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaretencion_ica").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(retencion_ica_control) {
		
		if(!retencion_ica_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(retencion_ica_control);
		} else {
			jQuery("#divTablaDatosretencion_icasAjaxWebPart").html(retencion_ica_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosretencion_icas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosretencion_icas=jQuery("#tblTablaDatosretencion_icas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("retencion_ica",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',retencion_ica_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			retencion_ica_webcontrol1.registrarControlesTableEdition(retencion_ica_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		retencion_ica_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(retencion_ica_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("retencion_ica_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(retencion_ica_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosretencion_icasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(retencion_ica_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(retencion_ica_control);
		
		const divOrderBy = document.getElementById("divOrderByretencion_icaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(retencion_ica_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelretencion_icaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(retencion_ica_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(retencion_ica_control.retencion_icaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(retencion_ica_control);			
		}
	}
	
	actualizarCamposFilaTabla(retencion_ica_control) {
		var i=0;
		
		i=retencion_ica_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(retencion_ica_control.retencion_icaActual.id);
		jQuery("#t-version_row_"+i+"").val(retencion_ica_control.retencion_icaActual.versionRow);
		
		if(retencion_ica_control.retencion_icaActual.id_empresa!=null && retencion_ica_control.retencion_icaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != retencion_ica_control.retencion_icaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(retencion_ica_control.retencion_icaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(retencion_ica_control.retencion_icaActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(retencion_ica_control.retencion_icaActual.descripcion);
		jQuery("#t-cel_"+i+"_5").val(retencion_ica_control.retencion_icaActual.valor);
		jQuery("#t-cel_"+i+"_6").val(retencion_ica_control.retencion_icaActual.valor_base);
		jQuery("#t-cel_"+i+"_7").prop('checked',retencion_ica_control.retencion_icaActual.predeterminado);
		
		if(retencion_ica_control.retencion_icaActual.id_cuenta_ventas!=null && retencion_ica_control.retencion_icaActual.id_cuenta_ventas>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != retencion_ica_control.retencion_icaActual.id_cuenta_ventas) {
				jQuery("#t-cel_"+i+"_8").val(retencion_ica_control.retencion_icaActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_8").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_ica_control.retencion_icaActual.id_cuenta_compras!=null && retencion_ica_control.retencion_icaActual.id_cuenta_compras>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != retencion_ica_control.retencion_icaActual.id_cuenta_compras) {
				jQuery("#t-cel_"+i+"_9").val(retencion_ica_control.retencion_icaActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(retencion_ica_control.retencion_icaActual.cuenta_contable_ventas);
		jQuery("#t-cel_"+i+"_11").val(retencion_ica_control.retencion_icaActual.cuenta_contable_compras);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(retencion_ica_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosretencion_icas").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualretencion_ica");

			retencion_ica_webcontrol1.registrarSesionParaproveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatosretencion_icas").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualretencion_ica");

			retencion_ica_webcontrol1.registrarSesionParaclientes(idActual);
		});				
	}
		
	

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"retencion_ica","proveedor","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1,"es","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"retencion_ica","cliente","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1,"s","");
	}
	
	registrarControlesTableEdition(retencion_ica_control) {
		retencion_ica_funcion1.registrarControlesTableValidacionEdition(retencion_ica_control,retencion_ica_webcontrol1,retencion_ica_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(retencion_ica_control) {
		jQuery("#divResumenretencion_icaActualAjaxWebPart").html(retencion_ica_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_ica_control) {
		//jQuery("#divAccionesRelacionesretencion_icaAjaxWebPart").html(retencion_ica_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("retencion_ica_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(retencion_ica_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesretencion_icaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		retencion_ica_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(retencion_ica_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(retencion_ica_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(retencion_ica_control) {
		
		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_ica_control.strVisibleFK_Idcuenta_compras);
			jQuery("#tblstrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_ica_control.strVisibleFK_Idcuenta_compras);
		}

		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_ica_control.strVisibleFK_Idcuenta_ventas);
			jQuery("#tblstrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_ica_control.strVisibleFK_Idcuenta_ventas);
		}

		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_ica_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+retencion_ica_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_ica_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionretencion_ica();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("retencion_ica",id,"facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		retencion_ica_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_ica","empresa","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_ica_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_ica","cuenta","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_ica_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_ica","cuenta","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualretencion_ica");

			retencion_ica_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualretencion_ica");

			retencion_ica_webcontrol1.registrarSesionParaclientes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_icaConstante,strParametros);
		
		//retencion_ica_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(retencion_ica_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa",retencion_ica_control.empresasFK);

		if(retencion_ica_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_ica_control.idFilaTablaActual+"_2",retencion_ica_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(retencion_ica_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas",retencion_ica_control.cuenta_ventassFK);

		if(retencion_ica_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_ica_control.idFilaTablaActual+"_8",retencion_ica_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",retencion_ica_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(retencion_ica_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras",retencion_ica_control.cuenta_comprassFK);

		if(retencion_ica_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_ica_control.idFilaTablaActual+"_9",retencion_ica_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",retencion_ica_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(retencion_ica_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(retencion_ica_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(retencion_ica_control) {

	};

	
	
	setDefectoValorCombosempresasFK(retencion_ica_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_ica_control.idempresaDefaultFK>-1 && jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_ica_control.idempresaDefaultFK) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa").val(retencion_ica_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(retencion_ica_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_ica_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_ica_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_ica_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(retencion_ica_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(retencion_ica_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_ica_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_ica_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_ica_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(retencion_ica_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_ica_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//retencion_ica_control
		
	
	}
	
	onLoadCombosDefectoFK(retencion_ica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_ica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.setDefectoValorCombosempresasFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.setDefectoValorComboscuenta_ventassFK(retencion_ica_control);
			}

			if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTipos,",")) { 
				retencion_ica_webcontrol1.setDefectoValorComboscuenta_comprassFK(retencion_ica_control);
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
	onLoadCombosEventosFK(retencion_ica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_ica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_ica_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_ica_webcontrol1.registrarComboActionChangeCombosempresasFK(retencion_ica_control);
			//}

			//if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_ica_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_ica_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(retencion_ica_control);
			//}

			//if(retencion_ica_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_ica_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_ica_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(retencion_ica_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(retencion_ica_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_ica_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(retencion_ica_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_ica","FK_Idcuenta_compras","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_ica","FK_Idcuenta_ventas","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_ica","FK_Idempresa","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
		
			
			if(retencion_ica_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("retencion_ica");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("retencion_ica");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(retencion_ica_funcion1,retencion_ica_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(retencion_ica_funcion1,retencion_ica_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(retencion_ica_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,"retencion_ica");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				retencion_ica_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				retencion_ica_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_ica_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				retencion_ica_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("retencion_ica");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(retencion_ica_control) {
		
		jQuery("#divBusquedaretencion_icaAjaxWebPart").css("display",retencion_ica_control.strPermisoBusqueda);
		jQuery("#trretencion_icaCabeceraBusquedas").css("display",retencion_ica_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion_ica").css("display",retencion_ica_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteretencion_ica").css("display",retencion_ica_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosretencion_ica").attr("style",retencion_ica_control.strPermisoMostrarTodos);		
		
		if(retencion_ica_control.strPermisoNuevo!=null) {
			jQuery("#tdretencion_icaNuevo").css("display",retencion_ica_control.strPermisoNuevo);
			jQuery("#tdretencion_icaNuevoToolBar").css("display",retencion_ica_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdretencion_icaDuplicar").css("display",retencion_ica_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencion_icaDuplicarToolBar").css("display",retencion_ica_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencion_icaNuevoGuardarCambios").css("display",retencion_ica_control.strPermisoNuevo);
			jQuery("#tdretencion_icaNuevoGuardarCambiosToolBar").css("display",retencion_ica_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(retencion_ica_control.strPermisoActualizar!=null) {
			jQuery("#tdretencion_icaCopiar").css("display",retencion_ica_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencion_icaCopiarToolBar").css("display",retencion_ica_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencion_icaConEditar").css("display",retencion_ica_control.strPermisoActualizar);
		}
		
		jQuery("#tdretencion_icaGuardarCambios").css("display",retencion_ica_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdretencion_icaGuardarCambiosToolBar").css("display",retencion_ica_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdretencion_icaCerrarPagina").css("display",retencion_ica_control.strPermisoPopup);		
		jQuery("#tdretencion_icaCerrarPaginaToolBar").css("display",retencion_ica_control.strPermisoPopup);
		//jQuery("#trretencion_icaAccionesRelaciones").css("display",retencion_ica_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=retencion_ica_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_ica_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + retencion_ica_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Retencion Icas";
		sTituloBanner+=" - " + retencion_ica_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_ica_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdretencion_icaRelacionesToolBar").css("display",retencion_ica_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosretencion_ica").css("display",retencion_ica_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		retencion_ica_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		retencion_ica_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		retencion_ica_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		retencion_ica_webcontrol1.registrarEventosControles();
		
		if(retencion_ica_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
			retencion_ica_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(retencion_ica_constante1.STR_ES_RELACIONES=="true") {
			if(retencion_ica_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_ica_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(retencion_ica_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(retencion_ica_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				retencion_ica_webcontrol1.onLoad();
			
			//} else {
				//if(retencion_ica_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			retencion_ica_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("retencion_ica","facturacion","",retencion_ica_funcion1,retencion_ica_webcontrol1,retencion_ica_constante1);	
	}
}

var retencion_ica_webcontrol1 = new retencion_ica_webcontrol();

//Para ser llamado desde otro archivo (import)
export {retencion_ica_webcontrol,retencion_ica_webcontrol1};

//Para ser llamado desde window.opener
window.retencion_ica_webcontrol1 = retencion_ica_webcontrol1;


if(retencion_ica_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = retencion_ica_webcontrol1.onLoadWindow; 
}

//</script>