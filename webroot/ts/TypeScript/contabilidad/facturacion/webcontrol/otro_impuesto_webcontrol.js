//<script type="text/javascript" language="javascript">



//var otro_impuestoJQueryPaginaWebInteraccion= function (otro_impuesto_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {otro_impuesto_constante,otro_impuesto_constante1} from '../util/otro_impuesto_constante.js';

import {otro_impuesto_funcion,otro_impuesto_funcion1} from '../util/otro_impuesto_funcion.js';


class otro_impuesto_webcontrol extends GeneralEntityWebControl {
	
	otro_impuesto_control=null;
	otro_impuesto_controlInicial=null;
	otro_impuesto_controlAuxiliar=null;
		
	//if(otro_impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(otro_impuesto_control) {
		super();
		
		this.otro_impuesto_control=otro_impuesto_control;
	}
		
	actualizarVariablesPagina(otro_impuesto_control) {
		
		if(otro_impuesto_control.action=="index" || otro_impuesto_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(otro_impuesto_control);
			
		} 
		
		
		else if(otro_impuesto_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(otro_impuesto_control);
			
		} else if(otro_impuesto_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(otro_impuesto_control);
			
		} else if(otro_impuesto_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_impuesto_control);		
		
		} else if(otro_impuesto_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(otro_impuesto_control);
		
		}  else if(otro_impuesto_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_impuesto_control);
		
		} else if(otro_impuesto_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_impuesto_control);		
		
		} else if(otro_impuesto_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(otro_impuesto_control);		
		
		} else if(otro_impuesto_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(otro_impuesto_control);		
		
		} else if(otro_impuesto_control.action.includes("Busqueda") ||
				  otro_impuesto_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(otro_impuesto_control);
			
		} else if(otro_impuesto_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(otro_impuesto_control)
		}
		
		
		
	
		else if(otro_impuesto_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(otro_impuesto_control);	
		
		} else if(otro_impuesto_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(otro_impuesto_control);		
		}
	
		else if(otro_impuesto_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_impuesto_control);		
		}
	
		else if(otro_impuesto_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(otro_impuesto_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + otro_impuesto_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(otro_impuesto_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(otro_impuesto_control) {
		this.actualizarPaginaAccionesGenerales(otro_impuesto_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(otro_impuesto_control) {
		
		this.actualizarPaginaCargaGeneral(otro_impuesto_control);
		this.actualizarPaginaOrderBy(otro_impuesto_control);
		this.actualizarPaginaTablaDatos(otro_impuesto_control);
		this.actualizarPaginaCargaGeneralControles(otro_impuesto_control);
		//this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_impuesto_control);
		this.actualizarPaginaAreaBusquedas(otro_impuesto_control);
		this.actualizarPaginaCargaCombosFK(otro_impuesto_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(otro_impuesto_control) {
		//this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(otro_impuesto_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(otro_impuesto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_impuesto_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_impuesto_control) {
		
		this.actualizarPaginaCargaGeneral(otro_impuesto_control);
		this.actualizarPaginaTablaDatos(otro_impuesto_control);
		this.actualizarPaginaCargaGeneralControles(otro_impuesto_control);
		//this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_impuesto_control);
		this.actualizarPaginaAreaBusquedas(otro_impuesto_control);
		this.actualizarPaginaCargaCombosFK(otro_impuesto_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);		
		//this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);		
		//this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);		
		//this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(otro_impuesto_control) {
		//this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_impuesto_control) {
		this.actualizarPaginaAbrirLink(otro_impuesto_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);				
		//this.actualizarPaginaFormulario(otro_impuesto_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);
		//this.actualizarPaginaFormulario(otro_impuesto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);
		//this.actualizarPaginaFormulario(otro_impuesto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(otro_impuesto_control) {
		//this.actualizarPaginaFormulario(otro_impuesto_control);
		this.onLoadCombosDefectoFK(otro_impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);
		//this.actualizarPaginaFormulario(otro_impuesto_control);
		this.onLoadCombosDefectoFK(otro_impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_impuesto_control) {
		this.actualizarPaginaAbrirLink(otro_impuesto_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_impuesto_control) {
					//super.actualizarPaginaImprimir(otro_impuesto_control,"otro_impuesto");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_impuesto_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("otro_impuesto_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(otro_impuesto_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_impuesto_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_impuesto_control) {
		//super.actualizarPaginaImprimir(otro_impuesto_control,"otro_impuesto");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("otro_impuesto_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(otro_impuesto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_impuesto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(otro_impuesto_control) {
		//super.actualizarPaginaImprimir(otro_impuesto_control,"otro_impuesto");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("otro_impuesto_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(otro_impuesto_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_impuesto_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_impuesto_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(otro_impuesto_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(otro_impuesto_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(otro_impuesto_control);
			
		this.actualizarPaginaAbrirLink(otro_impuesto_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(otro_impuesto_control) {
		this.actualizarPaginaTablaDatos(otro_impuesto_control);
		this.actualizarPaginaFormulario(otro_impuesto_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control);		
		this.actualizarPaginaAreaMantenimiento(otro_impuesto_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(otro_impuesto_control) {
		
		if(otro_impuesto_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(otro_impuesto_control);
		}
		
		if(otro_impuesto_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(otro_impuesto_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(otro_impuesto_control) {
		if(otro_impuesto_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("otro_impuestoReturnGeneral",JSON.stringify(otro_impuesto_control.otro_impuestoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(otro_impuesto_control) {
		if(otro_impuesto_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_impuesto_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(otro_impuesto_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(otro_impuesto_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(otro_impuesto_control, mostrar) {
		
		if(mostrar==true) {
			otro_impuesto_funcion1.resaltarRestaurarDivsPagina(false,"otro_impuesto");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				otro_impuesto_funcion1.resaltarRestaurarDivMantenimiento(false,"otro_impuesto");
			}			
			
			otro_impuesto_funcion1.mostrarDivMensaje(true,otro_impuesto_control.strAuxiliarMensaje,otro_impuesto_control.strAuxiliarCssMensaje);
		
		} else {
			otro_impuesto_funcion1.mostrarDivMensaje(false,otro_impuesto_control.strAuxiliarMensaje,otro_impuesto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(otro_impuesto_control) {
		if(otro_impuesto_funcion1.esPaginaForm(otro_impuesto_constante1)==true) {
			window.opener.otro_impuesto_webcontrol1.actualizarPaginaTablaDatos(otro_impuesto_control);
		} else {
			this.actualizarPaginaTablaDatos(otro_impuesto_control);
		}
	}
	
	actualizarPaginaAbrirLink(otro_impuesto_control) {
		otro_impuesto_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(otro_impuesto_control.strAuxiliarUrlPagina);
				
		otro_impuesto_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(otro_impuesto_control.strAuxiliarTipo,otro_impuesto_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(otro_impuesto_control) {
		otro_impuesto_funcion1.resaltarRestaurarDivMensaje(true,otro_impuesto_control.strAuxiliarMensajeAlert,otro_impuesto_control.strAuxiliarCssMensaje);
			
		if(otro_impuesto_funcion1.esPaginaForm(otro_impuesto_constante1)==true) {
			window.opener.otro_impuesto_funcion1.resaltarRestaurarDivMensaje(true,otro_impuesto_control.strAuxiliarMensajeAlert,otro_impuesto_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(otro_impuesto_control) {
		this.otro_impuesto_controlInicial=otro_impuesto_control;
			
		if(otro_impuesto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(otro_impuesto_control.strStyleDivArbol,otro_impuesto_control.strStyleDivContent
																,otro_impuesto_control.strStyleDivOpcionesBanner,otro_impuesto_control.strStyleDivExpandirColapsar
																,otro_impuesto_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=otro_impuesto_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",otro_impuesto_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(otro_impuesto_control) {
		this.actualizarCssBotonesPagina(otro_impuesto_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(otro_impuesto_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(otro_impuesto_control.tiposReportes,otro_impuesto_control.tiposReporte
															 	,otro_impuesto_control.tiposPaginacion,otro_impuesto_control.tiposAcciones
																,otro_impuesto_control.tiposColumnasSelect,otro_impuesto_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(otro_impuesto_control.tiposRelaciones,otro_impuesto_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(otro_impuesto_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(otro_impuesto_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(otro_impuesto_control);			
	}
	
	actualizarPaginaUsuarioInvitado(otro_impuesto_control) {
	
		var indexPosition=otro_impuesto_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=otro_impuesto_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(otro_impuesto_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.cargarCombosempresasFK(otro_impuesto_control);
			}

			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.cargarComboscuenta_ventassFK(otro_impuesto_control);
			}

			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.cargarComboscuenta_comprassFK(otro_impuesto_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(otro_impuesto_control.strRecargarFkTiposNinguno!=null && otro_impuesto_control.strRecargarFkTiposNinguno!='NINGUNO' && otro_impuesto_control.strRecargarFkTiposNinguno!='') {
			
				if(otro_impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",otro_impuesto_control.strRecargarFkTiposNinguno,",")) { 
					otro_impuesto_webcontrol1.cargarCombosempresasFK(otro_impuesto_control);
				}

				if(otro_impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_ventas",otro_impuesto_control.strRecargarFkTiposNinguno,",")) { 
					otro_impuesto_webcontrol1.cargarComboscuenta_ventassFK(otro_impuesto_control);
				}

				if(otro_impuesto_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cuenta_compras",otro_impuesto_control.strRecargarFkTiposNinguno,",")) { 
					otro_impuesto_webcontrol1.cargarComboscuenta_comprassFK(otro_impuesto_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(otro_impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_impuesto_funcion1,otro_impuesto_control.empresasFK);
	}

	cargarComboEditarTablacuenta_ventasFK(otro_impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_impuesto_funcion1,otro_impuesto_control.cuenta_ventassFK);
	}

	cargarComboEditarTablacuenta_comprasFK(otro_impuesto_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_impuesto_funcion1,otro_impuesto_control.cuenta_comprassFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(otro_impuesto_control) {
		jQuery("#divBusquedaotro_impuestoAjaxWebPart").css("display",otro_impuesto_control.strPermisoBusqueda);
		jQuery("#trotro_impuestoCabeceraBusquedas").css("display",otro_impuesto_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_impuesto").css("display",otro_impuesto_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(otro_impuesto_control.htmlTablaOrderBy!=null
			&& otro_impuesto_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByotro_impuestoAjaxWebPart").html(otro_impuesto_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//otro_impuesto_webcontrol1.registrarOrderByActions();
			
		}
			
		if(otro_impuesto_control.htmlTablaOrderByRel!=null
			&& otro_impuesto_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelotro_impuestoAjaxWebPart").html(otro_impuesto_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(otro_impuesto_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaotro_impuestoAjaxWebPart").css("display","none");
			jQuery("#trotro_impuestoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaotro_impuesto").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(otro_impuesto_control) {
		
		if(!otro_impuesto_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(otro_impuesto_control);
		} else {
			jQuery("#divTablaDatosotro_impuestosAjaxWebPart").html(otro_impuesto_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosotro_impuestos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(otro_impuesto_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosotro_impuestos=jQuery("#tblTablaDatosotro_impuestos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("otro_impuesto",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',otro_impuesto_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			otro_impuesto_webcontrol1.registrarControlesTableEdition(otro_impuesto_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		otro_impuesto_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(otro_impuesto_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("otro_impuesto_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(otro_impuesto_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosotro_impuestosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(otro_impuesto_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(otro_impuesto_control);
		
		const divOrderBy = document.getElementById("divOrderByotro_impuestoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(otro_impuesto_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelotro_impuestoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(otro_impuesto_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(otro_impuesto_control.otro_impuestoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(otro_impuesto_control);			
		}
	}
	
	actualizarCamposFilaTabla(otro_impuesto_control) {
		var i=0;
		
		i=otro_impuesto_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(otro_impuesto_control.otro_impuestoActual.id);
		jQuery("#t-version_row_"+i+"").val(otro_impuesto_control.otro_impuestoActual.versionRow);
		
		if(otro_impuesto_control.otro_impuestoActual.id_empresa!=null && otro_impuesto_control.otro_impuestoActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != otro_impuesto_control.otro_impuestoActual.id_empresa) {
				jQuery("#t-cel_"+i+"_2").val(otro_impuesto_control.otro_impuestoActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_3").val(otro_impuesto_control.otro_impuestoActual.codigo);
		jQuery("#t-cel_"+i+"_4").val(otro_impuesto_control.otro_impuestoActual.descripcion);
		jQuery("#t-cel_"+i+"_5").val(otro_impuesto_control.otro_impuestoActual.valor);
		jQuery("#t-cel_"+i+"_6").prop('checked',otro_impuesto_control.otro_impuestoActual.predeterminado);
		
		if(otro_impuesto_control.otro_impuestoActual.id_cuenta_ventas!=null && otro_impuesto_control.otro_impuestoActual.id_cuenta_ventas>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != otro_impuesto_control.otro_impuestoActual.id_cuenta_ventas) {
				jQuery("#t-cel_"+i+"_7").val(otro_impuesto_control.otro_impuestoActual.id_cuenta_ventas).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_7").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(otro_impuesto_control.otro_impuestoActual.id_cuenta_compras!=null && otro_impuesto_control.otro_impuestoActual.id_cuenta_compras>-1){
			if(jQuery("#t-cel_"+i+"_8").val() != otro_impuesto_control.otro_impuestoActual.id_cuenta_compras) {
				jQuery("#t-cel_"+i+"_8").val(otro_impuesto_control.otro_impuestoActual.id_cuenta_compras).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_8").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_8").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_9").val(otro_impuesto_control.otro_impuestoActual.cuenta_contable_ventas);
		jQuery("#t-cel_"+i+"_10").val(otro_impuesto_control.otro_impuestoActual.cuenta_contable_compras);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(otro_impuesto_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_producto_ventas").click(function(){
		jQuery("#tblTablaDatosotro_impuestos").on("click",".imgrelacionlista_producto_ventas", function () {

			var idActual=jQuery(this).attr("idactualotro_impuesto");

			otro_impuesto_webcontrol1.registrarSesion_ventasParalista_productoes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproducto").click(function(){
		jQuery("#tblTablaDatosotro_impuestos").on("click",".imgrelacionproducto", function () {

			var idActual=jQuery(this).attr("idactualotro_impuesto");

			otro_impuesto_webcontrol1.registrarSesionParaproductos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncliente").click(function(){
		jQuery("#tblTablaDatosotro_impuestos").on("click",".imgrelacioncliente", function () {

			var idActual=jQuery(this).attr("idactualotro_impuesto");

			otro_impuesto_webcontrol1.registrarSesionParaclientes(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionproveedor").click(function(){
		jQuery("#tblTablaDatosotro_impuestos").on("click",".imgrelacionproveedor", function () {

			var idActual=jQuery(this).attr("idactualotro_impuesto");

			otro_impuesto_webcontrol1.registrarSesionParaproveedores(idActual);
		});				
	}
		
	

	registrarSesion_ventasParalista_productoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"otro_impuesto","lista_producto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1,"es","_ventas");
	}

	registrarSesionParaproductos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"otro_impuesto","producto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1,"s","");
	}

	registrarSesionParaclientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"otro_impuesto","cliente","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1,"s","");
	}

	registrarSesionParaproveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"otro_impuesto","proveedor","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1,"es","");
	}
	
	registrarControlesTableEdition(otro_impuesto_control) {
		otro_impuesto_funcion1.registrarControlesTableValidacionEdition(otro_impuesto_control,otro_impuesto_webcontrol1,otro_impuesto_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(otro_impuesto_control) {
		jQuery("#divResumenotro_impuestoActualAjaxWebPart").html(otro_impuesto_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_impuesto_control) {
		//jQuery("#divAccionesRelacionesotro_impuestoAjaxWebPart").html(otro_impuesto_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("otro_impuesto_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(otro_impuesto_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesotro_impuestoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		otro_impuesto_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(otro_impuesto_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(otro_impuesto_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(otro_impuesto_control) {
		
		if(otro_impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",otro_impuesto_control.strVisibleFK_Idcuenta_compras);
			jQuery("#tblstrVisible"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras").attr("style",otro_impuesto_control.strVisibleFK_Idcuenta_compras);
		}

		if(otro_impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",otro_impuesto_control.strVisibleFK_Idcuenta_ventas);
			jQuery("#tblstrVisible"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas").attr("style",otro_impuesto_control.strVisibleFK_Idcuenta_ventas);
		}

		if(otro_impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",otro_impuesto_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",otro_impuesto_control.strVisibleFK_Idempresa);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionotro_impuesto();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("otro_impuesto",id,"facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		otro_impuesto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("otro_impuesto","empresa","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		otro_impuesto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("otro_impuesto","cuenta","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
	}

	abrirBusquedaParacuenta(strNombreCampoBusqueda){//idActual
		otro_impuesto_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("otro_impuesto","cuenta","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionlista_producto").click(function(){

			var idActual=jQuery(this).attr("idactualotro_impuesto");

			otro_impuesto_webcontrol1.registrarSesionParalista_productoes(idActual);
		});
		jQuery("#imgdivrelacionproducto").click(function(){

			var idActual=jQuery(this).attr("idactualotro_impuesto");

			otro_impuesto_webcontrol1.registrarSesionParaproductos(idActual);
		});
		jQuery("#imgdivrelacioncliente").click(function(){

			var idActual=jQuery(this).attr("idactualotro_impuesto");

			otro_impuesto_webcontrol1.registrarSesionParaclientes(idActual);
		});
		jQuery("#imgdivrelacionproveedor").click(function(){

			var idActual=jQuery(this).attr("idactualotro_impuesto");

			otro_impuesto_webcontrol1.registrarSesionParaproveedores(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuestoConstante,strParametros);
		
		//otro_impuesto_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(otro_impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa",otro_impuesto_control.empresasFK);

		if(otro_impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_impuesto_control.idFilaTablaActual+"_2",otro_impuesto_control.empresasFK);
		}
	};

	cargarComboscuenta_ventassFK(otro_impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas",otro_impuesto_control.cuenta_ventassFK);

		if(otro_impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_impuesto_control.idFilaTablaActual+"_7",otro_impuesto_control.cuenta_ventassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas",otro_impuesto_control.cuenta_ventassFK);

	};

	cargarComboscuenta_comprassFK(otro_impuesto_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras",otro_impuesto_control.cuenta_comprassFK);

		if(otro_impuesto_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_impuesto_control.idFilaTablaActual+"_8",otro_impuesto_control.cuenta_comprassFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras",otro_impuesto_control.cuenta_comprassFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(otro_impuesto_control) {

	};

	registrarComboActionChangeComboscuenta_ventassFK(otro_impuesto_control) {

	};

	registrarComboActionChangeComboscuenta_comprassFK(otro_impuesto_control) {

	};

	
	
	setDefectoValorCombosempresasFK(otro_impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_impuesto_control.idempresaDefaultFK>-1 && jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa").val() != otro_impuesto_control.idempresaDefaultFK) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa").val(otro_impuesto_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_ventassFK(otro_impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_impuesto_control.idcuenta_ventasDefaultFK>-1 && jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val() != otro_impuesto_control.idcuenta_ventasDefaultFK) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas").val(otro_impuesto_control.idcuenta_ventasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(otro_impuesto_control.idcuenta_ventasDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_ventas-cmbid_cuenta_ventas").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboscuenta_comprassFK(otro_impuesto_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_impuesto_control.idcuenta_comprasDefaultFK>-1 && jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val() != otro_impuesto_control.idcuenta_comprasDefaultFK) {
				jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras").val(otro_impuesto_control.idcuenta_comprasDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(otro_impuesto_control.idcuenta_comprasDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_impuesto_constante1.STR_SUFIJO+"FK_Idcuenta_compras-cmbid_cuenta_compras").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//otro_impuesto_control
		
	
	}
	
	onLoadCombosDefectoFK(otro_impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.setDefectoValorCombosempresasFK(otro_impuesto_control);
			}

			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.setDefectoValorComboscuenta_ventassFK(otro_impuesto_control);
			}

			if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",otro_impuesto_control.strRecargarFkTipos,",")) { 
				otro_impuesto_webcontrol1.setDefectoValorComboscuenta_comprassFK(otro_impuesto_control);
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
	onLoadCombosEventosFK(otro_impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",otro_impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_impuesto_webcontrol1.registrarComboActionChangeCombosempresasFK(otro_impuesto_control);
			//}

			//if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_ventas",otro_impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_impuesto_webcontrol1.registrarComboActionChangeComboscuenta_ventassFK(otro_impuesto_control);
			//}

			//if(otro_impuesto_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cuenta_compras",otro_impuesto_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_impuesto_webcontrol1.registrarComboActionChangeComboscuenta_comprassFK(otro_impuesto_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(otro_impuesto_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_impuesto_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(otro_impuesto_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(otro_impuesto_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("otro_impuesto","FK_Idcuenta_compras","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("otro_impuesto","FK_Idcuenta_ventas","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("otro_impuesto","FK_Idempresa","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
		
			
			if(otro_impuesto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("otro_impuesto");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("otro_impuesto");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(otro_impuesto_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,"otro_impuesto");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				otro_impuesto_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_ventas","contabilidad","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_ventas_img_busqueda").click(function(){
				otro_impuesto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_ventas");
				//alert(jQuery('#form-id_cuenta_ventas_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cuenta","id_cuenta_compras","contabilidad","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_impuesto_constante1.STR_SUFIJO+"-id_cuenta_compras_img_busqueda").click(function(){
				otro_impuesto_webcontrol1.abrirBusquedaParacuenta("id_cuenta_compras");
				//alert(jQuery('#form-id_cuenta_compras_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("otro_impuesto");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(otro_impuesto_control) {
		
		jQuery("#divBusquedaotro_impuestoAjaxWebPart").css("display",otro_impuesto_control.strPermisoBusqueda);
		jQuery("#trotro_impuestoCabeceraBusquedas").css("display",otro_impuesto_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_impuesto").css("display",otro_impuesto_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteotro_impuesto").css("display",otro_impuesto_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosotro_impuesto").attr("style",otro_impuesto_control.strPermisoMostrarTodos);		
		
		if(otro_impuesto_control.strPermisoNuevo!=null) {
			jQuery("#tdotro_impuestoNuevo").css("display",otro_impuesto_control.strPermisoNuevo);
			jQuery("#tdotro_impuestoNuevoToolBar").css("display",otro_impuesto_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdotro_impuestoDuplicar").css("display",otro_impuesto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_impuestoDuplicarToolBar").css("display",otro_impuesto_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_impuestoNuevoGuardarCambios").css("display",otro_impuesto_control.strPermisoNuevo);
			jQuery("#tdotro_impuestoNuevoGuardarCambiosToolBar").css("display",otro_impuesto_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(otro_impuesto_control.strPermisoActualizar!=null) {
			jQuery("#tdotro_impuestoCopiar").css("display",otro_impuesto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_impuestoCopiarToolBar").css("display",otro_impuesto_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_impuestoConEditar").css("display",otro_impuesto_control.strPermisoActualizar);
		}
		
		jQuery("#tdotro_impuestoGuardarCambios").css("display",otro_impuesto_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdotro_impuestoGuardarCambiosToolBar").css("display",otro_impuesto_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdotro_impuestoCerrarPagina").css("display",otro_impuesto_control.strPermisoPopup);		
		jQuery("#tdotro_impuestoCerrarPaginaToolBar").css("display",otro_impuesto_control.strPermisoPopup);
		//jQuery("#trotro_impuestoAccionesRelaciones").css("display",otro_impuesto_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=otro_impuesto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_impuesto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + otro_impuesto_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Otro Impuestos";
		sTituloBanner+=" - " + otro_impuesto_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_impuesto_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdotro_impuestoRelacionesToolBar").css("display",otro_impuesto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosotro_impuesto").css("display",otro_impuesto_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		otro_impuesto_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		otro_impuesto_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		otro_impuesto_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		otro_impuesto_webcontrol1.registrarEventosControles();
		
		if(otro_impuesto_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(otro_impuesto_constante1.STR_ES_RELACIONADO=="false") {
			otro_impuesto_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(otro_impuesto_constante1.STR_ES_RELACIONES=="true") {
			if(otro_impuesto_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_impuesto_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(otro_impuesto_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(otro_impuesto_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				otro_impuesto_webcontrol1.onLoad();
			
			//} else {
				//if(otro_impuesto_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			otro_impuesto_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("otro_impuesto","facturacion","",otro_impuesto_funcion1,otro_impuesto_webcontrol1,otro_impuesto_constante1);	
	}
}

var otro_impuesto_webcontrol1 = new otro_impuesto_webcontrol();

//Para ser llamado desde otro archivo (import)
export {otro_impuesto_webcontrol,otro_impuesto_webcontrol1};

//Para ser llamado desde window.opener
window.otro_impuesto_webcontrol1 = otro_impuesto_webcontrol1;


if(otro_impuesto_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = otro_impuesto_webcontrol1.onLoadWindow; 
}

//</script>