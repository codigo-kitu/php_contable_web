//<script type="text/javascript" language="javascript">



//var consignacion_detalleJQueryPaginaWebInteraccion= function (consignacion_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {consignacion_detalle_constante,consignacion_detalle_constante1} from '../util/consignacion_detalle_constante.js';

import {consignacion_detalle_funcion,consignacion_detalle_funcion1} from '../util/consignacion_detalle_funcion.js';


class consignacion_detalle_webcontrol extends GeneralEntityWebControl {
	
	consignacion_detalle_control=null;
	consignacion_detalle_controlInicial=null;
	consignacion_detalle_controlAuxiliar=null;
		
	//if(consignacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(consignacion_detalle_control) {
		super();
		
		this.consignacion_detalle_control=consignacion_detalle_control;
	}
		
	actualizarVariablesPagina(consignacion_detalle_control) {
		
		if(consignacion_detalle_control.action=="index" || consignacion_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(consignacion_detalle_control);
			
		} 
		
		
		else if(consignacion_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(consignacion_detalle_control);
			
		} else if(consignacion_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(consignacion_detalle_control);
			
		} else if(consignacion_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(consignacion_detalle_control);		
		
		} else if(consignacion_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(consignacion_detalle_control);
		
		}  else if(consignacion_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(consignacion_detalle_control);
		
		} else if(consignacion_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(consignacion_detalle_control);		
		
		} else if(consignacion_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(consignacion_detalle_control);		
		
		} else if(consignacion_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(consignacion_detalle_control);		
		
		} else if(consignacion_detalle_control.action.includes("Busqueda") ||
				  consignacion_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(consignacion_detalle_control);
			
		} else if(consignacion_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(consignacion_detalle_control)
		}
		
		
		
	
		else if(consignacion_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(consignacion_detalle_control);	
		
		} else if(consignacion_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(consignacion_detalle_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + consignacion_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(consignacion_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(consignacion_detalle_control) {
		this.actualizarPaginaAccionesGenerales(consignacion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(consignacion_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(consignacion_detalle_control);
		this.actualizarPaginaOrderBy(consignacion_detalle_control);
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);
		this.actualizarPaginaCargaGeneralControles(consignacion_detalle_control);
		//this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(consignacion_detalle_control);
		this.actualizarPaginaAreaBusquedas(consignacion_detalle_control);
		this.actualizarPaginaCargaCombosFK(consignacion_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(consignacion_detalle_control) {
		//this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(consignacion_detalle_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(consignacion_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(consignacion_detalle_control);
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);
		this.actualizarPaginaCargaGeneralControles(consignacion_detalle_control);
		//this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(consignacion_detalle_control);
		this.actualizarPaginaAreaBusquedas(consignacion_detalle_control);
		this.actualizarPaginaCargaCombosFK(consignacion_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);		
		//this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);		
		//this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);		
		//this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(consignacion_detalle_control) {
		//this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(consignacion_detalle_control) {
		this.actualizarPaginaAbrirLink(consignacion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);				
		//this.actualizarPaginaFormulario(consignacion_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);
		//this.actualizarPaginaFormulario(consignacion_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);
		//this.actualizarPaginaFormulario(consignacion_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(consignacion_detalle_control) {
		//this.actualizarPaginaFormulario(consignacion_detalle_control);
		this.onLoadCombosDefectoFK(consignacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);
		//this.actualizarPaginaFormulario(consignacion_detalle_control);
		this.onLoadCombosDefectoFK(consignacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(consignacion_detalle_control) {
		this.actualizarPaginaAbrirLink(consignacion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(consignacion_detalle_control) {
		this.actualizarPaginaTablaDatos(consignacion_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(consignacion_detalle_control) {
					//super.actualizarPaginaImprimir(consignacion_detalle_control,"consignacion_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",consignacion_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("consignacion_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(consignacion_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(consignacion_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(consignacion_detalle_control) {
		//super.actualizarPaginaImprimir(consignacion_detalle_control,"consignacion_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("consignacion_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(consignacion_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",consignacion_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(consignacion_detalle_control) {
		//super.actualizarPaginaImprimir(consignacion_detalle_control,"consignacion_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("consignacion_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(consignacion_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",consignacion_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(consignacion_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(consignacion_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(consignacion_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(consignacion_detalle_control);
			
		this.actualizarPaginaAbrirLink(consignacion_detalle_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(consignacion_detalle_control) {
		
		if(consignacion_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(consignacion_detalle_control);
		}
		
		if(consignacion_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(consignacion_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(consignacion_detalle_control) {
		if(consignacion_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("consignacion_detalleReturnGeneral",JSON.stringify(consignacion_detalle_control.consignacion_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(consignacion_detalle_control) {
		if(consignacion_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && consignacion_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(consignacion_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(consignacion_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(consignacion_detalle_control, mostrar) {
		
		if(mostrar==true) {
			consignacion_detalle_funcion1.resaltarRestaurarDivsPagina(false,"consignacion_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				consignacion_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"consignacion_detalle");
			}			
			
			consignacion_detalle_funcion1.mostrarDivMensaje(true,consignacion_detalle_control.strAuxiliarMensaje,consignacion_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			consignacion_detalle_funcion1.mostrarDivMensaje(false,consignacion_detalle_control.strAuxiliarMensaje,consignacion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(consignacion_detalle_control) {
		if(consignacion_detalle_funcion1.esPaginaForm(consignacion_detalle_constante1)==true) {
			window.opener.consignacion_detalle_webcontrol1.actualizarPaginaTablaDatos(consignacion_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(consignacion_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(consignacion_detalle_control) {
		consignacion_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(consignacion_detalle_control.strAuxiliarUrlPagina);
				
		consignacion_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(consignacion_detalle_control.strAuxiliarTipo,consignacion_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(consignacion_detalle_control) {
		consignacion_detalle_funcion1.resaltarRestaurarDivMensaje(true,consignacion_detalle_control.strAuxiliarMensajeAlert,consignacion_detalle_control.strAuxiliarCssMensaje);
			
		if(consignacion_detalle_funcion1.esPaginaForm(consignacion_detalle_constante1)==true) {
			window.opener.consignacion_detalle_funcion1.resaltarRestaurarDivMensaje(true,consignacion_detalle_control.strAuxiliarMensajeAlert,consignacion_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(consignacion_detalle_control) {
		this.consignacion_detalle_controlInicial=consignacion_detalle_control;
			
		if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(consignacion_detalle_control.strStyleDivArbol,consignacion_detalle_control.strStyleDivContent
																,consignacion_detalle_control.strStyleDivOpcionesBanner,consignacion_detalle_control.strStyleDivExpandirColapsar
																,consignacion_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=consignacion_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",consignacion_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(consignacion_detalle_control) {
		this.actualizarCssBotonesPagina(consignacion_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(consignacion_detalle_control.tiposReportes,consignacion_detalle_control.tiposReporte
															 	,consignacion_detalle_control.tiposPaginacion,consignacion_detalle_control.tiposAcciones
																,consignacion_detalle_control.tiposColumnasSelect,consignacion_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(consignacion_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(consignacion_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(consignacion_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(consignacion_detalle_control) {
	
		var indexPosition=consignacion_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=consignacion_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(consignacion_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.cargarCombosconsignacionsFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.cargarCombosbodegasFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.cargarCombosproductosFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.cargarCombosunidadsFK(consignacion_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(consignacion_detalle_control.strRecargarFkTiposNinguno!=null && consignacion_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && consignacion_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(consignacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_consignacion",consignacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_detalle_webcontrol1.cargarCombosconsignacionsFK(consignacion_detalle_control);
				}

				if(consignacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",consignacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_detalle_webcontrol1.cargarCombosbodegasFK(consignacion_detalle_control);
				}

				if(consignacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",consignacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_detalle_webcontrol1.cargarCombosproductosFK(consignacion_detalle_control);
				}

				if(consignacion_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_unidad",consignacion_detalle_control.strRecargarFkTiposNinguno,",")) { 
					consignacion_detalle_webcontrol1.cargarCombosunidadsFK(consignacion_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_bodega") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.consignacion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.consignacion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.consignacion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
		else if(sNombreColumna=="id_producto") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.consignacion_detalleActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.consignacion_detalleActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.consignacion_detalleActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaconsignacionFK(consignacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_detalle_funcion1,consignacion_detalle_control.consignacionsFK);
	}

	cargarComboEditarTablabodegaFK(consignacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_detalle_funcion1,consignacion_detalle_control.bodegasFK);
	}

	cargarComboEditarTablaproductoFK(consignacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_detalle_funcion1,consignacion_detalle_control.productosFK);
	}

	cargarComboEditarTablaunidadFK(consignacion_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,consignacion_detalle_funcion1,consignacion_detalle_control.unidadsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(consignacion_detalle_control) {
		jQuery("#divBusquedaconsignacion_detalleAjaxWebPart").css("display",consignacion_detalle_control.strPermisoBusqueda);
		jQuery("#trconsignacion_detalleCabeceraBusquedas").css("display",consignacion_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaconsignacion_detalle").css("display",consignacion_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(consignacion_detalle_control.htmlTablaOrderBy!=null
			&& consignacion_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByconsignacion_detalleAjaxWebPart").html(consignacion_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//consignacion_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(consignacion_detalle_control.htmlTablaOrderByRel!=null
			&& consignacion_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelconsignacion_detalleAjaxWebPart").html(consignacion_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaconsignacion_detalleAjaxWebPart").css("display","none");
			jQuery("#trconsignacion_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaconsignacion_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(consignacion_detalle_control) {
		
		if(!consignacion_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(consignacion_detalle_control);
		} else {
			jQuery("#divTablaDatosconsignacion_detallesAjaxWebPart").html(consignacion_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosconsignacion_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosconsignacion_detalles=jQuery("#tblTablaDatosconsignacion_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("consignacion_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',consignacion_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			consignacion_detalle_webcontrol1.registrarControlesTableEdition(consignacion_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		consignacion_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(consignacion_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("consignacion_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(consignacion_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosconsignacion_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(consignacion_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(consignacion_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderByconsignacion_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(consignacion_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelconsignacion_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(consignacion_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(consignacion_detalle_control.consignacion_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(consignacion_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(consignacion_detalle_control) {
		var i=0;
		
		i=consignacion_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(consignacion_detalle_control.consignacion_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(consignacion_detalle_control.consignacion_detalleActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(consignacion_detalle_control.consignacion_detalleActual.versionRow);
		
		if(consignacion_detalle_control.consignacion_detalleActual.id_consignacion!=null && consignacion_detalle_control.consignacion_detalleActual.id_consignacion>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != consignacion_detalle_control.consignacion_detalleActual.id_consignacion) {
				jQuery("#t-cel_"+i+"_3").val(consignacion_detalle_control.consignacion_detalleActual.id_consignacion).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_detalle_control.consignacion_detalleActual.id_bodega!=null && consignacion_detalle_control.consignacion_detalleActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != consignacion_detalle_control.consignacion_detalleActual.id_bodega) {
				jQuery("#t-cel_"+i+"_4").val(consignacion_detalle_control.consignacion_detalleActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_detalle_control.consignacion_detalleActual.id_producto!=null && consignacion_detalle_control.consignacion_detalleActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != consignacion_detalle_control.consignacion_detalleActual.id_producto) {
				jQuery("#t-cel_"+i+"_5").val(consignacion_detalle_control.consignacion_detalleActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(consignacion_detalle_control.consignacion_detalleActual.id_unidad!=null && consignacion_detalle_control.consignacion_detalleActual.id_unidad>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != consignacion_detalle_control.consignacion_detalleActual.id_unidad) {
				jQuery("#t-cel_"+i+"_6").val(consignacion_detalle_control.consignacion_detalleActual.id_unidad).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_7").val(consignacion_detalle_control.consignacion_detalleActual.cantidad);
		jQuery("#t-cel_"+i+"_8").val(consignacion_detalle_control.consignacion_detalleActual.precio);
		jQuery("#t-cel_"+i+"_9").val(consignacion_detalle_control.consignacion_detalleActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_10").val(consignacion_detalle_control.consignacion_detalleActual.descuento_monto);
		jQuery("#t-cel_"+i+"_11").val(consignacion_detalle_control.consignacion_detalleActual.sub_total);
		jQuery("#t-cel_"+i+"_12").val(consignacion_detalle_control.consignacion_detalleActual.iva_porciento);
		jQuery("#t-cel_"+i+"_13").val(consignacion_detalle_control.consignacion_detalleActual.iva_monto);
		jQuery("#t-cel_"+i+"_14").val(consignacion_detalle_control.consignacion_detalleActual.total);
		jQuery("#t-cel_"+i+"_15").val(consignacion_detalle_control.consignacion_detalleActual.recibido);
		jQuery("#t-cel_"+i+"_16").val(consignacion_detalle_control.consignacion_detalleActual.observacion);
		jQuery("#t-cel_"+i+"_17").val(consignacion_detalle_control.consignacion_detalleActual.impuesto2_porciento);
		jQuery("#t-cel_"+i+"_18").val(consignacion_detalle_control.consignacion_detalleActual.impuesto2_monto);
		jQuery("#t-cel_"+i+"_19").val(consignacion_detalle_control.consignacion_detalleActual.cotizacion);
		jQuery("#t-cel_"+i+"_20").val(consignacion_detalle_control.consignacion_detalleActual.moneda);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(consignacion_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(consignacion_detalle_control) {
		consignacion_detalle_funcion1.registrarControlesTableValidacionEdition(consignacion_detalle_control,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(consignacion_detalle_control) {
		jQuery("#divResumenconsignacion_detalleActualAjaxWebPart").html(consignacion_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(consignacion_detalle_control) {
		//jQuery("#divAccionesRelacionesconsignacion_detalleAjaxWebPart").html(consignacion_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("consignacion_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(consignacion_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesconsignacion_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		consignacion_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(consignacion_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(consignacion_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(consignacion_detalle_control) {
		
		if(consignacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",consignacion_detalle_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",consignacion_detalle_control.strVisibleFK_Idbodega);
		}

		if(consignacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idconsignacion").attr("style",consignacion_detalle_control.strVisibleFK_Idconsignacion);
			jQuery("#tblstrVisible"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idconsignacion").attr("style",consignacion_detalle_control.strVisibleFK_Idconsignacion);
		}

		if(consignacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",consignacion_detalle_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",consignacion_detalle_control.strVisibleFK_Idproducto);
		}

		if(consignacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",consignacion_detalle_control.strVisibleFK_Idunidad);
			jQuery("#tblstrVisible"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad").attr("style",consignacion_detalle_control.strVisibleFK_Idunidad);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionconsignacion_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("consignacion_detalle",id,"estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);		
	}
	
	

	abrirBusquedaParaconsignacion(strNombreCampoBusqueda){//idActual
		consignacion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion_detalle","consignacion","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		consignacion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion_detalle","bodega","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		consignacion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion_detalle","producto","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}

	abrirBusquedaParaunidad(strNombreCampoBusqueda){//idActual
		consignacion_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("consignacion_detalle","unidad","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalleConstante,strParametros);
		
		//consignacion_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosconsignacionsFK(consignacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion",consignacion_detalle_control.consignacionsFK);

		if(consignacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_detalle_control.idFilaTablaActual+"_3",consignacion_detalle_control.consignacionsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion",consignacion_detalle_control.consignacionsFK);

	};

	cargarCombosbodegasFK(consignacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega",consignacion_detalle_control.bodegasFK);

		if(consignacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_detalle_control.idFilaTablaActual+"_4",consignacion_detalle_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",consignacion_detalle_control.bodegasFK);

	};

	cargarCombosproductosFK(consignacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto",consignacion_detalle_control.productosFK);

		if(consignacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_detalle_control.idFilaTablaActual+"_5",consignacion_detalle_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",consignacion_detalle_control.productosFK);

	};

	cargarCombosunidadsFK(consignacion_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad",consignacion_detalle_control.unidadsFK);

		if(consignacion_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+consignacion_detalle_control.idFilaTablaActual+"_6",consignacion_detalle_control.unidadsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad",consignacion_detalle_control.unidadsFK);

	};

	
	
	registrarComboActionChangeCombosconsignacionsFK(consignacion_detalle_control) {

	};

	registrarComboActionChangeCombosbodegasFK(consignacion_detalle_control) {
		this.registrarComboActionChangeid_bodega("form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega",false,0);


		this.registrarComboActionChangeid_bodega(""+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",false,0);


	};

	registrarComboActionChangeCombosproductosFK(consignacion_detalle_control) {
		this.registrarComboActionChangeid_producto("form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto",false,0);


		this.registrarComboActionChangeid_producto(""+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",false,0);


	};

	registrarComboActionChangeCombosunidadsFK(consignacion_detalle_control) {

	};

	
	
	setDefectoValorCombosconsignacionsFK(consignacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_detalle_control.idconsignacionDefaultFK>-1 && jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion").val() != consignacion_detalle_control.idconsignacionDefaultFK) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion").val(consignacion_detalle_control.idconsignacionDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val(consignacion_detalle_control.idconsignacionDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idconsignacion-cmbid_consignacion").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(consignacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_detalle_control.idbodegaDefaultFK>-1 && jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val() != consignacion_detalle_control.idbodegaDefaultFK) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega").val(consignacion_detalle_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(consignacion_detalle_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproductosFK(consignacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_detalle_control.idproductoDefaultFK>-1 && jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto").val() != consignacion_detalle_control.idproductoDefaultFK) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto").val(consignacion_detalle_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(consignacion_detalle_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosunidadsFK(consignacion_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(consignacion_detalle_control.idunidadDefaultFK>-1 && jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val() != consignacion_detalle_control.idunidadDefaultFK) {
				jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad").val(consignacion_detalle_control.idunidadDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(consignacion_detalle_control.idunidadDefaultForeignKey).trigger("change");
			if(jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+consignacion_detalle_constante1.STR_SUFIJO+"FK_Idunidad-cmbid_unidad").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_bodega(id_bodega,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("consignacion_detalle","estimados","","id_bodega",id_bodega,"NINGUNO","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}

	registrarComboActionChangeid_producto(id_producto,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("consignacion_detalle","estimados","","id_producto",id_producto,"NINGUNO","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//consignacion_detalle_control
		
	

		var cantidad="form"+consignacion_detalle_constante1.STR_SUFIJO+"-cantidad";
		funcionGeneralEventoJQuery.setTextoAccionChange("consignacion_detalle","estimados","","cantidad",cantidad,"","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

		var precio="form"+consignacion_detalle_constante1.STR_SUFIJO+"-precio";
		funcionGeneralEventoJQuery.setTextoAccionChange("consignacion_detalle","estimados","","precio",precio,"","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

		var descuento_porciento="form"+consignacion_detalle_constante1.STR_SUFIJO+"-descuento_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("consignacion_detalle","estimados","","descuento_porciento",descuento_porciento,"","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

		var iva_porciento="form"+consignacion_detalle_constante1.STR_SUFIJO+"-iva_porciento";
		funcionGeneralEventoJQuery.setTextoAccionChange("consignacion_detalle","estimados","","iva_porciento",iva_porciento,"","",paraEventoTabla,idFilaTabla,consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}
	
	onLoadCombosDefectoFK(consignacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.setDefectoValorCombosconsignacionsFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.setDefectoValorCombosbodegasFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.setDefectoValorCombosproductosFK(consignacion_detalle_control);
			}

			if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",consignacion_detalle_control.strRecargarFkTipos,",")) { 
				consignacion_detalle_webcontrol1.setDefectoValorCombosunidadsFK(consignacion_detalle_control);
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
	onLoadCombosEventosFK(consignacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_consignacion",consignacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_detalle_webcontrol1.registrarComboActionChangeCombosconsignacionsFK(consignacion_detalle_control);
			//}

			//if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",consignacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_detalle_webcontrol1.registrarComboActionChangeCombosbodegasFK(consignacion_detalle_control);
			//}

			//if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",consignacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_detalle_webcontrol1.registrarComboActionChangeCombosproductosFK(consignacion_detalle_control);
			//}

			//if(consignacion_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_unidad",consignacion_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				consignacion_detalle_webcontrol1.registrarComboActionChangeCombosunidadsFK(consignacion_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(consignacion_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(consignacion_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(consignacion_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(consignacion_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion_detalle","FK_Idbodega","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion_detalle","FK_Idconsignacion","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion_detalle","FK_Idproducto","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("consignacion_detalle","FK_Idunidad","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
		
			
			if(consignacion_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("consignacion_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("consignacion_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,"consignacion_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("consignacion","id_consignacion","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_consignacion_img_busqueda").click(function(){
				consignacion_detalle_webcontrol1.abrirBusquedaParaconsignacion("id_consignacion");
				//alert(jQuery('#form-id_consignacion_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				consignacion_detalle_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				consignacion_detalle_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("unidad","id_unidad","inventario","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+consignacion_detalle_constante1.STR_SUFIJO+"-id_unidad_img_busqueda").click(function(){
				consignacion_detalle_webcontrol1.abrirBusquedaParaunidad("id_unidad");
				//alert(jQuery('#form-id_unidad_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(consignacion_detalle_control) {
		
		jQuery("#divBusquedaconsignacion_detalleAjaxWebPart").css("display",consignacion_detalle_control.strPermisoBusqueda);
		jQuery("#trconsignacion_detalleCabeceraBusquedas").css("display",consignacion_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaconsignacion_detalle").css("display",consignacion_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteconsignacion_detalle").css("display",consignacion_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosconsignacion_detalle").attr("style",consignacion_detalle_control.strPermisoMostrarTodos);		
		
		if(consignacion_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdconsignacion_detalleNuevo").css("display",consignacion_detalle_control.strPermisoNuevo);
			jQuery("#tdconsignacion_detalleNuevoToolBar").css("display",consignacion_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdconsignacion_detalleDuplicar").css("display",consignacion_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdconsignacion_detalleDuplicarToolBar").css("display",consignacion_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdconsignacion_detalleNuevoGuardarCambios").css("display",consignacion_detalle_control.strPermisoNuevo);
			jQuery("#tdconsignacion_detalleNuevoGuardarCambiosToolBar").css("display",consignacion_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(consignacion_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdconsignacion_detalleCopiar").css("display",consignacion_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdconsignacion_detalleCopiarToolBar").css("display",consignacion_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdconsignacion_detalleConEditar").css("display",consignacion_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdconsignacion_detalleGuardarCambios").css("display",consignacion_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdconsignacion_detalleGuardarCambiosToolBar").css("display",consignacion_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdconsignacion_detalleCerrarPagina").css("display",consignacion_detalle_control.strPermisoPopup);		
		jQuery("#tdconsignacion_detalleCerrarPaginaToolBar").css("display",consignacion_detalle_control.strPermisoPopup);
		//jQuery("#trconsignacion_detalleAccionesRelaciones").css("display",consignacion_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=consignacion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + consignacion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + consignacion_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Consignacion Detalles";
		sTituloBanner+=" - " + consignacion_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + consignacion_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdconsignacion_detalleRelacionesToolBar").css("display",consignacion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosconsignacion_detalle").css("display",consignacion_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		consignacion_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		consignacion_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		consignacion_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		consignacion_detalle_webcontrol1.registrarEventosControles();
		
		if(consignacion_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
			consignacion_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(consignacion_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(consignacion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				consignacion_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(consignacion_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(consignacion_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				consignacion_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(consignacion_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			consignacion_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("consignacion_detalle","estimados","",consignacion_detalle_funcion1,consignacion_detalle_webcontrol1,consignacion_detalle_constante1);	
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

var consignacion_detalle_webcontrol1 = new consignacion_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {consignacion_detalle_webcontrol,consignacion_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.consignacion_detalle_webcontrol1 = consignacion_detalle_webcontrol1;


if(consignacion_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = consignacion_detalle_webcontrol1.onLoadWindow; 
}

//</script>