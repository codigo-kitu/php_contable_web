//<script type="text/javascript" language="javascript">



//var orden_compra_detalleJQueryPaginaWebInteraccion= function (orden_compra_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {orden_compra_detalle_constante,orden_compra_detalle_constante1} from '../util/orden_compra_detalle_constante.js';

import {orden_compra_detalle_funcion,orden_compra_detalle_funcion1} from '../util/orden_compra_detalle_funcion.js';


class orden_compra_detalle_webcontrol extends GeneralEntityWebControl {
	
	orden_compra_detalle_control=null;
	orden_compra_detalle_controlInicial=null;
	orden_compra_detalle_controlAuxiliar=null;
		
	//if(orden_compra_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(orden_compra_detalle_control) {
		super();
		
		this.orden_compra_detalle_control=orden_compra_detalle_control;
	}
		
	actualizarVariablesPagina(orden_compra_detalle_control) {
		
		if(orden_compra_detalle_control.action=="index" || orden_compra_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(orden_compra_detalle_control);
			
		} 
		
		
		else if(orden_compra_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(orden_compra_detalle_control);
			
		} else if(orden_compra_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(orden_compra_detalle_control);
			
		} else if(orden_compra_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(orden_compra_detalle_control);		
		
		} else if(orden_compra_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(orden_compra_detalle_control);
		
		}  else if(orden_compra_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(orden_compra_detalle_control);
		
		} else if(orden_compra_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(orden_compra_detalle_control);		
		
		} else if(orden_compra_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(orden_compra_detalle_control);		
		
		} else if(orden_compra_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(orden_compra_detalle_control);		
		
		} else if(orden_compra_detalle_control.action.includes("Busqueda") ||
				  orden_compra_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(orden_compra_detalle_control);
			
		} else if(orden_compra_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(orden_compra_detalle_control)
		}
		
		
		
	
		else if(orden_compra_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(orden_compra_detalle_control);	
		
		} else if(orden_compra_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(orden_compra_detalle_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + orden_compra_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(orden_compra_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(orden_compra_detalle_control) {
		this.actualizarPaginaAccionesGenerales(orden_compra_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(orden_compra_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(orden_compra_detalle_control);
		this.actualizarPaginaOrderBy(orden_compra_detalle_control);
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);
		this.actualizarPaginaCargaGeneralControles(orden_compra_detalle_control);
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(orden_compra_detalle_control);
		this.actualizarPaginaAreaBusquedas(orden_compra_detalle_control);
		this.actualizarPaginaCargaCombosFK(orden_compra_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(orden_compra_detalle_control) {
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(orden_compra_detalle_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(orden_compra_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(orden_compra_detalle_control);
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);
		this.actualizarPaginaCargaGeneralControles(orden_compra_detalle_control);
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(orden_compra_detalle_control);
		this.actualizarPaginaAreaBusquedas(orden_compra_detalle_control);
		this.actualizarPaginaCargaCombosFK(orden_compra_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);		
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);		
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);		
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(orden_compra_detalle_control) {
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(orden_compra_detalle_control) {
		this.actualizarPaginaAbrirLink(orden_compra_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);				
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(orden_compra_detalle_control) {
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);
		this.onLoadCombosDefectoFK(orden_compra_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);
		//this.actualizarPaginaFormulario(orden_compra_detalle_control);
		this.onLoadCombosDefectoFK(orden_compra_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(orden_compra_detalle_control) {
		this.actualizarPaginaAbrirLink(orden_compra_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(orden_compra_detalle_control) {
		this.actualizarPaginaTablaDatos(orden_compra_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(orden_compra_detalle_control) {
					//super.actualizarPaginaImprimir(orden_compra_detalle_control,"orden_compra_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",orden_compra_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("orden_compra_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(orden_compra_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(orden_compra_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(orden_compra_detalle_control) {
		//super.actualizarPaginaImprimir(orden_compra_detalle_control,"orden_compra_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("orden_compra_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(orden_compra_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",orden_compra_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(orden_compra_detalle_control) {
		//super.actualizarPaginaImprimir(orden_compra_detalle_control,"orden_compra_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("orden_compra_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(orden_compra_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",orden_compra_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(orden_compra_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(orden_compra_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(orden_compra_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(orden_compra_detalle_control);
			
		this.actualizarPaginaAbrirLink(orden_compra_detalle_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(orden_compra_detalle_control) {
		
		if(orden_compra_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(orden_compra_detalle_control);
		}
		
		if(orden_compra_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(orden_compra_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(orden_compra_detalle_control) {
		if(orden_compra_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("orden_compra_detalleReturnGeneral",JSON.stringify(orden_compra_detalle_control.orden_compra_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(orden_compra_detalle_control) {
		if(orden_compra_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && orden_compra_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(orden_compra_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(orden_compra_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(orden_compra_detalle_control, mostrar) {
		
		if(mostrar==true) {
			orden_compra_detalle_funcion1.resaltarRestaurarDivsPagina(false,"orden_compra_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				orden_compra_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"orden_compra_detalle");
			}			
			
			orden_compra_detalle_funcion1.mostrarDivMensaje(true,orden_compra_detalle_control.strAuxiliarMensaje,orden_compra_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			orden_compra_detalle_funcion1.mostrarDivMensaje(false,orden_compra_detalle_control.strAuxiliarMensaje,orden_compra_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(orden_compra_detalle_control) {
		if(orden_compra_detalle_funcion1.esPaginaForm(orden_compra_detalle_constante1)==true) {
			window.opener.orden_compra_detalle_webcontrol1.actualizarPaginaTablaDatos(orden_compra_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(orden_compra_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(orden_compra_detalle_control) {
		orden_compra_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(orden_compra_detalle_control.strAuxiliarUrlPagina);
				
		orden_compra_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(orden_compra_detalle_control.strAuxiliarTipo,orden_compra_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(orden_compra_detalle_control) {
		orden_compra_detalle_funcion1.resaltarRestaurarDivMensaje(true,orden_compra_detalle_control.strAuxiliarMensajeAlert,orden_compra_detalle_control.strAuxiliarCssMensaje);
			
		if(orden_compra_detalle_funcion1.esPaginaForm(orden_compra_detalle_constante1)==true) {
			window.opener.orden_compra_detalle_funcion1.resaltarRestaurarDivMensaje(true,orden_compra_detalle_control.strAuxiliarMensajeAlert,orden_compra_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(orden_compra_detalle_control) {
		this.orden_compra_detalle_controlInicial=orden_compra_detalle_control;
			
		if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(orden_compra_detalle_control.strStyleDivArbol,orden_compra_detalle_control.strStyleDivContent
																,orden_compra_detalle_control.strStyleDivOpcionesBanner,orden_compra_detalle_control.strStyleDivExpandirColapsar
																,orden_compra_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=orden_compra_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",orden_compra_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(orden_compra_detalle_control) {
		this.actualizarCssBotonesPagina(orden_compra_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(orden_compra_detalle_control.tiposReportes,orden_compra_detalle_control.tiposReporte
															 	,orden_compra_detalle_control.tiposPaginacion,orden_compra_detalle_control.tiposAcciones
																,orden_compra_detalle_control.tiposColumnasSelect,orden_compra_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(orden_compra_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(orden_compra_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(orden_compra_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(orden_compra_detalle_control) {
	
		var indexPosition=orden_compra_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=orden_compra_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(orden_compra_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.cargarCombosorden_comprasFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.cargarCombosbodegasFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.cargarCombosproductosFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.cargarCombosunidadsFK(orden_compra_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(orden_compra_detalle_control.strRecargarFkTiposNinguno!=null && orden_compra_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && orden_compra_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(orden_compra_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_orden_compra",orden_compra_detalle_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_detalle_webcontrol1.cargarCombosorden_comprasFK(orden_compra_detalle_control);
				}

				if(orden_compra_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",orden_compra_detalle_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_detalle_webcontrol1.cargarCombosbodegasFK(orden_compra_detalle_control);
				}

				if(orden_compra_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",orden_compra_detalle_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_detalle_webcontrol1.cargarCombosproductosFK(orden_compra_detalle_control);
				}

				if(orden_compra_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",orden_compra_detalle_control.strRecargarFkTiposNinguno,",")) { 
					orden_compra_detalle_webcontrol1.cargarCombosunidadsFK(orden_compra_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.orden_compra_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.orden_compra_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.orden_compra_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.orden_compra_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.orden_compra_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.orden_compra_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaorden_compraFK(orden_compra_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_detalle_funcion1,orden_compra_detalle_control.orden_comprasFK);
	}

	cargarComboEditarTablabodegaFK(orden_compra_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_detalle_funcion1,orden_compra_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(orden_compra_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_detalle_funcion1,orden_compra_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(orden_compra_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,orden_compra_detalle_funcion1,orden_compra_detalle_control.unidadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(orden_compra_detalle_control) {
		jQuery("#divBusquedaorden_compra_detalleAjaxWebPart").css("display",orden_compra_detalle_control.strPermisoBusqueda);
		jQuery("#trorden_compra_detalleCabeceraBusquedas").css("display",orden_compra_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaorden_compra_detalle").css("display",orden_compra_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(orden_compra_detalle_control.htmlTablaOrderBy!=null
			&& orden_compra_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByorden_compra_detalleAjaxWebPart").html(orden_compra_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//orden_compra_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(orden_compra_detalle_control.htmlTablaOrderByRel!=null
			&& orden_compra_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelorden_compra_detalleAjaxWebPart").html(orden_compra_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaorden_compra_detalleAjaxWebPart").css("display","none");
			jQuery("#trorden_compra_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaorden_compra_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(orden_compra_detalle_control) {
		
		if(!orden_compra_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(orden_compra_detalle_control);
		} else {
			jQuery("#divTablaDatosorden_compra_detallesAjaxWebPart").html(orden_compra_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosorden_compra_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosorden_compra_detalles=jQuery("#tblTablaDatosorden_compra_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("orden_compra_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',orden_compra_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			orden_compra_detalle_webcontrol1.registrarControlesTableEdition(orden_compra_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		orden_compra_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(orden_compra_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("orden_compra_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(orden_compra_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosorden_compra_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(orden_compra_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(orden_compra_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderByorden_compra_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(orden_compra_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelorden_compra_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(orden_compra_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(orden_compra_detalle_control.orden_compra_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(orden_compra_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(orden_compra_detalle_control) {
		var i=0;
		
		i=orden_compra_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(orden_compra_detalle_control.orden_compra_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(orden_compra_detalle_control.orden_compra_detalleActual.versionRow);
		
		if(orden_compra_detalle_control.orden_compra_detalleActual.id_orden_compra!=null && orden_compra_detalle_control.orden_compra_detalleActual.id_orden_compra>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != orden_compra_detalle_control.orden_compra_detalleActual.id_orden_compra) {
				jQuery("#t-cel_"+i+"_2").val(orden_compra_detalle_control.orden_compra_detalleActual.id_orden_compra).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_detalle_control.orden_compra_detalleActual.id_bodega!=null && orden_compra_detalle_control.orden_compra_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != orden_compra_detalle_control.orden_compra_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_3").val(orden_compra_detalle_control.orden_compra_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_detalle_control.orden_compra_detalleActual.id_producto!=null && orden_compra_detalle_control.orden_compra_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != orden_compra_detalle_control.orden_compra_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_4").val(orden_compra_detalle_control.orden_compra_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(orden_compra_detalle_control.orden_compra_detalleActual.id_unidad!=null && orden_compra_detalle_control.orden_compra_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != orden_compra_detalle_control.orden_compra_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_5").val(orden_compra_detalle_control.orden_compra_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_6").val(orden_compra_detalle_control.orden_compra_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_7").val(orden_compra_detalle_control.orden_compra_detalleActual.precio);
		jQuery("#t-cel_"+i+"_8").val(orden_compra_detalle_control.orden_compra_detalleActual.sub_total);
		jQuery("#t-cel_"+i+"_9").val(orden_compra_detalle_control.orden_compra_detalleActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_10").val(orden_compra_detalle_control.orden_compra_detalleActual.descuento_monto);
		jQuery("#t-cel_"+i+"_11").val(orden_compra_detalle_control.orden_compra_detalleActual.iva_porciento);
		jQuery("#t-cel_"+i+"_12").val(orden_compra_detalle_control.orden_compra_detalleActual.iva_monto);
		jQuery("#t-cel_"+i+"_13").val(orden_compra_detalle_control.orden_compra_detalleActual.total);
		jQuery("#t-cel_"+i+"_14").val(orden_compra_detalle_control.orden_compra_detalleActual.observacion);
		jQuery("#t-cel_"+i+"_15").val(orden_compra_detalle_control.orden_compra_detalleActual.recibido);
		jQuery("#t-cel_"+i+"_16").val(orden_compra_detalle_control.orden_compra_detalleActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_17").val(orden_compra_detalle_control.orden_compra_detalleActual.impuesto2_monto);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(orden_compra_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(orden_compra_detalle_control) {
		orden_compra_detalle_funcion1.registrarControlesTableValidacionEdition(orden_compra_detalle_control,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(orden_compra_detalle_control) {
		jQuery("#divResumenorden_compra_detalleActualAjaxWebPart").html(orden_compra_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(orden_compra_detalle_control) {
		//jQuery("#divAccionesRelacionesorden_compra_detalleAjaxWebPart").html(orden_compra_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("orden_compra_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(orden_compra_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesorden_compra_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		orden_compra_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(orden_compra_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(orden_compra_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(orden_compra_detalle_control) {
		
		if(orden_compra_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",orden_compra_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",orden_compra_detalle_control.strVisibleFK_Idbodega);
		}

		if(orden_compra_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idorden_compra").attr("style",orden_compra_detalle_control.strVisibleFK_Idorden_compra);
			jQuery("#tblstrVisible"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idorden_compra").attr("style",orden_compra_detalle_control.strVisibleFK_Idorden_compra);
		}

		if(orden_compra_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",orden_compra_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",orden_compra_detalle_control.strVisibleFK_Idproducto);
		}

		if(orden_compra_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",orden_compra_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",orden_compra_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionorden_compra_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("orden_compra_detalle",id,"inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);		
	}
	
	

	abrirBusquedaParaorden_compra(strNombreCampoBusqueda){//idActual
		orden_compra_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra_detalle","orden_compra","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		orden_compra_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra_detalle","bodega","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		orden_compra_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra_detalle","producto","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		orden_compra_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("orden_compra_detalle","unidad","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalleConstante,strParametros);
		
		//orden_compra_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosorden_comprasFK(orden_compra_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra",orden_compra_detalle_control.orden_comprasFK);

		if(orden_compra_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_detalle_control.idFilaTablaActual+"_2",orden_compra_detalle_control.orden_comprasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra",orden_compra_detalle_control.orden_comprasFK);

	};

	cargarCombosbodegasFK(orden_compra_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega",orden_compra_detalle_control.bodegasFK);

		if(orden_compra_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_detalle_control.idFilaTablaActual+"_3",orden_compra_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",orden_compra_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(orden_compra_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto",orden_compra_detalle_control.productosFK);

		if(orden_compra_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_detalle_control.idFilaTablaActual+"_4",orden_compra_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",orden_compra_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(orden_compra_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad",orden_compra_detalle_control.unidadsFK);

		if(orden_compra_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+orden_compra_detalle_control.idFilaTablaActual+"_5",orden_compra_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",orden_compra_detalle_control.unidadsFK);

	};

	
	
	registrarComboActionChangeCombosorden_comprasFK(orden_compra_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(orden_compra_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(orden_compra_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(orden_compra_detalle_control) {

	};

	
	
	setDefectoValorCombosorden_comprasFK(orden_compra_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_detalle_control.idorden_compraDefaultFK>-1 && jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra").val() != orden_compra_detalle_control.idorden_compraDefaultFK) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra").val(orden_compra_detalle_control.idorden_compraDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val(orden_compra_detalle_control.idorden_compraDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idorden_compra-cmbid_orden_compra").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(orden_compra_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != orden_compra_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega").val(orden_compra_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(orden_compra_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(orden_compra_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto").val() != orden_compra_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto").val(orden_compra_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(orden_compra_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(orden_compra_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(orden_compra_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != orden_compra_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad").val(orden_compra_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(orden_compra_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+orden_compra_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("orden_compra_detalle","inventario","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("orden_compra_detalle","inventario","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//orden_compra_detalle_control
		
	

		var cantidad="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("orden_compra_detalle","inventario","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

		var precio="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("orden_compra_detalle","inventario","","precio",precio,"","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

		var descuento_porciento="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("orden_compra_detalle","inventario","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

		var iva_porciento="form"+orden_compra_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("orden_compra_detalle","inventario","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(orden_compra_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.setDefectoValorCombosorden_comprasFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.setDefectoValorCombosbodegasFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.setDefectoValorCombosproductosFK(orden_compra_detalle_control);
			}

			if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",orden_compra_detalle_control.strRecargarFkTipos,",")) { 
				orden_compra_detalle_webcontrol1.setDefectoValorCombosunidadsFK(orden_compra_detalle_control);
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
	onLoadCombosEventosFK(orden_compra_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_orden_compra",orden_compra_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_detalle_webcontrol1.registrarComboActionChangeCombosorden_comprasFK(orden_compra_detalle_control);
			//}

			//if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",orden_compra_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(orden_compra_detalle_control);
			//}

			//if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",orden_compra_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(orden_compra_detalle_control);
			//}

			//if(orden_compra_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",orden_compra_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				orden_compra_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(orden_compra_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(orden_compra_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(orden_compra_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(orden_compra_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(orden_compra_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra_detalle","FK_Idbodega","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra_detalle","FK_Idorden_compra","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra_detalle","FK_Idproducto","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("orden_compra_detalle","FK_Idunidad","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
		
			
			if(orden_compra_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("orden_compra_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("orden_compra_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,"orden_compra_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("orden_compra","id_orden_compra","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_orden_compra_img_busqueda").click(function(){
				orden_compra_detalle_webcontrol1.abrirBusquedaParaorden_compra("id_orden_compra");
				//alert(jQuery('#form-id_orden_compra_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				orden_compra_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				orden_compra_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+orden_compra_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				orden_compra_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(orden_compra_detalle_control) {
		
		jQuery("#divBusquedaorden_compra_detalleAjaxWebPart").css("display",orden_compra_detalle_control.strPermisoBusqueda);
		jQuery("#trorden_compra_detalleCabeceraBusquedas").css("display",orden_compra_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaorden_compra_detalle").css("display",orden_compra_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteorden_compra_detalle").css("display",orden_compra_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosorden_compra_detalle").attr("style",orden_compra_detalle_control.strPermisoMostrarTodos);		
		
		if(orden_compra_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdorden_compra_detalleNuevo").css("display",orden_compra_detalle_control.strPermisoNuevo);
			jQuery("#tdorden_compra_detalleNuevoToolBar").css("display",orden_compra_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdorden_compra_detalleDuplicar").css("display",orden_compra_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdorden_compra_detalleDuplicarToolBar").css("display",orden_compra_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdorden_compra_detalleNuevoGuardarCambios").css("display",orden_compra_detalle_control.strPermisoNuevo);
			jQuery("#tdorden_compra_detalleNuevoGuardarCambiosToolBar").css("display",orden_compra_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(orden_compra_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdorden_compra_detalleCopiar").css("display",orden_compra_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdorden_compra_detalleCopiarToolBar").css("display",orden_compra_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdorden_compra_detalleConEditar").css("display",orden_compra_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdorden_compra_detalleGuardarCambios").css("display",orden_compra_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdorden_compra_detalleGuardarCambiosToolBar").css("display",orden_compra_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdorden_compra_detalleCerrarPagina").css("display",orden_compra_detalle_control.strPermisoPopup);		
		jQuery("#tdorden_compra_detalleCerrarPaginaToolBar").css("display",orden_compra_detalle_control.strPermisoPopup);
		//jQuery("#trorden_compra_detalleAccionesRelaciones").css("display",orden_compra_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=orden_compra_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + orden_compra_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + orden_compra_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Compras Detalles";
		sTituloBanner+=" - " + orden_compra_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + orden_compra_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdorden_compra_detalleRelacionesToolBar").css("display",orden_compra_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosorden_compra_detalle").css("display",orden_compra_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		orden_compra_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		orden_compra_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		orden_compra_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		orden_compra_detalle_webcontrol1.registrarEventosControles();
		
		if(orden_compra_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="false") {
			orden_compra_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(orden_compra_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(orden_compra_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				orden_compra_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(orden_compra_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(orden_compra_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				orden_compra_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(orden_compra_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			orden_compra_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("orden_compra_detalle","inventario","",orden_compra_detalle_funcion1,orden_compra_detalle_webcontrol1,orden_compra_detalle_constante1);	
	}
}

var orden_compra_detalle_webcontrol1 = new orden_compra_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {orden_compra_detalle_webcontrol,orden_compra_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.orden_compra_detalle_webcontrol1 = orden_compra_detalle_webcontrol1;


if(orden_compra_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = orden_compra_detalle_webcontrol1.onLoadWindow; 
}

//</script>