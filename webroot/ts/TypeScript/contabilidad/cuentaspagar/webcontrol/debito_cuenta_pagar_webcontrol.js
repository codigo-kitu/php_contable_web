//<script type="text/javascript" language="javascript">



//var debito_cuenta_pagarJQueryPaginaWebInteraccion= function (debito_cuenta_pagar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {debito_cuenta_pagar_constante,debito_cuenta_pagar_constante1} from '../util/debito_cuenta_pagar_constante.js';

import {debito_cuenta_pagar_funcion,debito_cuenta_pagar_funcion1} from '../util/debito_cuenta_pagar_funcion.js';


class debito_cuenta_pagar_webcontrol extends GeneralEntityWebControl {
	
	debito_cuenta_pagar_control=null;
	debito_cuenta_pagar_controlInicial=null;
	debito_cuenta_pagar_controlAuxiliar=null;
		
	//if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(debito_cuenta_pagar_control) {
		super();
		
		this.debito_cuenta_pagar_control=debito_cuenta_pagar_control;
	}
		
	actualizarVariablesPagina(debito_cuenta_pagar_control) {
		
		if(debito_cuenta_pagar_control.action=="index" || debito_cuenta_pagar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(debito_cuenta_pagar_control);
			
		} 
		
		
		else if(debito_cuenta_pagar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(debito_cuenta_pagar_control);
			
		} else if(debito_cuenta_pagar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(debito_cuenta_pagar_control);
			
		} else if(debito_cuenta_pagar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(debito_cuenta_pagar_control);		
		
		} else if(debito_cuenta_pagar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(debito_cuenta_pagar_control);
		
		}  else if(debito_cuenta_pagar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(debito_cuenta_pagar_control);
		
		} else if(debito_cuenta_pagar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(debito_cuenta_pagar_control);		
		
		} else if(debito_cuenta_pagar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(debito_cuenta_pagar_control);		
		
		} else if(debito_cuenta_pagar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(debito_cuenta_pagar_control);		
		
		} else if(debito_cuenta_pagar_control.action.includes("Busqueda") ||
				  debito_cuenta_pagar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(debito_cuenta_pagar_control);
			
		} else if(debito_cuenta_pagar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(debito_cuenta_pagar_control)
		}
		
		
		
	
		else if(debito_cuenta_pagar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(debito_cuenta_pagar_control);	
		
		} else if(debito_cuenta_pagar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(debito_cuenta_pagar_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + debito_cuenta_pagar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(debito_cuenta_pagar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(debito_cuenta_pagar_control) {
		this.actualizarPaginaAccionesGenerales(debito_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(debito_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(debito_cuenta_pagar_control);
		this.actualizarPaginaOrderBy(debito_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(debito_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(debito_cuenta_pagar_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(debito_cuenta_pagar_control) {
		
		this.actualizarPaginaCargaGeneral(debito_cuenta_pagar_control);
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_pagar_control);
		this.actualizarPaginaAreaBusquedas(debito_cuenta_pagar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(debito_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(debito_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(debito_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);				
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(debito_cuenta_pagar_control) {
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		//this.actualizarPaginaFormulario(debito_cuenta_pagar_control);
		this.onLoadCombosDefectoFK(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);		
		//this.actualizarPaginaAreaMantenimiento(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(debito_cuenta_pagar_control) {
		this.actualizarPaginaAbrirLink(debito_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(debito_cuenta_pagar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(debito_cuenta_pagar_control) {
					//super.actualizarPaginaImprimir(debito_cuenta_pagar_control,"debito_cuenta_pagar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",debito_cuenta_pagar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("debito_cuenta_pagar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(debito_cuenta_pagar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(debito_cuenta_pagar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(debito_cuenta_pagar_control) {
		//super.actualizarPaginaImprimir(debito_cuenta_pagar_control,"debito_cuenta_pagar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("debito_cuenta_pagar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(debito_cuenta_pagar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",debito_cuenta_pagar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(debito_cuenta_pagar_control) {
		//super.actualizarPaginaImprimir(debito_cuenta_pagar_control,"debito_cuenta_pagar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("debito_cuenta_pagar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(debito_cuenta_pagar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",debito_cuenta_pagar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(debito_cuenta_pagar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(debito_cuenta_pagar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(debito_cuenta_pagar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(debito_cuenta_pagar_control);
			
		this.actualizarPaginaAbrirLink(debito_cuenta_pagar_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(debito_cuenta_pagar_control) {
		
		if(debito_cuenta_pagar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(debito_cuenta_pagar_control);
		}
		
		if(debito_cuenta_pagar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(debito_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(debito_cuenta_pagar_control) {
		if(debito_cuenta_pagar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("debito_cuenta_pagarReturnGeneral",JSON.stringify(debito_cuenta_pagar_control.debito_cuenta_pagarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_pagar_control) {
		if(debito_cuenta_pagar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && debito_cuenta_pagar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(debito_cuenta_pagar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(debito_cuenta_pagar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(debito_cuenta_pagar_control, mostrar) {
		
		if(mostrar==true) {
			debito_cuenta_pagar_funcion1.resaltarRestaurarDivsPagina(false,"debito_cuenta_pagar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				debito_cuenta_pagar_funcion1.resaltarRestaurarDivMantenimiento(false,"debito_cuenta_pagar");
			}			
			
			debito_cuenta_pagar_funcion1.mostrarDivMensaje(true,debito_cuenta_pagar_control.strAuxiliarMensaje,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
		
		} else {
			debito_cuenta_pagar_funcion1.mostrarDivMensaje(false,debito_cuenta_pagar_control.strAuxiliarMensaje,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(debito_cuenta_pagar_control) {
		if(debito_cuenta_pagar_funcion1.esPaginaForm(debito_cuenta_pagar_constante1)==true) {
			window.opener.debito_cuenta_pagar_webcontrol1.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		} else {
			this.actualizarPaginaTablaDatos(debito_cuenta_pagar_control);
		}
	}
	
	actualizarPaginaAbrirLink(debito_cuenta_pagar_control) {
		debito_cuenta_pagar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(debito_cuenta_pagar_control.strAuxiliarUrlPagina);
				
		debito_cuenta_pagar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(debito_cuenta_pagar_control.strAuxiliarTipo,debito_cuenta_pagar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(debito_cuenta_pagar_control) {
		debito_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,debito_cuenta_pagar_control.strAuxiliarMensajeAlert,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
			
		if(debito_cuenta_pagar_funcion1.esPaginaForm(debito_cuenta_pagar_constante1)==true) {
			window.opener.debito_cuenta_pagar_funcion1.resaltarRestaurarDivMensaje(true,debito_cuenta_pagar_control.strAuxiliarMensajeAlert,debito_cuenta_pagar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(debito_cuenta_pagar_control) {
		this.debito_cuenta_pagar_controlInicial=debito_cuenta_pagar_control;
			
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(debito_cuenta_pagar_control.strStyleDivArbol,debito_cuenta_pagar_control.strStyleDivContent
																,debito_cuenta_pagar_control.strStyleDivOpcionesBanner,debito_cuenta_pagar_control.strStyleDivExpandirColapsar
																,debito_cuenta_pagar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=debito_cuenta_pagar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",debito_cuenta_pagar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(debito_cuenta_pagar_control) {
		this.actualizarCssBotonesPagina(debito_cuenta_pagar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(debito_cuenta_pagar_control.tiposReportes,debito_cuenta_pagar_control.tiposReporte
															 	,debito_cuenta_pagar_control.tiposPaginacion,debito_cuenta_pagar_control.tiposAcciones
																,debito_cuenta_pagar_control.tiposColumnasSelect,debito_cuenta_pagar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(debito_cuenta_pagar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(debito_cuenta_pagar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(debito_cuenta_pagar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(debito_cuenta_pagar_control) {
	
		var indexPosition=debito_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=debito_cuenta_pagar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(debito_cuenta_pagar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosempresasFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarComboscuenta_pagarsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.cargarCombosestadosFK(debito_cuenta_pagar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!=null && debito_cuenta_pagar_control.strRecargarFkTiposNinguno!='NINGUNO' && debito_cuenta_pagar_control.strRecargarFkTiposNinguno!='') {
			
				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosempresasFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombossucursalsFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosejerciciosFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosperiodosFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosusuariosFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarComboscuenta_pagarsFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control);
				}

				if(debito_cuenta_pagar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_pagar_webcontrol1.cargarCombosestadosFK(debito_cuenta_pagar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_pagarFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.cuenta_pagarsFK);
	}

	cargarComboEditarTablaforma_pago_proveedorFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.forma_pago_proveedorsFK);
	}

	cargarComboEditarTablaestadoFK(debito_cuenta_pagar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_pagar_funcion1,debito_cuenta_pagar_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(debito_cuenta_pagar_control) {
		jQuery("#divBusquedadebito_cuenta_pagarAjaxWebPart").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trdebito_cuenta_pagarCabeceraBusquedas").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedadebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(debito_cuenta_pagar_control.htmlTablaOrderBy!=null
			&& debito_cuenta_pagar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydebito_cuenta_pagarAjaxWebPart").html(debito_cuenta_pagar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//debito_cuenta_pagar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(debito_cuenta_pagar_control.htmlTablaOrderByRel!=null
			&& debito_cuenta_pagar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldebito_cuenta_pagarAjaxWebPart").html(debito_cuenta_pagar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadebito_cuenta_pagarAjaxWebPart").css("display","none");
			jQuery("#trdebito_cuenta_pagarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadebito_cuenta_pagar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(debito_cuenta_pagar_control) {
		
		if(!debito_cuenta_pagar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(debito_cuenta_pagar_control);
		} else {
			jQuery("#divTablaDatosdebito_cuenta_pagarsAjaxWebPart").html(debito_cuenta_pagar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdebito_cuenta_pagars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdebito_cuenta_pagars=jQuery("#tblTablaDatosdebito_cuenta_pagars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("debito_cuenta_pagar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',debito_cuenta_pagar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			debito_cuenta_pagar_webcontrol1.registrarControlesTableEdition(debito_cuenta_pagar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		debito_cuenta_pagar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(debito_cuenta_pagar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("debito_cuenta_pagar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(debito_cuenta_pagar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdebito_cuenta_pagarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(debito_cuenta_pagar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(debito_cuenta_pagar_control);
		
		const divOrderBy = document.getElementById("divOrderBydebito_cuenta_pagarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(debito_cuenta_pagar_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldebito_cuenta_pagarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(debito_cuenta_pagar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(debito_cuenta_pagar_control);			
		}
	}
	
	actualizarCamposFilaTabla(debito_cuenta_pagar_control) {
		var i=0;
		
		i=debito_cuenta_pagar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id);
		jQuery("#t-version_row_"+i+"").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.versionRow);
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar) {
				jQuery("#t-cel_"+i+"_7").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_cuenta_pagar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_forma_pago_proveedor!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_forma_pago_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_forma_pago_proveedor) {
				jQuery("#t-cel_"+i+"_8").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_forma_pago_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.numero);
		jQuery("#t-cel_"+i+"_10").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_11").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.fecha_vence);
		jQuery("#t-cel_"+i+"_12").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.abono);
		jQuery("#t-cel_"+i+"_13").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.saldo);
		jQuery("#t-cel_"+i+"_14").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.descripcion);
		
		if(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado!=null && debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_15").val() != debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado) {
				jQuery("#t-cel_"+i+"_15").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_15").select2("val", null);
			if(jQuery("#t-cel_"+i+"_15").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_15").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_16").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.referencia);
		jQuery("#t-cel_"+i+"_17").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.debito);
		jQuery("#t-cel_"+i+"_18").val(debito_cuenta_pagar_control.debito_cuenta_pagarActual.credito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(debito_cuenta_pagar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(debito_cuenta_pagar_control) {
		debito_cuenta_pagar_funcion1.registrarControlesTableValidacionEdition(debito_cuenta_pagar_control,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(debito_cuenta_pagar_control) {
		jQuery("#divResumendebito_cuenta_pagarActualAjaxWebPart").html(debito_cuenta_pagar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(debito_cuenta_pagar_control) {
		//jQuery("#divAccionesRelacionesdebito_cuenta_pagarAjaxWebPart").html(debito_cuenta_pagar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("debito_cuenta_pagar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(debito_cuenta_pagar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdebito_cuenta_pagarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		debito_cuenta_pagar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_pagar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(debito_cuenta_pagar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(debito_cuenta_pagar_control) {
		
		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idcuenta_pagar);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idcuenta_pagar);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idejercicio);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idempresa);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idestado);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idforma_pago_proveedor);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idforma_pago_proveedor);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idperiodo);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idsucursal);
		}

		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",debito_cuenta_pagar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondebito_cuenta_pagar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("debito_cuenta_pagar",id,"cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","empresa","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","sucursal","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","ejercicio","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","periodo","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","usuario","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParacuenta_pagar(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParaforma_pago_proveedor(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","forma_pago_proveedor","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		debito_cuenta_pagar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_pagar","estado","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagarConstante,strParametros);
		
		//debito_cuenta_pagar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa",debito_cuenta_pagar_control.empresasFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_2",debito_cuenta_pagar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal",debito_cuenta_pagar_control.sucursalsFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_3",debito_cuenta_pagar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio",debito_cuenta_pagar_control.ejerciciosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_4",debito_cuenta_pagar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo",debito_cuenta_pagar_control.periodosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_5",debito_cuenta_pagar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario",debito_cuenta_pagar_control.usuariosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_6",debito_cuenta_pagar_control.usuariosFK);
		}
	};

	cargarComboscuenta_pagarsFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar",debito_cuenta_pagar_control.cuenta_pagarsFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_7",debito_cuenta_pagar_control.cuenta_pagarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar",debito_cuenta_pagar_control.cuenta_pagarsFK);

	};

	cargarCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor",debito_cuenta_pagar_control.forma_pago_proveedorsFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_8",debito_cuenta_pagar_control.forma_pago_proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor",debito_cuenta_pagar_control.forma_pago_proveedorsFK);

	};

	cargarCombosestadosFK(debito_cuenta_pagar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado",debito_cuenta_pagar_control.estadosFK);

		if(debito_cuenta_pagar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_pagar_control.idFilaTablaActual+"_15",debito_cuenta_pagar_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",debito_cuenta_pagar_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeComboscuenta_pagarsFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control) {

	};

	registrarComboActionChangeCombosestadosFK(debito_cuenta_pagar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idempresaDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val() != debito_cuenta_pagar_control.idempresaDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa").val(debito_cuenta_pagar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idsucursalDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val() != debito_cuenta_pagar_control.idsucursalDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal").val(debito_cuenta_pagar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idejercicioDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val() != debito_cuenta_pagar_control.idejercicioDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio").val(debito_cuenta_pagar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idperiodoDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val() != debito_cuenta_pagar_control.idperiodoDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo").val(debito_cuenta_pagar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idusuarioDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val() != debito_cuenta_pagar_control.idusuarioDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario").val(debito_cuenta_pagar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_pagarsFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idcuenta_pagarDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val() != debito_cuenta_pagar_control.idcuenta_pagarDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar").val(debito_cuenta_pagar_control.idcuenta_pagarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(debito_cuenta_pagar_control.idcuenta_pagarDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idcuenta_pagar-cmbid_cuenta_pagar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idforma_pago_proveedorDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val() != debito_cuenta_pagar_control.idforma_pago_proveedorDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor").val(debito_cuenta_pagar_control.idforma_pago_proveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val(debito_cuenta_pagar_control.idforma_pago_proveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idforma_pago_proveedor-cmbid_forma_pago_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(debito_cuenta_pagar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_pagar_control.idestadoDefaultFK>-1 && jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val() != debito_cuenta_pagar_control.idestadoDefaultFK) {
				jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado").val(debito_cuenta_pagar_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(debito_cuenta_pagar_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_pagar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//debito_cuenta_pagar_control
		
	
	}
	
	onLoadCombosDefectoFK(debito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosempresasFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombossucursalsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosejerciciosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosperiodosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosusuariosFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorComboscuenta_pagarsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control);
			}

			if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_pagar_webcontrol1.setDefectoValorCombosestadosFK(debito_cuenta_pagar_control);
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
	onLoadCombosEventosFK(debito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosempresasFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombossucursalsFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosperiodosFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosusuariosFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_pagar",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeComboscuenta_pagarsFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_forma_pago_proveedor",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosforma_pago_proveedorsFK(debito_cuenta_pagar_control);
			//}

			//if(debito_cuenta_pagar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_pagar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_pagar_webcontrol1.registrarComboActionChangeCombosestadosFK(debito_cuenta_pagar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(debito_cuenta_pagar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_pagar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(debito_cuenta_pagar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idcuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idejercicio","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idempresa","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idestado","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idforma_pago_proveedor","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idperiodo","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idsucursal","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_pagar","FK_Idusuario","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
		
			
			if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("debito_cuenta_pagar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("debito_cuenta_pagar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,"debito_cuenta_pagar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_pagar","id_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_cuenta_pagar_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParacuenta_pagar("id_cuenta_pagar");
				//alert(jQuery('#form-id_cuenta_pagar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("forma_pago_proveedor","id_forma_pago_proveedor","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_forma_pago_proveedor_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaforma_pago_proveedor("id_forma_pago_proveedor");
				//alert(jQuery('#form-id_forma_pago_proveedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_pagar_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				debito_cuenta_pagar_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(debito_cuenta_pagar_control) {
		
		jQuery("#divBusquedadebito_cuenta_pagarAjaxWebPart").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trdebito_cuenta_pagarCabeceraBusquedas").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
		jQuery("#trBusquedadebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedebito_cuenta_pagar").css("display",debito_cuenta_pagar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdebito_cuenta_pagar").attr("style",debito_cuenta_pagar_control.strPermisoMostrarTodos);		
		
		if(debito_cuenta_pagar_control.strPermisoNuevo!=null) {
			jQuery("#tddebito_cuenta_pagarNuevo").css("display",debito_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tddebito_cuenta_pagarNuevoToolBar").css("display",debito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddebito_cuenta_pagarDuplicar").css("display",debito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddebito_cuenta_pagarDuplicarToolBar").css("display",debito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddebito_cuenta_pagarNuevoGuardarCambios").css("display",debito_cuenta_pagar_control.strPermisoNuevo);
			jQuery("#tddebito_cuenta_pagarNuevoGuardarCambiosToolBar").css("display",debito_cuenta_pagar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(debito_cuenta_pagar_control.strPermisoActualizar!=null) {
			jQuery("#tddebito_cuenta_pagarCopiar").css("display",debito_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddebito_cuenta_pagarCopiarToolBar").css("display",debito_cuenta_pagar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddebito_cuenta_pagarConEditar").css("display",debito_cuenta_pagar_control.strPermisoActualizar);
		}
		
		jQuery("#tddebito_cuenta_pagarGuardarCambios").css("display",debito_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddebito_cuenta_pagarGuardarCambiosToolBar").css("display",debito_cuenta_pagar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddebito_cuenta_pagarCerrarPagina").css("display",debito_cuenta_pagar_control.strPermisoPopup);		
		jQuery("#tddebito_cuenta_pagarCerrarPaginaToolBar").css("display",debito_cuenta_pagar_control.strPermisoPopup);
		//jQuery("#trdebito_cuenta_pagarAccionesRelaciones").css("display",debito_cuenta_pagar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=debito_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + debito_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + debito_cuenta_pagar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Debito Cuenta Pagars";
		sTituloBanner+=" - " + debito_cuenta_pagar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + debito_cuenta_pagar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddebito_cuenta_pagarRelacionesToolBar").css("display",debito_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdebito_cuenta_pagar").css("display",debito_cuenta_pagar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		debito_cuenta_pagar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		debito_cuenta_pagar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		debito_cuenta_pagar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		debito_cuenta_pagar_webcontrol1.registrarEventosControles();
		
		if(debito_cuenta_pagar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
			debito_cuenta_pagar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(debito_cuenta_pagar_constante1.STR_ES_RELACIONES=="true") {
			if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				debito_cuenta_pagar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(debito_cuenta_pagar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				debito_cuenta_pagar_webcontrol1.onLoad();
			
			//} else {
				//if(debito_cuenta_pagar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			debito_cuenta_pagar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("debito_cuenta_pagar","cuentaspagar","",debito_cuenta_pagar_funcion1,debito_cuenta_pagar_webcontrol1,debito_cuenta_pagar_constante1);	
	}
}

var debito_cuenta_pagar_webcontrol1 = new debito_cuenta_pagar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {debito_cuenta_pagar_webcontrol,debito_cuenta_pagar_webcontrol1};

//Para ser llamado desde window.opener
window.debito_cuenta_pagar_webcontrol1 = debito_cuenta_pagar_webcontrol1;


if(debito_cuenta_pagar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = debito_cuenta_pagar_webcontrol1.onLoadWindow; 
}

//</script>