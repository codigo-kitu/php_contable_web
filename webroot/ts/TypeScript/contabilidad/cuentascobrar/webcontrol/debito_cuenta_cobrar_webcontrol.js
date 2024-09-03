//<script type="text/javascript" language="javascript">



//var debito_cuenta_cobrarJQueryPaginaWebInteraccion= function (debito_cuenta_cobrar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {debito_cuenta_cobrar_constante,debito_cuenta_cobrar_constante1} from '../util/debito_cuenta_cobrar_constante.js';

import {debito_cuenta_cobrar_funcion,debito_cuenta_cobrar_funcion1} from '../util/debito_cuenta_cobrar_funcion.js';


class debito_cuenta_cobrar_webcontrol extends GeneralEntityWebControl {
	
	debito_cuenta_cobrar_control=null;
	debito_cuenta_cobrar_controlInicial=null;
	debito_cuenta_cobrar_controlAuxiliar=null;
		
	//if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(debito_cuenta_cobrar_control) {
		super();
		
		this.debito_cuenta_cobrar_control=debito_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(debito_cuenta_cobrar_control) {
		
		if(debito_cuenta_cobrar_control.action=="index" || debito_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(debito_cuenta_cobrar_control);
			
		} 
		
		
		else if(debito_cuenta_cobrar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(debito_cuenta_cobrar_control);
			
		} else if(debito_cuenta_cobrar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(debito_cuenta_cobrar_control);
			
		} else if(debito_cuenta_cobrar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(debito_cuenta_cobrar_control);		
		
		} else if(debito_cuenta_cobrar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(debito_cuenta_cobrar_control);
		
		}  else if(debito_cuenta_cobrar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(debito_cuenta_cobrar_control);
		
		} else if(debito_cuenta_cobrar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(debito_cuenta_cobrar_control);		
		
		} else if(debito_cuenta_cobrar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(debito_cuenta_cobrar_control);		
		
		} else if(debito_cuenta_cobrar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(debito_cuenta_cobrar_control);		
		
		} else if(debito_cuenta_cobrar_control.action.includes("Busqueda") ||
				  debito_cuenta_cobrar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(debito_cuenta_cobrar_control);
			
		} else if(debito_cuenta_cobrar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(debito_cuenta_cobrar_control)
		}
		
		
		
	
		else if(debito_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(debito_cuenta_cobrar_control);	
		
		} else if(debito_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(debito_cuenta_cobrar_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + debito_cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(debito_cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(debito_cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(debito_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(debito_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(debito_cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(debito_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(debito_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(debito_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(debito_cuenta_cobrar_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(debito_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(debito_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(debito_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(debito_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(debito_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(debito_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(debito_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);				
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(debito_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(debito_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(debito_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(debito_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(debito_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(debito_cuenta_cobrar_control) {
					//super.actualizarPaginaImprimir(debito_cuenta_cobrar_control,"debito_cuenta_cobrar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",debito_cuenta_cobrar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("debito_cuenta_cobrar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(debito_cuenta_cobrar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(debito_cuenta_cobrar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(debito_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(debito_cuenta_cobrar_control,"debito_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("debito_cuenta_cobrar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(debito_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",debito_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(debito_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(debito_cuenta_cobrar_control,"debito_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("debito_cuenta_cobrar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(debito_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",debito_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(debito_cuenta_cobrar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(debito_cuenta_cobrar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(debito_cuenta_cobrar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(debito_cuenta_cobrar_control);
			
		this.actualizarPaginaAbrirLink(debito_cuenta_cobrar_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(debito_cuenta_cobrar_control) {
		
		if(debito_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(debito_cuenta_cobrar_control);
		}
		
		if(debito_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(debito_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(debito_cuenta_cobrar_control) {
		if(debito_cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("debito_cuenta_cobrarReturnGeneral",JSON.stringify(debito_cuenta_cobrar_control.debito_cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(debito_cuenta_cobrar_control) {
		if(debito_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && debito_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(debito_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(debito_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(debito_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			debito_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"debito_cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				debito_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"debito_cuenta_cobrar");
			}			
			
			debito_cuenta_cobrar_funcion1.mostrarDivMensaje(true,debito_cuenta_cobrar_control.strAuxiliarMensaje,debito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			debito_cuenta_cobrar_funcion1.mostrarDivMensaje(false,debito_cuenta_cobrar_control.strAuxiliarMensaje,debito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(debito_cuenta_cobrar_control) {
		if(debito_cuenta_cobrar_funcion1.esPaginaForm(debito_cuenta_cobrar_constante1)==true) {
			window.opener.debito_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(debito_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(debito_cuenta_cobrar_control) {
		debito_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(debito_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		debito_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(debito_cuenta_cobrar_control.strAuxiliarTipo,debito_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(debito_cuenta_cobrar_control) {
		debito_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,debito_cuenta_cobrar_control.strAuxiliarMensajeAlert,debito_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(debito_cuenta_cobrar_funcion1.esPaginaForm(debito_cuenta_cobrar_constante1)==true) {
			window.opener.debito_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,debito_cuenta_cobrar_control.strAuxiliarMensajeAlert,debito_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(debito_cuenta_cobrar_control) {
		this.debito_cuenta_cobrar_controlInicial=debito_cuenta_cobrar_control;
			
		if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(debito_cuenta_cobrar_control.strStyleDivArbol,debito_cuenta_cobrar_control.strStyleDivContent
																,debito_cuenta_cobrar_control.strStyleDivOpcionesBanner,debito_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,debito_cuenta_cobrar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=debito_cuenta_cobrar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",debito_cuenta_cobrar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(debito_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(debito_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(debito_cuenta_cobrar_control.tiposReportes,debito_cuenta_cobrar_control.tiposReporte
															 	,debito_cuenta_cobrar_control.tiposPaginacion,debito_cuenta_cobrar_control.tiposAcciones
																,debito_cuenta_cobrar_control.tiposColumnasSelect,debito_cuenta_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(debito_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(debito_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(debito_cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(debito_cuenta_cobrar_control) {
	
		var indexPosition=debito_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=debito_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(debito_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarComboscuenta_cobrarsFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombostermino_pago_clientesFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.cargarCombosestadosFK(debito_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombossucursalsFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombosejerciciosFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombosperiodosFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombosusuariosFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarComboscuenta_cobrarsFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombostermino_pago_clientesFK(debito_cuenta_cobrar_control);
				}

				if(debito_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					debito_cuenta_cobrar_webcontrol1.cargarCombosestadosFK(debito_cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_cobrarFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.cuenta_cobrarsFK);
	}

	cargarComboEditarTablatermino_pago_clienteFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.termino_pago_clientesFK);
	}

	cargarComboEditarTablaestadoFK(debito_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_control.estadosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(debito_cuenta_cobrar_control) {
		jQuery("#divBusquedadebito_cuenta_cobrarAjaxWebPart").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trdebito_cuenta_cobrarCabeceraBusquedas").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedadebito_cuenta_cobrar").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(debito_cuenta_cobrar_control.htmlTablaOrderBy!=null
			&& debito_cuenta_cobrar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydebito_cuenta_cobrarAjaxWebPart").html(debito_cuenta_cobrar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//debito_cuenta_cobrar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(debito_cuenta_cobrar_control.htmlTablaOrderByRel!=null
			&& debito_cuenta_cobrar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldebito_cuenta_cobrarAjaxWebPart").html(debito_cuenta_cobrar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadebito_cuenta_cobrarAjaxWebPart").css("display","none");
			jQuery("#trdebito_cuenta_cobrarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadebito_cuenta_cobrar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(debito_cuenta_cobrar_control) {
		
		if(!debito_cuenta_cobrar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(debito_cuenta_cobrar_control);
		} else {
			jQuery("#divTablaDatosdebito_cuenta_cobrarsAjaxWebPart").html(debito_cuenta_cobrar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdebito_cuenta_cobrars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdebito_cuenta_cobrars=jQuery("#tblTablaDatosdebito_cuenta_cobrars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("debito_cuenta_cobrar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',debito_cuenta_cobrar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			debito_cuenta_cobrar_webcontrol1.registrarControlesTableEdition(debito_cuenta_cobrar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		debito_cuenta_cobrar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(debito_cuenta_cobrar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("debito_cuenta_cobrar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(debito_cuenta_cobrar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdebito_cuenta_cobrarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(debito_cuenta_cobrar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(debito_cuenta_cobrar_control);
		
		const divOrderBy = document.getElementById("divOrderBydebito_cuenta_cobrarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(debito_cuenta_cobrar_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldebito_cuenta_cobrarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(debito_cuenta_cobrar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(debito_cuenta_cobrar_control);			
		}
	}
	
	actualizarCamposFilaTabla(debito_cuenta_cobrar_control) {
		var i=0;
		
		i=debito_cuenta_cobrar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id);
		jQuery("#t-version_row_"+i+"").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.versionRow);
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_3").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_4").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo) {
				jQuery("#t-cel_"+i+"_5").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario) {
				jQuery("#t-cel_"+i+"_6").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_7").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_cuenta_cobrar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.numero);
		jQuery("#t-cel_"+i+"_9").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.fecha_emision);
		jQuery("#t-cel_"+i+"_10").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.fecha_vence);
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_termino_pago_cliente!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_termino_pago_cliente>-1){
			if(jQuery("#t-cel_"+i+"_11").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_termino_pago_cliente) {
				jQuery("#t-cel_"+i+"_11").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_termino_pago_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_11").select2("val", null);
			if(jQuery("#t-cel_"+i+"_11").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_11").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_12").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.monto);
		jQuery("#t-cel_"+i+"_13").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.saldo);
		jQuery("#t-cel_"+i+"_14").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.descripcion);
		jQuery("#t-cel_"+i+"_15").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.sub_total);
		jQuery("#t-cel_"+i+"_16").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.iva);
		jQuery("#t-cel_"+i+"_17").prop('checked',debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.es_balance_inicial);
		
		if(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado!=null && debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_18").val() != debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado) {
				jQuery("#t-cel_"+i+"_18").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_18").select2("val", null);
			if(jQuery("#t-cel_"+i+"_18").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_18").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_19").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.referencia);
		jQuery("#t-cel_"+i+"_20").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.debito);
		jQuery("#t-cel_"+i+"_21").val(debito_cuenta_cobrar_control.debito_cuenta_cobrarActual.credito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(debito_cuenta_cobrar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(debito_cuenta_cobrar_control) {
		debito_cuenta_cobrar_funcion1.registrarControlesTableValidacionEdition(debito_cuenta_cobrar_control,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(debito_cuenta_cobrar_control) {
		jQuery("#divResumendebito_cuenta_cobrarActualAjaxWebPart").html(debito_cuenta_cobrar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(debito_cuenta_cobrar_control) {
		//jQuery("#divAccionesRelacionesdebito_cuenta_cobrarAjaxWebPart").html(debito_cuenta_cobrar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("debito_cuenta_cobrar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(debito_cuenta_cobrar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdebito_cuenta_cobrarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		debito_cuenta_cobrar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(debito_cuenta_cobrar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(debito_cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(debito_cuenta_cobrar_control) {
		
		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idcuenta_cobrar);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idcuenta_cobrar);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idejercicio);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idempresa);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idestado);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idperiodo);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idsucursal);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idtermino_pago_cliente);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idtermino_pago_cliente);
		}

		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",debito_cuenta_cobrar_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondebito_cuenta_cobrar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("debito_cuenta_cobrar",id,"cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","empresa","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","sucursal","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","ejercicio","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","periodo","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","usuario","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParacuenta_cobrar(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","termino_pago_cliente","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		debito_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("debito_cuenta_cobrar","estado","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrarConstante,strParametros);
		
		//debito_cuenta_cobrar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa",debito_cuenta_cobrar_control.empresasFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_2",debito_cuenta_cobrar_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal",debito_cuenta_cobrar_control.sucursalsFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_3",debito_cuenta_cobrar_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio",debito_cuenta_cobrar_control.ejerciciosFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_4",debito_cuenta_cobrar_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo",debito_cuenta_cobrar_control.periodosFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_5",debito_cuenta_cobrar_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario",debito_cuenta_cobrar_control.usuariosFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_6",debito_cuenta_cobrar_control.usuariosFK);
		}
	};

	cargarComboscuenta_cobrarsFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar",debito_cuenta_cobrar_control.cuenta_cobrarsFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_7",debito_cuenta_cobrar_control.cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar",debito_cuenta_cobrar_control.cuenta_cobrarsFK);

	};

	cargarCombostermino_pago_clientesFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente",debito_cuenta_cobrar_control.termino_pago_clientesFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_11",debito_cuenta_cobrar_control.termino_pago_clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente",debito_cuenta_cobrar_control.termino_pago_clientesFK);

	};

	cargarCombosestadosFK(debito_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado",debito_cuenta_cobrar_control.estadosFK);

		if(debito_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+debito_cuenta_cobrar_control.idFilaTablaActual+"_18",debito_cuenta_cobrar_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",debito_cuenta_cobrar_control.estadosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombossucursalsFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosperiodosFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosusuariosFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeComboscuenta_cobrarsFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombostermino_pago_clientesFK(debito_cuenta_cobrar_control) {

	};

	registrarComboActionChangeCombosestadosFK(debito_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idempresaDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != debito_cuenta_cobrar_control.idempresaDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(debito_cuenta_cobrar_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idsucursalDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val() != debito_cuenta_cobrar_control.idsucursalDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal").val(debito_cuenta_cobrar_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idejercicioDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val() != debito_cuenta_cobrar_control.idejercicioDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio").val(debito_cuenta_cobrar_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idperiodoDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val() != debito_cuenta_cobrar_control.idperiodoDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo").val(debito_cuenta_cobrar_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idusuarioDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val() != debito_cuenta_cobrar_control.idusuarioDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario").val(debito_cuenta_cobrar_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_cobrarsFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val() != debito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar").val(debito_cuenta_cobrar_control.idcuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(debito_cuenta_cobrar_control.idcuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idcuenta_cobrar-cmbid_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pago_clientesFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idtermino_pago_clienteDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val() != debito_cuenta_cobrar_control.idtermino_pago_clienteDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente").val(debito_cuenta_cobrar_control.idtermino_pago_clienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente").val(debito_cuenta_cobrar_control.idtermino_pago_clienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idtermino_pago_cliente-cmbid_termino_pago_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(debito_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(debito_cuenta_cobrar_control.idestadoDefaultFK>-1 && jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val() != debito_cuenta_cobrar_control.idestadoDefaultFK) {
				jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado").val(debito_cuenta_cobrar_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(debito_cuenta_cobrar_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//debito_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(debito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombosempresasFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombossucursalsFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombosejerciciosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombosperiodosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombosusuariosFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorComboscuenta_cobrarsFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombostermino_pago_clientesFK(debito_cuenta_cobrar_control);
			}

			if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				debito_cuenta_cobrar_webcontrol1.setDefectoValorCombosestadosFK(debito_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(debito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosempresasFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombossucursalsFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosejerciciosFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosperiodosFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosusuariosFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_cobrar",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeComboscuenta_cobrarsFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago_cliente",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombostermino_pago_clientesFK(debito_cuenta_cobrar_control);
			//}

			//if(debito_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",debito_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				debito_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosestadosFK(debito_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(debito_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(debito_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(debito_cuenta_cobrar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idcuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idejercicio","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idempresa","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idestado","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idperiodo","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idsucursal","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idtermino_pago_cliente","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("debito_cuenta_cobrar","FK_Idusuario","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
		
			
			if(debito_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("debito_cuenta_cobrar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("debito_cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,"debito_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_cobrar","id_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_cuenta_cobrar_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParacuenta_cobrar("id_cuenta_cobrar");
				//alert(jQuery('#form-id_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago_cliente","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_termino_pago_cliente_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago_cliente");
				//alert(jQuery('#form-id_termino_pago_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+debito_cuenta_cobrar_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				debito_cuenta_cobrar_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(debito_cuenta_cobrar_control) {
		
		jQuery("#divBusquedadebito_cuenta_cobrarAjaxWebPart").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trdebito_cuenta_cobrarCabeceraBusquedas").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedadebito_cuenta_cobrar").css("display",debito_cuenta_cobrar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedebito_cuenta_cobrar").css("display",debito_cuenta_cobrar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdebito_cuenta_cobrar").attr("style",debito_cuenta_cobrar_control.strPermisoMostrarTodos);		
		
		if(debito_cuenta_cobrar_control.strPermisoNuevo!=null) {
			jQuery("#tddebito_cuenta_cobrarNuevo").css("display",debito_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tddebito_cuenta_cobrarNuevoToolBar").css("display",debito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddebito_cuenta_cobrarDuplicar").css("display",debito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddebito_cuenta_cobrarDuplicarToolBar").css("display",debito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddebito_cuenta_cobrarNuevoGuardarCambios").css("display",debito_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tddebito_cuenta_cobrarNuevoGuardarCambiosToolBar").css("display",debito_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(debito_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tddebito_cuenta_cobrarCopiar").css("display",debito_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddebito_cuenta_cobrarCopiarToolBar").css("display",debito_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddebito_cuenta_cobrarConEditar").css("display",debito_cuenta_cobrar_control.strPermisoActualizar);
		}
		
		jQuery("#tddebito_cuenta_cobrarGuardarCambios").css("display",debito_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddebito_cuenta_cobrarGuardarCambiosToolBar").css("display",debito_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddebito_cuenta_cobrarCerrarPagina").css("display",debito_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tddebito_cuenta_cobrarCerrarPaginaToolBar").css("display",debito_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trdebito_cuenta_cobrarAccionesRelaciones").css("display",debito_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=debito_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + debito_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + debito_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Debito Cuenta Cobrars";
		sTituloBanner+=" - " + debito_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + debito_cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddebito_cuenta_cobrarRelacionesToolBar").css("display",debito_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdebito_cuenta_cobrar").css("display",debito_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		debito_cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		debito_cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		debito_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		debito_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(debito_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			debito_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(debito_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				debito_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(debito_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(debito_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				debito_cuenta_cobrar_webcontrol1.onLoad();
			
			//} else {
				//if(debito_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			debito_cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("debito_cuenta_cobrar","cuentascobrar","",debito_cuenta_cobrar_funcion1,debito_cuenta_cobrar_webcontrol1,debito_cuenta_cobrar_constante1);	
	}
}

var debito_cuenta_cobrar_webcontrol1 = new debito_cuenta_cobrar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {debito_cuenta_cobrar_webcontrol,debito_cuenta_cobrar_webcontrol1};

//Para ser llamado desde window.opener
window.debito_cuenta_cobrar_webcontrol1 = debito_cuenta_cobrar_webcontrol1;


if(debito_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = debito_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>