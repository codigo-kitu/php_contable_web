//<script type="text/javascript" language="javascript">



//var retencion_fuenteJQueryPaginaWebInteraccion= function (retencion_fuente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {retencion_fuente_constante,retencion_fuente_constante1} from '../util/retencion_fuente_constante.js';

import {retencion_fuente_funcion,retencion_fuente_funcion1} from '../util/retencion_fuente_funcion.js';


class retencion_fuente_webcontrol extends GeneralEntityWebControl {
	
	retencion_fuente_control=null;
	retencion_fuente_controlInicial=null;
	retencion_fuente_controlAuxiliar=null;
		
	//if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(retencion_fuente_control) {
		super();
		
		this.retencion_fuente_control=retencion_fuente_control;
	}
		
	actualizarVariablesPagina(retencion_fuente_control) {
		
		if(retencion_fuente_control.action=="index" || retencion_fuente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(retencion_fuente_control);
			
		} 
		
		
		else if(retencion_fuente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(retencion_fuente_control);
			
		} else if(retencion_fuente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(retencion_fuente_control);
			
		} else if(retencion_fuente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_fuente_control);		
		
		} else if(retencion_fuente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(retencion_fuente_control);
		
		}  else if(retencion_fuente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_fuente_control);
		
		} else if(retencion_fuente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_fuente_control);		
		
		} else if(retencion_fuente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(retencion_fuente_control);		
		
		} else if(retencion_fuente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(retencion_fuente_control);		
		
		} else if(retencion_fuente_control.action.includes("Busqueda") ||
				  retencion_fuente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(retencion_fuente_control);
			
		} else if(retencion_fuente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(retencion_fuente_control)
		}
		
		
		
	
		else if(retencion_fuente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(retencion_fuente_control);	
		
		} else if(retencion_fuente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_fuente_control);		
		}
	
		else if(retencion_fuente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retencion_fuente_control);		
		}
	
		else if(retencion_fuente_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_fuente_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + retencion_fuente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(retencion_fuente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(retencion_fuente_control) {
		this.actualizarPaginaAccionesGenerales(retencion_fuente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(retencion_fuente_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_fuente_control);
		this.actualizarPaginaOrderBy(retencion_fuente_control);
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		this.actualizarPaginaCargaGeneralControles(retencion_fuente_control);
		//this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_fuente_control);
		this.actualizarPaginaAreaBusquedas(retencion_fuente_control);
		this.actualizarPaginaCargaCombosFK(retencion_fuente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(retencion_fuente_control) {
		//this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(retencion_fuente_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(retencion_fuente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_fuente_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(retencion_fuente_control) {
		
		this.actualizarPaginaCargaGeneral(retencion_fuente_control);
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		this.actualizarPaginaCargaGeneralControles(retencion_fuente_control);
		//this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retencion_fuente_control);
		this.actualizarPaginaAreaBusquedas(retencion_fuente_control);
		this.actualizarPaginaCargaCombosFK(retencion_fuente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		//this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		//this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		//this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(retencion_fuente_control) {
		//this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retencion_fuente_control) {
		this.actualizarPaginaAbrirLink(retencion_fuente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);				
		//this.actualizarPaginaFormulario(retencion_fuente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		//this.actualizarPaginaFormulario(retencion_fuente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		//this.actualizarPaginaFormulario(retencion_fuente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(retencion_fuente_control) {
		//this.actualizarPaginaFormulario(retencion_fuente_control);
		this.onLoadCombosDefectoFK(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		//this.actualizarPaginaFormulario(retencion_fuente_control);
		this.onLoadCombosDefectoFK(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		//this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retencion_fuente_control) {
		this.actualizarPaginaAbrirLink(retencion_fuente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(retencion_fuente_control) {
					//super.actualizarPaginaImprimir(retencion_fuente_control,"retencion_fuente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retencion_fuente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("retencion_fuente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(retencion_fuente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retencion_fuente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retencion_fuente_control) {
		//super.actualizarPaginaImprimir(retencion_fuente_control,"retencion_fuente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("retencion_fuente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(retencion_fuente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retencion_fuente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(retencion_fuente_control) {
		//super.actualizarPaginaImprimir(retencion_fuente_control,"retencion_fuente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("retencion_fuente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(retencion_fuente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retencion_fuente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retencion_fuente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(retencion_fuente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(retencion_fuente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(retencion_fuente_control);
			
		this.actualizarPaginaAbrirLink(retencion_fuente_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(retencion_fuente_control) {
		this.actualizarPaginaTablaDatos(retencion_fuente_control);
		this.actualizarPaginaFormulario(retencion_fuente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control);		
		this.actualizarPaginaAreaMantenimiento(retencion_fuente_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(retencion_fuente_control) {
		
		if(retencion_fuente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(retencion_fuente_control);
		}
		
		if(retencion_fuente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(retencion_fuente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(retencion_fuente_control) {
		if(retencion_fuente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("retencion_fuenteReturnGeneral",JSON.stringify(retencion_fuente_control.retencion_fuenteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(retencion_fuente_control) {
		if(retencion_fuente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retencion_fuente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(retencion_fuente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(retencion_fuente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(retencion_fuente_control, mostrar) {
		
		if(mostrar==true) {
			retencion_fuente_funcion1.resaltarRestaurarDivsPagina(false,"retencion_fuente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				retencion_fuente_funcion1.resaltarRestaurarDivMantenimiento(false,"retencion_fuente");
			}			
			
			retencion_fuente_funcion1.mostrarDivMensaje(true,retencion_fuente_control.strAuxiliarMensaje,retencion_fuente_control.strAuxiliarCssMensaje);
		
		} else {
			retencion_fuente_funcion1.mostrarDivMensaje(false,retencion_fuente_control.strAuxiliarMensaje,retencion_fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(retencion_fuente_control) {
		if(retencion_fuente_funcion1.esPaginaForm(retencion_fuente_constante1)==true) {
			window.opener.retencion_fuente_webcontrol1.actualizarPaginaTablaDatos(retencion_fuente_control);
		} else {
			this.actualizarPaginaTablaDatos(retencion_fuente_control);
		}
	}
	
	actualizarPaginaAbrirLink(retencion_fuente_control) {
		retencion_fuente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(retencion_fuente_control.strAuxiliarUrlPagina);
				
		retencion_fuente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(retencion_fuente_control.strAuxiliarTipo,retencion_fuente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(retencion_fuente_control) {
		retencion_fuente_funcion1.resaltarRestaurarDivMensaje(true,retencion_fuente_control.strAuxiliarMensajeAlert,retencion_fuente_control.strAuxiliarCssMensaje);
			
		if(retencion_fuente_funcion1.esPaginaForm(retencion_fuente_constante1)==true) {
			window.opener.retencion_fuente_funcion1.resaltarRestaurarDivMensaje(true,retencion_fuente_control.strAuxiliarMensajeAlert,retencion_fuente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(retencion_fuente_control) {
		this.retencion_fuente_controlInicial=retencion_fuente_control;
			
		if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(retencion_fuente_control.strStyleDivArbol,retencion_fuente_control.strStyleDivContent
																,retencion_fuente_control.strStyleDivOpcionesBanner,retencion_fuente_control.strStyleDivExpandirColapsar
																,retencion_fuente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=retencion_fuente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",retencion_fuente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(retencion_fuente_control) {
		this.actualizarCssBotonesPagina(retencion_fuente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(retencion_fuente_control.tiposReportes,retencion_fuente_control.tiposReporte
															 	,retencion_fuente_control.tiposPaginacion,retencion_fuente_control.tiposAcciones
																,retencion_fuente_control.tiposColumnasSelect,retencion_fuente_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(retencion_fuente_control.tiposRelaciones,retencion_fuente_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(retencion_fuente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(retencion_fuente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(retencion_fuente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(retencion_fuente_control) {
	
		var indexPosition=retencion_fuente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=retencion_fuente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(retencion_fuente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.cargarCombosempresasFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.cargarComboscuenta_ventassFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.cargarComboscuenta_comprassFK(retencion_fuente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(retencion_fuente_control.strRecargarFkTiposNinguno!=null && retencion_fuente_control.strRecargarFkTiposNinguno!='NINGUNO' && retencion_fuente_control.strRecargarFkTiposNinguno!='') {
			
				if(retencion_fuente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTiposNinguno,",")) { 
					retencion_fuente_webcontrol1.cargarCombosempresasFK(retencion_fuente_control);
				}

				if(retencion_fuente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTiposNinguno,",")) { 
					retencion_fuente_webcontrol1.cargarComboscuenta_ventassFK(retencion_fuente_control);
				}

				if(retencion_fuente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTiposNinguno,",")) { 
					retencion_fuente_webcontrol1.cargarComboscuenta_comprassFK(retencion_fuente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(retencion_fuente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_fuente_funcion1,retencion_fuente_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(retencion_fuente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_fuente_funcion1,retencion_fuente_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(retencion_fuente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retencion_fuente_funcion1,retencion_fuente_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(retencion_fuente_control) {
		jQuery("#divBusquedaretencion_fuenteAjaxWebPart").css("display",retencion_fuente_control.strPermisoBusqueda);
		jQuery("#trretencion_fuenteCabeceraBusquedas").css("display",retencion_fuente_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion_fuente").css("display",retencion_fuente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(retencion_fuente_control.htmlTablaOrderBy!=null
			&& retencion_fuente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByretencion_fuenteAjaxWebPart").html(retencion_fuente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//retencion_fuente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(retencion_fuente_control.htmlTablaOrderByRel!=null
			&& retencion_fuente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelretencion_fuenteAjaxWebPart").html(retencion_fuente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(retencion_fuente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaretencion_fuenteAjaxWebPart").css("display","none");
			jQuery("#trretencion_fuenteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaretencion_fuente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(retencion_fuente_control) {
		
		if(!retencion_fuente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(retencion_fuente_control);
		} else {
			jQuery("#divTablaDatosretencion_fuentesAjaxWebPart").html(retencion_fuente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosretencion_fuentes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosretencion_fuentes=jQuery("#tblTablaDatosretencion_fuentes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("retencion_fuente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',retencion_fuente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			retencion_fuente_webcontrol1.registrarControlesTableEdition(retencion_fuente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		retencion_fuente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(retencion_fuente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("retencion_fuente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(retencion_fuente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosretencion_fuentesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(retencion_fuente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(retencion_fuente_control);
		
		const divOrderBy = document.getElementById("divOrderByretencion_fuenteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(retencion_fuente_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelretencion_fuenteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(retencion_fuente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(retencion_fuente_control.retencion_fuenteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(retencion_fuente_control);			
		}
	}
	
	actualizarCamposFilaTabla(retencion_fuente_control) {
		var i=0;
		
		i=retencion_fuente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(retencion_fuente_control.retencion_fuenteActual.id);
		jQuery("#t-version_row_"+i+"").val(retencion_fuente_control.retencion_fuenteActual.versionRow);
		
		if(retencion_fuente_control.retencion_fuenteActual.id_empresa!=null && retencion_fuente_control.retencion_fuenteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != retencion_fuente_control.retencion_fuenteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(retencion_fuente_control.retencion_fuenteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(retencion_fuente_control.retencion_fuenteActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(retencion_fuente_control.retencion_fuenteActual.descripcion);
		jQuery("#t-cel_"+i+"_5").val(retencion_fuente_control.retencion_fuenteActual.valor);
		jQuery("#t-cel_"+i+"_6").val(retencion_fuente_control.retencion_fuenteActual.valor_base);
		jQuery("#t-cel_"+i+"_7").prop('checked',retencion_fuente_control.retencion_fuenteActual.predeterminado);
		
		if(retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas!=null && retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas) {
				jQuery("#t-cel_"+i+"_8").val(retencion_fuente_control.retencion_fuenteActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_8").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras!=null && retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras) {
				jQuery("#t-cel_"+i+"_9").val(retencion_fuente_control.retencion_fuenteActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_9").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(retencion_fuente_control.retencion_fuenteActual.cuenta_contable_ventas);
		jQuery("#t-cel_"+i+"_11").val(retencion_fuente_control.retencion_fuenteActual.cuenta_contable_compras);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(retencion_fuente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosretencion_fuentes").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualretencion_fuente");

			retencion_fuente_webcontrol1.registrarSesionParaproveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatosretencion_fuentes").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualretencion_fuente");

			retencion_fuente_webcontrol1.registrarSesionParaclientes(idActual);
		});				
	}
		
	

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"retencion_fuente","proveedor","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1,"es","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"retencion_fuente","cliente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1,"s","");
	}
	
	registrarControlesTableEdition(retencion_fuente_control) {
		retencion_fuente_funcion1.registrarControlesTableValidacionEdition(retencion_fuente_control,retencion_fuente_webcontrol1,retencion_fuente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(retencion_fuente_control) {
		jQuery("#divResumenretencion_fuenteActualAjaxWebPart").html(retencion_fuente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(retencion_fuente_control) {
		//jQuery("#divAccionesRelacionesretencion_fuenteAjaxWebPart").html(retencion_fuente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("retencion_fuente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(retencion_fuente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesretencion_fuenteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		retencion_fuente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(retencion_fuente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(retencion_fuente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(retencion_fuente_control) {
		
		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_fuente_control.strVisibleFK_Idcuenta_compras);
			jQuery("#tblstrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",retencion_fuente_control.strVisibleFK_Idcuenta_compras);
		}

		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_fuente_control.strVisibleFK_Idcuenta_ventas);
			jQuery("#tblstrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",retencion_fuente_control.strVisibleFK_Idcuenta_ventas);
		}

		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_fuente_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retencion_fuente_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionretencion_fuente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("retencion_fuente",id,"facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		retencion_fuente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_fuente","empresa","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_fuente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_fuente","cuenta","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		retencion_fuente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retencion_fuente","cuenta","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualretencion_fuente");

			retencion_fuente_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualretencion_fuente");

			retencion_fuente_webcontrol1.registrarSesionParaclientes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuenteConstante,strParametros);
		
		//retencion_fuente_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(retencion_fuente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa",retencion_fuente_control.empresasFK);

		if(retencion_fuente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_fuente_control.idFilaTablaActual+"_2",retencion_fuente_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(retencion_fuente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas",retencion_fuente_control.cuenta_ventassFK);

		if(retencion_fuente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_fuente_control.idFilaTablaActual+"_8",retencion_fuente_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",retencion_fuente_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(retencion_fuente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras",retencion_fuente_control.cuenta_comprassFK);

		if(retencion_fuente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retencion_fuente_control.idFilaTablaActual+"_9",retencion_fuente_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",retencion_fuente_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(retencion_fuente_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(retencion_fuente_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(retencion_fuente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(retencion_fuente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_fuente_control.idempresaDefaultFK>-1 && jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val() != retencion_fuente_control.idempresaDefaultFK) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa").val(retencion_fuente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(retencion_fuente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_fuente_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != retencion_fuente_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(retencion_fuente_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(retencion_fuente_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(retencion_fuente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retencion_fuente_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != retencion_fuente_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras").val(retencion_fuente_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(retencion_fuente_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retencion_fuente_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//retencion_fuente_control
		
	
	}
	
	onLoadCombosDefectoFK(retencion_fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.setDefectoValorCombosempresasFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.setDefectoValorComboscuenta_ventassFK(retencion_fuente_control);
			}

			if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTipos,",")) { 
				retencion_fuente_webcontrol1.setDefectoValorComboscuenta_comprassFK(retencion_fuente_control);
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
	onLoadCombosEventosFK(retencion_fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retencion_fuente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_fuente_webcontrol1.registrarComboActionChangeCombosempresasFK(retencion_fuente_control);
			//}

			//if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",retencion_fuente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_fuente_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(retencion_fuente_control);
			//}

			//if(retencion_fuente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",retencion_fuente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retencion_fuente_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(retencion_fuente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(retencion_fuente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retencion_fuente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(retencion_fuente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_fuente","FK_Idcuenta_compras","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_fuente","FK_Idcuenta_ventas","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retencion_fuente","FK_Idempresa","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
		
			
			if(retencion_fuente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("retencion_fuente");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("retencion_fuente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(retencion_fuente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,"retencion_fuente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				retencion_fuente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				retencion_fuente_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retencion_fuente_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				retencion_fuente_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("retencion_fuente");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(retencion_fuente_control) {
		
		jQuery("#divBusquedaretencion_fuenteAjaxWebPart").css("display",retencion_fuente_control.strPermisoBusqueda);
		jQuery("#trretencion_fuenteCabeceraBusquedas").css("display",retencion_fuente_control.strPermisoBusqueda);
		jQuery("#trBusquedaretencion_fuente").css("display",retencion_fuente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteretencion_fuente").css("display",retencion_fuente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosretencion_fuente").attr("style",retencion_fuente_control.strPermisoMostrarTodos);		
		
		if(retencion_fuente_control.strPermisoNuevo!=null) {
			jQuery("#tdretencion_fuenteNuevo").css("display",retencion_fuente_control.strPermisoNuevo);
			jQuery("#tdretencion_fuenteNuevoToolBar").css("display",retencion_fuente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdretencion_fuenteDuplicar").css("display",retencion_fuente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencion_fuenteDuplicarToolBar").css("display",retencion_fuente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretencion_fuenteNuevoGuardarCambios").css("display",retencion_fuente_control.strPermisoNuevo);
			jQuery("#tdretencion_fuenteNuevoGuardarCambiosToolBar").css("display",retencion_fuente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(retencion_fuente_control.strPermisoActualizar!=null) {
			jQuery("#tdretencion_fuenteCopiar").css("display",retencion_fuente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencion_fuenteCopiarToolBar").css("display",retencion_fuente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretencion_fuenteConEditar").css("display",retencion_fuente_control.strPermisoActualizar);
		}
		
		jQuery("#tdretencion_fuenteGuardarCambios").css("display",retencion_fuente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdretencion_fuenteGuardarCambiosToolBar").css("display",retencion_fuente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdretencion_fuenteCerrarPagina").css("display",retencion_fuente_control.strPermisoPopup);		
		jQuery("#tdretencion_fuenteCerrarPaginaToolBar").css("display",retencion_fuente_control.strPermisoPopup);
		//jQuery("#trretencion_fuenteAccionesRelaciones").css("display",retencion_fuente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=retencion_fuente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_fuente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + retencion_fuente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Retencion Fuentees";
		sTituloBanner+=" - " + retencion_fuente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retencion_fuente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdretencion_fuenteRelacionesToolBar").css("display",retencion_fuente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosretencion_fuente").css("display",retencion_fuente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		retencion_fuente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		retencion_fuente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		retencion_fuente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		retencion_fuente_webcontrol1.registrarEventosControles();
		
		if(retencion_fuente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
			retencion_fuente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(retencion_fuente_constante1.STR_ES_RELACIONES=="true") {
			if(retencion_fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				retencion_fuente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(retencion_fuente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(retencion_fuente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				retencion_fuente_webcontrol1.onLoad();
			
			//} else {
				//if(retencion_fuente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			retencion_fuente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("retencion_fuente","facturacion","",retencion_fuente_funcion1,retencion_fuente_webcontrol1,retencion_fuente_constante1);	
	}
}

var retencion_fuente_webcontrol1 = new retencion_fuente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {retencion_fuente_webcontrol,retencion_fuente_webcontrol1};

//Para ser llamado desde window.opener
window.retencion_fuente_webcontrol1 = retencion_fuente_webcontrol1;


if(retencion_fuente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = retencion_fuente_webcontrol1.onLoadWindow; 
}

//</script>