//<script type="text/javascript" language="javascript">



//var tipo_termino_pagoJQueryPaginaWebInteraccion= function (tipo_termino_pago_control) {
//this.,this.,this.

class tipo_termino_pago_webcontrol extends GeneralEntityWebControl {
	
	tipo_termino_pago_control=null;
	tipo_termino_pago_controlInicial=null;
	tipo_termino_pago_controlAuxiliar=null;
		
	//if(tipo_termino_pago_constante1.BIT_ES_PARA_JQUERY==true) {
	
	constructor(tipo_termino_pago_control) {
		super();
		
		this.tipo_termino_pago_control=tipo_termino_pago_control;
	}
		
	actualizarVariablesPagina(tipo_termino_pago_control) {
		
		if(tipo_termino_pago_control.action=="index" || tipo_termino_pago_control.action=="load") {
			this.actualizarVariablesPaginaAccionIndex(tipo_termino_pago_control);
			
		} 
		
		
		else if(tipo_termino_pago_control.action=="indexRecargarRelacionado") {
			this.actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="recargarInformacion") {
			this.actualizarVariablesPaginaAccionRecargarInformacion(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="buscarPorIdGeneral") {
			this.actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="anteriores") {
			this.actualizarVariablesPaginaAccionAnteriores(tipo_termino_pago_control);
			
		} else if(tipo_termino_pago_control.action=="siguientes") {
			this.actualizarVariablesPaginaAccionSiguientes(tipo_termino_pago_control);
			
		} else if(tipo_termino_pago_control.action=="recargarUltimaInformacion") {
			this.actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="seleccionarLoteFk") {
			this.actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_termino_pago_control);		
		
		} else if(tipo_termino_pago_control.action=="guardarCambios") {
			this.actualizarVariablesPaginaAccionGuardarCambios(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="duplicar") {
			this.actualizarVariablesPaginaAccionDuplicar(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="copiar") {
			this.actualizarVariablesPaginaAccionCopiar(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="seleccionarActual") {
			this.actualizarVariablesPaginaAccionSeleccionarActual(tipo_termino_pago_control);
		
		}  else if(tipo_termino_pago_control.action=="seleccionarActualAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="eliminarTabla") {
			this.actualizarVariablesPaginaAccionEliminarTabla(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="quitarElementosTabla") {
			this.actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="nuevoPreparar") {
			this.actualizarVariablesPaginaAccionNuevoPreparar(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="nuevoTablaPreparar") {
			this.actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="nuevoPrepararAbrirPaginaForm") {
			this.actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="editarTablaDatos") {
			this.actualizarVariablesPaginaAccionEditarTablaDatos(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="generarHtmlReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_termino_pago_control);
		
		} else if(tipo_termino_pago_control.action=="generarHtmlFormReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_termino_pago_control);		
		
		} else if(tipo_termino_pago_control.action=="generarHtmlRelacionesReporte") {
			this.actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_termino_pago_control);		
		
		} else if(tipo_termino_pago_control.action=="quitarRelacionesReporte") {
			this.actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_termino_pago_control);		
		
		} else if(tipo_termino_pago_control.action.includes("Busqueda") ||
				  tipo_termino_pago_control.action.includes("FK_Id") ) {
					
			this.actualizarVariablesPaginaAccionBusquedas(tipo_termino_pago_control);
			
		} else if(tipo_termino_pago_control.action.includes(constantes.STR_REPORTE)) {
						
			this.actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_termino_pago_control)
		}
		
		
		
	
		else if(tipo_termino_pago_control.action=="cancelar") {
			this.actualizarVariablesPaginaAccionCancelar(tipo_termino_pago_control);	
		
		} else if(tipo_termino_pago_control.action.includes("registrarSesionPara")) {
			this.actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_termino_pago_control);		
		}
	
		else if(tipo_termino_pago_control.action=="eliminarCascada") {
			this.actualizarVariablesPaginaAccionEliminarCascada(tipo_termino_pago_control);		
		}
	
		else if(tipo_termino_pago_control.action=="mostrarEjecutarAccionesRelaciones") {
			this.actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_termino_pago_control);
		}
		
		
		
				
		else {
			//FALTA: manejarEventos, recargarFomularioGeneral, registrarSessionsX
			alert("JS Web Control: Accion = " + tipo_termino_pago_control.action + " Revisar Manejo");
			
		}
		
		
		this.actualizarVariablesPaginaAccionesGenerales(tipo_termino_pago_control);		
			
	}
	
//Funciones Manejadores Accion
	
	actualizarVariablesPaginaAccionesGenerales(tipo_termino_pago_control) {
		this.actualizarPaginaAccionesGenerales(tipo_termino_pago_control);		
	}
	
	actualizarVariablesPaginaAccionIndex(tipo_termino_pago_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_termino_pago_control);
		this.actualizarPaginaOrderBy(tipo_termino_pago_control);
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);
		this.actualizarPaginaCargaGeneralControles(tipo_termino_pago_control);
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_termino_pago_control);
		this.actualizarPaginaAreaBusquedas(tipo_termino_pago_control);
		this.actualizarPaginaCargaCombosFK(tipo_termino_pago_control);	
	}
	
	actualizarVariablesPaginaAccionCancelar(tipo_termino_pago_control) {
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionRegistrarSesionPara(tipo_termino_pago_control) {
		
	}
	
	actualizarVariablesPaginaAccionMostrarEjecutarAccionesRelaciones(tipo_termino_pago_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);							
		
		this.actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_termino_pago_control);
	}
	

	actualizarVariablesPaginaAccionIndexRecargarRelacionado(tipo_termino_pago_control) {
		
		this.actualizarPaginaCargaGeneral(tipo_termino_pago_control);
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);
		this.actualizarPaginaCargaGeneralControles(tipo_termino_pago_control);
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);			
		this.actualizarPaginaAreaAuxiliarBusquedas(tipo_termino_pago_control);
		this.actualizarPaginaAreaBusquedas(tipo_termino_pago_control);
		this.actualizarPaginaCargaCombosFK(tipo_termino_pago_control);		
	}
	
	actualizarVariablesPaginaAccionRecargarInformacion(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionBusquedas(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionBuscarPorIdGeneral(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionAnteriores(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionSiguientes(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionRecargarUltimaInformacion(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarLoteFk(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionGuardarCambios(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);		
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionDuplicar(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);		
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionCopiar(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);		
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActual(tipo_termino_pago_control) {
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionSeleccionarActualAbrirPaginaForm(tipo_termino_pago_control) {
		this.actualizarPaginaAbrirLink(tipo_termino_pago_control);
	}
		
	actualizarVariablesPaginaAccionEliminarCascada(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);				
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);						
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);		
	}		
	
	actualizarVariablesPaginaAccionEliminarTabla(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionQuitarElementosTabla(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		
	}
	
	actualizarVariablesPaginaAccionNuevoPreparar(tipo_termino_pago_control) {
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);
		this.onLoadCombosDefectoFK(tipo_termino_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionNuevoTablaPreparar(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);
		//this.actualizarPaginaFormulario(tipo_termino_pago_control);
		this.onLoadCombosDefectoFK(tipo_termino_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		//this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionNuevoPrepararAbrirPaginaForm(tipo_termino_pago_control) {
		this.actualizarPaginaAbrirLink(tipo_termino_pago_control);
	}
		
	actualizarVariablesPaginaAccionEditarTablaDatos(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);		
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);
	}
		
	actualizarVariablesPaginaAccionGenerarHtmlReporte(tipo_termino_pago_control) {
					//super.actualizarPaginaImprimir(tipo_termino_pago_control,"tipo_termino_pago");
		
		//CON PHP TEMPLATE
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_termino_pago_control.htmlTablaReporteAuxiliars);//JSON.stringify()
		
		//TABLA DATOS REPORTE
		let html_template_datos_general = document.getElementById("tipo_termino_pago_datos_reporte_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_termino_pago_control);
		
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_datos_general);
		//JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_termino_pago_control);				
	}	
	
	actualizarVariablesPaginaAccionGenerarHtmlFormReporte(tipo_termino_pago_control) {
		//super.actualizarPaginaImprimir(tipo_termino_pago_control,"tipo_termino_pago");
						
		//DIV ACCIONES RESUMEN
		let html_template_resumen = document.getElementById("tipo_termino_pago_resumen_template").innerHTML;
    
	    let template_resumen = Handlebars.compile(html_template_resumen);
	
	    let html_resumen = template_resumen(tipo_termino_pago_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_resumen);
		
		//alert(html_resumen);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_termino_pago_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionGenerarHtmlRelacionesReporte(tipo_termino_pago_control) {
		//super.actualizarPaginaImprimir(tipo_termino_pago_control,"tipo_termino_pago");
						
		//DIV ACCIONES RESUMEN
		let html_template_relaciones = document.getElementById("tipo_termino_pago_datos_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_termino_pago_control);
												
		sessionStorage.setItem("htmlTablaReporteAuxiliars",html_relaciones);
		
		//alert(html_relaciones);
						
		//sessionStorage.setItem("htmlTablaReporteAuxiliars",tipo_termino_pago_control.htmlTablaReporteAuxiliars); //JSON.stringify()
		
		this.actualizarPaginaAbrirLink(tipo_termino_pago_control);
		
		funcionGeneralEventoJQuery.setQuitarRelacionesReporte("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
	}
	
	actualizarVariablesPaginaAccionQuitarRelacionesReporte(tipo_termino_pago_control) {
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionGenerarReporteAbrirPaginaForm(tipo_termino_pago_control) {
		//GUARDA EN STORAGE OBJETOS RETURN PARA REPORTE
		this.actualizarPaginaGuardarReturnSession(tipo_termino_pago_control);
			
		this.actualizarPaginaAbrirLink(tipo_termino_pago_control);
	}
	
	actualizarVariablesPaginaAccionEliminarCascada(tipo_termino_pago_control) {
		this.actualizarPaginaTablaDatos(tipo_termino_pago_control);
		this.actualizarPaginaFormulario(tipo_termino_pago_control);
		this.actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control);		
		this.actualizarPaginaAreaMantenimiento(tipo_termino_pago_control);
	}
	


	

	//FUNCIONES AUXILIARES GENERAL
	
	actualizarPaginaAccionesGenerales(tipo_termino_pago_control) {
		
		if(tipo_termino_pago_control.strAuxiliarMensajeAlert!=""){
			this.actualizarPaginaMensajeAlert(tipo_termino_pago_control);
		}
		
		if(tipo_termino_pago_control.bitEsEjecutarFuncionJavaScript==true){
			super.actualizarPaginaEjecutarJavaScript(tipo_termino_pago_control);
		}
	}
	
	actualizarPaginaGuardarReturnSession(tipo_termino_pago_control) {
		if(tipo_termino_pago_control.bitEsGuardarReturnSessionJavaScript==true){
			sessionStorage.setItem("tipo_termino_pagoReturnGeneral",JSON.stringify(tipo_termino_pago_control.tipo_termino_pagoReturnGeneral));
		}
	}
	
	actualizarPaginaMensajePantallaAuxiliar(tipo_termino_pago_control) {
		if(tipo_termino_pago_control.paramDivSeccion.bitDivEsCargarMensajesAjaxWebPart==true && tipo_termino_pago_control.strAuxiliarMensaje!=""){
			this.actualizarPaginaMensajePantalla(tipo_termino_pago_control, true);
		} else {
			this.actualizarPaginaMensajePantalla(tipo_termino_pago_control, false);			
		}
	}
	
	actualizarPaginaMensajePantalla(tipo_termino_pago_control, mostrar) {
		
		if(mostrar==true) {
			tipo_termino_pago_funcion1.resaltarRestaurarDivsPagina(false,"tipo_termino_pago");
			
			if(jQuery("#ParamsPostAccion-chbPostAccionSinCerrar").prop('checked')==false
				&& jQuery("#ParamsPostAccion-chbPostAccionNuevo").prop('checked')==false) {		
					
				tipo_termino_pago_funcion1.resaltarRestaurarDivMantenimiento(false,"tipo_termino_pago");
			}			
			
			tipo_termino_pago_funcion1.mostrarDivMensaje(true,tipo_termino_pago_control.strAuxiliarMensaje,tipo_termino_pago_control.strAuxiliarCssMensaje);
		
		} else {
			tipo_termino_pago_funcion1.mostrarDivMensaje(false,tipo_termino_pago_control.strAuxiliarMensaje,tipo_termino_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaTablaDatosAuxiliar(tipo_termino_pago_control) {
		if(tipo_termino_pago_funcion1.esPaginaForm(tipo_termino_pago_constante1)==true) {
			window.opener.tipo_termino_pago_webcontrol1.actualizarPaginaTablaDatos(tipo_termino_pago_control);
		} else {
			this.actualizarPaginaTablaDatos(tipo_termino_pago_control);
		}
	}
	
	actualizarPaginaAbrirLink(tipo_termino_pago_control) {
		tipo_termino_pago_control.strAuxiliarUrlPagina=funcionGeneral.cambiarUrlPorServicioTercero(tipo_termino_pago_control.strAuxiliarUrlPagina);
				
		tipo_termino_pago_funcion1.procesarFinalizacionProcesoAbrirLinkParametros(tipo_termino_pago_control.strAuxiliarTipo,tipo_termino_pago_control.strAuxiliarUrlPagina);
			
	}
	
	actualizarPaginaMensajeAlert(tipo_termino_pago_control) {
		tipo_termino_pago_funcion1.resaltarRestaurarDivMensaje(true,tipo_termino_pago_control.strAuxiliarMensajeAlert,tipo_termino_pago_control.strAuxiliarCssMensaje);
			
		if(tipo_termino_pago_funcion1.esPaginaForm(tipo_termino_pago_constante1)==true) {
			window.opener.tipo_termino_pago_funcion1.resaltarRestaurarDivMensaje(true,tipo_termino_pago_control.strAuxiliarMensajeAlert,tipo_termino_pago_control.strAuxiliarCssMensaje);
		}
	}
	
	actualizarPaginaCargaGeneral(tipo_termino_pago_control) {
		this.tipo_termino_pago_controlInicial=tipo_termino_pago_control;
			
		if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.actualizarStyleDivsPrincipales(tipo_termino_pago_control.strStyleDivArbol,tipo_termino_pago_control.strStyleDivContent
																,tipo_termino_pago_control.strStyleDivOpcionesBanner,tipo_termino_pago_control.strStyleDivExpandirColapsar
																,tipo_termino_pago_control.strStyleDivHeader);
			
			if(jQuery("#divRecargarInformacion").attr("style")!=tipo_termino_pago_control.strPermiteRecargarInformacion) {
				jQuery("#divRecargarInformacion").attr("style",tipo_termino_pago_control.strPermiteRecargarInformacion);		
			}
		}
	}
	

	
	actualizarPaginaCargaGeneralControles(tipo_termino_pago_control) {
		this.actualizarCssBotonesPagina(tipo_termino_pago_control);
			
		//VERIFICAR,SINO SE DUPLICA DATOS EN COMBOS GENERALES
		if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="false") {
			funcionGeneralJQuery.cargarCombosBoxSelect2JQuery(tipo_termino_pago_control.tiposReportes,tipo_termino_pago_control.tiposReporte
															 	,tipo_termino_pago_control.tiposPaginacion,tipo_termino_pago_control.tiposAcciones
																,tipo_termino_pago_control.tiposColumnasSelect,tipo_termino_pago_control.tiposAccionesFormulario);
			
			funcionGeneralJQuery.cargarCombosRelaciones(tipo_termino_pago_control.tiposRelaciones,tipo_termino_pago_control.tiposRelacionesFormulario);		
			
			this.onLoadCombosDefectoPaginaGeneralControles(tipo_termino_pago_control);
		}						
	}		
	
	actualizarPaginaCargaCombosFK(tipo_termino_pago_control) {	
		//CARGA INICIAL O RECARGAR COMBOS
		//RECARGAR COMBOS SIN ELEMENTOS
		this.cargarCombosFK(tipo_termino_pago_control);			
	}
	
	actualizarPaginaUsuarioInvitado(tipo_termino_pago_control) {
	
		var indexPosition=tipo_termino_pago_control.usuarioActual.field_strUserName.indexOf("INVITADO");			
			
		if(indexPosition<0) {
			indexPosition=tipo_termino_pago_control.usuarioActual.field_strUserName.indexOf("invitado");			
		}
			
		if(indexPosition>0) {
			//OCULTAR CONTROLES DE INVITADO		
			funcionGeneralJQuery.ocultarControlesExpandirImagenesInvitado();
		}
	}
	
	cargarCombosFK(tipo_termino_pago_control) {
		//CARGA INICIAL O RECARGAR COMBOS
		
			
		//RECARGAR COMBOS SIN ELEMENTOS
		if(tipo_termino_pago_control.strRecargarFkTiposNinguno!=null && tipo_termino_pago_control.strRecargarFkTiposNinguno!='NINGUNO' && tipo_termino_pago_control.strRecargarFkTiposNinguno!='') {
			
		}
	}
	
		//PARA EVENTO CHANGE COMBOS
	manejarComboActionChange(sNombreColumna,nombreCombo,strRecargarFkTipos,objetoController) {
		if(false) {
			
		}
		
	}
	
	//FK CHECKBOX EVENTOS
	
	//FK CHECKBOX EVENTOS FIN
	

	actualizarPaginaAreaBusquedas(tipo_termino_pago_control) {
		jQuery("#divBusquedatipo_termino_pagoAjaxWebPart").css("display",tipo_termino_pago_control.strPermisoBusqueda);
		jQuery("#trtipo_termino_pagoCabeceraBusquedas").css("display",tipo_termino_pago_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_termino_pago").css("display",tipo_termino_pago_control.strPermisoBusqueda);
			
		//CARGAR ORDER BY
		if(tipo_termino_pago_control.htmlTablaOrderBy!=null
			&& tipo_termino_pago_control.htmlTablaOrderBy!='') {
			
			jQuery("#divOrderBytipo_termino_pagoAjaxWebPart").html(tipo_termino_pago_control.htmlTablaOrderBy);
				
			//NO TIENE, SON PARAMETROS EXTRA QUE SE ENVIAN COMO PARAMETROS
			//tipo_termino_pago_webcontrol1.registrarOrderByActions();
			
		}
			
		if(tipo_termino_pago_control.htmlTablaOrderByRel!=null
			&& tipo_termino_pago_control.htmlTablaOrderByRel!='') {
				
			jQuery("#divOrderByReltipo_termino_pagoAjaxWebPart").html(tipo_termino_pago_control.htmlTablaOrderByRel);
								
		}
		//CARGAR ORDER BY
			
			
		//SI ES RELACIONADO, SE OCULTA FILAS BUSQUEDAS
		if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="true") {				
			jQuery("#divBusquedatipo_termino_pagoAjaxWebPart").css("display","none");
			jQuery("#trtipo_termino_pagoCabeceraBusquedas").css("display","none");
			jQuery("#trBusquedatipo_termino_pago").css("display","none");			
		}
	}
	
	/*---------------------------------- AREA:TABLA ---------------------------*/
	
	actualizarPaginaTablaDatos(tipo_termino_pago_control) {
		
		if(!tipo_termino_pago_control.bitConEditar) {
			this.actualizarPaginaTablaDatosJsTemplate(tipo_termino_pago_control);
		} else {
			jQuery("#divTablaDatostipo_termino_pagosAjaxWebPart").html(tipo_termino_pago_control.htmlTabla);	
		}
				
			
		if(constantes.STR_TIPO_TABLA=="datatables") {
			var configDataTable=null;
			var tblTablaDatostipo_termino_pagos=null;
			var paginacionInterna=false;
				
			if(jQuery("#ParamsBuscar-chbConPaginacionInterna").prop('checked')==true) {					
				paginacionInterna=true;
			}	
				
				
			if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="false") {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(paginacionInterna,true,true,true,null);
				
			} else {
				configDataTable=funcionGeneralJQuery.getConfigDataTableJQuery3(false,false,false,false,null);
			}
				
			tblTablaDatostipo_termino_pagos=jQuery("#tblTablaDatostipo_termino_pagos").dataTable(configDataTable);
				
			funcionGeneralJQuery.setConfigDataTableJQuery("tipo_termino_pago",configDataTable);
		}
			
		jQuery("#ParamsBuscar-chbConEditar").prop('checked',tipo_termino_pago_control.bitConEditar);
			
		if(jQuery("#ParamsBuscar-chbConEditar").prop('checked')==true) {
			tipo_termino_pago_webcontrol1.registrarControlesTableEdition(tipo_termino_pago_control);
				
			//DESHABILITA-->PUEDE USARSE PARA MOSTRAR NUEVAMENTE TABLA NORMAL
			//jQuery("#ParamsBuscar-chbConEditar").prop('checked',false);
		}
						
		tipo_termino_pago_webcontrol1.registrarTablaAcciones();
	}
	
	actualizarPaginaTablaDatosJsTemplate(tipo_termino_pago_control) {					
		
		//TABLA DATOS
		let html_template_datos_general = document.getElementById("tipo_termino_pago_datos_general_template").innerHTML;
    
	    let template_datos_general = Handlebars.compile(html_template_datos_general);
	
	    let html_datos_general = template_datos_general(tipo_termino_pago_control);
		
		const divTablaDatos = document.getElementById("divTablaDatostipo_termino_pagosAjaxWebPart");
		
		if(divTablaDatos!=null) {
	    	divTablaDatos.innerHTML = html_datos_general;
		}
		//TABLA DATOS
	}	
		
	actualizarPaginaOrderBy(tipo_termino_pago_control) {
		
		//ORDER BY CAMPOS
		let html_template_orderby = document.getElementById("orderby_template").innerHTML;
    
	    let template_orderby = Handlebars.compile(html_template_orderby);
	
	    let html_orderby = template_orderby(tipo_termino_pago_control);
		
		const divOrderBy = document.getElementById("divOrderBytipo_termino_pagoAjaxWebPart");
		
		if(divOrderBy!=null) {
	    	divOrderBy.innerHTML=html_orderby;
		}
		
		
		
		//ORDER BY REL
		let html_template_orderby_rel = document.getElementById("orderby_rel_template").innerHTML;
    
	    let template_orderby_rel = Handlebars.compile(html_template_orderby_rel);
	
	    let html_orderby_rel = template_orderby_rel(tipo_termino_pago_control);
		
		const divOrderByRel = document.getElementById("divOrderByReltipo_termino_pagoAjaxWebPart");
		
		if(divOrderByRel!=null) {
	    	divOrderByRel.innerHTML=html_orderby_rel;
		}
	}
	
	actualizarPaginaTablaFilaActual(tipo_termino_pago_control) {
		//ACTUALIZAR FILA TABLA, EVENTOS EN TABLA
		
		if(tipo_termino_pago_control.tipo_termino_pagoActual!=null) {//form
			
			this.actualizarCamposFilaTabla(tipo_termino_pago_control);			
		}
	}
	
	actualizarCamposFilaTabla(tipo_termino_pago_control) {
		var i=0;
		
		i=tipo_termino_pago_control.idFilaTablaActual;
		
		jQuery("#t-id_"+i+"").val(tipo_termino_pago_control.tipo_termino_pagoActual.id);
		jQuery("#t-version_row_"+i+"").val(tipo_termino_pago_control.tipo_termino_pagoActual.versionRow);
		jQuery("#t-cel_"+i+"_2").val(tipo_termino_pago_control.tipo_termino_pagoActual.codigo);
		jQuery("#t-cel_"+i+"_3").val(tipo_termino_pago_control.tipo_termino_pagoActual.nombre);
	}

	//FUNCION GENERAL PARA ACTUALIZAR EVENTOS DE TABLA
	registrarTablaAcciones() {
		jQuery(document).ready(function() {
			
		if(tipo_termino_pago_constante1.STR_ES_BUSQUEDA=="false") {	
			
			funcionGeneralEventoJQuery.setImagenSeleccionarClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
			
			//ELIMINAR TABLA
			funcionGeneralEventoJQuery.setImagenEliminarTablaClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			
			//MOSTRAR ACCIONES RELACIONES			
			funcionGeneralEventoJQuery.setImagenSeleccionarMostrarAccionesRelacionesClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);			
			
		} else {
			//alert("ES BUSQUEDA");			
			funcionGeneralEventoJQuery.setImagenSeleccionarBusquedaClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
		}
		
		});
	
		

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciontermino_pago_proveedor").click(function(){
		jQuery("#tblTablaDatostipo_termino_pagos").on("click",".imgrelaciontermino_pago_proveedor", function () {

			var idActual=jQuery(this).attr("idactualtipo_termino_pago");

			tipo_termino_pago_webcontrol1.registrarSesionParatermino_pago_proveedores(idActual);
		});

		//SE PIERDE CON PAGINACION DATATABLES O PAGINACION CLIENTE
		//jQuery(".imgrelaciontermino_pago_cliente").click(function(){
		jQuery("#tblTablaDatostipo_termino_pagos").on("click",".imgrelaciontermino_pago_cliente", function () {

			var idActual=jQuery(this).attr("idactualtipo_termino_pago");

			tipo_termino_pago_webcontrol1.registrarSesionParatermino_pago_clientes(idActual);
		});				
	}
		
	

	registrarSesionParatermino_pago_proveedores(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_termino_pago","termino_pago_proveedor","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1,"es","");
	}

	registrarSesionParatermino_pago_clientes(idActual){

		funcionGeneralEventoJQuery.registrarSesionMaestroParaDetalle(idActual,"tipo_termino_pago","termino_pago_cliente","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1,"s","");
	}
	
	registrarControlesTableEdition(tipo_termino_pago_control) {
		tipo_termino_pago_funcion1.registrarControlesTableValidacionEdition(tipo_termino_pago_control,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);			
	}
	
	actualizarPaginaAreaAuxiliarResumen(tipo_termino_pago_control) {
		jQuery("#divResumentipo_termino_pagoActualAjaxWebPart").html(tipo_termino_pago_control.strAuxiliarHtmlReturn1);
	}
	
	actualizarPaginaAreaAuxiliarAccionesRelaciones(tipo_termino_pago_control) {
		//jQuery("#divAccionesRelacionestipo_termino_pagoAjaxWebPart").html(tipo_termino_pago_control.htmlTablaAccionesRelaciones);
		
		//DIV ACCIONES RELACIONES
		let html_template_relaciones = document.getElementById("tipo_termino_pago_relaciones_template").innerHTML;
    
	    let template_relaciones = Handlebars.compile(html_template_relaciones);
	
	    let html_relaciones = template_relaciones(tipo_termino_pago_control);
		
		const divRelaciones = document.getElementById("divAccionesRelacionestipo_termino_pagoAjaxWebPart");
		
		if(divRelaciones!=null) {
	    	divRelaciones.innerHTML=html_relaciones;
		}
		
		tipo_termino_pago_webcontrol1.registrarDivAccionesRelaciones();
	}
	
	actualizarPaginaAreaAuxiliarBusquedas(tipo_termino_pago_control) {
		//SI USA TABS, NO SE DEBE UTILIZAR			
		this.actualizarCssBusquedas(tipo_termino_pago_control);
	}
	
	/*---------------------------------- AREA:BUSQUEDAS ---------------------------*/

	actualizarCssBusquedas(tipo_termino_pago_control) {
		
	}
	
	recargarUltimaInformacionDesdeHijo() {
		this.recargarUltimaInformaciontipo_termino_pago();	
	}
	
	recargarUltimaInformacion() {		
		funcionGeneralEventoJQuery.setPageRecargarUltimaInformacionPost("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);							
	}	
	
	buscarPorIdGeneral(id) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionBuscarPorId("tipo_termino_pago",id,"general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);		
	}
	
	
	
	
	registrarDivAccionesRelaciones() {
		
		
		jQuery("#imgdivrelaciontermino_pago_proveedor").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_termino_pago");

			tipo_termino_pago_webcontrol1.registrarSesionParatermino_pago_proveedores(idActual);
		});
		jQuery("#imgdivrelaciontermino_pago_cliente").click(function(){

			var idActual=jQuery(this).attr("idactualtipo_termino_pago");

			tipo_termino_pago_webcontrol1.registrarSesionParatermino_pago_clientes(idActual);
		});
		
	}	
	
	/*---------------------------------- AREA:FK ---------------------------*/
	
	manejarSeleccionarLoteFk(strParametros) {//alert(strParametros);
		funcionGeneralEventoJQuery.setFuncionPadreDesdeBotonSeleccionarLoteFkClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pagoConstante,strParametros);
		
		//tipo_termino_pago_funcion1.cancelarOnComplete();
	}
	

	
	
/*---------------------------------- AREA:FK ---------------------------*/		
	
	
	
	
	
	
	
	//RECARGAR_FK
	
	
	deshabilitarCombosDisabledFK(habilitarDeshabilitar) {	
	
	}

/*---------------------------------- AREA:RELACIONES ---------------------------*/
	
	onLoadWindowRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionesRelacionados() {		
	}
	
	onLoadRecargarRelacionado() {
		funcionGeneralEventoJQuery.setPageOnLoadRecargarRelacionadoPost("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);	
	}
	
/*---------------------------------- AREA:AUXILIARES ---------------------------*/

	registrarEventosControles() {	
		
		var paraEventoTabla=false;
		var idFilaTabla=0;
		
		//VERIFICAR: Creo no se necesita Controller
		this.onLoadCombosEventosFK(null);//tipo_termino_pago_control
		
	
	}
	
	onLoadCombosDefectoFK(tipo_termino_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_termino_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
			
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
	onLoadCombosEventosFK(tipo_termino_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			//funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_termino_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			//funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
			
			
		}
	}
	
	onLoadCombosDefectoPaginaGeneralControles(tipo_termino_pago_control) {
		
		if(constantes.STR_TIPO_COMBO=="select2") {
			
			funcionGeneralJQuery.setDefaultComboBoxValuesJQuery(tipo_termino_pago_control.intNumeroPaginacion,constantes.STR_DEFAULT_REPORTE);
			
			funcionGeneralEventoJQuery.setDefectoCombosRelaciones();
		}
	}
	
	registrarAccionesEventos() {	
		if(tipo_termino_pago_constante1.BIT_ES_PARA_JQUERY==true) {
		
		jQuery.noConflict();
		
		jQuery(document).ready(function() {
			
			



			funcionGeneralEventoJQuery.setBotonRecargarInformacionClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonGuardarCambiosFormularioClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonSeleccionarLoteFkClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonAnterioresClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonSiguientesClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonNuevoPrepararClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
			
			funcionGeneralEventoJQuery.setBotonNuevoTablaPrepararClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);				
			
			funcionGeneralEventoJQuery.setBotonDuplicarClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonCopiarClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenNuevoPrepararRegistreseClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setBotonOrderByClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setImagenCerrarSesionClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);			
			
			//IMPRIMIR SOLO TABLA DATOS
			funcionGeneralEventoJQuery.setBotonImprimirPaginaClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);			
			
			//TIPOS COLUMNAS
			funcionGeneralEventoJQuery.setComboTiposColumnas(tipo_termino_pago_funcion1);						
			//TIPOS COLUMNAS
			
			funcionGeneralEventoJQuery.setCheckSeleccionarTodosChange("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setCheckConAltoMaximoTablaChange("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);			
			
			funcionGeneralEventoJQuery.setCheckConEditarChange("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);			
			
			
		
			
			if(tipo_termino_pago_constante1.BIT_ES_PAGINA_PRINCIPAL==true) { // NO FORM
				//LLAMADO EN ONLOADWINDOW	
				funcionGeneralEventoJQuery.setWindowUnload("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,window);
			}
			

			funcionGeneralEventoJQuery.setBotonCerrarClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralJQuery.inicializarBotonesImprimirJQuery("tipo_termino_pago");		
			
			
			funcionGeneralEventoJQuery.setBotonOrderByRelClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			
			//RELACIONES_NAVEGACION
						
			funcionGeneralEventoJQuery.setToolBarClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setHotKeyClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
						
			funcionGeneralEventoJQuery.setBotonCancelarArchivoActualClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);			
				
			funcionGeneralJQuery.inicializarBotonesCancelarCerrarJQuery("tipo_termino_pago");
									
			//COPIADO DE BOTON GENERAR REPORTE			
			funcionGeneralEventoJQuery.setComboAccionesChange("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
			
			//TIPOS RELACIONES
			funcionGeneralEventoJQuery.setComboTiposRelaciones(tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			//TIPOS RELACIONES
			
			//TIPOS RELACIONES FORMULARIO
			funcionGeneralEventoJQuery.setComboTiposRelacionesFormulario(tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			//TIPOS RELACIONES FORMULARIO	
			
						
			if(constantes.STR_TIPO_COMBO=="select2") {
				funcionGeneralJQuery.inicializarCombosBoxSelect2JQuery();
				
				funcionGeneralEventoJQuery.setCombosRelacionesSelect2();				
			}
			
			
			if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="true") {
				funcionGeneralEventoJQuery.setCheckConEditarRelacionadoChange("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,"tipo_termino_pago");
			}
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			//FK IMAGENES ACTUALIZAR DATOS
			
			
			funcionGeneralEventoJQuery.setDivsDialogBindClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
			
			funcionGeneralEventoJQuery.setDivsRelacionesDialogBindClic("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
														
																	
			funcionGeneralEventoJQuery.setDivAccionesRelacionesConfig("tipo_termino_pago");
									
			
			
		});
		} else {
			
		}
	}//this.registrarAccionesEventos

/*---------------------------------- AREA:PAGINA ---------------------------*/

	actualizarCssBotonesPagina(tipo_termino_pago_control) {
		
		jQuery("#divBusquedatipo_termino_pagoAjaxWebPart").css("display",tipo_termino_pago_control.strPermisoBusqueda);
		jQuery("#trtipo_termino_pagoCabeceraBusquedas").css("display",tipo_termino_pago_control.strPermisoBusqueda);
		jQuery("#trBusquedatipo_termino_pago").css("display",tipo_termino_pago_control.strPermisoBusqueda);
		
		jQuery("#tdGenerarReportetipo_termino_pago").css("display",tipo_termino_pago_control.strPermisoReporte);			
		jQuery("#tdMostrarTodostipo_termino_pago").attr("style",tipo_termino_pago_control.strPermisoMostrarTodos);		
		
		if(tipo_termino_pago_control.strPermisoNuevo!=null) {
			jQuery("#tdtipo_termino_pagoNuevo").css("display",tipo_termino_pago_control.strPermisoNuevo);
			jQuery("#tdtipo_termino_pagoNuevoToolBar").css("display",tipo_termino_pago_control.strPermisoNuevo.replace("row","cell"));			
			jQuery("#tdtipo_termino_pagoDuplicar").css("display",tipo_termino_pago_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_termino_pagoDuplicarToolBar").css("display",tipo_termino_pago_control.strPermisoNuevo.replace("row","cell"));
			jQuery("#tdtipo_termino_pagoNuevoGuardarCambios").css("display",tipo_termino_pago_control.strPermisoNuevo);
			jQuery("#tdtipo_termino_pagoNuevoGuardarCambiosToolBar").css("display",tipo_termino_pago_control.strPermisoNuevo.replace("row","cell"));
		}
		
		if(tipo_termino_pago_control.strPermisoActualizar!=null) {
			jQuery("#tdtipo_termino_pagoCopiar").css("display",tipo_termino_pago_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_termino_pagoCopiarToolBar").css("display",tipo_termino_pago_control.strPermisoActualizar.replace("row","cell"));
			jQuery("#tdtipo_termino_pagoConEditar").css("display",tipo_termino_pago_control.strPermisoActualizar);
		}
		
		jQuery("#tdtipo_termino_pagoGuardarCambios").css("display",tipo_termino_pago_control.strPermisoGuardar.replace("row","cell"));
		jQuery("#tdtipo_termino_pagoGuardarCambiosToolBar").css("display",tipo_termino_pago_control.strPermisoGuardar.replace("row","cell"));
		
		
		
		
		jQuery("#tdtipo_termino_pagoCerrarPagina").css("display",tipo_termino_pago_control.strPermisoPopup);		
		jQuery("#tdtipo_termino_pagoCerrarPaginaToolBar").css("display",tipo_termino_pago_control.strPermisoPopup);
		//jQuery("#trtipo_termino_pagoAccionesRelaciones").css("display",tipo_termino_pago_control.strVisibleTablaAccionesRelaciones);		
	}
	
	registrarPropiedadesPagina() {
		var sTituloBanner="";
		
		document.title=tipo_termino_pago_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_termino_pago_constante1.STR_NOMBRE_MODULO_ACTUAL;
		
		sTituloBanner+="<b>";
		sTituloBanner+=constantes.STR_NOMBRE_SISTEMA + " - " + tipo_termino_pago_constante1.STR_NOMBRE_MODULO_ACTUAL;
		sTituloBanner+=" - " + constantes.STR_PREFIJO_TITULO_TABLA + " Tipo Termino Pagos";
		sTituloBanner+=" - " + tipo_termino_pago_constante1.STR_DESCRIPCION_USUARIO_SISTEMA + tipo_termino_pago_constante1.STR_DESCRIPCION_PERIODO_SISTEMA;
		sTituloBanner+="</b>";
		
		jQuery("#spanTituloBanner").html(sTituloBanner);
		
		jQuery("#spanMensajePopupBloqueador").text(constantes.STR_MENSAJE_POPUP_BLOQUEADOR);
		
		jQuery("#tdtipo_termino_pagoRelacionesToolBar").css("display",tipo_termino_pago_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		jQuery("#tblCamposOcultostipo_termino_pago").css("display",tipo_termino_pago_constante1.STR_STYLE_DISPLAY_CAMPOS_OCULTOS);
		
	}
	
	registrarFuncionesPagina() {
		
		funcionGeneralJQuery.addHandleBarsFuncionesGenerales();
	}
	
	onLoad() {
		funcionGeneralEventoJQuery.setPageOnLoadPost("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);
	}
	
	onUnLoadWindow() {
		funcionGeneralEventoJQuery.setPageUnLoadWindowPost("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1);
	}
	
	onLoadWindow() {
		
		//REGISTRAR PROPIEDADES DE LA PAGINA
		tipo_termino_pago_webcontrol1.registrarPropiedadesPagina();
		
		//REGISTRAR FUNCIONES DE LA PAGINA		
		tipo_termino_pago_webcontrol1.registrarFuncionesPagina()
		
		//REGISTRAR EVENTOS E INICIALIZAR OBJETOS JQUERY
		tipo_termino_pago_webcontrol1.registrarAccionesEventos();
		
		//REGISTRAR EVENTOS DE CONTROLES E INICIALIZAR OBJETOS JQUERY
		tipo_termino_pago_webcontrol1.registrarEventosControles();
		
		if(tipo_termino_pago_constante1.BIT_ES_PARA_JQUERY==false) {
			funcionGeneral.procesarFinalizacionProceso();
		}
		
		
		//REGISTRAR EVENTOS GLOBALES JQUERY
		if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="false") {
			tipo_termino_pago_webcontrol1.registrarEventosOnLoadGlobal();
		}
		
		
		//CARGAR LOAD RELACIONADOS
		
		if(tipo_termino_pago_constante1.STR_ES_RELACIONES=="true") {
			if(tipo_termino_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				tipo_termino_pago_webcontrol1.onLoadWindowRelacionesRelacionados();
			}
		}
		
		
		//LOAD CONTROLLER
		if(tipo_termino_pago_constante1.BIT_CON_PAGINA_FORM==true) {
			
			//if(tipo_termino_pago_constante1.BIT_ES_PAGINA_PRINCIPAL==true) {
				tipo_termino_pago_webcontrol1.onLoad();
			
			//} else {
				//if(tipo_termino_pago_constante1.BIT_ES_PAGINA_FORM==true) {
				
				//}
			//}
			
		} else {
			tipo_termino_pago_webcontrol1.onLoad();	
		}						
	}

	registrarEventosOnLoadGlobal() {
		funcionGeneralEventoJQuery.setWindowOnLoadGlobalConfig("tipo_termino_pago","general","",tipo_termino_pago_funcion1,tipo_termino_pago_webcontrol1,tipo_termino_pago_constante1);	
	}
}

var tipo_termino_pago_webcontrol1=new tipo_termino_pago_webcontrol();

if(tipo_termino_pago_constante1.STR_ES_RELACIONADO=="false") {
	window.onload = tipo_termino_pago_webcontrol1.onLoadWindow; 
}

//</script>