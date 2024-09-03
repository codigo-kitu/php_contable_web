//<script type="text/javascript" language="javascript">



//var cierre_contable_detalleJQueryPaginaWebInteraccion= function (cierre_contable_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {cierre_contable_detalle_constante,cierre_contable_detalle_constante1} from '../util/cierre_contable_detalle_constante.js';

import {cierre_contable_detalle_funcion,cierre_contable_detalle_funcion1} from '../util/cierre_contable_detalle_funcion.js';


class cierre_contable_detalle_webcontrol extends GeneralEntityWebControl {
	
	cierre_contable_detalle_control=null;
	cierre_contable_detalle_controlInicial=null;
	cierre_contable_detalle_controlAuxiliar=null;
		
	//if(cierre_contable_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(cierre_contable_detalle_control) {
		super();
		
		this.cierre_contable_detalle_control=cierre_contable_detalle_control;
	}
		
	actualizarVariablesPagina(cierre_contable_detalle_control) {
		
		if(cierre_contable_detalle_control.action=="index" || cierre_contable_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(cierre_contable_detalle_control);
			
		} 
		
		
		else if(cierre_contable_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(cierre_contable_detalle_control);
			
		} else if(cierre_contable_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(cierre_contable_detalle_control);
			
		} else if(cierre_contable_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(cierre_contable_detalle_control);		
		
		} else if(cierre_contable_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(cierre_contable_detalle_control);
		
		}  else if(cierre_contable_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(cierre_contable_detalle_control);
		
		} else if(cierre_contable_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cierre_contable_detalle_control);		
		
		} else if(cierre_contable_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cierre_contable_detalle_control);		
		
		} else if(cierre_contable_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(cierre_contable_detalle_control);		
		
		} else if(cierre_contable_detalle_control.action.includes("Busqueda") ||
				  cierre_contable_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(cierre_contable_detalle_control);
			
		} else if(cierre_contable_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cierre_contable_detalle_control)
		}
		
		
		
	
		else if(cierre_contable_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(cierre_contable_detalle_control);	
		
		} else if(cierre_contable_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_detalle_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + cierre_contable_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(cierre_contable_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(cierre_contable_detalle_control) {
		this.actualizarPaginaAccionesGenerales(cierre_contable_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(cierre_contable_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cierre_contable_detalle_control);
		this.actualizarPaginaOrderBy(cierre_contable_detalle_control);
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control);
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_detalle_control);
		this.actualizarPaginaAreaBusquedas(cierre_contable_detalle_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(cierre_contable_detalle_control) {
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(cierre_contable_detalle_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(cierre_contable_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(cierre_contable_detalle_control);
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		this.actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control);
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_detalle_control);
		this.actualizarPaginaAreaBusquedas(cierre_contable_detalle_control);
		this.actualizarPaginaCargaCombosFK(cierre_contable_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(cierre_contable_detalle_control) {
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(cierre_contable_detalle_control) {
		this.actualizarPaginaAbrirLink(cierre_contable_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);				
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(cierre_contable_detalle_control) {
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		this.onLoadCombosDefectoFK(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		//this.actualizarPaginaFormulario(cierre_contable_detalle_control);
		this.onLoadCombosDefectoFK(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(cierre_contable_detalle_control) {
		this.actualizarPaginaAbrirLink(cierre_contable_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(cierre_contable_detalle_control) {
		this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(cierre_contable_detalle_control) {
					//super.actualizarPaginaImprimir(cierre_contable_detalle_control,"cierre_contable_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cierre_contable_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("cierre_contable_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cierre_contable_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cierre_contable_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(cierre_contable_detalle_control) {
		//super.actualizarPaginaImprimir(cierre_contable_detalle_control,"cierre_contable_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("cierre_contable_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(cierre_contable_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cierre_contable_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(cierre_contable_detalle_control) {
		//super.actualizarPaginaImprimir(cierre_contable_detalle_control,"cierre_contable_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("cierre_contable_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cierre_contable_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",cierre_contable_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(cierre_contable_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(cierre_contable_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(cierre_contable_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(cierre_contable_detalle_control);
			
		this.actualizarPaginaAbrirLink(cierre_contable_detalle_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(cierre_contable_detalle_control) {
		
		if(cierre_contable_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(cierre_contable_detalle_control);
		}
		
		if(cierre_contable_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(cierre_contable_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(cierre_contable_detalle_control) {
		if(cierre_contable_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("cierre_contable_detalleReturnGeneral",JSON.stringify(cierre_contable_detalle_control.cierre_contable_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(cierre_contable_detalle_control) {
		if(cierre_contable_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && cierre_contable_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(cierre_contable_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(cierre_contable_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(cierre_contable_detalle_control, mostrar) {
		
		if(mostrar==true) {
			cierre_contable_detalle_funcion1.resaltarRestaurarDivsPagina(false,"cierre_contable_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				cierre_contable_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"cierre_contable_detalle");
			}			
			
			cierre_contable_detalle_funcion1.mostrarDivMensaje(true,cierre_contable_detalle_control.strAuxiliarMensaje,cierre_contable_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			cierre_contable_detalle_funcion1.mostrarDivMensaje(false,cierre_contable_detalle_control.strAuxiliarMensaje,cierre_contable_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(cierre_contable_detalle_control) {
		if(cierre_contable_detalle_funcion1.esPaginaForm(cierre_contable_detalle_constante1)==true) {
			window.opener.cierre_contable_detalle_webcontrol1.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(cierre_contable_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(cierre_contable_detalle_control) {
		cierre_contable_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(cierre_contable_detalle_control.strAuxiliarUrlPagina);
				
		cierre_contable_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(cierre_contable_detalle_control.strAuxiliarTipo,cierre_contable_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(cierre_contable_detalle_control) {
		cierre_contable_detalle_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_detalle_control.strAuxiliarMensajeAlert,cierre_contable_detalle_control.strAuxiliarCssMensaje);
			
		if(cierre_contable_detalle_funcion1.esPaginaForm(cierre_contable_detalle_constante1)==true) {
			window.opener.cierre_contable_detalle_funcion1.resaltarRestaurarDivMensaje(true,cierre_contable_detalle_control.strAuxiliarMensajeAlert,cierre_contable_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(cierre_contable_detalle_control) {
		this.cierre_contable_detalle_controlInicial=cierre_contable_detalle_control;
			
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(cierre_contable_detalle_control.strStyleDivArbol,cierre_contable_detalle_control.strStyleDivContent
																,cierre_contable_detalle_control.strStyleDivOpcionesBanner,cierre_contable_detalle_control.strStyleDivExpandirColapsar
																,cierre_contable_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=cierre_contable_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",cierre_contable_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(cierre_contable_detalle_control) {
		this.actualizarCssBotonesPagina(cierre_contable_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(cierre_contable_detalle_control.tiposReportes,cierre_contable_detalle_control.tiposReporte
															 	,cierre_contable_detalle_control.tiposPaginacion,cierre_contable_detalle_control.tiposAcciones
																,cierre_contable_detalle_control.tiposColumnasSelect,cierre_contable_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(cierre_contable_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(cierre_contable_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(cierre_contable_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(cierre_contable_detalle_control) {
	
		var indexPosition=cierre_contable_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=cierre_contable_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(cierre_contable_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(cierre_contable_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTipos,",")) { 
				cierre_contable_detalle_webcontrol1.cargarComboscierre_contablesFK(cierre_contable_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(cierre_contable_detalle_control.strRecargarFkTiposNinguno!=null && cierre_contable_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && cierre_contable_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(cierre_contable_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTiposNinguno,",")) { 
					cierre_contable_detalle_webcontrol1.cargarComboscierre_contablesFK(cierre_contable_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablacierre_contableFK(cierre_contable_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,cierre_contable_detalle_funcion1,cierre_contable_detalle_control.cierre_contablesFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(cierre_contable_detalle_control) {
		jQuery("#divBusquedacierre_contable_detalleAjaxWebPart").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
		jQuery("#trcierre_contable_detalleCabeceraBusquedas").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(cierre_contable_detalle_control.htmlTablaOrderBy!=null
			&& cierre_contable_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycierre_contable_detalleAjaxWebPart").html(cierre_contable_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//cierre_contable_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(cierre_contable_detalle_control.htmlTablaOrderByRel!=null
			&& cierre_contable_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcierre_contable_detalleAjaxWebPart").html(cierre_contable_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacierre_contable_detalleAjaxWebPart").css("display","none");
			jQuery("#trcierre_contable_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacierre_contable_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(cierre_contable_detalle_control) {
		
		if(!cierre_contable_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(cierre_contable_detalle_control);
		} else {
			jQuery("#divTablaDatoscierre_contable_detallesAjaxWebPart").html(cierre_contable_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscierre_contable_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscierre_contable_detalles=jQuery("#tblTablaDatoscierre_contable_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("cierre_contable_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',cierre_contable_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			cierre_contable_detalle_webcontrol1.registrarControlesTableEdition(cierre_contable_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		cierre_contable_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(cierre_contable_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("cierre_contable_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(cierre_contable_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscierre_contable_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(cierre_contable_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(cierre_contable_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderBycierre_contable_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(cierre_contable_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcierre_contable_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(cierre_contable_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(cierre_contable_detalle_control.cierre_contable_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(cierre_contable_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(cierre_contable_detalle_control) {
		var i=0;
		
		i=cierre_contable_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(cierre_contable_detalle_control.cierre_contable_detalleActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id_detalle);
		
		if(cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable!=null && cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable) {
				jQuery("#t-cel_"+i+"_3").val(cierre_contable_detalle_control.cierre_contable_detalleActual.id_cierre_contable).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(cierre_contable_detalle_control.cierre_contable_detalleActual.nro_documento);
		jQuery("#t-cel_"+i+"_5").val(cierre_contable_detalle_control.cierre_contable_detalleActual.tipo_factura);
		jQuery("#t-cel_"+i+"_6").val(cierre_contable_detalle_control.cierre_contable_detalleActual.monto);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(cierre_contable_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(cierre_contable_detalle_control) {
		cierre_contable_detalle_funcion1.registrarControlesTableValidacionEdition(cierre_contable_detalle_control,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(cierre_contable_detalle_control) {
		jQuery("#divResumencierre_contable_detalleActualAjaxWebPart").html(cierre_contable_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(cierre_contable_detalle_control) {
		//jQuery("#divAccionesRelacionescierre_contable_detalleAjaxWebPart").html(cierre_contable_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("cierre_contable_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(cierre_contable_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescierre_contable_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		cierre_contable_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(cierre_contable_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(cierre_contable_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(cierre_contable_detalle_control) {
		
		if(cierre_contable_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable").attr("style",cierre_contable_detalle_control.strVisibleFK_Idcierre_contable);
			jQuery("#tblstrVisible"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable").attr("style",cierre_contable_detalle_control.strVisibleFK_Idcierre_contable);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncierre_contable_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("cierre_contable_detalle",id,"contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);		
	}
	
	

	abrirBusquedaParacierre_contable(strNombreCampoBusqueda){//idActual
		cierre_contable_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("cierre_contable_detalle","cierre_contable","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalleConstante,strParametros);
		
		//cierre_contable_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarComboscierre_contablesFK(cierre_contable_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable",cierre_contable_detalle_control.cierre_contablesFK);

		if(cierre_contable_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+cierre_contable_detalle_control.idFilaTablaActual+"_3",cierre_contable_detalle_control.cierre_contablesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable",cierre_contable_detalle_control.cierre_contablesFK);

	};

	
	
	registrarComboActionChangeComboscierre_contablesFK(cierre_contable_detalle_control) {

	};

	
	
	setDefectoValorComboscierre_contablesFK(cierre_contable_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(cierre_contable_detalle_control.idcierre_contableDefaultFK>-1 && jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val() != cierre_contable_detalle_control.idcierre_contableDefaultFK) {
				jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable").val(cierre_contable_detalle_control.idcierre_contableDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable").val(cierre_contable_detalle_control.idcierre_contableDefaultForeignKey).trigger("change");
			if(jQuery("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+cierre_contable_detalle_constante1.STR_SUFIJO+"FK_Idcierre_contable-cmbid_cierre_contable").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//cierre_contable_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(cierre_contable_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(cierre_contable_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTipos,",")) { 
				cierre_contable_detalle_webcontrol1.setDefectoValorComboscierre_contablesFK(cierre_contable_detalle_control);
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
	onLoadCombosEventosFK(cierre_contable_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(cierre_contable_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cierre_contable",cierre_contable_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				cierre_contable_detalle_webcontrol1.registrarComboActionChangeComboscierre_contablesFK(cierre_contable_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(cierre_contable_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(cierre_contable_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(cierre_contable_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(cierre_contable_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("cierre_contable_detalle","FK_Idcierre_contable","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
		
			
			if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("cierre_contable_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("cierre_contable_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,"cierre_contable_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cierre_contable","id_cierre_contable","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+cierre_contable_detalle_constante1.STR_SUFIJO+"-id_cierre_contable_img_busqueda").click(function(){
				cierre_contable_detalle_webcontrol1.abrirBusquedaParacierre_contable("id_cierre_contable");
				//alert(jQuery('#form-id_cierre_contable_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(cierre_contable_detalle_control) {
		
		jQuery("#divBusquedacierre_contable_detalleAjaxWebPart").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
		jQuery("#trcierre_contable_detalleCabeceraBusquedas").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedacierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecierre_contable_detalle").css("display",cierre_contable_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscierre_contable_detalle").attr("style",cierre_contable_detalle_control.strPermisoMostrarTodos);		
		
		if(cierre_contable_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdcierre_contable_detalleNuevo").css("display",cierre_contable_detalle_control.strPermisoNuevo);
			jQuery("#tdcierre_contable_detalleNuevoToolBar").css("display",cierre_contable_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcierre_contable_detalleDuplicar").css("display",cierre_contable_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcierre_contable_detalleDuplicarToolBar").css("display",cierre_contable_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcierre_contable_detalleNuevoGuardarCambios").css("display",cierre_contable_detalle_control.strPermisoNuevo);
			jQuery("#tdcierre_contable_detalleNuevoGuardarCambiosToolBar").css("display",cierre_contable_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(cierre_contable_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdcierre_contable_detalleCopiar").css("display",cierre_contable_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcierre_contable_detalleCopiarToolBar").css("display",cierre_contable_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcierre_contable_detalleConEditar").css("display",cierre_contable_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdcierre_contable_detalleGuardarCambios").css("display",cierre_contable_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcierre_contable_detalleGuardarCambiosToolBar").css("display",cierre_contable_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcierre_contable_detalleCerrarPagina").css("display",cierre_contable_detalle_control.strPermisoPopup);		
		jQuery("#tdcierre_contable_detalleCerrarPaginaToolBar").css("display",cierre_contable_detalle_control.strPermisoPopup);
		//jQuery("#trcierre_contable_detalleAccionesRelaciones").css("display",cierre_contable_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=cierre_contable_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cierre_contable_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + cierre_contable_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Cierre Detalles";
		sTituloBanner+=" - " + cierre_contable_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + cierre_contable_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcierre_contable_detalleRelacionesToolBar").css("display",cierre_contable_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscierre_contable_detalle").css("display",cierre_contable_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		cierre_contable_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		cierre_contable_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		cierre_contable_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		cierre_contable_detalle_webcontrol1.registrarEventosControles();
		
		if(cierre_contable_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
			cierre_contable_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(cierre_contable_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				cierre_contable_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(cierre_contable_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				cierre_contable_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(cierre_contable_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			cierre_contable_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("cierre_contable_detalle","contabilidad","",cierre_contable_detalle_funcion1,cierre_contable_detalle_webcontrol1,cierre_contable_detalle_constante1);	
	}
}

var cierre_contable_detalle_webcontrol1 = new cierre_contable_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {cierre_contable_detalle_webcontrol,cierre_contable_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.cierre_contable_detalle_webcontrol1 = cierre_contable_detalle_webcontrol1;


if(cierre_contable_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = cierre_contable_detalle_webcontrol1.onLoadWindow; 
}

//</script>