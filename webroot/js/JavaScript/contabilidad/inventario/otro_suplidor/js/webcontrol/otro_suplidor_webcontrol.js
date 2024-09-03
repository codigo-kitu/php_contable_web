//<script type="text/javascript" language="javascript">



//var otro_suplidorJQueryPaginaWebInteraccion= function (otro_suplidor_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {otro_suplidor_constante,otro_suplidor_constante1} from '../util/otro_suplidor_constante.js';

import {otro_suplidor_funcion,otro_suplidor_funcion1} from '../util/otro_suplidor_funcion.js';


class otro_suplidor_webcontrol extends GeneralEntityWebControl {
	
	otro_suplidor_control=null;
	otro_suplidor_controlInicial=null;
	otro_suplidor_controlAuxiliar=null;
		
	//if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(otro_suplidor_control) {
		super();
		
		this.otro_suplidor_control=otro_suplidor_control;
	}
		
	actualizarVariablesPagina(otro_suplidor_control) {
		
		if(otro_suplidor_control.action=="index" || otro_suplidor_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(otro_suplidor_control);
			
		} 
		
		
		else if(otro_suplidor_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(otro_suplidor_control);
			
		} else if(otro_suplidor_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(otro_suplidor_control);
			
		} else if(otro_suplidor_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_suplidor_control);		
		
		} else if(otro_suplidor_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(otro_suplidor_control);
		
		}  else if(otro_suplidor_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_suplidor_control);
		
		} else if(otro_suplidor_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_suplidor_control);		
		
		} else if(otro_suplidor_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(otro_suplidor_control);		
		
		} else if(otro_suplidor_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(otro_suplidor_control);		
		
		} else if(otro_suplidor_control.action.includes("Busqueda") ||
				  otro_suplidor_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(otro_suplidor_control);
			
		} else if(otro_suplidor_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(otro_suplidor_control)
		}
		
		
		
	
		else if(otro_suplidor_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(otro_suplidor_control);	
		
		} else if(otro_suplidor_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(otro_suplidor_control);		
		}
	
		else if(otro_suplidor_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(otro_suplidor_control);		
		}
	
		else if(otro_suplidor_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(otro_suplidor_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + otro_suplidor_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(otro_suplidor_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(otro_suplidor_control) {
		this.actualizarPaginaAccionesGenerales(otro_suplidor_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(otro_suplidor_control) {
		
		this.actualizarPaginaCargaGeneral(otro_suplidor_control);
		this.actualizarPaginaOrderBy(otro_suplidor_control);
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		this.actualizarPaginaCargaGeneralControles(otro_suplidor_control);
		//this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_suplidor_control);
		this.actualizarPaginaAreaBusquedas(otro_suplidor_control);
		this.actualizarPaginaCargaCombosFK(otro_suplidor_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(otro_suplidor_control) {
		//this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(otro_suplidor_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(otro_suplidor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_suplidor_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(otro_suplidor_control) {
		
		this.actualizarPaginaCargaGeneral(otro_suplidor_control);
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		this.actualizarPaginaCargaGeneralControles(otro_suplidor_control);
		//this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(otro_suplidor_control);
		this.actualizarPaginaAreaBusquedas(otro_suplidor_control);
		this.actualizarPaginaCargaCombosFK(otro_suplidor_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		//this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		//this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		//this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(otro_suplidor_control) {
		//this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(otro_suplidor_control) {
		this.actualizarPaginaAbrirLink(otro_suplidor_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);				
		//this.actualizarPaginaFormulario(otro_suplidor_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		//this.actualizarPaginaFormulario(otro_suplidor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		//this.actualizarPaginaFormulario(otro_suplidor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(otro_suplidor_control) {
		//this.actualizarPaginaFormulario(otro_suplidor_control);
		this.onLoadCombosDefectoFK(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		//this.actualizarPaginaFormulario(otro_suplidor_control);
		this.onLoadCombosDefectoFK(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		//this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(otro_suplidor_control) {
		this.actualizarPaginaAbrirLink(otro_suplidor_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(otro_suplidor_control) {
					//super.actualizarPaginaImprimir(otro_suplidor_control,"otro_suplidor");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_suplidor_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("otro_suplidor_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(otro_suplidor_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_suplidor_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(otro_suplidor_control) {
		//super.actualizarPaginaImprimir(otro_suplidor_control,"otro_suplidor");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("otro_suplidor_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(otro_suplidor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_suplidor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(otro_suplidor_control) {
		//super.actualizarPaginaImprimir(otro_suplidor_control,"otro_suplidor");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("otro_suplidor_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(otro_suplidor_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",otro_suplidor_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(otro_suplidor_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(otro_suplidor_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(otro_suplidor_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(otro_suplidor_control);
			
		this.actualizarPaginaAbrirLink(otro_suplidor_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(otro_suplidor_control) {
		this.actualizarPaginaTablaDatos(otro_suplidor_control);
		this.actualizarPaginaFormulario(otro_suplidor_control);
		this.actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control);		
		this.actualizarPaginaAreaMantenimiento(otro_suplidor_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(otro_suplidor_control) {
		
		if(otro_suplidor_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(otro_suplidor_control);
		}
		
		if(otro_suplidor_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(otro_suplidor_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(otro_suplidor_control) {
		if(otro_suplidor_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("otro_suplidorReturnGeneral",JSON.stringify(otro_suplidor_control.otro_suplidorReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(otro_suplidor_control) {
		if(otro_suplidor_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && otro_suplidor_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(otro_suplidor_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(otro_suplidor_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(otro_suplidor_control, mostrar) {
		
		if(mostrar==true) {
			otro_suplidor_funcion1.resaltarRestaurarDivsPagina(false,"otro_suplidor");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				otro_suplidor_funcion1.resaltarRestaurarDivMantenimiento(false,"otro_suplidor");
			}			
			
			otro_suplidor_funcion1.mostrarDivMensaje(true,otro_suplidor_control.strAuxiliarMensaje,otro_suplidor_control.strAuxiliarCssMensaje);
		
		} else {
			otro_suplidor_funcion1.mostrarDivMensaje(false,otro_suplidor_control.strAuxiliarMensaje,otro_suplidor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(otro_suplidor_control) {
		if(otro_suplidor_funcion1.esPaginaForm(otro_suplidor_constante1)==true) {
			window.opener.otro_suplidor_webcontrol1.actualizarPaginaTablaDatos(otro_suplidor_control);
		} else {
			this.actualizarPaginaTablaDatos(otro_suplidor_control);
		}
	}
	
	actualizarPaginaAbrirLink(otro_suplidor_control) {
		otro_suplidor_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(otro_suplidor_control.strAuxiliarUrlPagina);
				
		otro_suplidor_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(otro_suplidor_control.strAuxiliarTipo,otro_suplidor_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(otro_suplidor_control) {
		otro_suplidor_funcion1.resaltarRestaurarDivMensaje(true,otro_suplidor_control.strAuxiliarMensajeAlert,otro_suplidor_control.strAuxiliarCssMensaje);
			
		if(otro_suplidor_funcion1.esPaginaForm(otro_suplidor_constante1)==true) {
			window.opener.otro_suplidor_funcion1.resaltarRestaurarDivMensaje(true,otro_suplidor_control.strAuxiliarMensajeAlert,otro_suplidor_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(otro_suplidor_control) {
		this.otro_suplidor_controlInicial=otro_suplidor_control;
			
		if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(otro_suplidor_control.strStyleDivArbol,otro_suplidor_control.strStyleDivContent
																,otro_suplidor_control.strStyleDivOpcionesBanner,otro_suplidor_control.strStyleDivExpandirColapsar
																,otro_suplidor_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=otro_suplidor_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",otro_suplidor_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(otro_suplidor_control) {
		this.actualizarCssBotonesPagina(otro_suplidor_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(otro_suplidor_control.tiposReportes,otro_suplidor_control.tiposReporte
															 	,otro_suplidor_control.tiposPaginacion,otro_suplidor_control.tiposAcciones
																,otro_suplidor_control.tiposColumnasSelect,otro_suplidor_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(otro_suplidor_control.tiposRelaciones,otro_suplidor_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(otro_suplidor_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(otro_suplidor_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(otro_suplidor_control);			
	}
	
	actualizarPaginaUsuarioInvitado(otro_suplidor_control) {
	
		var indexPosition=otro_suplidor_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=otro_suplidor_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(otro_suplidor_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.cargarCombosproductosFK(otro_suplidor_control);
			}

			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.cargarCombosproveedorsFK(otro_suplidor_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(otro_suplidor_control.strRecargarFkTiposNinguno!=null && otro_suplidor_control.strRecargarFkTiposNinguno!='NINGUNO' && otro_suplidor_control.strRecargarFkTiposNinguno!='') {
			
				if(otro_suplidor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTiposNinguno,",")) { 
					otro_suplidor_webcontrol1.cargarCombosproductosFK(otro_suplidor_control);
				}

				if(otro_suplidor_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTiposNinguno,",")) { 
					otro_suplidor_webcontrol1.cargarCombosproveedorsFK(otro_suplidor_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaproductoFK(otro_suplidor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_suplidor_funcion1,otro_suplidor_control.productosFK);
	}

	cargarComboEditarTablaproveedorFK(otro_suplidor_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,otro_suplidor_funcion1,otro_suplidor_control.proveedorsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(otro_suplidor_control) {
		jQuery("#divBusquedaotro_suplidorAjaxWebPart").css("display",otro_suplidor_control.strPermisoBusqueda);
		jQuery("#trotro_suplidorCabeceraBusquedas").css("display",otro_suplidor_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_suplidor").css("display",otro_suplidor_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(otro_suplidor_control.htmlTablaOrderBy!=null
			&& otro_suplidor_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByotro_suplidorAjaxWebPart").html(otro_suplidor_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//otro_suplidor_webcontrol1.registrarOrderByActions();
			
		}
			
		if(otro_suplidor_control.htmlTablaOrderByRel!=null
			&& otro_suplidor_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelotro_suplidorAjaxWebPart").html(otro_suplidor_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(otro_suplidor_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedaotro_suplidorAjaxWebPart").css("display","none");
			jQuery("#trotro_suplidorCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedaotro_suplidor").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(otro_suplidor_control) {
		
		if(!otro_suplidor_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(otro_suplidor_control);
		} else {
			jQuery("#divTablaDatosotro_suplidorsAjaxWebPart").html(otro_suplidor_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosotro_suplidors=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosotro_suplidors=jQuery("#tblTablaDatosotro_suplidors").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("otro_suplidor",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',otro_suplidor_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			otro_suplidor_webcontrol1.registrarControlesTableEdition(otro_suplidor_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		otro_suplidor_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(otro_suplidor_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("otro_suplidor_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(otro_suplidor_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosotro_suplidorsAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(otro_suplidor_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(otro_suplidor_control);
		
		const divOrderBy = document.getElementById("divOrderByotro_suplidorAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(otro_suplidor_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelotro_suplidorAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(otro_suplidor_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(otro_suplidor_control.otro_suplidorActual!=null) {//form
			
			this.actualizarCamposFilaTabla(otro_suplidor_control);			
		}
	}
	
	actualizarCamposFilaTabla(otro_suplidor_control) {
		var i=0;
		
		i=otro_suplidor_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(otro_suplidor_control.otro_suplidorActual.id);
		jQuery("#t-version_row_"+i+"").val(otro_suplidor_control.otro_suplidorActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(otro_suplidor_control.otro_suplidorActual.versionRow);
		
		if(otro_suplidor_control.otro_suplidorActual.id_producto!=null && otro_suplidor_control.otro_suplidorActual.id_producto>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != otro_suplidor_control.otro_suplidorActual.id_producto) {
				jQuery("#t-cel_"+i+"_3").val(otro_suplidor_control.otro_suplidorActual.id_producto).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(otro_suplidor_control.otro_suplidorActual.id_proveedor!=null && otro_suplidor_control.otro_suplidorActual.id_proveedor>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != otro_suplidor_control.otro_suplidorActual.id_proveedor) {
				jQuery("#t-cel_"+i+"_4").val(otro_suplidor_control.otro_suplidorActual.id_proveedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(otro_suplidor_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioncotizacion_detalle").click(function(){
		jQuery("#tblTablaDatosotro_suplidors").on("click",".imgrelacioncotizacion_detalle", function () {

			var idActual=jQuery(this).attr("idactualotro_suplidor");

			otro_suplidor_webcontrol1.registrarSesionParacotizacion_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionlista_producto").click(function(){
		jQuery("#tblTablaDatosotro_suplidors").on("click",".imgrelacionlista_producto", function () {

			var idActual=jQuery(this).attr("idactualotro_suplidor");

			otro_suplidor_webcontrol1.registrarSesionParalista_productoes(idActual);
		});				
	}
		
	

	registrarSesionParacotizacion_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"otro_suplidor","cotizacion_detalle","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1,"s","");
	}

	registrarSesionParalista_productoes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"otro_suplidor","lista_producto","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1,"es","");
	}
	
	registrarControlesTableEdition(otro_suplidor_control) {
		otro_suplidor_funcion1.registrarControlesTableValidacionEdition(otro_suplidor_control,otro_suplidor_webcontrol1,otro_suplidor_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(otro_suplidor_control) {
		jQuery("#divResumenotro_suplidorActualAjaxWebPart").html(otro_suplidor_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(otro_suplidor_control) {
		//jQuery("#divAccionesRelacionesotro_suplidorAjaxWebPart").html(otro_suplidor_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("otro_suplidor_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(otro_suplidor_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesotro_suplidorAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		otro_suplidor_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(otro_suplidor_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(otro_suplidor_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(otro_suplidor_control) {
		
		if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",otro_suplidor_control.strVisibleFK_Idproducto);
			jQuery("#tblstrVisible"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto").attr("style",otro_suplidor_control.strVisibleFK_Idproducto);
		}

		if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",otro_suplidor_control.strVisibleFK_Idproveedor);
			jQuery("#tblstrVisible"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor").attr("style",otro_suplidor_control.strVisibleFK_Idproveedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionotro_suplidor();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("otro_suplidor",id,"inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);		
	}
	
	

	abrirBusquedaParaproducto(strNombreCampoBusqueda){//idActual
		otro_suplidor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("otro_suplidor","producto","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
	}

	abrirBusquedaParaproveedor(strNombreCampoBusqueda){//idActual
		otro_suplidor_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("otro_suplidor","proveedor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioncotizacion_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualotro_suplidor");

			otro_suplidor_webcontrol1.registrarSesionParacotizacion_detalles(idActual);
		});
		jQuery("#imgdivrelacionlista_producto").click(function(){

			var idActual=jQuery(this).attr("idactualotro_suplidor");

			otro_suplidor_webcontrol1.registrarSesionParalista_productoes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidorConstante,strParametros);
		
		//otro_suplidor_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosproductosFK(otro_suplidor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto",otro_suplidor_control.productosFK);

		if(otro_suplidor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_suplidor_control.idFilaTablaActual+"_3",otro_suplidor_control.productosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto",otro_suplidor_control.productosFK);

	};

	cargarCombosproveedorsFK(otro_suplidor_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor",otro_suplidor_control.proveedorsFK);

		if(otro_suplidor_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+otro_suplidor_control.idFilaTablaActual+"_4",otro_suplidor_control.proveedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor",otro_suplidor_control.proveedorsFK);

	};

	
	
	registrarComboActionChangeCombosproductosFK(otro_suplidor_control) {

	};

	registrarComboActionChangeCombosproveedorsFK(otro_suplidor_control) {

	};

	
	
	setDefectoValorCombosproductosFK(otro_suplidor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_suplidor_control.idproductoDefaultFK>-1 && jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val() != otro_suplidor_control.idproductoDefaultFK) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto").val(otro_suplidor_control.idproductoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(otro_suplidor_control.idproductoDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproducto-cmbid_producto").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosproveedorsFK(otro_suplidor_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(otro_suplidor_control.idproveedorDefaultFK>-1 && jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val() != otro_suplidor_control.idproveedorDefaultFK) {
				jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor").val(otro_suplidor_control.idproveedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(otro_suplidor_control.idproveedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+otro_suplidor_constante1.STR_SUFIJO+"FK_Idproveedor-cmbid_proveedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//otro_suplidor_control
		
	
	}
	
	onLoadCombosDefectoFK(otro_suplidor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_suplidor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.setDefectoValorCombosproductosFK(otro_suplidor_control);
			}

			if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTipos,",")) { 
				otro_suplidor_webcontrol1.setDefectoValorCombosproveedorsFK(otro_suplidor_control);
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
	onLoadCombosEventosFK(otro_suplidor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_suplidor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_producto",otro_suplidor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_suplidor_webcontrol1.registrarComboActionChangeCombosproductosFK(otro_suplidor_control);
			//}

			//if(otro_suplidor_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_proveedor",otro_suplidor_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				otro_suplidor_webcontrol1.registrarComboActionChangeCombosproveedorsFK(otro_suplidor_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(otro_suplidor_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(otro_suplidor_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(otro_suplidor_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("otro_suplidor","FK_Idproducto","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("otro_suplidor","FK_Idproveedor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
		
			
			if(otro_suplidor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("otro_suplidor");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("otro_suplidor");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(otro_suplidor_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,"otro_suplidor");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("producto","id_producto","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_producto_img_busqueda").click(function(){
				otro_suplidor_webcontrol1.abrirBusquedaParaproducto("id_producto");
				//alert(jQuery('#form-id_producto_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("proveedor","id_proveedor","cuentaspagar","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+otro_suplidor_constante1.STR_SUFIJO+"-id_proveedor_img_busqueda").click(function(){
				otro_suplidor_webcontrol1.abrirBusquedaParaproveedor("id_proveedor");
				//alert(jQuery('#form-id_proveedor_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("otro_suplidor");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(otro_suplidor_control) {
		
		jQuery("#divBusquedaotro_suplidorAjaxWebPart").css("display",otro_suplidor_control.strPermisoBusqueda);
		jQuery("#trotro_suplidorCabeceraBusquedas").css("display",otro_suplidor_control.strPermisoBusqueda);
		jQuery("#trBusquedaotro_suplidor").css("display",otro_suplidor_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteotro_suplidor").css("display",otro_suplidor_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosotro_suplidor").attr("style",otro_suplidor_control.strPermisoMostrarTodos);		
		
		if(otro_suplidor_control.strPermisoNuevo!=null) {
			jQuery("#tdotro_suplidorNuevo").css("display",otro_suplidor_control.strPermisoNuevo);
			jQuery("#tdotro_suplidorNuevoToolBar").css("display",otro_suplidor_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdotro_suplidorDuplicar").css("display",otro_suplidor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_suplidorDuplicarToolBar").css("display",otro_suplidor_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdotro_suplidorNuevoGuardarCambios").css("display",otro_suplidor_control.strPermisoNuevo);
			jQuery("#tdotro_suplidorNuevoGuardarCambiosToolBar").css("display",otro_suplidor_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(otro_suplidor_control.strPermisoActualizar!=null) {
			jQuery("#tdotro_suplidorCopiar").css("display",otro_suplidor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_suplidorCopiarToolBar").css("display",otro_suplidor_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdotro_suplidorConEditar").css("display",otro_suplidor_control.strPermisoActualizar);
		}
		
		jQuery("#tdotro_suplidorGuardarCambios").css("display",otro_suplidor_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdotro_suplidorGuardarCambiosToolBar").css("display",otro_suplidor_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdotro_suplidorCerrarPagina").css("display",otro_suplidor_control.strPermisoPopup);		
		jQuery("#tdotro_suplidorCerrarPaginaToolBar").css("display",otro_suplidor_control.strPermisoPopup);
		//jQuery("#trotro_suplidorAccionesRelaciones").css("display",otro_suplidor_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=otro_suplidor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_suplidor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + otro_suplidor_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Otro Suplidores";
		sTituloBanner+=" - " + otro_suplidor_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + otro_suplidor_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdotro_suplidorRelacionesToolBar").css("display",otro_suplidor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosotro_suplidor").css("display",otro_suplidor_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		otro_suplidor_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		otro_suplidor_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		otro_suplidor_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		otro_suplidor_webcontrol1.registrarEventosControles();
		
		if(otro_suplidor_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
			otro_suplidor_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(otro_suplidor_constante1.STR_ES_RELACIONES=="true") {
			if(otro_suplidor_constante1.BIT_ES_PAGINA_FORM==true) {
				otro_suplidor_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(otro_suplidor_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(otro_suplidor_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				otro_suplidor_webcontrol1.onLoad();
			
			//} else {
				//if(otro_suplidor_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			otro_suplidor_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("otro_suplidor","inventario","",otro_suplidor_funcion1,otro_suplidor_webcontrol1,otro_suplidor_constante1);	
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

var otro_suplidor_webcontrol1 = new otro_suplidor_webcontrol();

//Para ser llamado desde otro archivo (import)
export {otro_suplidor_webcontrol,otro_suplidor_webcontrol1};

//Para ser llamado desde window.opener
window.otro_suplidor_webcontrol1 = otro_suplidor_webcontrol1;


if(otro_suplidor_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = otro_suplidor_webcontrol1.onLoadWindow; 
}

//</script>