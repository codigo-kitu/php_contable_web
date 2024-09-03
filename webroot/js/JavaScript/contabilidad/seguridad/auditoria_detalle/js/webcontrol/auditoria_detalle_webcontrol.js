//<script type="text/javascript" language="javascript">



//var auditoria_detalleJQueryPaginaWebInteraccion= function (auditoria_detalle_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {auditoria_detalle_constante,auditoria_detalle_constante1} from '../util/auditoria_detalle_constante.js';

import {auditoria_detalle_funcion,auditoria_detalle_funcion1} from '../util/auditoria_detalle_funcion.js';


class auditoria_detalle_webcontrol extends GeneralEntityWebControl {
	
	auditoria_detalle_control=null;
	auditoria_detalle_controlInicial=null;
	auditoria_detalle_controlAuxiliar=null;
		
	//if(auditoria_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(auditoria_detalle_control) {
		super();
		
		this.auditoria_detalle_control=auditoria_detalle_control;
	}
		
	actualizarVariablesPagina(auditoria_detalle_control) {
		
		if(auditoria_detalle_control.action=="index" || auditoria_detalle_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(auditoria_detalle_control);
			
		} 
		
		
		else if(auditoria_detalle_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(auditoria_detalle_control);
			
		} else if(auditoria_detalle_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(auditoria_detalle_control);
			
		} else if(auditoria_detalle_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(auditoria_detalle_control);		
		
		} else if(auditoria_detalle_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(auditoria_detalle_control);
		
		}  else if(auditoria_detalle_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(auditoria_detalle_control);
		
		} else if(auditoria_detalle_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(auditoria_detalle_control);		
		
		} else if(auditoria_detalle_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(auditoria_detalle_control);		
		
		} else if(auditoria_detalle_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(auditoria_detalle_control);		
		
		} else if(auditoria_detalle_control.action.includes("Busqueda") ||
				  auditoria_detalle_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(auditoria_detalle_control);
			
		} else if(auditoria_detalle_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(auditoria_detalle_control)
		}
		
		
		
	
		else if(auditoria_detalle_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(auditoria_detalle_control);	
		
		} else if(auditoria_detalle_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(auditoria_detalle_control);		
		}
	
	
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + auditoria_detalle_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(auditoria_detalle_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(auditoria_detalle_control) {
		this.actualizarPaginaAccionesGenerales(auditoria_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(auditoria_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(auditoria_detalle_control);
		this.actualizarPaginaOrderBy(auditoria_detalle_control);
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);
		this.actualizarPaginaCargaGeneralControles(auditoria_detalle_control);
		//this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(auditoria_detalle_control);
		this.actualizarPaginaAreaBusquedas(auditoria_detalle_control);
		this.actualizarPaginaCargaCombosFK(auditoria_detalle_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(auditoria_detalle_control) {
		//this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(auditoria_detalle_control) {
		
	}
	
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(auditoria_detalle_control) {
		
		this.actualizarPaginaCargaGeneral(auditoria_detalle_control);
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);
		this.actualizarPaginaCargaGeneralControles(auditoria_detalle_control);
		//this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(auditoria_detalle_control);
		this.actualizarPaginaAreaBusquedas(auditoria_detalle_control);
		this.actualizarPaginaCargaCombosFK(auditoria_detalle_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);		
		//this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);		
		//this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);		
		//this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(auditoria_detalle_control) {
		//this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(auditoria_detalle_control) {
		this.actualizarPaginaAbrirLink(auditoria_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);				
		//this.actualizarPaginaFormulario(auditoria_detalle_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);
		//this.actualizarPaginaFormulario(auditoria_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);
		//this.actualizarPaginaFormulario(auditoria_detalle_control);
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(auditoria_detalle_control) {
		//this.actualizarPaginaFormulario(auditoria_detalle_control);
		this.onLoadCombosDefectoFK(auditoria_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);
		//this.actualizarPaginaFormulario(auditoria_detalle_control);
		this.onLoadCombosDefectoFK(auditoria_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);		
		//this.actualizarPaginaAreaMantenimiento(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(auditoria_detalle_control) {
		this.actualizarPaginaAbrirLink(auditoria_detalle_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(auditoria_detalle_control) {
		this.actualizarPaginaTablaDatos(auditoria_detalle_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(auditoria_detalle_control) {
					//super.actualizarPaginaImprimir(auditoria_detalle_control,"auditoria_detalle");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",auditoria_detalle_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("auditoria_detalle_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(auditoria_detalle_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(auditoria_detalle_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(auditoria_detalle_control) {
		//super.actualizarPaginaImprimir(auditoria_detalle_control,"auditoria_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("auditoria_detalle_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(auditoria_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",auditoria_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(auditoria_detalle_control) {
		//super.actualizarPaginaImprimir(auditoria_detalle_control,"auditoria_detalle");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("auditoria_detalle_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(auditoria_detalle_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",auditoria_detalle_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(auditoria_detalle_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(auditoria_detalle_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(auditoria_detalle_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(auditoria_detalle_control);
			
		this.actualizarPaginaAbrirLink(auditoria_detalle_control);
	}
	
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(auditoria_detalle_control) {
		
		if(auditoria_detalle_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(auditoria_detalle_control);
		}
		
		if(auditoria_detalle_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(auditoria_detalle_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(auditoria_detalle_control) {
		if(auditoria_detalle_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("auditoria_detalleReturnGeneral",JSON.stringify(auditoria_detalle_control.auditoria_detalleReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(auditoria_detalle_control) {
		if(auditoria_detalle_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && auditoria_detalle_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(auditoria_detalle_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(auditoria_detalle_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(auditoria_detalle_control, mostrar) {
		
		if(mostrar==true) {
			auditoria_detalle_funcion1.resaltarRestaurarDivsPagina(false,"auditoria_detalle");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				auditoria_detalle_funcion1.resaltarRestaurarDivMantenimiento(false,"auditoria_detalle");
			}			
			
			auditoria_detalle_funcion1.mostrarDivMensaje(true,auditoria_detalle_control.strAuxiliarMensaje,auditoria_detalle_control.strAuxiliarCssMensaje);
		
		} else {
			auditoria_detalle_funcion1.mostrarDivMensaje(false,auditoria_detalle_control.strAuxiliarMensaje,auditoria_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(auditoria_detalle_control) {
		if(auditoria_detalle_funcion1.esPaginaForm(auditoria_detalle_constante1)==true) {
			window.opener.auditoria_detalle_webcontrol1.actualizarPaginaTablaDatos(auditoria_detalle_control);
		} else {
			this.actualizarPaginaTablaDatos(auditoria_detalle_control);
		}
	}
	
	actualizarPaginaAbrirLink(auditoria_detalle_control) {
		auditoria_detalle_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(auditoria_detalle_control.strAuxiliarUrlPagina);
				
		auditoria_detalle_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(auditoria_detalle_control.strAuxiliarTipo,auditoria_detalle_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(auditoria_detalle_control) {
		auditoria_detalle_funcion1.resaltarRestaurarDivMensaje(true,auditoria_detalle_control.strAuxiliarMensajeAlert,auditoria_detalle_control.strAuxiliarCssMensaje);
			
		if(auditoria_detalle_funcion1.esPaginaForm(auditoria_detalle_constante1)==true) {
			window.opener.auditoria_detalle_funcion1.resaltarRestaurarDivMensaje(true,auditoria_detalle_control.strAuxiliarMensajeAlert,auditoria_detalle_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(auditoria_detalle_control) {
		this.auditoria_detalle_controlInicial=auditoria_detalle_control;
			
		if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(auditoria_detalle_control.strStyleDivArbol,auditoria_detalle_control.strStyleDivContent
																,auditoria_detalle_control.strStyleDivOpcionesBanner,auditoria_detalle_control.strStyleDivExpandirColapsar
																,auditoria_detalle_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=auditoria_detalle_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",auditoria_detalle_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(auditoria_detalle_control) {
		this.actualizarCssBotonesPagina(auditoria_detalle_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(auditoria_detalle_control.tiposReportes,auditoria_detalle_control.tiposReporte
															 	,auditoria_detalle_control.tiposPaginacion,auditoria_detalle_control.tiposAcciones
																,auditoria_detalle_control.tiposColumnasSelect,auditoria_detalle_control.tiposAccionesFormulario);
			
			
			this.onLoadCombosDefectoPaginaGeneralControles(auditoria_detalle_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(auditoria_detalle_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(auditoria_detalle_control);			
	}
	
	actualizarPaginaUsuarioInvitado(auditoria_detalle_control) {
	
		var indexPosition=auditoria_detalle_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=auditoria_detalle_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(auditoria_detalle_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(auditoria_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_auditoria",auditoria_detalle_control.strRecargarFkTipos,",")) { 
				auditoria_detalle_webcontrol1.cargarCombosauditoriasFK(auditoria_detalle_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(auditoria_detalle_control.strRecargarFkTiposNinguno!=null && auditoria_detalle_control.strRecargarFkTiposNinguno!='NINGUNO' && auditoria_detalle_control.strRecargarFkTiposNinguno!='') {
			
				if(auditoria_detalle_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_auditoria",auditoria_detalle_control.strRecargarFkTiposNinguno,",")) { 
					auditoria_detalle_webcontrol1.cargarCombosauditoriasFK(auditoria_detalle_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaauditoriaFK(auditoria_detalle_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,auditoria_detalle_funcion1,auditoria_detalle_control.auditoriasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(auditoria_detalle_control) {
		jQuery("#divBusquedaauditoria_detalleAjaxWebPart").css("display",auditoria_detalle_control.strPermisoBusqueda);
		jQuery("#trauditoria_detalleCabeceraBusquedas").css("display",auditoria_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaauditoria_detalle").css("display",auditoria_detalle_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(auditoria_detalle_control.htmlTablaOrderBy!=null
			&& auditoria_detalle_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByauditoria_detalleAjaxWebPart").html(auditoria_detalle_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//auditoria_detalle_webcontrol1.registrarOrderByActions();
			
		}
			
		if(auditoria_detalle_control.htmlTablaOrderByRel!=null
			&& auditoria_detalle_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelauditoria_detalleAjaxWebPart").html(auditoria_detalle_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaauditoria_detalleAjaxWebPart").css("display","none");
			jQuery("#trauditoria_detalleCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaauditoria_detalle").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(auditoria_detalle_control) {
		
		if(!auditoria_detalle_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(auditoria_detalle_control);
		} else {
			jQuery("#divTablaDatosauditoria_detallesAjaxWebPart").html(auditoria_detalle_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosauditoria_detalles=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosauditoria_detalles=jQuery("#tblTablaDatosauditoria_detalles").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("auditoria_detalle",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',auditoria_detalle_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			auditoria_detalle_webcontrol1.registrarControlesTableEdition(auditoria_detalle_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		auditoria_detalle_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(auditoria_detalle_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("auditoria_detalle_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(auditoria_detalle_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosauditoria_detallesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(auditoria_detalle_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(auditoria_detalle_control);
		
		const divOrderBy = document.getElementById("divOrderByauditoria_detalleAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(auditoria_detalle_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelauditoria_detalleAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(auditoria_detalle_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(auditoria_detalle_control.auditoria_detalleActual!=null) {//form
			
			this.actualizarCamposFilaTabla(auditoria_detalle_control);			
		}
	}
	
	actualizarCamposFilaTabla(auditoria_detalle_control) {
		var i=0;
		
		i=auditoria_detalle_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(auditoria_detalle_control.auditoria_detalleActual.id);
		jQuery("#t-version_row_"+i+"").val(auditoria_detalle_control.auditoria_detalleActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(auditoria_detalle_control.auditoria_detalleActual.versionRow);
		
		if(auditoria_detalle_control.auditoria_detalleActual.id_auditoria!=null && auditoria_detalle_control.auditoria_detalleActual.id_auditoria>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != auditoria_detalle_control.auditoria_detalleActual.id_auditoria) {
				jQuery("#t-cel_"+i+"_3").val(auditoria_detalle_control.auditoria_detalleActual.id_auditoria).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(auditoria_detalle_control.auditoria_detalleActual.nombre_campo);
		jQuery("#t-cel_"+i+"_5").val(auditoria_detalle_control.auditoria_detalleActual.valor_anterior);
		jQuery("#t-cel_"+i+"_6").val(auditoria_detalle_control.auditoria_detalleActual.valor_actual);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(auditoria_detalle_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
		}
		
		});
	
						
	}
		
	
	
	registrarControlesTableEdition(auditoria_detalle_control) {
		auditoria_detalle_funcion1.registrarControlesTableValidacionEdition(auditoria_detalle_control,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(auditoria_detalle_control) {
		jQuery("#divResumenauditoria_detalleActualAjaxWebPart").html(auditoria_detalle_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(auditoria_detalle_control) {
		//jQuery("#divAccionesRelacionesauditoria_detalleAjaxWebPart").html(auditoria_detalle_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("auditoria_detalle_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(auditoria_detalle_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesauditoria_detalleAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		auditoria_detalle_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(auditoria_detalle_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(auditoria_detalle_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(auditoria_detalle_control) {
		
		if(auditoria_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_detalle_constante1.STR_SUFIJO+"BusquedaPorIdAuditoriaPorNombreCampo").attr("style",auditoria_detalle_control.strVisibleBusquedaPorIdAuditoriaPorNombreCampo);
			jQuery("#tblstrVisible"+auditoria_detalle_constante1.STR_SUFIJO+"BusquedaPorIdAuditoriaPorNombreCampo").attr("style",auditoria_detalle_control.strVisibleBusquedaPorIdAuditoriaPorNombreCampo);
		}

		if(auditoria_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+auditoria_detalle_constante1.STR_SUFIJO+"FK_Idauditoria").attr("style",auditoria_detalle_control.strVisibleFK_Idauditoria);
			jQuery("#tblstrVisible"+auditoria_detalle_constante1.STR_SUFIJO+"FK_Idauditoria").attr("style",auditoria_detalle_control.strVisibleFK_Idauditoria);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionauditoria_detalle();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("auditoria_detalle",id,"seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);		
	}
	
	

	abrirBusquedaParaauditoria(strNombreCampoBusqueda){//idActual
		auditoria_detalle_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("auditoria_detalle","auditoria","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalleConstante,strParametros);
		
		//auditoria_detalle_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosauditoriasFK(auditoria_detalle_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria",auditoria_detalle_control.auditoriasFK);

		if(auditoria_detalle_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+auditoria_detalle_control.idFilaTablaActual+"_3",auditoria_detalle_control.auditoriasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+auditoria_detalle_constante1.STR_SUFIJO+"BusquedaPorIdAuditoriaPorNombreCampo-cmbid_auditoria",auditoria_detalle_control.auditoriasFK);

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+auditoria_detalle_constante1.STR_SUFIJO+"FK_Idauditoria-cmbid_auditoria",auditoria_detalle_control.auditoriasFK);

	};

	
	
	registrarComboActionChangeCombosauditoriasFK(auditoria_detalle_control) {

	};

	
	
	setDefectoValorCombosauditoriasFK(auditoria_detalle_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(auditoria_detalle_control.idauditoriaDefaultFK>-1 && jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria").val() != auditoria_detalle_control.idauditoriaDefaultFK) {
				jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria").val(auditoria_detalle_control.idauditoriaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"BusquedaPorIdAuditoriaPorNombreCampo-cmbid_auditoria").val(auditoria_detalle_control.idauditoriaDefaultForeignKey).trigger("change");
			if(jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"BusquedaPorIdAuditoriaPorNombreCampo-cmbid_auditoria").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"BusquedaPorIdAuditoriaPorNombreCampo-cmbid_auditoria").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"FK_Idauditoria-cmbid_auditoria").val(auditoria_detalle_control.idauditoriaDefaultForeignKey).trigger("change");
			if(jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"FK_Idauditoria-cmbid_auditoria").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+auditoria_detalle_constante1.STR_SUFIJO+"FK_Idauditoria-cmbid_auditoria").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//auditoria_detalle_control
		
	
	}
	
	onLoadCombosDefectoFK(auditoria_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(auditoria_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_auditoria",auditoria_detalle_control.strRecargarFkTipos,",")) { 
				auditoria_detalle_webcontrol1.setDefectoValorCombosauditoriasFK(auditoria_detalle_control);
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
	onLoadCombosEventosFK(auditoria_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(auditoria_detalle_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_auditoria",auditoria_detalle_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				auditoria_detalle_webcontrol1.registrarComboActionChangeCombosauditoriasFK(auditoria_detalle_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(auditoria_detalle_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(auditoria_detalle_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
		}
	}
	
	registrarAccionesEventos() {	
		if(auditoria_detalle_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(auditoria_detalle_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria_detalle","BusquedaPorIdAuditoriaPorNombreCampo","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("auditoria_detalle","FK_Idauditoria","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
		
			
			if(auditoria_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("auditoria_detalle");		
			
			
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("auditoria_detalle");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
			
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
			}
			
			
			if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,"auditoria_detalle");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("auditoria","id_auditoria","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+auditoria_detalle_constante1.STR_SUFIJO+"-id_auditoria_img_busqueda").click(function(){
				auditoria_detalle_webcontrol1.abrirBusquedaParaauditoria("id_auditoria");
				//alert(jQuery('#form-id_auditoria_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
			
														
																	
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(auditoria_detalle_control) {
		
		jQuery("#divBusquedaauditoria_detalleAjaxWebPart").css("display",auditoria_detalle_control.strPermisoBusqueda);
		jQuery("#trauditoria_detalleCabeceraBusquedas").css("display",auditoria_detalle_control.strPermisoBusqueda);
		jQuery("#trBusquedaauditoria_detalle").css("display",auditoria_detalle_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteauditoria_detalle").css("display",auditoria_detalle_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosauditoria_detalle").attr("style",auditoria_detalle_control.strPermisoMostrarTodos);		
		
		if(auditoria_detalle_control.strPermisoNuevo!=null) {
			jQuery("#tdauditoria_detalleNuevo").css("display",auditoria_detalle_control.strPermisoNuevo);
			jQuery("#tdauditoria_detalleNuevoToolBar").css("display",auditoria_detalle_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdauditoria_detalleDuplicar").css("display",auditoria_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdauditoria_detalleDuplicarToolBar").css("display",auditoria_detalle_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdauditoria_detalleNuevoGuardarCambios").css("display",auditoria_detalle_control.strPermisoNuevo);
			jQuery("#tdauditoria_detalleNuevoGuardarCambiosToolBar").css("display",auditoria_detalle_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(auditoria_detalle_control.strPermisoActualizar!=null) {
			jQuery("#tdauditoria_detalleCopiar").css("display",auditoria_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdauditoria_detalleCopiarToolBar").css("display",auditoria_detalle_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdauditoria_detalleConEditar").css("display",auditoria_detalle_control.strPermisoActualizar);
		}
		
		jQuery("#tdauditoria_detalleGuardarCambios").css("display",auditoria_detalle_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdauditoria_detalleGuardarCambiosToolBar").css("display",auditoria_detalle_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdauditoria_detalleCerrarPagina").css("display",auditoria_detalle_control.strPermisoPopup);		
		jQuery("#tdauditoria_detalleCerrarPaginaToolBar").css("display",auditoria_detalle_control.strPermisoPopup);
		//jQuery("#trauditoria_detalleAccionesRelaciones").css("display",auditoria_detalle_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=auditoria_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + auditoria_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + auditoria_detalle_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Auditoria Detalles";
		sTituloBanner+=" - " + auditoria_detalle_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + auditoria_detalle_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdauditoria_detalleRelacionesToolBar").css("display",auditoria_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosauditoria_detalle").css("display",auditoria_detalle_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		auditoria_detalle_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		auditoria_detalle_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		auditoria_detalle_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		auditoria_detalle_webcontrol1.registrarEventosControles();
		
		if(auditoria_detalle_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="false") {
			auditoria_detalle_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(auditoria_detalle_constante1.STR_ES_RELACIONES=="true") {
			if(auditoria_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				auditoria_detalle_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(auditoria_detalle_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(auditoria_detalle_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				auditoria_detalle_webcontrol1.onLoad();
			
			//} else {
				//if(auditoria_detalle_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			auditoria_detalle_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("auditoria_detalle","seguridad","",auditoria_detalle_funcion1,auditoria_detalle_webcontrol1,auditoria_detalle_constante1);	
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

var auditoria_detalle_webcontrol1 = new auditoria_detalle_webcontrol();

//Para ser llamado desde otro archivo (import)
export {auditoria_detalle_webcontrol,auditoria_detalle_webcontrol1};

//Para ser llamado desde window.opener
window.auditoria_detalle_webcontrol1 = auditoria_detalle_webcontrol1;


if(auditoria_detalle_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = auditoria_detalle_webcontrol1.onLoadWindow; 
}

//</script>