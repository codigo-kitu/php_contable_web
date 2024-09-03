//<script type="text/javascript" language="javascript">



//var pago_cuenta_cobrarJQueryPaginaWebInteraccion= function (pago_cuenta_cobrar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {pago_cuenta_cobrar_constante,pago_cuenta_cobrar_constante1} from '../util/pago_cuenta_cobrar_constante.js';

import {pago_cuenta_cobrar_funcion,pago_cuenta_cobrar_funcion1} from '../util/pago_cuenta_cobrar_funcion.js';


class pago_cuenta_cobrar_webcontrol extends GeneralEntityWebControl {
	
	pago_cuenta_cobrar_control=null;
	pago_cuenta_cobrar_controlInicial=null;
	pago_cuenta_cobrar_controlAuxiliar=null;
		
	//if(pago_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(pago_cuenta_cobrar_control) {
		super();
		
		this.pago_cuenta_cobrar_control=pago_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(pago_cuenta_cobrar_control) {
		
		if(pago_cuenta_cobrar_control.action=="index" || pago_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(pago_cuenta_cobrar_control);
			
		} 
		
		
		else if(pago_cuenta_cobrar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(pago_cuenta_cobrar_control);
			
		} else if(pago_cuenta_cobrar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(pago_cuenta_cobrar_control);
			
		} else if(pago_cuenta_cobrar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(pago_cuenta_cobrar_control);		
		
		} else if(pago_cuenta_cobrar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(pago_cuenta_cobrar_control);
		
		}  else if(pago_cuenta_cobrar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(pago_cuenta_cobrar_control);
		
		} else if(pago_cuenta_cobrar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(pago_cuenta_cobrar_control);		
		
		} else if(pago_cuenta_cobrar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(pago_cuenta_cobrar_control);		
		
		} else if(pago_cuenta_cobrar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(pago_cuenta_cobrar_control);		
		
		} else if(pago_cuenta_cobrar_control.action.includes("Busqueda") ||
				  pago_cuenta_cobrar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(pago_cuenta_cobrar_control);
			
		} else if(pago_cuenta_cobrar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(pago_cuenta_cobrar_control)
		}
		
		
		
	
		else if(pago_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(pago_cuenta_cobrar_control);	
		
		} else if(pago_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(pago_cuenta_cobrar_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + pago_cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(pago_cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(pago_cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(pago_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(pago_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(pago_cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(pago_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(pago_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(pago_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(pago_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(pago_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(pago_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(pago_cuenta_cobrar_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(pago_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(pago_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(pago_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(pago_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(pago_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(pago_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(pago_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(pago_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(pago_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);				
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(pago_cuenta_cobrar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(pago_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(pago_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(pago_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(pago_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(pago_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(pago_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(pago_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(pago_cuenta_cobrar_control) {
					//super.actualizarPaginaImprimir(pago_cuenta_cobrar_control,"pago_cuenta_cobrar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",pago_cuenta_cobrar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("pago_cuenta_cobrar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(pago_cuenta_cobrar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(pago_cuenta_cobrar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(pago_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(pago_cuenta_cobrar_control,"pago_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("pago_cuenta_cobrar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(pago_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",pago_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(pago_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(pago_cuenta_cobrar_control,"pago_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("pago_cuenta_cobrar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(pago_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",pago_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(pago_cuenta_cobrar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(pago_cuenta_cobrar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(pago_cuenta_cobrar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(pago_cuenta_cobrar_control);
			
		this.actualizarPaginaAbrirLink(pago_cuenta_cobrar_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(pago_cuenta_cobrar_control) {
		
		if(pago_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(pago_cuenta_cobrar_control);
		}
		
		if(pago_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(pago_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(pago_cuenta_cobrar_control) {
		if(pago_cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("pago_cuenta_cobrarReturnGeneral",JSON.stringify(pago_cuenta_cobrar_control.pago_cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(pago_cuenta_cobrar_control) {
		if(pago_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && pago_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(pago_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(pago_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(pago_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			pago_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"pago_cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				pago_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"pago_cuenta_cobrar");
			}			
			
			pago_cuenta_cobrar_funcion1.mostrarDivMensaje(true,pago_cuenta_cobrar_control.strAuxiliarMensaje,pago_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			pago_cuenta_cobrar_funcion1.mostrarDivMensaje(false,pago_cuenta_cobrar_control.strAuxiliarMensaje,pago_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(pago_cuenta_cobrar_control) {
		if(pago_cuenta_cobrar_funcion1.esPaginaForm(pago_cuenta_cobrar_constante1)==true) {
			window.opener.pago_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(pago_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(pago_cuenta_cobrar_control) {
		pago_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(pago_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		pago_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(pago_cuenta_cobrar_control.strAuxiliarTipo,pago_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(pago_cuenta_cobrar_control) {
		pago_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,pago_cuenta_cobrar_control.strAuxiliarMensajeAlert,pago_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(pago_cuenta_cobrar_funcion1.esPaginaForm(pago_cuenta_cobrar_constante1)==true) {
			window.opener.pago_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,pago_cuenta_cobrar_control.strAuxiliarMensajeAlert,pago_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(pago_cuenta_cobrar_control) {
		this.pago_cuenta_cobrar_controlInicial=pago_cuenta_cobrar_control;
			
		if(pago_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(pago_cuenta_cobrar_control.strStyleDivArbol,pago_cuenta_cobrar_control.strStyleDivContent
																,pago_cuenta_cobrar_control.strStyleDivOpcionesBanner,pago_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,pago_cuenta_cobrar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=pago_cuenta_cobrar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",pago_cuenta_cobrar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(pago_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(pago_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(pago_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(pago_cuenta_cobrar_control.tiposReportes,pago_cuenta_cobrar_control.tiposReporte
															 	,pago_cuenta_cobrar_control.tiposPaginacion,pago_cuenta_cobrar_control.tiposAcciones
																,pago_cuenta_cobrar_control.tiposColumnasSelect,pago_cuenta_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(pago_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(pago_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(pago_cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(pago_cuenta_cobrar_control) {
	
		var indexPosition=pago_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=pago_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(pago_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.cargarComboscuenta_cobrarsFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.cargarCombosforma_pago_clientesFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.cargarCombosestadosFK(pago_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(pago_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && pago_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && pago_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(pago_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",pago_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(pago_cuenta_cobrar_control);
				}

				if(pago_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",pago_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(pago_cuenta_cobrar_control);
				}

				if(pago_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",pago_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(pago_cuenta_cobrar_control);
				}

				if(pago_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",pago_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(pago_cuenta_cobrar_control);
				}

				if(pago_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",pago_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(pago_cuenta_cobrar_control);
				}

				if(pago_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",pago_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_cobrar_webcontrol1.cargarComboscuenta_cobrarsFK(pago_cuenta_cobrar_control);
				}

				if(pago_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",pago_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_cobrar_webcontrol1.cargarCombosforma_pago_clientesFK(pago_cuenta_cobrar_control);
				}

				if(pago_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",pago_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					pago_cuenta_cobrar_webcontrol1.cargarCombosestadosFK(pago_cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(pago_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(pago_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(pago_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(pago_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(pago_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_cobrarFK(pago_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_control.cuenta_cobrarsFK);
	}

	cargarComboEditarTablaforma_pago_clienteFK(pago_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_control.forma_pago_clientesFK);
	}

	cargarComboEditarTablaestadoFK(pago_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(pago_cuenta_cobrar_control) {
		jQuery("#divBusquedapago_cuenta_cobrarAjaxWebPart").css("display",pago_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trpago_cuenta_cobrarCabeceraBusquedas").css("display",pago_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedapago_cuenta_cobrar").css("display",pago_cuenta_cobrar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(pago_cuenta_cobrar_control.htmlTablaOrderBy!=null
			&& pago_cuenta_cobrar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBypago_cuenta_cobrarAjaxWebPart").html(pago_cuenta_cobrar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//pago_cuenta_cobrar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(pago_cuenta_cobrar_control.htmlTablaOrderByRel!=null
			&& pago_cuenta_cobrar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelpago_cuenta_cobrarAjaxWebPart").html(pago_cuenta_cobrar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(pago_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedapago_cuenta_cobrarAjaxWebPart").css("display","none");
			jQuery("#trpago_cuenta_cobrarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedapago_cuenta_cobrar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(pago_cuenta_cobrar_control) {
		
		if(!pago_cuenta_cobrar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(pago_cuenta_cobrar_control);
		} else {
			jQuery("#divTablaDatospago_cuenta_cobrarsAjaxWebPart").html(pago_cuenta_cobrar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatospago_cuenta_cobrars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(pago_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatospago_cuenta_cobrars=jQuery("#tblTablaDatospago_cuenta_cobrars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("pago_cuenta_cobrar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',pago_cuenta_cobrar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			pago_cuenta_cobrar_webcontrol1.registrarControlesTableEdition(pago_cuenta_cobrar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		pago_cuenta_cobrar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(pago_cuenta_cobrar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("pago_cuenta_cobrar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(pago_cuenta_cobrar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatospago_cuenta_cobrarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(pago_cuenta_cobrar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(pago_cuenta_cobrar_control);
		
		const divOrderBy = document.getElementById("divOrderBypago_cuenta_cobrarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(pago_cuenta_cobrar_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelpago_cuenta_cobrarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(pago_cuenta_cobrar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(pago_cuenta_cobrar_control);			
		}
	}
	
	actualizarCamposFilaTabla(pago_cuenta_cobrar_control) {
		var i=0;
		
		i=pago_cuenta_cobrar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id);
		jQuery("#t-version_row_"+i+"").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.versionRow);
		
		if(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_empresa!=null && pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_sucursal!=null && pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_4").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_ejercicio!=null && pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_5").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_periodo!=null && pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_6").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_usuario!=null && pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_7").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_cuenta_cobrar!=null && pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_8").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_cuenta_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.numero);
		
		if(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_forma_pago_cliente!=null && pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_forma_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_10").val() != pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_forma_pago_cliente) {
				jQuery("#t-cel_"+i+"_10").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_forma_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_10").select2("val", null);
			if(jQuery("#t-cel_"+i+"_10").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_10").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_11").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_12").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.fecha_vence);
		jQuery("#t-cel_"+i+"_13").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.abono);
		jQuery("#t-cel_"+i+"_14").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.saldo);
		jQuery("#t-cel_"+i+"_15").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.descripcion);
		
		if(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_estado!=null && pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_16").val() != pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_estado) {
				jQuery("#t-cel_"+i+"_16").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_16").select2("val", null);
			if(jQuery("#t-cel_"+i+"_16").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_16").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_17").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.referencia);
		jQuery("#t-cel_"+i+"_18").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.debito);
		jQuery("#t-cel_"+i+"_19").val(pago_cuenta_cobrar_control.pago_cuenta_cobrarActual.credito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(pago_cuenta_cobrar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(pago_cuenta_cobrar_control) {
		pago_cuenta_cobrar_funcion1.registrarControlesTableValidacionEdition(pago_cuenta_cobrar_control,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(pago_cuenta_cobrar_control) {
		jQuery("#divResumenpago_cuenta_cobrarActualAjaxWebPart").html(pago_cuenta_cobrar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(pago_cuenta_cobrar_control) {
		//jQuery("#divAccionesRelacionespago_cuenta_cobrarAjaxWebPart").html(pago_cuenta_cobrar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("pago_cuenta_cobrar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(pago_cuenta_cobrar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionespago_cuenta_cobrarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		pago_cuenta_cobrar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(pago_cuenta_cobrar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(pago_cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(pago_cuenta_cobrar_control) {
		
		if(pago_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idcuenta_cobrar);
			jQuery("#tblstrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idcuenta_cobrar);
		}

		if(pago_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idejercicio);
		}

		if(pago_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idempresa);
		}

		if(pago_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idestado);
		}

		if(pago_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idforma_pago_cliente);
			jQuery("#tblstrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idforma_pago_cliente);
		}

		if(pago_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idperiodo);
		}

		if(pago_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idsucursal);
		}

		if(pago_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",pago_cuenta_cobrar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionpago_cuenta_cobrar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("pago_cuenta_cobrar",id,"cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		pago_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("pago_cuenta_cobrar","empresa","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		pago_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("pago_cuenta_cobrar","sucursal","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		pago_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("pago_cuenta_cobrar","ejercicio","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		pago_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("pago_cuenta_cobrar","periodo","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		pago_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("pago_cuenta_cobrar","usuario","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
	}

	abrirBusquedaParacuenta_cobrar(strNombreCampoBusqueda){//idActual
		pago_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("pago_cuenta_cobrar","cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaforma_pago_cliente(strNombreCampoBusqueda){//idActual
		pago_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("pago_cuenta_cobrar","forma_pago_cliente","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		pago_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("pago_cuenta_cobrar","estado","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrarConstante,strParametros);
		
		//pago_cuenta_cobrar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(pago_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa",pago_cuenta_cobrar_control.empresasFK);

		if(pago_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_cobrar_control.idFilaTablaActual+"_3",pago_cuenta_cobrar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(pago_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal",pago_cuenta_cobrar_control.sucursalsFK);

		if(pago_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_cobrar_control.idFilaTablaActual+"_4",pago_cuenta_cobrar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(pago_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio",pago_cuenta_cobrar_control.ejerciciosFK);

		if(pago_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_cobrar_control.idFilaTablaActual+"_5",pago_cuenta_cobrar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(pago_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo",pago_cuenta_cobrar_control.periodosFK);

		if(pago_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_cobrar_control.idFilaTablaActual+"_6",pago_cuenta_cobrar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(pago_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario",pago_cuenta_cobrar_control.usuariosFK);

		if(pago_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_cobrar_control.idFilaTablaActual+"_7",pago_cuenta_cobrar_control.usuariosFK);
		}
	};

	cargarComboscuenta_cobrarsFK(pago_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar",pago_cuenta_cobrar_control.cuenta_cobrarsFK);

		if(pago_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_cobrar_control.idFilaTablaActual+"_8",pago_cuenta_cobrar_control.cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar",pago_cuenta_cobrar_control.cuenta_cobrarsFK);

	};

	cargarCombosforma_pago_clientesFK(pago_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente",pago_cuenta_cobrar_control.forma_pago_clientesFK);

		if(pago_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_cobrar_control.idFilaTablaActual+"_10",pago_cuenta_cobrar_control.forma_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente",pago_cuenta_cobrar_control.forma_pago_clientesFK);

	};

	cargarCombosestadosFK(pago_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado",pago_cuenta_cobrar_control.estadosFK);

		if(pago_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+pago_cuenta_cobrar_control.idFilaTablaActual+"_16",pago_cuenta_cobrar_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",pago_cuenta_cobrar_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(pago_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(pago_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(pago_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(pago_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(pago_cuenta_cobrar_control) {

	};

	registrarComboActionChangeComboscuenta_cobrarsFK(pago_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosforma_pago_clientesFK(pago_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosestadosFK(pago_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(pago_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_cobrar_control.idempresaDefaultFK>-1 && jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != pago_cuenta_cobrar_control.idempresaDefaultFK) {
				jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(pago_cuenta_cobrar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(pago_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_cobrar_control.idsucursalDefaultFK>-1 && jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != pago_cuenta_cobrar_control.idsucursalDefaultFK) {
				jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(pago_cuenta_cobrar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(pago_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_cobrar_control.idejercicioDefaultFK>-1 && jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != pago_cuenta_cobrar_control.idejercicioDefaultFK) {
				jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(pago_cuenta_cobrar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(pago_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_cobrar_control.idperiodoDefaultFK>-1 && jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != pago_cuenta_cobrar_control.idperiodoDefaultFK) {
				jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(pago_cuenta_cobrar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(pago_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_cobrar_control.idusuarioDefaultFK>-1 && jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != pago_cuenta_cobrar_control.idusuarioDefaultFK) {
				jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(pago_cuenta_cobrar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_cobrarsFK(pago_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_cobrar_control.idcuenta_cobrarDefaultFK>-1 && jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != pago_cuenta_cobrar_control.idcuenta_cobrarDefaultFK) {
				jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(pago_cuenta_cobrar_control.idcuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(pago_cuenta_cobrar_control.idcuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosforma_pago_clientesFK(pago_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_cobrar_control.idforma_pago_clienteDefaultFK>-1 && jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val() != pago_cuenta_cobrar_control.idforma_pago_clienteDefaultFK) {
				jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente").val(pago_cuenta_cobrar_control.idforma_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val(pago_cuenta_cobrar_control.idforma_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idforma_pago_cliente-cmbid_forma_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(pago_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(pago_cuenta_cobrar_control.idestadoDefaultFK>-1 && jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val() != pago_cuenta_cobrar_control.idestadoDefaultFK) {
				jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val(pago_cuenta_cobrar_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(pago_cuenta_cobrar_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//pago_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(pago_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pago_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.setDefectoValorCombosempresasFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.setDefectoValorCombossucursalsFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.setDefectoValorCombosejerciciosFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.setDefectoValorCombosperiodosFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.setDefectoValorCombosusuariosFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.setDefectoValorComboscuenta_cobrarsFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.setDefectoValorCombosforma_pago_clientesFK(pago_cuenta_cobrar_control);
			}

			if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				pago_cuenta_cobrar_webcontrol1.setDefectoValorCombosestadosFK(pago_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(pago_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pago_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosempresasFK(pago_cuenta_cobrar_control);
			//}

			//if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombossucursalsFK(pago_cuenta_cobrar_control);
			//}

			//if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(pago_cuenta_cobrar_control);
			//}

			//if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosperiodosFK(pago_cuenta_cobrar_control);
			//}

			//if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosusuariosFK(pago_cuenta_cobrar_control);
			//}

			//if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_cobrar_webcontrol1.registrarComboActionChangeComboscuenta_cobrarsFK(pago_cuenta_cobrar_control);
			//}

			//if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_cliente",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosforma_pago_clientesFK(pago_cuenta_cobrar_control);
			//}

			//if(pago_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",pago_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				pago_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosestadosFK(pago_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(pago_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(pago_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(pago_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(pago_cuenta_cobrar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("pago_cuenta_cobrar","FK_Idcuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("pago_cuenta_cobrar","FK_Idejercicio","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("pago_cuenta_cobrar","FK_Idempresa","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("pago_cuenta_cobrar","FK_Idestado","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("pago_cuenta_cobrar","FK_Idforma_pago_cliente","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("pago_cuenta_cobrar","FK_Idperiodo","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("pago_cuenta_cobrar","FK_Idsucursal","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("pago_cuenta_cobrar","FK_Idusuario","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
		
			
			if(pago_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("pago_cuenta_cobrar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("pago_cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(pago_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,"pago_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				pago_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				pago_cuenta_cobrar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				pago_cuenta_cobrar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				pago_cuenta_cobrar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				pago_cuenta_cobrar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_cobrar","id_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar_img_busqueda").click(function(){
				pago_cuenta_cobrar_webcontrol1.abrirBusquedaParacuenta_cobrar("id_cuenta_cobrar");
				//alert(jQuery('#form-id_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("forma_pago_cliente","id_forma_pago_cliente","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_forma_pago_cliente_img_busqueda").click(function(){
				pago_cuenta_cobrar_webcontrol1.abrirBusquedaParaforma_pago_cliente("id_forma_pago_cliente");
				//alert(jQuery('#form-id_forma_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+pago_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				pago_cuenta_cobrar_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(pago_cuenta_cobrar_control) {
		
		jQuery("#divBusquedapago_cuenta_cobrarAjaxWebPart").css("display",pago_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trpago_cuenta_cobrarCabeceraBusquedas").css("display",pago_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedapago_cuenta_cobrar").css("display",pago_cuenta_cobrar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportepago_cuenta_cobrar").css("display",pago_cuenta_cobrar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodospago_cuenta_cobrar").attr("style",pago_cuenta_cobrar_control.strPermisoMostrarTodos);		
		
		if(pago_cuenta_cobrar_control.strPermisoNuevo!=null) {
			jQuery("#tdpago_cuenta_cobrarNuevo").css("display",pago_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdpago_cuenta_cobrarNuevoToolBar").css("display",pago_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdpago_cuenta_cobrarDuplicar").css("display",pago_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpago_cuenta_cobrarDuplicarToolBar").css("display",pago_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdpago_cuenta_cobrarNuevoGuardarCambios").css("display",pago_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdpago_cuenta_cobrarNuevoGuardarCambiosToolBar").css("display",pago_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(pago_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdpago_cuenta_cobrarCopiar").css("display",pago_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpago_cuenta_cobrarCopiarToolBar").css("display",pago_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdpago_cuenta_cobrarConEditar").css("display",pago_cuenta_cobrar_control.strPermisoActualizar);
		}
		
		jQuery("#tdpago_cuenta_cobrarGuardarCambios").css("display",pago_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdpago_cuenta_cobrarGuardarCambiosToolBar").css("display",pago_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdpago_cuenta_cobrarCerrarPagina").css("display",pago_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tdpago_cuenta_cobrarCerrarPaginaToolBar").css("display",pago_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trpago_cuenta_cobrarAccionesRelaciones").css("display",pago_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=pago_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + pago_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + pago_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Pago Cuenta Cobrars";
		sTituloBanner+=" - " + pago_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + pago_cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdpago_cuenta_cobrarRelacionesToolBar").css("display",pago_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultospago_cuenta_cobrar").css("display",pago_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		pago_cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		pago_cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		pago_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		pago_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(pago_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(pago_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			pago_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(pago_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(pago_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				pago_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(pago_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(pago_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				pago_cuenta_cobrar_webcontrol1.onLoad();
			
			//} else {
				//if(pago_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			pago_cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("pago_cuenta_cobrar","cuentascobrar","",pago_cuenta_cobrar_funcion1,pago_cuenta_cobrar_webcontrol1,pago_cuenta_cobrar_constante1);	
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

var pago_cuenta_cobrar_webcontrol1 = new pago_cuenta_cobrar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {pago_cuenta_cobrar_webcontrol,pago_cuenta_cobrar_webcontrol1};

//Para ser llamado desde window.opener
window.pago_cuenta_cobrar_webcontrol1 = pago_cuenta_cobrar_webcontrol1;


if(pago_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = pago_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>