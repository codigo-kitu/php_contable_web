//<script type="text/javascript" language="javascript">



//var imagen_documento_cuenta_pagarJQueryPaginaWebInteraccion= function (imagen_documento_cuenta_pagar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_documento_cuenta_pagar_constante,imagen_documento_cuenta_pagar_constante1} from '../util/imagen_documento_cuenta_pagar_constante.js';

import {imagen_documento_cuenta_pagar_funcion,imagen_documento_cuenta_pagar_funcion1} from '../util/imagen_documento_cuenta_pagar_funcion.js';


class imagen_documento_cuenta_pagar_webcontrol extends GeneralEntityWebControl {
	
	imagen_documento_cuenta_pagar_control=null;
	imagen_documento_cuenta_pagar_controlInicial=null;
	imagen_documento_cuenta_pagar_controlAuxiliar=null;
		
	//if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_documento_cuenta_pagar_control) {
		super();
		
		this.imagen_documento_cuenta_pagar_control=imagen_documento_cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(imagen_documento_cuenta_pagar_control) {
		
		if(imagen_documento_cuenta_pagar_control.action=="index" || imagen_documento_cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_documento_cuenta_pagar_control);
			
		} 
		
		
		else if(imagen_documento_cuenta_pagar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_documento_cuenta_pagar_control);
			
		} else if(imagen_documento_cuenta_pagar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_documento_cuenta_pagar_control);
			
		} else if(imagen_documento_cuenta_pagar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_documento_cuenta_pagar_control);		
		
		} else if(imagen_documento_cuenta_pagar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_documento_cuenta_pagar_control);
		
		}  else if(imagen_documento_cuenta_pagar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_documento_cuenta_pagar_control);
		
		} else if(imagen_documento_cuenta_pagar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_documento_cuenta_pagar_control);		
		
		} else if(imagen_documento_cuenta_pagar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_documento_cuenta_pagar_control);		
		
		} else if(imagen_documento_cuenta_pagar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_documento_cuenta_pagar_control);		
		
		} else if(imagen_documento_cuenta_pagar_control.action.includes("Busqueda") ||
				  imagen_documento_cuenta_pagar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_documento_cuenta_pagar_control);
			
		} else if(imagen_documento_cuenta_pagar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_documento_cuenta_pagar_control)
		}
		
		
		
	
		else if(imagen_documento_cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_documento_cuenta_pagar_control);	
		
		} else if(imagen_documento_cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_documento_cuenta_pagar_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_documento_cuenta_pagar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_documento_cuenta_pagar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaAccionesGenerales(imagen_documento_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_documento_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaOrderBy(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_documento_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_documento_cuenta_pagar_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_documento_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_documento_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);				
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_documento_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_documento_cuenta_pagar_control) {
					//super.actualizarPaginaImprimir(imagen_documento_cuenta_pagar_control,"imagen_documento_cuenta_pagar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_documento_cuenta_pagar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_documento_cuenta_pagar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_documento_cuenta_pagar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_pagar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_documento_cuenta_pagar_control) {
		//super.actualizarPaginaImprimir(imagen_documento_cuenta_pagar_control,"imagen_documento_cuenta_pagar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_documento_cuenta_pagar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_documento_cuenta_pagar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_documento_cuenta_pagar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_documento_cuenta_pagar_control) {
		//super.actualizarPaginaImprimir(imagen_documento_cuenta_pagar_control,"imagen_documento_cuenta_pagar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_documento_cuenta_pagar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_documento_cuenta_pagar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_documento_cuenta_pagar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_pagar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_documento_cuenta_pagar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_documento_cuenta_pagar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_documento_cuenta_pagar_control);
			
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_pagar_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_documento_cuenta_pagar_control) {
		
		if(imagen_documento_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_documento_cuenta_pagar_control);
		}
		
		if(imagen_documento_cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_documento_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_documento_cuenta_pagar_control) {
		if(imagen_documento_cuenta_pagar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_documento_cuenta_pagarReturnGeneral",JSON.stringify(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_pagar_control) {
		if(imagen_documento_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_documento_cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_documento_cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			imagen_documento_cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false,"imagen_documento_cuenta_pagar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_documento_cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_documento_cuenta_pagar");
			}			
			
			imagen_documento_cuenta_pagar_funcion1.mostrarDivMensaje(true,imagen_documento_cuenta_pagar_control.strAuxiliarMensaje,imagen_documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_documento_cuenta_pagar_funcion1.mostrarDivMensaje(false,imagen_documento_cuenta_pagar_control.strAuxiliarMensaje,imagen_documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_pagar_control) {
		if(imagen_documento_cuenta_pagar_funcion1.esPaginaForm(imagen_documento_cuenta_pagar_constante1)==true) {
			window.opener.imagen_documento_cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_documento_cuenta_pagar_control) {
		imagen_documento_cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_documento_cuenta_pagar_control.strAuxiliarUrlPagina);
				
		imagen_documento_cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_documento_cuenta_pagar_control.strAuxiliarTipo,imagen_documento_cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_documento_cuenta_pagar_control) {
		imagen_documento_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,imagen_documento_cuenta_pagar_control.strAuxiliarMensajeAlert,imagen_documento_cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(imagen_documento_cuenta_pagar_funcion1.esPaginaForm(imagen_documento_cuenta_pagar_constante1)==true) {
			window.opener.imagen_documento_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,imagen_documento_cuenta_pagar_control.strAuxiliarMensajeAlert,imagen_documento_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_documento_cuenta_pagar_control) {
		this.imagen_documento_cuenta_pagar_controlInicial=imagen_documento_cuenta_pagar_control;
			
		if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_documento_cuenta_pagar_control.strStyleDivArbol,imagen_documento_cuenta_pagar_control.strStyleDivContent
																,imagen_documento_cuenta_pagar_control.strStyleDivOpcionesBanner,imagen_documento_cuenta_pagar_control.strStyleDivExpandirColapsar
																,imagen_documento_cuenta_pagar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_documento_cuenta_pagar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_documento_cuenta_pagar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(imagen_documento_cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_documento_cuenta_pagar_control.tiposReportes,imagen_documento_cuenta_pagar_control.tiposReporte
															 	,imagen_documento_cuenta_pagar_control.tiposPaginacion,imagen_documento_cuenta_pagar_control.tiposAcciones
																,imagen_documento_cuenta_pagar_control.tiposColumnasSelect,imagen_documento_cuenta_pagar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_documento_cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_documento_cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_documento_cuenta_pagar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_documento_cuenta_pagar_control) {
	
		var indexPosition=imagen_documento_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_documento_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_documento_cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				imagen_documento_cuenta_pagar_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_documento_cuenta_pagar_control.strRecargarFkTiposNinguno!=null && imagen_documento_cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_documento_cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_documento_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					imagen_documento_cuenta_pagar_webcontrol1.cargarCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTabladocumento_cuenta_pagarFK(imagen_documento_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_control.documento_cuenta_pagarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_documento_cuenta_pagar_control) {
		jQuery("#divBusquedaimagen_documento_cuenta_pagarAjaxWebPart").css("display",imagen_documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trimagen_documento_cuenta_pagarCabeceraBusquedas").css("display",imagen_documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_documento_cuenta_pagar").css("display",imagen_documento_cuenta_pagar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_documento_cuenta_pagar_control.htmlTablaOrderBy!=null
			&& imagen_documento_cuenta_pagar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_documento_cuenta_pagarAjaxWebPart").html(imagen_documento_cuenta_pagar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_documento_cuenta_pagar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_documento_cuenta_pagar_control.htmlTablaOrderByRel!=null
			&& imagen_documento_cuenta_pagar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_documento_cuenta_pagarAjaxWebPart").html(imagen_documento_cuenta_pagar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_documento_cuenta_pagarAjaxWebPart").css("display","none");
			jQuery("#trimagen_documento_cuenta_pagarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_documento_cuenta_pagar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_documento_cuenta_pagar_control) {
		
		if(!imagen_documento_cuenta_pagar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_documento_cuenta_pagar_control);
		} else {
			jQuery("#divTablaDatosimagen_documento_cuenta_pagarsAjaxWebPart").html(imagen_documento_cuenta_pagar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_documento_cuenta_pagars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_documento_cuenta_pagars=jQuery("#tblTablaDatosimagen_documento_cuenta_pagars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_documento_cuenta_pagar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_documento_cuenta_pagar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_documento_cuenta_pagar_webcontrol1.registrarControlesTableEdition(imagen_documento_cuenta_pagar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_documento_cuenta_pagar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_documento_cuenta_pagar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_documento_cuenta_pagar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_documento_cuenta_pagar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_documento_cuenta_pagarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_documento_cuenta_pagar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_documento_cuenta_pagar_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_documento_cuenta_pagarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_documento_cuenta_pagar_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_documento_cuenta_pagarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_documento_cuenta_pagar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_documento_cuenta_pagar_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_documento_cuenta_pagar_control) {
		var i=0;
		
		i=imagen_documento_cuenta_pagar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.imagen);
		
		if(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.id_documento_cuenta_pagar!=null && imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.id_documento_cuenta_pagar>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.id_documento_cuenta_pagar) {
				jQuery("#t-cel_"+i+"_3").val(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.id_documento_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(imagen_documento_cuenta_pagar_control.imagen_documento_cuenta_pagarActual.nro_documento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_documento_cuenta_pagar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_documento_cuenta_pagar_control) {
		imagen_documento_cuenta_pagar_funcion1.registrarControlesTableValidacionEdition(imagen_documento_cuenta_pagar_control,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_documento_cuenta_pagar_control) {
		jQuery("#divResumenimagen_documento_cuenta_pagarActualAjaxWebPart").html(imagen_documento_cuenta_pagar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_documento_cuenta_pagar_control) {
		//jQuery("#divAccionesRelacionesimagen_documento_cuenta_pagarAjaxWebPart").html(imagen_documento_cuenta_pagar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_documento_cuenta_pagar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_documento_cuenta_pagar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_documento_cuenta_pagarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_documento_cuenta_pagar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_pagar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_documento_cuenta_pagar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_documento_cuenta_pagar_control) {
		
		if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar").attr("style",imagen_documento_cuenta_pagar_control.strVisibleFK_Iddocumento_cuenta_pagar);
			jQuery("#tblstrVisible"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar").attr("style",imagen_documento_cuenta_pagar_control.strVisibleFK_Iddocumento_cuenta_pagar);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_documento_cuenta_pagar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_documento_cuenta_pagar",id,"cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);		
	}
	
	

	abrirBusquedaParadocumento_cuenta_pagar(strNombreCampoBusqueda){//idActual
		imagen_documento_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_documento_cuenta_pagar","documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagarConstante,strParametros);
		
		//imagen_documento_cuenta_pagar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.documento_cuenta_pagarsFK);

		if(imagen_documento_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_documento_cuenta_pagar_control.idFilaTablaActual+"_3",imagen_documento_cuenta_pagar_control.documento_cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.documento_cuenta_pagarsFK);

	};

	
	
	registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_documento_cuenta_pagar_control.iddocumento_cuenta_pagarDefaultFK>-1 && jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val() != imagen_documento_cuenta_pagar_control.iddocumento_cuenta_pagarDefaultFK) {
				jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar").val(imagen_documento_cuenta_pagar_control.iddocumento_cuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(imagen_documento_cuenta_pagar_control.iddocumento_cuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_pagar-cmbid_documento_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_documento_cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				imagen_documento_cuenta_pagar_webcontrol1.setDefectoValorCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control);
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
	onLoadCombosEventosFK(imagen_documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_documento_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_pagar",imagen_documento_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_documento_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_pagarsFK(imagen_documento_cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_documento_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_documento_cuenta_pagar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_documento_cuenta_pagar","FK_Iddocumento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
		
			
			if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_documento_cuenta_pagar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_documento_cuenta_pagar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,"imagen_documento_cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_pagar","id_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_documento_cuenta_pagar_constante1.STR_SUFIJO+"-id_documento_cuenta_pagar_img_busqueda").click(function(){
				imagen_documento_cuenta_pagar_webcontrol1.abrirBusquedaParadocumento_cuenta_pagar("id_documento_cuenta_pagar");
				//alert(jQuery('#form-id_documento_cuenta_pagar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_documento_cuenta_pagar_control) {
		
		jQuery("#divBusquedaimagen_documento_cuenta_pagarAjaxWebPart").css("display",imagen_documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trimagen_documento_cuenta_pagarCabeceraBusquedas").css("display",imagen_documento_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_documento_cuenta_pagar").css("display",imagen_documento_cuenta_pagar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_documento_cuenta_pagar").css("display",imagen_documento_cuenta_pagar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_documento_cuenta_pagar").attr("style",imagen_documento_cuenta_pagar_control.strPermisoMostrarTodos);		
		
		if(imagen_documento_cuenta_pagar_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_documento_cuenta_pagarNuevo").css("display",imagen_documento_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tdimagen_documento_cuenta_pagarNuevoToolBar").css("display",imagen_documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_documento_cuenta_pagarDuplicar").css("display",imagen_documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_pagarDuplicarToolBar").css("display",imagen_documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_pagarNuevoGuardarCambios").css("display",imagen_documento_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tdimagen_documento_cuenta_pagarNuevoGuardarCambiosToolBar").css("display",imagen_documento_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_documento_cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_documento_cuenta_pagarCopiar").css("display",imagen_documento_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_pagarCopiarToolBar").css("display",imagen_documento_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_pagarConEditar").css("display",imagen_documento_cuenta_pagar_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_documento_cuenta_pagarGuardarCambios").css("display",imagen_documento_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_documento_cuenta_pagarGuardarCambiosToolBar").css("display",imagen_documento_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_documento_cuenta_pagarCerrarPagina").css("display",imagen_documento_cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tdimagen_documento_cuenta_pagarCerrarPaginaToolBar").css("display",imagen_documento_cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trimagen_documento_cuenta_pagarAccionesRelaciones").css("display",imagen_documento_cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_documento_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_documento_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_documento_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Documentos Cuentas por Pagares";
		sTituloBanner+=" - " + imagen_documento_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_documento_cuenta_pagar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_documento_cuenta_pagarRelacionesToolBar").css("display",imagen_documento_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_documento_cuenta_pagar").css("display",imagen_documento_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_documento_cuenta_pagar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_documento_cuenta_pagar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_documento_cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_documento_cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			imagen_documento_cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_documento_cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_documento_cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_documento_cuenta_pagar_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_documento_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_documento_cuenta_pagar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_documento_cuenta_pagar","cuentaspagar","",imagen_documento_cuenta_pagar_funcion1,imagen_documento_cuenta_pagar_webcontrol1,imagen_documento_cuenta_pagar_constante1);	
	}
}

var imagen_documento_cuenta_pagar_webcontrol1 = new imagen_documento_cuenta_pagar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_documento_cuenta_pagar_webcontrol,imagen_documento_cuenta_pagar_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_documento_cuenta_pagar_webcontrol1 = imagen_documento_cuenta_pagar_webcontrol1;


if(imagen_documento_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_documento_cuenta_pagar_webcontrol1.onLoadWindow; 
}

//</script>