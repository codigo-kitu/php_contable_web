//<script type="text/javascript" language="javascript">



//var documento_cuenta_pagarJQueryPaginaWebInteraccion= function (documento_cuenta_pagar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {documento_cuenta_pagar_constante,documento_cuenta_pagar_constante1} from '../util/documento_cuenta_pagar_constante.js';

import {documento_cuenta_pagar_funcion,documento_cuenta_pagar_funcion1} from '../util/documento_cuenta_pagar_funcion.js';


class documento_cuenta_pagar_webcontrol extends GeneralEntityWebControl {
	
	documento_cuenta_pagar_control=null;
	documento_cuenta_pagar_controlInicial=null;
	documento_cuenta_pagar_controlAuxiliar=null;
		
	//if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_cuenta_pagar_control) {
		super();
		
		this.documento_cuenta_pagar_control=documento_cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(documento_cuenta_pagar_control) {
		
		if(documento_cuenta_pagar_control.action=="index" || documento_cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_cuenta_pagar_control);
			
		} 
		
		
		else if(documento_cuenta_pagar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(documento_cuenta_pagar_control);
			
		} else if(documento_cuenta_pagar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(documento_cuenta_pagar_control);
			
		} else if(documento_cuenta_pagar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_cuenta_pagar_control);		
		
		} else if(documento_cuenta_pagar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(documento_cuenta_pagar_control);
		
		}  else if(documento_cuenta_pagar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_cuenta_pagar_control);
		
		} else if(documento_cuenta_pagar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_cuenta_pagar_control);		
		
		} else if(documento_cuenta_pagar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(documento_cuenta_pagar_control);		
		
		} else if(documento_cuenta_pagar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(documento_cuenta_pagar_control);		
		
		} else if(documento_cuenta_pagar_control.action.includes("Busqueda") ||
				  documento_cuenta_pagar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(documento_cuenta_pagar_control);
			
		} else if(documento_cuenta_pagar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(documento_cuenta_pagar_control)
		}
		
		
		
	
		else if(documento_cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_cuenta_pagar_control);	
		
		} else if(documento_cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cuenta_pagar_control);		
		}
	
		else if(documento_cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_pagar_control);		
		}
	
		else if(documento_cuenta_pagar_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_cuenta_pagar_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + documento_cuenta_pagar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(documento_cuenta_pagar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(documento_cuenta_pagar_control) {
		this.actualizarPaginaAccionesGenerales(documento_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(documento_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(documento_cuenta_pagar_control);
		this.actualizarPaginaOrderBy(documento_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(documento_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(documento_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cuenta_pagar_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_cuenta_pagar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_cuenta_pagar_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(documento_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(documento_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(documento_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(documento_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(documento_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);				
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(documento_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(documento_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_cuenta_pagar_control) {
					//super.actualizarPaginaImprimir(documento_cuenta_pagar_control,"documento_cuenta_pagar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_cuenta_pagar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("documento_cuenta_pagar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(documento_cuenta_pagar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_cuenta_pagar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_cuenta_pagar_control) {
		//super.actualizarPaginaImprimir(documento_cuenta_pagar_control,"documento_cuenta_pagar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("documento_cuenta_pagar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(documento_cuenta_pagar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_cuenta_pagar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(documento_cuenta_pagar_control) {
		//super.actualizarPaginaImprimir(documento_cuenta_pagar_control,"documento_cuenta_pagar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("documento_cuenta_pagar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(documento_cuenta_pagar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_cuenta_pagar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_cuenta_pagar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(documento_cuenta_pagar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(documento_cuenta_pagar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(documento_cuenta_pagar_control);
			
		this.actualizarPaginaAbrirLink(documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		this.actualizarPaginaFormulario(documento_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_pagar_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(documento_cuenta_pagar_control) {
		
		if(documento_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_cuenta_pagar_control);
		}
		
		if(documento_cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(documento_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(documento_cuenta_pagar_control) {
		if(documento_cuenta_pagar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("documento_cuenta_pagarReturnGeneral",JSON.stringify(documento_cuenta_pagar_control.documento_cuenta_pagarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_pagar_control) {
		if(documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(documento_cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			documento_cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false,"documento_cuenta_pagar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false,"documento_cuenta_pagar");
			}			
			
			documento_cuenta_pagar_funcion1.mostrarDivMensaje(true,documento_cuenta_pagar_control.strAuxiliarMensaje,documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			documento_cuenta_pagar_funcion1.mostrarDivMensaje(false,documento_cuenta_pagar_control.strAuxiliarMensaje,documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_cuenta_pagar_control) {
		if(documento_cuenta_pagar_funcion1.esPaginaForm(documento_cuenta_pagar_constante1)==true) {
			window.opener.documento_cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_cuenta_pagar_control) {
		documento_cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_cuenta_pagar_control.strAuxiliarUrlPagina);
				
		documento_cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_cuenta_pagar_control.strAuxiliarTipo,documento_cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_cuenta_pagar_control) {
		documento_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,documento_cuenta_pagar_control.strAuxiliarMensajeAlert,documento_cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(documento_cuenta_pagar_funcion1.esPaginaForm(documento_cuenta_pagar_constante1)==true) {
			window.opener.documento_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,documento_cuenta_pagar_control.strAuxiliarMensajeAlert,documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(documento_cuenta_pagar_control) {
		this.documento_cuenta_pagar_controlInicial=documento_cuenta_pagar_control;
			
		if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_cuenta_pagar_control.strStyleDivArbol,documento_cuenta_pagar_control.strStyleDivContent
																,documento_cuenta_pagar_control.strStyleDivOpcionesBanner,documento_cuenta_pagar_control.strStyleDivExpandirColapsar
																,documento_cuenta_pagar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=documento_cuenta_pagar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",documento_cuenta_pagar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(documento_cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(documento_cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_cuenta_pagar_control.tiposReportes,documento_cuenta_pagar_control.tiposReporte
															 	,documento_cuenta_pagar_control.tiposPaginacion,documento_cuenta_pagar_control.tiposAcciones
																,documento_cuenta_pagar_control.tiposColumnasSelect,documento_cuenta_pagar_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(documento_cuenta_pagar_control.tiposRelaciones,documento_cuenta_pagar_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_cuenta_pagar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(documento_cuenta_pagar_control) {
	
		var indexPosition=documento_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(documento_cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosempresasFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosproveedorsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.cargarComboscuenta_corrientesFK(documento_cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!=null && documento_cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosempresasFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosproveedorsFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control);
				}

				if(documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_pagar_webcontrol1.cargarComboscuenta_corrientesFK(documento_cuenta_pagar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.usuariosFK);
	}

	cargarComboEditarTablaproveedorFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.proveedorsFK);
	}

	cargarComboEditarTablaforma_pago_proveedorFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.forma_pago_proveedorsFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_pagar_funcion1,documento_cuenta_pagar_control.cuenta_corrientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(documento_cuenta_pagar_control) {
		jQuery("#divBusquedadocumento_cuenta_pagarAjaxWebPart").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trdocumento_cuenta_pagarCabeceraBusquedas").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_cuenta_pagar").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(documento_cuenta_pagar_control.htmlTablaOrderBy!=null
			&& documento_cuenta_pagar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydocumento_cuenta_pagarAjaxWebPart").html(documento_cuenta_pagar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//documento_cuenta_pagar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(documento_cuenta_pagar_control.htmlTablaOrderByRel!=null
			&& documento_cuenta_pagar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldocumento_cuenta_pagarAjaxWebPart").html(documento_cuenta_pagar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadocumento_cuenta_pagarAjaxWebPart").css("display","none");
			jQuery("#trdocumento_cuenta_pagarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadocumento_cuenta_pagar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(documento_cuenta_pagar_control) {
		
		if(!documento_cuenta_pagar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(documento_cuenta_pagar_control);
		} else {
			jQuery("#divTablaDatosdocumento_cuenta_pagarsAjaxWebPart").html(documento_cuenta_pagar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdocumento_cuenta_pagars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdocumento_cuenta_pagars=jQuery("#tblTablaDatosdocumento_cuenta_pagars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("documento_cuenta_pagar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',documento_cuenta_pagar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			documento_cuenta_pagar_webcontrol1.registrarControlesTableEdition(documento_cuenta_pagar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		documento_cuenta_pagar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(documento_cuenta_pagar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("documento_cuenta_pagar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(documento_cuenta_pagar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdocumento_cuenta_pagarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(documento_cuenta_pagar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(documento_cuenta_pagar_control);
		
		const divOrderBy = document.getElementById("divOrderBydocumento_cuenta_pagarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(documento_cuenta_pagar_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldocumento_cuenta_pagarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(documento_cuenta_pagar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(documento_cuenta_pagar_control);			
		}
	}
	
	actualizarCamposFilaTabla(documento_cuenta_pagar_control) {
		var i=0;
		
		i=documento_cuenta_pagar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id);
		jQuery("#t-version_row_"+i+"").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.versionRow);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.numero);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_8").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.tipo);
		jQuery("#t-cel_"+i+"_10").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_11").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.descripcion);
		jQuery("#t-cel_"+i+"_12").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.monto);
		jQuery("#t-cel_"+i+"_13").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.monto_parcial);
		jQuery("#t-cel_"+i+"_14").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.moneda);
		jQuery("#t-cel_"+i+"_15").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.fecha_vence);
		jQuery("#t-cel_"+i+"_16").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.numero_de_pagos);
		jQuery("#t-cel_"+i+"_17").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.balance);
		jQuery("#t-cel_"+i+"_18").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.balance_mon);
		jQuery("#t-cel_"+i+"_19").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.numero_pagado);
		jQuery("#t-cel_"+i+"_20").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_pagado);
		jQuery("#t-cel_"+i+"_21").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.modulo_origen);
		jQuery("#t-cel_"+i+"_22").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_origen);
		jQuery("#t-cel_"+i+"_23").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.modulo_destino);
		jQuery("#t-cel_"+i+"_24").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_destino);
		jQuery("#t-cel_"+i+"_25").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.nombre_pc);
		jQuery("#t-cel_"+i+"_26").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.hora);
		jQuery("#t-cel_"+i+"_27").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.monto_mora);
		jQuery("#t-cel_"+i+"_28").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.interes_mora);
		jQuery("#t-cel_"+i+"_29").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.dias_gracia_mora);
		jQuery("#t-cel_"+i+"_30").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.instrumento_pago);
		jQuery("#t-cel_"+i+"_31").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_32").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.nro_documento_proveedor);
		jQuery("#t-cel_"+i+"_33").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.clase_registro);
		jQuery("#t-cel_"+i+"_34").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.estado_registro);
		jQuery("#t-cel_"+i+"_35").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.motivo_anulacion);
		jQuery("#t-cel_"+i+"_36").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.impuesto_1);
		jQuery("#t-cel_"+i+"_37").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.impuesto_2);
		jQuery("#t-cel_"+i+"_38").prop('checked',documento_cuenta_pagar_control.documento_cuenta_pagarActual.impuesto_incluido);
		jQuery("#t-cel_"+i+"_39").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.observaciones);
		jQuery("#t-cel_"+i+"_40").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.grupo_pago);
		jQuery("#t-cel_"+i+"_41").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.termino_idpv);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_42").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor) {
				jQuery("#t-cel_"+i+"_42").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_forma_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_42").select2("val", null);
			if(jQuery("#t-cel_"+i+"_42").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_42").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_43").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.nro_pago);
		jQuery("#t-cel_"+i+"_44").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.referencia_pago);
		jQuery("#t-cel_"+i+"_45").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.fecha_hora);
		jQuery("#t-cel_"+i+"_46").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_base);
		
		if(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente!=null && documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_47").val() != documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_47").val(documento_cuenta_pagar_control.documento_cuenta_pagarActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_47").select2("val", null);
			if(jQuery("#t-cel_"+i+"_47").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_47").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(documento_cuenta_pagar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_documento_cuenta_pagar").click(function(){
		jQuery("#tblTablaDatosdocumento_cuenta_pagars").on("click",".imgrelacionimagen_documento_cuenta_pagar", function () {

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParaimagen_documento_cuenta_pagares(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionorden_compra").click(function(){
		jQuery("#tblTablaDatosdocumento_cuenta_pagars").on("click",".imgrelacionorden_compra", function () {

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParaorden_compras(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion").click(function(){
		jQuery("#tblTablaDatosdocumento_cuenta_pagars").on("click",".imgrelaciondevolucion", function () {

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParadevoluciones(idActual);
		});				
	}
		
	

	registrarSesionParaimagen_documento_cuenta_pagares(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_cuenta_pagar","imagen_documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1,"es","");
	}

	registrarSesionParaorden_compras(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_cuenta_pagar","orden_compra","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1,"s","");
	}

	registrarSesionParadevoluciones(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_cuenta_pagar","devolucion","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1,"es","");
	}
	
	registrarControlesTableEdition(documento_cuenta_pagar_control) {
		documento_cuenta_pagar_funcion1.registrarControlesTableValidacionEdition(documento_cuenta_pagar_control,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(documento_cuenta_pagar_control) {
		jQuery("#divResumendocumento_cuenta_pagarActualAjaxWebPart").html(documento_cuenta_pagar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_cuenta_pagar_control) {
		//jQuery("#divAccionesRelacionesdocumento_cuenta_pagarAjaxWebPart").html(documento_cuenta_pagar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("documento_cuenta_pagar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(documento_cuenta_pagar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdocumento_cuenta_pagarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		documento_cuenta_pagar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(documento_cuenta_pagar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(documento_cuenta_pagar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(documento_cuenta_pagar_control) {
		
		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idcuenta_corriente);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idejercicio);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idempresa);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idforma_pago_proveedor);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idforma_pago_proveedor);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idperiodo);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idproveedor);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idsucursal);
		}

		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",documento_cuenta_pagar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondocumento_cuenta_pagar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("documento_cuenta_pagar",id,"cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","empresa","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","sucursal","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","ejercicio","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","periodo","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","usuario","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","proveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParaforma_pago_proveedor(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","forma_pago_proveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_pagar","cuenta_corriente","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionimagen_documento_cuenta_pagar").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParaimagen_documento_cuenta_pagares(idActual);
		});
		jQuery("#imgdivrelacionorden_compra").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParaorden_compras(idActual);
		});
		jQuery("#imgdivrelaciondevolucion").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_pagar");

			documento_cuenta_pagar_webcontrol1.registrarSesionParadevoluciones(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagarConstante,strParametros);
		
		//documento_cuenta_pagar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa",documento_cuenta_pagar_control.empresasFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_2",documento_cuenta_pagar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal",documento_cuenta_pagar_control.sucursalsFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_3",documento_cuenta_pagar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio",documento_cuenta_pagar_control.ejerciciosFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_4",documento_cuenta_pagar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo",documento_cuenta_pagar_control.periodosFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_5",documento_cuenta_pagar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario",documento_cuenta_pagar_control.usuariosFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_6",documento_cuenta_pagar_control.usuariosFK);
		}
	};

	cargarCombosproveedorsFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor",documento_cuenta_pagar_control.proveedorsFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_8",documento_cuenta_pagar_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",documento_cuenta_pagar_control.proveedorsFK);

	};

	cargarCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor",documento_cuenta_pagar_control.forma_pago_proveedorsFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_42",documento_cuenta_pagar_control.forma_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor",documento_cuenta_pagar_control.forma_pago_proveedorsFK);

	};

	cargarComboscuenta_corrientesFK(documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente",documento_cuenta_pagar_control.cuenta_corrientesFK);

		if(documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_pagar_control.idFilaTablaActual+"_47",documento_cuenta_pagar_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",documento_cuenta_pagar_control.cuenta_corrientesFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(documento_cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idempresaDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != documento_cuenta_pagar_control.idempresaDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(documento_cuenta_pagar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idsucursalDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != documento_cuenta_pagar_control.idsucursalDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(documento_cuenta_pagar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idejercicioDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != documento_cuenta_pagar_control.idejercicioDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(documento_cuenta_pagar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idperiodoDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != documento_cuenta_pagar_control.idperiodoDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(documento_cuenta_pagar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idusuarioDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != documento_cuenta_pagar_control.idusuarioDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(documento_cuenta_pagar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idproveedorDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val() != documento_cuenta_pagar_control.idproveedorDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor").val(documento_cuenta_pagar_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(documento_cuenta_pagar_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idforma_pago_proveedorDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val() != documento_cuenta_pagar_control.idforma_pago_proveedorDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val(documento_cuenta_pagar_control.idforma_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val(documento_cuenta_pagar_control.idforma_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_pagar_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != documento_cuenta_pagar_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(documento_cuenta_pagar_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(documento_cuenta_pagar_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosempresasFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombossucursalsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosejerciciosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosperiodosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosusuariosFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosproveedorsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control);
			}

			if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_pagar_webcontrol1.setDefectoValorComboscuenta_corrientesFK(documento_cuenta_pagar_control);
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
	onLoadCombosEventosFK(documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosempresasFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombossucursalsFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosperiodosFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosusuariosFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosproveedorsFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosforma_pago_proveedorsFK(documento_cuenta_pagar_control);
			//}

			//if(documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_pagar_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(documento_cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(documento_cuenta_pagar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idcuenta_corriente","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idejercicio","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idempresa","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idforma_pago_proveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idperiodo","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idproveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idsucursal","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_pagar","FK_Idusuario","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
		
			
			if(documento_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_cuenta_pagar");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_cuenta_pagar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,"documento_cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("forma_pago_proveedor","id_forma_pago_proveedor","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParaforma_pago_proveedor("id_forma_pago_proveedor");
				//alert(jQuery('#form-id_forma_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				documento_cuenta_pagar_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("documento_cuenta_pagar");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_cuenta_pagar_control) {
		
		jQuery("#divBusquedadocumento_cuenta_pagarAjaxWebPart").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trdocumento_cuenta_pagarCabeceraBusquedas").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_cuenta_pagar").css("display",documento_cuenta_pagar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedocumento_cuenta_pagar").css("display",documento_cuenta_pagar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdocumento_cuenta_pagar").attr("style",documento_cuenta_pagar_control.strPermisoMostrarTodos);		
		
		if(documento_cuenta_pagar_control.strPermisoNuevo!=null) {
			jQuery("#tddocumento_cuenta_pagarNuevo").css("display",documento_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tddocumento_cuenta_pagarNuevoToolBar").css("display",documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddocumento_cuenta_pagarDuplicar").css("display",documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_cuenta_pagarDuplicarToolBar").css("display",documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_cuenta_pagarNuevoGuardarCambios").css("display",documento_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tddocumento_cuenta_pagarNuevoGuardarCambiosToolBar").css("display",documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(documento_cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_cuenta_pagarCopiar").css("display",documento_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_cuenta_pagarCopiarToolBar").css("display",documento_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_cuenta_pagarConEditar").css("display",documento_cuenta_pagar_control.strPermisoActualizar);
		}
		
		jQuery("#tddocumento_cuenta_pagarGuardarCambios").css("display",documento_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddocumento_cuenta_pagarGuardarCambiosToolBar").css("display",documento_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddocumento_cuenta_pagarCerrarPagina").css("display",documento_cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tddocumento_cuenta_pagarCerrarPaginaToolBar").css("display",documento_cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trdocumento_cuenta_pagarAccionesRelaciones").css("display",documento_cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=documento_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + documento_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Documentos Cuentas por Pagares";
		sTituloBanner+=" - " + documento_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_cuenta_pagar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddocumento_cuenta_pagarRelacionesToolBar").css("display",documento_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdocumento_cuenta_pagar").css("display",documento_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		documento_cuenta_pagar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		documento_cuenta_pagar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			documento_cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(documento_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(documento_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				documento_cuenta_pagar_webcontrol1.onLoad();
			
			//} else {
				//if(documento_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			documento_cuenta_pagar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_cuenta_pagar","cuentaspagar","",documento_cuenta_pagar_funcion1,documento_cuenta_pagar_webcontrol1,documento_cuenta_pagar_constante1);	
	}
}

var documento_cuenta_pagar_webcontrol1 = new documento_cuenta_pagar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {documento_cuenta_pagar_webcontrol,documento_cuenta_pagar_webcontrol1};

//Para ser llamado desde window.opener
window.documento_cuenta_pagar_webcontrol1 = documento_cuenta_pagar_webcontrol1;


if(documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_cuenta_pagar_webcontrol1.onLoadWindow; 
}

//</script>