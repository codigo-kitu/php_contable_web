//<script type="text/javascript" language="javascript">



//var documento_cuenta_cobrarJQueryPaginaWebInteraccion= function (documento_cuenta_cobrar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {documento_cuenta_cobrar_constante,documento_cuenta_cobrar_constante1} from '../util/documento_cuenta_cobrar_constante.js';

import {documento_cuenta_cobrar_funcion,documento_cuenta_cobrar_funcion1} from '../util/documento_cuenta_cobrar_funcion.js';


class documento_cuenta_cobrar_webcontrol extends GeneralEntityWebControl {
	
	documento_cuenta_cobrar_control=null;
	documento_cuenta_cobrar_controlInicial=null;
	documento_cuenta_cobrar_controlAuxiliar=null;
		
	//if(documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(documento_cuenta_cobrar_control) {
		super();
		
		this.documento_cuenta_cobrar_control=documento_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(documento_cuenta_cobrar_control) {
		
		if(documento_cuenta_cobrar_control.action=="index" || documento_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(documento_cuenta_cobrar_control);
			
		} 
		
		
		else if(documento_cuenta_cobrar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(documento_cuenta_cobrar_control);
			
		} else if(documento_cuenta_cobrar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(documento_cuenta_cobrar_control);
			
		} else if(documento_cuenta_cobrar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_cuenta_cobrar_control);		
		
		} else if(documento_cuenta_cobrar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(documento_cuenta_cobrar_control);
		
		}  else if(documento_cuenta_cobrar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_cuenta_cobrar_control);
		
		} else if(documento_cuenta_cobrar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_cuenta_cobrar_control);		
		
		} else if(documento_cuenta_cobrar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(documento_cuenta_cobrar_control);		
		
		} else if(documento_cuenta_cobrar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(documento_cuenta_cobrar_control);		
		
		} else if(documento_cuenta_cobrar_control.action.includes("Busqueda") ||
				  documento_cuenta_cobrar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(documento_cuenta_cobrar_control);
			
		} else if(documento_cuenta_cobrar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(documento_cuenta_cobrar_control)
		}
		
		
		
	
		else if(documento_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(documento_cuenta_cobrar_control);	
		
		} else if(documento_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cuenta_cobrar_control);		
		}
	
		else if(documento_cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_cobrar_control);		
		}
	
		else if(documento_cuenta_cobrar_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_cuenta_cobrar_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + documento_cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(documento_cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(documento_cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(documento_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(documento_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(documento_cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(documento_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(documento_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(documento_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(documento_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(documento_cuenta_cobrar_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(documento_cuenta_cobrar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_cuenta_cobrar_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(documento_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(documento_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(documento_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(documento_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(documento_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(documento_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(documento_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(documento_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);				
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_cobrar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(documento_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(documento_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(documento_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(documento_cuenta_cobrar_control) {
					//super.actualizarPaginaImprimir(documento_cuenta_cobrar_control,"documento_cuenta_cobrar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_cuenta_cobrar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("documento_cuenta_cobrar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(documento_cuenta_cobrar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_cuenta_cobrar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(documento_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(documento_cuenta_cobrar_control,"documento_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("documento_cuenta_cobrar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(documento_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(documento_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(documento_cuenta_cobrar_control,"documento_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("documento_cuenta_cobrar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(documento_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",documento_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(documento_cuenta_cobrar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(documento_cuenta_cobrar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(documento_cuenta_cobrar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(documento_cuenta_cobrar_control);
			
		this.actualizarPaginaAbrirLink(documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);
		this.actualizarPaginaFormulario(documento_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(documento_cuenta_cobrar_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(documento_cuenta_cobrar_control) {
		
		if(documento_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(documento_cuenta_cobrar_control);
		}
		
		if(documento_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(documento_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(documento_cuenta_cobrar_control) {
		if(documento_cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("documento_cuenta_cobrarReturnGeneral",JSON.stringify(documento_cuenta_cobrar_control.documento_cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(documento_cuenta_cobrar_control) {
		if(documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && documento_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(documento_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(documento_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(documento_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			documento_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"documento_cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"documento_cuenta_cobrar");
			}			
			
			documento_cuenta_cobrar_funcion1.mostrarDivMensaje(true,documento_cuenta_cobrar_control.strAuxiliarMensaje,documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			documento_cuenta_cobrar_funcion1.mostrarDivMensaje(false,documento_cuenta_cobrar_control.strAuxiliarMensaje,documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(documento_cuenta_cobrar_control) {
		if(documento_cuenta_cobrar_funcion1.esPaginaForm(documento_cuenta_cobrar_constante1)==true) {
			window.opener.documento_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(documento_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(documento_cuenta_cobrar_control) {
		documento_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(documento_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		documento_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(documento_cuenta_cobrar_control.strAuxiliarTipo,documento_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(documento_cuenta_cobrar_control) {
		documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,documento_cuenta_cobrar_control.strAuxiliarMensajeAlert,documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(documento_cuenta_cobrar_funcion1.esPaginaForm(documento_cuenta_cobrar_constante1)==true) {
			window.opener.documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,documento_cuenta_cobrar_control.strAuxiliarMensajeAlert,documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(documento_cuenta_cobrar_control) {
		this.documento_cuenta_cobrar_controlInicial=documento_cuenta_cobrar_control;
			
		if(documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(documento_cuenta_cobrar_control.strStyleDivArbol,documento_cuenta_cobrar_control.strStyleDivContent
																,documento_cuenta_cobrar_control.strStyleDivOpcionesBanner,documento_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,documento_cuenta_cobrar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=documento_cuenta_cobrar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",documento_cuenta_cobrar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(documento_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(documento_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(documento_cuenta_cobrar_control.tiposReportes,documento_cuenta_cobrar_control.tiposReporte
															 	,documento_cuenta_cobrar_control.tiposPaginacion,documento_cuenta_cobrar_control.tiposAcciones
																,documento_cuenta_cobrar_control.tiposColumnasSelect,documento_cuenta_cobrar_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(documento_cuenta_cobrar_control.tiposRelaciones,documento_cuenta_cobrar_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(documento_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(documento_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(documento_cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(documento_cuenta_cobrar_control) {
	
		var indexPosition=documento_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=documento_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(documento_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.cargarCombosclientesFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.cargarCombosforma_pago_clientesFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.cargarComboscuenta_corrientesFK(documento_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(documento_cuenta_cobrar_control);
				}

				if(documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(documento_cuenta_cobrar_control);
				}

				if(documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(documento_cuenta_cobrar_control);
				}

				if(documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(documento_cuenta_cobrar_control);
				}

				if(documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(documento_cuenta_cobrar_control);
				}

				if(documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",documento_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_cobrar_webcontrol1.cargarCombosclientesFK(documento_cuenta_cobrar_control);
				}

				if(documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",documento_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_cobrar_webcontrol1.cargarCombosforma_pago_clientesFK(documento_cuenta_cobrar_control);
				}

				if(documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					documento_cuenta_cobrar_webcontrol1.cargarComboscuenta_corrientesFK(documento_cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(documento_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(documento_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(documento_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(documento_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(documento_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(documento_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_control.clientesFK);
	}

	cargarComboEditarTablaforma_pago_clienteFK(documento_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_control.forma_pago_clientesFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(documento_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_control.cuenta_corrientesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(documento_cuenta_cobrar_control) {
		jQuery("#divBusquedadocumento_cuenta_cobrarAjaxWebPart").css("display",documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trdocumento_cuenta_cobrarCabeceraBusquedas").css("display",documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_cuenta_cobrar").css("display",documento_cuenta_cobrar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(documento_cuenta_cobrar_control.htmlTablaOrderBy!=null
			&& documento_cuenta_cobrar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydocumento_cuenta_cobrarAjaxWebPart").html(documento_cuenta_cobrar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//documento_cuenta_cobrar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(documento_cuenta_cobrar_control.htmlTablaOrderByRel!=null
			&& documento_cuenta_cobrar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldocumento_cuenta_cobrarAjaxWebPart").html(documento_cuenta_cobrar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadocumento_cuenta_cobrarAjaxWebPart").css("display","none");
			jQuery("#trdocumento_cuenta_cobrarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadocumento_cuenta_cobrar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(documento_cuenta_cobrar_control) {
		
		if(!documento_cuenta_cobrar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(documento_cuenta_cobrar_control);
		} else {
			jQuery("#divTablaDatosdocumento_cuenta_cobrarsAjaxWebPart").html(documento_cuenta_cobrar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdocumento_cuenta_cobrars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdocumento_cuenta_cobrars=jQuery("#tblTablaDatosdocumento_cuenta_cobrars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("documento_cuenta_cobrar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',documento_cuenta_cobrar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			documento_cuenta_cobrar_webcontrol1.registrarControlesTableEdition(documento_cuenta_cobrar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		documento_cuenta_cobrar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(documento_cuenta_cobrar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("documento_cuenta_cobrar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(documento_cuenta_cobrar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdocumento_cuenta_cobrarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(documento_cuenta_cobrar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(documento_cuenta_cobrar_control);
		
		const divOrderBy = document.getElementById("divOrderBydocumento_cuenta_cobrarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(documento_cuenta_cobrar_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldocumento_cuenta_cobrarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(documento_cuenta_cobrar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(documento_cuenta_cobrar_control);			
		}
	}
	
	actualizarCamposFilaTabla(documento_cuenta_cobrar_control) {
		var i=0;
		
		i=documento_cuenta_cobrar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id);
		jQuery("#t-version_row_"+i+"").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.versionRow);
		
		if(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_empresa!=null && documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_sucursal!=null && documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_4").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_ejercicio!=null && documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_5").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_periodo!=null && documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_6").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_usuario!=null && documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_7").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.numero);
		
		if(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_cliente!=null && documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_cliente) {
				jQuery("#t-cel_"+i+"_9").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_9").select2("val", null);
			if(jQuery("#t-cel_"+i+"_9").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.tipo);
		jQuery("#t-cel_"+i+"_11").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_12").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.descripcion);
		jQuery("#t-cel_"+i+"_13").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.monto);
		jQuery("#t-cel_"+i+"_14").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.monto_parcial);
		jQuery("#t-cel_"+i+"_15").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.moneda);
		jQuery("#t-cel_"+i+"_16").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.fecha_vence);
		jQuery("#t-cel_"+i+"_17").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.numero_de_pagos);
		jQuery("#t-cel_"+i+"_18").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.balance);
		jQuery("#t-cel_"+i+"_19").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.numero_pagado);
		jQuery("#t-cel_"+i+"_20").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_pagado);
		jQuery("#t-cel_"+i+"_21").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.modulo_origen);
		jQuery("#t-cel_"+i+"_22").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_origen);
		jQuery("#t-cel_"+i+"_23").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.modulo_destino);
		jQuery("#t-cel_"+i+"_24").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_destino);
		jQuery("#t-cel_"+i+"_25").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.nombre_pc);
		jQuery("#t-cel_"+i+"_26").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.hora);
		jQuery("#t-cel_"+i+"_27").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.monto_mora);
		jQuery("#t-cel_"+i+"_28").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.interes_mora);
		jQuery("#t-cel_"+i+"_29").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.dias_gracia_mora);
		jQuery("#t-cel_"+i+"_30").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.instrumento_pago);
		jQuery("#t-cel_"+i+"_31").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.tipo_cambio);
		jQuery("#t-cel_"+i+"_32").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.numero_cliente);
		jQuery("#t-cel_"+i+"_33").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.clase_registro);
		jQuery("#t-cel_"+i+"_34").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.estado_registro);
		jQuery("#t-cel_"+i+"_35").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.motivo_anulacion);
		jQuery("#t-cel_"+i+"_36").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.impuesto_1);
		jQuery("#t-cel_"+i+"_37").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.impuesto_2);
		jQuery("#t-cel_"+i+"_38").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.impuesto_incluido);
		jQuery("#t-cel_"+i+"_39").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.observaciones);
		jQuery("#t-cel_"+i+"_40").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.grupo_pago);
		jQuery("#t-cel_"+i+"_41").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.termino_idpv);
		
		if(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_forma_pago_cliente!=null && documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_forma_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_42").val() != documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_forma_pago_cliente) {
				jQuery("#t-cel_"+i+"_42").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_forma_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_42").select2("val", null);
			if(jQuery("#t-cel_"+i+"_42").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_42").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_43").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.nro_pago);
		jQuery("#t-cel_"+i+"_44").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.ref_pago);
		jQuery("#t-cel_"+i+"_45").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.fecha_hora);
		jQuery("#t-cel_"+i+"_46").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_base);
		
		if(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_cuenta_corriente!=null && documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_47").val() != documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_47").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_47").select2("val", null);
			if(jQuery("#t-cel_"+i+"_47").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_47").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_48").val(documento_cuenta_cobrar_control.documento_cuenta_cobrarActual.ncf);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(documento_cuenta_cobrar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura").click(function(){
		jQuery("#tblTablaDatosdocumento_cuenta_cobrars").on("click",".imgrelacionfactura", function () {

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_cobrar");

			documento_cuenta_cobrar_webcontrol1.registrarSesionParafacturas(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionimagen_documento_cuenta_cobrar").click(function(){
		jQuery("#tblTablaDatosdocumento_cuenta_cobrars").on("click",".imgrelacionimagen_documento_cuenta_cobrar", function () {

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_cobrar");

			documento_cuenta_cobrar_webcontrol1.registrarSesionParaimagen_documento_cuenta_cobrares(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura_lote").click(function(){
		jQuery("#tblTablaDatosdocumento_cuenta_cobrars").on("click",".imgrelacionfactura_lote", function () {

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_cobrar");

			documento_cuenta_cobrar_webcontrol1.registrarSesionParafactura_lotees(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion_factura").click(function(){
		jQuery("#tblTablaDatosdocumento_cuenta_cobrars").on("click",".imgrelaciondevolucion_factura", function () {

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_cobrar");

			documento_cuenta_cobrar_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});				
	}
		
	

	registrarSesionParafacturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_cuenta_cobrar","factura","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1,"s","");
	}

	registrarSesionParaimagen_documento_cuenta_cobrares(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_cuenta_cobrar","imagen_documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1,"es","");
	}

	registrarSesionParafactura_lotees(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_cuenta_cobrar","factura_lote","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1,"es","");
	}

	registrarSesionParadevolucion_facturas(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"documento_cuenta_cobrar","devolucion_factura","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1,"s","");
	}
	
	registrarControlesTableEdition(documento_cuenta_cobrar_control) {
		documento_cuenta_cobrar_funcion1.registrarControlesTableValidacionEdition(documento_cuenta_cobrar_control,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(documento_cuenta_cobrar_control) {
		jQuery("#divResumendocumento_cuenta_cobrarActualAjaxWebPart").html(documento_cuenta_cobrar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(documento_cuenta_cobrar_control) {
		//jQuery("#divAccionesRelacionesdocumento_cuenta_cobrarAjaxWebPart").html(documento_cuenta_cobrar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("documento_cuenta_cobrar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(documento_cuenta_cobrar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdocumento_cuenta_cobrarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		documento_cuenta_cobrar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(documento_cuenta_cobrar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(documento_cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(documento_cuenta_cobrar_control) {
		
		if(documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idcliente);
		}

		if(documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idcuenta_corriente);
		}

		if(documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idejercicio);
		}

		if(documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idempresa);
		}

		if(documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idforma_pago_cliente);
			jQuery("#tblstrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idforma_pago_cliente);
		}

		if(documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idperiodo);
		}

		if(documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idsucursal);
		}

		if(documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",documento_cuenta_cobrar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondocumento_cuenta_cobrar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("documento_cuenta_cobrar",id,"cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		documento_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_cobrar","empresa","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		documento_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_cobrar","sucursal","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		documento_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_cobrar","ejercicio","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		documento_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_cobrar","periodo","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		documento_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_cobrar","usuario","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		documento_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_cobrar","cliente","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaforma_pago_cliente(strNombreCampoBusqueda){//idActual
		documento_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_cobrar","forma_pago_cliente","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		documento_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("documento_cuenta_cobrar","cuenta_corriente","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionfactura").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_cobrar");

			documento_cuenta_cobrar_webcontrol1.registrarSesionParafacturas(idActual);
		});
		jQuery("#imgdivrelacionimagen_documento_cuenta_cobrar").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_cobrar");

			documento_cuenta_cobrar_webcontrol1.registrarSesionParaimagen_documento_cuenta_cobrares(idActual);
		});
		jQuery("#imgdivrelacionfactura_lote").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_cobrar");

			documento_cuenta_cobrar_webcontrol1.registrarSesionParafactura_lotees(idActual);
		});
		jQuery("#imgdivrelaciondevolucion_factura").click(function(){

			var idActual=jQuery(this).attr("idactualdocumento_cuenta_cobrar");

			documento_cuenta_cobrar_webcontrol1.registrarSesionParadevolucion_facturas(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrarConstante,strParametros);
		
		//documento_cuenta_cobrar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(documento_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa",documento_cuenta_cobrar_control.empresasFK);

		if(documento_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_cobrar_control.idFilaTablaActual+"_3",documento_cuenta_cobrar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(documento_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal",documento_cuenta_cobrar_control.sucursalsFK);

		if(documento_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_cobrar_control.idFilaTablaActual+"_4",documento_cuenta_cobrar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(documento_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio",documento_cuenta_cobrar_control.ejerciciosFK);

		if(documento_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_cobrar_control.idFilaTablaActual+"_5",documento_cuenta_cobrar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(documento_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo",documento_cuenta_cobrar_control.periodosFK);

		if(documento_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_cobrar_control.idFilaTablaActual+"_6",documento_cuenta_cobrar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(documento_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario",documento_cuenta_cobrar_control.usuariosFK);

		if(documento_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_cobrar_control.idFilaTablaActual+"_7",documento_cuenta_cobrar_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(documento_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente",documento_cuenta_cobrar_control.clientesFK);

		if(documento_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_cobrar_control.idFilaTablaActual+"_9",documento_cuenta_cobrar_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",documento_cuenta_cobrar_control.clientesFK);

	};

	cargarCombosforma_pago_clientesFK(documento_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente",documento_cuenta_cobrar_control.forma_pago_clientesFK);

		if(documento_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_cobrar_control.idFilaTablaActual+"_42",documento_cuenta_cobrar_control.forma_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente",documento_cuenta_cobrar_control.forma_pago_clientesFK);

	};

	cargarComboscuenta_corrientesFK(documento_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_corriente",documento_cuenta_cobrar_control.cuenta_corrientesFK);

		if(documento_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+documento_cuenta_cobrar_control.idFilaTablaActual+"_47",documento_cuenta_cobrar_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",documento_cuenta_cobrar_control.cuenta_corrientesFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(documento_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(documento_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(documento_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(documento_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(documento_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosclientesFK(documento_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosforma_pago_clientesFK(documento_cuenta_cobrar_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(documento_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(documento_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_cobrar_control.idempresaDefaultFK>-1 && jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != documento_cuenta_cobrar_control.idempresaDefaultFK) {
				jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(documento_cuenta_cobrar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(documento_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_cobrar_control.idsucursalDefaultFK>-1 && jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != documento_cuenta_cobrar_control.idsucursalDefaultFK) {
				jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(documento_cuenta_cobrar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(documento_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_cobrar_control.idejercicioDefaultFK>-1 && jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != documento_cuenta_cobrar_control.idejercicioDefaultFK) {
				jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(documento_cuenta_cobrar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(documento_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_cobrar_control.idperiodoDefaultFK>-1 && jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != documento_cuenta_cobrar_control.idperiodoDefaultFK) {
				jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(documento_cuenta_cobrar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(documento_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_cobrar_control.idusuarioDefaultFK>-1 && jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != documento_cuenta_cobrar_control.idusuarioDefaultFK) {
				jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(documento_cuenta_cobrar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(documento_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_cobrar_control.idclienteDefaultFK>-1 && jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente").val() != documento_cuenta_cobrar_control.idclienteDefaultFK) {
				jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente").val(documento_cuenta_cobrar_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(documento_cuenta_cobrar_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosforma_pago_clientesFK(documento_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_cobrar_control.idforma_pago_clienteDefaultFK>-1 && jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val() != documento_cuenta_cobrar_control.idforma_pago_clienteDefaultFK) {
				jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val(documento_cuenta_cobrar_control.idforma_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val(documento_cuenta_cobrar_control.idforma_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(documento_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(documento_cuenta_cobrar_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != documento_cuenta_cobrar_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(documento_cuenta_cobrar_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(documento_cuenta_cobrar_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//documento_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.setDefectoValorCombosempresasFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.setDefectoValorCombossucursalsFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.setDefectoValorCombosejerciciosFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.setDefectoValorCombosperiodosFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.setDefectoValorCombosusuariosFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.setDefectoValorCombosclientesFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.setDefectoValorCombosforma_pago_clientesFK(documento_cuenta_cobrar_control);
			}

			if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				documento_cuenta_cobrar_webcontrol1.setDefectoValorComboscuenta_corrientesFK(documento_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosempresasFK(documento_cuenta_cobrar_control);
			//}

			//if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombossucursalsFK(documento_cuenta_cobrar_control);
			//}

			//if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(documento_cuenta_cobrar_control);
			//}

			//if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosperiodosFK(documento_cuenta_cobrar_control);
			//}

			//if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosusuariosFK(documento_cuenta_cobrar_control);
			//}

			//if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosclientesFK(documento_cuenta_cobrar_control);
			//}

			//if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosforma_pago_clientesFK(documento_cuenta_cobrar_control);
			//}

			//if(documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				documento_cuenta_cobrar_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(documento_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(documento_cuenta_cobrar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_cobrar","FK_Idcliente","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_cobrar","FK_Idcuenta_corriente","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_cobrar","FK_Idejercicio","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_cobrar","FK_Idempresa","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_cobrar","FK_Idforma_pago_cliente","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_cobrar","FK_Idperiodo","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_cobrar","FK_Idsucursal","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("documento_cuenta_cobrar","FK_Idusuario","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
		
			
			if(documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("documento_cuenta_cobrar");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("documento_cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,"documento_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				documento_cuenta_cobrar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				documento_cuenta_cobrar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				documento_cuenta_cobrar_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("forma_pago_cliente","id_forma_pago_cliente","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente_img_busqueda").click(function(){
				documento_cuenta_cobrar_webcontrol1.abrirBusquedaParaforma_pago_cliente("id_forma_pago_cliente");
				//alert(jQuery('#form-id_forma_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				documento_cuenta_cobrar_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("documento_cuenta_cobrar");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(documento_cuenta_cobrar_control) {
		
		jQuery("#divBusquedadocumento_cuenta_cobrarAjaxWebPart").css("display",documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trdocumento_cuenta_cobrarCabeceraBusquedas").css("display",documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedadocumento_cuenta_cobrar").css("display",documento_cuenta_cobrar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedocumento_cuenta_cobrar").css("display",documento_cuenta_cobrar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdocumento_cuenta_cobrar").attr("style",documento_cuenta_cobrar_control.strPermisoMostrarTodos);		
		
		if(documento_cuenta_cobrar_control.strPermisoNuevo!=null) {
			jQuery("#tddocumento_cuenta_cobrarNuevo").css("display",documento_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tddocumento_cuenta_cobrarNuevoToolBar").css("display",documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddocumento_cuenta_cobrarDuplicar").css("display",documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_cuenta_cobrarDuplicarToolBar").css("display",documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddocumento_cuenta_cobrarNuevoGuardarCambios").css("display",documento_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tddocumento_cuenta_cobrarNuevoGuardarCambiosToolBar").css("display",documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(documento_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tddocumento_cuenta_cobrarCopiar").css("display",documento_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_cuenta_cobrarCopiarToolBar").css("display",documento_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddocumento_cuenta_cobrarConEditar").css("display",documento_cuenta_cobrar_control.strPermisoActualizar);
		}
		
		jQuery("#tddocumento_cuenta_cobrarGuardarCambios").css("display",documento_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddocumento_cuenta_cobrarGuardarCambiosToolBar").css("display",documento_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddocumento_cuenta_cobrarCerrarPagina").css("display",documento_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tddocumento_cuenta_cobrarCerrarPaginaToolBar").css("display",documento_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trdocumento_cuenta_cobrarAccionesRelaciones").css("display",documento_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=documento_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + documento_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Documentos Cuentas por Cobrares";
		sTituloBanner+=" - " + documento_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + documento_cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddocumento_cuenta_cobrarRelacionesToolBar").css("display",documento_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdocumento_cuenta_cobrar").css("display",documento_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		documento_cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		documento_cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		documento_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		documento_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			documento_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(documento_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				documento_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(documento_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				documento_cuenta_cobrar_webcontrol1.onLoad();
			
			//} else {
				//if(documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			documento_cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("documento_cuenta_cobrar","cuentascobrar","",documento_cuenta_cobrar_funcion1,documento_cuenta_cobrar_webcontrol1,documento_cuenta_cobrar_constante1);	
	}
	
	/*
		Variables-Pagina: actualizarVariablesPagina
		Variables-Pagina: actualizarVariablesPagina(AccionesGenerales,AccionIndex,AccionCancelar,AccionMostrarEjecutar,AccionIndex)
		Variables-Pagina: actualizarVariablesPagina(AccionRecargarInformacion,AccionBusquedas,AccionBuscarPorIdGeneral,AccionAnteriores)
		Variables-Pagina: actualizarVariablesPagina(AccionSiguientes,AccionRecargarUltimaInformacion,AccionSeleccionarLoteFk)
		Variables-Pagina: actualizarVariablesPagina(AccionGuardarCambios,AccionDuplicar,AccionCopiar,AccionSeleccionarActual)
		Variables-Pagina: actualizarVariablesPagina(AccionEliminarCascada,AccionEliminarTabla,AccionQuitarElementosTabla,AccionNuevoPreparar)
		Variables-Pagina: actualizarVariablesPagina(AccionNuevoTablaPreparar,AccionNuevoPrepararAbrirPaginaForm,AccionEditarTablaDatos)
		Variables-Pagina: actualizarVariablesPagina(AccionGenerarHtmlReporte,AccionGenerarHtmlFormReporte,AccionGenerarHtmlRelacionesReporte)
		Variables-Pagina: actualizarVariablesPagina(AccionQuitarRelacionesReporte,AccionGenerarReporteAbrirPaginaForm,AccionEliminarCascada)
		Pagina: actualizarPagina(AccionesGenerales,GuardarReturnSession,MensajePantallaAuxiliar,MensajePantalla,TablaDatosAuxiliar)
		Pagina: actualizarPagina(AbrirLink,MensajeAlert,CargaGeneral,CargaGeneralControles,CargaCombosFK,UsuarioInvitado)
		Pagina: actualizarPagina(AreaBusquedas,TablaDatos,TablaDatosJsTemplate,OrderBy,TablaFilaActual)
		Campos: actualizarCamposFilaTabla
		Combos: cargarCombosFK,cargarComboEditarTablaempresaFK,cargarComboEditarTablasucursalFK
		Combos: cargarCombosempresasFK,cargarCombossucursalsFK
		Combos-Defecto: setDefectoValorCombosempresasFK,setDefectoValorCombossucursalsFK
		TablaAccionesControles-Sesion: registrarTablaAcciones,registrarSesion_defectoParaproductos,registrarControlesTableEdition
		Css: actualizarCssBusquedas,actualizarCssBotonesPagina
		Recargar-Buscar: recargarUltimaInformacion,buscarPorIdGeneral
		Abrir: abrirBusquedaParaempresa
		Registrar-Seleccionar: registrarDivAccionesRelaciones,manejarSeleccionarLoteFk
		Eventos: registrarEventosControles
		Registrar: registrarAccionesEventos,registrarPropiedadesPagina
		OnLoad: onLoadRecargarRelacionado,onLoadCombosDefectoFK,onLoadCombosEventosFK
		OnLoad: onLoad,onUnLoadWindow,onLoadWindow,registrarEventosOnLoadGlobal
	*/
}

var documento_cuenta_cobrar_webcontrol1 = new documento_cuenta_cobrar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {documento_cuenta_cobrar_webcontrol,documento_cuenta_cobrar_webcontrol1};

//Para ser llamado desde window.opener
window.documento_cuenta_cobrar_webcontrol1 = documento_cuenta_cobrar_webcontrol1;


if(documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = documento_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>