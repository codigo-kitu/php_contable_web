//<script type="text/javascript" language="javascript">



//var factura_loteJQueryPaginaWebInteraccion= function (factura_lote_control) {
//this.,this.,this.

import {Constantes,constantes} from '../../../Library/General/Constantes.js';
import {GeneralEntityWebControl} from '../../../Library/Entity/GeneralEntityWebControl.js';
import {FuncionGeneral,funcionGeneral} from '../../../Library/General/FuncionGeneral.js';
import {FuncionGeneralJQuery,funcionGeneralJQuery} from '../../../Library/General/FuncionGeneralJQuery.js';
import {FuncionGeneralEventoJQuery,funcionGeneralEventoJQuery} from '../../../Library/General/FuncionGeneralEventoJQuery.js';

import {factura_lote_constante,factura_lote_constante1} from '../util/factura_lote_constante.js';

import {factura_lote_funcion,factura_lote_funcion1} from '../util/factura_lote_funcion.js';


class factura_lote_webcontrol extends GeneralEntityWebControl {
	
	factura_lote_control=null;
	factura_lote_controlInicial=null;
	factura_lote_controlAuxiliar=null;
		
	//if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(factura_lote_control) {
		super();
		
		this.factura_lote_control=factura_lote_control;
	}
		
	actualizarVariablesPagina(factura_lote_control) {
		
		if(factura_lote_control.action=="index" || factura_lote_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(factura_lote_control);
			
		} 
		
		
		else if(factura_lote_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_lote_control);
		
		} else if(factura_lote_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(factura_lote_control);
		
		} else if(factura_lote_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_lote_control);
		
		} else if(factura_lote_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(factura_lote_control);
			
		} else if(factura_lote_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(factura_lote_control);
			
		} else if(factura_lote_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_lote_control);
		
		} else if(factura_lote_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_lote_control);		
		
		} else if(factura_lote_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(factura_lote_control);
		
		} else if(factura_lote_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(factura_lote_control);
		
		} else if(factura_lote_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(factura_lote_control);
		
		} else if(factura_lote_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(factura_lote_control);
		
		}  else if(factura_lote_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_lote_control);
		
		} else if(factura_lote_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_lote_control);
		
		} else if(factura_lote_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(factura_lote_control);
		
		} else if(factura_lote_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(factura_lote_control);
		
		} else if(factura_lote_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(factura_lote_control);
		
		} else if(factura_lote_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_lote_control);
		
		} else if(factura_lote_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_lote_control);
		
		} else if(factura_lote_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(factura_lote_control);
		
		} else if(factura_lote_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_lote_control);
		
		} else if(factura_lote_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_lote_control);		
		
		} else if(factura_lote_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(factura_lote_control);		
		
		} else if(factura_lote_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(factura_lote_control);		
		
		} else if(factura_lote_control.action.includes("Busqueda") ||
				  factura_lote_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(factura_lote_control);
			
		} else if(factura_lote_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(factura_lote_control)
		}
		
		
		
	
		else if(factura_lote_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(factura_lote_control);	
		
		} else if(factura_lote_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(factura_lote_control);		
		}
	
		else if(factura_lote_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(factura_lote_control);		
		}
	
		else if(factura_lote_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(factura_lote_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + factura_lote_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(factura_lote_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(factura_lote_control) {
		this.actualizarPaginaAccionesGenerales(factura_lote_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(factura_lote_control) {
		
		this.actualizarPaginaCargaGeneral(factura_lote_control);
		this.actualizarPaginaOrderBy(factura_lote_control);
		this.actualizarPaginaTablaDatos(factura_lote_control);
		this.actualizarPaginaCargaGeneralControles(factura_lote_control);
		//this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_lote_control);
		this.actualizarPaginaAreaBusquedas(factura_lote_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(factura_lote_control) {
		//this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(factura_lote_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(factura_lote_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_lote_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(factura_lote_control) {
		
		this.actualizarPaginaCargaGeneral(factura_lote_control);
		this.actualizarPaginaTablaDatos(factura_lote_control);
		this.actualizarPaginaCargaGeneralControles(factura_lote_control);
		//this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(factura_lote_control);
		this.actualizarPaginaAreaBusquedas(factura_lote_control);
		this.actualizarPaginaCargaCombosFK(factura_lote_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		//this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		//this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		//this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(factura_lote_control) {
		//this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(factura_lote_control) {
		this.actualizarPaginaAbrirLink(factura_lote_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);				
		//this.actualizarPaginaFormulario(factura_lote_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);
		//this.actualizarPaginaFormulario(factura_lote_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);
		//this.actualizarPaginaFormulario(factura_lote_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(factura_lote_control) {
		//this.actualizarPaginaFormulario(factura_lote_control);
		this.onLoadCombosDefectoFK(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);
		//this.actualizarPaginaFormulario(factura_lote_control);
		this.onLoadCombosDefectoFK(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		//this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(factura_lote_control) {
		this.actualizarPaginaAbrirLink(factura_lote_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(factura_lote_control) {
					//super.actualizarPaginaImprimir(factura_lote_control,"factura_lote");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",factura_lote_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("factura_lote_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(factura_lote_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(factura_lote_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(factura_lote_control) {
		//super.actualizarPaginaImprimir(factura_lote_control,"factura_lote");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("factura_lote_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(factura_lote_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",factura_lote_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(factura_lote_control) {
		//super.actualizarPaginaImprimir(factura_lote_control,"factura_lote");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("factura_lote_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(factura_lote_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",factura_lote_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(factura_lote_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(factura_lote_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(factura_lote_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(factura_lote_control);
			
		this.actualizarPaginaAbrirLink(factura_lote_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(factura_lote_control) {
		this.actualizarPaginaTablaDatos(factura_lote_control);
		this.actualizarPaginaFormulario(factura_lote_control);
		this.actualizarPaginaMensajePantallaAuxiliar(factura_lote_control);		
		this.actualizarPaginaAreaMantenimiento(factura_lote_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(factura_lote_control) {
		
		if(factura_lote_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(factura_lote_control);
		}
		
		if(factura_lote_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(factura_lote_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(factura_lote_control) {
		if(factura_lote_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("factura_loteReturnGeneral",JSON.stringify(factura_lote_control.factura_loteReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(factura_lote_control) {
		if(factura_lote_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && factura_lote_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(factura_lote_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(factura_lote_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(factura_lote_control, mostrar) {
		
		if(mostrar==true) {
			factura_lote_funcion1.resaltarRestaurarDivsPagina(false,"factura_lote");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				factura_lote_funcion1.resaltarRestaurarDivMantenimiento(false,"factura_lote");
			}			
			
			factura_lote_funcion1.mostrarDivMensaje(true,factura_lote_control.strAuxiliarMensaje,factura_lote_control.strAuxiliarCssMensaje);
		
		} else {
			factura_lote_funcion1.mostrarDivMensaje(false,factura_lote_control.strAuxiliarMensaje,factura_lote_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(factura_lote_control) {
		if(factura_lote_funcion1.esPaginaForm(factura_lote_constante1)==true) {
			window.opener.factura_lote_webcontrol1.actualizarPaginaTablaDatos(factura_lote_control);
		} else {
			this.actualizarPaginaTablaDatos(factura_lote_control);
		}
	}
	
	actualizarPaginaAbrirLink(factura_lote_control) {
		factura_lote_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(factura_lote_control.strAuxiliarUrlPagina);
				
		factura_lote_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(factura_lote_control.strAuxiliarTipo,factura_lote_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(factura_lote_control) {
		factura_lote_funcion1.resaltarRestaurarDivMensaje(true,factura_lote_control.strAuxiliarMensajeAlert,factura_lote_control.strAuxiliarCssMensaje);
			
		if(factura_lote_funcion1.esPaginaForm(factura_lote_constante1)==true) {
			window.opener.factura_lote_funcion1.resaltarRestaurarDivMensaje(true,factura_lote_control.strAuxiliarMensajeAlert,factura_lote_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(factura_lote_control) {
		this.factura_lote_controlInicial=factura_lote_control;
			
		if(factura_lote_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(factura_lote_control.strStyleDivArbol,factura_lote_control.strStyleDivContent
																,factura_lote_control.strStyleDivOpcionesBanner,factura_lote_control.strStyleDivExpandirColapsar
																,factura_lote_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=factura_lote_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",factura_lote_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(factura_lote_control) {
		this.actualizarCssBotonesPagina(factura_lote_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(factura_lote_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(factura_lote_control.tiposReportes,factura_lote_control.tiposReporte
															 	,factura_lote_control.tiposPaginacion,factura_lote_control.tiposAcciones
																,factura_lote_control.tiposColumnasSelect,factura_lote_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(factura_lote_control.tiposRelaciones,factura_lote_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(factura_lote_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(factura_lote_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(factura_lote_control);			
	}
	
	actualizarPaginaUsuarioInvitado(factura_lote_control) {
	
		var indexPosition=factura_lote_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=factura_lote_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(factura_lote_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosempresasFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombossucursalsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosejerciciosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosperiodosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosusuariosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosclientesFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosvendedorsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombostermino_pagosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosmonedasFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosestadosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosasientosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.cargarComboskardexsFK(factura_lote_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(factura_lote_control.strRecargarFkTiposNinguno!=null && factura_lote_control.strRecargarFkTiposNinguno!='NINGUNO' && factura_lote_control.strRecargarFkTiposNinguno!='') {
			
				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_empresa",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosempresasFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_sucursal",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombossucursalsFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_ejercicio",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosejerciciosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_periodo",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosperiodosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_usuario",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosusuariosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_cliente",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosclientesFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_vendedor",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosvendedorsFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_termino_pago",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombostermino_pagosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_moneda",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosmonedasFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_estado",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosestadosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_asiento",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosasientosFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarCombosdocumento_cuenta_cobrarsFK(factura_lote_control);
				}

				if(factura_lote_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_kardex",factura_lote_control.strRecargarFkTiposNinguno,",")) { 
					factura_lote_webcontrol1.cargarComboskardexsFK(factura_lote_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
		else if(sNombreColumna=="id_cliente") {

			//SI ES FORMULARIO, SELECCIONA RELACIONADOS ACTUAL
			if(nombreCombo=="form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente" && strRecargarFkTipos!="NINGUNO") {
				if(objetoController.factura_loteActual.NINGUNO!=null){
					if(jQuery("#form-NINGUNO").val() != objetoController.factura_loteActual.NINGUNO) {
						jQuery("#form-NINGUNO").val(objetoController.factura_loteActual.NINGUNO).trigger("change");
					}
				}
			}
		}
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablaempresaFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.empresasFK);
	}

	cargarComboEditarTablasucursalFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.sucursalsFK);
	}

	cargarComboEditarTablaejercicioFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.ejerciciosFK);
	}

	cargarComboEditarTablaperiodoFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.periodosFK);
	}

	cargarComboEditarTablausuarioFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.usuariosFK);
	}

	cargarComboEditarTablaclienteFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.clientesFK);
	}

	cargarComboEditarTablavendedorFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.vendedorsFK);
	}

	cargarComboEditarTablatermino_pagoFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.termino_pagosFK);
	}

	cargarComboEditarTablamonedaFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.monedasFK);
	}

	cargarComboEditarTablaestadoFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.estadosFK);
	}

	cargarComboEditarTablaasientoFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.asientosFK);
	}

	cargarComboEditarTabladocumento_cuenta_cobrarFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.documento_cuenta_cobrarsFK);
	}

	cargarComboEditarTablakardexFK(factura_lote_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,factura_lote_funcion1,factura_lote_control.kardexsFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(factura_lote_control) {
		jQuery("#divBusquedafactura_loteAjaxWebPart").css("display",factura_lote_control.strPermisoBusqueda);
		jQuery("#trfactura_loteCabeceraBusquedas").css("display",factura_lote_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_lote").css("display",factura_lote_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(factura_lote_control.htmlTablaOrderBy!=null
			&& factura_lote_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByfactura_loteAjaxWebPart").html(factura_lote_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//factura_lote_webcontrol1.registrarOrderByActions();
			
		}
			
		if(factura_lote_control.htmlTablaOrderByRel!=null
			&& factura_lote_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelfactura_loteAjaxWebPart").html(factura_lote_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(factura_lote_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedafactura_loteAjaxWebPart").css("display","none");
			jQuery("#trfactura_loteCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedafactura_lote").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(factura_lote_control) {
		
		if(!factura_lote_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(factura_lote_control);
		} else {
			jQuery("#divTablaDatosfactura_lotesAjaxWebPart").html(factura_lote_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosfactura_lotes=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(factura_lote_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosfactura_lotes=jQuery("#tblTablaDatosfactura_lotes").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("factura_lote",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',factura_lote_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			factura_lote_webcontrol1.registrarControlesTableEdition(factura_lote_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		factura_lote_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(factura_lote_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("factura_lote_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(factura_lote_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosfactura_lotesAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(factura_lote_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(factura_lote_control);
		
		const divOrderBy = document.getElementById("divOrderByfactura_loteAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(factura_lote_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelfactura_loteAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(factura_lote_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(factura_lote_control.factura_loteActual!=null) {//form
			
			this.actualizarCamposFilaTabla(factura_lote_control);			
		}
	}
	
	actualizarCamposFilaTabla(factura_lote_control) {
		var i=0;
		
		i=factura_lote_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(factura_lote_control.factura_loteActual.id);
		jQuery("#t-version_row_"+i+"").val(factura_lote_control.factura_loteActual.versionRow);
		jQuery("#t-version_row_"+i+"").val(factura_lote_control.factura_loteActual.versionRow);
		
		if(factura_lote_control.factura_loteActual.id_empresa!=null && factura_lote_control.factura_loteActual.id_empresa>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != factura_lote_control.factura_loteActual.id_empresa) {
				jQuery("#t-cel_"+i+"_3").val(factura_lote_control.factura_loteActual.id_empresa).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_sucursal!=null && factura_lote_control.factura_loteActual.id_sucursal>-1){
			if(jQuery("#t-cel_"+i+"_4").val() != factura_lote_control.factura_loteActual.id_sucursal) {
				jQuery("#t-cel_"+i+"_4").val(factura_lote_control.factura_loteActual.id_sucursal).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_4").select2("val", null);
			if(jQuery("#t-cel_"+i+"_4").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_4").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_ejercicio!=null && factura_lote_control.factura_loteActual.id_ejercicio>-1){
			if(jQuery("#t-cel_"+i+"_5").val() != factura_lote_control.factura_loteActual.id_ejercicio) {
				jQuery("#t-cel_"+i+"_5").val(factura_lote_control.factura_loteActual.id_ejercicio).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_5").select2("val", null);
			if(jQuery("#t-cel_"+i+"_5").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_5").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_periodo!=null && factura_lote_control.factura_loteActual.id_periodo>-1){
			if(jQuery("#t-cel_"+i+"_6").val() != factura_lote_control.factura_loteActual.id_periodo) {
				jQuery("#t-cel_"+i+"_6").val(factura_lote_control.factura_loteActual.id_periodo).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_6").select2("val", null);
			if(jQuery("#t-cel_"+i+"_6").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_6").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_usuario!=null && factura_lote_control.factura_loteActual.id_usuario>-1){
			if(jQuery("#t-cel_"+i+"_7").val() != factura_lote_control.factura_loteActual.id_usuario) {
				jQuery("#t-cel_"+i+"_7").val(factura_lote_control.factura_loteActual.id_usuario).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_7").select2("val", null);
			if(jQuery("#t-cel_"+i+"_7").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_7").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_8").val(factura_lote_control.factura_loteActual.numero);
		
		if(factura_lote_control.factura_loteActual.id_cliente!=null && factura_lote_control.factura_loteActual.id_cliente>-1){
			if(jQuery("#t-cel_"+i+"_9").val() != factura_lote_control.factura_loteActual.id_cliente) {
				jQuery("#t-cel_"+i+"_9").val(factura_lote_control.factura_loteActual.id_cliente).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_9").select2("val", null);
			if(jQuery("#t-cel_"+i+"_9").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_9").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_10").val(factura_lote_control.factura_loteActual.ruc);
		jQuery("#t-cel_"+i+"_11").val(factura_lote_control.factura_loteActual.referencia_cliente);
		jQuery("#t-cel_"+i+"_12").val(factura_lote_control.factura_loteActual.fecha_emision);
		
		if(factura_lote_control.factura_loteActual.id_vendedor!=null && factura_lote_control.factura_loteActual.id_vendedor>-1){
			if(jQuery("#t-cel_"+i+"_13").val() != factura_lote_control.factura_loteActual.id_vendedor) {
				jQuery("#t-cel_"+i+"_13").val(factura_lote_control.factura_loteActual.id_vendedor).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_13").select2("val", null);
			if(jQuery("#t-cel_"+i+"_13").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_13").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_termino_pago!=null && factura_lote_control.factura_loteActual.id_termino_pago>-1){
			if(jQuery("#t-cel_"+i+"_14").val() != factura_lote_control.factura_loteActual.id_termino_pago) {
				jQuery("#t-cel_"+i+"_14").val(factura_lote_control.factura_loteActual.id_termino_pago).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_14").select2("val", null);
			if(jQuery("#t-cel_"+i+"_14").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_14").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_15").val(factura_lote_control.factura_loteActual.fecha_vence);
		jQuery("#t-cel_"+i+"_16").val(factura_lote_control.factura_loteActual.cotizacion);
		
		if(factura_lote_control.factura_loteActual.id_moneda!=null && factura_lote_control.factura_loteActual.id_moneda>-1){
			if(jQuery("#t-cel_"+i+"_17").val() != factura_lote_control.factura_loteActual.id_moneda) {
				jQuery("#t-cel_"+i+"_17").val(factura_lote_control.factura_loteActual.id_moneda).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_17").select2("val", null);
			if(jQuery("#t-cel_"+i+"_17").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_17").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_estado!=null && factura_lote_control.factura_loteActual.id_estado>-1){
			if(jQuery("#t-cel_"+i+"_18").val() != factura_lote_control.factura_loteActual.id_estado) {
				jQuery("#t-cel_"+i+"_18").val(factura_lote_control.factura_loteActual.id_estado).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_18").select2("val", null);
			if(jQuery("#t-cel_"+i+"_18").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_18").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_19").val(factura_lote_control.factura_loteActual.direccion);
		jQuery("#t-cel_"+i+"_20").val(factura_lote_control.factura_loteActual.enviar_a);
		jQuery("#t-cel_"+i+"_21").val(factura_lote_control.factura_loteActual.observacion);
		jQuery("#t-cel_"+i+"_22").prop('checked',factura_lote_control.factura_loteActual.impuesto_en_precio);
		jQuery("#t-cel_"+i+"_23").val(factura_lote_control.factura_loteActual.sub_total);
		jQuery("#t-cel_"+i+"_24").val(factura_lote_control.factura_loteActual.descuento_monto);
		jQuery("#t-cel_"+i+"_25").val(factura_lote_control.factura_loteActual.descuento_porciento);
		jQuery("#t-cel_"+i+"_26").val(factura_lote_control.factura_loteActual.iva_monto);
		jQuery("#t-cel_"+i+"_27").val(factura_lote_control.factura_loteActual.iva_porciento);
		jQuery("#t-cel_"+i+"_28").val(factura_lote_control.factura_loteActual.retencion_fuente_monto);
		jQuery("#t-cel_"+i+"_29").val(factura_lote_control.factura_loteActual.retencion_fuente_porciento);
		jQuery("#t-cel_"+i+"_30").val(factura_lote_control.factura_loteActual.retencion_iva_monto);
		jQuery("#t-cel_"+i+"_31").val(factura_lote_control.factura_loteActual.retencion_iva_porciento);
		jQuery("#t-cel_"+i+"_32").val(factura_lote_control.factura_loteActual.total);
		jQuery("#t-cel_"+i+"_33").val(factura_lote_control.factura_loteActual.otro_monto);
		jQuery("#t-cel_"+i+"_34").val(factura_lote_control.factura_loteActual.otro_porciento);
		jQuery("#t-cel_"+i+"_35").val(factura_lote_control.factura_loteActual.hora);
		jQuery("#t-cel_"+i+"_36").val(factura_lote_control.factura_loteActual.retencion_ica_monto);
		jQuery("#t-cel_"+i+"_37").val(factura_lote_control.factura_loteActual.retencion_ica_porciento);
		
		if(factura_lote_control.factura_loteActual.id_asiento!=null && factura_lote_control.factura_loteActual.id_asiento>-1){
			if(jQuery("#t-cel_"+i+"_38").val() != factura_lote_control.factura_loteActual.id_asiento) {
				jQuery("#t-cel_"+i+"_38").val(factura_lote_control.factura_loteActual.id_asiento).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_38").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_38").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar!=null && factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar>-1){
			if(jQuery("#t-cel_"+i+"_39").val() != factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar) {
				jQuery("#t-cel_"+i+"_39").val(factura_lote_control.factura_loteActual.id_documento_cuenta_cobrar).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_39").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_39").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(factura_lote_control.factura_loteActual.id_kardex!=null && factura_lote_control.factura_loteActual.id_kardex>-1){
			if(jQuery("#t-cel_"+i+"_40").val() != factura_lote_control.factura_loteActual.id_kardex) {
				jQuery("#t-cel_"+i+"_40").val(factura_lote_control.factura_loteActual.id_kardex).trigger("change");
			}
		} else { 
			if(jQuery("#t-cel_"+i+"_40").val()!=constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_40").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(factura_lote_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura_lote_detalle").click(function(){
		jQuery("#tblTablaDatosfactura_lotes").on("click",".imgrelacionfactura_lote_detalle", function () {

			var idActual=jQuery(this).attr("idactualfactura_lote");

			factura_lote_webcontrol1.registrarSesionParafactura_lote_detalles(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacionfactura_modelo").click(function(){
		jQuery("#tblTablaDatosfactura_lotes").on("click",".imgrelacionfactura_modelo", function () {

			var idActual=jQuery(this).attr("idactualfactura_lote");

			factura_lote_webcontrol1.registrarSesionParafactura_modeloes(idActual);
		});				
	}
		
	

	registrarSesionParafactura_lote_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"factura_lote","factura_lote_detalle","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1,"s","");
	}

	registrarSesionParafactura_modeloes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"factura_lote","factura_modelo","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1,"es","");
	}
	
	registrarControlesTableEdition(factura_lote_control) {
		factura_lote_funcion1.registrarControlesTableValidacionEdition(factura_lote_control,factura_lote_webcontrol1,factura_lote_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(factura_lote_control) {
		jQuery("#divResumenfactura_loteActualAjaxWebPart").html(factura_lote_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(factura_lote_control) {
		//jQuery("#divAccionesRelacionesfactura_loteAjaxWebPart").html(factura_lote_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("factura_lote_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(factura_lote_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesfactura_loteAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		factura_lote_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(factura_lote_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(factura_lote_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(factura_lote_control) {
		
		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",factura_lote_control.strVisibleFK_Idasiento);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento").attr("style",factura_lote_control.strVisibleFK_Idasiento);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_lote_control.strVisibleFK_Idcliente);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente").attr("style",factura_lote_control.strVisibleFK_Idcliente);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",factura_lote_control.strVisibleFK_Iddocumento_cuenta_cobrar);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar").attr("style",factura_lote_control.strVisibleFK_Iddocumento_cuenta_cobrar);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",factura_lote_control.strVisibleFK_Idejercicio);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idejercicio").attr("style",factura_lote_control.strVisibleFK_Idejercicio);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",factura_lote_control.strVisibleFK_Idempresa);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idempresa").attr("style",factura_lote_control.strVisibleFK_Idempresa);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado").attr("style",factura_lote_control.strVisibleFK_Idestado);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado").attr("style",factura_lote_control.strVisibleFK_Idestado);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",factura_lote_control.strVisibleFK_Idkardex);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex").attr("style",factura_lote_control.strVisibleFK_Idkardex);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",factura_lote_control.strVisibleFK_Idmoneda);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idmoneda").attr("style",factura_lote_control.strVisibleFK_Idmoneda);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",factura_lote_control.strVisibleFK_Idperiodo);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idperiodo").attr("style",factura_lote_control.strVisibleFK_Idperiodo);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",factura_lote_control.strVisibleFK_Idsucursal);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idsucursal").attr("style",factura_lote_control.strVisibleFK_Idsucursal);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",factura_lote_control.strVisibleFK_Idtermino_pago);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago").attr("style",factura_lote_control.strVisibleFK_Idtermino_pago);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",factura_lote_control.strVisibleFK_Idusuario);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idusuario").attr("style",factura_lote_control.strVisibleFK_Idusuario);
		}

		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",factura_lote_control.strVisibleFK_Idvendedor);
			jQuery("#tblstrVisible"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor").attr("style",factura_lote_control.strVisibleFK_Idvendedor);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacionfactura_lote();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("factura_lote",id,"facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);		
	}
	
	

	abrirBusquedaParaempresa(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","empresa","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParasucursal(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","sucursal","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParaejercicio(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","ejercicio","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParaperiodo(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","periodo","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParausuario(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","usuario","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParacliente(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","cliente","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParavendedor(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","vendedor","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParatermino_pago_cliente(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","termino_pago_cliente","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParamoneda(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","moneda","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParaestado(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","estado","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParaasiento(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","asiento","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParadocumento_cuenta_cobrar(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","documento_cuenta_cobrar","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}

	abrirBusquedaParakardex(strNombreCampoBusqueda){//idActual
		factura_lote_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("factura_lote","kardex","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacionfactura_lote_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualfactura_lote");

			factura_lote_webcontrol1.registrarSesionParafactura_lote_detalles(idActual);
		});
		jQuery("#imgdivrelacionfactura_modelo").click(function(){

			var idActual=jQuery(this).attr("idactualfactura_lote");

			factura_lote_webcontrol1.registrarSesionParafactura_modeloes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_loteConstante,strParametros);
		
		//factura_lote_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosempresasFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa",factura_lote_control.empresasFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_3",factura_lote_control.empresasFK);
		}
	};

	cargarCombossucursalsFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal",factura_lote_control.sucursalsFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_4",factura_lote_control.sucursalsFK);
		}
	};

	cargarCombosejerciciosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio",factura_lote_control.ejerciciosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_5",factura_lote_control.ejerciciosFK);
		}
	};

	cargarCombosperiodosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo",factura_lote_control.periodosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_6",factura_lote_control.periodosFK);
		}
	};

	cargarCombosusuariosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario",factura_lote_control.usuariosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_7",factura_lote_control.usuariosFK);
		}
	};

	cargarCombosclientesFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente",factura_lote_control.clientesFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_9",factura_lote_control.clientesFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",factura_lote_control.clientesFK);

	};

	cargarCombosvendedorsFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor",factura_lote_control.vendedorsFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_13",factura_lote_control.vendedorsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor",factura_lote_control.vendedorsFK);

	};

	cargarCombostermino_pagosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago",factura_lote_control.termino_pagosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_14",factura_lote_control.termino_pagosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago",factura_lote_control.termino_pagosFK);

	};

	cargarCombosmonedasFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_moneda",factura_lote_control.monedasFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_17",factura_lote_control.monedasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda",factura_lote_control.monedasFK);

	};

	cargarCombosestadosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado",factura_lote_control.estadosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_18",factura_lote_control.estadosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado",factura_lote_control.estadosFK);

	};

	cargarCombosasientosFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento",factura_lote_control.asientosFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_38",factura_lote_control.asientosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento",factura_lote_control.asientosFK);

	};

	cargarCombosdocumento_cuenta_cobrarsFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar",factura_lote_control.documento_cuenta_cobrarsFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_39",factura_lote_control.documento_cuenta_cobrarsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar",factura_lote_control.documento_cuenta_cobrarsFK);

	};

	cargarComboskardexsFK(factura_lote_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex",factura_lote_control.kardexsFK);

		if(factura_lote_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+factura_lote_control.idFilaTablaActual+"_40",factura_lote_control.kardexsFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex",factura_lote_control.kardexsFK);

	};

	
	
	registrarComboActionChangeCombosempresasFK(factura_lote_control) {

	};

	registrarComboActionChangeCombossucursalsFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosejerciciosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosperiodosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosusuariosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosclientesFK(factura_lote_control) {
		this.registrarComboActionChangeid_cliente("form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente",false,0);


		this.registrarComboActionChangeid_cliente(""+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente",false,0);


	};

	registrarComboActionChangeCombosvendedorsFK(factura_lote_control) {

	};

	registrarComboActionChangeCombostermino_pagosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosmonedasFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosestadosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosasientosFK(factura_lote_control) {

	};

	registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(factura_lote_control) {

	};

	registrarComboActionChangeComboskardexsFK(factura_lote_control) {

	};

	
	
	setDefectoValorCombosempresasFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idempresaDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa").val() != factura_lote_control.idempresaDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa").val(factura_lote_control.idempresaDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombossucursalsFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idsucursalDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal").val() != factura_lote_control.idsucursalDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal").val(factura_lote_control.idsucursalDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosejerciciosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idejercicioDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio").val() != factura_lote_control.idejercicioDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio").val(factura_lote_control.idejercicioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosperiodosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idperiodoDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo").val() != factura_lote_control.idperiodoDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo").val(factura_lote_control.idperiodoDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosusuariosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idusuarioDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario").val() != factura_lote_control.idusuarioDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario").val(factura_lote_control.idusuarioDefaultFK).trigger("change");
			}
		}


	};

	setDefectoValorCombosclientesFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idclienteDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente").val() != factura_lote_control.idclienteDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente").val(factura_lote_control.idclienteDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(factura_lote_control.idclienteDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idcliente-cmbid_cliente").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosvendedorsFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idvendedorDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor").val() != factura_lote_control.idvendedorDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor").val(factura_lote_control.idvendedorDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(factura_lote_control.idvendedorDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idvendedor-cmbid_vendedor").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombostermino_pagosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idtermino_pagoDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago").val() != factura_lote_control.idtermino_pagoDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago").val(factura_lote_control.idtermino_pagoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago").val(factura_lote_control.idtermino_pagoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idtermino_pago-cmbid_termino_pago").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosmonedasFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idmonedaDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_moneda").val() != factura_lote_control.idmonedaDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_moneda").val(factura_lote_control.idmonedaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(factura_lote_control.idmonedaDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idmoneda-cmbid_moneda").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosestadosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idestadoDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado").val() != factura_lote_control.idestadoDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado").val(factura_lote_control.idestadoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(factura_lote_control.idestadoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idestado-cmbid_estado").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosasientosFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idasientoDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento").val() != factura_lote_control.idasientoDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento").val(factura_lote_control.idasientoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(factura_lote_control.idasientoDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idasiento-cmbid_asiento").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosdocumento_cuenta_cobrarsFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.iddocumento_cuenta_cobrarDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val() != factura_lote_control.iddocumento_cuenta_cobrarDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar").val(factura_lote_control.iddocumento_cuenta_cobrarDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(factura_lote_control.iddocumento_cuenta_cobrarDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Iddocumento_cuenta_cobrar-cmbid_documento_cuenta_cobrar").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorComboskardexsFK(factura_lote_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(factura_lote_control.idkardexDefaultFK>-1 && jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex").val() != factura_lote_control.idkardexDefaultFK) {
				jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex").val(factura_lote_control.idkardexDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(factura_lote_control.idkardexDefaultForeignKey).trigger("change");
			if(jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+factura_lote_constante1.STR_SUFIJO+"FK_Idkardex-cmbid_kardex").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	
	//RECARGAR_FK
	

	registrarComboActionChangeid_cliente(id_cliente,paraEventoTabla,idFilaTabla) {

		funcionGeneralEventoJQuery.setComboAccionChange("factura_lote","facturacion","","id_cliente",id_cliente,"NINGUNO","",paraEventoTabla,idFilaTabla,factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	







		jQuery("#form-id_moneda").prop("disabled", habilitarDeshabilitar);
		jQuery("#form-id_estado").prop("disabled", habilitarDeshabilitar);




	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
		if(factura_lote_constante1.BIT_ES_PAGINA_FORM==true) {
			
							factura_lote_detalle_webcontrol1.onLoadWindow();
							factura_modelo_webcontrol1.onLoadWindow();
		}
	}
	
	onLoadRecargarRelacionesRelacionados() {		
		if(factura_lote_constante1.BIT_ES_PAGINA_FORM==true) {
			
		factura_lote_detalle_webcontrol1.onLoadRecargarRelacionado();
		factura_modelo_webcontrol1.onLoadRecargarRelacionado();
		}
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//factura_lote_control
		
	
	}
	
	onLoadCombosDefectoFK(factura_lote_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosempresasFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombossucursalsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosejerciciosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosperiodosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosusuariosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosclientesFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosvendedorsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombostermino_pagosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosmonedasFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosestadosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosasientosFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorCombosdocumento_cuenta_cobrarsFK(factura_lote_control);
			}

			if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_lote_control.strRecargarFkTipos,",")) { 
				factura_lote_webcontrol1.setDefectoValorComboskardexsFK(factura_lote_control);
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
	onLoadCombosEventosFK(factura_lote_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_empresa",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosempresasFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_sucursal",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombossucursalsFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_ejercicio",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosejerciciosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_periodo",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosperiodosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_usuario",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosusuariosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_cliente",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosclientesFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_vendedor",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosvendedorsFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_termino_pago",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombostermino_pagosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_moneda",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosmonedasFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_estado",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosestadosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_asiento",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosasientosFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_documento_cuenta_cobrar",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeCombosdocumento_cuenta_cobrarsFK(factura_lote_control);
			//}

			//if(factura_lote_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_kardex",factura_lote_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				factura_lote_webcontrol1.registrarComboActionChangeComboskardexsFK(factura_lote_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(factura_lote_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(factura_lote_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(factura_lote_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idasiento","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idcliente","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Iddocumento_cuenta_cobrar","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idejercicio","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idempresa","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idestado","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idkardex","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idmoneda","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idperiodo","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idsucursal","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idtermino_pago","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idusuario","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("factura_lote","FK_Idvendedor","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
		
			
			if(factura_lote_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("factura_lote");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("factura_lote");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(factura_lote_funcion1,factura_lote_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(factura_lote_funcion1,factura_lote_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(factura_lote_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,"factura_lote");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("empresa","id_empresa","general","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_empresa_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParaempresa("id_empresa");
				//alert(jQuery('#form-id_empresa_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("sucursal","id_sucursal","general","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_sucursal_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParasucursal("id_sucursal");
				//alert(jQuery('#form-id_sucursal_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("ejercicio","id_ejercicio","contabilidad","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_ejercicio_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParaejercicio("id_ejercicio");
				//alert(jQuery('#form-id_ejercicio_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("periodo","id_periodo","contabilidad","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_periodo_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParaperiodo("id_periodo");
				//alert(jQuery('#form-id_periodo_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("usuario","id_usuario","seguridad","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_usuario_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParausuario("id_usuario");
				//alert(jQuery('#form-id_usuario_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("cliente","id_cliente","cuentascobrar","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_cliente_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParacliente("id_cliente");
				//alert(jQuery('#form-id_cliente_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("vendedor","id_vendedor","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_vendedor_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParavendedor("id_vendedor");
				//alert(jQuery('#form-id_vendedor_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("termino_pago_cliente","id_termino_pago","cuentascobrar","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_termino_pago_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParatermino_pago_cliente("id_termino_pago");
				//alert(jQuery('#form-id_termino_pago_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("moneda","id_moneda","contabilidad","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_moneda_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParamoneda("id_moneda");
				//alert(jQuery('#form-id_moneda_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("estado","id_estado","general","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_estado_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParaestado("id_estado");
				//alert(jQuery('#form-id_estado_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("asiento","id_asiento","contabilidad","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_asiento_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParaasiento("id_asiento");
				//alert(jQuery('#form-id_asiento_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("documento_cuenta_cobrar","id_documento_cuenta_cobrar","cuentascobrar","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_documento_cuenta_cobrar_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParadocumento_cuenta_cobrar("id_documento_cuenta_cobrar");
				//alert(jQuery('#form-id_documento_cuenta_cobrar_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("kardex","id_kardex","inventario","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+factura_lote_constante1.STR_SUFIJO+"-id_kardex_img_busqueda").click(function(){
				factura_lote_webcontrol1.abrirBusquedaParakardex("id_kardex");
				//alert(jQuery('#form-id_kardex_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("factura_lote");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(factura_lote_control) {
		
		jQuery("#divBusquedafactura_loteAjaxWebPart").css("display",factura_lote_control.strPermisoBusqueda);
		jQuery("#trfactura_loteCabeceraBusquedas").css("display",factura_lote_control.strPermisoBusqueda);
		jQuery("#trBusquedafactura_lote").css("display",factura_lote_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportefactura_lote").css("display",factura_lote_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosfactura_lote").attr("style",factura_lote_control.strPermisoMostrarTodos);		
		
		if(factura_lote_control.strPermisoNuevo!=null) {
			jQuery("#tdfactura_loteNuevo").css("display",factura_lote_control.strPermisoNuevo);
			jQuery("#tdfactura_loteNuevoToolBar").css("display",factura_lote_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdfactura_loteDuplicar").css("display",factura_lote_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_loteDuplicarToolBar").css("display",factura_lote_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdfactura_loteNuevoGuardarCambios").css("display",factura_lote_control.strPermisoNuevo);
			jQuery("#tdfactura_loteNuevoGuardarCambiosToolBar").css("display",factura_lote_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(factura_lote_control.strPermisoActualizar!=null) {
			jQuery("#tdfactura_loteCopiar").css("display",factura_lote_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_loteCopiarToolBar").css("display",factura_lote_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdfactura_loteConEditar").css("display",factura_lote_control.strPermisoActualizar);
		}
		
		jQuery("#tdfactura_loteGuardarCambios").css("display",factura_lote_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdfactura_loteGuardarCambiosToolBar").css("display",factura_lote_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdfactura_loteCerrarPagina").css("display",factura_lote_control.strPermisoPopup);		
		jQuery("#tdfactura_loteCerrarPaginaToolBar").css("display",factura_lote_control.strPermisoPopup);
		//jQuery("#trfactura_loteAccionesRelaciones").css("display",factura_lote_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=factura_lote_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_lote_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + factura_lote_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Facturas Loteses";
		sTituloBanner+=" - " + factura_lote_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + factura_lote_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdfactura_loteRelacionesToolBar").css("display",factura_lote_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosfactura_lote").css("display",factura_lote_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		factura_lote_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		factura_lote_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		factura_lote_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		factura_lote_webcontrol1.registrarEventosControles();
		
		if(factura_lote_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(factura_lote_constante1.STR_ES_RELACIONADO=="false") {
			factura_lote_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(factura_lote_constante1.STR_ES_RELACIONES=="true") {
			if(factura_lote_constante1.BIT_ES_PAGINA_FORM==true) {
				factura_lote_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(factura_lote_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(factura_lote_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				factura_lote_webcontrol1.onLoad();
			
			//} else {
				//if(factura_lote_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			factura_lote_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("factura_lote","facturacion","",factura_lote_funcion1,factura_lote_webcontrol1,factura_lote_constante1);	
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

var factura_lote_webcontrol1 = new factura_lote_webcontrol();

//Para ser llamado desde otro archivo (import)
export {factura_lote_webcontrol,factura_lote_webcontrol1};

//Para ser llamado desde window.opener
window.factura_lote_webcontrol1 = factura_lote_webcontrol1;


if(factura_lote_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = factura_lote_webcontrol1.onLoadWindow; 
}

//</script>