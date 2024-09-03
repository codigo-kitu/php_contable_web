//<script type="text/javascript" language="javascript">



//var asiento_automaticoJQueryPaginaWebInteraccion= function (asiento_automatico_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {asiento_automatico_constante,asiento_automatico_constante1} from '../util/asiento_automatico_constante.js';

import {asiento_automatico_funcion,asiento_automatico_funcion1} from '../util/asiento_automatico_funcion.js';


class asiento_automatico_webcontrol extends GeneralEntityWebControl {
	
	asiento_automatico_control=null;
	asiento_automatico_controlInicial=null;
	asiento_automatico_controlAuxiliar=null;
		
	//if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(asiento_automatico_control) {
		super();
		
		this.asiento_automatico_control=asiento_automatico_control;
	}
		
	actualizarVariablesPagina(asiento_automatico_control) {
		
		if(asiento_automatico_control.action=="index" || asiento_automatico_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(asiento_automatico_control);
			
		} 
		
		
		else if(asiento_automatico_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(asiento_automatico_control);
			
		} else if(asiento_automatico_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(asiento_automatico_control);
			
		} else if(asiento_automatico_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_automatico_control);		
		
		} else if(asiento_automatico_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(asiento_automatico_control);
		
		}  else if(asiento_automatico_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_automatico_control);
		
		} else if(asiento_automatico_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_automatico_control);		
		
		} else if(asiento_automatico_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(asiento_automatico_control);		
		
		} else if(asiento_automatico_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(asiento_automatico_control);		
		
		} else if(asiento_automatico_control.action.includes("Busqueda") ||
				  asiento_automatico_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(asiento_automatico_control);
			
		} else if(asiento_automatico_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(asiento_automatico_control)
		}
		
		
		
	
		else if(asiento_automatico_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(asiento_automatico_control);	
		
		} else if(asiento_automatico_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_control);		
		}
	
		else if(asiento_automatico_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_control);		
		}
	
		else if(asiento_automatico_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_automatico_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + asiento_automatico_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(asiento_automatico_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(asiento_automatico_control) {
		this.actualizarPaginaAccionesGenerales(asiento_automatico_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(asiento_automatico_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_automatico_control);
		this.actualizarPaginaOrderBy(asiento_automatico_control);
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_control);
		//this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_control);
		this.actualizarPaginaAreaBusquedas(asiento_automatico_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(asiento_automatico_control) {
		//this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(asiento_automatico_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(asiento_automatico_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_automatico_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(asiento_automatico_control) {
		
		this.actualizarPaginaCargaGeneral(asiento_automatico_control);
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		this.actualizarPaginaCargaGeneralControles(asiento_automatico_control);
		//this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_control);
		this.actualizarPaginaAreaBusquedas(asiento_automatico_control);
		this.actualizarPaginaCargaCombosFK(asiento_automatico_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		//this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		//this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		//this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(asiento_automatico_control) {
		//this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(asiento_automatico_control) {
		this.actualizarPaginaAbrirLink(asiento_automatico_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);				
		//this.actualizarPaginaFormulario(asiento_automatico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		//this.actualizarPaginaFormulario(asiento_automatico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		//this.actualizarPaginaFormulario(asiento_automatico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(asiento_automatico_control) {
		//this.actualizarPaginaFormulario(asiento_automatico_control);
		this.onLoadCombosDefectoFK(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		//this.actualizarPaginaFormulario(asiento_automatico_control);
		this.onLoadCombosDefectoFK(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		//this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(asiento_automatico_control) {
		this.actualizarPaginaAbrirLink(asiento_automatico_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(asiento_automatico_control) {
					//super.actualizarPaginaImprimir(asiento_automatico_control,"asiento_automatico");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_automatico_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("asiento_automatico_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(asiento_automatico_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_automatico_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(asiento_automatico_control) {
		//super.actualizarPaginaImprimir(asiento_automatico_control,"asiento_automatico");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("asiento_automatico_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(asiento_automatico_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_automatico_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(asiento_automatico_control) {
		//super.actualizarPaginaImprimir(asiento_automatico_control,"asiento_automatico");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("asiento_automatico_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(asiento_automatico_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",asiento_automatico_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(asiento_automatico_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(asiento_automatico_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(asiento_automatico_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(asiento_automatico_control);
			
		this.actualizarPaginaAbrirLink(asiento_automatico_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(asiento_automatico_control) {
		this.actualizarPaginaTablaDatos(asiento_automatico_control);
		this.actualizarPaginaFormulario(asiento_automatico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control);		
		this.actualizarPaginaAreaMantenimiento(asiento_automatico_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(asiento_automatico_control) {
		
		if(asiento_automatico_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(asiento_automatico_control);
		}
		
		if(asiento_automatico_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(asiento_automatico_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(asiento_automatico_control) {
		if(asiento_automatico_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("asiento_automaticoReturnGeneral",JSON.stringify(asiento_automatico_control.asiento_automaticoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(asiento_automatico_control) {
		if(asiento_automatico_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && asiento_automatico_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(asiento_automatico_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(asiento_automatico_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(asiento_automatico_control, mostrar) {
		
		if(mostrar==true) {
			asiento_automatico_funcion1.resaltarRestaurarDivsPagina(false,"asiento_automatico");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				asiento_automatico_funcion1.resaltarRestaurarDivMantenimiento(false,"asiento_automatico");
			}			
			
			asiento_automatico_funcion1.mostrarDivMensaje(true,asiento_automatico_control.strAuxiliarMensaje,asiento_automatico_control.strAuxiliarCssMensaje);
		
		} else {
			asiento_automatico_funcion1.mostrarDivMensaje(false,asiento_automatico_control.strAuxiliarMensaje,asiento_automatico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(asiento_automatico_control) {
		if(asiento_automatico_funcion1.esPaginaForm(asiento_automatico_constante1)==true) {
			window.opener.asiento_automatico_webcontrol1.actualizarPaginaTablaDatos(asiento_automatico_control);
		} else {
			this.actualizarPaginaTablaDatos(asiento_automatico_control);
		}
	}
	
	actualizarPaginaAbrirLink(asiento_automatico_control) {
		asiento_automatico_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(asiento_automatico_control.strAuxiliarUrlPagina);
				
		asiento_automatico_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(asiento_automatico_control.strAuxiliarTipo,asiento_automatico_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(asiento_automatico_control) {
		asiento_automatico_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_control.strAuxiliarMensajeAlert,asiento_automatico_control.strAuxiliarCssMensaje);
			
		if(asiento_automatico_funcion1.esPaginaForm(asiento_automatico_constante1)==true) {
			window.opener.asiento_automatico_funcion1.resaltarRestaurarDivMensaje(true,asiento_automatico_control.strAuxiliarMensajeAlert,asiento_automatico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(asiento_automatico_control) {
		this.asiento_automatico_controlInicial=asiento_automatico_control;
			
		if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(asiento_automatico_control.strStyleDivArbol,asiento_automatico_control.strStyleDivContent
																,asiento_automatico_control.strStyleDivOpcionesBanner,asiento_automatico_control.strStyleDivExpandirColapsar
																,asiento_automatico_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=asiento_automatico_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",asiento_automatico_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(asiento_automatico_control) {
		this.actualizarCssBotonesPagina(asiento_automatico_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(asiento_automatico_control.tiposReportes,asiento_automatico_control.tiposReporte
															 	,asiento_automatico_control.tiposPaginacion,asiento_automatico_control.tiposAcciones
																,asiento_automatico_control.tiposColumnasSelect,asiento_automatico_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(asiento_automatico_control.tiposRelaciones,asiento_automatico_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(asiento_automatico_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(asiento_automatico_control);			
	}
	
	actualizarPaginaUsuarioInvitado(asiento_automatico_control) {
	
		var indexPosition=asiento_automatico_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=asiento_automatico_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(asiento_automatico_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarCombosempresasFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarCombosmodulosFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarCombosfuentesFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(asiento_automatico_control.strRecargarFkTiposNinguno!=null && asiento_automatico_control.strRecargarFkTiposNinguno!='NINGUNO' && asiento_automatico_control.strRecargarFkTiposNinguno!='') {
			
				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarCombosempresasFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarCombosmodulosFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarCombosfuentesFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarComboslibro_auxiliarsFK(asiento_automatico_control);
				}

				if(asiento_automatico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTiposNinguno,",")) { 
					asiento_automatico_webcontrol1.cargarComboscentro_costosFK(asiento_automatico_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.empresasFK);
	}

	cargarComboEditarTablamoduloFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.modulosFK);
	}

	cargarComboEditarTablafuenteFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.fuentesFK);
	}

	cargarComboEditarTablalibro_auxiliarFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.libro_auxiliarsFK);
	}

	cargarComboEditarTablacentro_costoFK(asiento_automatico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,asiento_automatico_funcion1,asiento_automatico_control.centro_costosFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(asiento_automatico_control) {
		jQuery("#divBusquedaasiento_automaticoAjaxWebPart").css("display",asiento_automatico_control.strPermisoBusqueda);
		jQuery("#trasiento_automaticoCabeceraBusquedas").css("display",asiento_automatico_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_automatico").css("display",asiento_automatico_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(asiento_automatico_control.htmlTablaOrderBy!=null
			&& asiento_automatico_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByasiento_automaticoAjaxWebPart").html(asiento_automatico_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//asiento_automatico_webcontrol1.registrarOrderByActions();
			
		}
			
		if(asiento_automatico_control.htmlTablaOrderByRel!=null
			&& asiento_automatico_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelasiento_automaticoAjaxWebPart").html(asiento_automatico_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(asiento_automatico_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaasiento_automaticoAjaxWebPart").css("display","none");
			jQuery("#trasiento_automaticoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaasiento_automatico").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(asiento_automatico_control) {
		
		if(!asiento_automatico_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(asiento_automatico_control);
		} else {
			jQuery("#divTablaDatosasiento_automaticosAjaxWebPart").html(asiento_automatico_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosasiento_automaticos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosasiento_automaticos=jQuery("#tblTablaDatosasiento_automaticos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("asiento_automatico",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',asiento_automatico_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			asiento_automatico_webcontrol1.registrarControlesTableEdition(asiento_automatico_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		asiento_automatico_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(asiento_automatico_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("asiento_automatico_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(asiento_automatico_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosasiento_automaticosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(asiento_automatico_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(asiento_automatico_control);
		
		const divOrderBy = document.getElementById("divOrderByasiento_automaticoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(asiento_automatico_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelasiento_automaticoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(asiento_automatico_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(asiento_automatico_control.asiento_automaticoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(asiento_automatico_control);			
		}
	}
	
	actualizarCamposFilaTabla(asiento_automatico_control) {
		var i=0;
		
		i=asiento_automatico_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(asiento_automatico_control.asiento_automaticoActual.id);
		jQuery("#t-version_row_"+i+"").val(asiento_automatico_control.asiento_automaticoActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(asiento_automatico_control.asiento_automaticoActual.versionRow);
		
		if(asiento_automatico_control.asiento_automaticoActual.id_empresa!=null && asiento_automatico_control.asiento_automaticoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != asiento_automatico_control.asiento_automaticoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(asiento_automatico_control.asiento_automaticoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_modulo!=null && asiento_automatico_control.asiento_automaticoActual.id_modulo>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != asiento_automatico_control.asiento_automaticoActual.id_modulo) {
				jQuery("#t-cel_"+i+"_4").val(asiento_automatico_control.asiento_automaticoActual.id_modulo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_5").val(asiento_automatico_control.asiento_automaticoActual.codigo);
		jQuery("#t-cel_"+i+"_6").val(asiento_automatico_control.asiento_automaticoActual.nombre);
		
		if(asiento_automatico_control.asiento_automaticoActual.id_fuente!=null && asiento_automatico_control.asiento_automaticoActual.id_fuente>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != asiento_automatico_control.asiento_automaticoActual.id_fuente) {
				jQuery("#t-cel_"+i+"_7").val(asiento_automatico_control.asiento_automaticoActual.id_fuente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar!=null && asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar) {
				jQuery("#t-cel_"+i+"_8").val(asiento_automatico_control.asiento_automaticoActual.id_libro_auxiliar).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_8").select2("val", null);
			if(jQuery("#t-cel_"+i+"_8").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(asiento_automatico_control.asiento_automaticoActual.id_centro_costo!=null && asiento_automatico_control.asiento_automaticoActual.id_centro_costo>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != asiento_automatico_control.asiento_automaticoActual.id_centro_costo) {
				jQuery("#t-cel_"+i+"_9").val(asiento_automatico_control.asiento_automaticoActual.id_centro_costo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_9").select2("val", null);
			if(jQuery("#t-cel_"+i+"_9").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(asiento_automatico_control.asiento_automaticoActual.descripcion);
		jQuery("#t-cel_"+i+"_11").prop('checked',asiento_automatico_control.asiento_automaticoActual.activo);
		jQuery("#t-cel_"+i+"_12").val(asiento_automatico_control.asiento_automaticoActual.asignada);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(asiento_automatico_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionasiento_automatico_detalle").click(function(){
		jQuery("#tblTablaDatosasiento_automaticos").on("click",".imgrelacionasiento_automatico_detalle", function () {

			var idActual=jQuery(this).attr("idactualasiento_automatico");

			asiento_automatico_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});				
	}
		
	

	registrarSesionParaasiento_automatico_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"asiento_automatico","asiento_automatico_detalle","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1,"s","");
	}
	
	registrarControlesTableEdition(asiento_automatico_control) {
		asiento_automatico_funcion1.registrarControlesTableValidacionEdition(asiento_automatico_control,asiento_automatico_webcontrol1,asiento_automatico_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(asiento_automatico_control) {
		jQuery("#divResumenasiento_automaticoActualAjaxWebPart").html(asiento_automatico_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(asiento_automatico_control) {
		//jQuery("#divAccionesRelacionesasiento_automaticoAjaxWebPart").html(asiento_automatico_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("asiento_automatico_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(asiento_automatico_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesasiento_automaticoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		asiento_automatico_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(asiento_automatico_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(asiento_automatico_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(asiento_automatico_control) {
		
		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_automatico_control.strVisibleFK_Idcentro_costo);
			jQuery("#tblstrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo").attr("style",asiento_automatico_control.strVisibleFK_Idcentro_costo);
		}

		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_automatico_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",asiento_automatico_control.strVisibleFK_Idempresa);
		}

		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente").attr("style",asiento_automatico_control.strVisibleFK_Idfuente);
			jQuery("#tblstrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente").attr("style",asiento_automatico_control.strVisibleFK_Idfuente);
		}

		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",asiento_automatico_control.strVisibleFK_Idlibro_auxiliar);
			jQuery("#tblstrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar").attr("style",asiento_automatico_control.strVisibleFK_Idlibro_auxiliar);
		}

		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",asiento_automatico_control.strVisibleFK_Idmodulo);
			jQuery("#tblstrVisible"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo").attr("style",asiento_automatico_control.strVisibleFK_Idmodulo);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionasiento_automatico();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("asiento_automatico",id,"contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		asiento_automatico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico","empresa","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}

	abrirBusquedaParamodulo(strNombreCampoBusqueda){//idActual
		asiento_automatico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico","modulo","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}

	abrirBusquedaParafuente(strNombreCampoBusqueda){//idActual
		asiento_automatico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico","fuente","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}

	abrirBusquedaParalibro_auxiliar(strNombreCampoBusqueda){//idActual
		asiento_automatico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico","libro_auxiliar","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}

	abrirBusquedaParacentro_costo(strNombreCampoBusqueda){//idActual
		asiento_automatico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("asiento_automatico","centro_costo","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionasiento_automatico_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualasiento_automatico");

			asiento_automatico_webcontrol1.registrarSesionParaasiento_automatico_detalles(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automaticoConstante,strParametros);
		
		//asiento_automatico_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa",asiento_automatico_control.empresasFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_3",asiento_automatico_control.empresasFK);
		}
	};

	cargarCombosmodulosFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo",asiento_automatico_control.modulosFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_4",asiento_automatico_control.modulosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo",asiento_automatico_control.modulosFK);

	};

	cargarCombosfuentesFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente",asiento_automatico_control.fuentesFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_7",asiento_automatico_control.fuentesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente",asiento_automatico_control.fuentesFK);

	};

	cargarComboslibro_auxiliarsFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar",asiento_automatico_control.libro_auxiliarsFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_8",asiento_automatico_control.libro_auxiliarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar",asiento_automatico_control.libro_auxiliarsFK);

	};

	cargarComboscentro_costosFK(asiento_automatico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo",asiento_automatico_control.centro_costosFK);

		if(asiento_automatico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+asiento_automatico_control.idFilaTablaActual+"_9",asiento_automatico_control.centro_costosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo",asiento_automatico_control.centro_costosFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(asiento_automatico_control) {

	};

	registrarComboActionChangeCombosmodulosFK(asiento_automatico_control) {

	};

	registrarComboActionChangeCombosfuentesFK(asiento_automatico_control) {

	};

	registrarComboActionChangeComboslibro_auxiliarsFK(asiento_automatico_control) {

	};

	registrarComboActionChangeComboscentro_costosFK(asiento_automatico_control) {

	};

	
	
	setDefectoValorCombosempresasFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idempresaDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val() != asiento_automatico_control.idempresaDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa").val(asiento_automatico_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosmodulosFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idmoduloDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val() != asiento_automatico_control.idmoduloDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo").val(asiento_automatico_control.idmoduloDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(asiento_automatico_control.idmoduloDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idmodulo-cmbid_modulo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosfuentesFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idfuenteDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val() != asiento_automatico_control.idfuenteDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente").val(asiento_automatico_control.idfuenteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(asiento_automatico_control.idfuenteDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idfuente-cmbid_fuente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboslibro_auxiliarsFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idlibro_auxiliarDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val() != asiento_automatico_control.idlibro_auxiliarDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar").val(asiento_automatico_control.idlibro_auxiliarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(asiento_automatico_control.idlibro_auxiliarDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idlibro_auxiliar-cmbid_libro_auxiliar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscentro_costosFK(asiento_automatico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(asiento_automatico_control.idcentro_costoDefaultFK>-1 && jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val() != asiento_automatico_control.idcentro_costoDefaultFK) {
				jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo").val(asiento_automatico_control.idcentro_costoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(asiento_automatico_control.idcentro_costoDefaultForeignKey).trigger("change");
			if(jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+asiento_automatico_constante1.STR_SUFIJO+"FK_Idcentro_costo-cmbid_centro_costo").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//asiento_automatico_control
		
	
	}
	
	onLoadCombosDefectoFK(asiento_automatico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorCombosempresasFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorCombosmodulosFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorCombosfuentesFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorComboslibro_auxiliarsFK(asiento_automatico_control);
			}

			if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTipos,",")) { 
				asiento_automatico_webcontrol1.setDefectoValorComboscentro_costosFK(asiento_automatico_control);
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
	onLoadCombosEventosFK(asiento_automatico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeCombosempresasFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_modulo",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeCombosmodulosFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_fuente",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeCombosfuentesFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_libro_auxiliar",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeComboslibro_auxiliarsFK(asiento_automatico_control);
			//}

			//if(asiento_automatico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_centro_costo",asiento_automatico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				asiento_automatico_webcontrol1.registrarComboActionChangeComboscentro_costosFK(asiento_automatico_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(asiento_automatico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(asiento_automatico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(asiento_automatico_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico","FK_Idcentro_costo","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico","FK_Idempresa","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico","FK_Idfuente","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico","FK_Idlibro_auxiliar","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("asiento_automatico","FK_Idmodulo","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
		
			
			if(asiento_automatico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("asiento_automatico");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("asiento_automatico");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(asiento_automatico_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,"asiento_automatico");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("modulo","id_modulo","seguridad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_modulo_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParamodulo("id_modulo");
				//alert(jQuery('#form-id_modulo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("fuente","id_fuente","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_fuente_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParafuente("id_fuente");
				//alert(jQuery('#form-id_fuente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("libro_auxiliar","id_libro_auxiliar","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_libro_auxiliar_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParalibro_auxiliar("id_libro_auxiliar");
				//alert(jQuery('#form-id_libro_auxiliar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("centro_costo","id_centro_costo","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+asiento_automatico_constante1.STR_SUFIJO+"-id_centro_costo_img_busqueda").click(function(){
				asiento_automatico_webcontrol1.abrirBusquedaParacentro_costo("id_centro_costo");
				//alert(jQuery('#form-id_centro_costo_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("asiento_automatico");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(asiento_automatico_control) {
		
		jQuery("#divBusquedaasiento_automaticoAjaxWebPart").css("display",asiento_automatico_control.strPermisoBusqueda);
		jQuery("#trasiento_automaticoCabeceraBusquedas").css("display",asiento_automatico_control.strPermisoBusqueda);
		jQuery("#trBusquedaasiento_automatico").css("display",asiento_automatico_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteasiento_automatico").css("display",asiento_automatico_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosasiento_automatico").attr("style",asiento_automatico_control.strPermisoMostrarTodos);		
		
		if(asiento_automatico_control.strPermisoNuevo!=null) {
			jQuery("#tdasiento_automaticoNuevo").css("display",asiento_automatico_control.strPermisoNuevo);
			jQuery("#tdasiento_automaticoNuevoToolBar").css("display",asiento_automatico_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdasiento_automaticoDuplicar").css("display",asiento_automatico_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_automaticoDuplicarToolBar").css("display",asiento_automatico_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdasiento_automaticoNuevoGuardarCambios").css("display",asiento_automatico_control.strPermisoNuevo);
			jQuery("#tdasiento_automaticoNuevoGuardarCambiosToolBar").css("display",asiento_automatico_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(asiento_automatico_control.strPermisoActualizar!=null) {
			jQuery("#tdasiento_automaticoCopiar").css("display",asiento_automatico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_automaticoCopiarToolBar").css("display",asiento_automatico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdasiento_automaticoConEditar").css("display",asiento_automatico_control.strPermisoActualizar);
		}
		
		jQuery("#tdasiento_automaticoGuardarCambios").css("display",asiento_automatico_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdasiento_automaticoGuardarCambiosToolBar").css("display",asiento_automatico_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdasiento_automaticoCerrarPagina").css("display",asiento_automatico_control.strPermisoPopup);		
		jQuery("#tdasiento_automaticoCerrarPaginaToolBar").css("display",asiento_automatico_control.strPermisoPopup);
		//jQuery("#trasiento_automaticoAccionesRelaciones").css("display",asiento_automatico_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=asiento_automatico_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_automatico_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + asiento_automatico_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Asiento Automaticos";
		sTituloBanner+=" - " + asiento_automatico_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + asiento_automatico_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdasiento_automaticoRelacionesToolBar").css("display",asiento_automatico_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosasiento_automatico").css("display",asiento_automatico_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		asiento_automatico_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		asiento_automatico_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		asiento_automatico_webcontrol1.registrarEventosControles();
		
		if(asiento_automatico_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
			asiento_automatico_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(asiento_automatico_constante1.STR_ES_RELACIONES=="true") {
			if(asiento_automatico_constante1.BIT_ES_PAGINA_FORM==true) {
				asiento_automatico_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(asiento_automatico_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(asiento_automatico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				asiento_automatico_webcontrol1.onLoad();
			
			//} else {
				//if(asiento_automatico_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			asiento_automatico_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("asiento_automatico","contabilidad","",asiento_automatico_funcion1,asiento_automatico_webcontrol1,asiento_automatico_constante1);	
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

var asiento_automatico_webcontrol1 = new asiento_automatico_webcontrol();

//Para ser llamado desde otro archivo (import)
export {asiento_automatico_webcontrol,asiento_automatico_webcontrol1};

//Para ser llamado desde window.opener
window.asiento_automatico_webcontrol1 = asiento_automatico_webcontrol1;


if(asiento_automatico_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = asiento_automatico_webcontrol1.onLoadWindow; 
}

//</script>