//<script type="text/javascript" language="javascript">



//var tipo_tecla_mascaraJQueryPaginaWebInteraccion= function (tipo_tecla_mascara_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {tipo_tecla_mascara_constante,tipo_tecla_mascara_constante1} from '../util/tipo_tecla_mascara_constante.js';

import {tipo_tecla_mascara_funcion,tipo_tecla_mascara_funcion1} from '../util/tipo_tecla_mascara_funcion.js';


class tipo_tecla_mascara_webcontrol extends GeneralEntityWebControl {
	
	tipo_tecla_mascara_control=null;
	tipo_tecla_mascara_controlInicial=null;
	tipo_tecla_mascara_controlAuxiliar=null;
		
	//if(tipo_tecla_mascara_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_tecla_mascara_control) {
		super();
		
		this.tipo_tecla_mascara_control=tipo_tecla_mascara_control;
	}
		
	actualizarVariablesPagina(tipo_tecla_mascara_control) {
		
		if(tipo_tecla_mascara_control.action=="index" || tipo_tecla_mascara_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_tecla_mascara_control);
			
		} 
		
		
		else if(tipo_tecla_mascara_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tipo_tecla_mascara_control);
			
		} else if(tipo_tecla_mascara_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tipo_tecla_mascara_control);
			
		} else if(tipo_tecla_mascara_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_tecla_mascara_control);		
		
		} else if(tipo_tecla_mascara_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tipo_tecla_mascara_control);
		
		}  else if(tipo_tecla_mascara_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_tecla_mascara_control);
		
		} else if(tipo_tecla_mascara_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_tecla_mascara_control);		
		
		} else if(tipo_tecla_mascara_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_tecla_mascara_control);		
		
		} else if(tipo_tecla_mascara_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_tecla_mascara_control);		
		
		} else if(tipo_tecla_mascara_control.action.includes("Busqueda") ||
				  tipo_tecla_mascara_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(tipo_tecla_mascara_control);
			
		} else if(tipo_tecla_mascara_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_tecla_mascara_control)
		}
		
		
		
	
		else if(tipo_tecla_mascara_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_tecla_mascara_control);	
		
		} else if(tipo_tecla_mascara_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_tecla_mascara_control);		
		}
	
		else if(tipo_tecla_mascara_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_tecla_mascara_control);		
		}
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_tecla_mascara_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_tecla_mascara_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_tecla_mascara_control) {
		this.actualizarPaginaAccionesGenerales(tipo_tecla_mascara_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_tecla_mascara_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_tecla_mascara_control);
		this.actualizarPaginaOrderBy(tipo_tecla_mascara_control);
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control);
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_tecla_mascara_control);
		this.actualizarPaginaAreaBusquedas(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_tecla_mascara_control) {
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_tecla_mascara_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_tecla_mascara_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_tecla_mascara_control);
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control);
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_tecla_mascara_control);
		this.actualizarPaginaAreaBusquedas(tipo_tecla_mascara_control);
		this.actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tipo_tecla_mascara_control) {
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_tecla_mascara_control) {
		this.actualizarPaginaAbrirLink(tipo_tecla_mascara_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);				
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tipo_tecla_mascara_control) {
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.onLoadCombosDefectoFK(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		//this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.onLoadCombosDefectoFK(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_tecla_mascara_control) {
		this.actualizarPaginaAbrirLink(tipo_tecla_mascara_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_tecla_mascara_control) {
					//super.actualizarPaginaImprimir(tipo_tecla_mascara_control,"tipo_tecla_mascara");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_tecla_mascara_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("tipo_tecla_mascara_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_tecla_mascara_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_tecla_mascara_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_tecla_mascara_control) {
		//super.actualizarPaginaImprimir(tipo_tecla_mascara_control,"tipo_tecla_mascara");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("tipo_tecla_mascara_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(tipo_tecla_mascara_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_tecla_mascara_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_tecla_mascara_control) {
		//super.actualizarPaginaImprimir(tipo_tecla_mascara_control,"tipo_tecla_mascara");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("tipo_tecla_mascara_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_tecla_mascara_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_tecla_mascara_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_tecla_mascara_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_tecla_mascara_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_tecla_mascara_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(tipo_tecla_mascara_control);
			
		this.actualizarPaginaAbrirLink(tipo_tecla_mascara_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_tecla_mascara_control) {
		this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		this.actualizarPaginaFormulario(tipo_tecla_mascara_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_tecla_mascara_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_tecla_mascara_control) {
		
		if(tipo_tecla_mascara_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_tecla_mascara_control);
		}
		
		if(tipo_tecla_mascara_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_tecla_mascara_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_tecla_mascara_control) {
		if(tipo_tecla_mascara_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_tecla_mascaraReturnGeneral",JSON.stringify(tipo_tecla_mascara_control.tipo_tecla_mascaraReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_tecla_mascara_control) {
		if(tipo_tecla_mascara_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_tecla_mascara_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_tecla_mascara_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_tecla_mascara_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_tecla_mascara_control, mostrar) {
		
		if(mostrar==true) {
			tipo_tecla_mascara_funcion1.resaltarRestaurarDivsPagina(false,"tipo_tecla_mascara");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_tecla_mascara_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_tecla_mascara");
			}			
			
			tipo_tecla_mascara_funcion1.mostrarDivMensaje(true,tipo_tecla_mascara_control.strAuxiliarMensaje,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_tecla_mascara_funcion1.mostrarDivMensaje(false,tipo_tecla_mascara_control.strAuxiliarMensaje,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_tecla_mascara_control) {
		if(tipo_tecla_mascara_funcion1.esPaginaForm(tipo_tecla_mascara_constante1)==true) {
			window.opener.tipo_tecla_mascara_webcontrol1.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_tecla_mascara_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_tecla_mascara_control) {
		tipo_tecla_mascara_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_tecla_mascara_control.strAuxiliarUrlPagina);
				
		tipo_tecla_mascara_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_tecla_mascara_control.strAuxiliarTipo,tipo_tecla_mascara_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_tecla_mascara_control) {
		tipo_tecla_mascara_funcion1.resaltarRestaurarDivMensaje(true,tipo_tecla_mascara_control.strAuxiliarMensajeAlert,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
			
		if(tipo_tecla_mascara_funcion1.esPaginaForm(tipo_tecla_mascara_constante1)==true) {
			window.opener.tipo_tecla_mascara_funcion1.resaltarRestaurarDivMensaje(true,tipo_tecla_mascara_control.strAuxiliarMensajeAlert,tipo_tecla_mascara_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_tecla_mascara_control) {
		this.tipo_tecla_mascara_controlInicial=tipo_tecla_mascara_control;
			
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_tecla_mascara_control.strStyleDivArbol,tipo_tecla_mascara_control.strStyleDivContent
																,tipo_tecla_mascara_control.strStyleDivOpcionesBanner,tipo_tecla_mascara_control.strStyleDivExpandirColapsar
																,tipo_tecla_mascara_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=tipo_tecla_mascara_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tipo_tecla_mascara_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_tecla_mascara_control) {
		this.actualizarCssBotonesPagina(tipo_tecla_mascara_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_tecla_mascara_control.tiposReportes,tipo_tecla_mascara_control.tiposReporte
															 	,tipo_tecla_mascara_control.tiposPaginacion,tipo_tecla_mascara_control.tiposAcciones
																,tipo_tecla_mascara_control.tiposColumnasSelect,tipo_tecla_mascara_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_tecla_mascara_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_tecla_mascara_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_tecla_mascara_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_tecla_mascara_control) {
	
		var indexPosition=tipo_tecla_mascara_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_tecla_mascara_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_tecla_mascara_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_tecla_mascara_control.strRecargarFkTiposNinguno!=null && tipo_tecla_mascara_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_tecla_mascara_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(tipo_tecla_mascara_control) {
		jQuery("#divBusquedatipo_tecla_mascaraAjaxWebPart").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
		jQuery("#trtipo_tecla_mascaraCabeceraBusquedas").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tipo_tecla_mascara_control.htmlTablaOrderBy!=null
			&& tipo_tecla_mascara_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytipo_tecla_mascaraAjaxWebPart").html(tipo_tecla_mascara_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tipo_tecla_mascara_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tipo_tecla_mascara_control.htmlTablaOrderByRel!=null
			&& tipo_tecla_mascara_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltipo_tecla_mascaraAjaxWebPart").html(tipo_tecla_mascara_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatipo_tecla_mascaraAjaxWebPart").css("display","none");
			jQuery("#trtipo_tecla_mascaraCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatipo_tecla_mascara").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(tipo_tecla_mascara_control) {
		
		if(!tipo_tecla_mascara_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(tipo_tecla_mascara_control);
		} else {
			jQuery("#divTablaDatostipo_tecla_mascarasAjaxWebPart").html(tipo_tecla_mascara_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostipo_tecla_mascaras=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostipo_tecla_mascaras=jQuery("#tblTablaDatostipo_tecla_mascaras").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tipo_tecla_mascara",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tipo_tecla_mascara_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tipo_tecla_mascara_webcontrol1.registrarControlesTableEdition(tipo_tecla_mascara_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tipo_tecla_mascara_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(tipo_tecla_mascara_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("tipo_tecla_mascara_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_tecla_mascara_control);
		
		const divTablaDatos = document.getElementById("divTablaDatostipo_tecla_mascarasAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(tipo_tecla_mascara_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(tipo_tecla_mascara_control);
		
		const divOrderBy = document.getElementById("divOrderBytipo_tecla_mascaraAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(tipo_tecla_mascara_control);
		
		const divOrderByRel = document.getElementById("divOrderByReltipo_tecla_mascaraAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(tipo_tecla_mascara_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tipo_tecla_mascara_control.tipo_tecla_mascaraActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tipo_tecla_mascara_control);			
		}
	}
	
	actualizarCamposFilaTabla(tipo_tecla_mascara_control) {
		var i=0;
		
		i=tipo_tecla_mascara_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.id);
		jQuery("#t-version_row_"+i+"").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(tipo_tecla_mascara_control.tipo_tecla_mascaraActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tipo_tecla_mascara_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(tipo_tecla_mascara_control) {
		tipo_tecla_mascara_funcion1.registrarControlesTableValidacionEdition(tipo_tecla_mascara_control,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(tipo_tecla_mascara_control) {
		jQuery("#divResumentipo_tecla_mascaraActualAjaxWebPart").html(tipo_tecla_mascara_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_tecla_mascara_control) {
		//jQuery("#divAccionesRelacionestipo_tecla_mascaraAjaxWebPart").html(tipo_tecla_mascara_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("tipo_tecla_mascara_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_tecla_mascara_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionestipo_tecla_mascaraAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		tipo_tecla_mascara_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tipo_tecla_mascara_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tipo_tecla_mascara_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tipo_tecla_mascara_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontipo_tecla_mascara();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tipo_tecla_mascara",id,"seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascaraConstante,strParametros);
		
		//tipo_tecla_mascara_funcion1.cancelarOnComplete();
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_tecla_mascara_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_tecla_mascara_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_tecla_mascara_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
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
	onLoadCombosEventosFK(tipo_tecla_mascara_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_tecla_mascara_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_tecla_mascara_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_tecla_mascara_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_tecla_mascara_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tipo_tecla_mascara_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);			
			
			
		
			
			if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_tecla_mascara");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_tecla_mascara");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,"tipo_tecla_mascara");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_tecla_mascara_control) {
		
		jQuery("#divBusquedatipo_tecla_mascaraAjaxWebPart").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
		jQuery("#trtipo_tecla_mascaraCabeceraBusquedas").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetipo_tecla_mascara").css("display",tipo_tecla_mascara_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostipo_tecla_mascara").attr("style",tipo_tecla_mascara_control.strPermisoMostrarTodos);		
		
		if(tipo_tecla_mascara_control.strPermisoNuevo!=null) {
			jQuery("#tdtipo_tecla_mascaraNuevo").css("display",tipo_tecla_mascara_control.strPermisoNuevo);
			jQuery("#tdtipo_tecla_mascaraNuevoToolBar").css("display",tipo_tecla_mascara_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtipo_tecla_mascaraDuplicar").css("display",tipo_tecla_mascara_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_tecla_mascaraDuplicarToolBar").css("display",tipo_tecla_mascara_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_tecla_mascaraNuevoGuardarCambios").css("display",tipo_tecla_mascara_control.strPermisoNuevo);
			jQuery("#tdtipo_tecla_mascaraNuevoGuardarCambiosToolBar").css("display",tipo_tecla_mascara_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tipo_tecla_mascara_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_tecla_mascaraCopiar").css("display",tipo_tecla_mascara_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_tecla_mascaraCopiarToolBar").css("display",tipo_tecla_mascara_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_tecla_mascaraConEditar").css("display",tipo_tecla_mascara_control.strPermisoActualizar);
		}
		
		jQuery("#tdtipo_tecla_mascaraGuardarCambios").css("display",tipo_tecla_mascara_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtipo_tecla_mascaraGuardarCambiosToolBar").css("display",tipo_tecla_mascara_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdtipo_tecla_mascaraCerrarPagina").css("display",tipo_tecla_mascara_control.strPermisoPopup);		
		jQuery("#tdtipo_tecla_mascaraCerrarPaginaToolBar").css("display",tipo_tecla_mascara_control.strPermisoPopup);
		//jQuery("#trtipo_tecla_mascaraAccionesRelaciones").css("display",tipo_tecla_mascara_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_tecla_mascara_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_tecla_mascara_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_tecla_mascara_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Tecla Mascaras";
		sTituloBanner+=" - " + tipo_tecla_mascara_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_tecla_mascara_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_tecla_mascaraRelacionesToolBar").css("display",tipo_tecla_mascara_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_tecla_mascara").css("display",tipo_tecla_mascara_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_tecla_mascara_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_tecla_mascara_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_tecla_mascara_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_tecla_mascara_webcontrol1.registrarEventosControles();
		
		if(tipo_tecla_mascara_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
			tipo_tecla_mascara_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_tecla_mascara_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_tecla_mascara_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_tecla_mascara_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tipo_tecla_mascara_webcontrol1.onLoad();
			
			//} else {
				//if(tipo_tecla_mascara_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			tipo_tecla_mascara_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_tecla_mascara","seguridad","",tipo_tecla_mascara_funcion1,tipo_tecla_mascara_webcontrol1,tipo_tecla_mascara_constante1);	
	}
}

var tipo_tecla_mascara_webcontrol1 = new tipo_tecla_mascara_webcontrol();

//Para ser llamado desde otro archivo (import)
export {tipo_tecla_mascara_webcontrol,tipo_tecla_mascara_webcontrol1};

//Para ser llamado desde window.opener
window.tipo_tecla_mascara_webcontrol1 = tipo_tecla_mascara_webcontrol1;


if(tipo_tecla_mascara_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_tecla_mascara_webcontrol1.onLoadWindow; 
}

//</script>