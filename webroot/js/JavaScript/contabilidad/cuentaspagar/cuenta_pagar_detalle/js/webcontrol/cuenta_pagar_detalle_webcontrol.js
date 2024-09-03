//<script type="text/javascript" language="javascript">



//var cuenta_pagar_detalleJQueryPaginaWebInteraccion= function (cuenta_pagar_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cuenta_pagar_detalle_constante,cuenta_pagar_detalle_constante1} from '../util/cuenta_pagar_detalle_constante.js';

import {cuenta_pagar_detalle_funcion,cuenta_pagar_detalle_funcion1} from '../util/cuenta_pagar_detalle_funcion.js';


class cuenta_pagar_detalle_webcontrol extends GeneralEntityWebControl {
	
	cuenta_pagar_detalle_control=null;
	cuenta_pagar_detalle_controlInicial=null;
	cuenta_pagar_detalle_controlAuxiliar=null;
		
	//if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cuenta_pagar_detalle_control) {
		super();
		
		this.cuenta_pagar_detalle_control=cuenta_pagar_detalle_control;
	}
		
	actualizarVariablesPagina(cuenta_pagar_detalle_control) {
		
		if(cuenta_pagar_detalle_control.action=="index" || cuenta_pagar_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cuenta_pagar_detalle_control);
			
		} 
		
		
		else if(cuenta_pagar_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cuenta_pagar_detalle_control);
			
		} else if(cuenta_pagar_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cuenta_pagar_detalle_control);
			
		} else if(cuenta_pagar_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_pagar_detalle_control);		
		
		} else if(cuenta_pagar_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cuenta_pagar_detalle_control);
		
		}  else if(cuenta_pagar_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_pagar_detalle_control);
		
		} else if(cuenta_pagar_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_pagar_detalle_control);		
		
		} else if(cuenta_pagar_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_pagar_detalle_control);		
		
		} else if(cuenta_pagar_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_pagar_detalle_control);		
		
		} else if(cuenta_pagar_detalle_control.action.includes("Busqueda") ||
				  cuenta_pagar_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cuenta_pagar_detalle_control);
			
		} else if(cuenta_pagar_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_pagar_detalle_control)
		}
		
		
		
	
		else if(cuenta_pagar_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cuenta_pagar_detalle_control);	
		
		} else if(cuenta_pagar_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_pagar_detalle_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cuenta_pagar_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cuenta_pagar_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cuenta_pagar_detalle_control) {
		this.actualizarPaginaAccionesGenerales(cuenta_pagar_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cuenta_pagar_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_pagar_detalle_control);
		this.actualizarPaginaOrderBy(cuenta_pagar_detalle_control);
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_detalle_control);
		this.actualizarPaginaAreaBusquedas(cuenta_pagar_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cuenta_pagar_detalle_control) {
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cuenta_pagar_detalle_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cuenta_pagar_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cuenta_pagar_detalle_control);
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cuenta_pagar_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_detalle_control);
		this.actualizarPaginaAreaBusquedas(cuenta_pagar_detalle_control);
		this.actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cuenta_pagar_detalle_control) {
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cuenta_pagar_detalle_control) {
		this.actualizarPaginaAbrirLink(cuenta_pagar_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);				
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cuenta_pagar_detalle_control) {
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
		this.onLoadCombosDefectoFK(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		//this.actualizarPaginaFormulario(cuenta_pagar_detalle_control);
		this.onLoadCombosDefectoFK(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cuenta_pagar_detalle_control) {
		this.actualizarPaginaAbrirLink(cuenta_pagar_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cuenta_pagar_detalle_control) {
		this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cuenta_pagar_detalle_control) {
					//super.actualizarPaginaImprimir(cuenta_pagar_detalle_control,"cuenta_pagar_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_pagar_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cuenta_pagar_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_pagar_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_pagar_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cuenta_pagar_detalle_control) {
		//super.actualizarPaginaImprimir(cuenta_pagar_detalle_control,"cuenta_pagar_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cuenta_pagar_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cuenta_pagar_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_pagar_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cuenta_pagar_detalle_control) {
		//super.actualizarPaginaImprimir(cuenta_pagar_detalle_control,"cuenta_pagar_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cuenta_pagar_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_pagar_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cuenta_pagar_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cuenta_pagar_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cuenta_pagar_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cuenta_pagar_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cuenta_pagar_detalle_control);
			
		this.actualizarPaginaAbrirLink(cuenta_pagar_detalle_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cuenta_pagar_detalle_control) {
		
		if(cuenta_pagar_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cuenta_pagar_detalle_control);
		}
		
		if(cuenta_pagar_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cuenta_pagar_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cuenta_pagar_detalle_control) {
		if(cuenta_pagar_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cuenta_pagar_detalleReturnGeneral",JSON.stringify(cuenta_pagar_detalle_control.cuenta_pagar_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cuenta_pagar_detalle_control) {
		if(cuenta_pagar_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cuenta_pagar_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cuenta_pagar_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cuenta_pagar_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cuenta_pagar_detalle_control, mostrar) {
		
		if(mostrar==true) {
			cuenta_pagar_detalle_funcion1.resaltarRestaurarDivsPagina(false,"cuenta_pagar_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cuenta_pagar_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"cuenta_pagar_detalle");
			}			
			
			cuenta_pagar_detalle_funcion1.mostrarDivMensaje(true,cuenta_pagar_detalle_control.strAuxiliarMensaje,cuenta_pagar_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			cuenta_pagar_detalle_funcion1.mostrarDivMensaje(false,cuenta_pagar_detalle_control.strAuxiliarMensaje,cuenta_pagar_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cuenta_pagar_detalle_control) {
		if(cuenta_pagar_detalle_funcion1.esPaginaForm(cuenta_pagar_detalle_constante1)==true) {
			window.opener.cuenta_pagar_detalle_webcontrol1.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(cuenta_pagar_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(cuenta_pagar_detalle_control) {
		cuenta_pagar_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cuenta_pagar_detalle_control.strAuxiliarUrlPagina);
				
		cuenta_pagar_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cuenta_pagar_detalle_control.strAuxiliarTipo,cuenta_pagar_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cuenta_pagar_detalle_control) {
		cuenta_pagar_detalle_funcion1.resaltarRestaurarDivMensaje(true,cuenta_pagar_detalle_control.strAuxiliarMensajeAlert,cuenta_pagar_detalle_control.strAuxiliarCssMensaje);
			
		if(cuenta_pagar_detalle_funcion1.esPaginaForm(cuenta_pagar_detalle_constante1)==true) {
			window.opener.cuenta_pagar_detalle_funcion1.resaltarRestaurarDivMensaje(true,cuenta_pagar_detalle_control.strAuxiliarMensajeAlert,cuenta_pagar_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cuenta_pagar_detalle_control) {
		this.cuenta_pagar_detalle_controlInicial=cuenta_pagar_detalle_control;
			
		if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cuenta_pagar_detalle_control.strStyleDivArbol,cuenta_pagar_detalle_control.strStyleDivContent
																,cuenta_pagar_detalle_control.strStyleDivOpcionesBanner,cuenta_pagar_detalle_control.strStyleDivExpandirColapsar
																,cuenta_pagar_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cuenta_pagar_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cuenta_pagar_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cuenta_pagar_detalle_control) {
		this.actualizarCssBotonesPagina(cuenta_pagar_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cuenta_pagar_detalle_control.tiposReportes,cuenta_pagar_detalle_control.tiposReporte
															 	,cuenta_pagar_detalle_control.tiposPaginacion,cuenta_pagar_detalle_control.tiposAcciones
																,cuenta_pagar_detalle_control.tiposColumnasSelect,cuenta_pagar_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cuenta_pagar_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cuenta_pagar_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cuenta_pagar_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cuenta_pagar_detalle_control) {
	
		var indexPosition=cuenta_pagar_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cuenta_pagar_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cuenta_pagar_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombosempresasFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombossucursalsFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombosejerciciosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombosperiodosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombosusuariosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarComboscuenta_pagarsFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.cargarCombosestadosFK(cuenta_pagar_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!=null && cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombosempresasFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombossucursalsFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombosejerciciosFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombosperiodosFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombosusuariosFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarComboscuenta_pagarsFK(cuenta_pagar_detalle_control);
				}

				if(cuenta_pagar_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",cuenta_pagar_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cuenta_pagar_detalle_webcontrol1.cargarCombosestadosFK(cuenta_pagar_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_pagarFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.cuenta_pagarsFK);
	}

	cargarComboEditarTablaestadoFK(cuenta_pagar_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cuenta_pagar_detalle_control) {
		jQuery("#divBusquedacuenta_pagar_detalleAjaxWebPart").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
		jQuery("#trcuenta_pagar_detalleCabeceraBusquedas").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_pagar_detalle").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cuenta_pagar_detalle_control.htmlTablaOrderBy!=null
			&& cuenta_pagar_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycuenta_pagar_detalleAjaxWebPart").html(cuenta_pagar_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cuenta_pagar_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cuenta_pagar_detalle_control.htmlTablaOrderByRel!=null
			&& cuenta_pagar_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcuenta_pagar_detalleAjaxWebPart").html(cuenta_pagar_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacuenta_pagar_detalleAjaxWebPart").css("display","none");
			jQuery("#trcuenta_pagar_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacuenta_pagar_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cuenta_pagar_detalle_control) {
		
		if(!cuenta_pagar_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cuenta_pagar_detalle_control);
		} else {
			jQuery("#divTablaDatoscuenta_pagar_detallesAjaxWebPart").html(cuenta_pagar_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscuenta_pagar_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscuenta_pagar_detalles=jQuery("#tblTablaDatoscuenta_pagar_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cuenta_pagar_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cuenta_pagar_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cuenta_pagar_detalle_webcontrol1.registrarControlesTableEdition(cuenta_pagar_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cuenta_pagar_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cuenta_pagar_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cuenta_pagar_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cuenta_pagar_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscuenta_pagar_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cuenta_pagar_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cuenta_pagar_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderBycuenta_pagar_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cuenta_pagar_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcuenta_pagar_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cuenta_pagar_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cuenta_pagar_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(cuenta_pagar_detalle_control) {
		var i=0;
		
		i=cuenta_pagar_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.versionRow);
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_4").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_5").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo) {
				jQuery("#t-cel_"+i+"_6").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario) {
				jQuery("#t-cel_"+i+"_7").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar) {
				jQuery("#t-cel_"+i+"_8").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.numero);
		jQuery("#t-cel_"+i+"_10").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.fecha_emision);
		jQuery("#t-cel_"+i+"_11").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.fecha_vence);
		jQuery("#t-cel_"+i+"_12").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.referencia);
		jQuery("#t-cel_"+i+"_13").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.monto);
		jQuery("#t-cel_"+i+"_14").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.debito);
		jQuery("#t-cel_"+i+"_15").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.credito);
		jQuery("#t-cel_"+i+"_16").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.descripcion);
		
		if(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado!=null && cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_17").val() != cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado) {
				jQuery("#t-cel_"+i+"_17").val(cuenta_pagar_detalle_control.cuenta_pagar_detalleActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_17").select2("val", null);
			if(jQuery("#t-cel_"+i+"_17").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_17").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cuenta_pagar_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(cuenta_pagar_detalle_control) {
		cuenta_pagar_detalle_funcion1.registrarControlesTableValidacionEdition(cuenta_pagar_detalle_control,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cuenta_pagar_detalle_control) {
		jQuery("#divResumencuenta_pagar_detalleActualAjaxWebPart").html(cuenta_pagar_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cuenta_pagar_detalle_control) {
		//jQuery("#divAccionesRelacionescuenta_pagar_detalleAjaxWebPart").html(cuenta_pagar_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cuenta_pagar_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cuenta_pagar_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescuenta_pagar_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cuenta_pagar_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cuenta_pagar_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cuenta_pagar_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cuenta_pagar_detalle_control) {
		
		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idcuenta_pagar);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idcuenta_pagar);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idejercicio);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idempresa);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idestado);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idperiodo);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idsucursal);
		}

		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",cuenta_pagar_detalle_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncuenta_pagar_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cuenta_pagar_detalle",id,"cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","empresa","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","sucursal","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","ejercicio","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","periodo","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","usuario","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParacuenta_pagar(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","cuenta_pagar","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		cuenta_pagar_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cuenta_pagar_detalle","estado","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalleConstante,strParametros);
		
		//cuenta_pagar_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa",cuenta_pagar_detalle_control.empresasFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_3",cuenta_pagar_detalle_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal",cuenta_pagar_detalle_control.sucursalsFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_4",cuenta_pagar_detalle_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio",cuenta_pagar_detalle_control.ejerciciosFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_5",cuenta_pagar_detalle_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo",cuenta_pagar_detalle_control.periodosFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_6",cuenta_pagar_detalle_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario",cuenta_pagar_detalle_control.usuariosFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_7",cuenta_pagar_detalle_control.usuariosFK);
		}
	};

	cargarComboscuenta_pagarsFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar",cuenta_pagar_detalle_control.cuenta_pagarsFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_8",cuenta_pagar_detalle_control.cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar",cuenta_pagar_detalle_control.cuenta_pagarsFK);

	};

	cargarCombosestadosFK(cuenta_pagar_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado",cuenta_pagar_detalle_control.estadosFK);

		if(cuenta_pagar_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cuenta_pagar_detalle_control.idFilaTablaActual+"_17",cuenta_pagar_detalle_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",cuenta_pagar_detalle_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeCombossucursalsFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeCombosperiodosFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeCombosusuariosFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeComboscuenta_pagarsFK(cuenta_pagar_detalle_control) {

	};

	registrarComboActionChangeCombosestadosFK(cuenta_pagar_detalle_control) {

	};

	
	
	setDefectoValorCombosempresasFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idempresaDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa").val() != cuenta_pagar_detalle_control.idempresaDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa").val(cuenta_pagar_detalle_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idsucursalDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val() != cuenta_pagar_detalle_control.idsucursalDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal").val(cuenta_pagar_detalle_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idejercicioDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val() != cuenta_pagar_detalle_control.idejercicioDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio").val(cuenta_pagar_detalle_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idperiodoDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo").val() != cuenta_pagar_detalle_control.idperiodoDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo").val(cuenta_pagar_detalle_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idusuarioDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario").val() != cuenta_pagar_detalle_control.idusuarioDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario").val(cuenta_pagar_detalle_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_pagarsFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idcuenta_pagarDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != cuenta_pagar_detalle_control.idcuenta_pagarDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(cuenta_pagar_detalle_control.idcuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(cuenta_pagar_detalle_control.idcuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(cuenta_pagar_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cuenta_pagar_detalle_control.idestadoDefaultFK>-1 && jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado").val() != cuenta_pagar_detalle_control.idestadoDefaultFK) {
				jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado").val(cuenta_pagar_detalle_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(cuenta_pagar_detalle_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cuenta_pagar_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(cuenta_pagar_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombosempresasFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombossucursalsFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombosejerciciosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombosperiodosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombosusuariosFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorComboscuenta_pagarsFK(cuenta_pagar_detalle_control);
			}

			if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 
				cuenta_pagar_detalle_webcontrol1.setDefectoValorCombosestadosFK(cuenta_pagar_detalle_control);
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
	onLoadCombosEventosFK(cuenta_pagar_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombosempresasFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombossucursalsFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombosejerciciosFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombosperiodosFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombosusuariosFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeComboscuenta_pagarsFK(cuenta_pagar_detalle_control);
			//}

			//if(cuenta_pagar_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",cuenta_pagar_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cuenta_pagar_detalle_webcontrol1.registrarComboActionChangeCombosestadosFK(cuenta_pagar_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cuenta_pagar_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cuenta_pagar_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cuenta_pagar_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idcuenta_pagar","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idejercicio","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idempresa","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idestado","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idperiodo","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idsucursal","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("cuenta_pagar_detalle","FK_Idusuario","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
		
			
			if(cuenta_pagar_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cuenta_pagar_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cuenta_pagar_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,"cuenta_pagar_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_pagar","id_cuenta_pagar","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_cuenta_pagar_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParacuenta_pagar("id_cuenta_pagar");
				//alert(jQuery('#form-id_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cuenta_pagar_detalle_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				cuenta_pagar_detalle_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cuenta_pagar_detalle_control) {
		
		jQuery("#divBusquedacuenta_pagar_detalleAjaxWebPart").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
		jQuery("#trcuenta_pagar_detalleCabeceraBusquedas").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacuenta_pagar_detalle").css("display",cuenta_pagar_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecuenta_pagar_detalle").css("display",cuenta_pagar_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscuenta_pagar_detalle").attr("style",cuenta_pagar_detalle_control.strPermisoMostrarTodos);		
		
		if(cuenta_pagar_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdcuenta_pagar_detalleNuevo").css("display",cuenta_pagar_detalle_control.strPermisoNuevo);
			jQuery("#tdcuenta_pagar_detalleNuevoToolBar").css("display",cuenta_pagar_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcuenta_pagar_detalleDuplicar").css("display",cuenta_pagar_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_pagar_detalleDuplicarToolBar").css("display",cuenta_pagar_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcuenta_pagar_detalleNuevoGuardarCambios").css("display",cuenta_pagar_detalle_control.strPermisoNuevo);
			jQuery("#tdcuenta_pagar_detalleNuevoGuardarCambiosToolBar").css("display",cuenta_pagar_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cuenta_pagar_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdcuenta_pagar_detalleCopiar").css("display",cuenta_pagar_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_pagar_detalleCopiarToolBar").css("display",cuenta_pagar_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcuenta_pagar_detalleConEditar").css("display",cuenta_pagar_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdcuenta_pagar_detalleGuardarCambios").css("display",cuenta_pagar_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcuenta_pagar_detalleGuardarCambiosToolBar").css("display",cuenta_pagar_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcuenta_pagar_detalleCerrarPagina").css("display",cuenta_pagar_detalle_control.strPermisoPopup);		
		jQuery("#tdcuenta_pagar_detalleCerrarPaginaToolBar").css("display",cuenta_pagar_detalle_control.strPermisoPopup);
		//jQuery("#trcuenta_pagar_detalleAccionesRelaciones").css("display",cuenta_pagar_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cuenta_pagar_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_pagar_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cuenta_pagar_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Detalle Cuenta Pagars";
		sTituloBanner+=" - " + cuenta_pagar_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cuenta_pagar_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcuenta_pagar_detalleRelacionesToolBar").css("display",cuenta_pagar_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscuenta_pagar_detalle").css("display",cuenta_pagar_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cuenta_pagar_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cuenta_pagar_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cuenta_pagar_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cuenta_pagar_detalle_webcontrol1.registrarEventosControles();
		
		if(cuenta_pagar_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="false") {
			cuenta_pagar_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(cuenta_pagar_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cuenta_pagar_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cuenta_pagar_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cuenta_pagar_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cuenta_pagar_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(cuenta_pagar_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cuenta_pagar_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cuenta_pagar_detalle","cuentaspagar","",cuenta_pagar_detalle_funcion1,cuenta_pagar_detalle_webcontrol1,cuenta_pagar_detalle_constante1);	
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

var cuenta_pagar_detalle_webcontrol1 = new cuenta_pagar_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cuenta_pagar_detalle_webcontrol,cuenta_pagar_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.cuenta_pagar_detalle_webcontrol1 = cuenta_pagar_detalle_webcontrol1;


if(cuenta_pagar_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cuenta_pagar_detalle_webcontrol1.onLoadWindow; 
}

//</script>