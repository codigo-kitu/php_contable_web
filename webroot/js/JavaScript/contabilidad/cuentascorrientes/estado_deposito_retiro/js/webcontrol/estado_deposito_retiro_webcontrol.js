//<script type="text/javascript" language="javascript">



//var estado_deposito_retiroJQueryPaginaWebInteraccion= function (estado_deposito_retiro_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {estado_deposito_retiro_constante,estado_deposito_retiro_constante1} from '../util/estado_deposito_retiro_constante.js';

import {estado_deposito_retiro_funcion,estado_deposito_retiro_funcion1} from '../util/estado_deposito_retiro_funcion.js';


class estado_deposito_retiro_webcontrol extends GeneralEntityWebControl {
	
	estado_deposito_retiro_control=null;
	estado_deposito_retiro_controlInicial=null;
	estado_deposito_retiro_controlAuxiliar=null;
		
	//if(estado_deposito_retiro_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(estado_deposito_retiro_control) {
		super();
		
		this.estado_deposito_retiro_control=estado_deposito_retiro_control;
	}
		
	actualizarVariablesPagina(estado_deposito_retiro_control) {
		
		if(estado_deposito_retiro_control.action=="index" || estado_deposito_retiro_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(estado_deposito_retiro_control);
			
		} 
		
		
		else if(estado_deposito_retiro_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(estado_deposito_retiro_control);
			
		} else if(estado_deposito_retiro_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(estado_deposito_retiro_control);
			
		} else if(estado_deposito_retiro_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(estado_deposito_retiro_control);		
		
		} else if(estado_deposito_retiro_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(estado_deposito_retiro_control);
		
		}  else if(estado_deposito_retiro_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(estado_deposito_retiro_control);
		
		} else if(estado_deposito_retiro_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estado_deposito_retiro_control);		
		
		} else if(estado_deposito_retiro_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(estado_deposito_retiro_control);		
		
		} else if(estado_deposito_retiro_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(estado_deposito_retiro_control);		
		
		} else if(estado_deposito_retiro_control.action.includes("Busqueda") ||
				  estado_deposito_retiro_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(estado_deposito_retiro_control);
			
		} else if(estado_deposito_retiro_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(estado_deposito_retiro_control)
		}
		
		
		
	
		else if(estado_deposito_retiro_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(estado_deposito_retiro_control);	
		
		} else if(estado_deposito_retiro_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(estado_deposito_retiro_control);		
		}
	
		else if(estado_deposito_retiro_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(estado_deposito_retiro_control);		
		}
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + estado_deposito_retiro_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(estado_deposito_retiro_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(estado_deposito_retiro_control) {
		this.actualizarPaginaAccionesGenerales(estado_deposito_retiro_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(estado_deposito_retiro_control) {
		
		this.actualizarPaginaCargaGeneral(estado_deposito_retiro_control);
		this.actualizarPaginaOrderBy(estado_deposito_retiro_control);
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);
		this.actualizarPaginaCargaGeneralControles(estado_deposito_retiro_control);
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estado_deposito_retiro_control);
		this.actualizarPaginaAreaBusquedas(estado_deposito_retiro_control);
		this.actualizarPaginaCargaCombosFK(estado_deposito_retiro_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(estado_deposito_retiro_control) {
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(estado_deposito_retiro_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(estado_deposito_retiro_control) {
		
		this.actualizarPaginaCargaGeneral(estado_deposito_retiro_control);
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);
		this.actualizarPaginaCargaGeneralControles(estado_deposito_retiro_control);
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(estado_deposito_retiro_control);
		this.actualizarPaginaAreaBusquedas(estado_deposito_retiro_control);
		this.actualizarPaginaCargaCombosFK(estado_deposito_retiro_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);		
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		//this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);		
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		//this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);		
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		//this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(estado_deposito_retiro_control) {
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(estado_deposito_retiro_control) {
		this.actualizarPaginaAbrirLink(estado_deposito_retiro_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);				
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		//this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(estado_deposito_retiro_control) {
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);
		this.onLoadCombosDefectoFK(estado_deposito_retiro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);
		//this.actualizarPaginaFormulario(estado_deposito_retiro_control);
		this.onLoadCombosDefectoFK(estado_deposito_retiro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		//this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(estado_deposito_retiro_control) {
		this.actualizarPaginaAbrirLink(estado_deposito_retiro_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(estado_deposito_retiro_control) {
					//super.actualizarPaginaImprimir(estado_deposito_retiro_control,"estado_deposito_retiro");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estado_deposito_retiro_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("estado_deposito_retiro_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(estado_deposito_retiro_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estado_deposito_retiro_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(estado_deposito_retiro_control) {
		//super.actualizarPaginaImprimir(estado_deposito_retiro_control,"estado_deposito_retiro");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("estado_deposito_retiro_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(estado_deposito_retiro_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estado_deposito_retiro_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(estado_deposito_retiro_control) {
		//super.actualizarPaginaImprimir(estado_deposito_retiro_control,"estado_deposito_retiro");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("estado_deposito_retiro_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(estado_deposito_retiro_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",estado_deposito_retiro_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(estado_deposito_retiro_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(estado_deposito_retiro_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(estado_deposito_retiro_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(estado_deposito_retiro_control);
			
		this.actualizarPaginaAbrirLink(estado_deposito_retiro_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(estado_deposito_retiro_control) {
		this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);
		this.actualizarPaginaFormulario(estado_deposito_retiro_control);
		this.actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control);		
		this.actualizarPaginaAreaMantenimiento(estado_deposito_retiro_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(estado_deposito_retiro_control) {
		
		if(estado_deposito_retiro_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(estado_deposito_retiro_control);
		}
		
		if(estado_deposito_retiro_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(estado_deposito_retiro_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(estado_deposito_retiro_control) {
		if(estado_deposito_retiro_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("estado_deposito_retiroReturnGeneral",JSON.stringify(estado_deposito_retiro_control.estado_deposito_retiroReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(estado_deposito_retiro_control) {
		if(estado_deposito_retiro_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && estado_deposito_retiro_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(estado_deposito_retiro_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(estado_deposito_retiro_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(estado_deposito_retiro_control, mostrar) {
		
		if(mostrar==true) {
			estado_deposito_retiro_funcion1.resaltarRestaurarDivsPagina(false,"estado_deposito_retiro");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				estado_deposito_retiro_funcion1.resaltarRestaurarDivMantenimiento(false,"estado_deposito_retiro");
			}			
			
			estado_deposito_retiro_funcion1.mostrarDivMensaje(true,estado_deposito_retiro_control.strAuxiliarMensaje,estado_deposito_retiro_control.strAuxiliarCssMensaje);
		
		} else {
			estado_deposito_retiro_funcion1.mostrarDivMensaje(false,estado_deposito_retiro_control.strAuxiliarMensaje,estado_deposito_retiro_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(estado_deposito_retiro_control) {
		if(estado_deposito_retiro_funcion1.esPaginaForm(estado_deposito_retiro_constante1)==true) {
			window.opener.estado_deposito_retiro_webcontrol1.actualizarPaginaTablaDatos(estado_deposito_retiro_control);
		} else {
			this.actualizarPaginaTablaDatos(estado_deposito_retiro_control);
		}
	}
	
	actualizarPaginaAbrirLink(estado_deposito_retiro_control) {
		estado_deposito_retiro_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(estado_deposito_retiro_control.strAuxiliarUrlPagina);
				
		estado_deposito_retiro_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(estado_deposito_retiro_control.strAuxiliarTipo,estado_deposito_retiro_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(estado_deposito_retiro_control) {
		estado_deposito_retiro_funcion1.resaltarRestaurarDivMensaje(true,estado_deposito_retiro_control.strAuxiliarMensajeAlert,estado_deposito_retiro_control.strAuxiliarCssMensaje);
			
		if(estado_deposito_retiro_funcion1.esPaginaForm(estado_deposito_retiro_constante1)==true) {
			window.opener.estado_deposito_retiro_funcion1.resaltarRestaurarDivMensaje(true,estado_deposito_retiro_control.strAuxiliarMensajeAlert,estado_deposito_retiro_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(estado_deposito_retiro_control) {
		this.estado_deposito_retiro_controlInicial=estado_deposito_retiro_control;
			
		if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(estado_deposito_retiro_control.strStyleDivArbol,estado_deposito_retiro_control.strStyleDivContent
																,estado_deposito_retiro_control.strStyleDivOpcionesBanner,estado_deposito_retiro_control.strStyleDivExpandirColapsar
																,estado_deposito_retiro_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=estado_deposito_retiro_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",estado_deposito_retiro_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(estado_deposito_retiro_control) {
		this.actualizarCssBotonesPagina(estado_deposito_retiro_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(estado_deposito_retiro_control.tiposReportes,estado_deposito_retiro_control.tiposReporte
															 	,estado_deposito_retiro_control.tiposPaginacion,estado_deposito_retiro_control.tiposAcciones
																,estado_deposito_retiro_control.tiposColumnasSelect,estado_deposito_retiro_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(estado_deposito_retiro_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(estado_deposito_retiro_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(estado_deposito_retiro_control);			
	}
	
	actualizarPaginaUsuarioInvitado(estado_deposito_retiro_control) {
	
		var indexPosition=estado_deposito_retiro_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=estado_deposito_retiro_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(estado_deposito_retiro_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(estado_deposito_retiro_control.strRecargarFkTiposNinguno!=null && estado_deposito_retiro_control.strRecargarFkTiposNinguno!='NINGUNO' && estado_deposito_retiro_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(estado_deposito_retiro_control) {
		jQuery("#divBusquedaestado_deposito_retiroAjaxWebPart").css("display",estado_deposito_retiro_control.strPermisoBusqueda);
		jQuery("#trestado_deposito_retiroCabeceraBusquedas").css("display",estado_deposito_retiro_control.strPermisoBusqueda);
		jQuery("#trBusquedaestado_deposito_retiro").css("display",estado_deposito_retiro_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(estado_deposito_retiro_control.htmlTablaOrderBy!=null
			&& estado_deposito_retiro_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByestado_deposito_retiroAjaxWebPart").html(estado_deposito_retiro_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//estado_deposito_retiro_webcontrol1.registrarOrderByActions();
			
		}
			
		if(estado_deposito_retiro_control.htmlTablaOrderByRel!=null
			&& estado_deposito_retiro_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelestado_deposito_retiroAjaxWebPart").html(estado_deposito_retiro_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaestado_deposito_retiroAjaxWebPart").css("display","none");
			jQuery("#trestado_deposito_retiroCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaestado_deposito_retiro").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(estado_deposito_retiro_control) {
		
		if(!estado_deposito_retiro_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(estado_deposito_retiro_control);
		} else {
			jQuery("#divTablaDatosestado_deposito_retirosAjaxWebPart").html(estado_deposito_retiro_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosestado_deposito_retiros=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosestado_deposito_retiros=jQuery("#tblTablaDatosestado_deposito_retiros").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("estado_deposito_retiro",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',estado_deposito_retiro_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			estado_deposito_retiro_webcontrol1.registrarControlesTableEdition(estado_deposito_retiro_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		estado_deposito_retiro_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(estado_deposito_retiro_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("estado_deposito_retiro_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(estado_deposito_retiro_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosestado_deposito_retirosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(estado_deposito_retiro_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(estado_deposito_retiro_control);
		
		const divOrderBy = document.getElementById("divOrderByestado_deposito_retiroAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(estado_deposito_retiro_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelestado_deposito_retiroAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(estado_deposito_retiro_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(estado_deposito_retiro_control.estado_deposito_retiroActual!=null) {//form
			
			this.actualizarCamposFilaTabla(estado_deposito_retiro_control);			
		}
	}
	
	actualizarCamposFilaTabla(estado_deposito_retiro_control) {
		var i=0;
		
		i=estado_deposito_retiro_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(estado_deposito_retiro_control.estado_deposito_retiroActual.id);
		jQuery("#t-version_row_"+i+"").val(estado_deposito_retiro_control.estado_deposito_retiroActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(estado_deposito_retiro_control.estado_deposito_retiroActual.versionRow);
		jQuery("#t-cel_"+i+"_3").val(estado_deposito_retiro_control.estado_deposito_retiroActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(estado_deposito_retiro_control.estado_deposito_retiroActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(estado_deposito_retiro_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(estado_deposito_retiro_control) {
		estado_deposito_retiro_funcion1.registrarControlesTableValidacionEdition(estado_deposito_retiro_control,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(estado_deposito_retiro_control) {
		jQuery("#divResumenestado_deposito_retiroActualAjaxWebPart").html(estado_deposito_retiro_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(estado_deposito_retiro_control) {
		//jQuery("#divAccionesRelacionesestado_deposito_retiroAjaxWebPart").html(estado_deposito_retiro_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("estado_deposito_retiro_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(estado_deposito_retiro_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesestado_deposito_retiroAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		estado_deposito_retiro_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(estado_deposito_retiro_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(estado_deposito_retiro_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(estado_deposito_retiro_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionestado_deposito_retiro();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("estado_deposito_retiro",id,"cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiroConstante,strParametros);
		
		//estado_deposito_retiro_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//estado_deposito_retiro_control
		
	
	}
	
	onLoadCombosDefectoFK(estado_deposito_retiro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estado_deposito_retiro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			
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
	onLoadCombosEventosFK(estado_deposito_retiro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estado_deposito_retiro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(estado_deposito_retiro_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(estado_deposito_retiro_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(estado_deposito_retiro_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(estado_deposito_retiro_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);			
			
			
		
			
			if(estado_deposito_retiro_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("estado_deposito_retiro");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("estado_deposito_retiro");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,"estado_deposito_retiro");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(estado_deposito_retiro_control) {
		
		jQuery("#divBusquedaestado_deposito_retiroAjaxWebPart").css("display",estado_deposito_retiro_control.strPermisoBusqueda);
		jQuery("#trestado_deposito_retiroCabeceraBusquedas").css("display",estado_deposito_retiro_control.strPermisoBusqueda);
		jQuery("#trBusquedaestado_deposito_retiro").css("display",estado_deposito_retiro_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteestado_deposito_retiro").css("display",estado_deposito_retiro_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosestado_deposito_retiro").attr("style",estado_deposito_retiro_control.strPermisoMostrarTodos);		
		
		if(estado_deposito_retiro_control.strPermisoNuevo!=null) {
			jQuery("#tdestado_deposito_retiroNuevo").css("display",estado_deposito_retiro_control.strPermisoNuevo);
			jQuery("#tdestado_deposito_retiroNuevoToolBar").css("display",estado_deposito_retiro_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdestado_deposito_retiroDuplicar").css("display",estado_deposito_retiro_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestado_deposito_retiroDuplicarToolBar").css("display",estado_deposito_retiro_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdestado_deposito_retiroNuevoGuardarCambios").css("display",estado_deposito_retiro_control.strPermisoNuevo);
			jQuery("#tdestado_deposito_retiroNuevoGuardarCambiosToolBar").css("display",estado_deposito_retiro_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(estado_deposito_retiro_control.strPermisoActualizar!=null) {
			jQuery("#tdestado_deposito_retiroCopiar").css("display",estado_deposito_retiro_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestado_deposito_retiroCopiarToolBar").css("display",estado_deposito_retiro_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdestado_deposito_retiroConEditar").css("display",estado_deposito_retiro_control.strPermisoActualizar);
		}
		
		jQuery("#tdestado_deposito_retiroGuardarCambios").css("display",estado_deposito_retiro_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdestado_deposito_retiroGuardarCambiosToolBar").css("display",estado_deposito_retiro_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdestado_deposito_retiroCerrarPagina").css("display",estado_deposito_retiro_control.strPermisoPopup);		
		jQuery("#tdestado_deposito_retiroCerrarPaginaToolBar").css("display",estado_deposito_retiro_control.strPermisoPopup);
		//jQuery("#trestado_deposito_retiroAccionesRelaciones").css("display",estado_deposito_retiro_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=estado_deposito_retiro_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estado_deposito_retiro_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + estado_deposito_retiro_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Estado Deposito Retiro Cheques";
		sTituloBanner+=" - " + estado_deposito_retiro_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + estado_deposito_retiro_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdestado_deposito_retiroRelacionesToolBar").css("display",estado_deposito_retiro_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosestado_deposito_retiro").css("display",estado_deposito_retiro_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		estado_deposito_retiro_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		estado_deposito_retiro_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		estado_deposito_retiro_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		estado_deposito_retiro_webcontrol1.registrarEventosControles();
		
		if(estado_deposito_retiro_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="false") {
			estado_deposito_retiro_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(estado_deposito_retiro_constante1.STR_ES_RELACIONES=="true") {
			if(estado_deposito_retiro_constante1.BIT_ES_PAGINA_FORM==true) {
				estado_deposito_retiro_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(estado_deposito_retiro_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(estado_deposito_retiro_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				estado_deposito_retiro_webcontrol1.onLoad();
			
			//} else {
				//if(estado_deposito_retiro_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			estado_deposito_retiro_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("estado_deposito_retiro","cuentascorrientes","",estado_deposito_retiro_funcion1,estado_deposito_retiro_webcontrol1,estado_deposito_retiro_constante1);	
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

var estado_deposito_retiro_webcontrol1 = new estado_deposito_retiro_webcontrol();

//Para ser llamado desde otro archivo (import)
export {estado_deposito_retiro_webcontrol,estado_deposito_retiro_webcontrol1};

//Para ser llamado desde window.opener
window.estado_deposito_retiro_webcontrol1 = estado_deposito_retiro_webcontrol1;


if(estado_deposito_retiro_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = estado_deposito_retiro_webcontrol1.onLoadWindow; 
}

//</script>