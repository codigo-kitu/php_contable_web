//<script type="text/javascript" language="javascript">



//var retiro_cuenta_corrienteJQueryPaginaWebInteraccion= function (retiro_cuenta_corriente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {retiro_cuenta_corriente_constante,retiro_cuenta_corriente_constante1} from '../util/retiro_cuenta_corriente_constante.js';

import {retiro_cuenta_corriente_funcion,retiro_cuenta_corriente_funcion1} from '../util/retiro_cuenta_corriente_funcion.js';


class retiro_cuenta_corriente_webcontrol extends GeneralEntityWebControl {
	
	retiro_cuenta_corriente_control=null;
	retiro_cuenta_corriente_controlInicial=null;
	retiro_cuenta_corriente_controlAuxiliar=null;
		
	//if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(retiro_cuenta_corriente_control) {
		super();
		
		this.retiro_cuenta_corriente_control=retiro_cuenta_corriente_control;
	}
		
	actualizarVariablesPagina(retiro_cuenta_corriente_control) {
		
		if(retiro_cuenta_corriente_control.action=="index" || retiro_cuenta_corriente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(retiro_cuenta_corriente_control);
			
		} 
		
		
		else if(retiro_cuenta_corriente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(retiro_cuenta_corriente_control);
			
		} else if(retiro_cuenta_corriente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(retiro_cuenta_corriente_control);
			
		} else if(retiro_cuenta_corriente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(retiro_cuenta_corriente_control);		
		
		} else if(retiro_cuenta_corriente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(retiro_cuenta_corriente_control);
		
		}  else if(retiro_cuenta_corriente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(retiro_cuenta_corriente_control);
		
		} else if(retiro_cuenta_corriente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retiro_cuenta_corriente_control);		
		
		} else if(retiro_cuenta_corriente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(retiro_cuenta_corriente_control);		
		
		} else if(retiro_cuenta_corriente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(retiro_cuenta_corriente_control);		
		
		} else if(retiro_cuenta_corriente_control.action.includes("Busqueda") ||
				  retiro_cuenta_corriente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(retiro_cuenta_corriente_control);
			
		} else if(retiro_cuenta_corriente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(retiro_cuenta_corriente_control)
		}
		
		
		
	
		else if(retiro_cuenta_corriente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(retiro_cuenta_corriente_control);	
		
		} else if(retiro_cuenta_corriente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(retiro_cuenta_corriente_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + retiro_cuenta_corriente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(retiro_cuenta_corriente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(retiro_cuenta_corriente_control) {
		this.actualizarPaginaAccionesGenerales(retiro_cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(retiro_cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(retiro_cuenta_corriente_control);
		this.actualizarPaginaOrderBy(retiro_cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(retiro_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retiro_cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(retiro_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(retiro_cuenta_corriente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(retiro_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(retiro_cuenta_corriente_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(retiro_cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(retiro_cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(retiro_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(retiro_cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(retiro_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(retiro_cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(retiro_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(retiro_cuenta_corriente_control) {
		this.actualizarPaginaAbrirLink(retiro_cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);				
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(retiro_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);
		this.onLoadCombosDefectoFK(retiro_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(retiro_cuenta_corriente_control);
		this.onLoadCombosDefectoFK(retiro_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(retiro_cuenta_corriente_control) {
		this.actualizarPaginaAbrirLink(retiro_cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(retiro_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(retiro_cuenta_corriente_control) {
					//super.actualizarPaginaImprimir(retiro_cuenta_corriente_control,"retiro_cuenta_corriente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retiro_cuenta_corriente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("retiro_cuenta_corriente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(retiro_cuenta_corriente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retiro_cuenta_corriente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(retiro_cuenta_corriente_control) {
		//super.actualizarPaginaImprimir(retiro_cuenta_corriente_control,"retiro_cuenta_corriente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("retiro_cuenta_corriente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(retiro_cuenta_corriente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retiro_cuenta_corriente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(retiro_cuenta_corriente_control) {
		//super.actualizarPaginaImprimir(retiro_cuenta_corriente_control,"retiro_cuenta_corriente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("retiro_cuenta_corriente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(retiro_cuenta_corriente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",retiro_cuenta_corriente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(retiro_cuenta_corriente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(retiro_cuenta_corriente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(retiro_cuenta_corriente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(retiro_cuenta_corriente_control);
			
		this.actualizarPaginaAbrirLink(retiro_cuenta_corriente_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(retiro_cuenta_corriente_control) {
		
		if(retiro_cuenta_corriente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(retiro_cuenta_corriente_control);
		}
		
		if(retiro_cuenta_corriente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(retiro_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(retiro_cuenta_corriente_control) {
		if(retiro_cuenta_corriente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("retiro_cuenta_corrienteReturnGeneral",JSON.stringify(retiro_cuenta_corriente_control.retiro_cuenta_corrienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(retiro_cuenta_corriente_control) {
		if(retiro_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && retiro_cuenta_corriente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(retiro_cuenta_corriente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(retiro_cuenta_corriente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(retiro_cuenta_corriente_control, mostrar) {
		
		if(mostrar==true) {
			retiro_cuenta_corriente_funcion1.resaltarRestaurarDivsPagina(false,"retiro_cuenta_corriente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				retiro_cuenta_corriente_funcion1.resaltarRestaurarDivMantenimiento(false,"retiro_cuenta_corriente");
			}			
			
			retiro_cuenta_corriente_funcion1.mostrarDivMensaje(true,retiro_cuenta_corriente_control.strAuxiliarMensaje,retiro_cuenta_corriente_control.strAuxiliarCssMensaje);
		
		} else {
			retiro_cuenta_corriente_funcion1.mostrarDivMensaje(false,retiro_cuenta_corriente_control.strAuxiliarMensaje,retiro_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(retiro_cuenta_corriente_control) {
		if(retiro_cuenta_corriente_funcion1.esPaginaForm(retiro_cuenta_corriente_constante1)==true) {
			window.opener.retiro_cuenta_corriente_webcontrol1.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);
		} else {
			this.actualizarPaginaTablaDatos(retiro_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaAbrirLink(retiro_cuenta_corriente_control) {
		retiro_cuenta_corriente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(retiro_cuenta_corriente_control.strAuxiliarUrlPagina);
				
		retiro_cuenta_corriente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(retiro_cuenta_corriente_control.strAuxiliarTipo,retiro_cuenta_corriente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(retiro_cuenta_corriente_control) {
		retiro_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,retiro_cuenta_corriente_control.strAuxiliarMensajeAlert,retiro_cuenta_corriente_control.strAuxiliarCssMensaje);
			
		if(retiro_cuenta_corriente_funcion1.esPaginaForm(retiro_cuenta_corriente_constante1)==true) {
			window.opener.retiro_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,retiro_cuenta_corriente_control.strAuxiliarMensajeAlert,retiro_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(retiro_cuenta_corriente_control) {
		this.retiro_cuenta_corriente_controlInicial=retiro_cuenta_corriente_control;
			
		if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(retiro_cuenta_corriente_control.strStyleDivArbol,retiro_cuenta_corriente_control.strStyleDivContent
																,retiro_cuenta_corriente_control.strStyleDivOpcionesBanner,retiro_cuenta_corriente_control.strStyleDivExpandirColapsar
																,retiro_cuenta_corriente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=retiro_cuenta_corriente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",retiro_cuenta_corriente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(retiro_cuenta_corriente_control) {
		this.actualizarCssBotonesPagina(retiro_cuenta_corriente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(retiro_cuenta_corriente_control.tiposReportes,retiro_cuenta_corriente_control.tiposReporte
															 	,retiro_cuenta_corriente_control.tiposPaginacion,retiro_cuenta_corriente_control.tiposAcciones
																,retiro_cuenta_corriente_control.tiposColumnasSelect,retiro_cuenta_corriente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(retiro_cuenta_corriente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(retiro_cuenta_corriente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(retiro_cuenta_corriente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(retiro_cuenta_corriente_control) {
	
		var indexPosition=retiro_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=retiro_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(retiro_cuenta_corriente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombosempresasFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!=null && retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!='NINGUNO' && retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!='') {
			
				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombosempresasFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(retiro_cuenta_corriente_control);
				}

				if(retiro_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",retiro_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					retiro_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.cuenta_corrientesFK);
	}

	cargarComboEditarTablaestado_deposito_retiroFK(retiro_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_control.estado_deposito_retirosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(retiro_cuenta_corriente_control) {
		jQuery("#divBusquedaretiro_cuenta_corrienteAjaxWebPart").css("display",retiro_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trretiro_cuenta_corrienteCabeceraBusquedas").css("display",retiro_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trBusquedaretiro_cuenta_corriente").css("display",retiro_cuenta_corriente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(retiro_cuenta_corriente_control.htmlTablaOrderBy!=null
			&& retiro_cuenta_corriente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByretiro_cuenta_corrienteAjaxWebPart").html(retiro_cuenta_corriente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//retiro_cuenta_corriente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(retiro_cuenta_corriente_control.htmlTablaOrderByRel!=null
			&& retiro_cuenta_corriente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelretiro_cuenta_corrienteAjaxWebPart").html(retiro_cuenta_corriente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaretiro_cuenta_corrienteAjaxWebPart").css("display","none");
			jQuery("#trretiro_cuenta_corrienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaretiro_cuenta_corriente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(retiro_cuenta_corriente_control) {
		
		if(!retiro_cuenta_corriente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(retiro_cuenta_corriente_control);
		} else {
			jQuery("#divTablaDatosretiro_cuenta_corrientesAjaxWebPart").html(retiro_cuenta_corriente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosretiro_cuenta_corrientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosretiro_cuenta_corrientes=jQuery("#tblTablaDatosretiro_cuenta_corrientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("retiro_cuenta_corriente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',retiro_cuenta_corriente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			retiro_cuenta_corriente_webcontrol1.registrarControlesTableEdition(retiro_cuenta_corriente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		retiro_cuenta_corriente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(retiro_cuenta_corriente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("retiro_cuenta_corriente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(retiro_cuenta_corriente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosretiro_cuenta_corrientesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(retiro_cuenta_corriente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(retiro_cuenta_corriente_control);
		
		const divOrderBy = document.getElementById("divOrderByretiro_cuenta_corrienteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(retiro_cuenta_corriente_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelretiro_cuenta_corrienteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(retiro_cuenta_corriente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(retiro_cuenta_corriente_control);			
		}
	}
	
	actualizarCamposFilaTabla(retiro_cuenta_corriente_control) {
		var i=0;
		
		i=retiro_cuenta_corriente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id);
		jQuery("#t-version_row_"+i+"").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.versionRow);
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_empresa!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_sucursal!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_ejercicio!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_periodo!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_usuario!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_cuenta_corriente!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_7").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.fecha_emision);
		jQuery("#t-cel_"+i+"_9").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.monto);
		jQuery("#t-cel_"+i+"_10").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.monto_texto);
		jQuery("#t-cel_"+i+"_11").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.saldo);
		jQuery("#t-cel_"+i+"_12").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.descripcion);
		
		if(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_estado_deposito_retiro!=null && retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_estado_deposito_retiro>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_estado_deposito_retiro) {
				jQuery("#t-cel_"+i+"_13").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.id_estado_deposito_retiro).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_14").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.debito);
		jQuery("#t-cel_"+i+"_15").val(retiro_cuenta_corriente_control.retiro_cuenta_corrienteActual.credito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(retiro_cuenta_corriente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(retiro_cuenta_corriente_control) {
		retiro_cuenta_corriente_funcion1.registrarControlesTableValidacionEdition(retiro_cuenta_corriente_control,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(retiro_cuenta_corriente_control) {
		jQuery("#divResumenretiro_cuenta_corrienteActualAjaxWebPart").html(retiro_cuenta_corriente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(retiro_cuenta_corriente_control) {
		//jQuery("#divAccionesRelacionesretiro_cuenta_corrienteAjaxWebPart").html(retiro_cuenta_corriente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("retiro_cuenta_corriente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(retiro_cuenta_corriente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesretiro_cuenta_corrienteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		retiro_cuenta_corriente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(retiro_cuenta_corriente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(retiro_cuenta_corriente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(retiro_cuenta_corriente_control) {
		
		if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idcuenta_corriente);
		}

		if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idejercicio);
		}

		if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idempresa);
		}

		if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idestado_deposito_retiro);
			jQuery("#tblstrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idestado_deposito_retiro);
		}

		if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idperiodo);
		}

		if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idsucursal);
		}

		if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",retiro_cuenta_corriente_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionretiro_cuenta_corriente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("retiro_cuenta_corriente",id,"cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		retiro_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retiro_cuenta_corriente","empresa","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		retiro_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retiro_cuenta_corriente","sucursal","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		retiro_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retiro_cuenta_corriente","ejercicio","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		retiro_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retiro_cuenta_corriente","periodo","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		retiro_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retiro_cuenta_corriente","usuario","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		retiro_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retiro_cuenta_corriente","cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
	}

	abrirBusquedaParaestado_deposito_retiro(strNombreCampoBusqueda){//idActual
		retiro_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("retiro_cuenta_corriente","estado_deposito_retiro","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corrienteConstante,strParametros);
		
		//retiro_cuenta_corriente_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa",retiro_cuenta_corriente_control.empresasFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_2",retiro_cuenta_corriente_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal",retiro_cuenta_corriente_control.sucursalsFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_3",retiro_cuenta_corriente_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio",retiro_cuenta_corriente_control.ejerciciosFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_4",retiro_cuenta_corriente_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo",retiro_cuenta_corriente_control.periodosFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_5",retiro_cuenta_corriente_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario",retiro_cuenta_corriente_control.usuariosFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_6",retiro_cuenta_corriente_control.usuariosFK);
		}
	};

	cargarComboscuenta_corrientesFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente",retiro_cuenta_corriente_control.cuenta_corrientesFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_7",retiro_cuenta_corriente_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",retiro_cuenta_corriente_control.cuenta_corrientesFK);

	};

	cargarCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro",retiro_cuenta_corriente_control.estado_deposito_retirosFK);

		if(retiro_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+retiro_cuenta_corriente_control.idFilaTablaActual+"_13",retiro_cuenta_corriente_control.estado_deposito_retirosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro",retiro_cuenta_corriente_control.estado_deposito_retirosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombossucursalsFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosperiodosFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosusuariosFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(retiro_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idempresaDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != retiro_cuenta_corriente_control.idempresaDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(retiro_cuenta_corriente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idsucursalDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != retiro_cuenta_corriente_control.idsucursalDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(retiro_cuenta_corriente_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idejercicioDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != retiro_cuenta_corriente_control.idejercicioDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(retiro_cuenta_corriente_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idperiodoDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != retiro_cuenta_corriente_control.idperiodoDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(retiro_cuenta_corriente_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idusuarioDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != retiro_cuenta_corriente_control.idusuarioDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(retiro_cuenta_corriente_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != retiro_cuenta_corriente_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(retiro_cuenta_corriente_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(retiro_cuenta_corriente_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(retiro_cuenta_corriente_control.idestado_deposito_retiroDefaultFK>-1 && jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != retiro_cuenta_corriente_control.idestado_deposito_retiroDefaultFK) {
				jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(retiro_cuenta_corriente_control.idestado_deposito_retiroDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(retiro_cuenta_corriente_control.idestado_deposito_retiroDefaultForeignKey).trigger("change");
			if(jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	





		jQuery("#form-id_estado_deposito_retiro").prop("disabled", habilitarDeshabilitar);

	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//retiro_cuenta_corriente_control
		
	
	}
	
	onLoadCombosDefectoFK(retiro_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retiro_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombosempresasFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombossucursalsFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombosejerciciosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombosperiodosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombosusuariosFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorComboscuenta_corrientesFK(retiro_cuenta_corriente_control);
			}

			if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				retiro_cuenta_corriente_webcontrol1.setDefectoValorCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control);
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
	onLoadCombosEventosFK(retiro_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retiro_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosempresasFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombossucursalsFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosejerciciosFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosperiodosFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosusuariosFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(retiro_cuenta_corriente_control);
			//}

			//if(retiro_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",retiro_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				retiro_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosestado_deposito_retirosFK(retiro_cuenta_corriente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(retiro_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(retiro_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(retiro_cuenta_corriente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("retiro_cuenta_corriente","FK_Idcuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retiro_cuenta_corriente","FK_Idejercicio","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retiro_cuenta_corriente","FK_Idempresa","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retiro_cuenta_corriente","FK_Idestado_deposito_retiro","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retiro_cuenta_corriente","FK_Idperiodo","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retiro_cuenta_corriente","FK_Idsucursal","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("retiro_cuenta_corriente","FK_Idusuario","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
		
			
			if(retiro_cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("retiro_cuenta_corriente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("retiro_cuenta_corriente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,"retiro_cuenta_corriente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_deposito_retiro","id_estado_deposito_retiro","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+retiro_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro_img_busqueda").click(function(){
				retiro_cuenta_corriente_webcontrol1.abrirBusquedaParaestado_deposito_retiro("id_estado_deposito_retiro");
				//alert(jQuery('#form-id_estado_deposito_retiro_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(retiro_cuenta_corriente_control) {
		
		jQuery("#divBusquedaretiro_cuenta_corrienteAjaxWebPart").css("display",retiro_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trretiro_cuenta_corrienteCabeceraBusquedas").css("display",retiro_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trBusquedaretiro_cuenta_corriente").css("display",retiro_cuenta_corriente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteretiro_cuenta_corriente").css("display",retiro_cuenta_corriente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosretiro_cuenta_corriente").attr("style",retiro_cuenta_corriente_control.strPermisoMostrarTodos);		
		
		if(retiro_cuenta_corriente_control.strPermisoNuevo!=null) {
			jQuery("#tdretiro_cuenta_corrienteNuevo").css("display",retiro_cuenta_corriente_control.strPermisoNuevo);
			jQuery("#tdretiro_cuenta_corrienteNuevoToolBar").css("display",retiro_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdretiro_cuenta_corrienteDuplicar").css("display",retiro_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretiro_cuenta_corrienteDuplicarToolBar").css("display",retiro_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdretiro_cuenta_corrienteNuevoGuardarCambios").css("display",retiro_cuenta_corriente_control.strPermisoNuevo);
			jQuery("#tdretiro_cuenta_corrienteNuevoGuardarCambiosToolBar").css("display",retiro_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(retiro_cuenta_corriente_control.strPermisoActualizar!=null) {
			jQuery("#tdretiro_cuenta_corrienteCopiar").css("display",retiro_cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretiro_cuenta_corrienteCopiarToolBar").css("display",retiro_cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdretiro_cuenta_corrienteConEditar").css("display",retiro_cuenta_corriente_control.strPermisoActualizar);
		}
		
		jQuery("#tdretiro_cuenta_corrienteGuardarCambios").css("display",retiro_cuenta_corriente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdretiro_cuenta_corrienteGuardarCambiosToolBar").css("display",retiro_cuenta_corriente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdretiro_cuenta_corrienteCerrarPagina").css("display",retiro_cuenta_corriente_control.strPermisoPopup);		
		jQuery("#tdretiro_cuenta_corrienteCerrarPaginaToolBar").css("display",retiro_cuenta_corriente_control.strPermisoPopup);
		//jQuery("#trretiro_cuenta_corrienteAccionesRelaciones").css("display",retiro_cuenta_corriente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=retiro_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retiro_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + retiro_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Retiro Cta Corrientes";
		sTituloBanner+=" - " + retiro_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + retiro_cuenta_corriente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdretiro_cuenta_corrienteRelacionesToolBar").css("display",retiro_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosretiro_cuenta_corriente").css("display",retiro_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		retiro_cuenta_corriente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		retiro_cuenta_corriente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		retiro_cuenta_corriente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		retiro_cuenta_corriente_webcontrol1.registrarEventosControles();
		
		if(retiro_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			retiro_cuenta_corriente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONES=="true") {
			if(retiro_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				retiro_cuenta_corriente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(retiro_cuenta_corriente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(retiro_cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				retiro_cuenta_corriente_webcontrol1.onLoad();
			
			//} else {
				//if(retiro_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			retiro_cuenta_corriente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("retiro_cuenta_corriente","cuentascorrientes","",retiro_cuenta_corriente_funcion1,retiro_cuenta_corriente_webcontrol1,retiro_cuenta_corriente_constante1);	
	}
}

var retiro_cuenta_corriente_webcontrol1 = new retiro_cuenta_corriente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {retiro_cuenta_corriente_webcontrol,retiro_cuenta_corriente_webcontrol1};

//Para ser llamado desde window.opener
window.retiro_cuenta_corriente_webcontrol1 = retiro_cuenta_corriente_webcontrol1;


if(retiro_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = retiro_cuenta_corriente_webcontrol1.onLoadWindow; 
}

//</script>