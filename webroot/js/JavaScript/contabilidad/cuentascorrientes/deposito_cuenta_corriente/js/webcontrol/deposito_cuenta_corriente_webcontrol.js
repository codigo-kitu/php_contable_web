//<script type="text/javascript" language="javascript">



//var deposito_cuenta_corrienteJQueryPaginaWebInteraccion= function (deposito_cuenta_corriente_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {deposito_cuenta_corriente_constante,deposito_cuenta_corriente_constante1} from '../util/deposito_cuenta_corriente_constante.js';

import {deposito_cuenta_corriente_funcion,deposito_cuenta_corriente_funcion1} from '../util/deposito_cuenta_corriente_funcion.js';


class deposito_cuenta_corriente_webcontrol extends GeneralEntityWebControl {
	
	deposito_cuenta_corriente_control=null;
	deposito_cuenta_corriente_controlInicial=null;
	deposito_cuenta_corriente_controlAuxiliar=null;
		
	//if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(deposito_cuenta_corriente_control) {
		super();
		
		this.deposito_cuenta_corriente_control=deposito_cuenta_corriente_control;
	}
		
	actualizarVariablesPagina(deposito_cuenta_corriente_control) {
		
		if(deposito_cuenta_corriente_control.action=="index" || deposito_cuenta_corriente_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(deposito_cuenta_corriente_control);
			
		} 
		
		
		else if(deposito_cuenta_corriente_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(deposito_cuenta_corriente_control);
			
		} else if(deposito_cuenta_corriente_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(deposito_cuenta_corriente_control);
			
		} else if(deposito_cuenta_corriente_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(deposito_cuenta_corriente_control);		
		
		} else if(deposito_cuenta_corriente_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(deposito_cuenta_corriente_control);
		
		}  else if(deposito_cuenta_corriente_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(deposito_cuenta_corriente_control);
		
		} else if(deposito_cuenta_corriente_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(deposito_cuenta_corriente_control);		
		
		} else if(deposito_cuenta_corriente_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(deposito_cuenta_corriente_control);		
		
		} else if(deposito_cuenta_corriente_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(deposito_cuenta_corriente_control);		
		
		} else if(deposito_cuenta_corriente_control.action.includes("Busqueda") ||
				  deposito_cuenta_corriente_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(deposito_cuenta_corriente_control);
			
		} else if(deposito_cuenta_corriente_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(deposito_cuenta_corriente_control)
		}
		
		
		
	
		else if(deposito_cuenta_corriente_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(deposito_cuenta_corriente_control);	
		
		} else if(deposito_cuenta_corriente_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(deposito_cuenta_corriente_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + deposito_cuenta_corriente_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(deposito_cuenta_corriente_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(deposito_cuenta_corriente_control) {
		this.actualizarPaginaAccionesGenerales(deposito_cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(deposito_cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(deposito_cuenta_corriente_control);
		this.actualizarPaginaOrderBy(deposito_cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(deposito_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(deposito_cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(deposito_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(deposito_cuenta_corriente_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(deposito_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(deposito_cuenta_corriente_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(deposito_cuenta_corriente_control) {
		
		this.actualizarPaginaCargaGeneral(deposito_cuenta_corriente_control);
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);
		this.actualizarPaginaCargaGeneralControles(deposito_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(deposito_cuenta_corriente_control);
		this.actualizarPaginaAreaBusquedas(deposito_cuenta_corriente_control);
		this.actualizarPaginaCargaCombosFK(deposito_cuenta_corriente_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);		
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(deposito_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(deposito_cuenta_corriente_control) {
		this.actualizarPaginaAbrirLink(deposito_cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);				
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(deposito_cuenta_corriente_control) {
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);
		this.onLoadCombosDefectoFK(deposito_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);
		//this.actualizarPaginaFormulario(deposito_cuenta_corriente_control);
		this.onLoadCombosDefectoFK(deposito_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);		
		//this.actualizarPaginaAreaMantenimiento(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(deposito_cuenta_corriente_control) {
		this.actualizarPaginaAbrirLink(deposito_cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(deposito_cuenta_corriente_control) {
		this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(deposito_cuenta_corriente_control) {
					//super.actualizarPaginaImprimir(deposito_cuenta_corriente_control,"deposito_cuenta_corriente");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",deposito_cuenta_corriente_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("deposito_cuenta_corriente_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(deposito_cuenta_corriente_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(deposito_cuenta_corriente_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(deposito_cuenta_corriente_control) {
		//super.actualizarPaginaImprimir(deposito_cuenta_corriente_control,"deposito_cuenta_corriente");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("deposito_cuenta_corriente_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(deposito_cuenta_corriente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",deposito_cuenta_corriente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(deposito_cuenta_corriente_control) {
		//super.actualizarPaginaImprimir(deposito_cuenta_corriente_control,"deposito_cuenta_corriente");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("deposito_cuenta_corriente_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(deposito_cuenta_corriente_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",deposito_cuenta_corriente_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(deposito_cuenta_corriente_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(deposito_cuenta_corriente_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(deposito_cuenta_corriente_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(deposito_cuenta_corriente_control);
			
		this.actualizarPaginaAbrirLink(deposito_cuenta_corriente_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(deposito_cuenta_corriente_control) {
		
		if(deposito_cuenta_corriente_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(deposito_cuenta_corriente_control);
		}
		
		if(deposito_cuenta_corriente_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(deposito_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(deposito_cuenta_corriente_control) {
		if(deposito_cuenta_corriente_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("deposito_cuenta_corrienteReturnGeneral",JSON.stringify(deposito_cuenta_corriente_control.deposito_cuenta_corrienteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(deposito_cuenta_corriente_control) {
		if(deposito_cuenta_corriente_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && deposito_cuenta_corriente_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(deposito_cuenta_corriente_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(deposito_cuenta_corriente_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(deposito_cuenta_corriente_control, mostrar) {
		
		if(mostrar==true) {
			deposito_cuenta_corriente_funcion1.resaltarRestaurarDivsPagina(false,"deposito_cuenta_corriente");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				deposito_cuenta_corriente_funcion1.resaltarRestaurarDivMantenimiento(false,"deposito_cuenta_corriente");
			}			
			
			deposito_cuenta_corriente_funcion1.mostrarDivMensaje(true,deposito_cuenta_corriente_control.strAuxiliarMensaje,deposito_cuenta_corriente_control.strAuxiliarCssMensaje);
		
		} else {
			deposito_cuenta_corriente_funcion1.mostrarDivMensaje(false,deposito_cuenta_corriente_control.strAuxiliarMensaje,deposito_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(deposito_cuenta_corriente_control) {
		if(deposito_cuenta_corriente_funcion1.esPaginaForm(deposito_cuenta_corriente_constante1)==true) {
			window.opener.deposito_cuenta_corriente_webcontrol1.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);
		} else {
			this.actualizarPaginaTablaDatos(deposito_cuenta_corriente_control);
		}
	}
	
	actualizarPaginaAbrirLink(deposito_cuenta_corriente_control) {
		deposito_cuenta_corriente_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(deposito_cuenta_corriente_control.strAuxiliarUrlPagina);
				
		deposito_cuenta_corriente_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(deposito_cuenta_corriente_control.strAuxiliarTipo,deposito_cuenta_corriente_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(deposito_cuenta_corriente_control) {
		deposito_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,deposito_cuenta_corriente_control.strAuxiliarMensajeAlert,deposito_cuenta_corriente_control.strAuxiliarCssMensaje);
			
		if(deposito_cuenta_corriente_funcion1.esPaginaForm(deposito_cuenta_corriente_constante1)==true) {
			window.opener.deposito_cuenta_corriente_funcion1.resaltarRestaurarDivMensaje(true,deposito_cuenta_corriente_control.strAuxiliarMensajeAlert,deposito_cuenta_corriente_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(deposito_cuenta_corriente_control) {
		this.deposito_cuenta_corriente_controlInicial=deposito_cuenta_corriente_control;
			
		if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(deposito_cuenta_corriente_control.strStyleDivArbol,deposito_cuenta_corriente_control.strStyleDivContent
																,deposito_cuenta_corriente_control.strStyleDivOpcionesBanner,deposito_cuenta_corriente_control.strStyleDivExpandirColapsar
																,deposito_cuenta_corriente_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=deposito_cuenta_corriente_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",deposito_cuenta_corriente_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(deposito_cuenta_corriente_control) {
		this.actualizarCssBotonesPagina(deposito_cuenta_corriente_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(deposito_cuenta_corriente_control.tiposReportes,deposito_cuenta_corriente_control.tiposReporte
															 	,deposito_cuenta_corriente_control.tiposPaginacion,deposito_cuenta_corriente_control.tiposAcciones
																,deposito_cuenta_corriente_control.tiposColumnasSelect,deposito_cuenta_corriente_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(deposito_cuenta_corriente_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(deposito_cuenta_corriente_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(deposito_cuenta_corriente_control);			
	}
	
	actualizarPaginaUsuarioInvitado(deposito_cuenta_corriente_control) {
	
		var indexPosition=deposito_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=deposito_cuenta_corriente_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(deposito_cuenta_corriente_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombosempresasFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!=null && deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!='NINGUNO' && deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!='') {
			
				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombosempresasFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombossucursalsFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombosejerciciosFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombosperiodosFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombosusuariosFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_corriente",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarComboscuenta_corrientesFK(deposito_cuenta_corriente_control);
				}

				if(deposito_cuenta_corriente_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",deposito_cuenta_corriente_control.strRecargarFkTiposNinguno,",")) { 
					deposito_cuenta_corriente_webcontrol1.cargarCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.usuariosFK);
	}

	cargarComboEditarTablacuenta_corrienteFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.cuenta_corrientesFK);
	}

	cargarComboEditarTablaestado_deposito_retiroFK(deposito_cuenta_corriente_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_control.estado_deposito_retirosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(deposito_cuenta_corriente_control) {
		jQuery("#divBusquedadeposito_cuenta_corrienteAjaxWebPart").css("display",deposito_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trdeposito_cuenta_corrienteCabeceraBusquedas").css("display",deposito_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trBusquedadeposito_cuenta_corriente").css("display",deposito_cuenta_corriente_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(deposito_cuenta_corriente_control.htmlTablaOrderBy!=null
			&& deposito_cuenta_corriente_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBydeposito_cuenta_corrienteAjaxWebPart").html(deposito_cuenta_corriente_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//deposito_cuenta_corriente_webcontrol1.registrarOrderByActions();
			
		}
			
		if(deposito_cuenta_corriente_control.htmlTablaOrderByRel!=null
			&& deposito_cuenta_corriente_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReldeposito_cuenta_corrienteAjaxWebPart").html(deposito_cuenta_corriente_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedadeposito_cuenta_corrienteAjaxWebPart").css("display","none");
			jQuery("#trdeposito_cuenta_corrienteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedadeposito_cuenta_corriente").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(deposito_cuenta_corriente_control) {
		
		if(!deposito_cuenta_corriente_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(deposito_cuenta_corriente_control);
		} else {
			jQuery("#divTablaDatosdeposito_cuenta_corrientesAjaxWebPart").html(deposito_cuenta_corriente_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosdeposito_cuenta_corrientes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosdeposito_cuenta_corrientes=jQuery("#tblTablaDatosdeposito_cuenta_corrientes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("deposito_cuenta_corriente",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',deposito_cuenta_corriente_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			deposito_cuenta_corriente_webcontrol1.registrarControlesTableEdition(deposito_cuenta_corriente_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		deposito_cuenta_corriente_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(deposito_cuenta_corriente_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("deposito_cuenta_corriente_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(deposito_cuenta_corriente_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosdeposito_cuenta_corrientesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(deposito_cuenta_corriente_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(deposito_cuenta_corriente_control);
		
		const divOrderBy = document.getElementById("divOrderBydeposito_cuenta_corrienteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(deposito_cuenta_corriente_control);
		
		const divOrderByRel = document.getElementById("divOrderByReldeposito_cuenta_corrienteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(deposito_cuenta_corriente_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(deposito_cuenta_corriente_control);			
		}
	}
	
	actualizarCamposFilaTabla(deposito_cuenta_corriente_control) {
		var i=0;
		
		i=deposito_cuenta_corriente_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id);
		jQuery("#t-version_row_"+i+"").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.versionRow);
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_empresa!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_sucursal!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_4").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_ejercicio!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_5").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_periodo!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_periodo) {
				jQuery("#t-cel_"+i+"_6").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_usuario!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_usuario) {
				jQuery("#t-cel_"+i+"_7").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_cuenta_corriente!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_cuenta_corriente>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_cuenta_corriente) {
				jQuery("#t-cel_"+i+"_8").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_cuenta_corriente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.fecha_emision);
		jQuery("#t-cel_"+i+"_10").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.monto);
		jQuery("#t-cel_"+i+"_11").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.monto_texto);
		jQuery("#t-cel_"+i+"_12").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.saldo);
		jQuery("#t-cel_"+i+"_13").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.descripcion);
		jQuery("#t-cel_"+i+"_14").prop('checked',deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.es_balance_inicial);
		
		if(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_estado_deposito_retiro!=null && deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_estado_deposito_retiro>-1){
			if(jQuery("#t-cel_"+i+"_15").val() != deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_estado_deposito_retiro) {
				jQuery("#t-cel_"+i+"_15").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.id_estado_deposito_retiro).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_15").select2("val", null);
			if(jQuery("#t-cel_"+i+"_15").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_15").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_16").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.debito);
		jQuery("#t-cel_"+i+"_17").val(deposito_cuenta_corriente_control.deposito_cuenta_corrienteActual.credito);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(deposito_cuenta_corriente_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(deposito_cuenta_corriente_control) {
		deposito_cuenta_corriente_funcion1.registrarControlesTableValidacionEdition(deposito_cuenta_corriente_control,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(deposito_cuenta_corriente_control) {
		jQuery("#divResumendeposito_cuenta_corrienteActualAjaxWebPart").html(deposito_cuenta_corriente_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(deposito_cuenta_corriente_control) {
		//jQuery("#divAccionesRelacionesdeposito_cuenta_corrienteAjaxWebPart").html(deposito_cuenta_corriente_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("deposito_cuenta_corriente_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(deposito_cuenta_corriente_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesdeposito_cuenta_corrienteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		deposito_cuenta_corriente_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(deposito_cuenta_corriente_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(deposito_cuenta_corriente_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(deposito_cuenta_corriente_control) {
		
		if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idcuenta_corriente);
			jQuery("#tblstrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idcuenta_corriente);
		}

		if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idejercicio);
		}

		if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idempresa);
		}

		if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idestado_deposito_retiro);
			jQuery("#tblstrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idestado_deposito_retiro);
		}

		if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idperiodo);
		}

		if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idsucursal);
		}

		if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",deposito_cuenta_corriente_control.strVisibleFK_Idusuario);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciondeposito_cuenta_corriente();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("deposito_cuenta_corriente",id,"cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		deposito_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("deposito_cuenta_corriente","empresa","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		deposito_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("deposito_cuenta_corriente","sucursal","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		deposito_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("deposito_cuenta_corriente","ejercicio","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		deposito_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("deposito_cuenta_corriente","periodo","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		deposito_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("deposito_cuenta_corriente","usuario","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
	}

	abrirBusquedaParacuenta_corriente(strNombreCampoBusqueda){//idActual
		deposito_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("deposito_cuenta_corriente","cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
	}

	abrirBusquedaParaestado_deposito_retiro(strNombreCampoBusqueda){//idActual
		deposito_cuenta_corriente_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("deposito_cuenta_corriente","estado_deposito_retiro","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corrienteConstante,strParametros);
		
		//deposito_cuenta_corriente_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa",deposito_cuenta_corriente_control.empresasFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_3",deposito_cuenta_corriente_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal",deposito_cuenta_corriente_control.sucursalsFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_4",deposito_cuenta_corriente_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio",deposito_cuenta_corriente_control.ejerciciosFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_5",deposito_cuenta_corriente_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo",deposito_cuenta_corriente_control.periodosFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_6",deposito_cuenta_corriente_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario",deposito_cuenta_corriente_control.usuariosFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_7",deposito_cuenta_corriente_control.usuariosFK);
		}
	};

	cargarComboscuenta_corrientesFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente",deposito_cuenta_corriente_control.cuenta_corrientesFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_8",deposito_cuenta_corriente_control.cuenta_corrientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente",deposito_cuenta_corriente_control.cuenta_corrientesFK);

	};

	cargarCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro",deposito_cuenta_corriente_control.estado_deposito_retirosFK);

		if(deposito_cuenta_corriente_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+deposito_cuenta_corriente_control.idFilaTablaActual+"_15",deposito_cuenta_corriente_control.estado_deposito_retirosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro",deposito_cuenta_corriente_control.estado_deposito_retirosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombossucursalsFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosperiodosFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosusuariosFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeComboscuenta_corrientesFK(deposito_cuenta_corriente_control) {

	};

	registrarComboActionChangeCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control) {

	};

	
	
	setDefectoValorCombosempresasFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idempresaDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val() != deposito_cuenta_corriente_control.idempresaDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa").val(deposito_cuenta_corriente_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idsucursalDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val() != deposito_cuenta_corriente_control.idsucursalDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal").val(deposito_cuenta_corriente_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idejercicioDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val() != deposito_cuenta_corriente_control.idejercicioDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio").val(deposito_cuenta_corriente_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idperiodoDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val() != deposito_cuenta_corriente_control.idperiodoDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo").val(deposito_cuenta_corriente_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idusuarioDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val() != deposito_cuenta_corriente_control.idusuarioDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario").val(deposito_cuenta_corriente_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_corrientesFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idcuenta_corrienteDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val() != deposito_cuenta_corriente_control.idcuenta_corrienteDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente").val(deposito_cuenta_corriente_control.idcuenta_corrienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(deposito_cuenta_corriente_control.idcuenta_corrienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idcuenta_corriente-cmbid_cuenta_corriente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(deposito_cuenta_corriente_control.idestado_deposito_retiroDefaultFK>-1 && jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val() != deposito_cuenta_corriente_control.idestado_deposito_retiroDefaultFK) {
				jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro").val(deposito_cuenta_corriente_control.idestado_deposito_retiroDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(deposito_cuenta_corriente_control.idestado_deposito_retiroDefaultForeignKey).trigger("change");
			if(jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"FK_Idestado_deposito_retiro-cmbid_estado_deposito_retiro").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//deposito_cuenta_corriente_control
		
	
	}
	
	onLoadCombosDefectoFK(deposito_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(deposito_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombosempresasFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombossucursalsFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombosejerciciosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombosperiodosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombosusuariosFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorComboscuenta_corrientesFK(deposito_cuenta_corriente_control);
			}

			if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 
				deposito_cuenta_corriente_webcontrol1.setDefectoValorCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control);
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
	onLoadCombosEventosFK(deposito_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(deposito_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosempresasFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombossucursalsFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosejerciciosFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosperiodosFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosusuariosFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_corriente",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeComboscuenta_corrientesFK(deposito_cuenta_corriente_control);
			//}

			//if(deposito_cuenta_corriente_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado_deposito_retiro",deposito_cuenta_corriente_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				deposito_cuenta_corriente_webcontrol1.registrarComboActionChangeCombosestado_deposito_retirosFK(deposito_cuenta_corriente_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(deposito_cuenta_corriente_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(deposito_cuenta_corriente_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(deposito_cuenta_corriente_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("deposito_cuenta_corriente","FK_Idcuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("deposito_cuenta_corriente","FK_Idejercicio","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("deposito_cuenta_corriente","FK_Idempresa","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("deposito_cuenta_corriente","FK_Idestado_deposito_retiro","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("deposito_cuenta_corriente","FK_Idperiodo","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("deposito_cuenta_corriente","FK_Idsucursal","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("deposito_cuenta_corriente","FK_Idusuario","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
		
			
			if(deposito_cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("deposito_cuenta_corriente");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("deposito_cuenta_corriente");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,"deposito_cuenta_corriente");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta_corriente","id_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_cuenta_corriente_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParacuenta_corriente("id_cuenta_corriente");
				//alert(jQuery('#form-id_cuenta_corriente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado_deposito_retiro","id_estado_deposito_retiro","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+deposito_cuenta_corriente_constante1.STR_SUFIJO+"-id_estado_deposito_retiro_img_busqueda").click(function(){
				deposito_cuenta_corriente_webcontrol1.abrirBusquedaParaestado_deposito_retiro("id_estado_deposito_retiro");
				//alert(jQuery('#form-id_estado_deposito_retiro_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(deposito_cuenta_corriente_control) {
		
		jQuery("#divBusquedadeposito_cuenta_corrienteAjaxWebPart").css("display",deposito_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trdeposito_cuenta_corrienteCabeceraBusquedas").css("display",deposito_cuenta_corriente_control.strPermisoBusqueda);
		jQuery("#trBusquedadeposito_cuenta_corriente").css("display",deposito_cuenta_corriente_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportedeposito_cuenta_corriente").css("display",deposito_cuenta_corriente_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosdeposito_cuenta_corriente").attr("style",deposito_cuenta_corriente_control.strPermisoMostrarTodos);		
		
		if(deposito_cuenta_corriente_control.strPermisoNuevo!=null) {
			jQuery("#tddeposito_cuenta_corrienteNuevo").css("display",deposito_cuenta_corriente_control.strPermisoNuevo);
			jQuery("#tddeposito_cuenta_corrienteNuevoToolBar").css("display",deposito_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tddeposito_cuenta_corrienteDuplicar").css("display",deposito_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddeposito_cuenta_corrienteDuplicarToolBar").css("display",deposito_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tddeposito_cuenta_corrienteNuevoGuardarCambios").css("display",deposito_cuenta_corriente_control.strPermisoNuevo);
			jQuery("#tddeposito_cuenta_corrienteNuevoGuardarCambiosToolBar").css("display",deposito_cuenta_corriente_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(deposito_cuenta_corriente_control.strPermisoActualizar!=null) {
			jQuery("#tddeposito_cuenta_corrienteCopiar").css("display",deposito_cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddeposito_cuenta_corrienteCopiarToolBar").css("display",deposito_cuenta_corriente_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tddeposito_cuenta_corrienteConEditar").css("display",deposito_cuenta_corriente_control.strPermisoActualizar);
		}
		
		jQuery("#tddeposito_cuenta_corrienteGuardarCambios").css("display",deposito_cuenta_corriente_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tddeposito_cuenta_corrienteGuardarCambiosToolBar").css("display",deposito_cuenta_corriente_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tddeposito_cuenta_corrienteCerrarPagina").css("display",deposito_cuenta_corriente_control.strPermisoPopup);		
		jQuery("#tddeposito_cuenta_corrienteCerrarPaginaToolBar").css("display",deposito_cuenta_corriente_control.strPermisoPopup);
		//jQuery("#trdeposito_cuenta_corrienteAccionesRelaciones").css("display",deposito_cuenta_corriente_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=deposito_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + deposito_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + deposito_cuenta_corriente_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Deposito Cta Corrientes";
		sTituloBanner+=" - " + deposito_cuenta_corriente_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + deposito_cuenta_corriente_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tddeposito_cuenta_corrienteRelacionesToolBar").css("display",deposito_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosdeposito_cuenta_corriente").css("display",deposito_cuenta_corriente_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		deposito_cuenta_corriente_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		deposito_cuenta_corriente_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		deposito_cuenta_corriente_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		deposito_cuenta_corriente_webcontrol1.registrarEventosControles();
		
		if(deposito_cuenta_corriente_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
			deposito_cuenta_corriente_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONES=="true") {
			if(deposito_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				deposito_cuenta_corriente_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(deposito_cuenta_corriente_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(deposito_cuenta_corriente_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				deposito_cuenta_corriente_webcontrol1.onLoad();
			
			//} else {
				//if(deposito_cuenta_corriente_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			deposito_cuenta_corriente_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("deposito_cuenta_corriente","cuentascorrientes","",deposito_cuenta_corriente_funcion1,deposito_cuenta_corriente_webcontrol1,deposito_cuenta_corriente_constante1);	
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

var deposito_cuenta_corriente_webcontrol1 = new deposito_cuenta_corriente_webcontrol();

//Para ser llamado desde otro archivo (import)
export {deposito_cuenta_corriente_webcontrol,deposito_cuenta_corriente_webcontrol1};

//Para ser llamado desde window.opener
window.deposito_cuenta_corriente_webcontrol1 = deposito_cuenta_corriente_webcontrol1;


if(deposito_cuenta_corriente_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = deposito_cuenta_corriente_webcontrol1.onLoadWindow; 
}

//</script>