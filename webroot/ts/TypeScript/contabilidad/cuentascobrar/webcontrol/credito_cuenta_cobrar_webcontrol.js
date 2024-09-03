//<script type="text/javascript" language="javascript">



//var credito_cuenta_cobrarJQueryPaginaWebInteraccion= function (credito_cuenta_cobrar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {credito_cuenta_cobrar_constante,credito_cuenta_cobrar_constante1} from '../util/credito_cuenta_cobrar_constante.js';

import {credito_cuenta_cobrar_funcion,credito_cuenta_cobrar_funcion1} from '../util/credito_cuenta_cobrar_funcion.js';


class credito_cuenta_cobrar_webcontrol extends GeneralEntityWebControl {
	
	credito_cuenta_cobrar_control=null;
	credito_cuenta_cobrar_controlInicial=null;
	credito_cuenta_cobrar_controlAuxiliar=null;
		
	//if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(credito_cuenta_cobrar_control) {
		super();
		
		this.credito_cuenta_cobrar_control=credito_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(credito_cuenta_cobrar_control) {
		
		if(credito_cuenta_cobrar_control.action=="index" || credito_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(credito_cuenta_cobrar_control);
			
		} 
		
		
		else if(credito_cuenta_cobrar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(credito_cuenta_cobrar_control);
			
		} else if(credito_cuenta_cobrar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(credito_cuenta_cobrar_control);
			
		} else if(credito_cuenta_cobrar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(credito_cuenta_cobrar_control);		
		
		} else if(credito_cuenta_cobrar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(credito_cuenta_cobrar_control);
		
		}  else if(credito_cuenta_cobrar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(credito_cuenta_cobrar_control);
		
		} else if(credito_cuenta_cobrar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(credito_cuenta_cobrar_control);		
		
		} else if(credito_cuenta_cobrar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(credito_cuenta_cobrar_control);		
		
		} else if(credito_cuenta_cobrar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(credito_cuenta_cobrar_control);		
		
		} else if(credito_cuenta_cobrar_control.action.includes("Busqueda") ||
				  credito_cuenta_cobrar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(credito_cuenta_cobrar_control);
			
		} else if(credito_cuenta_cobrar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(credito_cuenta_cobrar_control)
		}
		
		
		
	
		else if(credito_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(credito_cuenta_cobrar_control);	
		
		} else if(credito_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(credito_cuenta_cobrar_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + credito_cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(credito_cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(credito_cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(credito_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(credito_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(credito_cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(credito_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(credito_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(credito_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(credito_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(credito_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(credito_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(credito_cuenta_cobrar_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(credito_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(credito_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(credito_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(credito_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(credito_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(credito_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(credito_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(credito_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(credito_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);				
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(credito_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(credito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(credito_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(credito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(credito_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(credito_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(credito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(credito_cuenta_cobrar_control) {
					//super.actualizarPaginaImprimir(credito_cuenta_cobrar_control,"credito_cuenta_cobrar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",credito_cuenta_cobrar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("credito_cuenta_cobrar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(credito_cuenta_cobrar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(credito_cuenta_cobrar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(credito_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(credito_cuenta_cobrar_control,"credito_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("credito_cuenta_cobrar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(credito_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",credito_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(credito_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(credito_cuenta_cobrar_control,"credito_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("credito_cuenta_cobrar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(credito_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",credito_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(credito_cuenta_cobrar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(credito_cuenta_cobrar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(credito_cuenta_cobrar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(credito_cuenta_cobrar_control);
			
		this.actualizarPaginaAbrirLink(credito_cuenta_cobrar_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(credito_cuenta_cobrar_control) {
		
		if(credito_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(credito_cuenta_cobrar_control);
		}
		
		if(credito_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(credito_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(credito_cuenta_cobrar_control) {
		if(credito_cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("credito_cuenta_cobrarReturnGeneral",JSON.stringify(credito_cuenta_cobrar_control.credito_cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(credito_cuenta_cobrar_control) {
		if(credito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && credito_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(credito_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(credito_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(credito_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			credito_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"credito_cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				credito_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"credito_cuenta_cobrar");
			}			
			
			credito_cuenta_cobrar_funcion1.mostrarDivMensaje(true,credito_cuenta_cobrar_control.strAuxiliarMensaje,credito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			credito_cuenta_cobrar_funcion1.mostrarDivMensaje(false,credito_cuenta_cobrar_control.strAuxiliarMensaje,credito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(credito_cuenta_cobrar_control) {
		if(credito_cuenta_cobrar_funcion1.esPaginaForm(credito_cuenta_cobrar_constante1)==true) {
			window.opener.credito_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(credito_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(credito_cuenta_cobrar_control) {
		credito_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(credito_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		credito_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(credito_cuenta_cobrar_control.strAuxiliarTipo,credito_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(credito_cuenta_cobrar_control) {
		credito_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,credito_cuenta_cobrar_control.strAuxiliarMensajeAlert,credito_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(credito_cuenta_cobrar_funcion1.esPaginaForm(credito_cuenta_cobrar_constante1)==true) {
			window.opener.credito_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,credito_cuenta_cobrar_control.strAuxiliarMensajeAlert,credito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(credito_cuenta_cobrar_control) {
		this.credito_cuenta_cobrar_controlInicial=credito_cuenta_cobrar_control;
			
		if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(credito_cuenta_cobrar_control.strStyleDivArbol,credito_cuenta_cobrar_control.strStyleDivContent
																,credito_cuenta_cobrar_control.strStyleDivOpcionesBanner,credito_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,credito_cuenta_cobrar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=credito_cuenta_cobrar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",credito_cuenta_cobrar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(credito_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(credito_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(credito_cuenta_cobrar_control.tiposReportes,credito_cuenta_cobrar_control.tiposReporte
															 	,credito_cuenta_cobrar_control.tiposPaginacion,credito_cuenta_cobrar_control.tiposAcciones
																,credito_cuenta_cobrar_control.tiposColumnasSelect,credito_cuenta_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(credito_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(credito_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(credito_cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(credito_cuenta_cobrar_control) {
	
		var indexPosition=credito_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=credito_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(credito_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarComboscuenta_cobrarsFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosforma_pago_clientesFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.cargarCombosestadosFK(credito_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarComboscuenta_cobrarsFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosforma_pago_clientesFK(credito_cuenta_cobrar_control);
				}

				if(credito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					credito_cuenta_cobrar_webcontrol1.cargarCombosestadosFK(credito_cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_cobrarFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.cuenta_cobrarsFK);
	}

	cargarComboEditarTablaforma_pago_clienteFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.forma_pago_clientesFK);
	}

	cargarComboEditarTablaestadoFK(credito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(credito_cuenta_cobrar_control) {
		jQuery("#divBusquedacredito_cuenta_cobrarAjaxWebPart").css("display",credito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trcredito_cuenta_cobrarCabeceraBusquedas").css("display",credito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedacredito_cuenta_cobrar").css("display",credito_cuenta_cobrar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(credito_cuenta_cobrar_control.htmlTablaOrderBy!=null
			&& credito_cuenta_cobrar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBycredito_cuenta_cobrarAjaxWebPart").html(credito_cuenta_cobrar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//credito_cuenta_cobrar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(credito_cuenta_cobrar_control.htmlTablaOrderByRel!=null
			&& credito_cuenta_cobrar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelcredito_cuenta_cobrarAjaxWebPart").html(credito_cuenta_cobrar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedacredito_cuenta_cobrarAjaxWebPart").css("display","none");
			jQuery("#trcredito_cuenta_cobrarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedacredito_cuenta_cobrar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(credito_cuenta_cobrar_control) {
		
		if(!credito_cuenta_cobrar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(credito_cuenta_cobrar_control);
		} else {
			jQuery("#divTablaDatoscredito_cuenta_cobrarsAjaxWebPart").html(credito_cuenta_cobrar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatoscredito_cuenta_cobrars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatoscredito_cuenta_cobrars=jQuery("#tblTablaDatoscredito_cuenta_cobrars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("credito_cuenta_cobrar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',credito_cuenta_cobrar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			credito_cuenta_cobrar_webcontrol1.registrarControlesTableEdition(credito_cuenta_cobrar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		credito_cuenta_cobrar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(credito_cuenta_cobrar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("credito_cuenta_cobrar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(credito_cuenta_cobrar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatoscredito_cuenta_cobrarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(credito_cuenta_cobrar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(credito_cuenta_cobrar_control);
		
		const divOrderBy = document.getElementById("divOrderBycredito_cuenta_cobrarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(credito_cuenta_cobrar_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelcredito_cuenta_cobrarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(credito_cuenta_cobrar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(credito_cuenta_cobrar_control);			
		}
	}
	
	actualizarCamposFilaTabla(credito_cuenta_cobrar_control) {
		var i=0;
		
		i=credito_cuenta_cobrar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id);
		jQuery("#t-version_row_"+i+"").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.versionRow);
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_empresa!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_sucursal!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_ejercicio!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_periodo!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_usuario!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_cuenta_cobrar!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_7").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_cuenta_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.numero);
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_forma_pago_cliente!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_forma_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_forma_pago_cliente) {
				jQuery("#t-cel_"+i+"_9").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_forma_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_9").select2("val", null);
			if(jQuery("#t-cel_"+i+"_9").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_11").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.fecha_vence);
		jQuery("#t-cel_"+i+"_12").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.abono);
		jQuery("#t-cel_"+i+"_13").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.saldo);
		jQuery("#t-cel_"+i+"_14").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.descripcion);
		
		if(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_estado!=null && credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_15").val() != credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_estado) {
				jQuery("#t-cel_"+i+"_15").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_15").select2("val", null);
			if(jQuery("#t-cel_"+i+"_15").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_15").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_16").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.referencia);
		jQuery("#t-cel_"+i+"_17").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.debito);
		jQuery("#t-cel_"+i+"_18").val(credito_cuenta_cobrar_control.credito_cuenta_cobrarActual.credito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(credito_cuenta_cobrar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(credito_cuenta_cobrar_control) {
		credito_cuenta_cobrar_funcion1.registrarControlesTableValidacionEdition(credito_cuenta_cobrar_control,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(credito_cuenta_cobrar_control) {
		jQuery("#divResumencredito_cuenta_cobrarActualAjaxWebPart").html(credito_cuenta_cobrar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(credito_cuenta_cobrar_control) {
		//jQuery("#divAccionesRelacionescredito_cuenta_cobrarAjaxWebPart").html(credito_cuenta_cobrar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("credito_cuenta_cobrar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(credito_cuenta_cobrar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionescredito_cuenta_cobrarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		credito_cuenta_cobrar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(credito_cuenta_cobrar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(credito_cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(credito_cuenta_cobrar_control) {
		
		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idcuenta_cobrar);
			jQuery("#tblstrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idcuenta_cobrar);
		}

		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idejercicio);
		}

		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idempresa);
		}

		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idestado);
		}

		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idforma_pago_cliente);
			jQuery("#tblstrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idforma_pago_cliente);
		}

		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idperiodo);
		}

		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idsucursal);
		}

		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",credito_cuenta_cobrar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioncredito_cuenta_cobrar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("credito_cuenta_cobrar",id,"cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		credito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_cobrar","empresa","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		credito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_cobrar","sucursal","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		credito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_cobrar","ejercicio","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		credito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_cobrar","periodo","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		credito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_cobrar","usuario","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParacuenta_cobrar(strNombreCampoBusqueda){//idActual
		credito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_cobrar","cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaforma_pago_cliente(strNombreCampoBusqueda){//idActual
		credito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_cobrar","forma_pago_cliente","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		credito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("credito_cuenta_cobrar","estado","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrarConstante,strParametros);
		
		//credito_cuenta_cobrar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa",credito_cuenta_cobrar_control.empresasFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_2",credito_cuenta_cobrar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal",credito_cuenta_cobrar_control.sucursalsFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_3",credito_cuenta_cobrar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio",credito_cuenta_cobrar_control.ejerciciosFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_4",credito_cuenta_cobrar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo",credito_cuenta_cobrar_control.periodosFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_5",credito_cuenta_cobrar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario",credito_cuenta_cobrar_control.usuariosFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_6",credito_cuenta_cobrar_control.usuariosFK);
		}
	};

	cargarComboscuenta_cobrarsFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar",credito_cuenta_cobrar_control.cuenta_cobrarsFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_7",credito_cuenta_cobrar_control.cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar",credito_cuenta_cobrar_control.cuenta_cobrarsFK);

	};

	cargarCombosforma_pago_clientesFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente",credito_cuenta_cobrar_control.forma_pago_clientesFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_9",credito_cuenta_cobrar_control.forma_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente",credito_cuenta_cobrar_control.forma_pago_clientesFK);

	};

	cargarCombosestadosFK(credito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado",credito_cuenta_cobrar_control.estadosFK);

		if(credito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+credito_cuenta_cobrar_control.idFilaTablaActual+"_15",credito_cuenta_cobrar_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",credito_cuenta_cobrar_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeComboscuenta_cobrarsFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosforma_pago_clientesFK(credito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosestadosFK(credito_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idempresaDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != credito_cuenta_cobrar_control.idempresaDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(credito_cuenta_cobrar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idsucursalDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != credito_cuenta_cobrar_control.idsucursalDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(credito_cuenta_cobrar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idejercicioDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != credito_cuenta_cobrar_control.idejercicioDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(credito_cuenta_cobrar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idperiodoDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != credito_cuenta_cobrar_control.idperiodoDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(credito_cuenta_cobrar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idusuarioDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != credito_cuenta_cobrar_control.idusuarioDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(credito_cuenta_cobrar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_cobrarsFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != credito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(credito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(credito_cuenta_cobrar_control.idcuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosforma_pago_clientesFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idforma_pago_clienteDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val() != credito_cuenta_cobrar_control.idforma_pago_clienteDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val(credito_cuenta_cobrar_control.idforma_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val(credito_cuenta_cobrar_control.idforma_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(credito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(credito_cuenta_cobrar_control.idestadoDefaultFK>-1 && jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val() != credito_cuenta_cobrar_control.idestadoDefaultFK) {
				jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val(credito_cuenta_cobrar_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(credito_cuenta_cobrar_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	






		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//credito_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(credito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(credito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosempresasFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombossucursalsFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosejerciciosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosperiodosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosusuariosFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorComboscuenta_cobrarsFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosforma_pago_clientesFK(credito_cuenta_cobrar_control);
			}

			if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				credito_cuenta_cobrar_webcontrol1.setDefectoValorCombosestadosFK(credito_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(credito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(credito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosempresasFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombossucursalsFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosperiodosFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosusuariosFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeComboscuenta_cobrarsFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosforma_pago_clientesFK(credito_cuenta_cobrar_control);
			//}

			//if(credito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",credito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				credito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosestadosFK(credito_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(credito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(credito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(credito_cuenta_cobrar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_cobrar","FK_Idcuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_cobrar","FK_Idejercicio","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_cobrar","FK_Idempresa","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_cobrar","FK_Idestado","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_cobrar","FK_Idforma_pago_cliente","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_cobrar","FK_Idperiodo","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_cobrar","FK_Idsucursal","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("credito_cuenta_cobrar","FK_Idusuario","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
		
			
			if(credito_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("credito_cuenta_cobrar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("credito_cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,"credito_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_cobrar","id_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParacuenta_cobrar("id_cuenta_cobrar");
				//alert(jQuery('#form-id_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("forma_pago_cliente","id_forma_pago_cliente","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParaforma_pago_cliente("id_forma_pago_cliente");
				//alert(jQuery('#form-id_forma_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+credito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				credito_cuenta_cobrar_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(credito_cuenta_cobrar_control) {
		
		jQuery("#divBusquedacredito_cuenta_cobrarAjaxWebPart").css("display",credito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trcredito_cuenta_cobrarCabeceraBusquedas").css("display",credito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedacredito_cuenta_cobrar").css("display",credito_cuenta_cobrar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportecredito_cuenta_cobrar").css("display",credito_cuenta_cobrar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodoscredito_cuenta_cobrar").attr("style",credito_cuenta_cobrar_control.strPermisoMostrarTodos);		
		
		if(credito_cuenta_cobrar_control.strPermisoNuevo!=null) {
			jQuery("#tdcredito_cuenta_cobrarNuevo").css("display",credito_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdcredito_cuenta_cobrarNuevoToolBar").css("display",credito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdcredito_cuenta_cobrarDuplicar").css("display",credito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcredito_cuenta_cobrarDuplicarToolBar").css("display",credito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdcredito_cuenta_cobrarNuevoGuardarCambios").css("display",credito_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdcredito_cuenta_cobrarNuevoGuardarCambiosToolBar").css("display",credito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(credito_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdcredito_cuenta_cobrarCopiar").css("display",credito_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcredito_cuenta_cobrarCopiarToolBar").css("display",credito_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdcredito_cuenta_cobrarConEditar").css("display",credito_cuenta_cobrar_control.strPermisoActualizar);
		}
		
		jQuery("#tdcredito_cuenta_cobrarGuardarCambios").css("display",credito_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdcredito_cuenta_cobrarGuardarCambiosToolBar").css("display",credito_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdcredito_cuenta_cobrarCerrarPagina").css("display",credito_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tdcredito_cuenta_cobrarCerrarPaginaToolBar").css("display",credito_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trcredito_cuenta_cobrarAccionesRelaciones").css("display",credito_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=credito_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + credito_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + credito_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Credito Cuenta Cobrars";
		sTituloBanner+=" - " + credito_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + credito_cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdcredito_cuenta_cobrarRelacionesToolBar").css("display",credito_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultoscredito_cuenta_cobrar").css("display",credito_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		credito_cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		credito_cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		credito_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		credito_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(credito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			credito_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(credito_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				credito_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(credito_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(credito_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				credito_cuenta_cobrar_webcontrol1.onLoad();
			
			//} else {
				//if(credito_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			credito_cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("credito_cuenta_cobrar","cuentascobrar","",credito_cuenta_cobrar_funcion1,credito_cuenta_cobrar_webcontrol1,credito_cuenta_cobrar_constante1);	
	}
}

var credito_cuenta_cobrar_webcontrol1 = new credito_cuenta_cobrar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {credito_cuenta_cobrar_webcontrol,credito_cuenta_cobrar_webcontrol1};

//Para ser llamado desde window.opener
window.credito_cuenta_cobrar_webcontrol1 = credito_cuenta_cobrar_webcontrol1;


if(credito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = credito_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>