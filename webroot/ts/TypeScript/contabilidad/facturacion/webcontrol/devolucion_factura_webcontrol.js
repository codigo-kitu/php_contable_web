//<script type="text/javascript" language="javascript">



//var devolucion_facturaJQueryPaginaWebInteraccion= function (devolucion_factura_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {devolucion_factura_constante,devolucion_factura_constante1} from '../util/devolucion_factura_constante.js';

import {devolucion_factura_funcion,devolucion_factura_funcion1} from '../util/devolucion_factura_funcion.js';


class devolucion_factura_webcontrol extends GeneralEntityWebControl {
	
	devolucion_factura_control=null;
	devolucion_factura_controlInicial=null;
	devolucion_factura_controlAuxiliar=null;
		
	//if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(devolucion_factura_control) {
		super();
		
		this.devolucion_factura_control=devolucion_factura_control;
	}
		
	actualizarVariablesPagina(devolucion_factura_control) {
		
		if(devolucion_factura_control.action=="index" || devolucion_factura_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(devolucion_factura_control);
			
		} 
		
		
		else if(devolucion_factura_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(devolucion_factura_control);
			
		} else if(devolucion_factura_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(devolucion_factura_control);
			
		} else if(devolucion_factura_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(devolucion_factura_control);		
		
		} else if(devolucion_factura_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(devolucion_factura_control);
		
		}  else if(devolucion_factura_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(devolucion_factura_control);
		
		} else if(devolucion_factura_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(devolucion_factura_control);		
		
		} else if(devolucion_factura_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(devolucion_factura_control);		
		
		} else if(devolucion_factura_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(devolucion_factura_control);		
		
		} else if(devolucion_factura_control.action.includes("Busqueda") ||
				  devolucion_factura_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(devolucion_factura_control);
			
		} else if(devolucion_factura_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(devolucion_factura_control)
		}
		
		
		
	
		else if(devolucion_factura_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(devolucion_factura_control);	
		
		} else if(devolucion_factura_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_factura_control);		
		}
	
		else if(devolucion_factura_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(devolucion_factura_control);		
		}
	
		else if(devolucion_factura_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(devolucion_factura_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + devolucion_factura_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(devolucion_factura_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(devolucion_factura_control) {
		this.actualizarPaginaAccionesGenerales(devolucion_factura_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(devolucion_factura_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_factura_control);
		this.actualizarPaginaOrderBy(devolucion_factura_control);
		this.actualizarPaginaTablaDatos(devolucion_factura_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_factura_control);
		//this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_factura_control);
		this.actualizarPaginaAreaBusquedas(devolucion_factura_control);
		this.actualizarPaginaCargaCombosFK(devolucion_factura_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(devolucion_factura_control) {
		//this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(devolucion_factura_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(devolucion_factura_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(devolucion_factura_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(devolucion_factura_control) {
		
		this.actualizarPaginaCargaGeneral(devolucion_factura_control);
		this.actualizarPaginaTablaDatos(devolucion_factura_control);
		this.actualizarPaginaCargaGeneralControles(devolucion_factura_control);
		//this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(devolucion_factura_control);
		this.actualizarPaginaAreaBusquedas(devolucion_factura_control);
		this.actualizarPaginaCargaCombosFK(devolucion_factura_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);		
		//this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);		
		//this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);		
		//this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(devolucion_factura_control) {
		//this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(devolucion_factura_control) {
		this.actualizarPaginaAbrirLink(devolucion_factura_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);				
		//this.actualizarPaginaFormulario(devolucion_factura_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);
		//this.actualizarPaginaFormulario(devolucion_factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);
		//this.actualizarPaginaFormulario(devolucion_factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(devolucion_factura_control) {
		//this.actualizarPaginaFormulario(devolucion_factura_control);
		this.onLoadCombosDefectoFK(devolucion_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);
		//this.actualizarPaginaFormulario(devolucion_factura_control);
		this.onLoadCombosDefectoFK(devolucion_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		//this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(devolucion_factura_control) {
		this.actualizarPaginaAbrirLink(devolucion_factura_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(devolucion_factura_control) {
					//super.actualizarPaginaImprimir(devolucion_factura_control,"devolucion_factura");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",devolucion_factura_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("devolucion_factura_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(devolucion_factura_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(devolucion_factura_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(devolucion_factura_control) {
		//super.actualizarPaginaImprimir(devolucion_factura_control,"devolucion_factura");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("devolucion_factura_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(devolucion_factura_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",devolucion_factura_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(devolucion_factura_control) {
		//super.actualizarPaginaImprimir(devolucion_factura_control,"devolucion_factura");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("devolucion_factura_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(devolucion_factura_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",devolucion_factura_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(devolucion_factura_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(devolucion_factura_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(devolucion_factura_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(devolucion_factura_control);
			
		this.actualizarPaginaAbrirLink(devolucion_factura_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(devolucion_factura_control) {
		this.actualizarPaginaTablaDatos(devolucion_factura_control);
		this.actualizarPaginaFormulario(devolucion_factura_control);
		this.actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control);		
		this.actualizarPaginaAreaMantenimiento(devolucion_factura_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(devolucion_factura_control) {
		
		if(devolucion_factura_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(devolucion_factura_control);
		}
		
		if(devolucion_factura_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(devolucion_factura_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(devolucion_factura_control) {
		if(devolucion_factura_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("devolucion_facturaReturnGeneral",JSON.stringify(devolucion_factura_control.devolucion_facturaReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(devolucion_factura_control) {
		if(devolucion_factura_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && devolucion_factura_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(devolucion_factura_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(devolucion_factura_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(devolucion_factura_control, mostrar) {
		
		if(mostrar==true) {
			devolucion_factura_funcion1.resaltarRestaurarDivsPagina(false,"devolucion_factura");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				devolucion_factura_funcion1.resaltarRestaurarDivMantenimiento(false,"devolucion_factura");
			}			
			
			devolucion_factura_funcion1.mostrarDivMensaje(true,devolucion_factura_control.strAuxiliarMensaje,devolucion_factura_control.strAuxiliarCssMensaje);
		
		} else {
			devolucion_factura_funcion1.mostrarDivMensaje(false,devolucion_factura_control.strAuxiliarMensaje,devolucion_factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(devolucion_factura_control) {
		if(devolucion_factura_funcion1.esPaginaForm(devolucion_factura_constante1)==true) {
			window.opener.devolucion_factura_webcontrol1.actualizarPaginaTablaDatos(devolucion_factura_control);
		} else {
			this.actualizarPaginaTablaDatos(devolucion_factura_control);
		}
	}
	
	actualizarPaginaAbrirLink(devolucion_factura_control) {
		devolucion_factura_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(devolucion_factura_control.strAuxiliarUrlPagina);
				
		devolucion_factura_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(devolucion_factura_control.strAuxiliarTipo,devolucion_factura_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(devolucion_factura_control) {
		devolucion_factura_funcion1.resaltarRestaurarDivMensaje(true,devolucion_factura_control.strAuxiliarMensajeAlert,devolucion_factura_control.strAuxiliarCssMensaje);
			
		if(devolucion_factura_funcion1.esPaginaForm(devolucion_factura_constante1)==true) {
			window.opener.devolucion_factura_funcion1.resaltarRestaurarDivMensaje(true,devolucion_factura_control.strAuxiliarMensajeAlert,devolucion_factura_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(devolucion_factura_control) {
		this.devolucion_factura_controlInicial=devolucion_factura_control;
			
		if(devolucion_factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(devolucion_factura_control.strStyleDivArbol,devolucion_factura_control.strStyleDivContent
																,devolucion_factura_control.strStyleDivOpcionesBanner,devolucion_factura_control.strStyleDivExpandirColapsar
																,devolucion_factura_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=devolucion_factura_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",devolucion_factura_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(devolucion_factura_control) {
		this.actualizarCssBotonesPagina(devolucion_factura_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(devolucion_factura_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(devolucion_factura_control.tiposReportes,devolucion_factura_control.tiposReporte
															 	,devolucion_factura_control.tiposPaginacion,devolucion_factura_control.tiposAcciones
																,devolucion_factura_control.tiposColumnasSelect,devolucion_factura_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(devolucion_factura_control.tiposRelaciones,devolucion_factura_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(devolucion_factura_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(devolucion_factura_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(devolucion_factura_control);			
	}
	
	actualizarPaginaUsuarioInvitado(devolucion_factura_control) {
	
		var indexPosition=devolucion_factura_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=devolucion_factura_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(devolucion_factura_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosempresasFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombossucursalsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosejerciciosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosperiodosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosusuariosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosclientesFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosvendedorsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombostermino_pago_clientesFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosmonedasFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosestadosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosasientosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.cargarComboskardexsFK(devolucion_factura_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(devolucion_factura_control.strRecargarFkTiposNinguno!=null && devolucion_factura_control.strRecargarFkTiposNinguno!='NINGUNO' && devolucion_factura_control.strRecargarFkTiposNinguno!='') {
			
				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosempresasFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombossucursalsFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosejerciciosFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosperiodosFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosusuariosFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosclientesFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosvendedorsFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombostermino_pago_clientesFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosmonedasFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosestadosFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosasientosFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control);
				}

				if(devolucion_factura_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",devolucion_factura_control.strRecargarFkTiposNinguno,",")) { 
					devolucion_factura_webcontrol1.cargarComboskardexsFK(devolucion_factura_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.devolucion_facturaActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.devolucion_facturaActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.devolucion_facturaActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.clientesFK);
	}

	cargarComboEditarTablavendedorFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablamonedaFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.monedasFK);
	}

	cargarComboEditarTablaestadoFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.asientosFK);
	}

	cargarComboEditarTabladocumento_cuenta_cobrarFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.documento_cuenta_cobrarsFK);
	}

	cargarComboEditarTablakardexFK(devolucion_factura_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,devolucion_factura_funcion1,devolucion_factura_control.kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(devolucion_factura_control) {
		jQuery("#divBusquedadevolucion_facturaAjaxWebPart").css("display",devolucion_factura_control.strPermisoBusqueda);
		jQuery("#trdevolucion_facturaCabeceraBusquedas").css("display",devolucion_factura_control.strPermisoBusqueda);
		jQuery("#trBusquedadevolucion_factura").css("display",devolucion_factura_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(devolucion_factura_control.htmlTablaOrderBy!=null
			&& devolucion_factura_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydevolucion_facturaAjaxWebPart").html(devolucion_factura_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//devolucion_factura_webcontrol1.registrarOrderByActions();
			
		}
			
		if(devolucion_factura_control.htmlTablaOrderByRel!=null
			&& devolucion_factura_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldevolucion_facturaAjaxWebPart").html(devolucion_factura_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(devolucion_factura_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadevolucion_facturaAjaxWebPart").css("display","none");
			jQuery("#trdevolucion_facturaCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadevolucion_factura").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(devolucion_factura_control) {
		
		if(!devolucion_factura_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(devolucion_factura_control);
		} else {
			jQuery("#divTablaDatosdevolucion_facturasAjaxWebPart").html(devolucion_factura_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdevolucion_facturas=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(devolucion_factura_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdevolucion_facturas=jQuery("#tblTablaDatosdevolucion_facturas").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("devolucion_factura",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',devolucion_factura_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			devolucion_factura_webcontrol1.registrarControlesTableEdition(devolucion_factura_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		devolucion_factura_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(devolucion_factura_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("devolucion_factura_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(devolucion_factura_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdevolucion_facturasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(devolucion_factura_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(devolucion_factura_control);
		
		const divOrderBy = document.getElementById("divOrderBydevolucion_facturaAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(devolucion_factura_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldevolucion_facturaAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(devolucion_factura_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(devolucion_factura_control.devolucion_facturaActual!=null) {//form
			
			this.actualizarCamposFilaTabla(devolucion_factura_control);			
		}
	}
	
	actualizarCamposFilaTabla(devolucion_factura_control) {
		var i=0;
		
		i=devolucion_factura_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(devolucion_factura_control.devolucion_facturaActual.id);
		jQuery("#t-version_row_"+i+"").val(devolucion_factura_control.devolucion_facturaActual.versionRow);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_empresa!=null && devolucion_factura_control.devolucion_facturaActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != devolucion_factura_control.devolucion_facturaActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(devolucion_factura_control.devolucion_facturaActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_sucursal!=null && devolucion_factura_control.devolucion_facturaActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != devolucion_factura_control.devolucion_facturaActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(devolucion_factura_control.devolucion_facturaActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_ejercicio!=null && devolucion_factura_control.devolucion_facturaActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != devolucion_factura_control.devolucion_facturaActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(devolucion_factura_control.devolucion_facturaActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_periodo!=null && devolucion_factura_control.devolucion_facturaActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != devolucion_factura_control.devolucion_facturaActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(devolucion_factura_control.devolucion_facturaActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_usuario!=null && devolucion_factura_control.devolucion_facturaActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != devolucion_factura_control.devolucion_facturaActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(devolucion_factura_control.devolucion_facturaActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(devolucion_factura_control.devolucion_facturaActual.numero);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_cliente!=null && devolucion_factura_control.devolucion_facturaActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != devolucion_factura_control.devolucion_facturaActual.id_cliente) {
				jQuery("#t-cel_"+i+"_8").val(devolucion_factura_control.devolucion_facturaActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(devolucion_factura_control.devolucion_facturaActual.ruc);
		jQuery("#t-cel_"+i+"_10").val(devolucion_factura_control.devolucion_facturaActual.referencia_cliente);
		jQuery("#t-cel_"+i+"_11").val(devolucion_factura_control.devolucion_facturaActual.fecha_emision);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_vendedor!=null && devolucion_factura_control.devolucion_facturaActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_12").val() != devolucion_factura_control.devolucion_facturaActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_12").val(devolucion_factura_control.devolucion_facturaActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_12").select2("val", null);
			if(jQuery("#t-cel_"+i+"_12").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_12").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_termino_pago_cliente!=null && devolucion_factura_control.devolucion_facturaActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != devolucion_factura_control.devolucion_facturaActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_13").val(devolucion_factura_control.devolucion_facturaActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(devolucion_factura_control.devolucion_facturaActual.fecha_vence);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_moneda!=null && devolucion_factura_control.devolucion_facturaActual.id_moneda>-1){
			if(jQuery("#t-cel_"+i+"_15").val() != devolucion_factura_control.devolucion_facturaActual.id_moneda) {
				jQuery("#t-cel_"+i+"_15").val(devolucion_factura_control.devolucion_facturaActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_15").select2("val", null);
			if(jQuery("#t-cel_"+i+"_15").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_15").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_16").val(devolucion_factura_control.devolucion_facturaActual.cotizacion);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_estado!=null && devolucion_factura_control.devolucion_facturaActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_17").val() != devolucion_factura_control.devolucion_facturaActual.id_estado) {
				jQuery("#t-cel_"+i+"_17").val(devolucion_factura_control.devolucion_facturaActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_17").select2("val", null);
			if(jQuery("#t-cel_"+i+"_17").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_17").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_18").val(devolucion_factura_control.devolucion_facturaActual.direccion);
		jQuery("#t-cel_"+i+"_19").val(devolucion_factura_control.devolucion_facturaActual.enviar_a);
		jQuery("#t-cel_"+i+"_20").val(devolucion_factura_control.devolucion_facturaActual.observacion);
		jQuery("#t-cel_"+i+"_21").prop('checked',devolucion_factura_control.devolucion_facturaActual.impuesto_en_precio);
		jQuery("#t-cel_"+i+"_22").val(devolucion_factura_control.devolucion_facturaActual.sub_total);
		jQuery("#t-cel_"+i+"_23").val(devolucion_factura_control.devolucion_facturaActual.descuento_monto);
		jQuery("#t-cel_"+i+"_24").val(devolucion_factura_control.devolucion_facturaActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_25").val(devolucion_factura_control.devolucion_facturaActual.iva_monto);
		jQuery("#t-cel_"+i+"_26").val(devolucion_factura_control.devolucion_facturaActual.iva_porciento);
		jQuery("#t-cel_"+i+"_27").val(devolucion_factura_control.devolucion_facturaActual.retencion_fuente_monto);
		jQuery("#t-cel_"+i+"_28").val(devolucion_factura_control.devolucion_facturaActual.retencion_fuente_porciento);
		jQuery("#t-cel_"+i+"_29").val(devolucion_factura_control.devolucion_facturaActual.retencion_iva_monto);
		jQuery("#t-cel_"+i+"_30").val(devolucion_factura_control.devolucion_facturaActual.retencion_iva_porciento);
		jQuery("#t-cel_"+i+"_31").val(devolucion_factura_control.devolucion_facturaActual.total);
		jQuery("#t-cel_"+i+"_32").val(devolucion_factura_control.devolucion_facturaActual.otro_monto);
		jQuery("#t-cel_"+i+"_33").val(devolucion_factura_control.devolucion_facturaActual.otro_porciento);
		jQuery("#t-cel_"+i+"_34").val(devolucion_factura_control.devolucion_facturaActual.hora);
		jQuery("#t-cel_"+i+"_35").val(devolucion_factura_control.devolucion_facturaActual.retencion_ica_porciento);
		jQuery("#t-cel_"+i+"_36").val(devolucion_factura_control.devolucion_facturaActual.retencion_ica_monto);
		
		if(devolucion_factura_control.devolucion_facturaActual.id_asiento!=null && devolucion_factura_control.devolucion_facturaActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_37").val() != devolucion_factura_control.devolucion_facturaActual.id_asiento) {
				jQuery("#t-cel_"+i+"_37").val(devolucion_factura_control.devolucion_facturaActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_37").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_37").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_documento_cuenta_cobrar!=null && devolucion_factura_control.devolucion_facturaActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_38").val() != devolucion_factura_control.devolucion_facturaActual.id_documento_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_38").val(devolucion_factura_control.devolucion_facturaActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_38").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_38").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(devolucion_factura_control.devolucion_facturaActual.id_kardex!=null && devolucion_factura_control.devolucion_facturaActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_39").val() != devolucion_factura_control.devolucion_facturaActual.id_kardex) {
				jQuery("#t-cel_"+i+"_39").val(devolucion_factura_control.devolucion_facturaActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_39").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_39").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(devolucion_factura_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciondevolucion_factura_detalle").click(function(){
		jQuery("#tblTablaDatosdevolucion_facturas").on("click",".imgrelaciondevolucion_factura_detalle", function () {

			var idActual=jQuery(this).attr("idactualdevolucion_factura");

			devolucion_factura_webcontrol1.registrarSesionParadevolucion_factura_detalles(idActual);
		});				
	}
		
	

	registrarSesionParadevolucion_factura_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"devolucion_factura","devolucion_factura_detalle","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1,"s","");
	}
	
	registrarControlesTableEdition(devolucion_factura_control) {
		devolucion_factura_funcion1.registrarControlesTableValidacionEdition(devolucion_factura_control,devolucion_factura_webcontrol1,devolucion_factura_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(devolucion_factura_control) {
		jQuery("#divResumendevolucion_facturaActualAjaxWebPart").html(devolucion_factura_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(devolucion_factura_control) {
		//jQuery("#divAccionesRelacionesdevolucion_facturaAjaxWebPart").html(devolucion_factura_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("devolucion_factura_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(devolucion_factura_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdevolucion_facturaAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		devolucion_factura_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(devolucion_factura_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(devolucion_factura_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(devolucion_factura_control) {
		
		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",devolucion_factura_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",devolucion_factura_control.strVisibleFK_Idasiento);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",devolucion_factura_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",devolucion_factura_control.strVisibleFK_Idcliente);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",devolucion_factura_control.strVisibleFK_Iddocumento_cuenta_cobrar);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",devolucion_factura_control.strVisibleFK_Iddocumento_cuenta_cobrar);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",devolucion_factura_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",devolucion_factura_control.strVisibleFK_Idejercicio);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",devolucion_factura_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",devolucion_factura_control.strVisibleFK_Idempresa);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idestado").attr("style",devolucion_factura_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idestado").attr("style",devolucion_factura_control.strVisibleFK_Idestado);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",devolucion_factura_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",devolucion_factura_control.strVisibleFK_Idkardex);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",devolucion_factura_control.strVisibleFK_Idmoneda);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",devolucion_factura_control.strVisibleFK_Idmoneda);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",devolucion_factura_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",devolucion_factura_control.strVisibleFK_Idperiodo);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",devolucion_factura_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",devolucion_factura_control.strVisibleFK_Idsucursal);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",devolucion_factura_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",devolucion_factura_control.strVisibleFK_Idtermino_pago);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",devolucion_factura_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",devolucion_factura_control.strVisibleFK_Idusuario);
		}

		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",devolucion_factura_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",devolucion_factura_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondevolucion_factura();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("devolucion_factura",id,"facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","empresa","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","sucursal","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","ejercicio","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","periodo","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","usuario","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","cliente","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","vendedor","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","termino_pago_cliente","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParamoneda(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","moneda","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","estado","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","asiento","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParadocumento_cuenta_cobrar(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","documento_cuenta_cobrar","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		devolucion_factura_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("devolucion_factura","kardex","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciondevolucion_factura_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualdevolucion_factura");

			devolucion_factura_webcontrol1.registrarSesionParadevolucion_factura_detalles(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_facturaConstante,strParametros);
		
		//devolucion_factura_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa",devolucion_factura_control.empresasFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_2",devolucion_factura_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal",devolucion_factura_control.sucursalsFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_3",devolucion_factura_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio",devolucion_factura_control.ejerciciosFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_4",devolucion_factura_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo",devolucion_factura_control.periodosFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_5",devolucion_factura_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario",devolucion_factura_control.usuariosFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_6",devolucion_factura_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente",devolucion_factura_control.clientesFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_8",devolucion_factura_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",devolucion_factura_control.clientesFK);

	};

	cargarCombosvendedorsFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor",devolucion_factura_control.vendedorsFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_12",devolucion_factura_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",devolucion_factura_control.vendedorsFK);

	};

	cargarCombostermino_pago_clientesFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente",devolucion_factura_control.termino_pago_clientesFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_13",devolucion_factura_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente",devolucion_factura_control.termino_pago_clientesFK);

	};

	cargarCombosmonedasFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda",devolucion_factura_control.monedasFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_15",devolucion_factura_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",devolucion_factura_control.monedasFK);

	};

	cargarCombosestadosFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado",devolucion_factura_control.estadosFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_17",devolucion_factura_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",devolucion_factura_control.estadosFK);

	};

	cargarCombosasientosFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento",devolucion_factura_control.asientosFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_37",devolucion_factura_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",devolucion_factura_control.asientosFK);

	};

	cargarCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar",devolucion_factura_control.documento_cuenta_cobrarsFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_38",devolucion_factura_control.documento_cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar",devolucion_factura_control.documento_cuenta_cobrarsFK);

	};

	cargarComboskardexsFK(devolucion_factura_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex",devolucion_factura_control.kardexsFK);

		if(devolucion_factura_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+devolucion_factura_control.idFilaTablaActual+"_39",devolucion_factura_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",devolucion_factura_control.kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombossucursalsFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosperiodosFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosusuariosFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosclientesFK(devolucion_factura_control) {
		this.registrarComboActionChangeid_cliente("form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosmonedasFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosestadosFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosasientosFK(devolucion_factura_control) {

	};

	registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control) {

	};

	registrarComboActionChangeComboskardexsFK(devolucion_factura_control) {

	};

	
	
	setDefectoValorCombosempresasFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idempresaDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa").val() != devolucion_factura_control.idempresaDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa").val(devolucion_factura_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idsucursalDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal").val() != devolucion_factura_control.idsucursalDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal").val(devolucion_factura_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idejercicioDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio").val() != devolucion_factura_control.idejercicioDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio").val(devolucion_factura_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idperiodoDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo").val() != devolucion_factura_control.idperiodoDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo").val(devolucion_factura_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idusuarioDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario").val() != devolucion_factura_control.idusuarioDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario").val(devolucion_factura_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idclienteDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente").val() != devolucion_factura_control.idclienteDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente").val(devolucion_factura_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(devolucion_factura_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idvendedorDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor").val() != devolucion_factura_control.idvendedorDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor").val(devolucion_factura_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(devolucion_factura_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != devolucion_factura_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(devolucion_factura_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(devolucion_factura_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idmonedaDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda").val() != devolucion_factura_control.idmonedaDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda").val(devolucion_factura_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(devolucion_factura_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idestadoDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado").val() != devolucion_factura_control.idestadoDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado").val(devolucion_factura_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(devolucion_factura_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idasientoDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento").val() != devolucion_factura_control.idasientoDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento").val(devolucion_factura_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(devolucion_factura_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.iddocumento_cuenta_cobrarDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != devolucion_factura_control.iddocumento_cuenta_cobrarDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(devolucion_factura_control.iddocumento_cuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(devolucion_factura_control.iddocumento_cuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(devolucion_factura_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(devolucion_factura_control.idkardexDefaultFK>-1 && jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex").val() != devolucion_factura_control.idkardexDefaultFK) {
				jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex").val(devolucion_factura_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(devolucion_factura_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+devolucion_factura_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("devolucion_factura","facturacion","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);
		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(devolucion_factura_constante1.BIT_ES_PAGINA_FORM==true) {
			
							devolucion_factura_detalle_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(devolucion_factura_constante1.BIT_ES_PAGINA_FORM==true) {
			
		devolucion_factura_detalle_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//devolucion_factura_control
		
	
	}
	
	onLoadCombosDefectoFK(devolucion_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosempresasFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombossucursalsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosejerciciosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosperiodosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosusuariosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosclientesFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosvendedorsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosmonedasFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosestadosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosasientosFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control);
			}

			if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_factura_control.strRecargarFkTipos,",")) { 
				devolucion_factura_webcontrol1.setDefectoValorComboskardexsFK(devolucion_factura_control);
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
	onLoadCombosEventosFK(devolucion_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosempresasFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombossucursalsFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosejerciciosFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosperiodosFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosusuariosFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosclientesFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosvendedorsFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosmonedasFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosestadosFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosasientosFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(devolucion_factura_control);
			//}

			//if(devolucion_factura_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",devolucion_factura_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				devolucion_factura_webcontrol1.registrarComboActionChangeComboskardexsFK(devolucion_factura_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(devolucion_factura_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(devolucion_factura_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(devolucion_factura_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idasiento","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idcliente","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Iddocumento_cuenta_cobrar","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idejercicio","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idempresa","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idestado","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idkardex","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idmoneda","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idperiodo","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idsucursal","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idtermino_pago","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idusuario","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("devolucion_factura","FK_Idvendedor","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
		
			
			if(devolucion_factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("devolucion_factura");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("devolucion_factura");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(devolucion_factura_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,"devolucion_factura");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_cobrar","id_documento_cuenta_cobrar","cuentascobrar","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParadocumento_cuenta_cobrar("id_documento_cuenta_cobrar");
				//alert(jQuery('#form-id_documento_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+devolucion_factura_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				devolucion_factura_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("devolucion_factura");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(devolucion_factura_control) {
		
		jQuery("#divBusquedadevolucion_facturaAjaxWebPart").css("display",devolucion_factura_control.strPermisoBusqueda);
		jQuery("#trdevolucion_facturaCabeceraBusquedas").css("display",devolucion_factura_control.strPermisoBusqueda);
		jQuery("#trBusquedadevolucion_factura").css("display",devolucion_factura_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedevolucion_factura").css("display",devolucion_factura_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdevolucion_factura").attr("style",devolucion_factura_control.strPermisoMostrarTodos);		
		
		if(devolucion_factura_control.strPermisoNuevo!=null) {
			jQuery("#tddevolucion_facturaNuevo").css("display",devolucion_factura_control.strPermisoNuevo);
			jQuery("#tddevolucion_facturaNuevoToolBar").css("display",devolucion_factura_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddevolucion_facturaDuplicar").css("display",devolucion_factura_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddevolucion_facturaDuplicarToolBar").css("display",devolucion_factura_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddevolucion_facturaNuevoGuardarCambios").css("display",devolucion_factura_control.strPermisoNuevo);
			jQuery("#tddevolucion_facturaNuevoGuardarCambiosToolBar").css("display",devolucion_factura_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(devolucion_factura_control.strPermisoActualizar!=null) {
			jQuery("#tddevolucion_facturaCopiar").css("display",devolucion_factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucion_facturaCopiarToolBar").css("display",devolucion_factura_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddevolucion_facturaConEditar").css("display",devolucion_factura_control.strPermisoActualizar);
		}
		
		jQuery("#tddevolucion_facturaGuardarCambios").css("display",devolucion_factura_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddevolucion_facturaGuardarCambiosToolBar").css("display",devolucion_factura_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddevolucion_facturaCerrarPagina").css("display",devolucion_factura_control.strPermisoPopup);		
		jQuery("#tddevolucion_facturaCerrarPaginaToolBar").css("display",devolucion_factura_control.strPermisoPopup);
		//jQuery("#trdevolucion_facturaAccionesRelaciones").css("display",devolucion_factura_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=devolucion_factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + devolucion_factura_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Devolucion Facturas";
		sTituloBanner+=" - " + devolucion_factura_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + devolucion_factura_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddevolucion_facturaRelacionesToolBar").css("display",devolucion_factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdevolucion_factura").css("display",devolucion_factura_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		devolucion_factura_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		devolucion_factura_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		devolucion_factura_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		devolucion_factura_webcontrol1.registrarEventosControles();
		
		if(devolucion_factura_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(devolucion_factura_constante1.STR_ES_RELACIONADO=="false") {
			devolucion_factura_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(devolucion_factura_constante1.STR_ES_RELACIONES=="true") {
			if(devolucion_factura_constante1.BIT_ES_PAGINA_FORM==true) {
				devolucion_factura_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(devolucion_factura_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(devolucion_factura_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				devolucion_factura_webcontrol1.onLoad();
			
			//} else {
				//if(devolucion_factura_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			devolucion_factura_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("devolucion_factura","facturacion","",devolucion_factura_funcion1,devolucion_factura_webcontrol1,devolucion_factura_constante1);	
	}
}

var devolucion_factura_webcontrol1 = new devolucion_factura_webcontrol();

//Para ser llamado desde otro archivo (import)
export {devolucion_factura_webcontrol,devolucion_factura_webcontrol1};

//Para ser llamado desde window.opener
window.devolucion_factura_webcontrol1 = devolucion_factura_webcontrol1;


if(devolucion_factura_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = devolucion_factura_webcontrol1.onLoadWindow; 
}

//</script>