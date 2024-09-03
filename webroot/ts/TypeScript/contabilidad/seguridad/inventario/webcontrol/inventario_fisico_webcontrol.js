//<script type="text/javascript" language="javascript">



//var inventario_fisicoJQueryPaginaWebInteraccion= function (inventario_fisico_control) {
//this.,this.,this.

import {inventario_fisico_constante,inventario_fisico_constante1} from '../util/inventario_fisico_constante.js';

import {inventario_fisico_funcion,inventario_fisico_funcion1} from '../util/inventario_fisico_funcion.js';


class inventario_fisico_webcontrol extends GeneralEntityWebControl {
	
	inventario_fisico_control=null;
	inventario_fisico_controlInicial=null;
	inventario_fisico_controlAuxiliar=null;
		
	//if(inventario_fisico_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(inventario_fisico_control) {
		super();
		
		this.inventario_fisico_control=inventario_fisico_control;
	}
		
	actualizarVariablesPagina(inventario_fisico_control) {
		
		if(inventario_fisico_control.action=="index" || inventario_fisico_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(inventario_fisico_control);
			
		} 
		
		
		else if(inventario_fisico_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(inventario_fisico_control);
			
		} else if(inventario_fisico_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(inventario_fisico_control);
			
		} else if(inventario_fisico_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(inventario_fisico_control);		
		
		} else if(inventario_fisico_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(inventario_fisico_control);
		
		}  else if(inventario_fisico_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(inventario_fisico_control);
		
		} else if(inventario_fisico_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(inventario_fisico_control);		
		
		} else if(inventario_fisico_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(inventario_fisico_control);		
		
		} else if(inventario_fisico_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(inventario_fisico_control);		
		
		} else if(inventario_fisico_control.action.includes("Busqueda") ||
				  inventario_fisico_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(inventario_fisico_control);
			
		} else if(inventario_fisico_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(inventario_fisico_control)
		}
		
		
		
	
		else if(inventario_fisico_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(inventario_fisico_control);	
		
		} else if(inventario_fisico_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(inventario_fisico_control);		
		}
	
		else if(inventario_fisico_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(inventario_fisico_control);		
		}
	
		else if(inventario_fisico_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(inventario_fisico_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + inventario_fisico_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(inventario_fisico_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(inventario_fisico_control) {
		this.actualizarPaginaAccionesGenerales(inventario_fisico_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(inventario_fisico_control) {
		
		this.actualizarPaginaCargaGeneral(inventario_fisico_control);
		this.actualizarPaginaOrderBy(inventario_fisico_control);
		this.actualizarPaginaTablaDatos(inventario_fisico_control);
		this.actualizarPaginaCargaGeneralControles(inventario_fisico_control);
		//this.actualizarPaginaFormulario(inventario_fisico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(inventario_fisico_control);
		this.actualizarPaginaAreaBusquedas(inventario_fisico_control);
		this.actualizarPaginaCargaCombosFK(inventario_fisico_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(inventario_fisico_control) {
		//this.actualizarPaginaFormulario(inventario_fisico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(inventario_fisico_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(inventario_fisico_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(inventario_fisico_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(inventario_fisico_control) {
		
		this.actualizarPaginaCargaGeneral(inventario_fisico_control);
		this.actualizarPaginaTablaDatos(inventario_fisico_control);
		this.actualizarPaginaCargaGeneralControles(inventario_fisico_control);
		//this.actualizarPaginaFormulario(inventario_fisico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(inventario_fisico_control);
		this.actualizarPaginaAreaBusquedas(inventario_fisico_control);
		this.actualizarPaginaCargaCombosFK(inventario_fisico_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);		
		//this.actualizarPaginaFormulario(inventario_fisico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);		
		//this.actualizarPaginaAreaMantenimiento(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);		
		//this.actualizarPaginaFormulario(inventario_fisico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);		
		//this.actualizarPaginaAreaMantenimiento(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);		
		//this.actualizarPaginaFormulario(inventario_fisico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);		
		//this.actualizarPaginaAreaMantenimiento(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(inventario_fisico_control) {
		//this.actualizarPaginaFormulario(inventario_fisico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(inventario_fisico_control) {
		this.actualizarPaginaAbrirLink(inventario_fisico_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);				
		//this.actualizarPaginaFormulario(inventario_fisico_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);
		//this.actualizarPaginaFormulario(inventario_fisico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);		
		//this.actualizarPaginaAreaMantenimiento(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);
		//this.actualizarPaginaFormulario(inventario_fisico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(inventario_fisico_control) {
		//this.actualizarPaginaFormulario(inventario_fisico_control);
		this.onLoadCombosDefectoFK(inventario_fisico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);
		//this.actualizarPaginaFormulario(inventario_fisico_control);
		this.onLoadCombosDefectoFK(inventario_fisico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);		
		//this.actualizarPaginaAreaMantenimiento(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(inventario_fisico_control) {
		this.actualizarPaginaAbrirLink(inventario_fisico_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(inventario_fisico_control) {
					//super.actualizarPaginaImprimir(inventario_fisico_control,"inventario_fisico");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",inventario_fisico_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("inventario_fisico_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(inventario_fisico_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(inventario_fisico_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(inventario_fisico_control) {
		//super.actualizarPaginaImprimir(inventario_fisico_control,"inventario_fisico");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("inventario_fisico_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(inventario_fisico_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",inventario_fisico_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(inventario_fisico_control) {
		//super.actualizarPaginaImprimir(inventario_fisico_control,"inventario_fisico");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("inventario_fisico_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(inventario_fisico_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",inventario_fisico_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(inventario_fisico_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(inventario_fisico_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(inventario_fisico_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(inventario_fisico_control);
			
		this.actualizarPaginaAbrirLink(inventario_fisico_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(inventario_fisico_control) {
		this.actualizarPaginaTablaDatos(inventario_fisico_control);
		this.actualizarPaginaFormulario(inventario_fisico_control);
		this.actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control);		
		this.actualizarPaginaAreaMantenimiento(inventario_fisico_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(inventario_fisico_control) {
		
		if(inventario_fisico_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(inventario_fisico_control);
		}
		
		if(inventario_fisico_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(inventario_fisico_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(inventario_fisico_control) {
		if(inventario_fisico_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("inventario_fisicoReturnGeneral",JSON.stringify(inventario_fisico_control.inventario_fisicoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(inventario_fisico_control) {
		if(inventario_fisico_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && inventario_fisico_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(inventario_fisico_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(inventario_fisico_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(inventario_fisico_control, mostrar) {
		
		if(mostrar==true) {
			inventario_fisico_funcion1.resaltarRestaurarDivsPagina(false,"inventario_fisico");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				inventario_fisico_funcion1.resaltarRestaurarDivMantenimiento(false,"inventario_fisico");
			}			
			
			inventario_fisico_funcion1.mostrarDivMensaje(true,inventario_fisico_control.strAuxiliarMensaje,inventario_fisico_control.strAuxiliarCssMensaje);
		
		} else {
			inventario_fisico_funcion1.mostrarDivMensaje(false,inventario_fisico_control.strAuxiliarMensaje,inventario_fisico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(inventario_fisico_control) {
		if(inventario_fisico_funcion1.esPaginaForm(inventario_fisico_constante1)==true) {
			window.opener.inventario_fisico_webcontrol1.actualizarPaginaTablaDatos(inventario_fisico_control);
		} else {
			this.actualizarPaginaTablaDatos(inventario_fisico_control);
		}
	}
	
	actualizarPaginaAbrirLink(inventario_fisico_control) {
		inventario_fisico_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(inventario_fisico_control.strAuxiliarUrlPagina);
				
		inventario_fisico_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(inventario_fisico_control.strAuxiliarTipo,inventario_fisico_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(inventario_fisico_control) {
		inventario_fisico_funcion1.resaltarRestaurarDivMensaje(true,inventario_fisico_control.strAuxiliarMensajeAlert,inventario_fisico_control.strAuxiliarCssMensaje);
			
		if(inventario_fisico_funcion1.esPaginaForm(inventario_fisico_constante1)==true) {
			window.opener.inventario_fisico_funcion1.resaltarRestaurarDivMensaje(true,inventario_fisico_control.strAuxiliarMensajeAlert,inventario_fisico_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(inventario_fisico_control) {
		this.inventario_fisico_controlInicial=inventario_fisico_control;
			
		if(inventario_fisico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(inventario_fisico_control.strStyleDivArbol,inventario_fisico_control.strStyleDivContent
																,inventario_fisico_control.strStyleDivOpcionesBanner,inventario_fisico_control.strStyleDivExpandirColapsar
																,inventario_fisico_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=inventario_fisico_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",inventario_fisico_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(inventario_fisico_control) {
		this.actualizarCssBotonesPagina(inventario_fisico_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(inventario_fisico_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(inventario_fisico_control.tiposReportes,inventario_fisico_control.tiposReporte
															 	,inventario_fisico_control.tiposPaginacion,inventario_fisico_control.tiposAcciones
																,inventario_fisico_control.tiposColumnasSelect,inventario_fisico_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(inventario_fisico_control.tiposRelaciones,inventario_fisico_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(inventario_fisico_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(inventario_fisico_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(inventario_fisico_control);			
	}
	
	actualizarPaginaUsuarioInvitado(inventario_fisico_control) {
	
		var indexPosition=inventario_fisico_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=inventario_fisico_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(inventario_fisico_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			if(inventario_fisico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_inventario_fisico",inventario_fisico_control.strRecargarFkTipos,",")) { 
				inventario_fisico_webcontrol1.cargarCombosinventario_fisicosFK(inventario_fisico_control);
			}

			if(inventario_fisico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",inventario_fisico_control.strRecargarFkTipos,",")) { 
				inventario_fisico_webcontrol1.cargarCombosbodegasFK(inventario_fisico_control);
			}

			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(inventario_fisico_control.strRecargarFkTiposNinguno!=null && inventario_fisico_control.strRecargarFkTiposNinguno!='NINGUNO' && inventario_fisico_control.strRecargarFkTiposNinguno!='') {
			
				if(inventario_fisico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_inventario_fisico",inventario_fisico_control.strRecargarFkTiposNinguno,",")) { 
					inventario_fisico_webcontrol1.cargarCombosinventario_fisicosFK(inventario_fisico_control);
				}

				if(inventario_fisico_control.strRecargarFkTiposNinguno!="NINGUNO" && funcionGeneral.existeCadenaSplit("id_bodega",inventario_fisico_control.strRecargarFkTiposNinguno,",")) { 
					inventario_fisico_webcontrol1.cargarCombosbodegasFK(inventario_fisico_control);
				}

		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	

	cargarComboEditarTablainventario_fisicoFK(inventario_fisico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,inventario_fisico_funcion1,inventario_fisico_control.inventario_fisicosFK);
	}

	cargarComboEditarTablabodegaFK(inventario_fisico_control,control_name,idActual,para_evento) {
		funcionGeneralJQuery.cargarCombosForeignKeyEditar(control_name,para_evento,idActual,inventario_fisico_funcion1,inventario_fisico_control.bodegasFK);
	}
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(inventario_fisico_control) {
		jQuery("#divBusquedainventario_fisicoAjaxWebPart").css("display",inventario_fisico_control.strPermisoBusqueda);
		jQuery("#trinventario_fisicoCabeceraBusquedas").css("display",inventario_fisico_control.strPermisoBusqueda);
		jQuery("#trBusquedainventario_fisico").css("display",inventario_fisico_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(inventario_fisico_control.htmlTablaOrderBy!=null
			&& inventario_fisico_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderByinventario_fisicoAjaxWebPart").html(inventario_fisico_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//inventario_fisico_webcontrol1.registrarOrderByActions();
			
		}
			
		if(inventario_fisico_control.htmlTablaOrderByRel!=null
			&& inventario_fisico_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByRelinventario_fisicoAjaxWebPart").html(inventario_fisico_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(inventario_fisico_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedainventario_fisicoAjaxWebPart").css("display","none");
			jQuery("#trinventario_fisicoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedainventario_fisico").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(inventario_fisico_control) {
		
		if(!inventario_fisico_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(inventario_fisico_control);
		} else {
			jQuery("#divTablaDatosinventario_fisicosAjaxWebPart").html(inventario_fisico_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatosinventario_fisicos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(inventario_fisico_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatosinventario_fisicos=jQuery("#tblTablaDatosinventario_fisicos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("inventario_fisico",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',inventario_fisico_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			inventario_fisico_webcontrol1.registrarControlesTableEdition(inventario_fisico_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		inventario_fisico_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(inventario_fisico_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("inventario_fisico_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(inventario_fisico_control);
		
		const divTablaDatos = document.getElementById("divTablaDatosinventario_fisicosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(inventario_fisico_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(inventario_fisico_control);
		
		const divOrderBy = document.getElementById("divOrderByinventario_fisicoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(inventario_fisico_control);
		
		const divOrderByRel = document.getElementById("divOrderByRelinventario_fisicoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(inventario_fisico_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(inventario_fisico_control.inventario_fisicoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(inventario_fisico_control);			
		}
	}
	
	actualizarCamposFilaTabla(inventario_fisico_control) {
		var i=0;
		
		i=inventario_fisico_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(inventario_fisico_control.inventario_fisicoActual.id);
		jQuery("#t-version_row_"+i+"").val(inventario_fisico_control.inventario_fisicoActual.versionRow);
		
		if(inventario_fisico_control.inventario_fisicoActual.id_inventario_fisico!=null && inventario_fisico_control.inventario_fisicoActual.id_inventario_fisico>-1){
			if(jQuery("#t-cel_"+i+"_2").val() != inventario_fisico_control.inventario_fisicoActual.id_inventario_fisico) {
				jQuery("#t-cel_"+i+"_2").val(inventario_fisico_control.inventario_fisicoActual.id_inventario_fisico).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_2").select2("val", null);
			if(jQuery("#t-cel_"+i+"_2").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_2").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		
		if(inventario_fisico_control.inventario_fisicoActual.id_bodega!=null && inventario_fisico_control.inventario_fisicoActual.id_bodega>-1){
			if(jQuery("#t-cel_"+i+"_3").val() != inventario_fisico_control.inventario_fisicoActual.id_bodega) {
				jQuery("#t-cel_"+i+"_3").val(inventario_fisico_control.inventario_fisicoActual.id_bodega).trigger("change");
			}
		} else { 
			//jQuery("#t-cel_"+i+"_3").select2("val", null);
			if(jQuery("#t-cel_"+i+"_3").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#t-cel_"+i+"_3").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}
		jQuery("#t-cel_"+i+"_4").val(inventario_fisico_control.inventario_fisicoActual.fecha);
		jQuery("#t-cel_"+i+"_5").val(inventario_fisico_control.inventario_fisicoActual.descripcion);
		jQuery("#t-cel_"+i+"_6").val(inventario_fisico_control.inventario_fisicoActual.id_almacen);
		jQuery("#t-cel_"+i+"_7").val(inventario_fisico_control.inventario_fisicoActual.prod_cont_almacen);
		jQuery("#t-cel_"+i+"_8").val(inventario_fisico_control.inventario_fisicoActual.total_productos_almacen);
		jQuery("#t-cel_"+i+"_9").val(inventario_fisico_control.inventario_fisicoActual.campo1);
		jQuery("#t-cel_"+i+"_10").val(inventario_fisico_control.inventario_fisicoActual.campo2);
		jQuery("#t-cel_"+i+"_11").val(inventario_fisico_control.inventario_fisicoActual.campo3);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(inventario_fisico_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioninventario_fisico").click(function(){
		jQuery("#tblTablaDatosinventario_fisicos").on("click",".imgrelacioninventario_fisico", function () {

			var idActual=jQuery(this).attr("idactualinventario_fisico");

			inventario_fisico_webcontrol1.registrarSesionParainventario_fisicos(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelacioninventario_fisico_detalle").click(function(){
		jQuery("#tblTablaDatosinventario_fisicos").on("click",".imgrelacioninventario_fisico_detalle", function () {

			var idActual=jQuery(this).attr("idactualinventario_fisico");

			inventario_fisico_webcontrol1.registrarSesionParainventario_fisico_detalles(idActual);
		});				
	}
		
	

	registrarSesionParainventario_fisicos(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"inventario_fisico","inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1,"s","");
	}

	registrarSesionParainventario_fisico_detalles(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"inventario_fisico","inventario_fisico_detalle","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1,"s","");
	}
	
	registrarControlesTableEdition(inventario_fisico_control) {
		inventario_fisico_funcion1.registrarControlesTableValidacionEdition(inventario_fisico_control,inventario_fisico_webcontrol1,inventario_fisico_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(inventario_fisico_control) {
		jQuery("#divResumeninventario_fisicoActualAjaxWebPart").html(inventario_fisico_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(inventario_fisico_control) {
		//jQuery("#divAccionesRelacionesinventario_fisicoAjaxWebPart").html(inventario_fisico_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("inventario_fisico_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(inventario_fisico_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionesinventario_fisicoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		inventario_fisico_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(inventario_fisico_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(inventario_fisico_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(inventario_fisico_control) {
		
		if(inventario_fisico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",inventario_fisico_control.strVisibleFK_Idbodega);
			jQuery("#tblstrVisible"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idbodega").attr("style",inventario_fisico_control.strVisibleFK_Idbodega);
		}

		if(inventario_fisico_constante1.BIT_ES_PARA_JQUERY==true) {
			jQuery("#listrVisible"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idinventario_fisico").attr("style",inventario_fisico_control.strVisibleFK_Idinventario_fisico);
			jQuery("#tblstrVisible"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idinventario_fisico").attr("style",inventario_fisico_control.strVisibleFK_Idinventario_fisico);
		}

	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformacioninventario_fisico();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("inventario_fisico",id,"inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);		
	}
	
	

	abrirBusquedaParainventario_fisico(strNombreCampoBusqueda){//idActual
		inventario_fisico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("inventario_fisico","inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);
	}

	abrirBusquedaParabodega(strNombreCampoBusqueda){//idActual
		inventario_fisico_constante1.STR_NOMBRE_CAMPO_BUSQUEDA=strNombreCampoBusqueda;

		funcionGeneralEventoJQuery.setImagenForeingKeyAbrirBusquedaClic("inventario_fisico","bodega","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);
	}
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelacioninventario_fisico").click(function(){

			var idActual=jQuery(this).attr("idactualinventario_fisico");

			inventario_fisico_webcontrol1.registrarSesionParainventario_fisicos(idActual);
		});
		jQuery("#imgdivrelacioninventario_fisico_detalle").click(function(){

			var idActual=jQuery(this).attr("idactualinventario_fisico");

			inventario_fisico_webcontrol1.registrarSesionParainventario_fisico_detalles(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisicoConstante,strParametros);
		
		//inventario_fisico_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	cargarCombosinventario_fisicosFK(inventario_fisico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+inventario_fisico_constante1.STR_SUFIJO+"-id_inventario_fisico",inventario_fisico_control.inventario_fisicosFK);

		if(inventario_fisico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+inventario_fisico_control.idFilaTablaActual+"_2",inventario_fisico_control.inventario_fisicosFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idinventario_fisico-cmbid_inventario_fisico",inventario_fisico_control.inventario_fisicosFK);

	};

	cargarCombosbodegasFK(inventario_fisico_control) {

		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#form"+inventario_fisico_constante1.STR_SUFIJO+"-id_bodega",inventario_fisico_control.bodegasFK);

		if(inventario_fisico_control.bitEsEventoTabla==true) {
			funcionGeneralJQuery.cargarCombosForeignKeyIndices("#t-cel_"+inventario_fisico_control.idFilaTablaActual+"_3",inventario_fisico_control.bodegasFK);
		}
		funcionGeneralJQuery.cargarCombosForeignKeyIndices("#"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega",inventario_fisico_control.bodegasFK);

	};

	
	
	registrarComboActionChangeCombosinventario_fisicosFK(inventario_fisico_control) {

	};

	registrarComboActionChangeCombosbodegasFK(inventario_fisico_control) {

	};

	
	
	setDefectoValorCombosinventario_fisicosFK(inventario_fisico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(inventario_fisico_control.idinventario_fisicoDefaultFK>-1 && jQuery("#form"+inventario_fisico_constante1.STR_SUFIJO+"-id_inventario_fisico").val() != inventario_fisico_control.idinventario_fisicoDefaultFK) {
				jQuery("#form"+inventario_fisico_constante1.STR_SUFIJO+"-id_inventario_fisico").val(inventario_fisico_control.idinventario_fisicoDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idinventario_fisico-cmbid_inventario_fisico").val(inventario_fisico_control.idinventario_fisicoDefaultForeignKey).trigger("change");
			if(jQuery("#"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idinventario_fisico-cmbid_inventario_fisico").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idinventario_fisico-cmbid_inventario_fisico").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
			}
		}


	};

	setDefectoValorCombosbodegasFK(inventario_fisico_control) {

		if(constantes.STR_TIPO_COMBO=="select2") {
			if(inventario_fisico_control.idbodegaDefaultFK>-1 && jQuery("#form"+inventario_fisico_constante1.STR_SUFIJO+"-id_bodega").val() != inventario_fisico_control.idbodegaDefaultFK) {
				jQuery("#form"+inventario_fisico_constante1.STR_SUFIJO+"-id_bodega").val(inventario_fisico_control.idbodegaDefaultFK).trigger("change");
			}
		}

		if(constantes.STR_TIPO_COMBO=="select2") {
			//jQuery("#"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(inventario_fisico_control.idbodegaDefaultForeignKey).trigger("change");
			if(jQuery("#"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val() != constantes.INT_VALOR_ESCOJA_OPCION) {
				jQuery("#"+inventario_fisico_constante1.STR_SUFIJO+"FK_Idbodega-cmbid_bodega").val(constantes.INT_VALOR_ESCOJA_OPCION).trigger("change");
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
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//inventario_fisico_control
		
	
	}
	
	onLoadCombosDefectoFK(inventario_fisico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(inventario_fisico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			if(inventario_fisico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_inventario_fisico",inventario_fisico_control.strRecargarFkTipos,",")) { 
				inventario_fisico_webcontrol1.setDefectoValorCombosinventario_fisicosFK(inventario_fisico_control);
			}

			if(inventario_fisico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",inventario_fisico_control.strRecargarFkTipos,",")) { 
				inventario_fisico_webcontrol1.setDefectoValorCombosbodegasFK(inventario_fisico_control);
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
	onLoadCombosEventosFK(inventario_fisico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(inventario_fisico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			//if(inventario_fisico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_inventario_fisico",inventario_fisico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				inventario_fisico_webcontrol1.registrarComboActionChangeCombosinventario_fisicosFK(inventario_fisico_control);
			//}

			//if(inventario_fisico_control.strRecargarFkTipos=="TODOS" || funcionGeneral.existeCadenaSplit("id_bodega",inventario_fisico_control.strRecargarFkTipos,",")) { 

				//REGISTRAR EVENTOS COMBO
				inventario_fisico_webcontrol1.registrarComboActionChangeCombosbodegasFK(inventario_fisico_control);
			//}

		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(inventario_fisico_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(inventario_fisico_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(inventario_fisico_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(inventario_fisico_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);			
			
			

			funcionGeneralEventoJQuery.setBotonBuscarClic("inventario_fisico","FK_Idbodega","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);

			funcionGeneralEventoJQuery.setBotonBuscarClic("inventario_fisico","FK_Idinventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);
		
			
			if(inventario_fisico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("inventario_fisico");		
			
			funcionGeneralEventoJQuery.setBotonArbolAbrirClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("inventario_fisico");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(inventario_fisico_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,"inventario_fisico");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("inventario_fisico","id_inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+inventario_fisico_constante1.STR_SUFIJO+"-id_inventario_fisico_img_busqueda").click(function(){
				inventario_fisico_webcontrol1.abrirBusquedaParainventario_fisico("id_inventario_fisico");
				//alert(jQuery('#form-id_inventario_fisico_img_busqueda'));

			});

			funcionGeneralEventoJQuery.setImagenForeingKeyAbrirClic("bodega","id_bodega","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);

			//FK IMAGENES BUSQUEDA DATOS
			jQuery("#form"+inventario_fisico_constante1.STR_SUFIJO+"-id_bodega_img_busqueda").click(function(){
				inventario_fisico_webcontrol1.abrirBusquedaParabodega("id_bodega");
				//alert(jQuery('#form-id_bodega_img_busqueda'));

			});

			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("inventario_fisico");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(inventario_fisico_control) {
		
		jQuery("#divBusquedainventario_fisicoAjaxWebPart").css("display",inventario_fisico_control.strPermisoBusqueda);
		jQuery("#trinventario_fisicoCabeceraBusquedas").css("display",inventario_fisico_control.strPermisoBusqueda);
		jQuery("#trBusquedainventario_fisico").css("display",inventario_fisico_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReporteinventario_fisico").css("display",inventario_fisico_control.strPermisoReporte);			
		jQuery("#tdMostrarTodosinventario_fisico").attr("style",inventario_fisico_control.strPermisoMostrarTodos);		
		
		if(inventario_fisico_control.strPermisoNuevo!=null) {
			jQuery("#tdinventario_fisicoNuevo").css("display",inventario_fisico_control.strPermisoNuevo);
			jQuery("#tdinventario_fisicoNuevoToolBar").css("display",inventario_fisico_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdinventario_fisicoDuplicar").css("display",inventario_fisico_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdinventario_fisicoDuplicarToolBar").css("display",inventario_fisico_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdinventario_fisicoNuevoGuardarCambios").css("display",inventario_fisico_control.strPermisoNuevo);
			jQuery("#tdinventario_fisicoNuevoGuardarCambiosToolBar").css("display",inventario_fisico_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(inventario_fisico_control.strPermisoActualizar!=null) {
			jQuery("#tdinventario_fisicoCopiar").css("display",inventario_fisico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdinventario_fisicoCopiarToolBar").css("display",inventario_fisico_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdinventario_fisicoConEditar").css("display",inventario_fisico_control.strPermisoActualizar);
		}
		
		jQuery("#tdinventario_fisicoGuardarCambios").css("display",inventario_fisico_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdinventario_fisicoGuardarCambiosToolBar").css("display",inventario_fisico_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdinventario_fisicoCerrarPagina").css("display",inventario_fisico_control.strPermisoPopup);		
		jQuery("#tdinventario_fisicoCerrarPaginaToolBar").css("display",inventario_fisico_control.strPermisoPopup);
		//jQuery("#trinventario_fisicoAccionesRelaciones").css("display",inventario_fisico_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=inventario_fisico_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + inventario_fisico_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + inventario_fisico_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Inventario Fisicos";
		sTituloBanner+=" - " + inventario_fisico_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + inventario_fisico_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdinventario_fisicoRelacionesToolBar").css("display",inventario_fisico_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultosinventario_fisico").css("display",inventario_fisico_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		inventario_fisico_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		inventario_fisico_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		inventario_fisico_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		inventario_fisico_webcontrol1.registrarEventosControles();
		
		if(inventario_fisico_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(inventario_fisico_constante1.STR_ES_RELACIONADO=="false") {
			inventario_fisico_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(inventario_fisico_constante1.STR_ES_RELACIONES=="true") {
			if(inventario_fisico_constante1.BIT_ES_PAGINA_FORM==true) {
				inventario_fisico_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(inventario_fisico_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(inventario_fisico_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				inventario_fisico_webcontrol1.onLoad();
			
			//} else {
				//if(inventario_fisico_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			inventario_fisico_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("inventario_fisico","inventario","",inventario_fisico_funcion1,inventario_fisico_webcontrol1,inventario_fisico_constante1);	
	}
}

var inventario_fisico_webcontrol1 = new inventario_fisico_webcontrol();

export {inventario_fisico_webcontrol,inventario_fisico_webcontrol1};

//Para ser llamado desde window.opener
window.inventario_fisico_webcontrol1 = inventario_fisico_webcontrol1;


if(inventario_fisico_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = inventario_fisico_webcontrol1.onLoadWindow; 
}

//</script>