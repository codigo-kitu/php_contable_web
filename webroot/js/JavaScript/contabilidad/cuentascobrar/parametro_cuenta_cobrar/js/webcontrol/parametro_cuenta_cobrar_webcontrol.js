//<script type="text/javascript" language="javascript">



//var parametro_cuenta_cobrarJQueryPaginaWebInteraccion= function (parametro_cuenta_cobrar_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {parametro_cuenta_cobrar_constante,parametro_cuenta_cobrar_constante1} from '../util/parametro_cuenta_cobrar_constante.js';

import {parametro_cuenta_cobrar_funcion,parametro_cuenta_cobrar_funcion1} from '../util/parametro_cuenta_cobrar_funcion.js';


class parametro_cuenta_cobrar_webcontrol extends GeneralEntityWebControl {
	
	parametro_cuenta_cobrar_control=null;
	parametro_cuenta_cobrar_controlInicial=null;
	parametro_cuenta_cobrar_controlAuxiliar=null;
		
	//if(parametro_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(parametro_cuenta_cobrar_control) {
		super();
		
		this.parametro_cuenta_cobrar_control=parametro_cuenta_cobrar_control;
	}
		
	actualizarVariablesPagina(parametro_cuenta_cobrar_control) {
		
		if(parametro_cuenta_cobrar_control.action=="index" || parametro_cuenta_cobrar_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(parametro_cuenta_cobrar_control);
			
		} 
		
		
		else if(parametro_cuenta_cobrar_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(parametro_cuenta_cobrar_control);
			
		} else if(parametro_cuenta_cobrar_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(parametro_cuenta_cobrar_control);
			
		} else if(parametro_cuenta_cobrar_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_cuenta_cobrar_control);		
		
		} else if(parametro_cuenta_cobrar_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(parametro_cuenta_cobrar_control);
		
		}  else if(parametro_cuenta_cobrar_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_cuenta_cobrar_control);
		
		} else if(parametro_cuenta_cobrar_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_cuenta_cobrar_control);		
		
		} else if(parametro_cuenta_cobrar_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_cuenta_cobrar_control);		
		
		} else if(parametro_cuenta_cobrar_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_cuenta_cobrar_control);		
		
		} else if(parametro_cuenta_cobrar_control.action.includes("Busqueda") ||
				  parametro_cuenta_cobrar_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(parametro_cuenta_cobrar_control);
			
		} else if(parametro_cuenta_cobrar_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_cuenta_cobrar_control)
		}
		
		
		
	
		else if(parametro_cuenta_cobrar_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(parametro_cuenta_cobrar_control);	
		
		} else if(parametro_cuenta_cobrar_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_cuenta_cobrar_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + parametro_cuenta_cobrar_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(parametro_cuenta_cobrar_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaAccionesGenerales(parametro_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(parametro_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_cuenta_cobrar_control);
		this.actualizarPaginaOrderBy(parametro_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(parametro_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(parametro_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuenta_cobrar_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(parametro_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(parametro_cuenta_cobrar_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(parametro_cuenta_cobrar_control) {
		
		this.actualizarPaginaCargaGeneral(parametro_cuenta_cobrar_control);
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);
		this.actualizarPaginaCargaGeneralControles(parametro_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(parametro_cuenta_cobrar_control);
		this.actualizarPaginaAreaBusquedas(parametro_cuenta_cobrar_control);
		this.actualizarPaginaCargaCombosFK(parametro_cuenta_cobrar_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);		
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(parametro_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(parametro_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);				
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(parametro_cuenta_cobrar_control) {
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);
		//this.actualizarPaginaFormulario(parametro_cuenta_cobrar_control);
		this.onLoadCombosDefectoFK(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);		
		//this.actualizarPaginaAreaMantenimiento(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaAbrirLink(parametro_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(parametro_cuenta_cobrar_control) {
					//super.actualizarPaginaImprimir(parametro_cuenta_cobrar_control,"parametro_cuenta_cobrar");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_cuenta_cobrar_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("parametro_cuenta_cobrar_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_cuenta_cobrar_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_cuenta_cobrar_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(parametro_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(parametro_cuenta_cobrar_control,"parametro_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("parametro_cuenta_cobrar_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(parametro_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(parametro_cuenta_cobrar_control) {
		//super.actualizarPaginaImprimir(parametro_cuenta_cobrar_control,"parametro_cuenta_cobrar");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("parametro_cuenta_cobrar_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_cuenta_cobrar_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",parametro_cuenta_cobrar_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(parametro_cuenta_cobrar_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(parametro_cuenta_cobrar_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(parametro_cuenta_cobrar_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(parametro_cuenta_cobrar_control);
			
		this.actualizarPaginaAbrirLink(parametro_cuenta_cobrar_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(parametro_cuenta_cobrar_control) {
		
		if(parametro_cuenta_cobrar_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(parametro_cuenta_cobrar_control);
		}
		
		if(parametro_cuenta_cobrar_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(parametro_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(parametro_cuenta_cobrar_control) {
		if(parametro_cuenta_cobrar_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("parametro_cuenta_cobrarReturnGeneral",JSON.stringify(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(parametro_cuenta_cobrar_control) {
		if(parametro_cuenta_cobrar_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && parametro_cuenta_cobrar_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(parametro_cuenta_cobrar_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(parametro_cuenta_cobrar_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(parametro_cuenta_cobrar_control, mostrar) {
		
		if(mostrar==true) {
			parametro_cuenta_cobrar_funcion1.resaltarRestaurarDivsPagina(false,"parametro_cuenta_cobrar");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				parametro_cuenta_cobrar_funcion1.resaltarRestaurarDivMantenimiento(false,"parametro_cuenta_cobrar");
			}			
			
			parametro_cuenta_cobrar_funcion1.mostrarDivMensaje(true,parametro_cuenta_cobrar_control.strAuxiliarMensaje,parametro_cuenta_cobrar_control.strAuxiliarCssMensaje);
		
		} else {
			parametro_cuenta_cobrar_funcion1.mostrarDivMensaje(false,parametro_cuenta_cobrar_control.strAuxiliarMensaje,parametro_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(parametro_cuenta_cobrar_control) {
		if(parametro_cuenta_cobrar_funcion1.esPaginaForm(parametro_cuenta_cobrar_constante1)==true) {
			window.opener.parametro_cuenta_cobrar_webcontrol1.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);
		} else {
			this.actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control);
		}
	}
	
	actualizarPaginaAbrirLink(parametro_cuenta_cobrar_control) {
		parametro_cuenta_cobrar_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(parametro_cuenta_cobrar_control.strAuxiliarUrlPagina);
				
		parametro_cuenta_cobrar_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(parametro_cuenta_cobrar_control.strAuxiliarTipo,parametro_cuenta_cobrar_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(parametro_cuenta_cobrar_control) {
		parametro_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,parametro_cuenta_cobrar_control.strAuxiliarMensajeAlert,parametro_cuenta_cobrar_control.strAuxiliarCssMensaje);
			
		if(parametro_cuenta_cobrar_funcion1.esPaginaForm(parametro_cuenta_cobrar_constante1)==true) {
			window.opener.parametro_cuenta_cobrar_funcion1.resaltarRestaurarDivMensaje(true,parametro_cuenta_cobrar_control.strAuxiliarMensajeAlert,parametro_cuenta_cobrar_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(parametro_cuenta_cobrar_control) {
		this.parametro_cuenta_cobrar_controlInicial=parametro_cuenta_cobrar_control;
			
		if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(parametro_cuenta_cobrar_control.strStyleDivArbol,parametro_cuenta_cobrar_control.strStyleDivContent
																,parametro_cuenta_cobrar_control.strStyleDivOpcionesBanner,parametro_cuenta_cobrar_control.strStyleDivExpandirColapsar
																,parametro_cuenta_cobrar_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=parametro_cuenta_cobrar_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",parametro_cuenta_cobrar_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(parametro_cuenta_cobrar_control) {
		this.actualizarCssBotonesPagina(parametro_cuenta_cobrar_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(parametro_cuenta_cobrar_control.tiposReportes,parametro_cuenta_cobrar_control.tiposReporte
															 	,parametro_cuenta_cobrar_control.tiposPaginacion,parametro_cuenta_cobrar_control.tiposAcciones
																,parametro_cuenta_cobrar_control.tiposColumnasSelect,parametro_cuenta_cobrar_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(parametro_cuenta_cobrar_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(parametro_cuenta_cobrar_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(parametro_cuenta_cobrar_control);			
	}
	
	actualizarPaginaUsuarioInvitado(parametro_cuenta_cobrar_control) {
	
		var indexPosition=parametro_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=parametro_cuenta_cobrar_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(parametro_cuenta_cobrar_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(parametro_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				parametro_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(parametro_cuenta_cobrar_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(parametro_cuenta_cobrar_control.strRecargarFkTiposNinguno!=null && parametro_cuenta_cobrar_control.strRecargarFkTiposNinguno!='NINGUNO' && parametro_cuenta_cobrar_control.strRecargarFkTiposNinguno!='') {
			
				if(parametro_cuenta_cobrar_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",parametro_cuenta_cobrar_control.strRecargarFkTiposNinguno,",")) { 
					parametro_cuenta_cobrar_webcontrol1.cargarCombosempresasFK(parametro_cuenta_cobrar_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(parametro_cuenta_cobrar_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_control.empresasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(parametro_cuenta_cobrar_control) {
		jQuery("#divBusquedaparametro_cuenta_cobrarAjaxWebPart").css("display",parametro_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trparametro_cuenta_cobrarCabeceraBusquedas").css("display",parametro_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_cuenta_cobrar").css("display",parametro_cuenta_cobrar_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(parametro_cuenta_cobrar_control.htmlTablaOrderBy!=null
			&& parametro_cuenta_cobrar_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByparametro_cuenta_cobrarAjaxWebPart").html(parametro_cuenta_cobrar_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//parametro_cuenta_cobrar_webcontrol1.registrarOrderByActions();
			
		}
			
		if(parametro_cuenta_cobrar_control.htmlTablaOrderByRel!=null
			&& parametro_cuenta_cobrar_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelparametro_cuenta_cobrarAjaxWebPart").html(parametro_cuenta_cobrar_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaparametro_cuenta_cobrarAjaxWebPart").css("display","none");
			jQuery("#trparametro_cuenta_cobrarCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaparametro_cuenta_cobrar").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(parametro_cuenta_cobrar_control) {
		
		if(!parametro_cuenta_cobrar_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(parametro_cuenta_cobrar_control);
		} else {
			jQuery("#divTablaDatosparametro_cuenta_cobrarsAjaxWebPart").html(parametro_cuenta_cobrar_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosparametro_cuenta_cobrars=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosparametro_cuenta_cobrars=jQuery("#tblTablaDatosparametro_cuenta_cobrars").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("parametro_cuenta_cobrar",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',parametro_cuenta_cobrar_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			parametro_cuenta_cobrar_webcontrol1.registrarControlesTableEdition(parametro_cuenta_cobrar_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		parametro_cuenta_cobrar_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(parametro_cuenta_cobrar_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("parametro_cuenta_cobrar_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(parametro_cuenta_cobrar_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosparametro_cuenta_cobrarsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(parametro_cuenta_cobrar_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(parametro_cuenta_cobrar_control);
		
		const divOrderBy = document.getElementById("divOrderByparametro_cuenta_cobrarAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(parametro_cuenta_cobrar_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelparametro_cuenta_cobrarAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(parametro_cuenta_cobrar_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual!=null) {//form
			
			this.actualizarCamposFilaTabla(parametro_cuenta_cobrar_control);			
		}
	}
	
	actualizarCamposFilaTabla(parametro_cuenta_cobrar_control) {
		var i=0;
		
		i=parametro_cuenta_cobrar_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.id);
		jQuery("#t-version_row_"+i+"").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.versionRow);
		
		if(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.id_empresa!=null && parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.numero_cuenta_cobrar);
		jQuery("#t-cel_"+i+"_5").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.numero_debito);
		jQuery("#t-cel_"+i+"_6").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.numero_credito);
		jQuery("#t-cel_"+i+"_7").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.numero_pago);
		jQuery("#t-cel_"+i+"_8").prop('checked',parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.mostrar_anulado);
		jQuery("#t-cel_"+i+"_9").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.numero_cliente);
		jQuery("#t-cel_"+i+"_10").prop('checked',parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.con_cliente_inactivo);
		jQuery("#t-cel_"+i+"_11").val(parametro_cuenta_cobrar_control.parametro_cuenta_cobrarActual.nombre_registro_tributario);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(parametro_cuenta_cobrar_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(parametro_cuenta_cobrar_control) {
		parametro_cuenta_cobrar_funcion1.registrarControlesTableValidacionEdition(parametro_cuenta_cobrar_control,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(parametro_cuenta_cobrar_control) {
		jQuery("#divResumenparametro_cuenta_cobrarActualAjaxWebPart").html(parametro_cuenta_cobrar_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(parametro_cuenta_cobrar_control) {
		//jQuery("#divAccionesRelacionesparametro_cuenta_cobrarAjaxWebPart").html(parametro_cuenta_cobrar_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("parametro_cuenta_cobrar_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(parametro_cuenta_cobrar_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesparametro_cuenta_cobrarAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		parametro_cuenta_cobrar_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(parametro_cuenta_cobrar_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(parametro_cuenta_cobrar_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(parametro_cuenta_cobrar_control) {
		
		if(parametro_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_cuenta_cobrar_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",parametro_cuenta_cobrar_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionparametro_cuenta_cobrar();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("parametro_cuenta_cobrar",id,"cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		parametro_cuenta_cobrar_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("parametro_cuenta_cobrar","empresa","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrarConstante,strParametros);
		
		//parametro_cuenta_cobrar_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(parametro_cuenta_cobrar_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa",parametro_cuenta_cobrar_control.empresasFK);

		if(parametro_cuenta_cobrar_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+parametro_cuenta_cobrar_control.idFilaTablaActual+"_3",parametro_cuenta_cobrar_control.empresasFK);
		}
	};

	
	
	registrarComboActionChangeCombosempresasFK(parametro_cuenta_cobrar_control) {

	};

	
	
	setDefectoValorCombosempresasFK(parametro_cuenta_cobrar_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(parametro_cuenta_cobrar_control.idempresaDefaultFK>-1 && jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val() != parametro_cuenta_cobrar_control.idempresaDefaultFK) {
				jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa").val(parametro_cuenta_cobrar_control.idempresaDefaultFK).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//parametro_cuenta_cobrar_control
		
	
	}
	
	onLoadCombosDefectoFK(parametro_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(parametro_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_cuenta_cobrar_control.strRecargarFkTipos,",")) { 
				parametro_cuenta_cobrar_webcontrol1.setDefectoValorCombosempresasFK(parametro_cuenta_cobrar_control);
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
	onLoadCombosEventosFK(parametro_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(parametro_cuenta_cobrar_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",parametro_cuenta_cobrar_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				parametro_cuenta_cobrar_webcontrol1.registrarComboActionChangeCombosempresasFK(parametro_cuenta_cobrar_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(parametro_cuenta_cobrar_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(parametro_cuenta_cobrar_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(parametro_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(parametro_cuenta_cobrar_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("parametro_cuenta_cobrar","FK_Idempresa","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
		
			
			if(parametro_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("parametro_cuenta_cobrar");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("parametro_cuenta_cobrar");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,"parametro_cuenta_cobrar");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+parametro_cuenta_cobrar_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				parametro_cuenta_cobrar_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(parametro_cuenta_cobrar_control) {
		
		jQuery("#divBusquedaparametro_cuenta_cobrarAjaxWebPart").css("display",parametro_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trparametro_cuenta_cobrarCabeceraBusquedas").css("display",parametro_cuenta_cobrar_control.strPermisoBusqueda);
		jQuery("#trBusquedaparametro_cuenta_cobrar").css("display",parametro_cuenta_cobrar_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteparametro_cuenta_cobrar").css("display",parametro_cuenta_cobrar_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosparametro_cuenta_cobrar").attr("style",parametro_cuenta_cobrar_control.strPermisoMostrarTodos);		
		
		if(parametro_cuenta_cobrar_control.strPermisoNuevo!=null) {
			jQuery("#tdparametro_cuenta_cobrarNuevo").css("display",parametro_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdparametro_cuenta_cobrarNuevoToolBar").css("display",parametro_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdparametro_cuenta_cobrarDuplicar").css("display",parametro_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_cuenta_cobrarDuplicarToolBar").css("display",parametro_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdparametro_cuenta_cobrarNuevoGuardarCambios").css("display",parametro_cuenta_cobrar_control.strPermisoNuevo);
			jQuery("#tdparametro_cuenta_cobrarNuevoGuardarCambiosToolBar").css("display",parametro_cuenta_cobrar_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(parametro_cuenta_cobrar_control.strPermisoActualizar!=null) {
			jQuery("#tdparametro_cuenta_cobrarCopiar").css("display",parametro_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_cuenta_cobrarCopiarToolBar").css("display",parametro_cuenta_cobrar_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdparametro_cuenta_cobrarConEditar").css("display",parametro_cuenta_cobrar_control.strPermisoActualizar);
		}
		
		jQuery("#tdparametro_cuenta_cobrarGuardarCambios").css("display",parametro_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdparametro_cuenta_cobrarGuardarCambiosToolBar").css("display",parametro_cuenta_cobrar_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdparametro_cuenta_cobrarCerrarPagina").css("display",parametro_cuenta_cobrar_control.strPermisoPopup);		
		jQuery("#tdparametro_cuenta_cobrarCerrarPaginaToolBar").css("display",parametro_cuenta_cobrar_control.strPermisoPopup);
		//jQuery("#trparametro_cuenta_cobrarAccionesRelaciones").css("display",parametro_cuenta_cobrar_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=parametro_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + parametro_cuenta_cobrar_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Parametro Cuentas Cobrars";
		sTituloBanner+=" - " + parametro_cuenta_cobrar_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + parametro_cuenta_cobrar_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdparametro_cuenta_cobrarRelacionesToolBar").css("display",parametro_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosparametro_cuenta_cobrar").css("display",parametro_cuenta_cobrar_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		parametro_cuenta_cobrar_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		parametro_cuenta_cobrar_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		parametro_cuenta_cobrar_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		parametro_cuenta_cobrar_webcontrol1.registrarEventosControles();
		
		if(parametro_cuenta_cobrar_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
			parametro_cuenta_cobrar_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONES=="true") {
			if(parametro_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				parametro_cuenta_cobrar_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(parametro_cuenta_cobrar_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(parametro_cuenta_cobrar_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				parametro_cuenta_cobrar_webcontrol1.onLoad();
			
			//} else {
				//if(parametro_cuenta_cobrar_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			parametro_cuenta_cobrar_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("parametro_cuenta_cobrar","cuentascobrar","",parametro_cuenta_cobrar_funcion1,parametro_cuenta_cobrar_webcontrol1,parametro_cuenta_cobrar_constante1);	
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

var parametro_cuenta_cobrar_webcontrol1 = new parametro_cuenta_cobrar_webcontrol();

//Para ser llamado desde otro archivo (import)
export {parametro_cuenta_cobrar_webcontrol,parametro_cuenta_cobrar_webcontrol1};

//Para ser llamado desde window.opener
window.parametro_cuenta_cobrar_webcontrol1 = parametro_cuenta_cobrar_webcontrol1;


if(parametro_cuenta_cobrar_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = parametro_cuenta_cobrar_webcontrol1.onLoadWindow; 
}

//</script>