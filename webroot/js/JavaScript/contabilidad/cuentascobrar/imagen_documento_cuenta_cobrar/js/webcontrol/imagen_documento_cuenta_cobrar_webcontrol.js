//<script type="text/javascript" language="javascript">



//var imagen_documento_cuenta_cobrarJQueryPaginaWebInteraccion= function (imagen_documento_cuenta_cobrar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {imagen_documento_cuenta_cobrar_constante,imagen_documento_cuenta_cobrar_constante1} from '../util/imagen_documento_cuenta_cobrar_constante.js';

import {imagen_documento_cuenta_cobrar_funcion,imagen_documento_cuenta_cobrar_funcion1} from '../util/imagen_documento_cuenta_cobrar_funcion.js';


class imagen_documento_cuenta_cobrar_webcontrol extends GeneralEntityWebControl {
	
	imagen_documento_cuenta_cobrar_control=null;
	imagen_documento_cuenta_cobrar_controlInicial=null;
	imagen_documento_cuenta_cobrar_controlAuxiliar=null;
		
	//if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(imagen_documento_cuenta_cobrar_control) {
		super();
		
		this.imagen_documento_cuenta_cobrar_control=imagen_documento_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(imagen_documento_cuenta_cobrar_control) {
		
		if(imagen_documento_cuenta_cobrar_control.action=="index" || imagen_documento_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(imagen_documento_cuenta_cobrar_control);
			
		} 
		
		
		else if(imagen_documento_cuenta_cobrar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(imagen_documento_cuenta_cobrar_control);
			
		} else if(imagen_documento_cuenta_cobrar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(imagen_documento_cuenta_cobrar_control);
			
		} else if(imagen_documento_cuenta_cobrar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_documento_cuenta_cobrar_control);		
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(imagen_documento_cuenta_cobrar_control);
		
		}  else if(imagen_documento_cuenta_cobrar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_documento_cuenta_cobrar_control);
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_documento_cuenta_cobrar_control);		
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_documento_cuenta_cobrar_control);		
		
		} else if(imagen_documento_cuenta_cobrar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_documento_cuenta_cobrar_control);		
		
		} else if(imagen_documento_cuenta_cobrar_control.action.includes("Busqueda") ||
				  imagen_documento_cuenta_cobrar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(imagen_documento_cuenta_cobrar_control);
			
		} else if(imagen_documento_cuenta_cobrar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_documento_cuenta_cobrar_control)
		}
		
		
		
	
		else if(imagen_documento_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(imagen_documento_cuenta_cobrar_control);	
		
		} else if(imagen_documento_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_documento_cuenta_cobrar_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + imagen_documento_cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(imagen_documento_cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(imagen_documento_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(imagen_documento_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(imagen_documento_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(imagen_documento_cuenta_cobrar_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(imagen_documento_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(imagen_documento_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);				
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(imagen_documento_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(imagen_documento_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(imagen_documento_cuenta_cobrar_control) {
					//super.actualizarPaginaImprimir(imagen_documento_cuenta_cobrar_control,"imagen_documento_cuenta_cobrar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_documento_cuenta_cobrar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("imagen_documento_cuenta_cobrar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_documento_cuenta_cobrar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(imagen_documento_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(imagen_documento_cuenta_cobrar_control,"imagen_documento_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("imagen_documento_cuenta_cobrar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(imagen_documento_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_documento_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(imagen_documento_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(imagen_documento_cuenta_cobrar_control,"imagen_documento_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("imagen_documento_cuenta_cobrar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_documento_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",imagen_documento_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(imagen_documento_cuenta_cobrar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(imagen_documento_cuenta_cobrar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(imagen_documento_cuenta_cobrar_control);
			
		this.actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(imagen_documento_cuenta_cobrar_control) {
		
		if(imagen_documento_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(imagen_documento_cuenta_cobrar_control);
		}
		
		if(imagen_documento_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(imagen_documento_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(imagen_documento_cuenta_cobrar_control) {
		if(imagen_documento_cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("imagen_documento_cuenta_cobrarReturnGeneral",JSON.stringify(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(imagen_documento_cuenta_cobrar_control) {
		if(imagen_documento_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && imagen_documento_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(imagen_documento_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(imagen_documento_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"imagen_documento_cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"imagen_documento_cuenta_cobrar");
			}			
			
			imagen_documento_cuenta_cobrar_funcion1.mostrarDivMensaje(true,imagen_documento_cuenta_cobrar_control.strAuxiliarMensaje,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			imagen_documento_cuenta_cobrar_funcion1.mostrarDivMensaje(false,imagen_documento_cuenta_cobrar_control.strAuxiliarMensaje,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(imagen_documento_cuenta_cobrar_control) {
		if(imagen_documento_cuenta_cobrar_funcion1.esPaginaForm(imagen_documento_cuenta_cobrar_constante1)==true) {
			window.opener.imagen_documento_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(imagen_documento_cuenta_cobrar_control) {
		imagen_documento_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(imagen_documento_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		imagen_documento_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(imagen_documento_cuenta_cobrar_control.strAuxiliarTipo,imagen_documento_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(imagen_documento_cuenta_cobrar_control) {
		imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,imagen_documento_cuenta_cobrar_control.strAuxiliarMensajeAlert,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(imagen_documento_cuenta_cobrar_funcion1.esPaginaForm(imagen_documento_cuenta_cobrar_constante1)==true) {
			window.opener.imagen_documento_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,imagen_documento_cuenta_cobrar_control.strAuxiliarMensajeAlert,imagen_documento_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(imagen_documento_cuenta_cobrar_control) {
		this.imagen_documento_cuenta_cobrar_controlInicial=imagen_documento_cuenta_cobrar_control;
			
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(imagen_documento_cuenta_cobrar_control.strStyleDivArbol,imagen_documento_cuenta_cobrar_control.strStyleDivContent
																,imagen_documento_cuenta_cobrar_control.strStyleDivOpcionesBanner,imagen_documento_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,imagen_documento_cuenta_cobrar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=imagen_documento_cuenta_cobrar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",imagen_documento_cuenta_cobrar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(imagen_documento_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(imagen_documento_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(imagen_documento_cuenta_cobrar_control.tiposReportes,imagen_documento_cuenta_cobrar_control.tiposReporte
															 	,imagen_documento_cuenta_cobrar_control.tiposPaginacion,imagen_documento_cuenta_cobrar_control.tiposAcciones
																,imagen_documento_cuenta_cobrar_control.tiposColumnasSelect,imagen_documento_cuenta_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(imagen_documento_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(imagen_documento_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(imagen_documento_cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(imagen_documento_cuenta_cobrar_control) {
	
		var indexPosition=imagen_documento_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=imagen_documento_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(imagen_documento_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(imagen_documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				imagen_documento_cuenta_cobrar_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					imagen_documento_cuenta_cobrar_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTabladocumento_cuenta_cobrarFK(imagen_documento_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(imagen_documento_cuenta_cobrar_control) {
		jQuery("#divBusquedaimagen_documento_cuenta_cobrarAjaxWebPart").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trimagen_documento_cuenta_cobrarCabeceraBusquedas").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(imagen_documento_cuenta_cobrar_control.htmlTablaOrderBy!=null
			&& imagen_documento_cuenta_cobrar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByimagen_documento_cuenta_cobrarAjaxWebPart").html(imagen_documento_cuenta_cobrar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//imagen_documento_cuenta_cobrar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(imagen_documento_cuenta_cobrar_control.htmlTablaOrderByRel!=null
			&& imagen_documento_cuenta_cobrar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelimagen_documento_cuenta_cobrarAjaxWebPart").html(imagen_documento_cuenta_cobrar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaimagen_documento_cuenta_cobrarAjaxWebPart").css("display","none");
			jQuery("#trimagen_documento_cuenta_cobrarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaimagen_documento_cuenta_cobrar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(imagen_documento_cuenta_cobrar_control) {
		
		if(!imagen_documento_cuenta_cobrar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(imagen_documento_cuenta_cobrar_control);
		} else {
			jQuery("#divTablaDatosimagen_documento_cuenta_cobrarsAjaxWebPart").html(imagen_documento_cuenta_cobrar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosimagen_documento_cuenta_cobrars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosimagen_documento_cuenta_cobrars=jQuery("#tblTablaDatosimagen_documento_cuenta_cobrars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("imagen_documento_cuenta_cobrar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',imagen_documento_cuenta_cobrar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			imagen_documento_cuenta_cobrar_webcontrol1.registrarControlesTableEdition(imagen_documento_cuenta_cobrar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		imagen_documento_cuenta_cobrar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(imagen_documento_cuenta_cobrar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("imagen_documento_cuenta_cobrar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(imagen_documento_cuenta_cobrar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosimagen_documento_cuenta_cobrarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(imagen_documento_cuenta_cobrar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(imagen_documento_cuenta_cobrar_control);
		
		const divOrderBy = document.getElementById("divOrderByimagen_documento_cuenta_cobrarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(imagen_documento_cuenta_cobrar_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelimagen_documento_cuenta_cobrarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(imagen_documento_cuenta_cobrar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(imagen_documento_cuenta_cobrar_control);			
		}
	}
	
	actualizarCamposFilaTabla(imagen_documento_cuenta_cobrar_control) {
		var i=0;
		
		i=imagen_documento_cuenta_cobrar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id);
		jQuery("#t-version_row_"+i+"").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_imagen);
		jQuery("#t-cel_"+i+"_4").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.imagen);
		
		if(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar!=null && imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_5").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(imagen_documento_cuenta_cobrar_control.imagen_documento_cuenta_cobrarActual.nro_documento);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(imagen_documento_cuenta_cobrar_control) {
		imagen_documento_cuenta_cobrar_funcion1.registrarControlesTableValidacionEdition(imagen_documento_cuenta_cobrar_control,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(imagen_documento_cuenta_cobrar_control) {
		jQuery("#divResumenimagen_documento_cuenta_cobrarActualAjaxWebPart").html(imagen_documento_cuenta_cobrar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(imagen_documento_cuenta_cobrar_control) {
		//jQuery("#divAccionesRelacionesimagen_documento_cuenta_cobrarAjaxWebPart").html(imagen_documento_cuenta_cobrar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("imagen_documento_cuenta_cobrar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(imagen_documento_cuenta_cobrar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesimagen_documento_cuenta_cobrarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		imagen_documento_cuenta_cobrar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(imagen_documento_cuenta_cobrar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(imagen_documento_cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(imagen_documento_cuenta_cobrar_control) {
		
		if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",imagen_documento_cuenta_cobrar_control.strVisibleFK_Iddocumento_cuenta_cobrar);
			jQuery("#tblstrVisible"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",imagen_documento_cuenta_cobrar_control.strVisibleFK_Iddocumento_cuenta_cobrar);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionimagen_documento_cuenta_cobrar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("imagen_documento_cuenta_cobrar",id,"cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);		
	}
	
	

	abrirBusquedaParadocumento_cuenta_cobrar(strNombreCampoBusqueda){//idActual
		imagen_documento_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("imagen_documento_cuenta_cobrar","documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrarConstante,strParametros);
		
		//imagen_documento_cuenta_cobrar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);

		if(imagen_documento_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+imagen_documento_cuenta_cobrar_control.idFilaTablaActual+"_5",imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.documento_cuenta_cobrarsFK);

	};

	
	
	registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultFK>-1 && jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultFK) {
				jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(imagen_documento_cuenta_cobrar_control.iddocumento_cuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//imagen_documento_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(imagen_documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(imagen_documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				imagen_documento_cuenta_cobrar_webcontrol1.setDefectoValorCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(imagen_documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(imagen_documento_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",imagen_documento_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				imagen_documento_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(imagen_documento_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(imagen_documento_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(imagen_documento_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(imagen_documento_cuenta_cobrar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("imagen_documento_cuenta_cobrar","FK_Iddocumento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
		
			
			if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("imagen_documento_cuenta_cobrar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("imagen_documento_cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,"imagen_documento_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_cobrar","id_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+imagen_documento_cuenta_cobrar_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar_img_busqueda").click(function(){
				imagen_documento_cuenta_cobrar_webcontrol1.abrirBusquedaParadocumento_cuenta_cobrar("id_documento_cuenta_cobrar");
				//alert(jQuery('#form-id_documento_cuenta_cobrar_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(imagen_documento_cuenta_cobrar_control) {
		
		jQuery("#divBusquedaimagen_documento_cuenta_cobrarAjaxWebPart").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trimagen_documento_cuenta_cobrarCabeceraBusquedas").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedaimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosimagen_documento_cuenta_cobrar").attr("style",imagen_documento_cuenta_cobrar_control.strPermisoMostrarTodos);		
		
		if(imagen_documento_cuenta_cobrar_control.strPermisoNuevo!=null) {
			jQuery("#tdimagen_documento_cuenta_cobrarNuevo").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdimagen_documento_cuenta_cobrarNuevoToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdimagen_documento_cuenta_cobrarDuplicar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_cobrarDuplicarToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_cobrarNuevoGuardarCambios").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdimagen_documento_cuenta_cobrarNuevoGuardarCambiosToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(imagen_documento_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdimagen_documento_cuenta_cobrarCopiar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_cobrarCopiarToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdimagen_documento_cuenta_cobrarConEditar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoActualizar);
		}
		
		jQuery("#tdimagen_documento_cuenta_cobrarGuardarCambios").css("display",imagen_documento_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdimagen_documento_cuenta_cobrarGuardarCambiosToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdimagen_documento_cuenta_cobrarCerrarPagina").css("display",imagen_documento_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tdimagen_documento_cuenta_cobrarCerrarPaginaToolBar").css("display",imagen_documento_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trimagen_documento_cuenta_cobrarAccionesRelaciones").css("display",imagen_documento_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=imagen_documento_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_documento_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + imagen_documento_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Imagenes Documentos Cuentas por Cobrares";
		sTituloBanner+=" - " + imagen_documento_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + imagen_documento_cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdimagen_documento_cuenta_cobrarRelacionesToolBar").css("display",imagen_documento_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosimagen_documento_cuenta_cobrar").css("display",imagen_documento_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		imagen_documento_cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		imagen_documento_cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		imagen_documento_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		imagen_documento_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			imagen_documento_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				imagen_documento_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(imagen_documento_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				imagen_documento_cuenta_cobrar_webcontrol1.onLoad();
			
			//} else {
				//if(imagen_documento_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			imagen_documento_cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("imagen_documento_cuenta_cobrar","cuentascobrar","",imagen_documento_cuenta_cobrar_funcion1,imagen_documento_cuenta_cobrar_webcontrol1,imagen_documento_cuenta_cobrar_constante1);	
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

var imagen_documento_cuenta_cobrar_webcontrol1 = new imagen_documento_cuenta_cobrar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {imagen_documento_cuenta_cobrar_webcontrol,imagen_documento_cuenta_cobrar_webcontrol1};

//Para ser llamado desde window.opener
window.imagen_documento_cuenta_cobrar_webcontrol1 = imagen_documento_cuenta_cobrar_webcontrol1;


if(imagen_documento_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = imagen_documento_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>